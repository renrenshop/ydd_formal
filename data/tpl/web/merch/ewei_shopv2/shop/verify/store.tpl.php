<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">当前位置：<span class="text-primary">门店管理</span></div>

<div class="page-content">
    <form action="./merchant.php" method="get">
        <input type="hidden" name="c" value="site"/>
        <input type="hidden" name="a" value="entry"/>
        <input type="hidden" name="m" value="ewei_shopv2"/>
        <input type="hidden" name="do" value="web"/>
        <input type="hidden" name="r" value="shop.verify.store"/>

        <div class="page-toolbar">
            <div class="col-md-4">
                <?php if(mcv('shop.verify.store.add')) { ?>
                    <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('shop/verify/store/add')?>"><i class='fa fa-plus'></i> 添加门店</a>
                <?php  } ?>
            </div>
            <div class="col-md-6 pull-right">
                <div class="input-group">
                    <span class="input-group-select">
                        <select name="type" class='form-control'>
                            <option value="0" <?php  if(empty($_GPC['type'])) { ?>selected<?php  } ?>>门店支持</option>
                            <option value="1" <?php  if($_GPC['type']==1) { ?>selected<?php  } ?>>自提</option>
                            <option value="2" <?php  if($_GPC['type']==2) { ?>selected<?php  } ?>>核销</option>
                            <option value="3" <?php  if($_GPC['type']==3) { ?>selected<?php  } ?>>自提+核销</option>
                        </select>
                    </span>
                    <input type="text" class="form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="门店名称/地址/电话" />
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"> 搜索</button>
                    </span>
                </div>
            </div>
        </div>
    </form>

    <?php  if(empty($list)) { ?>
        <div class="panel panel-default">
            <div class="panel-body empty-data">未查询到相关数据</div>
        </div>
    <?php  } else { ?>
        <div class="page-table-header">
            <input type='checkbox' />
            <div class="btn-group">
                <?php if(mcv('shop.verify.store.edit')) { ?>
                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('shop/verify/store/status',array('status'=>1))?>">
                    <i class='icow icow-qiyong'></i> 启用</button>
                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('shop/verify/store/status',array('status'=>0))?>">
                    <i class='icow icow-jinyong'></i> 禁用</button>
                <?php  } ?>
                <?php if(mcv('shop.verify.store.delete')) { ?>
                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('shop/verify/store/delete')?>">
                    <i class='icow icow-shanchu1'></i> 删除</button>
                <?php  } ?>
            </div>
        </div>
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th style="width:25px;">

                    </th>
                    <th style='width:50px'>顺序</th>
                    <th style="">门店名称</th>
                    <th style="width:180px;">地址/电话</th>
                    <th style="width:90px;">核销员数量</th>
                    <th style="width:100px;">门店支持</th>
                    <th style="width:80px;">状态</th>
                    <th style="width: 65px;">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <tr>
                        <td>
                            <input type='checkbox'   value="<?php  echo $row['id'];?>"/>
                        </td>
                        <td>
                            <?php if(mcv('shop.verify.store.edit')) { ?>
                                <a href='javascript:;' data-toggle='ajaxEdit' data-href="<?php  echo webUrl('shop/verify/store/displayorder',array('id'=>$row['id']))?>" ><?php  echo $row['displayorder'];?></a>
                            <?php  } else { ?>
                                <?php  echo $row['displayorder'];?>
                            <?php  } ?>
                        </td>
                        <td><?php  echo $row['storename'];?></td>
                        <td><?php  echo $row['tel'];?><br/><?php  echo $row['address'];?></td>
                        <td><?php  echo $row['salercount'];?></td>
                        <td>
                            <?php  if($row['type']==1) { ?>自提<?php  } else if($row['type']==2) { ?>核销<?php  } else if($row['type']==3) { ?>自提+核销<?php  } ?>
                        </td>
                        <td>
                            <span class='label <?php  if($row['status']==1) { ?>label-primary<?php  } else { ?>label-default<?php  } ?>'
                                <?php if(mcv('shop.verify.store.edit')) { ?>
                                data-toggle='ajaxSwitch'
                                data-switch-value='<?php  echo $row['status'];?>'
                                data-switch-value0='0|禁用|label label-default|<?php  echo webUrl('shop/verify/store/status',array('status'=>1,'id'=>$row['id']))?>'
                                data-switch-value1='1|启用|label label-primary|<?php  echo webUrl('shop/verify/store/status',array('status'=>0,'id'=>$row['id']))?>'
                                <?php  } ?>>
                                <?php  if($row['status']==1) { ?>启用<?php  } else { ?>禁用<?php  } ?></span>
                        </td>
                        <td>
                            <?php if(mcv('shop.verify.store.edit|shop.verify.store.view')) { ?>
                                <a class='btn btn-op btn-operation' href="<?php  echo webUrl('shop/verify/store/edit', array('id' => $row['id']))?>">
                                    <span data-toggle="tooltip" data-placement="top" data-original-title="<?php if(mcv('shop.verify.store.edit')) { ?>修改<?php  } else { ?>查看<?php  } ?>">
                                                <i class='icow icow-bianji2'></i>
                                            </span>
                                </a>
                            <?php  } ?>
                            <?php if(mcv('shop.verify.store.delete')) { ?>
                                <a class='btn btn-op btn-operation' data-toggle="ajaxRemove"  href="<?php  echo webUrl('shop/verify/store/delete', array('id' => $row['id']))?>" data-confirm="确认删除此门店吗？">
                                    <span data-toggle="tooltip" data-placement="top" data-original-title="删除">
                                        <i class='icow icow-shanchu1'></i>
                                    </span>
                                </a>
                            <?php  } ?>
                        </td>
                    </tr>
                <?php  } } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td><input type="checkbox"></td>
                    <td colspan="2">
                        <div class="btn-group">
                            <?php if(mcv('shop.verify.store.edit')) { ?>
                                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('shop/verify/store/status',array('status'=>1))?>">
                                    <i class='icow icow-qiyong'></i> 启用</button>
                                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('shop/verify/store/status',array('status'=>0))?>">
                                    <i class='icow icow-jinyong'></i> 禁用</button>
                            <?php  } ?>
                            <?php if(mcv('shop.verify.store.delete')) { ?>
                                <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('shop/verify/store/delete')?>">
                                    <i class='icow icow-shanchu1'></i> 删除</button>
                            <?php  } ?>
                        </div>
                    </td>
                    <td colspan="5" style="text-align: right">
                        <?php  echo $pager;?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
<?php  } ?>

</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
