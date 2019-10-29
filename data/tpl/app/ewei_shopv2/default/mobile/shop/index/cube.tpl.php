<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_index_cube.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile_shop_index_cube.php');}?>
<?php  if(!empty($cubes)) { ?>
<!-- <div class="fui-cube">
    <?php  if(count($cubes)==1) { ?>
        <img data-lazy="<?php  echo tomedia($cubes[0]['img'])?>" <?php  if(!empty($cubes[0]['url'])) { ?>onclick="location.href='<?php  echo $cubes[0]['url'];?>'"<?php  } ?> />
    <?php  } ?>

    <?php  if(count($cubes)>1) { ?>
        <div class="fui-cube-left">
            <img data-lazy="<?php  echo tomedia($cubes[0]['img'])?>" <?php  if(!empty($cubes[0]['url'])) { ?>onclick="location.href='<?php  echo $cubes[0]['url'];?>'"<?php  } ?> />
        </div>
        <div class="fui-cube-right">
            <?php  if(count($cubes)==2) { ?>
                <img data-lazy="<?php  echo tomedia($cubes[1]['img'])?>" <?php  if(!empty($cubes[1]['url'])) { ?>onclick="location.href='<?php  echo $cubes[1]['url'];?>'"<?php  } ?> />
            <?php  } ?>
            <?php  if(count($cubes)>2) { ?>
                <div class="fui-cube-right1">
                    <img data-lazy="<?php  echo tomedia($cubes[1]['img'])?>" <?php  if(!empty($cubes[1]['url'])) { ?>onclick="location.href='<?php  echo $cubes[1]['url'];?>'"<?php  } ?> />
                </div>
                <div class="fui-cube-right2">
                    <?php  if(count($cubes)==3) { ?>
                        <img data-lazy="<?php  echo tomedia($cubes[2]['img'])?>" <?php  if(!empty($cubes[2]['url'])) { ?>onclick="location.href='<?php  echo $cubes[2]['url'];?>'"<?php  } ?> />
                    <?php  } ?>
                    <?php  if(count($cubes)>3) { ?>
                        <div class="left">
                            <img data-lazy="<?php  echo tomedia($cubes[2]['img'])?>" <?php  if(!empty($cubes[2]['url'])) { ?>onclick="location.href='<?php  echo $cubes[2]['url'];?>'"<?php  } ?> />
                        </div>
                    <?php  } ?>
                    <?php  if(!empty($cubes[3]['img'])) { ?>
                        <div class="right">
                            <img data-lazy="<?php  echo tomedia($cubes[3]['img'])?>" <?php  if(!empty($cubes[3]['url'])) { ?>onclick="location.href='<?php  echo $cubes[3]['url'];?>'"<?php  } ?> />
                        </div>
                    <?php  } ?>
                </div>
            <?php  } ?>
        </div>
    <?php  } ?>
</div>
<?php  if(count($cubes) > 4) { ?>
<div class="fui-cube">
    <?php  if(count($cubes)==5) { ?>
        <img data-lazy="<?php  echo tomedia($cubes[4]['img'])?>" <?php  if(!empty($cubes[4]['url'])) { ?>onclick="location.href='<?php  echo $cubes[4]['url'];?>'"<?php  } ?> />
    <?php  } ?>

    <?php  if(count($cubes)>5) { ?>
        <div class="fui-cube-left">
            <img data-lazy="<?php  echo tomedia($cubes[4]['img'])?>" <?php  if(!empty($cubes[4]['url'])) { ?>onclick="location.href='<?php  echo $cubes[4]['url'];?>'"<?php  } ?> />
        </div>
        <div class="fui-cube-right">
            <?php  if(count($cubes)==6) { ?>
                <img data-lazy="<?php  echo tomedia($cubes[5]['img'])?>" <?php  if(!empty($cubes[5]['url'])) { ?>onclick="location.href='<?php  echo $cubes[5]['url'];?>'"<?php  } ?> />
            <?php  } ?>
            <?php  if(count($cubes)>6) { ?>
                <div class="fui-cube-right1">
                    <img data-lazy="<?php  echo tomedia($cubes[5]['img'])?>" <?php  if(!empty($cubes[5]['url'])) { ?>onclick="location.href='<?php  echo $cubes[5]['url'];?>'"<?php  } ?> />
                </div>
                <div class="fui-cube-right2">
                    <?php  if(count($cubes)==7) { ?>
                        <img data-lazy="<?php  echo tomedia($cubes[6]['img'])?>" <?php  if(!empty($cubes[6]['url'])) { ?>onclick="location.href='<?php  echo $cubes[6]['url'];?>'"<?php  } ?> />
                    <?php  } ?>
                    <?php  if(count($cubes)>7) { ?>
                        <div class="left">
                            <img data-lazy="<?php  echo tomedia($cubes[6]['img'])?>" <?php  if(!empty($cubes[6]['url'])) { ?>onclick="location.href='<?php  echo $cubes[6]['url'];?>'"<?php  } ?> />
                        </div>
                    <?php  } ?>
                    <?php  if(count($cubes)==8) { ?>
                        <div class="right">
                            <img data-lazy="<?php  echo tomedia($cubes[7]['img'])?>" <?php  if(!empty($cubes[7]['url'])) { ?>onclick="location.href='<?php  echo $cubes[7]['url'];?>'"<?php  } ?> />
                        </div>
                    <?php  } ?>
                </div>
            <?php  } ?>
        </div>
    <?php  } ?>
</div>
<?php  } ?> -->
<style type="text/css">
	.wrap{
		display: flex;
		flex-direction: wrap;
	}
	.div{
		flex: 4;
		border:0.1rem solid #f4f4f4;
	}
	.div>img{
		width: 100%;
	}
	.m-title{
		width:100%;
		border-top:0.2rem solid #f4f4f4;
		border-bottom:0.1rem solid #f4f4f4;
		text-align:center;
		height:52px;
	}
	.m-title p{
		font-size:16px;
		color:#E1454C;
	}
	.m-title span{
		font-size:12px;
	}
</style>

<?php  if(count($cubes) > 0) { ?>
<div class="m-title"><p>— <?php  echo $cube_title;?> —</p><span><?php  echo $cube_title_s;?></span></div>
<?php  } ?>

<div class="wrap">
	<?php  if(count($cubes) == 1) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[0]['img'])?>" <?php  if(!empty($cubes[0]['url'])) { ?>onclick="location.href='<?php  echo $cubes[0]['url'];?>'"<?php  } ?> /></div>
	<?php  } ?>
	<?php  if(count($cubes)>1) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[0]['img'])?>" <?php  if(!empty($cubes[0]['url'])) { ?>onclick="location.href='<?php  echo $cubes[0]['url'];?>'"<?php  } ?> /></div>
	<?php  if(count($cubes) == 2) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[1]['img'])?>" <?php  if(!empty($cubes[1]['url'])) { ?>onclick="location.href='<?php  echo $cubes[1]['url'];?>'"<?php  } ?> /></div>
	<?php  } ?>
	<?php  if(count($cubes) > 2) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[1]['img'])?>" <?php  if(!empty($cubes[1]['url'])) { ?>onclick="location.href='<?php  echo $cubes[1]['url'];?>'"<?php  } ?> /></div>
	<?php  if(count($cubes) == 3) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[2]['img'])?>" <?php  if(!empty($cubes[2]['url'])) { ?>onclick="location.href='<?php  echo $cubes[2]['url'];?>'"<?php  } ?> /></div>
	<?php  } ?>
	<?php  if(count($cubes) > 3) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[2]['img'])?>" <?php  if(!empty($cubes[2]['url'])) { ?>onclick="location.href='<?php  echo $cubes[2]['url'];?>'"<?php  } ?> /></div>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[3]['img'])?>" <?php  if(!empty($cubes[3]['url'])) { ?>onclick="location.href='<?php  echo $cubes[3]['url'];?>'"<?php  } ?> /></div>
	<?php  } ?>
	<?php  } ?>
	<?php  } ?>
