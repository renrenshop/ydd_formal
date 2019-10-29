<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
require EWEI_SHOPV2_PLUGIN . 'mmanage/core/inc/page_mmanage.php';
class Index_EweiShopV2Page extends MmanageMobilePage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$type = intval($_GPC['type']);
		if (($type == 0) && !(cv('finance.log.recharge'))) 
		{
			$this->message(''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_0'].'');
		}
		else if (($type == 1) && !(cv('finance.log.withdraw'))) 
		{
			$this->message(''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_1'].'');
		}
		else if (($type == 2) && !(cv('finance.credit.credit1'))) 
		{
			$this->message(''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_2'].'');
		}
		else if (($type == 3) && !(cv('finance.credit.credit2'))) 
		{
			$this->message(''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_3'].'');
		}
		include $this->template();
	}
	public function getlist() 
	{
		global $_W;
		global $_GPC;
		$type = intval($_GPC['type']);
		if (($type == 0) || ($type == 1)) 
		{
			if (($type == 0) && !(cv('finance.log.recharge'))) 
			{
				show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_4'].'');
			}
			else if (($type == 1) && !(cv('finance.log.withdraw'))) 
			{
				show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_5'].'');
			}
			$this->log($type);
		}
		else 
		{
			if (($type == 2) || ($type == 3)) 
			{
				if (($type == 2) && !(cv('finance.credit.credit1'))) 
				{
					show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_6'].'');
				}
				else if (($type == 3) && !(cv('finance.credit.credit2'))) 
				{
					show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_7'].'');
				}
				$this->credit($type);
			}
		}
	}
	protected function log($type) 
	{
		global $_W;
		global $_GPC;
		$pindex = max(1, intval($_GPC['page']));
		$psize = 10;
		$condition = ' and log.uniacid=:uniacid and m.uniacid=:uniacid and log.type=:type and log.money<>0';
		$params = array(':uniacid' => $_W['uniacid'], ':type' => $type);
		if (!(empty($_GPC['keyword']))) 
		{
			$_GPC['keyword'] = trim($_GPC['keyword']);
			$condition .= ' and (m.realname like :keyword or m.nickname like :keyword or m.mobile like :keyword) or log.logno like :keyword';
			$params[':keyword'] = '%' . $_GPC['keyword'] . '%';
		}
		if (!(empty($_GPC['id']))) 
		{
			$condition .= ' and m.id=' . intval($_GPC['id']);
		}
		if (!(empty($_GPC['level']))) 
		{
			$condition .= ' and m.level=' . intval($_GPC['level']);
		}
		if (!(empty($_GPC['groupid']))) 
		{
			$condition .= ' and m.groupid=' . intval($_GPC['groupid']);
		}
		if (!(empty($_GPC['rechargetype']))) 
		{
			$_GPC['rechargetype'] = trim($_GPC['rechargetype']);
			if ($_GPC['rechargetype'] == 'system1') 
			{
				$condition .= ' AND log.rechargetype=\'system\' and log.money<0';
			}
			else 
			{
				$condition .= ' AND log.rechargetype=:rechargetype';
				$params[':rechargetype'] = $_GPC['rechargetype'];
			}
		}
		if ($_GPC['status'] != '') 
		{
			$condition .= ' and log.status=' . intval($_GPC['status']);
		}
		$sql = 'select log.id,m.id as mid, m.realname,m.avatar,m.weixin,log.logno,log.type,log.status,log.rechargetype,log.sendmoney,m.nickname,m.mobile,g.groupname,log.money,log.createtime,l.levelname,log.realmoney,log.deductionmoney,log.charge,log.remark,log.alipay,log.bankname,log.bankcard,log.realname as applyrealname,log.applytype,log.apppay from ' . tablename('ewei_shop_member_log') . ' log ' . ' left join ' . tablename('ewei_shop_member') . ' m on m.openid=log.openid' . ' left join ' . tablename('ewei_shop_member_group') . ' g on m.groupid=g.id' . ' left join ' . tablename('ewei_shop_member_level') . ' l on m.level =l.id' . ' where 1 ' . $condition . ' ORDER BY log.createtime DESC ';
		if (empty($_GPC['export'])) 
		{
			$sql .= 'LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize;
		}
		$list = pdo_fetchall($sql, $params);
		$list = set_medias($list, 'avatar');
		$apply_type = array(0 => ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_8'].'', 2 => ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_9'].'', 3 => ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_10'].'');
		if (!(empty($list))) 
		{
			foreach ($list as $key => $value ) 
			{
				$list[$key]['typestr'] = $apply_type[$value['applytype']];
				if ($value['deductionmoney'] == 0) 
				{
					$list[$key]['realmoney'] = $value['money'];
				}
				$list[$key]['createtime'] = date('Y/m/d H:i:s', $value['createtime']);
			}
		}
		$total = pdo_fetchcolumn('select count(*) from ' . tablename('ewei_shop_member_log') . ' log ' . ' left join ' . tablename('ewei_shop_member') . ' m on m.openid=log.openid and m.uniacid= log.uniacid' . ' left join ' . tablename('ewei_shop_member_group') . ' g on m.groupid=g.id' . ' left join ' . tablename('ewei_shop_member_level') . ' l on m.level =l.id' . ' where 1 ' . $condition . ' ', $params);
		show_json(1, array('list' => $list, 'total' => $total, 'pagesize' => $psize));
	}
	protected function credit($type) 
	{
		global $_W;
		global $_GPC;
		$type = (($type == 2 ? 'credit1' : 'credit2'));
		$pindex = max(1, intval($_GPC['page']));
		$psize = 20;
		$condition = ' and log.uniacid=:uniacid and log.module=:module and m.uniacid=:uniacid  and log.credittype=:credittype';
		$params = array(':uniacid' => $_W['uniacid'], ':module' => 'ewei_shopv2', ':credittype' => $type);
		if (!(empty($_GPC['keyword']))) 
		{
			$_GPC['keyword'] = trim($_GPC['keyword']);
			$condition .= ' and (m.realname like :keyword or m.nickname like :keyword or m.mobile like :keyword or u.username like :keyword)';
			$params[':keyword'] = '%' . $_GPC['keyword'] . '%';
		}
		if (!(empty($_GPC['id']))) 
		{
			$condition .= ' and m.id=' . intval($_GPC['id']);
		}
		if (!(empty($_GPC['level']))) 
		{
			$condition .= ' and m.level=' . intval($_GPC['level']);
		}
		if (!(empty($_GPC['groupid']))) 
		{
			$condition .= ' and m.groupid=' . intval($_GPC['groupid']);
		}
		$sql = 'select log.*,m.id as mid, m.realname,m.avatar,m.nickname,m.avatar, m.mobile, m.weixin,u.username from ' . tablename('mc_credits_record') . ' log ' . ' left join ' . tablename('users') . ' u on log.operator<>0 and log.operator<>log.uid and  log.operator=u.uid' . ' left join ' . tablename('ewei_shop_member') . ' m on m.uid=log.uid' . ' left join ' . tablename('ewei_shop_member_group') . ' g on m.groupid=g.id' . ' left join ' . tablename('ewei_shop_member_level') . ' l on m.level =l.id' . ' where 1 ' . $condition . ' ORDER BY log.createtime DESC ';
		if (empty($_GPC['export'])) 
		{
			$sql .= 'LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize;
		}
		$list = pdo_fetchall($sql, $params);
		$list = set_medias($list, 'avatar');
		if (!(empty($list))) 
		{
			foreach ($list as $index => &$item ) 
			{
				$item['createtime'] = date('Y/m/d H:i:s', $item['createtime']);
			}
			unset($item);
		}
		$total = pdo_fetchcolumn('select count(*) from ' . tablename('mc_credits_record') . ' log ' . ' left join ' . tablename('users') . ' u on log.operator<>0 and log.operator<>log.uid and  log.operator=u.uid' . ' left join ' . tablename('ewei_shop_member') . ' m on m.uid=log.uid' . ' left join ' . tablename('ewei_shop_member_group') . ' g on m.groupid=g.id' . ' left join ' . tablename('ewei_shop_member_level') . ' l on m.level =l.id' . ' where 1 ' . $condition . ' ', $params);
		show_json(1, array('list' => $list, 'total' => $total, 'pagesize' => $psize));
	}
	public function refund() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('finance.log.refund'))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_11'].'');
		}
		$set = $_W['shopset']['shop'];
		$id = intval($_GPC['id']);
		$log = pdo_fetch('select * from ' . tablename('ewei_shop_member_log') . ' where id=:id and uniacid=:uniacid limit 1', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		if (empty($log)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_12'].'!');
		}
		if (!(empty($log['type']))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_13'].'!');
		}
		if ($log['rechargetype'] == 'system') 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_14'].'!');
		}
		$current_credit = m('member')->getCredit($log['openid'], 'credit2');
		if ($current_credit < $log['money']) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_15'].'!');
		}
		$out_refund_no = 'RR' . substr($log['logno'], 2);
		if ($log['rechargetype'] == 'wechat') 
		{
			if (empty($log['isborrow'])) 
			{
				$result = m('finance')->refund($log['openid'], $log['logno'], $out_refund_no, $log['money'] * 100, $log['money'] * 100, (!(empty($log['apppay'])) ? true : false));
			}
			else 
			{
				$result = m('finance')->refundBorrow($log['openid'], $log['logno'], $out_refund_no, $log['money'] * 100, $log['money'] * 100);
			}
		}
		else if ($log['rechargetype'] == 'alipay') 
		{
			$sec = m('common')->getSec();
			$sec = iunserializer($sec['sec']);
			if (!(empty($log['apppay']))) 
			{
				if (empty($sec['app_alipay']['private_key']) || empty($sec['app_alipay']['appid'])) 
				{
					show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_16'].'APPID'.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_17'].'!');
				}
				$params = array('out_trade_no' => $log['logno'], 'refund_amount' => $log['money'], 'refund_reason' => ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_18'].': ' . $log['money'] . ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_19'].' '.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_20'].': ' . $log['logno'] . '/' . $out_refund_no);
				$config = array('app_id' => $sec['app_alipay']['appid'], 'privatekey' => $sec['app_alipay']['private_key'], 'publickey' => '', 'alipublickey' => '');
				$result = m('finance')->newAlipayRefund($params, $config);
			}
			else 
			{
				show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_21'].'PC'.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_22'].'');
			}
		}
		else 
		{
			$result = m('finance')->pay($log['openid'], 1, $log['money'] * 100, $out_refund_no, $set['name'] . ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_23'].'');
		}
		if (is_error($result)) 
		{
			show_json(0, $result['message']);
		}
		pdo_update('ewei_shop_member_log', array('status' => 3), array('id' => $id, 'uniacid' => $_W['uniacid']));
		$refundmoney = $log['money'] + $log['gives'];
		m('member')->setCredit($log['openid'], 'credit2', -$refundmoney, array(0, $set['name'] . ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_24'].''));
		$money = com_run('sale::getCredit1', $log['openid'], (double) $log['money'], 21, 2, 1);
		if (0 < $money) 
		{
			m('notice')->sendMemberPointChange($log['openid'], $money, 1);
		}
		m('notice')->sendMemberLogMessage($log['id']);
		$member = m('member')->getMember($log['openid']);
		plog('finance.log.refund', ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_25'].' ID: ' . $log['id'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_26'].': ' . $log['money'] . ' <br/>'.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_27'].':  ID: ' . $member['id'] . ' / ' . $member['openid'] . '/' . $member['nickname'] . '/' . $member['realname'] . '/' . $member['mobile']);
		show_json(1, array('url' => referer()));
	}
	public function alipay() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('finance.log.alipay'))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_28'].'');
		}
		show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_29'].'PC'.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_30'].'');
	}
	public function manual() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('finance.log.manual'))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_31'].'');
		}
		$id = intval($_GPC['id']);
		$log = pdo_fetch('select * from ' . tablename('ewei_shop_member_log') . ' where id=:id and uniacid=:uniacid limit 1', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		if (empty($log)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_32'].'!');
		}
		$member = m('member')->getMember($log['openid']);
		pdo_update('ewei_shop_member_log', array('status' => 1), array('id' => $id, 'uniacid' => $_W['uniacid']));
		m('notice')->sendMemberLogMessage($log['id']);
		plog('finance.log.manual', ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_33'].' '.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_34'].': '.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_35'].' ID: ' . $log['id'] . ' <br/>'.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_36'].': ID: ' . $member['id'] . ' / ' . $member['openid'] . '/' . $member['nickname'] . '/' . $member['realname'] . '/' . $member['mobile']);
		show_json(1);
	}
	public function wechat() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('finance.log.wechat'))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_37'].'');
		}
		$id = intval($_GPC['id']);
		$log = pdo_fetch('select * from ' . tablename('ewei_shop_member_log') . ' where id=:id and uniacid=:uniacid limit 1', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		if (empty($log)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_38'].'!');
		}
		if ($log['deductionmoney'] == 0) 
		{
			$realmoney = $log['money'];
		}
		else 
		{
			$realmoney = $log['realmoney'];
		}
		$set = $_W['shopset']['shop'];
		$data = m('common')->getSysset('pay');
		if (!(empty($data['paytype']['withdraw']))) 
		{
			$result = m('finance')->payRedPack($log['openid'], $realmoney * 100, $log['logno'], $log, $set['name'] . ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_39'].'', $data['paytype']);
			pdo_update('ewei_shop_member_log', array('sendmoney' => $result['sendmoney'], 'senddata' => json_encode($result['senddata'])), array('id' => $log['id']));
			if ($result['sendmoney'] == $realmoney) 
			{
				$result = true;
			}
			else 
			{
				$result = $result['error'];
			}
		}
		else 
		{
			$result = m('finance')->pay($log['openid'], 1, $realmoney * 100, $log['logno'], $set['name'] . ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_40'].'');
		}
		if (is_error($result)) 
		{
			show_json(0, array('message' => $result['message']));
		}
		pdo_update('ewei_shop_member_log', array('status' => 1), array('id' => $id, 'uniacid' => $_W['uniacid']));
		m('notice')->sendMemberLogMessage($log['id']);
		$member = m('member')->getMember($log['openid']);
		plog('finance.log.wechat', ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_41'].' ID: ' . $log['id'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_42'].': '.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_43'].' '.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_44'].': ' . $log['money'] . ' ,'.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_45'].': ' . $realmoney . ' ,'.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_46'].' : ' . $log['deductionmoney'] . '<br/>'.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_47'].':  ID: ' . $member['id'] . ' / ' . $member['openid'] . '/' . $member['nickname'] . '/' . $member['realname'] . '/' . $member['mobile']);
		show_json(1);
	}
	public function refuse() 
	{
		global $_W;
		global $_GPC;
		if (!(cv('finance.log.refuse'))) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_48'].'');
		}
		$id = intval($_GPC['id']);
		$log = pdo_fetch('select * from ' . tablename('ewei_shop_member_log') . ' where id=:id and uniacid=:uniacid limit 1', array(':id' => $id, ':uniacid' => $_W['uniacid']));
		if (empty($log)) 
		{
			show_json(0, ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_49'].'!');
		}
		pdo_update('ewei_shop_member_log', array('status' => -1), array('id' => $id, 'uniacid' => $_W['uniacid']));
		if (0 < $log['money']) 
		{
			m('member')->setCredit($log['openid'], 'credit2', $log['money'], array(0, $set['name'] . ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_50'].''));
		}
		m('notice')->sendMemberLogMessage($log['id']);
		plog('finance.log.refuse', ''.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_51'].' ID: ' . $log['id'] . ' '.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_52'].': ' . $log['money'] . ' <br/>'.$this->lang['lang_plugin_mmanage_core_mobile_finance_index_53'].':  ID: ' . $member['id'] . ' / ' . $member['openid'] . '/' . $member['nickname'] . '/' . $member['realname'] . '/' . $member['mobile']);
		show_json(1);
	}
}
?>