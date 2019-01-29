<?php
/* Smarty version 3.1.33, created on 2018-12-19 17:00:26
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\site_elements\generic_dialog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1abf7ad6a783_69873322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '690ffcb43bf0f3774bb6bee64a8986eddbae08db' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\site_elements\\generic_dialog.tpl',
      1 => 1524102174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1abf7ad6a783_69873322 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="genericDialog" style="visibility: hidden; display: none">
    <div>
        <div id="genericDialogbutton_cancelchange" style="display: none"></div>
        <div id="genericDialogbutton_save" style="display: none"></div>
        <div id="genericDialogloadIndicator" style="visibility: hidden; z-index: 9000; position: absolute; text-align: center; font-size: 24px; font-weight: bold; background-color: #f2f5f7; padding: 16px; height: 400px; width: 526px"><img src="images/largespinner.gif" alt="loading..." /></div>
        <div id="genericDialogxhr" style="width: 540px; height: 420px; padding: 8px; overflow: auto; font-size: 12px"></div>
    </div>
</div>
<?php }
}
