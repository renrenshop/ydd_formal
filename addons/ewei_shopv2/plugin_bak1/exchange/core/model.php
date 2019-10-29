<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class ExchangeModel extends PluginModel 
{
	public function getSet() 
	{
		return parent::getSet();
	}
	public function sendMessage($coupon, $send_total, $member, $account = NULL) 
	{
		global $_W;
		$articles = array();
		$title = str_replace('[nickname]', $member['nickname'], $coupon['resptitle']);
		$desc = str_replace('[nickname]', $member['nickname'], $coupon['respdesc']);
		$title = str_replace('[total]', $send_total, $title);
		$desc = str_replace('[total]', $send_total, $desc);
		$url = ((empty($coupon['respurl']) ? mobileUrl('sale/coupon/my', NULL, true) : $coupon['respurl']));
		if (!(empty($coupon['resptitle']))) 
		{
			$articles[] = array('title' => urlencode($title), 'description' => urlencode($desc), 'url' => $url, 'picurl' => tomedia($coupon['respthumb']));
		}
		if (!(empty($articles))) 
		{
			$resp = m('message')->sendNews($member['openid'], $articles, $account);
			if (is_error($resp)) 
			{
				$msg = array( 'keyword1' => array('value' => $title, 'color' => '#73a68d'), 'keyword2' => array('value' => $desc, 'color' => '#73a68d') );
				$ret = m('message')->sendCustomNotice($member['openid'], $msg, $url, $account);
				if (is_error($ret)) 
				{
					return m('message')->sendCustomNotice($member['openid'], $msg, $url, $account);
				}
			}
		}
	}
	public function sendExchangeMessage($openid, $num, $type = 0) 
	{
		global $_W;
		global $_GPC;
		$time = date('Y-m-d H:i', time());
		$url = mobileUrl('member', NULL, 1);
		$member = m('member')->getMember($openid);
		$datas[] = array('name' => ''.$this->lang['lang_plugin_exchange_core_model_0'].'', 'value' => $time);
		$datas[] = array('name' => ''.$this->lang['lang_plugin_exchange_core_model_1'].'', 'value' => $num);
		$datas[] = array('name' => ''.$this->lang['lang_plugin_exchange_core_model_2'].'', 'value' => $member['nickname']);
		$datas[] = array('name' => ''.$this->lang['lang_plugin_exchange_core_model_3'].'', 'value' => $_W['shopset']['shop']['name']);
		if ($type == 0) 
		{
			$credittext = ((empty($_W['shopset']['trade']['credittext']) ? ''.$this->lang['lang_plugin_exchange_core_model_4'].'' : $_W['shopset']['trade']['credittext']));
			$tag = 'exchange_score';
			$remark = "\n" . ''.$this->lang['lang_plugin_exchange_core_model_5'].' <a href=\'' . $url . '\'>'.$this->lang['lang_plugin_exchange_core_model_6'].'</a>';
			$text = ''.$this->lang['lang_plugin_exchange_core_model_7'].'' . $credittext . ''.$this->lang['lang_plugin_exchange_core_model_8'].'' . "\n\n" . $credittext . ''.$this->lang['lang_plugin_exchange_core_model_9'].'' . $num . ''.$this->lang['lang_plugin_exchange_core_model_10'].'' . "\n" . ''.$this->lang['lang_plugin_exchange_core_model_11'].'' . $time . "\n" . ''.$this->lang['lang_plugin_exchange_core_model_12'].'' . "\n" . $credittext . ''.$this->lang['lang_plugin_exchange_core_model_13'].'' . (int) $member['credit1'] . $credittext . ' ' . "\n" . $remark;
			$message = array( 'first' => array('value' => ''.$this->lang['lang_plugin_exchange_core_model_14'].'' . $member['nickname'] . ''.$this->lang['lang_plugin_exchange_core_model_15'].'' . $credittext . ''.$this->lang['lang_plugin_exchange_core_model_16'].':', 'color' => '#ff0000'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_exchange_core_model_17'].'', 'value' => $time, 'color' => '#000000'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_exchange_core_model_18'].'', 'value' => $num . $credittext, 'color' => '#000000'), 'keyword3' => array('title' => ''.$this->lang['lang_plugin_exchange_core_model_19'].'', 'value' => $credittext . ''.$this->lang['lang_plugin_exchange_core_model_20'].'', 'color' => '#000000'), 'keyword4' => array('title' => ''.$this->lang['lang_plugin_exchange_core_model_21'].'' . $credittext, 'value' => (double) $member['credit1'] . $credittext, 'color' => '#ff0000'), 'remark' => array('value' => "\n" . $_W['shopset']['shop']['name'] . ''.$this->lang['lang_plugin_exchange_core_model_22'].'', 'color' => '#000000') );
		}
		else if ($type == 1) 
		{
			$tag = 'exchange_balance';
			$remark = "\n" . ''.$this->lang['lang_plugin_exchange_core_model_23'].' <a href=\'' . $url . '\'>'.$this->lang['lang_plugin_exchange_core_model_24'].'</a>';
			$text = ''.$this->lang['lang_plugin_exchange_core_model_25'].'' . "\n\n" . ''.$this->lang['lang_plugin_exchange_core_model_26'].'' . $num . ''.$this->lang['lang_plugin_exchange_core_model_27'].'' . "\n" . ''.$this->lang['lang_plugin_exchange_core_model_28'].'' . $time . "\n" . ''.$this->lang['lang_plugin_exchange_core_model_29'].'' . "\n" . ''.$this->lang['lang_plugin_exchange_core_model_30'].'' . (int) $member['credit2'] . ''.$this->lang['lang_plugin_exchange_core_model_31'].' ' . "\n" . $remark;
			$message = array( 'first' => array('value' => ''.$this->lang['lang_plugin_exchange_core_model_32'].'' . $member['nickname'] . ''.$this->lang['lang_plugin_exchange_core_model_33'].':', 'color' => '#ff0000'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_exchange_core_model_34'].'', 'value' => $num . ''.$this->lang['lang_plugin_exchange_core_model_35'].'', 'color' => '#000000'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_exchange_core_model_36'].'', 'value' => $time, 'color' => '#000000'), 'keyword3' => array('title' => ''.$this->lang['lang_plugin_exchange_core_model_37'].'', 'value' => (double) $member['credit2'] . ''.$this->lang['lang_plugin_exchange_core_model_38'].'', 'color' => '#ff0000'), 'remark' => array('value' => ''.$this->lang['lang_plugin_exchange_core_model_39'].'' . "\n\n" . $_W['shopset']['shop']['name'] . ''.$this->lang['lang_plugin_exchange_core_model_40'].'', 'color' => '#000000') );
		}
		else 
		{
			$tag = 'exchange_recharge';
			$remark = "\n" . ''.$this->lang['lang_plugin_exchange_core_model_41'].' <a href=\'' . $url . '\'>'.$this->lang['lang_plugin_exchange_core_model_42'].'</a>';
			$text = ''.$this->lang['lang_plugin_exchange_core_model_43'].'' . "\n\n" . ''.$this->lang['lang_plugin_exchange_core_model_44'].'' . $num . ''.$this->lang['lang_plugin_exchange_core_model_45'].'' . "\n" . ''.$this->lang['lang_plugin_exchange_core_model_46'].'' . $time . "\n" . ''.$this->lang['lang_plugin_exchange_core_model_47'].'' . "\n" . ''.$this->lang['lang_plugin_exchange_core_model_48'].'' . (int) $member['credit2'] . ''.$this->lang['lang_plugin_exchange_core_model_49'].' ' . "\n" . $remark;
			$message = array( 'first' => array('value' => ''.$this->lang['lang_plugin_exchange_core_model_50'].'' . $member['nickname'] . ''.$this->lang['lang_plugin_exchange_core_model_51'].':', 'color' => '#ff0000'), 'keyword1' => array('title' => ''.$this->lang['lang_plugin_exchange_core_model_52'].'', 'value' => $num . ''.$this->lang['lang_plugin_exchange_core_model_53'].'', 'color' => '#000000'), 'keyword2' => array('title' => ''.$this->lang['lang_plugin_exchange_core_model_54'].'', 'value' => $time, 'color' => '#000000'), 'keyword4' => array('title' => ''.$this->lang['lang_plugin_exchange_core_model_55'].'', 'value' => (double) $member['credit2'] . ''.$this->lang['lang_plugin_exchange_core_model_56'].'', 'color' => '#ff0000'), 'remark' => array('value' => ''.$this->lang['lang_plugin_exchange_core_model_57'].'' . "\n\n" . $_W['shopset']['shop']['name'] . ''.$this->lang['lang_plugin_exchange_core_model_58'].'', 'color' => '#000000') );
		}
		m('notice')->sendNotice(array('openid' => $openid, 'tag' => $tag, 'default' => $message, 'cusdefault' => $text, 'url' => $url, 'datas' => $datas));
	}
	public function sendRedpacket($key) 
	{
		global $_W;
		$is_exchange = $this->is_exchange($key);
		if ($is_exchange[0] === '0') 
		{
			m('message')->sendCustomNotice($_W['openid'], $is_exchange[1]);
			return false;
		}
		if ($is_exchange[1] != 'redpacket') 
		{
			return false;
		}
		if (empty($is_exchange)) 
		{
			return false;
		}
		$checkSubmit = $this->checkSubmit('exchange_key_' . $key);
		if (is_error($checkSubmit)) 
		{
			m('message')->sendCustomNotice($_W['openid'], $checkSubmit['message']);
			return false;
		}
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT *FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key`=:key ', array(':key' => $key, ':uniacid' => $_W['uniacid']));
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
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
			pdo_update('ewei_shop_exchange_code', array('status' => 2), array('key' => $key, 'uniacid' => $_W['uniacid'], 'status' => 1));
			$info = m('member')->getInfo($_W['openid']);
			$record = array('key' => $key, 'uniacid' => $_W['uniacid'], 'red' => $red, 'time' => time(), 'openid' => $_W['openid'], 'nickname' => $info['nickname'], 'mode' => 3, 'title' => $groupResult['title'], 'groupid' => $groupResult['id'], 'serial' => $codeResult['serial']);
			pdo_insert('ewei_shop_exchange_record', $record);
			pdo_query('UPDATE ' . $table1 . ' SET `use` = `use` + 1 WHERE id = :id AND uniacid = :uniacid', array(':id' => $groupResult['id'], ':uniacid' => $_W['uniacid']));
			m('message')->sendCustomNotice($_W['openid'], ''.$this->lang['lang_plugin_exchange_core_model_59'].'' . $red . ''.$this->lang['lang_plugin_exchange_core_model_60'].'');
			return true;
		}
		m('message')->sendCustomNotice($_W['openid'], $result['message']);
		return false;
	}
	private function is_exchange($key) 
	{
		global $_W;
		$set = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_setting') . ' WHERE uniacid = :uniacid', array(':uniacid' => $_W['uniacid']));
		$counterror = $this->counterror($set);
		logg('1.txt', json_encode($counterror));
		if (is_error($counterror)) 
		{
			m('message')->sendCustomNotice($_W['openid'], $counterror['message']);
			return false;
		}
		$time = strtotime('now');
		$time = date('Y-m-d');
		$time1 = $time . ' 00:00:00';
		$time2 = $time . ' 23:59:59';
		$time1 = strtotime($time1);
		$time2 = strtotime($time2);
		if (empty($_W['openid'])) 
		{
			return false;
		}
		if (!(empty($set['alllimit']))) 
		{
			$exchangelimit = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_exchange_record') . ' WHERE openid =:openid AND uniacid = :uniacid AND `time` > :timea AND `time` <= :timeb', array(':uniacid' => $_W['uniacid'], ':openid' => $_W['openid'], ':timea' => $time1, ':timeb' => $time2));
			if ($set['alllimit'] <= intval($exchangelimit)) 
			{
				m('message')->sendCustomNotice($_W['openid'], ''.$this->lang['lang_plugin_exchange_core_model_61'].'');
				return false;
			}
		}
		if (!(empty($set['grouplimit']))) 
		{
			$exchangelimit2 = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_exchange_record') . ' WHERE openid =:openid AND uniacid = :uniacid AND `time` > :timea AND `time` <= :timeb AND groupid = :groupid', array(':uniacid' => $_W['uniacid'], ':openid' => $_W['openid'], ':timea' => $time1, ':timeb' => $time2, ':groupid' => $_SESSION['exchangeGroupId']));
			if ($set['grouplimit'] <= intval($exchangelimit2)) 
			{
				m('message')->sendCustomNotice($_W['openid'], ''.$this->lang['lang_plugin_exchange_core_model_62'].'');
				return false;
			}
		}
		$return = array();
		$table1 = tablename('ewei_shop_exchange_group');
		$table2 = tablename('ewei_shop_exchange_code');
		$codeResult = pdo_fetch('SELECT * FROM ' . $table2 . ' WHERE uniacid = :uniacid AND `key` = :key', array(':uniacid' => $_W['uniacid'], ':key' => $key));
		if ($codeResult === false) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_model_63'].'');
			pdo_query('UPDATE ' . tablename('ewei_shop_exchange_query') . ' SET `errorcount` = `errorcount` + 1 WHERE openid = :openid', array(':openid' => $_W['openid']));
			return $return;
		}
		pdo_query('UPDATE ' . tablename('ewei_shop_exchange_query') . ' SET `errorcount` = 0 AND `unfreeze`=0 WHERE openid = :openid', array(':openid' => $_W['openid']));
		if ($codeResult['status'] == 2) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_model_64'].'');
			return $return;
		}
		if (strtotime($codeResult['endtime']) <= time()) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_model_65'].'');
			return $return;
		}
		$groupResult = pdo_fetch('SELECT * FROM ' . $table1 . ' WHERE id = :id AND uniacid = :uniacid', array(':uniacid' => $_W['uniacid'], ':id' => $codeResult['groupid']));
		if (!(empty($codeResult['openid'])) && ($codeResult['openid'] != $_W['openid']) && !(empty($groupResult['binding']))) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_model_66'].'');
			return $return;
		}
		pdo_query('UPDATE ' . tablename('ewei_shop_exchange_code') . ' SET openid = :openid , `count` = `count` + 1 WHERE openid != :openid AND uniacid = :uniacid AND `key`=:key', array(':openid' => $_W['openid'], ':uniacid' => $_W['uniacid'], ':key' => $key));
		if ($groupResult === false) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_model_67'].'');
			return $return;
		}
		if (strtotime($groupResult['endtime']) <= time()) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_model_68'].'');
			return $return;
		}
		if ($groupResult['status'] == 0) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_model_69'].'');
			return $return;
		}
		if (time() < strtotime($groupResult['starttime'])) 
		{
			$return = array('0', ''.$this->lang['lang_plugin_exchange_core_model_70'].'');
			return $return;
		}
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
	public function checkSubmit($key, $time = 3, $message = '')
	{
	    if(!$message){
            $message = ''.$this->lang['lang_plugin_exchange_core_model_71'].'!';
        }

		global $_W;
		$open_redis = function_exists('redis') && !(is_error(redis()));
		if ($open_redis) 
		{
			$redis_key = $_W['setting']['site']['key'] . '_' . $_W['account']['key'] . '_' . $_W['uniacid'] . '_' . $_W['openid'] . '_mobilesubmit_' . $key;
			$redis = redis();
			if ($redis->setnx($redis_key, time())) 
			{
				$redis->expireAt($redis_key, time() + $time);
			}
			else 
			{
				return error(-1, $message);
			}
		}
		return true;
	}
	public function counterror($set) 
	{
		global $_W;
		if ($set == false) 
		{
			return true;
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
			return error(-1, ''.$this->lang['lang_plugin_exchange_core_model_72'].'' . ($query['unfreeze'] - time()) . ''.$this->lang['lang_plugin_exchange_core_model_73'].'');
		}
		if (!(empty($set['mistake'])) && ($set['mistake'] <= $query['errorcount'])) 
		{
			pdo_update('ewei_shop_exchange_query', array('unfreeze' => time() + ($set['freeze'] * 86400)), array('uniacid' => $_W['uniacid'], 'openid' => $_W['openid']));
			pdo_update('ewei_shop_exchange_query', array('errorcount' => 0, 'unfreeze' => time() + ($set['freeze'] * 86400)), array('uniacid' => $_W['uniacid'], 'openid' => $_W['openid']));
			return error(-1, ''.$this->lang['lang_plugin_exchange_core_model_74'].',' . ($set['freeze'] * 86400) . ''.$this->lang['lang_plugin_exchange_core_model_75'].'');
		}
	}
	public function createRule($koulingstart, $status, $id) 
	{
		global $_W;
		$rule = pdo_fetch('select * from ' . tablename('rule') . ' where uniacid=:uniacid and module=:module and name=:name limit 1', array(':uniacid' => $_W['uniacid'], ':module' => 'ewei_shopv2', ':name' => 'ewei_shopv2:exchange:' . $id));
		$keyword = m('common')->keyExist($koulingstart);
		if (!(empty($keyword)) && ($keyword['name'] != 'ewei_shopv2:exchange:' . $id)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_model_76'].'!');
		}
		else if (!(empty($rule))) 
		{
			return pdo_update('rule_keyword', array('content' => $koulingstart, 'status' => $status), array('rid' => $rule['id'], 'uniacid' => $_W['uniacid']));
		}
		else 
		{
			$rule_data = array('uniacid' => $_W['uniacid'], 'name' => 'ewei_shopv2:exchange:' . $id, 'module' => 'ewei_shopv2', 'displayorder' => 0, 'status' => $status);
			pdo_insert('rule', $rule_data);
			$rid = pdo_insertid();
			$keyword_data = array('uniacid' => $_W['uniacid'], 'rid' => $rid, 'module' => 'ewei_shopv2', 'content' => $koulingstart, 'type' => 1, 'displayorder' => 0, 'status' => $status);
			pdo_insert('rule_keyword', $keyword_data);
			return pdo_insertid();
		}
	}
	public function redKeyword($key) 
	{
		global $_W;
		if (empty($key)) 
		{
			return false;
		}
		$key = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_exchange_group') . ' WHERE uniacid = :uniacid AND koulingstart = :koulingstart AND kouling = 1', array(':koulingstart' => $key, ':uniacid' => $_W['uniacid']));
		if (empty($key)) 
		{
			return false;
		}
		return $key;
	}
	public function setRepeatCount($key) 
	{
		global $_W;
		$sql = 'UPDATE ' . tablename('ewei_shop_exchange_code') . ' SET repeatcount = repeatcount - 1 WHERE repeatcount >1 AND uniacid = :uniacid AND `key` = :key';
		return pdo_query($sql, array(':uniacid' => $_W['uniacid'], ':key' => $key));
	}
	public function checkRepeatExchange($key) 
	{
		global $_W;
		$logsql = 'SELECT COUNT(*) FROM ' . tablename('ewei_shop_exchange_record') . ' WHERE `key` = :code AND uniacid = :uniacid AND openid = :openid';
		if (pdo_fetchcolumn($logsql, array(':code' => $key, ':uniacid' => $_W['uniacid'], ':openid' => $_W['openid']))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_exchange_core_model_77'].'');
		}
	}
}
?>