<?php
/* Smarty version 3.1.33, created on 2019-01-08 17:56:21
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\templates\site_elements\generic_xhrDialog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34e44512e066_70336040',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fcb87392c409a727d81f13bc9a5f856462ce4bfc' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\templates\\site_elements\\generic_xhrDialog.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c34e44512e066_70336040 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="xhrDialog" style="visibility: hidden; display: none">
<form id="record" enctype="multipart/form-data" action="javascript:void(0);">
    <div>
        <button id="button_cancelchange" class="buttonNorm" style="position: absolute; left: 10px"><img src="../libs/dynicons/?img=process-stop.svg&amp;w=16" alt="cancel" /> Cancel</button>
        <button id="button_save" class="buttonNorm" style="position: absolute; right: 10px"><img src="../libs/dynicons/?img=media-floppy.svg&amp;w=16" alt="save" /> Save Change</button>
        <div style="border-bottom: 2px solid black; line-height: 30px"><br /></div>
        <div id="loadIndicator" style="visibility: hidden; z-index: 9000; position: absolute; text-align: center; font-size: 24px; font-weight: bold; background-color: #f2f5f7; padding: 16px; height: 400px; width: 526px"><img src="images/largespinner.gif" alt="loading..." /></div>
        <div id="xhr" style="width: 540px; height: 420px; padding: 8px; overflow: auto; font-size: 12px"></div>
    </div>
</form>
</div>
<?php }
}
