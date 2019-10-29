<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class build_EweiShopV2Page extends PluginPfMobilePage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$goods = array();
		$openid = trim($_GPC['openid']);
		$content = trim(urldecode($_GPC['content']));
		if (empty($openid)) 
		{
			return;
		}
		$member = m('member')->getMember($openid);
		if (empty($member)) 
		{
			return;
		}
		$poster = pdo_fetch('select * from ' . tablename('ewei_shop_task_poster') . ' where keyword=:keyword and uniacid=:uniacid and `status`=1 and `is_delete`=0 limit 1', array(':keyword' => $content, ':uniacid' => $_W['uniacid']));
		if (empty($poster)) 
		{
			m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_task_core_mobile_build_0'].'!');
			return;
		}
		$time = time();
		if ($time < $poster['timestart']) 
		{
			$starttext = ((empty($poster['starttext']) ? ''.$this->lang['lang_plugin_task_core_mobile_build_1'].' ['.$this->lang['lang_plugin_task_core_mobile_build_2'].'] '.$this->lang['lang_plugin_task_core_mobile_build_3'].'...' : $poster['starttext']));
			$starttext = str_replace('['.$this->lang['lang_plugin_task_core_mobile_build_4'].']', date('Y'.$this->lang['lang_plugin_task_core_mobile_build_5'].'m'.$this->lang['lang_plugin_task_core_mobile_build_6'].'d'.$this->lang['lang_plugin_task_core_mobile_build_7'].' H:i', $poster['timestart']), $starttext);
			$starttext = str_replace('['.$this->lang['lang_plugin_task_core_mobile_build_8'].']', date('Y'.$this->lang['lang_plugin_task_core_mobile_build_9'].'m'.$this->lang['lang_plugin_task_core_mobile_build_10'].'d'.$this->lang['lang_plugin_task_core_mobile_build_11'].' H:i', $poster['timeend']), $starttext);
			m('message')->sendCustomNotice($openid, $starttext);
			return;
		}
		if ($poster['timeend'] < time()) 
		{
			$endtext = ((empty($poster['endtext']) ? ''.$this->lang['lang_plugin_task_core_mobile_build_12'].'' : $poster['endtext']));
			$endtext = str_replace('['.$this->lang['lang_plugin_task_core_mobile_build_13'].']', date('Y-m-d H:i', $poster['timestart']), $endtext);
			$endtext = str_replace('['.$this->lang['lang_plugin_task_core_mobile_build_14'].']', date('Y-m-d- H:i', $poster['timeend']), $endtext);
			m('message')->sendCustomNotice($openid, $endtext);
			return;
		}
		$img = '';
		$is_waiting = false;
		$task_count = pdo_fetchcolumn('select COUNT(*) from ' . tablename('ewei_shop_task_join') . ' where uniacid=:uniacid and join_user=:join_user and task_type=' . $poster['poster_type'] . ' and is_reward=0 and failtime>' . time(), array(':uniacid' => $_W['uniacid'], ':join_user' => $member['openid']));
		if ($task_count) 
		{
			$task_info = pdo_fetch('select `needcount`,`completecount`,`is_reward`,`failtime` from ' . tablename('ewei_shop_task_join') . ' where uniacid=:uniacid and join_user=:join_user and task_id=:task_id and task_type=:task_type and  failtime>' . time() . ' order by `addtime` DESC limit 1', array(':uniacid' => $_W['uniacid'], ':join_user' => $member['openid'], ':task_id' => $poster['id'], ':task_type' => $poster['poster_type']));
			if ($task_info) 
			{
				$is_waiting = true;
				if ($task_info['is_reward'] == 0) 
				{
					$img = $this->create_poster($poster, $member);
				}
				else if ($task_info['is_reward'] == 1) 
				{
					if ($poster['is_repeat']) 
					{
						$img = $this->join_task($member, $poster);
					}
					else 
					{
						$img = $this->create_poster($poster, $member);
					}
				}
			}
			else 
			{
				m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_task_core_mobile_build_15'].'');
				return;
			}
		}
		else 
		{
			if ($poster['poster_type'] == 1) 
			{
				$poster_type = 2;
			}
			else if ($poster['poster_type'] == 2) 
			{
				$poster_type = 1;
			}
			$other_task_count = pdo_fetchcolumn('select COUNT(*) from ' . tablename('ewei_shop_task_join') . ' where uniacid=:uniacid and join_user=:join_user and task_type=' . $poster_type . ' and failtime>' . time(), array(':uniacid' => $_W['uniacid'], ':join_user' => $member['openid']));
			if ($other_task_count) 
			{
				$default = pdo_fetchcolumn('select `data` from ' . tablename('ewei_shop_task_default') . ' where uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
				if ($default) 
				{
					$default = unserialize($default);
					if ($default['is_posterall'] == 1) 
					{
						$end_task_count = pdo_fetchcolumn('select COUNT(*) from ' . tablename('ewei_shop_task_join') . ' where uniacid=:uniacid and join_user=:join_user and task_type=' . $poster['poster_type'] . ' and failtime<' . time(), array(':uniacid' => $_W['uniacid'], ':join_user' => $member['openid']));
						if ($end_task_count) 
						{
							$end_task_info = pdo_fetch('select `needcount`,`completecount`,`failtime` from ' . tablename('ewei_shop_task_join') . ' where uniacid=:uniacid and join_user=:join_user and task_id=:task_id and task_type=:task_type and failtime<' . time() . ' order by `addtime` DESC limit 1', array(':uniacid' => $_W['uniacid'], ':join_user' => $member['openid'], ':task_id' => $poster['id'], ':task_type' => $poster['poster_type']));
							if ($end_task_info) 
							{
								if ($poster['is_repeat']) 
								{
									$is_waiting = true;
									$img = $this->join_task($member, $poster);
								}
								else 
								{
									m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_task_core_mobile_build_16'].'');
									return;
								}
							}
							else 
							{
								$is_waiting = true;
								$img = $this->join_task($member, $poster);
							}
						}
						else 
						{
							$is_waiting = true;
							$img = $this->join_task($member, $poster);
						}
					}
					else if ($default['is_posterall'] == 0) 
					{
						m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_task_core_mobile_build_17'].'');
						return;
						m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_task_core_mobile_build_18'].'');
						return;
						$end_task_count = pdo_fetchcolumn('select COUNT(*) from ' . tablename('ewei_shop_task_join') . ' where uniacid=:uniacid and join_user=:join_user and task_type=' . $poster['poster_type'] . ' and (is_reward=1 or failtime<' . time() . ')', array(':uniacid' => $_W['uniacid'], ':join_user' => $member['openid']));
						if ($end_task_count) 
						{
							$end_task_info = pdo_fetch('select `needcount`,`completecount`,`failtime` from ' . tablename('ewei_shop_task_join') . ' where uniacid=:uniacid and join_user=:join_user and task_id=:task_id and task_type=:task_type and (is_reward=1 or failtime<' . time() . ') order by `addtime` DESC limit 1', array(':uniacid' => $_W['uniacid'], ':join_user' => $member['openid'], ':task_id' => $poster['id'], ':task_type' => $poster['poster_type']));
							if ($end_task_info) 
							{
								if ($poster['is_repeat']) 
								{
									$is_waiting = true;
									$img = $this->join_task($member, $poster);
								}
								else 
								{
									m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_task_core_mobile_build_19'].'');
									return;
								}
							}
							else 
							{
								$is_waiting = true;
								$img = $this->join_task($member, $poster);
							}
						}
						else 
						{
							$is_waiting = true;
							$img = $this->join_task($member, $poster);
						}
					}
				}
				else 
				{
					m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_task_core_mobile_build_20'].'');
					return;
				}
			}
			else 
			{
				$end_task_count = pdo_fetchcolumn('select COUNT(*) from ' . tablename('ewei_shop_task_join') . ' where uniacid=:uniacid and join_user=:join_user and task_type=' . $poster['poster_type'] . ' and (is_reward=1 or failtime<' . time() . ')', array(':uniacid' => $_W['uniacid'], ':join_user' => $member['openid']));
				$end_task_info = pdo_fetch('select `needcount`,`completecount`,`failtime` from ' . tablename('ewei_shop_task_join') . ' where uniacid=:uniacid and join_user=:join_user and task_id=:task_id and task_type=:task_type and (is_reward=1 or failtime<' . time() . ') order by `addtime` DESC limit 1', array(':uniacid' => $_W['uniacid'], ':join_user' => $member['openid'], ':task_id' => $poster['id'], ':task_type' => $poster['poster_type']));
				$is_waiting = true;
				$img = $this->join_task($member, $poster);
				m('message')->sendCustomNotice($openid, ''.$this->lang['lang_plugin_task_core_mobile_build_21'].'');
				return;
				$is_waiting = true;
				$img = $this->join_task($member, $poster);
				$is_waiting = true;
				$img = $this->join_task($member, $poster);
			}
		}
		if ($is_waiting) 
		{
			$waittext = ((!(empty($poster['waittext'])) ? htmlspecialchars_decode($poster['waittext'], ENT_QUOTES) : ''.$this->lang['lang_plugin_task_core_mobile_build_22'].'...'));
			$waittext = str_replace('['.$this->lang['lang_plugin_task_core_mobile_build_23'].']', date('Y'.$this->lang['lang_plugin_task_core_mobile_build_24'].'m'.$this->lang['lang_plugin_task_core_mobile_build_25'].'d'.$this->lang['lang_plugin_task_core_mobile_build_26'].' H:i', $poster['timestart']), $waittext);
			$waittext = str_replace('['.$this->lang['lang_plugin_task_core_mobile_build_27'].']', date('Y'.$this->lang['lang_plugin_task_core_mobile_build_28'].'m'.$this->lang['lang_plugin_task_core_mobile_build_29'].'d'.$this->lang['lang_plugin_task_core_mobile_build_30'].' H:i', $poster['timeend']), $waittext);
			m('message')->sendCustomNotice($openid, $waittext);
		}
		$mediaid = $img['mediaid'];
		if (!(empty($mediaid))) 
		{
			$task_complain = ''.$this->lang['lang_plugin_task_core_mobile_build_31'].'['.$this->lang['lang_plugin_task_core_mobile_build_32'].']'.$this->lang['lang_plugin_task_core_mobile_build_33'].'['.$this->lang['lang_plugin_task_core_mobile_build_34'].']!' . "\r\n" . ''.$this->lang['lang_plugin_task_core_mobile_build_35'].','.$this->lang['lang_plugin_task_core_mobile_build_36'].'' . "\r\n" . ''.$this->lang['lang_plugin_task_core_mobile_build_37'].'['.$this->lang['lang_plugin_task_core_mobile_build_38'].']'.$this->lang['lang_plugin_task_core_mobile_build_39'].'' . "\r\n" . '['.$this->lang['lang_plugin_task_core_mobile_build_40'].']' . "\r\n" . ''.$this->lang['lang_plugin_task_core_mobile_build_41'].'['.$this->lang['lang_plugin_task_core_mobile_build_42'].']';
			$default = pdo_fetchcolumn('select `data` from ' . tablename('ewei_shop_task_default') . ' where uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
			if ($default) 
			{
				$default = unserialize($default);
				$task_complain = $default['getposter']['value'];
			}
			if ($poster['getposter']) 
			{
				$task_complain = $poster['getposter'];
			}
			$poster['okdays'] = time() + $poster['days'];
			$poster['completecount'] = 0;
			$task_complain = $this->model->notice_complain($task_complain, $member, $poster, '', 2);
			$task_complain = htmlspecialchars_decode($task_complain, ENT_QUOTES);
			m('message')->sendCustomNotice($openid, $task_complain);
			m('message')->sendImage($openid, $mediaid);
		}
		else 
		{
			$task_complain = ''.$this->lang['lang_plugin_task_core_mobile_build_43'].'['.$this->lang['lang_plugin_task_core_mobile_build_44'].']'.$this->lang['lang_plugin_task_core_mobile_build_45'].'['.$this->lang['lang_plugin_task_core_mobile_build_46'].']!' . "\r\n" . ''.$this->lang['lang_plugin_task_core_mobile_build_47'].','.$this->lang['lang_plugin_task_core_mobile_build_48'].'' . "\r\n" . ''.$this->lang['lang_plugin_task_core_mobile_build_49'].'['.$this->lang['lang_plugin_task_core_mobile_build_50'].']'.$this->lang['lang_plugin_task_core_mobile_build_51'].'' . "\r\n" . '['.$this->lang['lang_plugin_task_core_mobile_build_52'].']' . "\r\n" . ''.$this->lang['lang_plugin_task_core_mobile_build_53'].'['.$this->lang['lang_plugin_task_core_mobile_build_54'].']';
			$default = pdo_fetchcolumn('select `data` from ' . tablename('ewei_shop_task_default') . ' where uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid']));
			if ($default) 
			{
				$default = unserialize($default);
				$task_complain = $default['getposter']['value'];
			}
			$poster['okdays'] = time() + $poster['days'];
			$poster['completecount'] = 0;
			$task_complain = $this->model->notice_complain($task_complain, $member, $poster, '', 2);
			$task_complain = htmlspecialchars_decode($task_complain, ENT_QUOTES);
			m('message')->sendCustomNotice($openid, $task_complain);
			$oktext = '<a href=\'' . $img['img'] . '\'>'.$this->lang['lang_plugin_task_core_mobile_build_55'].'</a>';
			m('message')->sendCustomNotice($openid, $oktext);
		}
	}
	private function join_task($member, $poster) 
	{
		global $_W;
		$time = time();
		$rec_reward = unserialize($poster['reward_data']);
		$rec_reward = $rec_reward['rec'];
		$rec_reward = serialize($rec_reward);
		$task_join = array('uniacid' => $_W['uniacid'], 'join_user' => $member['openid'], 'task_id' => $poster['id'], 'task_type' => 1, 'needcount' => $poster['needcount'], 'failtime' => $time + $poster['days'], 'addtime' => $time);
		if ($poster['poster_type'] == 2) 
		{
			$task_join['task_type'] = 2;
			$task_join['reward_data'] = $rec_reward;
		}
		pdo_insert('ewei_shop_task_join', $task_join);
		$id = pdo_insertid();
		$img = '';
		if ($id) 
		{
			$qr = $this->model->getQR($poster, $member);
			if (is_error($qr)) 
			{
				m('message')->sendCustomNotice($member['openid'], ''.$this->lang['lang_plugin_task_core_mobile_build_56'].': ' . $qr['message']);
				exit();
			}
			$img = $this->model->createPoster($poster, $member, $qr);
		}
		if ($img) 
		{
			return $img;
		}
		return false;
	}
	private function create_poster($poster, $member) 
	{
		$qr = $this->model->getQR($poster, $member);
		if (is_error($qr)) 
		{
			m('message')->sendCustomNotice($member['openid'], ''.$this->lang['lang_plugin_task_core_mobile_build_57'].': ' . $qr['message']);
			exit();
		}
		$img = $this->model->createPoster($poster, $member, $qr);
		if ($img) 
		{
			return $img;
		}
		return false;
	}
	public function reward() 
	{
		global $_W;
		global $_GPC;
		$member_info = $_GPC['member_info'];
		$poster = $_GPC['poster'];
		$join_info = $_GPC['join_info'];
		$qr = $_GPC['qr'];
		$openid = $_GPC['openid'];
		$qrmember = $_GPC['qrmember'];
		$poster['reward_data'] = htmlspecialchars_decode($poster['reward_data']);
		if ($join_info['task_type'] == 1) 
		{
			$this->model->reward($member_info, $poster, $join_info, $qr, $openid, $qrmember);
		}
		else if ($join_info['task_type'] == 2) 
		{
			$this->model->rankreward($member_info, $poster, $join_info, $qr, $openid, $qrmember);
		}
		return true;
	}
}
?>