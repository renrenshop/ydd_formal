<?php
error_reporting(0);
require '../../../../../framework/bootstrap.inc.php';
require '../../../../../addons/ewei_shopv2/defines.php';
require '../../../../../addons/ewei_shopv2/core/inc/functions.php';
global $_W;
global $_GPC;
ignore_user_abort();
set_time_limit(0);
$sets = pdo_fetchall('select uniacid,refund from ' . tablename('ewei_shop_groups_set'));
foreach ($sets as $key => $value ) 
{
	global $_W;
	global $_GPC;
	global $_S;
	$_W['uniacid'] = $value['uniacid'];
	$shopset = $_S['shop'];
	$_W['uniacid'] = $value['uniacid'];
	if (empty($_W['uniacid'])) 
	{
		continue;
	}
	$hours = intval($value['refund']);
	if ($hours <= 0) 
	{
		continue;
	}
	$times = $hours * 60 * 60;
	$orders = pdo_fetchall('select id,orderno,openid,credit,creditmoney,price,freight,status,pay_type,teamid,apppay,isborrow,borrowopenid from ' . tablename('ewei_shop_groups_order') . "\n" . '            where  uniacid=' . $_W['uniacid'] . ' and status = 1 and success = -1 and refundtime = 0 and canceltime + ' . $times . ' <= ' . time() . ' ');
	foreach ($orders as $k => $val ) 
	{
		$realprice = ($val['price'] - $val['creditmoney']) + $val['freight'];
		$credits = $val['credit'];
		if ($val['pay_type'] == 'credit') 
		{
			$result = m('member')->setCredit($val['openid'], 'credit2', $realprice, array(0, $shopset['name'] . ''.$this->lang['lang_plugin_groups_task_refund_0'].': ' . $realprice . ''.$this->lang['lang_plugin_groups_task_refund_1'].' '.$this->lang['lang_plugin_groups_task_refund_2'].': ' . $val['orderno']));
		}
		else if ($val['pay_type'] == 'wechat') 
		{
			$realprice = round($realprice, 2);
			if (empty($val['isborrow'])) 
			{
				$result = m('finance')->refund($val['openid'], $val['orderno'], $val['orderno'], $realprice * 100, $realprice * 100, (!(empty($order['apppay'])) ? true : false));
			}
			else 
			{
				$result = m('finance')->refundBorrow($val['borrowopenid'], $val['orderno'], $val['orderno'], $realprice * 100, $realprice * 100, (!(empty($order['apppay'])) ? true : false));
			}
			$refundtype = 2;
		}
		else 
		{
			if ($realprice < 1) 
			{
				show_json(0, ''.$this->lang['lang_plugin_groups_task_refund_3'].'1'.$this->lang['lang_plugin_groups_task_refund_4'].'!');
			}
			$result = m('finance')->pay($val['openid'], 1, $realprice * 100, $val['orderno'], $shopset['name'] . ''.$this->lang['lang_plugin_groups_task_refund_5'].': ' . $realprice . ''.$this->lang['lang_plugin_groups_task_refund_6'].' '.$this->lang['lang_plugin_groups_task_refund_7'].': ' . $val['orderno']);
			$refundtype = 1;
		}
		if (is_error($result)) 
		{
			return;
		}
		if (0 < $credits) 
		{
			m('member')->setCredit($val['openid'], 'credit1', $credits, array('0', $shopset['name'] . ''.$this->lang['lang_plugin_groups_task_refund_8'].' '.$this->lang['lang_plugin_groups_task_refund_9'].': ' . $val['credit'] . ' '.$this->lang['lang_plugin_groups_task_refund_10'].': ' . $val['creditmoney'] . ' '.$this->lang['lang_plugin_groups_task_refund_11'].': ' . $val['orderno']));
		}
		pdo_update('ewei_shop_groups_order', array('refundstate' => 0, 'status' => -1, 'refundtime' => time()), array('id' => $val['id'], 'uniacid' => $_W['uniacid']));
		$sales = pdo_fetch('select id,sales,stock from ' . tablename('ewei_shop_groups_goods') . ' where id = :id and uniacid = :uniacid ', array(':id' => $val['goodid'], ':uniacid' => $uniacid));
		pdo_update('ewei_shop_groups_goods', array('sales' => $sales['sales'] - 1, 'stock' => $sales['stock'] + 1), array('id' => $sales['id'], 'uniacid' => $uniacid));
		plog('groups.task.refund', ''.$this->lang['lang_plugin_groups_task_refund_12'].' ID: ' . $val['id'] . ' '.$this->lang['lang_plugin_groups_task_refund_13'].': ' . $val['orderno']);
	}
}
?>