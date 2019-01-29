<?php
/* Smarty version 3.1.33, created on 2019-01-08 18:24:58
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\admin\templates\print_subindicators.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34eafa9ce041_17626570',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d8e7efa24b2c202d11e48a62eb3736fb10ccb4f' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\admin\\templates\\print_subindicators.tpl',
      1 => 1544565948,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:print_subindicators_ajax.tpl' => 1,
  ),
),false)) {
function content_5c34eafa9ce041_17626570 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\function.counter.php','function'=>'smarty_function_counter',),1=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.sanitizeRichtext.php','function'=>'smarty_modifier_sanitizeRichtext',),));
if (!isset($_smarty_tpl->tpl_vars['depth']->value)) {
$_smarty_tpl->_assignInScope('depth', 0);
}
if ($_smarty_tpl->tpl_vars['depth']->value == 0) {
$_smarty_tpl->_assignInScope('color', '#e0e0e0');
} else {
$_smarty_tpl->_assignInScope('color', 'white');
}
if ($_smarty_tpl->tpl_vars['form']->value) {?><div class="printformblock"><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['form']->value, 'indicator');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['indicator']->value) {
if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == null || $_smarty_tpl->tpl_vars['indicator']->value['format'] == 'textarea') {
$_smarty_tpl->_assignInScope('colspan', 2);
} else {
$_smarty_tpl->_assignInScope('colspan', 1);
}
if ($_smarty_tpl->tpl_vars['depth']->value == 0) {?><div class="printmainblock"><div class="printmainlabel"><div class="printcounter" style="cursor: pointer"><span tabindex="0" aria-label="<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
"><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</span></div><?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1 && $_smarty_tpl->tpl_vars['indicator']->value['isEmpty'] == true) {?><div id="PHindicator_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
" class="printheading_missing"><?php } else { ?><div id="PHindicator_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
" class="printheading"><?php }?><div style="float: right"><span onkeydown="onKeyPressClick(event)" class="buttonNorm" tabindex="0" onclick="newQuestion(<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
);"><img src="../../libs/dynicons/?img=list-add.svg&amp;w=16" alt="Add Sub-question" title="Add Sub-question"/> Add Sub-question</span></div><span class="printsubheading" style="cursor: pointer" title="indicatorID: <?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
" ><?php if ($_smarty_tpl->tpl_vars['indicator']->value['is_sensitive'] == 1) {?>&nbsp;<img src="../../libs/dynicons/?img=eye_invisible.svg&amp;w=16" alt="This field is sensitive" title="This field is sensitive" />&nbsp;<?php }?><span onkeypress="keyPressGetForm(event, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
)" tabindex="0" onclick="getForm(<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
)"><?php if (trim($_smarty_tpl->tpl_vars['indicator']->value['name']) != '') {
echo preg_replace('!<[^>]*?>!', ' ', smarty_modifier_sanitizeRichtext($_smarty_tpl->tpl_vars['indicator']->value['name']));
} else { ?>[ blank ]<?php }?></span>&nbsp;<img src="../../libs/dynicons/?img=accessories-text-editor.svg&amp;w=16" tabindex="0" onkeypress="keyPressGetForm(event, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
)" onclick="getForm(<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
)" alt="Edit this field" title="Edit this field" style="cursor: pointer" />&nbsp;&nbsp;<img src="../../libs/dynicons/?img=emblem-readonly.svg&amp;w=16" tabindex="0" onkeypress="keyPressEditIndicatorPrivileges(event, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
)" onclick="editIndicatorPrivileges(<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
);" alt="Edit indicator privileges" title="Edit indicator privileges" style="cursor: pointer" />&nbsp;</span><?php } else { ?><div class="printsubblock" id="subIndicator_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
"><div class="printsublabel"><?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1 && $_smarty_tpl->tpl_vars['indicator']->value['isEmpty'] == true) {?><div class="printsubheading_missing"><?php } else { ?><div class="printsubheading"><?php }?><span class="printsubheading" style="cursor: pointer" title="indicatorID: <?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
"><?php if ($_smarty_tpl->tpl_vars['indicator']->value['is_sensitive'] == 1) {?>&nbsp;<img src="../../libs/dynicons/?img=eye_invisible.svg&amp;w=16" alt="This field is sensitive" title="This field is sensitive" />&nbsp;<?php }?><span onkeypress="keyPressGetForm(event, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
)" tabindex="0" onclick="getForm(<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
)"><?php if (trim($_smarty_tpl->tpl_vars['indicator']->value['name']) != '') {
echo preg_replace('!^!m',str_repeat('',$_smarty_tpl->tpl_vars['depth']->value),preg_replace('!<[^>]*?>!', ' ', smarty_modifier_sanitizeRichtext($_smarty_tpl->tpl_vars['indicator']->value['name'])));
} else { ?>[ blank ]<?php }?></span>&nbsp;<img src="../../libs/dynicons/?img=accessories-text-editor.svg&amp;w=16" tabindex="0" onkeypress="keyPressGetForm(event, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
)" onclick="getForm(<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
)" alt="Edit this field" title="Edit this field" style="cursor: pointer" />&nbsp;&nbsp;<img src="../../libs/dynicons/?img=emblem-readonly.svg&amp;w=16" tabindex="0" onkeypress="keyPressEditIndicatorPrivileges(event, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
)" onclick="editIndicatorPrivileges(<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
);" alt="Edit indicator privileges" title="Edit indicator privileges" style="cursor: pointer" />&nbsp;<br /><br /><span tabindex="0" class="buttonNorm" onkeypress="onKeyPressClick(event)" onclick="newQuestion(<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
);"><img src="../../libs/dynicons/?img=list-add.svg&amp;w=16" alt="Add Sub-question" title="Add Sub-question"/> Add Sub-question</span></span><?php }?></div><div tabindex="0" class="printResponse" id="xhrIndicator_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
"><?php if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == 'grid') {
echo $_smarty_tpl->tpl_vars['indicator']->value['format'];
echo '<script'; ?>
 type="text/javascript" src="../js/gridInput.js"><?php echo '</script'; ?>
></br></br><div id="grid<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
_<?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
" style="width: 100%; max-width: 100%;"></div><?php echo '<script'; ?>
>printTablePreview(<?php echo $_smarty_tpl->tpl_vars['indicator']->value['options'][0];?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
, <?php echo $_smarty_tpl->tpl_vars['indicator']->value['series'];?>
);<?php echo '</script'; ?>
><?php } else {
echo $_smarty_tpl->tpl_vars['indicator']->value['format'];
if ($_smarty_tpl->tpl_vars['indicator']->value['options'] != '') {?><ul><?php $_smarty_tpl->_assignInScope('numOptions', 0);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['indicator']->value['options'], 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?><li><?php echo $_smarty_tpl->tpl_vars['option']->value;?>
</li><?php if ($_smarty_tpl->tpl_vars['numOptions']->value > 5) {?><li>...</li><?php break 1;
}
$_smarty_tpl->_assignInScope('numOptions', $_smarty_tpl->tpl_vars['numOptions']->value+1);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></ul><?php }
}
$_smarty_tpl->_subTemplateRender("file:print_subindicators_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div><!-- end print reponse --></div><!-- end print sublabel --></div><!-- end print block --><?php if ($_smarty_tpl->tpl_vars['depth']->value == 0) {?><br style="clear: both" /><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><br /><?php }
echo '<script'; ?>
>
function keyPressGetForm(evt, indicatorID, series) {
    if(evt.keyCode == 13) {
        getForm(indicatorID, series);
    }
}

function onKeyPressClick(e){
    if((e.keyCode ? e.keyCode : e.which) === 13){
        $(e.target).trigger('click');
    }
}

function keyPressEditIndicatorPrivileges(evt, indicatorID) {
    if(evt.keyCode == 13) {
        editIndicatorPrivileges(<?php echo $_smarty_tpl->tpl_vars['indicator']->value['indicatorID'];?>
);
    }
}
<?php echo '</script'; ?>
>
<?php }
}
