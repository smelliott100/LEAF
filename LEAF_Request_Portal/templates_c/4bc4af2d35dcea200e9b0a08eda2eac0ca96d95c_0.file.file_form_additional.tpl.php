<?php
/* Smarty version 3.1.33, created on 2019-01-08 13:26:26
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\file_form_additional.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34eb5293db61_29770809',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bc4af2d35dcea200e9b0a08eda2eac0ca96d95c' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\file_form_additional.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c34eb5293db61_29770809 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['message']->value;?>

<br />
<iframe id="fileIframe_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicatorID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['series']->value);?>
" style="display: none" src="ajaxIframe.php?a=getuploadprompt&amp;recordID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
&amp;indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicatorID']->value);?>
&amp;series=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['series']->value);?>
" frameborder="0" width="500px" height="85px"></iframe>
<span id="fileAdditional" class="buttonNorm" onclick="$('#fileIframe_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicatorID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['series']->value);?>
').css('display', 'block'); $('#fileAdditional').css('visibility', 'hidden')"><img src="../libs/dynicons/?img=document-open.svg&amp;w=32" /> Attach Additional File</span>
<?php }
}
