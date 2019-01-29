<?php
/* Smarty version 3.1.33, created on 2018-12-19 22:19:09
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\admin\templates\mod_system.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1ac3ddc40dc3_43813547',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5140c986cfdf5d0e63dd24dc5a6c3d923d9df53a' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\admin\\templates\\mod_system.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:site_elements/generic_xhrDialog.tpl' => 1,
    'file:site_elements/generic_confirm_xhrDialog.tpl' => 1,
  ),
),false)) {
function content_5c1ac3ddc40dc3_43813547 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
.item label {
    font-size: 120%;
    font-weight: bold;
    width: 250px;
}

.item {
    padding-bottom: 16px;
}
</style>

<h2 id="progress" style="color: red; text-align: center">
</h2>

<div style="width: 70%; margin: auto">
    <div style="border: 2px solid black; margin: 4px; background-color: white; padding: 16px">
        <div class="item">
        <label for="heading">Title of LEAF site:&nbsp;</label>
        <input id="heading" type="text" title="" value="<?php echo $_smarty_tpl->tpl_vars['heading']->value;?>
" />
        </div>

        <div class="item">
        <label for="subHeading">Facility Name:&nbsp;</label>
        <input id="subHeading" type="text" title="" value="<?php echo $_smarty_tpl->tpl_vars['subheading']->value;?>
" />
        </div>

        <div class="item">
        <label for="timeZone">Time Zone:&nbsp;</label>
        <select id="timeZone">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['timeZones']->value, 'tz');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tz']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['timeZone']->value == $_smarty_tpl->tpl_vars['tz']->value) {?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['tz']->value;?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['tz']->value;?>
</option>
                <?php } else { ?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['tz']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tz']->value;?>
</option>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
        </div>

        <div class="item">
        <label for="requestLabel">Label for "Request":&nbsp;</label>
        <input id="requestLabel" type="text" title="" value="<?php echo $_smarty_tpl->tpl_vars['requestLabel']->value;?>
" />
        </div>

<br />
        <div class="item">
        <label for="subHeading">Import Tags [<a href="#" title="Groups in the Org. Chart with any one of these tags will be imported for use">?</a>]:&nbsp;</label>
            <span style="font-style: italic">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['importTags']->value, 'importTag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['importTag']->value) {
?>
                <?php echo $_smarty_tpl->tpl_vars['importTag']->value;?>
<br />
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </span>
        </div>

        <button class="buttonNorm" onclick="saveSettings();" style="float: right"><img src="../../libs/dynicons/?img=media-floppy.svg&w=32" alt="save icon" /> Save</button>
        <br /><br />
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:site_elements/generic_xhrDialog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:site_elements/generic_confirm_xhrDialog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
var CSRFToken = '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
';

function saveSettings()
{
    $.when(
            $.ajax({
                type: 'POST',
                url: '../api/?a=system/settings/heading',
                data: {heading: $('#heading').val(),
                    CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
                success: function(res) {
                }
            }),
            $.ajax({
                type: 'POST',
                url: '../api/?a=system/settings/subHeading',
                data: {subHeading: $('#subHeading').val(),
                    CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
                success: function(res) {
                }
            }),
            $.ajax({
                type: 'POST',
                url: '../api/?a=system/settings/requestLabel',
                data: {requestLabel: $('#requestLabel').val(),
                    CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
                success: function(res) {
                }
            }),
            $.ajax({
                type: 'POST',
                url: '../api/?a=system/settings/timeZone',
                data: {timeZone: $('#timeZone').val(),
                    CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
                success: function(res) {
                }
            })
         ).then(function() {
        	 $('#progress').html('Settings saved.');
        	 $('#progress').fadeIn(10, function() {
                 $('#progress').fadeOut(2000);
        	 });
         });
}

var dialog, dialog_confirm;
$(function() {
	dialog = new dialogController('xhrDialog', 'xhr', 'loadIndicator', 'button_save', 'button_cancelchange');
    dialog_confirm = new dialogController('confirm_xhrDialog', 'confirm_xhr', 'confirm_loadIndicator', 'confirm_button_save', 'confirm_button_cancelchange');

});

<?php echo '</script'; ?>
>
<?php }
}
