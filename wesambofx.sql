SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `ims_account`;
CREATE TABLE IF NOT EXISTS `ims_account` (
  `acid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `hash` varchar(8) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `isconnect` tinyint(4) NOT NULL,
  `isdeleted` tinyint(3) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `ims_account` (`acid`, `uniacid`, `hash`, `type`, `isconnect`, `isdeleted`, `endtime`) VALUES
(1, 1, 'uRr8qvQV', 1, 0, 0, 0);

DROP TABLE IF EXISTS `ims_account_phoneapp`;
CREATE TABLE IF NOT EXISTS `ims_account_phoneapp` (
  `acid` int(11) NOT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`acid`),
  KEY `uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `ims_account_webapp`;
CREATE TABLE IF NOT EXISTS `ims_account_webapp` (
  `acid` int(11) NOT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`acid`),
  KEY `uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `ims_account_wechats`;
CREATE TABLE IF NOT EXISTS `ims_account_wechats` (
  `acid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `token` varchar(32) NOT NULL,
  `encodingaeskey` varchar(255) NOT NULL,
  `level` tinyint(4) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `account` varchar(30) NOT NULL,
  `original` varchar(50) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `country` varchar(10) NOT NULL,
  `province` varchar(3) NOT NULL,
  `city` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `key` varchar(50) NOT NULL,
  `secret` varchar(50) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `subscribeurl` varchar(120) NOT NULL,
  `auth_refresh_token` varchar(255) NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `idx_key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ims_account_wechats` (`acid`, `uniacid`, `token`, `encodingaeskey`, `level`, `name`, `account`, `original`, `signature`, `country`, `province`, `city`, `username`, `password`, `lastupdate`, `key`, `secret`, `styleid`, `subscribeurl`, `auth_refresh_token`) VALUES
(1, 1, 'omJNpZEhZeHj1ZxFECKkP48B5VFbk1HP', '', 1, 'wesambo', '', '', '', '', '', '', '', '', 0, '', '', 1, '', '');

DROP TABLE IF EXISTS `ims_account_wxapp`;
CREATE TABLE IF NOT EXISTS `ims_account_wxapp` (
  `acid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `token` varchar(32) NOT NULL,
  `encodingaeskey` varchar(43) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `account` varchar(30) NOT NULL,
  `original` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `secret` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `appdomain` varchar(255) NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_activity_clerks`;
CREATE TABLE IF NOT EXISTS `ims_activity_clerks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`) USING BTREE,
  KEY `password` (`password`) USING BTREE,
  KEY `openid` (`openid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_activity_clerk_menu`;
CREATE TABLE IF NOT EXISTS `ims_activity_clerk_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `displayorder` int(4) NOT NULL,
  `pid` int(6) NOT NULL,
  `group_name` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(60) NOT NULL,
  `type` varchar(20) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `system` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

INSERT INTO `ims_activity_clerk_menu` (`id`, `uniacid`, `displayorder`, `pid`, `group_name`, `title`, `icon`, `url`, `type`, `permission`, `system`) VALUES
(1, 0, 0, 0, 'mc', '快捷交易', '', '', '', 'mc_manage', 1),
(2, 0, 0, 1, '', '积分充值', 'fa fa-money', 'credit1', 'modal', 'mc_credit1', 1),
(3, 0, 0, 1, '', '余额充值', 'fa fa-cny', 'credit2', 'modal', 'mc_credit2', 1),
(4, 0, 0, 1, '', '消费', 'fa fa-usd', 'consume', 'modal', 'mc_consume', 1),
(5, 0, 0, 1, '', '发放会员卡', 'fa fa-credit-card', 'card', 'modal', 'mc_card', 1),
(6, 0, 0, 0, 'stat', '数据统计', '', '', '', 'stat_manage', 1),
(7, 0, 0, 6, '', '积分统计', 'fa fa-bar-chart', './index.php?c=stat&a=credit1', 'url', 'stat_credit1', 1),
(8, 0, 0, 6, '', '余额统计', 'fa fa-bar-chart', './index.php?c=stat&a=credit2', 'url', 'stat_credit2', 1),
(9, 0, 0, 6, '', '现金消费统计', 'fa fa-bar-chart', './index.php?c=stat&a=cash', 'url', 'stat_cash', 1),
(10, 0, 0, 6, '', '会员卡统计', 'fa fa-bar-chart', './index.php?c=stat&a=card', 'url', 'stat_card', 1),
(11, 0, 0, 0, 'activity', '系统优惠券核销', '', '', '', 'activity_card_manage', 1),
(12, 0, 0, 11, '', '折扣券核销', 'fa fa-money', './index.php?c=activity&a=consume&do=display&type=1', 'url', 'activity_consume_coupon', 1),
(13, 0, 0, 11, '', '代金券核销', 'fa fa-money', './index.php?c=activity&a=consume&do=display&type=2', 'url', 'activity_consume_token', 1),
(14, 0, 0, 0, 'wechat', '微信卡券核销', '', '', '', 'wechat_card_manage', 1),
(15, 0, 0, 14, '', '卡券核销', 'fa fa-money', './index.php?c=wechat&a=consume', 'url', 'wechat_consume', 1),
(16, 0, 0, 6, '', '收银台收款统计', 'fa fa-bar-chart', './index.php?c=stat&a=paycenter', 'url', 'stat_paycenter', 1);

DROP TABLE IF EXISTS `ims_activity_coupon`;
CREATE TABLE IF NOT EXISTS `ims_activity_coupon` (
  `couponid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `type` tinyint(4) NOT NULL,
  `title` varchar(30) NOT NULL,
  `couponsn` varchar(50) NOT NULL,
  `description` text,
  `discount` decimal(10,2) NOT NULL,
  `condition` decimal(10,2) NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  `limit` int(11) NOT NULL,
  `dosage` int(11) unsigned NOT NULL,
  `amount` int(11) unsigned NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `use_module` tinyint(3) unsigned NOT NULL,
  `credittype` varchar(20) NOT NULL,
  PRIMARY KEY (`couponid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_activity_coupon_allocation`;
CREATE TABLE IF NOT EXISTS `ims_activity_coupon_allocation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `groupid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`couponid`,`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_activity_coupon_modules`;
CREATE TABLE IF NOT EXISTS `ims_activity_coupon_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `couponid` (`couponid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_activity_coupon_record`;
CREATE TABLE IF NOT EXISTS `ims_activity_coupon_record` (
  `recid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `code` varchar(50) NOT NULL,
  `grantmodule` varchar(50) NOT NULL,
  `granttime` int(10) unsigned NOT NULL,
  `usemodule` varchar(50) NOT NULL,
  `usetime` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `operator` varchar(30) NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `remark` varchar(300) NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`recid`),
  KEY `couponid` (`uid`,`grantmodule`,`usemodule`,`status`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_activity_exchange`;
CREATE TABLE IF NOT EXISTS `ims_activity_exchange` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `extra` varchar(3000) NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `credittype` varchar(10) NOT NULL,
  `pretotal` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `total` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `extra` (`extra`(333)) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_activity_exchange_trades`;
CREATE TABLE IF NOT EXISTS `ims_activity_exchange_trades` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `uniacid` (`uniacid`,`uid`,`exid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_activity_exchange_trades_shipping`;
CREATE TABLE IF NOT EXISTS `ims_activity_exchange_trades_shipping` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `province` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_activity_modules`;
CREATE TABLE IF NOT EXISTS `ims_activity_modules` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `available` int(10) unsigned NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `uniacid` (`uniacid`),
  KEY `module` (`module`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_activity_modules_record`;
CREATE TABLE IF NOT EXISTS `ims_activity_modules_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL,
  `num` tinyint(3) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mid` (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_activity_stores`;
CREATE TABLE IF NOT EXISTS `ims_activity_stores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `province` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `photo_list` varchar(10000) NOT NULL,
  `avg_price` int(10) unsigned NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `open_time` varchar(50) NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `source` tinyint(3) unsigned NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `location_id` (`location_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_article_category`;
CREATE TABLE IF NOT EXISTS `ims_article_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_article_news`;
CREATE TABLE IF NOT EXISTS `ims_article_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_show_home` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `cateid` (`cateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_article_notice`;
CREATE TABLE IF NOT EXISTS `ims_article_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_show_home` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  `style` varchar(200) NOT NULL,
  `group` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `cateid` (`cateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_article_unread_notice`;
CREATE TABLE IF NOT EXISTS `ims_article_unread_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notice_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `is_new` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `notice_id` (`notice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_attachment_group`;
CREATE TABLE IF NOT EXISTS `ims_attachment_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_basic_reply`;
CREATE TABLE IF NOT EXISTS `ims_basic_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `content` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_business`;
CREATE TABLE IF NOT EXISTS `ims_business` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `lng` varchar(10) NOT NULL,
  `lat` varchar(10) NOT NULL,
  `industry1` varchar(10) NOT NULL,
  `industry2` varchar(10) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_lat_lng` (`lng`,`lat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_core_attachment`;
CREATE TABLE IF NOT EXISTS `ims_core_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `module_upload_dir` varchar(100) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `ims_core_attachment` (`id`, `uniacid`, `uid`, `filename`, `attachment`, `type`, `createtime`, `module_upload_dir`, `group_id`) VALUES
(1, 1, 1, 'logo2.png', 'images/global/TMUmIz29AZ95LUyz3iN9Qa93k3UCvZ.png', 1, 1468651633, '', NULL),
(2, 1, 1, 'logo.jpg', 'images/1/2017/07/P4lj4C3rj84uNxzGa8cZvhGZq89ga3.jpg', 1, 1501146453, '', NULL),
(3, 1, 1, 'logo.jpg', 'images/1/2017/07/WhDrr8BCMm5d8pZFZjJfEPU49DHu9e.jpg', 1, 1501146533, '', NULL);

DROP TABLE IF EXISTS `ims_core_cache`;
CREATE TABLE IF NOT EXISTS `ims_core_cache` (
  `key` varchar(50) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ims_core_cache` (`key`, `value`) VALUES
('account:ticket', 's:0:"";'),
('userbasefields', 'a:45:{s:7:"uniacid";s:17:"同一公众号id";s:7:"groupid";s:8:"分组id";s:7:"credit1";s:6:"积分";s:7:"credit2";s:6:"余额";s:7:"credit3";s:19:"预留积分类型3";s:7:"credit4";s:19:"预留积分类型4";s:7:"credit5";s:19:"预留积分类型5";s:7:"credit6";s:19:"预留积分类型6";s:10:"createtime";s:12:"加入时间";s:6:"mobile";s:12:"手机号码";s:5:"email";s:12:"电子邮箱";s:8:"realname";s:12:"真实姓名";s:8:"nickname";s:6:"昵称";s:6:"avatar";s:6:"头像";s:2:"qq";s:5:"QQ号";s:6:"gender";s:6:"性别";s:5:"birth";s:6:"生日";s:13:"constellation";s:6:"星座";s:6:"zodiac";s:6:"生肖";s:9:"telephone";s:12:"固定电话";s:6:"idcard";s:12:"证件号码";s:9:"studentid";s:6:"学号";s:5:"grade";s:6:"班级";s:7:"address";s:6:"地址";s:7:"zipcode";s:6:"邮编";s:11:"nationality";s:6:"国籍";s:6:"reside";s:9:"居住地";s:14:"graduateschool";s:12:"毕业学校";s:7:"company";s:6:"公司";s:9:"education";s:6:"学历";s:10:"occupation";s:6:"职业";s:8:"position";s:6:"职位";s:7:"revenue";s:9:"年收入";s:15:"affectivestatus";s:12:"情感状态";s:10:"lookingfor";s:13:" 交友目的";s:9:"bloodtype";s:6:"血型";s:6:"height";s:6:"身高";s:6:"weight";s:6:"体重";s:6:"alipay";s:15:"支付宝帐号";s:3:"msn";s:3:"MSN";s:6:"taobao";s:12:"阿里旺旺";s:4:"site";s:6:"主页";s:3:"bio";s:12:"自我介绍";s:8:"interest";s:12:"兴趣爱好";s:8:"password";s:6:"密码";}'),
('usersfields', 'a:46:{s:8:"realname";s:12:"真实姓名";s:8:"nickname";s:6:"昵称";s:6:"avatar";s:6:"头像";s:2:"qq";s:5:"QQ号";s:6:"mobile";s:12:"手机号码";s:3:"vip";s:9:"VIP级别";s:6:"gender";s:6:"性别";s:9:"birthyear";s:12:"出生生日";s:13:"constellation";s:6:"星座";s:6:"zodiac";s:6:"生肖";s:9:"telephone";s:12:"固定电话";s:6:"idcard";s:12:"证件号码";s:9:"studentid";s:6:"学号";s:5:"grade";s:6:"班级";s:7:"address";s:12:"邮寄地址";s:7:"zipcode";s:6:"邮编";s:11:"nationality";s:6:"国籍";s:14:"resideprovince";s:12:"居住地址";s:14:"graduateschool";s:12:"毕业学校";s:7:"company";s:6:"公司";s:9:"education";s:6:"学历";s:10:"occupation";s:6:"职业";s:8:"position";s:6:"职位";s:7:"revenue";s:9:"年收入";s:15:"affectivestatus";s:12:"情感状态";s:10:"lookingfor";s:13:" 交友目的";s:9:"bloodtype";s:6:"血型";s:6:"height";s:6:"身高";s:6:"weight";s:6:"体重";s:6:"alipay";s:15:"支付宝帐号";s:3:"msn";s:3:"MSN";s:5:"email";s:12:"电子邮箱";s:6:"taobao";s:12:"阿里旺旺";s:4:"site";s:6:"主页";s:3:"bio";s:12:"自我介绍";s:8:"interest";s:12:"兴趣爱好";s:7:"uniacid";s:17:"同一公众号id";s:7:"groupid";s:8:"分组id";s:7:"credit1";s:6:"积分";s:7:"credit2";s:6:"余额";s:7:"credit3";s:19:"预留积分类型3";s:7:"credit4";s:19:"预留积分类型4";s:7:"credit5";s:19:"预留积分类型5";s:7:"credit6";s:19:"预留积分类型6";s:10:"createtime";s:12:"加入时间";s:8:"password";s:12:"用户密码";}'),
('setting', 'a:9:{s:9:"copyright";a:26:{s:6:"status";s:1:"0";s:10:"verifycode";s:1:"0";s:6:"reason";s:0:"";s:8:"sitename";s:21:"微上宝分销平台";s:3:"url";s:7:"http://";s:8:"statcode";s:0:"";s:10:"footerleft";s:14:"Copyright 2017";s:11:"footerright";s:19:"All Rights Reserved";s:4:"icon";s:0:"";s:5:"flogo";s:48:"images/global/ez83GNNaav63zt60detv60bZzRGnBV.png";s:6:"slides";s:216:"a:3:{i:0;s:58:"https://img.alicdn.com/tps/TB1pfG4IFXXXXc6XXXXXXXXXXXX.jpg";i:1;s:58:"https://img.alicdn.com/tps/TB1sXGYIFXXXXc5XpXXXXXXXXXX.jpg";i:2;s:58:"https://img.alicdn.com/tps/TB1h9xxIFXXXXbKXXXXXXXXXXXX.jpg";}";s:6:"notice";s:0:"";s:5:"blogo";s:48:"images/global/ez83GNNaav63zt60detv60bZzRGnBV.png";s:8:"baidumap";a:2:{s:3:"lng";s:0:"";s:3:"lat";s:0:"";}s:7:"company";s:24:"广州谷来信息科技";s:4:"skin";s:7:"default";s:14:"companyprofile";s:0:"";s:7:"address";s:27:"广东省广州市天河区";s:6:"person";s:9:"陈先生";s:5:"phone";s:12:"020-88888888";s:2:"qq";s:8:"88888888";s:5:"email";s:13:"888888@qq.com";s:8:"keywords";s:21:"微上宝分销平台";s:11:"description";s:21:"微上宝分销平台";s:12:"showhomepage";i:1;s:13:"leftmenufixed";i:0;}s:8:"authmode";i:1;s:5:"close";a:2:{s:6:"status";s:1:"0";s:6:"reason";s:0:"";}s:8:"register";a:4:{s:4:"open";i:1;s:6:"verify";i:0;s:4:"code";i:1;s:7:"groupid";i:1;}s:18:"module_receive_ban";a:0:{}s:5:"basic";a:1:{s:8:"template";s:9:"we8_white";}s:10:"module_ban";a:0:{}s:14:"module_upgrade";a:0:{}s:7:"cloudip";a:0:{}}'),
('we7:all_cloud_upgrade_module:', 'a:2:{s:6:"expire";i:1529928839;s:4:"data";a:0:{}}'),
('system_frame', 'a:5:{s:7:"account";a:7:{s:5:"title";s:9:"公众号";s:4:"icon";s:18:"wi wi-white-collar";s:3:"url";s:41:"./index.php?c=home&a=welcome&do=platform&";s:7:"section";a:5:{s:13:"platform_plus";a:2:{s:5:"title";s:12:"增强功能";s:4:"menu";a:6:{s:14:"platform_reply";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"自动回复";s:3:"url";s:31:"./index.php?c=platform&a=reply&";s:15:"permission_name";s:14:"platform_reply";s:4:"icon";s:11:"wi wi-reply";s:12:"displayorder";i:6;s:2:"id";N;s:14:"sub_permission";a:0:{}}s:13:"platform_menu";a:9:{s:9:"is_system";i:1;s:10:"is_display";s:1:"1";s:5:"title";s:15:"自定义菜单";s:3:"url";s:38:"./index.php?c=platform&a=menu&do=post&";s:15:"permission_name";s:13:"platform_menu";s:4:"icon";s:16:"wi wi-custommenu";s:12:"displayorder";i:5;s:2:"id";N;s:14:"sub_permission";N;}s:11:"platform_qr";a:9:{s:9:"is_system";i:1;s:10:"is_display";s:1:"1";s:5:"title";s:15:"二维码管理";s:3:"url";s:28:"./index.php?c=platform&a=qr&";s:15:"permission_name";s:11:"platform_qr";s:4:"icon";s:12:"wi wi-qrcode";s:12:"displayorder";i:4;s:2:"id";N;s:14:"sub_permission";a:0:{}}s:18:"platform_mass_task";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"定时群发";s:3:"url";s:30:"./index.php?c=platform&a=mass&";s:15:"permission_name";s:18:"platform_mass_task";s:4:"icon";s:13:"wi wi-crontab";s:12:"displayorder";i:3;s:2:"id";N;s:14:"sub_permission";N;}s:17:"platform_material";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:16:"素材/编辑器";s:3:"url";s:34:"./index.php?c=platform&a=material&";s:15:"permission_name";s:17:"platform_material";s:4:"icon";s:12:"wi wi-redact";s:12:"displayorder";i:2;s:2:"id";N;s:14:"sub_permission";a:2:{i:0;a:3:{s:5:"title";s:13:"添加/编辑";s:3:"url";s:39:"./index.php?c=platform&a=material-post&";s:15:"permission_name";s:13:"material_post";}i:1;a:2:{s:5:"title";s:6:"删除";s:15:"permission_name";s:24:"platform_material_delete";}}}s:13:"platform_site";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:16:"微官网-文章";s:3:"url";s:38:"./index.php?c=site&a=multi&do=display&";s:15:"permission_name";s:13:"platform_site";s:4:"icon";s:10:"wi wi-home";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";a:0:{}}}}s:15:"platform_module";a:3:{s:5:"title";s:12:"应用模块";s:4:"menu";a:0:{}s:10:"is_display";b:1;}s:2:"mc";a:2:{s:5:"title";s:6:"粉丝";s:4:"menu";a:2:{s:7:"mc_fans";a:9:{s:9:"is_system";i:1;s:10:"is_display";s:1:"1";s:5:"title";s:6:"粉丝";s:3:"url";s:24:"./index.php?c=mc&a=fans&";s:15:"permission_name";s:7:"mc_fans";s:4:"icon";s:16:"wi wi-fansmanage";s:12:"displayorder";i:2;s:2:"id";N;s:14:"sub_permission";N;}s:9:"mc_member";a:9:{s:9:"is_system";i:1;s:10:"is_display";s:1:"1";s:5:"title";s:6:"会员";s:3:"url";s:26:"./index.php?c=mc&a=member&";s:15:"permission_name";s:9:"mc_member";s:4:"icon";s:10:"wi wi-fans";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}}s:7:"profile";a:2:{s:5:"title";s:6:"配置";s:4:"menu";a:4:{s:7:"profile";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"参数配置";s:3:"url";s:33:"./index.php?c=profile&a=passport&";s:15:"permission_name";s:15:"profile_setting";s:4:"icon";s:23:"wi wi-parameter-setting";s:12:"displayorder";i:4;s:2:"id";N;s:14:"sub_permission";N;}s:7:"payment";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"支付参数";s:3:"url";s:32:"./index.php?c=profile&a=payment&";s:15:"permission_name";s:19:"profile_pay_setting";s:4:"icon";s:17:"wi wi-pay-setting";s:12:"displayorder";i:3;s:2:"id";N;s:14:"sub_permission";N;}s:15:"app_module_link";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"数据同步";s:3:"url";s:44:"./index.php?c=profile&a=module-link-uniacid&";s:15:"permission_name";s:31:"profile_app_module_link_uniacid";s:4:"icon";s:18:"wi wi-data-synchro";s:12:"displayorder";i:2;s:2:"id";N;s:14:"sub_permission";N;}s:11:"bind_domain";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"域名绑定";s:3:"url";s:36:"./index.php?c=profile&a=bind-domain&";s:15:"permission_name";s:19:"profile_bind_domain";s:4:"icon";s:23:"wi wi-parameter-setting";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}}s:10:"statistics";a:2:{s:5:"title";s:6:"统计";s:4:"menu";a:1:{s:3:"app";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"访问统计";s:3:"url";s:31:"./index.php?c=statistics&a=app&";s:15:"permission_name";s:14:"statistics_app";s:4:"icon";s:9:"wi wi-api";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}}}s:9:"is_system";b:1;s:10:"is_display";b:1;s:12:"displayorder";i:2;}s:5:"wxapp";a:7:{s:5:"title";s:9:"小程序";s:4:"icon";s:19:"wi wi-small-routine";s:3:"url";s:38:"./index.php?c=wxapp&a=display&do=home&";s:7:"section";a:3:{s:14:"wxapp_entrance";a:3:{s:5:"title";s:15:"小程序入口";s:4:"menu";a:1:{s:20:"module_entrance_link";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"入口页面";s:3:"url";s:36:"./index.php?c=wxapp&a=entrance-link&";s:15:"permission_name";s:19:"wxapp_entrance_link";s:4:"icon";s:18:"wi wi-data-synchro";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}s:10:"is_display";b:1;}s:12:"wxapp_module";a:3:{s:5:"title";s:6:"应用";s:4:"menu";a:0:{}s:10:"is_display";b:1;}s:13:"wxapp_profile";a:2:{s:5:"title";s:6:"配置";s:4:"menu";a:4:{s:17:"wxapp_module_link";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"数据同步";s:3:"url";s:42:"./index.php?c=wxapp&a=module-link-uniacid&";s:15:"permission_name";s:25:"wxapp_module_link_uniacid";s:4:"icon";s:18:"wi wi-data-synchro";s:12:"displayorder";i:4;s:2:"id";N;s:14:"sub_permission";N;}s:13:"wxapp_payment";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"支付参数";s:3:"url";s:30:"./index.php?c=wxapp&a=payment&";s:15:"permission_name";s:13:"wxapp_payment";s:4:"icon";s:16:"wi wi-appsetting";s:12:"displayorder";i:3;s:2:"id";N;s:14:"sub_permission";N;}s:14:"front_download";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:18:"上传微信审核";s:3:"url";s:37:"./index.php?c=wxapp&a=front-download&";s:15:"permission_name";s:20:"wxapp_front_download";s:4:"icon";s:13:"wi wi-examine";s:12:"displayorder";i:2;s:2:"id";N;s:14:"sub_permission";N;}s:23:"wxapp_platform_material";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:0;s:5:"title";s:12:"素材管理";s:3:"url";N;s:15:"permission_name";s:23:"wxapp_platform_material";s:4:"icon";N;s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";a:1:{i:0;a:2:{s:5:"title";s:6:"删除";s:15:"permission_name";s:30:"wxapp_platform_material_delete";}}}}}}s:9:"is_system";b:1;s:10:"is_display";b:1;s:12:"displayorder";i:3;}s:6:"system";a:7:{s:5:"title";s:6:"系统";s:4:"icon";s:13:"wi wi-setting";s:3:"url";s:39:"./index.php?c=home&a=welcome&do=system&";s:7:"section";a:9:{s:10:"wxplatform";a:2:{s:5:"title";s:9:"公众号";s:4:"menu";a:4:{s:14:"system_account";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:16:" 微信公众号";s:3:"url";s:45:"./index.php?c=account&a=manage&account_type=1";s:15:"permission_name";s:14:"system_account";s:4:"icon";s:12:"wi wi-wechat";s:12:"displayorder";i:4;s:2:"id";N;s:14:"sub_permission";a:6:{i:0;a:2:{s:5:"title";s:21:"公众号管理设置";s:15:"permission_name";s:21:"system_account_manage";}i:1;a:2:{s:5:"title";s:15:"添加公众号";s:15:"permission_name";s:19:"system_account_post";}i:2;a:2:{s:5:"title";s:15:"公众号停用";s:15:"permission_name";s:19:"system_account_stop";}i:3;a:2:{s:5:"title";s:18:"公众号回收站";s:15:"permission_name";s:22:"system_account_recycle";}i:4;a:2:{s:5:"title";s:15:"公众号删除";s:15:"permission_name";s:21:"system_account_delete";}i:5;a:2:{s:5:"title";s:15:"公众号恢复";s:15:"permission_name";s:22:"system_account_recover";}}}s:13:"system_module";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:15:"公众号应用";s:3:"url";s:51:"./index.php?c=module&a=manage-system&account_type=1";s:15:"permission_name";s:13:"system_module";s:4:"icon";s:14:"wi wi-wx-apply";s:12:"displayorder";i:3;s:2:"id";N;s:14:"sub_permission";N;}s:15:"system_template";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:15:"微官网模板";s:3:"url";s:32:"./index.php?c=system&a=template&";s:15:"permission_name";s:15:"system_template";s:4:"icon";s:17:"wi wi-wx-template";s:12:"displayorder";i:2;s:2:"id";N;s:14:"sub_permission";N;}s:15:"system_platform";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:19:" 微信开放平台";s:3:"url";s:32:"./index.php?c=system&a=platform&";s:15:"permission_name";s:15:"system_platform";s:4:"icon";s:20:"wi wi-exploitsetting";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}}s:6:"module";a:2:{s:5:"title";s:9:"小程序";s:4:"menu";a:2:{s:12:"system_wxapp";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:15:"微信小程序";s:3:"url";s:45:"./index.php?c=account&a=manage&account_type=4";s:15:"permission_name";s:12:"system_wxapp";s:4:"icon";s:11:"wi wi-wxapp";s:12:"displayorder";i:2;s:2:"id";N;s:14:"sub_permission";a:6:{i:0;a:2:{s:5:"title";s:21:"小程序管理设置";s:15:"permission_name";s:19:"system_wxapp_manage";}i:1;a:2:{s:5:"title";s:15:"添加小程序";s:15:"permission_name";s:17:"system_wxapp_post";}i:2;a:2:{s:5:"title";s:15:"小程序停用";s:15:"permission_name";s:17:"system_wxapp_stop";}i:3;a:2:{s:5:"title";s:18:"小程序回收站";s:15:"permission_name";s:20:"system_wxapp_recycle";}i:4;a:2:{s:5:"title";s:15:"小程序删除";s:15:"permission_name";s:19:"system_wxapp_delete";}i:5;a:2:{s:5:"title";s:15:"小程序恢复";s:15:"permission_name";s:20:"system_wxapp_recover";}}}s:19:"system_module_wxapp";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:15:"小程序应用";s:3:"url";s:51:"./index.php?c=module&a=manage-system&account_type=4";s:15:"permission_name";s:19:"system_module_wxapp";s:4:"icon";s:17:"wi wi-wxapp-apply";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}}s:7:"welcome";a:3:{s:5:"title";s:12:"系统首页";s:4:"menu";a:1:{s:14:"system_welcome";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:18:"系统首页应用";s:3:"url";s:53:"./index.php?c=module&a=manage-system&system_welcome=1";s:15:"permission_name";s:14:"system_welcome";s:4:"icon";s:11:"wi wi-wxapp";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}s:7:"founder";b:1;}s:4:"user";a:2:{s:5:"title";s:13:"帐户/用户";s:4:"menu";a:3:{s:9:"system_my";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"我的帐户";s:3:"url";s:29:"./index.php?c=user&a=profile&";s:15:"permission_name";s:9:"system_my";s:4:"icon";s:10:"wi wi-user";s:12:"displayorder";i:3;s:2:"id";N;s:14:"sub_permission";N;}s:11:"system_user";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"用户管理";s:3:"url";s:29:"./index.php?c=user&a=display&";s:15:"permission_name";s:11:"system_user";s:4:"icon";s:16:"wi wi-user-group";s:12:"displayorder";i:2;s:2:"id";N;s:14:"sub_permission";a:7:{i:0;a:2:{s:5:"title";s:12:"编辑用户";s:15:"permission_name";s:16:"system_user_post";}i:1;a:2:{s:5:"title";s:12:"审核用户";s:15:"permission_name";s:17:"system_user_check";}i:2;a:2:{s:5:"title";s:12:"店员管理";s:15:"permission_name";s:17:"system_user_clerk";}i:3;a:2:{s:5:"title";s:15:"用户回收站";s:15:"permission_name";s:19:"system_user_recycle";}i:4;a:2:{s:5:"title";s:18:"用户属性设置";s:15:"permission_name";s:18:"system_user_fields";}i:5;a:2:{s:5:"title";s:31:"用户属性设置-编辑字段";s:15:"permission_name";s:23:"system_user_fields_post";}i:6;a:2:{s:5:"title";s:18:"用户注册设置";s:15:"permission_name";s:23:"system_user_registerset";}}}s:25:"system_user_founder_group";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:15:"副创始人组";s:3:"url";s:32:"./index.php?c=founder&a=display&";s:15:"permission_name";s:21:"system_founder_manage";s:4:"icon";s:16:"wi wi-co-founder";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";a:6:{i:0;a:2:{s:5:"title";s:18:"添加创始人组";s:15:"permission_name";s:24:"system_founder_group_add";}i:1;a:2:{s:5:"title";s:18:"编辑创始人组";s:15:"permission_name";s:25:"system_founder_group_post";}i:2;a:2:{s:5:"title";s:18:"删除创始人组";s:15:"permission_name";s:24:"system_founder_group_del";}i:3;a:2:{s:5:"title";s:15:"添加创始人";s:15:"permission_name";s:23:"system_founder_user_add";}i:4;a:2:{s:5:"title";s:15:"编辑创始人";s:15:"permission_name";s:24:"system_founder_user_post";}i:5;a:2:{s:5:"title";s:15:"删除创始人";s:15:"permission_name";s:23:"system_founder_user_del";}}}}}s:10:"permission";a:2:{s:5:"title";s:12:"权限管理";s:4:"menu";a:2:{s:19:"system_module_group";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:15:"应用权限组";s:3:"url";s:29:"./index.php?c=module&a=group&";s:15:"permission_name";s:19:"system_module_group";s:4:"icon";s:21:"wi wi-appjurisdiction";s:12:"displayorder";i:2;s:2:"id";N;s:14:"sub_permission";a:3:{i:0;a:2:{s:5:"title";s:21:"添加应用权限组";s:15:"permission_name";s:23:"system_module_group_add";}i:1;a:2:{s:5:"title";s:21:"编辑应用权限组";s:15:"permission_name";s:24:"system_module_group_post";}i:2;a:2:{s:5:"title";s:21:"删除应用权限组";s:15:"permission_name";s:23:"system_module_group_del";}}}s:17:"system_user_group";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:15:"用户权限组";s:3:"url";s:27:"./index.php?c=user&a=group&";s:15:"permission_name";s:17:"system_user_group";s:4:"icon";s:22:"wi wi-userjurisdiction";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";a:3:{i:0;a:2:{s:5:"title";s:15:"添加用户组";s:15:"permission_name";s:21:"system_user_group_add";}i:1;a:2:{s:5:"title";s:15:"编辑用户组";s:15:"permission_name";s:22:"system_user_group_post";}i:2;a:2:{s:5:"title";s:15:"删除用户组";s:15:"permission_name";s:21:"system_user_group_del";}}}}}s:7:"article";a:2:{s:5:"title";s:13:"文章/公告";s:4:"menu";a:2:{s:14:"system_article";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"文章管理";s:3:"url";s:29:"./index.php?c=article&a=news&";s:15:"permission_name";s:19:"system_article_news";s:4:"icon";s:13:"wi wi-article";s:12:"displayorder";i:2;s:2:"id";N;s:14:"sub_permission";N;}s:21:"system_article_notice";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"公告管理";s:3:"url";s:31:"./index.php?c=article&a=notice&";s:15:"permission_name";s:21:"system_article_notice";s:4:"icon";s:12:"wi wi-notice";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}}s:7:"message";a:2:{s:5:"title";s:12:"消息提醒";s:4:"menu";a:1:{s:21:"system_message_notice";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"消息提醒";s:3:"url";s:31:"./index.php?c=message&a=notice&";s:15:"permission_name";s:21:"system_message_notice";s:4:"icon";s:13:"wi wi-article";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}}s:17:"system_statistics";a:2:{s:5:"title";s:6:"统计";s:4:"menu";a:1:{s:23:"system_account_analysis";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"访问统计";s:3:"url";s:35:"./index.php?c=statistics&a=account&";s:15:"permission_name";s:23:"system_account_analysis";s:4:"icon";s:13:"wi wi-article";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}}s:5:"cache";a:2:{s:5:"title";s:6:"缓存";s:4:"menu";a:1:{s:26:"system_setting_updatecache";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"更新缓存";s:3:"url";s:35:"./index.php?c=system&a=updatecache&";s:15:"permission_name";s:26:"system_setting_updatecache";s:4:"icon";s:12:"wi wi-update";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}}}s:9:"is_system";b:1;s:10:"is_display";b:1;s:12:"displayorder";i:4;}s:4:"site";a:8:{s:5:"title";s:6:"站点";s:4:"icon";s:17:"wi wi-system-site";s:3:"url";s:28:"./index.php?c=system&a=site&";s:7:"section";a:3:{s:5:"cloud";a:2:{s:5:"title";s:9:"云服务";s:4:"menu";a:1:{s:21:"system_cloud_diagnose";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:15:"云服务诊断";s:3:"url";s:31:"./index.php?c=cloud&a=diagnose&";s:15:"permission_name";s:21:"system_cloud_diagnose";s:4:"icon";s:14:"wi wi-diagnose";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}}s:7:"setting";a:2:{s:5:"title";s:6:"设置";s:4:"menu";a:9:{s:19:"system_setting_site";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"站点设置";s:3:"url";s:28:"./index.php?c=system&a=site&";s:15:"permission_name";s:19:"system_setting_site";s:4:"icon";s:18:"wi wi-site-setting";s:12:"displayorder";i:9;s:2:"id";N;s:14:"sub_permission";N;}s:19:"system_setting_menu";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"菜单设置";s:3:"url";s:28:"./index.php?c=system&a=menu&";s:15:"permission_name";s:19:"system_setting_menu";s:4:"icon";s:18:"wi wi-menu-setting";s:12:"displayorder";i:8;s:2:"id";N;s:14:"sub_permission";N;}s:25:"system_setting_attachment";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"附件设置";s:3:"url";s:34:"./index.php?c=system&a=attachment&";s:15:"permission_name";s:25:"system_setting_attachment";s:4:"icon";s:16:"wi wi-attachment";s:12:"displayorder";i:7;s:2:"id";N;s:14:"sub_permission";N;}s:25:"system_setting_systeminfo";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"系统信息";s:3:"url";s:34:"./index.php?c=system&a=systeminfo&";s:15:"permission_name";s:25:"system_setting_systeminfo";s:4:"icon";s:17:"wi wi-system-info";s:12:"displayorder";i:6;s:2:"id";N;s:14:"sub_permission";N;}s:19:"system_setting_logs";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"查看日志";s:3:"url";s:28:"./index.php?c=system&a=logs&";s:15:"permission_name";s:19:"system_setting_logs";s:4:"icon";s:9:"wi wi-log";s:12:"displayorder";i:5;s:2:"id";N;s:14:"sub_permission";N;}s:26:"system_setting_ipwhitelist";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:11:"IP白名单";s:3:"url";s:35:"./index.php?c=system&a=ipwhitelist&";s:15:"permission_name";s:26:"system_setting_ipwhitelist";s:4:"icon";s:8:"wi wi-ip";s:12:"displayorder";i:4;s:2:"id";N;s:14:"sub_permission";N;}s:28:"system_setting_sensitiveword";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:15:"过滤敏感词";s:3:"url";s:37:"./index.php?c=system&a=sensitiveword&";s:15:"permission_name";s:28:"system_setting_sensitiveword";s:4:"icon";s:15:"wi wi-sensitive";s:12:"displayorder";i:3;s:2:"id";N;s:14:"sub_permission";N;}s:25:"system_setting_thirdlogin";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:21:"第三方登录配置";s:3:"url";s:34:"./index.php?c=system&a=thirdlogin&";s:15:"permission_name";s:25:"system_setting_thirdlogin";s:4:"icon";s:15:"wi wi-sensitive";s:12:"displayorder";i:2;s:2:"id";N;s:14:"sub_permission";N;}s:20:"system_setting_oauth";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:17:"oauth全局设置";s:3:"url";s:29:"./index.php?c=system&a=oauth&";s:15:"permission_name";s:20:"system_setting_oauth";s:4:"icon";s:15:"wi wi-sensitive";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}}s:7:"utility";a:2:{s:5:"title";s:12:"常用工具";s:4:"menu";a:5:{s:24:"system_utility_filecheck";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:18:"系统文件校验";s:3:"url";s:33:"./index.php?c=system&a=filecheck&";s:15:"permission_name";s:24:"system_utility_filecheck";s:4:"icon";s:10:"wi wi-file";s:12:"displayorder";i:5;s:2:"id";N;s:14:"sub_permission";N;}s:23:"system_utility_optimize";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"性能优化";s:3:"url";s:32:"./index.php?c=system&a=optimize&";s:15:"permission_name";s:23:"system_utility_optimize";s:4:"icon";s:14:"wi wi-optimize";s:12:"displayorder";i:4;s:2:"id";N;s:14:"sub_permission";N;}s:23:"system_utility_database";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:9:"数据库";s:3:"url";s:32:"./index.php?c=system&a=database&";s:15:"permission_name";s:23:"system_utility_database";s:4:"icon";s:9:"wi wi-sql";s:12:"displayorder";i:3;s:2:"id";N;s:14:"sub_permission";N;}s:19:"system_utility_scan";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:12:"木马查杀";s:3:"url";s:28:"./index.php?c=system&a=scan&";s:15:"permission_name";s:19:"system_utility_scan";s:4:"icon";s:12:"wi wi-safety";s:12:"displayorder";i:2;s:2:"id";N;s:14:"sub_permission";N;}s:18:"system_utility_bom";a:9:{s:9:"is_system";i:1;s:10:"is_display";i:1;s:5:"title";s:15:"检测文件BOM";s:3:"url";s:27:"./index.php?c=system&a=bom&";s:15:"permission_name";s:18:"system_utility_bom";s:4:"icon";s:9:"wi wi-bom";s:12:"displayorder";i:1;s:2:"id";N;s:14:"sub_permission";N;}}}}s:7:"founder";b:1;s:9:"is_system";b:1;s:10:"is_display";b:1;s:12:"displayorder";i:5;}s:4:"help";a:8:{s:5:"title";s:12:"系统帮助";s:4:"icon";s:12:"wi wi-market";s:3:"url";s:29:"./index.php?c=help&a=display&";s:7:"section";a:0:{}s:5:"blank";b:0;s:9:"is_system";b:1;s:10:"is_display";b:1;s:12:"displayorder";i:6;}}'),
('module_receive_enable', 'a:13:{s:5:"image";a:1:{i:0;s:11:"ewei_shopv2";}s:5:"voice";a:1:{i:0;s:11:"ewei_shopv2";}s:5:"video";a:1:{i:0;s:11:"ewei_shopv2";}s:10:"shortvideo";a:1:{i:0;s:11:"ewei_shopv2";}s:8:"location";a:1:{i:0;s:11:"ewei_shopv2";}s:4:"link";a:1:{i:0;s:11:"ewei_shopv2";}s:9:"subscribe";a:1:{i:0;s:11:"ewei_shopv2";}s:11:"unsubscribe";a:1:{i:0;s:11:"ewei_shopv2";}s:2:"qr";a:1:{i:0;s:11:"ewei_shopv2";}s:5:"trace";a:1:{i:0;s:11:"ewei_shopv2";}s:5:"click";a:1:{i:0;s:11:"ewei_shopv2";}s:4:"view";a:1:{i:0;s:11:"ewei_shopv2";}s:14:"merchant_order";a:1:{i:0;s:11:"ewei_shopv2";}}'),
('unisetting:1', 'a:24:{s:7:"uniacid";s:1:"1";s:8:"passport";a:3:{s:8:"focusreg";i:0;s:4:"item";s:5:"email";s:4:"type";s:8:"password";}s:5:"oauth";a:2:{s:6:"status";s:1:"0";s:7:"account";s:1:"0";}s:11:"jsauth_acid";s:1:"0";s:2:"uc";a:1:{s:6:"status";i:0;}s:6:"notify";a:1:{s:3:"sms";a:2:{s:7:"balance";i:0;s:9:"signature";s:0:"";}}s:11:"creditnames";a:5:{s:7:"credit1";a:2:{s:5:"title";s:6:"积分";s:7:"enabled";i:1;}s:7:"credit2";a:2:{s:5:"title";s:6:"余额";s:7:"enabled";i:1;}s:7:"credit3";a:2:{s:5:"title";s:0:"";s:7:"enabled";i:0;}s:7:"credit4";a:2:{s:5:"title";s:0:"";s:7:"enabled";i:0;}s:7:"credit5";a:2:{s:5:"title";s:0:"";s:7:"enabled";i:0;}}s:15:"creditbehaviors";a:2:{s:8:"activity";s:7:"credit1";s:8:"currency";s:7:"credit2";}s:7:"welcome";s:0:"";s:7:"default";s:0:"";s:15:"default_message";s:0:"";s:7:"payment";a:4:{s:6:"credit";a:1:{s:6:"switch";b:0;}s:6:"alipay";a:4:{s:6:"switch";b:0;s:7:"account";s:0:"";s:7:"partner";s:0:"";s:6:"secret";s:0:"";}s:6:"wechat";a:5:{s:6:"switch";b:0;s:7:"account";b:0;s:7:"signkey";s:0:"";s:7:"partner";s:0:"";s:3:"key";s:0:"";}s:8:"delivery";a:1:{s:6:"switch";b:0;}}s:4:"stat";s:0:"";s:12:"default_site";s:1:"1";s:4:"sync";s:1:"0";s:8:"recharge";s:0:"";s:9:"tplnotice";s:0:"";s:10:"grouplevel";s:1:"0";s:8:"mcplugin";s:0:"";s:15:"exchange_enable";s:1:"0";s:11:"coupon_type";s:1:"0";s:7:"menuset";s:0:"";s:10:"statistics";s:0:"";s:11:"bind_domain";s:0:"";}'),
('uniaccount:1', 'a:35:{s:4:"acid";s:1:"1";s:7:"uniacid";s:1:"1";s:5:"token";s:32:"omJNpZEhZeHj1ZxFECKkP48B5VFbk1HP";s:14:"encodingaeskey";s:0:"";s:5:"level";s:1:"1";s:4:"name";s:7:"wesambo";s:7:"account";s:0:"";s:8:"original";s:0:"";s:9:"signature";s:0:"";s:7:"country";s:0:"";s:8:"province";s:0:"";s:4:"city";s:0:"";s:8:"username";s:0:"";s:8:"password";s:0:"";s:10:"lastupdate";s:1:"0";s:3:"key";s:0:"";s:6:"secret";s:0:"";s:7:"styleid";s:1:"1";s:12:"subscribeurl";s:0:"";s:18:"auth_refresh_token";s:0:"";s:11:"encrypt_key";s:0:"";s:4:"type";s:1:"1";s:9:"isconnect";s:1:"0";s:9:"isdeleted";s:1:"0";s:7:"endtime";s:1:"0";s:3:"uid";s:1:"1";s:9:"starttime";s:1:"0";s:6:"groups";a:1:{i:1;a:5:{s:7:"groupid";s:1:"1";s:7:"uniacid";s:1:"1";s:5:"title";s:15:"默认会员组";s:6:"credit";s:1:"0";s:9:"isdefault";s:1:"1";}}s:7:"setting";a:24:{s:7:"uniacid";s:1:"1";s:8:"passport";a:3:{s:8:"focusreg";i:0;s:4:"item";s:5:"email";s:4:"type";s:8:"password";}s:5:"oauth";a:2:{s:6:"status";s:1:"0";s:7:"account";s:1:"0";}s:11:"jsauth_acid";s:1:"0";s:2:"uc";a:1:{s:6:"status";i:0;}s:6:"notify";a:1:{s:3:"sms";a:2:{s:7:"balance";i:0;s:9:"signature";s:0:"";}}s:11:"creditnames";a:5:{s:7:"credit1";a:2:{s:5:"title";s:6:"积分";s:7:"enabled";i:1;}s:7:"credit2";a:2:{s:5:"title";s:6:"余额";s:7:"enabled";i:1;}s:7:"credit3";a:2:{s:5:"title";s:0:"";s:7:"enabled";i:0;}s:7:"credit4";a:2:{s:5:"title";s:0:"";s:7:"enabled";i:0;}s:7:"credit5";a:2:{s:5:"title";s:0:"";s:7:"enabled";i:0;}}s:15:"creditbehaviors";a:2:{s:8:"activity";s:7:"credit1";s:8:"currency";s:7:"credit2";}s:7:"welcome";s:0:"";s:7:"default";s:0:"";s:15:"default_message";s:0:"";s:7:"payment";a:4:{s:6:"credit";a:1:{s:6:"switch";b:0;}s:6:"alipay";a:4:{s:6:"switch";b:0;s:7:"account";s:0:"";s:7:"partner";s:0:"";s:6:"secret";s:0:"";}s:6:"wechat";a:5:{s:6:"switch";b:0;s:7:"account";b:0;s:7:"signkey";s:0:"";s:7:"partner";s:0:"";s:3:"key";s:0:"";}s:8:"delivery";a:1:{s:6:"switch";b:0;}}s:4:"stat";s:0:"";s:12:"default_site";s:1:"1";s:4:"sync";s:1:"0";s:8:"recharge";s:0:"";s:9:"tplnotice";s:0:"";s:10:"grouplevel";s:1:"0";s:8:"mcplugin";s:0:"";s:15:"exchange_enable";s:1:"0";s:11:"coupon_type";s:1:"0";s:7:"menuset";s:0:"";s:10:"statistics";s:0:"";s:11:"bind_domain";s:0:"";}s:10:"grouplevel";s:1:"0";s:4:"logo";s:57:"http://localhost/attachment/headimg_1.jpg?time=1529927047";s:6:"qrcode";s:56:"http://localhost/attachment/qrcode_1.jpg?time=1529927047";s:9:"switchurl";s:51:"./index.php?c=account&a=display&do=switch&uniacid=1";s:3:"sms";i:0;s:7:"setmeal";a:5:{s:3:"uid";i:-1;s:8:"username";s:9:"创始人";s:9:"timelimit";s:9:"未设置";s:7:"groupid";s:2:"-1";s:9:"groupname";s:12:"所有服务";}}'),
('we7:1:site_store_buy_1', 'a:0:{}'),
('we7:unimodules:1:', 'a:13:{s:11:"ewei_shopv2";a:1:{s:4:"name";s:11:"ewei_shopv2";}s:8:"recharge";a:1:{s:4:"name";s:8:"recharge";}s:7:"userapi";a:1:{s:4:"name";s:7:"userapi";}s:5:"music";a:1:{s:4:"name";s:5:"music";}s:4:"news";a:1:{s:4:"name";s:4:"news";}s:5:"basic";a:1:{s:4:"name";s:5:"basic";}s:6:"wxcard";a:1:{s:4:"name";s:6:"wxcard";}s:6:"images";a:1:{s:4:"name";s:6:"images";}s:9:"paycenter";a:1:{s:4:"name";s:9:"paycenter";}s:5:"video";a:1:{s:4:"name";s:5:"video";}s:5:"voice";a:1:{s:4:"name";s:5:"voice";}s:5:"chats";a:1:{s:4:"name";s:5:"chats";}s:6:"custom";a:1:{s:4:"name";s:6:"custom";}}'),
('we7:module_info:ewei_shopv2', 'a:31:{s:3:"mid";s:2:"15";s:4:"name";s:11:"ewei_shopv2";s:4:"type";s:8:"business";s:5:"title";s:14:"人人商城V3";s:7:"version";s:5:"3.8.23";s:7:"ability";s:87:"人人商城(分销),多用户分权，淘宝商品一键转换，多种插件支持。";s:11:"description";s:74:"人人商城(分销)，多项信息模板，强大的自定义规格设置";s:6:"author";s:15:"微上宝科技";s:3:"url";s:32:"https://shop140828924.taobao.com";s:8:"settings";s:1:"0";s:10:"subscribes";a:14:{i:0;s:4:"text";i:1;s:5:"image";i:2;s:5:"voice";i:3;s:5:"video";i:4;s:10:"shortvideo";i:5;s:8:"location";i:6;s:4:"link";i:7;s:9:"subscribe";i:8;s:11:"unsubscribe";i:9;s:2:"qr";i:10;s:5:"trace";i:11;s:5:"click";i:12;s:4:"view";i:13;s:14:"merchant_order";}s:7:"handles";a:12:{i:0;s:4:"text";i:1;s:5:"image";i:2;s:5:"voice";i:3;s:5:"video";i:4;s:10:"shortvideo";i:5;s:8:"location";i:6;s:4:"link";i:7;s:9:"subscribe";i:8;s:2:"qr";i:9;s:5:"trace";i:10;s:5:"click";i:11;s:14:"merchant_order";}s:12:"isrulefields";s:1:"0";s:8:"issystem";s:1:"0";s:6:"target";s:1:"0";s:6:"iscard";s:1:"0";s:11:"permissions";s:6:"a:0:{}";s:13:"title_initial";s:0:"";s:13:"wxapp_support";s:1:"1";s:11:"app_support";s:1:"2";s:15:"welcome_support";s:1:"0";s:10:"oauth_type";s:1:"0";s:14:"webapp_support";s:1:"0";s:16:"phoneapp_support";s:1:"0";s:2:"id";N;s:10:"modulename";N;s:9:"isdisplay";i:1;s:4:"logo";s:64:"http://localhost/addons/ewei_shopv2/icon-custom.jpg?v=1529927047";s:11:"main_module";b:0;s:11:"plugin_list";a:0:{}s:11:"is_relation";b:0;}'),
('we7:module_setting:1:ewei_shopv2', 'a:7:{s:2:"id";s:1:"8";s:7:"uniacid";s:1:"1";s:6:"module";s:11:"ewei_shopv2";s:7:"enabled";s:1:"1";s:8:"settings";s:0:"";s:8:"shortcut";s:1:"0";s:12:"displayorder";s:1:"0";}'),
('we7:module_info:recharge', 'a:31:{s:3:"mid";s:1:"5";s:4:"name";s:8:"recharge";s:4:"type";s:6:"system";s:5:"title";s:24:"会员中心充值模块";s:7:"version";s:3:"1.0";s:7:"ability";s:24:"提供会员充值功能";s:11:"description";s:0:"";s:6:"author";s:13:"WeEngine Team";s:3:"url";s:18:"http://www.we7.cc/";s:8:"settings";s:1:"0";s:10:"subscribes";s:0:"";s:7:"handles";s:0:"";s:12:"isrulefields";s:1:"0";s:8:"issystem";s:1:"1";s:6:"target";s:1:"0";s:6:"iscard";s:1:"0";s:11:"permissions";s:0:"";s:13:"title_initial";s:0:"";s:13:"wxapp_support";s:1:"0";s:11:"app_support";i:2;s:15:"welcome_support";s:1:"0";s:10:"oauth_type";s:1:"0";s:14:"webapp_support";s:1:"0";s:16:"phoneapp_support";s:1:"0";s:2:"id";N;s:10:"modulename";N;s:9:"isdisplay";i:1;s:4:"logo";s:54:"http://localhost/addons/recharge/icon.jpg?v=1529927047";s:11:"main_module";b:0;s:11:"plugin_list";a:0:{}s:11:"is_relation";b:0;}'),
('we7:module_setting:1:recharge', 'a:7:{s:2:"id";s:1:"5";s:7:"uniacid";s:1:"1";s:6:"module";s:8:"recharge";s:7:"enabled";s:1:"1";s:8:"settings";s:0:"";s:8:"shortcut";s:1:"0";s:12:"displayorder";s:1:"0";}'),
('we7:module_info:userapi', 'a:31:{s:3:"mid";s:1:"4";s:4:"name";s:7:"userapi";s:4:"type";s:6:"system";s:5:"title";s:21:"自定义接口回复";s:7:"version";s:3:"1.1";s:7:"ability";s:33:"更方便的第三方接口设置";s:11:"description";s:141:"自定义接口又称第三方接口，可以让开发者更方便的接入微擎系统，高效的与微信公众平台进行对接整合。";s:6:"author";s:13:"WeEngine Team";s:3:"url";s:18:"http://www.we7.cc/";s:8:"settings";s:1:"0";s:10:"subscribes";s:0:"";s:7:"handles";s:0:"";s:12:"isrulefields";s:1:"1";s:8:"issystem";s:1:"1";s:6:"target";s:1:"0";s:6:"iscard";s:1:"0";s:11:"permissions";s:0:"";s:13:"title_initial";s:0:"";s:13:"wxapp_support";s:1:"0";s:11:"app_support";i:2;s:15:"welcome_support";s:1:"0";s:10:"oauth_type";s:1:"0";s:14:"webapp_support";s:1:"0";s:16:"phoneapp_support";s:1:"0";s:2:"id";N;s:10:"modulename";N;s:9:"isdisplay";i:1;s:4:"logo";s:53:"http://localhost/addons/userapi/icon.jpg?v=1529927047";s:11:"main_module";b:0;s:11:"plugin_list";a:0:{}s:11:"is_relation";b:0;}'),
('we7:module_setting:1:userapi', 'a:7:{s:2:"id";s:1:"4";s:7:"uniacid";s:1:"1";s:6:"module";s:7:"userapi";s:7:"enabled";s:1:"1";s:8:"settings";s:0:"";s:8:"shortcut";s:1:"0";s:12:"displayorder";s:1:"0";}'),
('we7:module_info:music', 'a:31:{s:3:"mid";s:1:"3";s:4:"name";s:5:"music";s:4:"type";s:6:"system";s:5:"title";s:18:"基本音乐回复";s:7:"version";s:3:"1.0";s:7:"ability";s:39:"提供语音、音乐等音频类回复";s:11:"description";s:183:"在回复规则中可选择具有语音、音乐等音频类的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝，实现一问一答得简单对话。";s:6:"author";s:13:"WeEngine Team";s:3:"url";s:18:"http://www.we7.cc/";s:8:"settings";s:1:"0";s:10:"subscribes";s:0:"";s:7:"handles";s:0:"";s:12:"isrulefields";s:1:"1";s:8:"issystem";s:1:"1";s:6:"target";s:1:"0";s:6:"iscard";s:1:"0";s:11:"permissions";s:0:"";s:13:"title_initial";s:0:"";s:13:"wxapp_support";s:1:"0";s:11:"app_support";i:2;s:15:"welcome_support";s:1:"0";s:10:"oauth_type";s:1:"0";s:14:"webapp_support";s:1:"0";s:16:"phoneapp_support";s:1:"0";s:2:"id";N;s:10:"modulename";N;s:9:"isdisplay";i:1;s:4:"logo";s:51:"http://localhost/addons/music/icon.jpg?v=1529927047";s:11:"main_module";b:0;s:11:"plugin_list";a:0:{}s:11:"is_relation";b:0;}'),
('we7:module_setting:1:music', 'a:7:{s:2:"id";s:1:"3";s:7:"uniacid";s:1:"1";s:6:"module";s:5:"music";s:7:"enabled";s:1:"1";s:8:"settings";s:0:"";s:8:"shortcut";s:1:"0";s:12:"displayorder";s:1:"0";}'),
('we7:module_info:news', 'a:31:{s:3:"mid";s:1:"2";s:4:"name";s:4:"news";s:4:"type";s:6:"system";s:5:"title";s:24:"基本混合图文回复";s:7:"version";s:3:"1.0";s:7:"ability";s:33:"为你提供生动的图文资讯";s:11:"description";s:272:"一问一答得简单对话, 但是回复内容包括图片文字等更生动的媒体内容. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的图文回复内容.";s:6:"author";s:13:"WeEngine Team";s:3:"url";s:18:"http://www.we7.cc/";s:8:"settings";s:1:"0";s:10:"subscribes";s:0:"";s:7:"handles";s:0:"";s:12:"isrulefields";s:1:"1";s:8:"issystem";s:1:"1";s:6:"target";s:1:"0";s:6:"iscard";s:1:"0";s:11:"permissions";s:0:"";s:13:"title_initial";s:0:"";s:13:"wxapp_support";s:1:"0";s:11:"app_support";i:2;s:15:"welcome_support";s:1:"0";s:10:"oauth_type";s:1:"0";s:14:"webapp_support";s:1:"0";s:16:"phoneapp_support";s:1:"0";s:2:"id";N;s:10:"modulename";N;s:9:"isdisplay";i:1;s:4:"logo";s:50:"http://localhost/addons/news/icon.jpg?v=1529927047";s:11:"main_module";b:0;s:11:"plugin_list";a:0:{}s:11:"is_relation";b:0;}'),
('we7:module_setting:1:news', 'a:7:{s:2:"id";s:1:"2";s:7:"uniacid";s:1:"1";s:6:"module";s:4:"news";s:7:"enabled";s:1:"1";s:8:"settings";s:0:"";s:8:"shortcut";s:1:"0";s:12:"displayorder";s:1:"0";}'),
('we7:module_info:basic', 'a:31:{s:3:"mid";s:1:"1";s:4:"name";s:5:"basic";s:4:"type";s:6:"system";s:5:"title";s:18:"基本文字回复";s:7:"version";s:3:"1.0";s:7:"ability";s:24:"和您进行简单对话";s:11:"description";s:201:"一问一答得简单对话. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的回复内容.";s:6:"author";s:13:"WeEngine Team";s:3:"url";s:18:"http://www.we7.cc/";s:8:"settings";s:1:"0";s:10:"subscribes";s:0:"";s:7:"handles";s:0:"";s:12:"isrulefields";s:1:"1";s:8:"issystem";s:1:"1";s:6:"target";s:1:"0";s:6:"iscard";s:1:"0";s:11:"permissions";s:0:"";s:13:"title_initial";s:0:"";s:13:"wxapp_support";s:1:"0";s:11:"app_support";i:2;s:15:"welcome_support";s:1:"0";s:10:"oauth_type";s:1:"0";s:14:"webapp_support";s:1:"0";s:16:"phoneapp_support";s:1:"0";s:2:"id";N;s:10:"modulename";N;s:9:"isdisplay";i:1;s:4:"logo";s:51:"http://localhost/addons/basic/icon.jpg?v=1529927047";s:11:"main_module";b:0;s:11:"plugin_list";a:0:{}s:11:"is_relation";b:0;}'),
('we7:module_setting:1:basic', 'a:7:{s:2:"id";s:1:"1";s:7:"uniacid";s:1:"1";s:6:"module";s:5:"basic";s:7:"enabled";s:1:"1";s:8:"settings";s:0:"";s:8:"shortcut";s:1:"0";s:12:"displayorder";s:1:"0";}'),
('we7:module_info:wxcard', 'a:31:{s:3:"mid";s:2:"11";s:4:"name";s:6:"wxcard";s:4:"type";s:6:"system";s:5:"title";s:18:"微信卡券回复";s:7:"version";s:3:"1.0";s:7:"ability";s:18:"微信卡券回复";s:11:"description";s:18:"微信卡券回复";s:6:"author";s:13:"WeEngine Team";s:3:"url";s:18:"http://www.we7.cc/";s:8:"settings";s:1:"0";s:10:"subscribes";s:0:"";s:7:"handles";s:0:"";s:12:"isrulefields";s:1:"1";s:8:"issystem";s:1:"1";s:6:"target";s:1:"0";s:6:"iscard";s:1:"0";s:11:"permissions";s:0:"";s:13:"title_initial";s:0:"";s:13:"wxapp_support";s:1:"0";s:11:"app_support";i:2;s:15:"welcome_support";s:1:"0";s:10:"oauth_type";s:1:"0";s:14:"webapp_support";s:1:"0";s:16:"phoneapp_support";s:1:"0";s:2:"id";N;s:10:"modulename";N;s:9:"isdisplay";i:1;s:4:"logo";s:52:"http://localhost/addons/wxcard/icon.jpg?v=1529927047";s:11:"main_module";b:0;s:11:"plugin_list";a:0:{}s:11:"is_relation";b:0;}'),
('we7:module_info:images', 'a:31:{s:3:"mid";s:1:"7";s:4:"name";s:6:"images";s:4:"type";s:6:"system";s:5:"title";s:18:"基本图片回复";s:7:"version";s:3:"1.0";s:7:"ability";s:18:"提供图片回复";s:11:"description";s:132:"在回复规则中可选择具有图片的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝图片。";s:6:"author";s:13:"WeEngine Team";s:3:"url";s:18:"http://www.we7.cc/";s:8:"settings";s:1:"0";s:10:"subscribes";s:0:"";s:7:"handles";s:0:"";s:12:"isrulefields";s:1:"1";s:8:"issystem";s:1:"1";s:6:"target";s:1:"0";s:6:"iscard";s:1:"0";s:11:"permissions";s:0:"";s:13:"title_initial";s:0:"";s:13:"wxapp_support";s:1:"0";s:11:"app_support";i:2;s:15:"welcome_support";s:1:"0";s:10:"oauth_type";s:1:"0";s:14:"webapp_support";s:1:"0";s:16:"phoneapp_support";s:1:"0";s:2:"id";N;s:10:"modulename";N;s:9:"isdisplay";i:1;s:4:"logo";s:52:"http://localhost/addons/images/icon.jpg?v=1529927047";s:11:"main_module";b:0;s:11:"plugin_list";a:0:{}s:11:"is_relation";b:0;}'),
('we7:module_info:paycenter', 'a:31:{s:3:"mid";s:2:"12";s:4:"name";s:9:"paycenter";s:4:"type";s:6:"system";s:5:"title";s:9:"收银台";s:7:"version";s:3:"1.0";s:7:"ability";s:9:"收银台";s:11:"description";s:9:"收银台";s:6:"author";s:13:"WeEngine Team";s:3:"url";s:18:"http://www.we7.cc/";s:8:"settings";s:1:"0";s:10:"subscribes";s:0:"";s:7:"handles";s:0:"";s:12:"isrulefields";s:1:"1";s:8:"issystem";s:1:"1";s:6:"target";s:1:"0";s:6:"iscard";s:1:"0";s:11:"permissions";s:0:"";s:13:"title_initial";s:0:"";s:13:"wxapp_support";s:1:"0";s:11:"app_support";i:2;s:15:"welcome_support";s:1:"0";s:10:"oauth_type";s:1:"0";s:14:"webapp_support";s:1:"0";s:16:"phoneapp_support";s:1:"0";s:2:"id";N;s:10:"modulename";N;s:9:"isdisplay";i:1;s:4:"logo";s:55:"http://localhost/addons/paycenter/icon.jpg?v=1529927047";s:11:"main_module";b:0;s:11:"plugin_list";a:0:{}s:11:"is_relation";b:0;}'),
('we7:module_info:video', 'a:31:{s:3:"mid";s:1:"8";s:4:"name";s:5:"video";s:4:"type";s:6:"system";s:5:"title";s:18:"基本视频回复";s:7:"version";s:3:"1.0";s:7:"ability";s:18:"提供图片回复";s:11:"description";s:132:"在回复规则中可选择具有视频的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝视频。";s:6:"author";s:13:"WeEngine Team";s:3:"url";s:18:"http://www.we7.cc/";s:8:"settings";s:1:"0";s:10:"subscribes";s:0:"";s:7:"handles";s:0:"";s:12:"isrulefields";s:1:"1";s:8:"issystem";s:1:"1";s:6:"target";s:1:"0";s:6:"iscard";s:1:"0";s:11:"permissions";s:0:"";s:13:"title_initial";s:0:"";s:13:"wxapp_support";s:1:"0";s:11:"app_support";i:2;s:15:"welcome_support";s:1:"0";s:10:"oauth_type";s:1:"0";s:14:"webapp_support";s:1:"0";s:16:"phoneapp_support";s:1:"0";s:2:"id";N;s:10:"modulename";N;s:9:"isdisplay";i:1;s:4:"logo";s:51:"http://localhost/addons/video/icon.jpg?v=1529927047";s:11:"main_module";b:0;s:11:"plugin_list";a:0:{}s:11:"is_relation";b:0;}'),
('we7:module_info:voice', 'a:31:{s:3:"mid";s:1:"9";s:4:"name";s:5:"voice";s:4:"type";s:6:"system";s:5:"title";s:18:"基本语音回复";s:7:"version";s:3:"1.0";s:7:"ability";s:18:"提供语音回复";s:11:"description";s:132:"在回复规则中可选择具有语音的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝语音。";s:6:"author";s:13:"WeEngine Team";s:3:"url";s:18:"http://www.we7.cc/";s:8:"settings";s:1:"0";s:10:"subscribes";s:0:"";s:7:"handles";s:0:"";s:12:"isrulefields";s:1:"1";s:8:"issystem";s:1:"1";s:6:"target";s:1:"0";s:6:"iscard";s:1:"0";s:11:"permissions";s:0:"";s:13:"title_initial";s:0:"";s:13:"wxapp_support";s:1:"0";s:11:"app_support";i:2;s:15:"welcome_support";s:1:"0";s:10:"oauth_type";s:1:"0";s:14:"webapp_support";s:1:"0";s:16:"phoneapp_support";s:1:"0";s:2:"id";N;s:10:"modulename";N;s:9:"isdisplay";i:1;s:4:"logo";s:51:"http://localhost/addons/voice/icon.jpg?v=1529927047";s:11:"main_module";b:0;s:11:"plugin_list";a:0:{}s:11:"is_relation";b:0;}'),
('we7:module_info:chats', 'a:31:{s:3:"mid";s:2:"10";s:4:"name";s:5:"chats";s:4:"type";s:6:"system";s:5:"title";s:18:"发送客服消息";s:7:"version";s:3:"1.0";s:7:"ability";s:77:"公众号可以在粉丝最后发送消息的48小时内无限制发送消息";s:11:"description";s:0:"";s:6:"author";s:13:"WeEngine Team";s:3:"url";s:18:"http://www.we7.cc/";s:8:"settings";s:1:"0";s:10:"subscribes";s:0:"";s:7:"handles";s:0:"";s:12:"isrulefields";s:1:"0";s:8:"issystem";s:1:"1";s:6:"target";s:1:"0";s:6:"iscard";s:1:"0";s:11:"permissions";s:0:"";s:13:"title_initial";s:0:"";s:13:"wxapp_support";s:1:"0";s:11:"app_support";i:2;s:15:"welcome_support";s:1:"0";s:10:"oauth_type";s:1:"0";s:14:"webapp_support";s:1:"0";s:16:"phoneapp_support";s:1:"0";s:2:"id";N;s:10:"modulename";N;s:9:"isdisplay";i:1;s:4:"logo";s:51:"http://localhost/addons/chats/icon.jpg?v=1529927047";s:11:"main_module";b:0;s:11:"plugin_list";a:0:{}s:11:"is_relation";b:0;}'),
('we7:module_info:custom', 'a:31:{s:3:"mid";s:1:"6";s:4:"name";s:6:"custom";s:4:"type";s:6:"system";s:5:"title";s:15:"多客服转接";s:7:"version";s:5:"1.0.0";s:7:"ability";s:36:"用来接入腾讯的多客服系统";s:11:"description";s:0:"";s:6:"author";s:13:"WeEngine Team";s:3:"url";s:17:"http://bbs.we7.cc";s:8:"settings";s:1:"0";s:10:"subscribes";a:0:{}s:7:"handles";a:6:{i:0;s:5:"image";i:1;s:5:"voice";i:2;s:5:"video";i:3;s:8:"location";i:4;s:4:"link";i:5;s:4:"text";}s:12:"isrulefields";s:1:"1";s:8:"issystem";s:1:"1";s:6:"target";s:1:"0";s:6:"iscard";s:1:"0";s:11:"permissions";s:0:"";s:13:"title_initial";s:0:"";s:13:"wxapp_support";s:1:"0";s:11:"app_support";i:2;s:15:"welcome_support";s:1:"0";s:10:"oauth_type";s:1:"0";s:14:"webapp_support";s:1:"0";s:16:"phoneapp_support";s:1:"0";s:2:"id";N;s:10:"modulename";N;s:9:"isdisplay";i:1;s:4:"logo";s:52:"http://localhost/addons/custom/icon.jpg?v=1529927047";s:11:"main_module";b:0;s:11:"plugin_list";a:0:{}s:11:"is_relation";b:0;}'),
('we7:lastaccount:BOotT', 'a:1:{s:7:"account";i:1;}'),
('stat:todaylock:1', 'a:1:{s:6:"expire";i:1529934248;}'),
('unicount:1', 's:1:"1";'),
('we7:unimodules:1:1', 'a:13:{s:11:"ewei_shopv2";a:1:{s:4:"name";s:11:"ewei_shopv2";}s:8:"recharge";a:1:{s:4:"name";s:8:"recharge";}s:7:"userapi";a:1:{s:4:"name";s:7:"userapi";}s:5:"music";a:1:{s:4:"name";s:5:"music";}s:4:"news";a:1:{s:4:"name";s:4:"news";}s:5:"basic";a:1:{s:4:"name";s:5:"basic";}s:6:"wxcard";a:1:{s:4:"name";s:6:"wxcard";}s:6:"images";a:1:{s:4:"name";s:6:"images";}s:9:"paycenter";a:1:{s:4:"name";s:9:"paycenter";}s:5:"video";a:1:{s:4:"name";s:5:"video";}s:5:"voice";a:1:{s:4:"name";s:5:"voice";}s:5:"chats";a:1:{s:4:"name";s:5:"chats";}s:6:"custom";a:1:{s:4:"name";s:6:"custom";}}');

DROP TABLE IF EXISTS `ims_core_cron`;
CREATE TABLE IF NOT EXISTS `ims_core_cron` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cloudid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `lastruntime` int(10) unsigned NOT NULL,
  `nextruntime` int(10) unsigned NOT NULL,
  `weekday` tinyint(3) NOT NULL,
  `day` tinyint(3) NOT NULL,
  `hour` tinyint(3) NOT NULL,
  `minute` varchar(255) NOT NULL,
  `extra` varchar(5000) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `createtime` (`createtime`),
  KEY `nextruntime` (`nextruntime`),
  KEY `uniacid` (`uniacid`),
  KEY `cloudid` (`cloudid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_core_cron_record`;
CREATE TABLE IF NOT EXISTS `ims_core_cron_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `note` varchar(500) NOT NULL,
  `tag` varchar(5000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `tid` (`tid`),
  KEY `module` (`module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_core_menu`;
CREATE TABLE IF NOT EXISTS `ims_core_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `append_title` varchar(30) NOT NULL,
  `append_url` varchar(255) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_system` tinyint(3) unsigned NOT NULL,
  `permission_name` varchar(50) NOT NULL,
  `group_name` varchar(30) NOT NULL,
  `icon` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

INSERT INTO `ims_core_menu` (`id`, `pid`, `title`, `name`, `url`, `append_title`, `append_url`, `displayorder`, `type`, `is_display`, `is_system`, `permission_name`, `group_name`, `icon`) VALUES
(1, 0, '基础设置', 'platform', '', 'fa fa-cog', '', 0, 'url', 1, 1, '', '', ''),
(2, 1, '基本功能', 'platform', '', '', '', 0, 'url', 1, 1, 'platform_basic_function', '', ''),
(3, 2, '文字回复', 'platform', './index.php?c=platform&a=reply&m=basic', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=basic', 0, 'url', 1, 1, 'platform_reply_basic', '', ''),
(4, 2, '图文回复', 'platform', './index.php?c=platform&a=reply&m=news', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=news', 0, 'url', 1, 1, 'platform_reply_news', '', ''),
(5, 2, '音乐回复', 'platform', './index.php?c=platform&a=reply&m=music', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=music', 0, 'url', 1, 1, 'platform_reply_music', '', ''),
(6, 2, '图片回复', 'platform', './index.php?c=platform&a=reply&m=images', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=images', 0, 'url', 1, 1, 'platform_reply_images', '', ''),
(7, 2, '语音回复', 'platform', './index.php?c=platform&a=reply&m=voice', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=voice', 0, 'url', 1, 1, 'platform_reply_voice', '', ''),
(8, 2, '视频回复', 'platform', './index.php?c=platform&a=reply&m=video', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=video', 0, 'url', 1, 1, 'platform_reply_video', '', ''),
(9, 2, '微信卡券回复', 'platform', './index.php?c=platform&a=reply&m=wxcard', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=wxcard', 0, 'url', 1, 1, 'platform_reply_wxcard', '', ''),
(10, 2, '自定义接口回复', 'platform', './index.php?c=platform&a=reply&m=userapi', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=userapi', 0, 'url', 1, 1, 'platform_reply_userapi', '', ''),
(11, 2, '系统回复', 'platform', './index.php?c=platform&a=special&do=display&', '', '', 0, 'url', 1, 1, 'platform_reply_system', '', ''),
(12, 1, '高级功能', 'platform', '', '', '', 0, 'url', 1, 1, 'platform_high_function', '', ''),
(13, 12, '常用服务接入', 'platform', './index.php?c=platform&a=service&do=switch&', '', '', 0, 'url', 1, 1, 'platform_service', '', ''),
(14, 12, '自定义菜单', 'platform', './index.php?c=platform&a=menu&', '', '', 0, 'url', 1, 1, 'platform_menu', '', ''),
(15, 12, '特殊消息回复', 'platform', './index.php?c=platform&a=special&do=message&', '', '', 0, 'url', 1, 1, 'platform_special', '', ''),
(16, 12, '二维码管理', 'platform', './index.php?c=platform&a=qr&', '', '', 0, 'url', 1, 1, 'platform_qr', '', ''),
(17, 12, '多客服接入', 'platform', './index.php?c=platform&a=reply&m=custom', '', '', 0, 'url', 1, 1, 'platform_reply_custom', '', ''),
(18, 12, '长链接二维码', 'platform', './index.php?c=platform&a=url2qr&', '', '', 0, 'url', 1, 1, 'platform_url2qr', '', ''),
(19, 1, '数据统计', 'platform', '', '', '', 0, 'url', 1, 1, 'platform_stat', '', ''),
(20, 19, '聊天记录', 'platform', './index.php?c=platform&a=stat&do=history&', '', '', 0, 'url', 1, 1, 'platform_stat_history', '', ''),
(21, 19, '回复规则使用情况', 'platform', './index.php?c=platform&a=stat&do=rule&', '', '', 0, 'url', 1, 1, 'platform_stat_rule', '', ''),
(22, 19, '关键字命中情况', 'platform', './index.php?c=platform&a=stat&do=keyword&', '', '', 0, 'url', 1, 1, 'platform_stat_keyword', '', ''),
(23, 19, '参数', 'platform', './index.php?c=platform&a=stat&do=setting&', '', '', 0, 'url', 1, 1, 'platform_stat_setting', '', ''),
(24, 0, '微站功能', 'site', '', 'fa fa-life-bouy', '', 0, 'url', 1, 1, '', '', ''),
(25, 24, '微站管理', 'site', '', '', '', 0, 'url', 1, 1, 'site_manage', '', ''),
(26, 25, '站点管理', 'site', './index.php?c=site&a=multi&do=display&', 'fa fa-plus', './index.php?c=site&a=multi&do=post&', 0, 'url', 1, 1, 'site_multi_display', '', ''),
(27, 25, '站点添加/编辑', 'site', '', '', '', 0, 'permission', 0, 1, 'site_multi_post', '', ''),
(28, 25, '站点删除', 'site', '', '', '', 0, 'permission', 0, 1, 'site_multi_del', '', ''),
(29, 25, '模板管理', 'site', './index.php?c=site&a=style&do=template&', '', '', 0, 'url', 1, 1, 'site_style_template', '', ''),
(30, 25, '模块模板扩展', 'site', './index.php?c=site&a=style&do=module&', '', '', 0, 'url', 1, 1, 'site_style_module', '', ''),
(31, 24, '特殊页面管理', 'site', '', '', '', 0, 'url', 1, 1, 'site_special_page', '', ''),
(32, 31, '会员中心', 'site', './index.php?c=site&a=editor&do=uc&', '', '', 0, 'url', 1, 1, 'site_editor_uc', '', ''),
(33, 31, '专题页面', 'site', './index.php?c=site&a=editor&do=page&', 'fa fa-plus', './index.php?c=site&a=editor&do=design&', 0, 'url', 1, 1, 'site_editor_page', '', ''),
(34, 24, '功能组件', 'site', '', '', '', 0, 'url', 1, 1, 'site_article', '', ''),
(35, 34, '分类设置', 'site', './index.php?c=site&a=category&', '', '', 0, 'url', 1, 1, 'site_category', '', ''),
(36, 34, '文章管理', 'site', './index.php?c=site&a=article&', '', '', 0, 'url', 1, 1, 'site_article', '', ''),
(37, 0, '粉丝营销', 'mc', '', 'fa fa-gift', '', 0, 'url', 1, 1, '', '', ''),
(38, 37, '粉丝管理', 'mc', '', '', '', 0, 'url', 1, 1, 'mc_fans_manage', '', ''),
(39, 38, '粉丝分组', 'mc', './index.php?c=mc&a=fangroup&', '', '', 0, 'url', 1, 1, 'mc_fangroup', '', ''),
(40, 38, '粉丝', 'mc', './index.php?c=mc&a=fans&', '', '', 0, 'url', 1, 1, 'mc_fans', '', ''),
(41, 37, '会员中心', 'mc', '', '', '', 0, 'url', 1, 1, 'mc_members_manage', '', ''),
(42, 41, '会员中心关键字', 'mc', './index.php?c=platform&a=cover&do=mc&', '', '', 0, 'url', 1, 1, 'platform_cover_mc', '', ''),
(43, 41, '会员', 'mc', './index.php?c=mc&a=member', 'fa fa-plus', './index.php?c=mc&a=member&do=add', 0, 'url', 1, 1, 'mc_member', '', ''),
(44, 41, '会员组', 'mc', './index.php?c=mc&a=group&', '', '', 0, 'url', 1, 1, 'mc_group', '', ''),
(45, 37, '会员卡管理', 'mc', '', '', '', 0, 'url', 1, 1, 'mc_card_manage', '', ''),
(46, 45, '会员卡关键字', 'mc', './index.php?c=platform&a=cover&do=card&', '', '', 0, 'url', 1, 1, 'platform_cover_card', '', ''),
(47, 45, '会员卡管理', 'mc', './index.php?c=mc&a=card&do=manage', '', '', 0, 'url', 1, 1, 'mc_card_manage', '', ''),
(48, 45, '会员卡设置', 'mc', './index.php?c=mc&a=card&do=editor', '', '', 0, 'url', 1, 1, 'mc_card_editor', '', ''),
(49, 45, '会员卡其他功能', 'mc', './index.php?c=mc&a=card&do=other', '', '', 0, 'url', 1, 1, 'mc_card_other', '', ''),
(50, 37, '积分兑换', 'mc', '', '', '', 0, 'url', 1, 1, 'activity_discount_manage', '', ''),
(51, 50, '折扣券', 'mc', './index.php?c=activity&a=coupon&', '', '', 0, 'url', 1, 1, 'activity_coupon_display', '', ''),
(52, 50, '折扣券核销', 'mc', './index.php?c=activity&a=consume&do=display&type=1&status=2', '', '', 0, 'url', 1, 1, 'activity_consume_coupon', '', ''),
(53, 50, '代金券', 'mc', './index.php?c=activity&a=token', '', '', 0, 'url', 1, 1, 'activity_token_display', '', ''),
(54, 50, '代金券核销', 'mc', './index.php?c=activity&a=consume&do=display&type=2&status=2', '', '', 0, 'url', 1, 1, 'activity_consume_token', '', ''),
(55, 50, '真实物品', 'mc', './index.php?c=activity&a=goods', '', '', 0, 'url', 1, 1, 'activity_goods_display', '', ''),
(56, 37, '微信素材&群发', 'mc', '', '', '', 0, 'url', 1, 1, 'material_manage', '', ''),
(57, 56, '素材&群发', 'mc', './index.php?c=material&a=display', '', '', 0, 'url', 1, 1, 'material_display', '', ''),
(58, 56, '定时群发', 'mc', './index.php?c=material&a=mass', '', '', 0, 'url', 1, 1, 'material_mass', '', ''),
(59, 37, '微信卡券管理', 'mc', '', '', '', 0, 'url', 1, 1, 'wechat_card_manage', '', ''),
(60, 59, '卡券列表', 'mc', './index.php?c=wechat&a=card&do=list', '', '', 0, 'url', 1, 1, 'wechat_card_list', '', ''),
(61, 59, '卡券核销', 'mc', './index.php?c=wechat&a=consume', '', '', 0, 'url', 1, 1, 'wechat_consume', '', ''),
(62, 59, '测试白名单', 'mc', './index.php?c=wechat&a=white&do=list', '', '', 0, 'url', 1, 1, 'wechat_white_list', '', ''),
(63, 37, '门店管理', 'mc', '', '', '', 0, 'url', 1, 1, 'activity_store_manage', '', ''),
(64, 63, '门店列表', 'mc', './index.php?c=activity&a=store', '', '', 0, 'url', 1, 1, 'activity_store_list', '', ''),
(65, 63, '店员列表', 'mc', './index.php?c=activity&a=clerk', '', '', 0, 'url', 1, 1, 'activity_clerk_list', '', ''),
(66, 37, '收银台', 'mc', '', '', '', 0, 'url', 1, 1, 'paycenter_manage', '', ''),
(67, 66, '微信刷卡收款', 'mc', './index.php?c=paycenter&a=wxmicro&do=pay', '', '', 0, 'url', 1, 1, 'paycenter_wxmicro_pay', '', ''),
(68, 66, '收银台关键字', 'mc', './index.php?c=platform&a=cover&do=clerk', '', '', 0, 'url', 1, 1, 'paycenter_clerk', '', ''),
(69, 37, '统计中心', 'mc', '', '', '', 0, 'url', 1, 1, 'stat_center', '', ''),
(70, 69, '会员积分统计', 'mc', './index.php?c=stat&a=credit1', '', '', 0, 'url', 1, 1, 'stat_credit1', '', ''),
(71, 69, '会员余额统计', 'mc', './index.php?c=stat&a=credit2', '', '', 0, 'url', 1, 1, 'stat_credit2', '', ''),
(72, 69, '会员现金消费统计', 'mc', './index.php?c=stat&a=cash', '', '', 0, 'url', 1, 1, 'stat_cash', '', ''),
(73, 69, '会员卡统计', 'mc', './index.php?c=stat&a=card', '', '', 0, 'url', 1, 1, 'stat_card', '', ''),
(74, 69, '收银台收款统计', 'mc', './index.php?c=stat&a=paycenter', '', '', 0, 'url', 1, 1, 'stat_paycenter', '', ''),
(75, 0, '功能选项', 'setting', '', 'fa fa-umbrella', '', 0, 'url', 1, 1, '', '', ''),
(76, 75, '公众号选项', 'setting', '', '', '', 0, 'url', 1, 1, 'account_setting', '', ''),
(77, 76, '支付参数', 'setting', './index.php?c=profile&a=payment&', '', '', 0, 'url', 1, 1, 'profile_payment', '', ''),
(78, 76, '借用 oAuth 权限', 'setting', './index.php?c=mc&a=passport&do=oauth&', '', '', 0, 'url', 1, 1, 'mc_passport_oauth', '', ''),
(79, 76, '借用 JS 分享权限', 'setting', './index.php?c=profile&a=jsauth&', '', '', 0, 'url', 1, 1, 'profile_jsauth', '', ''),
(80, 76, '会员字段管理', 'setting', './index.php?c=mc&a=fields', '', '', 0, 'url', 1, 1, 'mc_fields', '', ''),
(81, 76, '微信通知设置', 'setting', './index.php?c=mc&a=tplnotice', '', '', 0, 'url', 1, 1, 'mc_tplnotice', '', ''),
(82, 76, '工作台菜单设置', 'setting', './index.php?c=profile&a=deskmenu', '', '', 0, 'url', 1, 1, 'profile_deskmenu', '', ''),
(83, 76, '会员扩展功能', 'setting', './index.php?c=mc&a=plugin', '', '', 0, 'url', 1, 1, 'mc_plugin', '', ''),
(84, 75, '会员及粉丝选项', 'setting', '', '', '', 0, 'url', 1, 1, 'mc_setting', '', ''),
(85, 84, '积分设置', 'setting', './index.php?c=mc&a=credit&', '', '', 0, 'url', 1, 1, 'mc_credit', '', ''),
(86, 84, '注册设置', 'setting', './index.php?c=mc&a=passport&do=passport&', '', '', 0, 'url', 1, 1, 'mc_passport_passport', '', ''),
(87, 84, '粉丝同步设置', 'setting', './index.php?c=mc&a=passport&do=sync&', '', '', 0, 'url', 1, 1, 'mc_passport_sync', '', ''),
(88, 84, 'UC站点整合', 'setting', './index.php?c=mc&a=uc&', '', '', 0, 'url', 1, 1, 'mc_uc', '', ''),
(89, 84, '邮件通知参数', 'setting', './index.php?c=profile&a=notify', '', '', 0, 'url', 1, 1, 'profile_notify', '', ''),
(90, 75, '其他功能选项', 'setting', '', '', '', 0, 'url', 1, 1, 'others_setting', '', ''),
(91, 0, '扩展功能', 'ext', '', 'fa fa-cubes', '', 0, 'url', 1, 1, '', '', ''),
(92, 91, '管理', 'ext', '', '', '', 0, 'url', 1, 1, '', '', ''),
(93, 92, '扩展功能管理', 'ext', './index.php?c=profile&a=module&', '', '', 0, 'url', 1, 1, 'profile_module', '', '');

DROP TABLE IF EXISTS `ims_core_paylog`;
CREATE TABLE IF NOT EXISTS `ims_core_paylog` (
  `plid` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `acid` int(10) NOT NULL,
  `openid` varchar(40) NOT NULL,
  `uniontid` varchar(64) NOT NULL,
  `tid` varchar(128) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `module` varchar(50) NOT NULL,
  `tag` varchar(2000) NOT NULL,
  `is_usecard` tinyint(3) unsigned NOT NULL,
  `card_type` tinyint(3) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `card_fee` decimal(10,2) unsigned NOT NULL,
  `encrypt_code` varchar(100) NOT NULL,
  PRIMARY KEY (`plid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_tid` (`tid`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `uniontid` (`uniontid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_core_performance`;
CREATE TABLE IF NOT EXISTS `ims_core_performance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `runtime` varchar(10) NOT NULL,
  `runurl` varchar(512) NOT NULL,
  `runsql` varchar(512) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_core_queue`;
CREATE TABLE IF NOT EXISTS `ims_core_queue` (
  `qid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `message` varchar(2000) NOT NULL,
  `params` varchar(1000) NOT NULL,
  `keyword` varchar(1000) NOT NULL,
  `response` varchar(2000) NOT NULL,
  `module` varchar(50) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`qid`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `module` (`module`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_core_refundlog`;
CREATE TABLE IF NOT EXISTS `ims_core_refundlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `refund_uniontid` varchar(64) NOT NULL,
  `reason` varchar(80) NOT NULL,
  `uniontid` varchar(64) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `refund_uniontid` (`refund_uniontid`) USING BTREE,
  KEY `uniontid` (`uniontid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_core_resource`;
CREATE TABLE IF NOT EXISTS `ims_core_resource` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `media_id` varchar(100) NOT NULL,
  `trunk` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `acid` (`uniacid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_core_sendsms_log`;
CREATE TABLE IF NOT EXISTS `ims_core_sendsms_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `createtime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_core_sessions`;
CREATE TABLE IF NOT EXISTS `ims_core_sessions` (
  `sid` char(32) NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `data` varchar(5000) NOT NULL,
  `expiretime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ims_core_sessions` (`sid`, `uniacid`, `openid`, `data`, `expiretime`) VALUES
('1cc20012424929fe4e24283de27e8098', 1, '::1', 'acid|s:1:"1";uniacid|i:1;token|a:3:{s:4:"udS4";i:1475642432;s:4:"rnHL";i:1475642539;s:4:"d3vW";i:1475642657;}', 1475646257),
('bb9f151eeb7d81d2ffca6950c7b9f7d5', 1, '::1', 'acid|s:1:"1";uniacid|i:1;token|a:3:{s:4:"vroV";i:1481269618;s:4:"WEd8";i:1481269618;s:4:"K6Sj";i:1481269619;}', 1481273219);

DROP TABLE IF EXISTS `ims_core_settings`;
CREATE TABLE IF NOT EXISTS `ims_core_settings` (
  `key` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ims_core_settings` (`key`, `value`) VALUES
('copyright', 'a:26:{s:6:"status";s:1:"0";s:10:"verifycode";s:1:"0";s:6:"reason";s:0:"";s:8:"sitename";s:21:"微上宝分销平台";s:3:"url";s:7:"http://";s:8:"statcode";s:0:"";s:10:"footerleft";s:14:"Copyright 2017";s:11:"footerright";s:19:"All Rights Reserved";s:4:"icon";s:0:"";s:5:"flogo";s:48:"images/global/ez83GNNaav63zt60detv60bZzRGnBV.png";s:6:"slides";s:216:"a:3:{i:0;s:58:"https://img.alicdn.com/tps/TB1pfG4IFXXXXc6XXXXXXXXXXXX.jpg";i:1;s:58:"https://img.alicdn.com/tps/TB1sXGYIFXXXXc5XpXXXXXXXXXX.jpg";i:2;s:58:"https://img.alicdn.com/tps/TB1h9xxIFXXXXbKXXXXXXXXXXXX.jpg";}";s:6:"notice";s:0:"";s:5:"blogo";s:48:"images/global/ez83GNNaav63zt60detv60bZzRGnBV.png";s:8:"baidumap";a:2:{s:3:"lng";s:0:"";s:3:"lat";s:0:"";}s:7:"company";s:24:"广州谷来信息科技";s:4:"skin";s:7:"default";s:14:"companyprofile";s:0:"";s:7:"address";s:27:"广东省广州市天河区";s:6:"person";s:9:"陈先生";s:5:"phone";s:12:"020-88888888";s:2:"qq";s:8:"88888888";s:5:"email";s:13:"888888@qq.com";s:8:"keywords";s:21:"微上宝分销平台";s:11:"description";s:21:"微上宝分销平台";s:12:"showhomepage";i:1;s:13:"leftmenufixed";i:0;}'),
('authmode', 'i:1;'),
('close', 'a:2:{s:6:"status";s:1:"0";s:6:"reason";s:0:"";}'),
('register', 'a:4:{s:4:"open";i:1;s:6:"verify";i:0;s:4:"code";i:1;s:7:"groupid";i:1;}'),
('module_receive_ban', 'a:0:{}'),
('basic', 'a:1:{s:8:"template";s:9:"we8_white";}'),
('module_ban', 'a:0:{}'),
('module_upgrade', 'a:0:{}'),
('cloudip', 'a:0:{}');

DROP TABLE IF EXISTS `ims_coupon`;
CREATE TABLE IF NOT EXISTS `ims_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `type` varchar(15) NOT NULL,
  `logo_url` varchar(150) NOT NULL,
  `code_type` tinyint(3) unsigned NOT NULL,
  `brand_name` varchar(15) NOT NULL,
  `title` varchar(15) NOT NULL,
  `sub_title` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `notice` varchar(15) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_info` varchar(200) NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `use_custom_code` tinyint(3) NOT NULL,
  `bind_openid` tinyint(3) unsigned NOT NULL,
  `can_share` tinyint(3) unsigned NOT NULL,
  `can_give_friend` tinyint(3) unsigned NOT NULL,
  `get_limit` tinyint(3) unsigned NOT NULL,
  `service_phone` varchar(20) NOT NULL,
  `extra` varchar(1000) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_selfconsume` tinyint(3) unsigned NOT NULL,
  `promotion_url_name` varchar(10) NOT NULL,
  `promotion_url` varchar(100) NOT NULL,
  `promotion_url_sub_title` varchar(10) NOT NULL,
  `source` tinyint(3) unsigned NOT NULL,
  `dosage` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_coupon_activity`;
CREATE TABLE IF NOT EXISTS `ims_coupon_activity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `msg_id` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` int(3) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `coupons` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `members` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_coupon_groups`;
CREATE TABLE IF NOT EXISTS `ims_coupon_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `couponid` varchar(255) NOT NULL,
  `groupid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_coupon_location`;
CREATE TABLE IF NOT EXISTS `ims_coupon_location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `province` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `photo_list` varchar(10000) NOT NULL,
  `avg_price` int(10) unsigned NOT NULL,
  `open_time` varchar(50) NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `offset_type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_coupon_modules`;
CREATE TABLE IF NOT EXISTS `ims_coupon_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `couponid` (`couponid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_coupon_record`;
CREATE TABLE IF NOT EXISTS `ims_coupon_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `friend_openid` varchar(50) NOT NULL,
  `givebyfriend` tinyint(3) unsigned NOT NULL,
  `code` varchar(50) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `usetime` int(10) unsigned NOT NULL,
  `status` tinyint(3) NOT NULL,
  `clerk_name` varchar(15) NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `grantmodule` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `card_id` (`card_id`),
  KEY `hash` (`hash`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_coupon_setting`;
CREATE TABLE IF NOT EXISTS `ims_coupon_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) NOT NULL,
  `logourl` varchar(150) NOT NULL,
  `whitelist` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_coupon_store`;
CREATE TABLE IF NOT EXISTS `ims_coupon_store` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `couponid` varchar(255) NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `couponid` (`couponid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_cover_reply`;
CREATE TABLE IF NOT EXISTS `ims_cover_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL,
  `do` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `ims_cover_reply` (`id`, `uniacid`, `multiid`, `rid`, `module`, `do`, `title`, `description`, `thumb`, `url`) VALUES
(1, 1, 0, 7, 'mc', '', '进入个人中心', '', '', './index.php?c=mc&a=home&i=1'),
(2, 1, 1, 8, 'site', '', '进入首页', '', '', './index.php?c=home&i=1&t=1'),
(3, 1, 0, 9, 'ewei_shopv2', '', '', '', '', './index.php?i=1&c=entry&m=ewei_shopv2&do=mobile&r=article.list'),
(4, 1, 0, 10, 'ewei_shopv2', '', '1', '', '', './index.php?i=1&c=entry&m=ewei_shopv2&do=mobile&r=sign.list');

DROP TABLE IF EXISTS `ims_custom_reply`;
CREATE TABLE IF NOT EXISTS `ims_custom_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `start1` int(10) NOT NULL,
  `end1` int(10) NOT NULL,
  `start2` int(10) NOT NULL,
  `end2` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_message_mass_sign`;
CREATE TABLE IF NOT EXISTS `ims_ewei_message_mass_sign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `taskid` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `log` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_message_mass_task`;
CREATE TABLE IF NOT EXISTS `ims_ewei_message_mass_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `status` tinyint(1) DEFAULT '0',
  `processnum` int(11) DEFAULT '1',
  `sendnum` int(11) DEFAULT '0',
  `messagetype` tinyint(1) DEFAULT '0',
  `templateid` int(11) DEFAULT '0',
  `resptitle` varchar(255) DEFAULT NULL,
  `respthumb` varchar(255) DEFAULT NULL,
  `respdesc` varchar(255) DEFAULT NULL,
  `respurl` varchar(255) DEFAULT NULL,
  `sendlimittype` tinyint(1) DEFAULT '0',
  `send_openid` text,
  `send_level` int(11) DEFAULT NULL,
  `send_group` int(11) DEFAULT NULL,
  `send_agentlevel` int(11) DEFAULT NULL,
  `customertype` tinyint(1) DEFAULT '0',
  `resdesc2` varchar(255) DEFAULT '',
  `pagecount` int(11) DEFAULT '0',
  `successnum` int(11) DEFAULT '0',
  `failnum` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_message_mass_template`;
CREATE TABLE IF NOT EXISTS `ims_ewei_message_mass_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `template_id` varchar(255) DEFAULT '',
  `first` text NOT NULL,
  `firstcolor` varchar(255) DEFAULT '',
  `data` text NOT NULL,
  `remark` text NOT NULL,
  `remarkcolor` varchar(255) DEFAULT '',
  `url` varchar(255) NOT NULL,
  `createtime` int(11) DEFAULT '0',
  `sendtimes` int(11) DEFAULT '0',
  `sendcount` int(11) DEFAULT '0',
  `miniprogram` tinyint(1) DEFAULT '0',
  `appid` varchar(255) DEFAULT '',
  `pagepath` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_abonus_bill`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_abonus_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `billno` varchar(100) DEFAULT '',
  `paytype` int(11) DEFAULT '0',
  `year` int(11) DEFAULT '0',
  `month` int(11) DEFAULT '0',
  `week` int(11) DEFAULT '0',
  `ordercount` int(11) DEFAULT '0',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  `paytime` int(11) DEFAULT '0',
  `aagentcount1` int(11) DEFAULT '0',
  `aagentcount2` int(11) DEFAULT '0',
  `aagentcount3` int(11) DEFAULT '0',
  `bonusmoney1` decimal(10,2) DEFAULT '0.00',
  `bonusmoney_send1` decimal(10,2) DEFAULT '0.00',
  `bonusmoney_pay1` decimal(10,2) DEFAULT '0.00',
  `bonusmoney2` decimal(10,2) DEFAULT '0.00',
  `bonusmoney_send2` decimal(10,2) DEFAULT '0.00',
  `bonusmoney_pay2` decimal(10,2) DEFAULT '0.00',
  `bonusmoney3` decimal(10,2) DEFAULT '0.00',
  `bonusmoney_send3` decimal(10,2) DEFAULT '0.00',
  `bonusmoney_pay3` decimal(10,2) DEFAULT '0.00',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `starttime` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  `confirmtime` int(11) DEFAULT '0',
  `ceshi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_paytype` (`paytype`) USING BTREE,
  KEY `idx_createtime` (`createtime`) USING BTREE,
  KEY `idx_paytime` (`paytime`) USING BTREE,
  KEY `idx_status` (`status`) USING BTREE,
  KEY `idx_month` (`month`) USING BTREE,
  KEY `idx_week` (`week`) USING BTREE,
  KEY `idx_year` (`year`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_abonus_billo`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_abonus_billo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `billid` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_billid` (`billid`) USING BTREE,
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_abonus_billp`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_abonus_billp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `billid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `payno` varchar(255) DEFAULT '',
  `paytype` tinyint(3) DEFAULT '0',
  `bonus1` decimal(10,4) DEFAULT '0.0000',
  `bonus2` decimal(10,4) DEFAULT '0.0000',
  `bonus3` decimal(10,4) DEFAULT '0.0000',
  `money1` decimal(10,2) DEFAULT '0.00',
  `realmoney1` decimal(10,2) DEFAULT '0.00',
  `paymoney1` decimal(10,2) DEFAULT '0.00',
  `money2` decimal(10,2) DEFAULT '0.00',
  `realmoney2` decimal(10,2) DEFAULT '0.00',
  `paymoney2` decimal(10,2) DEFAULT '0.00',
  `money3` decimal(10,2) DEFAULT '0.00',
  `realmoney3` decimal(10,2) DEFAULT '0.00',
  `paymoney3` decimal(10,2) DEFAULT '0.00',
  `chargemoney1` decimal(10,2) DEFAULT '0.00',
  `chargemoney2` decimal(10,2) DEFAULT '0.00',
  `chargemoney3` decimal(10,2) DEFAULT '0.00',
  `charge` decimal(10,2) DEFAULT '0.00',
  `status` tinyint(3) DEFAULT '0',
  `reason` varchar(255) DEFAULT '',
  `paytime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_billid` (`billid`) USING BTREE,
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_abonus_level`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_abonus_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `levelname` varchar(50) DEFAULT '',
  `bonus1` decimal(10,4) DEFAULT '0.0000',
  `bonus2` decimal(10,4) DEFAULT '0.0000',
  `bonus3` decimal(10,4) DEFAULT '0.0000',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  `ordercount` int(11) DEFAULT '0',
  `bonusmoney` decimal(10,2) DEFAULT '0.00',
  `downcount` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_address_applyfor`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_address_applyfor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `openid` varchar(11) DEFAULT NULL,
  `data` text,
  `orderid` int(11) DEFAULT NULL,
  `ordersn` varchar(255) DEFAULT NULL,
  `isdispose` tinyint(1) DEFAULT '0',
  `message` varchar(255) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `ispass` tinyint(1) DEFAULT '0',
  `isdelete` tinyint(4) DEFAULT '0',
  `isall` tinyint(4) DEFAULT '0',
  `old_address` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_adv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  `shopid` int(11) DEFAULT '0',
  `iswxapp` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

DROP TABLE IF EXISTS `ims_ewei_shop_area_config`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_area_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `new_area` tinyint(3) NOT NULL DEFAULT '0',
  `address_street` tinyint(3) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_article`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) NOT NULL DEFAULT '',
  `resp_desc` text NOT NULL,
  `resp_img` text NOT NULL,
  `article_content` longtext,
  `article_category` int(11) NOT NULL DEFAULT '0',
  `article_date_v` varchar(20) NOT NULL DEFAULT '',
  `article_date` varchar(20) NOT NULL DEFAULT '',
  `article_mp` varchar(50) NOT NULL DEFAULT '',
  `article_author` varchar(20) NOT NULL DEFAULT '',
  `article_readnum_v` int(11) NOT NULL DEFAULT '0',
  `article_readnum` int(11) NOT NULL DEFAULT '0',
  `article_likenum_v` int(11) NOT NULL DEFAULT '0',
  `article_likenum` int(11) NOT NULL DEFAULT '0',
  `article_linkurl` varchar(300) NOT NULL DEFAULT '',
  `article_rule_daynum` int(11) NOT NULL DEFAULT '0',
  `article_rule_allnum` int(11) NOT NULL DEFAULT '0',
  `article_rule_credit` int(11) NOT NULL DEFAULT '0',
  `article_rule_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `page_set_option_nocopy` int(1) NOT NULL DEFAULT '0',
  `page_set_option_noshare_tl` int(1) NOT NULL DEFAULT '0',
  `page_set_option_noshare_msg` int(1) NOT NULL DEFAULT '0',
  `article_keyword` varchar(255) NOT NULL DEFAULT '',
  `article_report` int(1) NOT NULL DEFAULT '0',
  `product_advs_type` int(1) NOT NULL DEFAULT '0',
  `product_advs_title` varchar(255) NOT NULL DEFAULT '',
  `product_advs_more` varchar(255) NOT NULL DEFAULT '',
  `product_advs_link` varchar(255) NOT NULL DEFAULT '',
  `product_advs` text NOT NULL,
  `article_state` int(1) NOT NULL DEFAULT '0',
  `network_attachment` varchar(255) DEFAULT '',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `article_rule_credittotal` int(11) DEFAULT '0',
  `article_rule_moneytotal` decimal(10,2) DEFAULT '0.00',
  `article_rule_credit2` int(11) NOT NULL DEFAULT '0',
  `article_rule_money2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `article_rule_creditm` int(11) NOT NULL DEFAULT '0',
  `article_rule_moneym` decimal(10,2) NOT NULL DEFAULT '0.00',
  `article_rule_creditm2` int(11) NOT NULL DEFAULT '0',
  `article_rule_moneym2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `article_readtime` int(11) DEFAULT '0',
  `article_areas` varchar(255) DEFAULT '',
  `article_endtime` int(11) DEFAULT '0',
  `article_hasendtime` tinyint(3) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `article_keyword2` varchar(255) NOT NULL DEFAULT '',
  `article_advance` int(11) DEFAULT '0',
  `article_virtualadd` tinyint(3) DEFAULT '0',
  `article_visit` tinyint(3) DEFAULT '0',
  `article_visit_level` text,
  `article_visit_tip` varchar(500) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_article_title` (`article_title`),
  KEY `idx_article_content` (`article_content`(10)),
  KEY `idx_article_keyword` (`article_keyword`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='营销文章' AUTO_INCREMENT=15 ;

DROP TABLE IF EXISTS `ims_ewei_shop_article_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL DEFAULT '',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  `isshow` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_category_name` (`category_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='营销表单分类' AUTO_INCREMENT=12 ;

DROP TABLE IF EXISTS `ims_ewei_shop_article_comment`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_article_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `articleid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `nickname` varchar(50) DEFAULT '',
  `headimgurl` varchar(255) DEFAULT '',
  `content` varchar(500) DEFAULT '',
  `reply_createtime` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `reply_content` varchar(500) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_openid` (`openid`) USING BTREE,
  KEY `idx_createtime` (`createtime`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_article_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_article_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL DEFAULT '0',
  `read` int(11) NOT NULL DEFAULT '0',
  `like` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(255) NOT NULL DEFAULT '',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_aid` (`aid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='点赞/阅读记录' AUTO_INCREMENT=621 ;

DROP TABLE IF EXISTS `ims_ewei_shop_article_report`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_article_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(255) NOT NULL DEFAULT '',
  `aid` int(11) DEFAULT '0',
  `cate` varchar(255) NOT NULL DEFAULT '',
  `cons` varchar(255) NOT NULL DEFAULT '',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户举报记录' AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_article_share`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_article_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL DEFAULT '0',
  `share_user` int(11) NOT NULL DEFAULT '0',
  `click_user` int(11) NOT NULL DEFAULT '0',
  `click_date` varchar(20) NOT NULL DEFAULT '',
  `add_credit` int(11) NOT NULL DEFAULT '0',
  `add_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_aid` (`aid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户分享数据' AUTO_INCREMENT=63 ;

DROP TABLE IF EXISTS `ims_ewei_shop_article_sys`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_article_sys` (
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `article_message` varchar(255) NOT NULL DEFAULT '',
  `article_title` varchar(255) NOT NULL DEFAULT '',
  `article_image` varchar(300) NOT NULL DEFAULT '',
  `article_shownum` int(11) NOT NULL DEFAULT '0',
  `article_keyword` varchar(255) NOT NULL DEFAULT '',
  `article_temp` int(11) NOT NULL DEFAULT '0',
  `article_close_advanced` tinyint(1) NOT NULL DEFAULT '1',
  `article_source` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`uniacid`),
  KEY `idx_article_message` (`article_message`),
  KEY `idx_article_keyword` (`article_keyword`),
  KEY `idx_article_title` (`article_title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章设置';

DROP TABLE IF EXISTS `ims_ewei_shop_author_bill`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_author_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `billno` varchar(100) DEFAULT '',
  `paytype` int(11) DEFAULT '0',
  `year` int(11) DEFAULT '0',
  `month` int(11) DEFAULT '0',
  `week` int(11) DEFAULT '0',
  `ordercount` int(11) DEFAULT '0',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  `bonusordermoney` decimal(10,2) DEFAULT '0.00',
  `bonusrate` decimal(10,2) DEFAULT '0.00',
  `bonusmoney` decimal(10,2) DEFAULT '0.00',
  `bonusmoney_send` decimal(10,2) DEFAULT '0.00',
  `bonusmoney_pay` decimal(10,2) DEFAULT '0.00',
  `paytime` int(11) DEFAULT '0',
  `partnercount` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `starttime` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  `confirmtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_paytype` (`paytype`) USING BTREE,
  KEY `idx_createtime` (`createtime`) USING BTREE,
  KEY `idx_paytime` (`paytime`) USING BTREE,
  KEY `idx_status` (`status`) USING BTREE,
  KEY `idx_month` (`month`) USING BTREE,
  KEY `idx_week` (`week`) USING BTREE,
  KEY `idx_year` (`year`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_author_billo`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_author_billo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `billid` int(11) DEFAULT '0',
  `authorid` int(11) DEFAULT NULL,
  `orderid` text,
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_billid` (`billid`) USING BTREE,
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_author_billp`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_author_billp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `billid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `payno` varchar(255) DEFAULT '',
  `paytype` tinyint(3) DEFAULT '0',
  `bonus` decimal(10,2) DEFAULT '0.00',
  `money` decimal(10,2) DEFAULT '0.00',
  `realmoney` decimal(10,2) DEFAULT '0.00',
  `paymoney` decimal(10,2) DEFAULT '0.00',
  `charge` decimal(10,2) DEFAULT '0.00',
  `chargemoney` decimal(10,2) DEFAULT '0.00',
  `status` tinyint(3) DEFAULT '0',
  `reason` varchar(255) DEFAULT '',
  `paytime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_billid` (`billid`) USING BTREE,
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_author_level`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_author_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `levelname` varchar(50) DEFAULT '',
  `bonus` decimal(10,4) DEFAULT '0.0000',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  `ordercount` int(11) DEFAULT '0',
  `commissionmoney` decimal(10,2) DEFAULT '0.00',
  `bonusmoney` decimal(10,2) DEFAULT '0.00',
  `downcount` int(11) DEFAULT '0',
  `bonus_fg` varchar(500) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_author_team`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_author_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `teamno` varchar(50) DEFAULT '',
  `year` int(11) DEFAULT '0',
  `month` int(11) DEFAULT '0',
  `team_count` int(11) DEFAULT '0',
  `team_ids` longtext,
  `status` tinyint(1) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `paytime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`) USING BTREE,
  KEY `teamno` (`teamno`) USING BTREE,
  KEY `year` (`year`) USING BTREE,
  KEY `month` (`month`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `createtime` (`createtime`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_author_team_pay`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_author_team_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `teamid` int(11) DEFAULT '0',
  `mid` int(11) DEFAULT '0',
  `payno` varchar(255) DEFAULT '',
  `money` decimal(10,2) DEFAULT '0.00',
  `paymoney` decimal(10,2) DEFAULT '0.00',
  `paytime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_teamid` (`teamid`) USING BTREE,
  KEY `idx_mid` (`mid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_banner`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `bannername` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  `shopid` int(11) DEFAULT '0',
  `iswxapp` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

DROP TABLE IF EXISTS `ims_ewei_shop_bargain_account`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_bargain_account` (
  `id` int(11) NOT NULL,
  `mall_name` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `mall_title` varchar(255) DEFAULT NULL,
  `mall_content` varchar(255) DEFAULT NULL,
  `mall_logo` varchar(255) DEFAULT NULL,
  `message` int(11) DEFAULT '0',
  `partin` int(11) DEFAULT '0',
  `rule` text,
  `end_message` int(11) DEFAULT '0',
  `follow_swi` tinyint(1) NOT NULL DEFAULT '0',
  `sharestyle` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `ims_ewei_shop_bargain_account` (`id`, `mall_name`, `banner`, `mall_title`, `mall_content`, `mall_logo`, `message`, `partin`, `rule`, `end_message`, `follow_swi`, `sharestyle`) VALUES
(1, '砍价商城', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 0);

DROP TABLE IF EXISTS `ims_ewei_shop_bargain_actor`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_bargain_actor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `now_price` decimal(9,2) NOT NULL,
  `created_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `bargain_times` int(10) NOT NULL,
  `openid` varchar(50) NOT NULL DEFAULT '',
  `nickname` varchar(20) NOT NULL,
  `head_image` varchar(200) NOT NULL,
  `bargain_price` decimal(9,2) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `account_id` int(11) NOT NULL,
  `initiate` tinyint(4) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_bargain_goods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_bargain_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `goods_id` varchar(20) NOT NULL,
  `end_price` decimal(10,2) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` tinyint(2) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `user_set` text,
  `rule` text,
  `act_times` int(11) NOT NULL,
  `mode` tinyint(4) NOT NULL,
  `total_time` int(11) NOT NULL,
  `each_time` int(11) NOT NULL,
  `time_limit` int(11) NOT NULL,
  `probability` text NOT NULL,
  `custom` varchar(255) DEFAULT NULL,
  `maximum` int(11) DEFAULT NULL,
  `initiate` tinyint(4) NOT NULL DEFAULT '0',
  `myself` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `goods_id` (`goods_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_bargain_record`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_bargain_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actor_id` int(11) NOT NULL,
  `bargain_price` decimal(9,2) NOT NULL,
  `openid` varchar(50) NOT NULL DEFAULT '',
  `nickname` varchar(20) NOT NULL,
  `head_image` varchar(200) NOT NULL,
  `bargain_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_carrier`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_carrier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `realname` varchar(50) DEFAULT '',
  `mobile` varchar(50) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `deleted` tinyint(1) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_cashier_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_cashier_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `catename` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_cashier_clearing`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_cashier_clearing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `cashierid` int(11) DEFAULT '0',
  `clearno` varchar(64) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `money` decimal(10,2) DEFAULT '0.00',
  `realmoney` decimal(10,2) DEFAULT '0.00',
  `remark` varchar(500) DEFAULT '',
  `orderids` text,
  `createtime` int(11) DEFAULT '0',
  `paytime` int(11) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `paytype` tinyint(1) DEFAULT '0',
  `payinfo` varchar(1000) DEFAULT '',
  `charge` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`) USING BTREE,
  KEY `storeid` (`cashierid`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `createtime` (`createtime`) USING BTREE,
  KEY `deleted` (`deleted`) USING BTREE,
  KEY `clearno` (`clearno`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_cashier_goods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_cashier_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `cashierid` int(11) DEFAULT '0',
  `createtime` int(10) unsigned DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `image` varchar(255) DEFAULT '',
  `categoryid` tinyint(1) DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `total` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `goodssn` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`) USING BTREE,
  KEY `cashierid` (`cashierid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_cashier_goods_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_cashier_goods_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `cashierid` int(11) DEFAULT '0',
  `catename` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_cashierid` (`cashierid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_cashier_operator`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_cashier_operator` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `cashierid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `manageopenid` varchar(50) DEFAULT '',
  `username` varchar(255) DEFAULT '',
  `password` varchar(50) DEFAULT '',
  `salt` varchar(8) DEFAULT '',
  `perm` text,
  `createtime` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`) USING BTREE,
  KEY `cashierid` (`cashierid`) USING BTREE,
  KEY `manageopenid` (`manageopenid`) USING BTREE,
  KEY `username` (`username`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_cashier_order`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_cashier_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `ordersn` varchar(255) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  `openid` varchar(50) DEFAULT '',
  `payopenid` varchar(50) DEFAULT '',
  `createtime` int(10) unsigned DEFAULT '0',
  `status` tinyint(4) DEFAULT '0',
  `paytime` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_cashier_pay_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_cashier_pay_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `cashierid` int(11) DEFAULT '0',
  `operatorid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `paytype` tinyint(3) DEFAULT NULL,
  `logno` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `money` decimal(10,2) DEFAULT '0.00',
  `paytime` int(11) DEFAULT '0',
  `is_applypay` tinyint(1) DEFAULT '0',
  `randommoney` decimal(10,2) DEFAULT '0.00',
  `enough` decimal(10,2) DEFAULT '0.00',
  `mobile` varchar(20) DEFAULT '',
  `deduction` decimal(10,2) DEFAULT '0.00',
  `discountmoney` decimal(10,2) DEFAULT '0.00',
  `discount` decimal(5,2) DEFAULT '0.00',
  `isgoods` tinyint(1) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `orderprice` decimal(10,2) DEFAULT '0.00',
  `goodsprice` decimal(10,2) DEFAULT '0.00',
  `couponpay` decimal(10,2) DEFAULT '0.00',
  `payopenid` varchar(50) DEFAULT '',
  `nosalemoney` decimal(10,2) DEFAULT '0.00',
  `coupon` int(11) DEFAULT '0',
  `usecoupon` int(11) DEFAULT '0',
  `usecouponprice` decimal(10,2) DEFAULT '0.00',
  `present_credit1` int(11) DEFAULT '0',
  `refundsn` varchar(50) DEFAULT '',
  `refunduser` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_type` (`paytype`) USING BTREE,
  KEY `idx_createtime` (`createtime`) USING BTREE,
  KEY `idx_status` (`status`) USING BTREE,
  KEY `idx_storeid` (`cashierid`) USING BTREE,
  KEY `idx_logno` (`logno`) USING BTREE,
  KEY `is_applypay` (`is_applypay`) USING BTREE,
  KEY `orderid` (`orderid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_cashier_pay_log_goods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_cashier_pay_log_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cashierid` int(11) DEFAULT '0',
  `logid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `total` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `logid` (`logid`) USING BTREE,
  KEY `goodsid` (`goodsid`) USING BTREE,
  KEY `cashierid` (`cashierid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_cashier_qrcode`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_cashier_qrcode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `cashierid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `goodstitle` varchar(255) DEFAULT '',
  `money` decimal(10,2) DEFAULT '0.00',
  `createtime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`) USING BTREE,
  KEY `cashierid` (`cashierid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_cashier_user`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_cashier_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `storeid` int(11) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `setmeal` tinyint(3) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `logo` varchar(255) DEFAULT '',
  `manageopenid` varchar(50) DEFAULT '',
  `isopen_commission` tinyint(1) DEFAULT '0',
  `name` varchar(50) DEFAULT '',
  `mobile` varchar(50) DEFAULT '',
  `categoryid` int(11) DEFAULT '0',
  `wechat_status` tinyint(1) DEFAULT '0',
  `wechatpay` text,
  `alipay_status` tinyint(1) DEFAULT '0',
  `alipay` text,
  `withdraw` decimal(10,2) DEFAULT '0.00',
  `openid` varchar(50) DEFAULT '',
  `diyformfields` text,
  `diyformdata` text,
  `createtime` int(11) DEFAULT '0',
  `username` varchar(255) DEFAULT '',
  `password` varchar(32) DEFAULT '',
  `salt` char(8) DEFAULT '',
  `lifetimestart` int(10) unsigned DEFAULT '0',
  `lifetimeend` int(10) unsigned DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `set` longtext,
  `deleted` tinyint(1) DEFAULT '0',
  `can_withdraw` tinyint(1) DEFAULT '0',
  `show_paytype` tinyint(1) DEFAULT '0',
  `couponid` varchar(255) DEFAULT '',
  `management` varchar(1000) DEFAULT '',
  `notice_openids` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`) USING BTREE,
  KEY `openid` (`manageopenid`) USING BTREE,
  KEY `username` (`username`) USING BTREE,
  KEY `status` (`status`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `parentid` int(11) DEFAULT '0',
  `isrecommand` int(10) DEFAULT '0',
  `description` varchar(500) DEFAULT NULL,
  `displayorder` tinyint(3) unsigned DEFAULT '0',
  `enabled` tinyint(1) DEFAULT '1',
  `ishome` tinyint(3) DEFAULT '0',
  `advimg` varchar(255) DEFAULT '',
  `advurl` varchar(500) DEFAULT '',
  `level` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_parentid` (`parentid`),
  KEY `idx_isrecommand` (`isrecommand`),
  KEY `idx_ishome` (`ishome`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1174 ;

DROP TABLE IF EXISTS `ims_ewei_shop_city_express`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_city_express` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `start_fee` decimal(10,2) DEFAULT '0.00',
  `start_km` int(11) DEFAULT '0',
  `pre_km` int(11) DEFAULT '0',
  `pre_km_fee` decimal(10,2) DEFAULT '0.00',
  `fixed_km` int(11) DEFAULT '0',
  `fixed_fee` decimal(10,2) DEFAULT '0.00',
  `receive_goods` int(11) DEFAULT NULL,
  `lng` varchar(255) DEFAULT '',
  `lat` varchar(255) DEFAULT '',
  `range` int(11) DEFAULT '0',
  `zoom` int(11) NOT NULL DEFAULT '13',
  `express_type` int(11) NOT NULL DEFAULT '0',
  `config` varchar(255) NOT NULL DEFAULT '',
  `tel1` varchar(255) DEFAULT '',
  `tel2` varchar(255) DEFAULT '',
  `is_sum` tinyint(1) DEFAULT '0',
  `is_dispatch` tinyint(1) DEFAULT '1',
  `enabled` tinyint(1) DEFAULT '0',
  `geo_key` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_commission_apply`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_commission_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `applyno` varchar(255) DEFAULT '',
  `mid` int(11) DEFAULT '0',
  `type` tinyint(3) DEFAULT '0',
  `orderids` longtext,
  `commission` decimal(10,2) DEFAULT '0.00',
  `commission_pay` decimal(10,2) DEFAULT '0.00',
  `content` text,
  `status` tinyint(3) DEFAULT '0',
  `applytime` int(11) DEFAULT '0',
  `checktime` int(11) DEFAULT '0',
  `paytime` int(11) DEFAULT '0',
  `invalidtime` int(11) DEFAULT '0',
  `refusetime` int(11) DEFAULT '0',
  `realmoney` decimal(10,2) DEFAULT '0.00',
  `charge` decimal(10,2) DEFAULT '0.00',
  `deductionmoney` decimal(10,2) DEFAULT '0.00',
  `beginmoney` decimal(10,2) DEFAULT '0.00',
  `endmoney` decimal(10,2) DEFAULT '0.00',
  `alipay` varchar(50) NOT NULL DEFAULT '',
  `bankname` varchar(50) NOT NULL DEFAULT '',
  `bankcard` varchar(50) NOT NULL DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `repurchase` decimal(10,2) DEFAULT '0.00',
  `alipay1` varchar(50) NOT NULL DEFAULT '',
  `bankname1` varchar(50) NOT NULL DEFAULT '',
  `bankcard1` varchar(50) NOT NULL DEFAULT '',
  `sendmoney` decimal(10,2) DEFAULT '0.00',
  `senddata` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_mid` (`mid`),
  KEY `idx_checktime` (`checktime`),
  KEY `idx_paytime` (`paytime`),
  KEY `idx_applytime` (`applytime`),
  KEY `idx_status` (`status`),
  KEY `idx_invalidtime` (`invalidtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_commission_bank`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_commission_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `bankname` varchar(255) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_commission_clickcount`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_commission_clickcount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `from_openid` varchar(255) DEFAULT '',
  `clicktime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_from_openid` (`from_openid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=301 ;

DROP TABLE IF EXISTS `ims_ewei_shop_commission_level`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_commission_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `levelname` varchar(50) DEFAULT '',
  `commission1` decimal(10,2) DEFAULT '0.00',
  `commission2` decimal(10,2) DEFAULT '0.00',
  `commission3` decimal(10,2) DEFAULT '0.00',
  `commissionmoney` decimal(10,2) DEFAULT '0.00',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  `downcount` varchar(255) DEFAULT '',
  `ordercount` int(11) DEFAULT '0',
  `withdraw` decimal(10,2) DEFAULT '0.00',
  `repurchase` decimal(10,2) DEFAULT '0.00',
  `goodsids` varchar(1000) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

DROP TABLE IF EXISTS `ims_ewei_shop_commission_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_commission_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `applyid` int(11) DEFAULT '0',
  `mid` int(11) DEFAULT '0',
  `commission` decimal(10,2) DEFAULT '0.00',
  `createtime` int(11) DEFAULT '0',
  `commission_pay` decimal(10,2) DEFAULT '0.00',
  `realmoney` decimal(10,2) DEFAULT '0.00',
  `charge` decimal(10,2) DEFAULT '0.00',
  `deductionmoney` decimal(10,2) DEFAULT '0.00',
  `type` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_applyid` (`applyid`),
  KEY `idx_mid` (`mid`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_commission_rank`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_commission_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `num` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_commission_relation`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_commission_relation` (
  `id` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  UNIQUE KEY `id_pid` (`id`,`pid`),
  KEY `id` (`id`),
  KEY `pid` (`pid`),
  KEY `level` (`level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_ewei_shop_commission_repurchase`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_commission_repurchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `year` int(4) DEFAULT '0',
  `month` tinyint(2) DEFAULT '0',
  `repurchase` decimal(10,2) DEFAULT '0.00',
  `applyid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `applyid` (`applyid`),
  KEY `openid` (`openid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_commission_shop`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_commission_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `mid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  `logo` varchar(255) DEFAULT '',
  `img` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT '',
  `selectgoods` tinyint(3) DEFAULT '0',
  `selectcategory` tinyint(3) DEFAULT '0',
  `goodsids` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_mid` (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

DROP TABLE IF EXISTS `ims_ewei_shop_coupon`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `catid` int(11) DEFAULT '0',
  `couponname` varchar(255) DEFAULT '',
  `gettype` tinyint(3) DEFAULT '0',
  `getmax` int(11) DEFAULT '0',
  `usetype` tinyint(3) DEFAULT '0',
  `returntype` tinyint(3) DEFAULT '0',
  `bgcolor` varchar(255) DEFAULT '',
  `enough` decimal(10,2) DEFAULT '0.00',
  `timelimit` tinyint(3) DEFAULT '0',
  `coupontype` tinyint(3) DEFAULT '0',
  `timedays` int(11) DEFAULT '0',
  `timestart` int(11) DEFAULT '0',
  `timeend` int(11) DEFAULT '0',
  `discount` decimal(10,2) DEFAULT '0.00',
  `deduct` decimal(10,2) DEFAULT '0.00',
  `backtype` tinyint(3) DEFAULT '0',
  `backmoney` varchar(50) DEFAULT '',
  `backcredit` varchar(50) DEFAULT '',
  `backredpack` varchar(50) DEFAULT '',
  `backwhen` tinyint(3) DEFAULT '0',
  `thumb` varchar(255) DEFAULT '',
  `desc` text,
  `createtime` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `money` decimal(10,2) DEFAULT '0.00',
  `respdesc` text,
  `respthumb` varchar(255) DEFAULT '',
  `resptitle` varchar(255) DEFAULT '',
  `respurl` varchar(255) DEFAULT '',
  `credit` int(11) DEFAULT '0',
  `usecredit2` tinyint(3) DEFAULT '0',
  `remark` varchar(1000) DEFAULT '',
  `descnoset` tinyint(3) DEFAULT '0',
  `pwdkey` varchar(255) DEFAULT '',
  `pwdsuc` text,
  `pwdfail` text,
  `pwdurl` varchar(255) DEFAULT '',
  `pwdask` text,
  `pwdstatus` tinyint(3) DEFAULT '0',
  `pwdtimes` int(11) DEFAULT '0',
  `pwdfull` text,
  `pwdwords` text,
  `pwdopen` tinyint(3) DEFAULT '0',
  `pwdown` text,
  `pwdexit` varchar(255) DEFAULT '',
  `pwdexitstr` text,
  `displayorder` int(11) DEFAULT '0',
  `pwdkey2` varchar(255) DEFAULT '',
  `merchid` int(11) DEFAULT '0',
  `limitgoodtype` tinyint(1) DEFAULT '0',
  `limitgoodcatetype` tinyint(1) DEFAULT '0',
  `limitgoodcateids` varchar(500) DEFAULT '',
  `limitgoodids` varchar(500) DEFAULT '',
  `islimitlevel` tinyint(1) DEFAULT '0',
  `limitmemberlevels` varchar(500) DEFAULT '',
  `limitagentlevels` varchar(500) DEFAULT '',
  `limitpartnerlevels` varchar(500) DEFAULT '',
  `limitaagentlevels` varchar(500) DEFAULT '',
  `tagtitle` varchar(20) DEFAULT '',
  `settitlecolor` tinyint(1) DEFAULT '0',
  `titlecolor` varchar(10) DEFAULT '',
  `limitdiscounttype` tinyint(1) DEFAULT '1',
  `quickget` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_coupontype` (`coupontype`),
  KEY `idx_timestart` (`timestart`),
  KEY `idx_timeend` (`timeend`),
  KEY `idx_timelimit` (`timelimit`),
  KEY `idx_status` (`status`),
  KEY `idx_givetype` (`backtype`),
  KEY `idx_catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

DROP TABLE IF EXISTS `ims_ewei_shop_coupon_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

DROP TABLE IF EXISTS `ims_ewei_shop_coupon_data`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `couponid` int(11) DEFAULT '0',
  `gettype` tinyint(3) DEFAULT '0',
  `used` int(11) DEFAULT '0',
  `usetime` int(11) DEFAULT '0',
  `gettime` int(11) DEFAULT '0',
  `senduid` int(11) DEFAULT '0',
  `ordersn` varchar(255) DEFAULT '',
  `back` tinyint(3) DEFAULT '0',
  `backtime` int(11) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `isnew` tinyint(1) DEFAULT '1',
  `nocount` tinyint(1) DEFAULT '1',
  `shareident` varchar(50) DEFAULT NULL,
  `textkey` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_couponid` (`couponid`),
  KEY `idx_gettype` (`gettype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

DROP TABLE IF EXISTS `ims_ewei_shop_coupon_goodsendtask`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_goodsendtask` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `goodsid` int(11) DEFAULT '0',
  `couponid` int(11) DEFAULT '0',
  `starttime` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  `sendnum` int(11) DEFAULT '1',
  `num` int(11) DEFAULT '0',
  `sendpoint` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_coupon_guess`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_guess` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `couponid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `times` int(11) DEFAULT '0',
  `pwdkey` varchar(255) DEFAULT '',
  `ok` tinyint(3) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_couponid` (`couponid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_coupon_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `logno` varchar(255) DEFAULT '',
  `openid` varchar(255) DEFAULT '',
  `couponid` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `paystatus` tinyint(3) DEFAULT '0',
  `creditstatus` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `paytype` tinyint(3) DEFAULT '0',
  `getfrom` tinyint(3) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_couponid` (`couponid`),
  KEY `idx_status` (`status`),
  KEY `idx_paystatus` (`paystatus`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_getfrom` (`getfrom`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

DROP TABLE IF EXISTS `ims_ewei_shop_coupon_sendshow`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_sendshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `showkey` varchar(20) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `openid` varchar(255) NOT NULL,
  `coupondataid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_coupon_sendtasks`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_sendtasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `enough` decimal(10,2) DEFAULT '0.00',
  `couponid` int(11) DEFAULT '0',
  `starttime` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  `sendnum` int(11) DEFAULT '1',
  `num` int(11) DEFAULT '0',
  `sendpoint` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_coupon_taskdata`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_taskdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `openid` varchar(50) DEFAULT NULL,
  `taskid` int(11) DEFAULT '0',
  `couponid` int(11) DEFAULT '0',
  `sendnum` int(11) DEFAULT '0',
  `tasktype` tinyint(1) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `parentorderid` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `sendpoint` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_coupon_usesendtasks`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_coupon_usesendtasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `usecouponid` int(11) DEFAULT '0',
  `couponid` int(11) DEFAULT '0',
  `starttime` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  `sendnum` int(11) DEFAULT '1',
  `num` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_creditshop_adv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_creditshop_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

DROP TABLE IF EXISTS `ims_ewei_shop_creditshop_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_creditshop_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `displayorder` tinyint(3) unsigned DEFAULT '0',
  `enabled` tinyint(1) DEFAULT '1',
  `advimg` varchar(255) DEFAULT '',
  `advurl` varchar(500) DEFAULT '',
  `isrecommand` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_enabled` (`enabled`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

DROP TABLE IF EXISTS `ims_ewei_shop_creditshop_comment`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_creditshop_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `logid` int(11) NOT NULL DEFAULT '0',
  `logno` varchar(50) NOT NULL DEFAULT '',
  `goodsid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(50) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `headimg` varchar(255) DEFAULT NULL,
  `level` tinyint(3) NOT NULL DEFAULT '0',
  `content` varchar(255) DEFAULT NULL,
  `images` text,
  `time` int(11) NOT NULL DEFAULT '0',
  `reply_content` varchar(255) DEFAULT NULL,
  `reply_images` text,
  `reply_time` int(11) NOT NULL DEFAULT '0',
  `append_content` varchar(255) DEFAULT NULL,
  `append_images` text,
  `append_time` int(11) NOT NULL DEFAULT '0',
  `append_reply_content` varchar(255) DEFAULT NULL,
  `append_reply_images` text,
  `append_reply_time` int(11) NOT NULL DEFAULT '0',
  `istop` tinyint(3) NOT NULL DEFAULT '0',
  `checked` tinyint(3) NOT NULL DEFAULT '0',
  `append_checked` tinyint(3) NOT NULL DEFAULT '0',
  `virtual` tinyint(3) NOT NULL DEFAULT '0',
  `deleted` tinyint(3) NOT NULL DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_creditshop_goods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_creditshop_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `cate` int(11) DEFAULT '0',
  `thumb` varchar(255) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  `type` tinyint(3) DEFAULT '0',
  `credit` int(11) DEFAULT '0',
  `money` decimal(10,2) DEFAULT '0.00',
  `total` int(11) DEFAULT '0',
  `totalday` int(11) DEFAULT '0',
  `chance` int(11) DEFAULT '0',
  `chanceday` int(11) DEFAULT '0',
  `detail` text,
  `rate1` int(11) DEFAULT '0',
  `rate2` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  `joins` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `showlevels` text,
  `buylevels` text,
  `showgroups` text,
  `buygroups` text,
  `vip` tinyint(3) DEFAULT '0',
  `istop` tinyint(3) DEFAULT '0',
  `isrecommand` tinyint(3) DEFAULT '0',
  `istime` tinyint(3) DEFAULT '0',
  `timestart` int(11) DEFAULT '0',
  `timeend` int(11) DEFAULT '0',
  `share_title` varchar(255) DEFAULT '',
  `share_icon` varchar(255) DEFAULT '',
  `share_desc` varchar(500) DEFAULT '',
  `followneed` tinyint(3) DEFAULT '0',
  `followtext` varchar(255) DEFAULT '',
  `subtitle` varchar(255) DEFAULT '',
  `subdetail` text,
  `noticedetail` text,
  `usedetail` varchar(255) DEFAULT '',
  `goodsdetail` text,
  `isendtime` tinyint(3) DEFAULT '0',
  `usecredit2` tinyint(3) DEFAULT '0',
  `area` varchar(255) DEFAULT '',
  `dispatch` decimal(10,2) DEFAULT '0.00',
  `storeids` text,
  `noticeopenid` varchar(255) DEFAULT '',
  `noticetype` tinyint(3) DEFAULT '0',
  `isverify` tinyint(3) DEFAULT '0',
  `goodstype` tinyint(3) DEFAULT '0',
  `couponid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  `productprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `mincredit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `minmoney` decimal(10,2) NOT NULL DEFAULT '0.00',
  `maxcredit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `maxmoney` decimal(10,2) NOT NULL DEFAULT '0.00',
  `dispatchtype` tinyint(3) NOT NULL DEFAULT '0',
  `dispatchid` int(11) NOT NULL DEFAULT '0',
  `verifytype` tinyint(3) NOT NULL DEFAULT '0',
  `verifynum` int(11) NOT NULL DEFAULT '0',
  `grant1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `grant2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `goodssn` varchar(255) NOT NULL,
  `productsn` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `showtotal` tinyint(3) NOT NULL,
  `totalcnf` tinyint(3) NOT NULL DEFAULT '0',
  `usetime` int(11) NOT NULL DEFAULT '0',
  `hasoption` tinyint(3) NOT NULL DEFAULT '0',
  `noticedetailshow` tinyint(3) NOT NULL DEFAULT '0',
  `detailshow` tinyint(3) NOT NULL DEFAULT '0',
  `packetmoney` decimal(10,2) NOT NULL DEFAULT '0.00',
  `surplusmoney` decimal(10,2) NOT NULL DEFAULT '0.00',
  `packetlimit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `packettype` tinyint(3) NOT NULL DEFAULT '0',
  `minpacketmoney` decimal(10,2) NOT NULL DEFAULT '0.00',
  `packettotal` int(11) NOT NULL DEFAULT '0',
  `packetsurplus` int(11) NOT NULL DEFAULT '0',
  `maxpacketmoney` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_type` (`type`),
  KEY `idx_endtime` (`endtime`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_status` (`status`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_istop` (`istop`),
  KEY `idx_isrecommand` (`isrecommand`),
  KEY `idx_istime` (`istime`),
  KEY `idx_timestart` (`timestart`),
  KEY `idx_timeend` (`timeend`),
  KEY `idx_goodstype` (`goodstype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

DROP TABLE IF EXISTS `ims_ewei_shop_creditshop_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_creditshop_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `logno` varchar(255) DEFAULT '',
  `eno` varchar(255) DEFAULT '',
  `openid` varchar(255) DEFAULT '',
  `goodsid` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `paystatus` tinyint(3) DEFAULT '0',
  `paytype` tinyint(3) DEFAULT '-1',
  `dispatchstatus` tinyint(3) DEFAULT '0',
  `creditpay` tinyint(3) DEFAULT '0',
  `addressid` int(11) DEFAULT '0',
  `dispatchno` varchar(255) DEFAULT '',
  `usetime` int(11) DEFAULT '0',
  `express` varchar(255) DEFAULT '',
  `expresssn` varchar(255) DEFAULT '',
  `expresscom` varchar(255) DEFAULT '',
  `verifyopenid` varchar(255) DEFAULT '',
  `storeid` int(11) DEFAULT '0',
  `realname` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `couponid` int(11) DEFAULT '0',
  `dupdate1` tinyint(3) DEFAULT '0',
  `transid` varchar(255) DEFAULT '',
  `dispatchtransid` varchar(255) DEFAULT '',
  `address` text,
  `optionid` int(11) NOT NULL DEFAULT '0',
  `time_send` int(11) NOT NULL DEFAULT '0',
  `time_finish` int(11) NOT NULL DEFAULT '0',
  `iscomment` tinyint(3) NOT NULL DEFAULT '0',
  `dispatchtime` int(11) NOT NULL DEFAULT '0',
  `verifynum` int(11) NOT NULL DEFAULT '1',
  `verifytime` int(11) NOT NULL DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  `remarksaler` text,
  `dispatch` decimal(10,2) DEFAULT '0.00',
  `money` decimal(10,2) DEFAULT '0.00',
  `credit` int(11) DEFAULT '0',
  `goods_num` int(11) DEFAULT '0',
  `merchapply` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

DROP TABLE IF EXISTS `ims_ewei_shop_creditshop_option`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_creditshop_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `thumb` varchar(60) DEFAULT '',
  `credit` int(10) NOT NULL DEFAULT '0',
  `money` decimal(10,2) DEFAULT '0.00',
  `total` int(11) DEFAULT '0',
  `weight` decimal(10,2) DEFAULT '0.00',
  `displayorder` int(11) DEFAULT '0',
  `specs` text,
  `skuId` varchar(255) DEFAULT '',
  `goodssn` varchar(255) DEFAULT '',
  `productsn` varchar(255) DEFAULT '',
  `virtual` int(11) DEFAULT '0',
  `exchange_stock` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_creditshop_spec`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_creditshop_spec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  `displaytype` tinyint(3) DEFAULT '0',
  `content` text,
  `displayorder` int(11) DEFAULT '0',
  `propId` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_creditshop_spec_item`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_creditshop_spec_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `specid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `show` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `valueId` varchar(255) DEFAULT '',
  `virtual` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_creditshop_verify`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_creditshop_verify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(45) DEFAULT '0',
  `logid` int(11) DEFAULT '0',
  `verifycode` varchar(45) DEFAULT NULL,
  `storeid` int(11) DEFAULT '0',
  `verifier` varchar(45) DEFAULT '0',
  `isverify` tinyint(3) DEFAULT '0',
  `verifytime` int(11) DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_customer`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `kf_id` varchar(255) DEFAULT NULL,
  `kf_account` varchar(255) DEFAULT '',
  `kf_nick` varchar(255) DEFAULT '',
  `kf_pwd` varchar(255) DEFAULT '',
  `kf_headimgurl` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_customer_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_customer_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_customer_guestbook`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_customer_guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `realname` varchar(11) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `weixin` varchar(255) DEFAULT '',
  `images` text,
  `content` text,
  `remark` text,
  `status` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_customer_robot`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_customer_robot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `cate` int(11) DEFAULT '0',
  `keywords` varchar(500) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `content` longtext,
  `url` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_cate` (`cate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_cycelbuy_periods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_cycelbuy_periods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `cycelsn` varchar(255) NOT NULL,
  `sendtime` int(11) DEFAULT NULL,
  `receipttime` int(11) DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `addressid` int(11) DEFAULT NULL,
  `dispatchprice` decimal(10,2) DEFAULT NULL,
  `dispatchid` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `dispatchtype` tinyint(3) DEFAULT NULL,
  `finishtime` int(11) DEFAULT NULL,
  `expresscom` varchar(255) DEFAULT NULL,
  `expresssn` varchar(255) DEFAULT NULL,
  `express` varchar(255) DEFAULT NULL,
  `address` text,
  `updatelog` text,
  `ispostpone` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_datatransfer`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_datatransfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fromuniacid` int(11) DEFAULT NULL,
  `touniacid` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_designer`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_designer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `pagename` varchar(255) NOT NULL DEFAULT '',
  `pagetype` tinyint(3) NOT NULL DEFAULT '0',
  `pageinfo` text NOT NULL,
  `createtime` varchar(255) NOT NULL DEFAULT '',
  `keyword` varchar(255) DEFAULT '',
  `savetime` varchar(255) NOT NULL DEFAULT '',
  `setdefault` tinyint(3) NOT NULL DEFAULT '0',
  `datas` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_pagetype` (`pagetype`),
  KEY `idx_keyword` (`keyword`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

DROP TABLE IF EXISTS `ims_ewei_shop_designer_menu`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_designer_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `menuname` varchar(255) DEFAULT '',
  `isdefault` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `menus` text,
  `params` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_isdefault` (`isdefault`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_dispatch`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_dispatch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `dispatchname` varchar(50) DEFAULT '',
  `dispatchtype` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `firstprice` decimal(10,2) DEFAULT '0.00',
  `secondprice` decimal(10,2) DEFAULT '0.00',
  `firstweight` int(11) DEFAULT '0',
  `secondweight` int(11) DEFAULT '0',
  `express` varchar(250) DEFAULT '',
  `areas` longtext,
  `carriers` text,
  `enabled` int(11) DEFAULT '0',
  `calculatetype` tinyint(1) DEFAULT '0',
  `firstnum` int(11) DEFAULT '0',
  `secondnum` int(11) DEFAULT '0',
  `firstnumprice` decimal(10,2) DEFAULT '0.00',
  `secondnumprice` decimal(10,2) DEFAULT '0.00',
  `isdefault` tinyint(1) DEFAULT '0',
  `shopid` int(11) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `nodispatchareas` text,
  `nodispatchareas_code` longtext,
  `isdispatcharea` tinyint(3) NOT NULL DEFAULT '0',
  `freeprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

DROP TABLE IF EXISTS `ims_ewei_shop_dividend_apply`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_dividend_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `applyno` varchar(255) DEFAULT '',
  `mid` int(11) DEFAULT '0',
  `type` tinyint(3) DEFAULT '0',
  `orderids` longtext,
  `dividend` decimal(10,2) DEFAULT '0.00',
  `dividend_pay` decimal(10,2) DEFAULT '0.00',
  `content` text,
  `status` tinyint(3) DEFAULT '0',
  `applytime` int(11) DEFAULT '0',
  `checktime` int(11) DEFAULT '0',
  `paytime` int(11) DEFAULT '0',
  `invalidtime` int(11) DEFAULT '0',
  `realmoney` decimal(10,2) DEFAULT '0.00',
  `charge` decimal(10,2) DEFAULT '0.00',
  `deductionmoney` decimal(10,2) DEFAULT '0.00',
  `beginmoney` decimal(10,2) DEFAULT '0.00',
  `endmoney` decimal(10,2) DEFAULT '0.00',
  `alipay` varchar(50) NOT NULL DEFAULT '',
  `bankname` varchar(50) NOT NULL DEFAULT '',
  `bankcard` varchar(50) NOT NULL DEFAULT '',
  `alipay1` varchar(50) NOT NULL DEFAULT '',
  `bankname1` varchar(50) NOT NULL DEFAULT '',
  `bankcard1` varchar(50) NOT NULL DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `sendmoney` decimal(10,2) DEFAULT '0.00',
  `senddata` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_mid` (`mid`),
  KEY `idx_checktime` (`checktime`),
  KEY `idx_paytime` (`paytime`),
  KEY `idx_applytime` (`applytime`),
  KEY `idx_status` (`status`),
  KEY `idx_invalidtime` (`invalidtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_dividend_bank`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_dividend_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `bankname` varchar(255) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_dividend_init`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_dividend_init` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `headsid` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_dividend_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_dividend_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `applyid` int(11) DEFAULT '0',
  `mid` int(11) DEFAULT '0',
  `dividend` decimal(10,2) DEFAULT '0.00',
  `createtime` int(11) DEFAULT '0',
  `dividend_pay` decimal(10,2) DEFAULT '0.00',
  `realmoney` decimal(10,2) DEFAULT '0.00',
  `charge` decimal(10,2) DEFAULT '0.00',
  `deductionmoney` decimal(10,2) DEFAULT '0.00',
  `type` tinyint(3) DEFAULT '0',
  `type1` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_applyid` (`applyid`),
  KEY `idx_mid` (`mid`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_diyform_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_diyform_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

DROP TABLE IF EXISTS `ims_ewei_shop_diyform_data`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_diyform_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `typeid` int(11) NOT NULL DEFAULT '0',
  `cid` int(11) DEFAULT '0',
  `diyformfields` text,
  `fields` text NOT NULL,
  `openid` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_typeid` (`typeid`),
  KEY `idx_cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_diyform_temp`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_diyform_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `typeid` int(11) DEFAULT '0',
  `cid` int(11) NOT NULL DEFAULT '0',
  `diyformfields` text,
  `fields` text NOT NULL,
  `openid` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) DEFAULT '0',
  `diyformid` int(11) DEFAULT '0',
  `diyformdata` text,
  `carrier_realname` varchar(255) DEFAULT '',
  `carrier_mobile` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_cid` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

DROP TABLE IF EXISTS `ims_ewei_shop_diyform_type`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_diyform_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `cate` int(11) DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `fields` text NOT NULL,
  `usedata` int(11) NOT NULL DEFAULT '0',
  `alldata` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `savedata` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_cate` (`cate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

DROP TABLE IF EXISTS `ims_ewei_shop_diypage`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_diypage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `data` longtext NOT NULL,
  `createtime` int(11) NOT NULL DEFAULT '0',
  `lastedittime` int(11) NOT NULL DEFAULT '0',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `diymenu` int(11) NOT NULL DEFAULT '0',
  `merch` int(11) NOT NULL DEFAULT '0',
  `diyadv` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_type` (`type`),
  KEY `idx_keyword` (`keyword`),
  KEY `idx_lastedittime` (`lastedittime`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

DROP TABLE IF EXISTS `ims_ewei_shop_diypage_menu`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_diypage_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `data` text NOT NULL,
  `createtime` int(11) NOT NULL DEFAULT '0',
  `lastedittime` int(11) NOT NULL DEFAULT '0',
  `merch` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_lastedittime` (`lastedittime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

DROP TABLE IF EXISTS `ims_ewei_shop_diypage_plu`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_diypage_plu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `data` text NOT NULL,
  `createtime` int(11) NOT NULL DEFAULT '0',
  `lastedittime` int(11) NOT NULL DEFAULT '0',
  `merch` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_createtime` (`createtime`) USING BTREE,
  KEY `idx_lastedittime` (`lastedittime`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_diypage_template`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_diypage_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(3) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `data` longtext NOT NULL,
  `preview` varchar(255) NOT NULL DEFAULT '',
  `tplid` int(11) DEFAULT '0',
  `cate` int(11) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `merch` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_type` (`type`),
  KEY `idx_cate` (`cate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

INSERT INTO `ims_ewei_shop_diypage_template` (`id`, `uniacid`, `type`, `name`, `data`, `preview`, `tplid`, `cate`, `deleted`, `merch`) VALUES
(1, 0, 2, '系统模板01', 'eyJwYWdlIjp7InR5cGUiOiIyIiwidGl0bGUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwMSIsIm5hbWUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwMSIsImRlc2MiOiIiLCJpY29uIjoiIiwia2V5d29yZCI6IiIsImJhY2tncm91bmQiOiIjZmFmYWZhIiwiZGl5bWVudSI6Ii0xIn0sIml0ZW1zIjp7Ik0xNDY1ODAyOTg0ODg1Ijp7InN0eWxlIjp7ImRvdHN0eWxlIjoicm91bmQiLCJkb3RhbGlnbiI6ImNlbnRlciIsImJhY2tncm91bmQiOiIjZmZmZmZmIiwibGVmdHJpZ2h0IjoiNSIsImJvdHRvbSI6IjEwIiwib3BhY2l0eSI6IjAuOCJ9LCJkYXRhIjp7IkMxNDY1ODAyOTg0ODg1Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQxXC9iYW5uZXJfMS5qcGciLCJsaW5rdXJsIjoiIn0sIkMxNDY1ODAyOTg0ODg2Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQxXC9iYW5uZXJfMi5qcGciLCJsaW5rdXJsIjoiIn0sIk0xNDY1ODAzMDE0ODM3Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQxXC9iYW5uZXJfMy5qcGciLCJsaW5rdXJsIjoiIn19LCJpZCI6ImJhbm5lciJ9LCJNMTQ2NTgwMzY5MjkzMiI6eyJzdHlsZSI6eyJoZWlnaHQiOiIxMCIsImJhY2tncm91bmQiOiIjZmZmZmZmIn0sImlkIjoiYmxhbmsifSwiTTE0NjU4MDMzMTk4NTMiOnsic3R5bGUiOnsibmF2c3R5bGUiOiIiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsInJvd251bSI6IjUifSwiZGF0YSI6eyJDMTQ2NTgwMzMxOTg1MyI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0MVwvbWVudV8xLnBuZyIsImxpbmt1cmwiOiIiLCJ0ZXh0IjoiXHU2NWIwXHU1NGMxIiwiY29sb3IiOiIjNjY2NjY2In0sIkMxNDY1ODAzMzE5ODU0Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQxXC9tZW51XzIucG5nIiwibGlua3VybCI6IiIsInRleHQiOiJcdTcwZWRcdTUzNTYiLCJjb2xvciI6IiM2NjY2NjYifSwiQzE0NjU4MDMzMTk4NTUiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDFcL21lbnVfMy5wbmciLCJsaW5rdXJsIjoiIiwidGV4dCI6Ilx1NGZjM1x1OTUwMCIsImNvbG9yIjoiIzY2NjY2NiJ9LCJDMTQ2NTgwMzMxOTg1NiI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0MVwvbWVudV80LnBuZyIsImxpbmt1cmwiOiIiLCJ0ZXh0IjoiXHU4YmEyXHU1MzU1IiwiY29sb3IiOiIjNjY2NjY2In0sIk0xNDY1ODAzMzQ3MDQ1Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQxXC9tZW51XzUucG5nIiwibGlua3VybCI6IiIsInRleHQiOiJcdTdiN2VcdTUyMzAiLCJjb2xvciI6IiM2NjY2NjYifX0sImlkIjoibWVudSJ9LCJNMTQ2NTgwMzM1OTEwMCI6eyJzdHlsZSI6eyJuYXZzdHlsZSI6IiIsImJhY2tncm91bmQiOiIjZmZmZmZmIiwicm93bnVtIjoiNSJ9LCJkYXRhIjp7IkMxNDY1ODAzMzU5MTAwIjp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQxXC9tZW51XzYucG5nIiwibGlua3VybCI6IiIsInRleHQiOiJcdTRlMGFcdTg4NjMiLCJjb2xvciI6IiM2NjY2NjYifSwiQzE0NjU4MDMzNTkxMDEiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDFcL21lbnVfNy5wbmciLCJsaW5rdXJsIjoiIiwidGV4dCI6Ilx1NGUwYlx1ODg2MyIsImNvbG9yIjoiIzY2NjY2NiJ9LCJDMTQ2NTgwMzM1OTEwMiI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0MVwvbWVudV84LnBuZyIsImxpbmt1cmwiOiIiLCJ0ZXh0IjoiXHU5NzhiXHU1YjUwIiwiY29sb3IiOiIjNjY2NjY2In0sIkMxNDY1ODAzMzU5MTAzIjp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQxXC9tZW51XzkucG5nIiwibGlua3VybCI6IiIsInRleHQiOiJcdTUxODVcdTg4NjMiLCJjb2xvciI6IiM2NjY2NjYifSwiTTE0NjU4MDM0NTA4MjciOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDFcL21lbnVfMTAucG5nIiwibGlua3VybCI6IiIsInRleHQiOiJcdTUxNjhcdTkwZTgiLCJjb2xvciI6IiM2NjY2NjYifX0sImlkIjoibWVudSJ9LCJNMTQ2NTgwMzcwMDEzMiI6eyJzdHlsZSI6eyJoZWlnaHQiOiIxMCIsImJhY2tncm91bmQiOiIjZmZmZmZmIn0sImlkIjoiYmxhbmsifSwiTTE0NjU4MDM2MjE5ODAiOnsicGFyYW1zIjp7Imljb251cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2Mlwvc3RhdGljXC9pbWFnZXNcL2hvdGRvdC5qcGciLCJub3RpY2VkYXRhIjoiMSIsInNwZWVkIjoiNCIsIm5vdGljZW51bSI6IjUifSwic3R5bGUiOnsiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJpY29uY29sb3IiOiIjZmQ1NDU0IiwiY29sb3IiOiIjNjY2NjY2In0sImRhdGEiOnsiQzE0NjU4MDM2MjE5ODAiOnsidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTdiMmNcdTRlMDBcdTY3NjFcdTgxZWFcdTViOWFcdTRlNDlcdTUxNmNcdTU0NGFcdTc2ODRcdTY4MDdcdTk4OTgiLCJsaW5rdXJsIjoiaHR0cDpcL1wvd3d3LmJhaWR1LmNvbSJ9LCJDMTQ2NTgwMzYyMTk4MSI6eyJ0aXRsZSI6Ilx1OGZkOVx1OTFjY1x1NjYyZlx1N2IyY1x1NGU4Y1x1Njc2MVx1ODFlYVx1NWI5YVx1NGU0OVx1NTE2Y1x1NTQ0YVx1NzY4NFx1NjgwN1x1OTg5OCIsImxpbmt1cmwiOiJodHRwOlwvXC93d3cuYmFpZHUuY29tIn19LCJpZCI6Im5vdGljZSJ9LCJNMTQ2NTgwMzkzMjQ2MCI6eyJwYXJhbXMiOnsicm93IjoiMiJ9LCJkYXRhIjp7IkMxNDY1ODAzOTMyNDYwIjp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQxXC9waWN0dXJld18xLmpwZyIsImxpbmt1cmwiOiIifSwiQzE0NjU4MDM5MzI0NjMiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDFcL3BpY3R1cmV3XzIuanBnIiwibGlua3VybCI6IiJ9fSwiaWQiOiJwaWN0dXJldyIsInN0eWxlIjp7InBhZGRpbmd0b3AiOiIxNiIsInBhZGRpbmdsZWZ0IjoiNCJ9fSwiTTE0NjU4MDQwMjU1MDgiOnsicGFyYW1zIjp7InRpdGxlIjoiXHU2NWIwXHU1NGMxXHU0ZTBhXHU1ZTAyIiwiaWNvbiI6Imljb24tbmV3In0sInN0eWxlIjp7ImJhY2tncm91bmQiOiIjZmZmZmZmIiwiY29sb3IiOiIjZjA2MjkyIiwidGV4dGFsaWduIjoiY2VudGVyIiwiZm9udHNpemUiOiIxOCIsInBhZGRpbmd0b3AiOiI1IiwicGFkZGluZ2xlZnQiOiI1In0sImlkIjoidGl0bGUifSwiTTE0NjU4MTMzNjgwODUiOnsicGFyYW1zIjp7InNob3d0aXRsZSI6IjEiLCJzaG93cHJpY2UiOiIxIiwiZ29vZHNkYXRhIjoiMCIsImNhdGVpZCI6IiIsImNhdGVuYW1lIjoiIiwiZ3JvdXBpZCI6IiIsImdyb3VwbmFtZSI6IiIsImdvb2Rzc29ydCI6IjAiLCJnb29kc251bSI6IjYiLCJzaG93aWNvbiI6IjAiLCJpY29ucG9zaXRpb24iOiJsZWZ0IHRvcCJ9LCJzdHlsZSI6eyJsaXN0c3R5bGUiOiJibG9jayIsImJ1eXN0eWxlIjoiYnV5YnRuLTEiLCJnb29kc2ljb24iOiJyZWNvbW1hbmQiLCJwcmljZWNvbG9yIjoiI2VkMjgyMiIsImljb25wYWRkaW5ndG9wIjoiMCIsImljb25wYWRkaW5nbGVmdCI6IjAiLCJidXlidG5jb2xvciI6IiNmZTU0NTUiLCJpY29uem9vbSI6IjEwMCIsInRpdGxlY29sb3IiOiIjMjYyNjI2In0sImRhdGEiOnsiQzE0NjU4MTMzNjgwODUiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtMS5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifSwiQzE0NjU4MTMzNjgwODYiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtMi5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifSwiQzE0NjU4MTMzNjgwODciOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtMy5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifSwiQzE0NjU4MTMzNjgwODgiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtNC5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifX0sImlkIjoiZ29vZHMifSwiTTE0NjU4MDU4MjEwNjciOnsicGFyYW1zIjp7InRpdGxlIjoiXHU3MGVkXHU1MzU2XHU1NTQ2XHU1NGMxIiwiaWNvbiI6Imljb24taG90In0sInN0eWxlIjp7ImJhY2tncm91bmQiOiIjZmZmZmZmIiwiY29sb3IiOiIjZmFjMDQyIiwidGV4dGFsaWduIjoiY2VudGVyIiwiZm9udHNpemUiOiIxOCIsInBhZGRpbmd0b3AiOiI1IiwicGFkZGluZ2xlZnQiOiI1In0sImlkIjoidGl0bGUifSwiTTE0NjU4MTMzNzY4OTIiOnsicGFyYW1zIjp7InNob3d0aXRsZSI6IjEiLCJzaG93cHJpY2UiOiIxIiwiZ29vZHNkYXRhIjoiMCIsImNhdGVpZCI6IiIsImNhdGVuYW1lIjoiIiwiZ3JvdXBpZCI6IiIsImdyb3VwbmFtZSI6IiIsImdvb2Rzc29ydCI6IjAiLCJnb29kc251bSI6IjYiLCJzaG93aWNvbiI6IjEiLCJpY29ucG9zaXRpb24iOiJsZWZ0IHRvcCJ9LCJzdHlsZSI6eyJsaXN0c3R5bGUiOiJibG9jayIsImJ1eXN0eWxlIjoiYnV5YnRuLTEiLCJnb29kc2ljb24iOiJyZWNvbW1hbmQiLCJwcmljZWNvbG9yIjoiI2VkMjgyMiIsImljb25wYWRkaW5ndG9wIjoiMCIsImljb25wYWRkaW5nbGVmdCI6IjAiLCJidXlidG5jb2xvciI6IiNmZTU0NTUiLCJpY29uem9vbSI6IjEwMCIsInRpdGxlY29sb3IiOiIjMjYyNjI2In0sImRhdGEiOnsiQzE0NjU4MTMzNzY4OTIiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtMS5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifSwiQzE0NjU4MTMzNzY4OTMiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtMi5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifSwiQzE0NjU4MTMzNzY4OTQiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtMy5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifSwiQzE0NjU4MTMzNzY4OTUiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtNC5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifX0sImlkIjoiZ29vZHMifX19', '../addons/ewei_shopv2/plugin/diypage/static/template/default1/preview.jpg', 1, 0, 0, 0),
(2, 0, 1, '系统模板02', 'eyJwYWdlIjp7InR5cGUiOiIxIiwidGl0bGUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwMiIsIm5hbWUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwMiIsImRlc2MiOiIiLCJpY29uIjoiIiwia2V5d29yZCI6IiIsImJhY2tncm91bmQiOiIjZmFmYWZhIiwiZGl5bWVudSI6Ii0xIn0sIml0ZW1zIjp7Ik0xNDY1ODA4NTU2MDAxIjp7InN0eWxlIjp7ImRvdHN0eWxlIjoicm91bmQiLCJkb3RhbGlnbiI6InJpZ2h0IiwiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJsZWZ0cmlnaHQiOiIxMCIsImJvdHRvbSI6IjEwIiwib3BhY2l0eSI6IjAuOCJ9LCJkYXRhIjp7IkMxNDY1ODA4NTU2MDAxIjp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQyXC9iYW5uZXJfMS5qcGciLCJsaW5rdXJsIjoiIn0sIkMxNDY1ODA4NTU2MDAyIjp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQyXC9iYW5uZXJfMi5qcGciLCJsaW5rdXJsIjoiIn0sIk0xNDY1ODA4NTc1MTIyIjp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQyXC9iYW5uZXJfMy5qcGciLCJsaW5rdXJsIjoiIn19LCJpZCI6ImJhbm5lciJ9LCJNMTQ2NTgwODcwNTA2NCI6eyJzdHlsZSI6eyJoZWlnaHQiOiIyMCIsImJhY2tncm91bmQiOiIjZmZmZmZmIn0sImlkIjoiYmxhbmsifSwiTTE0NjU4MDg2NzMwNDAiOnsicGFyYW1zIjp7InJvdyI6IjIifSwiZGF0YSI6eyJDMTQ2NTgwODY3MzA0MCI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0MlwvcGljdHVyZXdfMS5qcGciLCJsaW5rdXJsIjoiIn0sIkMxNDY1ODA4NjczMDQxIjp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQyXC9waWN0dXJld18yLmpwZyIsImxpbmt1cmwiOiIifX0sImlkIjoicGljdHVyZXciLCJzdHlsZSI6eyJwYWRkaW5ndG9wIjoiMCIsInBhZGRpbmdsZWZ0IjoiMCJ9fSwiTTE0NjU4MDg3MDkyODAiOnsic3R5bGUiOnsiaGVpZ2h0IjoiMjAiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiJ9LCJpZCI6ImJsYW5rIn0sIk0xNDY1ODA4NzY2NTY3Ijp7InBhcmFtcyI6eyJyb3ciOiIyIn0sImRhdGEiOnsiQzE0NjU4MDg3NjY1NzAiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDJcL3BpY3R1cmV3XzMuanBnIiwibGlua3VybCI6IiJ9LCJDMTQ2NTgwODc2NjU3MSI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0MlwvcGljdHVyZXdfNC5qcGciLCJsaW5rdXJsIjoiIn19LCJpZCI6InBpY3R1cmV3Iiwic3R5bGUiOnsicGFkZGluZ3RvcCI6IjAiLCJwYWRkaW5nbGVmdCI6IjAifX0sIk0xNDY1ODA4NzkxMDcyIjp7InN0eWxlIjp7ImhlaWdodCI6IjIwIiwiYmFja2dyb3VuZCI6IiNmZmZmZmYifSwiaWQiOiJibGFuayJ9LCJNMTQ2NTgwODg3MDY4MCI6eyJkYXRhIjp7IkMxNDY1ODA4ODcwNjgwIjp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQyXC9iYW5uZXJfMy5qcGciLCJsaW5rdXJsIjoiIn19LCJpZCI6InBpY3R1cmUiLCJzdHlsZSI6eyJwYWRkaW5ndG9wIjoiMCIsInBhZGRpbmdsZWZ0IjoiMCJ9fSwiTTE0NjU4MDkwMTA0MTUiOnsic3R5bGUiOnsiaGVpZ2h0IjoiMjAiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiJ9LCJpZCI6ImJsYW5rIn0sIk0xNDY1ODA4OTgxNTk5Ijp7InBhcmFtcyI6eyJyb3ciOiIyIn0sImRhdGEiOnsiQzE0NjU4MDg5ODE1OTkiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDJcL3BpY3R1cmV3XzUuanBnIiwibGlua3VybCI6IiJ9LCJDMTQ2NTgwODk4MTYwMCI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0MlwvcGljdHVyZXdfNi5qcGciLCJsaW5rdXJsIjoiIn19LCJpZCI6InBpY3R1cmV3Iiwic3R5bGUiOnsicGFkZGluZ3RvcCI6IjAiLCJwYWRkaW5nbGVmdCI6IjAifX0sIk0xNDY1ODg5MzczNTY3Ijp7InBhcmFtcyI6eyJzaG93dGl0bGUiOiIxIiwic2hvd3ByaWNlIjoiMSIsImdvb2RzZGF0YSI6IjAiLCJjYXRlaWQiOiIiLCJjYXRlbmFtZSI6IiIsImdyb3VwaWQiOiIiLCJncm91cG5hbWUiOiIiLCJnb29kc3NvcnQiOiIwIiwiZ29vZHNudW0iOiI2Iiwic2hvd2ljb24iOiIxIiwiaWNvbnBvc2l0aW9uIjoibGVmdCB0b3AifSwic3R5bGUiOnsibGlzdHN0eWxlIjoiYmxvY2siLCJidXlzdHlsZSI6ImJ1eWJ0bi0xIiwiZ29vZHNpY29uIjoicmVjb21tYW5kIiwicHJpY2Vjb2xvciI6IiNlZDI4MjIiLCJpY29ucGFkZGluZ3RvcCI6IjAiLCJpY29ucGFkZGluZ2xlZnQiOiIwIiwiYnV5YnRuY29sb3IiOiIjZmU1NDU1IiwiaWNvbnpvb20iOiIxMDAiLCJ0aXRsZWNvbG9yIjoiIzI2MjYyNiJ9LCJkYXRhIjp7IkMxNDY1ODg5MzczNTY3Ijp7InRodW1iIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2dvb2RzLTEuanBnIiwicHJpY2UiOiIyMC4wMCIsInRpdGxlIjoiXHU4ZmQ5XHU5MWNjXHU2NjJmXHU1NTQ2XHU1NGMxXHU2ODA3XHU5ODk4IiwiZ2lkIjoiIn0sIkMxNDY1ODg5MzczNTY4Ijp7InRodW1iIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2dvb2RzLTIuanBnIiwicHJpY2UiOiIyMC4wMCIsInRpdGxlIjoiXHU4ZmQ5XHU5MWNjXHU2NjJmXHU1NTQ2XHU1NGMxXHU2ODA3XHU5ODk4IiwiZ2lkIjoiIn0sIkMxNDY1ODg5MzczNTY5Ijp7InRodW1iIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2dvb2RzLTMuanBnIiwicHJpY2UiOiIyMC4wMCIsInRpdGxlIjoiXHU4ZmQ5XHU5MWNjXHU2NjJmXHU1NTQ2XHU1NGMxXHU2ODA3XHU5ODk4IiwiZ2lkIjoiIn0sIkMxNDY1ODg5MzczNTcwIjp7InRodW1iIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2dvb2RzLTQuanBnIiwicHJpY2UiOiIyMC4wMCIsInRpdGxlIjoiXHU4ZmQ5XHU5MWNjXHU2NjJmXHU1NTQ2XHU1NGMxXHU2ODA3XHU5ODk4IiwiZ2lkIjoiIn19LCJpZCI6Imdvb2RzIn0sIk0xNDY1ODg5Mzc3NDIzIjp7InBhcmFtcyI6eyJjb250ZW50IjoiUEhBZ2MzUjViR1U5SW5SbGVIUXRZV3hwWjI0NklHTmxiblJsY2pzaVB1V2J2dWVKaCthZHBlYTZrT1M2anVlOWtlZTduTys4ak9lSmlPYWRnK1c5a3VXT24rUzluT2lBaGVhSmdPYWNpVHd2Y0Q0PSJ9LCJzdHlsZSI6eyJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsInBhZGRpbmciOiIyMCJ9LCJpZCI6InJpY2h0ZXh0In19fQ==', '../addons/ewei_shopv2/plugin/diypage/static/template/default2/preview.jpg', 2, 0, 0, 0),
(3, 0, 2, '系统模板03', 'eyJwYWdlIjp7InR5cGUiOiIyIiwidGl0bGUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwMyIsIm5hbWUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwMyIsImRlc2MiOiIiLCJpY29uIjoiIiwia2V5d29yZCI6IiIsImJhY2tncm91bmQiOiIjZmFmYWZhIiwiZGl5bWVudSI6Ii0xIn0sIml0ZW1zIjp7Ik0xNDY1ODA5MjQyOTc2Ijp7InN0eWxlIjp7ImRvdHN0eWxlIjoicm91bmQiLCJkb3RhbGlnbiI6ImxlZnQiLCJiYWNrZ3JvdW5kIjoiIzM0YmVkYyIsImxlZnRyaWdodCI6IjEwIiwiYm90dG9tIjoiMTAiLCJvcGFjaXR5IjoiMC43In0sImRhdGEiOnsiQzE0NjU4MDkyNDI5NzYiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDNcL2Jhbm5lcl8xLmpwZyIsImxpbmt1cmwiOiIifSwiQzE0NjU4MDkyNDI5NzciOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDNcL2Jhbm5lcl8yLmpwZyIsImxpbmt1cmwiOiIifSwiTTE0NjU4MDkyNjU5OTIiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDNcL2Jhbm5lcl8zLmpwZyIsImxpbmt1cmwiOiIifX0sImlkIjoiYmFubmVyIn0sIk0xNDY1ODA5NTQxNTM1Ijp7InBhcmFtcyI6eyJyb3ciOiIxIn0sImRhdGEiOnsiQzE0NjU4MDk1NDE1MzUiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDNcL3BpY3R1cmV3XzEuanBnIiwibGlua3VybCI6IiJ9LCJDMTQ2NTgwOTU0MTUzNiI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0M1wvcGljdHVyZXdfMi5qcGciLCJsaW5rdXJsIjoiIn0sIkMxNDY1ODA5NTQxNTM3Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQzXC9waWN0dXJld18zLmpwZyIsImxpbmt1cmwiOiIifX0sImlkIjoicGljdHVyZXciLCJzdHlsZSI6eyJwYWRkaW5ndG9wIjoiNSIsInBhZGRpbmdsZWZ0IjoiNSIsImJhY2tncm91bmQiOiIjZmFmYWZhIn19LCJNMTQ2NTgwOTc2MzQxNSI6eyJzdHlsZSI6eyJoZWlnaHQiOiI1IiwiYmFja2dyb3VuZCI6IiNmYWZhZmEifSwiaWQiOiJibGFuayJ9LCJNMTQ2NTgwOTcwOTA0MCI6eyJwYXJhbXMiOnsidGl0bGUiOiJcdTY1YjBcdTU0YzFcdTRlMGFcdTVlMDIiLCJpY29uIjoiaWNvbi1uZXcifSwic3R5bGUiOnsiYmFja2dyb3VuZCI6IiMyOGMxOTIiLCJjb2xvciI6IiNmZmZmZmYiLCJ0ZXh0YWxpZ24iOiJsZWZ0IiwiZm9udHNpemUiOiIxOCIsInBhZGRpbmd0b3AiOiI1IiwicGFkZGluZ2xlZnQiOiI1In0sImlkIjoidGl0bGUifSwiTTE0NjU4MDk3OTEyMzEiOnsicGFyYW1zIjp7InNob3d0aXRsZSI6IjEiLCJzaG93cHJpY2UiOiIxIiwiZ29vZHNkYXRhIjoiMCIsImNhdGVpZCI6IiIsImNhdGVuYW1lIjoiIiwiZ3JvdXBpZCI6IiIsImdyb3VwbmFtZSI6IiIsImdvb2Rzc29ydCI6IjAiLCJnb29kc251bSI6IjYiLCJzaG93aWNvbiI6IjAiLCJpY29ucG9zaXRpb24iOiJsZWZ0IHRvcCJ9LCJzdHlsZSI6eyJsaXN0c3R5bGUiOiJibG9jayIsImJ1eXN0eWxlIjoiYnV5YnRuLTMiLCJnb29kc2ljb24iOiJyZWNvbW1hbmQiLCJwcmljZWNvbG9yIjoiIzI4YzE5MiIsImljb25wYWRkaW5ndG9wIjoiMCIsImljb25wYWRkaW5nbGVmdCI6IjAiLCJidXlidG5jb2xvciI6IiMyOGMxOGYiLCJpY29uem9vbSI6IjEwMCIsInRpdGxlY29sb3IiOiIjMjhjMTkyIn0sImRhdGEiOnsiQzE0NjU4MDk3OTEyMzEiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtMS5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifSwiQzE0NjU4MDk3OTEyMzIiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtMi5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifSwiQzE0NjU4MDk3OTEyMzMiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtMy5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifSwiQzE0NjU4MDk3OTEyMzQiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtNC5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifX0sImlkIjoiZ29vZHMifSwiTTE0NjU4MDk5NTA4NDciOnsicGFyYW1zIjp7InRpdGxlIjoiXHU2MzhjXHU2N2RjXHU2M2E4XHU4MzUwIiwiaWNvbiI6Imljb24tYXBwcmVjaWF0ZSJ9LCJzdHlsZSI6eyJiYWNrZ3JvdW5kIjoiI2ZmYmQzMyIsImNvbG9yIjoiI2ZmZmZmZiIsInRleHRhbGlnbiI6InJpZ2h0IiwiZm9udHNpemUiOiIxOCIsInBhZGRpbmd0b3AiOiI1IiwicGFkZGluZ2xlZnQiOiI1In0sImlkIjoidGl0bGUifSwiTTE0NjU4MDk5NDMyMzEiOnsicGFyYW1zIjp7InNob3d0aXRsZSI6IjEiLCJzaG93cHJpY2UiOiIxIiwiZ29vZHNkYXRhIjoiMCIsImNhdGVpZCI6IiIsImNhdGVuYW1lIjoiIiwiZ3JvdXBpZCI6IiIsImdyb3VwbmFtZSI6IiIsImdvb2Rzc29ydCI6IjAiLCJnb29kc251bSI6IjYiLCJzaG93aWNvbiI6IjEiLCJpY29ucG9zaXRpb24iOiJsZWZ0IHRvcCJ9LCJzdHlsZSI6eyJsaXN0c3R5bGUiOiJibG9jayIsImJ1eXN0eWxlIjoiYnV5YnRuLTEiLCJnb29kc2ljb24iOiJyZWNvbW1hbmQiLCJwcmljZWNvbG9yIjoiI2VkMjgyMiIsImljb25wYWRkaW5ndG9wIjoiMCIsImljb25wYWRkaW5nbGVmdCI6IjAiLCJidXlidG5jb2xvciI6IiNmZTU0NTUiLCJpY29uem9vbSI6IjEwMCIsInRpdGxlY29sb3IiOiIjMjYyNjI2In0sImRhdGEiOnsiQzE0NjU4MDk5NDMyMzEiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtMS5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifSwiQzE0NjU4MDk5NDMyMzIiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtMi5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifSwiQzE0NjU4MDk5NDMyMzMiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtMy5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifSwiQzE0NjU4MDk5NDMyMzQiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtNC5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIifX0sImlkIjoiZ29vZHMifSwiTTE0NjU4MTAwNTk2OTQiOnsicGFyYW1zIjp7ImNvbnRlbnQiOiJQSEFnYzNSNWJHVTlJblJsZUhRdFlXeHBaMjQ2SUdObGJuUmxjanNpUGp4aWNpOCtQQzl3UGp4d0lITjBlV3hsUFNKMFpYaDBMV0ZzYVdkdU9pQmpaVzUwWlhJN0lqN25pWWptbllQbWlZRG1uSWtvWXlsWVdPV1ZodVdmamp3dmNENDhjRDRtYm1KemNEczhZbkl2UGp3dmNEND0ifSwic3R5bGUiOnsiYmFja2dyb3VuZCI6IiNmZmZmZmYifSwiaWQiOiJyaWNodGV4dCJ9fX0=', '../addons/ewei_shopv2/plugin/diypage/static/template/default3/preview.jpg', 3, 0, 0, 0),
(4, 0, 1, '系统模板04', 'eyJwYWdlIjp7InR5cGUiOiIxIiwidGl0bGUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwNCIsIm5hbWUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwNCIsImRlc2MiOiIiLCJpY29uIjoiIiwia2V5d29yZCI6IiIsImJhY2tncm91bmQiOiIjZmFmYWZhIiwiZGl5bWVudSI6Ii0xIn0sIml0ZW1zIjp7Ik0xNDY1ODEwMzUyODk0Ijp7ImRhdGEiOnsiQzE0NjU4MTAzNTI4OTQiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDRcL3BpY3R1cmVfMS5wbmciLCJsaW5rdXJsIjoiIn0sIkMxNDY1ODEwMzUyODk1Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQ0XC9waWN0dXJlXzIucG5nIiwibGlua3VybCI6IiJ9LCJNMTQ2NTgxMDM3MDM5OSI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0NFwvcGljdHVyZV8zLnBuZyIsImxpbmt1cmwiOiIifSwiTTE0NjU4MTAzNzE3MDEiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDRcL3BpY3R1cmVfNC5wbmciLCJsaW5rdXJsIjoiIn0sIk0xNDY1ODEwMzcyNzkxIjp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQ0XC9waWN0dXJlXzUucG5nIiwibGlua3VybCI6IiJ9fSwiaWQiOiJwaWN0dXJlIiwic3R5bGUiOnsicGFkZGluZ3RvcCI6IjAiLCJwYWRkaW5nbGVmdCI6IjAifX0sIk0xNDY1ODg5OTQ0NzY5Ijp7InBhcmFtcyI6eyJjb250ZW50IjoiUEhBZ2MzUjViR1U5SW5SbGVIUXRZV3hwWjI0NklHTmxiblJsY2pzaVB1V2J2dWVKaCthZHBlYTZrT1M2anVlOWtlZTduTys4ak9lSmlPYWRnK1c5a3VXT24rUzluT2lBaGVhSmdPYWNpVHd2Y0Q0PSJ9LCJzdHlsZSI6eyJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsInBhZGRpbmciOiIyMCJ9LCJpZCI6InJpY2h0ZXh0In19fQ==', '../addons/ewei_shopv2/plugin/diypage/static/template/default4/preview.jpg', 4, 0, 0, 0),
(5, 0, 2, '系统模板05', 'eyJwYWdlIjp7InR5cGUiOiIyIiwidGl0bGUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwNSIsIm5hbWUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwNSIsImRlc2MiOiIiLCJpY29uIjoiIiwia2V5d29yZCI6InQ1IiwiYmFja2dyb3VuZCI6IiNmYWZhZmEiLCJkaXltZW51IjoiLTEifSwiaXRlbXMiOnsiTTE0NjU4MTA3NTE4MDciOnsic3R5bGUiOnsiZG90c3R5bGUiOiJyb3VuZCIsImRvdGFsaWduIjoibGVmdCIsImJhY2tncm91bmQiOiIjZmZmZmZmIiwibGVmdHJpZ2h0IjoiMTAiLCJib3R0b20iOiIxMCIsIm9wYWNpdHkiOiIwLjcifSwiZGF0YSI6eyJDMTQ2NTgxMDc1MTgwNyI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0NVwvYmFubmVyXzEuanBnIiwibGlua3VybCI6IiJ9LCJDMTQ2NTgxMDc1MTgwOCI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0NVwvYmFubmVyXzIuanBnIiwibGlua3VybCI6IiJ9LCJNMTQ2NTgxMDc2NjQ4NiI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0NVwvYmFubmVyXzMuanBnIiwibGlua3VybCI6IiJ9fSwiaWQiOiJiYW5uZXIifSwiTTE0NjU4MTA5NzA0OTQiOnsic3R5bGUiOnsibmF2c3R5bGUiOiIiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsInJvd251bSI6IjQifSwiZGF0YSI6eyJDMTQ2NTgxMDk3MDQ5NCI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0NVwvbWVudV8xLnBuZyIsImxpbmt1cmwiOiIiLCJ0ZXh0IjoiSE9NRSIsImNvbG9yIjoiIzY2NjY2NiJ9LCJDMTQ2NTgxMDk3MDQ5NSI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0NVwvbWVudV8yLnBuZyIsImxpbmt1cmwiOiIiLCJ0ZXh0IjoiTkVXIiwiY29sb3IiOiIjNjY2NjY2In0sIkMxNDY1ODEwOTcwNDk2Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQ1XC9tZW51XzMucG5nIiwibGlua3VybCI6IiIsInRleHQiOiJIT1QiLCJjb2xvciI6IiM2NjY2NjYifSwiQzE0NjU4MTA5NzA0OTciOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDVcL21lbnVfNC5wbmciLCJsaW5rdXJsIjoiIiwidGV4dCI6IkxJU1QiLCJjb2xvciI6IiM2NjY2NjYifX0sImlkIjoibWVudSJ9LCJNMTQ2NTgxMTA5OTI0MCI6eyJwYXJhbXMiOnsicm93IjoiMyJ9LCJkYXRhIjp7IkMxNDY1ODExMDk5MjQwIjp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQ1XC9waWN0dXJld18xLmpwZyIsImxpbmt1cmwiOiIifSwiQzE0NjU4MTEwOTkyNDEiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDVcL3BpY3R1cmV3XzQuanBnIiwibGlua3VybCI6IiJ9LCJDMTQ2NTgxMTA5OTI0MyI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0NVwvcGljdHVyZXdfMS5qcGciLCJsaW5rdXJsIjoiIn19LCJpZCI6InBpY3R1cmV3Iiwic3R5bGUiOnsiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJwYWRkaW5ndG9wIjoiNSIsInBhZGRpbmdsZWZ0IjoiNSJ9fSwiTTE0NjU4MTIzOTAxNzQiOnsicGFyYW1zIjp7InJvdyI6IjIifSwiZGF0YSI6eyJDMTQ2NTgxMjM5MDE3NSI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0NVwvcGljdHVyZXdfMy5qcGciLCJsaW5rdXJsIjoiIn0sIkMxNDY1ODEyMzkwMTc2Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQ1XC9waWN0dXJld18zLmpwZyIsImxpbmt1cmwiOiIifX0sImlkIjoicGljdHVyZXciLCJzdHlsZSI6eyJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsInBhZGRpbmd0b3AiOiIwIiwicGFkZGluZ2xlZnQiOiI1In19LCJNMTQ2NTg3MjQ4NTQ4NiI6eyJzdHlsZSI6eyJoZWlnaHQiOiIxMCIsImJhY2tncm91bmQiOiIjZmFmYWZhIn0sImlkIjoiYmxhbmsifSwiTTE0NjU4MTExNzQ5NTgiOnsiZGF0YSI6eyJDMTQ2NTgxMTE3NDk1OSI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0NVwvcGljdHVyZV8xLmpwZyIsImxpbmt1cmwiOiIifX0sImlkIjoicGljdHVyZSIsInN0eWxlIjp7InBhZGRpbmd0b3AiOiIwIiwicGFkZGluZ2xlZnQiOiIwIn19LCJNMTQ2NTgxMjQxMTM4MSI6eyJwYXJhbXMiOnsic2hvd3RpdGxlIjoiMSIsInNob3dwcmljZSI6IjEiLCJnb29kc2RhdGEiOiIwIiwiY2F0ZWlkIjoiIiwiY2F0ZW5hbWUiOiIiLCJncm91cGlkIjoiIiwiZ3JvdXBuYW1lIjoiIiwiZ29vZHNzb3J0IjoiMCIsImdvb2RzbnVtIjoiNiIsInNob3dpY29uIjoiMSIsImljb25wb3NpdGlvbiI6ImxlZnQgdG9wIn0sInN0eWxlIjp7Imxpc3RzdHlsZSI6ImJsb2NrIiwiYnV5c3R5bGUiOiJidXlidG4tMSIsImdvb2RzaWNvbiI6InJlY29tbWFuZCIsInByaWNlY29sb3IiOiIjZWQyODIyIiwiaWNvbnBhZGRpbmd0b3AiOiIwIiwiaWNvbnBhZGRpbmdsZWZ0IjoiMCIsImJ1eWJ0bmNvbG9yIjoiI2ZlNTQ1NSIsImljb256b29tIjoiMTAwIiwidGl0bGVjb2xvciI6IiMyNjI2MjYifSwiZGF0YSI6eyJDMTQ2NTgxMjQxMTM4MSI6eyJ0aHVtYiI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvaW1hZ2VzXC9kZWZhdWx0XC9nb29kcy0xLmpwZyIsInByaWNlIjoiMjAuMDAiLCJ0aXRsZSI6Ilx1OGZkOVx1OTFjY1x1NjYyZlx1NTU0Nlx1NTRjMVx1NjgwN1x1OTg5OCIsImdpZCI6IiJ9LCJDMTQ2NTgxMjQxMTM4MiI6eyJ0aHVtYiI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvaW1hZ2VzXC9kZWZhdWx0XC9nb29kcy0yLmpwZyIsInByaWNlIjoiMjAuMDAiLCJ0aXRsZSI6Ilx1OGZkOVx1OTFjY1x1NjYyZlx1NTU0Nlx1NTRjMVx1NjgwN1x1OTg5OCIsImdpZCI6IiJ9LCJDMTQ2NTgxMjQxMTM4MyI6eyJ0aHVtYiI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvaW1hZ2VzXC9kZWZhdWx0XC9nb29kcy0zLmpwZyIsInByaWNlIjoiMjAuMDAiLCJ0aXRsZSI6Ilx1OGZkOVx1OTFjY1x1NjYyZlx1NTU0Nlx1NTRjMVx1NjgwN1x1OTg5OCIsImdpZCI6IiJ9LCJDMTQ2NTgxMjQxMTM4NCI6eyJ0aHVtYiI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvaW1hZ2VzXC9kZWZhdWx0XC9nb29kcy00LmpwZyIsInByaWNlIjoiMjAuMDAiLCJ0aXRsZSI6Ilx1OGZkOVx1OTFjY1x1NjYyZlx1NTU0Nlx1NTRjMVx1NjgwN1x1OTg5OCIsImdpZCI6IiJ9fSwiaWQiOiJnb29kcyJ9LCJNMTQ2NTgxMjQ2Njg5MyI6eyJwYXJhbXMiOnsiY29udGVudCI6IlBIQWdjM1I1YkdVOUluUmxlSFF0WVd4cFoyNDZJR05sYm5SbGNqc2lQanhpY2k4K1BDOXdQanh3SUhOMGVXeGxQU0owWlhoMExXRnNhV2R1T2lCalpXNTBaWEk3SWo3a3U2WGt1SXJsbTc3bmlZZmxuWWZtbmFYbXVwRGt1bzdudlpIbnU1enZ2SXpuaVlqbW5ZUGx2WkxsanBcL2t2WnpvZ0lYbWlZRG1uSW5qZ0lJOEwzQStQSEErUEdKeUx6NDhMM0ErIn0sInN0eWxlIjp7ImJhY2tncm91bmQiOiIjZmZmZmZmIn0sImlkIjoicmljaHRleHQifX19', '../addons/ewei_shopv2/plugin/diypage/static/template/default5/preview.jpg', 5, 0, 0, 0),
(6, 0, 1, '系统模板06', 'eyJwYWdlIjp7InR5cGUiOiIxIiwidGl0bGUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwNiIsIm5hbWUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwNiIsImRlc2MiOiIiLCJpY29uIjoiIiwia2V5d29yZCI6IiIsImJhY2tncm91bmQiOiIjZmFmYWZhIiwiZGl5bWVudSI6Ii0xIn0sIml0ZW1zIjp7Ik0xNDY1ODEyNjAyOTMzIjp7ImRhdGEiOnsiQzE0NjU4MTI2MDI5MzMiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDZcL3BpY3R1cmVfMS5qcGciLCJsaW5rdXJsIjoiIn0sIkMxNDY1ODEyNjAyOTM0Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQ2XC9waWN0dXJlXzIuanBnIiwibGlua3VybCI6IiJ9LCJNMTQ2NTgxMjYwNDQ5NCI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0NlwvcGljdHVyZV8zLmpwZyIsImxpbmt1cmwiOiIifSwiTTE0NjU4MTI2MDUyNDUiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDZcL3BpY3R1cmVfNC5qcGciLCJsaW5rdXJsIjoiIn0sIk0xNDY1ODEyNjA1OTgwIjp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQ2XC9waWN0dXJlXzUuanBnIiwibGlua3VybCI6IiJ9LCJNMTQ2NTgxMjYwNzA0NSI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0NlwvcGljdHVyZV82LmpwZyIsImxpbmt1cmwiOiIifX0sImlkIjoicGljdHVyZSIsInN0eWxlIjp7InBhZGRpbmd0b3AiOiIwIiwicGFkZGluZ2xlZnQiOiIwIn19LCJNMTQ2NTg5MDE4NDY1MCI6eyJwYXJhbXMiOnsiY29udGVudCI6IlBIQWdjM1I1YkdVOUluUmxlSFF0WVd4cFoyNDZJR05sYm5SbGNqc2lQdVdidnVlSmgrYWRwZWE2a09TNmp1ZTlrZWU3bk8rOGpPZUppT2FkZytXOWt1V09uK1M5bk9pQWhlYUpnT2FjaVR3dmNEND0ifSwic3R5bGUiOnsiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJwYWRkaW5nIjoiMjAifSwiaWQiOiJyaWNodGV4dCJ9fX0=', '../addons/ewei_shopv2/plugin/diypage/static/template/default6/preview.jpg', 6, 0, 0, 0),
(7, 0, 2, '系统模板07', 'eyJwYWdlIjp7InR5cGUiOiIyIiwidGl0bGUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwNyIsIm5hbWUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwNyIsImRlc2MiOiIiLCJpY29uIjoiIiwia2V5d29yZCI6IiIsImJhY2tncm91bmQiOiIjZmFmYWZhIiwiZGl5bWVudSI6Ii0xIn0sIml0ZW1zIjp7Ik0xNDY1ODEyNjkxMzg5Ijp7ImRhdGEiOnsiQzE0NjU4MTI2OTEzODkiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDdcL3BpY3R1cmVfMS5qcGciLCJsaW5rdXJsIjoiIn19LCJpZCI6InBpY3R1cmUiLCJzdHlsZSI6eyJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsInBhZGRpbmd0b3AiOiIwIiwicGFkZGluZ2xlZnQiOiIwIn19LCJNMTQ2NTgxMjcyODgyMSI6eyJwYXJhbXMiOnsicGxhY2Vob2xkZXIiOiJcdThiZjdcdThmOTNcdTUxNjVcdTUxNzNcdTk1MmVcdTViNTdcdThmZGJcdTg4NGNcdTY0MWNcdTdkMjIifSwic3R5bGUiOnsiaW5wdXRiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImJhY2tncm91bmQiOiIjZjFmMWYyIiwiaWNvbmNvbG9yIjoiI2I0YjRiNCIsImNvbG9yIjoiIzk5OTk5OSIsInBhZGRpbmd0b3AiOiIxMCIsInBhZGRpbmdsZWZ0IjoiMTAiLCJ0ZXh0YWxpZ24iOiJsZWZ0Iiwic2VhcmNoc3R5bGUiOiIifSwiaWQiOiJzZWFyY2gifSwiTTE0NjU4MTI3MzkxOTciOnsicGFyYW1zIjp7InJvdyI6IjMifSwiZGF0YSI6eyJDMTQ2NTgxMjczOTE5NyI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0N1wvcGljdHVyZXdfMS5qcGciLCJsaW5rdXJsIjoiIn0sIkMxNDY1ODEyNzM5MTk4Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQ3XC9waWN0dXJld18yLmpwZyIsImxpbmt1cmwiOiIifSwiQzE0NjU4MTI3MzkxOTkiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDdcL3BpY3R1cmV3XzMuanBnIiwibGlua3VybCI6IiJ9fSwiaWQiOiJwaWN0dXJldyIsInN0eWxlIjp7ImJhY2tncm91bmQiOiIjZmZmZmZmIiwicGFkZGluZ3RvcCI6IjAiLCJwYWRkaW5nbGVmdCI6IjUifX0sIk0xNDY1ODEyNzg0NTY1Ijp7ImRhdGEiOnsiQzE0NjU4MTI3ODQ1NjUiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDdcL3BpY3R1cmVfMy5qcGciLCJsaW5rdXJsIjoiIn0sIk0xNDY1ODEyODE5OTQ4Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQ3XC9waWN0dXJlXzIuanBnIiwibGlua3VybCI6IiJ9fSwiaWQiOiJwaWN0dXJlIiwic3R5bGUiOnsiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJwYWRkaW5ndG9wIjoiNCIsInBhZGRpbmdsZWZ0IjoiMCJ9fSwiTTE0NjU4MTI4NzU5ODgiOnsicGFyYW1zIjp7InJvdyI6IjIifSwiZGF0YSI6eyJDMTQ2NTgxMjg3NTk4OCI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0N1wvcGljdHVyZXdfNC5qcGciLCJsaW5rdXJsIjoiIn0sIkMxNDY1ODEyODc1OTg5Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQ3XC9waWN0dXJld181LmpwZyIsImxpbmt1cmwiOiIifSwiQzE0NjU4MTI4NzU5OTAiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDdcL3BpY3R1cmV3XzYuanBnIiwibGlua3VybCI6IiJ9LCJDMTQ2NTgxMjg3NTk5MSI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0N1wvcGljdHVyZXdfNy5qcGciLCJsaW5rdXJsIjoiIn19LCJpZCI6InBpY3R1cmV3Iiwic3R5bGUiOnsiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJwYWRkaW5ndG9wIjoiMCIsInBhZGRpbmdsZWZ0IjoiMCJ9fSwiTTE0NjU4NzI4OTQxMjAiOnsic3R5bGUiOnsiaGVpZ2h0IjoiMTAiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiJ9LCJpZCI6ImJsYW5rIn0sIk0xNDY1ODcyODMyODk1Ijp7InBhcmFtcyI6eyJ0aXRsZSI6Ilx1NzBlZFx1OTUwMFx1NTU0Nlx1NTRjMSIsImljb24iOiIifSwic3R5bGUiOnsiYmFja2dyb3VuZCI6IiNmMjMyNGMiLCJjb2xvciI6IiNmZmZmZmYiLCJ0ZXh0YWxpZ24iOiJjZW50ZXIiLCJmb250c2l6ZSI6IjE4IiwicGFkZGluZ3RvcCI6IjUiLCJwYWRkaW5nbGVmdCI6IjUifSwiaWQiOiJ0aXRsZSJ9LCJNMTQ2NTgxMjkwNDA1MyI6eyJwYXJhbXMiOnsic2hvd3RpdGxlIjoiMSIsInNob3dwcmljZSI6IjEiLCJnb29kc2RhdGEiOiIwIiwiY2F0ZWlkIjoiIiwiY2F0ZW5hbWUiOiIiLCJncm91cGlkIjoiIiwiZ3JvdXBuYW1lIjoiIiwiZ29vZHNzb3J0IjoiMCIsImdvb2RzbnVtIjoiNiIsInNob3dpY29uIjoiMSIsImljb25wb3NpdGlvbiI6ImxlZnQgdG9wIn0sInN0eWxlIjp7Imxpc3RzdHlsZSI6ImJsb2NrIiwiYnV5c3R5bGUiOiJidXlidG4tMSIsImdvb2RzaWNvbiI6InJlY29tbWFuZCIsInByaWNlY29sb3IiOiIjZWQyODIyIiwiaWNvbnBhZGRpbmd0b3AiOiIwIiwiaWNvbnBhZGRpbmdsZWZ0IjoiMCIsImJ1eWJ0bmNvbG9yIjoiI2ZlNTQ1NSIsImljb256b29tIjoiMTAwIiwidGl0bGVjb2xvciI6IiMyNjI2MjYifSwiZGF0YSI6eyJDMTQ2NTgxMjkwNDA1MyI6eyJ0aHVtYiI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvaW1hZ2VzXC9kZWZhdWx0XC9nb29kcy0xLmpwZyIsInByaWNlIjoiMjAuMDAiLCJ0aXRsZSI6Ilx1OGZkOVx1OTFjY1x1NjYyZlx1NTU0Nlx1NTRjMVx1NjgwN1x1OTg5OCIsImdpZCI6IiJ9LCJDMTQ2NTgxMjkwNDA1NCI6eyJ0aHVtYiI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvaW1hZ2VzXC9kZWZhdWx0XC9nb29kcy0yLmpwZyIsInByaWNlIjoiMjAuMDAiLCJ0aXRsZSI6Ilx1OGZkOVx1OTFjY1x1NjYyZlx1NTU0Nlx1NTRjMVx1NjgwN1x1OTg5OCIsImdpZCI6IiJ9LCJDMTQ2NTgxMjkwNDA1NSI6eyJ0aHVtYiI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvaW1hZ2VzXC9kZWZhdWx0XC9nb29kcy0zLmpwZyIsInByaWNlIjoiMjAuMDAiLCJ0aXRsZSI6Ilx1OGZkOVx1OTFjY1x1NjYyZlx1NTU0Nlx1NTRjMVx1NjgwN1x1OTg5OCIsImdpZCI6IiJ9LCJDMTQ2NTgxMjkwNDA1NiI6eyJ0aHVtYiI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvaW1hZ2VzXC9kZWZhdWx0XC9nb29kcy00LmpwZyIsInByaWNlIjoiMjAuMDAiLCJ0aXRsZSI6Ilx1OGZkOVx1OTFjY1x1NjYyZlx1NTU0Nlx1NTRjMVx1NjgwN1x1OTg5OCIsImdpZCI6IiJ9fSwiaWQiOiJnb29kcyJ9LCJNMTQ2NTg4ODU1MjYwNiI6eyJwYXJhbXMiOnsiY29udGVudCI6IlBIQWdjM1I1YkdVOUluUmxlSFF0WVd4cFoyNDZJR05sYm5SbGNqc2lQdVdidnVlSmgrYWRwZWE2a09TNmp1ZTlrZWU3bk8rOGpPZUppT2FkZytXOWt1V09uK1M5bk9pQWhlYUpnT2FjaVR3dmNEND0ifSwic3R5bGUiOnsiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJwYWRkaW5nIjoiMjAifSwiaWQiOiJyaWNodGV4dCJ9fX0=', '../addons/ewei_shopv2/plugin/diypage/static/template/default7/preview.jpg', 7, 0, 0, 0),
(8, 0, 2, '系统模板08', 'eyJwYWdlIjp7InR5cGUiOiIyIiwidGl0bGUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwOCIsIm5hbWUiOiJcdTMwMTBcdTZhMjFcdTY3N2ZcdTMwMTFcdTdjZmJcdTdlZGZcdTZhMjFcdTY3N2YwOCIsImRlc2MiOiIiLCJpY29uIjoiIiwia2V5d29yZCI6IiIsImJhY2tncm91bmQiOiIjZmFmYWZhIiwiZGl5bWVudSI6Ii0xIn0sIml0ZW1zIjp7Ik0xNDY1ODEyOTk3MDQ1Ijp7ImRhdGEiOnsiQzE0NjU4MTI5OTcwNDUiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDhcL3BpY3R1cmVfMS5qcGciLCJsaW5rdXJsIjoiIn19LCJpZCI6InBpY3R1cmUiLCJzdHlsZSI6eyJwYWRkaW5ndG9wIjoiMCIsInBhZGRpbmdsZWZ0IjoiMCJ9fSwiTTE0NjU4MTMwMTc1NDkiOnsicGFyYW1zIjp7InJvdyI6IjMifSwiZGF0YSI6eyJDMTQ2NTgxMzAxNzU1MCI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0OFwvcGljdHVyZXdfMS5qcGciLCJsaW5rdXJsIjoiIn0sIkMxNDY1ODEzMDE3NTUxIjp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQ4XC9waWN0dXJld18yLmpwZyIsImxpbmt1cmwiOiIifSwiQzE0NjU4MTMwMTc1NTIiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDhcL3BpY3R1cmV3XzMuanBnIiwibGlua3VybCI6IiJ9fSwiaWQiOiJwaWN0dXJldyIsInN0eWxlIjp7ImJhY2tncm91bmQiOiIjZmZmZmZmIiwicGFkZGluZ3RvcCI6IjAiLCJwYWRkaW5nbGVmdCI6IjAifX0sIk0xNDY1ODEzMDQyODc2Ijp7ImRhdGEiOnsiQzE0NjU4MTMwNDI4NzYiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDhcL3BpY3R1cmVfMi5qcGciLCJsaW5rdXJsIjoiIn0sIkMxNDY1ODEzMDQyODc3Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQ4XC9waWN0dXJlXzMuanBnIiwibGlua3VybCI6IiJ9fSwiaWQiOiJwaWN0dXJlIiwic3R5bGUiOnsicGFkZGluZ3RvcCI6IjAiLCJwYWRkaW5nbGVmdCI6IjAifX0sIk0xNDY1ODEzMDg4ODA0Ijp7InBhcmFtcyI6eyJyb3ciOiI0In0sImRhdGEiOnsiQzE0NjU4MTMwODg4MDQiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDhcL3BpY3R1cmV3XzQuanBnIiwibGlua3VybCI6IiJ9LCJDMTQ2NTgxMzA4ODgwNSI6eyJpbWd1cmwiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL3RlbXBsYXRlXC9kZWZhdWx0OFwvcGljdHVyZXdfNS5qcGciLCJsaW5rdXJsIjoiIn0sIkMxNDY1ODEzMDg4ODA2Ijp7ImltZ3VybCI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvdGVtcGxhdGVcL2RlZmF1bHQ4XC9waWN0dXJld182LmpwZyIsImxpbmt1cmwiOiIifSwiQzE0NjU4MTMwODg4MDciOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC90ZW1wbGF0ZVwvZGVmYXVsdDhcL3BpY3R1cmV3XzcuanBnIiwibGlua3VybCI6IiJ9fSwiaWQiOiJwaWN0dXJldyIsInN0eWxlIjp7ImJhY2tncm91bmQiOiIjZmZmZmZmIiwicGFkZGluZ3RvcCI6IjAiLCJwYWRkaW5nbGVmdCI6IjAifX0sIk0xNDY1ODEzMTMxMzgwIjp7InBhcmFtcyI6eyJzaG93dGl0bGUiOiIxIiwic2hvd3ByaWNlIjoiMSIsImdvb2RzZGF0YSI6IjAiLCJjYXRlaWQiOiIiLCJjYXRlbmFtZSI6IiIsImdyb3VwaWQiOiIiLCJncm91cG5hbWUiOiIiLCJnb29kc3NvcnQiOiIwIiwiZ29vZHNudW0iOiI2Iiwic2hvd2ljb24iOiIxIiwiaWNvbnBvc2l0aW9uIjoibGVmdCB0b3AifSwic3R5bGUiOnsibGlzdHN0eWxlIjoiYmxvY2siLCJidXlzdHlsZSI6ImJ1eWJ0bi0xIiwiZ29vZHNpY29uIjoicmVjb21tYW5kIiwicHJpY2Vjb2xvciI6IiNlZDI4MjIiLCJpY29ucGFkZGluZ3RvcCI6IjAiLCJpY29ucGFkZGluZ2xlZnQiOiIwIiwiYnV5YnRuY29sb3IiOiIjZmU1NDU1IiwiaWNvbnpvb20iOiIxMDAiLCJ0aXRsZWNvbG9yIjoiIzI2MjYyNiJ9LCJkYXRhIjp7IkMxNDY1ODEzMTMxMzgwIjp7InRodW1iIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2dvb2RzLTEuanBnIiwicHJpY2UiOiIyMC4wMCIsInRpdGxlIjoiXHU4ZmQ5XHU5MWNjXHU2NjJmXHU1NTQ2XHU1NGMxXHU2ODA3XHU5ODk4IiwiZ2lkIjoiIn0sIkMxNDY1ODEzMTMxMzgxIjp7InRodW1iIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2dvb2RzLTIuanBnIiwicHJpY2UiOiIyMC4wMCIsInRpdGxlIjoiXHU4ZmQ5XHU5MWNjXHU2NjJmXHU1NTQ2XHU1NGMxXHU2ODA3XHU5ODk4IiwiZ2lkIjoiIn0sIkMxNDY1ODEzMTMxMzgyIjp7InRodW1iIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2dvb2RzLTMuanBnIiwicHJpY2UiOiIyMC4wMCIsInRpdGxlIjoiXHU4ZmQ5XHU5MWNjXHU2NjJmXHU1NTQ2XHU1NGMxXHU2ODA3XHU5ODk4IiwiZ2lkIjoiIn0sIkMxNDY1ODEzMTMxMzgzIjp7InRodW1iIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2dvb2RzLTQuanBnIiwicHJpY2UiOiIyMC4wMCIsInRpdGxlIjoiXHU4ZmQ5XHU5MWNjXHU2NjJmXHU1NTQ2XHU1NGMxXHU2ODA3XHU5ODk4IiwiZ2lkIjoiIn19LCJpZCI6Imdvb2RzIn0sIk0xNDY1ODg4ODMxMjc4Ijp7InBhcmFtcyI6eyJjb250ZW50IjoiUEhBZ2MzUjViR1U5SW5SbGVIUXRZV3hwWjI0NklHTmxiblJsY2pzaVB1V2J2dWVKaCthZHBlYTZrT1M2anVlOWtlZTduTys4ak9lSmlPYWRnK1c5a3VXT24rUzluT2lBaGVhSmdPYWNpVHd2Y0Q0PSJ9LCJzdHlsZSI6eyJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsInBhZGRpbmciOiIyMCJ9LCJpZCI6InJpY2h0ZXh0In19fQ==', '../addons/ewei_shopv2/plugin/diypage/static/template/default8/preview.jpg', 8, 0, 0, 0),
(9, 0, 3, '会员中心01', 'eyJwYWdlIjp7InR5cGUiOiIzIiwidGl0bGUiOiJcdTRmMWFcdTU0NThcdTRlMmRcdTVmYzMiLCJuYW1lIjoiXHU0ZjFhXHU1NDU4XHU0ZTJkXHU1ZmMzIiwiZGVzYyI6IiIsImljb24iOiIiLCJrZXl3b3JkIjoiIiwiYmFja2dyb3VuZCI6IiNmYWZhZmEiLCJkaXltZW51IjoiMCIsImZvbGxvd2JhciI6IjAiLCJ2aXNpdCI6IjAiLCJ2aXNpdGxldmVsIjp7Im1lbWJlciI6IiIsImNvbW1pc3Npb24iOiIifSwibm92aXNpdCI6eyJ0aXRsZSI6IiIsImxpbmsiOiIifX0sIml0ZW1zIjp7Ik0xNDc0NTI2MTM0ODE0Ijp7InBhcmFtcyI6eyJzdHlsZSI6ImRlZmF1bHQxIiwibGV2ZWxsaW5rIjoiIiwic2V0aWNvbiI6Imljb24tc2V0dGluZ3MiLCJzZXRsaW5rIjoiIiwibGVmdG5hdiI6Ilx1NTE0NVx1NTAzYyIsImxlZnRuYXZsaW5rIjoiIiwicmlnaHRuYXYiOiJcdTUxNTFcdTYzNjIiLCJyaWdodG5hdmxpbmsiOiIifSwic3R5bGUiOnsiYmFja2dyb3VuZCI6IiNmZTU0NTUiLCJ0ZXh0Y29sb3IiOiIjZmZmZmZmIiwidGV4dGxpZ2h0IjoiI2ZlZjMxZiIsImhlYWRzdHlsZSI6IiJ9LCJpbmZvIjp7ImF2YXRhciI6IiIsIm5pY2tuYW1lIjoiIiwibGV2ZWxuYW1lIjoiIiwidGV4dG1vbmV5IjoiIiwidGV4dGNyZWRpdCI6IiIsIm1vbmV5IjoiIiwiY3JlZGl0IjoiIn0sImlkIjoibWVtYmVyIn0sIk0xNDc0NTI2MTM4OTEwIjp7InBhcmFtcyI6eyJsaW5rdXJsIjoiIiwidGl0bGUiOiJcdTdlZDFcdTViOWFcdTYyNGJcdTY3M2FcdTUzZjciLCJ0ZXh0IjoiXHU1OTgyXHU2NzljXHU2MGE4XHU3NTI4XHU2MjRiXHU2NzNhXHU1M2Y3XHU2Y2U4XHU1MThjXHU4ZmM3XHU0ZjFhXHU1NDU4XHU2MjE2XHU2MGE4XHU2MGYzXHU5MDFhXHU4ZmM3XHU1ZmFlXHU0ZmUxXHU1OTE2XHU4ZDJkXHU3MjY5XHU4YmY3XHU3ZWQxXHU1YjlhXHU2MGE4XHU3Njg0XHU2MjRiXHU2NzNhXHU1M2Y3XHU3ODAxIiwiaWNvbmNsYXNzIjoiaWNvbi1tb2JpbGUifSwic3R5bGUiOnsibWFyZ2ludG9wIjoiMTAiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsInRpdGxlY29sb3IiOiIjZmYwMDExIiwidGV4dGNvbG9yIjoiIzk5OTk5OSIsImljb25jb2xvciI6IiM5OTk5OTkifSwiaWQiOiJiaW5kbW9iaWxlIn0sIk0xNDc0NTI2MTQzNDg3Ijp7InN0eWxlIjp7Im1hcmdpbnRvcCI6IjEwIiwiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJpY29uY29sb3IiOiIjOTk5OTk5IiwidGV4dGNvbG9yIjoiIzMzMzMzMyIsInJlbWFya2NvbG9yIjoiIzg4ODg4OCJ9LCJkYXRhIjp7IkMxNDc0NTI2MTQzNDg5Ijp7InRleHQiOiJcdTYyMTFcdTc2ODRcdThiYTJcdTUzNTUiLCJsaW5rdXJsIjoiIiwiaWNvbmNsYXNzIjoiaWNvbi1saXN0IiwicmVtYXJrIjoiXHU2N2U1XHU3NzBiXHU1MTY4XHU5MGU4IiwiZG90bnVtIjoiIn19LCJpZCI6Imxpc3RtZW51In0sIk0xNDc0NTI2MTgxNDMxIjp7InBhcmFtcyI6eyJyb3dudW0iOiI0IiwiYm9yZGVyIjoiMSIsImJvcmRlcnRvcCI6IjAiLCJib3JkZXJib3R0b20iOiIxIn0sInN0eWxlIjp7ImJhY2tncm91bmQiOiIjZmZmZmZmIiwiYm9yZGVyY29sb3IiOiIjZWJlYmViIiwidGV4dGNvbG9yIjoiIzdhN2E3YSIsImljb25jb2xvciI6IiNhYWFhYWEiLCJkb3Rjb2xvciI6IiNmZjAwMTEifSwiZGF0YSI6eyJDMTQ3NDUyNjE4MTQzMSI6eyJpY29uY2xhc3MiOiJpY29uLWNhcmQiLCJ0ZXh0IjoiXHU1Zjg1XHU0ZWQ4XHU2YjNlIiwibGlua3VybCI6IiIsImRvdG51bSI6IjAifSwiQzE0NzQ1MjYxODE0MzIiOnsiaWNvbmNsYXNzIjoiaWNvbi1ib3giLCJ0ZXh0IjoiXHU1Zjg1XHU1M2QxXHU4ZDI3IiwibGlua3VybCI6IiIsImRvdG51bSI6IjAifSwiQzE0NzQ1MjYxODE0MzMiOnsiaWNvbmNsYXNzIjoiaWNvbi1kZWxpdmVyIiwidGV4dCI6Ilx1NWY4NVx1NjUzNlx1OGQyNyIsImxpbmt1cmwiOiIiLCJkb3RudW0iOiIwIn0sIkMxNDc0NTI2MTgxNDM0Ijp7Imljb25jbGFzcyI6Imljb24tZWxlY3RyaWNhbCIsInRleHQiOiJcdTkwMDBcdTYzNjJcdThkMjciLCJsaW5rdXJsIjoiIiwiZG90bnVtIjoiMCJ9fSwiaWQiOiJpY29uZ3JvdXAifSwiTTE0NzQ1MjYxOTkxMDIiOnsic3R5bGUiOnsibWFyZ2ludG9wIjoiMTAiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImljb25jb2xvciI6IiM5OTk5OTkiLCJ0ZXh0Y29sb3IiOiIjMzMzMzMzIiwicmVtYXJrY29sb3IiOiIjODg4ODg4In0sImRhdGEiOnsiQzE0NzQ1MjYxOTkxMDIiOnsidGV4dCI6Ilx1NTIwNlx1OTUwMFx1NGUyZFx1NWZjMyIsImxpbmt1cmwiOiIiLCJpY29uY2xhc3MiOiJpY29uLWdyb3VwIiwicmVtYXJrIjoiXHU2N2U1XHU3NzBiIiwiZG90bnVtIjoiIn0sIkMxNDc0NTI2MTk5MTAzIjp7InRleHQiOiJcdTc5ZWZcdTUyMDZcdTdiN2VcdTUyMzAiLCJsaW5rdXJsIjoiIiwiaWNvbmNsYXNzIjoiaWNvbi1naWZ0cyIsInJlbWFyayI6Ilx1NjdlNVx1NzcwYiIsImRvdG51bSI6IiJ9LCJDMTQ3NDUyNjE5OTEwNCI6eyJ0ZXh0IjoiXHU3OWVmXHU1MjA2XHU1NTQ2XHU1N2NlIiwibGlua3VybCI6IiIsImljb25jbGFzcyI6Imljb24tY3JlZGl0bGV2ZWwiLCJyZW1hcmsiOiJcdTY3ZTVcdTc3MGIiLCJkb3RudW0iOiIifX0sImlkIjoibGlzdG1lbnUifSwiTTE0NzQ1MjYyMjIyMDYiOnsic3R5bGUiOnsibWFyZ2ludG9wIjoiMTAiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImljb25jb2xvciI6IiM5OTk5OTkiLCJ0ZXh0Y29sb3IiOiIjMzMzMzMzIiwicmVtYXJrY29sb3IiOiIjODg4ODg4In0sImRhdGEiOnsiQzE0NzQ1MjYyMjIyMDYiOnsidGV4dCI6Ilx1OTg4Nlx1NTNkNlx1NGYxOFx1NjBlMFx1NTIzOCIsImxpbmt1cmwiOiIiLCJpY29uY2xhc3MiOiJpY29uLXNhbWUiLCJyZW1hcmsiOiJcdTY3ZTVcdTc3MGIiLCJkb3RudW0iOiIifSwiQzE0NzQ1MjYyMjIyMDciOnsidGV4dCI6Ilx1NjIxMVx1NzY4NFx1NGYxOFx1NjBlMFx1NTIzOCIsImxpbmt1cmwiOiIiLCJpY29uY2xhc3MiOiJpY29uLWNhcmQiLCJyZW1hcmsiOiJcdTY3ZTVcdTc3MGIiLCJkb3RudW0iOiIifX0sImlkIjoibGlzdG1lbnUifSwiTTE0NzQ1MjYyNTM2MTQiOnsic3R5bGUiOnsibWFyZ2ludG9wIjoiMTAiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImljb25jb2xvciI6IiM5OTk5OTkiLCJ0ZXh0Y29sb3IiOiIjMzMzMzMzIiwicmVtYXJrY29sb3IiOiIjODg4ODg4In0sImRhdGEiOnsiQzE0NzQ1MjYyNTM2MTQiOnsidGV4dCI6Ilx1NzllZlx1NTIwNlx1NjM5Mlx1ODg0YyIsImxpbmt1cmwiOiIiLCJpY29uY2xhc3MiOiJpY29uLXJhbmsiLCJyZW1hcmsiOiJcdTY3ZTVcdTc3MGIiLCJkb3RudW0iOiIifSwiQzE0NzQ1MjYyNTM2MTUiOnsidGV4dCI6Ilx1NmQ4OFx1OGQzOVx1NjM5Mlx1ODg0YyIsImxpbmt1cmwiOiIiLCJpY29uY2xhc3MiOiJpY29uLW1vbmV5IiwicmVtYXJrIjoiXHU2N2U1XHU3NzBiIiwiZG90bnVtIjoiIn19LCJpZCI6Imxpc3RtZW51In0sIk0xNDc0NTI2MjgxNzYwIjp7InN0eWxlIjp7Im1hcmdpbnRvcCI6IjEwIiwiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJpY29uY29sb3IiOiIjOTk5OTk5IiwidGV4dGNvbG9yIjoiIzMzMzMzMyIsInJlbWFya2NvbG9yIjoiIzg4ODg4OCJ9LCJkYXRhIjp7IkMxNDc0NTI2MjgxNzYwIjp7InRleHQiOiJcdTYyMTFcdTc2ODRcdThkMmRcdTcyNjlcdThmNjYiLCJsaW5rdXJsIjoiIiwiaWNvbmNsYXNzIjoiaWNvbi1jYXJ0IiwicmVtYXJrIjoiXHU2N2U1XHU3NzBiIiwiZG90bnVtIjoiIn0sIkMxNDc0NTI2MjgxNzYxIjp7InRleHQiOiJcdTYyMTFcdTc2ODRcdTUxNzNcdTZjZTgiLCJsaW5rdXJsIjoiIiwiaWNvbmNsYXNzIjoiaWNvbi1saWtlIiwicmVtYXJrIjoiXHU2N2U1XHU3NzBiIiwiZG90bnVtIjoiIn0sIkMxNDc0NTI2MjgxNzYyIjp7InRleHQiOiJcdTYyMTFcdTc2ODRcdThkYjNcdThmZjkiLCJsaW5rdXJsIjoiIiwiaWNvbmNsYXNzIjoiaWNvbi1mb290cHJpbnQiLCJyZW1hcmsiOiJcdTY3ZTVcdTc3MGIiLCJkb3RudW0iOiIifSwiTTE0NzQ1MjYzMDA1NDMiOnsidGV4dCI6Ilx1NmQ4OFx1NjA2Zlx1NjNkMFx1OTE5Mlx1OGJiZVx1N2Y2ZSIsImxpbmt1cmwiOiIiLCJpY29uY2xhc3MiOiJpY29uLW5vdGljZSIsInJlbWFyayI6Ilx1NjdlNVx1NzcwYiIsImRvdG51bSI6IiJ9fSwiaWQiOiJsaXN0bWVudSJ9LCJNMTQ3NDUyNjMwNzI3MCI6eyJzdHlsZSI6eyJtYXJnaW50b3AiOiIxMCIsImJhY2tncm91bmQiOiIjZmZmZmZmIiwiaWNvbmNvbG9yIjoiIzk5OTk5OSIsInRleHRjb2xvciI6IiMzMzMzMzMiLCJyZW1hcmtjb2xvciI6IiM4ODg4ODgifSwiZGF0YSI6eyJDMTQ3NDUyNjMwNzI3MCI6eyJ0ZXh0IjoiXHU2NTM2XHU4ZDI3XHU1NzMwXHU1NzQwXHU3YmExXHU3NDA2IiwibGlua3VybCI6IiIsImljb25jbGFzcyI6Imljb24tYWRkcmVzcyIsInJlbWFyayI6Ilx1NjdlNVx1NzcwYiIsImRvdG51bSI6IiJ9LCJDMTQ3NDUyNjMwNzI3MSI6eyJ0ZXh0IjoiXHU1ZTJlXHU1MmE5XHU0ZTJkXHU1ZmMzIiwibGlua3VybCI6IiIsImljb25jbGFzcyI6Imljb24tcXVlc3Rpb25maWxsIiwicmVtYXJrIjoiXHU2N2U1XHU3NzBiIiwiZG90bnVtIjoiIn19LCJpZCI6Imxpc3RtZW51In0sIk0xNDc0NTk3NzI2NTU2Ijp7InBhcmFtcyI6eyJiaW5kdXJsIjoiIiwibG9nb3V0dXJsIjoiIn0sInN0eWxlIjp7InRleHRjb2xvciI6IiNmZjAwMTEiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsIm1hcmdpbnRvcCI6IjEwIn0sImlkIjoibG9nb3V0In0sIk0xNDc0NTk3OTcxMjE4Ijp7InBhcmFtcyI6eyJjb250ZW50IjoiUEhBZ2MzUjViR1U5SW5SbGVIUXRZV3hwWjI0NklHTmxiblJsY2pzaVB1ZUppT2FkZythSmdPYWNpU0FvWXlrZ2VIaDQ1WldHNVorT1BDOXdQZz09In0sInN0eWxlIjp7ImJhY2tncm91bmQiOiIjZmZmZmZmIiwicGFkZGluZyI6IjIwIn0sImlkIjoicmljaHRleHQifX19', '../addons/ewei_shopv2/plugin/diypage/static/template/member1/preview.jpg', 9, 0, 0, 0),
(10, 0, 4, '分销中心01', 'eyJwYWdlIjp7InR5cGUiOiI0IiwidGl0bGUiOiJcdThiZjdcdThmOTNcdTUxNjVcdTk4NzVcdTk3NjJcdTY4MDdcdTk4OTgiLCJuYW1lIjoiXHU2NzJhXHU1NDdkXHU1NDBkXHU5ODc1XHU5NzYyIiwiZGVzYyI6IiIsImljb24iOiIiLCJrZXl3b3JkIjoiIiwiYmFja2dyb3VuZCI6IiNmYWZhZmEiLCJkaXltZW51IjoiLTEiLCJmb2xsb3diYXIiOiIwIiwidmlzaXQiOiIwIiwidmlzaXRsZXZlbCI6eyJtZW1iZXIiOiIiLCJjb21taXNzaW9uIjoiIn0sIm5vdmlzaXQiOnsidGl0bGUiOiIiLCJsaW5rIjoiIn19LCJpdGVtcyI6eyJNMTQ3NTk3NjIxMDU0NiI6eyJwYXJhbXMiOnsic3R5bGUiOiJkZWZhdWx0MSIsInNldGljb24iOiJpY29uLXNldHRpbmdzIiwic2V0bGluayI6IiIsImxlZnRuYXYiOiJcdTYzZDBcdTczYjAxIiwibGVmdG5hdmxpbmsiOiIiLCJyaWdodG5hdiI6Ilx1NjNkMFx1NzNiMDIiLCJyaWdodG5hdmxpbmsiOiIiLCJjZW50ZXJuYXYiOiJcdTYzZDBcdTczYjAiLCJjZW50ZXJuYXZsaW5rIjoiIn0sInN0eWxlIjp7ImJhY2tncm91bmQiOiIjZmU1NDU1IiwidGV4dGNvbG9yIjoiI2ZmZmZmZiIsInRleHRsaWdodCI6IiNmZWYzMWYifSwiaWQiOiJtZW1iZXJjIn0sIk0xNDc1OTc2MjEyMzA1Ijp7InBhcmFtcyI6eyJyb3dudW0iOiIzIn0sInN0eWxlIjp7ImJhY2tncm91bmQiOiIjZmZmZmZmIiwidGlwY29sb3IiOiIjZmViMzEyIn0sImRhdGEiOnsiQzE0NzU5NzYyMTIzMDUiOnsiaWNvbmNsYXNzIjoiaWNvbi1tb25leSIsImljb25jb2xvciI6IiNmZWIzMTIiLCJ0ZXh0IjoiXHU1MjA2XHU5NTAwXHU0ZjYzXHU5MWQxIiwidGV4dGNvbG9yIjoiIzY2NjY2NiIsImxpbmt1cmwiOiIiLCJ0aXBudW0iOiIwLjAwIiwidGlwdGV4dCI6Ilx1NTE0MyJ9LCJDMTQ3NTk3NjIxMjMwNiI6eyJpY29uY2xhc3MiOiJpY29uLWxpc3QiLCJpY29uY29sb3IiOiIjNTBiNmZlIiwidGV4dCI6Ilx1NGY2M1x1OTFkMVx1NjYwZVx1N2VjNiIsInRleHRjb2xvciI6IiM2NjY2NjYiLCJsaW5rdXJsIjoiIiwidGlwbnVtIjoiNTAiLCJ0aXB0ZXh0IjoiXHU3YjE0In0sIkMxNDc1OTc2MjEyMzA4Ijp7Imljb25jbGFzcyI6Imljb24tbWFuYWdlb3JkZXIiLCJpY29uY29sb3IiOiIjZmY3NDFkIiwidGV4dCI6Ilx1NjNkMFx1NzNiMFx1NjYwZVx1N2VjNiIsInRleHRjb2xvciI6IiM2NjY2NjYiLCJsaW5rdXJsIjoiIiwidGlwbnVtIjoiMTAiLCJ0aXB0ZXh0IjoiXHU3YjE0In0sIkMxNDc1OTc2MjEyMzA5Ijp7Imljb25jbGFzcyI6Imljb24tZ3JvdXAiLCJpY29uY29sb3IiOiIjZmY3NDFkIiwidGV4dCI6Ilx1NjIxMVx1NzY4NFx1NGUwYlx1N2ViZiIsInRleHRjb2xvciI6IiM2NjY2NjYiLCJsaW5rdXJsIjoiIiwidGlwbnVtIjoiMiIsInRpcHRleHQiOiJcdTRlYmEifSwiQzE0NzU5NzYyMTIzMTAiOnsiaWNvbmNsYXNzIjoiaWNvbi1xcmNvZGUiLCJpY29uY29sb3IiOiIjZmViMzEyIiwidGV4dCI6Ilx1NjNhOFx1NWU3Zlx1NGU4Y1x1N2VmNFx1NzgwMSIsInRleHRjb2xvciI6IiM2NjY2NjYiLCJsaW5rdXJsIjoiIiwidGlwbnVtIjoiIiwidGlwdGV4dCI6IiJ9LCJDMTQ3NTk3NjIxMjMxMSI6eyJpY29uY2xhc3MiOiJpY29uLXNob3BmaWxsIiwiaWNvbmNvbG9yIjoiIzUwYjZmZSIsInRleHQiOiJcdTVjMGZcdTVlOTdcdThiYmVcdTdmNmUiLCJ0ZXh0Y29sb3IiOiIjNjY2NjY2IiwibGlua3VybCI6IiIsInRpcG51bSI6IiIsInRpcHRleHQiOiIifSwiQzE0NzU5NzYyMTIzMTIiOnsiaWNvbmNsYXNzIjoiaWNvbi1yYW5rIiwiaWNvbmNvbG9yIjoiI2ZmNzQxZCIsInRleHQiOiJcdTRmNjNcdTkxZDFcdTYzOTJcdTU0MGQiLCJ0ZXh0Y29sb3IiOiIjNjY2NjY2IiwibGlua3VybCI6IiIsInRpcG51bSI6IiIsInRpcHRleHQiOiIifX0sImlkIjoiYmxvY2tncm91cCJ9fX0=', '../addons/ewei_shopv2/plugin/diypage/static/template/commission1/preview.jpg', 10, 0, 0, 0);
INSERT INTO `ims_ewei_shop_diypage_template` (`id`, `uniacid`, `type`, `name`, `data`, `preview`, `tplid`, `cate`, `deleted`, `merch`) VALUES
(11, 0, 5, '商品详情', 'eyJwYWdlIjp7InR5cGUiOiI1IiwidGl0bGUiOiJcdTU1NDZcdTU0YzFcdThiZTZcdTYwYzUiLCJuYW1lIjoiXHU1NTQ2XHU1NGMxXHU4YmU2XHU2MGM1XHU5ODc1IiwiZGVzYyI6IiIsImljb24iOiIiLCJrZXl3b3JkIjoiIiwiYmFja2dyb3VuZCI6IiNmYWZhZmEiLCJkaXltZW51IjoiLTEiLCJmb2xsb3diYXIiOiIwIiwidmlzaXQiOiIwIiwidmlzaXRsZXZlbCI6eyJtZW1iZXIiOiIiLCJjb21taXNzaW9uIjoiIn0sIm5vdmlzaXQiOnsidGl0bGUiOiIiLCJsaW5rIjoiIn19LCJpdGVtcyI6eyJNMTQ3NzUzOTc2NzU4MyI6eyJ0eXBlIjoiNSIsIm1heCI6IjEiLCJwYXJhbXMiOnsiZ29vZHN0ZXh0IjoiXHU1NTQ2XHU1NGMxIiwiZGV0YWlsdGV4dCI6Ilx1OGJlNlx1NjBjNSJ9LCJzdHlsZSI6eyJiYWNrZ3JvdW5kIjoiI2Y3ZjdmNyIsInRleHRjb2xvciI6IiM2NjY2NjYiLCJhY3RpdmVjb2xvciI6IiNlZjRmNGYifSwiaWQiOiJkZXRhaWxfdGFiIn0sIk0xNDc3NTM5NzY4MDkzIjp7InR5cGUiOiI1IiwibWF4IjoiMSIsInN0eWxlIjp7ImRvdHN0eWxlIjoicm91bmQiLCJkb3RhbGlnbiI6ImxlZnQiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImxlZnRyaWdodCI6IjEwIiwiYm90dG9tIjoiMTAiLCJvcGFjaXR5IjoiMC44In0sImlkIjoiZGV0YWlsX3N3aXBlIn0sIk0xNDgwNTg2MTg5Njc1Ijp7InR5cGUiOiI1IiwibWF4IjoiMSIsInBhcmFtcyI6eyJidXlidG50ZXh0IjoiXHU1MzlmXHU0ZWY3XHU4ZDJkXHU0ZTcwIn0sInN0eWxlIjp7ImJnbGVmdCI6IiNlZjRmNGYiLCJiZ3JpZ2h0IjoiI2ZmZWYzMiIsInByaWNlY29sb3IiOiIjZmZmZmZmIiwibWFya2V0cHJpY2Vjb2xvciI6IiNmZmZmZmYiLCJ0YWdjb2xvciI6IiNmZmZmZmYiLCJzdGF0dXNjb2xvciI6IiNlZjRmNGYiLCJwcm9jZXNzdGV4dGNvbG9yIjoiI2ZmZmZmZmYiLCJwcm9jZXNzY29sb3IiOiIjZmZlZjMyIiwiYmdsZWZ0d2FpdCI6IiMwMGI5NTAiLCJiZ3JpZ2h0d2FpdCI6IiMwMGI5NTAiLCJ0aW1lY29sb3IiOiIjZmZmZmZmIiwidGltZWJnY29sb3IiOiIjNTgyZTE5IiwicHJpY2Vjb2xvcndhaXQiOiIjZmZmZmZmIiwibWFya2V0cHJpY2Vjb2xvcndhaXQiOiIjZmZmZmZmIiwidGFnY29sb3J3YWl0IjoiI2ZmZmZmZiIsInN0YXR1c2NvbG9yd2FpdCI6IiNmZmZmZmYiLCJ0aW1lY29sb3J3YWl0IjoiI2ZmZmZmZiIsInRpbWViZ2NvbG9yd2FpdCI6IiMwMDM3MTgiLCJidXlidG50ZXh0d2FpdCI6IiNmZmZmZmYiLCJidXlidG5iZ3dhaXQiOiIjMDBiOTUwIn0sImlkIjoiZGV0YWlsX3NlY2tpbGwifSwiTTE0Nzc1Mzk3Njg2OTQiOnsidHlwZSI6IjUiLCJtYXgiOiIxIiwicGFyYW1zIjp7InNoYXJlIjoiXHU1MjA2XHU0ZWFiIiwic2hhcmVfbGluayI6IiJ9LCJzdHlsZSI6eyJtYXJnaW50b3AiOiIwIiwibWFyZ2luYm90dG9tIjoiMCIsImJhY2tncm91bmQiOiIjZmZmZmZmIiwidGl0bGVjb2xvciI6IiMzMzMzMzMiLCJzdWJ0aXRsZWNvbG9yIjoiI2VmNGY0ZiIsInByaWNlY29sb3IiOiIjZWY0ZjRmIiwidGV4dGNvbG9yIjoiI2MwYzBjMCIsInRpbWVjb2xvciI6IiNlZjRmNGYiLCJ0aW1ldGV4dGNvbG9yIjoiI2VmNGY0ZiJ9LCJpZCI6ImRldGFpbF9pbmZvIn0sIk0xNDc3NTM5NzY5MzY2Ijp7InR5cGUiOiI1IiwibWF4IjoiMSIsInN0eWxlIjp7Im1hcmdpbnRvcCI6IjAiLCJtYXJnaW5ib3R0b20iOiIwIiwiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJ0ZXh0Y29sb3IiOiIjNjY2NjY2IiwidGV4dGNvbG9yaGlnaCI6IiNlZjRmNGYifSwiZGF0YSI6eyJDMTQ3NzUzOTc2OTM2NiI6eyJuYW1lIjoiXHU0ZThjXHU2YjIxXHU4ZDJkXHU0ZTcwIiwidHlwZSI6ImVyY2kifSwiQzE0Nzc1Mzk3NjkzNjciOnsibmFtZSI6Ilx1NGYxYVx1NTQ1OFx1NGVmNyIsInR5cGUiOiJodWl5dWFuIn0sIkMxNDc3NTM5NzY5MzY4Ijp7Im5hbWUiOiJcdTRmMThcdTYwZTAiLCJ0eXBlIjoieW91aHVpIn0sIkMxNDc3NTM5NzY5MzY5Ijp7Im5hbWUiOiJcdTc5ZWZcdTUyMDYiLCJ0eXBlIjoiamlmZW4ifSwiQzE0Nzc1Mzk3NjkzNzAiOnsibmFtZSI6Ilx1NGUwZFx1OTE0ZFx1OTAwMVx1NTMzYVx1NTdkZiIsInR5cGUiOiJidXBlaXNvbmcifSwiQzE0Nzc1Mzk3NjkzNzEiOnsibmFtZSI6Ilx1NTU0Nlx1NTRjMVx1NjgwN1x1N2I3ZSIsInR5cGUiOiJiaWFvcWlhbiJ9fSwiaWQiOiJkZXRhaWxfc2FsZSJ9LCJNMTQ3NzUzOTc3MDA3OSI6eyJ0eXBlIjoiNSIsIm1heCI6IjEiLCJzdHlsZSI6eyJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsInRleHRjb2xvciI6IiMzMzMzMzMiLCJtYXJnaW50b3AiOiIxMCIsIm1hcmdpbmJvdHRvbSI6IjAifSwiaWQiOiJkZXRhaWxfc3BlYyJ9LCJNMTQ3NzUzOTc3MDc5MCI6eyJ0eXBlIjoiNSIsIm1heCI6IjEiLCJzdHlsZSI6eyJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsIm1hcmdpbnRvcCI6IjEwIiwibWFyZ2luYm90dG9tIjoiMCIsInRleHRjb2xvciI6IiM3YzdjN2MifSwiaWQiOiJkZXRhaWxfcGFja2FnZSJ9LCJNMTQ3NzUzOTc3MTczNSI6eyJ0eXBlIjoiNSIsIm1heCI6IjEiLCJwYXJhbXMiOnsic2hvcGxvZ28iOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2Mlwvc3RhdGljXC9pbWFnZXNcL2Rlc2lnbmVyLmpwZyIsInNob3BuYW1lIjoiIiwic2hvcGRlc2MiOiIiLCJoaWRlbnVtIjoiMCIsImxlZnRuYXZ0ZXh0IjoiXHU1MTY4XHU5MGU4XHU1NTQ2XHU1NGMxIiwibGVmdG5hdmxpbmsiOiIiLCJyaWdodG5hdnRleHQiOiJcdThmZGJcdTVlOTdcdTkwMWJcdTkwMWIiLCJyaWdodG5hdmxpbmsiOiIifSwic3R5bGUiOnsibWFyZ2ludG9wIjoiMTAiLCJtYXJnaW5ib3R0b20iOiIwIiwiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJnb29kc251bWNvbG9yIjoiIzMzMzMzMyIsImdvb2RzdGV4dGNvbG9yIjoiIzdjN2M3YyIsInJpZ2h0bmF2Y29sb3IiOiIjN2M3YzdjIiwic2hvcG5hbWVjb2xvciI6IiMzMzMzMzMiLCJzaG9wZGVzY2NvbG9yIjoiIzQ0NDQ0NCJ9LCJpZCI6ImRldGFpbF9zaG9wIn0sIk0xNDc3NTM5NzcyOTU5Ijp7InR5cGUiOiI1IiwibWF4IjoiMSIsInN0eWxlIjp7ImJhY2tncm91bmQiOiIjZmZmZmZmIiwibWFyZ2ludG9wIjoiMTAiLCJtYXJnaW5ib3R0b20iOiIwIiwidGl0bGVjb2xvciI6IiMzMzMzMzMiLCJzaG9wbmFtZWNvbG9yIjoiIzMzMzMzMyIsInNob3BpbmZvY29sb3IiOiIjNjY2NjY2IiwibmF2dGVsY29sb3IiOiIjMDA4MDAwIiwibmF2bG9jYXRpb25jb2xvciI6IiNmZjk5MDAifSwiaWQiOiJkZXRhaWxfc3RvcmUifSwiTTE0Nzc1Mzk3NzM3OTkiOnsidHlwZSI6IjUiLCJtYXgiOiIxIiwic3R5bGUiOnsiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJtYXJnaW50b3AiOiIxMCIsIm1hcmdpbmJvdHRvbSI6IjAifSwiaWQiOiJkZXRhaWxfYnV5c2hvdyJ9LCJNMTQ3NzUzOTc3NDY3OSI6eyJ0eXBlIjoiNSIsIm1heCI6IjEiLCJzdHlsZSI6eyJtYXJnaW50b3AiOiIxMCIsIm1hcmdpbmJvdHRvbSI6IjEwIiwiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJtYWluY29sb3IiOiIjZmQ1NDU0Iiwic3ViY29sb3IiOiIjN2M3YzdjIiwidGV4dGNvbG9yIjoiIzMzMzMzMyJ9LCJpZCI6ImRldGFpbF9jb21tZW50In0sIk0xNDc3NTM5Nzc2NjE1Ijp7InR5cGUiOiI1IiwibWF4IjoiMSIsInN0eWxlIjp7Im1hcmdpbnRvcCI6IjEwIiwiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJ0ZXh0Y29sb3IiOiIjMzMzMzMzIn0sImlkIjoiZGV0YWlsX3B1bGx1cCJ9LCJNMTQ3NzUzOTc3NzM5OSI6eyJ0eXBlIjoiNSIsIm1heCI6IjEiLCJwYXJhbXMiOnsiaGlkZWxpa2UiOiIwIiwiaGlkZXNob3AiOiIwIiwiaGlkZWNhcnQiOiIwIiwiaGlkZWNhcnRidG4iOiIwIiwidGV4dGJ1eSI6Ilx1N2FjYlx1NTIzYlx1OGQyZFx1NGU3MCJ9LCJzdHlsZSI6eyJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsInRleHRjb2xvciI6IiM5OTk5OTkiLCJpY29uY29sb3IiOiIjOTk5OTk5IiwiY2FydGNvbG9yIjoiI2ZlOTQwMiIsImJ1eWNvbG9yIjoiI2ZkNTU1NSIsImRvdGNvbG9yIjoiI2ZmMDAxMSJ9LCJpZCI6ImRldGFpbF9uYXZiYXIifX19', '../addons/ewei_shopv2/plugin/diypage/static/template/detail1/preview.jpg', 11, 0, 0, 0),
(12, 0, 7, '整点秒杀', 'eyJwYWdlIjp7InR5cGUiOiI3IiwidGl0bGUiOiJcdTY1NzRcdTcwYjlcdTc5ZDJcdTY3NDAiLCJuYW1lIjoiXHU2NTc0XHU3MGI5XHU3OWQyXHU2NzQwIiwiZGVzYyI6IiIsImljb24iOiIiLCJrZXl3b3JkIjoiIiwiYmFja2dyb3VuZCI6IiNmYWZhZmEiLCJkaXltZW51IjoiLTEiLCJmb2xsb3diYXIiOiIwIiwidmlzaXQiOiIwIiwidmlzaXRsZXZlbCI6eyJtZW1iZXIiOiIiLCJjb21taXNzaW9uIjoiIn0sIm5vdmlzaXQiOnsidGl0bGUiOiIiLCJsaW5rIjoiIn19LCJpdGVtcyI6eyJNMTQ4MDQ5ODExNTc4MCI6eyJ0eXBlIjoiNyIsIm1heCI6IjEiLCJzdHlsZSI6eyJtYXJnaW50b3AiOiIwIiwiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJjb2xvciI6IiMzMzMzMzMiLCJiZ2NvbG9yIjoiI2ZmZmZmZiIsInNlbGVjdGVkY29sb3IiOiIjZmYzMzAwIiwic2VsZWN0ZWRiZ2NvbG9yIjoiI2ZmZmZmZiJ9LCJpZCI6InNlY2tpbGxfdGltZXMifSwiTTE0ODA0OTgxMTgwMTkiOnsidHlwZSI6IjciLCJtYXgiOiIxIiwic3R5bGUiOnsibWFyZ2ludG9wIjoiMTAiLCJtYXJnaW5ib3R0b20iOiIwIiwiYmFja2dyb3VuZCI6IiNmZmZmZmYifSwiaWQiOiJzZWNraWxsX2FkdnMifSwiTTE0ODA0OTgxMTcwNDMiOnsidHlwZSI6IjciLCJtYXgiOiIxIiwic3R5bGUiOnsibWFyZ2ludG9wIjoiMTAiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImNvbG9yIjoiIzMzMzMzMyIsImJnY29sb3IiOiIjZmZmZmZmIiwic2VsZWN0ZWRjb2xvciI6IiNlZjRmNGYiLCJzZWxlY3RlZGJnY29sb3IiOiIjZmZmZmZmIn0sImlkIjoic2Vja2lsbF9yb29tcyJ9LCJNMTQ4MDQ5ODExODQ1MyI6eyJ0eXBlIjoiNyIsIm1heCI6IjEiLCJwYXJhbXMiOnsidGl0bGV0ZXh0IjoiXHU1MTQ4XHU0ZTBiXHU1MzU1XHU1MTQ4XHU1Zjk3XHU1NGU2fiIsInRpdGxlb3ZlcnRleHQiOiJcdThmZDhcdTUzZWZcdTRlZTVcdTdlZTdcdTdlZWRcdTYyYTJcdThkMmRcdTU0ZTZ+IiwidGl0bGV3YWl0dGV4dCI6Ilx1NTM3M1x1NWMwNlx1NWYwMFx1NTljYiBcdTUxNDhcdTRlMGJcdTUzNTVcdTUxNDhcdTVmOTdcdTU0ZTYiLCJidG50ZXh0IjoiXHU2MmEyXHU4ZDJkXHU0ZTJkIiwiYnRub3ZlcnRleHQiOiJcdTVkZjJcdTYyYTJcdTViOGMiLCJidG53YWl0dGV4dCI6Ilx1N2I0OVx1NWY4NVx1NjJhMlx1OGQyZCJ9LCJzdHlsZSI6eyJtYXJnaW50b3AiOiIxMCIsIm1hcmdpbmJvdHRvbSI6IjAiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsInRvcGJnY29sb3IiOiIjZjBmMmY1IiwidG9wY29sb3IiOiIjMzMzMzMzIiwidGltZWJnY29sb3IiOiIjNDY0NTUzIiwidGltZWNvbG9yIjoiI2ZmZmZmZiIsInRpdGxlY29sb3IiOiIjMzMzMzMzIiwicHJpY2Vjb2xvciI6IiNlZjRmNGYiLCJtYXJrZXRwcmljZWNvbG9yIjoiIzk0OTU5OCIsImJ0bmJnY29sb3IiOiIjZWY0ZjRmIiwiYnRub3ZlcmJnY29sb3IiOiIjZjdmN2Y3IiwiYnRud2FpdGJnY29sb3IiOiIjMDRiZTAyIiwiYnRuY29sb3IiOiIjZmZmZmZmIiwiYnRub3ZlcmNvbG9yIjoiIzMzMzMzMyIsImJ0bndhaXRjb2xvciI6IiNmZmZmZmYiLCJwcm9jZXNzdGV4dGNvbG9yIjoiI2QwZDFkMiIsInByb2Nlc3NiZ2NvbG9yIjoiI2ZmOGY4ZiJ9LCJpZCI6InNlY2tpbGxfbGlzdCJ9fX0=', '../addons/ewei_shopv2/plugin/diypage/static/template/seckill/preview.png', 12, 0, 0, 0),
(13, 0, 6, '积分商城', 'eyJwYWdlIjp7InR5cGUiOiI2IiwidGl0bGUiOiJcdTc5ZWZcdTUyMDZcdTU1NDZcdTU3Y2UiLCJuYW1lIjoiXHU2ZDRiXHU4YmQ1XHU3OWVmXHU1MjA2XHU1NTQ2XHU1N2NlXHU5ODc1XHU5NzYyIiwiZGVzYyI6IiIsImljb24iOiIiLCJrZXl3b3JkIjoiIiwiYmFja2dyb3VuZCI6IiNmYWZhZmEiLCJkaXltZW51IjoiLTEiLCJmb2xsb3diYXIiOiIwIiwidmlzaXQiOiIwIiwidmlzaXRsZXZlbCI6eyJtZW1iZXIiOiIiLCJjb21taXNzaW9uIjoiIn0sIm5vdmlzaXQiOnsidGl0bGUiOiIiLCJsaW5rIjoiIn19LCJpdGVtcyI6eyJNMTQ3OTI2MTA2MTY0NSI6eyJzdHlsZSI6eyJkb3RzdHlsZSI6InJvdW5kIiwiZG90YWxpZ24iOiJjZW50ZXIiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImxlZnRyaWdodCI6IjUiLCJib3R0b20iOiI1Iiwib3BhY2l0eSI6IjAuOCJ9LCJkYXRhIjp7IkMxNDc5MjYxMDYxNjQ1Ijp7ImltZ3VybCI6Imh0dHA6XC9cL29mNm9kaGRxMS5ia3QuY2xvdWRkbi5jb21cLzA2M2E2ZWM4NGY0NWE3MGQ2Y2NhOGQ4ZjI2NWQxYjcyLmpwZyIsImxpbmt1cmwiOiIuXC9pbmRleC5waHA/aT0xMiZjPWVudHJ5Jm09ZXdlaV9zaG9wdjImZG89bW9iaWxlJnI9Y3JlZGl0c2hvcC5kZXRhaWwmaWQ9MTE3In0sIkMxNDc5MjYxMDYxNjQ2Ijp7ImltZ3VybCI6Imh0dHA6XC9cL29mNm9kaGRxMS5ia3QuY2xvdWRkbi5jb21cLzQwMTgzYzEyY2M0MWIxYWYwMjY3NDIwYzUwNjQyODliLmpwZyIsImxpbmt1cmwiOiIuXC9pbmRleC5waHA/aT0xMiZjPWVudHJ5Jm09ZXdlaV9zaG9wdjImZG89bW9iaWxlJnI9Y3JlZGl0c2hvcC5saXN0cyJ9fSwiaWQiOiJiYW5uZXIifSwiTTE0NzkyNjgxMTQxNjEiOnsic3R5bGUiOnsibWFyZ2ludG9wIjoiMTAiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiJ9LCJkYXRhIjp7IkMxNDc5MjY4MTE0MTYxIjp7InRleHQiOiJcdTYyMTFcdTc2ODRcdTc5ZWZcdTUyMDYiLCJpY29uY2xhc3MiOiJpY29uLWppZmVuIiwidGV4dGNvbG9yIjoiIzY2NjY2NiIsImljb25jb2xvciI6IiM2NjY2NjYiLCJsaW5rdXJsIjoiLlwvaW5kZXgucGhwP2k9MTImYz1lbnRyeSZtPWV3ZWlfc2hvcHYyJmRvPW1vYmlsZSZyPWNyZWRpdHNob3AuY3JlZGl0bG9nIn0sIkMxNDc5MjY4MTE0MTYyIjp7InRleHQiOiJcdTUxNTFcdTYzNjJcdThiYjBcdTVmNTUiLCJpY29uY2xhc3MiOiJpY29uLWxpc3QiLCJ0ZXh0Y29sb3IiOiIjNjY2NjY2IiwiaWNvbmNvbG9yIjoiIzY2NjY2NiIsImxpbmt1cmwiOiIuXC9pbmRleC5waHA/aT0xMiZjPWVudHJ5Jm09ZXdlaV9zaG9wdjImZG89bW9iaWxlJnI9Y3JlZGl0c2hvcC5sb2cifX0sImlkIjoibWVudTIifSwiTTE0NzkyOTA3OTU0MjciOnsicGFyYW1zIjp7InBsYWNlaG9sZGVyIjoiXHU4YmY3XHU4ZjkzXHU1MTY1XHU1MTczXHU5NTJlXHU1YjU3XHU4ZmRiXHU4ODRjXHU2NDFjXHU3ZDIyIiwiZ29vZHN0eXBlIjoiMSJ9LCJzdHlsZSI6eyJpbnB1dGJhY2tncm91bmQiOiIjZmZmZmZmIiwiYmFja2dyb3VuZCI6IiNmMWYxZjIiLCJpY29uY29sb3IiOiIjYjRiNGI0IiwiY29sb3IiOiIjOTk5OTk5IiwicGFkZGluZ3RvcCI6IjYiLCJwYWRkaW5nbGVmdCI6IjEwIiwidGV4dGFsaWduIjoibGVmdCIsInNlYXJjaHN0eWxlIjoiIn0sImlkIjoic2VhcmNoIn0sIk0xNDc5NTQ0NjE5NDQwIjp7InN0eWxlIjp7ImhlaWdodCI6IjEwIiwiYmFja2dyb3VuZCI6IiNmYWZhZmEifSwiaWQiOiJibGFuayJ9LCJNMTQ3OTI2MTA3NjMzMyI6eyJzdHlsZSI6eyJuYXZzdHlsZSI6IiIsImJhY2tncm91bmQiOiIjZmZmZmZmIiwicm93bnVtIjoiNCIsInNob3d0eXBlIjoiMCIsInNob3dkb3QiOiIxIiwicGFnZW51bSI6IjgifSwiZGF0YSI6eyJDMTQ3OTI2MTA3NjMzMyI6eyJpbWd1cmwiOiJodHRwOlwvXC9vZjZvZGhkcTEuYmt0LmNsb3VkZG4uY29tXC9mNGM0ZWZlNjEwMzJiNGE5N2VjYTAzNWM3ZTcyNTA2OC5wbmciLCJsaW5rdXJsIjoiIiwidGV4dCI6Ilx1NzNiMFx1OTFkMVx1N2VhMlx1NTMwNSIsImNvbG9yIjoiIzY2NjY2NiJ9LCJDMTQ3OTI2MTA3NjMzNCI6eyJpbWd1cmwiOiJodHRwOlwvXC9vZjZvZGhkcTEuYmt0LmNsb3VkZG4uY29tXC83MTg2ZWI1NDE2OWExMzU1YTcwMjQxNjA1OGY1ODg2My5wbmciLCJsaW5rdXJsIjoiIiwidGV4dCI6Ilx1N2NiZVx1N2Y4ZVx1NWI5ZVx1NzI2OSIsImNvbG9yIjoiIzY2NjY2NiJ9LCJDMTQ3OTI2MTA3NjMzNSI6eyJpbWd1cmwiOiJodHRwOlwvXC9vZjZvZGhkcTEuYmt0LmNsb3VkZG4uY29tXC85NzFhODQxYzI1NzdlZDlhYjQyNDJlOTkxZjU5YWE1My5wbmciLCJsaW5rdXJsIjoiIiwidGV4dCI6Ilx1NGYxOFx1NjBlMFx1NTIzOCIsImNvbG9yIjoiIzY2NjY2NiJ9LCJDMTQ3OTI2MTA3NjMzNiI6eyJpbWd1cmwiOiJodHRwOlwvXC9vZjZvZGhkcTEuYmt0LmNsb3VkZG4uY29tXC80NWE3NDYwOTRlOWM5NmY2ZTY5Njg0OWFlNmYxMDFhZS5wbmciLCJsaW5rdXJsIjoiIiwidGV4dCI6Ilx1NGY1OVx1OTg5ZFx1NTk1Nlx1NTJiMSIsImNvbG9yIjoiIzY2NjY2NiJ9fSwiaWQiOiJtZW51In0sIk0xNDc5MjYxNDUwNzM0Ijp7InN0eWxlIjp7Im1hcmdpbnRvcCI6IjEwIiwiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJpY29uY29sb3IiOiIjOTk5OTk5IiwidGV4dGNvbG9yIjoiIzMzMzMzMyIsInJlbWFya2NvbG9yIjoiIzg4ODg4OCJ9LCJkYXRhIjp7IkMxNDc5MjYxNDUwNzM0Ijp7InRleHQiOiJcdTdjYmVcdTdmOGVcdTViOWVcdTcyNjlcdTYyYmRcdTU5NTYiLCJsaW5rdXJsIjoiIiwiaWNvbmNsYXNzIjoiaWNvbi1naWZ0cyIsInJlbWFyayI6Ilx1NjZmNFx1NTkxYSIsImRvdG51bSI6IiJ9fSwiaWQiOiJsaXN0bWVudSJ9LCJNMTQ3OTU0Mzc4MTg2NyI6eyJwYXJhbXMiOnsiZ29vZHN0eXBlIjoiMSIsInNob3d0aXRsZSI6IjEiLCJzaG93cHJpY2UiOiIxIiwic2hvd3RhZyI6IjIiLCJnb29kc2RhdGEiOiI1IiwiY2F0ZWlkIjoiIiwiY2F0ZW5hbWUiOiIiLCJncm91cGlkIjoiIiwiZ3JvdXBuYW1lIjoiIiwiZ29vZHNzb3J0IjoiMCIsImdvb2RzbnVtIjoiNiIsInNob3dpY29uIjoiMSIsImljb25wb3NpdGlvbiI6ImxlZnQgdG9wIiwicHJvZHVjdHByaWNlIjoiMSIsImdvb2Rzc2Nyb2xsIjoiMSJ9LCJzdHlsZSI6eyJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImxpc3RzdHlsZSI6ImJsb2NrIiwiYnV5c3R5bGUiOiJidXlidG4tMSIsImdvb2RzaWNvbiI6InJlY29tbWFuZCIsInByaWNlY29sb3IiOiIjZWQyODIyIiwiaWNvbnBhZGRpbmd0b3AiOiIwIiwiaWNvbnBhZGRpbmdsZWZ0IjoiMCIsImJ1eWJ0bmNvbG9yIjoiI2ZlNTQ1NSIsImljb256b29tIjoiMTAwIiwidGl0bGVjb2xvciI6IiMyNjI2MjYiLCJ0YWdiYWNrZ3JvdW5kIjoiI2ZlNTQ1NSJ9LCJkYXRhIjp7IkMxNDc5NTQzNzgxODY3Ijp7InRodW1iIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2dvb2RzLTEuanBnIiwicHJpY2UiOiIyMC4wMCIsInRpdGxlIjoiXHU4ZmQ5XHU5MWNjXHU2NjJmXHU1NTQ2XHU1NGMxXHU2ODA3XHU5ODk4IiwiZ2lkIjoiIiwiYmFyZ2FpbiI6IjAiLCJjcmVkaXQiOiIwIiwiY3R5cGUiOiIxIn0sIkMxNDc5NTQzNzgxODY4Ijp7InRodW1iIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2dvb2RzLTIuanBnIiwicHJpY2UiOiIyMC4wMCIsInRpdGxlIjoiXHU4ZmQ5XHU5MWNjXHU2NjJmXHU1NTQ2XHU1NGMxXHU2ODA3XHU5ODk4IiwiZ2lkIjoiIiwiYmFyZ2FpbiI6IjAiLCJjcmVkaXQiOiIwIiwiY3R5cGUiOiIxIn0sIkMxNDc5NTQzNzgxODY5Ijp7InRodW1iIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2dvb2RzLTMuanBnIiwicHJpY2UiOiIyMC4wMCIsInRpdGxlIjoiXHU4ZmQ5XHU5MWNjXHU2NjJmXHU1NTQ2XHU1NGMxXHU2ODA3XHU5ODk4IiwiZ2lkIjoiIiwiYmFyZ2FpbiI6IjAiLCJjcmVkaXQiOiIwIiwiY3R5cGUiOiIwIn0sIkMxNDc5NTQzNzgxODcwIjp7InRodW1iIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2dvb2RzLTQuanBnIiwicHJpY2UiOiIyMC4wMCIsInRpdGxlIjoiXHU4ZmQ5XHU5MWNjXHU2NjJmXHU1NTQ2XHU1NGMxXHU2ODA3XHU5ODk4IiwiZ2lkIjoiIiwiYmFyZ2FpbiI6IjAiLCJjcmVkaXQiOiIwIiwiY3R5cGUiOiIwIn19LCJpZCI6Imdvb2RzIn0sIk0xNDc5MjYxNTk0MDc3Ijp7InN0eWxlIjp7Im1hcmdpbnRvcCI6IjEwIiwiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJpY29uY29sb3IiOiIjOTk5OTk5IiwidGV4dGNvbG9yIjoiIzMzMzMzMyIsInJlbWFya2NvbG9yIjoiIzg4ODg4OCJ9LCJkYXRhIjp7IkMxNDc5MjYxNTk0MDc3Ijp7InRleHQiOiJcdTU1NDZcdTU3Y2VcdTRmMThcdTYwZTBcdTUyMzgiLCJsaW5rdXJsIjoiIiwiaWNvbmNsYXNzIjoiaWNvbi1naWZ0cyIsInJlbWFyayI6Ilx1NjZmNFx1NTkxYSIsImRvdG51bSI6IiJ9fSwiaWQiOiJsaXN0bWVudSJ9LCJNMTQ3OTI2MTY1NTkxOSI6eyJwYXJhbXMiOnsic2hvd3RpdGxlIjoiMSIsInNob3dwcmljZSI6IjEiLCJnb29kc2RhdGEiOiIxIiwiY2F0ZWlkIjoiOTAiLCJjYXRlbmFtZSI6Ilx1NmQ0Ylx1OGJkNVx1NTIwNlx1N2M3YjAxMCIsImdyb3VwaWQiOiIiLCJncm91cG5hbWUiOiIiLCJnb29kc3NvcnQiOiIwIiwiZ29vZHNudW0iOiI2Iiwic2hvd2ljb24iOiIxIiwiaWNvbnBvc2l0aW9uIjoibGVmdCB0b3AiLCJnb29kc3R5cGUiOiIxIiwiZ29vZHNzY3JvbGwiOiIwIn0sInN0eWxlIjp7Imxpc3RzdHlsZSI6IiIsImJ1eXN0eWxlIjoiYnV5YnRuLTEiLCJnb29kc2ljb24iOiJyZWNvbW1hbmQiLCJwcmljZWNvbG9yIjoiI2VkMjgyMiIsImljb25wYWRkaW5ndG9wIjoiMCIsImljb25wYWRkaW5nbGVmdCI6IjAiLCJidXlidG5jb2xvciI6IiNmZTU0NTUiLCJpY29uem9vbSI6IjEwMCIsInRpdGxlY29sb3IiOiIjMjYyNjI2In0sImRhdGEiOnsiQzE0NzkyNjE2NTU5MTkiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtMS5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIiLCJiYXJnYWluIjoiMCJ9LCJDMTQ3OTI2MTY1NTkyMCI6eyJ0aHVtYiI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvaW1hZ2VzXC9kZWZhdWx0XC9nb29kcy0yLmpwZyIsInByaWNlIjoiMjAuMDAiLCJ0aXRsZSI6Ilx1OGZkOVx1OTFjY1x1NjYyZlx1NTU0Nlx1NTRjMVx1NjgwN1x1OTg5OCIsImdpZCI6IiIsImJhcmdhaW4iOiIwIn0sIkMxNDc5MjYxNjU1OTIxIjp7InRodW1iIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2dvb2RzLTMuanBnIiwicHJpY2UiOiIyMC4wMCIsInRpdGxlIjoiXHU4ZmQ5XHU5MWNjXHU2NjJmXHU1NTQ2XHU1NGMxXHU2ODA3XHU5ODk4IiwiZ2lkIjoiIiwiYmFyZ2FpbiI6IjAifSwiQzE0NzkyNjE2NTU5MjIiOnsidGh1bWIiOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvZ29vZHMtNC5qcGciLCJwcmljZSI6IjIwLjAwIiwidGl0bGUiOiJcdThmZDlcdTkxY2NcdTY2MmZcdTU1NDZcdTU0YzFcdTY4MDdcdTk4OTgiLCJnaWQiOiIiLCJiYXJnYWluIjoiMCJ9fSwiaWQiOiJnb29kcyJ9fX0=', '../addons/ewei_shopv2/plugin/diypage/static/template/creditshop/preview.png', 13, 0, 0, 0),
(14, 0, 8, '兑换中心', 'eyJwYWdlIjp7InR5cGUiOiI4IiwidGl0bGUiOiJcdTUxNTFcdTYzNjJcdTRlMmRcdTVmYzMiLCJuYW1lIjoiXHU1MTUxXHU2MzYyXHU0ZTJkXHU1ZmMzXHU2YTIxXHU2NzdmIiwiZGVzYyI6IiIsImljb24iOiIiLCJrZXl3b3JkIjoiIiwiYmFja2dyb3VuZCI6IiNmYWZhZmEiLCJkaXltZW51IjoiLTEiLCJkaXlsYXllciI6IjAiLCJkaXlnb3RvcCI6IjAiLCJmb2xsb3diYXIiOiIwIiwidmlzaXQiOiIwIiwidmlzaXRsZXZlbCI6eyJtZW1iZXIiOiIiLCJjb21taXNzaW9uIjoiIn0sIm5vdmlzaXQiOnsidGl0bGUiOiIiLCJsaW5rIjoiIn19LCJpdGVtcyI6eyJNMTQ4MjM3Mjk0MjA3NSI6eyJtYXgiOiIxIiwidHlwZSI6IjgiLCJwYXJhbXMiOnsiZGF0YXR5cGUiOiIwIn0sInN0eWxlIjp7ImRvdHN0eWxlIjoicm91bmQiLCJkb3RhbGlnbiI6ImNlbnRlciIsImJhY2tncm91bmQiOiIjZmZmZmZmIiwibGVmdHJpZ2h0IjoiNSIsImJvdHRvbSI6IjUiLCJvcGFjaXR5IjoiMC44In0sImRhdGEiOnsiQzE0ODIzNzI5NDIwNzUiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2Jhbm5lci0xLmpwZyIsImxpbmt1cmwiOiIifSwiQzE0ODIzNzI5NDIwNzYiOnsiaW1ndXJsIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2Jhbm5lci0yLmpwZyIsImxpbmt1cmwiOiIifX0sImlkIjoiZXhjaGFuZ2VfYmFubmVyIn0sIk0xNDgyMzcyOTQyNTE1Ijp7Im1heCI6IjEiLCJ0eXBlIjoiOCIsInBhcmFtcyI6eyJwcmV2aWV3IjoiMCIsInRpdGxlIjoiXHU1MTUxXHU2MzYyXHU3ODAxXHU1MTUxXHU2MzYyIiwicGxhY2Vob2xkZXIiOiJcdThiZjdcdThmOTNcdTUxNjVcdTUxNTFcdTYzNjJcdTc4MDEiLCJidG50ZXh0IjoiXHU3YWNiXHU1MzczXHU1MTUxXHU2MzYyIiwiYmFja2J0biI6Ilx1OGZkNFx1NTZkZVx1OTFjZFx1NjViMFx1OGY5M1x1NTE2NVx1NTE1MVx1NjM2Mlx1NzgwMSIsImV4YnRudGV4dCI6Ilx1NTE1MVx1NjM2MiIsImV4YnRuMnRleHQiOiJcdTVkZjJcdTUxNTFcdTYzNjIiLCJjcmVkaXRpY29uIjoiLi5cL2FkZG9uc1wvZXdlaV9zaG9wdjJcL3BsdWdpblwvZGl5cGFnZVwvc3RhdGljXC9pbWFnZXNcL2RlZmF1bHRcL2ljb25fY3JlZGl0LnBuZyIsIm1vbmV5aWNvbiI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvaW1hZ2VzXC9kZWZhdWx0XC9pY29uX21vbmV5LnBuZyIsImNvdXBvbmljb24iOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvaWNvbl9jb3Vwb24ucG5nIiwicmVkYmFnaWNvbiI6Ii4uXC9hZGRvbnNcL2V3ZWlfc2hvcHYyXC9wbHVnaW5cL2RpeXBhZ2VcL3N0YXRpY1wvaW1hZ2VzXC9kZWZhdWx0XC9pY29uX3JlZGJhZy5wbmciLCJnb29kc2ljb24iOiIuLlwvYWRkb25zXC9ld2VpX3Nob3B2MlwvcGx1Z2luXC9kaXlwYWdlXC9zdGF0aWNcL2ltYWdlc1wvZGVmYXVsdFwvaWNvbl9nb29kcy5wbmcifSwic3R5bGUiOnsidGl0bGVjb2xvciI6IiM0NDQ0NDQiLCJidG5jb2xvciI6IiNmZmZmZmYiLCJidG5iYWNrZ3JvdW5kIjoiI2VkNTU2NSIsImlucHV0Y29sb3IiOiIjNjY2NjY2IiwiaW5wdXRiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImlucHV0Ym9yZGVyIjoiI2VmZWZlZiIsImNvZGVjb2xvciI6IiM0NDQ0NDQiLCJudW1jb2xvciI6IiM5OTk5OTkiLCJleGJ0bmNvbG9yIjoiI2ZmZmZmZiIsImV4YnRuYmFja2dyb3VuZCI6IiNlZDU1NjUiLCJleGJ0bjJjb2xvciI6IiNmZmZmZmYiLCJleGJ0bjJiYWNrZ3JvdW5kIjoiI2NjY2NjYyIsImJhY2tidG5jb2xvciI6IiM0NDQ0NDQiLCJiYWNrYnRuYm9yZGVyIjoiI2U3ZWFlYyIsImJhY2tidG5iYWNrZ3JvdW5kIjoiI2Y3ZjdmNyIsImdvb2RzdGl0bGUiOiIjNDQ0NDQ0IiwiZ29vZHNwcmljZSI6IiNhYWFhYWEifSwiaWQiOiJleGNoYW5nZV9pbnB1dCJ9LCJNMTQ4MjM3Mjk0MzE3MyI6eyJtYXgiOiIxIiwidHlwZSI6IjgiLCJwYXJhbXMiOnsicnVsZXRpdGxlIjoiXHU1MTUxXHU2MzYyXHU4OWM0XHU1MjE5In0sInN0eWxlIjp7InJ1bGV0aXRsZWNvbG9yIjoiIzU1NTU1NSJ9LCJpZCI6ImV4Y2hhbmdlX3J1bGUifX19', '../addons/ewei_shopv2/plugin/diypage/static/template/exchange/preview.png', 14, 0, 0, 0),
(15, 0, 4, '分销中心02', 'eyJwYWdlIjp7InR5cGUiOiI0IiwidGl0bGUiOiJcdTUyMDZcdTk1MDBcdTRlMmRcdTVmYzMiLCJuYW1lIjoiXHU1MjA2XHU5NTAwXHU0ZTJkXHU1ZmMzIiwiZGVzYyI6IiIsImljb24iOiIiLCJrZXl3b3JkIjoiIiwiYmFja2dyb3VuZCI6IiNmM2YzZjMiLCJkaXltZW51IjoiLTEiLCJmb2xsb3diYXIiOiIwIiwidmlzaXQiOiIwIiwidmlzaXRsZXZlbCI6eyJtZW1iZXIiOiIiLCJjb21taXNzaW9uIjoiIn0sIm5vdmlzaXQiOnsidGl0bGUiOiIiLCJsaW5rIjoiIn19LCJpdGVtcyI6eyJNMTQ3NTk3NjIxMDU0NiI6eyJwYXJhbXMiOnsic3R5bGUiOiJkZWZhdWx0MyIsInNldGljb24iOiJpY29uLXNldHRpbmdzIiwic2V0bGluayI6Ii5cL2luZGV4LnBocD9pPTEyJmM9ZW50cnkmbT1ld2VpX3Nob3B2MiZkbz1tb2JpbGUmcj1nb29kcyZpc3RpbWU9MSIsImxlZnRuYXYiOiJcdTYzZDBcdTczYjAxIiwibGVmdG5hdmxpbmsiOiIiLCJyaWdodG5hdiI6Ilx1NjNkMFx1NzNiMDIiLCJyaWdodG5hdmxpbmsiOiIiLCJjZW50ZXJuYXYiOiJcdTYzZDBcdTczYjAiLCJjZW50ZXJuYXZsaW5rIjoiIiwiaGlkZXVwIjoiMCJ9LCJzdHlsZSI6eyJiYWNrZ3JvdW5kIjoiI2ZlYTIzZCIsInRleHRjb2xvciI6IiNmZmZmZmYiLCJ0ZXh0bGlnaHQiOiIjZmZmZmZmIn0sImlkIjoibWVtYmVyYyJ9LCJNMTUyNjYyMTY5MzUxNyI6eyJzdHlsZSI6eyJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsInRleHRjb2xvciI6IiMwMDAwMDAiLCJpY29uY29sb3IiOiIjZmY4MDAwIn0sInBhcmFtcyI6eyJpY29uY2xhc3MiOiJpY29uLWxpbmsifSwidHlwZSI6IjQiLCJpZCI6ImNvbW1pc3Npb25fc2hhcmVjb2RlIn0sIk0xNTI2ODcwNDk3MjQwIjp7InN0eWxlIjp7ImJhY2tncm91bmQiOiIjZmZmZmZmIiwicHJpY2Vjb2xvciI6IiNmZjgwMDAiLCJ0ZXh0Y29sb3IiOiIjMDAwMDAwIiwiYnRuY29sb3IiOiIjZmY4MDAwIn0sInR5cGUiOiI0IiwibWF4IjoiMSIsImlkIjoiY29tbWlzc2lvbl9ibG9jayJ9LCJNMTUyNjYxNTc2ODY3MiI6eyJzdHlsZSI6eyJoZWlnaHQiOiIxMCIsImJhY2tncm91bmQiOiIjZjNmM2YzIn0sImlkIjoiYmxhbmsifSwiTTE0NzU5NzYyMTIzMDUiOnsicGFyYW1zIjp7InJvd251bSI6IjIiLCJuZXdzdHlsZSI6IjEifSwic3R5bGUiOnsiYmFja2dyb3VuZCI6IiNmZmZmZmYiLCJ0aXBjb2xvciI6IiNmZWIzMTIifSwiZGF0YSI6eyJDMTQ3NTk3NjIxMjMwNSI6eyJpY29uY2xhc3MiOiJpY29uLXFpYW4iLCJpY29uY29sb3IiOiIjZmViMzEyIiwidGV4dCI6Ilx1NTIwNlx1OTUwMFx1NGY2M1x1OTFkMSIsInRleHRjb2xvciI6IiM2NjY2NjYiLCJsaW5rdXJsIjoiLlwvaW5kZXgucGhwP2k9MTImYz1lbnRyeSZtPWV3ZWlfc2hvcHYyJmRvPW1vYmlsZSZyPWNvbW1pc3Npb24ud2l0aGRyYXciLCJ0aXBudW0iOiIwLjAwIiwidGlwdGV4dCI6Ilx1NTE0MyJ9LCJDMTQ3NTk3NjIxMjMwNiI6eyJpY29uY2xhc3MiOiJpY29uLWRpbmdkYW4yIiwiaWNvbmNvbG9yIjoiIzUwYjZmZSIsInRleHQiOiJcdTRmNjNcdTkxZDFcdTY2MGVcdTdlYzYiLCJ0ZXh0Y29sb3IiOiIjNjY2NjY2IiwibGlua3VybCI6IiIsInRpcG51bSI6IjUwIiwidGlwdGV4dCI6Ilx1N2IxNCJ9LCJDMTQ3NTk3NjIxMjMwOCI6eyJpY29uY2xhc3MiOiJpY29uLXRpeGlhbjEiLCJpY29uY29sb3IiOiIjZmY3NDFkIiwidGV4dCI6Ilx1NjNkMFx1NzNiMFx1NjYwZVx1N2VjNiIsInRleHRjb2xvciI6IiM2NjY2NjYiLCJsaW5rdXJsIjoiIiwidGlwbnVtIjoiMTAiLCJ0aXB0ZXh0IjoiXHU3YjE0In0sIkMxNDc1OTc2MjEyMzA5Ijp7Imljb25jbGFzcyI6Imljb24taGVpbG9uZ2ppYW5ndHViaWFvMTEiLCJpY29uY29sb3IiOiIjZmY3NDFkIiwidGV4dCI6Ilx1NjIxMVx1NzY4NFx1NGUwYlx1N2ViZiIsInRleHRjb2xvciI6IiM2NjY2NjYiLCJsaW5rdXJsIjoiIiwidGlwbnVtIjoiMiIsInRpcHRleHQiOiJcdTRlYmEifX0sImlkIjoiYmxvY2tncm91cCJ9LCJNMTUyNjYxNDU1MzE1MSI6eyJzdHlsZSI6eyJtYXJnaW50b3AiOiIxMCIsImJhY2tncm91bmQiOiIjZmZmZmZmIiwiaWNvbmNvbG9yIjoiI2ZmODAwMCIsInRleHRjb2xvciI6IiMwMDAwMDAiLCJyZW1hcmtjb2xvciI6IiM4ODg4ODgifSwiZGF0YSI6eyJDMTUyNjYxNDU1MzE1MiI6eyJ0ZXh0IjoiXHU2M2E4XHU1ZTdmXHU0ZThjXHU3ZWY0XHU3ODAxIiwibGlua3VybCI6IiIsImljb25jbGFzcyI6Imljb24tZXJ3ZWltYTEiLCJyZW1hcmsiOiIiLCJkb3RudW0iOiIifX0sImlkIjoibGlzdG1lbnUifSwiTTE1MjY2MTQ1NzUyMTIiOnsic3R5bGUiOnsibWFyZ2ludG9wIjoiMTAiLCJiYWNrZ3JvdW5kIjoiI2ZmZmZmZiIsImljb25jb2xvciI6IiNmZjgwMDAiLCJ0ZXh0Y29sb3IiOiIjMDAwMDAwIiwicmVtYXJrY29sb3IiOiIjODg4ODg4In0sImRhdGEiOnsiQzE1MjY2MTQ1NzUyMTIiOnsidGV4dCI6Ilx1NWMwZlx1NWU5N1x1OGJiZVx1N2Y2ZSIsImxpbmt1cmwiOiIiLCJpY29uY2xhc3MiOiJpY29uLXNob3AiLCJyZW1hcmsiOiIiLCJkb3RudW0iOiIifX0sImlkIjoibGlzdG1lbnUifX19', '../addons/ewei_shopv2/plugin/diypage/static/template/commission2/preview.jpg', 15, 0, 0, 0);

DROP TABLE IF EXISTS `ims_ewei_shop_diypage_template_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_diypage_template_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `merch` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_exchange_cart`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_exchange_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `openid` varchar(100) DEFAULT NULL,
  `goodsid` int(11) DEFAULT NULL,
  `total` int(10) DEFAULT '1',
  `marketprice` decimal(10,2) DEFAULT NULL,
  `optionid` int(11) DEFAULT NULL,
  `selected` tinyint(1) DEFAULT '1',
  `deleted` tinyint(1) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  `serial` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_exchange_code`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_exchange_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) NOT NULL DEFAULT '0',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `endtime` datetime NOT NULL DEFAULT '2016-10-01 00:00:00',
  `status` int(2) NOT NULL DEFAULT '1',
  `openid` varchar(255) NOT NULL DEFAULT '',
  `count` int(11) NOT NULL DEFAULT '0',
  `key` varchar(255) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT '0',
  `scene` int(11) NOT NULL DEFAULT '0',
  `qrcode_url` varchar(255) NOT NULL DEFAULT '',
  `serial` varchar(255) NOT NULL DEFAULT '',
  `balancestatus` int(11) DEFAULT '1',
  `redstatus` int(11) DEFAULT '1',
  `scorestatus` int(11) DEFAULT '1',
  `couponstatus` int(11) DEFAULT '1',
  `goodsstatus` int(11) DEFAULT NULL,
  `repeatcount` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`,`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_exchange_group`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_exchange_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `type` int(2) NOT NULL DEFAULT '0',
  `endtime` datetime NOT NULL DEFAULT '2016-10-01 00:00:00',
  `mode` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0',
  `max` int(2) NOT NULL DEFAULT '0',
  `value` decimal(10,2) NOT NULL DEFAULT '0.00',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `starttime` datetime NOT NULL DEFAULT '2016-10-01 00:00:00',
  `goods` text,
  `score` int(11) NOT NULL DEFAULT '0',
  `coupon` text,
  `use` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `red` decimal(10,2) NOT NULL DEFAULT '0.00',
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `balance_left` decimal(10,2) NOT NULL DEFAULT '0.00',
  `balance_right` decimal(10,2) NOT NULL DEFAULT '0.00',
  `red_left` decimal(10,2) NOT NULL DEFAULT '0.00',
  `red_right` decimal(10,2) NOT NULL DEFAULT '0.00',
  `score_left` int(11) NOT NULL DEFAULT '0',
  `score_right` int(11) NOT NULL DEFAULT '0',
  `balance_type` int(11) NOT NULL,
  `red_type` int(11) NOT NULL,
  `score_type` int(11) NOT NULL,
  `title_reply` varchar(255) NOT NULL DEFAULT '',
  `img` varchar(255) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '',
  `rule` text NOT NULL,
  `coupon_type` varchar(255) DEFAULT NULL,
  `basic_content` varchar(500) NOT NULL DEFAULT '',
  `reply_type` int(11) NOT NULL DEFAULT '0',
  `code_type` int(11) NOT NULL DEFAULT '0',
  `binding` int(11) NOT NULL DEFAULT '0',
  `showcount` int(11) DEFAULT '0',
  `postage` decimal(10,2) DEFAULT '0.00',
  `postage_type` int(11) DEFAULT '0',
  `banner` varchar(800) DEFAULT '',
  `keyword_reply` int(11) DEFAULT '0',
  `reply_status` int(11) DEFAULT '1',
  `reply_keyword` varchar(255) DEFAULT '',
  `input_banner` varchar(255) DEFAULT '',
  `diypage` int(11) NOT NULL DEFAULT '0',
  `sendname` varchar(255) DEFAULT '',
  `wishing` varchar(255) DEFAULT '',
  `actname` varchar(255) DEFAULT '',
  `remark` varchar(255) DEFAULT '',
  `repeat` tinyint(1) NOT NULL DEFAULT '0',
  `koulingstart` varchar(255) NOT NULL DEFAULT '',
  `koulingend` varchar(255) NOT NULL DEFAULT '',
  `kouling` tinyint(1) NOT NULL DEFAULT '0',
  `chufa` varchar(255) NOT NULL DEFAULT '',
  `chufaend` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_exchange_query`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_exchange_query` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(255) NOT NULL DEFAULT '',
  `querykey` varchar(255) NOT NULL DEFAULT '',
  `querytime` int(11) NOT NULL DEFAULT '0',
  `unfreeze` int(11) NOT NULL DEFAULT '0',
  `errorcount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_exchange_record`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_exchange_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL DEFAULT '',
  `uniacid` int(11) DEFAULT NULL,
  `goods` text,
  `orderid` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL,
  `openid` varchar(255) NOT NULL DEFAULT '',
  `mode` int(11) NOT NULL DEFAULT '0',
  `balance` decimal(10,2) DEFAULT '0.00',
  `red` decimal(10,2) NOT NULL DEFAULT '0.00',
  `coupon` text,
  `score` int(11) NOT NULL DEFAULT '0',
  `nickname` varchar(255) NOT NULL DEFAULT '',
  `groupid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `serial` varchar(255) NOT NULL DEFAULT '',
  `ordersn` varchar(255) NOT NULL DEFAULT '',
  `goods_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_exchange_setting`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_exchange_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `freeze` int(11) NOT NULL DEFAULT '0',
  `mistake` int(11) NOT NULL DEFAULT '0',
  `grouplimit` int(11) NOT NULL DEFAULT '0',
  `alllimit` int(11) NOT NULL DEFAULT '0',
  `no_qrimg` tinyint(3) NOT NULL DEFAULT '1',
  `rule` text NOT NULL,
  PRIMARY KEY (`id`,`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_exhelper_esheet`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_exhelper_esheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `express` varchar(50) DEFAULT '',
  `code` varchar(20) NOT NULL DEFAULT '',
  `datas` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=24 ;

INSERT INTO `ims_ewei_shop_exhelper_esheet` (`id`, `name`, `express`, `code`, `datas`) VALUES
(1, '顺丰', 'shunfeng', 'SF', 'a:2:{i:0;a:4:{s:5:"style";s:9:"二联150";s:4:"spec";s:33:"（宽100mm高150mm切点90/60）";s:4:"size";s:3:"150";s:9:"isdefault";i:1;}i:1;a:4:{s:5:"style";s:9:"三联210";s:4:"spec";s:38:"（宽100mm 高210mm 切点90/60/60）";s:4:"size";s:3:"210";s:9:"isdefault";i:0;}}'),
(2, '百世快递', 'huitongkuaidi', 'HTKY', 'a:2:{i:0;a:4:{s:5:"style";s:9:"二联180";s:4:"spec";s:34:"（宽100mm高180mm切点110/70）";s:4:"size";s:3:"180";s:9:"isdefault";i:0;}i:1;a:4:{s:5:"style";s:9:"二联183";s:4:"spec";s:37:"（宽100mm 高183mm 切点87/5/91）";s:4:"size";s:3:"183";s:9:"isdefault";i:1;}}'),
(3, '韵达', 'yunda', 'YD', 'a:2:{i:0;a:4:{s:5:"style";s:9:"二联180";s:4:"spec";s:34:"（宽100mm高180mm切点110/70）";s:4:"size";s:3:"180";s:9:"isdefault";i:0;}i:1;a:4:{s:5:"style";s:9:"二联203";s:4:"spec";s:36:"（宽100mm 高203mm 切点152/51）";s:4:"size";s:3:"203";s:9:"isdefault";i:1;}}'),
(4, '申通', 'shentong', 'STO', 'a:2:{i:0;a:4:{s:5:"style";s:9:"二联180";s:4:"spec";s:34:"（宽100mm高180mm切点110/70）";s:4:"size";s:3:"180";s:9:"isdefault";i:1;}i:1;a:4:{s:5:"style";s:9:"二联150";s:4:"spec";s:35:"（宽100mm 高150mm 切点90/60）";s:4:"size";s:3:"150";s:9:"isdefault";i:0;}}'),
(5, '圆通', 'yuantong', 'YTO', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联180";s:4:"spec";s:34:"（宽100mm高180mm切点110/70）";s:4:"size";s:3:"180";s:9:"isdefault";i:1;}}'),
(6, 'EMS', 'ems', 'EMS', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联150";s:4:"spec";s:33:"（宽100mm高150mm切点90/60）";s:4:"size";s:3:"150";s:9:"isdefault";i:1;}}'),
(7, '中通', 'zhongtong', 'ZTO', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联180";s:4:"spec";s:34:"（宽100mm高180mm切点110/70）";s:4:"size";s:3:"180";s:9:"isdefault";i:1;}}'),
(8, '德邦', 'debangwuliu', 'DBL', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联177";s:4:"spec";s:34:"（宽100mm高177mm切点107/70）";s:4:"size";s:3:"177";s:9:"isdefault";i:1;}}'),
(9, '优速', 'youshuwuliu', 'UC', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联180";s:4:"spec";s:34:"（宽100mm高180mm切点110/70）";s:4:"size";s:3:"180";s:9:"isdefault";i:1;}}'),
(10, '宅急送', 'zhaijisong', 'ZJS', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联120";s:4:"spec";s:33:"（宽100mm高116mm切点98/10）";s:4:"size";s:3:"120";s:9:"isdefault";i:1;}}'),
(11, '京东', 'jd', 'JD', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联110";s:4:"spec";s:33:"（宽100mm高110mm切点60/50）";s:4:"size";s:3:"110";s:9:"isdefault";i:1;}}'),
(12, '信丰', 'xinfengwuliu', 'XFEX', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联150";s:4:"spec";s:33:"（宽100mm高150mm切点90/60）";s:4:"size";s:3:"150";s:9:"isdefault";i:1;}}'),
(13, '全峰', 'quanfengkuaidi', 'QFKD', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联180";s:4:"spec";s:34:"（宽100mm高180mm切点110/70）";s:4:"size";s:3:"180";s:9:"isdefault";i:1;}}'),
(14, '跨越速运', 'kuayue', 'KYSY', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联137";s:4:"spec";s:34:"（宽100mm高137mm切点101/36）";s:4:"size";s:3:"137";s:9:"isdefault";i:1;}}'),
(15, '安能', 'annengwuliu', 'ANE', 'a:1:{i:0;a:4:{s:5:"style";s:9:"三联180";s:4:"spec";s:37:"（宽100mm高180mm切点110/30/40）";s:4:"size";s:3:"180";s:9:"isdefault";i:1;}}'),
(16, '快捷', 'kuaijiesudi', 'FAST', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联180";s:4:"spec";s:34:"（宽100mm高180mm切点110/70）";s:4:"size";s:3:"180";s:9:"isdefault";i:1;}}'),
(17, '国通', 'guotongkuaidi', 'GTO', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联180";s:4:"spec";s:34:"（宽100mm高180mm切点110/70）";s:4:"size";s:3:"180";s:9:"isdefault";i:1;}}'),
(18, '天天', 'tiantian', 'HHTT', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联180";s:4:"spec";s:34:"（宽100mm高180mm切点110/70）";s:4:"size";s:3:"180";s:9:"isdefault";i:1;}}'),
(19, '中铁快运', 'zhongtiekuaiyun', 'ZTKY', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联150";s:4:"spec";s:33:"（宽100mm高150mm切点90/60）";s:4:"size";s:3:"150";s:9:"isdefault";i:1;}}'),
(20, '邮政快递包裹', 'youzhengguonei', 'YZPY', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联180";s:4:"spec";s:34:"（宽100mm高180mm切点110/70）";s:4:"size";s:3:"180";s:9:"isdefault";i:1;}}'),
(21, '邮政国内标快', 'youzhengguonei', 'YZBK', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联150";s:4:"spec";s:33:"（宽100mm高150mm切点90/60）";s:4:"size";s:3:"150";s:9:"isdefault";i:1;}}'),
(22, '全一快递', 'quanyikuaidi', 'UAPEX', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联150";s:4:"spec";s:32:"（宽90mm高150mm切点90/60）";s:4:"size";s:3:"150";s:9:"isdefault";i:1;}}'),
(23, '速尔快递', 'sue', 'SURE', 'a:1:{i:0;a:4:{s:5:"style";s:9:"二联150";s:4:"spec";s:33:"（宽100mm高150mm切点90/60）";s:4:"size";s:3:"150";s:9:"isdefault";i:1;}}');

DROP TABLE IF EXISTS `ims_ewei_shop_exhelper_esheet_temp`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_exhelper_esheet_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `esheetid` int(11) NOT NULL DEFAULT '0',
  `esheetname` varchar(255) NOT NULL DEFAULT '',
  `customername` varchar(50) NOT NULL DEFAULT '',
  `customerpwd` varchar(50) NOT NULL DEFAULT '',
  `monthcode` varchar(50) NOT NULL DEFAULT '',
  `sendsite` varchar(50) NOT NULL DEFAULT '',
  `paytype` tinyint(3) NOT NULL DEFAULT '1',
  `templatesize` varchar(10) NOT NULL DEFAULT '',
  `isnotice` tinyint(3) NOT NULL DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  `issend` tinyint(3) NOT NULL DEFAULT '1',
  `isdefault` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_isdefault` (`isdefault`) USING BTREE,
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_exhelper_express`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_exhelper_express` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `type` int(1) NOT NULL DEFAULT '1',
  `expressname` varchar(255) DEFAULT '',
  `expresscom` varchar(255) NOT NULL DEFAULT '',
  `express` varchar(255) NOT NULL DEFAULT '',
  `width` decimal(10,2) DEFAULT '0.00',
  `datas` text,
  `height` decimal(10,2) DEFAULT '0.00',
  `bg` varchar(255) DEFAULT '',
  `isdefault` tinyint(3) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_isdefault` (`isdefault`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_exhelper_senduser`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_exhelper_senduser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `sendername` varchar(255) DEFAULT '',
  `sendertel` varchar(255) DEFAULT '',
  `sendersign` varchar(255) DEFAULT '',
  `sendercode` int(11) DEFAULT NULL,
  `senderaddress` varchar(255) DEFAULT '',
  `sendercity` varchar(255) DEFAULT NULL,
  `isdefault` tinyint(3) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `province` varchar(30) NOT NULL DEFAULT '',
  `city` varchar(30) NOT NULL DEFAULT '',
  `area` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_isdefault` (`isdefault`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_exhelper_sys`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_exhelper_sys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(20) NOT NULL DEFAULT 'localhost',
  `port` int(11) NOT NULL DEFAULT '8000',
  `ip_cloud` varchar(255) NOT NULL DEFAULT '',
  `port_cloud` int(11) NOT NULL DEFAULT '8000',
  `is_cloud` int(1) NOT NULL DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `ebusiness` varchar(20) NOT NULL DEFAULT '',
  `apikey` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_express`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_express` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  `express` varchar(50) DEFAULT '',
  `status` tinyint(1) DEFAULT '1',
  `displayorder` tinyint(3) unsigned DEFAULT '0',
  `code` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=92 ;

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

DROP TABLE IF EXISTS `ims_ewei_shop_express_cache`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_express_cache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expresssn` varchar(50) DEFAULT NULL,
  `express` varchar(50) DEFAULT NULL,
  `lasttime` int(11) NOT NULL,
  `datas` text,
  PRIMARY KEY (`id`),
  KEY `idx_expresssn` (`expresssn`) USING BTREE,
  KEY `idx_express` (`express`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_feedback`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '0',
  `type` tinyint(1) DEFAULT '1',
  `status` tinyint(1) DEFAULT '0',
  `feedbackid` varchar(100) DEFAULT '',
  `transid` varchar(100) DEFAULT '',
  `reason` varchar(1000) DEFAULT '',
  `solution` varchar(1000) DEFAULT '',
  `remark` varchar(1000) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_feedbackid` (`feedbackid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_transid` (`transid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_form`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `isrequire` tinyint(3) DEFAULT '0',
  `key` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `type` varchar(255) DEFAULT '',
  `values` text,
  `cate` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_form_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_form_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_fullback_goods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_fullback_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(3) NOT NULL DEFAULT '0',
  `goodsid` int(11) NOT NULL DEFAULT '0',
  `titles` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `marketprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `minallfullbackallprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `maxallfullbackallprice` decimal(10,2) NOT NULL,
  `minallfullbackallratio` decimal(10,2) DEFAULT NULL,
  `maxallfullbackallratio` decimal(10,2) DEFAULT NULL,
  `day` int(11) NOT NULL DEFAULT '0',
  `fullbackprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fullbackratio` decimal(10,2) DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  `hasoption` tinyint(3) NOT NULL DEFAULT '0',
  `optionid` text NOT NULL,
  `startday` int(11) NOT NULL DEFAULT '0',
  `refund` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_fullback_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_fullback_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `orderid` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `priceevery` decimal(10,2) NOT NULL,
  `day` int(10) NOT NULL,
  `fullbackday` int(10) NOT NULL,
  `createtime` int(10) NOT NULL,
  `fullbacktime` int(10) NOT NULL,
  `isfullback` tinyint(3) NOT NULL DEFAULT '0',
  `goodsid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_funbar`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_funbar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `datas` text,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_gift`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_gift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `activity` tinyint(3) NOT NULL DEFAULT '1',
  `orderprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `goodsid` varchar(255) NOT NULL,
  `giftgoodsid` varchar(255) NOT NULL,
  `starttime` int(11) NOT NULL DEFAULT '0',
  `endtime` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  `share_title` varchar(255) NOT NULL,
  `share_icon` varchar(255) NOT NULL,
  `share_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_globonus_bill`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_globonus_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `billno` varchar(100) DEFAULT '',
  `paytype` int(11) DEFAULT '0',
  `year` int(11) DEFAULT '0',
  `month` int(11) DEFAULT '0',
  `week` int(11) DEFAULT '0',
  `ordercount` int(11) DEFAULT '0',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  `bonusmoney` decimal(10,2) DEFAULT '0.00',
  `bonusmoney_send` decimal(10,2) DEFAULT '0.00',
  `bonusmoney_pay` decimal(10,2) DEFAULT '0.00',
  `paytime` int(11) DEFAULT '0',
  `partnercount` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `starttime` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  `confirmtime` int(11) DEFAULT '0',
  `bonusordermoney` decimal(10,2) DEFAULT '0.00',
  `bonusrate` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_paytype` (`paytype`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_paytime` (`paytime`),
  KEY `idx_status` (`status`),
  KEY `idx_month` (`month`),
  KEY `idx_week` (`week`),
  KEY `idx_year` (`year`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_globonus_billo`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_globonus_billo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `billid` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_billid` (`billid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_globonus_billp`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_globonus_billp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `billid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `payno` varchar(255) DEFAULT '',
  `paytype` tinyint(3) DEFAULT '0',
  `bonus` decimal(10,2) DEFAULT '0.00',
  `money` decimal(10,2) DEFAULT '0.00',
  `realmoney` decimal(10,2) DEFAULT '0.00',
  `paymoney` decimal(10,2) DEFAULT '0.00',
  `charge` decimal(10,2) DEFAULT '0.00',
  `chargemoney` decimal(10,2) DEFAULT '0.00',
  `status` tinyint(3) DEFAULT '0',
  `reason` varchar(255) DEFAULT '',
  `paytime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_billid` (`billid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_globonus_level`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_globonus_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `levelname` varchar(50) DEFAULT '',
  `bonus` decimal(10,4) DEFAULT '0.0000',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  `ordercount` int(11) DEFAULT '0',
  `commissionmoney` decimal(10,2) DEFAULT '0.00',
  `bonusmoney` decimal(10,2) DEFAULT '0.00',
  `downcount` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

DROP TABLE IF EXISTS `ims_ewei_shop_goods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `pcate` int(11) DEFAULT '0',
  `ccate` int(11) DEFAULT '0',
  `type` tinyint(1) DEFAULT '1',
  `status` tinyint(1) DEFAULT '1',
  `displayorder` int(11) DEFAULT '0',
  `title` varchar(100) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `unit` varchar(5) DEFAULT '',
  `description` varchar(1000) DEFAULT NULL,
  `content` text,
  `goodssn` varchar(50) DEFAULT '',
  `productsn` varchar(50) DEFAULT '',
  `productprice` decimal(10,2) DEFAULT '0.00',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `costprice` decimal(10,2) DEFAULT '0.00',
  `originalprice` decimal(10,2) DEFAULT '0.00',
  `total` int(10) DEFAULT '0',
  `totalcnf` int(11) DEFAULT '0',
  `sales` int(11) DEFAULT '0',
  `salesreal` int(11) DEFAULT '0',
  `spec` varchar(5000) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `weight` decimal(10,2) DEFAULT '0.00',
  `credit` varchar(255) DEFAULT NULL,
  `maxbuy` int(11) DEFAULT '0',
  `usermaxbuy` int(11) DEFAULT '0',
  `hasoption` int(11) DEFAULT '0',
  `dispatch` int(11) DEFAULT '0',
  `thumb_url` text,
  `isnew` tinyint(1) DEFAULT '0',
  `ishot` tinyint(1) DEFAULT '0',
  `isdiscount` tinyint(1) DEFAULT '0',
  `isrecommand` tinyint(1) DEFAULT '0',
  `issendfree` tinyint(1) DEFAULT '0',
  `istime` tinyint(1) DEFAULT '0',
  `iscomment` tinyint(1) DEFAULT '0',
  `timestart` int(11) DEFAULT '0',
  `timeend` int(11) DEFAULT '0',
  `viewcount` int(11) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `hascommission` tinyint(3) DEFAULT '0',
  `commission1_rate` decimal(10,2) DEFAULT '0.00',
  `commission1_pay` decimal(10,2) DEFAULT '0.00',
  `commission2_rate` decimal(10,2) DEFAULT '0.00',
  `commission2_pay` decimal(10,2) DEFAULT '0.00',
  `commission3_rate` decimal(10,2) DEFAULT '0.00',
  `commission3_pay` decimal(10,2) DEFAULT '0.00',
  `score` decimal(10,2) DEFAULT '0.00',
  `taobaoid` varchar(255) DEFAULT '',
  `taotaoid` varchar(255) DEFAULT '',
  `taobaourl` varchar(255) DEFAULT '',
  `updatetime` int(11) DEFAULT '0',
  `share_title` varchar(255) DEFAULT '',
  `share_icon` varchar(255) DEFAULT '',
  `cash` tinyint(3) DEFAULT '0',
  `commission_thumb` varchar(255) DEFAULT '',
  `isnodiscount` tinyint(3) DEFAULT '0',
  `showlevels` text,
  `buylevels` text,
  `showgroups` text,
  `buygroups` text,
  `isverify` tinyint(3) DEFAULT '0',
  `storeids` text,
  `noticeopenid` varchar(255) DEFAULT '',
  `tcate` int(11) DEFAULT '0',
  `noticetype` text,
  `needfollow` tinyint(3) DEFAULT '0',
  `followtip` varchar(255) DEFAULT '',
  `followurl` varchar(255) DEFAULT '',
  `deduct` decimal(10,2) DEFAULT '0.00',
  `virtual` int(11) DEFAULT '0',
  `ccates` text,
  `discounts` text,
  `nocommission` tinyint(3) DEFAULT '0',
  `hidecommission` tinyint(3) DEFAULT '0',
  `pcates` text,
  `tcates` text,
  `cates` text,
  `artid` int(11) DEFAULT '0',
  `detail_logo` varchar(255) DEFAULT '',
  `detail_shopname` varchar(255) DEFAULT '',
  `detail_btntext1` varchar(255) DEFAULT '',
  `detail_btnurl1` varchar(255) DEFAULT '',
  `detail_btntext2` varchar(255) DEFAULT '',
  `detail_btnurl2` varchar(255) DEFAULT '',
  `detail_totaltitle` varchar(255) DEFAULT '',
  `saleupdate42392` tinyint(3) DEFAULT '0',
  `deduct2` decimal(10,2) DEFAULT '0.00',
  `ednum` int(11) DEFAULT '0',
  `saleupdate` tinyint(3) DEFAULT '0',
  `edmoney` decimal(10,2) DEFAULT '0.00',
  `edareas` text,
  `diyformtype` tinyint(1) DEFAULT '0',
  `diyformid` int(11) DEFAULT '0',
  `diymode` tinyint(1) DEFAULT '0',
  `dispatchtype` tinyint(1) DEFAULT '0',
  `dispatchid` int(11) DEFAULT '0',
  `dispatchprice` decimal(10,2) DEFAULT '0.00',
  `manydeduct` tinyint(1) DEFAULT '0',
  `shorttitle` varchar(255) DEFAULT '',
  `isdiscount_title` varchar(255) DEFAULT '',
  `isdiscount_time` int(11) DEFAULT '0',
  `isdiscount_discounts` text,
  `commission` text,
  `saleupdate37975` tinyint(3) DEFAULT '0',
  `shopid` int(11) DEFAULT '0',
  `allcates` text,
  `minbuy` int(11) DEFAULT '0',
  `invoice` tinyint(3) DEFAULT '0',
  `repair` tinyint(3) DEFAULT '0',
  `seven` tinyint(3) DEFAULT '0',
  `money` varchar(255) DEFAULT '',
  `minprice` decimal(10,2) DEFAULT '0.00',
  `maxprice` decimal(10,2) DEFAULT '0.00',
  `province` varchar(255) DEFAULT '',
  `city` varchar(255) DEFAULT '',
  `buyshow` tinyint(1) DEFAULT '0',
  `buycontent` text,
  `saleupdate51117` tinyint(3) DEFAULT '0',
  `virtualsend` tinyint(1) DEFAULT '0',
  `virtualsendcontent` text,
  `verifytype` tinyint(1) DEFAULT '0',
  `diyfields` text,
  `diysaveid` int(11) DEFAULT '0',
  `diysave` tinyint(1) DEFAULT '0',
  `quality` tinyint(3) DEFAULT '0',
  `groupstype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `showtotal` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `subtitle` varchar(255) DEFAULT '',
  `minpriceupdated` tinyint(1) DEFAULT '0',
  `newgoods` tinyint(3) NOT NULL DEFAULT '0',
  `video` varchar(521) NOT NULL DEFAULT '',
  `officthumb` varchar(512) DEFAULT NULL,
  `verifygoodstype` tinyint(1) NOT NULL DEFAULT '0',
  `isforceverifystore` tinyint(1) NOT NULL DEFAULT '0',
  `sharebtn` tinyint(1) NOT NULL DEFAULT '0',
  `catesinit3` text,
  `showtotaladd` tinyint(1) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `checked` tinyint(3) DEFAULT '0',
  `thumb_first` tinyint(3) DEFAULT '0',
  `merchsale` tinyint(1) DEFAULT '0',
  `keywords` varchar(255) DEFAULT '',
  `catch_id` varchar(255) DEFAULT '',
  `catch_url` varchar(255) DEFAULT '',
  `catch_source` varchar(255) DEFAULT '',
  `saleupdate40170` tinyint(3) DEFAULT '0',
  `saleupdate35843` tinyint(3) DEFAULT '0',
  `labelname` text,
  `autoreceive` int(11) DEFAULT '0',
  `cannotrefund` tinyint(3) DEFAULT '0',
  `saleupdate33219` tinyint(3) DEFAULT '0',
  `bargain` int(11) DEFAULT '0',
  `buyagain` decimal(10,2) DEFAULT '0.00',
  `buyagain_islong` tinyint(1) DEFAULT '0',
  `buyagain_condition` tinyint(1) DEFAULT '0',
  `buyagain_sale` tinyint(1) DEFAULT '0',
  `buyagain_commission` text,
  `saleupdate32484` tinyint(3) DEFAULT '0',
  `saleupdate36586` tinyint(3) DEFAULT '0',
  `diypage` int(11) DEFAULT NULL,
  `cashier` tinyint(1) DEFAULT '0',
  `saleupdate53481` tinyint(3) DEFAULT '0',
  `saleupdate30424` tinyint(3) DEFAULT '0',
  `isendtime` tinyint(3) NOT NULL DEFAULT '0',
  `usetime` int(11) NOT NULL DEFAULT '0',
  `endtime` int(11) NOT NULL DEFAULT '0',
  `merchdisplayorder` int(11) NOT NULL DEFAULT '0',
  `exchange_stock` int(11) DEFAULT '0',
  `exchange_postage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ispresell` tinyint(3) NOT NULL DEFAULT '0',
  `presellprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `presellover` tinyint(3) NOT NULL DEFAULT '0',
  `presellovertime` int(11) NOT NULL,
  `presellstart` tinyint(3) NOT NULL DEFAULT '0',
  `preselltimestart` int(11) NOT NULL DEFAULT '0',
  `presellend` tinyint(3) NOT NULL DEFAULT '0',
  `preselltimeend` int(11) NOT NULL DEFAULT '0',
  `presellsendtype` tinyint(3) NOT NULL DEFAULT '0',
  `presellsendstatrttime` int(11) NOT NULL DEFAULT '0',
  `presellsendtime` int(11) NOT NULL DEFAULT '0',
  `edareas_code` text NOT NULL,
  `unite_total` tinyint(3) NOT NULL DEFAULT '0',
  `buyagain_price` decimal(10,2) DEFAULT '0.00',
  `threen` varchar(255) DEFAULT '',
  `intervalfloor` tinyint(1) DEFAULT '0',
  `intervalprice` varchar(512) DEFAULT '',
  `isfullback` tinyint(3) NOT NULL DEFAULT '0',
  `isstatustime` tinyint(3) NOT NULL DEFAULT '0',
  `statustimestart` int(10) NOT NULL DEFAULT '0',
  `statustimeend` int(10) NOT NULL DEFAULT '0',
  `nosearch` tinyint(1) NOT NULL DEFAULT '0',
  `showsales` tinyint(3) NOT NULL DEFAULT '1',
  `islive` int(11) NOT NULL DEFAULT '0',
  `liveprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `opencard` tinyint(1) DEFAULT '0',
  `cardid` varchar(255) DEFAULT '',
  `verifygoodsnum` int(11) DEFAULT '1',
  `verifygoodsdays` int(11) DEFAULT '1',
  `verifygoodslimittype` tinyint(1) DEFAULT '0',
  `verifygoodslimitdate` int(11) DEFAULT '0',
  `minliveprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `maxliveprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `dowpayment` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tempid` int(11) NOT NULL DEFAULT '0',
  `isstoreprice` tinyint(11) NOT NULL DEFAULT '0',
  `beforehours` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_pcate` (`pcate`),
  KEY `idx_ccate` (`ccate`),
  KEY `idx_isnew` (`isnew`),
  KEY `idx_ishot` (`ishot`),
  KEY `idx_isdiscount` (`isdiscount`),
  KEY `idx_isrecommand` (`isrecommand`),
  KEY `idx_iscomment` (`iscomment`),
  KEY `idx_issendfree` (`issendfree`),
  KEY `idx_istime` (`istime`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_tcate` (`tcate`),
  KEY `idx_scate` (`tcate`),
  KEY `idx_merchid` (`merchid`),
  KEY `idx_checked` (`checked`),
  FULLTEXT KEY `idx_buylevels` (`buylevels`),
  FULLTEXT KEY `idx_showgroups` (`showgroups`),
  FULLTEXT KEY `idx_buygroups` (`buygroups`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=199 ;

DROP TABLE IF EXISTS `ims_ewei_shop_goodscode_good`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_goodscode_good` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `qrcode` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `displayorder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_goods_cards`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_goods_cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `card_id` varchar(255) DEFAULT NULL,
  `card_title` varchar(255) DEFAULT NULL,
  `card_brand_name` varchar(255) DEFAULT NULL,
  `card_totalquantity` int(11) DEFAULT NULL,
  `card_quantity` int(11) DEFAULT NULL,
  `card_logoimg` varchar(255) DEFAULT NULL,
  `card_logowxurl` varchar(255) DEFAULT NULL,
  `card_backgroundtype` tinyint(1) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `card_backgroundimg` varchar(255) DEFAULT NULL,
  `card_backgroundwxurl` varchar(255) DEFAULT NULL,
  `prerogative` varchar(255) DEFAULT NULL,
  `card_description` varchar(255) DEFAULT NULL,
  `freewifi` tinyint(1) DEFAULT NULL,
  `withpet` tinyint(1) DEFAULT NULL,
  `freepark` tinyint(1) DEFAULT NULL,
  `deliver` tinyint(1) DEFAULT NULL,
  `custom_cell1` tinyint(1) DEFAULT NULL,
  `custom_cell1_name` varchar(255) DEFAULT NULL,
  `custom_cell1_tips` varchar(255) DEFAULT NULL,
  `custom_cell1_url` varchar(255) DEFAULT NULL,
  `color2` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_goods_comment`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_goods_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `nickname` varchar(50) DEFAULT '',
  `headimgurl` varchar(255) DEFAULT '',
  `content` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_goods_group`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_goods_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `goodsids` varchar(255) NOT NULL DEFAULT '',
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_goods_label`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_goods_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `label` varchar(255) NOT NULL DEFAULT '',
  `labelname` text NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_goods_labelstyle`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_goods_labelstyle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `style` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_goods_option`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_goods_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `thumb` varchar(60) DEFAULT '',
  `productprice` decimal(10,2) DEFAULT '0.00',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `costprice` decimal(10,2) DEFAULT '0.00',
  `stock` int(11) DEFAULT '0',
  `weight` decimal(10,2) DEFAULT '0.00',
  `displayorder` int(11) DEFAULT '0',
  `specs` text,
  `skuId` varchar(255) DEFAULT '',
  `goodssn` varchar(255) DEFAULT '',
  `productsn` varchar(255) DEFAULT '',
  `virtual` int(11) DEFAULT '0',
  `exchange_stock` int(11) DEFAULT '0',
  `exchange_postage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `presellprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `day` int(3) NOT NULL,
  `allfullbackprice` decimal(10,2) NOT NULL,
  `fullbackprice` decimal(10,2) NOT NULL,
  `allfullbackratio` decimal(10,2) DEFAULT NULL,
  `fullbackratio` decimal(10,2) DEFAULT NULL,
  `isfullback` tinyint(3) NOT NULL,
  `islive` int(11) NOT NULL,
  `liveprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cycelbuy_periodic` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=405 ;

INSERT INTO `ims_ewei_shop_goods_option` (`id`, `uniacid`, `goodsid`, `title`, `thumb`, `productprice`, `marketprice`, `costprice`, `stock`, `weight`, `displayorder`, `specs`, `skuId`, `goodssn`, `productsn`, `virtual`, `exchange_stock`, `exchange_postage`, `presellprice`, `day`, `allfullbackprice`, `fullbackprice`, `allfullbackratio`, `fullbackratio`, `isfullback`, `islive`, `liveprice`, `cycelbuy_periodic`) VALUES
(393, 1, 198, '38+银色', '', '0.00', '246.00', '0.00', 200, '0.00', 0, '287_289', '3491946323814', '', '', 0, 0, '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, '0.00', ''),
(394, 1, 198, '36+金色', '', '0.00', '246.00', '0.00', 200, '0.00', 1, '285_290', '3491946323818', '', '', 0, 0, '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, '0.00', ''),
(395, 1, 198, '37+金色', '', '0.00', '246.00', '0.00', 200, '0.00', 2, '286_290', '3491946323819', '', '', 0, 0, '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, '0.00', ''),
(396, 1, 198, '35+银色', '', '0.00', '246.00', '0.00', 200, '0.00', 3, '284_289', '3491946323811', '', '', 0, 0, '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, '0.00', ''),
(397, 1, 198, '39+金色', '', '0.00', '246.00', '0.00', 200, '0.00', 4, '288_290', '3491946323821', '', '', 0, 0, '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, '0.00', ''),
(398, 1, 198, '34+金色', '', '0.00', '246.00', '0.00', 200, '0.00', 5, '283_290', '3491946323816', '', '', 0, 0, '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, '0.00', ''),
(399, 1, 198, '37+银色', '', '0.00', '246.00', '0.00', 200, '0.00', 6, '286_289', '3491946323813', '', '', 0, 0, '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, '0.00', ''),
(400, 1, 198, '39+银色', '', '0.00', '246.00', '0.00', 199, '0.00', 7, '288_289', '3491946323815', '', '', 0, 0, '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, '0.00', ''),
(401, 1, 198, '35+金色', '', '0.00', '246.00', '0.00', 200, '0.00', 8, '284_290', '3491946323817', '', '', 0, 0, '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, '0.00', ''),
(402, 1, 198, '36+银色', '', '0.00', '246.00', '0.00', 200, '0.00', 9, '285_289', '3491946323812', '', '', 0, 0, '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, '0.00', ''),
(403, 1, 198, '38+金色', '', '0.00', '246.00', '0.00', 200, '0.00', 10, '287_290', '3491946323820', '', '', 0, 0, '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, '0.00', ''),
(404, 1, 198, '34+银色', '', '0.00', '246.00', '0.00', 200, '0.00', 11, '283_289', '3491946323810', '', '', 0, 0, '0.00', '0.00', 0, '0.00', '0.00', '0.00', '0.00', 0, 0, '0.00', '');

DROP TABLE IF EXISTS `ims_ewei_shop_goods_param`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_goods_param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `value` text,
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1110 ;

INSERT INTO `ims_ewei_shop_goods_param` (`id`, `uniacid`, `goodsid`, `title`, `value`, `displayorder`) VALUES
(1085, 1, 198, '里料材质', 'PU', 0),
(1086, 1, 198, '销售渠道类型', '纯电商(只在线上销售)', 1),
(1087, 1, 198, '鞋垫材质', 'PU', 2),
(1088, 1, 198, '品牌', 'Centenary/百年纪念', 3),
(1089, 1, 198, '货号', 'BD1467', 4),
(1090, 1, 198, '上市年份季节', '2017年夏季', 5),
(1091, 1, 198, '风格', '韩版', 6),
(1092, 1, 198, '帮面材质', 'PU', 7),
(1093, 1, 198, '皮质特征', '漆皮', 8),
(1094, 1, 198, '鞋底材质', '聚氨酯', 9),
(1095, 1, 198, '鞋头款式', '露趾', 10),
(1096, 1, 198, '后跟高', '高跟(5-8cm)', 11),
(1097, 1, 198, '跟底款式', '坡跟', 12),
(1098, 1, 198, '鞋帮高度', '低帮', 13),
(1099, 1, 198, '流行元素', '搭扣,坡跟,防水台', 14),
(1100, 1, 198, '颜色分类', '银色,金色', 15),
(1101, 1, 198, '尺码', '34,35,36,37,38,39', 16),
(1102, 1, 198, '后帮', '后空', 17),
(1103, 1, 198, '侧帮', '中空', 18),
(1104, 1, 198, '闭合方式', '一字式扣带', 19),
(1105, 1, 198, '图案', '纯色', 20),
(1106, 1, 198, '鞋制作工艺', '胶粘鞋', 21),
(1107, 1, 198, '适合场合', '日常', 22),
(1108, 1, 198, '适用对象', '青年（18-40周岁）', 23),
(1109, 1, 198, '款式', '时装凉鞋', 24);

DROP TABLE IF EXISTS `ims_ewei_shop_goods_spec`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_goods_spec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  `displaytype` tinyint(3) DEFAULT '0',
  `content` text,
  `displayorder` int(11) DEFAULT '0',
  `propId` varchar(255) DEFAULT '',
  `iscycelbuy` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=93 ;

INSERT INTO `ims_ewei_shop_goods_spec` (`id`, `uniacid`, `goodsid`, `title`, `description`, `displaytype`, `content`, `displayorder`, `propId`, `iscycelbuy`) VALUES
(91, 1, 198, '尺码', '', 0, NULL, 0, '20549', 0),
(92, 1, 198, '颜色分类', '', 0, NULL, 1, '1627207', 0);

DROP TABLE IF EXISTS `ims_ewei_shop_goods_spec_item`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_goods_spec_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `specid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `show` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `valueId` varchar(255) DEFAULT '',
  `virtual` int(11) DEFAULT '0',
  `cycelbuy_periodic` varchar(20) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_specid` (`specid`),
  KEY `idx_show` (`show`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=291 ;

INSERT INTO `ims_ewei_shop_goods_spec_item` (`id`, `uniacid`, `specid`, `title`, `thumb`, `show`, `displayorder`, `valueId`, `virtual`, `cycelbuy_periodic`) VALUES
(283, 1, 91, '34', '', 1, 0, '147478970', 0, ''),
(284, 1, 91, '35', '', 1, 1, '296172561', 0, ''),
(285, 1, 91, '36', '', 1, 2, '59280855', 0, ''),
(286, 1, 91, '37', '', 1, 3, '72380707', 0, ''),
(287, 1, 91, '38', '', 1, 4, '103189693', 0, ''),
(288, 1, 91, '39', '', 1, 5, '418624880', 0, ''),
(289, 1, 92, '银色', 'images/1/2017/04/j01vT5jXxb44V510TVJ4500tKHB5XXBt.jpg', 1, 0, '28330', 0, ''),
(290, 1, 92, '金色', 'images/1/2017/04/ZAKH0TnTqVmw0USSnS64mmu4uq0Tkvmm.jpg', 1, 1, '28328', 0, '');

DROP TABLE IF EXISTS `ims_ewei_shop_groups_adv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_groups_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

DROP TABLE IF EXISTS `ims_ewei_shop_groups_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_groups_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `displayorder` tinyint(3) unsigned DEFAULT '0',
  `enabled` tinyint(1) DEFAULT '1',
  `advimg` varchar(255) DEFAULT '',
  `advurl` varchar(500) DEFAULT '',
  `isrecommand` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_enabled` (`enabled`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

DROP TABLE IF EXISTS `ims_ewei_shop_groups_goods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_groups_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `displayorder` int(11) unsigned DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `category` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `groupsprice` decimal(10,2) DEFAULT '0.00',
  `singleprice` decimal(10,2) DEFAULT '0.00',
  `goodsnum` int(11) NOT NULL DEFAULT '1',
  `units` varchar(255) NOT NULL DEFAULT '件',
  `freight` decimal(10,2) DEFAULT '0.00',
  `endtime` int(11) unsigned NOT NULL DEFAULT '0',
  `groupnum` int(10) NOT NULL DEFAULT '0',
  `sales` int(10) NOT NULL DEFAULT '0',
  `thumb` varchar(255) DEFAULT '',
  `description` varchar(1000) DEFAULT NULL,
  `content` text,
  `createtime` int(11) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `ishot` tinyint(3) NOT NULL DEFAULT '0',
  `deleted` tinyint(3) NOT NULL DEFAULT '0',
  `goodsid` int(11) NOT NULL DEFAULT '0',
  `followneed` tinyint(2) NOT NULL DEFAULT '0',
  `followtext` varchar(255) DEFAULT NULL,
  `share_title` varchar(255) DEFAULT NULL,
  `share_icon` varchar(255) DEFAULT NULL,
  `share_desc` varchar(500) DEFAULT NULL,
  `goodssn` varchar(50) DEFAULT NULL,
  `productsn` varchar(50) DEFAULT NULL,
  `showstock` tinyint(2) NOT NULL,
  `purchaselimit` int(11) NOT NULL DEFAULT '0',
  `single` tinyint(2) NOT NULL DEFAULT '0',
  `dispatchtype` tinyint(2) NOT NULL,
  `dispatchid` int(11) NOT NULL,
  `isindex` tinyint(3) NOT NULL DEFAULT '0',
  `followurl` varchar(255) DEFAULT NULL,
  `deduct` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rights` tinyint(2) NOT NULL DEFAULT '1',
  `thumb_url` text,
  `gid` int(11) DEFAULT '0',
  `discount` tinyint(3) DEFAULT '0',
  `headstype` tinyint(3) DEFAULT NULL,
  `headsmoney` decimal(10,2) DEFAULT '0.00',
  `headsdiscount` int(11) DEFAULT '0',
  `isdiscount` tinyint(3) DEFAULT '0',
  `isverify` tinyint(3) DEFAULT '0',
  `verifytype` tinyint(3) DEFAULT '0',
  `verifynum` int(11) DEFAULT '0',
  `storeids` text,
  `merchid` int(11) DEFAULT '0',
  `shorttitle` varchar(255) DEFAULT '',
  `teamnum` int(11) DEFAULT '0',
  `more_spec` tinyint(1) DEFAULT '0',
  `is_ladder` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_type` (`category`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

DROP TABLE IF EXISTS `ims_ewei_shop_groups_goods_atlas`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_groups_goods_atlas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `g_id` int(11) NOT NULL,
  `thumb` varchar(145) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_groups_goods_option`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_groups_goods_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `goodsid` int(11) DEFAULT '0',
  `groups_goods_id` int(255) DEFAULT '0',
  `goods_option_id` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `marketprice` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `single_price` decimal(10,2) DEFAULT NULL,
  `specs` varchar(255) DEFAULT NULL,
  `stock` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_groups_ladder`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_groups_ladder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `goods_id` int(11) DEFAULT '0',
  `ladder_num` int(11) DEFAULT NULL,
  `ladder_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_groups_order`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_groups_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(45) NOT NULL,
  `orderno` varchar(45) NOT NULL,
  `groupnum` int(11) NOT NULL,
  `paytime` int(11) NOT NULL,
  `price` decimal(11,2) DEFAULT '0.00',
  `freight` decimal(11,2) DEFAULT '0.00',
  `status` int(9) NOT NULL,
  `pay_type` varchar(45) DEFAULT NULL,
  `goodid` int(11) NOT NULL,
  `teamid` int(11) NOT NULL,
  `is_team` int(2) NOT NULL,
  `heads` int(11) DEFAULT '0',
  `starttime` int(11) NOT NULL,
  `endtime` int(45) NOT NULL,
  `createtime` int(11) NOT NULL,
  `success` int(2) NOT NULL DEFAULT '0',
  `delete` int(2) NOT NULL DEFAULT '0',
  `credit` int(11) DEFAULT '0',
  `creditmoney` decimal(11,2) DEFAULT '0.00',
  `dispatchid` int(11) DEFAULT NULL,
  `addressid` int(11) NOT NULL DEFAULT '0',
  `address` varchar(1000) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT '0.00',
  `canceltime` int(11) NOT NULL DEFAULT '0',
  `finishtime` int(11) NOT NULL DEFAULT '0',
  `refundid` int(11) NOT NULL DEFAULT '0',
  `refundstate` tinyint(2) NOT NULL DEFAULT '0',
  `refundtime` int(11) NOT NULL DEFAULT '0',
  `express` varchar(45) DEFAULT NULL,
  `expresscom` varchar(100) DEFAULT NULL,
  `expresssn` varchar(45) DEFAULT NULL,
  `sendtime` int(45) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `remarkclose` text,
  `remarksend` text,
  `message` varchar(255) DEFAULT NULL,
  `deleted` int(2) NOT NULL DEFAULT '0',
  `realname` varchar(20) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `isverify` tinyint(3) DEFAULT '0',
  `verifytype` tinyint(3) DEFAULT '0',
  `verifycode` varchar(45) DEFAULT '0',
  `verifynum` int(11) DEFAULT '0',
  `printstate` int(11) NOT NULL DEFAULT '0',
  `printstate2` int(11) NOT NULL DEFAULT '0',
  `apppay` tinyint(3) NOT NULL DEFAULT '0',
  `isborrow` tinyint(1) DEFAULT '0',
  `borrowopenid` varchar(50) DEFAULT '',
  `source` tinyint(1) DEFAULT '0',
  `ladder_id` tinyint(1) DEFAULT '0',
  `is_ladder` tinyint(1) DEFAULT '0',
  `more_spec` tinyint(1) DEFAULT '0',
  `wxapp_prepay_id` varchar(255) DEFAULT '',
  `cancel_reason` varchar(255) DEFAULT '',
  `goods_price` decimal(10,2) DEFAULT '0.00',
  `goods_option_id` int(11) DEFAULT '0',
  `specs` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

DROP TABLE IF EXISTS `ims_ewei_shop_groups_order_goods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_groups_order_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `goods_id` int(11) DEFAULT '0',
  `groups_goods_id` int(11) DEFAULT '0',
  `groups_goods_option_id` int(11) DEFAULT '0',
  `groups_order_id` int(11) DEFAULT '0',
  `price` decimal(10,2) DEFAULT NULL,
  `option_name` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_groups_order_refund`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_groups_order_refund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(45) NOT NULL DEFAULT '',
  `orderid` int(11) NOT NULL DEFAULT '0',
  `refundno` varchar(45) NOT NULL DEFAULT '0',
  `refundstatus` tinyint(3) NOT NULL DEFAULT '0',
  `refundaddressid` int(11) NOT NULL DEFAULT '0',
  `refundaddress` varchar(1000) NOT NULL DEFAULT '0',
  `content` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `applytime` varchar(45) NOT NULL DEFAULT '0',
  `applycredit` int(11) NOT NULL DEFAULT '0',
  `applyprice` decimal(11,2) NOT NULL DEFAULT '0.00',
  `reply` text,
  `refundtype` varchar(45) DEFAULT NULL,
  `rtype` int(3) NOT NULL DEFAULT '0',
  `refundtime` varchar(45) NOT NULL,
  `endtime` varchar(45) NOT NULL DEFAULT '0',
  `message` varchar(255) DEFAULT NULL,
  `operatetime` varchar(45) NOT NULL DEFAULT '0',
  `realcredit` int(11) NOT NULL,
  `realmoney` decimal(11,2) NOT NULL,
  `express` varchar(45) DEFAULT NULL,
  `expresscom` varchar(100) DEFAULT NULL,
  `expresssn` varchar(45) DEFAULT NULL,
  `sendtime` varchar(45) NOT NULL DEFAULT '0',
  `returntime` int(11) NOT NULL DEFAULT '0',
  `rexpress` varchar(45) DEFAULT NULL,
  `rexpresscom` varchar(100) DEFAULT NULL,
  `rexpresssn` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_groups_paylog`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_groups_paylog` (
  `plid` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `openid` varchar(40) NOT NULL,
  `tid` varchar(64) NOT NULL,
  `credit` int(10) NOT NULL DEFAULT '0',
  `creditmoney` decimal(10,2) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `module` varchar(50) NOT NULL,
  `tag` varchar(2000) NOT NULL,
  `is_usecard` tinyint(3) unsigned NOT NULL,
  `card_type` tinyint(3) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `card_fee` decimal(10,2) unsigned NOT NULL,
  `encrypt_code` varchar(100) NOT NULL,
  `uniontid` varchar(50) NOT NULL,
  PRIMARY KEY (`plid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_tid` (`tid`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `uniontid` (`uniontid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

DROP TABLE IF EXISTS `ims_ewei_shop_groups_set`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_groups_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` varchar(45) DEFAULT NULL,
  `groups` int(2) NOT NULL DEFAULT '0',
  `followurl` varchar(255) DEFAULT NULL,
  `groupsurl` varchar(255) DEFAULT NULL,
  `share_title` varchar(255) DEFAULT NULL,
  `share_icon` varchar(255) DEFAULT NULL,
  `share_desc` varchar(255) DEFAULT NULL,
  `groups_description` text,
  `description` int(2) NOT NULL DEFAULT '0',
  `followqrcode` varchar(255) DEFAULT NULL,
  `share_url` varchar(255) DEFAULT NULL,
  `creditdeduct` tinyint(2) NOT NULL DEFAULT '0',
  `groupsdeduct` tinyint(2) NOT NULL DEFAULT '0',
  `credit` int(11) NOT NULL DEFAULT '1',
  `groupsmoney` decimal(11,2) NOT NULL DEFAULT '0.00',
  `refund` int(11) NOT NULL DEFAULT '0',
  `refundday` int(11) NOT NULL DEFAULT '0',
  `goodsid` text NOT NULL,
  `rules` text,
  `receive` int(11) DEFAULT '0',
  `discount` tinyint(3) DEFAULT '0',
  `headstype` tinyint(3) DEFAULT '0',
  `headsmoney` decimal(10,2) DEFAULT '0.00',
  `headsdiscount` int(11) DEFAULT '0',
  `followbar` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_groups_verify`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_groups_verify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(45) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `verifycode` varchar(45) DEFAULT '',
  `storeid` int(11) DEFAULT '0',
  `verifier` varchar(45) DEFAULT '0',
  `isverify` tinyint(3) DEFAULT '0',
  `verifytime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_invitation`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_invitation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(3) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `data` text NOT NULL,
  `scan` int(11) NOT NULL DEFAULT '0',
  `follow` int(11) NOT NULL DEFAULT '0',
  `qrcode` tinyint(3) NOT NULL DEFAULT '0',
  `status` tinyint(3) NOT NULL,
  `createtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_type` (`type`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_invitation_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_invitation_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `invitation_id` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(50) NOT NULL DEFAULT '',
  `invitation_openid` varchar(50) NOT NULL DEFAULT '',
  `scan_time` int(10) NOT NULL DEFAULT '0',
  `follow` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_posterid` (`invitation_id`) USING BTREE,
  KEY `idx_scantime` (`scan_time`) USING BTREE,
  KEY `idx_openid` (`openid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_invitation_qr`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_invitation_qr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(60) NOT NULL,
  `invitationid` int(11) NOT NULL,
  `roomid` int(11) NOT NULL DEFAULT '0',
  `sceneid` int(11) NOT NULL,
  `ticket` varchar(255) NOT NULL,
  `createtime` int(11) NOT NULL,
  `expire` int(11) NOT NULL DEFAULT '0',
  `qrimg` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_live`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `livetype` tinyint(3) NOT NULL DEFAULT '0',
  `liveidentity` varchar(50) NOT NULL,
  `screen` tinyint(3) NOT NULL DEFAULT '0',
  `goodsid` varchar(255) NOT NULL,
  `category` int(11) NOT NULL DEFAULT '0',
  `url` varchar(1000) NOT NULL,
  `thumb` varchar(1000) NOT NULL,
  `hot` tinyint(3) NOT NULL DEFAULT '0',
  `recommend` tinyint(3) NOT NULL DEFAULT '0',
  `living` tinyint(3) NOT NULL DEFAULT '0',
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  `livetime` int(10) NOT NULL DEFAULT '0',
  `lastlivetime` int(11) NOT NULL DEFAULT '0',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `introduce` text NOT NULL,
  `packetmoney` decimal(10,2) NOT NULL DEFAULT '0.00',
  `packettotal` int(11) NOT NULL DEFAULT '0',
  `packetprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `packetdes` varchar(255) NOT NULL,
  `couponid` varchar(255) NOT NULL,
  `share_title` varchar(255) NOT NULL,
  `share_icon` varchar(1000) NOT NULL,
  `share_desc` text NOT NULL,
  `share_url` varchar(1000) NOT NULL DEFAULT '',
  `subscribe` int(11) NOT NULL DEFAULT '0',
  `subscribenotice` tinyint(3) NOT NULL DEFAULT '0',
  `visit` int(11) NOT NULL DEFAULT '0',
  `video` varchar(1000) NOT NULL DEFAULT '',
  `covertype` tinyint(3) NOT NULL DEFAULT '0',
  `cover` varchar(1000) NOT NULL DEFAULT '',
  `iscoupon` tinyint(3) NOT NULL DEFAULT '0',
  `nestable` text NOT NULL,
  `tabs` text NOT NULL,
  `invitation_id` int(11) NOT NULL DEFAULT '0',
  `showlevels` varchar(255) NOT NULL,
  `showgroups` varchar(255) NOT NULL,
  `showcommission` varchar(255) NOT NULL,
  `jurisdiction_url` varchar(1000) NOT NULL,
  `jurisdictionurl_show` tinyint(3) NOT NULL DEFAULT '0',
  `notice` varchar(255) NOT NULL,
  `notice_url` varchar(1000) NOT NULL,
  `followqrcode` varchar(1000) NOT NULL,
  `coupon_num` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_merchid` (`merchid`) USING BTREE,
  KEY `idx_category` (`category`) USING BTREE,
  KEY `idx_hot` (`hot`) USING BTREE,
  KEY `idx_recommend` (`recommend`) USING BTREE,
  KEY `idx_living` (`living`) USING BTREE,
  KEY `idx_status` (`status`) USING BTREE,
  KEY `idx_livetime` (`livetime`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_live_adv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_enabled` (`enabled`) USING BTREE,
  KEY `idx_displayorder` (`displayorder`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_live_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `displayorder` tinyint(3) unsigned DEFAULT '0',
  `enabled` tinyint(1) DEFAULT '1',
  `advimg` varchar(255) DEFAULT '',
  `advurl` varchar(500) DEFAULT '',
  `isrecommand` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_displayorder` (`displayorder`) USING BTREE,
  KEY `idx_enabled` (`enabled`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_live_coupon`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `roomid` int(11) NOT NULL DEFAULT '0',
  `couponid` int(11) NOT NULL DEFAULT '0',
  `coupontotal` int(11) NOT NULL DEFAULT '0',
  `couponlimit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_roomid` (`roomid`) USING BTREE,
  KEY `idx_couponid` (`couponid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_live_favorite`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `roomid` int(11) NOT NULL DEFAULT '0',
  `openid` tinytext NOT NULL,
  `deleted` tinyint(3) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_roomid` (`roomid`) USING BTREE,
  KEY `idx_deleted` (`deleted`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_live_goods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `goodsid` int(11) NOT NULL DEFAULT '0',
  `liveid` int(11) NOT NULL DEFAULT '0',
  `liveprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `minliveprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `maxliveprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_live_goods_option`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_goods_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `goodsid` int(11) NOT NULL,
  `optionid` int(11) NOT NULL DEFAULT '0',
  `liveid` int(11) NOT NULL DEFAULT '0',
  `liveprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_live_setting`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `ismember` tinyint(3) NOT NULL DEFAULT '0',
  `share_title` varchar(255) NOT NULL,
  `share_icon` varchar(1000) NOT NULL,
  `share_desc` varchar(255) NOT NULL,
  `share_url` varchar(255) NOT NULL,
  `livenoticetime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_ismember` (`ismember`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_live_status`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `roomid` int(11) NOT NULL DEFAULT '0',
  `starttime` int(11) NOT NULL DEFAULT '0',
  `endtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_live_view`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_live_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(50) NOT NULL,
  `roomid` int(11) NOT NULL DEFAULT '0',
  `viewing` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_roomid` (`roomid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_lottery`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_lottery` (
  `lottery_id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `lottery_title` varchar(150) DEFAULT NULL,
  `lottery_icon` varchar(255) DEFAULT NULL,
  `lottery_banner` varchar(255) DEFAULT NULL,
  `lottery_cannot` varchar(255) DEFAULT NULL,
  `lottery_type` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT '0',
  `addtime` int(11) DEFAULT NULL,
  `lottery_data` text,
  `is_goods` tinyint(1) DEFAULT '0',
  `lottery_days` int(11) DEFAULT '0',
  `task_type` tinyint(1) DEFAULT '0',
  `task_data` text,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `award_start` int(11) DEFAULT '0',
  `award_end` int(11) DEFAULT '0',
  PRIMARY KEY (`lottery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=5 ;

INSERT INTO `ims_ewei_shop_lottery` (`lottery_id`, `uniacid`, `lottery_title`, `lottery_icon`, `lottery_banner`, `lottery_cannot`, `lottery_type`, `is_delete`, `addtime`, `lottery_data`, `is_goods`, `lottery_days`, `task_type`, `task_data`, `start_time`, `end_time`, `award_start`, `award_end`) VALUES
(1, 1, 'te', '', '12', '您没有参与抽奖的机会..', 1, 1, 1490848160, 'a:0:{}', 1, 0, 1, 'a:3:{s:9:"pay_money";d:1;s:7:"pay_num";i:1;s:8:"pay_type";i:0;}', 1490848140, 1493440140, 0, 0),
(2, 1, '1', '', '1', '您没有参与抽奖的机会..', 1, 1, 1490951101, 'a:0:{}', 1, -259200, 2, 'a:2:{s:8:"sign_day";i:0;s:8:"sign_num";i:0;}', 1490848200, 1493440200, 0, 0),
(3, 1, '1', '', '1', '您没有参与抽奖的机会..1', 1, 0, 1490951780, 'a:0:{}', 1, 0, 1, 'a:3:{s:9:"pay_money";d:1;s:7:"pay_num";i:1;s:8:"pay_type";i:0;}', 1490951100, 1493543100, 0, 0),
(4, 1, '0', '', '0', '您没有参与抽奖的机会..', 1, 0, 1490951335, 'a:0:{}', 1, 0, 2, 'a:2:{s:8:"sign_day";i:1;s:8:"sign_num";i:1;}', 1490951280, 1493543280, 0, 0);

DROP TABLE IF EXISTS `ims_ewei_shop_lottery_default`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_lottery_default` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `data` text,
  `addtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_lottery_join`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_lottery_join` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `join_user` varchar(255) DEFAULT NULL,
  `lottery_id` int(11) DEFAULT NULL,
  `lottery_num` int(10) DEFAULT '0',
  `lottery_tag` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_lottery_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_lottery_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `lottery_id` int(11) DEFAULT '0',
  `join_user` varchar(255) DEFAULT NULL,
  `lottery_data` text,
  `is_reward` tinyint(1) DEFAULT '0',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_mc_merchant`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_mc_merchant` (
  `id` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `merchant_no` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `salt` varchar(8) NOT NULL DEFAULT '',
  `contact_name` varchar(255) NOT NULL DEFAULT '',
  `contact_mobile` varchar(16) NOT NULL DEFAULT '',
  `contact_address` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createtime` int(11) NOT NULL,
  `validitytime` int(11) NOT NULL,
  `industry` varchar(255) NOT NULL DEFAULT '',
  `remark` varchar(1000) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `ims_ewei_shop_member`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `groupid` int(11) DEFAULT '0',
  `level` int(11) DEFAULT '0',
  `agentid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `realname` varchar(20) DEFAULT '',
  `mobile` varchar(11) DEFAULT '',
  `pwd` varchar(32) DEFAULT '',
  `weixin` varchar(100) DEFAULT '',
  `commission` decimal(10,2) DEFAULT '0.00',
  `commission_pay` decimal(10,2) DEFAULT '0.00',
  `content` text,
  `createtime` int(10) DEFAULT '0',
  `agenttime` int(10) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `isagent` tinyint(1) DEFAULT '0',
  `clickcount` int(11) DEFAULT '0',
  `agentlevel` int(11) DEFAULT '0',
  `noticeset` text,
  `nickname` varchar(255) DEFAULT '',
  `credit1` decimal(10,2) DEFAULT '0.00',
  `credit2` decimal(10,2) DEFAULT '0.00',
  `birthyear` varchar(255) DEFAULT '',
  `birthmonth` varchar(255) DEFAULT '',
  `birthday` varchar(255) DEFAULT '',
  `gender` tinyint(3) DEFAULT '0',
  `avatar` varchar(255) DEFAULT '',
  `province` varchar(255) DEFAULT '',
  `city` varchar(255) DEFAULT '',
  `area` varchar(255) DEFAULT '',
  `childtime` int(11) DEFAULT '0',
  `inviter` int(11) DEFAULT '0',
  `agentnotupgrade` int(11) DEFAULT '0',
  `agentselectgoods` tinyint(3) DEFAULT '0',
  `agentblack` int(11) DEFAULT '0',
  `fixagentid` tinyint(3) DEFAULT '0',
  `diymemberid` int(11) DEFAULT '0',
  `diymemberfields` text,
  `diymemberdata` text,
  `diymemberdataid` int(11) DEFAULT '0',
  `diycommissionid` int(11) DEFAULT '0',
  `diycommissionfields` text,
  `diycommissiondata` text,
  `diycommissiondataid` int(11) DEFAULT '0',
  `isblack` int(11) DEFAULT '0',
  `username` varchar(255) DEFAULT '',
  `commission_total` decimal(10,2) DEFAULT '0.00',
  `endtime2` int(11) DEFAULT '0',
  `ispartner` tinyint(3) DEFAULT '0',
  `partnertime` int(11) DEFAULT '0',
  `partnerstatus` tinyint(3) DEFAULT '0',
  `partnerblack` tinyint(3) DEFAULT '0',
  `partnerlevel` int(11) DEFAULT '0',
  `partnernotupgrade` tinyint(3) DEFAULT '0',
  `diyglobonusid` int(11) DEFAULT '0',
  `diyglobonusdata` text,
  `diyglobonusfields` text,
  `isaagent` tinyint(3) DEFAULT '0',
  `aagentlevel` int(11) DEFAULT '0',
  `aagenttime` int(11) DEFAULT '0',
  `aagentstatus` tinyint(3) DEFAULT '0',
  `aagentblack` tinyint(3) DEFAULT '0',
  `aagentnotupgrade` tinyint(3) DEFAULT '0',
  `aagenttype` tinyint(3) DEFAULT '0',
  `aagentprovinces` text,
  `aagentcitys` text,
  `aagentareas` text,
  `diyaagentid` int(11) DEFAULT '0',
  `diyaagentdata` text,
  `diyaagentfields` text,
  `salt` varchar(32) DEFAULT NULL,
  `mobileverify` tinyint(3) DEFAULT '0',
  `mobileuser` tinyint(3) DEFAULT '0',
  `carrier_mobile` varchar(11) DEFAULT '0',
  `isauthor` tinyint(1) DEFAULT '0',
  `authortime` int(11) DEFAULT '0',
  `authorstatus` tinyint(1) DEFAULT '0',
  `authorblack` tinyint(1) DEFAULT '0',
  `authorlevel` int(11) DEFAULT '0',
  `authornotupgrade` tinyint(1) DEFAULT '0',
  `diyauthorid` int(11) DEFAULT '0',
  `diyauthordata` text,
  `diyauthorfields` text,
  `authorid` int(11) DEFAULT '0',
  `comefrom` varchar(20) DEFAULT NULL,
  `openid_qq` varchar(50) DEFAULT NULL,
  `openid_wx` varchar(50) DEFAULT NULL,
  `diymaxcredit` tinyint(3) DEFAULT '0',
  `maxcredit` int(11) DEFAULT '0',
  `datavalue` varchar(50) NOT NULL DEFAULT '',
  `openid_wa` varchar(50) DEFAULT NULL,
  `nickname_wechat` varchar(255) DEFAULT '',
  `avatar_wechat` varchar(255) DEFAULT '',
  `updateaddress` tinyint(1) NOT NULL DEFAULT '0',
  `membercardid` varchar(255) DEFAULT '',
  `membercardcode` varchar(255) DEFAULT '',
  `membershipnumber` varchar(255) DEFAULT '',
  `membercardactive` tinyint(1) DEFAULT '0',
  `idnumber` varchar(255) DEFAULT NULL,
  `wxcardupdatetime` int(11) DEFAULT '0',
  `hasnewcoupon` tinyint(1) DEFAULT '0',
  `isheads` tinyint(1) NOT NULL DEFAULT '0',
  `headsstatus` tinyint(1) NOT NULL DEFAULT '0',
  `headstime` int(11) NOT NULL DEFAULT '0',
  `headsid` int(11) NOT NULL DEFAULT '0',
  `diyheadsid` int(11) NOT NULL DEFAULT '0',
  `diyheadsdata` text,
  `diyheadsfields` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_shareid` (`agentid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_status` (`status`),
  KEY `idx_agenttime` (`agenttime`),
  KEY `idx_isagent` (`isagent`),
  KEY `idx_uid` (`uid`),
  KEY `idx_groupid` (`groupid`),
  KEY `idx_level` (`level`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2188 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_address`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '0',
  `realname` varchar(20) DEFAULT '',
  `mobile` varchar(11) DEFAULT '',
  `province` varchar(30) DEFAULT '',
  `city` varchar(30) DEFAULT '',
  `area` varchar(30) DEFAULT '',
  `address` varchar(300) DEFAULT '',
  `isdefault` tinyint(1) DEFAULT '0',
  `zipcode` varchar(255) DEFAULT '',
  `deleted` tinyint(1) DEFAULT '0',
  `street` varchar(50) NOT NULL DEFAULT '',
  `datavalue` varchar(50) NOT NULL DEFAULT '',
  `streetdatavalue` varchar(30) NOT NULL DEFAULT '',
  `lng` varchar(255) NOT NULL DEFAULT '',
  `lat` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_isdefault` (`isdefault`),
  KEY `idx_deleted` (`deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_cart`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(100) DEFAULT '',
  `goodsid` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `deleted` tinyint(1) DEFAULT '0',
  `optionid` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `diyformdataid` int(11) DEFAULT '0',
  `diyformdata` text,
  `diyformfields` text,
  `diyformid` int(11) DEFAULT '0',
  `selected` tinyint(1) DEFAULT '1',
  `selectedadd` tinyint(1) DEFAULT '1',
  `merchid` int(11) DEFAULT '0',
  `isnewstore` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_deleted` (`deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_credit_record`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_credit_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
  `openid` varchar(255) DEFAULT '',
  `uniacid` int(11) NOT NULL,
  `credittype` varchar(10) NOT NULL,
  `num` decimal(10,2) NOT NULL,
  `operator` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `remark` varchar(200) NOT NULL,
  `module` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_favorite`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `deleted` tinyint(1) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `type` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_group`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `groupname` varchar(255) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_group_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_group_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(50) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '0',
  `add_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`log_id`),
  KEY `group_id` (`group_id`) USING BTREE,
  KEY `openid` (`openid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_history`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `deleted` tinyint(1) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `times` int(11) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2234 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_level`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `level` int(11) DEFAULT '0',
  `levelname` varchar(50) DEFAULT '',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  `ordercount` int(10) DEFAULT '0',
  `discount` decimal(10,2) DEFAULT '0.00',
  `enabled` tinyint(3) DEFAULT '0',
  `enabledadd` tinyint(1) DEFAULT '0',
  `buygoods` tinyint(1) NOT NULL DEFAULT '0',
  `goodsids` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `type` tinyint(3) DEFAULT NULL,
  `logno` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `money` decimal(10,2) DEFAULT '0.00',
  `rechargetype` varchar(255) DEFAULT '',
  `gives` decimal(10,2) DEFAULT NULL,
  `couponid` int(11) DEFAULT '0',
  `transid` varchar(255) DEFAULT '',
  `realmoney` decimal(10,2) DEFAULT '0.00',
  `charge` decimal(10,2) DEFAULT '0.00',
  `deductionmoney` decimal(10,2) DEFAULT '0.00',
  `isborrow` tinyint(3) DEFAULT '0',
  `borrowopenid` varchar(100) DEFAULT '',
  `remark` varchar(255) NOT NULL DEFAULT '',
  `apppay` tinyint(3) NOT NULL DEFAULT '0',
  `alipay` varchar(50) NOT NULL DEFAULT '',
  `bankname` varchar(50) NOT NULL DEFAULT '',
  `bankcard` varchar(50) NOT NULL DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `applytype` tinyint(3) NOT NULL DEFAULT '0',
  `sendmoney` decimal(10,2) DEFAULT '0.00',
  `senddata` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_type` (`type`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_mergelog`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_mergelog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `mergetime` int(11) NOT NULL DEFAULT '0',
  `openid_a` varchar(30) NOT NULL,
  `openid_b` varchar(30) NOT NULL,
  `mid_a` int(11) NOT NULL,
  `mid_b` int(11) NOT NULL,
  `detail_a` text,
  `detail_b` text,
  `detail_c` text,
  `fromuniacid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_mid_a` (`mid_a`) USING BTREE,
  KEY `idx_mid_b` (`mid_b`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_message_template`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_message_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `template_id` varchar(255) DEFAULT '',
  `first` text NOT NULL,
  `firstcolor` varchar(255) DEFAULT '',
  `data` text NOT NULL,
  `remark` text NOT NULL,
  `remarkcolor` varchar(255) DEFAULT '',
  `url` varchar(255) NOT NULL,
  `createtime` int(11) DEFAULT '0',
  `sendtimes` int(11) DEFAULT '0',
  `sendcount` int(11) DEFAULT '0',
  `typecode` varchar(30) DEFAULT '',
  `messagetype` tinyint(1) DEFAULT '0',
  `send_desc` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_message_template_default`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_message_template_default` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typecode` varchar(255) DEFAULT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `templateid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_message_template_type`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_message_template_type` (
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

INSERT INTO `ims_ewei_shop_member_message_template_type` (`id`, `name`, `typecode`, `templatecode`, `templateid`, `templatename`, `content`, `showtotaladd`, `typegroup`, `groupname`) VALUES
(1, '订单付款通知', 'saler_pay', 'OPENTM405584202', '', '订单付款通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}商品名称：{{keyword2.DATA}}商品数量：{{keyword3.DATA}}支付金额：{{keyword4.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(2, '自提订单提交成功通知', 'carrier', 'OPENTM201594720', '', '订单付款通知', '{{first.DATA}}自提码：{{keyword1.DATA}}商品详情：{{keyword2.DATA}}提货地址：{{keyword3.DATA}}提货时间：{{keyword4.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(3, '订单取消通知', 'cancel', 'OPENTM201764653', '', '订单关闭提醒', '{{first.DATA}}订单商品：{{keyword1.DATA}}订单编号：{{keyword2.DATA}}下单时间：{{keyword3.DATA}}订单金额：{{keyword4.DATA}}关闭时间：{{keyword5.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(5, '订单支付成功通知', 'pay', 'OPENTM405584202', '', '订单支付通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}商品名称：{{keyword2.DATA}}商品数量：{{keyword3.DATA}}支付金额：{{keyword4.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(6, '订单发货通知', 'send', 'OPENTM401874827', '', '订单发货通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}快递公司：{{keyword2.DATA}}快递单号：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(13, '提现成功通知', 'withdraw_ok', 'OPENTM207422808', '', '提现通知', '{{first.DATA}}申请提现金额：{{keyword1.DATA}}取提现手续费：{{keyword2.DATA}}实际到账金额：{{keyword3.DATA}}提现渠道：{{keyword4.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(14, '会员升级通知(任务处理通知)', 'upgrade', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(15, '充值成功通知（后台管理员手动）', 'backrecharge_ok', 'OPENTM207727673', '', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(16, '积分变动提醒', 'backpoint_ok', 'OPENTM207509450', '', '积分变动提醒', '{{first.DATA}}获得时间：{{keyword1.DATA}}获得积分：{{keyword2.DATA}}获得原因：{{keyword3.DATA}}当前积分：{{keyword4.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(17, '换货发货通知', 'refund4', 'OPENTM401874827', '', '订单发货通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}快递公司：{{keyword2.DATA}}快递单号：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(18, '砍价活动通知', 'bargain_message', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'bargain', '砍价消息通知'),
(19, '拼团活动通知', 'groups', NULL, NULL, NULL, NULL, 0, 'groups', '拼团消息通知'),
(20, '人人分销通知', 'commission', NULL, NULL, NULL, NULL, 0, 'commission', '分销消息通知'),
(21, '商品付款通知', 'saler_goodpay', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(22, '砍到底价通知', 'bargain_fprice', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '砍价消息通知', '0'),
(35, '库存预警通知', 'saler_stockwarn', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '系统消息通知', '0'),
(36, '卖家核销商品核销通知', 'o2o_sverify', 'OPENTM409521536', '', '核销成功提醒', '{{first.DATA}}核销项目：{{keyword1.DATA}}核销时间：{{keyword2.DATA}}核销门店：{{keyword3.DATA}}{{remark.DATA}}', 0, 'O2O消息通知', '0'),
(37, '核销商品核销通知', 'o2o_bverify', 'OPENTM409521536', '', '核销成功提醒', '{{first.DATA}}核销项目：{{keyword1.DATA}}核销时间：{{keyword2.DATA}}核销门店：{{keyword3.DATA}}{{remark.DATA}}', 0, 'O2O消息通知', '0'),
(38, '卖家商品预约通知', 'o2o_snorder', 'OPENTM202447657', '', '预约成功提醒', '{{first.DATA}}预约项目：{{keyword1.DATA}}预约时间：{{keyword2.DATA}}{{remark.DATA}}', 0, 'O2O消息通知', '0'),
(39, '商品预约成功通知', 'o2o_bnorder', 'OPENTM202447657', '', '预约成功提醒', '{{first.DATA}}预约项目：{{keyword1.DATA}}预约时间：{{keyword2.DATA}}{{remark.DATA}}', 0, 'O2O消息通知', '0'),
(42, '商品下单通知', 'saler_goodsubmit', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '系统消息通知', '0'),
(4, '订单即将取消通知', 'willcancel', 'OPENTM201764653', '', '订单关闭提醒', '{{first.DATA}}订单商品：{{keyword1.DATA}}订单编号：{{keyword2.DATA}}下单时间：{{keyword3.DATA}}订单金额：{{keyword4.DATA}}关闭时间：{{keyword5.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(7, '自动发货通知(虚拟物品及卡密)', 'virtualsend', 'OPENTM207793687', '', '自动发货通知', '{{first.DATA}}商品名称：{{keyword1.DATA}}订单号：{{keyword2.DATA}}订单金额：{{keyword3.DATA}}卡密信息：{{keyword4.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(8, '订单状态更新(修改收货地址)(修改价格)', 'orderstatus', 'TM00017', '', '订单付款通知', '{{first.DATA}}订单编号:{{OrderSn.DATA}}订单状态:{{OrderStatus.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(9, '退款成功通知', 'refund1', 'TM00430', '', '退款成功通知', '{{first.DATA}}退款金额：{{orderProductPrice.DATA}}商品详情：{{orderProductName.DATA}}订单编号：{{orderName.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(10, '换货成功通知', 'refund3', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(11, '退款申请驳回通知', 'refund2', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(12, '充值成功通知', 'recharge_ok', 'OPENTM207727673', '', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(23, '订单收货通知(卖家)', 'saler_finish', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '系统消息通知', '0'),
(24, '余额兑换成功通知', 'exchange_balance', 'OPENTM207727673', '', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', 0, '兑换中心消息通知', '0'),
(25, '积分兑换成功通知', 'exchange_score', 'OPENTM207509450', '', '积分变动提醒', '{{first.DATA}}获得时间：{{keyword1.DATA}}获得积分：{{keyword2.DATA}}获得原因：{{keyword3.DATA}}当前积分：{{keyword4.DATA}}{{remark.DATA}}', 0, '兑换中心消息通知', '0'),
(26, '兑换中心余额充值通知', 'exchange_recharge', 'OPENTM207727673', '', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', 0, '兑换中心消息通知', '0'),
(27, '游戏中心通知', 'lottery_get', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'lottery', '抽奖消息通知'),
(50, '维权订单通知', 'saler_refund', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '系统消息通知', '0'),
(43, '任务接取通知', 'task_pick', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '任务中心消息通知', '0'),
(44, '任务进度通知', 'task_progress', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '任务中心消息通知', '0'),
(45, '任务完成通知', 'task_finish', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '任务中心消息通知', '0'),
(46, '任务海报接取通知', 'task_poster_pick', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '任务中心消息通知', '0'),
(47, '任务海报进度通知', 'task_poster_progress', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '任务中心消息通知', '0'),
(48, '任务海报完成通知', 'task_poster_finish', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '任务中心消息通知', '0'),
(49, '任务海报扫描通知', 'task_poster_scan', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '任务中心消息通知', '0'),
(52, '成为分销商通知', 'commission_become', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '分销消息通知', '0'),
(53, '新增下线通知', 'commission_agent_new', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '分销消息通知', '0'),
(54, '下级付款通知', 'commission_order_pay', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '分销消息通知', '0'),
(55, '下级确认收货通知', 'commission_order_finish', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '分销消息通知', '0'),
(56, '提现申请提交通知', 'commission_apply', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '分销消息通知', '0'),
(57, '提现申请完成审核通知', 'commission_check', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '分销消息通知', '0'),
(58, '佣金打款通知', 'commission_pay', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '分销消息通知', '0'),
(59, '分销商等级升级通知', 'commission_upgrade', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '分销消息通知', '0'),
(60, '成为股东通知', 'globonus_become', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '股东消息通知', '0'),
(61, '股东等级升级通知', 'globonus_upgrade', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '股东消息通知', '0'),
(62, '分红发放通知', 'globonus_pay', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '股东消息通知', '0'),
(63, '奖励发放通知', 'article', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '文章营销消息通知', '0'),
(64, '成为区域代理通知', 'abonus_become', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '区域代理消息通知', '0'),
(65, '省级代理等级升级通知', 'abonus_upgrade1', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '区域代理消息通知', '0'),
(66, '市级代理等级升级通知', 'abonus_upgrade2', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '区域代理消息通知', '0'),
(67, '区级代理等级升级通知', 'abonus_upgrade3', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '区域代理消息通知', '0'),
(68, '区域代理分红发放通知', 'abonus_pay', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '区域代理消息通知', '0'),
(69, '入驻申请通知', 'merch_apply', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '商家通知', '0'),
(70, '提现申请提交通知', 'merch_applymoney', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '商家通知', '0'),
(71, '社区会员评论通知', 'reply', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '人人社区消息通知', '0'),
(51, '社区会员升级通知', 'sns', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, '人人社区消息通知', '0'),
(77, '分销提现申请提醒', 'commission_applymoney', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'commission', '分销消息通知'),
(72, '修改地址卖家通知', 'cycelbuy_seller_address', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'cycelbuy', '周期购消息通知'),
(73, '修改收货时间卖家通知', 'cycelbuy_seller_date', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'cycelbuy', '周期购消息通知'),
(74, '周期购定时发货通知', 'cycelbuy_timing', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'cycelbuy', '周期购消息通知'),
(75, '修改收货时间买家通知', 'cycelbuy_buyer_date', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'cycelbuy', '周期购消息通知'),
(76, '修改地址买家通知', 'cycelbuy_buyer_address', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'cycelbuy', '周期购消息通知'),
(80, '成为团长通知', 'dividend_become', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'dividend', '团队分红通知'),
(81, '成为团长通知(卖家)', 'dividend_become_saler', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'dividend', '团队分红通知'),
(82, '团员成为团长通知', 'dividend_downline_become', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'dividend', '团队分红通知'),
(83, '团长提现通知', 'dividend_apply', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'dividend', '团队分红通知'),
(84, '提现审核完成通知', 'dividend_check', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'dividend', '团队分红通知');

DROP TABLE IF EXISTS `ims_ewei_shop_member_printer`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_printer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `type` tinyint(3) DEFAULT '0',
  `print_data` text,
  `createtime` int(11) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_createtime` (`createtime`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_printer_template`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_printer_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `type` tinyint(3) DEFAULT '0',
  `print_title` varchar(255) DEFAULT '',
  `print_style` varchar(255) DEFAULT '',
  `print_data` text,
  `code` varchar(500) DEFAULT '',
  `qrcode` varchar(500) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `goodssn` tinyint(1) NOT NULL DEFAULT '0',
  `productsn` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_createtime` (`createtime`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_rank`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_member_tmp`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_tmp` (
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) CHARACTER SET utf8 DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_account`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `merchid` int(11) DEFAULT '0',
  `username` varchar(255) DEFAULT '',
  `pwd` varchar(255) DEFAULT '',
  `salt` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `perms` text,
  `isfounder` tinyint(3) DEFAULT '0',
  `lastip` varchar(255) DEFAULT '',
  `lastvisit` varchar(255) DEFAULT '',
  `roleid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_merchid` (`merchid`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=95 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_adv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `displayorder` int(11) DEFAULT NULL,
  `enabled` int(11) DEFAULT NULL,
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_merchid` (`merchid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_banner`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `bannername` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_merchid` (`merchid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_bill`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `applyno` varchar(255) NOT NULL DEFAULT '',
  `merchid` int(11) NOT NULL DEFAULT '0',
  `orderids` text NOT NULL,
  `realprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `realpricerate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `finalprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payrateprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payrate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `applytime` int(11) NOT NULL DEFAULT '0',
  `checktime` int(11) NOT NULL DEFAULT '0',
  `paytime` int(11) NOT NULL DEFAULT '0',
  `invalidtime` int(11) NOT NULL DEFAULT '0',
  `refusetime` int(11) NOT NULL DEFAULT '0',
  `remark` text NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `ordernum` int(11) NOT NULL DEFAULT '0',
  `orderprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `passrealprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `passrealpricerate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `passorderids` text NOT NULL,
  `passordernum` int(11) NOT NULL DEFAULT '0',
  `passorderprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `alipay` varchar(50) NOT NULL DEFAULT '',
  `bankname` varchar(50) NOT NULL DEFAULT '',
  `bankcard` varchar(50) NOT NULL DEFAULT '',
  `applyrealname` varchar(50) NOT NULL DEFAULT '',
  `applytype` tinyint(3) NOT NULL DEFAULT '0',
  `handpay` tinyint(3) NOT NULL DEFAULT '0',
  `creditstatus` tinyint(3) NOT NULL DEFAULT '0',
  `creditrate` int(10) NOT NULL DEFAULT '1',
  `creditnum` int(10) NOT NULL DEFAULT '0',
  `creditmoney` decimal(10,2) NOT NULL DEFAULT '0.00',
  `passcreditnum` int(10) NOT NULL DEFAULT '0',
  `passcreditmoney` decimal(10,2) NOT NULL DEFAULT '0.00',
  `isbillcredit` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_merchid` (`merchid`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_billo`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_billo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `billid` int(11) NOT NULL DEFAULT '0',
  `orderid` int(11) NOT NULL DEFAULT '0',
  `ordermoney` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `catename` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `thumb` varchar(500) DEFAULT '',
  `isrecommand` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_category_swipe`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_category_swipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `thumb` varchar(500) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_clearing`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_clearing` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  `clearno` varchar(64) NOT NULL DEFAULT '',
  `goodsprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `dispatchprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `deductprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `deductcredit2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discountprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `deductenough` decimal(10,2) NOT NULL DEFAULT '0.00',
  `merchdeductenough` decimal(10,2) NOT NULL DEFAULT '0.00',
  `isdiscountprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  `starttime` int(10) unsigned NOT NULL DEFAULT '0',
  `endtime` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `realprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `realpricerate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `finalprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `remark` varchar(2000) NOT NULL DEFAULT '',
  `paytime` int(11) NOT NULL DEFAULT '0',
  `payrate` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `merchid` (`merchid`),
  KEY `starttime` (`starttime`),
  KEY `endtime` (`endtime`),
  KEY `status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_group`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `groupname` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `isdefault` tinyint(1) DEFAULT '0',
  `goodschecked` tinyint(1) DEFAULT '0',
  `commissionchecked` tinyint(1) DEFAULT '0',
  `changepricechecked` tinyint(1) DEFAULT '0',
  `finishchecked` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_nav`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `navname` varchar(255) DEFAULT '',
  `icon` varchar(255) DEFAULT '',
  `url` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_merchid` (`merchid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_notice`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `detail` text,
  `status` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT NULL,
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_merchid` (`merchid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_perm_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_perm_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  `type` varchar(255) DEFAULT '',
  `op` text,
  `ip` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_merchid` (`merchid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=489 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_perm_role`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_perm_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `rolename` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `perms` text,
  `deleted` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_status` (`status`),
  KEY `idx_deleted` (`deleted`),
  KEY `merchid` (`merchid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_reg`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `merchname` varchar(255) DEFAULT '',
  `salecate` varchar(255) DEFAULT '',
  `desc` varchar(500) DEFAULT '',
  `realname` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `diyformdata` text,
  `diyformfields` text,
  `applytime` int(11) DEFAULT '0',
  `reason` text,
  `uname` varchar(50) NOT NULL DEFAULT '',
  `upass` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_saler`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_saler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storeid` int(11) DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `salername` varchar(255) DEFAULT '',
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_storeid` (`storeid`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_merchid` (`merchid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_store`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `storename` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `tel` varchar(255) DEFAULT '',
  `lat` varchar(255) DEFAULT '',
  `lng` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `type` tinyint(1) DEFAULT '0',
  `realname` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `fetchtime` varchar(255) DEFAULT '',
  `logo` varchar(255) DEFAULT '',
  `saletime` varchar(255) DEFAULT '',
  `desc` text,
  `displayorder` int(11) DEFAULT '0',
  `commission_total` decimal(10,2) DEFAULT NULL,
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_status` (`status`),
  KEY `idx_merchid` (`merchid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

DROP TABLE IF EXISTS `ims_ewei_shop_merch_user`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_merch_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `regid` int(11) DEFAULT '0',
  `openid` varchar(255) NOT NULL DEFAULT '',
  `groupid` int(11) DEFAULT '0',
  `merchno` varchar(255) NOT NULL DEFAULT '',
  `merchname` varchar(255) NOT NULL DEFAULT '',
  `salecate` varchar(255) NOT NULL DEFAULT '',
  `desc` varchar(500) NOT NULL DEFAULT '',
  `realname` varchar(255) NOT NULL DEFAULT '',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `accounttime` int(11) DEFAULT '0',
  `diyformdata` text,
  `diyformfields` text,
  `applytime` int(11) DEFAULT '0',
  `accounttotal` int(11) DEFAULT '0',
  `remark` text,
  `jointime` int(11) DEFAULT '0',
  `accountid` int(11) DEFAULT '0',
  `sets` text,
  `logo` varchar(255) NOT NULL DEFAULT '',
  `payopenid` varchar(32) NOT NULL DEFAULT '',
  `payrate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `isrecommand` tinyint(1) DEFAULT '0',
  `cateid` int(11) DEFAULT '0',
  `address` varchar(255) DEFAULT '',
  `tel` varchar(255) DEFAULT '',
  `lat` varchar(255) DEFAULT '',
  `lng` varchar(255) DEFAULT '',
  `pluginset` text NOT NULL,
  `uname` varchar(50) NOT NULL DEFAULT '',
  `upass` varchar(255) NOT NULL DEFAULT '',
  `maxgoods` int(11) NOT NULL DEFAULT '0',
  `iscredit` tinyint(3) NOT NULL DEFAULT '1',
  `creditrate` int(10) NOT NULL DEFAULT '1',
  `iscreditmoney` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_status` (`status`),
  KEY `idx_groupid` (`groupid`),
  KEY `idx_regid` (`regid`),
  KEY `idx_cateid` (`cateid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=97 ;

DROP TABLE IF EXISTS `ims_ewei_shop_multi_shop`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_multi_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  `company` varchar(255) DEFAULT '',
  `sales` varchar(255) DEFAULT '',
  `starttime` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  `applytime` int(11) DEFAULT '0',
  `jointime` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `refusecontent` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_nav`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `navname` varchar(255) DEFAULT '',
  `icon` varchar(255) DEFAULT '',
  `url` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `iswxapp` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

DROP TABLE IF EXISTS `ims_ewei_shop_newstore_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_newstore_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `uniacid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_notice`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `detail` text,
  `status` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT NULL,
  `shopid` int(11) DEFAULT '0',
  `iswxapp` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_order`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `agentid` int(11) DEFAULT '0',
  `ordersn` varchar(30) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  `goodsprice` decimal(10,2) DEFAULT '0.00',
  `discountprice` decimal(10,2) DEFAULT '0.00',
  `status` tinyint(3) DEFAULT '0',
  `paytype` tinyint(1) DEFAULT '0',
  `transid` varchar(30) DEFAULT '0',
  `remark` varchar(1000) DEFAULT '',
  `addressid` int(11) DEFAULT '0',
  `dispatchprice` decimal(10,2) DEFAULT '0.00',
  `dispatchid` int(10) DEFAULT '0',
  `createtime` int(10) DEFAULT NULL,
  `dispatchtype` tinyint(3) DEFAULT '0',
  `carrier` text,
  `refundid` int(11) DEFAULT '0',
  `iscomment` tinyint(3) DEFAULT '0',
  `creditadd` tinyint(3) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `userdeleted` tinyint(3) DEFAULT '0',
  `finishtime` int(11) DEFAULT '0',
  `paytime` int(11) DEFAULT '0',
  `expresscom` varchar(30) NOT NULL DEFAULT '',
  `expresssn` varchar(50) NOT NULL DEFAULT '',
  `express` varchar(255) DEFAULT '',
  `sendtime` int(11) DEFAULT '0',
  `fetchtime` int(11) DEFAULT '0',
  `cash` tinyint(3) DEFAULT '0',
  `canceltime` int(11) DEFAULT NULL,
  `cancelpaytime` int(11) DEFAULT '0',
  `refundtime` int(11) DEFAULT '0',
  `isverify` tinyint(3) DEFAULT '0',
  `verified` tinyint(3) DEFAULT '0',
  `verifyopenid` varchar(255) DEFAULT '',
  `verifycode` varchar(255) DEFAULT '',
  `verifytime` int(11) DEFAULT '0',
  `verifystoreid` int(11) DEFAULT '0',
  `deductprice` decimal(10,2) DEFAULT '0.00',
  `deductcredit` int(10) DEFAULT '0',
  `deductcredit2` decimal(10,2) DEFAULT '0.00',
  `deductenough` decimal(10,2) DEFAULT '0.00',
  `virtual` int(11) DEFAULT '0',
  `virtual_info` text,
  `virtual_str` text,
  `address` text,
  `sysdeleted` tinyint(3) DEFAULT '0',
  `ordersn2` int(11) DEFAULT '0',
  `changeprice` decimal(10,2) DEFAULT '0.00',
  `changedispatchprice` decimal(10,2) DEFAULT '0.00',
  `oldprice` decimal(10,2) DEFAULT '0.00',
  `olddispatchprice` decimal(10,2) DEFAULT '0.00',
  `isvirtual` tinyint(3) DEFAULT '0',
  `couponid` int(11) DEFAULT '0',
  `couponprice` decimal(10,2) DEFAULT '0.00',
  `diyformdata` text,
  `diyformfields` text,
  `diyformid` int(11) DEFAULT '0',
  `storeid` int(11) DEFAULT '0',
  `printstate` tinyint(1) DEFAULT '0',
  `printstate2` tinyint(1) DEFAULT '0',
  `address_send` text,
  `refundstate` tinyint(3) DEFAULT '0',
  `closereason` text,
  `remarksaler` text,
  `remarkclose` text,
  `remarksend` text,
  `ismr` int(1) NOT NULL DEFAULT '0',
  `isdiscountprice` decimal(10,2) DEFAULT '0.00',
  `isvirtualsend` tinyint(1) DEFAULT '0',
  `virtualsend_info` text,
  `verifyinfo` text,
  `verifytype` tinyint(1) DEFAULT '0',
  `verifycodes` text,
  `invoicename` varchar(255) DEFAULT '',
  `merchid` int(11) DEFAULT '0',
  `ismerch` tinyint(1) DEFAULT '0',
  `parentid` int(11) DEFAULT '0',
  `isparent` tinyint(1) DEFAULT '0',
  `grprice` decimal(10,2) DEFAULT '0.00',
  `merchshow` tinyint(1) DEFAULT '0',
  `merchdeductenough` decimal(10,2) DEFAULT '0.00',
  `couponmerchid` int(11) DEFAULT '0',
  `isglobonus` tinyint(3) DEFAULT '0',
  `merchapply` tinyint(1) DEFAULT '0',
  `isabonus` tinyint(3) DEFAULT '0',
  `isborrow` tinyint(3) DEFAULT '0',
  `borrowopenid` varchar(100) DEFAULT '',
  `merchisdiscountprice` decimal(10,2) DEFAULT '0.00',
  `apppay` tinyint(3) NOT NULL DEFAULT '0',
  `coupongoodprice` decimal(10,2) DEFAULT '1.00',
  `buyagainprice` decimal(10,2) DEFAULT '0.00',
  `authorid` int(11) DEFAULT '0',
  `isauthor` tinyint(1) DEFAULT '0',
  `ispackage` tinyint(3) DEFAULT '0',
  `packageid` int(11) DEFAULT '0',
  `taskdiscountprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `seckilldiscountprice` decimal(10,2) DEFAULT '0.00',
  `verifyendtime` int(11) NOT NULL DEFAULT '0',
  `willcancelmessage` tinyint(1) DEFAULT '0',
  `sendtype` tinyint(3) NOT NULL DEFAULT '0',
  `lotterydiscountprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `contype` tinyint(1) DEFAULT '0',
  `wxid` int(11) DEFAULT '0',
  `wxcardid` varchar(50) DEFAULT '',
  `wxcode` varchar(50) DEFAULT '',
  `dispatchkey` varchar(30) NOT NULL DEFAULT '',
  `quickid` int(11) NOT NULL DEFAULT '0',
  `istrade` tinyint(3) NOT NULL DEFAULT '0',
  `isnewstore` tinyint(3) NOT NULL DEFAULT '0',
  `liveid` int(11) DEFAULT NULL,
  `ordersn_trade` varchar(32) DEFAULT NULL,
  `tradestatus` tinyint(1) DEFAULT '0',
  `tradepaytype` tinyint(1) DEFAULT NULL,
  `tradepaytime` int(11) DEFAULT '0',
  `dowpayment` decimal(10,2) NOT NULL DEFAULT '0.00',
  `betweenprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `isshare` int(11) NOT NULL DEFAULT '0',
  `officcode` varchar(50) NOT NULL DEFAULT '',
  `wxapp_prepay_id` varchar(100) DEFAULT NULL,
  `cashtime` int(11) DEFAULT '0',
  `random_code` varchar(4) DEFAULT NULL,
  `print_template` text,
  `city_express_state` tinyint(1) DEFAULT NULL,
  `ces` int(1) DEFAULT NULL,
  `is_cashier` tinyint(3) DEFAULT NULL,
  `commissionmoney` decimal(10,2) DEFAULT '0.00',
  `iscycelbuy` tinyint(3) DEFAULT '0',
  `cycelbuy_predict_time` int(11) DEFAULT NULL,
  `cycelbuy_periodic` varchar(255) DEFAULT NULL,
  `invoice_img` varchar(255) DEFAULT '',
  `headsid` int(11) NOT NULL DEFAULT '0',
  `dividend` text,
  `dividend_applytime` int(11) NOT NULL DEFAULT '0',
  `dividend_checktime` int(11) NOT NULL DEFAULT '0',
  `dividend_paytime` int(11) NOT NULL DEFAULT '0',
  `dividend_invalidtime` int(11) NOT NULL DEFAULT '0',
  `dividend_deletetime` int(11) NOT NULL DEFAULT '0',
  `dividend_status` tinyint(3) NOT NULL DEFAULT '0',
  `dividend_content` text,
  `iswxappcreate` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_shareid` (`agentid`),
  KEY `idx_status` (`status`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_refundid` (`refundid`),
  KEY `idx_paytime` (`paytime`),
  KEY `idx_finishtime` (`finishtime`),
  KEY `idx_merchid` (`merchid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=157 ;

DROP TABLE IF EXISTS `ims_ewei_shop_order_buysend`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_order_buysend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `credit` float(10,2) DEFAULT '0.00',
  `money` decimal(10,2) DEFAULT '0.00',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_orderid` (`orderid`) USING BTREE,
  KEY `idx_openid` (`openid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_order_comment`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_order_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `nickname` varchar(50) DEFAULT '',
  `headimgurl` varchar(255) DEFAULT '',
  `level` tinyint(3) DEFAULT '0',
  `content` varchar(255) DEFAULT '',
  `images` text,
  `createtime` int(11) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `append_content` varchar(255) DEFAULT '',
  `append_images` text,
  `reply_content` varchar(255) DEFAULT '',
  `reply_images` text,
  `append_reply_content` varchar(255) DEFAULT '',
  `append_reply_images` text,
  `istop` tinyint(3) DEFAULT '0',
  `checked` tinyint(3) NOT NULL DEFAULT '0',
  `replychecked` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_orderid` (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

DROP TABLE IF EXISTS `ims_ewei_shop_order_goods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_order_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `total` int(11) DEFAULT '1',
  `optionid` int(10) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `optionname` text,
  `commission1` text,
  `applytime1` int(11) DEFAULT '0',
  `checktime1` int(10) DEFAULT '0',
  `paytime1` int(11) DEFAULT '0',
  `invalidtime1` int(11) DEFAULT '0',
  `deletetime1` int(11) DEFAULT '0',
  `status1` tinyint(3) DEFAULT '0',
  `content1` text,
  `commission2` text,
  `applytime2` int(11) DEFAULT '0',
  `checktime2` int(10) DEFAULT '0',
  `paytime2` int(11) DEFAULT '0',
  `invalidtime2` int(11) DEFAULT '0',
  `deletetime2` int(11) DEFAULT '0',
  `status2` tinyint(3) DEFAULT '0',
  `content2` text,
  `commission3` text,
  `applytime3` int(11) DEFAULT '0',
  `checktime3` int(10) DEFAULT '0',
  `paytime3` int(11) DEFAULT '0',
  `invalidtime3` int(11) DEFAULT '0',
  `deletetime3` int(11) DEFAULT '0',
  `status3` tinyint(3) DEFAULT '0',
  `content3` text,
  `realprice` decimal(10,2) DEFAULT '0.00',
  `goodssn` varchar(255) DEFAULT '',
  `productsn` varchar(255) DEFAULT '',
  `nocommission` tinyint(3) DEFAULT '0',
  `changeprice` decimal(10,2) DEFAULT '0.00',
  `oldprice` decimal(10,2) DEFAULT '0.00',
  `commissions` text,
  `diyformid` int(11) DEFAULT '0',
  `diyformdataid` int(11) DEFAULT '0',
  `diyformdata` text,
  `diyformfields` text,
  `openid` varchar(255) DEFAULT '',
  `printstate` int(11) NOT NULL DEFAULT '0',
  `printstate2` int(11) NOT NULL DEFAULT '0',
  `rstate` tinyint(3) DEFAULT '0',
  `refundtime` int(11) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `parentorderid` int(11) DEFAULT '0',
  `merchsale` tinyint(3) NOT NULL DEFAULT '0',
  `isdiscountprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `canbuyagain` tinyint(1) DEFAULT '0',
  `seckill` tinyint(3) DEFAULT '0',
  `seckill_taskid` int(11) DEFAULT '0',
  `seckill_roomid` int(11) DEFAULT '0',
  `seckill_timeid` int(11) DEFAULT '0',
  `is_make` tinyint(1) DEFAULT '0',
  `sendtype` tinyint(3) NOT NULL DEFAULT '0',
  `expresscom` varchar(30) NOT NULL,
  `expresssn` varchar(50) NOT NULL,
  `express` varchar(255) NOT NULL,
  `sendtime` int(11) NOT NULL,
  `finishtime` int(11) NOT NULL,
  `remarksend` text NOT NULL,
  `prohibitrefund` tinyint(3) NOT NULL DEFAULT '0',
  `storeid` varchar(255) NOT NULL,
  `trade_time` int(11) NOT NULL DEFAULT '0',
  `optime` varchar(30) NOT NULL,
  `tdate_time` int(11) NOT NULL DEFAULT '0',
  `dowpayment` decimal(10,2) NOT NULL DEFAULT '0.00',
  `peopleid` int(11) NOT NULL DEFAULT '0',
  `esheetprintnum` int(11) NOT NULL DEFAULT '0',
  `ordercode` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_orderid` (`orderid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_applytime1` (`applytime1`),
  KEY `idx_checktime1` (`checktime1`),
  KEY `idx_status1` (`status1`),
  KEY `idx_applytime2` (`applytime2`),
  KEY `idx_checktime2` (`checktime2`),
  KEY `idx_status2` (`status2`),
  KEY `idx_applytime3` (`applytime3`),
  KEY `idx_invalidtime1` (`invalidtime1`),
  KEY `idx_checktime3` (`checktime3`),
  KEY `idx_invalidtime2` (`invalidtime2`),
  KEY `idx_invalidtime3` (`invalidtime3`),
  KEY `idx_status3` (`status3`),
  KEY `idx_paytime1` (`paytime1`),
  KEY `idx_paytime2` (`paytime2`),
  KEY `idx_paytime3` (`paytime3`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=162 ;

DROP TABLE IF EXISTS `ims_ewei_shop_order_peerpay`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_order_peerpay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `orderid` int(11) NOT NULL DEFAULT '0',
  `peerpay_type` tinyint(1) NOT NULL DEFAULT '0',
  `peerpay_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `peerpay_maxprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `peerpay_realprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `peerpay_selfpay` decimal(10,2) NOT NULL DEFAULT '0.00',
  `peerpay_message` varchar(500) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`) USING BTREE,
  KEY `orderid` (`orderid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_order_peerpay_payinfo`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_order_peerpay_payinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `uname` varchar(255) NOT NULL DEFAULT '',
  `usay` varchar(500) NOT NULL DEFAULT '',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `createtime` int(11) NOT NULL DEFAULT '0',
  `headimg` varchar(255) DEFAULT NULL,
  `refundstatus` tinyint(1) NOT NULL DEFAULT '0',
  `refundprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tid` varchar(255) NOT NULL DEFAULT '',
  `openid` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_order_print`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_order_print` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(3) DEFAULT '0',
  `sid` tinyint(3) DEFAULT '0',
  `foid` tinyint(3) DEFAULT '0',
  `oid` int(11) DEFAULT '0',
  `pid` int(11) DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `addtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_order_refund`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_order_refund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `refundno` varchar(255) DEFAULT '',
  `price` varchar(255) DEFAULT '',
  `reason` varchar(255) DEFAULT '',
  `images` text,
  `content` text,
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `reply` text,
  `refundtype` tinyint(3) DEFAULT '0',
  `orderprice` decimal(10,2) DEFAULT '0.00',
  `applyprice` decimal(10,2) DEFAULT '0.00',
  `imgs` text,
  `rtype` tinyint(3) DEFAULT '0',
  `refundaddress` text,
  `message` text,
  `express` varchar(100) DEFAULT '',
  `expresscom` varchar(100) DEFAULT '',
  `expresssn` varchar(100) DEFAULT '',
  `operatetime` int(11) DEFAULT '0',
  `sendtime` int(11) DEFAULT '0',
  `returntime` int(11) DEFAULT '0',
  `refundtime` int(11) DEFAULT '0',
  `rexpress` varchar(100) DEFAULT '',
  `rexpresscom` varchar(100) DEFAULT '',
  `rexpresssn` varchar(100) DEFAULT '',
  `refundaddressid` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  `realprice` decimal(10,2) DEFAULT '0.00',
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

DROP TABLE IF EXISTS `ims_ewei_shop_package`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `freight` decimal(10,2) NOT NULL DEFAULT '0.00',
  `thumb` varchar(255) NOT NULL,
  `starttime` int(11) NOT NULL DEFAULT '0',
  `endtime` int(11) NOT NULL DEFAULT '0',
  `goodsid` varchar(255) NOT NULL,
  `cash` tinyint(3) NOT NULL DEFAULT '0',
  `share_title` varchar(255) NOT NULL,
  `share_icon` varchar(255) NOT NULL,
  `share_desc` varchar(500) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `deleted` tinyint(3) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  `dispatchtype` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_package_goods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_package_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `option` varchar(255) NOT NULL,
  `goodssn` varchar(255) NOT NULL,
  `productsn` varchar(255) NOT NULL,
  `hasoption` tinyint(3) NOT NULL DEFAULT '0',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `packageprice` decimal(10,2) DEFAULT '0.00',
  `commission1` decimal(10,2) DEFAULT '0.00',
  `commission2` decimal(10,2) DEFAULT '0.00',
  `commission3` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_package_goods_option`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_package_goods_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `goodsid` int(11) NOT NULL DEFAULT '0',
  `optionid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `packageprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `marketprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `commission1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `commission2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `commission3` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_payment`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(2) NOT NULL DEFAULT '0',
  `appid` varchar(255) DEFAULT '',
  `mch_id` varchar(50) NOT NULL DEFAULT '',
  `apikey` varchar(50) NOT NULL DEFAULT '',
  `sub_appid` varchar(50) DEFAULT '',
  `sub_appsecret` varchar(50) DEFAULT '',
  `sub_mch_id` varchar(50) DEFAULT '',
  `cert_file` text,
  `key_file` text,
  `root_file` text,
  `is_raw` tinyint(1) DEFAULT '0',
  `createtime` int(10) unsigned DEFAULT '0',
  `paytype` tinyint(3) NOT NULL DEFAULT '0',
  `alitype` tinyint(3) NOT NULL DEFAULT '0',
  `alipay_sec` text NOT NULL,
  `qpay_signtype` tinyint(1) NOT NULL DEFAULT '0',
  `app_qpay_public_key` text NOT NULL,
  `app_qpay_private_key` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_type` (`type`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_pc_adv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_pc_adv` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL,
  `advname` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `src` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `enabled` tinyint(3) unsigned NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `width` int(11) unsigned NOT NULL,
  `height` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

DROP TABLE IF EXISTS `ims_ewei_shop_pc_link`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_pc_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL,
  `linkname` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `displayorder` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_pc_menu`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_pc_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned NOT NULL,
  `type` int(11) unsigned DEFAULT '0',
  `displayorder` int(11) unsigned DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `enabled` tinyint(3) unsigned DEFAULT '1',
  `createtime` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

DROP TABLE IF EXISTS `ims_ewei_shop_pc_slide`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_pc_slide` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) unsigned DEFAULT '0',
  `type` int(11) unsigned DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `backcolor` varchar(255) DEFAULT NULL,
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  `shopid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

DROP TABLE IF EXISTS `ims_ewei_shop_perm_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_perm_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  `type` varchar(255) DEFAULT '',
  `op` text,
  `createtime` int(11) DEFAULT '0',
  `ip` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uid` (`uid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_uniacid` (`uniacid`),
  FULLTEXT KEY `idx_type` (`type`),
  FULLTEXT KEY `idx_op` (`op`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6725 ;

INSERT INTO `ims_ewei_shop_perm_log` (`id`, `uid`, `uniacid`, `name`, `type`, `op`, `createtime`, `ip`) VALUES
(6706, 1, 1, '店铺装修V2-系统页面-添加', 'diypage.page.sys.add', '添加系统页面 id: 18  名称:未命名页面  关键字: ', 1475642417, '::1'),
(6707, 1, 1, '设置-短信提醒-短信模板库-添加', 'sysset.sms.temp.add', '添加短信模板 ID: 5 标题:  ', 1475642631, '::1'),
(6708, 1, 1, '设置-全网通设置-修改', 'sysset.wap.edit', '修改WAP设置', 1475642647, '::1'),
(6709, 1, 1, '设置-短信提醒-短信模板库-删除', 'sysset.sms.temp.delete', '删除短信模板 id: 5  名称:1', 1476256530, '::1'),
(6710, 1, 1, '多商户-基本设置-修改', 'merch.set.edit', '修改基本设置', 1481269608, '::1'),
(6711, 1, 1, '游戏营销-修改', 'lottery.edit', '', 1490848160, '::1'),
(6712, 1, 1, '游戏营销-删除', 'lottery.delete', 'ɾ', 1490848185, '::1'),
(6713, 1, 1, '游戏营销-删除', 'lottery.delete', 'ɾ', 1490848191, '::1'),
(6714, 1, 1, '游戏营销-修改', 'lottery.edit', '', 1490848228, '::1'),
(6715, 1, 1, '游戏营销-修改', 'lottery.edit', '', 1490848232, '::1'),
(6716, 1, 1, '游戏营销-修改', 'lottery.edit', '', 1490951101, '::1'),
(6717, 1, 1, '游戏营销-修改', 'lottery.edit', '', 1490951218, '::1'),
(6718, 1, 1, '游戏营销-删除', 'lottery.delete', 'ɾ', 1490951325, '::1'),
(6719, 1, 1, '游戏营销-修改', 'lottery.edit', '', 1490951335, '::1'),
(6720, 1, 1, '游戏营销-修改', 'lottery.edit', '修改抽奖活动 ID: 3<br>', 1490951780, '::1'),
(6721, 1, 1, '营销-修改满额立减', 'sale.enough', '修改满额立减优惠', 1490953076, '::1'),
(6722, 1, 1, '', 'taobao.main', '淘宝抓取宝贝 淘宝id:548406326753', 1492775560, '::1'),
(6723, 1, 1, '商品管理-删除', 'goods.delete', '删除商品 ID: 198 商品名称: 一字扣高跟鞋女夏季2017新款韩版坡跟厚底女鞋子女士百搭凉鞋夏天 ', 1492775599, '::1'),
(6724, 1, 1, '商品管理-修改', 'goods.edit', '从回收站彻底删除商品<br/>ID: 198<br/>商品名称: 一字扣高跟鞋女夏季2017新款韩版坡跟厚底女鞋子女士百搭凉鞋夏天', 1492775604, '::1');

DROP TABLE IF EXISTS `ims_ewei_shop_perm_plugin`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_perm_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `type` tinyint(3) DEFAULT '0',
  `plugins` text,
  `coms` text,
  `datas` text,
  PRIMARY KEY (`id`),
  KEY `idx_uid` (`uid`),
  KEY `idx_acid` (`acid`),
  KEY `idx_type` (`type`),
  KEY `idx_uniacid` (`acid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_perm_role`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_perm_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `rolename` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `perms` text,
  `deleted` tinyint(3) DEFAULT '0',
  `perms2` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_status` (`status`),
  KEY `idx_deleted` (`deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

DROP TABLE IF EXISTS `ims_ewei_shop_perm_user`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_perm_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `roleid` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `perms` text,
  `deleted` tinyint(3) DEFAULT '0',
  `realname` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `perms2` text,
  `openid` varchar(50) DEFAULT NULL,
  `openid_wa` varchar(50) DEFAULT NULL,
  `member_nick` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_uid` (`uid`),
  KEY `idx_roleid` (`roleid`),
  KEY `idx_status` (`status`),
  KEY `idx_deleted` (`deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_plugin`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `displayorder` int(11) DEFAULT '0',
  `identity` varchar(50) DEFAULT '',
  `category` varchar(255) DEFAULT '',
  `name` varchar(50) DEFAULT '',
  `version` varchar(10) DEFAULT '',
  `author` varchar(20) DEFAULT '',
  `status` int(11) DEFAULT '0',
  `thumb` varchar(255) DEFAULT '',
  `desc` text,
  `iscom` tinyint(3) DEFAULT '0',
  `deprecated` tinyint(3) DEFAULT '0',
  `isv2` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_identity` (`identity`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

INSERT INTO `ims_ewei_shop_plugin` (`id`, `displayorder`, `identity`, `category`, `name`, `version`, `author`, `status`, `thumb`, `desc`, `iscom`, `deprecated`, `isv2`) VALUES
(1, 1, 'qiniu', 'tool', '七牛存储', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/qiniu.jpg', NULL, 1, 0, 0),
(2, 2, 'taobao', 'tool', '商品助手', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/taobao.jpg', '', 0, 0, 0),
(3, 3, 'commission', 'biz', '人人分销', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/commission.jpg', '', 0, 0, 0),
(4, 4, 'poster', 'sale', '超级海报', '1.2', '官方', 1, '../addons/ewei_shopv2/static/images/poster.jpg', '', 0, 0, 0),
(5, 5, 'verify', 'biz', 'O2O核销', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/verify.jpg', NULL, 1, 0, 0),
(6, 6, 'tmessage', 'tool', '会员群发', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/tmessage.jpg', NULL, 1, 0, 0),
(7, 7, 'perm', 'help', '分权系统', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/perm.jpg', NULL, 1, 0, 0),
(8, 8, 'sale', 'sale', '营销宝', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/sale.jpg', NULL, 1, 0, 0),
(9, 9, 'designer', 'help', '店铺装修V1', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/designer.jpg', NULL, 0, 1, 0),
(10, 10, 'creditshop', 'biz', '积分商城', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/creditshop.jpg', '', 0, 0, 0),
(11, 11, 'virtual', 'biz', '虚拟物品', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/virtual.jpg', NULL, 1, 0, 0),
(12, 11, 'article', 'help', '文章营销', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/article.jpg', '', 0, 0, 0),
(13, 13, 'coupon', 'sale', '超级券', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/coupon.jpg', NULL, 1, 0, 0),
(14, 14, 'postera', 'sale', '活动海报', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/postera.jpg', '', 0, 0, 0),
(15, 16, 'system', 'help', '系统工具', '1.0', '官方', 0, '../addons/ewei_shopv2/static/images/system.jpg', NULL, 0, 1, 0),
(16, 15, 'diyform', 'help', '自定表单', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/diyform.jpg', '', 0, 0, 0),
(17, 16, 'exhelper', 'help', '快递助手', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/exhelper.jpg', '', 0, 0, 0),
(18, 19, 'groups', 'biz', '人人拼团', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/groups.jpg', '', 0, 0, 0),
(19, 20, 'diypage', 'help', '店铺装修', '2.0', '官方', 1, '../addons/ewei_shopv2/static/images/designer.jpg', '', 0, 0, 0),
(20, 22, 'globonus', 'biz', '全民股东', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/globonus.jpg', '', 0, 0, 0),
(21, 23, 'merch', 'biz', '多商户', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/merch.jpg', '', 0, 0, 1),
(22, 26, 'qa', 'help', '帮助中心', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/qa.jpg', '', 0, 0, 1),
(24, 27, 'sms', 'tool', '短信提醒', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/sms.jpg', '', 1, 0, 1),
(25, 29, 'sign', 'tool', '积分签到', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/sign.jpg', '', 0, 0, 1),
(26, 30, 'sns', 'sale', '全民社区', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/sns.jpg', '', 0, 0, 1),
(27, 33, 'wap', 'tool', '全网通', '1.0', '官方', 1, '', '', 1, 0, 1),
(28, 34, 'h5app', 'tool', 'H5APP', '1.0', '官方', 1, '', '', 1, 0, 1),
(29, 26, 'abonus', 'biz', '区域代理', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/abonus.jpg', '', 0, 0, 1),
(30, 33, 'printer', 'tool', '小票打印机', '1.0', '官方', 1, '', '', 1, 0, 1),
(31, 34, 'bargain', 'tool', '砍价活动', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/bargain.jpg', '', 0, 0, 1),
(32, 35, 'task', 'sale', '任务中心', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/task.jpg', '', 0, 0, 1),
(33, 36, 'cashier', 'biz', '收银台', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/cashier.jpg', '', 0, 0, 1),
(34, 37, 'messages', 'tool', '消息群发', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/messages.jpg', '', 0, 0, 1),
(35, 38, 'seckill', 'sale', '整点秒杀', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/seckill.jpg', '', 0, 0, 1),
(36, 39, 'exchange', 'biz', '兑换中心', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/exchange.jpg', '', 0, 0, 1),
(37, 40, 'lottery', 'biz', '游戏营销', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/lottery.jpg', '', 0, 0, 1),
(38, 41, 'wxcard', 'sale', '微信卡券', '1.0', '官方', 1, '', '', 1, 0, 1),
(39, 42, 'quick', 'biz', '快速购买', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/quick.jpg', '', 0, 0, 1),
(40, 43, 'mmanage', 'tool', '手机端商家管理中心', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/mmanage.jpg', '', 0, 0, 1),
(41, 44, 'pc', 'tool', 'PC端', '1.0', '二开', 1, '../addons/ewei_shopv2/static/images/pc.jpg', '', 0, 0, 0),
(42, 45, 'live', 'sale', '互动直播', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/live.jpg', '', 0, 0, 1),
(43, 46, 'invitation', 'sale', '邀请卡', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/invitation.png', '', 0, 0, 1),
(60, 60, 'cycelbuy', 'biz', '周期购', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/cycelbuy.jpg', '', 0, 0, 1),
(70, 70, 'dividend', 'biz', '团队分红', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/dividend.jpg', '', 0, 0, 1),
(80, 80, 'merchmanage', 'tool', '多商户手机管理端', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/merchmanage.jpg', '', 0, 0, 1);

DROP TABLE IF EXISTS `ims_ewei_shop_polyapi_key`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_polyapi_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  `appkey` varchar(200) NOT NULL DEFAULT '',
  `token` varchar(200) NOT NULL DEFAULT '',
  `appsecret` varchar(200) NOT NULL DEFAULT '',
  `createtime` int(11) NOT NULL DEFAULT '0',
  `updatetime` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_appkey` (`appkey`) USING BTREE,
  KEY `idx_token` (`token`) USING BTREE,
  KEY `idx_appsecret` (`appsecret`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_poster`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_poster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `type` tinyint(3) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `bg` varchar(255) DEFAULT '',
  `data` text,
  `keyword` varchar(255) DEFAULT '',
  `times` int(11) DEFAULT '0',
  `follows` int(11) DEFAULT '0',
  `isdefault` tinyint(3) DEFAULT '0',
  `resptitle` varchar(255) DEFAULT '',
  `respthumb` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `respdesc` varchar(255) DEFAULT '',
  `respurl` varchar(255) DEFAULT '',
  `waittext` varchar(255) DEFAULT '',
  `oktext` varchar(255) DEFAULT '',
  `subcredit` int(11) DEFAULT '0',
  `submoney` decimal(10,2) DEFAULT '0.00',
  `reccredit` int(11) DEFAULT '0',
  `recmoney` decimal(10,2) DEFAULT '0.00',
  `paytype` tinyint(1) NOT NULL DEFAULT '0',
  `scantext` varchar(255) DEFAULT '',
  `subtext` varchar(255) DEFAULT '',
  `beagent` tinyint(3) DEFAULT '0',
  `bedown` tinyint(3) DEFAULT '0',
  `isopen` tinyint(3) DEFAULT '0',
  `opentext` varchar(255) DEFAULT '',
  `openurl` varchar(255) DEFAULT '',
  `templateid` varchar(255) DEFAULT '',
  `subpaycontent` text,
  `recpaycontent` varchar(255) DEFAULT '',
  `entrytext` varchar(255) DEFAULT '',
  `reccouponid` int(11) DEFAULT '0',
  `reccouponnum` int(11) DEFAULT '0',
  `subcouponid` int(11) DEFAULT '0',
  `subcouponnum` int(11) DEFAULT '0',
  `resptype` tinyint(3) DEFAULT '0',
  `resptext` text,
  `keyword2` varchar(255) DEFAULT '',
  `resptext11` text,
  `reward_totle` varchar(500) DEFAULT '',
  `ismembergroup` tinyint(3) DEFAULT '0',
  `membergroupid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_type` (`type`),
  KEY `idx_times` (`times`),
  KEY `idx_isdefault` (`isdefault`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

DROP TABLE IF EXISTS `ims_ewei_shop_postera`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_postera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `type` tinyint(3) DEFAULT '0',
  `days` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `bg` varchar(255) DEFAULT '',
  `data` text,
  `keyword` varchar(255) DEFAULT '',
  `isdefault` tinyint(3) DEFAULT '0',
  `resptitle` varchar(255) DEFAULT '',
  `respthumb` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `respdesc` varchar(255) DEFAULT '',
  `respurl` varchar(255) DEFAULT '',
  `waittext` varchar(255) DEFAULT '',
  `oktext` varchar(255) DEFAULT '',
  `subcredit` int(11) DEFAULT '0',
  `submoney` decimal(10,2) DEFAULT '0.00',
  `reccredit` int(11) DEFAULT '0',
  `recmoney` decimal(10,2) DEFAULT '0.00',
  `scantext` varchar(255) DEFAULT '',
  `subtext` varchar(255) DEFAULT '',
  `beagent` tinyint(3) DEFAULT '0',
  `bedown` tinyint(3) DEFAULT '0',
  `isopen` tinyint(3) DEFAULT '0',
  `opentext` varchar(255) DEFAULT '',
  `openurl` varchar(255) DEFAULT '',
  `paytype` tinyint(1) NOT NULL DEFAULT '0',
  `subpaycontent` text,
  `recpaycontent` varchar(255) DEFAULT '',
  `templateid` varchar(255) DEFAULT '',
  `entrytext` varchar(255) DEFAULT '',
  `reccouponid` int(11) DEFAULT '0',
  `reccouponnum` int(11) DEFAULT '0',
  `subcouponid` int(11) DEFAULT '0',
  `subcouponnum` int(11) DEFAULT '0',
  `timestart` int(11) DEFAULT '0',
  `timeend` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `starttext` varchar(255) DEFAULT '',
  `endtext` varchar(255) DEFAULT NULL,
  `resptype` tinyint(3) DEFAULT '0',
  `resptext` text,
  `testflag` tinyint(1) DEFAULT '0',
  `keyword2` varchar(255) DEFAULT '',
  `reward_totle` varchar(500) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_type` (`type`),
  KEY `idx_isdefault` (`isdefault`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

DROP TABLE IF EXISTS `ims_ewei_shop_postera_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_postera_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `posterid` int(11) DEFAULT '0',
  `from_openid` varchar(255) DEFAULT '',
  `subcredit` int(11) DEFAULT '0',
  `submoney` decimal(10,2) DEFAULT '0.00',
  `reccredit` int(11) DEFAULT '0',
  `recmoney` decimal(10,2) DEFAULT '0.00',
  `createtime` int(11) DEFAULT '0',
  `reccouponid` int(11) DEFAULT '0',
  `reccouponnum` int(11) DEFAULT '0',
  `subcouponid` int(11) DEFAULT '0',
  `subcouponnum` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_posteraid` (`posterid`),
  KEY `idx_from_openid` (`from_openid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_postera_qr`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_postera_qr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acid` int(10) unsigned NOT NULL,
  `openid` varchar(100) NOT NULL DEFAULT '',
  `posterid` int(11) DEFAULT '0',
  `type` tinyint(3) DEFAULT '0',
  `sceneid` int(11) DEFAULT '0',
  `mediaid` varchar(255) DEFAULT '',
  `ticket` varchar(250) NOT NULL,
  `url` varchar(80) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `goodsid` int(11) DEFAULT '0',
  `qrimg` varchar(1000) DEFAULT '',
  `expire` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  `qrtime` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_acid` (`acid`),
  KEY `idx_sceneid` (`sceneid`),
  KEY `idx_type` (`type`),
  KEY `idx_posterid` (`posterid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

DROP TABLE IF EXISTS `ims_ewei_shop_poster_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_poster_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `posterid` int(11) DEFAULT '0',
  `from_openid` varchar(255) DEFAULT '',
  `subcredit` int(11) DEFAULT '0',
  `submoney` decimal(10,2) DEFAULT '0.00',
  `reccredit` int(11) DEFAULT '0',
  `recmoney` decimal(10,2) DEFAULT '0.00',
  `createtime` int(11) DEFAULT '0',
  `reccouponid` int(11) DEFAULT '0',
  `reccouponnum` int(11) DEFAULT '0',
  `subcouponid` int(11) DEFAULT '0',
  `subcouponnum` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_posterid` (`posterid`),
  KEY `idx_from_openid` (`from_openid`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_poster_qr`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_poster_qr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acid` int(10) unsigned NOT NULL,
  `openid` varchar(100) NOT NULL DEFAULT '',
  `type` tinyint(3) DEFAULT '0',
  `sceneid` int(11) DEFAULT '0',
  `mediaid` varchar(255) DEFAULT '',
  `ticket` varchar(250) NOT NULL,
  `url` varchar(80) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `goodsid` int(11) DEFAULT '0',
  `qrimg` varchar(1000) DEFAULT '',
  `scenestr` varchar(255) DEFAULT '',
  `posterid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_acid` (`acid`),
  KEY `idx_sceneid` (`sceneid`),
  KEY `idx_type` (`type`),
  KEY `idx_openid` (`openid`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

DROP TABLE IF EXISTS `ims_ewei_shop_poster_scan`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_poster_scan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `posterid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `from_openid` varchar(255) DEFAULT '',
  `scantime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_posterid` (`posterid`),
  KEY `idx_scantime` (`scantime`),
  KEY `idx_openid` (`openid`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

DROP TABLE IF EXISTS `ims_ewei_shop_print`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_print` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(3) DEFAULT '0',
  `name` varchar(200) DEFAULT '',
  `print_no` varchar(200) DEFAULT '',
  `key` varchar(200) DEFAULT '',
  `print_nums` tinyint(3) DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `sid` tinyint(3) DEFAULT '0',
  `print_type` tinyint(3) DEFAULT '0',
  `qrcode_link` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_qa_adv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_qa_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_qa_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_qa_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `displayorder` tinyint(3) unsigned DEFAULT '0',
  `enabled` tinyint(1) DEFAULT '1',
  `isrecommand` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

DROP TABLE IF EXISTS `ims_ewei_shop_qa_question`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_qa_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `cate` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `content` mediumtext NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `isrecommand` tinyint(3) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL DEFAULT '0',
  `lastedittime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

DROP TABLE IF EXISTS `ims_ewei_shop_qa_set`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_qa_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `showmember` tinyint(3) NOT NULL DEFAULT '0',
  `showtype` tinyint(3) NOT NULL DEFAULT '0',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `enter_title` varchar(255) NOT NULL DEFAULT '',
  `enter_img` varchar(255) NOT NULL DEFAULT '',
  `enter_desc` varchar(255) NOT NULL DEFAULT '',
  `share` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_unaicid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_quick`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_quick` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `datas` mediumtext,
  `cart` tinyint(3) NOT NULL DEFAULT '0',
  `createtime` int(11) DEFAULT NULL,
  `lasttime` int(11) DEFAULT NULL,
  `share_title` varchar(255) DEFAULT NULL,
  `share_desc` varchar(255) DEFAULT NULL,
  `share_icon` varchar(255) DEFAULT NULL,
  `enter_title` varchar(255) DEFAULT NULL,
  `enter_desc` varchar(255) DEFAULT NULL,
  `enter_icon` varchar(255) DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_quick_adv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_quick_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `merchid` int(11) NOT NULL DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_enabled` (`enabled`) USING BTREE,
  KEY `idx_displayorder` (`displayorder`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_quick_cart`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_quick_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `quickid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(100) DEFAULT '',
  `goodsid` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `deleted` tinyint(1) DEFAULT '0',
  `optionid` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `diyformdataid` int(11) DEFAULT NULL,
  `diyformdata` text,
  `diyformfields` text,
  `diyformid` int(11) DEFAULT '0',
  `selected` tinyint(1) DEFAULT '1',
  `merchid` int(11) DEFAULT '0',
  `selectedadd` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_goodsid` (`goodsid`) USING BTREE,
  KEY `idx_openid` (`openid`) USING BTREE,
  KEY `idx_deleted` (`deleted`) USING BTREE,
  KEY `idx_merchid` (`merchid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_refund_address`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_refund_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `title` varchar(20) DEFAULT '',
  `name` varchar(20) DEFAULT '',
  `tel` varchar(20) DEFAULT '',
  `mobile` varchar(11) DEFAULT '',
  `province` varchar(30) DEFAULT '',
  `city` varchar(30) DEFAULT '',
  `area` varchar(30) DEFAULT '',
  `address` varchar(300) DEFAULT '',
  `isdefault` tinyint(1) DEFAULT '0',
  `zipcode` varchar(255) DEFAULT '',
  `content` text,
  `deleted` tinyint(1) DEFAULT '0',
  `openid` varchar(50) DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_isdefault` (`isdefault`),
  KEY `idx_deleted` (`deleted`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

DROP TABLE IF EXISTS `ims_ewei_shop_saler`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_saler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storeid` int(11) DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `salername` varchar(255) DEFAULT '',
  `username` varchar(50) DEFAULT '',
  `pwd` varchar(255) DEFAULT '',
  `salt` varchar(255) DEFAULT '',
  `lastvisit` varchar(255) DEFAULT '',
  `lastip` varchar(255) DEFAULT '',
  `isfounder` tinyint(3) DEFAULT '0',
  `mobile` varchar(255) DEFAULT '',
  `getmessage` tinyint(1) DEFAULT '0',
  `getnotice` tinyint(1) DEFAULT '0',
  `roleid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_storeid` (`storeid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sale_coupon`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sale_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  `type` tinyint(3) DEFAULT '0',
  `ckey` decimal(10,2) DEFAULT '0.00',
  `cvalue` decimal(10,2) DEFAULT '0.00',
  `nums` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sale_coupon_data`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sale_coupon_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `couponid` int(11) DEFAULT '0',
  `gettime` int(11) DEFAULT '0',
  `gettype` tinyint(3) DEFAULT '0',
  `usedtime` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_couponid` (`couponid`),
  KEY `idx_gettime` (`gettime`),
  KEY `idx_gettype` (`gettype`),
  KEY `idx_usedtime` (`usedtime`),
  KEY `idx_orderid` (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_seckill_adv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_seckill_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_displayorder` (`displayorder`) USING BTREE,
  KEY `idx_enabled` (`enabled`) USING BTREE,
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_seckill_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_seckill_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_seckill_task`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_seckill_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `cateid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `enabled` tinyint(3) DEFAULT '0',
  `page_title` varchar(255) DEFAULT '',
  `share_title` varchar(255) DEFAULT '',
  `share_desc` varchar(255) DEFAULT '',
  `share_icon` varchar(255) DEFAULT '',
  `tag` varchar(10) DEFAULT '',
  `closesec` int(11) DEFAULT '0',
  `oldshow` tinyint(3) DEFAULT '0',
  `times` text,
  `createtime` int(11) DEFAULT '0',
  `overtimes` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_status` (`enabled`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_seckill_task_goods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_seckill_task_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `taskid` int(11) DEFAULT '0',
  `roomid` int(11) DEFAULT '0',
  `timeid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `optionid` int(11) DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `total` int(11) DEFAULT '0',
  `maxbuy` int(11) DEFAULT '0',
  `totalmaxbuy` int(11) DEFAULT '0',
  `commission1` decimal(10,2) DEFAULT '0.00',
  `commission2` decimal(10,2) DEFAULT '0.00',
  `commission3` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_goodsid` (`goodsid`) USING BTREE,
  KEY `idx_optionid` (`optionid`) USING BTREE,
  KEY `idx_displayorder` (`displayorder`) USING BTREE,
  KEY `idx_taskid` (`taskid`) USING BTREE,
  KEY `idx_roomid` (`roomid`) USING BTREE,
  KEY `idx_time` (`timeid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_seckill_task_room`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_seckill_task_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `taskid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `enabled` tinyint(3) DEFAULT '0',
  `page_title` varchar(255) DEFAULT '',
  `share_title` varchar(255) DEFAULT '',
  `share_desc` varchar(255) DEFAULT '',
  `share_icon` varchar(255) DEFAULT '',
  `oldshow` tinyint(3) DEFAULT '0',
  `tag` varchar(10) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `diypage` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_taskid` (`taskid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_seckill_task_time`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_seckill_task_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `taskid` int(11) DEFAULT '0',
  `time` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sendticket`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sendticket` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `cpid` varchar(200) NOT NULL,
  `expiration` int(11) NOT NULL DEFAULT '0',
  `starttime` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '新人礼包',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sendticket_draw`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sendticket_draw` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `cpid` varchar(50) NOT NULL,
  `openid` varchar(200) NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sendticket_share`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sendticket_share` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `sharetitle` varchar(255) NOT NULL,
  `shareicon` varchar(255) DEFAULT NULL,
  `sharedesc` varchar(255) DEFAULT NULL,
  `expiration` int(11) NOT NULL DEFAULT '0',
  `starttime` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL,
  `paycpid1` int(11) DEFAULT NULL,
  `paycpid2` int(11) DEFAULT NULL,
  `paycpid3` int(11) DEFAULT NULL,
  `paycpnum1` int(11) DEFAULT NULL,
  `paycpnum2` int(11) DEFAULT NULL,
  `paycpnum3` int(11) DEFAULT NULL,
  `sharecpid1` int(11) DEFAULT NULL,
  `sharecpid2` int(11) DEFAULT NULL,
  `sharecpid3` int(11) DEFAULT NULL,
  `sharecpnum1` int(11) DEFAULT NULL,
  `sharecpnum2` int(11) DEFAULT NULL,
  `sharecpnum3` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `enough` decimal(10,2) DEFAULT NULL,
  `issync` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sign_records`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sign_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(50) NOT NULL DEFAULT '',
  `credit` int(11) NOT NULL DEFAULT '0',
  `log` varchar(255) DEFAULT '',
  `type` tinyint(3) NOT NULL DEFAULT '0',
  `day` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_time` (`time`),
  KEY `idx_type` (`type`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=602 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sign_set`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sign_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `iscenter` tinyint(3) NOT NULL DEFAULT '0',
  `iscreditshop` tinyint(3) NOT NULL DEFAULT '0',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `desc` varchar(255) NOT NULL DEFAULT '',
  `isopen` tinyint(3) NOT NULL DEFAULT '0',
  `signold` tinyint(3) NOT NULL DEFAULT '0',
  `signold_price` int(11) NOT NULL DEFAULT '0',
  `signold_type` tinyint(3) NOT NULL DEFAULT '0',
  `textsign` varchar(255) NOT NULL DEFAULT '',
  `textsignold` varchar(255) NOT NULL DEFAULT '',
  `textsigned` varchar(255) NOT NULL DEFAULT '',
  `textsignforget` varchar(255) NOT NULL DEFAULT '',
  `maincolor` varchar(20) NOT NULL DEFAULT '',
  `cycle` tinyint(3) NOT NULL DEFAULT '0',
  `reward_default_first` int(11) NOT NULL DEFAULT '0',
  `reward_default_day` int(11) NOT NULL DEFAULT '0',
  `reword_order` text NOT NULL,
  `reword_sum` text NOT NULL,
  `reword_special` text NOT NULL,
  `sign_rule` text NOT NULL,
  `share` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sign_user`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sign_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(255) NOT NULL DEFAULT '',
  `order` int(11) NOT NULL DEFAULT '0',
  `orderday` int(11) NOT NULL DEFAULT '0',
  `sum` int(11) NOT NULL DEFAULT '0',
  `signdate` varchar(10) DEFAULT '',
  `isminiprogram` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=146 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sms`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL DEFAULT '',
  `template` tinyint(3) NOT NULL DEFAULT '0',
  `smstplid` varchar(255) NOT NULL DEFAULT '',
  `smssign` varchar(255) NOT NULL DEFAULT '',
  `content` varchar(100) NOT NULL DEFAULT '',
  `data` text NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sms_set`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sms_set` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `juhe` tinyint(3) NOT NULL DEFAULT '0',
  `juhe_key` varchar(255) NOT NULL DEFAULT '',
  `dayu` tinyint(3) NOT NULL DEFAULT '0',
  `dayu_key` varchar(255) NOT NULL DEFAULT '',
  `dayu_secret` varchar(255) NOT NULL DEFAULT '',
  `emay` tinyint(3) NOT NULL DEFAULT '0',
  `emay_url` varchar(255) NOT NULL DEFAULT '',
  `emay_sn` varchar(255) NOT NULL DEFAULT '',
  `emay_pw` varchar(255) NOT NULL DEFAULT '',
  `emay_sk` varchar(255) NOT NULL DEFAULT '',
  `emay_phost` varchar(255) NOT NULL DEFAULT '',
  `emay_pport` int(11) NOT NULL DEFAULT '0',
  `emay_puser` varchar(255) NOT NULL DEFAULT '',
  `emay_ppw` varchar(255) NOT NULL DEFAULT '',
  `emay_out` int(11) NOT NULL DEFAULT '0',
  `emay_outresp` int(11) NOT NULL DEFAULT '30',
  `emay_warn` decimal(10,2) NOT NULL DEFAULT '0.00',
  `emay_mobile` varchar(11) NOT NULL DEFAULT '',
  `emay_warn_time` int(11) NOT NULL DEFAULT '0',
  `aliyun` tinyint(3) NOT NULL DEFAULT '0',
  `aliyun_appcode` varchar(255) NOT NULL,
  `aliyun_new` tinyint(3) NOT NULL DEFAULT '0',
  `aliyun_new_keyid` varchar(255) NOT NULL DEFAULT '',
  `aliyun_new_keysecret` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `ims_ewei_shop_sms_set` (`id`, `uniacid`, `juhe`, `juhe_key`, `dayu`, `dayu_key`, `dayu_secret`, `emay`, `emay_url`, `emay_sn`, `emay_pw`, `emay_sk`, `emay_phost`, `emay_pport`, `emay_puser`, `emay_ppw`, `emay_out`, `emay_outresp`, `emay_warn`, `emay_mobile`, `emay_warn_time`, `aliyun`, `aliyun_appcode`, `aliyun_new`, `aliyun_new_keyid`, `aliyun_new_keysecret`) VALUES
(2, 1, 0, '', 1, '1', '1', 0, '', '', '', '', '', 0, '', '', 0, 30, '0.00', '0', 0, 0, '', 0, '', '');

DROP TABLE IF EXISTS `ims_ewei_shop_sns_adv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sns_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sns_board`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sns_board` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `cid` int(11) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `logo` varchar(255) DEFAULT '',
  `desc` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  `showgroups` text,
  `showlevels` text,
  `postgroups` text,
  `postlevels` text,
  `showagentlevels` text,
  `postagentlevels` text,
  `postcredit` int(11) DEFAULT '0',
  `replycredit` int(11) DEFAULT '0',
  `bestcredit` int(11) DEFAULT '0',
  `bestboardcredit` int(11) DEFAULT '0',
  `notagent` tinyint(3) DEFAULT '0',
  `notagentpost` tinyint(3) DEFAULT '0',
  `topcredit` int(11) DEFAULT '0',
  `topboardcredit` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `noimage` tinyint(3) DEFAULT '0',
  `novoice` tinyint(3) DEFAULT '0',
  `needfollow` tinyint(3) DEFAULT '0',
  `needpostfollow` tinyint(3) DEFAULT '0',
  `share_title` varchar(255) DEFAULT '',
  `share_icon` varchar(255) DEFAULT '',
  `share_desc` varchar(255) DEFAULT '',
  `keyword` varchar(255) DEFAULT '',
  `isrecommand` tinyint(3) DEFAULT '0',
  `banner` varchar(255) DEFAULT '',
  `needcheck` tinyint(3) DEFAULT '0',
  `needcheckmanager` tinyint(3) DEFAULT '0',
  `needcheckreply` int(11) DEFAULT '0',
  `needcheckreplymanager` int(11) DEFAULT '0',
  `showsnslevels` text,
  `postsnslevels` text,
  `showpartnerlevels` text,
  `postpartnerlevels` text,
  `notpartner` tinyint(3) DEFAULT '0',
  `notpartnerpost` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sns_board_follow`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sns_board_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `bid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT NULL,
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_bid` (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sns_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sns_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `displayorder` tinyint(3) unsigned DEFAULT '0',
  `enabled` tinyint(1) DEFAULT '1',
  `advimg` varchar(255) DEFAULT '',
  `advurl` varchar(500) DEFAULT '',
  `isrecommand` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_isrecommand` (`isrecommand`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sns_complain`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sns_complain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(3) NOT NULL,
  `postsid` int(11) NOT NULL DEFAULT '0',
  `defendant` varchar(255) NOT NULL DEFAULT '0',
  `complainant` varchar(255) NOT NULL DEFAULT '0',
  `complaint_type` int(10) NOT NULL DEFAULT '0',
  `complaint_text` text NOT NULL,
  `images` text NOT NULL,
  `createtime` int(11) NOT NULL DEFAULT '0',
  `checkedtime` int(11) NOT NULL DEFAULT '0',
  `checked` tinyint(3) NOT NULL DEFAULT '0',
  `checked_note` varchar(255) NOT NULL,
  `deleted` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sns_complaincate`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sns_complaincate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sns_level`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sns_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `levelname` varchar(255) DEFAULT '',
  `credit` int(11) DEFAULT '0',
  `enabled` tinyint(3) DEFAULT '0',
  `post` int(11) DEFAULT '0',
  `color` varchar(255) DEFAULT '',
  `bg` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_enabled` (`enabled`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sns_like`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sns_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `pid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sns_manage`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sns_manage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `bid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `enabled` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_bid` (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sns_member`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sns_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `credit` int(11) DEFAULT '0',
  `sign` varchar(255) DEFAULT '',
  `isblack` tinyint(3) DEFAULT '0',
  `notupgrade` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sns_post`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sns_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `bid` int(11) DEFAULT '0',
  `pid` int(11) DEFAULT '0',
  `rpid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `avatar` varchar(255) DEFAULT '',
  `nickname` varchar(255) DEFAULT '',
  `title` varchar(50) DEFAULT '',
  `content` text,
  `images` text,
  `voice` varchar(255) DEFAULT NULL,
  `createtime` int(11) DEFAULT '0',
  `replytime` int(11) DEFAULT '0',
  `credit` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `islock` tinyint(1) DEFAULT '0',
  `istop` tinyint(1) DEFAULT '0',
  `isboardtop` tinyint(1) DEFAULT '0',
  `isbest` tinyint(1) DEFAULT '0',
  `isboardbest` tinyint(3) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `deletedtime` int(11) DEFAULT '0',
  `checked` tinyint(3) DEFAULT NULL,
  `checktime` int(11) DEFAULT '0',
  `isadmin` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_bid` (`bid`),
  KEY `idx_pid` (`pid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_islock` (`islock`),
  KEY `idx_istop` (`istop`),
  KEY `idx_isboardtop` (`isboardtop`),
  KEY `idx_isbest` (`isbest`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_deletetime` (`deletedtime`),
  KEY `idx_checked` (`checked`),
  KEY `idx_rpid` (`rpid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_store`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `storename` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `tel` varchar(255) DEFAULT '',
  `lat` varchar(255) DEFAULT '',
  `lng` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `realname` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `fetchtime` varchar(255) DEFAULT '',
  `type` tinyint(1) DEFAULT '0',
  `logo` varchar(255) DEFAULT '',
  `saletime` varchar(255) DEFAULT '',
  `desc` text,
  `displayorder` int(11) DEFAULT '0',
  `order_printer` varchar(500) DEFAULT '',
  `order_template` int(11) DEFAULT '0',
  `ordertype` varchar(500) DEFAULT '',
  `banner` text,
  `label` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `classify` tinyint(1) DEFAULT NULL,
  `perms` text,
  `citycode` varchar(20) DEFAULT '',
  `opensend` tinyint(3) NOT NULL DEFAULT '0',
  `province` varchar(30) NOT NULL DEFAULT '',
  `city` varchar(30) NOT NULL DEFAULT '',
  `area` varchar(30) NOT NULL DEFAULT '',
  `provincecode` varchar(30) NOT NULL DEFAULT '',
  `areacode` varchar(30) NOT NULL DEFAULT '',
  `diypage` int(11) NOT NULL DEFAULT '0',
  `diypage_ispage` tinyint(3) NOT NULL DEFAULT '0',
  `diypage_list` text,
  `storegroupid` int(11) DEFAULT NULL,
  `cates` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

DROP TABLE IF EXISTS `ims_ewei_shop_sysset`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_sysset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `sets` longtext,
  `plugins` longtext,
  `sec` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

INSERT INTO `ims_ewei_shop_sysset` (`id`, `uniacid`, `sets`, `plugins`, `sec`) VALUES
(10, 1, 'a:1:{s:3:"wap";a:13:{s:4:"open";i:1;s:7:"inh5app";s:1:"0";s:8:"mustbind";s:1:"0";s:5:"style";s:7:"default";s:5:"color";s:0:"";s:2:"bg";s:53:"../addons/ewei_shopv2/template/account/default/bg.jpg";s:7:"sms_reg";s:1:"5";s:10:"sms_forget";s:1:"5";s:13:"sms_changepwd";s:1:"5";s:8:"sms_bind";s:1:"5";s:7:"loginbg";N;s:5:"regbg";N;s:3:"sns";a:2:{s:2:"wx";i:0;s:2:"qq";i:0;}}}', 'a:2:{s:5:"merch";a:13:{s:12:"is_openmerch";s:1:"0";s:17:"deduct_commission";s:1:"0";s:16:"apply_openmobile";s:1:"1";s:13:"open_protocol";s:1:"0";s:5:"regbg";s:0:"";s:13:"apply_diyform";s:1:"0";s:15:"apply_diyformid";s:1:"0";s:6:"regpic";s:0:"";s:10:"applytitle";s:0:"";s:12:"applycontent";s:0:"";s:15:"applycashweixin";i:0;s:15:"applycashalipay";i:0;s:13:"applycashcard";i:0;}s:4:"sale";a:3:{s:11:"enoughmoney";d:0;s:12:"enoughdeduct";d:0;s:7:"enoughs";a:0:{}}}', NULL);

DROP TABLE IF EXISTS `ims_ewei_shop_system_adv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `url` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `module` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_article`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `author` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `content` text,
  `createtime` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `cate` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_banner`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `url` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `background` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_case`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `qr` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `cate` int(11) DEFAULT '0',
  `description` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_casecategory`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_casecategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_company_article`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_company_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `author` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `content` text,
  `createtime` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `cate` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_company_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_company_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_copyright`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_copyright` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `copyright` text,
  `bgcolor` varchar(255) DEFAULT '',
  `ismanage` tinyint(3) DEFAULT '0',
  `logo` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_copyright_notice`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_copyright_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `author` varchar(255) DEFAULT '',
  `content` text,
  `createtime` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_guestbook`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `content` varchar(255) NOT NULL DEFAULT '',
  `nickname` varchar(255) NOT NULL DEFAULT '',
  `createtime` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `clientip` varchar(64) NOT NULL DEFAULT '',
  `mobile` varchar(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_link`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `displayorder` int(11) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_plugingrant_adv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_plugingrant_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_enabled` (`enabled`) USING BTREE,
  KEY `idx_displayorder` (`displayorder`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_plugingrant_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_plugingrant_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logno` varchar(50) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `pluginid` int(11) NOT NULL DEFAULT '0',
  `identity` varchar(50) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `month` int(10) NOT NULL DEFAULT '0',
  `permendtime` int(10) NOT NULL DEFAULT '0',
  `permlasttime` int(10) NOT NULL DEFAULT '0',
  `isperm` tinyint(3) NOT NULL DEFAULT '0',
  `createtime` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_plugingrant_order`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_plugingrant_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logno` varchar(50) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) DEFAULT NULL,
  `pluginid` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `month` int(11) NOT NULL DEFAULT '0',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `paystatus` tinyint(3) NOT NULL DEFAULT '0',
  `paytime` int(10) NOT NULL DEFAULT '0',
  `paytype` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_plugingrant_package`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_plugingrant_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pluginid` varchar(255) NOT NULL DEFAULT '',
  `text` varchar(255) DEFAULT NULL,
  `thumb` varchar(1000) DEFAULT NULL,
  `data` text NOT NULL,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `rec` tinyint(3) NOT NULL DEFAULT '0',
  `desc` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `displayorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_plugingrant_plugin`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_plugingrant_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pluginid` int(11) NOT NULL DEFAULT '0',
  `thumb` varchar(1000) NOT NULL,
  `data` text,
  `state` tinyint(3) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `sales` int(11) NOT NULL DEFAULT '0',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  `plugintype` tinyint(3) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_plugingrant_setting`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_plugingrant_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com` varchar(1000) NOT NULL DEFAULT '',
  `adv` varchar(1000) NOT NULL,
  `plugin` varchar(1000) NOT NULL,
  `customer` varchar(50) NOT NULL DEFAULT '0',
  `contact` text NOT NULL,
  `servertime` varchar(255) DEFAULT NULL,
  `weixin` tinyint(3) NOT NULL DEFAULT '0',
  `appid` varchar(255) DEFAULT NULL,
  `mchid` varchar(255) DEFAULT NULL,
  `apikey` varchar(255) DEFAULT NULL,
  `alipay` tinyint(3) NOT NULL,
  `account` varchar(255) DEFAULT NULL,
  `partner` varchar(255) DEFAULT NULL,
  `secret` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_setting`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) DEFAULT NULL,
  `background` varchar(10) DEFAULT '',
  `casebanner` varchar(255) DEFAULT '',
  `contact` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_system_site`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_system_site` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL DEFAULT '',
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `ims_ewei_shop_system_site` (`id`, `type`, `content`) VALUES
(2, 'set', 'a:21:{s:6:"status";s:1:"1";s:8:"template";s:7:"default";s:8:"closeurl";s:0:"";s:5:"title";s:0:"";s:4:"logo";s:0:"";s:6:"qrcode";s:0:"";s:8:"keywords";s:0:"";s:11:"description";s:0:"";s:12:"casesubtitle";s:0:"";s:11:"newsubtitle";s:0:"";s:15:"articlesubtitle";s:0:"";s:12:"linksubtitle";s:0:"";s:15:"contactsubtitle";s:0:"";s:8:"contacts";s:0:"";s:6:"mobile";s:0:"";s:10:"servertime";s:0:"";s:2:"qq";s:0:"";s:7:"address";s:0:"";s:7:"zipcode";s:0:"";s:9:"copyright";s:0:"";s:7:"diycode";s:0:"";}');

DROP TABLE IF EXISTS `ims_ewei_shop_task`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL,
  `starttime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `dotime` int(11) NOT NULL DEFAULT '0',
  `donetime` int(11) NOT NULL DEFAULT '0',
  `timelimit` float(11,1) NOT NULL,
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `explain` text,
  `require_data` text NOT NULL,
  `reward_data` text NOT NULL,
  `period` int(11) NOT NULL DEFAULT '0',
  `repeat` int(11) NOT NULL DEFAULT '0',
  `maxtimes` int(11) NOT NULL DEFAULT '0',
  `everyhours` float(11,1) NOT NULL DEFAULT '0.0',
  `logo` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_task_adv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_task_default`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_default` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `data` text,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `bgimg` varchar(255) NOT NULL DEFAULT '',
  `open` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_task_extension`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_extension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taskname` varchar(255) NOT NULL DEFAULT '',
  `taskclass` varchar(25) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `classify` varchar(255) NOT NULL DEFAULT '',
  `classify_name` varchar(255) NOT NULL DEFAULT '',
  `verb` varchar(255) NOT NULL DEFAULT '',
  `unit` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=12 ;

INSERT INTO `ims_ewei_shop_task_extension` (`id`, `taskname`, `taskclass`, `status`, `classify`, `classify_name`, `verb`, `unit`) VALUES
(1, '推荐人数', 'commission_member', 1, 'number', 'number', '推荐', '人'),
(2, '分销佣金', 'commission_money', 1, 'number', 'number', '达到', '元'),
(3, '分销订单', 'commission_order', 1, 'number', 'number', '达到', '笔'),
(4, '订单满额', 'cost_enough', 1, 'number', 'number', '满', '元'),
(5, '累计金额', 'cost_total', 1, 'number', 'number', '累计', '元'),
(6, '订单数量', 'cost_count', 1, 'number', 'number', '达到', '单'),
(7, '指定商品', 'cost_goods', 1, 'select', 'select', '购买指定商品', '件'),
(8, '商品评价', 'cost_comment', 1, 'number', 'number', '评价订单', '次'),
(9, '累计充值', 'cost_rechargetotal', 1, 'number', 'number', '达到', '元'),
(10, '充值满额', 'cost_rechargeenough', 1, 'number', 'number', '满', '元'),
(11, '完善信息', 'member_info', 1, 'boole', 'boole', '填写手机号', '');

DROP TABLE IF EXISTS `ims_ewei_shop_task_extension_join`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_extension_join` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `uid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `openid` varchar(255) NOT NULL,
  `require_data` text NOT NULL,
  `progress_data` text NOT NULL,
  `reward_data` text NOT NULL,
  `completetime` int(11) NOT NULL DEFAULT '0',
  `pickuptime` int(11) NOT NULL,
  `endtime` int(11) NOT NULL,
  `dotime` int(11) NOT NULL DEFAULT '0',
  `rewarded` text NOT NULL,
  `logo` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_task_join`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_join` (
  `join_id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `join_user` varchar(100) NOT NULL DEFAULT '',
  `task_id` int(11) NOT NULL DEFAULT '0',
  `task_type` tinyint(1) NOT NULL DEFAULT '0',
  `needcount` int(11) NOT NULL DEFAULT '0',
  `completecount` int(11) NOT NULL DEFAULT '0',
  `reward_data` text,
  `is_reward` tinyint(1) NOT NULL DEFAULT '0',
  `failtime` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) DEFAULT '0',
  PRIMARY KEY (`join_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_task_joiner`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_joiner` (
  `complete_id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `task_user` varchar(100) NOT NULL DEFAULT '',
  `joiner_id` varchar(100) NOT NULL DEFAULT '',
  `join_id` int(11) NOT NULL DEFAULT '0',
  `task_id` int(11) NOT NULL DEFAULT '0',
  `task_type` tinyint(1) NOT NULL DEFAULT '0',
  `join_status` tinyint(1) NOT NULL DEFAULT '1',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`complete_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_task_list`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_list` (
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `title` char(50) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(50) NOT NULL DEFAULT '',
  `starttime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `endtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `demand` int(11) NOT NULL DEFAULT '0',
  `requiregoods` text NOT NULL,
  `picktype` tinyint(1) NOT NULL DEFAULT '0',
  `stop_type` tinyint(1) NOT NULL DEFAULT '0',
  `stop_limit` int(11) NOT NULL DEFAULT '0',
  `stop_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stop_cycle` tinyint(1) NOT NULL DEFAULT '0',
  `repeat_type` tinyint(1) NOT NULL DEFAULT '0',
  `repeat_interval` int(11) NOT NULL DEFAULT '0',
  `repeat_cycle` tinyint(1) NOT NULL DEFAULT '0',
  `reward` text NOT NULL,
  `followreward` text NOT NULL,
  `goods_limit` int(11) NOT NULL DEFAULT '0',
  `notice` text NOT NULL,
  `design_data` text NOT NULL,
  `design_bg` varchar(255) NOT NULL DEFAULT '',
  `native_data` text NOT NULL,
  `native_data2` text,
  `native_data3` text,
  `reward2` text,
  `reward3` text,
  `level2` int(11) NOT NULL DEFAULT '0',
  `level3` int(11) NOT NULL DEFAULT '0',
  `member_group` text,
  `auto_pick` tinyint(1) DEFAULT '0',
  `keyword_pick` varchar(20) DEFAULT '',
  `verb` varchar(255) DEFAULT '',
  `unit` varchar(255) DEFAULT '',
  `member_level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_passive` (`picktype`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_task_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(100) NOT NULL DEFAULT '',
  `from_openid` varchar(100) NOT NULL DEFAULT '',
  `join_id` int(11) NOT NULL DEFAULT '0',
  `taskid` int(11) DEFAULT '0',
  `task_type` tinyint(1) NOT NULL DEFAULT '0',
  `subdata` text,
  `recdata` text,
  `createtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_task_poster`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_poster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `days` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `bg` varchar(255) DEFAULT '',
  `data` text,
  `keyword` varchar(255) DEFAULT NULL,
  `resptype` tinyint(1) NOT NULL DEFAULT '0',
  `resptext` text,
  `resptitle` varchar(255) DEFAULT NULL,
  `respthumb` varchar(255) DEFAULT NULL,
  `respdesc` varchar(255) DEFAULT NULL,
  `respurl` varchar(255) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `waittext` varchar(255) DEFAULT NULL,
  `oktext` varchar(255) DEFAULT NULL,
  `scantext` varchar(255) DEFAULT NULL,
  `beagent` tinyint(1) NOT NULL DEFAULT '0',
  `bedown` tinyint(1) NOT NULL DEFAULT '0',
  `timestart` int(11) DEFAULT NULL,
  `timeend` int(11) DEFAULT NULL,
  `is_repeat` tinyint(1) DEFAULT '0',
  `getposter` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `starttext` varchar(255) DEFAULT NULL,
  `endtext` varchar(255) DEFAULT NULL,
  `reward_data` text,
  `needcount` int(11) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `poster_type` tinyint(1) DEFAULT '1',
  `reward_days` int(11) DEFAULT '0',
  `titleicon` text,
  `poster_banner` text,
  `is_goods` tinyint(1) DEFAULT '0',
  `autoposter` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_task_poster_qr`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_poster_qr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(100) NOT NULL,
  `posterid` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `sceneid` int(11) NOT NULL DEFAULT '0',
  `mediaid` varchar(255) DEFAULT NULL,
  `ticket` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `createtime` int(11) DEFAULT NULL,
  `qrimg` varchar(1000) DEFAULT NULL,
  `expire` int(11) DEFAULT NULL,
  `endtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_task_qr`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_qr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(100) NOT NULL DEFAULT '',
  `recordid` int(11) NOT NULL DEFAULT '0',
  `sceneid` varchar(255) NOT NULL DEFAULT '',
  `mediaid` varchar(255) NOT NULL DEFAULT '',
  `ticket` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`) USING BTREE,
  KEY `recordid` (`recordid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_task_record`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `taskid` int(11) NOT NULL DEFAULT '0',
  `tasktitle` varchar(255) NOT NULL,
  `taskimage` varchar(255) NOT NULL DEFAULT '',
  `tasktype` varchar(50) NOT NULL DEFAULT '',
  `task_progress` int(11) NOT NULL DEFAULT '0',
  `task_demand` int(11) NOT NULL DEFAULT '0',
  `openid` char(50) NOT NULL DEFAULT '',
  `nickname` varchar(255) NOT NULL DEFAULT '',
  `picktime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `stoptime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `finishtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reward_data` text NOT NULL,
  `followreward_data` text NOT NULL,
  `design_data` text NOT NULL,
  `design_bg` varchar(255) NOT NULL DEFAULT '',
  `require_goods` varchar(255) NOT NULL DEFAULT '',
  `level1` int(11) NOT NULL DEFAULT '0',
  `reward_data1` text NOT NULL,
  `level2` int(11) NOT NULL DEFAULT '0',
  `reward_data2` text NOT NULL,
  `member_group` text,
  `auto_pick` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`) USING BTREE,
  KEY `taskid` (`taskid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_task_reward`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_reward` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `taskid` int(11) NOT NULL DEFAULT '0',
  `tasktitle` char(50) NOT NULL DEFAULT '',
  `tasktype` varchar(50) NOT NULL DEFAULT '',
  `taskowner` char(50) NOT NULL DEFAULT '',
  `ownernickname` char(50) NOT NULL DEFAULT '',
  `recordid` int(11) NOT NULL DEFAULT '0',
  `nickname` char(50) NOT NULL DEFAULT '',
  `headimg` varchar(255) NOT NULL DEFAULT '',
  `openid` char(50) NOT NULL DEFAULT '',
  `reward_type` char(10) NOT NULL DEFAULT '',
  `reward_title` char(50) NOT NULL DEFAULT '',
  `reward_data` decimal(10,2) NOT NULL DEFAULT '0.00',
  `get` tinyint(1) NOT NULL DEFAULT '0',
  `sent` tinyint(1) NOT NULL DEFAULT '0',
  `gettime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `senttime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isjoiner` tinyint(1) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `level` tinyint(1) NOT NULL DEFAULT '0',
  `read` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`) USING BTREE,
  KEY `recordid` (`recordid`) USING BTREE,
  KEY `taskid` (`taskid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_task_set`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_set` (
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `entrance` tinyint(1) NOT NULL DEFAULT '0',
  `keyword` varchar(10) NOT NULL DEFAULT '',
  `cover_title` varchar(20) NOT NULL DEFAULT '',
  `cover_img` varchar(255) NOT NULL DEFAULT '',
  `cover_desc` varchar(255) NOT NULL DEFAULT '',
  `msg_pick` text NOT NULL,
  `msg_progress` text NOT NULL,
  `msg_finish` text NOT NULL,
  `msg_follow` text NOT NULL,
  `isnew` tinyint(1) NOT NULL DEFAULT '0',
  `bg_img` varchar(255) NOT NULL DEFAULT '../addons/ewei_shopv2/plugin/task/static/images/sky.png',
  `top_notice` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

INSERT INTO `ims_ewei_shop_task_set` (`uniacid`, `entrance`, `keyword`, `cover_title`, `cover_img`, `cover_desc`, `msg_pick`, `msg_progress`, `msg_finish`, `msg_follow`, `isnew`, `bg_img`, `top_notice`) VALUES
(1, 0, '', '', '', '', '', '', '', '', 0, '../addons/ewei_shopv2/plugin/task/static/images/sky.png', 0);

DROP TABLE IF EXISTS `ims_ewei_shop_task_type`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_task_type` (
  `id` int(11) NOT NULL,
  `type_key` char(20) NOT NULL DEFAULT '',
  `type_name` char(10) NOT NULL DEFAULT '',
  `description` char(30) NOT NULL DEFAULT '',
  `verb` char(11) NOT NULL DEFAULT '',
  `numeric` tinyint(1) NOT NULL DEFAULT '0',
  `unit` char(10) NOT NULL DEFAULT '',
  `goods` tinyint(1) NOT NULL DEFAULT '0',
  `theme` char(10) NOT NULL DEFAULT '',
  `once` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

INSERT INTO `ims_ewei_shop_task_type` (`id`, `type_key`, `type_name`, `description`, `verb`, `numeric`, `unit`, `goods`, `theme`, `once`) VALUES
(1, 'poster', '任务海报', '把生成的海报并分享给朋友，朋友扫描并关注公众号即可获得奖励。', '转发海报并吸引', 1, '人关注', 0, 'primary', 0),
(2, 'info_phone', '绑定手机', '在个人中心中，绑定手机号，即可完成任务获得奖励。', '绑定手机', 0, '', 0, 'warning', 0),
(3, 'order_first', '首次购物', '在商城中首次下单，即可获得奖励，必须确认收货。', '首次在商城中下单购物', 0, '', 0, 'warning', 0),
(4, 'recharge_full', '单笔充值满额', '在商城中充值余额，单笔充值满额，即可获得奖励。', '单笔充值满', 1, '元', 0, 'success', 1),
(5, 'order_full', '单笔满额', '在商城中下单，单笔满额即可获得奖励，必须确认收货。', '单笔订单满', 1, '元', 0, 'success', 1),
(6, 'order_all', '累计消费', '在商城中购物消费，累计满额即可获得奖励，无需确认收货。', '购物总消费额达到', 1, '元', 0, 'success', 0),
(7, 'pyramid_money', '分销佣金', '只有分销商可接此任务。累计分销佣金满额，即可完成任务。', '分销商获得佣金金额达', 1, '元', 0, 'primary', 0),
(8, 'pyramid_num', '下级人数', '只有分销商可接此任务。累计下级人数达标，即可完成任务。', '分销商推荐下级人数达', 1, '人', 0, 'primary', 0),
(9, 'comment', '商品好评', '任意给一个商品五星好评，即可完成任务获得奖励。', '给商品好评', 0, '', 0, 'warning', 0),
(10, 'post', '社区发帖', '在社区中发表指定篇帖子，即可完成任务获得奖励。', '在论坛中发表', 1, '篇帖子', 0, 'warning', 0),
(11, 'goods', '购买指定商品', '购买指定商品后即可完成任务，必须确认收货。', '购买指定商品', 0, '', 1, 'info', 0),
(12, 'recharge_count', '累计充值满额', '在商城中充值余额，累计充值满额，即可获得奖励。', '累计充值满', 1, '元', 0, 'success', 0);

DROP TABLE IF EXISTS `ims_ewei_shop_upwxapp_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_upwxapp_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `type` tinyint(2) DEFAULT '0',
  `version` varchar(20) DEFAULT NULL,
  `describe` varchar(50) DEFAULT NULL,
  `version_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_verifygoods`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_verifygoods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `openid` varchar(255) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL,
  `ordergoodsid` int(11) DEFAULT NULL,
  `storeid` int(11) DEFAULT NULL,
  `starttime` int(11) DEFAULT NULL,
  `limitdays` int(11) DEFAULT NULL,
  `limitnum` int(11) DEFAULT NULL,
  `used` tinyint(1) DEFAULT '0',
  `verifycode` varchar(20) DEFAULT NULL,
  `codeinvalidtime` int(11) DEFAULT NULL,
  `invalid` tinyint(1) DEFAULT '0',
  `getcard` tinyint(1) DEFAULT '0',
  `activecard` tinyint(1) DEFAULT '0',
  `cardcode` varchar(255) DEFAULT '',
  `limittype` tinyint(1) DEFAULT '0',
  `limitdate` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `verifycode` (`verifycode`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_verifygoods_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_verifygoods_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `verifygoodsid` int(11) DEFAULT NULL,
  `salerid` int(11) DEFAULT NULL,
  `storeid` int(11) DEFAULT NULL,
  `verifynum` int(11) DEFAULT NULL,
  `verifydate` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_version`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `type` tinyint(3) NOT NULL DEFAULT '0',
  `uniacid` int(11) NOT NULL,
  `version` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uid` (`uid`) USING BTREE,
  KEY `idx_version` (`version`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=3 ;

INSERT INTO `ims_ewei_shop_version` (`id`, `uid`, `type`, `uniacid`, `version`) VALUES
(2, 1, 0, 0, 0);

DROP TABLE IF EXISTS `ims_ewei_shop_virtual_category`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_virtual_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `merchid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `ims_ewei_shop_virtual_data`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_virtual_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `typeid` int(11) NOT NULL DEFAULT '0',
  `pvalue` varchar(255) DEFAULT '',
  `fields` text NOT NULL,
  `openid` varchar(255) NOT NULL DEFAULT '',
  `usetime` int(11) NOT NULL DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `ordersn` varchar(255) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  `merchid` int(11) DEFAULT '0',
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_typeid` (`typeid`),
  KEY `idx_usetime` (`usetime`),
  KEY `idx_orderid` (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1001 ;

DROP TABLE IF EXISTS `ims_ewei_shop_virtual_send_log`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_virtual_send_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(40) NOT NULL DEFAULT '',
  `orderid` tinyint(3) unsigned NOT NULL,
  `tag` varchar(20) NOT NULL,
  `default` varchar(2000) NOT NULL DEFAULT '',
  `cusdefault` varchar(2000) NOT NULL DEFAULT '',
  `url` varchar(128) NOT NULL DEFAULT '',
  `datas` varchar(2000) NOT NULL DEFAULT '',
  `appurl` varchar(128) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `sendtime` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_virtual_type`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_virtual_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `cate` int(11) DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `fields` text NOT NULL,
  `usedata` int(11) NOT NULL DEFAULT '0',
  `alldata` int(11) NOT NULL DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `linktext` varchar(50) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `recycled` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_cate` (`cate`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

DROP TABLE IF EXISTS `ims_ewei_shop_wxapp_bind`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_wxapp_bind` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `wxapp` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_wxapp` (`wxapp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_wxapp_page`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_wxapp_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(2) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `data` mediumtext,
  `createtime` int(11) NOT NULL DEFAULT '0',
  `lasttime` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `isdefault` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_type` (`type`),
  KEY `idx_status` (`status`),
  KEY `idx_isdefault` (`isdefault`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_wxapp_poster`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_wxapp_poster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(3) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `bgimg` varchar(255) DEFAULT NULL,
  `data` text,
  `createtime` int(11) NOT NULL DEFAULT '0',
  `lastedittime` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_type` (`type`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_wxapp_startadv`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_wxapp_startadv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `data` text,
  `createtime` int(11) NOT NULL DEFAULT '0',
  `lastedittime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_wxapp_tmessage`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_wxapp_tmessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `templateid` varchar(50) DEFAULT '',
  `datas` text,
  `emphasis_keyword` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_status` (`status`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_ewei_shop_wxcard`;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_wxcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `card_id` varchar(255) DEFAULT '0',
  `displayorder` int(11) DEFAULT NULL,
  `catid` int(11) DEFAULT NULL,
  `card_type` varchar(50) DEFAULT NULL,
  `logo_url` varchar(255) DEFAULT NULL,
  `wxlogourl` varchar(255) DEFAULT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `code_type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `notice` varchar(50) DEFAULT NULL,
  `service_phone` varchar(50) DEFAULT NULL,
  `description` text,
  `datetype` varchar(50) DEFAULT NULL,
  `begin_timestamp` int(11) DEFAULT NULL,
  `end_timestamp` int(11) DEFAULT NULL,
  `fixed_term` int(11) DEFAULT NULL,
  `fixed_begin_term` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_quantity` varchar(255) DEFAULT NULL,
  `use_limit` int(11) DEFAULT NULL,
  `get_limit` int(11) DEFAULT NULL,
  `use_custom_code` tinyint(1) DEFAULT NULL,
  `bind_openid` tinyint(1) DEFAULT NULL,
  `can_share` tinyint(1) DEFAULT NULL,
  `can_give_friend` tinyint(1) DEFAULT NULL,
  `center_title` varchar(20) DEFAULT NULL,
  `center_sub_title` varchar(20) DEFAULT NULL,
  `center_url` varchar(255) DEFAULT NULL,
  `setcustom` tinyint(1) DEFAULT NULL,
  `custom_url_name` varchar(20) DEFAULT NULL,
  `custom_url_sub_title` varchar(20) DEFAULT NULL,
  `custom_url` varchar(255) DEFAULT NULL,
  `setpromotion` tinyint(1) DEFAULT NULL,
  `promotion_url_name` varchar(20) DEFAULT NULL,
  `promotion_url_sub_title` varchar(20) DEFAULT NULL,
  `promotion_url` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `can_use_with_other_discount` tinyint(1) DEFAULT NULL,
  `setabstract` tinyint(1) DEFAULT NULL,
  `abstract` varchar(50) DEFAULT NULL,
  `abstractimg` varchar(255) DEFAULT NULL,
  `icon_url_list` varchar(255) DEFAULT NULL,
  `accept_category` varchar(50) DEFAULT NULL,
  `reject_category` varchar(50) DEFAULT NULL,
  `least_cost` decimal(10,2) DEFAULT NULL,
  `reduce_cost` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `limitgoodtype` tinyint(1) DEFAULT '0',
  `limitgoodcatetype` tinyint(1) unsigned DEFAULT '0',
  `limitgoodcateids` varchar(255) DEFAULT NULL,
  `limitgoodids` varchar(255) DEFAULT NULL,
  `limitdiscounttype` tinyint(1) unsigned DEFAULT '0',
  `merchid` int(11) DEFAULT '0',
  `gettype` tinyint(3) DEFAULT NULL,
  `islimitlevel` tinyint(1) DEFAULT '0',
  `limitmemberlevels` varchar(500) DEFAULT '',
  `limitagentlevels` varchar(500) DEFAULT '',
  `limitpartnerlevels` varchar(500) DEFAULT '',
  `limitaagentlevels` varchar(500) DEFAULT '',
  `settitlecolor` tinyint(1) DEFAULT '0',
  `titlecolor` varchar(10) DEFAULT '',
  `tagtitle` varchar(20) DEFAULT '',
  `use_condition` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_images_reply`;
CREATE TABLE IF NOT EXISTS `ims_images_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mediaid` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_card`;
CREATE TABLE IF NOT EXISTS `ims_mc_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `color` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `format_type` tinyint(3) unsigned NOT NULL,
  `format` varchar(50) NOT NULL,
  `description` varchar(512) NOT NULL,
  `fields` varchar(1000) NOT NULL,
  `snpos` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `business` text NOT NULL,
  `discount_type` tinyint(3) unsigned NOT NULL,
  `discount` varchar(3000) NOT NULL,
  `grant` varchar(3000) NOT NULL,
  `grant_rate` varchar(20) NOT NULL,
  `offset_rate` int(10) unsigned NOT NULL,
  `offset_max` int(10) NOT NULL,
  `nums_status` tinyint(3) unsigned NOT NULL,
  `nums_text` varchar(15) NOT NULL,
  `nums` varchar(1000) NOT NULL,
  `times_status` tinyint(3) unsigned NOT NULL,
  `times_text` varchar(15) NOT NULL,
  `times` varchar(1000) NOT NULL,
  `params` longtext NOT NULL,
  `html` longtext NOT NULL,
  `recommend_status` tinyint(3) unsigned NOT NULL,
  `sign_status` tinyint(3) unsigned NOT NULL,
  `brand_name` varchar(128) NOT NULL DEFAULT '' COMMENT '商户名字,',
  `notice` varchar(48) NOT NULL DEFAULT '' COMMENT '卡券使用提醒',
  `quantity` int(10) NOT NULL DEFAULT '0' COMMENT '会员卡库存',
  `max_increase_bonus` int(10) NOT NULL DEFAULT '0' COMMENT '用户单次可获取的积分上限',
  `least_money_to_use_bonus` int(10) NOT NULL DEFAULT '0' COMMENT '抵扣条件',
  `source` int(1) NOT NULL DEFAULT '1' COMMENT '1.系统会员卡，2微信会员卡',
  `card_id` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_card_care`;
CREATE TABLE IF NOT EXISTS `ims_mc_card_care` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `groupid` int(10) unsigned NOT NULL,
  `credit1` int(10) unsigned NOT NULL,
  `credit2` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `granttime` int(10) unsigned NOT NULL,
  `days` int(10) unsigned NOT NULL,
  `time` tinyint(3) unsigned NOT NULL,
  `show_in_card` tinyint(3) unsigned NOT NULL,
  `content` varchar(1000) NOT NULL,
  `sms_notice` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_card_credit_set`;
CREATE TABLE IF NOT EXISTS `ims_mc_card_credit_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `sign` varchar(1000) NOT NULL,
  `share` varchar(500) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_card_members`;
CREATE TABLE IF NOT EXISTS `ims_mc_card_members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) DEFAULT NULL,
  `openid` varchar(50) NOT NULL,
  `cid` int(10) NOT NULL,
  `cardsn` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `nums` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_card_notices`;
CREATE TABLE IF NOT EXISTS `ims_mc_card_notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `groupid` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_card_notices_unread`;
CREATE TABLE IF NOT EXISTS `ims_mc_card_notices_unread` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `notice_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `is_new` tinyint(3) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`),
  KEY `notice_id` (`notice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_card_recommend`;
CREATE TABLE IF NOT EXISTS `ims_mc_card_recommend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_card_record`;
CREATE TABLE IF NOT EXISTS `ims_mc_card_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  `model` tinyint(3) unsigned NOT NULL,
  `fee` decimal(10,2) unsigned NOT NULL,
  `tag` varchar(10) NOT NULL,
  `note` varchar(255) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_card_sign_record`;
CREATE TABLE IF NOT EXISTS `ims_mc_card_sign_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `is_grant` tinyint(3) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_cash_record`;
CREATE TABLE IF NOT EXISTS `ims_mc_cash_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `fee` decimal(10,2) unsigned NOT NULL,
  `final_fee` decimal(10,2) unsigned NOT NULL,
  `credit1` int(10) unsigned NOT NULL,
  `credit1_fee` decimal(10,2) unsigned NOT NULL,
  `credit2` decimal(10,2) unsigned NOT NULL,
  `cash` decimal(10,2) unsigned NOT NULL,
  `return_cash` decimal(10,2) unsigned NOT NULL,
  `final_cash` decimal(10,2) unsigned NOT NULL,
  `remark` varchar(255) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `trade_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_chats_record`;
CREATE TABLE IF NOT EXISTS `ims_mc_chats_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `flag` tinyint(3) unsigned NOT NULL,
  `openid` varchar(32) NOT NULL,
  `msgtype` varchar(15) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `openid` (`openid`),
  KEY `createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_credits_recharge`;
CREATE TABLE IF NOT EXISTS `ims_mc_credits_recharge` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `tid` varchar(64) NOT NULL,
  `transid` varchar(30) NOT NULL,
  `fee` varchar(10) NOT NULL,
  `type` varchar(15) NOT NULL,
  `tag` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `backtype` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid_uid` (`uniacid`,`uid`),
  KEY `idx_tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_credits_record`;
CREATE TABLE IF NOT EXISTS `ims_mc_credits_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `uniacid` int(11) NOT NULL,
  `credittype` varchar(10) NOT NULL,
  `num` decimal(10,2) NOT NULL,
  `operator` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `remark` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_fans_groups`;
CREATE TABLE IF NOT EXISTS `ims_mc_fans_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `groups` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_fans_tag_mapping`;
CREATE TABLE IF NOT EXISTS `ims_mc_fans_tag_mapping` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fanid` int(11) unsigned NOT NULL,
  `tagid` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mapping` (`fanid`,`tagid`) USING BTREE,
  KEY `fanid_index` (`fanid`) USING BTREE,
  KEY `tagid_index` (`tagid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_groups`;
CREATE TABLE IF NOT EXISTS `ims_mc_groups` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `isdefault` tinyint(4) NOT NULL,
  PRIMARY KEY (`groupid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `ims_mc_groups` (`groupid`, `uniacid`, `title`, `credit`, `isdefault`) VALUES
(1, 1, '默认会员组', 0, 1);

DROP TABLE IF EXISTS `ims_mc_handsel`;
CREATE TABLE IF NOT EXISTS `ims_mc_handsel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `touid` int(10) unsigned NOT NULL,
  `fromuid` varchar(32) NOT NULL,
  `module` varchar(30) NOT NULL,
  `sign` varchar(100) NOT NULL,
  `action` varchar(20) NOT NULL,
  `credit_value` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`touid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_mapping_fans`;
CREATE TABLE IF NOT EXISTS `ims_mc_mapping_fans` (
  `fanid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `groupid` varchar(30) NOT NULL,
  `salt` char(8) NOT NULL,
  `follow` tinyint(1) unsigned NOT NULL,
  `followtime` int(10) unsigned NOT NULL,
  `unfollowtime` int(10) unsigned NOT NULL,
  `tag` varchar(1000) NOT NULL,
  `updatetime` int(10) unsigned DEFAULT NULL,
  `unionid` varchar(64) NOT NULL,
  PRIMARY KEY (`fanid`),
  UNIQUE KEY `openid_2` (`openid`) USING BTREE,
  KEY `acid` (`acid`),
  KEY `uniacid` (`uniacid`),
  KEY `updatetime` (`updatetime`),
  KEY `nickname` (`nickname`),
  KEY `uid` (`uid`),
  KEY `openid` (`openid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_mapping_ucenter`;
CREATE TABLE IF NOT EXISTS `ims_mc_mapping_ucenter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `centeruid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_mass_record`;
CREATE TABLE IF NOT EXISTS `ims_mc_mass_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `fansnum` int(10) unsigned NOT NULL,
  `msgtype` varchar(10) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `group` int(10) NOT NULL,
  `attach_id` int(10) unsigned NOT NULL,
  `media_id` varchar(100) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `cron_id` int(10) unsigned NOT NULL,
  `sendtime` int(10) unsigned NOT NULL,
  `finalsendtime` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_members`;
CREATE TABLE IF NOT EXISTS `ims_mc_members` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` varchar(8) NOT NULL,
  `groupid` int(11) NOT NULL,
  `credit1` decimal(10,2) unsigned NOT NULL,
  `credit2` decimal(10,2) unsigned NOT NULL,
  `credit3` decimal(10,2) unsigned NOT NULL,
  `credit4` decimal(10,2) unsigned NOT NULL,
  `credit5` decimal(10,2) unsigned NOT NULL,
  `credit6` decimal(10,2) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `realname` varchar(10) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `vip` tinyint(3) unsigned NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthyear` smallint(6) unsigned NOT NULL,
  `birthmonth` tinyint(3) unsigned NOT NULL,
  `birthday` tinyint(3) unsigned NOT NULL,
  `constellation` varchar(10) NOT NULL,
  `zodiac` varchar(5) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `idcard` varchar(30) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `resideprovince` varchar(30) NOT NULL,
  `residecity` varchar(30) NOT NULL,
  `residedist` varchar(30) NOT NULL,
  `graduateschool` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `education` varchar(10) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `revenue` varchar(10) NOT NULL,
  `affectivestatus` varchar(30) NOT NULL,
  `lookingfor` varchar(255) NOT NULL,
  `bloodtype` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `weight` varchar(5) NOT NULL,
  `alipay` varchar(30) NOT NULL,
  `msn` varchar(30) NOT NULL,
  `taobao` varchar(30) NOT NULL,
  `site` varchar(30) NOT NULL,
  `bio` text NOT NULL,
  `interest` text NOT NULL,
  `pay_password` varchar(30) NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `groupid` (`groupid`),
  KEY `uniacid` (`uniacid`),
  KEY `email` (`email`) USING BTREE,
  KEY `mobile` (`mobile`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_member_address`;
CREATE TABLE IF NOT EXISTS `ims_mc_member_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(50) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `province` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `district` varchar(32) NOT NULL,
  `address` varchar(512) NOT NULL,
  `isdefault` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uinacid` (`uniacid`),
  KEY `idx_uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_member_fields`;
CREATE TABLE IF NOT EXISTS `ims_mc_member_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `fieldid` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `displayorder` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_fieldid` (`fieldid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

DROP TABLE IF EXISTS `ims_mc_member_property`;
CREATE TABLE IF NOT EXISTS `ims_mc_member_property` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `property` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mc_oauth_fans`;
CREATE TABLE IF NOT EXISTS `ims_mc_oauth_fans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oauth_openid` varchar(50) NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_oauthopenid_acid` (`oauth_openid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_menu_event`;
CREATE TABLE IF NOT EXISTS `ims_menu_event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `picmd5` varchar(32) NOT NULL,
  `openid` varchar(128) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `picmd5` (`picmd5`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_message_notice_log`;
CREATE TABLE IF NOT EXISTS `ims_message_notice_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `is_read` tinyint(3) NOT NULL,
  `uid` int(11) NOT NULL,
  `sign` varchar(22) NOT NULL,
  `type` tinyint(3) NOT NULL,
  `status` tinyint(3) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_mobilenumber`;
CREATE TABLE IF NOT EXISTS `ims_mobilenumber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(10) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL,
  `dateline` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_modules`;
CREATE TABLE IF NOT EXISTS `ims_modules` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `version` varchar(15) NOT NULL,
  `ability` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `author` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `settings` tinyint(1) NOT NULL,
  `subscribes` varchar(500) NOT NULL,
  `handles` varchar(500) NOT NULL,
  `isrulefields` tinyint(1) NOT NULL,
  `issystem` tinyint(1) unsigned NOT NULL,
  `target` int(10) unsigned NOT NULL,
  `iscard` tinyint(3) unsigned NOT NULL,
  `permissions` varchar(5000) NOT NULL,
  `title_initial` varchar(1) NOT NULL,
  `wxapp_support` tinyint(1) NOT NULL,
  `app_support` tinyint(1) NOT NULL,
  `welcome_support` int(2) NOT NULL,
  `oauth_type` tinyint(1) NOT NULL,
  `webapp_support` tinyint(1) NOT NULL,
  `phoneapp_support` tinyint(1) NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `idx_name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

INSERT INTO `ims_modules` (`mid`, `name`, `type`, `title`, `version`, `ability`, `description`, `author`, `url`, `settings`, `subscribes`, `handles`, `isrulefields`, `issystem`, `target`, `iscard`, `permissions`, `title_initial`, `wxapp_support`, `app_support`, `welcome_support`, `oauth_type`, `webapp_support`, `phoneapp_support`) VALUES
(1, 'basic', 'system', '基本文字回复', '1.0', '和您进行简单对话', '一问一答得简单对话. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的回复内容.', 'WeEngine Team', 'http://www.we7.cc/', 0, '', '', 1, 1, 0, 0, '', '', 0, 0, 0, 0, 0, 0),
(2, 'news', 'system', '基本混合图文回复', '1.0', '为你提供生动的图文资讯', '一问一答得简单对话, 但是回复内容包括图片文字等更生动的媒体内容. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的图文回复内容.', 'WeEngine Team', 'http://www.we7.cc/', 0, '', '', 1, 1, 0, 0, '', '', 0, 0, 0, 0, 0, 0),
(3, 'music', 'system', '基本音乐回复', '1.0', '提供语音、音乐等音频类回复', '在回复规则中可选择具有语音、音乐等音频类的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝，实现一问一答得简单对话。', 'WeEngine Team', 'http://www.we7.cc/', 0, '', '', 1, 1, 0, 0, '', '', 0, 0, 0, 0, 0, 0),
(4, 'userapi', 'system', '自定义接口回复', '1.1', '更方便的第三方接口设置', '自定义接口又称第三方接口，可以让开发者更方便的接入微擎系统，高效的与微信公众平台进行对接整合。', 'WeEngine Team', 'http://www.we7.cc/', 0, '', '', 1, 1, 0, 0, '', '', 0, 0, 0, 0, 0, 0),
(5, 'recharge', 'system', '会员中心充值模块', '1.0', '提供会员充值功能', '', 'WeEngine Team', 'http://www.we7.cc/', 0, '', '', 0, 1, 0, 0, '', '', 0, 0, 0, 0, 0, 0),
(6, 'custom', 'system', '多客服转接', '1.0.0', '用来接入腾讯的多客服系统', '', 'WeEngine Team', 'http://bbs.we7.cc', 0, 'a:0:{}', 'a:6:{i:0;s:5:"image";i:1;s:5:"voice";i:2;s:5:"video";i:3;s:8:"location";i:4;s:4:"link";i:5;s:4:"text";}', 1, 1, 0, 0, '', '', 0, 0, 0, 0, 0, 0),
(7, 'images', 'system', '基本图片回复', '1.0', '提供图片回复', '在回复规则中可选择具有图片的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝图片。', 'WeEngine Team', 'http://www.we7.cc/', 0, '', '', 1, 1, 0, 0, '', '', 0, 0, 0, 0, 0, 0),
(8, 'video', 'system', '基本视频回复', '1.0', '提供图片回复', '在回复规则中可选择具有视频的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝视频。', 'WeEngine Team', 'http://www.we7.cc/', 0, '', '', 1, 1, 0, 0, '', '', 0, 0, 0, 0, 0, 0),
(9, 'voice', 'system', '基本语音回复', '1.0', '提供语音回复', '在回复规则中可选择具有语音的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝语音。', 'WeEngine Team', 'http://www.we7.cc/', 0, '', '', 1, 1, 0, 0, '', '', 0, 0, 0, 0, 0, 0),
(10, 'chats', 'system', '发送客服消息', '1.0', '公众号可以在粉丝最后发送消息的48小时内无限制发送消息', '', 'WeEngine Team', 'http://www.we7.cc/', 0, '', '', 0, 1, 0, 0, '', '', 0, 0, 0, 0, 0, 0),
(11, 'wxcard', 'system', '微信卡券回复', '1.0', '微信卡券回复', '微信卡券回复', 'WeEngine Team', 'http://www.we7.cc/', 0, '', '', 1, 1, 0, 0, '', '', 0, 0, 0, 0, 0, 0),
(12, 'paycenter', 'system', '收银台', '1.0', '收银台', '收银台', 'WeEngine Team', 'http://www.we7.cc/', 0, '', '', 1, 1, 0, 0, '', '', 0, 0, 0, 0, 0, 0),
(15, 'ewei_shopv2', 'business', '人人商城V3', '3.8.23', '人人商城(分销),多用户分权，淘宝商品一键转换，多种插件支持。', '人人商城(分销)，多项信息模板，强大的自定义规格设置', '微上宝科技', 'https://shop140828924.taobao.com', 0, 'a:14:{i:0;s:4:"text";i:1;s:5:"image";i:2;s:5:"voice";i:3;s:5:"video";i:4;s:10:"shortvideo";i:5;s:8:"location";i:6;s:4:"link";i:7;s:9:"subscribe";i:8;s:11:"unsubscribe";i:9;s:2:"qr";i:10;s:5:"trace";i:11;s:5:"click";i:12;s:4:"view";i:13;s:14:"merchant_order";}', 'a:12:{i:0;s:4:"text";i:1;s:5:"image";i:2;s:5:"voice";i:3;s:5:"video";i:4;s:10:"shortvideo";i:5;s:8:"location";i:6;s:4:"link";i:7;s:9:"subscribe";i:8;s:2:"qr";i:9;s:5:"trace";i:10;s:5:"click";i:11;s:14:"merchant_order";}', 0, 0, 0, 0, 'a:0:{}', '', 1, 2, 0, 0, 0, 0);

DROP TABLE IF EXISTS `ims_modules_bindings`;
CREATE TABLE IF NOT EXISTS `ims_modules_bindings` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(30) NOT NULL,
  `entry` varchar(10) NOT NULL,
  `call` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `do` varchar(30) NOT NULL,
  `state` varchar(200) NOT NULL,
  `direct` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `displayorder` tinyint(255) unsigned NOT NULL,
  PRIMARY KEY (`eid`),
  KEY `idx_module` (`module`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

INSERT INTO `ims_modules_bindings` (`eid`, `module`, `entry`, `call`, `title`, `do`, `state`, `direct`, `url`, `icon`, `displayorder`) VALUES
(9, 'ewei_shopv2', 'menu', '', '在线更新', 'download', '', 0, '', '', 0),
(8, 'ewei_shopv2', 'menu', '', '商城管理', 'shop', '', 0, '', '', 0),
(11, 'ewei_shopv2', 'menu', 'getMenus', '', '', '', 0, '', '', 0),
(10, 'ewei_shopv2', 'cover', '', '商城入口', 'mobile', '', 0, '', '', 0);

DROP TABLE IF EXISTS `ims_modules_plugin`;
CREATE TABLE IF NOT EXISTS `ims_modules_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `main_module` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`) USING BTREE,
  KEY `main_module` (`main_module`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_modules_rank`;
CREATE TABLE IF NOT EXISTS `ims_modules_rank` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_name` varchar(100) NOT NULL,
  `uid` int(10) NOT NULL,
  `rank` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module_name` (`module_name`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_modules_recycle`;
CREATE TABLE IF NOT EXISTS `ims_modules_recycle` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `modulename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `modulename` (`modulename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

DROP TABLE IF EXISTS `ims_music_reply`;
CREATE TABLE IF NOT EXISTS `ims_music_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(300) NOT NULL,
  `hqurl` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_news_reply`;
CREATE TABLE IF NOT EXISTS `ims_news_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `parent_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `content` mediumtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `displayorder` int(10) NOT NULL,
  `incontent` tinyint(1) NOT NULL,
  `createtime` int(10) NOT NULL,
  `media_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_paycenter_order`;
CREATE TABLE IF NOT EXISTS `ims_paycenter_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `uniontid` varchar(40) NOT NULL,
  `transaction_id` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL,
  `trade_type` varchar(10) NOT NULL,
  `body` varchar(255) NOT NULL,
  `fee` varchar(15) NOT NULL,
  `final_fee` decimal(10,2) unsigned NOT NULL,
  `credit1` int(10) unsigned NOT NULL,
  `credit1_fee` decimal(10,2) unsigned NOT NULL,
  `credit2` decimal(10,2) unsigned NOT NULL,
  `cash` decimal(10,2) unsigned NOT NULL,
  `remark` varchar(255) NOT NULL,
  `auth_code` varchar(30) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `follow` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `credit_status` tinyint(3) unsigned NOT NULL,
  `paytime` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_phoneapp_versions`;
CREATE TABLE IF NOT EXISTS `ims_phoneapp_versions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `version` varchar(20) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `modules` text,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `version` (`version`) USING BTREE,
  KEY `uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_profile_fields`;
CREATE TABLE IF NOT EXISTS `ims_profile_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `field` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `displayorder` smallint(6) NOT NULL,
  `required` tinyint(1) NOT NULL,
  `unchangeable` tinyint(1) NOT NULL,
  `showinregister` tinyint(1) NOT NULL,
  `field_length` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

INSERT INTO `ims_profile_fields` (`id`, `field`, `available`, `title`, `description`, `displayorder`, `required`, `unchangeable`, `showinregister`, `field_length`) VALUES
(1, 'realname', 1, '真实姓名', '', 0, 1, 1, 1, 0),
(2, 'nickname', 1, '昵称', '', 1, 1, 0, 1, 0),
(3, 'avatar', 1, '头像', '', 1, 0, 0, 0, 0),
(4, 'qq', 1, 'QQ号', '', 0, 0, 0, 1, 0),
(5, 'mobile', 1, '手机号码', '', 0, 0, 0, 0, 0),
(6, 'vip', 1, 'VIP级别', '', 0, 0, 0, 0, 0),
(7, 'gender', 1, '性别', '', 0, 0, 0, 0, 0),
(8, 'birthyear', 1, '出生生日', '', 0, 0, 0, 0, 0),
(9, 'constellation', 1, '星座', '', 0, 0, 0, 0, 0),
(10, 'zodiac', 1, '生肖', '', 0, 0, 0, 0, 0),
(11, 'telephone', 1, '固定电话', '', 0, 0, 0, 0, 0),
(12, 'idcard', 1, '证件号码', '', 0, 0, 0, 0, 0),
(13, 'studentid', 1, '学号', '', 0, 0, 0, 0, 0),
(14, 'grade', 1, '班级', '', 0, 0, 0, 0, 0),
(15, 'address', 1, '邮寄地址', '', 0, 0, 0, 0, 0),
(16, 'zipcode', 1, '邮编', '', 0, 0, 0, 0, 0),
(17, 'nationality', 1, '国籍', '', 0, 0, 0, 0, 0),
(18, 'resideprovince', 1, '居住地址', '', 0, 0, 0, 0, 0),
(19, 'graduateschool', 1, '毕业学校', '', 0, 0, 0, 0, 0),
(20, 'company', 1, '公司', '', 0, 0, 0, 0, 0),
(21, 'education', 1, '学历', '', 0, 0, 0, 0, 0),
(22, 'occupation', 1, '职业', '', 0, 0, 0, 0, 0),
(23, 'position', 1, '职位', '', 0, 0, 0, 0, 0),
(24, 'revenue', 1, '年收入', '', 0, 0, 0, 0, 0),
(25, 'affectivestatus', 1, '情感状态', '', 0, 0, 0, 0, 0),
(26, 'lookingfor', 1, ' 交友目的', '', 0, 0, 0, 0, 0),
(27, 'bloodtype', 1, '血型', '', 0, 0, 0, 0, 0),
(28, 'height', 1, '身高', '', 0, 0, 0, 0, 0),
(29, 'weight', 1, '体重', '', 0, 0, 0, 0, 0),
(30, 'alipay', 1, '支付宝帐号', '', 0, 0, 0, 0, 0),
(31, 'msn', 1, 'MSN', '', 0, 0, 0, 0, 0),
(32, 'email', 1, '电子邮箱', '', 0, 0, 0, 0, 0),
(33, 'taobao', 1, '阿里旺旺', '', 0, 0, 0, 0, 0),
(34, 'site', 1, '主页', '', 0, 0, 0, 0, 0),
(35, 'bio', 1, '自我介绍', '', 0, 0, 0, 0, 0),
(36, 'interest', 1, '兴趣爱好', '', 0, 0, 0, 0, 0);

DROP TABLE IF EXISTS `ims_qrcode`;
CREATE TABLE IF NOT EXISTS `ims_qrcode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  `extra` int(10) unsigned NOT NULL,
  `qrcid` bigint(20) NOT NULL,
  `scene_str` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `model` tinyint(1) unsigned NOT NULL,
  `ticket` varchar(250) NOT NULL,
  `url` varchar(256) NOT NULL,
  `expire` int(10) unsigned NOT NULL,
  `subnum` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_qrcid` (`qrcid`),
  KEY `uniacid` (`uniacid`),
  KEY `ticket` (`ticket`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_qrcode_stat`;
CREATE TABLE IF NOT EXISTS `ims_qrcode_stat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `qid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `qrcid` bigint(20) unsigned NOT NULL,
  `scene_str` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_rule`;
CREATE TABLE IF NOT EXISTS `ims_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `displayorder` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `containtype` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

INSERT INTO `ims_rule` (`id`, `uniacid`, `name`, `module`, `displayorder`, `status`, `containtype`) VALUES
(1, 0, '城市天气', 'userapi', 255, 1, ''),
(2, 0, '百度百科', 'userapi', 255, 1, ''),
(3, 0, '即时翻译', 'userapi', 255, 1, ''),
(4, 0, '今日老黄历', 'userapi', 255, 1, ''),
(5, 0, '看新闻', 'userapi', 255, 1, ''),
(6, 0, '快递查询', 'userapi', 255, 1, ''),
(7, 1, '个人中心入口设置', 'cover', 0, 1, ''),
(8, 1, '微擎团队入口设置', 'cover', 0, 1, ''),
(9, 1, 'ewei_shopv2文章营销入口设置', 'cover', 0, 1, ''),
(10, 1, 'ewei_shopv2签到入口设置', 'cover', 0, 1, '');

DROP TABLE IF EXISTS `ims_rule_keyword`;
CREATE TABLE IF NOT EXISTS `ims_rule_keyword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_content` (`content`),
  KEY `idx_rid` (`rid`),
  KEY `idx_uniacid_type_content` (`uniacid`,`type`,`content`),
  KEY `rid` (`rid`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

INSERT INTO `ims_rule_keyword` (`id`, `rid`, `uniacid`, `module`, `content`, `type`, `displayorder`, `status`) VALUES
(1, 1, 0, 'userapi', '^.+天气$', 3, 255, 1),
(2, 2, 0, 'userapi', '^百科.+$', 3, 255, 1),
(3, 2, 0, 'userapi', '^定义.+$', 3, 255, 1),
(4, 3, 0, 'userapi', '^@.+$', 3, 255, 1),
(5, 4, 0, 'userapi', '日历', 1, 255, 1),
(6, 4, 0, 'userapi', '万年历', 1, 255, 1),
(7, 4, 0, 'userapi', '黄历', 1, 255, 1),
(8, 4, 0, 'userapi', '几号', 1, 255, 1),
(9, 5, 0, 'userapi', '新闻', 1, 255, 1),
(10, 6, 0, 'userapi', '^(申通|圆通|中通|汇通|韵达|顺丰|EMS) *[a-z0-9]{1,}$', 3, 255, 1),
(11, 7, 1, 'cover', '个人中心', 1, 0, 1),
(12, 8, 1, 'cover', '首页', 1, 0, 1),
(13, 9, 1, 'cover', '1', 1, 0, 1),
(14, 10, 1, 'cover', '签到入口', 1, 0, 1);

DROP TABLE IF EXISTS `ims_site_article`;
CREATE TABLE IF NOT EXISTS `ims_site_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `iscommend` tinyint(1) NOT NULL,
  `ishot` tinyint(1) unsigned NOT NULL,
  `pcate` int(10) unsigned NOT NULL,
  `ccate` int(10) unsigned NOT NULL,
  `template` varchar(300) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `incontent` tinyint(1) NOT NULL,
  `source` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `displayorder` int(10) unsigned NOT NULL,
  `linkurl` varchar(500) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `edittime` int(10) NOT NULL,
  `click` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  `credit` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_iscommend` (`iscommend`),
  KEY `idx_ishot` (`ishot`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_site_category`;
CREATE TABLE IF NOT EXISTS `ims_site_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `nid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `parentid` int(10) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL,
  `icon` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `linkurl` varchar(500) NOT NULL,
  `ishomepage` tinyint(1) NOT NULL,
  `icontype` tinyint(1) unsigned NOT NULL,
  `css` varchar(500) NOT NULL,
  `multiid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_site_multi`;
CREATE TABLE IF NOT EXISTS `ims_site_multi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `site_info` text NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `bindhost` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `bindhost` (`bindhost`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `ims_site_multi` (`id`, `uniacid`, `title`, `styleid`, `site_info`, `status`, `bindhost`) VALUES
(1, 1, '微擎团队', 1, '', 1, '');

DROP TABLE IF EXISTS `ims_site_nav`;
CREATE TABLE IF NOT EXISTS `ims_site_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `section` tinyint(4) NOT NULL,
  `module` varchar(50) NOT NULL,
  `displayorder` smallint(5) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `position` tinyint(4) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(500) NOT NULL,
  `css` varchar(1000) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `categoryid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `multiid` (`multiid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_site_page`;
CREATE TABLE IF NOT EXISTS `ims_site_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `params` longtext NOT NULL,
  `html` longtext NOT NULL,
  `multipage` longtext NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `goodnum` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `multiid` (`multiid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `ims_site_page` (`id`, `uniacid`, `multiid`, `title`, `description`, `params`, `html`, `multipage`, `type`, `status`, `createtime`, `goodnum`) VALUES
(1, 1, 0, '快捷菜单', '', '{"navStyle":"2","bgColor":"#f4f4f4","menus":[{"title":"\\u4f1a\\u5458\\u5361","url":".\\/index.php?c=mc&a=bond&do=card&i=1","submenus":[],"icon":{"name":"fa fa-credit-card","color":"#969696"},"image":"","hoverimage":"","hovericon":[]},{"title":"\\u5151\\u6362","url":".\\/index.php?c=activity&a=coupon&do=display&&i=1","submenus":[],"icon":{"name":"fa fa-money","color":"#969696"},"image":"","hoverimage":"","hovericon":[]},{"title":"\\u4ed8\\u6b3e","url":"\\" data-target=\\"#scan\\" data-toggle=\\"modal\\" href=\\"javascript:void();","submenus":[],"icon":{"name":"fa fa-qrcode","color":"#969696"},"image":"","hoverimage":"","hovericon":""},{"title":"\\u4e2a\\u4eba\\u4e2d\\u5fc3","url":".\\/index.php?i=1&c=mc&","submenus":[],"icon":{"name":"fa fa-user","color":"#969696"},"image":"","hoverimage":"","hovericon":[]}],"extend":[],"position":{"homepage":true,"usercenter":true,"page":true,"article":true},"ignoreModules":[]}', '<div style="background-color: rgb(244, 244, 244);" class="js-quickmenu nav-menu-app has-nav-0  has-nav-4"   ><ul class="nav-group clearfix"><li class="nav-group-item " ><a href="./index.php?c=mc&a=bond&do=card&i=1" style="background-position: center 2px;" ><i style="color: rgb(150, 150, 150);"  class="fa fa-credit-card"  js-onclass-name="" js-onclass-color="" ></i><span style="color: rgb(150, 150, 150);" class=""  js-onclass-color="">会员卡</span></a></li><li class="nav-group-item " ><a href="./index.php?c=activity&a=coupon&do=display&&i=1" style="background-position: center 2px;" ><i style="color: rgb(150, 150, 150);"  class="fa fa-money"  js-onclass-name="" js-onclass-color="" ></i><span style="color: rgb(150, 150, 150);" class=""  js-onclass-color="">兑换</span></a></li><li class="nav-group-item " ><a href="" data-target="#scan" data-toggle="modal" href="javascript:void();" style="background-position: center 2px;" ><i style="color: rgb(150, 150, 150);"  class="fa fa-qrcode"  js-onclass-name="" js-onclass-color="" ></i><span style="color: rgb(150, 150, 150);" class=""  js-onclass-color="">付款</span></a></li><li class="nav-group-item " ><a href="./index.php?i=1&c=mc&" style="background-position: center 2px;" ><i style="color: rgb(150, 150, 150);"  class="fa fa-user"  js-onclass-name="" js-onclass-color="" ></i><span style="color: rgb(150, 150, 150);" class=""  js-onclass-color="">个人中心</span></a></li></ul></div>', '', 4, 1, 1440242655, 0);

DROP TABLE IF EXISTS `ims_site_slide`;
CREATE TABLE IF NOT EXISTS `ims_site_slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `displayorder` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `multiid` (`multiid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_site_store_create_account`;
CREATE TABLE IF NOT EXISTS `ims_site_store_create_account` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `uniacid` int(10) NOT NULL,
  `type` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_site_store_goods`;
CREATE TABLE IF NOT EXISTS `ims_site_store_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `title` varchar(100) NOT NULL,
  `module` varchar(50) NOT NULL,
  `account_num` int(10) NOT NULL,
  `wxapp_num` int(10) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `slide` varchar(1000) NOT NULL,
  `category_id` int(10) NOT NULL,
  `title_initial` varchar(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` int(10) NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `module_group` int(10) NOT NULL,
  `api_num` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module` (`module`) USING BTREE,
  KEY `category_id` (`category_id`) USING BTREE,
  KEY `price` (`price`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_site_store_order`;
CREATE TABLE IF NOT EXISTS `ims_site_store_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` varchar(28) NOT NULL,
  `goodsid` int(10) NOT NULL,
  `duration` int(10) NOT NULL,
  `buyer` varchar(50) NOT NULL,
  `buyerid` int(10) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `changeprice` tinyint(1) NOT NULL,
  `createtime` int(10) NOT NULL,
  `uniacid` int(10) NOT NULL,
  `endtime` int(15) NOT NULL,
  `wxapp` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goodid` (`goodsid`) USING BTREE,
  KEY `buyerid` (`buyerid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_site_styles`;
CREATE TABLE IF NOT EXISTS `ims_site_styles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `templateid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `ims_site_styles` (`id`, `uniacid`, `templateid`, `name`) VALUES
(1, 1, 1, '微站默认模板_gC5C');

DROP TABLE IF EXISTS `ims_site_styles_vars`;
CREATE TABLE IF NOT EXISTS `ims_site_styles_vars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `templateid` int(10) unsigned NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `variable` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_site_templates`;
CREATE TABLE IF NOT EXISTS `ims_site_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `version` varchar(64) NOT NULL,
  `description` varchar(500) NOT NULL,
  `author` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `sections` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `ims_site_templates` (`id`, `name`, `title`, `version`, `description`, `author`, `url`, `type`, `sections`) VALUES
(1, 'default', '微站默认模板', '', '由微擎提供默认微站模板套系', '微擎团队', 'http://we7.cc', '1', 0);

DROP TABLE IF EXISTS `ims_stat_fans`;
CREATE TABLE IF NOT EXISTS `ims_stat_fans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `new` int(10) unsigned NOT NULL,
  `cancel` int(10) unsigned NOT NULL,
  `cumulate` int(10) NOT NULL,
  `date` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=335 ;

INSERT INTO `ims_stat_fans` (`id`, `uniacid`, `new`, `cancel`, `cumulate`, `date`) VALUES
(1, 1, 0, 0, 0, '20160715'),
(2, 1, 0, 0, 0, '20160714'),
(3, 1, 0, 0, 0, '20160713'),
(4, 1, 0, 0, 0, '20160712'),
(5, 1, 0, 0, 0, '20160711'),
(6, 1, 0, 0, 0, '20160710'),
(7, 1, 0, 0, 0, '20160709'),
(8, 1, 0, 0, 0, '20160813'),
(9, 1, 0, 0, 0, '20160812'),
(10, 1, 0, 0, 0, '20160811'),
(11, 1, 0, 0, 0, '20160810'),
(12, 1, 0, 0, 0, '20160809'),
(13, 1, 0, 0, 0, '20160808'),
(14, 1, 0, 0, 0, '20160807'),
(15, 1, 0, 0, 0, '20160819'),
(16, 1, 0, 0, 0, '20160818'),
(17, 1, 0, 0, 0, '20160817'),
(18, 1, 0, 0, 0, '20160816'),
(19, 1, 0, 0, 0, '20160815'),
(20, 1, 0, 0, 0, '20160814'),
(21, 1, 0, 0, 0, '20160829'),
(22, 1, 0, 0, 0, '20160828'),
(23, 1, 0, 0, 0, '20160827'),
(24, 1, 0, 0, 0, '20160826'),
(25, 1, 0, 0, 0, '20160825'),
(26, 1, 0, 0, 0, '20160824'),
(27, 1, 0, 0, 0, '20160823'),
(28, 1, 0, 0, 0, '20160903'),
(29, 1, 0, 0, 0, '20160902'),
(30, 1, 0, 0, 0, '20160901'),
(31, 1, 0, 0, 0, '20160831'),
(32, 1, 0, 0, 0, '20160830'),
(33, 1, 0, 0, 0, '20160911'),
(34, 1, 0, 0, 0, '20160910'),
(35, 1, 0, 0, 0, '20160909'),
(36, 1, 0, 0, 0, '20160908'),
(37, 1, 0, 0, 0, '20160907'),
(38, 1, 0, 0, 0, '20160906'),
(39, 1, 0, 0, 0, '20160905'),
(40, 1, 0, 0, 0, '20160912'),
(41, 1, 0, 0, 0, '20160918'),
(42, 1, 0, 0, 0, '20160917'),
(43, 1, 0, 0, 0, '20160916'),
(44, 1, 0, 0, 0, '20160915'),
(45, 1, 0, 0, 0, '20160914'),
(46, 1, 0, 0, 0, '20160913'),
(47, 1, 0, 0, 0, '20160919'),
(48, 1, 0, 0, 0, '20161004'),
(49, 1, 0, 0, 0, '20161003'),
(50, 1, 0, 0, 0, '20161002'),
(51, 1, 0, 0, 0, '20161001'),
(52, 1, 0, 0, 0, '20160930'),
(53, 1, 0, 0, 0, '20160929'),
(54, 1, 0, 0, 0, '20160928'),
(55, 1, 0, 0, 0, '20161011'),
(56, 1, 0, 0, 0, '20161010'),
(57, 1, 0, 0, 0, '20161009'),
(58, 1, 0, 0, 0, '20161008'),
(59, 1, 0, 0, 0, '20161007'),
(60, 1, 0, 0, 0, '20161006'),
(61, 1, 0, 0, 0, '20161005'),
(62, 1, 0, 0, 0, '20161019'),
(63, 1, 0, 0, 0, '20161018'),
(64, 1, 0, 0, 0, '20161017'),
(65, 1, 0, 0, 0, '20161016'),
(66, 1, 0, 0, 0, '20161015'),
(67, 1, 0, 0, 0, '20161014'),
(68, 1, 0, 0, 0, '20161013'),
(69, 1, 0, 0, 0, '20161026'),
(70, 1, 0, 0, 0, '20161025'),
(71, 1, 0, 0, 0, '20161024'),
(72, 1, 0, 0, 0, '20161023'),
(73, 1, 0, 0, 0, '20161022'),
(74, 1, 0, 0, 0, '20161021'),
(75, 1, 0, 0, 0, '20161020'),
(76, 1, 0, 0, 0, '20161102'),
(77, 1, 0, 0, 0, '20161101'),
(78, 1, 0, 0, 0, '20161031'),
(79, 1, 0, 0, 0, '20161030'),
(80, 1, 0, 0, 0, '20161029'),
(81, 1, 0, 0, 0, '20161028'),
(82, 1, 0, 0, 0, '20161027'),
(83, 1, 0, 0, 0, '20161112'),
(84, 1, 0, 0, 0, '20161111'),
(85, 1, 0, 0, 0, '20161110'),
(86, 1, 0, 0, 0, '20161109'),
(87, 1, 0, 0, 0, '20161108'),
(88, 1, 0, 0, 0, '20161107'),
(89, 1, 0, 0, 0, '20161106'),
(90, 1, 0, 0, 0, '20161122'),
(91, 1, 0, 0, 0, '20161121'),
(92, 1, 0, 0, 0, '20161120'),
(93, 1, 0, 0, 0, '20161119'),
(94, 1, 0, 0, 0, '20161118'),
(95, 1, 0, 0, 0, '20161117'),
(96, 1, 0, 0, 0, '20161116'),
(97, 1, 0, 0, 0, '20161207'),
(98, 1, 0, 0, 0, '20161206'),
(99, 1, 0, 0, 0, '20161205'),
(100, 1, 0, 0, 0, '20161204'),
(101, 1, 0, 0, 0, '20161203'),
(102, 1, 0, 0, 0, '20161202'),
(103, 1, 0, 0, 0, '20161201'),
(104, 1, 0, 0, 0, '20161208'),
(105, 1, 0, 0, 0, '20161225'),
(106, 1, 0, 0, 0, '20161224'),
(107, 1, 0, 0, 0, '20161223'),
(108, 1, 0, 0, 0, '20161222'),
(109, 1, 0, 0, 0, '20161221'),
(110, 1, 0, 0, 0, '20161220'),
(111, 1, 0, 0, 0, '20161219'),
(112, 1, 0, 0, 0, '20170108'),
(113, 1, 0, 0, 0, '20170107'),
(114, 1, 0, 0, 0, '20170106'),
(115, 1, 0, 0, 0, '20170105'),
(116, 1, 0, 0, 0, '20170104'),
(117, 1, 0, 0, 0, '20170103'),
(118, 1, 0, 0, 0, '20170102'),
(119, 1, 0, 0, 0, '20170110'),
(120, 1, 0, 0, 0, '20170109'),
(121, 1, 0, 0, 0, '20170209'),
(122, 1, 0, 0, 0, '20170208'),
(123, 1, 0, 0, 0, '20170207'),
(124, 1, 0, 0, 0, '20170206'),
(125, 1, 0, 0, 0, '20170205'),
(126, 1, 0, 0, 0, '20170204'),
(127, 1, 0, 0, 0, '20170203'),
(128, 1, 0, 0, 0, '20170213'),
(129, 1, 0, 0, 0, '20170212'),
(130, 1, 0, 0, 0, '20170211'),
(131, 1, 0, 0, 0, '20170210'),
(132, 1, 0, 0, 0, '20170214'),
(133, 1, 0, 0, 0, '20170220'),
(134, 1, 0, 0, 0, '20170219'),
(135, 1, 0, 0, 0, '20170218'),
(136, 1, 0, 0, 0, '20170217'),
(137, 1, 0, 0, 0, '20170216'),
(138, 1, 0, 0, 0, '20170215'),
(139, 1, 0, 0, 0, '20170221'),
(140, 1, 0, 0, 0, '20170309'),
(141, 1, 0, 0, 0, '20170308'),
(142, 1, 0, 0, 0, '20170307'),
(143, 1, 0, 0, 0, '20170306'),
(144, 1, 0, 0, 0, '20170305'),
(145, 1, 0, 0, 0, '20170304'),
(146, 1, 0, 0, 0, '20170303'),
(147, 1, 0, 0, 0, '20170314'),
(148, 1, 0, 0, 0, '20170313'),
(149, 1, 0, 0, 0, '20170312'),
(150, 1, 0, 0, 0, '20170311'),
(151, 1, 0, 0, 0, '20170310'),
(152, 1, 0, 0, 0, '20170319'),
(153, 1, 0, 0, 0, '20170318'),
(154, 1, 0, 0, 0, '20170317'),
(155, 1, 0, 0, 0, '20170316'),
(156, 1, 0, 0, 0, '20170315'),
(157, 1, 0, 0, 0, '20170320'),
(158, 1, 0, 0, 0, '20170328'),
(159, 1, 0, 0, 0, '20170327'),
(160, 1, 0, 0, 0, '20170326'),
(161, 1, 0, 0, 0, '20170325'),
(162, 1, 0, 0, 0, '20170324'),
(163, 1, 0, 0, 0, '20170323'),
(164, 1, 0, 0, 0, '20170322'),
(165, 1, 0, 0, 0, '20170329'),
(166, 1, 0, 0, 0, '20170330'),
(167, 1, 0, 0, 0, '20170331'),
(168, 1, 0, 0, 0, '20170407'),
(169, 1, 0, 0, 0, '20170406'),
(170, 1, 0, 0, 0, '20170405'),
(171, 1, 0, 0, 0, '20170404'),
(172, 1, 0, 0, 0, '20170403'),
(173, 1, 0, 0, 0, '20170402'),
(174, 1, 0, 0, 0, '20170401'),
(175, 1, 0, 0, 0, '20170414'),
(176, 1, 0, 0, 0, '20170413'),
(177, 1, 0, 0, 0, '20170412'),
(178, 1, 0, 0, 0, '20170411'),
(179, 1, 0, 0, 0, '20170410'),
(180, 1, 0, 0, 0, '20170409'),
(181, 1, 0, 0, 0, '20170408'),
(182, 1, 0, 0, 0, '20170420'),
(183, 1, 0, 0, 0, '20170419'),
(184, 1, 0, 0, 0, '20170418'),
(185, 1, 0, 0, 0, '20170417'),
(186, 1, 0, 0, 0, '20170416'),
(187, 1, 0, 0, 0, '20170415'),
(188, 1, 0, 0, 0, '20170421'),
(189, 1, 0, 0, 0, '20170510'),
(190, 1, 0, 0, 0, '20170509'),
(191, 1, 0, 0, 0, '20170508'),
(192, 1, 0, 0, 0, '20170507'),
(193, 1, 0, 0, 0, '20170506'),
(194, 1, 0, 0, 0, '20170505'),
(195, 1, 0, 0, 0, '20170504'),
(196, 1, 0, 0, 0, '20170523'),
(197, 1, 0, 0, 0, '20170522'),
(198, 1, 0, 0, 0, '20170521'),
(199, 1, 0, 0, 0, '20170520'),
(200, 1, 0, 0, 0, '20170519'),
(201, 1, 0, 0, 0, '20170518'),
(202, 1, 0, 0, 0, '20170517'),
(203, 1, 0, 0, 0, '20170709'),
(204, 1, 0, 0, 0, '20170708'),
(205, 1, 0, 0, 0, '20170707'),
(206, 1, 0, 0, 0, '20170706'),
(207, 1, 0, 0, 0, '20170705'),
(208, 1, 0, 0, 0, '20170704'),
(209, 1, 0, 0, 0, '20170703'),
(210, 1, 0, 0, 0, '20170715'),
(211, 1, 0, 0, 0, '20170714'),
(212, 1, 0, 0, 0, '20170713'),
(213, 1, 0, 0, 0, '20170712'),
(214, 1, 0, 0, 0, '20170711'),
(215, 1, 0, 0, 0, '20170710'),
(216, 1, 0, 0, 0, '20170726'),
(217, 1, 0, 0, 0, '20170725'),
(218, 1, 0, 0, 0, '20170724'),
(219, 1, 0, 0, 0, '20170723'),
(220, 1, 0, 0, 0, '20170722'),
(221, 1, 0, 0, 0, '20170721'),
(222, 1, 0, 0, 0, '20170720'),
(223, 1, 0, 0, 0, '20170810'),
(224, 1, 0, 0, 0, '20170809'),
(225, 1, 0, 0, 0, '20170808'),
(226, 1, 0, 0, 0, '20170807'),
(227, 1, 0, 0, 0, '20170806'),
(228, 1, 0, 0, 0, '20170805'),
(229, 1, 0, 0, 0, '20170804'),
(230, 1, 0, 0, 0, '20170812'),
(231, 1, 0, 0, 0, '20170811'),
(232, 1, 0, 0, 0, '20170904'),
(233, 1, 0, 0, 0, '20170903'),
(234, 1, 0, 0, 0, '20170902'),
(235, 1, 0, 0, 0, '20170901'),
(236, 1, 0, 0, 0, '20170831'),
(237, 1, 0, 0, 0, '20170830'),
(238, 1, 0, 0, 0, '20170829'),
(239, 1, 0, 0, 0, '20170920'),
(240, 1, 0, 0, 0, '20170919'),
(241, 1, 0, 0, 0, '20170918'),
(242, 1, 0, 0, 0, '20170917'),
(243, 1, 0, 0, 0, '20170916'),
(244, 1, 0, 0, 0, '20170915'),
(245, 1, 0, 0, 0, '20170914'),
(246, 1, 0, 0, 0, '20171008'),
(247, 1, 0, 0, 0, '20171007'),
(248, 1, 0, 0, 0, '20171006'),
(249, 1, 0, 0, 0, '20171005'),
(250, 1, 0, 0, 0, '20171004'),
(251, 1, 0, 0, 0, '20171003'),
(252, 1, 0, 0, 0, '20171002'),
(253, 1, 0, 0, 0, '20171023'),
(254, 1, 0, 0, 0, '20171022'),
(255, 1, 0, 0, 0, '20171021'),
(256, 1, 0, 0, 0, '20171020'),
(257, 1, 0, 0, 0, '20171019'),
(258, 1, 0, 0, 0, '20171018'),
(259, 1, 0, 0, 0, '20171017'),
(260, 1, 0, 0, 0, '20171128'),
(261, 1, 0, 0, 0, '20171127'),
(262, 1, 0, 0, 0, '20171126'),
(263, 1, 0, 0, 0, '20171125'),
(264, 1, 0, 0, 0, '20171124'),
(265, 1, 0, 0, 0, '20171123'),
(266, 1, 0, 0, 0, '20171122'),
(267, 1, 0, 0, 0, '20171219'),
(268, 1, 0, 0, 0, '20171218'),
(269, 1, 0, 0, 0, '20171217'),
(270, 1, 0, 0, 0, '20171216'),
(271, 1, 0, 0, 0, '20171215'),
(272, 1, 0, 0, 0, '20171214'),
(273, 1, 0, 0, 0, '20171213'),
(274, 1, 0, 0, 0, '20180115'),
(275, 1, 0, 0, 0, '20180114'),
(276, 1, 0, 0, 0, '20180113'),
(277, 1, 0, 0, 0, '20180112'),
(278, 1, 0, 0, 0, '20180111'),
(279, 1, 0, 0, 0, '20180110'),
(280, 1, 0, 0, 0, '20180109'),
(281, 1, 0, 0, 0, '20180129'),
(282, 1, 0, 0, 0, '20180128'),
(283, 1, 0, 0, 0, '20180127'),
(284, 1, 0, 0, 0, '20180126'),
(285, 1, 0, 0, 0, '20180125'),
(286, 1, 0, 0, 0, '20180124'),
(287, 1, 0, 0, 0, '20180123'),
(288, 1, 0, 0, 0, '20180226'),
(289, 1, 0, 0, 0, '20180225'),
(290, 1, 0, 0, 0, '20180224'),
(291, 1, 0, 0, 0, '20180223'),
(292, 1, 0, 0, 0, '20180222'),
(293, 1, 0, 0, 0, '20180221'),
(294, 1, 0, 0, 0, '20180220'),
(295, 1, 0, 0, 0, '20180422'),
(296, 1, 0, 0, 0, '20180421'),
(297, 1, 0, 0, 0, '20180420'),
(298, 1, 0, 0, 0, '20180419'),
(299, 1, 0, 0, 0, '20180418'),
(300, 1, 0, 0, 0, '20180417'),
(301, 1, 0, 0, 0, '20180416'),
(302, 1, 0, 0, 0, '20180507'),
(303, 1, 0, 0, 0, '20180506'),
(304, 1, 0, 0, 0, '20180505'),
(305, 1, 0, 0, 0, '20180504'),
(306, 1, 0, 0, 0, '20180503'),
(307, 1, 0, 0, 0, '20180502'),
(308, 1, 0, 0, 0, '20180501'),
(309, 1, 0, 0, 0, '20180522'),
(310, 1, 0, 0, 0, '20180521'),
(311, 1, 0, 0, 0, '20180520'),
(312, 1, 0, 0, 0, '20180519'),
(313, 1, 0, 0, 0, '20180518'),
(314, 1, 0, 0, 0, '20180517'),
(315, 1, 0, 0, 0, '20180516'),
(316, 1, 0, 0, 0, '20180527'),
(317, 1, 0, 0, 0, '20180526'),
(318, 1, 0, 0, 0, '20180525'),
(319, 1, 0, 0, 0, '20180524'),
(320, 1, 0, 0, 0, '20180523'),
(321, 1, 0, 0, 0, '20180603'),
(322, 1, 0, 0, 0, '20180602'),
(323, 1, 0, 0, 0, '20180601'),
(324, 1, 0, 0, 0, '20180531'),
(325, 1, 0, 0, 0, '20180530'),
(326, 1, 0, 0, 0, '20180529'),
(327, 1, 0, 0, 0, '20180528'),
(328, 1, 0, 0, 0, '20180624'),
(329, 1, 0, 0, 0, '20180623'),
(330, 1, 0, 0, 0, '20180622'),
(331, 1, 0, 0, 0, '20180621'),
(332, 1, 0, 0, 0, '20180620'),
(333, 1, 0, 0, 0, '20180619'),
(334, 1, 0, 0, 0, '20180618');

DROP TABLE IF EXISTS `ims_stat_keyword`;
CREATE TABLE IF NOT EXISTS `ims_stat_keyword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` varchar(10) NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `hit` int(10) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_stat_msg_history`;
CREATE TABLE IF NOT EXISTS `ims_stat_msg_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `type` varchar(10) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_stat_rule`;
CREATE TABLE IF NOT EXISTS `ims_stat_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `hit` int(10) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_stat_visit`;
CREATE TABLE IF NOT EXISTS `ims_stat_visit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `module` varchar(100) NOT NULL,
  `count` int(10) unsigned NOT NULL,
  `date` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `date` (`date`) USING BTREE,
  KEY `module` (`module`) USING BTREE,
  KEY `uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_uni_account`;
CREATE TABLE IF NOT EXISTS `ims_uni_account` (
  `uniacid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `default_acid` int(10) unsigned NOT NULL,
  `rank` int(10) DEFAULT NULL,
  `title_initial` varchar(1) NOT NULL,
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `ims_uni_account` (`uniacid`, `groupid`, `name`, `description`, `default_acid`, `rank`, `title_initial`) VALUES
(1, 0, 'wesambo', '一个朝气蓬勃的团队', 1, NULL, '');

DROP TABLE IF EXISTS `ims_uni_account_group`;
CREATE TABLE IF NOT EXISTS `ims_uni_account_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `groupid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_uni_account_menus`;
CREATE TABLE IF NOT EXISTS `ims_uni_account_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `menuid` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `sex` tinyint(3) unsigned NOT NULL,
  `group_id` int(10) NOT NULL,
  `client_platform_type` tinyint(3) unsigned NOT NULL,
  `area` varchar(50) NOT NULL,
  `data` text NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `isdeleted` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `menuid` (`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_uni_account_modules`;
CREATE TABLE IF NOT EXISTS `ims_uni_account_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL,
  `settings` text NOT NULL,
  `shortcut` tinyint(1) unsigned NOT NULL,
  `displayorder` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_module` (`module`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

INSERT INTO `ims_uni_account_modules` (`id`, `uniacid`, `module`, `enabled`, `settings`, `shortcut`, `displayorder`) VALUES
(1, 1, 'basic', 1, '', 0, 0),
(2, 1, 'news', 1, '', 0, 0),
(3, 1, 'music', 1, '', 0, 0),
(4, 1, 'userapi', 1, '', 0, 0),
(5, 1, 'recharge', 1, '', 0, 0),
(8, 1, 'ewei_shopv2', 1, '', 0, 0);

DROP TABLE IF EXISTS `ims_uni_account_users`;
CREATE TABLE IF NOT EXISTS `ims_uni_account_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `role` varchar(255) NOT NULL,
  `rank` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_memberid` (`uid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_uni_group`;
CREATE TABLE IF NOT EXISTS `ims_uni_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_uid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `modules` text NOT NULL,
  `templates` varchar(5000) NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `ims_uni_group` (`id`, `owner_uid`, `name`, `modules`, `templates`, `uniacid`) VALUES
(1, 0, '体验套餐服务', 'a:1:{i:0;s:11:"ewei_shopv2";}', 'N;', 0);

DROP TABLE IF EXISTS `ims_uni_settings`;
CREATE TABLE IF NOT EXISTS `ims_uni_settings` (
  `uniacid` int(10) unsigned NOT NULL,
  `passport` varchar(200) NOT NULL,
  `oauth` varchar(100) NOT NULL,
  `jsauth_acid` int(10) unsigned NOT NULL,
  `uc` varchar(500) NOT NULL,
  `notify` varchar(2000) NOT NULL,
  `creditnames` varchar(500) NOT NULL,
  `creditbehaviors` varchar(500) NOT NULL,
  `welcome` varchar(60) NOT NULL,
  `default` varchar(60) NOT NULL,
  `default_message` varchar(2000) NOT NULL,
  `payment` text NOT NULL,
  `stat` varchar(300) NOT NULL,
  `default_site` int(10) unsigned DEFAULT NULL,
  `sync` tinyint(3) unsigned NOT NULL,
  `recharge` varchar(500) NOT NULL,
  `tplnotice` varchar(1000) NOT NULL,
  `grouplevel` tinyint(3) unsigned NOT NULL,
  `mcplugin` varchar(500) NOT NULL,
  `exchange_enable` tinyint(3) unsigned NOT NULL,
  `coupon_type` tinyint(3) unsigned NOT NULL,
  `menuset` text NOT NULL,
  `statistics` varchar(100) NOT NULL,
  `bind_domain` varchar(200) NOT NULL,
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `ims_uni_settings` (`uniacid`, `passport`, `oauth`, `jsauth_acid`, `uc`, `notify`, `creditnames`, `creditbehaviors`, `welcome`, `default`, `default_message`, `payment`, `stat`, `default_site`, `sync`, `recharge`, `tplnotice`, `grouplevel`, `mcplugin`, `exchange_enable`, `coupon_type`, `menuset`, `statistics`, `bind_domain`) VALUES
(1, 'a:3:{s:8:"focusreg";i:0;s:4:"item";s:5:"email";s:4:"type";s:8:"password";}', 'a:2:{s:6:"status";s:1:"0";s:7:"account";s:1:"0";}', 0, 'a:1:{s:6:"status";i:0;}', 'a:1:{s:3:"sms";a:2:{s:7:"balance";i:0;s:9:"signature";s:0:"";}}', 'a:5:{s:7:"credit1";a:2:{s:5:"title";s:6:"积分";s:7:"enabled";i:1;}s:7:"credit2";a:2:{s:5:"title";s:6:"余额";s:7:"enabled";i:1;}s:7:"credit3";a:2:{s:5:"title";s:0:"";s:7:"enabled";i:0;}s:7:"credit4";a:2:{s:5:"title";s:0:"";s:7:"enabled";i:0;}s:7:"credit5";a:2:{s:5:"title";s:0:"";s:7:"enabled";i:0;}}', 'a:2:{s:8:"activity";s:7:"credit1";s:8:"currency";s:7:"credit2";}', '', '', '', 'a:4:{s:6:"credit";a:1:{s:6:"switch";b:0;}s:6:"alipay";a:4:{s:6:"switch";b:0;s:7:"account";s:0:"";s:7:"partner";s:0:"";s:6:"secret";s:0:"";}s:6:"wechat";a:5:{s:6:"switch";b:0;s:7:"account";b:0;s:7:"signkey";s:0:"";s:7:"partner";s:0:"";s:3:"key";s:0:"";}s:8:"delivery";a:1:{s:6:"switch";b:0;}}', '', 1, 0, '', '', 0, '', 0, 0, '', '', '');

DROP TABLE IF EXISTS `ims_uni_verifycode`;
CREATE TABLE IF NOT EXISTS `ims_uni_verifycode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `verifycode` varchar(6) NOT NULL,
  `total` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_userapi_cache`;
CREATE TABLE IF NOT EXISTS `ims_userapi_cache` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_userapi_reply`;
CREATE TABLE IF NOT EXISTS `ims_userapi_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `description` varchar(300) NOT NULL,
  `apiurl` varchar(300) NOT NULL,
  `token` varchar(32) NOT NULL,
  `default_text` varchar(100) NOT NULL,
  `cachetime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `ims_userapi_reply` (`id`, `rid`, `description`, `apiurl`, `token`, `default_text`, `cachetime`) VALUES
(1, 1, '"城市名+天气", 如: "北京天气"', 'weather.php', '', '', 0),
(2, 2, '"百科+查询内容" 或 "定义+查询内容", 如: "百科姚明", "定义自行车"', 'baike.php', '', '', 0),
(3, 3, '"@查询内容(中文或英文)"', 'translate.php', '', '', 0),
(4, 4, '"日历", "万年历", "黄历"或"几号"', 'calendar.php', '', '', 0),
(5, 5, '"新闻"', 'news.php', '', '', 0),
(6, 6, '"快递+单号", 如: "申通1200041125"', 'express.php', '', '', 0);

DROP TABLE IF EXISTS `ims_users`;
CREATE TABLE IF NOT EXISTS `ims_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_uid` int(10) NOT NULL,
  `groupid` int(10) unsigned NOT NULL,
  `founder_groupid` tinyint(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `joindate` int(10) unsigned NOT NULL,
  `joinip` varchar(15) NOT NULL,
  `lastvisit` int(10) unsigned NOT NULL,
  `lastip` varchar(15) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  `register_type` tinyint(3) NOT NULL,
  `openid` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `ims_users` (`uid`, `owner_uid`, `groupid`, `founder_groupid`, `username`, `password`, `salt`, `type`, `status`, `joindate`, `joinip`, `lastvisit`, `lastip`, `remark`, `starttime`, `endtime`, `register_type`, `openid`) VALUES
(1, 0, 0, 0, 'admin', 'c49e8fafe1e1f0271403a221b2ab03b2cf4328b9', '316b6c24', 0, 0, 1468650810, '', 1529293484, '127.0.0.1', '', 0, 0, 0, '');

DROP TABLE IF EXISTS `ims_users_bind`;
CREATE TABLE IF NOT EXISTS `ims_users_bind` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `bind_sign` varchar(50) NOT NULL,
  `third_type` tinyint(4) NOT NULL,
  `third_nickname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE,
  KEY `bind_sign` (`bind_sign`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_users_failed_login`;
CREATE TABLE IF NOT EXISTS `ims_users_failed_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `username` varchar(32) NOT NULL,
  `count` tinyint(1) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_username` (`ip`,`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

DROP TABLE IF EXISTS `ims_users_founder_group`;
CREATE TABLE IF NOT EXISTS `ims_users_founder_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `package` varchar(5000) NOT NULL,
  `maxaccount` int(10) unsigned NOT NULL,
  `maxsubaccount` int(10) unsigned NOT NULL,
  `timelimit` int(10) unsigned NOT NULL,
  `maxwxapp` int(10) unsigned NOT NULL,
  `maxwebapp` int(10) NOT NULL,
  `maxphoneapp` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_users_group`;
CREATE TABLE IF NOT EXISTS `ims_users_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_uid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `package` varchar(5000) NOT NULL,
  `maxaccount` int(10) unsigned NOT NULL,
  `maxsubaccount` int(10) unsigned NOT NULL,
  `timelimit` int(10) unsigned NOT NULL,
  `maxwxapp` int(10) unsigned NOT NULL,
  `maxwebapp` int(10) NOT NULL,
  `maxphoneapp` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `ims_users_group` (`id`, `owner_uid`, `name`, `package`, `maxaccount`, `maxsubaccount`, `timelimit`, `maxwxapp`, `maxwebapp`, `maxphoneapp`) VALUES
(1, 0, '体验用户组', 'a:1:{i:0;i:1;}', 1, 1, 0, 0, 0, 0),
(2, 0, '白金用户组', 'a:1:{i:0;i:1;}', 2, 2, 0, 0, 0, 0),
(3, 0, '黄金用户组', 'a:1:{i:0;i:1;}', 3, 3, 0, 0, 0, 0);

DROP TABLE IF EXISTS `ims_users_invitation`;
CREATE TABLE IF NOT EXISTS `ims_users_invitation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `fromuid` int(10) unsigned NOT NULL,
  `inviteuid` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_users_permission`;
CREATE TABLE IF NOT EXISTS `ims_users_permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `type` varchar(100) NOT NULL,
  `permission` varchar(10000) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_users_profile`;
CREATE TABLE IF NOT EXISTS `ims_users_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `edittime` int(10) NOT NULL,
  `realname` varchar(10) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `fakeid` varchar(30) NOT NULL,
  `vip` tinyint(3) unsigned NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthyear` smallint(6) unsigned NOT NULL,
  `birthmonth` tinyint(3) unsigned NOT NULL,
  `birthday` tinyint(3) unsigned NOT NULL,
  `constellation` varchar(10) NOT NULL,
  `zodiac` varchar(5) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `idcard` varchar(30) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `resideprovince` varchar(30) NOT NULL,
  `residecity` varchar(30) NOT NULL,
  `residedist` varchar(30) NOT NULL,
  `graduateschool` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `education` varchar(10) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `revenue` varchar(10) NOT NULL,
  `affectivestatus` varchar(30) NOT NULL,
  `lookingfor` varchar(255) NOT NULL,
  `bloodtype` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `weight` varchar(5) NOT NULL,
  `alipay` varchar(30) NOT NULL,
  `msn` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `taobao` varchar(30) NOT NULL,
  `site` varchar(30) NOT NULL,
  `bio` text NOT NULL,
  `interest` text NOT NULL,
  `workerid` varchar(64) NOT NULL,
  `is_send_mobile_status` tinyint(3) NOT NULL,
  `send_expire_status` tinyint(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_video_reply`;
CREATE TABLE IF NOT EXISTS `ims_video_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mediaid` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_voice_reply`;
CREATE TABLE IF NOT EXISTS `ims_voice_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `mediaid` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_wechat_attachment`;
CREATE TABLE IF NOT EXISTS `ims_wechat_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `media_id` varchar(255) NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  `model` varchar(25) NOT NULL,
  `tag` varchar(5000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `module_upload_dir` varchar(100) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `media_id` (`media_id`),
  KEY `acid` (`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_wechat_news`;
CREATE TABLE IF NOT EXISTS `ims_wechat_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned DEFAULT NULL,
  `attach_id` int(10) unsigned NOT NULL,
  `thumb_media_id` varchar(60) NOT NULL,
  `thumb_url` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `digest` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_source_url` varchar(200) NOT NULL,
  `show_cover_pic` tinyint(3) unsigned NOT NULL,
  `url` varchar(200) NOT NULL,
  `displayorder` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `attach_id` (`attach_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_wxapp_general_analysis`;
CREATE TABLE IF NOT EXISTS `ims_wxapp_general_analysis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `session_cnt` int(10) NOT NULL,
  `visit_pv` int(10) NOT NULL,
  `visit_uv` int(10) NOT NULL,
  `visit_uv_new` int(10) NOT NULL,
  `type` tinyint(2) NOT NULL,
  `stay_time_uv` varchar(10) NOT NULL,
  `stay_time_session` varchar(10) NOT NULL,
  `visit_depth` varchar(10) NOT NULL,
  `ref_date` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`) USING BTREE,
  KEY `ref_date` (`ref_date`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_wxapp_versions`;
CREATE TABLE IF NOT EXISTS `ims_wxapp_versions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `version` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `modules` varchar(1000) NOT NULL,
  `design_method` tinyint(1) NOT NULL,
  `template` int(10) NOT NULL,
  `quickmenu` varchar(2500) NOT NULL,
  `createtime` int(10) NOT NULL,
  `type` int(2) NOT NULL,
  `entry_id` int(11) NOT NULL,
  `appjson` text NOT NULL,
  `default_appjson` text NOT NULL,
  `use_default` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `version` (`version`) USING BTREE,
  KEY `uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `ims_wxcard_reply`;
CREATE TABLE IF NOT EXISTS `ims_wxcard_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `brand_name` varchar(30) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `success` varchar(255) NOT NULL,
  `error` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `ims_ewei_shop_address_applyfor` ADD COLUMN `cycleid`  int(11) NULL DEFAULT NULL AFTER `old_address`;

ALTER TABLE `ims_ewei_shop_groups_order` ADD COLUMN `diyformid`  int(11) NULL DEFAULT 0 AFTER `specs`;
ALTER TABLE `ims_ewei_shop_groups_order` ADD COLUMN `diyformdata`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER `diyformid`;
ALTER TABLE `ims_ewei_shop_groups_order` ADD COLUMN `diyformfields`  text CHARACTER SET utf8 COLLATE utf8_general_ci NULL AFTER `diyformdata`;

UPDATE  `ims_modules` SET  `version` =  '3.9.2',
`author` =  '微上宝科技',
`url` =  'https://shop140828924.taobao.com' WHERE  `name` ='ewei_shopv2';

ALTER TABLE `ims_ewei_shop_coupon` ADD COLUMN `templateid`  varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' AFTER `quickget`;
UPDATE  `ims_modules` SET  `version` =  '3.9.8',
`author` =  '微上宝科技',
`url` =  'https://shop140828924.taobao.com' WHERE  `name` ='ewei_shopv2';

ALTER TABLE `ims_ewei_shop_member` ADD COLUMN `applyagenttime`  int(11) NULL DEFAULT 0 AFTER `diyheadsfields`;
DROP TABLE IF EXISTS `ims_ewei_shop_member_card`;
CREATE TABLE `ims_ewei_shop_member_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `card_style` varchar(255) DEFAULT NULL,
  `sort_order` int(10) DEFAULT '0',
  `shipping` tinyint(11) DEFAULT NULL,
  `member_discount` tinyint(1) DEFAULT NULL,
  `discount_rate` decimal(10,1) DEFAULT NULL,
  `discount` tinyint(1) NOT NULL DEFAULT '1',
  `is_card_points` tinyint(1) DEFAULT NULL,
  `card_points` varchar(50) DEFAULT NULL,
  `is_card_coupon` tinyint(1) DEFAULT NULL,
  `card_coupon` varchar(500) DEFAULT NULL,
  `is_month_points` tinyint(1) DEFAULT NULL,
  `month_points` varchar(50) DEFAULT NULL,
  `is_month_coupon` tinyint(1) DEFAULT NULL,
  `month_coupon` varchar(500) DEFAULT NULL,
  `validate` int(11) NOT NULL DEFAULT '1',
  `price` decimal(11,2) NOT NULL DEFAULT '0.00',
  `stock` int(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text,
  `kefu_tel` varchar(100) DEFAULT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `sale_count` int(11) NOT NULL DEFAULT '0',
  `del_time` int(11) NOT NULL DEFAULT '0',
  `isdelete` tinyint(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `ims_ewei_shop_member_card_buysend`;
CREATE TABLE `ims_ewei_shop_member_card_buysend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `member_card_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `receive_time` int(11) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `price` decimal(11,2) NOT NULL DEFAULT '0.00',
  `sendtype` tinyint(1) NOT NULL DEFAULT '1',
  `card_points` varchar(50) DEFAULT NULL,
  `card_couponid` int(11) NOT NULL DEFAULT '0',
  `card_couponcount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_openid` (`openid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `ims_ewei_shop_member_card_history`;
CREATE TABLE `ims_ewei_shop_member_card_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `order_id` int(11) NOT NULL,
  `openid` varchar(50) DEFAULT '',
  `member_card_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `expire_time` int(11) NOT NULL DEFAULT '0',
  `receive_time` int(11) NOT NULL DEFAULT '0',
  `price` decimal(11,2) NOT NULL DEFAULT '0.00',
  `user_name` varchar(255) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `isdelete` int(11) NOT NULL DEFAULT '0',
  `del_time` int(11) NOT NULL DEFAULT '0',
  `pay_type` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `ims_ewei_shop_member_card_monthsend`;
CREATE TABLE `ims_ewei_shop_member_card_monthsend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `member_card_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `receive_time` int(11) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `price` decimal(11,2) NOT NULL DEFAULT '0.00',
  `validate` int(11) NOT NULL DEFAULT '1',
  `sendtype` tinyint(1) NOT NULL DEFAULT '1',
  `card_points` varchar(50) DEFAULT NULL,
  `card_couponid` int(11) NOT NULL DEFAULT '0',
  `card_couponcount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_openid` (`openid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `ims_ewei_shop_member_card_order`;
CREATE TABLE `ims_ewei_shop_member_card_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `member_id` int(11) DEFAULT '0',
  `payment_name` varchar(32) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `orderno` varchar(30) DEFAULT NULL,
  `total` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `finishtime` int(11) DEFAULT '0',
  `paytime` int(11) DEFAULT '0',
  `member_card_id` int(11) DEFAULT '0',
  `wxapp_prepay_id` varchar(255) DEFAULT '',
  `transid` varchar(32) DEFAULT '',
  `paytype` varchar(32) DEFAULT '',
  `apppay` tinyint(3) NOT NULL DEFAULT '0',
  `borrowopenid` varchar(50) DEFAULT NULL,
  `isborrow` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


DROP TABLE IF EXISTS `ims_ewei_shop_member_card_uselog`;
CREATE TABLE `ims_ewei_shop_member_card_uselog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `order_id` int(11) NOT NULL,
  `member_card_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `shipping` tinyint(1) DEFAULT '0',
  `discount_rate` varchar(50) DEFAULT NULL,
  `order_price` decimal(11,2) NOT NULL DEFAULT '0.00',
  `dec_price` decimal(11,2) NOT NULL DEFAULT '0.00',
  `create_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_openid` (`openid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


INSERT INTO `ims_ewei_shop_plugin` (`id`, `displayorder`, `identity`, `category`, `name`, `version`, `author`, `status`, `thumb`, `desc`, `iscom`, `deprecated`, `isv2`) VALUES
(90, 90, 'membercard', 'sale', '付费会员卡', '1.0', '官方', 1, '../addons/ewei_shopv2/static/images/membercard.png', '', 0, 0, 1);

UPDATE  `ims_modules` SET  `version` =  '3.9.13',
`author` =  '微上宝科技',
`url` =  'https://shop140828924.taobao.com' WHERE  `name` ='ewei_shopv2';


ALTER TABLE `ims_ewei_shop_order_goods` ADD COLUMN `title`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `ordercode`;


UPDATE  `ims_modules` SET  `version` =  '3.9.43',
`author` =  '微上宝科技',
`url` =  'https://shop140828924.taobao.com' WHERE  `name` ='ewei_shopv2';


drop table ims_ewei_shop_member_message_template_type;
CREATE TABLE IF NOT EXISTS `ims_ewei_shop_member_message_template_type` (
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



INSERT INTO `ims_ewei_shop_member_message_template_type` (`id`, `name`, `typecode`, `templatecode`, `templateid`, `templatename`, `content`, `showtotaladd`, `typegroup`, `groupname`) VALUES
(1, '订单付款通知', 'saler_pay', 'OPENTM405584202', 'A0Rjjz_IR1KxI6Xv8PkEqJwwwwzyjB6lE5NbuQZ9yrg', '订单付款通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}商品名称：{{keyword2.DATA}}商品数量：{{keyword3.DATA}}支付金额：{{keyword4.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(2, '自提订单提交成功通知', 'carrier', 'OPENTM201594720', '5gWVryCFoWKnx0bnsWumsoI8WwbRFJt8w3BbnhLLlDA', '订单付款通知', '{{first.DATA}}自提码：{{keyword1.DATA}}商品详情：{{keyword2.DATA}}提货地址：{{keyword3.DATA}}提货时间：{{keyword4.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(3, '订单取消通知', 'cancel', 'OPENTM201764653', '', '订单关闭提醒', '{{first.DATA}}订单商品：{{keyword1.DATA}}订单编号：{{keyword2.DATA}}下单时间：{{keyword3.DATA}}订单金额：{{keyword4.DATA}}关闭时间：{{keyword5.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(4, '订单即将取消通知', 'willcancel', 'OPENTM201764653', '', '订单关闭提醒', '{{first.DATA}}订单商品：{{keyword1.DATA}}订单编号：{{keyword2.DATA}}下单时间：{{keyword3.DATA}}订单金额：{{keyword4.DATA}}关闭时间：{{keyword5.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(5, '订单支付成功通知', 'pay', 'OPENTM405584202', 'A0Rjjz_IR1KxI6Xv8PkEqJwwwwzyjB6lE5NbuQZ9yrg', '订单支付通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}商品名称：{{keyword2.DATA}}商品数量：{{keyword3.DATA}}支付金额：{{keyword4.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(6, '订单发货通知', 'send', 'OPENTM401874827', 'r4dbzNDnIEqDUtgR_i618lsMmOAOhaOy-RFIxC1qvto', '订单发货通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}快递公司：{{keyword2.DATA}}快递单号：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(7, '自动发货通知(虚拟物品及卡密)', 'virtualsend', 'OPENTM207793687', '', '自动发货通知', '{{first.DATA}}商品名称：{{keyword1.DATA}}订单号：{{keyword2.DATA}}订单金额：{{keyword3.DATA}}卡密信息：{{keyword4.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(8, '订单状态更新(修改收货地址)(修改价格)', 'orderstatus', 'TM00017', 'qPILeRURs1MFlQobIqGxB_HpninfebyhItFbWARFbB4', '订单付款通知', '{{first.DATA}}订单编号:{{OrderSn.DATA}}订单状态:{{OrderStatus.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(9, '退款成功通知', 'refund1', 'TM00430', 'skDWhojoJ4_rt4urVUEtrCGHoJORW5Xabjg3Y0zpmQY', '退款成功通知', '{{first.DATA}}退款金额：{{orderProductPrice.DATA}}商品详情：{{orderProductName.DATA}}订单编号：{{orderName.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(10, '换货成功通知', 'refund3', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(11, '退款申请驳回通知', 'refund2', 'OPENTM207574677', 'C6PJZDE8CeGpv3AmH80IQseCbuTlihYBKqAqk4EAgG4', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(12, '充值成功通知', 'recharge_ok', 'OPENTM207727673', 'xeXbYwsjxxXTQ5DjfoFc6uRzq36g1YIW20ByAO9ix_g', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(13, '提现成功通知', 'withdraw_ok', 'OPENTM207422808', 'kN6uLXnCy_edHrRPEq8524h_1KVofLyycYbJ1e4DfCU', '提现通知', '{{first.DATA}}申请提现金额：{{keyword1.DATA}}取提现手续费：{{keyword2.DATA}}实际到账金额：{{keyword3.DATA}}提现渠道：{{keyword4.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(14, '会员升级通知(任务处理通知)', 'upgrade', 'OPENTM207574677', 'C6PJZDE8CeGpv3AmH80IQseCbuTlihYBKqAqk4EAgG4', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(15, '充值成功通知（后台管理员手动）', 'backrecharge_ok', 'OPENTM207727673', 'xeXbYwsjxxXTQ5DjfoFc6uRzq36g1YIW20ByAO9ix_g', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(16, '积分变动提醒', 'backpoint_ok', 'OPENTM207509450', 'f9cg3CeRARjOXH53Bd5uSDaRlDVhVYRPT1tX2gYcHx4', '积分变动提醒', '{{first.DATA}}获得时间：{{keyword1.DATA}}获得积分：{{keyword2.DATA}}获得原因：{{keyword3.DATA}}当前积分：{{keyword4.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(17, '换货发货通知', 'refund4', 'OPENTM401874827', '', '订单发货通知', '{{first.DATA}}订单编号：{{keyword1.DATA}}快递公司：{{keyword2.DATA}}快递单号：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(18, '砍价活动通知', 'bargain_message', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'bargain', '砍价消息通知'),
(19, '拼团活动通知', 'groups', NULL, NULL, NULL, NULL, 0, 'groups', '拼团消息通知'),
(20, '人人分销通知', 'commission', NULL, NULL, NULL, NULL, 0, 'commission', '分销消息通知'),
(21, '商品付款通知', 'saler_goodpay', 'OPENTM207574677', '-TR9Wi6RCWu9uAVlN-jxDwSWdRLZGXdTcKjzyTCX7lI', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(22, '砍到底价通知', 'bargain_fprice', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'bargain', '砍价消息通知'),
(23, '订单收货通知(卖家)', 'saler_finish', 'OPENTM207574677', '-TR9Wi6RCWu9uAVlN-jxDwSWdRLZGXdTcKjzyTCX7lI', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(24, '余额兑换成功通知', 'exchange_balance', 'OPENTM207727673', '', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', 0, 'exchange', '兑换中心消息通知'),
(25, '积分兑换成功通知', 'exchange_score', 'OPENTM207509450', '', '积分变动提醒', '{{first.DATA}}获得时间：{{keyword1.DATA}}获得积分：{{keyword2.DATA}}获得原因：{{keyword3.DATA}}当前积分：{{keyword4.DATA}}{{remark.DATA}}', 0, 'exchange', '兑换中心消息通知'),
(26, '兑换中心余额充值通知', 'exchange_recharge', 'OPENTM207727673', '', '充值成功提醒', '{{first.DATA}}充值金额：{{keyword1.DATA}}充值时间：{{keyword2.DATA}}账户余额：{{keyword3.DATA}}{{remark.DATA}}', 0, 'exchange', '兑换中心消息通知'),
(27, '游戏中心通知', 'lottery_get', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'lottery', '抽奖消息通知'),
(35, '库存预警通知', 'saler_stockwarn', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(36, '卖家核销商品核销通知', 'o2o_sverify', 'OPENTM409521536', '', '核销成功提醒', '{{first.DATA}}核销项目：{{keyword1.DATA}}核销时间：{{keyword2.DATA}}核销门店：{{keyword3.DATA}}{{remark.DATA}}', 0, 'o2o', 'O2O消息通知'),
(37, '核销商品核销通知', 'o2o_bverify', 'OPENTM409521536', '', '核销成功提醒', '{{first.DATA}}核销项目：{{keyword1.DATA}}核销时间：{{keyword2.DATA}}核销门店：{{keyword3.DATA}}{{remark.DATA}}', 0, 'o2o', 'O2O消息通知'),
(38, '卖家商品预约通知', 'o2o_snorder', 'OPENTM202447657', '', '预约成功提醒', '{{first.DATA}}预约项目：{{keyword1.DATA}}预约时间：{{keyword2.DATA}}{{remark.DATA}}', 0, 'o2o', 'O2O消息通知'),
(39, '商品预约成功通知', 'o2o_bnorder', 'OPENTM202447657', '', '预约成功提醒', '{{first.DATA}}预约项目：{{keyword1.DATA}}预约时间：{{keyword2.DATA}}{{remark.DATA}}', 0, 'o2o', 'O2O消息通知'),
(42, '商品下单通知', 'saler_goodsubmit', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(50, '维权订单通知', 'saler_refund', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sys', '系统消息通知'),
(43, '任务接取通知', 'task_pick', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'task', '任务中心消息通知'),
(44, '任务进度通知', 'task_progress', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'task', '任务中心消息通知'),
(45, '任务完成通知', 'task_finish', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'task', '任务中心消息通知'),
(46, '任务海报接取通知', 'task_poster_pick', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'task', '任务中心消息通知'),
(47, '任务海报进度通知', 'task_poster_progress', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'task', '任务中心消息通知'),
(48, '任务海报完成通知', 'task_poster_finish', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'task', '任务中心消息通知'),
(49, '任务海报扫描通知', 'task_poster_scan', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'task', '任务中心消息通知'),
(52, '成为分销商通知', 'commission_become', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'commission', '分销消息通知'),
(53, '新增下线通知', 'commission_agent_new', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'commission', '分销消息通知'),
(54, '下级付款通知', 'commission_order_pay', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'commission', '分销消息通知'),
(55, '下级确认收货通知', 'commission_order_finish', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'commission', '分销消息通知'),
(56, '提现申请提交通知', 'commission_apply', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'commission', '分销消息通知'),
(57, '提现申请完成审核通知', 'commission_check', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'commission', '分销消息通知'),
(58, '佣金打款通知', 'commission_pay', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'commission', '分销消息通知'),
(59, '分销商等级升级通知', 'commission_upgrade', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'commission', '分销消息通知'),
(60, '成为股东通知', 'globonus_become', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'globonus', '股东消息通知'),
(61, '股东等级升级通知', 'globonus_upgrade', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'globonus', '股东消息通知'),
(62, '分红发放通知', 'globonus_pay', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'globonus', '股东消息通知'),
(63, '奖励发放通知', 'article', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'article', '文章营销消息通知'),
(64, '成为区域代理通知', 'abonus_become', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'abonus', '区域代理消息通知'),
(65, '省级代理等级升级通知', 'abonus_upgrade1', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'abonus', '区域代理消息通知'),
(66, '市级代理等级升级通知', 'abonus_upgrade2', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'abonus', '区域代理消息通知'),
(67, '区级代理等级升级通知', 'abonus_upgrade3', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'abonus', '区域代理消息通知'),
(68, '区域代理分红发放通知', 'abonus_pay', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'abonus', '区域代理消息通知'),
(69, '入驻申请通知', 'merch_apply', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'merch', '商家通知'),
(70, '提现申请提交通知', 'merch_applymoney', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'merch', '商家通知'),
(71, '社区会员评论通知', 'reply', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sns', '人人社区消息通知'),
(51, '社区会员升级通知', 'sns', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'sns', '人人社区消息通知'),
(74, '周期购定时发货通知', 'cycelbuy_timing', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'cycelbuy', '周期购消息通知'),
(75, '修改收货时间买家通知', 'cycelbuy_buyer_date', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'cycelbuy', '周期购消息通知'),
(76, '修改地址买家通知', 'cycelbuy_buyer_address', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'cycelbuy', '周期购消息通知'),
(73, '修改收货时间卖家通知', 'cycelbuy_seller_date', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'cycelbuy', '周期购消息通知'),
(72, '修改地址卖家通知', 'cycelbuy_seller_address', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'cycelbuy', '周期购消息通知'),
(77, '分销提现申请提醒', 'commission_applymoney', 'OPENTM207574677', NULL, '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'commission', '分销消息通知'),
(80, '成为团长通知', 'dividend_become', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'dividend', '团队分红通知'),
(81, '成为团长通知(卖家)', 'dividend_become_saler', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'dividend', '团队分红通知'),
(82, '团员成为团长通知', 'dividend_downline_become', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'dividend', '团队分红通知'),
(83, '团长提现通知', 'dividend_apply', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'dividend', '团队分红通知'),
(84, '提现审核完成通知', 'dividend_check', 'OPENTM207574677', '', '业务处理通知', '{{first.DATA}}业务类型：{{keyword1.DATA}}业务状态：{{keyword2.DATA}}业务内容：{{keyword3.DATA}}{{remark.DATA}}', 0, 'dividend', '团队分红通知');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
