<?php
/* Smarty version 3.1.33, created on 2018-12-19 22:06:41
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\admin\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1ac0f1e91533_68404956',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '198780c7a4d492282ac32a884229d252339bba74' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\admin\\templates\\login.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1ac0f1e91533_68404956 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['name']->value == '') {?>
    <form name="login" method="post" action="?a=login">
    <font class="alert">STATUS: <?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</font>
    <input name="login" type="submit" title="Click to login" value="Login" class="submit" />
    </form>
<?php } else { ?>
    Welcome, <b><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</b>! | <a href="../?a=logout">Sign out</a>
<?php }
}
}
