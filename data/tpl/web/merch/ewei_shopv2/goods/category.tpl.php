<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<style type='text/css'>.dd-handle { height: 40px; line-height: 30px}.dd-list { width:860px;}</style>

<div class="page-header">当前位置：<span class="text-primary">商品分类管理</span></div>

<div class="page-content">

    <div class='alert alert-primary'>
        提示：1. 隐藏的分类,在商户店铺的分类中将不会显示<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. 如要增加分类,请联系平台添加
    </div>

    <form action="" method="post" class="form-validate">
        <div class="dd" id="div_nestable">
            <ol class="dd-list">
                <?php  if(is_array($category)) { foreach($category as $row) { ?>
                <?php  if(empty($row['parentid'])) { ?>
                <li class="dd-item full" data-id="<?php  echo $row['id'];?>">

                    <div class="dd-handle" >
                        [ID: <?php  echo $row['id'];?>] <?php  echo $row['name'];?>
                        <span class="pull-right">

                            <div class='label <?php  if($row['enabled']==1) { ?>label-primary<?php  } else { ?>label-default<?php  } ?>'
                                 <?php if(mcv('goods.category.edit')) { ?>
                                 data-toggle='ajaxSwitch'
                                 data-switch-value='<?php  echo $row['enabled'];?>'
                                 data-switch-value0='0|隐藏|label label-default|<?php  echo merchUrl('goods/category/enabled',array('enabled'=>1,'id'=>$row['id']))?>'
                                 data-switch-value1='1|显示|label label-primary|<?php  echo merchUrl('goods/category/enabled',array('enabled'=>0,'id'=>$row['id']))?>'
                                 <?php  } ?>
                                 >
                                 <?php  if($row['enabled']==1) { ?>显示<?php  } else { ?>隐藏<?php  } ?></div>

                    <?php if(mcv('goods.category.edit|goods.category.view')) { ?>
                    <!--a class='btn btn-default btn-sm' href="<?php  echo merchUrl('goods/category/edit', array('id' => $row['id']))?>" title="<?php if(mcv('goods.category.edit')) { ?>修改<?php  } else { ?>查看<?php  } ?>" ><i class="fa fa-edit"></i></a-->
                    <?php  } ?>
                    </span>
        </div>
        <?php  if(count($children[$row['id']])>0) { ?>

        <ol class="dd-list">
            <?php  if(is_array($children[$row['id']])) { foreach($children[$row['id']] as $child) { ?>
            <li class="dd-item full" data-id="<?php  echo $child['id'];?>">
                <div class="dd-handle" style="width:100%;">
                    <!--img src="<?php  echo tomedia($child['thumb']);?>" width='30' height="30" onerror="$(this).remove()" style='padding:1px;border: 1px solid #ccc;float:left;' /--> &nbsp;
                    [ID: <?php  echo $child['id'];?>] <?php  echo $child['name'];?>
                                    <span class="pull-right">
                                        <div class='label <?php  if($child['enabled']==1) { ?>label-primary<?php  } else { ?>label-default<?php  } ?>'
                                             <?php if(mcv('goods.category.edit')) { ?>
                                             data-toggle='ajaxSwitch'
                                             data-switch-value='<?php  echo $child['enabled'];?>'
                                             data-switch-value0='0|隐藏|label label-default|<?php  echo merchUrl('goods/category/enabled',array('enabled'=>1,'id'=>$child['id']))?>'
                                             data-switch-value1='1|显示|label label-primary|<?php  echo merchUrl('goods/category/enabled',array('enabled'=>0,'id'=>$child['id']))?>'
                                             <?php  } ?>
                                             >
                                             <?php  if($child['enabled']==1) { ?>显示<?php  } else { ?>隐藏<?php  } ?></div>

                <?php if(mcv('goods.category.edit|goods.category.view')) { ?><!--a class='btn btn-default btn-sm' href="<?php  echo merchUrl('goods/category/edit', array('id' => $child['id']))?>" title="<?php if(mcv('goods.category.edit')) { ?>修改<?php  } else { ?>查看<?php  } ?>" ><i class="fa fa-edit"></i></a--><?php  } ?>
                </span>
                </div>
                <?php  if(count($children[$child['id']])>0 && intval($shopset['catlevel'])==3) { ?>

                <ol class="dd-list"  style='width:100%;'>
                    <?php  if(is_array($children[$child['id']])) { foreach($children[$child['id']] as $third) { ?>
                    <li class="dd-item" data-id="<?php  echo $third['id'];?>">
                        <div class="dd-handle">
                            <!--img src="<?php  echo tomedia($third['thumb']);?>" width='30' height="30" onerror="$(this).remove()" style='padding:1px;border: 1px solid #ccc;float:left;' /--> &nbsp;
                            [ID: <?php  echo $third['id'];?>] <?php  echo $third['name'];?>
                                                <span class="pull-right">
                             <div class='label <?php  if($third['enabled']==1) { ?>label-primary<?php  } else { ?>label-default<?php  } ?>'
                                                <?php if(mcv('goods.category.edit')) { ?>
                                                data-toggle='ajaxSwitch'
                                                data-switch-value='<?php  echo $third['enabled'];?>'
                                                data-switch-value0='0|隐藏|label label-default|<?php  echo merchUrl('goods/category/enabled',array('enabled'=>1,'id'=>$third['id']))?>'
                                                data-switch-value1='1|显示|label label-primary|<?php  echo merchUrl('goods/category/enabled',array('enabled'=>0,'id'=>$third['id']))?>'
                                                <?php  } ?>
                                                >
                                                <?php  if($third['enabled']==1) { ?>显示<?php  } else { ?>隐藏<?php  } ?></div>

                        <?php if(mcv('goods.category.edit|goods.category.view')) { ?><!--a class='btn btn-default btn-sm' href="<?php  echo merchUrl('goods/category/edit', array('id' => $third['id']))?>" title="<?php if(mcv('goods.category.edit')) { ?>修改<?php  } else { ?>查看<?php  } ?>" ><i class="fa fa-edit"></i></a--><?php  } ?>
                        </span>
                        </div>
                    </li>
                    <?php  } } ?>
                </ol>
                <?php  } ?>
            </li>
            <?php  } } ?>
        </ol>
        <?php  } ?>

        </li>
        <?php  } ?>
        <?php  } } ?>

        </ol>
        </div>
    </form>
</div>

<script language='javascript'>
    myrequire(['jquery.nestable'], function () {
        $('.dd-item').addClass('full');
    })
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>


