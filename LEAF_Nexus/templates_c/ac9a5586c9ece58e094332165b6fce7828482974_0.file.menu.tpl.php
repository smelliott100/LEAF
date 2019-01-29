<?php
/* Smarty version 3.1.33, created on 2019-01-08 17:56:21
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\templates\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34e44514e133_71027905',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac9a5586c9ece58e094332165b6fce7828482974' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\templates\\menu.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c34e44514e133_71027905 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['action']->value != '') {?>
    <a href="./" class="buttonNorm"><img src="../libs/dynicons/?img=go-home.svg&amp;w=16" alt="Main Page" title="Main Page" />Main Page</a>
<?php }
if (isset($_smarty_tpl->tpl_vars['isAdmin']->value)) {?>
    <a href="./admin/" class="buttonNorm"><img src="../libs/dynicons/?img=applications-system.svg&amp;w=16" alt="Admin Panel" title="Admin Panel" />OC Admin Panel</a>
<?php }?>    
<br />
<noscript class="alert"><span>Javascript must be enabled for this version of software to work!</span></noscript>
<?php }
}
