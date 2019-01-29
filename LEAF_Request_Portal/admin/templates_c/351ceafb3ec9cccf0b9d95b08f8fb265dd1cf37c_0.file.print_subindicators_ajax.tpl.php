<?php
/* Smarty version 3.1.33, created on 2019-01-08 18:24:58
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\admin\templates\print_subindicators_ajax.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34eafa9dc5a5_00280297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '351ceafb3ec9cccf0b9d95b08f8fb265dd1cf37c' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\admin\\templates\\print_subindicators_ajax.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:print_subindicators.tpl' => 1,
  ),
),false)) {
function content_5c34eafa9dc5a5_00280297 (Smarty_Internal_Template $_smarty_tpl) {
?>            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
            </span>
        <?php $_smarty_tpl->_subTemplateRender("file:print_subindicators.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form'=>$_smarty_tpl->tpl_vars['indicator']->value['child'],'depth'=>$_smarty_tpl->tpl_vars['depth']->value+4,'recordID'=>$_smarty_tpl->tpl_vars['recordID']->value), 0, false);
}
}
