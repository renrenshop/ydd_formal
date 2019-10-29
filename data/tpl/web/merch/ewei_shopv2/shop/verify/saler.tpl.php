<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">当前位置：<span class="text-primary">店员管理</span></div>

<div class="page-content">

  <form action="./merchant.php" method="get">
      <input type="hidden" name="c" value="site" />
      <input type="hidden" name="a" value="entry"/>
      <input type="hidden" name="m" value="ewei_shopv2"/>
      <input type="hidden" name="do" value="web"/>
      <input type="hidden" name="r" value="shop.verify.saler"/>
      <div class="page-toolbar">
          <div class="col-md-4">
              <?php if(mcv('shop.verify.saler.add')) { ?>
                <a class='btn btn-primary btn-sm' href="<?php  echo webUrl('shop/verify/saler/add')?>"><i class='fa fa-plus'></i> 添加店员</a>
              <?php  } ?>
          </div>
          <div class="col-md-6 pull-right">
              <div class="input-group">
                  <span class="input-group-select">
                      <select name="status" class='form-control'>
                          <option value="" <?php  if($_GPC['status']=='') { ?>selected<?php  } ?>>状态</option>
                          <option value="1" <?php  if($_GPC['status']==1) { ?>selected<?php  } ?>>启用</option>
                          <option value="0" <?php  if($_GPC['status']==="0") { ?>selected<?php  } ?>>禁用</option>
                      </select>
                  </span>
                  <input type="text" class="form-control" name='keyword' value="<?php  echo $_GPC['keyword'];?>" placeholder="店员">
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
        <form action="" method="post" onsubmit="return formcheck(this)">
            <div class="page-table-header">
                <input type='checkbox' />
                <div class="btn-group">
                    <?php if(mcv('shop.verify.saler.edit')) { ?>
                    <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('shop/verify/saler/status',array('status'=>1))?>">
                        <i class='icow icow-qiyong'></i> 启用</button>
                    <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('shop/verify/saler/status',array('status'=>0))?>">
                        <i class='icow icow-jinyong'></i> 禁用</button>
                    <?php  } ?>
                    <?php if(mcv('shop.verify.saler.delete')) { ?>
                    <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('shop/verify/saler/delete')?>">
                        <i class='icow icow-shanchu1'></i> 删除</button>
                    <?php  } ?>
                </div>
            </div>
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <th style="width:25px;"></th>
                        <th>店员</th>
						<th style="width: 150px;">姓名</th>
                        <th style="width: 200px;">所属门店</th>
                        <th style="width: 70px;">状态</th>
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
                                <img class="radius50" src='<?php  echo tomedia($row['avatar'])?>' style='width:30px;height:30px;padding1px;border:1px solid #ccc' onerror="this.src='../addons/ewei_shopv2/static/images/noface.png'" /> <?php echo empty($row['nickname'])?'未更新':$row['nickname']?>
                            </td>
                            <td><?php  echo $row['salername'];?></td>
                            <td><?php  if(empty($row['salername'])) { ?>全店核销<?php  } else { ?><?php  echo $row['storename'];?><?php  } ?></td>
                            <td>
                               <span class='label <?php  if($row['status']==1) { ?>label-primary<?php  } else { ?>label-default<?php  } ?>'
                                <?php if(mcv('shop.verify.saler.edit')) { ?>
                                    data-toggle='ajaxSwitch'
                                    data-switch-value='<?php  echo $row['status'];?>'
                                    data-switch-value0='0|禁用|label label-default|<?php  echo webUrl('shop/verify/saler/status',array('status'=>1,'id'=>$row['id']))?>'
                                    data-switch-value1='1|启用|label label-primary|<?php  echo webUrl('shop/verify/saler/status',array('status'=>0,'id'=>$row['id']))?>'
                                <?php  } ?>>
                                <?php  if($row['status']==1) { ?>启用<?php  } else { ?>禁用<?php  } ?></span>
                            </td>
                            <td>
                                <?php if(mcv('shop.verify.saler.view|shop.verify.saler.edit')) { ?>
                                    <a class='btn btn-op btn-operation' href="<?php  echo webUrl('shop/verify/saler/edit', array('id' => $row['id']))?>">
                                        <span data-toggle="tooltip" data-placement="top" data-original-title="<?php if(mcv('shop.verify.saler.edit')) { ?>修改<?php  } else { ?>查看<?php  } ?>">
                                                <i class='icow icow-bianji2'></i>
                                            </span>
                                    </a>
                                <?php  } ?>
                                <?php if(mcv('shop.verify.saler.delete')) { ?>
                                    <a class='btn btn-op btn-operation'  data-toggle='ajaxRemove' href="<?php  echo webUrl('shop/verify/saler/delete', array('id' => $row['id']))?>" data-confirm="确认删除此店员吗？">
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
                                <?php if(mcv('shop.verify.saler.edit')) { ?>
                                    <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch' data-href="<?php  echo webUrl('shop/verify/saler/status',array('status'=>1))?>">
                                        <i class='icow icow-qiyong'></i> 启用</button>
                                    <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch'  data-href="<?php  echo webUrl('shop/verify/saler/status',array('status'=>0))?>">
                                        <i class='icow icow-jinyong'></i> 禁用</button>
                                <?php  } ?>
                                <?php if(mcv('shop.verify.saler.delete')) { ?>
                                    <button class="btn btn-default btn-sm btn-operation" type="button" data-toggle='batch-remove' data-confirm="确认要删除?" data-href="<?php  echo webUrl('shop/verify/saler/delete')?>">
                                        <i class='icow icow-shanchu1'></i> 删除</button>
                                <?php  } ?>
                            </div>
                        </td>
                        <td colspan="3" style="text-align: right">
                            <?php  echo $pager;?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    <?php  } ?>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
