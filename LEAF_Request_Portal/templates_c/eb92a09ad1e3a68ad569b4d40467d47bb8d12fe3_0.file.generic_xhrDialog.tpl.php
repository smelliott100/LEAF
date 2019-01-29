<?php
/* Smarty version 3.1.33, created on 2018-12-19 17:00:26
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\site_elements\generic_xhrDialog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1abf7ad5e0a8_36809766',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb92a09ad1e3a68ad569b4d40467d47bb8d12fe3' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\site_elements\\generic_xhrDialog.tpl',
      1 => 1524102174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1abf7ad5e0a8_36809766 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="xhrDialog" style="visibility: hidden; display: none; background-color: white; border-style: none solid solid; border-width: 0 1px 1px; border-color: #e0e0e0; padding: 4px">
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
