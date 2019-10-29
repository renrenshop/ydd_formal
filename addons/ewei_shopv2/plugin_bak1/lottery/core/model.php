<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class LotteryModel extends PluginModel 
{
	public function getGoods($param = '') 
	{
		if (empty($param)) 
		{
			return false;
		}
		if (!(isset($param['log_id'])) || empty($param['log_id'])) 
		{
			return false;
		}
		$param['log_id'] = intval($param['log_id']);
		$log = pdo_fetch('select * from ' . tablename('ewei_shop_lottery_log') . ' where log_id=:log_id and join_user=:join_user and is_reward=1', array(':log_id' => $param['log_id'], ':join_user' => $param['openid']));
		if (empty($log)) 
		{
			return false;
		}
		$lottery_data = unserialize($log['lottery_data']);
		$goods_info = $lottery_data['goods'][$param['goods_id']];
		if (isset($param['goods_num']) && !(empty($param['goods_num']))) 
		{
			$goods_num = intval($param['goods_num']);
			if ($goods_num == 0) 
			{
				return true;
			}
			if (!(empty($goods_info['spec']))) 
			{
				if ($goods_info['spec'][$param['goods_spec']]['total'] < $goods_num) 
				{
					return false;
				}
				$lottery_data['goods'][$param['goods_id']]['spec'][$param['goods_spec']]['total'] -= $goods_num;
				pdo_update('ewei_shop_lottery_log', array('lottery_data' => serialize($lottery_data)), array('log_id' => $param['log_id']));
				return true;
			}
			if ($goods_info['total'] < $goods_num) 
			{
				return false;
			}
			$lottery_data['goods'][$param['goods_id']]['total'] -= $goods_num;
			pdo_update('ewei_shop_lottery_log', array('lottery_data' => serialize($lottery_data)), array('log_id' => $param['log_id']));
			return true;
		}
		$lottery = pdo_fetch('select lottery_days,is_goods from ' . tablename('ewei_shop_lottery') . ' where lottery_id=:lottery_id', array(':lottery_id' => $log['lottery_id']));
		$date = $lottery['lottery_days'] + $log['addtime'];
		if ((time() < $date) || empty($data)) 
		{
			$goods_info['is_goods'] = $lottery['is_goods'];
			return $goods_info;
		}
		message(''.$this->lang['lang_plugin_lottery_core_model_0'].'', '', 'warning');
		return false;
	}
	public function getLottery($openid, $type, $data) 
	{
		global $_W;
		$lotterylist = pdo_fetchall('SELECT * FROM ' . tablename('ewei_shop_lottery') . ' WHERE uniacid=' . $_W['uniacid'] . ' AND start_time<' . time() . ' AND  end_time>' . time() . ' AND is_delete=0 AND task_type=' . $type . ' ORDER BY addtime DESC');
		if (!(empty($lotterylist))) 
		{
			if ($type == 1) 
			{
				$join_info = array('money' => 0, 'num' => 0, 'lottery_id' => 0);
				foreach ($lotterylist as $key => $value ) 
				{
					$value['task_data'] = unserialize($value['task_data']);
					if (($value['task_data']['pay_type'] == 0) || ($data['paytype'] == $value['task_data']['pay_type'])) 
					{
						if ($value['task_data']['pay_money'] <= $data['money']) 
						{
							if ($join_info['money'] < $value['task_data']['pay_money']) 
							{
								$join_info['money'] = $value['task_data']['pay_money'];
								$join_info['num'] = $value['task_data']['pay_num'];
								$join_info['lottery_id'] = $value['lottery_id'];
							}
						}
					}
				}
				if (!(empty($join_info['lottery_id']))) 
				{
					$i = 1;
					while ($i <= $join_info['num']) 
					{
						$join_data = array('uniacid' => $_W['uniacid'], 'join_user' => $openid, 'lottery_id' => $join_info['lottery_id'], 'lottery_num' => 1, 'lottery_tag' => ''.$this->lang['lang_plugin_lottery_core_model_1'].'' . $join_info['money'] . ''.$this->lang['lang_plugin_lottery_core_model_2'].','.$this->lang['lang_plugin_lottery_core_model_3'].'' . $join_info['num'] . ''.$this->lang['lang_plugin_lottery_core_model_4'].'', 'addtime' => time());
						pdo_insert('ewei_shop_lottery_join', $join_data);
						++$i;
					}
					return $join_info['lottery_id'];
				}
				return false;
			}
			if ($type == 2) 
			{
				$is_reward = false;
				foreach ($lotterylist as $key => $value ) 
				{
					$value['task_data'] = unserialize($value['task_data']);
					if (($value['task_data']['sign_day'] == 1) || (($value['task_data']['sign_day'] <= $data['day']) && (($data['day'] % $value['task_data']['sign_day']) == 0))) 
					{
						if (0 < $value['task_data']['sign_num']) 
						{
							$i = 1;
							while ($i <= $value['task_data']['sign_num']) 
							{
								$join_data = array('uniacid' => $_W['uniacid'], 'join_user' => $openid, 'lottery_id' => $value['lottery_id'], 'lottery_num' => 1, 'lottery_tag' => ''.$this->lang['lang_plugin_lottery_core_model_5'].'' . $value['task_data']['sign_day'] . ''.$this->lang['lang_plugin_lottery_core_model_6'].','.$this->lang['lang_plugin_lottery_core_model_7'].'' . $value['task_data']['sign_num'] . ''.$this->lang['lang_plugin_lottery_core_model_8'].'', 'addtime' => time());
								pdo_insert('ewei_shop_lottery_join', $join_data);
								++$i;
							}
							$is_reward = $value['lottery_id'];
						}
					}
				}
				return $is_reward;
			}
			if ($type == 3) 
			{
				$is_reward = false;
				foreach ($lotterylist as $key => $value ) 
				{
					$value['task_data'] = unserialize($value['task_data']);
					if (($data['taskid'] == $value['task_data']['poster_id']) || ($value['task_data']['poster_id'] == 0)) 
					{
						if (0 < $value['task_data']['poster_num']) 
						{
							$i = 1;
							while ($i <= $value['task_data']['poster_num']) 
							{
								$join_data = array('uniacid' => $_W['uniacid'], 'join_user' => $openid, 'lottery_id' => $value['lottery_id'], 'lottery_num' => 1, 'lottery_tag' => ''.$this->lang['lang_plugin_lottery_core_model_9'].','.$this->lang['lang_plugin_lottery_core_model_10'].'' . $value['task_data']['poster_num'] . ''.$this->lang['lang_plugin_lottery_core_model_11'].'', 'addtime' => time());
								pdo_insert('ewei_shop_lottery_join', $join_data);
								++$i;
							}
							$is_reward = $value['lottery_id'];
						}
					}
				}
				return $is_reward;
			}
			if ($type == 4) 
			{
				$is_reward = false;
				foreach ($lotterylist as $key => $value ) 
				{
					$value['task_data'] = unserialize($value['task_data']);
					if ($data['taskid'] == $value['task_data']['poster_id']) 
					{
						if (0 < $value['task_data']['poster_num']) 
						{
							$i = 1;
							while ($i <= $value['task_data']['poster_num']) 
							{
								$join_data = array('uniacid' => $_W['uniacid'], 'join_user' => $openid, 'lottery_id' => $value['lottery_id'], 'lottery_num' => 1, 'lottery_tag' => ''.$this->lang['lang_plugin_lottery_core_model_12'].','.$this->lang['lang_plugin_lottery_core_model_13'].'' . $value['task_data']['poster_num'] . ''.$this->lang['lang_plugin_lottery_core_model_14'].'', 'addtime' => time());
								pdo_insert('ewei_shop_lottery_join', $join_data);
								++$i;
							}
							$is_reward = $value['lottery_id'];
						}
					}
				}
				return $is_reward;
			}
		}
	}
	public function getLotteryList($openid, $param = array()) 
	{
		global $_W;
		if (empty($openid)) 
		{
			return false;
		}
		$lottery_list = pdo_fetch('select j.*,l.lottery_title from ' . tablename('ewei_shop_lottery_join') . ' as j left join ' . tablename('ewei_shop_lottery') . ' as l on j.lottery_id=l.lottery_id where j.lottery_num>0 and j.uniacid=:uniacid and j.join_user=:join_user and j.lottery_id=:lottery_id and l.is_delete=0', array(':uniacid' => $_W['uniacid'], ':join_user' => $openid, ':lottery_id' => intval($param['lottery_id'])));
		if (!(empty($lottery_list))) 
		{
			$datas = array( array('name' => ''.$this->lang['lang_plugin_lottery_core_model_15'].'', 'value' => $lottery_list['title']) );
			$url = $_W['siteroot'] . 'app/index.php?i=' . $_W['uniacid'] . '&c=entry&m=ewei_shopv2&do=mobile&r=lottery.index.lottery_info&id=' . $param['lottery_id'];
			$url = str_replace('addons/ewei_shopv2/', '', $url);
			$remark = "\n" . '<a href=\'' . $url . '\'>'.$this->lang['lang_plugin_lottery_core_model_16'].'</a>';
			$text = ''.$this->lang['lang_plugin_lottery_core_model_17'].' ' . "\n" . $remark;
			$message = array( 'first' => array('value' => ''.$this->lang['lang_plugin_lottery_core_model_18'].'', 'color' => '#000000'), 'keyword1' => array('value' => $lottery_list['title'], 'color' => '#000000'), 'keyword2' => array('value' => ''.$this->lang['lang_plugin_lottery_core_model_19'].'', 'color' => '#000000'), 'remark' => array('value' => ''.$this->lang['lang_plugin_lottery_core_model_20'].'', 'color' => '#000000') );
			m('notice')->sendNotice(array('openid' => $openid, 'tag' => 'lottery_get', 'default' => $message, 'cusdefault' => $text, 'url' => $url, 'datas' => $datas));
		}
	}
	public function reward($poster, $openid, $title, $lottery_id) 
	{
		if (empty($poster) || empty($openid)) 
		{
			return false;
		}
		global $_W;
		if (isset($poster['credit']) && (0 < $poster['credit'])) 
		{
			m('member')->setCredit($openid, 'credit1', $poster['credit'], array(0, ''.$this->lang['lang_plugin_lottery_core_model_21'].'+' . $poster['credit']));
		}
		if (isset($poster['money']) && (0 < $poster['money']['num'])) 
		{
			$pay = $poster['money']['num'];
			if ($poster['money']['type'] == 1) 
			{
				$pay *= 100;
			}
			m('finance')->pay($openid, $poster['money']['type'], $pay, '', ''.$this->lang['lang_plugin_lottery_core_model_22'].'', false);
		}
		if (isset($poster['bribery']) && (0 < $poster['bribery'])) 
		{
			$tid = rand(1, 1000) . time() . rand(1, 10000);
			$params = array('openid' => $openid, 'tid' => $tid, 'send_name' => ''.$this->lang['lang_plugin_lottery_core_model_23'].'', 'money' => $poster['bribery']['num'], 'wishing' => ''.$this->lang['lang_plugin_lottery_core_model_24'].'', 'act_name' => $title, 'remark' => ''.$this->lang['lang_plugin_lottery_core_model_25'].'');
			$err = m('common')->sendredpack($params);
			if (!(is_error($err))) 
			{
				$reward = $poster;
				$reward['bribery']['briberyOrder'] = $tid;
				$reward = serialize($reward);
				$upgrade = array('lottery_data' => $reward);
				$log_id = pdo_fetchcolumn('SELECT log_id FROM ' . tablename('ewei_shop_lottery_log') . ' WHERE uniacid=:uniacid AND join_user=:join_user AND lottery_id=:lottery_id AND is_reward=1 ORDER BY addtime DESC LIMIT 1', array(':uniacid' => $_W['uniacid'], ':join_user' => $openid, ':lottery_id' => $lottery_id));
				pdo_update('ewei_shop_lottery_log', $upgrade, array('log_id' => $log_id));
			}
			else 
			{
				show_json(0, 'WechatRedError');
			}
		}
		if (isset($poster['coupon']) && !(empty($poster['coupon']))) 
		{
			$cansendreccoupon = false;
			$plugin_coupon = com('coupon');
			unset($poster['coupon']['total']);
			foreach ($poster['coupon'] as $k => $v ) 
			{
				if ($plugin_coupon) 
				{
					if (!(empty($v['id'])) && (0 < $v['couponnum'])) 
					{
						$reccoupon = $plugin_coupon->getCoupon($v['id']);
						if (!(empty($reccoupon))) 
						{
							$cansendreccoupon = true;
						}
					}
				}
				if ($cansendreccoupon) 
				{
					$plugin_coupon->taskposter(array('openid' => $openid), $v['id'], $v['couponnum']);
				}
			}
		}
	}
	public function lottery_complain($reward) 
	{
		if (isset($reward['credit'])) 
		{
			return ''.$this->lang['lang_plugin_lottery_core_model_26'].':' . $reward['credit'];
		}
		if (isset($reward['money'])) 
		{
			return ''.$this->lang['lang_plugin_lottery_core_model_27'].':' . $reward['money']['num'] . ''.$this->lang['lang_plugin_lottery_core_model_28'].'';
		}
		if (isset($reward['bribery'])) 
		{
			return ''.$this->lang['lang_plugin_lottery_core_model_29'].':' . $reward['bribery']['num'] . ''.$this->lang['lang_plugin_lottery_core_model_30'].'';
		}
		if (isset($reward['goods'])) 
		{
			foreach ($reward['goods'] as $k => $v ) 
			{
				$total = $v['total'];
				break;
			}
			return ''.$this->lang['lang_plugin_lottery_core_model_31'].':' . $total . ''.$this->lang['lang_plugin_lottery_core_model_32'].'';
		}
		if (isset($reward['coupon'])) 
		{
			return ''.$this->lang['lang_plugin_lottery_core_model_33'].':' . $reward['coupon']['coupon_num'] . ''.$this->lang['lang_plugin_lottery_core_model_34'].'';
		}
	}
	public function check_isreward() 
	{
		global $_W;
		$end_time = time();
		$start_time = $end_time - 15;
		$changes = pdo_fetch('select * from ' . tablename('ewei_shop_lottery_join') . ' where uniacid=:uniacid and join_user=:join_user and addtime>' . $start_time . ' and addtime<=' . $end_time . ' limit 1', array(':uniacid' => $_W['uniacid'], ':join_user' => $_W['openid']));
		if (!(empty($changes))) 
		{
			return array('is_changes' => 1, 'lottery' => $changes);
		}
		return array('is_changes' => 0);
	}
}
?>