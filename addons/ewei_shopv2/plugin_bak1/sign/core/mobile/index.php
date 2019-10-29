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
		$set = $this->model->getSet();
		if (!(empty($set['sign_rule']))) 
		{
			$set['sign_rule'] = iunserializer($set['sign_rule']);
			$set['sign_rule'] = htmlspecialchars_decode($set['sign_rule']);
		}
		if (empty($set['isopen'])) 
		{
			$this->message($set['textsign'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_0'].'!', mobileUrl());
		}
		$month = $this->model->getMonth();
		$member = m('member')->getMember($_W['openid']);
		if (empty($member) || empty($_W['openid'])) 
		{
			$this->message(''.$this->lang['lang_plugin_sign_core_mobile_index_1'].'!', mobileUrl());
		}
		$calendar = $this->model->getCalendar();
		$signinfo = $this->model->getSign();
		$advaward = $this->model->getAdvAward();
		$json_arr = array('calendar' => $calendar, 'signinfo' => $signinfo, 'advaward' => $advaward, 'year' => date('Y', time()), 'month' => date('m', time()), 'today' => date('d', time()), 'signed' => $signinfo['signed'], 'signold' => $set['signold'], 'signoldprice' => $set['signold_price'], 'signoldtype' => (empty($set['signold_type']) ? $set['textmoney'] : $set['textcredit']), 'textsign' => $set['textsign'], 'textsigned' => $set['textsigned'], 'textsignold' => $set['textsignold'], 'textsignforget' => $set['textsignforget']);
		$json = json_encode($json_arr);
		$this->model->setShare($set);
		$texts = array('sign' => $set['textsign'], 'signed' => $set['textsigned'], 'signold' => $set['textsignold'], 'credit' => $set['textcredit'], 'color' => $set['maincolor']);
		include $this->template();
	}
	public function getCalendar() 
	{
		global $_W;
		global $_GPC;
		$date = trim($_GPC['date']);
		$date = explode('-', $date);
		$calendar = $this->model->getCalendar($date[0], $date[1]);
		include $this->template('sign/calendar');
	}
	public function getAdvAward() 
	{
		$set = $this->model->getSet();
		$advaward = $this->model->getAdvAward();
		include $this->template('sign/advaward');
	}
	public function dosign() 
	{
		global $_W;
		global $_GPC;
		if (!($_W['ispost']) || empty($_W['openid'])) 
		{
			show_json(0, ''.$this->lang['lang_plugin_sign_core_mobile_index_2'].'!');
		}
		$set = $this->model->getSet();
		if (empty($set['isopen'])) 
		{
			show_json(0, $set['textcredit'] . $set['textsign'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_3'].'!');
		}
		$date = trim($_GPC['date']);
		$date = (($date == 'null' ? '' : $date));
		$signinfo = $this->model->getSign($date);
		if (!(empty($date))) 
		{
			$datemonth = date('m', strtotime($date));
			$thismonth = date('m', time());
			if ($datemonth < $thismonth) 
			{
				show_json(0, $set['textsign'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_4'].'!');
			}
		}
		if (!(empty($signinfo['signed']))) 
		{
			show_json(2, ''.$this->lang['lang_plugin_sign_core_mobile_index_5'].'' . $set['textsign'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_6'].'' . $set['textsign'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_7'].'~');
		}
		if (!(empty($date)) && (time() < strtotime($date))) 
		{
			show_json(0, $set['textsign'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_8'].'!');
		}
		$member = m('member')->getMember($_W['openid']);
		$reword_special = iunserializer($set['reword_special']);
		$credit = 0;
		if (!(empty($set['reward_default_day'])) && (0 < $set['reward_default_day'])) 
		{
			$credit = $set['reward_default_day'];
			$message = ((empty($date) ? ''.$this->lang['lang_plugin_sign_core_mobile_index_9'].'' . $set['textsign'] . '+' : $set['textsignold'] . '+'));
			$message .= $set['reward_default_day'] . $set['textcredit'];
		}
		if (!(empty($set['reward_default_first'])) && (0 < $set['reward_default_first']) && empty($signinfo['sum']) && empty($date)) 
		{
			$credit = $set['reward_default_first'];
			$message = ''.$this->lang['lang_plugin_sign_core_mobile_index_10'].'' . $set['textsign'] . '+' . $set['reward_default_first'] . $set['textcredit'];
		}
		if (!(empty($reword_special)) && empty($date)) 
		{
			foreach ($reword_special as $item ) 
			{
				$day = date('Y-m-d', $item['date']);
				$today = date('Y-m-d', time());
				if (($day === $today) && !(empty($item['credit']))) 
				{
					$credit = $credit + $item['credit'];
					if (!(empty($message))) 
					{
						$message .= "\r\n";
					}
					$message .= ((empty($item['title']) ? $today : $item['title']));
					$message .= $set['textsign'] . '+' . $item['credit'] . $set['textcredit'];
					break;
				}
			}
		}
		if (!(empty($date)) && !(empty($set['signold'])) && (0 < $set['signold_price'])) 
		{
			if (empty($set['signold_type'])) 
			{
				if ($member['credit2'] < $set['signold_price']) 
				{
					show_json(0, $set['textsignold'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_11'].'! '.$this->lang['lang_plugin_sign_core_mobile_index_12'].'' . $set['textmoney'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_13'].', '.$this->lang['lang_plugin_sign_core_mobile_index_14'].'' . $set['textsignold']);
				}
				m('member')->setCredit($_W['openid'], 'credit2', -$set['signold_price'], $set['textcredit'] . $set['textsign'] . ': ' . $set['textsignold'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_15'].'' . $set['signold_price'] . $set['textmoney']);
			}
			else 
			{
				if ($member['credit1'] < $set['signold_price']) 
				{
					show_json(0, $set['textsignold'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_16'].'! '.$this->lang['lang_plugin_sign_core_mobile_index_17'].'' . $set['textcredit'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_18'].', '.$this->lang['lang_plugin_sign_core_mobile_index_19'].'' . $set['textsignold']);
				}
				m('member')->setCredit($_W['openid'], 'credit1', -$set['signold_price'], $set['textcredit'] . $set['textsign'] . ': ' . $set['textsignold'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_20'].'' . $set['signold_price'] . $set['textcredit']);
			}
		}
		if (!(empty($credit)) && (0 < $credit)) 
		{
			m('member')->setCredit($_W['openid'], 'credit1', +$credit, $set['textcredit'] . $set['textsign'] . ': ' . $message);
		}
		$arr = array('uniacid' => $_W['uniacid'], 'time' => (empty($date) ? time() : strtotime($date)), 'openid' => $_W['openid'], 'credit' => $credit, 'log' => $message);
		pdo_insert('ewei_shop_sign_records', $arr);
		$signinfo = $this->model->getSign();
		$member = m('member')->getMember($_W['openid']);
		$result = array('message' => $set['textsign'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_21'].'!' . $message, 'signorder' => $signinfo['orderday'], 'signsum' => $signinfo['sum'], 'addcredit' => $credit, 'credit' => intval($member['credit1']));
		$this->model->updateSign($signinfo);
		if (p('lottery')) 
		{
			$res = p('lottery')->getLottery($member['openid'], 2, array('day' => $signinfo['orderday']));
			if ($res) 
			{
				p('lottery')->getLotteryList($member['openid'], array('lottery_id' => $res));
			}
			$result['lottery'] = p('lottery')->check_isreward();
		}
		else 
		{
			$result['lottery']['is_changes'] = 0;
		}
		show_json(1, $result);
	}
	public function doreward() 
	{
		global $_W;
		global $_GPC;
		if (!($_W['ispost']) || empty($_W['openid'])) 
		{
			show_json(0, ''.$this->lang['lang_plugin_sign_core_mobile_index_22'].'!');
		}
		$type = intval($_GPC['type']);
		$day = intval($_GPC['day']);
		if (empty($type) || empty($day)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_sign_core_mobile_index_23'].'!');
		}
		$set = $this->model->getSet();
		if (empty($set['isopen'])) 
		{
			show_json(0, $set['textcredit'] . $set['textsign'] . ''.$this->lang['lang_plugin_sign_core_mobile_index_24'].'!');
		}
		$reword_sum = iunserializer($set['reword_sum']);
		$reword_order = iunserializer($set['reword_order']);
		$condition = '';
		if (!(empty($set['cycle']))) 
		{
			$month_start = mktime(0, 0, 0, date('m'), 1, date('Y'));
			$month_end = mktime(23, 59, 59, date('m'), date('t'), date('Y'));
			$condition .= ' and `time` between ' . $month_start . ' and ' . $month_end . ' ';
		}
		$record = pdo_fetch('select * from ' . tablename('ewei_shop_sign_records') . ' where openid=:openid and `type`=' . $type . ' and `day`=' . $day . ' and uniacid=:uniacid ' . $condition . ' limit 1 ', array(':uniacid' => $_W['uniacid'], ':openid' => $_W['openid']));
		if (!(empty($record))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_sign_core_mobile_index_25'].', '.$this->lang['lang_plugin_sign_core_mobile_index_26'].'!');
		}
		$credit = 0;
		if (($type == 1) && !(empty($reword_order))) 
		{
			foreach ($reword_order as $item ) 
			{
				if (($item['day'] == $day) && !(empty($item['credit']))) 
				{
					$credit = $item['credit'];
				}
			}
			$message = ''.$this->lang['lang_plugin_sign_core_mobile_index_27'].'' . $set['textsign'];
		}
		else if (($type == 2) && !(empty($reword_sum))) 
		{
			foreach ($reword_sum as $item ) 
			{
				if (($item['day'] == $day) && !(empty($item['credit']))) 
				{
					$credit = $item['credit'];
				}
			}
			$message = ''.$this->lang['lang_plugin_sign_core_mobile_index_28'].'' . $set['textsign'];
		}
		$message .= $day . ''.$this->lang['lang_plugin_sign_core_mobile_index_29'].'' . $credit . $set['textcredit'];
		if (!(empty($credit)) && (0 < $credit)) 
		{
			m('member')->setCredit($_W['openid'], 'credit1', +$credit, $set['textcredit'] . $set['textsign'] . ': ' . $message);
		}
		$arr = array('uniacid' => $_W['uniacid'], 'time' => time(), 'openid' => $_W['openid'], 'credit' => $credit, 'log' => $message, 'type' => $type, 'day' => $day);
		pdo_insert('ewei_shop_sign_records', $arr);
		$member = m('member')->getMember($_W['openid']);
		$result = array('message' => ''.$this->lang['lang_plugin_sign_core_mobile_index_30'].'!' . $message, 'addcredit' => $credit, 'credit' => intval($member['credit1']));
		show_json(1, $result);
	}
	public function records() 
	{
		global $_W;
		$set = $this->model->getSet();
		$texts = array('sign' => $set['textsign'], 'signed' => $set['textsigned'], 'signold' => $set['textsignold'], 'credit' => $set['textcredit'], 'color' => $set['maincolor']);
		include $this->template();
	}
	public function getRecords() 
	{
		global $_W;
		global $_GPC;
		$pindex = max(1, intval($_GPC['page']));
		$psize = 10;
		$condition = ' and openid=:openid and uniacid = :uniacid ';
		$params = array(':uniacid' => $_W['uniacid'], ':openid' => $_W['openid']);
		$sql = 'SELECT COUNT(*) FROM ' . tablename('ewei_shop_sign_records') . ' log where 1 ' . $condition;
		$total = pdo_fetchcolumn($sql, $params);
		$list = array();
		if (!(empty($total))) 
		{
			$sql = 'SELECT * FROM ' . tablename('ewei_shop_sign_records') . ' where 1 ' . $condition . ' ORDER BY `time` DESC LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize;
			$list = pdo_fetchall($sql, $params);
			if (!(empty($list))) 
			{
				foreach ($list as &$item ) 
				{
					$item['date'] = date('Y-m-d H:i:s', $item['time']);
				}
				unset($item);
			}
		}
		show_json(1, array('total' => $total, 'list' => $list, 'pagesize' => $psize));
	}
	public function rank() 
	{
		global $_W;
		global $_GPC;
		$set = $this->model->getSet();
		$texts = array('sign' => $set['textsign'], 'signed' => $set['textsigned'], 'signold' => $set['textsignold'], 'credit' => $set['textcredit'], 'color' => $set['maincolor']);
		include $this->template();
	}
	public function getRank() 
	{
		global $_W;
		global $_GPC;
		$type = trim($_GPC['type']);
		$set = $this->getSet();
		$total = 0;
		$list = array();
		$psize = 10;
		if (!(empty($type))) 
		{
			$pindex = max(1, intval($_GPC['page']));
			$condition = ' and su.uniacid=:uniacid and sm.uniacid=:uniacid ';
			$conditioncol = ' and uniacid=:uniacid ';
			if (!(empty($set['cycle']))) 
			{
				$condition .= ' and su.signdate="' . date('Y-m', time()) . '"';
				$conditioncol .= ' and signdate="' . date('Y-m', time()) . '"';
			}
			$params = array(':uniacid' => $_W['uniacid']);
			$sql = 'SELECT COUNT(*) FROM ' . tablename('ewei_shop_sign_user') . ' where 1 ' . $conditioncol;
			$total = pdo_fetchcolumn($sql, $params);
			$list = array();
			if (!(empty($total))) 
			{
				$type = 'su.' . $type;
				$sql = 'SELECT su.*, sm.nickname, sm.avatar FROM ' . tablename('ewei_shop_sign_user') . ' su left join ' . tablename('ewei_shop_member') . ' sm on sm.openid=su.openid where 1 ' . $condition . ' ORDER BY ' . $type . ' DESC LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize;
				$list = pdo_fetchall($sql, $params);
				if (!(empty($list))) 
				{
					foreach ($list as &$item ) 
					{
						$item['type'] = str_replace('su.', '', $type);
					}
					unset($item);
				}
			}
		}
		show_json(1, array('total' => $total, 'list' => $list, 'pagesize' => $psize));
	}
}
?>