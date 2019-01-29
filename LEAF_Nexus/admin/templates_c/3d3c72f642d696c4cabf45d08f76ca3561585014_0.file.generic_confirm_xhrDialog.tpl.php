<?php
/* Smarty version 3.1.33, created on 2019-01-08 17:56:37
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\admin\templates\site_elements\generic_confirm_xhrDialog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34e455d9e0d2_62974842',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d3c72f642d696c4cabf45d08f76ca3561585014' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\admin\\templates\\site_elements\\generic_confirm_xhrDialog.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c34e455d9e0d2_62974842 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="confirm_xhrDialog" style="visibility: hidden">
<form id="confirm_record" enctype="multipart/form-data" action="javascript:void(0);">
    <div style="background-color: #feffd1; border: 1px solid black">
        <div id="confirm_loadIndicator" style="visibility: hidden; position: absolute; text-align: center; font-size: 24px; font-weight: bold; background: white; padding: 16px; height: 100px; width: 360px">Loading... <img src="../images/largespinner.gif" alt="loading..." /></div>
        <div id="confirm_xhr" style="width: 400px; height: 120px; padding: 16px; overflow: auto"></div>
        <div style="position: absolute; left: 10px; font-size: 140%"><button class="buttonNorm" id="confirm_button_cancelchange"><img src="../../libs/dynicons/?img=edit-undo.svg&amp;w=32" alt="cancel" /> No</button></div>
        <div style="text-align: right; padding-right: 6px"><button class="buttonNorm" id="confirm_button_save"><img src="../../libs/dynicons/?img=media-floppy.svg&amp;w=32" alt="save" /><span id="confirm_saveBtnText"> Yes</span></button></div><br />
    </div>
</form>
</div><?php }
}
