<?php
/* Smarty version 3.1.33, created on 2019-01-08 17:56:37
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\admin\templates\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34e455db5646_82083773',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54fa4a0d220da44c3fcc500b271bd45380080908' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\admin\\templates\\menu.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c34e455db5646_82083773 (Smarty_Internal_Template $_smarty_tpl) {
?>    <a href="../" class="buttonNorm"><img src="../../libs/dynicons/?img=go-home.svg&amp;w=16" alt="Main Page" title="Main Page" />Main Page</a>
<?php if (isset($_smarty_tpl->tpl_vars['isAdmin']->value)) {?>
    <a href="./" class="buttonNorm"><img src="../../libs/dynicons/?img=applications-system.svg&amp;w=16" alt="Admin Panel" title="Admin Panel" />OC Admin Panel</a>
<?php }?>    
<br />
<noscript class="alert"><span>Javascript must be enabled for this version of software to work!</span></noscript><?php }
}
