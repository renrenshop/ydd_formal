<?php defined('IN_IA') or exit('Access Denied');?>
<?php if (file_exists('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile__message.php')){include('/www/wwwroot/fxv2_d/addons/ewei_shopv2/lang/'.$_W['lang_type'].'/_template_mobile__message.php');}?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<div class='fui-page  fui-page-current message-page'>
 
	
	<div class='fui-message'>
		<div class='icon '>
			<?php  if($type=='error') { ?>
			   <i class='icon icon-roundclose' style='color:#0290be;'></i>
			<?php  } else if($type=='success') { ?>
			   <i class='icon icon-roundcheckfill ' style='color:#04ab02;'></i>
			<?php  } else { ?>
			   <i class='icon icon-information' ></i>
			<?php  } ?>
			
		</div>
		<?php  if(!empty($title)) { ?><div class='title'><?php  echo $title;?></div><?php  } ?>
		<div class='content'><?php  echo $message;?></div>
		<?php  if($buttondisplay) { ?>
		<div class='button'>
	          <?php  if($type=='error') { ?>
		   <a href='<?php  echo $redirect;?>' class='btn btn-danger external block'><?php  if(empty($buttontext)) { ?><?php  echo $lang['lang_template_mobile__message_0']?><?php  } else { ?><?php  echo $buttontext;?><?php  } ?></a>
		 <?php  } else if($type=='success') { ?>
		   <a href='<?php  echo $redirect;?>' class='btn btn-success external block '><?php  if(empty($buttontext)) { ?><?php  echo $lang['lang_template_mobile__message_1']?><?php  } else { ?><?php  echo $buttontext;?><?php  } ?></a>
		<?php  } else { ?>
		   <a href='<?php  echo $redirect;?>' class='btn btn-default  external block'><?php  if(empty($buttontext)) { ?><?php  echo $lang['lang_template_mobile__message_2']?><?php  } else { ?><?php  echo $buttontext;?><?php  } ?></a>
		<?php  } ?>
		</div>
		<?php  } ?>
		
	</div> 
</div>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>