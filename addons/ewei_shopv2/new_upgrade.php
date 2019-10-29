<?php
/**
 * Created by WHEREIN.
 * User: yangzm
 * Content:
 * Date: 2019/8/5
 * Time: 9:39
 */
if (!pdo_fieldexists('ewei_shop_member', 'lang_type')) {
    pdo_query("ALTER TABLE  `ims_ewei_shop_member` ADD `lang_type` CHAR(15) NOT NULL DEFAULT '' COMMENT '用户选择的语言方式'");
}