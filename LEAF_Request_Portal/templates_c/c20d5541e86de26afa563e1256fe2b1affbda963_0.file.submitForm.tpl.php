<?php
/* Smarty version 3.1.33, created on 2019-01-08 13:26:38
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\submitForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34eb5e0a24c7_77314348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c20d5541e86de26afa563e1256fe2b1affbda963' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\submitForm.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c34eb5e0a24c7_77314348 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),));
?>
<div style="background-color: #d76161; padding: 8px; margin: 0px; color: white; text-shadow: black 0.1em 0.1em 0.2em; font-weight: bold; text-align: center; font-size: 120%">Please review your request before submitting</div>
<div style="padding: 8px; width: 260px; margin: auto" id="submitControl">
    <button class="buttonNorm" type="button" style="font-weight: bold; font-size: 120%" onclick="doSubmit(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
);"><img src="../libs/dynicons/?img=go-next.svg&amp;w=32" alt="Submit" /> <?php if ($_smarty_tpl->tpl_vars['lastActionTime']->value > 0) {?>Re-<?php }?>Submit <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['requestLabel']->value);?>
</button>
</div><?php }
}
