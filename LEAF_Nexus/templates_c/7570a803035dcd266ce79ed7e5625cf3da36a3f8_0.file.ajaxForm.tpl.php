<?php
/* Smarty version 3.1.33, created on 2019-01-08 17:56:29
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\templates\ajaxForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34e44d6870f8_26998039',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7570a803035dcd266ce79ed7e5625cf3da36a3f8' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\templates\\ajaxForm.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:subindicators.tpl' => 1,
  ),
),false)) {
function content_5c34e44d6870f8_26998039 (Smarty_Internal_Template $_smarty_tpl) {
?><input name="series" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['series']->value;?>
" />
<input name="CSRFToken" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
" />
<div class="mainform">
    <?php $_smarty_tpl->_subTemplateRender("file:subindicators.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form'=>$_smarty_tpl->tpl_vars['form']->value,'categoryID'=>htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['categoryID']->value), ENT_QUOTES, 'UTF-8', true),'UID'=>$_smarty_tpl->tpl_vars['UID']->value), 0, false);
?>
</div><?php }
}
