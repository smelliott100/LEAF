<?php
/* Smarty version 3.1.33, created on 2018-12-19 22:28:17
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\admin\templates\site_elements\generic_simple_xhrDialog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1ac6017e0cb1_15816069',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '884a554ea13dd066e1f5fd3943c99d4334a3ccd5' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\admin\\templates\\site_elements\\generic_simple_xhrDialog.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1ac6017e0cb1_15816069 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="simplexhrDialog" style="visibility: hidden; display: none; background-color: white; border-style: none solid solid; border-width: 0 1px 1px; border-color: #e0e0e0; padding: 4px">
    <div>
        <button id="simplebutton_cancelchange" class="buttonNorm" style="display: none">Cancel</button>
        <button id="simplebutton_save" class="buttonNorm" style="display: none">Save Change</button>
        <div id="simpleloadIndicator" style="visibility: hidden; z-index: 9000; position: absolute; text-align: center; font-size: 24px; font-weight: bold; background-color: #f2f5f7; padding: 16px; height: 400px; width: 526px"><img src="../images/largespinner.gif" alt="loading..." /></div>
        <div id="simplexhr" style="width: 540px; height: 420px; padding: 8px; overflow: auto; font-size: 12px"></div>
    </div>
</div>
<?php }
}
