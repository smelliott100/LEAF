<?php
/* Smarty version 3.1.33, created on 2019-01-23 10:32:25
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\subindicators.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c4889097ee7e0_88115184',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fed6d4fb8c1484240f028dd3f34fc15943893dc' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\subindicators.tpl',
      1 => 1548257516,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c4889097ee7e0_88115184 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.sanitizeRichtext.php','function'=>'smarty_modifier_sanitizeRichtext',),1=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),2=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\function.counter.php','function'=>'smarty_function_counter',),));
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
                <b><?php echo smarty_modifier_sanitizeRichtext($_smarty_tpl->tpl_vars['indicator']->value['name']);?>
</b><?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?><span id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required" style="margin-left: 8px; color: red;">*&nbsp;Required</span><?php }
if ($_smarty_tpl->tpl_vars['indicator']->value['is_sensitive'] == 1) {?><span style="margin-left: 8px; color: red;">*&nbsp;Sensitive &nbsp; &nbsp; &nbsp;</span> <?php }?><br />
            </span>
            </div>
                <?php } else { ?>
        <div class="sublabel blockIndicator_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
">
            <span>
                    <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == null) {?>
                        <br /><b><?php echo preg_replace('!^!m',str_repeat('',$_smarty_tpl->tpl_vars['depth']->value),smarty_modifier_sanitizeRichtext($_smarty_tpl->tpl_vars['indicator']->value['name']));?>
</b><?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?><span id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required" style="margin-left: 8px; color: red;">*&nbsp;Required</span><?php }?>
                    <?php } else { ?>
                        <br /><?php echo preg_replace('!^!m',str_repeat('',$_smarty_tpl->tpl_vars['depth']->value),smarty_modifier_sanitizeRichtext($_smarty_tpl->tpl_vars['indicator']->value['name']));
if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?><span id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required" style="margin-left: 8px; color: red;">*&nbsp;Required</span><?php }?>
                    <?php }?>
            </span>
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['is_sensitive'] == 1) {?><span role="button" aria-label="click here to toggle display" tabindex="0" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_sensitive" style="margin-left: 8px; color: red; background-repeat: no-repeat; background-image: url(/libs/dynicons/?img=eye_invisible.svg&w=16); background-position-x: 70px;" onclick="toggleSensitive(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
);" onkeydown="if (event.keyCode==13){ this.click(); }">*&nbsp;Sensitive &nbsp; &nbsp; &nbsp;</span><span id="sensitiveStatus" aria-label="sensitive data hidden" style="position: absolute; width: 60%; height: 1px; margin: -1px; padding: 0; overflow: hidden; clip: rect(0,0,0,0); border: 0;" role="status" aria-live="assertive" aria-atomic="true"></span> <?php }?>
                <?php }?>
        </div>
        <div class="response blockIndicator_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
">
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 1 && $_smarty_tpl->tpl_vars['indicator']->value['value'] != '') {?>
            <span class="text">
                [protected data]
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'grid' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
            <?php echo '<script'; ?>
 type="text/javascript" src="js/gridInput.js"><?php echo '</script'; ?>
>
            <span style="position: absolute; color: transparent" aria-atomic="true" aria-live="polite" id="tableStatus" role="status"></span>
            <div class="tableinput">
            <table class="table" id="grid_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
_input" style="word-wrap:break-word; table-layout: fixed; height: 100%; display: table">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
            <button type="button" class="buttonNorm" id="addRowBtn" title="Grid input add row" alt="Grid input add row" aria-label="Grid input add row" onclick="addRow(options_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
)"><img src="../libs/dynicons/?img=list-add.svg&w=16" style="height: 25px;"/>Add row</button>
            <?php echo '<script'; ?>
>
                var options_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
 = <?php echo $_smarty_tpl->tpl_vars['indicator']->value['options'][0];?>
;
                var values_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
 = <?php echo json_encode($_smarty_tpl->tpl_vars['indicator']->value['value']);?>
;

                $(function() {
                    printTableInput(options_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
, values_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
, <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
);
                });

                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
                formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                    setRequired:  function() {
                        var gridElement = '#grid_' + <?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 + '_' + <?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
 + '_input > tbody';
                        for(var i = 0; i < $(gridElement).find('tr').length; i++){
                            for(var j = 0; j < $(gridElement + ' > tr:eq(0)').find('td').length; j++){
                                if($(gridElement + ' > tr:eq(' + i + ') > td:eq(' + j + ')').find('textarea').length > 0 && $(gridElement + ' > tr:eq(' + i + ') > td:eq(' + j + ') > textarea').val().trim() === ''){
                                    return true
                                }
                            }
                        }
                    },
                    setRequiredError: function() {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                    }
                };
                <?php }?>
            <?php echo '</script'; ?>
>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'textarea' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
            <textarea id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" style="width: 97%; padding: 8px; font-size: 1.3em; font-family: monospace" rows="10"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>
</textarea>
            <div id="textarea_format_button_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" style="text-align: right; font-size: 12px"><span class="link">formatting options</span></div>
            <?php echo '<script'; ?>
>
            $(function() {
                var indicator = $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
');
                if(XSSHelpers.containsTags(indicator.val(), ['<b>','<i>','<u>','<ol>','<li>','<br>','<p>','<td>'])) {
                    useAdvancedEditor();
                }
                else {
                	indicator.val(indicator.val().replace(/\<br\s?\/<?php echo '?>';?>/g, "\n"));
                }
                function useAdvancedEditor() {
                    indicator.val(XSSHelpers.stripTags(indicator.val(), ['<?php echo '<script'; ?>
>']));
                    indicator.trumbowyg({
                        btns: ['bold', 'italic', 'underline', '|', 'unorderedList', 'orderedList', '|', 'justifyLeft', 'justifyCenter', 'justifyRight', 'fullscreen']
                    });
                    $('#textarea_format_button_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').css('display', 'none');
                }
                $('#textarea_format_button_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').on('click', function() {
                    useAdvancedEditor();
                });
            });
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
            formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                setRequired: function() {
                    return ($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val().trim() == '');
                },
                setRequiredError: function() {
                    $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                }
            };
            <?php }?>
            <?php echo '</script'; ?>
>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'radio' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
                <span>
                <?php echo smarty_function_counter(array('assign'=>'ctr','print'=>false),$_smarty_tpl);?>

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['options'], 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?>
                <?php if (is_array($_smarty_tpl->tpl_vars['option']->value)) {?>
                    <?php $_smarty_tpl->_assignInScope('option', $_smarty_tpl->tpl_vars['option']->value[0]);?>
                    <?php if (htmlspecialchars($_smarty_tpl->tpl_vars['option']->value, ENT_QUOTES, 'UTF-8', true) == $_smarty_tpl->tpl_vars['indicator']->value['value']) {?>
                        <input type="radio" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
" class="icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
" checked="checked" />
                        <label class="checkable" for="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
</label><br />
                    <?php } else { ?>
                        <input type="radio" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
" class="icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
" />
                        <label class="checkable" for="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
</label><br />
                    <?php }?>
                <?php } elseif (htmlspecialchars($_smarty_tpl->tpl_vars['option']->value, ENT_QUOTES, 'UTF-8', true) == $_smarty_tpl->tpl_vars['indicator']->value['value']) {?>
                    <input type="radio" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
" class="icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
" checked="checked" />
                    <label class="checkable" for="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
</label><br />
                <?php } else { ?>
                    <input type="radio" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
" class="icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
" />
                    <label class="checkable" for="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_radio<?php echo $_smarty_tpl->tpl_vars['ctr']->value;?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
</label><br />
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
                    $('.icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').icheck({checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue'});
                });
                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
                formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                    setRequired: function() {
                        return ($('.icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').is(':checked') == false);
                    },
                    setRequiredError: function() {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                    }
                };
                <?php }?>
                <?php echo '</script'; ?>
>
                <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'dropdown' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
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
                    <?php if (htmlspecialchars($_smarty_tpl->tpl_vars['option']->value, ENT_QUOTES, 'UTF-8', true) == $_smarty_tpl->tpl_vars['indicator']->value['value']) {?>
                        <option value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
" selected="selected"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
</option>
                    <?php } else { ?>
                        <option value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
</option>
                    <?php }?>
                <?php } elseif (htmlspecialchars($_smarty_tpl->tpl_vars['option']->value, ENT_QUOTES, 'UTF-8', true) == $_smarty_tpl->tpl_vars['indicator']->value['value']) {?>
                    <option value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
" selected="selected"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
</option>
                    <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>

                <?php } else { ?>
                    <option value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
</option>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select></span>
                <?php echo '<script'; ?>
>
                $(function() {
                	$('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').chosen({disable_search_threshold: 5, allow_single_deselect: true, width: '80%'});
                });
                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
                formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                    setRequired: function() {
                        return ($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val() == '');
                    },
                    setRequiredError: function() {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                    }
                };
                <?php }?>
                <?php echo '</script'; ?>
>
                <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'text' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
            <span class="text">
                <input type="text" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>
" trim="true" style="width: 50%; font-size: 1.3em; font-family: monospace" />
            </span>
            <?php echo '<script'; ?>
>
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
            formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                setRequired: function() {
                    return ($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val() == '');
                },
                setRequiredError: function() {
                	$('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                }
            };
            <?php }?>
            <?php echo '</script'; ?>
>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'number' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
            <span class="text">
                <input type="text" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['value']);?>
" style="font-size: 1.3em; font-family: monospace" />
                <span id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_error" style="color: red; display: none">Data must be numeric</span>
            </span>
            <?php echo '<script'; ?>
 type="text/javascript">
            formValidator.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
            	setValidator: function() {
                    return ($.isNumeric($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val()) || $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val() == '');
            	},
            	setValidatorError: function() {
                    $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').css('border', '2px solid red');
                    if($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_error').css('display') != 'none') {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_error').effect('pulsate');
                    }
                    else {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_error').show('fade');
                    }
            	},
            	setValidatorOk: function() {
                    $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').css('border', '1px solid gray');
                    $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_error').hide('fade');
            	}
            };
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
            formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                setRequired: function() {
                    return ($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val() == '');
                },
                setRequiredError: function() {
                	$('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                }
            };
            <?php }?>
            <?php echo '</script'; ?>
>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'numberspinner' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
            <span class="text">
                <br /><input type="text" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>
" />
            </span>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'date' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
            <span class="text">
                <input type="text" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" style="background: url(../libs/dynicons/?img=office-calendar.svg&w=16); background-repeat: no-repeat; background-position: 4px center; padding-left: 24px; font-size: 1.3em; font-family: monospace" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>
" />
            </span>
            <?php echo '<script'; ?>
>
            $(function() {
            	$('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').datepicker();
                $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').datepicker('option', 'showAnim', 'slideDown');
            });
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
            formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                setRequired: function() {
                    return ($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val() == '');
                },
                setRequiredError: function() {
                    $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                }
            };
            <?php }?>
            <?php echo '</script'; ?>
>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'time' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
            <span class="text">
                <br /><input type="text" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>
" />
            </span>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'currency' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
            <span class="text">
                <br />$<input type="text" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>
" style="font-size: 1.3em; font-family: monospace" /> (Amount in USD)
                <span id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_error" style="color: red; display: none">Data must be numeric</span>
            </span>
            <?php echo '<script'; ?>
 type="text/javascript">
            formValidator.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                    setValidator: function() {
                    	return ($.isNumeric($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val()) || $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val() == '');                 
                    },
                    setValidatorError: function() {
                    	$('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').css('border', '2px solid red');
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_error').css('display', 'inline');
                    }
                };
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
            formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                setRequired: function() {
                    return ($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val() == '');
                },
                setRequiredError: function() {
                	$('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                }
            };
            <?php }?>
            <?php echo '</script'; ?>
>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'checkbox' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
                <span id="parentID_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['parentID']);?>
">
                    <input type="hidden" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="no" /> <!-- dumb workaround -->
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['options'], 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?>
                <?php if (htmlspecialchars($_smarty_tpl->tpl_vars['option']->value, ENT_QUOTES, 'UTF-8', true) == $_smarty_tpl->tpl_vars['indicator']->value['value']) {?>
                    <input type="checkbox" class="icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
" checked="checked" />
                    <label class="checkable" for="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
</label><br />
                <?php } else { ?>
                    <input type="checkbox" class="icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['option']->value);?>
" />
                    <label class="checkable" for="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
</label><br />
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </span>
                <?php echo '<script'; ?>
>
                $(function() {
                	$('.icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').icheck({checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue'});
                });
                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
                formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                    setRequired: function() {
                        return ($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
').prop('checked') == false);
                    },
                    setRequiredError: function() {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                    }
                };
                <?php }?>
                <?php echo '</script'; ?>
>
                <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'checkboxes' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
                <span id="parentID_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['parentID']);?>
_indicatorID_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
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
                    <?php if ($_smarty_tpl->tpl_vars['option']->value == $_smarty_tpl->tpl_vars['indicator']->value['value'][$_smarty_tpl->tpl_vars['idx']->value]) {?>
                        <br /><input type="checkbox" class="icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
[<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
]" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
" checked="checked" />
                        <label class="checkable" for="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
</label>
                    <?php } else { ?>
                        <br /><input type="checkbox" class="icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
[<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
]" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
" />
                        <label class="checkable" for="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
</label>
                    <?php }?>
                    <?php $_smarty_tpl->_assignInScope('idx', $_smarty_tpl->tpl_vars['idx']->value+1);?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </span>
                <?php echo '<script'; ?>
>
                $(function() {
                	$('.icheck<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').icheck({checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue'});
                });
                <?php echo '</script'; ?>
>
                <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'fileupload' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
            <fieldset>
                <legend>File Attachment(s)</legend>
                <span class="text">
                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'][0] != '') {?>
                <?php $_smarty_tpl->_assignInScope('counter', 0);?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['value'], 'file');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
?>
                <div id="file_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
" style="background-color: #b7c5ff; padding: 4px"><img src="../libs/dynicons/?img=mail-attachment.svg&amp;w=16" /> <a href="file.php?form=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
&amp;id=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
&amp;series=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
&amp;file=<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
" target="_blank"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['file']->value);?>
</a>
                    <span style="float: right; padding: 4px">
                    [ <span class="link" onclick="deleteFile_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
();">Delete</span> ]
                    </span>
                </div>
                <?php echo '<script'; ?>
>
                    function deleteFile_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
() {
                    	dialog_confirm.setTitle('Delete File?');
                    	dialog_confirm.setContent('Are you sure you want to delete:<br /><br /><b><?php echo $_smarty_tpl->tpl_vars['file']->value;?>
</b>');
                    	dialog_confirm.setSaveHandler(function() {
                    	    $.ajax({
                    	        type: 'POST',
                    	        url: "ajaxIndex.php?a=deleteattachment&recordID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
&indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
&series=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
",
                    	        data: {recordID: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
,
                    	               indicatorID: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
,
                    	               series: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
,
                    	               file: '<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
',
                    	               CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
                    	        success: function(response) {
                    	            $('#file_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
').css('display', 'none');
                    	            dialog_confirm.hide();
                    	        }
                    	    });
                    	});
                    	dialog_confirm.show();
                    }
                <?php echo '</script'; ?>
>
                <?php $_smarty_tpl->_assignInScope('counter', $_smarty_tpl->tpl_vars['counter']->value+1);?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <!-- TODO: whenever we can drop support for old browsers IE9, use modern method -->
                <iframe id="fileIframe_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
" style="visibility: hidden; display: none" src="ajaxIframe.php?a=getuploadprompt&amp;recordID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
&amp;indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
&amp;series=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
" frameborder="0" width="500px"></iframe>
                <br />
                <span id="fileAdditional" class="buttonNorm" onclick="$('#fileIframe_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
').css('display', 'inline'); $('#fileIframe_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
').css('visibility', 'visible'); $('#fileAdditional').css('visibility', 'hidden')"><img src="../libs/dynicons/?img=document-open.svg&amp;w=32" /> Attach Additional File</span>
                <?php } else { ?>
                    <iframe src="ajaxIframe.php?a=getuploadprompt&amp;recordID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
&amp;indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
&amp;series=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
" frameborder="0" width="480px" height="100px"></iframe><br />
                <?php }?>
                </span>
            </fieldset>
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
            <?php echo '<script'; ?>
>
                formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                    setRequired: function() {
                        var oldFiles = $('[id*="file_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
_"]:visible');
                        var iFrameDOM = $('.blockIndicator_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
 iframe').contents();
                        var newFiles = iFrameDOM.find('.newFile_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
');
                        
                        return oldFiles.length === 0 && newFiles.length === 0;
                    },
                    setRequiredError: function() {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                    }
                };
            <?php echo '</script'; ?>
>
            <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'image' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
            <fieldset>
                <legend>Image Attachment(s)</legend>
                <span class="text">
                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'][0] != '') {?>
                <?php $_smarty_tpl->_assignInScope('counter', 0);?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['value'], 'file');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
?>
                <div id="file_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
" style="background-color: #b7c5ff; padding: 4px"><img src="../libs/dynicons/?img=mail-attachment.svg&amp;w=16" /> <a href="file.php?form=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
&amp;id=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
&amp;series=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
&amp;file=<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
" target="_blank"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['file']->value);?>
</a>
                    <span style="float: right; padding: 4px">
                    [ <span class="link" onclick="deleteFile_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
();">Delete</span> ]
                    </span>
                </div>
                <?php echo '<script'; ?>
>
                    function deleteFile_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
() {
                        dialog_confirm.setTitle('Delete File?');
                        dialog_confirm.setContent('Are you sure you want to delete:<br /><br /><b><?php echo $_smarty_tpl->tpl_vars['file']->value;?>
</b>');
                        dialog_confirm.setSaveHandler(function() {
                            $.ajax({
                                type: 'POST',
                                url: "ajaxIndex.php?a=deleteattachment&recordID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
&indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
&series=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
",
                                data: {recordID: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
,
                                       indicatorID: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
,
                                       series: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
,
                                       file: '<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
',
                                       CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
                                success: function(response) {
                                    $('#file_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
').css('display', 'none');
                                    dialog_confirm.hide();
                                }
                            });
                        });
                        dialog_confirm.show();
                    }
                <?php echo '</script'; ?>
>
                <?php $_smarty_tpl->_assignInScope('counter', $_smarty_tpl->tpl_vars['counter']->value+1);?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <!-- TODO: whenever we can drop support for old browsers IE9, use modern method -->
                <iframe id="fileIframe_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
" style="visibility: hidden; display: none" src="ajaxIframe.php?a=getimageuploadprompt&amp;recordID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
&amp;indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
&amp;series=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
" frameborder="0" width="500px"></iframe>
                <br />
                <span id="fileAdditional" class="buttonNorm" onclick="$('#fileIframe_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
').css('display', 'inline'); $('#fileIframe_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
').css('visibility', 'visible'); $('#fileAdditional').css('visibility', 'hidden')"><img src="../libs/dynicons/?img=document-open.svg&amp;w=32" /> Attach Additional File</span>
                <?php } else { ?>
                    <iframe src="ajaxIframe.php?a=getimageuploadprompt&amp;recordID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
&amp;indicatorID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
&amp;series=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
" frameborder="0" width="480px" height="100px"></iframe><br />
                <?php }?>
                </span>
            </fieldset>
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
            <?php echo '<script'; ?>
>
                formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                    setRequired: function() {
                        var oldFiles = $('[id*="file_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
_"]:visible');
                        var iFrameDOM = $('.blockIndicator_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
 iframe').contents();
                        var newFiles = iFrameDOM.find('.newFile_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
');
                        
                        return oldFiles.length === 0 && newFiles.length === 0;
                    },
                    setRequiredError: function() {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                    }
                };
            <?php echo '</script'; ?>
>
            <?php }?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'table' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['options'], 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?>
                <?php if (is_array($_smarty_tpl->tpl_vars['option']->value)) {?>
                    <?php $_smarty_tpl->_assignInScope('option', $_smarty_tpl->tpl_vars['option']->value[0]);?>
                    <?php echo $_smarty_tpl->tpl_vars['option']->value;?>
 <input type="checkbox" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
[]" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
" checked="checked" /><br />
                <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['option']->value;?>
 <input type="checkbox" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
[]" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>
" /><br />
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'orgchart_group' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <div id="grpSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
"></div>
            <input id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['value']);?>
" style="display: none"></input>
            <span id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_error" style="color: red; display: none">Invalid Group</span>
            <?php echo '<script'; ?>
>
            formValidator.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                setValidator: function() {
                    return ($.isNumeric($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val()) || $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val() == '');
                },
                setValidatorError: function() {
                    $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').css('border', '2px solid red');
                    if($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_error').css('display') != 'none') {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_error').effect('pulsate');
                    }
                    else {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_error').show('fade');
                    }
                },
                setValidatorOk: function() {
                    $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').css('border', '1px solid gray');
                    $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_error').hide('fade');
                }
            };
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
            formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                setRequired: function() {
                    return ($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val().trim() == '');
                },
                setRequiredError: function() {
                    $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                }
            };
            <?php }?>
            $(function() {
                if(typeof groupSelector == 'undefined') {
                    $('head').append('<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/css/groupSelector.css" />');
                    $.ajax({
                        type: 'GET',
                        url: "<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/js/groupSelector.js",
                        dataType: 'script',
                        success: function() {
                        	grpSel = new groupSelector('grpSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
');
                        	grpSel.apiPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/';
                        	grpSel.rootPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/';
                        	grpSel.searchTag('<?php echo $_smarty_tpl->tpl_vars['orgchartImportTag']->value;?>
');

                        	grpSel.setSelectHandler(function() {
                                $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val(grpSel.selection);
                            });
                        	grpSel.setResultHandler(function() {
                                $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val(grpSel.selection);
                            });
                        	grpSel.initialize();
                            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'] != '') {?>
                            grpSel.forceSearch('group#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['value']);?>
');
                            <?php }?>
                        }
                    });
                }
                else {
                	grpSel = new groupSelector('grpSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
');
                	grpSel.apiPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/';
                	grpSel.rootPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/';

                	grpSel.setSelectHandler(function() {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val(grpSel.selection);
                    });
                	grpSel.setResultHandler(function() {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val(grpSel.selection);
                    });

                	grpSel.initialize();
                    <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'] != '') {?>
                    grpSel.forceSearch('group#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['value']);?>
');
                    <?php }?>
                }
            });
            <?php echo '</script'; ?>
>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'orgchart_position' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'] != '') {?>
            <div id="indata_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
" style="padding: 0px">
            <?php echo '<script'; ?>
>
            $(function() {
                $.ajax({
                    type: 'GET',
                    url: "<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/?a=position/<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['value']);?>
",
                    dataType: 'json',
                    success: function(data) {
                        $('#indata_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
').html('<b>' + data.title + '</b>'
                            /* Pay Plan, Series, Pay Grade */ + '<br />' + data[2].data + '-' + data[13].data + '-' + data[14].data);

                        if(data[3].data != '') {
                            for(i in data[3].data) {
                                var pdLink = document.createElement('a');
                                pdLink.innerHTML = data[3].data[i];
                                pdLink.setAttribute('href', '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/file.php?categoryID=2&UID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['value']);?>
&indicatorID=3&file=' + encodeURIComponent(data[3].data[i]));
                                pdLink.setAttribute('class', 'printResponse');
                                pdLink.setAttribute('target', '_blank');

                                $('#indata_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
').append('<br />Position Description: ');
                                $('#indata_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
').append(pdLink);
                            }
                        }

                        br = document.createElement('br');
                        $('#indata_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
').append(br);

                        var ocLink = document.createElement('div');
                        ocLink.innerHTML = '<img src="../libs/dynicons/?img=preferences-system-windows.svg&w=32" alt="View Position Details" /> View Details in Org. Chart';
                        ocLink.setAttribute('onclick', "window.open('<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/?a=view_position&positionID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['value']);?>
','Resource_Request','width=870,resizable=yes,scrollbars=yes,menubar=yes');");
                        ocLink.setAttribute('class', 'buttonNorm');
                        ocLink.setAttribute('style', 'margin-top: 8px');
                        $('#indata_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
').append(ocLink);
                    },
                    cache: false
                });
            });
            <?php echo '</script'; ?>
>
            Loading...
            </div>
            <?php } else { ?>
            Search and select:
            <?php }?><br />
            <div id="posSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
