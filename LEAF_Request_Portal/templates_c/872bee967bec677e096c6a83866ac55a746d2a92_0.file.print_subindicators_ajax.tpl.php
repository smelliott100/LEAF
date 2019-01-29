<?php
/* Smarty version 3.1.33, created on 2018-12-19 17:00:27
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\print_subindicators_ajax.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1abf7b48bc19_64785463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '872bee967bec677e096c6a83866ac55a746d2a92' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\print_subindicators_ajax.tpl',
      1 => 1544565948,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:print_subindicators.tpl' => 1,
  ),
),false)) {
function content_5c1abf7b48bc19_64785463 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),1=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),2=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['is_sensitive'] == 1) {?>
            <div class="sensitiveIndicatorMaskToggle">
                <input type="checkbox" id="sensitiveIndicatorMaskCheckbox_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
" onClick="toggleStayVisible_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
(); toggleSensitiveIndicator(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
, this.checked);">
                <label for="sensitiveIndicatorMaskCheckbox_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
" title="Show Sensitive Data" alt="Show Sensitive Data"  tabindex="0" onkeydown="if (event.keyCode==13){ this.click();}"></label>
            </div>
            <span class="sensitiveIndicator-masked" id="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_masked">
                **********
            </span>
            <?php echo '<script'; ?>
>
                var stayVisible_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
 = false;
                $("#<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_masked").on({
                    mouseenter: function () {
                        if (stayVisible_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
 === false) {
                            $("#sensitiveIndicatorMaskCheckbox_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
").prop('checked', true);
                            toggleSensitiveIndicator(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
, $("#sensitiveIndicatorMaskCheckbox_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
").prop('checked'));
                        }
                    }
                });
                $("#data_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
").on({
                    mouseleave: function () {
                        if (stayVisible_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
 === false) {
                            $("#sensitiveIndicatorMaskCheckbox_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
").prop('checked', false);
                            toggleSensitiveIndicator(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
, $("#sensitiveIndicatorMaskCheckbox_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
").prop('checked'));
                        }
                    }
                });

                function toggleStayVisible_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
() {
                    stayVisible_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
 = !stayVisible_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
;
                }

            <?php echo '</script'; ?>
>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'textarea') {?>
            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
                <?php echo smarty_modifier_sanitize(smarty_modifier_replace($_smarty_tpl->tpl_vars['indicator']->value['value'],'  ','&nbsp;&nbsp;'));?>

            </span>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['htmlPrint'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'radio') {?>
                <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
                <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>

                </span>
                <?php echo $_smarty_tpl->tpl_vars['indicator']->value['htmlPrint'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'dropdown') {?>
                <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
                <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>

                </span>
                <?php echo $_smarty_tpl->tpl_vars['indicator']->value['htmlPrint'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'text') {?>
            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
                <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>

            </span>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['htmlPrint'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'number') {?>
            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
                <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>

            </span>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['htmlPrint'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'numberspinner') {?>
            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
                <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>

            </span>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['htmlPrint'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'date') {?>
            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'] != '' && $_smarty_tpl->tpl_vars['indicator']->value['value'] != '[protected data]') {?>
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['indicator']->value['value'],"%A, %B %e, %Y");?>

                <?php }?>
            </span>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['htmlPrint'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'time') {?>
            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'] != '' && $_smarty_tpl->tpl_vars['indicator']->value['value'] != '[protected data]') {?>
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['indicator']->value['value'],"%l:%M %p");?>

                <?php }?>
            </span>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['htmlPrint'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'currency') {?>
            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
                <?php if (is_numeric($_smarty_tpl->tpl_vars['indicator']->value['value'])) {?>
                    $<?php echo number_format($_smarty_tpl->tpl_vars['indicator']->value['value'],2,".",",");?>

                <?php } else { ?>

                <?php }?>
            </span>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['htmlPrint'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'checkbox') {?>
            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
                 <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>

            </span>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['htmlPrint'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'checkboxes') {?>
                <span class="printResponse">
            <?php $_smarty_tpl->_assignInScope('idx', 0);?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['value'], 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?>
                    <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
[<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
]" value="no" /> <!-- dumb workaround -->
                    <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'][$_smarty_tpl->tpl_vars['idx']->value] != 'no') {?>
                        <br /><img class="print" src="../libs/dynicons/?img=dialog-apply.svg&w=16" style="vertical-align: middle" alt="checked" />
                        <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['option']->value);?>

                    <?php }?>
                    <?php $_smarty_tpl->_assignInScope('idx', $_smarty_tpl->tpl_vars['idx']->value+1);?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </span>
                <?php echo $_smarty_tpl->tpl_vars['indicator']->value['htmlPrint'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'fileupload') {?>
            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'][0] != '') {?>
            <?php $_smarty_tpl->_assignInScope('idx', 0);?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['value'], 'file');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
?>
            <a href="file.php?form=<?php echo $_smarty_tpl->tpl_vars['recordID']->value;?>
&amp;id=<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
&amp;series=<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
&amp;file=<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
" target="_blank" class="printResponse"><img src="../libs/dynicons/?img=mail-attachment.svg&amp;w=24" alt="file" /><?php echo $_smarty_tpl->tpl_vars['file']->value;?>
</a><br />
            <?php $_smarty_tpl->_assignInScope('idx', $_smarty_tpl->tpl_vars['idx']->value+1);?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
            No files attached.
            <?php }?>
            <br /><br />
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'image') {?>
            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'][0] != '') {?>
            <?php $_smarty_tpl->_assignInScope('idx', 0);?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['value'], 'file');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
?>
            <img src="image.php?form=<?php echo $_smarty_tpl->tpl_vars['recordID']->value;?>
&amp;id=<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
&amp;series=<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
&amp;file=<?php echo $_smarty_tpl->tpl_vars['idx']->value;?>
" style="max-width: 200px" />
            <?php $_smarty_tpl->_assignInScope('idx', $_smarty_tpl->tpl_vars['idx']->value+1);?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
            No image available.
            <?php }?>
            <br /><br />
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'orgchart_group') {?>
            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
            <?php if ($_smarty_tpl->tpl_vars['indicator']->value['value'] != '') {?>
                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['displayedValue'] != '') {?>
                    <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['displayedValue']);?>

                <?php }?>
            <?php } else { ?>
            Unassigned
            <?php }?>
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'orgchart_position') {?>
            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
            <?php if (trim($_smarty_tpl->tpl_vars['indicator']->value['value']) != '') {?>
            <div style="padding: 0px">
            <?php echo '<script'; ?>
>
            $(function() {
                $.ajax({
                    type: 'GET',
                    url: '<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/api/?a=position/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['indicator']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
',
                    dataType: 'json',
                    success: function(data) {
                        if(data.title != false) {
                            $('#data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
').append('<div style="border: 1px solid black" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
_pos">\
                                    <img src="../libs/dynicons/?img=preferences-system-windows.svg&w=32" alt="View Position Details" style="float: left; padding: 4px" /><b>' + data.title + '</b><br />' + data[2].data + '-' + data[13].data + '-' + data[14].data + '</div>');
                            $('#data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
_pos').on('click', function() {
                                window.open('<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/?a=view_position&positionID=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['indicator']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
','Resource_Request','width=870,resizable=yes,scrollbars=yes,menubar=yes');
                            });
                            $('#data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
_pos').addClass('buttonNorm noprint');
                            $('#data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
_pos').css('margin-top', '8px');
    
                            if(data[3].data != '') {
                                for(i in data[3].data) {
                                    $('#data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
').append('<br />Position Description: <a class="printResponse" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/file.php?categoryID=2&UID=<?php echo $_smarty_tpl->tpl_vars['indicator']->value['value'];?>
&indicatorID=3&file=' + encodeURIComponent(data[3].data[i]) +'">'+ data[3].data[i] +'</a>');
                                }
                            }
                        }
                        else {
                            $('#data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
').html('Position not found.');
                        }
                    }
                });
            });
            <?php echo '</script'; ?>
>
                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['displayedValue'] != '') {?>
                    <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['displayedValue']);?>

                <?php } else { ?>
                Loading...
                <?php }?>
            </div>
            <?php } else { ?>
            Unassigned
            <?php }?>
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'orgchart_employee') {?>
            <span class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
            <?php if (trim($_smarty_tpl->tpl_vars['indicator']->value['value']) != '') {?>
            <div style="padding: 0px">
                <?php if ($_smarty_tpl->tpl_vars['indicator']->value['displayedValue'] != '') {?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
/?a=view_employee&empUID=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['indicator']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['displayedValue']);?>
</a>
                <?php } else { ?>
                Loading...
                <?php }?>
            </div>
            <?php } else { ?>
            Unassigned
            <?php }?>
            </span>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'raw_data') {?>
            <textarea class="printResponse" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
" style="display: none"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['value']);?>
</textarea>
            <?php echo $_smarty_tpl->tpl_vars['indicator']->value['htmlPrint'];?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['is_sensitive'] == 1) {?>
            <div style="clear:both;"></div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'grid' && ($_smarty_tpl->tpl_vars['indicator']->value['isMasked'] == 0 || $_smarty_tpl->tpl_vars['indicator']->value['value'] == '')) {?>
        <?php echo '<script'; ?>
 type="text/javascript" src="js/gridInput.js"><?php echo '</script'; ?>
>
        <div class="printResponse" style="overflow-x: scroll; -ms-overflow-x: scroll;" id="data_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
">
            <table class="table" id="grid_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
_output" style="word-wrap:break-word; text-align: center;">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <?php echo '<script'; ?>
>
            // fix for IE scroll bar
            $('#xhrIndicator_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
').css('max-width', parseInt($('.printmainlabel').css('width')) * .85 + 'px');
            $(function() {
                printTableOutput(<?php echo $_smarty_tpl->tpl_vars['indicator']->value['options'][0];?>
, <?php echo json_encode($_smarty_tpl->tpl_vars['indicator']->value['value']);?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
);
            })
        <?php echo '</script'; ?>
>
        <?php }?>
        <?php $_smarty_tpl->_subTemplateRender("file:print_subindicators.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form'=>$_smarty_tpl->tpl_vars['indicator']->value['child'],'depth'=>$_smarty_tpl->tpl_vars['depth']->value+4,'recordID'=>$_smarty_tpl->tpl_vars['recordID']->value), 0, false);
}
}
