<?php
/* Smarty version 3.1.33, created on 2018-12-19 17:00:25
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1abf79511971_64478827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0771f61fbfaad1bb2677085a24136e318c5f14d' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\login.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1abf79511971_64478827 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),));
if ($_smarty_tpl->tpl_vars['name']->value == '') {?>
    <form name="login" method="post" action="?a=login">
    <font class="alert">STATUS: <?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</font>
    <input name="login" type="submit" title="Click to login" value="Login" class="submit" />
    </form>
<?php } else { ?>
    Welcome, <b><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['name']->value);?>
</b>! | <a href="?a=logout">Sign out</a>
<?php }
}
}