"></div>
            <input id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" style="visibility: hidden"></input>
            <?php echo '<script'; ?>
>
            $(function() {
            	var posSel;
                if(typeof positionSelector == 'undefined') {
                    $('head').append('<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/css/positionSelector.css" />');
                    $.ajax({
                        type: 'GET',
                        url: "<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/js/positionSelector.js",
                        dataType: 'script',
                        success: function() {
                            posSel = new positionSelector('posSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
');
                            posSel.apiPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/';
                            posSel.enableEmployeeSearch();

                            posSel.setSelectHandler(function() {
                                $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val(posSel.selection)
                            });
                            posSel.setResultHandler(function() {
                                $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val(posSel.selection)
                            });

                            posSel.initialize();
                            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'] != '') {?>
                            posSel.forceSearch('#<?php echo trim(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['value']));?>
');
                            <?php }?>
                        }
                    });
                }
                else {
                    posSel = new positionSelector('posSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
');
                    posSel.apiPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/';
                    posSel.enableEmployeeSearch();

                    posSel.setSelectHandler(function() {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val(posSel.selection);
                    });
                    posSel.setResultHandler(function() {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val(posSel.selection);
                    });

                    posSel.initialize();
                    <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'] != '') {?>
                    posSel.forceSearch('#<?php echo trim(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['value']));?>
');
                    <?php }?>
                }
            });
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
            formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                setRequired: function() {
                    return ($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val().trim() == '');
                },
                setRequiredError: function() {
                    $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                }
            };
            <?php }?>
            <?php echo '</script'; ?>
