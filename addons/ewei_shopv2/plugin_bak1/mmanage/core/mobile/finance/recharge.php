<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
require EWEI_SHOPV2_PLUGIN . 'mmanage/core/inc/page_mmanage.php';
class Recharge_EweiShopV2Page extends MmanageMobilePage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);
		$type = intval($_GPC['type']);
		if (empty($id)) 
		{
			if ($_W['isajax']) 
			{
				show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_recharge_0'].'');
			}
			else 
			{
				$this->message(''.$this->lang['lang_plugin_mmanage_core_mobile_finance_recharge_1'].'');
			}
		}
		$typestr = (($type == 1 ? 'credit1' : 'credit2'));
		ca('finance.recharge.' . $typestr);
		$member = m('member')->getMember($id);
		if (empty($member)) 
		{
			if ($_W['isajax']) 
			{
				show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_recharge_2'].'');
			}
			else 
			{
				$this->message(''.$this->lang['lang_plugin_mmanage_core_mobile_finance_recharge_3'].'');
			}
		}
		if ($_W['ispost']) 
		{
			$type = (($type == 1 ? 'credit1' : 'credit2'));
			ca('finance.recharge.' . $type);
			$typestr = (($type == 'credit1' ? ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_recharge_4'].'' : ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_recharge_5'].''));
			$num = floatval($_GPC['num']);
			$remark = trim($_GPC['remark']);
			if ($num <= 0) 
			{
				show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_recharge_6'].'0'.$this->lang['lang_plugin_mmanage_core_mobile_finance_recharge_7'].'');
			}
			$changetype = intval($_GPC['changetype']);
			if ($changetype == 2) 
			{
				$num -= $member[$type];
			}
			else if ($changetype == 1) 
			{
				$num = -$num;
			}
			m('member')->setCredit($member['openid'], $type, $num, array($_W['uid'], ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_recharge_8'].'' . $typestr . ' ' . $remark));
			$changetype = 0;
			$changenum = 0;
			if (0 <= $num) 
			{
				$changetype = 0;
				$changenum = $num;
			}
			else 
			{
				$changetype = 1;
				$changenum = -$num;
			}
			if ($type == 'credit1') 
			{
				m('notice')->sendMemberPointChange($member['openid'], $changenum, $changetype);
			}
			else if ($type == 'credit2') 
			{
				$set = m('common')->getSysset('shop');
				$logno = m('common')->createNO('member_log', 'logno', 'RC');
				$data = array('openid' => $member['openid'], 'logno' => $logno, 'uniacid' => $_W['uniacid'], 'type' => '0', 'createtime' => TIMESTAMP, 'status' => '1', 'title' => $set['name'] . ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_recharge_9'].'', 'money' => $num, 'remark' => $remark, 'rechargetype' => 'system');
				pdo_insert('ewei_shop_member_log', $data);
				$logid = pdo_insertid();
				m('notice')->sendMemberLogMessage($logid, 0, true);
			}
			plog('finance.recharge.' . $type, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_recharge_10'].'' . $typestr . ': ' . $_GPC['num'] . ' <br/>'.$this->lang['lang_plugin_mmanage_core_mobile_finance_recharge_11'].': ID: ' . $member['id'] . ' /  ' . $member['openid'] . '/' . $member['nickname'] . '/' . $member['realname'] . '/' . $member['mobile']);
			show_json(1, array('url' => referer()));
			show_json(1);
		}
		include $this->template();
	}
}
?>