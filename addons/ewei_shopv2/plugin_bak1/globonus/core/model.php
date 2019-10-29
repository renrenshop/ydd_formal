<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
define('TM_GLOBONUS_PAY', 'TM_GLOBONUS_PAY');
define('TM_GLOBONUS_UPGRADE', 'TM_GLOBONUS_UPGRADE');
define('TM_GLOBONUS_BECOME', 'TM_GLOBONUS_BECOME');
if (!(class_exists('GlobonusModel'))) 
{
	class GlobonusModel extends PluginModel 
	{
		public function getSet($uniacid = 0) 
		{
			$set = parent::getSet($uniacid);
			$set['texts'] = array('partner' => (empty($set['texts']['partner']) ? ''.$this->lang['lang_plugin_globonus_core_model_0'].'' : $set['texts']['partner']), 'center' => (empty($set['texts']['center']) ? ''.$this->lang['lang_plugin_globonus_core_model_1'].'' : $set['texts']['center']), 'become' => (empty($set['texts']['become']) ? ''.$this->lang['lang_plugin_globonus_core_model_2'].'' : $set['texts']['become']), 'bonus' => (empty($set['texts']['bonus']) ? ''.$this->lang['lang_plugin_globonus_core_model_3'].'' : $set['texts']['bonus']), 'bonus_total' => (empty($set['texts']['bonus_total']) ? ''.$this->lang['lang_plugin_globonus_core_model_4'].'' : $set['texts']['bonus_total']), 'bonus_lock' => (empty($set['texts']['bonus_lock']) ? ''.$this->lang['lang_plugin_globonus_core_model_5'].'' : $set['texts']['bonus_lock']), 'bonus_pay' => (empty($set['texts']['bonus_lock']) ? ''.$this->lang['lang_plugin_globonus_core_model_6'].'' : $set['texts']['bonus_pay']), 'bonus_wait' => (empty($set['texts']['bonus_wait']) ? ''.$this->lang['lang_plugin_globonus_core_model_7'].'' : $set['texts']['bonus_wait']), 'bonus_detail' => (empty($set['texts']['bonus_detail']) ? ''.$this->lang['lang_plugin_globonus_core_model_8'].'' : $set['texts']['bonus_detail']), 'bonus_charge' => (empty($set['texts']['bonus_charge']) ? ''.$this->lang['lang_plugin_globonus_core_model_9'].'' : $set['texts']['bonus_charge']));
			return $set;
		}
		public function getLevels($all = true, $default = false) 
		{
			global $_W;
			if ($all) 
			{
				$levels = pdo_fetchall('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid order by bonus asc', array(':uniacid' => $_W['uniacid']));
			}
			else 
			{
				$levels = pdo_fetchall('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid and (ordermoney>0 or commissionmoney>0 or bonusmoney>0) order by bonus asc', array(':uniacid' => $_W['uniacid']));
			}
			if ($default) 
			{
				$default = array('id' => '0', 'levelname' => (empty($_S['globonus']['levelname']) ? ''.$this->lang['lang_plugin_globonus_core_model_10'].'' : $_S['globonus']['levelname']), 'bonus' => $_W['shopset']['globonus']['bonus']);
				$levels = array_merge(array($default), $levels);
			}
			return $levels;
		}
		public function getBonus($openid = '', $params = array()) 
		{
			global $_W;
			$ret = array();
			if (in_array('ok', $params)) 
			{
				$ret['ok'] = pdo_fetchcolumn('select ifnull(sum(paymoney),0) from ' . tablename('ewei_shop_globonus_billp') . ' where openid=:openid and status=1 and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':openid' => $openid));
			}
			if (in_array('lock', $params)) 
			{
				$ret['lock'] = pdo_fetchcolumn('select ifnull(sum(paymoney),0) from ' . tablename('ewei_shop_globonus_billp') . ' where openid=:openid and status<>1 and uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':openid' => $openid));
			}
			$ret['total'] = $ret['ok'] + $ret['lock'];
			return $ret;
		}
		public function sendMessage($openid = '', $data = array(), $message_type = '') 
		{
			global $_W;
			global $_GPC;
			$set = $this->getSet();
			$tm = $set['tm'];
			$templateid = $tm['templateid'];
			$member = m('member')->getMember($openid);
			$usernotice = unserialize($member['noticeset']);
			if (!(is_array($usernotice))) 
			{
				$usernotice = array();
			}
			if (($message_type == TM_GLOBONUS_PAY) && empty($usernotice['globonus_pay'])) 
			{
				$message = $tm['pay'];
				if (empty($message)) 
				{
					return false;
				}
				$message = str_replace('['.$this->lang['lang_plugin_globonus_core_model_11'].']', $member['nickname'], $message);
				$message = str_replace('['.$this->lang['lang_plugin_globonus_core_model_12'].']', date('Y-m-d H:i:s', time()), $message);
				$message = str_replace('['.$this->lang['lang_plugin_globonus_core_model_13'].']', $data['money'], $message);
				$message = str_replace('['.$this->lang['lang_plugin_globonus_core_model_14'].']', $data['type'], $message);
				$msg = array( 'keyword1' => array('value' => (!(empty($tm['paytitle'])) ? $tm['paytitle'] : ''.$this->lang['lang_plugin_globonus_core_model_15'].''), 'color' => '#73a68d'), 'keyword2' => array('value' => $message, 'color' => '#73a68d') );
				return $this->sendNotice($openid, $tm, 'pay_advanced', $data, $member, $msg);
			}
			if (($message_type == TM_GLOBONUS_UPGRADE) && empty($usernotice['globonus_upgrade'])) 
			{
				$message = $tm['upgrade'];
				if (empty($message)) 
				{
					return false;
				}
				$message = str_replace('['.$this->lang['lang_plugin_globonus_core_model_16'].']', $member['nickname'], $message);
				$message = str_replace('['.$this->lang['lang_plugin_globonus_core_model_17'].']', date('Y-m-d H:i:s', time()), $message);
				$message = str_replace('['.$this->lang['lang_plugin_globonus_core_model_18'].']', $data['oldlevel']['levelname'], $message);
				$message = str_replace('['.$this->lang['lang_plugin_globonus_core_model_19'].']', $data['oldlevel']['bonus'] . '%', $message);
				$message = str_replace('['.$this->lang['lang_plugin_globonus_core_model_20'].']', $data['newlevel']['levelname'], $message);
				$message = str_replace('['.$this->lang['lang_plugin_globonus_core_model_21'].']', $data['newlevel']['bonus'] . '%', $message);
				$msg = array( 'keyword1' => array('value' => (!(empty($tm['upgradetitle'])) ? $tm['upgradetitle'] : ''.$this->lang['lang_plugin_globonus_core_model_22'].''), 'color' => '#73a68d'), 'keyword2' => array('value' => $message, 'color' => '#73a68d') );
				return $this->sendNotice($openid, $tm, 'upgrade_advanced', $data, $member, $msg);
			}
			if (($message_type == TM_GLOBONUS_BECOME) && empty($usernotice['globonus_become'])) 
			{
				$message = $tm['become'];
				if (empty($message)) 
				{
					return false;
				}
				$message = str_replace('['.$this->lang['lang_plugin_globonus_core_model_23'].']', $data['nickname'], $message);
				$message = str_replace('['.$this->lang['lang_plugin_globonus_core_model_24'].']', date('Y-m-d H:i:s', $data['partnertime']), $message);
				$msg = array( 'keyword1' => array('value' => (!(empty($tm['becometitle'])) ? $tm['becometitle'] : ''.$this->lang['lang_plugin_globonus_core_model_25'].''), 'color' => '#73a68d'), 'keyword2' => array('value' => $message, 'color' => '#73a68d') );
				return $this->sendNotice($openid, $tm, 'become_advanced', $data, $member, $msg);
			}
		}
		protected function sendNotice($touser, $tm, $tag, $datas, $member, $msg) 
		{
			global $_W;
			if (!(empty($tm['is_advanced'])) && !(empty($tm[$tag]))) 
			{
				$advanced_template = pdo_fetch('select * from ' . tablename('ewei_shop_member_message_template') . ' where id=:id and uniacid=:uniacid limit 1', array(':id' => $tm[$tag], ':uniacid' => $_W['uniacid']));
				if (!(empty($advanced_template))) 
				{
					$url = ((!(empty($advanced_template['url'])) ? $this->replaceTemplate($advanced_template['url'], $tag, $datas, $member) : ''));
					$advanced_message = array( 'first' => array('value' => $this->replaceTemplate($advanced_template['first'], $tag, $datas, $member), 'color' => $advanced_template['firstcolor']), 'remark' => array('value' => $this->replaceTemplate($advanced_template['remark'], $tag, $datas, $member), 'color' => $advanced_template['remarkcolor']) );
					$data = iunserializer($advanced_template['data']);
					foreach ($data as $d ) 
					{
						$advanced_message[$d['keywords']] = array('value' => $this->replaceTemplate($d['value'], $tag, $datas, $member), 'color' => $d['color']);
					}
					if (!(empty($advanced_template['template_id']))) 
					{
						m('message')->sendTplNotice($touser, $advanced_template['template_id'], $advanced_message);
					}
					else 
					{
						m('message')->sendCustomNotice($touser, $advanced_message);
					}
				}
			}
			else if (!(empty($tm['templateid']))) 
			{
				m('message')->sendTplNotice($touser, $tm['templateid'], $msg);
			}
			else 
			{
				m('message')->sendCustomNotice($touser, $msg);
			}
			return true;
		}
		protected function replaceTemplate($str, $tag, $data, $member) 
		{
			$arr = array('['.$this->lang['lang_plugin_globonus_core_model_26'].']' => $member['nickname'], '['.$this->lang['lang_plugin_globonus_core_model_27'].']' => date('Y-m-d H:i:s', time()), '['.$this->lang['lang_plugin_globonus_core_model_28'].']' => (!(empty($data['bonus'])) ? $data['bonus'] : ''), '['.$this->lang['lang_plugin_globonus_core_model_29'].']' => (!(empty($data['type'])) ? $data['type'] : ''), '['.$this->lang['lang_plugin_globonus_core_model_30'].']' => (!(empty($data['oldlevel']['levelname'])) ? $data['oldlevel']['levelname'] : ''), '['.$this->lang['lang_plugin_globonus_core_model_31'].']' => (!(empty($data['oldlevel']['bonus'])) ? $data['oldlevel']['bonus'] . '%' : ''), '['.$this->lang['lang_plugin_globonus_core_model_32'].']' => (!(empty($data['newlevel']['levelname'])) ? $data['newlevel']['levelname'] : ''), '['.$this->lang['lang_plugin_globonus_core_model_33'].']' => (!(empty($data['newlevel']['bonus'])) ? $data['newlevel']['bonus'] . '%' : ''));
			switch ($tag) 
			{
				case 'become_advanced': $arr['['.$this->lang['lang_plugin_globonus_core_model_34'].']'] = date('Y-m-d H:i:s', $data['partnertime']);
				$arr['['.$this->lang['lang_plugin_globonus_core_model_35'].']'] = $data['nickname'];
				case 'pay_advanced': $arr['['.$this->lang['lang_plugin_globonus_core_model_36'].']'] = date('Y-m-d H:i:s', $data['paytime']);
				$arr['['.$this->lang['lang_plugin_globonus_core_model_37'].']'] = $data['nickname'];
			}
			foreach ($arr as $key => $value ) 
			{
				$str = str_replace($key, $value, $str);
			}
			return $str;
		}
		public function getLevel($openid) 
		{
			global $_W;
			if (empty($openid)) 
			{
				return false;
			}
			$member = m('member')->getMember($openid);
			if (empty($member['partnerlevel'])) 
			{
				return false;
			}
			$level = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid and id=:id limit 1', array(':uniacid' => $_W['uniacid'], ':id' => $member['partnerlevel']));
			return $level;
		}
		public function upgradeLevelByOrder($openid) 
		{
			global $_W;
			if (empty($openid)) 
			{
				return false;
			}
			$set = $this->getSet();
			if (empty($set['open'])) 
			{
				return false;
			}
			$m = m('member')->getMember($openid);
			if (empty($m)) 
			{
				return;
			}
			$leveltype = intval($set['leveltype']);
			if (($leveltype == 4) || ($leveltype == 5)) 
			{
				if (!(empty($m['partnernotupgrade']))) 
				{
					return;
				}
				$oldlevel = $this->getLevel($m['openid']);
				if (empty($oldlevel['id'])) 
				{
					$oldlevel = array('levelname' => (empty($set['levelname']) ? ''.$this->lang['lang_plugin_globonus_core_model_38'].'' : $set['levelname']), 'bonus' => $set['bonus']);
				}
				$orders = pdo_fetch('select sum(og.realprice) as ordermoney,count(distinct og.orderid) as ordercount from ' . tablename('ewei_shop_order') . ' o ' . ' left join  ' . tablename('ewei_shop_order_goods') . ' og on og.orderid=o.id ' . ' where o.openid=:openid and o.status>=3 and o.uniacid=:uniacid limit 1', array(':uniacid' => $_W['uniacid'], ':openid' => $openid));
				$ordermoney = $orders['ordermoney'];
				$ordercount = $orders['ordercount'];
				if ($leveltype == 4) 
				{
					$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $ordermoney . ' >= ordermoney and ordermoney>0  order by ordermoney desc limit 1', array(':uniacid' => $_W['uniacid']));
					if (empty($newlevel)) 
					{
						return;
					}
					if (!(empty($oldlevel['id']))) 
					{
						if ($oldlevel['id'] == $newlevel['id']) 
						{
							return;
						}
						if ($newlevel['ordermoney'] < $oldlevel['ordermoney']) 
						{
							return;
							if ($leveltype == 5) 
							{
								$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $ordercount . ' >= ordercount and ordercount>0  order by ordercount desc limit 1', array(':uniacid' => $_W['uniacid']));
								if (empty($newlevel)) 
								{
									return;
								}
								if (!(empty($oldlevel['id']))) 
								{
									if ($oldlevel['id'] == $newlevel['id']) 
									{
										return;
									}
									if ($newlevel['ordercount'] < $oldlevel['ordercount']) 
									{
										return;
									}
								}
							}
						}
					}
				}
				else 
				{
					$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $ordercount . ' >= ordercount and ordercount>0  order by ordercount desc limit 1', array(':uniacid' => $_W['uniacid']));
					return;
					return;
					return;
				}
				pdo_update('ewei_shop_member', array('partnerlevel' => $newlevel['id']), array('id' => $m['id']));
				$this->sendMessage($m['openid'], array('nickname' => $m['nickname'], 'oldlevel' => $oldlevel, 'newlevel' => $newlevel), TM_GLOBONUS_UPGRADE);
				return;
			}
			if ((0 <= $leveltype) && ($leveltype <= 3)) 
			{
				$agents = array();
				if (!(empty($set['selfbuy']))) 
				{
					$agents[] = $m;
				}
				if (!(empty($m['agentid']))) 
				{
					$m1 = m('member')->getMember($m['agentid']);
					if (!(empty($m1))) 
					{
						$agents[] = $m1;
						if (!(empty($m1['agentid'])) && ($m1['isagent'] == 1) && ($m1['status'] == 1)) 
						{
							$m2 = m('member')->getMember($m1['agentid']);
							if (!(empty($m2)) && ($m2['isagent'] == 1) && ($m2['status'] == 1)) 
							{
								$agents[] = $m2;
								if (empty($set['selfbuy'])) 
								{
									if (!(empty($m2['agentid'])) && ($m2['isagent'] == 1) && ($m2['status'] == 1)) 
									{
										$m3 = m('member')->getMember($m2['agentid']);
										if (!(empty($m3)) && ($m3['isagent'] == 1) && ($m3['status'] == 1)) 
										{
											$agents[] = $m3;
										}
									}
								}
							}
						}
					}
				}
				if (empty($agents)) 
				{
					return;
				}
				foreach ($agents as $agent ) 
				{
					$info = $this->getInfo($agent['id'], array('ordercount3', 'ordermoney3', 'order13money', 'order13'));
					if (!(empty($info['partnernotupgrade']))) 
					{
						continue;
					}
					$oldlevel = $this->getLevel($agent['openid']);
					if (empty($oldlevel['id'])) 
					{
						$oldlevel = array('levelname' => (empty($set['levelname']) ? ''.$this->lang['lang_plugin_globonus_core_model_39'].'' : $set['levelname']), 'bonus' => $set['bonus']);
					}
					if ($leveltype == 0) 
					{
						$ordermoney = $info['ordermoney3'];
						$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid and ' . $ordermoney . ' >= ordermoney and ordermoney>0  order by ordermoney desc limit 1', array(':uniacid' => $_W['uniacid']));
						if (empty($newlevel)) 
						{
							continue;
						}
						if (!(empty($oldlevel['id']))) 
						{
							if ($oldlevel['id'] == $newlevel['id']) 
							{
								continue;
							}
							if ($newlevel['ordermoney'] < $oldlevel['ordermoney']) 
							{
								continue;
								if ($leveltype == 1) 
								{
									$ordermoney = $info['order13money'];
									$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid and ' . $ordermoney . ' >= ordermoney and ordermoney>0  order by ordermoney desc limit 1', array(':uniacid' => $_W['uniacid']));
									if (empty($newlevel)) 
									{
										continue;
									}
									if (!(empty($oldlevel['id']))) 
									{
										if ($oldlevel['id'] == $newlevel['id']) 
										{
											continue;
										}
										if ($newlevel['ordermoney'] < $oldlevel['ordermoney']) 
										{
											continue;
											if ($leveltype == 2) 
											{
												$ordercount = $info['ordercount3'];
												$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $ordercount . ' >= ordercount and ordercount>0  order by ordercount desc limit 1', array(':uniacid' => $_W['uniacid']));
												if (empty($newlevel)) 
												{
													continue;
												}
												if (!(empty($oldlevel['id']))) 
												{
													if ($oldlevel['id'] == $newlevel['id']) 
													{
														continue;
													}
													if ($newlevel['ordercount'] < $oldlevel['ordercount']) 
													{
														continue;
														if ($leveltype == 3) 
														{
															$ordercount = $info['order13'];
															$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $ordercount . ' >= ordercount and ordercount>0  order by ordercount desc limit 1', array(':uniacid' => $_W['uniacid']));
															if (empty($newlevel)) 
															{
																continue;
															}
															if (!(empty($oldlevel['id']))) 
															{
																if ($oldlevel['id'] == $newlevel['id']) 
																{
																	continue;
																}
																if ($newlevel['ordercount'] < $oldlevel['ordercount']) 
																{
																	continue;
																}
															}
														}
													}
												}
											}
											else 
											{
												$ordercount = $info['order13'];
												$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $ordercount . ' >= ordercount and ordercount>0  order by ordercount desc limit 1', array(':uniacid' => $_W['uniacid']));
												continue;
												continue;
												continue;
											}
										}
									}
								}
								else 
								{
									$ordercount = $info['ordercount3'];
									$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $ordercount . ' >= ordercount and ordercount>0  order by ordercount desc limit 1', array(':uniacid' => $_W['uniacid']));
									continue;
									continue;
									continue;
									$ordercount = $info['order13'];
									$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $ordercount . ' >= ordercount and ordercount>0  order by ordercount desc limit 1', array(':uniacid' => $_W['uniacid']));
									continue;
									continue;
									continue;
								}
							}
						}
					}
					else 
					{
						$ordermoney = $info['order13money'];
						$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid and ' . $ordermoney . ' >= ordermoney and ordermoney>0  order by ordermoney desc limit 1', array(':uniacid' => $_W['uniacid']));
						continue;
						continue;
						continue;
						$ordercount = $info['ordercount3'];
						$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $ordercount . ' >= ordercount and ordercount>0  order by ordercount desc limit 1', array(':uniacid' => $_W['uniacid']));
						continue;
						continue;
						continue;
						$ordercount = $info['order13'];
						$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $ordercount . ' >= ordercount and ordercount>0  order by ordercount desc limit 1', array(':uniacid' => $_W['uniacid']));
						continue;
						continue;
						continue;
					}
					pdo_update('ewei_shop_member', array('partnerlevel' => $newlevel['id']), array('id' => $agent['id']));
					$this->sendMessage($agent['openid'], array('nickname' => $agent['nickname'], 'oldlevel' => $oldlevel, 'newlevel' => $newlevel), TM_GLOBONUS_UPGRADE);
				}
			}
		}
		public function getInfo($openid, $options = NULL) 
		{
			return p('commission')->getInfo($openid, $options);
		}
		public function upgradeLevelByAgent($openid) 
		{
			global $_W;
			if (empty($openid)) 
			{
				return false;
			}
			$set = $this->getSet();
			if (empty($set['open'])) 
			{
				return false;
			}
			$m = m('member')->getMember($openid);
			if (empty($m)) 
			{
				return;
			}
			$leveltype = intval($set['leveltype']);
			if (($leveltype < 6) || (9 < $leveltype)) 
			{
				return;
			}
			$info = $this->getInfo($m['id'], array());
			if (($leveltype == 6) || ($leveltype == 8)) 
			{
				$agents = array($m);
				if (!(empty($m['agentid']))) 
				{
					$m1 = m('member')->getMember($m['agentid']);
					if (!(empty($m1))) 
					{
						$agents[] = $m1;
						if (!(empty($m1['agentid'])) && ($m1['isagent'] == 1) && ($m1['status'] == 1)) 
						{
							$m2 = m('member')->getMember($m1['agentid']);
							if (!(empty($m2)) && ($m2['isagent'] == 1) && ($m2['status'] == 1)) 
							{
								$agents[] = $m2;
							}
						}
					}
				}
				if (empty($agents)) 
				{
					return;
				}
				foreach ($agents as $agent ) 
				{
					$info = $this->getInfo($agent['id'], array());
					if (!(empty($info['agentnotupgrade']))) 
					{
						continue;
					}
					$oldlevel = $this->getLevel($agent['openid']);
					if (empty($oldlevel['id'])) 
					{
						$oldlevel = array('levelname' => (empty($set['levelname']) ? ''.$this->lang['lang_plugin_globonus_core_model_40'].'' : $set['levelname']), 'bonus' => $set['bonus']);
					}
					if ($leveltype == 6) 
					{
						$downs1 = pdo_fetchall('select id from ' . tablename('ewei_shop_member') . ' where agentid=:agentid and uniacid=:uniacid ', array(':agentid' => $m['id'], ':uniacid' => $_W['uniacid']), 'id');
						$downcount += count($downs1);
						if (!(empty($downs1))) 
						{
							$downs2 = pdo_fetchall('select id from ' . tablename('ewei_shop_member') . ' where agentid in( ' . implode(',', array_keys($downs1)) . ') and uniacid=:uniacid', array(':uniacid' => $_W['uniacid']), 'id');
							$downcount += count($downs2);
							if (!(empty($downs2))) 
							{
								$downs3 = pdo_fetchall('select id from ' . tablename('ewei_shop_member') . ' where agentid in( ' . implode(',', array_keys($downs2)) . ') and uniacid=:uniacid', array(':uniacid' => $_W['uniacid']), 'id');
								$downcount += count($downs3);
							}
						}
						$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $downcount . ' >= downcount and downcount>0  order by downcount desc limit 1', array(':uniacid' => $_W['uniacid']));
					}
					else if ($leveltype == 8) 
					{
						$downcount = $info['level1'] + $info['level2'] + $info['level3'];
						$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $downcount . ' >= downcount and downcount>0  order by downcount desc limit 1', array(':uniacid' => $_W['uniacid']));
					}
					if (empty($newlevel)) 
					{
						continue;
					}
					if ($newlevel['id'] == $oldlevel['id']) 
					{
						continue;
					}
					if (!(empty($oldlevel['id']))) 
					{
						if ($newlevel['downcount'] < $oldlevel['downcount']) 
						{
							continue;
						}
					}
					pdo_update('ewei_shop_member', array('partnerlevel' => $newlevel['id']), array('id' => $agent['id']));
					$this->sendMessage($agent['openid'], array('nickname' => $agent['nickname'], 'oldlevel' => $oldlevel, 'newlevel' => $newlevel), TM_GLOBONUS_UPGRADE);
				}
				return;
			}
			if (!(empty($m['parnternotupgrade']))) 
			{
				return;
			}
			$oldlevel = $this->getLevel($m['openid']);
			if (empty($oldlevel['id'])) 
			{
				$oldlevel = array('levelname' => (empty($set['levelname']) ? ''.$this->lang['lang_plugin_globonus_core_model_41'].'' : $set['levelname']), 'bonus' => $set['bonus']);
			}
			if ($leveltype == 7) 
			{
				$downcount = pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_member') . ' where agentid=:agentid and uniacid=:uniacid ', array(':agentid' => $m['id'], ':uniacid' => $_W['uniacid']));
				$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $downcount . ' >= downcount and downcount>0  order by downcount desc limit 1', array(':uniacid' => $_W['uniacid']));
			}
			else if ($leveltype == 9) 
			{
				$downcount = $info['level1'];
				$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $downcount . ' >= downcount and downcount>0  order by downcount desc limit 1', array(':uniacid' => $_W['uniacid']));
			}
			if (empty($newlevel)) 
			{
				return;
			}
			if ($newlevel['id'] == $oldlevel['id']) 
			{
				return;
			}
			if (!(empty($oldlevel['id']))) 
			{
				if ($newlevel['downcount'] < $oldlevel['downcount']) 
				{
					return;
				}
			}
			pdo_update('ewei_shop_member', array('partnerlevel' => $newlevel['id']), array('id' => $m['id']));
			$this->sendMessage($m['openid'], array('nickname' => $m['nickname'], 'oldlevel' => $oldlevel, 'newlevel' => $newlevel), TM_GLOBONUS_UPGRADE);
		}
		public function upgradeLevelByCommissionOK($openid) 
		{
			global $_W;
			if (empty($openid)) 
			{
				return false;
			}
			$set = $this->getSet();
			if (empty($set['open'])) 
			{
				return false;
			}
			$m = m('member')->getMember($openid);
			if (empty($m)) 
			{
				return;
			}
			$leveltype = intval($set['leveltype']);
			if ($leveltype != 10) 
			{
				return;
			}
			if (!(empty($m['partnernotupgrade']))) 
			{
				return;
			}
			$oldlevel = $this->getLevel($m['openid']);
			if (empty($oldlevel['id'])) 
			{
				$oldlevel = array('levelname' => (empty($set['levelname']) ? ''.$this->lang['lang_plugin_globonus_core_model_42'].'' : $set['levelname']), 'bonus' => $set['bonus']);
			}
			$info = $this->getInfo($m['id'], array('pay'));
			$commissionmoney = $info['commission_pay'];
			$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $commissionmoney . ' >= commissionmoney and commissionmoney>0  order by commissionmoney desc limit 1', array(':uniacid' => $_W['uniacid']));
			if (empty($newlevel)) 
			{
				return;
			}
			if ($oldlevel['id'] == $newlevel['id']) 
			{
				return;
			}
			if (!(empty($oldlevel['id']))) 
			{
				if ($newlevel['commissionmoney'] < $oldlevel['commissionmoney']) 
				{
					return;
				}
			}
			pdo_update('ewei_shop_member', array('partnerlevel' => $newlevel['id']), array('id' => $m['id']));
			$this->sendMessage($m['openid'], array('nickname' => $m['nickname'], 'oldlevel' => $oldlevel, 'newlevel' => $newlevel), TM_GLOBONUS_UPGRADE);
		}
		public function upgradeLevelByBonus($openid) 
		{
			global $_W;
			if (empty($openid)) 
			{
				return false;
			}
			$set = $this->getSet();
			if (empty($set['open'])) 
			{
				return false;
			}
			$m = m('member')->getMember($openid);
			if (empty($m)) 
			{
				return;
			}
			$leveltype = intval($set['leveltype']);
			if ($leveltype != 11) 
			{
				return;
			}
			if (!(empty($m['agentnotupgrade']))) 
			{
				return;
			}
			$oldlevel = $this->getLevel($m['openid']);
			if (empty($oldlevel['id'])) 
			{
				$oldlevel = array('levelname' => (empty($set['levelname']) ? ''.$this->lang['lang_plugin_globonus_core_model_43'].'' : $set['levelname']), 'bonus' => $set['bonus']);
			}
			$bonusmoney = $this->getBonus($openid, array('ok'));
			$newlevel = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_level') . ' where uniacid=:uniacid  and ' . $bonusmoney['ok'] . ' >= bonusmoney and bonusmoney>0  order by bonusmoney desc limit 1', array(':uniacid' => $_W['uniacid']));
			if (empty($newlevel)) 
			{
				return;
			}
			if ($oldlevel['id'] == $newlevel['id']) 
			{
				return;
			}
			if (!(empty($oldlevel['id']))) 
			{
				if ($newlevel['bonusmoney'] < $oldlevel['bonusmoney']) 
				{
					return;
				}
			}
			pdo_update('ewei_shop_member', array('partnerlevel' => $newlevel['id']), array('id' => $m['id']));
			$this->sendMessage($m['openid'], array('nickname' => $m['nickname'], 'oldlevel' => $oldlevel, 'newlevel' => $newlevel), TM_GLOBONUS_UPGRADE);
		}
		public function getBonusData($year = 0, $month = 0, $week = 0, $openid = '') 
		{
			global $_W;
			$set = $this->getSet();
			if (empty($set['bonusrate']) || ($set['bonusrate'] <= 0)) 
			{
				$set['bonusrate'] = 100;
			}
			$days = get_last_day($year, $month);
			$starttime = strtotime($year . '-' . $month . '-1');
			$endtime = strtotime($year . '-' . $month . '-' . $days);
			$settletimes = intval($set['settledays']) * 86400;
			if ((1 <= $week) && ($week <= 4)) 
			{
				$weekdays = array();
				$i = $starttime;
				while ($i <= $endtime) 
				{
					$ds = explode('-', date('Y-m-d', $i));
					$day = intval($ds[2]);
					$w = ceil($day / 7);
					if (4 < $w) 
					{
						$w = 4;
					}
					if ($week == $w) 
					{
						$weekdays[] = $i;
					}
					$i += 86400;
				}
				$starttime = $weekdays[0];
				$endtime = strtotime(date('Y-m-d', $weekdays[count($weekdays) - 1]) . ' 23:59:59');
			}
			else 
			{
				$endtime = strtotime($year . '-' . $month . '-' . $days . ' 23:59:59');
			}
			$bill = pdo_fetch('select * from ' . tablename('ewei_shop_globonus_bill') . ' where uniacid=:uniacid and `year`=:year and `month`=:month and `week`=:week limit 1', array(':uniacid' => $_W['uniacid'], ':year' => $year, ':month' => $month, ':week' => $week));
			if (!(empty($bill)) && empty($openid)) 
			{
				return array('ordermoney' => round($bill['ordermoney'], 2), 'ordercount' => $bill['ordercount'], 'bonusmoney' => round($bill['bonusmoney'], 2), 'bonusordermoney' => round($bill['bonusordermoney'], 2), 'bonusrate' => round($bill['bonusrate'], 2), 'bonusmoney_send' => round($bill['bonusmoney_send'], 2), 'partnercount' => $bill['partnercount'], 'starttime' => $starttime, 'endtime' => $endtime, 'billid' => $bill['id'], 'old' => true);
			}
			$ordermoney = 0;
			$bonusordermoney = 0;
			$bonusmoney = 0;
			$pcondition = '';
			if (!(empty($openid))) 
			{
				$member = m('member')->getMember($openid);
				//$pcondition = 'AND finishtime>' . $member['partnertime'];
			}
			$orders = pdo_fetchall('select id,openid,price from ' . tablename('ewei_shop_order') . ' where uniacid=' . $_W['uniacid'] . ' and status=3 and isglobonus=0 and finishtime + ' . $settletimes . '>= ' . $starttime . ' and  finishtime + ' . $settletimes . '<=' . $endtime . ' ' . $pcondition, array(), 'id');
			$pcondition = '';
			if (!(empty($openid))) 
			{
				$pcondition = ' and m.openid=\'' . $openid . '\'';
			}
			$partners = pdo_fetchall('select m.id,m.openid,m.partnerlevel,l.bonus from ' . tablename('ewei_shop_member') . ' m ' . '  left join ' . tablename('ewei_shop_globonus_level') . ' l on l.id = m.partnerlevel ' . '  where m.uniacid=:uniacid and  m.ispartner=1 and m.partnerstatus=1 ' . $pcondition, array(':uniacid' => $_W['uniacid']));
			foreach ($partners as &$p ) 
			{
				if (empty($p['partnerlevel']) || ($p['bonus'] == NULL)) 
				{
					$p['bonus'] = floatval($set['bonus']);
				}
			}
			unset($p);
			foreach ($orders as $o ) 
			{
				$ordermoney += $o['price'];
				$bonusordermoney += ($o['price'] * $set['bonusrate']) / 100;
				foreach ($partners as &$p ) 
				{
					if (empty($set['selfbuy'])) 
					{
						if ($p['openid'] == $o['openid']) 
						{
							continue;
						}
					}
					$price = ($o['price'] * $set['bonusrate']) / 100;
					!(isset($p['bonusmoney'])) && ($p['bonusmoney'] = 0);
					$p['bonusmoney'] += floatval(($price * $p['bonus']) / 100);
				}
				unset($p);
			}
			foreach ($partners as &$p ) 
			{
				$bonusmoney_send = 0;
				$p['charge'] = 0;
				$p['chargemoney'] = 0;
				if ((floatval($set['paycharge']) <= 0) || ((floatval($set['paybegin']) <= $p['bonusmoney']) && ($p['bonusmoney'] <= floatval($set['payend'])))) 
				{
					$bonusmoney_send += round($p['bonusmoney'], 2);
				}
				else 
				{
					$bonusmoney_send += round($p['bonusmoney'] - (($p['bonusmoney'] * floatval($set['paycharge'])) / 100), 2);
					$p['charge'] = floatval($set['paycharge']);
					$p['chargemoney'] = round(($p['bonusmoney'] * floatval($set['paycharge'])) / 100, 2);
				}
				$p['bonusmoney_send'] = $bonusmoney_send;
				$bonusmoney += $bonusmoney_send;
			}
			unset($p);
			if ($bonusordermoney < $bonusmoney) 
			{
				$rat = $bonusordermoney / $bonusmoney;
				$bonusmoney = 0;
				foreach ($partners as &$p ) 
				{
					$p['chargemoney'] = round($p['chargemoney'] * $rat, 2);
					$p['bonusmoney_send'] = round($p['bonusmoney_send'] * $rat, 2);
					$bonusmoney += $p['bonusmoney_send'];
				}
				unset($p);
			}
			return array('orders' => $orders, 'partners' => $partners, 'ordermoney' => round($ordermoney, 2), 'bonusordermoney' => round($bonusordermoney, 2), 'bonusrate' => round($set['bonusrate'], 2), 'ordercount' => count($orders), 'bonusmoney' => round($bonusmoney, 2), 'partnercount' => count($partners), 'starttime' => $starttime, 'endtime' => $endtime, 'old' => false);
		}
		public function getTotals() 
		{
			global $_W;
			return array('total0' => pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_globonus_bill') . ' where uniacid=:uniacid and status=0 limit 1', array(':uniacid' => $_W['uniacid'])), 'total1' => pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_globonus_bill') . ' where uniacid=:uniacid and status=1 limit 1', array(':uniacid' => $_W['uniacid'])), 'total2' => pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_globonus_bill') . ' where uniacid=:uniacid and status=2  limit 1', array(':uniacid' => $_W['uniacid'])));
		}
	}
}
?>