</div>
<?php  if(count($cubes) > 4) { ?>
<div class="wrap">
	<?php  if(count($cubes) == 5) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[4]['img'])?>" <?php  if(!empty($cubes[4]['url'])) { ?>onclick="location.href='<?php  echo $cubes[4]['url'];?>'"<?php  } ?> /></div>
	<?php  } ?>
	<?php  if(count($cubes)>5) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[4]['img'])?>" <?php  if(!empty($cubes[4]['url'])) { ?>onclick="location.href='<?php  echo $cubes[4]['url'];?>'"<?php  } ?> /></div>
	<?php  if(count($cubes) == 6) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[5]['img'])?>" <?php  if(!empty($cubes[5]['url'])) { ?>onclick="location.href='<?php  echo $cubes[5]['url'];?>'"<?php  } ?> /></div>
	<?php  } ?>
	<?php  if(count($cubes) > 6) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[5]['img'])?>" <?php  if(!empty($cubes[5]['url'])) { ?>onclick="location.href='<?php  echo $cubes[5]['url'];?>'"<?php  } ?> /></div>
	<?php  if(count($cubes) == 7) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[6]['img'])?>" <?php  if(!empty($cubes[6]['url'])) { ?>onclick="location.href='<?php  echo $cubes[6]['url'];?>'"<?php  } ?> /></div>
	<?php  } ?>
	<?php  if(count($cubes) > 7) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[6]['img'])?>" <?php  if(!empty($cubes[6]['url'])) { ?>onclick="location.href='<?php  echo $cubes[6]['url'];?>'"<?php  } ?> /></div>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[7]['img'])?>" <?php  if(!empty($cubes[7]['url'])) { ?>onclick="location.href='<?php  echo $cubes[7]['url'];?>'"<?php  } ?> /></div>
	<?php  } ?>
	<?php  } ?>
	<?php  } ?>
