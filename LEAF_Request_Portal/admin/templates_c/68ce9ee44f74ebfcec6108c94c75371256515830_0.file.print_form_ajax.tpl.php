<?php
/* Smarty version 3.1.33, created on 2019-01-08 18:24:58
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\admin\templates\print_form_ajax.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34eafa9931e8_06668820',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '68ce9ee44f74ebfcec6108c94c75371256515830' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\admin\\templates\\print_form_ajax.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:print_subindicators.tpl' => 1,
  ),
),false)) {
function content_5c34eafa9931e8_06668820 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- form -->

<div class="printmainform">
    <?php $_smarty_tpl->_subTemplateRender("file:print_subindicators.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form'=>$_smarty_tpl->tpl_vars['form']->value,'orgchartPath'=>$_smarty_tpl->tpl_vars['orgchartPath']->value), 0, false);
?>
    <div class="buttonNorm" role="button" tabindex="0" onkeypress="onKeyPressClick(event)" onclick="newQuestion(null);"><img src="../../libs/dynicons/?img=list-add.svg&amp;w=16" alt="Add Section Heading" title="Add Section Heading"/> Add Section Heading</div>
</div>
<?php }
}
