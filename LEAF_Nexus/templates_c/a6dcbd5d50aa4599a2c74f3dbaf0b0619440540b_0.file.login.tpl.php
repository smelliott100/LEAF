<?php
/* Smarty version 3.1.33, created on 2019-01-08 17:56:21
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34e445081225_93304868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6dcbd5d50aa4599a2c74f3dbaf0b0619440540b' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\templates\\login.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c34e445081225_93304868 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['name']->value == '') {?>
    <form name="login" method="post" action="?a=login">
    <font class="alert">STATUS: <?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</font>
    <input name="login" type="submit" title="Click to login" value="Login" class="submit" />
    </form>
<?php } else { ?>
    Logged in as: <b><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</b>
<?php }
}
}
