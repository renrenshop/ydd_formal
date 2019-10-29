<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Index_EweiShopV2Page extends PluginMobileLoginPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$codetype = intval($_GPC['codetype']);
		$key = trim($_GPC['key']);
		$all = 0;
		$all = intval($_GPC['all']);
		$id = intval($_GPC['id']);
		if (!(empty($all)) && !(empty($codetype))) 
		{
			include $this->template('exchange/common');
			exit();
		}
		else if (!(empty($all)) && empty($codetype)) 
		{
			$keyresult = pdo_fetch('SELECT groupid FROM ' . tablename('ewei_shop_exchange_code') . ' WHERE `key` = :code AND uniacid = :uniacid', array(':code' => $key, ':uniacid' => $_W['uniacid']));
			if (empty($keyresult)) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_0'].'');
			}
			else 
			{
				$id = $keyresult['groupid'];
			}
		}
		if (empty($id) && !(empty($codetype))) 
		{
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_1'].'', '', 'error');
		}
		else if (!(empty($id))) 
		{
			$_SESSION['exchangeGroupId'] = $id;
		}
		if (!(empty($codetype))) 
		{
			$res = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_group') . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $id));
			$banner = json_decode($res['banner'], 1);
			$plugin_diypage = p('diypage');
			if ($plugin_diypage) 
			{
				$diypage = $plugin_diypage->exchangePage($res['diypage']);
				if ($diypage) 
				{
					$startadv = $plugin_diypage->getStartAdv($diypage['diyadv']);
					include $this->template('diypage/exchange');
					exit();
				}
			}
			include $this->template('exchange/common');
			exit();
		}
		if (empty($key) && !(empty($_SESSION['exchange_key']))) 
		{
			$key = $_SESSION['exchange_key'];
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '1') 
		{
			show_json($is_exchange[2], mobileUrl('exchange.' . $is_exchange[1], array('exchange' => 1), 1));
			header('Location:' . mobileUrl('exchange.' . $is_exchange[1]));
		}
		else 
		{
			show_json(0, $is_exchange[1]);
			$this->message($is_exchange[1], '', 'error');
		}
	}
	private function is_exchange($key) 
	{
		global $_W;
		$set = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_setting') . ' WHERE uniacid = :uniacid', array(':uniacid' => $_W['uniacid']));
		$this->counterror($set);
		$time = strtotime('now');
		$time = date('Y-m-d');
		$time1 = $time . ' 00:00:00';
		$time2 = $time . ' 23:59:59';
		$time1 = strtotime($time1);
		$time2 = strtotime($time2);
		if (empty($_W['openid'])) 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_2'].'');
		}
		else if (!(empty($set['alllimit']))) 
		{
			$exchangelimit = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_exchange_record') . ' WHERE openid =:openid AND uniacid = :uniacid AND `time` > :timea AND `time` <= :timeb', array(':uniacid' => $_W['uniacid'], ':openid' => $_W['openid'], ':timea' => $time1, ':timeb' => $time2));
			if ($set['alllimit'] <= intval($exchangelimit)) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_3'].'');
			}
		}
		if (empty($_SESSION['exchangeGroupId'])) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_mobile_index_4'].','.$this->lang['lang_plugin_exchange_core_mobile_index_5'].'');
			return $return;
		}
		if (!(empty($set['grouplimit']))) 
		{
			$exchangelimit2 = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_exchange_record') . ' WHERE openid =:openid AND uniacid = :uniacid AND `time` > :timea AND `time` <= :timeb AND groupid = :groupid', array(':uniacid' => $_W['uniacid'], ':openid' => $_W['openid'], ':timea' => $time1, ':timeb' => $time2, ':groupid' => $_SESSION['exchangeGroupId']));
			if ($set['grouplimit'] <= intval($exchangelimit2)) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_6'].'');
			}
		}
		$_SESSION['exchange_key'] = NULL;
		$return = array();
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$this->model->checkRepeatExchange($key);
		$codeResult = pdo_fetch('SELECT * FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key` = :key', array(':uniacid' => $_W['uniacid'], ':key' => $key));
		if ($_SESSION['exchangeGroupId'] != $codeResult['groupid']) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_mobile_index_7'].'');
			pdo_query('UPDATE ' . tablename('ewei_shop_exchange_query') . ' SET `errorcount` = `errorcount` + 1 WHERE openid = :openid', array(':openid' => $_W['openid']));
			return $return;
		}
		if ($codeResult === false) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_mobile_index_8'].'');
			pdo_query('UPDATE ' . tablename('ewei_shop_exchange_query') . ' SET `errorcount` = `errorcount` + 1 WHERE openid = :openid', array(':openid' => $_W['openid']));
			return $return;
		}
		pdo_query('UPDATE ' . tablename('ewei_shop_exchange_query') . ' SET `errorcount` = 0 AND `unfreeze`=0 WHERE openid = :openid', array(':openid' => $_W['openid']));
		if ($codeResult['status'] == 2) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_mobile_index_9'].'');
			return $return;
		}
		if (strtotime($codeResult['endtime']) <= time()) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_mobile_index_10'].'');
			return $return;
		}
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		if (!(empty($codeResult['openid'])) && ($codeResult['openid'] != $_W['openid']) && !(empty($groupResult['binding']))) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_mobile_index_11'].'');
			return $return;
		}
		pdo_query('UPDATE ' . tablename('ewei_shop_exchange_code') . ' SET openid = :openid , `count` = `count` + 1 WHERE openid != :openid AND uniacid = :uniacid AND `key`=:key', array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid'], ':key' => $key));
		if ($groupResult === false) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_mobile_index_12'].'');
			return $return;
		}
		if (strtotime($groupResult['endtime']) <= time()) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_mobile_index_13'].'');
			return $return;
		}
		if ($groupResult['status'] == 0) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_mobile_index_14'].'');
			return $return;
		}
		if (time() < strtotime($groupResult['starttime'])) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_mobile_index_15'].'');
			return $return;
		}
		@session_start();
		$_SESSION['exchange_key'] = $key;
		switch ($groupResult['mode']) 
		{
			case '1': $method = 'goods';
			break;
			case 2: $method = 'balance';
			break;
			case 3: $method = 'redpacket';
			break;
			case 4: $method = 'score';
			break;
			case 5: $method = 'coupon';
			break;
			case 6: $method = 'group';
			break;
		}
		$return = array('1', $method, $groupResult['mode']);
		return $return;
	}
	public function balance() 
	{
		global $_W;
		global $_GPC;
		$key = $_SESSION['exchange_key'];
		if (empty($key)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_16'].'');
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_17'].'');
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '0') 
		{
			show_json(0, $is_exchange[1]);
			$this->message($is_exchange[1]);
		}
		else if ($is_exchange[1] != 'balance') 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_18'].'');
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_19'].'');
		}
		$checkSubmit = $this->checkSubmit('exchange_plugin');
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$checkSubmit = $this->checkSubmitGlobal('exchange_key_' . $key);
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT *FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key`=:key ', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		$exchange = trim($_GPC['exchange']);
		if ($exchange == '1') 
		{
			$type = 1;
			$member = m('member')->getMember($_W['openid']);
			if ($groupResult['type'] == 1) 
			{
				$balance = $groupResult['balance'];
				$str = ''.$this->lang['lang_plugin_exchange_core_mobile_index_20'].'';
				$channel = 1;
			}
			else if ($groupResult['type'] == 2) 
			{
				$channel = 1;
				$balance = rand($groupResult['balance_left'] * 100, $groupResult['balance_right'] * 100) / 100;
			}
			else if ($groupResult['type'] == 3) 
			{
				$type = 2;
				$balance = $groupResult['balance'];
				$str = ''.$this->lang['lang_plugin_exchange_core_mobile_index_21'].'';
				$channel = 2;
			}
			$balance = round($balance, 2);
			$balance_res = $this->chongzhi('credit2', $member['id'], 0, $balance, $str, $channel);
			$balance_res = intval($balance_res);
			if ($balance_res === 1) 
			{
				$repeatcount = $this->model->setRepeatCount($key);
				if (empty($repeatcount)) 
				{
					pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid'], 'status' => 1, 'repeatcount' => 1));
				}
				$info = m('member')->getInfo($_W['openid']);
				$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'balance' => $balance, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 2, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
				pdo_insert('ewei_shop_exchange_record', $record);
				pdo_query('UPDATE ' . $table1 . ' SET `use` = `use` + 1 WHERE id = :id AND uniacid = :uniacid', array(':id' => $groupResult['id'], ':uniacid' => $_W['uniacid']));
				show_json(1, ''.$this->lang['lang_plugin_exchange_core_mobile_index_22'].'' . $balance . ''.$this->lang['lang_plugin_exchange_core_mobile_index_23'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_24'].'' . $balance . ''.$this->lang['lang_plugin_exchange_core_mobile_index_25'].'');
			}
			else 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_26'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_27'].'');
			}
		}
		else 
		{
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_28'].'', mobileUrl('exchange.balance', array('exchange' => 1)));
		}
	}
	public function score() 
	{
		global $_W;
		global $_GPC;
		$key = $_SESSION['exchange_key'];
		if (empty($key)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_29'].'');
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_30'].'');
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '0') 
		{
			show_json(0, $is_exchange[1]);
			$this->message($is_exchange[1]);
		}
		else if ($is_exchange[1] != 'score') 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_31'].'');
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_32'].'');
		}
		$checkSubmit = $this->checkSubmit('exchange_plugin');
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$checkSubmit = $this->checkSubmitGlobal('exchange_key_' . $key);
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT *FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key`=:key ', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		$exchange = trim($_GPC['exchange']);
		if ($exchange == '1') 
		{
			$member = m('member')->getMember($_W['openid']);
			if ($groupResult['type'] == 1) 
			{
				$score = $groupResult['score'];
			}
			else 
			{
				$score = rand($groupResult['score_left'], $groupResult['score_right']);
			}
			$balance_res = $this->chongzhi('credit1', $member['id'], 0, $score, ''.$this->lang['lang_plugin_exchange_core_mobile_index_33'].':'.$this->lang['lang_plugin_exchange_core_mobile_index_34'].'');
			$balance_res = intval($balance_res);
			if ($balance_res === 1) 
			{
				$repeatcount = $this->model->setRepeatCount($key);
				if (empty($repeatcount)) 
				{
					pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid'], 'status' => 1, 'repeatcount' => 1));
				}
				$info = m('member')->getInfo($_W['openid']);
				$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'score' => $score, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 4, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
				pdo_insert('ewei_shop_exchange_record', $record);
				pdo_query('UPDATE ' . $table1 . ' SET `use` = `use` + 1 WHERE id = :id AND uniacid = :uniacid', array(':id' => $groupResult['id'], ':uniacid' => $_W['uniacid']));
				show_json(1, ''.$this->lang['lang_plugin_exchange_core_mobile_index_35'].'' . $score . ''.$this->lang['lang_plugin_exchange_core_mobile_index_36'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_37'].'' . $score . ''.$this->lang['lang_plugin_exchange_core_mobile_index_38'].'');
			}
			else 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_39'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_40'].'');
			}
		}
		else 
		{
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_41'].'', mobileUrl('exchange.score', array('exchange' => 1)));
		}
	}
	public function redpacket() 
	{
		global $_W;
		global $_GPC;
		$key = $_SESSION['exchange_key'];
		if (empty($key)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_42'].'');
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_43'].'');
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '0') 
		{
			show_json(0, $is_exchange[1]);
			$this->message($is_exchange[1]);
		}
		else if ($is_exchange[1] != 'redpacket') 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_44'].'');
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_45'].'');
		}
		$checkSubmit = $this->checkSubmit('exchange_plugin');
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$checkSubmit = $this->checkSubmitGlobal('exchange_key_' . $key);
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT *FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key`=:key ', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		$exchange = trim($_GPC['exchange']);
		if ($exchange == '1') 
		{
			if ($groupResult['type'] == 1) 
			{
				$red = $groupResult['red'];
			}
			else 
			{
				$red = rand($groupResult['red_left'] * 100, $groupResult['red_right'] * 100) / 100;
			}
			$params = array('openid' => $_W['openid'], 'tid' => time(), 'send_name' => $groupResult['sendname'], 'money' => $red, 'wishing' => $groupResult['wishing'], 'act_name' => $groupResult['actname'], 'remark' => $groupResult['remark']);
			$result = m('common')->sendredpack($params);
			if (!(is_error($result))) 
			{
				$repeatcount = $this->model->setRepeatCount($key);
				if (empty($repeatcount)) 
				{
					pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid'], 'status' => 1, 'repeatcount' => 1));
				}
				$info = m('member')->getInfo($_W['openid']);
				$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'red' => $red, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 3, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
				pdo_insert('ewei_shop_exchange_record', $record);
				pdo_query('UPDATE ' . $table1 . ' SET `use` = `use` + 1 WHERE id = :id AND uniacid = :uniacid', array(':id' => $groupResult['id'], ':uniacid' => $_W['uniacid']));
				show_json(1, ''.$this->lang['lang_plugin_exchange_core_mobile_index_46'].'' . $red . ''.$this->lang['lang_plugin_exchange_core_mobile_index_47'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_48'].'' . $red . ''.$this->lang['lang_plugin_exchange_core_mobile_index_49'].'');
			}
			else 
			{
				show_json(0, $result['message']);
			}
		}
		else 
		{
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_50'].'', mobileUrl('exchange.redpacket', array('exchange' => 1)));
		}
	}
	public function coupon() 
	{
		global $_W;
		global $_GPC;
		$key = $_SESSION['exchange_key'];
		if (empty($key)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_51'].'');
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_52'].'');
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '0') 
		{
			show_json(0, $is_exchange[1]);
			$this->message($is_exchange[1]);
		}
		else if ($is_exchange[1] != 'coupon') 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_53'].'');
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_54'].'');
		}
		$checkSubmit = $this->checkSubmit('exchange_plugin');
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$checkSubmit = $this->checkSubmitGlobal('exchange_key_' . $key);
		if (is_error($checkSubmit)) 
		{
			show_json(0, $checkSubmit['message']);
		}
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT *FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key`=:key ', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		$exchange = trim($_GPC['exchange']);
		if ($exchange == '1') 
		{
			$coupon = json_decode($groupResult['coupon'], true);
			if (empty($coupon[0])) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_55'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_56'].'');
			}
			if ($groupResult['type'] == 1) 
			{
				$condition = '(';
				foreach ($coupon as $k => $item ) 
				{
					$condition .= 'id = ' . $item . ' OR ';
				}
				$condition = substr($condition, 0, -4);
				$condition .= ')';
				$record_coupon = $groupResult['coupon'];
			}
			else 
			{
				$rand = array_rand($coupon, 1);
				$condition = 'id = ' . $coupon[$rand];
				$record_coupon = json_encode($coupon[$rand]);
			}
			$allCoupon = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_coupon') . ' WHERE ' . $condition . ' and uniacid=:uniacid and merchid=0', array(':uniacid' => $_W['uniacid']));
			if (empty($allCoupon[0])) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_57'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_58'].'');
			}
			$m = m('member')->getInfo($_W['openid']);
			$resp = array();
			$resp['resptitle'] = ''.$this->lang['lang_plugin_exchange_core_mobile_index_59'].'';
			$resp['respdesc'] = ''.$this->lang['lang_plugin_exchange_core_mobile_index_60'].','.$this->lang['lang_plugin_exchange_core_mobile_index_61'].'';
			$resp['respurl'] = mobileUrl('sale.coupon.my', array(), 1);
			$resp['respthumb'] = '';
			foreach ($allCoupon as $k => $v ) 
			{
				$data = array('uniacid' => $_W['uniacid'], 'merchid' => 0, 'openid' => $_W['openid'], 'couponid' => $v['id'], 'gettype' => 7, 'gettime' => time(), 'senduid' => $_W['uid']);
				pdo_insert('ewei_shop_coupon_data', $data);
			}
			$this->model->sendMessage($resp, 1, $m);
			$repeatcount = $this->model->setRepeatCount($key);
			if (empty($repeatcount)) 
			{
				pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid'], 'status' => 1, 'repeatcount' => 1));
			}
			$info = m('member')->getInfo($_W['openid']);
			$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'coupon' => $record_coupon, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 5, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
			pdo_insert('ewei_shop_exchange_record', $record);
			pdo_query('UPDATE ' . $table1 . ' SET `use` = `use` + 1 WHERE id = :id AND uniacid = :uniacid', array(':id' => $groupResult['id'], ':uniacid' => $_W['uniacid']));
			show_json(1, ''.$this->lang['lang_plugin_exchange_core_mobile_index_62'].'');
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_63'].'');
		}
		else 
		{
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_64'].'', mobileUrl('exchange.coupon', array('exchange' => 1)));
		}
	}
	public function goods() 
	{
		global $_W;
		global $_GPC;
		$exchange = trim($_GPC['exchange']);
		$key = $_SESSION['exchange_key'];
		if (empty($key)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_65'].'');
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_66'].'');
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '0') 
		{
			if ($exchange == '1') 
			{
				show_json(0, $is_exchange[1]);
			}
			else 
			{
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_67'].'', '', 'error');
			}
			$this->message($is_exchange[1]);
		}
		else if ($is_exchange[1] != 'goods') 
		{
			if ($exchange == '1') 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_68'].'');
			}
			else 
			{
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_69'].'', '', 'error');
			}
		}
		else if ($exchange == '1') 
		{
			show_json(1, ''.$this->lang['lang_plugin_exchange_core_mobile_index_70'].'');
		}
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT *FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key`=:key ', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		if ($exchange == '1') 
		{
		}
		else 
		{
			$goods_arr = json_decode($groupResult['goods'], true);
			if ($goods_arr['goods'] != false) 
			{
				foreach ($goods_arr['goods'] as $k => $v ) 
				{
					$goodsList[$k] = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $v, ':uniacid' => $_W['uniacid']));
				}
			}
			if ($goods_arr['option'] != false) 
			{
				foreach ($goods_arr['option'] as $k => $v ) 
				{
					$optionList[$k] = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $k, ':uniacid' => $_W['uniacid']));
					$optionstr = implode('-', $v);
					$optionList[$k]['optionstr'] = $optionstr;
				}
			}
			$banner = json_decode($groupResult['banner'], 1);
			if (!(empty($banner))) 
			{
				foreach ($banner as $k => $v ) 
				{
					$banner[$k] = urldecode($v);
					$banner[$k] = tomedia($banner[$k]);
				}
			}
			include $this->template();
		}
	}
	public function group() 
	{
		global $_W;
		global $_GPC;
		$ajax = intval($_GPC['ajax']);
		$key = $_SESSION['exchange_key'];
		if (empty($key)) 
		{
			if (empty($ajax)) 
			{
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_71'].'');
			}
			else 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_72'].'');
			}
		}
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '0') 
		{
			if (empty($ajax)) 
			{
				$this->message($is_exchange[1]);
			}
			else 
			{
				show_json(0, $is_exchange[1]);
			}
		}
		else if ($is_exchange[1] != 'group') 
		{
			if (empty($ajax)) 
			{
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_73'].'');
			}
			else 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_74'].'');
			}
		}
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT *FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key`=:key ', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		$exchange = trim($_GPC['exchange']);
		if ($exchange == '1') 
		{
			if ($codeResult['balancestatus'] == 2) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_75'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_76'].'');
			}
			if (($groupResult['balance'] <= 0) && ($groupResult['balance_left'] <= 0) && ($groupResult['balance_right'] <= 0)) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_77'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_78'].'');
			}
			$checkSubmit = $this->checkSubmit('exchange_plugin');
			if (is_error($checkSubmit)) 
			{
				show_json(0, $checkSubmit['message']);
			}
			$checkSubmit = $this->checkSubmitGlobal('exchange_key_' . $key);
			if (is_error($checkSubmit)) 
			{
				show_json(0, $checkSubmit['message']);
			}
			$type = 1;
			$member = m('member')->getMember($_W['openid']);
			if ($groupResult['balance_type'] == 1) 
			{
				$balance = $groupResult['balance'];
				$str = ''.$this->lang['lang_plugin_exchange_core_mobile_index_79'].'';
				$channel = 1;
			}
			else if ($groupResult['balance_type'] == 2) 
			{
				$balance = rand($groupResult['balance_left'] * 100, $groupResult['balance_right'] * 100) / 100;
			}
			else if ($groupResult['balance_type'] == 3) 
			{
				$type = 2;
				$balance = $groupResult['balance'];
				$str = ''.$this->lang['lang_plugin_exchange_core_mobile_index_80'].'';
				$channel = 2;
			}
			$balance = round($balance, 2);
			$balance_res = $this->chongzhi('credit2', $member['id'], 0, $balance, $str, $channel);
			$balance_res = intval($balance_res);
			if ($balance_res === 1) 
			{
				pdo_update('ewei_shop_exchange_code', array('balancestatus' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
				$info = m('member')->getInfo($_W['openid']);
				$record_exist = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_exchange_record') . ' WHERE `key`=:key AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], 'key' => $key));
				if (empty($record_exist)) 
				{
					$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'balance' => $balance, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
					pdo_insert('ewei_shop_exchange_record', $record);
				}
				else 
				{
					$record = array('balance' => $balance, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6);
					pdo_update('ewei_shop_exchange_record', $record, array('key' => $key, 'uniacid' => $_W['uniacid']));
				}
				if ((($codeResult['scorestatus'] == 2) || empty($groupResult['score_type'])) && (($codeResult['redstatus'] == 2) || empty($groupResult['red_type'])) && (($codeResult['couponstatus'] == 2) || empty($groupResult['coupon_type'])) && (($codeResult['goodsstatus'] == 2) || empty($groupResult['type']))) 
				{
					pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
					pdo_query('UPDATE ' . tablename('ewei_shop_exchange_group') . ' SET `use` = `use` + 1 WHERE uniacid = :uniacid AND `id` = :id', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
				}
				show_json(1, ''.$this->lang['lang_plugin_exchange_core_mobile_index_81'].'' . $balance . ''.$this->lang['lang_plugin_exchange_core_mobile_index_82'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_83'].'' . $balance . ''.$this->lang['lang_plugin_exchange_core_mobile_index_84'].'');
			}
			else 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_85'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_86'].'');
			}
		}
		else if ($exchange == '2') 
		{
			if ($codeResult['redstatus'] == 2) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_87'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_88'].'');
			}
			if (($groupResult['red'] <= 0) && ($groupResult['red_left'] <= 0) && ($groupResult['red_right'] <= 0)) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_89'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_90'].'');
			}
			$checkSubmit = $this->checkSubmit('exchange_plugin');
			if (is_error($checkSubmit)) 
			{
				show_json(0, $checkSubmit['message']);
			}
			$checkSubmit = $this->checkSubmitGlobal('exchange_key_' . $key);
			if (is_error($checkSubmit)) 
			{
				show_json(0, $checkSubmit['message']);
			}
			if ($groupResult['red_type'] == 1) 
			{
				$red = $groupResult['red'];
			}
			else 
			{
				$red = rand($groupResult['red_left'] * 100, $groupResult['red_right'] * 100) / 100;
			}
			$params = array('openid' => $_W['openid'], 'tid' => time(), 'send_name' => $groupResult['sendname'], 'money' => $red, 'wishing' => $groupResult['wishing'], 'act_name' => $groupResult['actname'], 'remark' => $groupResult['remark']);
			$result = m('common')->sendredpack($params);
			if (!(is_error($result))) 
			{
				pdo_update('ewei_shop_exchange_code', array('redstatus' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
				$info = m('member')->getInfo($_W['openid']);
				$record_exist = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_exchange_record') . ' WHERE `key`=:key AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], 'key' => $key));
				if (empty($record_exist)) 
				{
					$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'red' => $red, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
					pdo_insert('ewei_shop_exchange_record', $record);
				}
				else 
				{
					$record = array('red' => $red, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6);
					pdo_update('ewei_shop_exchange_record', $record, array('key' => $key, 'uniacid' => $_W['uniacid']));
				}
				if ((($codeResult['balancestatus'] == 2) || empty($groupResult['balance_type'])) && (($codeResult['scorestatus'] == 2) || empty($groupResult['score_type'])) && (($codeResult['couponstatus'] == 2) || empty($groupResult['coupon_type'])) && (($codeResult['goodsstatus'] == 2) || empty($groupResult['type']))) 
				{
					pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
					pdo_query('UPDATE ' . tablename('ewei_shop_exchange_group') . ' SET `use` = `use` + 1 WHERE uniacid = :uniacid AND `id` = :id', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
				}
				show_json(1, ''.$this->lang['lang_plugin_exchange_core_mobile_index_91'].'' . $red . ''.$this->lang['lang_plugin_exchange_core_mobile_index_92'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_93'].'' . $red . ''.$this->lang['lang_plugin_exchange_core_mobile_index_94'].'');
			}
			else 
			{
				show_json(0, $result['message']);
			}
		}
		else if ($exchange == '3') 
		{
			if ($codeResult['scorestatus'] == 2) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_95'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_96'].'');
			}
			if (($groupResult['score'] <= 0) && ($groupResult['score_left'] <= 0) && ($groupResult['score_right'] <= 0)) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_97'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_98'].'');
			}
			$checkSubmit = $this->checkSubmit('exchange_plugin');
			if (is_error($checkSubmit)) 
			{
				show_json(0, $checkSubmit['message']);
			}
			$checkSubmit = $this->checkSubmitGlobal('exchange_key_' . $key);
			if (is_error($checkSubmit)) 
			{
				show_json(0, $checkSubmit['message']);
			}
			$member = m('member')->getMember($_W['openid']);
			if ($groupResult['score_type'] == 1) 
			{
				$score = $groupResult['score'];
			}
			else 
			{
				$score = rand($groupResult['score_left'], $groupResult['score_right']);
			}
			$balance_res = $this->chongzhi('credit1', $member['id'], 0, $score, ''.$this->lang['lang_plugin_exchange_core_mobile_index_99'].':'.$this->lang['lang_plugin_exchange_core_mobile_index_100'].'');
			$balance_res = intval($balance_res);
			if ($balance_res === 1) 
			{
				pdo_update('ewei_shop_exchange_code', array('scorestatus' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
				$info = m('member')->getInfo($_W['openid']);
				$record_exist = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_exchange_record') . ' WHERE `key`=:key AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], 'key' => $key));
				if (empty($record_exist)) 
				{
					$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'score' => $score, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
					pdo_insert('ewei_shop_exchange_record', $record);
				}
				else 
				{
					$record = array('score' => $score, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6);
					pdo_update('ewei_shop_exchange_record', $record, array('key' => $key, 'uniacid' => $_W['uniacid']));
				}
				if ((($codeResult['balancestatus'] == 2) || empty($groupResult['balance_type'])) && (($codeResult['redstatus'] == 2) || empty($groupResult['red_type'])) && (($codeResult['couponstatus'] == 2) || empty($groupResult['coupon_type'])) && (($codeResult['goodsstatus'] == 2) || empty($groupResult['type']))) 
				{
					pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
					pdo_query('UPDATE ' . tablename('ewei_shop_exchange_group') . ' SET `use` = `use` + 1 WHERE uniacid = :uniacid AND `id` = :id', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
				}
				show_json(1, ''.$this->lang['lang_plugin_exchange_core_mobile_index_101'].'' . $score . ''.$this->lang['lang_plugin_exchange_core_mobile_index_102'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_103'].'' . $score . ''.$this->lang['lang_plugin_exchange_core_mobile_index_104'].'');
			}
			else 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_105'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_106'].'');
			}
		}
		else if ($exchange == '4') 
		{
			if ($codeResult['couponstatus'] == 2) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_107'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_108'].'');
			}
			if (empty($groupResult['coupon'])) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_109'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_110'].'');
			}
			$checkSubmit = $this->checkSubmit('exchange_plugin');
			if (is_error($checkSubmit)) 
			{
				show_json(0, $checkSubmit['message']);
			}
			$checkSubmit = $this->checkSubmitGlobal('exchange_key_' . $key);
			if (is_error($checkSubmit)) 
			{
				show_json(0, $checkSubmit['message']);
			}
			$coupon = json_decode($groupResult['coupon'], true);
			if (empty($coupon[0])) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_111'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_112'].'');
			}
			if ($groupResult['balance_type'] == 1) 
			{
				$condition = '(';
				foreach ($coupon as $k => $item ) 
				{
					$condition .= 'id = ' . $item . ' OR ';
				}
				$condition = substr($condition, 0, -4);
				$condition .= ')';
				$record_coupon = $groupResult['coupon'];
			}
			else 
			{
				$rand = array_rand($coupon, 1);
				$condition = 'id = ' . $coupon[$rand];
				$record_coupon = json_encode($coupon[$rand]);
			}
			$allCoupon = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_coupon') . ' WHERE ' . $condition . ' and uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));
			if (empty($allCoupon[0])) 
			{
				show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_113'].'');
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_114'].'');
			}
			$m = m('member')->getInfo($_W['openid']);
			$resp = array();
			$resp['resptitle'] = ''.$this->lang['lang_plugin_exchange_core_mobile_index_115'].'';
			$resp['respdesc'] = ''.$this->lang['lang_plugin_exchange_core_mobile_index_116'].','.$this->lang['lang_plugin_exchange_core_mobile_index_117'].'';
			$resp['respurl'] = mobileUrl('sale.coupon.my', array(), 1);
			$resp['respthumb'] = '';
			foreach ($allCoupon as $k => $v ) 
			{
				$data = array('uniacid' => $_W['uniacid'], 'merchid' => 0, 'openid' => $_W['openid'], 'couponid' => $v['id'], 'gettype' => 7, 'gettime' => time(), 'senduid' => $_W['uid']);
				pdo_insert('ewei_shop_coupon_data', $data);
			}
			$this->model->sendMessage($resp, 1, $m);
			pdo_update('ewei_shop_exchange_code', array('couponstatus' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
			$info = m('member')->getInfo($_W['openid']);
			$record_exist = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_exchange_record') . ' WHERE `key`=:key AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], 'key' => $key));
			if (empty($record_exist)) 
			{
				$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'coupon' => $record_coupon, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
				pdo_insert('ewei_shop_exchange_record', $record);
			}
			else 
			{
				$record = array('coupon' => $record_coupon, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 6);
				pdo_update('ewei_shop_exchange_record', $record, array('key' => $key, 'uniacid' => $_W['uniacid']));
			}
			if ((($codeResult['balancestatus'] == 2) || empty($groupResult['balance_type'])) && (($codeResult['scorestatus'] == 2) || empty($groupResult['score_type'])) && (($codeResult['redstatus'] == 2) || empty($groupResult['red_type'])) && (($codeResult['goodsstatus'] == 2) || empty($groupResult['type']))) 
			{
				pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid']));
				pdo_query('UPDATE ' . tablename('ewei_shop_exchange_group') . ' SET `use` = `use` + 1 WHERE uniacid = :uniacid AND `id` = :id', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
			}
			show_json(1, ''.$this->lang['lang_plugin_exchange_core_mobile_index_118'].'');
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_119'].'');
		}
		else if ($exchange == '5') 
		{
			if ($codeResult['goodsstatus'] == 2) 
			{
				if (!(empty($ajax))) 
				{
					show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_120'].'');
				}
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_121'].'');
			}
			if (empty($groupResult['goods'])) 
			{
				if (!(empty($ajax))) 
				{
					show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_122'].'');
				}
				$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_123'].'');
			}
			$goods_arr = json_decode($groupResult['goods'], true);
			if ($goods_arr['goods'] != false) 
			{
				foreach ($goods_arr['goods'] as $k => $v ) 
				{
					$goodsList[$k] = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $v, ':uniacid' => $_W['uniacid']));
				}
			}
			if ($goods_arr['option'] != false) 
			{
				foreach ($goods_arr['option'] as $k => $v ) 
				{
					$optionList[$k] = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $k, ':uniacid' => $_W['uniacid']));
					$optionstr = implode('-', $v);
					$optionList[$k]['optionstr'] = $optionstr;
				}
			}
			$banner = json_decode($groupResult['banner'], 1);
			if (!(empty($banner))) 
			{
				foreach ($banner as $k => $v ) 
				{
					$banner[$k] = urldecode($v);
					$banner[$k] = tomedia($banner[$k]);
				}
			}
			if (!(empty($ajax))) 
			{
				show_json(1, 'ok');
			}
			include $this->template('exchange/goods');
		}
		else 
		{
			include $this->template();
		}
	}
	private function chongzhi($type, $id, $changetype, $num, $remark, $balancetype = 0) 
	{
		global $_W;
		$profile = m('member')->getMember($id, true);
		$typestr = (($type == 'credit1' ? ''.$this->lang['lang_plugin_exchange_core_mobile_index_124'].'' : ''.$this->lang['lang_plugin_exchange_core_mobile_index_125'].''));
		if ($num <= 0) 
		{
			return 0;
		}
		if ($changetype == 2) 
		{
			$num -= $profile[$type];
		}
		else if ($changetype == 1) 
		{
			$num = -$num;
		}
		m('member')->setCredit($profile['openid'], $type, $num, array($_W['uid'], ''.$this->lang['lang_plugin_exchange_core_mobile_index_126'].'' . $typestr . ' ' . $remark));
		if ($type == 'credit1') 
		{
			$this->model->sendExchangeMessage($profile['openid'], $num);
		}
		if ($type == 'credit2') 
		{
			$set = m('common')->getSysset('shop');
			$logno = m('common')->createNO('member_log', 'logno', 'RC');
			$data = array('openid' => $profile['openid'], 'logno' => $logno, 'uniacid' => $_W['uniacid'], 'type' => '0', 'createtime' => TIMESTAMP, 'status' => '1', 'title' => $set['name'] . ''.$this->lang['lang_plugin_exchange_core_mobile_index_127'].'', 'money' => $num, 'remark' => $remark, 'rechargetype' => 'exchange');
			pdo_insert('ewei_shop_member_log', $data);
			$logid = pdo_insertid();
			$this->model->sendExchangeMessage($profile['openid'], $num, $balancetype);
		}
		return 1;
	}
	public function modal() 
	{
		global $_GPC;
		global $_W;
		$yx0 = trim($_GPC['yx']);
		$yx = substr($yx0, 1);
		if ($yx) 
		{
			$yx_arr = explode('_', $yx);
		}
		$id = intval($_GPC['goods']);
		$goods = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		$optionstr = trim($_GPC['option']);
		$optionid = explode('-', $optionstr);
		$count = 0;
		foreach ($optionid as $k => $v ) 
		{
			$option[$k] = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods_option') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $v, ':uniacid' => $_W['uniacid']));
		}
		include $this->template();
	}
	public function calculate() 
	{
		global $_GPC;
		global $_W;
		@session_start();
		pdo_delete('ewei_shop_exchange_cart', array('openid' => $_W['openid'], 'selected' => 1));
		$key = $_SESSION['exchange_key'];
		$exchange = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_code') . ' WHERE `key` = :key AND uniacid = :uniacid', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$group = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_group') . ' WHERE id = :id AND uniacid = :uniacid', array(':id' => $exchange['groupid'], ':uniacid' => $_W['uniacid']));
		if (($exchange == false) || ($group == false)) 
		{
			$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_128'].'');
		}
		$postage = 0;
		$goods_tmp = array();
		if (!(empty($_GPC['goods']))) 
		{
			$goods_tmp = array_filter($_GPC['goods']);
		}
		$goods = array();
		foreach ($goods_tmp as $gk => $gv ) 
		{
			$price = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods') . ' WHERE id = :id AND uniacid=:uniacid', array(':id' => $gv, ':uniacid' => $_W['uniacid']));
			pdo_insert('ewei_shop_exchange_cart', array('uniacid' => $_W['uniacid'], 'openid' => $_W['openid'], 'goodsid' => $price['id'], 'marketprice' => $price['marketprice'], 'optionid' => 0, 'merchid' => $price['merchid'], 'title' => $price['title'], 'groupid' => $exchange['groupid'], 'serial' => $exchange['serial']));
			if ($price == false) 
			{
				continue;
			}
			$value = array($gv, 0, $price['marketprice']);
			array_push($goods, $value);
			$postage += $price['exchange_postage'];
			unset($value);
		}
		$option_str = array_filter($_GPC['option']);
		foreach ($option_str as $k => $v ) 
		{
			$tmp = array_filter(explode('_', $v));
			foreach ($tmp as $k2 => $v2 ) 
			{
				$price = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_goods_option') . ' WHERE id = :id AND uniacid=:uniacid', array(':id' => $v2, ':uniacid' => $_W['uniacid']));
				pdo_insert('ewei_shop_exchange_cart', array('uniacid' => $_W['uniacid'], 'openid' => $_W['openid'], 'goodsid' => $price['goodsid'], 'marketprice' => $price['marketprice'], 'optionid' => $price['id'], 'merchid' => $price['merchid'], 'title' => $price['title'], 'groupid' => $exchange['groupid'], 'serial' => $exchange['serial']));
				$value = array($v2, 1, $price['marketprice']);
				array_push($goods, $value);
				$postage += $price['exchange_postage'];
				unset($value);
			}
		}
		$_SESSION['exchangegoods'] = json_encode($goods);
		unset($price);
		$must_goods = json_decode($group['goods'], 1);
		foreach ($goods as $k => $v ) 
		{
			if ($v[1] == 0) 
			{
				if (!(in_array($v[0], $must_goods['goods']))) 
				{
					$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_129'].'');
				}
			}
			else 
			{
				foreach ($must_goods['option'] as $k2 => $v2 ) 
				{
					if (!(in_array($v[0], $must_goods['option'][$k2]))) 
					{
						$erro = 1;
					}
					else 
					{
						$erro = 0;
						break;
					}
				}
				if ($erro == 1) 
				{
					$this->message(''.$this->lang['lang_plugin_exchange_core_mobile_index_130'].'');
				}
			}
		}
		uasort($goods, function($x, $y) 
		{
			return $x[2] - $y[2];
		}
		);
		$price = 0;
		$calprice = array();
		if ($group['type'] == 1) 
		{
			if (0 < $group['max']) 
			{
				$i = 0;
				while ($i < $group['max']) 
				{
					array_pop($goods);
					++$i;
				}
				foreach ($goods as $pk => $pv ) 
				{
					$price += $pv[2];
				}
				$calprice = $goods;
			}
		}
		else 
		{
			$count = 0;
			foreach ($goods as $pk => $pv ) 
			{
				$price += $pv[2];
				$chajia = $price - $group['value'];
				if ($price == $group['value']) 
				{
				}
				else if ($group['value'] < $price) 
				{
					$calprice[$count][0] = $goods[$pk][0];
					$calprice[$count][1] = $goods[$pk][1];
					if (empty($can)) 
					{
						$calprice[$count][2] = $chajia;
					}
					else 
					{
						$calprice[$count][2] = $goods[$pk][2];
					}
					$can = 1;
					++$count;
				}
			}
			$price = $price - $group['value'];
		}
		$_SESSION['exchangepriceset'] = $calprice;
		$price = round($price, 2);
		if (empty($group['postage_type'])) 
		{
			$_SESSION['exchangepostage'] = $group['postage'];
		}
		else 
		{
			$_SESSION['exchangepostage'] = $postage;
		}
		$_SESSION['exchangeserial'] = $exchange['serial'];
		$_SESSION['exchangetitle'] = $group['title'];
		$_SESSION['groupid'] = $group['id'];
		if (0 < $price) 
		{
			$_SESSION['exchangeprice'] = $price;
			header('Location:' . mobileUrl('order.create', array('exchange' => 1)));
		}
		else 
		{
			$_SESSION['exchangeprice'] = 0;
			header('Location:' . mobileUrl('order.create', array('exchange' => 1)));
		}
	}
	public function qr() 
	{
		global $_W;
		global $_GPC;
		$key = trim($_GPC['key']);
		$url = mobileUrl('exchange', array('key' => $key), 1);
		require IA_ROOT . '/framework/library/qrcode/phpqrcode.php';
		QRcode::png($url, false, QR_ECLEVEL_L, 10, 3);
		exit();
	}
	public function groupexchange() 
	{
		global $_GPC;
		global $_W;
		$key = trim($_GPC['key']);
		$code = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_code') . ' WHERE `key`=:key AND uniacid = :uniacid', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		if ($code == false) 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_131'].'');
		}
		$group = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_group') . ' WHERE id =:id AND uniacid = :uniacid', array(':id' => $code['groupid'], ':uniacid' => $_W['uniacid']));
		if ($group == false) 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_132'].'');
		}
		$arr['goods']['has'] = 0;
		$arr['balance']['has'] = 0;
		$arr['red']['has'] = 0;
		$arr['score']['has'] = 0;
		$arr['coupon']['has'] = 0;
		$arr['count'] = $code['count'];
		if (!(empty($group['type']))) 
		{
			$arr['goods']['has'] = 1;
			if (($group['type'] == 1) || ($group['type'] == 3)) 
			{
				if (($group['mode'] == 1) || ($group['mode'] == 6)) 
				{
					$arr['goods']['type'] = 1;
					$arr['goods']['max'] = $group['max'];
				}
				else if ($group['mode'] == 2) 
				{
					$arr['balance']['type'] = $group['type'];
					$arr['balance']['val'] = $group['balance'];
				}
				else if ($group['mode'] == 3) 
				{
					$arr['red']['type'] = 1;
					$arr['red']['val'] = $group['red'];
				}
				else if ($group['mode'] == 4) 
				{
					$arr['score']['type'] = 1;
					$arr['score']['val'] = $group['score'];
				}
				else if ($group['mode'] == 5) 
				{
					$arr['coupon']['type'] = 1;
				}
			}
			else if ($group['type'] == 2) 
			{
				if (($group['mode'] == 1) || ($group['mode'] == 6)) 
				{
					$arr['goods']['type'] = 2;
					$arr['goods']['val'] = $group['value'];
				}
				else if ($group['mode'] == 2) 
				{
					$arr['balance']['type'] = 2;
					$arr['balance']['rand'] = $group['balance_left'] . '-' . $group['balance_right'];
				}
				else if ($group['mode'] == 3) 
				{
					$arr['red']['type'] = 2;
					$arr['red']['rand'] = $group['red_left'] . '-' . $group['red_right'];
				}
				else if ($group['mode'] == 4) 
				{
					$arr['score']['type'] = 2;
					$arr['score']['rand'] = $group['score_left'] . '-' . $group['score_right'];
				}
				else if ($group['mode'] == 5) 
				{
					$arr['coupon']['type'] = 2;
				}
			}
			if ($code['goodsstatus'] != 2) 
			{
				$arr['goods']['sta'] = 1;
			}
			else 
			{
				$arr['goods']['sta'] = 0;
			}
		}
		else 
		{
			$arr['goods']['has'] = 0;
		}
		if (!(empty($group['balance_type']))) 
		{
			$arr['balance']['has'] = 1;
			if ($group['balance_type'] == 1) 
			{
				$arr['balance']['type'] = 1;
				$arr['balance']['val'] = $group['balance'];
			}
			else if ($group['balance_type'] == 2) 
			{
				$arr['balance']['type'] = 2;
				$arr['balance']['rand'] = $group['balance_left'] . '-' . $group['balance_right'];
			}
			if ($code['balancestatus'] != 2) 
			{
				$arr['balance']['sta'] = 1;
			}
			else 
			{
				$arr['balance']['sta'] = 0;
			}
		}
		else 
		{
			$arr['balance']['has'] = 0;
		}
		if (!(empty($group['score_type']))) 
		{
			$arr['score']['has'] = 1;
			if ($group['score_type'] == 1) 
			{
				$arr['score']['type'] = 1;
				$arr['score']['val'] = $group['score'];
			}
			else if ($group['score_type'] == 2) 
			{
				$arr['score']['type'] = 2;
				$arr['score']['rand'] = $group['score_left'] . '-' . $group['score_right'];
			}
			if ($code['scorestatus'] != 2) 
			{
				$arr['score']['sta'] = 1;
			}
			else 
			{
				$arr['score']['sta'] = 0;
			}
		}
		else 
		{
			$arr['score']['has'] = 0;
		}
		if (!(empty($group['red_type']))) 
		{
			$arr['red']['has'] = 1;
			if ($group['red_type'] == 1) 
			{
				$arr['red']['type'] = 1;
				$arr['red']['val'] = $group['red'];
			}
			else if ($group['red_type'] == 2) 
			{
				$arr['red']['type'] = 2;
				$arr['red']['rand'] = $group['red_left'] . '-' . $group['red_right'];
			}
			if ($code['redstatus'] != 2) 
			{
				$arr['red']['sta'] = 1;
			}
			else 
			{
				$arr['red']['sta'] = 0;
			}
		}
		else 
		{
			$arr['red']['has'] = 0;
		}
		if (!(empty($group['coupon_type']))) 
		{
			$arr['coupon']['has'] = 1;
			if ($group['coupon_type'] == 1) 
			{
				$arr['coupon']['type'] = 1;
				$arr['coupon']['val'] = $group['coupon'];
			}
			else if ($group['coupon_type'] == 2) 
			{
				$arr['coupon']['type'] = 2;
				$arr['coupon']['rand'] = $group['coupon_left'] . '-' . $group['coupon_right'];
			}
			if ($code['couponstatus'] != 2) 
			{
				$arr['coupon']['sta'] = 1;
			}
			else 
			{
				$arr['coupon']['sta'] = 0;
			}
		}
		else 
		{
			$arr['coupon']['has'] = 0;
		}
		show_json(1, $arr);
	}
	public function counterror($set) 
	{
		global $_W;
		if ($set == false) 
		{
			return;
		}
		$query = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_query') . ' WHERE openid = :openid AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':openid' => $_W['openid']));
		if (empty($query)) 
		{
			pdo_insert('ewei_shop_exchange_query', array('uniacid' => $_W['uniacid'], 'openid' => $_W['openid'], 'querytime' => time()));
		}
		if ($query['querytime'] < strtotime(date('Y-m-d', time()) . ' 00:00:00')) 
		{
			pdo_update('ewei_shop_exchange_query', array('errorcount' => 0, 'querytime' => time()));
		}
		if (time() < $query['unfreeze']) 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_133'].'' . ($query['unfreeze'] - time()) . ''.$this->lang['lang_plugin_exchange_core_mobile_index_134'].'');
		}
		if (!(empty($set['mistake'])) && ($set['mistake'] <= $query['errorcount'])) 
		{
			pdo_update('ewei_shop_exchange_query', array('unfreeze' => time() + ($set['freeze'] * 86400)), array('uniacid' => $_W['uniacid'], 'openid' => $_W['openid']));
			pdo_update('ewei_shop_exchange_query', array('errorcount' => 0, 'unfreeze' => time() + ($set['freeze'] * 86400)), array('uniacid' => $_W['uniacid'], 'openid' => $_W['openid']));
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_mobile_index_135'].',' . ($set['freeze'] * 86400) . ''.$this->lang['lang_plugin_exchange_core_mobile_index_136'].'');
		}
	}
}
?>