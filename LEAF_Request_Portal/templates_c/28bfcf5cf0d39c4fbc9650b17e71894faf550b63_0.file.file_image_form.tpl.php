<?php
/* Smarty version 3.1.33, created on 2019-01-08 13:26:10
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\file_image_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34eb42dcc606_18206597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28bfcf5cf0d39c4fbc9650b17e71894faf550b63' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\file_image_form.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c34eb42dcc606_18206597 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="record" enctype="multipart/form-data" action="ajaxIndex.php?a=doupload&amp;recordID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
" method="post">
    <input name="CSRFToken" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
" />
    <input type="hidden" name="series" value="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['series']->value);?>
" />
    <input type="hidden" name="indicatorID" value="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicatorID']->value);?>
" />
    <div id="file<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicatorID']->value);?>
_control">Select File to attach: <input id="file<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicatorID']->value);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicatorID']->value);?>
" type="file" accept="image/*" /></div>
    <div id="file<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicatorID']->value);?>
_status" style="visibility: hidden; display: none; background-color: #fffcae; padding: 4px"><img src="images/indicator.gif" alt="loading..." /> Attaching file...</div>
<div style="font-family: verdana; font-size: 10px">
  <br />Maximum attachment size is <b><?php echo $_smarty_tpl->tpl_vars['max_filesize']->value;?>
B.</b>
</div>
</form>

<?php echo '<script'; ?>
 type="text/javascript">
$(function() {
	$('#file<?php echo $_smarty_tpl->tpl_vars['indicatorID']->value;?>
').on('change', function() {
		$('#file<?php echo $_smarty_tpl->tpl_vars['indicatorID']->value;?>
_control').css('visibility', 'hidden');
        $('#file<?php echo $_smarty_tpl->tpl_vars['indicatorID']->value;?>
_control').css('display', 'none');
        $('#file<?php echo $_smarty_tpl->tpl_vars['indicatorID']->value;?>
_status').css('visibility', 'visible');
        $('#file<?php echo $_smarty_tpl->tpl_vars['indicatorID']->value;?>
_status').css('display', 'block');
        $('#record').submit();
	});
});
<?php echo '</script'; ?>
><?php }
}
