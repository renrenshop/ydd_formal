<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php  echo $page['data']['page']['title'];?> - 预览</title>
    <link href="../addons/ewei_shopv2/plugin/diypage/static/css/preview.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="./resource/js/lib/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../addons/ewei_shopv2/plugin/diypage/static/js/jquery.qrcode.min.js"></script>
    <script>
        $(function () {
            $('#qrcode').qrcode("<?php  echo mobileUrl('diypage', array('id'=>$id), true)?>");
        });
    </script>
</head>
<body>
    <iframe src="<?php  echo mobileUrl('diypage', array('id'=>$id, 'preview'=>'1'), true)?>" class="iframe" frameborder="0"></iframe>
    <div class="qrcode-container">
        <div class="qrcode-image" id="qrcode"></div>
        <p class="example1">微信“扫一扫”浏览</p>
    </div>
    <?php  if($pagetype=='sys') { ?>
        <?php if(mcv('diypage.page.sys.edit')) { ?>
            <a class="back-container" href="<?php  echo webUrl('diypage/page/sys/edit', array('id'=>$id))?>">返回继续编辑</a>
        <?php  } ?>
    <?php  } ?>
    <?php  if($pagetype=='diy') { ?>
        <?php if(mcv('diypage.page.diy.edit')) { ?>
            <a class="back-container" href="<?php  echo webUrl('diypage/page/diy/edit', array('id'=>$id))?>">返回继续编辑</a>
        <?php  } ?>
    <?php  } ?>
    <?php  if($pagetype=='mod') { ?>
        <?php if(mcv('diypage.page.mod.edit')) { ?>
            <a class="back-container" href="<?php  echo webUrl('diypage/page/mod/edit', array('id'=>$id))?>">返回继续编辑</a>
        <?php  } ?>
    <?php  } ?>
</body>
</html>
