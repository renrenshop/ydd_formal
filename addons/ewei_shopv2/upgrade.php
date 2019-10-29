<?php
pdo_query("

DROP TABLE IF EXISTS `ims_ewei_shop_express`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_express` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  `express` varchar(50) DEFAULT '',
  `status` tinyint(1) DEFAULT '1',
  `displayorder` tinyint(3) unsigned DEFAULT '0',
  `code` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=93 ;



INSERT INTO `ims_ewei_shop_express` (`id`, `name`, `express`, `status`, `displayorder`, `code`) VALUES
(1, '顺丰', 'shunfeng', 1, 0, ''),
(2, '申通', 'shentong', 1, 0, ''),
(3, '韵达快运', 'yunda', 1, 0, ''),
(4, '天天快递', 'tiantian', 1, 0, ''),
(5, '圆通速递', 'yuantong', 1, 0, ''),
(6, '中通速递', 'zhongtong', 1, 0, ''),
(7, 'ems快递', 'ems', 1, 0, ''),
(8, '汇通快运', 'huitongkuaidi', 1, 0, ''),
(9, '全峰快递', 'quanfengkuaidi', 1, 0, ''),
(10, '宅急送', 'zhaijisong', 1, 0, ''),
(11, 'aae全球专递', 'aae', 1, 0, ''),
(12, '安捷快递', 'anjie', 1, 0, ''),
(13, '安信达快递', 'anxindakuaixi', 1, 0, ''),
(14, '彪记快递', 'biaojikuaidi', 1, 0, ''),
(15, 'bht', 'bht', 1, 0, ''),
(16, '百福东方国际物流', 'baifudongfang', 1, 0, ''),
(17, '中国东方（COE）', 'coe', 1, 0, ''),
(18, '长宇物流', 'changyuwuliu', 1, 0, ''),
(19, '大田物流', 'datianwuliu', 1, 0, ''),
(20, '德邦物流', 'debangwuliu', 1, 0, ''),
(21, 'dhl', 'dhl', 1, 0, ''),
(22, 'dpex', 'dpex', 1, 0, ''),
(23, 'd速快递', 'dsukuaidi', 1, 0, ''),
(24, '递四方', 'disifang', 1, 0, ''),
(25, 'fedex（国外）', 'fedex', 1, 0, ''),
(26, '飞康达物流', 'feikangda', 1, 0, ''),
(27, '凤凰快递', 'fenghuangkuaidi', 1, 0, ''),
(28, '飞快达', 'feikuaida', 1, 0, ''),
(29, '国通快递', 'guotongkuaidi', 1, 0, ''),
(30, '港中能达物流', 'ganzhongnengda', 1, 0, ''),
(31, '广东邮政物流', 'guangdongyouzhengwuliu', 1, 0, ''),
(32, '共速达', 'gongsuda', 1, 0, ''),
(33, '恒路物流', 'hengluwuliu', 1, 0, ''),
(34, '华夏龙物流', 'huaxialongwuliu', 1, 0, ''),
(35, '海红', 'haihongwangsong', 1, 0, ''),
(36, '海外环球', 'haiwaihuanqiu', 1, 0, ''),
(37, '佳怡物流', 'jiayiwuliu', 1, 0, ''),
(38, '京广速递', 'jinguangsudikuaijian', 1, 0, ''),
(39, '急先达', 'jixianda', 1, 0, ''),
(40, '佳吉物流', 'jjwl', 1, 0, ''),
(41, '加运美物流', 'jymwl', 1, 0, ''),
(42, '金大物流', 'jindawuliu', 1, 0, ''),
(43, '嘉里大通', 'jialidatong', 1, 0, ''),
(44, '晋越快递', 'jykd', 1, 0, ''),
(45, '快捷速递', 'kuaijiesudi', 1, 0, ''),
(46, '联邦快递（国内）', 'lianb', 1, 0, ''),
(47, '联昊通物流', 'lianhaowuliu', 1, 0, ''),
(48, '龙邦物流', 'longbanwuliu', 1, 0, ''),
(49, '立即送', 'lijisong', 1, 0, ''),
(50, '乐捷递', 'lejiedi', 1, 0, ''),
(51, '民航快递', 'minghangkuaidi', 1, 0, ''),
(52, '美国快递', 'meiguokuaidi', 1, 0, ''),
(53, '门对门', 'menduimen', 1, 0, ''),
(54, 'OCS', 'ocs', 1, 0, ''),
(55, '配思货运', 'peisihuoyunkuaidi', 1, 0, ''),
(56, '全晨快递', 'quanchenkuaidi', 1, 0, ''),
(57, '全际通物流', 'quanjitong', 1, 0, ''),
(58, '全日通快递', 'quanritongkuaidi', 1, 0, ''),
(59, '全一快递', 'quanyikuaidi', 1, 0, ''),
(60, '如风达', 'rufengda', 1, 0, ''),
(61, '三态速递', 'santaisudi', 1, 0, ''),
(62, '盛辉物流', 'shenghuiwuliu', 1, 0, ''),
(63, '速尔物流', 'sue', 1, 0, ''),
(64, '盛丰物流', 'shengfeng', 1, 0, ''),
(65, '赛澳递', 'saiaodi', 1, 0, ''),
(66, '天地华宇', 'tiandihuayu', 1, 0, ''),
(67, 'tnt', 'tnt', 1, 0, ''),
(68, 'ups', 'ups', 1, 0, ''),
(69, '万家物流', 'wanjiawuliu', 1, 0, ''),
(70, '文捷航空速递', 'wenjiesudi', 1, 0, ''),
(71, '伍圆', 'wuyuan', 1, 0, ''),
(72, '万象物流', 'wxwl', 1, 0, ''),
(73, '新邦物流', 'xinbangwuliu', 1, 0, ''),
(74, '信丰物流', 'xinfengwuliu', 1, 0, ''),
(75, '亚风速递', 'yafengsudi', 1, 0, ''),
(76, '一邦速递', 'yibangwuliu', 1, 0, ''),
(77, '优速物流', 'youshuwuliu', 1, 0, ''),
(78, '邮政包裹挂号信', 'youzhengguonei', 1, 0, ''),
(79, '邮政国际包裹挂号信', 'youzhengguoji', 1, 0, ''),
(80, '远成物流', 'yuanchengwuliu', 1, 0, ''),
(81, '源伟丰快递', 'yuanweifeng', 1, 0, ''),
(82, '元智捷诚快递', 'yuanzhijiecheng', 1, 0, ''),
(83, '运通快递', 'yuntongkuaidi', 1, 0, ''),
(84, '越丰物流', 'yuefengwuliu', 1, 0, ''),
(85, '源安达', 'yad', 1, 0, ''),
(86, '银捷速递', 'yinjiesudi', 1, 0, ''),
(87, '中铁快运', 'zhongtiekuaiyun', 1, 0, ''),
(88, '中邮物流', 'zhongyouwuliu', 1, 0, ''),
(89, '忠信达', 'zhongxinda', 1, 0, ''),
(90, '芝麻开门', 'zhimakaimen', 1, 0, ''),
(91, '安能物流', 'annengwuliu', 1, 0, ''),
(92, '京东快递', 'jd', 1, 0, 'JH_046');

DROP TABLE IF EXISTS `ims_ewei_shop_exhelper_esheet`;
CREATE TABLE `ims_ewei_shop_exhelper_esheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `express` varchar(50) DEFAULT '',
  `code` varchar(20) NOT NULL DEFAULT '',
  `datas` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;


INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('1', '顺丰', '', 'SF', 'a:2:{i:0;a:4:{s:5:\"style\";s:9:\"二联150\";s:4:\"spec\";s:33:\"（宽100mm高150mm切点90/60）\";s:4:\"size\";s:3:\"150\";s:9:\"isdefault\";i:1;}i:1;a:4:{s:5:\"style\";s:9:\"三联210\";s:4:\"spec\";s:38:\"（宽100mm 高210mm 切点90/60/60）\";s:4:\"size\";s:3:\"210\";s:9:\"isdefault\";i:0;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('2', '百世快递', '', 'HTKY', 'a:2:{i:0;a:4:{s:5:\"style\";s:9:\"二联180\";s:4:\"spec\";s:34:\"（宽100mm高180mm切点110/70）\";s:4:\"size\";s:3:\"180\";s:9:\"isdefault\";i:0;}i:1;a:4:{s:5:\"style\";s:9:\"二联183\";s:4:\"spec\";s:37:\"（宽100mm 高183mm 切点87/5/91）\";s:4:\"size\";s:3:\"183\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('3', '韵达', '', 'YD', 'a:2:{i:0;a:4:{s:5:\"style\";s:9:\"二联180\";s:4:\"spec\";s:34:\"（宽100mm高180mm切点110/70）\";s:4:\"size\";s:3:\"180\";s:9:\"isdefault\";i:0;}i:1;a:4:{s:5:\"style\";s:9:\"二联203\";s:4:\"spec\";s:36:\"（宽100mm 高203mm 切点152/51）\";s:4:\"size\";s:3:\"203\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('4', '申通', '', 'STO', 'a:2:{i:0;a:4:{s:5:\"style\";s:9:\"二联180\";s:4:\"spec\";s:34:\"（宽100mm高180mm切点110/70）\";s:4:\"size\";s:3:\"180\";s:9:\"isdefault\";i:1;}i:1;a:4:{s:5:\"style\";s:9:\"二联150\";s:4:\"spec\";s:35:\"（宽100mm 高150mm 切点90/60）\";s:4:\"size\";s:3:\"150\";s:9:\"isdefault\";i:0;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('5', '圆通', '', 'YTO', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联180\";s:4:\"spec\";s:34:\"（宽100mm高180mm切点110/70）\";s:4:\"size\";s:3:\"180\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('6', 'EMS', '', 'EMS', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联150\";s:4:\"spec\";s:33:\"（宽100mm高150mm切点90/60）\";s:4:\"size\";s:3:\"150\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('7', '中通', '', 'ZTO', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联180\";s:4:\"spec\";s:34:\"（宽100mm高180mm切点110/70）\";s:4:\"size\";s:3:\"180\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('8', '德邦', '', 'DBL', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联177\";s:4:\"spec\";s:34:\"（宽100mm高177mm切点107/70）\";s:4:\"size\";s:3:\"177\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('9', '优速', '', 'UC', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联180\";s:4:\"spec\";s:34:\"（宽100mm高180mm切点110/70）\";s:4:\"size\";s:3:\"180\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('10', '宅急送', '', 'ZJS', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联120\";s:4:\"spec\";s:33:\"（宽100mm高116mm切点98/10）\";s:4:\"size\";s:3:\"120\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('11', '京东', '', 'JD', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联110\";s:4:\"spec\";s:33:\"（宽100mm高110mm切点60/50）\";s:4:\"size\";s:3:\"110\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('12', '信丰', '', 'XFEX', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联150\";s:4:\"spec\";s:33:\"（宽100mm高150mm切点90/60）\";s:4:\"size\";s:3:\"150\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('13', '全峰', '', 'QFKD', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联180\";s:4:\"spec\";s:34:\"（宽100mm高180mm切点110/70）\";s:4:\"size\";s:3:\"180\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('14', '跨越速运', '', 'KYSY', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联137\";s:4:\"spec\";s:34:\"（宽100mm高137mm切点101/36）\";s:4:\"size\";s:3:\"137\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('15', '安能', '', 'ANE', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"三联180\";s:4:\"spec\";s:37:\"（宽100mm高180mm切点110/30/40）\";s:4:\"size\";s:3:\"180\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('16', '快捷', '', 'FAST', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联180\";s:4:\"spec\";s:34:\"（宽100mm高180mm切点110/70）\";s:4:\"size\";s:3:\"180\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('17', '国通', '', 'GTO', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联180\";s:4:\"spec\";s:34:\"（宽100mm高180mm切点110/70）\";s:4:\"size\";s:3:\"180\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('18', '天天', '', 'HHTT', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联180\";s:4:\"spec\";s:34:\"（宽100mm高180mm切点110/70）\";s:4:\"size\";s:3:\"180\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('19', '中铁快运', '', 'ZTKY', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联150\";s:4:\"spec\";s:33:\"（宽100mm高150mm切点90/60）\";s:4:\"size\";s:3:\"150\";s:9:\"isdefault\";i:1;}}');
INSERT INTO `ims_ewei_shop_exhelper_esheet` VALUES ('20', '邮政快递包裹', '', 'YZPY', 'a:1:{i:0;a:4:{s:5:\"style\";s:9:\"二联180\";s:4:\"spec\";s:34:\"（宽100mm高180mm切点110/70）\";s:4:\"size\";s:3:\"180\";s:9:\"isdefault\";i:1;}}');

DROP TABLE IF EXISTS `ims_ewei_shop_member_message_template_type`;
CREATE TABLE `ims_ewei_shop_member_message_template_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `typecode` varchar(255) DEFAULT NULL,
  `templatecode` varchar(255) DEFAULT NULL,
  `templateid` varchar(255) DEFAULT NULL,
  `templatename` varchar(255) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `showtotaladd` tinyint(1) DEFAULT '0',
  `typegroup` varchar(255) DEFAULT '',
  `groupname` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('1', '订单付款通知', 'saler_pay', 'OPENTM405584202', '', '订单付款通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}商品名称：{{keyword2.DATA}}商品数量：{{keyword3.DATA}}支付金额：{{keyword4.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('2', '自提订单提交成功通知', 'carrier', 'OPENTM201594720', '', '订单付款通知', '{{first.DATA}}自提码：{{keyword1.DATA}}商品详情：{{keyword2.DATA}}提货地址：{{keyword3.DATA}}提货时间：{{keyword4.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('3', '订单取消通知', 'cancel', 'OPENTM201764653', '', '订单关闭提醒', '{{first.DATA}}订单商品：{{keyword1.DATA}}订单编号：{{keyword2.DATA}}下单时间：{{keyword3.DATA}}订单金额：{{keyword4.DATA}}关闭时间：{{keyword5.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('4', '订单即将取消通知', 'willcancel', 'OPENTM201764653', '', '订单关闭提醒', '{{first.DATA}}订单商品：{{keyword1.DATA}}订单编号：{{keyword2.DATA}}下单时间：{{keyword3.DATA}}订单金额：{{keyword4.DATA}}关闭时间：{{keyword5.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('5', '订单支付成功通知', 'pay', 'OPENTM405584202', '', '订单支付通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}商品名称：{{keyword2.DATA}}商品数量：{{keyword3.DATA}}支付金额：{{keyword4.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('6', '订单发货通知', 'send', 'OPENTM401874827', '', '订单发货通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}快递公司：{{keyword2.DATA}}快递单号：{{keyword3.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('7', '自动发货通知(虚拟物品及卡密)', 'virtualsend', 'OPENTM207793687', '', '自动发货通知', '{{first.DATA}}商品名称：{{keyword1.DATA}}订单号：{{keyword2.DATA}}订单金额：{{keyword3.DATA}}卡密信息：{{keyword4.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('8', '订单状态更新(修改收货地址)(修改价格)', 'orderstatus', 'TM00017', '', '订单付款通知', '{{first.DATA}}订单编号:{{OrderSn.DATA}}订单状态:{{OrderStatus.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('9', '退款成功通知', 'refund1', 'TM00430', '', '退款成功通知', '{{first.DATA}}退款金额：{{orderProductPrice.DATA}}商品详情：{{orderProductName.DATA}}订单编号：{{orderName.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('10', '换货成功通知', 'refund3', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('11', '退款申请驳回通知', 'refund2', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('12', '充值成功通知', 'recharge_ok', 'OPENTM207727673', '', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('13', '提现成功通知', 'withdraw_ok', 'OPENTM207422808', '', '提现通知', '{{first.DATA}}申请提现金额：{{keyword1.DATA}}取提现手续费：{{keyword2.DATA}}实际到账金额：{{keyword3.DATA}}提现渠道：{{keyword4.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('14', '会员升级通知(任务处理通知)', 'upgrade', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('15', '充值成功通知（后台管理员手动）', 'backrecharge_ok', 'OPENTM207727673', '', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('16', '积分变动提醒', 'backpoint_ok', 'OPENTM207509450', '', '积分变动提醒', '{{first.DATA}}获得时间：{{keyword1.DATA}}获得积分：{{keyword2.DATA}}获得原因：{{keyword3.DATA}}当前积分：{{keyword4.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('17', '换货发货通知', 'refund4', 'OPENTM401874827', '', '订单发货通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}快递公司：{{keyword2.DATA}}快递单号：{{keyword3.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('18', '砍价活动通知', 'bargain_message', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '砍价消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('19', '拼团活动通知', 'groups', '', '', '', '', '0', '拼团消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('20', '人人分销通知', 'commission', '', '', '', '', '0', '分销消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('21', '商品付款通知', 'saler_goodpay', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('22', '砍到底价通知', 'bargain_fprice', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '砍价消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('23', '订单收货通知(卖家)', 'saler_finish', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('24', '余额兑换成功通知', 'exchange_balance', 'OPENTM207727673', '', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', '0', '兑换中心消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('25', '积分兑换成功通知', 'exchange_score', 'OPENTM207509450', '', '积分变动提醒', '{{first.DATA}}获得时间：{{keyword1.DATA}}获得积分：{{keyword2.DATA}}获得原因：{{keyword3.DATA}}当前积分：{{keyword4.DATA}}{{remark.DATA}}', '0', '兑换中心消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('26', '兑换中心余额充值通知', 'exchange_recharge', 'OPENTM207727673', '', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', '0', '兑换中心消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('27', '游戏中心通知', 'lottery_get', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '抽奖消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('35', '库存预警通知', 'saler_stockwarn', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('36', '卖家核销商品核销通知', 'o2o_sverify', 'OPENTM409521536', '', '核销成功提醒', '{{first.DATA}}核销项目：{{keyword1.DATA}}核销时间：{{keyword2.DATA}}核销门店：{{keyword3.DATA}}{{remark.DATA}}', '0', 'O2O消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('37', '核销商品核销通知', 'o2o_bverify', 'OPENTM409521536', '', '核销成功提醒', '{{first.DATA}}核销项目：{{keyword1.DATA}}核销时间：{{keyword2.DATA}}核销门店：{{keyword3.DATA}}{{remark.DATA}}', '0', 'O2O消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('38', '卖家商品预约通知', 'o2o_snorder', 'OPENTM202447657', '', '预约成功提醒', '{{first.DATA}}预约项目：{{keyword1.DATA}}预约时间：{{keyword2.DATA}}{{remark.DATA}}', '0', 'O2O消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('39', '商品预约成功通知', 'o2o_bnorder', 'OPENTM202447657', '', '预约成功提醒', '{{first.DATA}}预约项目：{{keyword1.DATA}}预约时间：{{keyword2.DATA}}{{remark.DATA}}', '0', 'O2O消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('42', '商品下单通知', 'saler_goodsubmit', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('50', '维权订单通知', 'saler_refund', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '系统消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('43', '任务接取通知', 'task_pick', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '任务中心消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('44', '任务进度通知', 'task_progress', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '任务中心消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('45', '任务完成通知', 'task_finish', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '任务中心消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('46', '任务海报接取通知', 'task_poster_pick', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '任务中心消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('47', '任务海报进度通知', 'task_poster_progress', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '任务中心消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('48', '任务海报完成通知', 'task_poster_finish', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '任务中心消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('49', '任务海报扫描通知', 'task_poster_scan', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '任务中心消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('52', '成为分销商通知', 'commission_become', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '分销消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('53', '新增下线通知', 'commission_agent_new', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '分销消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('54', '下级付款通知', 'commission_order_pay', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '分销消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('55', '下级确认收货通知', 'commission_order_finish', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '分销消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('56', '提现申请提交通知', 'commission_apply', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '分销消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('57', '提现申请完成审核通知', 'commission_check', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '分销消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('58', '佣金打款通知', 'commission_pay', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '分销消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('59', '分销商等级升级通知', 'commission_upgrade', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '分销消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('60', '成为股东通知', 'globonus_become', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '股东消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('61', '股东等级升级通知', 'globonus_upgrade', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '股东消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('62', '分红发放通知', 'globonus_pay', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '股东消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('63', '奖励发放通知', 'article', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '文章营销消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('64', '成为区域代理通知', 'abonus_become', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '区域代理消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('65', '省级代理等级升级通知', 'abonus_upgrade1', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '区域代理消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('66', '市级代理等级升级通知', 'abonus_upgrade2', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '区域代理消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('67', '区级代理等级升级通知', 'abonus_upgrade3', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '区域代理消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('68', '区域代理分红发放通知', 'abonus_pay', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '区域代理消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('69', '入驻申请通知', 'merch_apply', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '商家通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('70', '提现申请提交通知', 'merch_applymoney', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '商家通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('71', '社区会员评论通知', 'reply', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '人人社区消息通知', '0');
INSERT INTO `ims_ewei_shop_member_message_template_type` VALUES ('51', '社区会员升级通知', 'sns', 'OPENTM400232285', '', '任务完成通知', '{{first.DATA}}任务名称：{{keyword1.DATA}}任务类型：{{keyword2.DATA}}完成时间：{{keyword3.DATA}}{{remark.DATA}}', '0', '人人社区消息通知', '0');

");
        