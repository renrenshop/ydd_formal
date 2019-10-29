<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
define('SNS_CREDIT_POST', 0);
define('SNS_CREDIT_REPLY', 1);
define('SNS_CREDIT_TOP', 2);
define('SNS_CREDIT_TOP_CANCEL', 3);
define('SNS_CREDIT_TOP_BOARD', 4);
define('SNS_CREDIT_TOP_BOARD_CANCEL', 5);
define('SNS_CREDIT_BEST', 6);
define('SNS_CREDIT_BEST_CANCEL', 7);
define('SNS_CREDIT_BEST_BOARD_CANCEL', 8);
define('SNS_CREDIT_DELETE_POST', 9);
define('SNS_CREDIT_DELETE_REPLY', 10);
define('SNS_MESSAGE_REPLY', 20);
if (!(class_exists('SnsModel'))) 
{
	class SnsModel extends PluginModel 
	{
		public function checkMember() 
		{
			global $_W;
			global $_GPC;
			if (!(empty($_W['openid']))) 
			{
				$member = pdo_fetch('select * from ' . tablename('ewei_shop_sns_member') . ' where uniacid=:uniacid and openid=:openid limit 1', array(':uniacid' => $_W['uniacid'], ':openid' => $_W['openid']));
				if (empty($member)) 
				{
					$member = array('uniacid' => $_W['uniacid'], 'openid' => $_W['openid'], 'createtime' => time());
					pdo_insert('ewei_shop_sns_member', $member);
					return;
				}
				if (!(empty($member['isblack']))) 
				{
					show_message(''.$this->lang['lang_plugin_sns_core_model_0'].'!');
				}
			}
		}
		public function getMember($openid) 
		{
			global $_W;
			global $_GPC;
			$member = m('member')->getMember($openid);
			$sns_member = pdo_fetch('select * from ' . tablename('ewei_shop_sns_member') . ' where uniacid=:uniacid and openid=:openid limit 1', array(':uniacid' => $_W['uniacid'], ':openid' => $member['openid']));
			if (empty($sns_member)) 
			{
				$member['sns_credit'] = 0;
				$member['sns_level'] = 0;
				$member['notupgrade'] = 0;
			}
			else 
			{
				$member['sns_id'] = $sns_member['id'];
				$member['sns_credit'] = $sns_member['credit'];
				$member['sns_level'] = $sns_member['level'];
				$member['sns_sign'] = $sns_member['sign'];
				$member['sns_notupgrade'] = $sns_member['notupgrade'];
			}
			return $member;
		}
		public function getCategory($all = true) 
		{
			global $_W;
			$condition = (($all ? '' : ' and `status` = 1'));
			return pdo_fetchall('select * from ' . tablename('ewei_shop_sns_category') . ' where uniacid=:uniacid ' . $condition . ' and enabled = 1 order by displayorder desc', array(':uniacid' => $_W['uniacid']), 'id');
		}
		public function getBoard($bid = '0') 
		{
			global $_W;
			return pdo_fetch('select * from ' . tablename('ewei_shop_sns_board') . ' where uniacid=:uniacid and id=:id  limit 1', array(':uniacid' => $_W['uniacid'], ':id' => $bid));
		}
		public function getPost($pid = '0') 
		{
			global $_W;
			return pdo_fetch('select * from ' . tablename('ewei_shop_sns_post') . ' where uniacid=:uniacid and id=:id  limit 1', array(':uniacid' => $_W['uniacid'], ':id' => $pid));
		}
		public function isManager($bid = 0, $openid = '') 
		{
			global $_W;
			if (empty($openid)) 
			{
				$openid = $_W['openid'];
			}
			$count = pdo_fetchcolumn('select count(*)  from ' . tablename('ewei_shop_sns_manage') . ' where uniacid=:uniacid and bid=:bid and openid=:openid limit 1', array(':uniacid' => $_W['uniacid'], ':bid' => $bid, ':openid' => $openid));
			return 0 < $count;
		}
		public function isSuperManager($openid = '') 
		{
			global $_W;
			if (empty($openid)) 
			{
				$openid = $_W['openid'];
			}
			$set = $this->getSet();
			$managers = explode(',', $set['managers']);
			return in_array($openid, $managers);
		}
		public function getPostCount($bid) 
		{
			global $_W;
			return pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_sns_post') . "\n" . '            where uniacid=:uniacid and bid=:bid and pid=0 and deleted = 0 limit 1', array(':uniacid' => $_W['uniacid'], ':bid' => $bid));
		}
		public function getFollowCount($bid) 
		{
			global $_W;
			return pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_sns_board_follow') . "\n" . '            where uniacid=:uniacid and bid=:bid limit 1', array(':uniacid' => $_W['uniacid'], ':bid' => $bid));
		}
		public function isFollow($bid) 
		{
			global $_W;
			$count = pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_sns_board_follow') . ' where uniacid=:uniacid and bid=:bid and openid=:openid limit 1', array(':uniacid' => $_W['uniacid'], ':bid' => $bid, ':openid' => $_W['openid']));
			return 0 < $count;
		}
		public function getTops($bid = 0) 
		{
			global $_W;
			$condition = ' and ( istop=1';
			if (!(empty($bid))) 
			{
				$condition .= ' or (isboardtop=1 and bid=' . intval($bid) . ')';
			}
			$condition .= ')';
			return pdo_fetchall('select id,title,istop,isboardtop from ' . tablename('ewei_shop_sns_post') . ' where uniacid=:uniacid ' . $condition . ' and pid=0 and deleted=0  order by istop desc,replytime desc', array(':uniacid' => $_W['uniacid']));
		}
		public function setCredit($openid = '', $bid = 0, $type = -1) 
		{
			$board = $this->getBoard($bid);
			if (empty($board)) 
			{
				return;
			}
			$credit = 0;
			$log = '';
			if (($type == SNS_CREDIT_POST) || ($type == SNS_CREDIT_DELETE_POST)) 
			{
				$credit = $board['postcredit'];
				$log = ''.$this->lang['lang_plugin_sns_core_model_1'].': +' . $credit;
				if ($type == SNS_CREDIT_DELETE_POST) 
				{
					$credit = -$credit;
					$log = ''.$this->lang['lang_plugin_sns_core_model_2'].': -' . abs($credit);
				}
			}
			else 
			{
				if (($type == SNS_CREDIT_REPLY) || ($type == SNS_CREDIT_DELETE_REPLY)) 
				{
					$credit = $board['replycredit'];
					$log = ''.$this->lang['lang_plugin_sns_core_model_3'].': +' . $credit;
					if ($type == SNS_CREDIT_DELETE_REPLY) 
					{
						$log = ''.$this->lang['lang_plugin_sns_core_model_4'].': -' . abs($credit);
						$credit = -$credit;
					}
				}
				else 
				{
					if (($type == SNS_CREDIT_TOP) || ($type == SNS_CREDIT_TOP_CANCEL)) 
					{
						$credit = $board['topcredit'];
						$log = ''.$this->lang['lang_plugin_sns_core_model_5'].': +' . $credit;
						if ($type == SNS_CREDIT_TOP_CANCEL) 
						{
							$credit = -$credit;
							$log = ''.$this->lang['lang_plugin_sns_core_model_6'].': ' . abs($credit);
						}
					}
					else 
					{
						if (($type == SNS_CREDIT_TOP_BOARD) || ($type == SNS_CREDIT_TOP_BOARD_CANCEL)) 
						{
							$credit = $board['topboardcredit'];
							$log = ''.$this->lang['lang_plugin_sns_core_model_7'].': +' . $credit;
							if ($type == SNS_CREDIT_TOP_BOARD_CANCEL) 
							{
								$credit = -$credit;
								$log = ''.$this->lang['lang_plugin_sns_core_model_8'].': -' . abs($credit);
							}
						}
						else 
						{
							if (($type == SNS_CREDIT_BEST) || ($type == SNS_CREDIT_BEST_CANCEL)) 
							{
								$credit = $board['bestcredit'];
								$log = ''.$this->lang['lang_plugin_sns_core_model_9'].': +' . $credit;
								if ($type == SNS_CREDIT_TOP_BOARD_CANCEL) 
								{
									$credit = -$credit;
									$log = ''.$this->lang['lang_plugin_sns_core_model_10'].': -' . abs($credit);
								}
							}
							else 
							{
								if (($type == SNS_CREDIT_BEST_BOARD) || ($type == SNS_CREDIT_BEST_BOARD_CANCEL)) 
								{
									$credit = $board['bestboardcredit'];
									$log = ''.$this->lang['lang_plugin_sns_core_model_11'].': +' . $credit;
									if ($type == SNS_CREDIT_BEST_BOARD_CANCEL) 
									{
										$credit = -$credit;
										$log = ''.$this->lang['lang_plugin_sns_core_model_12'].': -' . abs($credit);
									}
								}
							}
						}
					}
				}
			}
			if (0 < abs($credit)) 
			{
				m('member')->setCredit($openid, 'credit1', $credit, array(0, $log));
				$member = $this->getMember($openid);
				$newcredit = $member['sns_credit'] + $credit;
				if ($newcredit <= 0) 
				{
					$newcredit = 0;
				}
				pdo_update('ewei_shop_sns_member', array('credit' => $newcredit), array('id' => $member['sns_id']));
				$this->upgradeLevel($openid);
			}
		}
		public function getLevel($openid) 
		{
			global $_W;
			global $_S;
			if (empty($openid)) 
			{
				return false;
			}
			$member = $this->getMember($openid);
			if (!(empty($member)) && !(empty($member['sns_level']))) 
			{
				$level = pdo_fetch('select * from ' . tablename('ewei_shop_sns_level') . ' where id=:id and uniacid=:uniacid limit 1', array(':id' => $member['sns_level'], ':uniacid' => $_W['uniacid']));
				if (!(empty($level))) 
				{
					return $level;
				}
			}
			return array('levelname' => (empty($set['levelname']) ? ''.$this->lang['lang_plugin_sns_core_model_13'].'' : $set['levelname']), 'color' => (empty($set['levelcolor']) ? '#333' : $set['levelcolor']), 'bg' => (empty($set['levelbg']) ? '#eee' : $set['levelbg']));
		}
		public function upgradeLevel($openid) 
		{
			global $_W;
			$member = $this->getMember($openid);
			if ($member['sns_notupgrade']) 
			{
				return;
			}
			$credit = $member['sns_credit'];
			$set = $this->getSet();
			$leveltype = intval($set['leveltype']);
			$level = false;
			if (empty($leveltype)) 
			{
				$level = pdo_fetch('select * from ' . tablename('ewei_shop_sns_level') . ' where uniacid=:uniacid  and enabled=1 and ' . $credit . ' >= credit and credit>0  order by credit desc limit 1', array(':uniacid' => $_W['uniacid']));
			}
			else if ($leveltype == 1) 
			{
				$post = pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_sns_post') . ' where uniacid=:uniacid and openid=:openid and pid=0 and checked=1', array(':uniacid' => $_W['uniacid'], ':openid' => $_W['openid']));
				$level = pdo_fetch('select * from ' . tablename('ewei_shop_sns_level') . ' where uniacid=:uniacid and enabled=1 and ' . $post . ' >= `post` and `post`>0  order by `post` desc limit 1', array(':uniacid' => $_W['uniacid']));
			}
			if (empty($level)) 
			{
				return;
			}
			if ($level['id'] == $member['sns_level']) 
			{
				return;
			}
			$oldlevel = $this->getLevel($openid);
			$canupgrade = false;
			if (empty($oldlevel['id'])) 
			{
				$canupgrade = true;
			}
			else if (empty($leveltype)) 
			{
				if ($oldlevel['credit'] < $level['credit']) 
				{
					$canupgrade = true;
				}
			}
			else if ($oldlevel['post'] < $level['post']) 
			{
				$canupgrade = true;
			}
			if ($canupgrade) 
			{
				pdo_update('ewei_shop_sns_member', array('level' => $level['id']), array('id' => $member['sns_id']));
				$this->sendMemberUpgradeMessage($openid, $member['nickname'], $oldlevel, $level);
			}
		}
		public function sendMemberUpgradeMessage($openid, $nickname, $oldlevel, $level) 
		{
			$set = $this->getSet();
			$tm = $set['tm'];
			if (empty($tm['upgrade_content'])) 
			{
				return;
			}
			$message = $tm['upgrade_content'];
			$message = str_replace('['.$this->lang['lang_plugin_sns_core_model_14'].']', $nickname, $message);
			$message = str_replace('['.$this->lang['lang_plugin_sns_core_model_15'].']', $oldlevel['levelname'], $message);
			$message = str_replace('['.$this->lang['lang_plugin_sns_core_model_16'].']', $level['levelname'], $message);
			$message = str_replace('['.$this->lang['lang_plugin_sns_core_model_17'].']', date('Y-m-d H:i:s', time()), $message);
			$msg = array( 'keyword1' => array('value' => (!(empty($tm['upgrade_title'])) ? $tm['upgrade_title'] : ''.$this->lang['lang_plugin_sns_core_model_18'].''), 'color' => '#73a68d'), 'keyword2' => array('value' => $message, 'color' => '#73a68d') );
			if (!(empty($tm['templateid']))) 
			{
				m('message')->sendTplNotice($openid, $tm['templateid'], $msg);
				return;
			}
			m('message')->sendCustomNotice($openid, $msg);
		}
		public function sendReplyMessage($openid, $data) 
		{
			$set = $this->getSet();
			$tm = $set['tm'];
			if (empty($tm['reply_content'])) 
			{
				return;
			}
			$message = $tm['reply_content'];
			$message = str_replace('['.$this->lang['lang_plugin_sns_core_model_19'].']', $data['nickname'], $message);
			$message = str_replace('['.$this->lang['lang_plugin_sns_core_model_20'].']', $data['boardtitle'], $message);
			$message = str_replace('['.$this->lang['lang_plugin_sns_core_model_21'].']', $data['posttitle'], $message);
			$message = str_replace('['.$this->lang['lang_plugin_sns_core_model_22'].']', $data['content'], $message);
			$message = str_replace('['.$this->lang['lang_plugin_sns_core_model_23'].']', date('Y-m-d H:i:s', $data['createtime']), $message);
			$msg = array( 'keyword1' => array('value' => (!(empty($tm['reply_title'])) ? $tm['reply_title'] : ''.$this->lang['lang_plugin_sns_core_model_24'].''), 'color' => '#73a68d'), 'keyword2' => array('value' => $message, 'color' => '#73a68d') );
			$url = mobileUrl('sns/post', array('id' => $data['id']), true);
			if (!(empty($tm['templateid']))) 
			{
				m('message')->sendTplNotice($openid, $tm['templateid'], $msg, $url);
				return;
			}
			m('message')->sendCustomNotice($openid, $msg, $url);
		}
		public function timeBefore($the_time) 
		{
			$now_time = time();
			$dur = $now_time - $the_time;
			if ($dur < 0) 
			{
				return $the_time;
			}
			if ($dur < 60) 
			{
				return ''.$this->lang['lang_plugin_sns_core_model_25'].'';
			}
			if ($dur < 3600) 
			{
				return floor($dur / 60) . ''.$this->lang['lang_plugin_sns_core_model_26'].'';
			}
			if ($dur < 86400) 
			{
				return floor($dur / 3600) . ''.$this->lang['lang_plugin_sns_core_model_27'].'';
			}
			if ($dur < 259200) 
			{
				return floor($dur / 86400) . ''.$this->lang['lang_plugin_sns_core_model_28'].'';
			}
			return date('m-d', $the_time);
		}
		public function getLevels($all = true) 
		{
			global $_W;
			$condition = '';
			if (!($all)) 
			{
				$condition = ' and enabled=1';
			}
			return pdo_fetchall('select * from ' . tablename('ewei_shop_sns_level') . ' where uniacid=:uniacid' . $condition . ' order by id asc', array(':uniacid' => $_W['uniacid']));
		}
		public function replaceContent($content) 
		{
			return str_replace("\n", '<br/>', preg_replace('/\\[EM(\\w+)\\]/', '<img src="../addons/ewei_shopv2/plugin/sns/static/images/face/${1}.gif" class="emoji" />', $content));
		}
		public function check($member, $board, $isPost = false) 
		{
			global $_W;
			global $_GPC;
			$levelid = $member['level'];
			$groupid = $member['groupid'];
			$levels = (($isPost ? $board['postlevels'] : $board['showlevels']));
			if ($levels != '') 
			{
				$arr = explode(',', $levels);
				if (!(in_array($levelid, $arr))) 
				{
					if ($_W['isajax']) 
					{
						return error(-1, ''.$this->lang['lang_plugin_sns_core_model_29'].'');
					}
					return error(-1, ''.$this->lang['lang_plugin_sns_core_model_30'].'');
				}
			}
			$levels = (($isPost ? $board['postgroups'] : $board['showgroups']));
			if ($levels != '') 
			{
				$arr = explode(',', $levels);
				if (!(in_array($groupid, $arr))) 
				{
					if ($_W['isajax']) 
					{
						return error(-1, ''.$this->lang['lang_plugin_sns_core_model_31'].'');
					}
					return error(-1, ''.$this->lang['lang_plugin_sns_core_model_32'].'');
				}
			}
			$levels = (($isPost ? $board['postsnslevels'] : $board['showsnslevels']));
			if ($levels) 
			{
				$arr = explode(',', $levels);
				if (!(in_array($member['sns_level'], $arr))) 
				{
					if ($_W['isajax']) 
					{
						return error(-1, ''.$this->lang['lang_plugin_sns_core_model_33'].'');
					}
					return error(-1, ''.$this->lang['lang_plugin_sns_core_model_34'].'');
				}
			}
			$plugin_commission = p('commission');
			if ($plugin_commission) 
			{
				$set = $plugin_commission->getSet();
				if (!(empty($board['notagent']))) 
				{
					if (!($member['status']) && !($member['isagent'])) 
					{
						if ($_W['isajax']) 
						{
							return error(-1, ''.$this->lang['lang_plugin_sns_core_model_35'].'' . $set['texts']['agent']);
						}
						return error(-1, ''.$this->lang['lang_plugin_sns_core_model_36'].'' . $set['texts']['agent'] . ''.$this->lang['lang_plugin_sns_core_model_37'].'');
					}
				}
				$levels = (($isPost ? $board['postagentlevels'] : $board['showagentlevels']));
				if ($levels) 
				{
					$arr = explode(',', $levels);
					if (!(in_array($member['agentlevel'], $arr))) 
					{
						if ($_W['isajax']) 
						{
							return error(-1, $set['texts']['agent'] . ''.$this->lang['lang_plugin_sns_core_model_38'].'');
						}
						return error(-1, ''.$this->lang['lang_plugin_sns_core_model_39'].'' . $set['texts']['agent'] . ''.$this->lang['lang_plugin_sns_core_model_40'].'');
					}
				}
			}
			$plugin_globonus = p('globonus');
			if ($plugin_globonus) 
			{
				$set = $plugin_globonus->getSet();
				if (!(empty($board['notpartner']))) 
				{
					if (!($member['partnerstatus']) && !($member['ispartner'])) 
					{
						if ($_W['isajax']) 
						{
							return error(-1, ''.$this->lang['lang_plugin_sns_core_model_41'].'' . $set['texts']['partner']);
						}
						return error(-1, ''.$this->lang['lang_plugin_sns_core_model_42'].'' . $set['texts']['partner'] . ''.$this->lang['lang_plugin_sns_core_model_43'].'');
					}
				}
				$levels = (($isPost ? $board['postpartnerlevels'] : $board['showaagentlevels']));
				if ($levels) 
				{
					$arr = explode(',', $levels);
					if (!(in_array($member['aagentlevel'], $arr))) 
					{
						if ($_W['isajax']) 
						{
							return error(-1, $set['texts']['partner'] . ''.$this->lang['lang_plugin_sns_core_model_44'].'');
						}
						return error(-1, ''.$this->lang['lang_plugin_sns_core_model_45'].'' . $set['texts']['partner'] . ''.$this->lang['lang_plugin_sns_core_model_46'].'');
					}
				}
			}
			return true;
		}
		public function getAvatar($avatar = '') 
		{
			if (empty($avatar)) 
			{
				$set = $this->getSet();
				$avatar = ((empty($set['head']) ? '../addons/ewei_shopv2/plugin/sns/static/images/head.jpg' : tomedia($set['head'])));
			}
			return $avatar;
		}
	}
}
?>