</div>
<?php  } ?>
<?php  if(count($cubes) > 8) { ?>
<div class="wrap">
	<?php  if(count($cubes) == 9) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[8]['img'])?>" <?php  if(!empty($cubes[8]['url'])) { ?>onclick="location.href='<?php  echo $cubes[8]['url'];?>'"<?php  } ?> /></div>
	<?php  } ?>
	<?php  if(count($cubes)>9) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[8]['img'])?>" <?php  if(!empty($cubes[8]['url'])) { ?>onclick="location.href='<?php  echo $cubes[8]['url'];?>'"<?php  } ?> /></div>
	<?php  if(count($cubes) == 10) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[9]['img'])?>" <?php  if(!empty($cubes[9]['url'])) { ?>onclick="location.href='<?php  echo $cubes[9]['url'];?>'"<?php  } ?> /></div>
	<?php  } ?>
	<?php  if(count($cubes) > 10) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[9]['img'])?>" <?php  if(!empty($cubes[9]['url'])) { ?>onclick="location.href='<?php  echo $cubes[9]['url'];?>'"<?php  } ?> /></div>
	<?php  if(count($cubes) == 11) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[10]['img'])?>" <?php  if(!empty($cubes[10]['url'])) { ?>onclick="location.href='<?php  echo $cubes[10]['url'];?>'"<?php  } ?> /></div>
	<?php  } ?>
	<?php  if(count($cubes) > 11) { ?>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[10]['img'])?>" <?php  if(!empty($cubes[10]['url'])) { ?>onclick="location.href='<?php  echo $cubes[10]['url'];?>'"<?php  } ?> /></div>
	<div class="div"><img data-lazy="<?php  echo tomedia($cubes[11]['img'])?>" <?php  if(!empty($cubes[11]['url'])) { ?>onclick="location.href='<?php  echo $cubes[11]['url'];?>'"<?php  } ?> /></div>
	<?php  } ?>
	<?php  } ?>
	<?php  } ?>
</div>
<?php  } ?>

<?php  } ?>

