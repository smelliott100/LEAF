<?php
/* Smarty version 3.1.33, created on 2019-01-08 17:56:29
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\templates\permission_iframe.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34e44d8596d8_57104092',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7315acad2cadd874feab6e2b11209a80cf877038' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\templates\\permission_iframe.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c34e44d8596d8_57104092 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['privileges']->value, 'privilege');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['privilege']->value) {
?>
    <?php if ($_smarty_tpl->tpl_vars['privilege']->value['read'] == 0) {?>
<div style="padding: 4px; color: red">
    <img src="../libs/dynicons/?img=emblem-readonly.svg&amp;w=32" alt="Icon" style="vertical-align: middle" />
    No access to read this field.
    <?php } else { ?>
<div style="padding: 4px; color: green" tabindex="0">
    <img src="../libs/dynicons/?img=edit-find.svg&amp;w=32" alt="Icon" style="vertical-align: middle" />
    You have access to read this field.
    <?php }?>
</div>
    <?php if ($_smarty_tpl->tpl_vars['privilege']->value['write'] == 0) {?>
<div style="padding: 4px; color: red" tabindex="0">
    <img src="../libs/dynicons/?img=emblem-readonly.svg&amp;w=32" alt="Icon" style="vertical-align: middle" />
    No access to edit this field.
    <?php } else { ?>
<div style="padding: 4px; color: green" tabindex="0">
    <img src="../libs/dynicons/?img=accessories-text-editor.svg&amp;w=32" alt="Icon" style="vertical-align: middle" />
    You have access to edit this field.
    <?php }?>
</div>
    <?php if ($_smarty_tpl->tpl_vars['privilege']->value['grant'] == 0) {?>
<div style="padding: 4px; color: red">
        <?php if ($_smarty_tpl->tpl_vars['privilege']->value['read'] == 0) {?>
        <img src="../libs/dynicons/?img=emblem-readonly.svg&amp;w=32" alt="Icon" style="vertical-align: middle" />
        No access to edit permissions for this field.
        <?php } else { ?>
        <div class="buttonNorm" onclick="window.open('index.php?a=view_permissions&amp;indicatorID=<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicatorID']->value), ENT_QUOTES, 'UTF-8', true);?>
&amp;UID=<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['UID']->value), ENT_QUOTES, 'UTF-8', true);?>
','OrgChart','width=840,resizable=yes,scrollbars=yes,menubar=yes').focus();">
        <img src="../libs/dynicons/?img=emblem-readonly.svg&amp;w=32" alt="Icon" style="vertical-align: middle" />
        <u>View permissions for this field.</u></div>
        <?php }?>
    <?php } else { ?>
<div style="padding: 4px; color: green">
    <div onkeypress="triggerClick(event, this.id)" tabindex="0" id="editpermissions" class="buttonNorm" onclick="window.open('index.php?a=view_permissions&amp;indicatorID=<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicatorID']->value), ENT_QUOTES, 'UTF-8', true);?>
&amp;UID=<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['UID']->value), ENT_QUOTES, 'UTF-8', true);?>
','OrgChart','width=840,resizable=yes,scrollbars=yes,menubar=yes').focus();">
    <img src="../libs/dynicons/?img=emblem-system.svg&amp;w=32" alt="Icon" style="vertical-align: middle" />
    You have access to <u>Edit Permissions</u> for this field.</div>
    <?php }?>
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
echo '<script'; ?>
>
    function triggerClick(e, id) {
        if(e.keyCode === 13) {
            document.getElementById(id).click();
        }
    }
<?php echo '</script'; ?>
>
<?php }
}
