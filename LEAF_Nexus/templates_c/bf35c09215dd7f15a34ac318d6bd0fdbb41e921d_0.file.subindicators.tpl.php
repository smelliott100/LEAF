<?php
/* Smarty version 3.1.33, created on 2019-01-08 17:56:29
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\templates\subindicators.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34e44d706281_52561408',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf35c09215dd7f15a34ac318d6bd0fdbb41e921d' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\templates\\subindicators.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:subindicators.tpl' => 2,
  ),
),false)) {
function content_5c34e44d706281_52561408 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),1=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\function.counter.php','function'=>'smarty_function_counter',),));
?>
    <?php if (!isset($_smarty_tpl->tpl_vars['depth']->value)) {?>
    <?php $_smarty_tpl->_assignInScope('depth', 0);?>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['depth']->value == 0) {?>
    <?php $_smarty_tpl->_assignInScope('color', '#e0e0e0');?>
    <?php } else { ?>
    <?php $_smarty_tpl->_assignInScope('color', 'white');?>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['form']->value) {?>
    <div class="formblock">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['form']->value, 'indicator');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['indicator']->value) {
?>

                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == null || $_smarty_tpl->tpl_vars['indicator']->value['format'] == 'textarea') {?>
                <?php $_smarty_tpl->_assignInScope('colspan', 2);?>
                <?php } else { ?>
                <?php $_smarty_tpl->_assignInScope('colspan', 1);?>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['depth']->value == 0) {?>
        <div class="mainlabel">
            <div>
            <span>
                <b><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['name']);?>
</b><br />
            </span>
            </div>
                <?php } else { ?>
        <div class="sublabel">
            <span>
                    <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == null) {?>
                        <br /><b><?php echo preg_replace('!^!m',str_repeat('',$_smarty_tpl->tpl_vars['depth']->value),smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['name']));?>
</b>
                    <?php } else { ?>
                        <br /><?php echo preg_replace('!^!m',str_repeat('',$_smarty_tpl->tpl_vars['depth']->value),smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['name']));?>

                    <?php }?>
            </span>
                <?php }?>
        </div>
        <div class="response">
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 1 && $_smarty_tpl->tpl_vars['indicator']->value['data'] != '') {?>
            <span class="text">
                [protected data]
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'textarea' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <span class="text">
                <br /><textarea rows="10" style="width: 99%" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
"><?php echo $_smarty_tpl->tpl_vars['indicator']->value['data'];?>
</textarea>
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'radio' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
                <span id="parentID_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['parentID'];?>
">
                <?php echo smarty_function_counter(array('assign'=>'ctr','print'=>false),$_smarty_tpl);?>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['options'], 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?>
                <?php if (is_array($_smarty_tpl->tpl_vars['option']->value)) {?>
                    <?php $_smarty_tpl->_assignInScope('option', $_smarty_tpl->tpl_vars['option']->value[0]);?>
                    <?php if ($_smarty_tpl->tpl_vars['option']->value == $_smarty_tpl->tpl_vars['indicator']->value['data']) {?>
                        <br /><input type="radio" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
" class="icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" checked="checked" />
                        <label class="checkable" for="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value;?>
</label>
                    <?php } else { ?>
                        <br /><input type="radio" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
" class="icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" />
                        <label class="checkable" for="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value;?>
</label>
                    <?php }?>
                <?php } elseif ($_smarty_tpl->tpl_vars['option']->value == $_smarty_tpl->tpl_vars['indicator']->value['data']) {?>
                    <br /><input type="radio" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
" class="icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" checked="checked" />
                    <label class="checkable" for="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value;?>
</label>
                <?php } else { ?>
                    <br /><input type="radio" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
" class="icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" />
                    <label class="checkable" for="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value;?>
</label>
                <?php }?>
                <?php echo smarty_function_counter(array('print'=>false),$_smarty_tpl);?>

            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </span>
                <?php echo '<script'; ?>
>
                $(function() {
//                    $('.icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').icheck({checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue'});
                });
                <?php echo '</script'; ?>
>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'dropdown' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
                <span><select id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" style="width: 50%">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['options'], 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?>
                <?php if (is_array($_smarty_tpl->tpl_vars['option']->value)) {?>
                    <?php $_smarty_tpl->_assignInScope('option', $_smarty_tpl->tpl_vars['option']->value[0]);?>
                    <?php if ($_smarty_tpl->tpl_vars['option']->value == $_smarty_tpl->tpl_vars['indicator']->value['data']) {?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['option']->value;?>
</option>
                    <?php } else { ?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value;?>
</option>
                    <?php }?>
                <?php } elseif ($_smarty_tpl->tpl_vars['option']->value == $_smarty_tpl->tpl_vars['indicator']->value['data']) {?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['option']->value;?>
</option>
                    <?php echo $_smarty_tpl->tpl_vars['option']->value;?>

                <?php } else { ?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value;?>
</option>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select></span>
                <?php echo '<script'; ?>
 type="text/javascript">
                $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').chosen({disable_search_threshold: 5, allow_single_deselect: true, width: '80%'});
                <?php echo '</script'; ?>
>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'text' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <span class="text">
                <br /><input type="text" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['indicator']->value['data'];?>
" style="width: 50%" <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>
 />
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'number' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <span class="text">
                <br /><input type="text" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['indicator']->value['data'];?>
" <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>
 />
            </span>
            <?php echo '<script'; ?>
 type="text/javascript">
            orgchartForm.dialog.setValidator(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, function() {
                return ($.isNumeric($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val()) || $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val() == '');
            });
            orgchartForm.dialog.setValidatorError(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, function() {
                alert('Data must be numeric.');
            });
            <?php echo '</script'; ?>
>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'numberspinner' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <span class="text">
                <br /><input type="text" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['indicator']->value['data'];?>
" <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>
 />
            </span>
            <?php echo '<script'; ?>
 type="text/javascript">
            $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').spinner();
            <?php echo '</script'; ?>
>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'date' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <span class="text">
                <br /><input type="text" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['indicator']->value['data'];?>
" <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>
 />
                <?php echo '<script'; ?>
 type="text/javascript">
                $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').datepicker();
                <?php echo '</script'; ?>
>
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'time' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <span class="text">
                <br /><input disabled="disabled" type="text" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['indicator']->value['data'];?>
" <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>
 />
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'currency' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <span class="text">
                <br /><input type="text" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['indicator']->value['data'];?>
" <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>
 /> (Amount in USD)
                <?php echo '<script'; ?>
 type="text/javascript">
                orgchartForm.dialog.setValidator(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, function() {
                    return ($.isNumeric($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val()) || $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val() == '');
                });
                <?php echo '</script'; ?>
>
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'checkbox' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
                <span id="parentID_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['parentID'];?>
">
                    <input type="hidden" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="no" /> <!-- dumb workaround -->
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['options'], 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['option']->value == $_smarty_tpl->tpl_vars['indicator']->value['data']) {?>
                    <br /><input dojoType="dijit.form.CheckBox" type="checkbox" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" checked="checked" />
                    <?php echo $_smarty_tpl->tpl_vars['option']->value;?>

                <?php } else { ?>
                    <br /><input dojoType="dijit.form.CheckBox" type="checkbox" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" />
                    <?php echo $_smarty_tpl->tpl_vars['option']->value;?>

                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'checkboxes' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
                <span id="parentID_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['parentID'];?>
">
            <?php $_smarty_tpl->_assignInScope('idx', 0);?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['options'], 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?>
                    <input type="hidden" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
[<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
]" value="no" /> <!-- dumb workaround -->
                    <?php if ($_smarty_tpl->tpl_vars['option']->value == $_smarty_tpl->tpl_vars['indicator']->value['data'][$_smarty_tpl->tpl_vars['idx']->value]) {?>
                        <br /><input dojoType="dijit.form.CheckBox" type="checkbox" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
[<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" checked="checked" />
                        <?php echo $_smarty_tpl->tpl_vars['option']->value;?>

                    <?php } else { ?>
                        <br /><input dojoType="dijit.form.CheckBox" type="checkbox" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
[<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" />
                        <?php echo $_smarty_tpl->tpl_vars['option']->value;?>

                    <?php }?>
                    <?php $_smarty_tpl->_assignInScope('idx', $_smarty_tpl->tpl_vars['idx']->value+1);?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'fileupload' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <fieldset>
                <legend>File Attachment</legend>
                <span class="text">
                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['data'][0] != '') {?>
                <?php $_smarty_tpl->_assignInScope('counter', 0);?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['data'], 'file');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
?>
                <div style="background-color: #b7c5ff; padding: 4px"><img src="../libs/dynicons/?img=mail-attachment.svg&amp;w=16" /> <b>File Attached:</b> <a href="file.php?categoryID=<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
&amp;UID=<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
&amp;indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
&amp;file=<?php echo urlencode($_smarty_tpl->tpl_vars['file']->value);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['file']->value;?>
</a>
                    <div style="float: right; padding: 4px">
                    [ <span class="link" onclick="$('#fileDeleteIframe_<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
').css('display', 'inline'); $('#fileDeleteIframe_<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
').css('visibility', 'visible');">Delete</span> ]
                    </div>
                    <iframe id="fileDeleteIframe_<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
" style="visibility: hidden; display: none" src="ajaxIframe.php?a=getdeleteprompt&amp;categoryID=<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
&amp;UID=<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
&amp;indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
&amp;file=<?php echo urlencode($_smarty_tpl->tpl_vars['file']->value);?>
" frameborder="0" width="440px" height="85px"></iframe>
                </div>
                <?php $_smarty_tpl->_assignInScope('counter', $_smarty_tpl->tpl_vars['counter']->value+1);?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <iframe id="fileIframe_<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
" style="visibility: hidden; display: none" src="ajaxIframe.php?a=getuploadprompt&amp;categoryID=<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
&amp;UID=<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
&amp;indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" frameborder="0" width="440px" height="85px"></iframe>
                <br />
                <span id="fileAdditional" class="buttonNorm" onclick="$('#fileIframe_<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
').css('display', 'inline'); $('#fileIframe_<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
').css('visibility', 'visible'); $('#fileAdditional').css('visibility', 'hidden')"><img src="../libs/dynicons/?img=document-open.svg&amp;w=32" /> Attach Additional File</span>
                <?php } else { ?>
                    <iframe src="ajaxIframe.php?a=getuploadprompt&amp;categoryID=<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
&amp;UID=<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
&amp;indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" frameborder="0" width="440px" height="85px"></iframe><br />
                <?php }?>
                </span>
            </fieldset>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'image' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <fieldset>
                <legend>Photo Attachment</legend>
                <span class="text">
                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['data'] != '') {?>
                <div style="background-color: #b7c5ff; padding: 4px"><img src="../libs/dynicons/?img=mail-attachment.svg&amp;w=16" /> <b>Photo Attached:</b> <img src="image.php?categoryID=<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
&amp;UID=<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
&amp;indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" style="max-width: 150px" alt="<?php echo $_smarty_tpl->tpl_vars['indicator']->value['data'];?>
" /></div>
                <div style="float: right; padding: 4px">
                [ <span class="link" onclick="$('#fileIframe_<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
').css('display', 'inline'); $('#fileIframe_<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
').css('visibility', 'visible');">Replace</span> | <span class="link" onclick="$('#fileDeleteIframe_<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
').css('display', 'inline'); $('#fileDeleteIframe_<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
').css('visibility', 'visible');">Delete</span> ]</div>
                <iframe id="fileDeleteIframe_<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
" style="visibility: hidden; display: none" src="ajaxIframe.php?a=getdeleteprompt&amp;categoryID=<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
&amp;UID=<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
&amp;indicatorID<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
&amp;file=<?php echo $_smarty_tpl->tpl_vars['indicator']->value['data'];?>
" frameborder="0" width="440px" height="85px"></iframe>
                <iframe id="fileIframe_<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
" style="visibility: hidden; display: none" src="ajaxIframe.php?a=getuploadprompt&amp;categoryID=<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
&amp;UID=<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
&amp;indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" frameborder="0" width="440px" height="85px"></iframe>
                <?php } else { ?>
                    <iframe src="ajaxIframe.php?a=getuploadprompt&amp;categoryID=<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
&amp;UID=<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
&amp;indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" frameborder="0" width="440px" height="85px"></iframe><br />
                <?php }?>
                </span>
            </fieldset>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'table' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['options'], 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?>
                <?php if (is_array($_smarty_tpl->tpl_vars['option']->value)) {?>
                    <?php $_smarty_tpl->_assignInScope('option', $_smarty_tpl->tpl_vars['option']->value[0]);?>
                    <?php echo $_smarty_tpl->tpl_vars['option']->value;?>
 <input type="checkbox" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
[]" value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" checked="checked" /><br />
                <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['option']->value;?>
 <input type="checkbox" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
[]" value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" /><br />
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'orgchart_position' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['data'] != '') {?>
            <div dojoType="dijit.layout.ContentPane" id="indata_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
" style="padding: 0px">
            <?php echo '<script'; ?>
 type="dojo/method">
                dojo.xhrGet({
                    url: "<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/?a=position/<?php echo $_smarty_tpl->tpl_vars['indicator']->value['data'];?>
",
                    handleAs: 'json',
                    load: function(data, args) {
                        // IE7 workaround requires anchors to be manually created through DOM...
                        dojo.byId('indata_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
').innerHTML = '<b>' + data.title + '</b>'
                            /* Pay Plan, Series, Pay Grade */ + '<br />' + data[2].data + '-' + data[13].data + '-' + data[14].data;

                        if(data[3].data != '') {
                            for(var i in data[3].data) {
                                var pdLink = document.createElement('a');
                                pdLink.innerHTML = data[3].data[i];
                                pdLink.setAttribute('href', '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/file.php?categoryID=2&UID=<?php echo $_smarty_tpl->tpl_vars['indicator']->value['data'];?>
&indicatorID|strip_tags=3&file=' + encodeURIComponent(data[3].data[i]));
                                pdLink.setAttribute('class', 'printResponse');
                                pdLink.setAttribute('target', '_blank');

                                dojo.byId('indata_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
').innerHTML += '<br />Position Description: ';
                                dojo.byId('indata_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
').appendChild(pdLink);
                            }
                        }

                        br = document.createElement('br');
                        dojo.byId('indata_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
').appendChild(br);

                        var ocLink = document.createElement('div');
                        ocLink.innerHTML = '<img src="../libs/dynicons/?img=preferences-system-windows.svg&w=32" alt="View Position Details" /> View Details in Org. Chart';
                        ocLink.setAttribute('onclick', "window.open('<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/?a=view_position&positionID=<?php echo $_smarty_tpl->tpl_vars['indicator']->value['data'];?>
','Resource_Request','width=870,resizable=yes,scrollbars=yes,menubar=yes');");
                        ocLink.setAttribute('class', 'buttonNorm');
                        ocLink.setAttribute('style', 'margin-top: 8px');
                        dojo.byId('indata_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
').appendChild(ocLink);
                    },
                    preventCache: true
                });
            <?php echo '</script'; ?>
>
            Loading...
            </div>
            <?php } else { ?>
            Unassigned
            <div id="posSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
"></div>
            <div dojoType="dijit.form.TextBox" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" style="visibility: hidden">
            <?php echo '<script'; ?>
 type="dojo/method">
                if(typeof positionSelector == 'undefined') {
                    // I am so upset with IE7
                    if(document.createStyleSheet) {
                        document.createStyleSheet('<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/css/positionSelector.css');
                        dojo.xhrGet({
                            url: "<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/js/positionSelector.js",
                            handleAs: 'text',
                            load: function(response) {
                                eval(response);
                                posSel = new positionSelector('posSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
');
                                posSel.apiPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/';
                                posSel.enableEmployeeSearch();

                                posSel.setSelectHandler(function() {
                                    dojo.byId('<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').value = posSel.selection;
                                });

                                posSel.initialize();
                            }
                        });                        
                    }
                    else {
                        dojo.create('style', {type: 'text/css', media: 'screen', innerHTML: '@import "<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/css/positionSelector.css";'}, document.getElementsByTagName('head')[0]);
                        dojo.xhrGet({
                            url: "<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/js/positionSelector.js",
                            handleAs: 'javascript',
                            load: function() {
                                posSel = new positionSelector('posSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
');
                                posSel.apiPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/';
                                posSel.enableEmployeeSearch();

                                posSel.setSelectHandler(function() {
                                    dojo.byId('<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').value = posSel.selection;
                                });

                                posSel.initialize();
                            }
                        });
                    }
                }
                else {
                    posSel = new positionSelector('posSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
');
                    posSel.apiPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/';
                    posSel.enableEmployeeSearch();

                    posSel.setSelectHandler(function() {
                        dojo.byId('<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').value = posSel.selection;
                    });

                    posSel.initialize();
                }
            <?php echo '</script'; ?>
>
            
            </div>

            <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'orgchart_employee' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <div id="empSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
"></div>
            <div dojoType="dijit.form.TextBox" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" style="visibility: hidden">
            
            <?php echo '<script'; ?>
 type="dojo/method">
                if(typeof employeeSelector == 'undefined') {
                    // I am so upset with IE7
                    if(document.createStyleSheet) {
                        document.createStyleSheet('<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/css/employeeSelector.css');
                        dojo.xhrGet({
                            url: "<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/js/employeeSelector.js",
                            handleAs: 'text',
                            load: function(response) {
                                eval(response);
                                empSel = new employeeSelector('empSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
');
                                empSel.apiPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/';
                                empSel.rootPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/';

                                empSel.setSelectHandler(function() {
                                    dojo.byId('<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').value = empSel.selection;
                                });

                                empSel.initialize();
                            }
                        });                        
                    }
                    else {
                        dojo.create('style', {type: 'text/css', media: 'screen', innerHTML: '@import "<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/css/employeeSelector.css";'}, document.getElementsByTagName('head')[0]);
                        dojo.xhrGet({
                            url: "<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/js/employeeSelector.js",
                            handleAs: 'javascript',
                            load: function() {
                                empSel = new employeeSelector('empSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
');
                                empSel.apiPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/';
                                empSel.rootPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/';

                                empSel.setSelectHandler(function() {
                                    dojo.byId('<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').value = empSel.selection;
                                });

                                empSel.initialize();
                            }
                        });
                    }
                }
                else {
                    empSel = new employeeSelector('empSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
');
                    empSel.apiPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/';
                    empSel.rootPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/';

                    empSel.setSelectHandler(function() {
                        dojo.byId('<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').value = empSel.selection;
                    });

                    empSel.initialize();
                }
            <?php echo '</script'; ?>
>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'json') {?>
            <span class="text">
                This field is reserved for programmer use.<br /><br />
                <pre><?php echo $_smarty_tpl->tpl_vars['indicator']->value['data'];?>
</pre>
            </span>
        <?php }?>
        <div>
            <br />
            <fieldset><legend>Access Permissions</legend>
            <iframe tabindex="0" src="ajaxIframe.php?a=permission&amp;categoryID=<?php echo $_smarty_tpl->tpl_vars['categoryID']->value;?>
&amp;UID=<?php echo $_smarty_tpl->tpl_vars['UID']->value;?>
&amp;indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" frameborder="0" width="440px" height="140px"></iframe>
            </fieldset>
        </div>
        <?php $_smarty_tpl->_subTemplateRender("file:subindicators.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form'=>$_smarty_tpl->tpl_vars['indicator']->value['child'],'depth'=>$_smarty_tpl->tpl_vars['depth']->value+4,'recordID'=>$_smarty_tpl->tpl_vars['recordID']->value), 0, true);
?>

        </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    <?php }
}
}