>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'orgchart_employee' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['data'] == '')) {?>
            <button id="btn_removeEmployee_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
" class="buttonNorm" style="display: none">Unassign Employee</button>
            <div id="empSel_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
"></div>
            <input id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>
" style="display: none"></input>
            
            <?php echo '<script'; ?>
>
            $(function() {
                if($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val() != '') {
                    $('#btn_removeEmployee_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
').css('display', 'inline');
                    $('#btn_removeEmployee_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
').on('click', function() {
                        $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val('');
                        $('#empSel_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
').css('display', 'none');
                    });
                }
                function importFromNational(empSel) {
                    if(empSel.selection != '') {
                        var selectedUserName = empSel.selectionData[empSel.selection].userName;
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/employee/import/_' + selectedUserName,
                            data: {CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
                            success: function(res) {
                            	$('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val(res);
                            }
                        });
                    }
                }

            	var empSel;
                if(typeof nationalEmployeeSelector == 'undefined') {
                    $('head').append('<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/css/employeeSelector.css" />');
                    $.ajax({
                        type: 'GET',
                        url: "<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/js/nationalEmployeeSelector.js",
                        dataType: 'script',
                        success: function() {
                            empSel = new nationalEmployeeSelector('empSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
');
                            empSel.apiPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/';
                            empSel.rootPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/';

                            empSel.setSelectHandler(function() {
                            	importFromNational(empSel);
                            });
                            empSel.setResultHandler(function() {
                            	importFromNational(empSel);
                            });
                            empSel.initialize();
                            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'] != '') {?>
                            empSel.forceSearch('#<?php echo trim(htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['value']), ENT_QUOTES, 'UTF-8', true));?>
');
                            <?php }?>
                        }
                    });
                }
                else {
                    empSel = new nationalEmployeeSelector('empSel_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
');
                    empSel.apiPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/';
                    empSel.rootPath = '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/';

                    empSel.setSelectHandler(function() {
                    	importFromNational(empSel);
                    });
                    empSel.setResultHandler(function() {
                    	importFromNational(empSel);
                    });

                    empSel.initialize();
                    <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'] != '') {?>
                    empSel.forceSearch('#<?php echo trim(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['value']));?>
');
                    <?php }?>
                }
            });
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1) {?>
            formRequired.id<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
 = {
                setRequired: function() {
                    return ($('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
').val().trim() == '');
                },
                setRequiredError: function() {
                    $('#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_required').css({"background-color": "red", "color": "white", "padding": "4px", "font-weight": "bold"});
                }
            };
            <?php }?>
            <?php echo '</script'; ?>
>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'raw_data' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
            <input type="text" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" name="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>
" style="display: none" />
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['html'];?>

        <?php }?>
        <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['subindicatorsTemplate']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form'=>$_smarty_tpl->tpl_vars['indicator']->value['child'],'depth'=>$_smarty_tpl->tpl_vars['depth']->value+4,'recordID'=>$_smarty_tpl->tpl_vars['recordID']->value), 0, true);
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
