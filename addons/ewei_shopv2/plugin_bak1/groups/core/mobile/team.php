<?php
if (!(defined('IN_IA'))) 
{
	exit('Access Denied');
}
class Team_EweiShopV2Page extends PluginMobileLoginPage 
{
	public function main() 
	{
		global $_W;
		global $_GPC;
		$openid = $_W['openid'];
		load()->model('mc');
		$uid = mc_openid2uid($openid);
		if (empty($uid)) 
		{
			mc_oauth_userinfo($openid);
		}
		$this->model->groupsShare();
		include $this->template();
	}
	public function get_list() 
	{
		global $_W;
		global $_GPC;
		$openid = $_W['openid'];
		$uniacid = $_W['uniacid'];
		$pindex = max(1, intval($_GPC['page']));
		$psize = 5;
		$success = intval($_GPC['success']);
		$condition = ' and o.openid=:openid and o.uniacid=:uniacid and o.is_team = 1 and o.paytime > 0 and o.deleted = 0 ';
		$params = array(':uniacid' => $uniacid, ':openid' => $openid);
		if ($success == 0) 
		{
			$tab0 = true;
			$condition .= ' and o.success = :success ';
			$params[':success'] = $success;
		}
		else if ($success == 1) 
		{
			$tab1 = true;
			$condition .= ' and o.success = :success ';
			$params[':success'] = $success;
		}
		else if ($success == -1) 
		{
			$tab2 = true;
			$condition .= ' and o.success = :success ';
			$params[':success'] = $success;
		}
		$orders = pdo_fetchall('select o.*,g.title,g.price as gprice,g.groupsprice,g.thumb,g.units,g.goodsnum from ' . tablename('ewei_shop_groups_order') . ' as o' . "\n\t\t\t\t" . 'left join ' . tablename('ewei_shop_groups_goods') . ' as g on g.id = o.goodid' . "\n\t\t\t\t" . 'where 1 ' . $condition . ' order by o.createtime desc LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize, $params);
		$total = pdo_fetchcolumn('select count(1) from ' . tablename('ewei_shop_groups_order') . ' as o where 1 ' . $condition, $params);
		foreach ($orders as $key => $order ) 
		{
			$orders[$key]['amount'] = ($order['price'] + $order['freight']) - $order['creditmoney'];
			$goods = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_groups_goods') . 'WHERE id = ' . $order['goodid']);
			$sql2 = 'SELECT * FROM' . tablename('ewei_shop_groups_order') . 'where teamid = :teamid and success = 1';
			$params2 = array(':teamid' => $order['teamid']);
			$alltuan = pdo_fetchall($sql2, $params2);
			$item = array();
			foreach ($alltuan as $num => $all ) 
			{
				$item[$num] = $all['id'];
			}
			$orders[$key]['itemnum'] = count($item);
			$sql3 = 'SELECT * FROM ' . tablename('ewei_shop_groups_order') . ' WHERE teamid = :teamid and paytime > 0 and heads = :heads';
			$params3 = array(':teamid' => $order['teamid'], ':heads' => 1);
			$tuan_first_order = pdo_fetch($sql3, $params3);
			$hours = $tuan_first_order['endtime'];
			$time = time();
			$date = date('Y-m-d H:i:s', $tuan_first_order['starttime']);
			$endtime = date('Y-m-d H:i:s', strtotime(' ' . $date . ' + ' . $hours . ' hour'));
			$date1 = date('Y-m-d H:i:s', $time);
			$orders[$key]['lasttime'] = strtotime($endtime) - strtotime($date1);
			$orders[$key]['starttime'] = date('Y-m-d H:i:s', $orders[$key]['starttime']);
		}
		$orders = set_medias($orders, 'thumb');
		show_json(1, array('list' => $orders, 'pagesize' => $psize, 'total' => $total));
	}
	public function detail() 
	{
		global $_W;
		global $_GPC;
		$openid = $_W['openid'];
		load()->model('mc');
		$uid = mc_openid2uid($openid);
		if (empty($uid)) 
		{
			mc_oauth_userinfo($openid);
		}
		$uniacid = $_W['uniacid'];
		$teamid = intval($_GPC['teamid']);
		$condition = '';
		if (empty($teamid)) 
		{
			$this->message(''.$this->lang['lang_plugin_groups_core_mobile_team_0'].'!', mobileUrl('groups/index'), 'error');
		}
		$myorder = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_groups_order') . ' WHERE uniacid = ' . $uniacid . ' and openid = \'' . $_W['openid'] . '\' and teamid = ' . $teamid . ' and paytime>0');
		$params = array(':teamid' => $teamid);
		$orders = pdo_fetchall('select * from ' . tablename('ewei_shop_groups_order') . ' where uniacid = ' . $uniacid . ' and teamid = :teamid and paytime>0 order by id asc ', $params);
		$profileall = array();
		foreach ($orders as $key => $value ) 
		{
			if ($value['groupnum'] == 1) 
			{
				$single = 1;
			}
			$order['goodid'] = $value['goodid'];
			$order['groupnum'] = $value['groupnum'];
			$order['success'] = $value['success'];
			$avatar = pdo_fetch('SELECT openid,avatar,nickname FROM ' . tablename('ewei_shop_member') . ' WHERE uniacid =\'' . $_W['uniacid'] . '\' and openid = \'' . $value['openid'] . '\'');
			$orders[$key]['openid'] = $avatar['openid'];
			$orders[$key]['nickname'] = $avatar['nickname'];
			$orders[$key]['avatar'] = $avatar['avatar'];
			if ($orders[$key]['avatar'] == '') 
			{
				$orders[$key]['avatar'] = '../addons/ewei_shopv2/plugin/groups/template/mobile/default/images/user/' . mt_rand(1, 20) . '.jpg';
			}
		}
		$groupsset = pdo_fetch('select description,groups_description,discount,headstype,headsmoney,headsdiscount from ' . tablename('ewei_shop_groups_set') . "\n\t\t\t\t\t" . 'where uniacid = :uniacid ', array(':uniacid' => $uniacid));
		$groupsset['groups_description'] = m('ui')->lazy($groupsset['groups_description']);
		$goods = pdo_fetch('SELECT * FROM' . tablename('ewei_shop_groups_goods') . 'WHERE  uniacid = ' . $uniacid . ' and id = ' . $order['goodid']);
		$goods['content'] = m('ui')->lazy($goods['content']);
		if (!(empty($goods['thumb_url']))) 
		{
			$goods['thumb_url'] = array_merge(iunserializer($goods['thumb_url']));
		}
		$sql = 'SELECT * FROM' . tablename('ewei_shop_groups_order') . ' where uniacid = :uniacid and teamid=:teamid and status > 0 ';
		$params = array(':uniacid' => $_W['uniacid'], ':teamid' => $teamid);
		$alltuan = pdo_fetchall($sql, $params);
		$item = array();
		foreach ($alltuan as $num => $all ) 
		{
			$item[$num] = $all['id'];
		}
		$n = intval($order['groupnum']) - count($alltuan);
		if ($n <= 0) 
		{
			pdo_update('ewei_shop_groups_order', array('success' => 1), array('teamid' => $teamid));
		}
		$nn = intval($order['groupnum']) - 1;
		$arr = array();
		$i = 0;
		while ($i < $n) 
		{
			$arr[$i] = 0;
			++$i;
		}
		$tuan_first_order = pdo_fetch('SELECT * FROM ' . tablename('ewei_shop_groups_order') . ' WHERE teamid = ' . $teamid . ' and heads = 1');
		$hours = $tuan_first_order['endtime'];
		$time = time();
		$date = date('Y-m-d H:i:s', $tuan_first_order['starttime']);
		$endtime = date('Y-m-d H:i:s', strtotime(' ' . $date . ' + ' . $hours . ' hour'));
		$date1 = date('Y-m-d H:i:s', $time);
		$lasttime2 = strtotime($endtime) - strtotime($date1);
		$tuan_first_order['endtime'] = strtotime(' ' . $date . ' + ' . $hours . ' hour');
		$set = $_W['shopset'];
		$_W['shopshare'] = array('title' => ''.$this->lang['lang_plugin_groups_core_mobile_team_1'].'' . $n . ''.$this->lang['lang_plugin_groups_core_mobile_team_2'].'' . $goods['title'] . ''.$this->lang['lang_plugin_groups_core_mobile_team_3'].'~', 'imgUrl' => (!(empty($goods['share_icon'])) ? tomedia($goods['share_icon']) : tomedia($goods['thumb'])), 'desc' => (!(empty($goods['share_title'])) ? $goods['share_title'] : $goods['title']), 'link' => mobileUrl('groups/team/detail', array('teamid' => $teamid), true));
		include $this->template();
	}
	public function rules() 
	{
		global $_W;
		global $_GPC;
		$set = pdo_fetch('SELECT rules FROM ' . tablename('ewei_shop_groups_set') . ' WHERE uniacid =\'' . $_W['uniacid'] . '\'');
		include $this->template();
	}
}
?>