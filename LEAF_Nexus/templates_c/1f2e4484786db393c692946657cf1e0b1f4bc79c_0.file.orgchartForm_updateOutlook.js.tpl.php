<?php
/* Smarty version 3.1.33, created on 2019-01-08 17:56:21
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\templates\site_elements\orgchartForm_updateOutlook.js.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34e44513d763_19534338',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f2e4484786db393c692946657cf1e0b1f4bc79c' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\templates\\site_elements\\orgchartForm_updateOutlook.js.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c34e44513d763_19534338 (Smarty_Internal_Template $_smarty_tpl) {
?>    orgchartForm.addUpdateEvent(5, function(response) {
        dialog = new dialogController('xhrDialog', 'xhr', 'loadIndicator', 'button_save', 'button_cancelchange');
        dialog.setTitle('Update Outlook');
        dialog.setContent('<div style="border: 1px solid black; background-color: #e0e0e0"><div style="float: left; padding: 32px"><img src="../libs/dynicons/?img=system-lock-screen.svg&amp;w=72" alt="NT Account Password Required" /></div>\
                   <div style="padding-top: 42px">Please enter your Windows Account password to update the Outlook address book.\
                   <br /><br /><span style="font-size: 120%"><?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
</span><br /><br /><input id="NTPW" type="password" />\
                   </div><br /><br /></div>');
        $('#NTPW').keypress(function(event) {
            if(event.which == 13) {
                $('#' + dialog.btnSaveID).trigger('click');
            }
        });
        dialog.setSaveHandler(function() {
            dialog.indicateBusy();
            $.ajax({
                type: 'POST',
                url: './auth/updateOutlook.php',
                data: {empUID: orgchartForm.currUID,
                       NTPW: $('#NTPW').val(),
                       CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
                success: function(response) {
                },
                cache: false
            });
            dialog.hide();
            $('#NTPW').val('');
        });
        dialog.show();
        $('#NTPW').focus();
    });
<?php }
}
