<?php
/* Smarty version 3.1.33, created on 2018-12-19 22:06:43
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\admin\templates\site_elements\generic_confirm_xhrDialog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1ac0f372bb74_44475782',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '978f414712ea10fa90b56dffa561c426be9019d4' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\admin\\templates\\site_elements\\generic_confirm_xhrDialog.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1ac0f372bb74_44475782 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="confirm_xhrDialog" style="background-color: #feffd1; border: 1px solid black; visibility: hidden; display: none">
<form id="confirm_record" enctype="multipart/form-data" action="javascript:void(0);">
    <div>
        <div id="confirm_loadIndicator" style="visibility: hidden; position: absolute; text-align: center; font-size: 24px; font-weight: bold; background: white; padding: 16px; height: 100px; width: 360px">Loading... <img src="../images/largespinner.gif" alt="loading..." /></div>
        <div id="confirm_xhr" style="font-size: 130%; width: 400px; height: 120px; padding: 16px; overflow: auto"></div>
        <div style="position: absolute; left: 10px; font-size: 140%"><button class="buttonNorm" id="confirm_button_cancelchange"><img src="../../libs/dynicons/?img=edit-undo.svg&amp;w=32" alt="cancel" /> No</button></div>
        <div style="text-align: right; padding-right: 6px"><button class="buttonNorm" id="confirm_button_save"><img src="../../libs/dynicons/?img=dialog-apply.svg&amp;w=32" alt="save" /><span id="confirm_saveBtnText"> Yes</span></button></div><br />
    </div>
</form>
</div><?php }
}
