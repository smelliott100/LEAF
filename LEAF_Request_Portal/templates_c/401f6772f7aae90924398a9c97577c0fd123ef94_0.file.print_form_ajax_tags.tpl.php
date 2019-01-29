<?php
/* Smarty version 3.1.33, created on 2018-12-19 17:00:27
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\print_form_ajax_tags.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1abf7b393b30_82724676',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '401f6772f7aae90924398a9c97577c0fd123ef94' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\print_form_ajax_tags.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1abf7b393b30_82724676 (Smarty_Internal_Template $_smarty_tpl) {
?><b>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value, 'tag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
?>
*
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</b>
<!-- <img src="../libs/dynicons/?img=folder-new.svg&amp;w=16" alt="Edit tags" title="Edit tags" style="cursor: pointer" onclick="getTags(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
);" /> --><?php }
}
