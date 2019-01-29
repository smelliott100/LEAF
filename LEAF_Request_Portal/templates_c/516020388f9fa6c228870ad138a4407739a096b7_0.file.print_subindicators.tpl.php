<?php
/* Smarty version 3.1.33, created on 2018-12-19 17:00:27
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\print_subindicators.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1abf7b404020_56773469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '516020388f9fa6c228870ad138a4407739a096b7' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\print_subindicators.tpl',
      1 => 1544647154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:print_subindicators_ajax.tpl' => 1,
  ),
),false)) {
function content_5c1abf7b404020_56773469 (Smarty_Internal_Template $_smarty_tpl) {
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
if ($_smarty_tpl->tpl_vars['depth']->value == 0) {?><div class="printmainblock"><div class="printmainlabel"><div class="printcounter" style="cursor: pointer" onclick="toggleZoom('data_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
')"><span><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</span></div><?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1 && $_smarty_tpl->tpl_vars['indicator']->value['isEmpty'] == true) {?><div id="PHindicator_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
" class="printheading_missing"><?php } else { ?><div id="PHindicator_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
" class="printheading"><?php }?><div style="float: right"><?php if ($_smarty_tpl->tpl_vars['date']->value < $_smarty_tpl->tpl_vars['indicator']->value['timestamp'] && $_smarty_tpl->tpl_vars['date']->value > 0) {?><img src="../libs/dynicons/?img=appointment.svg&amp;w=16" alt="View History" title="View History" style="cursor: pointer" onclick="getIndicatorLog(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
)" tabindex="0" role="button" onkeypress="if (event.keyCode==13){ getIndicatorLog(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
); }"/>&nbsp;<?php }
if ($_smarty_tpl->tpl_vars['indicator']->value['isWritable'] == 0) {?><img src="../libs/dynicons/?img=emblem-readonly.svg&amp;w=16" alt="Read-only" title="Read-only" tabindex="0" role="button" /><?php } else { ?><img src="../libs/dynicons/?img=accessories-text-editor.svg&amp;w=16" alt="Edit <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['name']);?>
 field" title="Edit <?php echo preg_replace('!<[^>]*?>!', ' ', smarty_modifier_sanitizeRichtext($_smarty_tpl->tpl_vars['indicator']->value['name']));?>
 field" style="cursor: pointer" onclick="getForm(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
)" tabindex="0" role="button" onkeypress="if (event.keyCode==13){ getForm(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
); }" /><?php }?></div><?php if ($_smarty_tpl->tpl_vars['indicator']->value['isWritable'] == 0) {?><span class="printsubheading" title="indicatorID: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
"><?php echo preg_replace('!<[^>]*?>!', ' ', smarty_modifier_sanitizeRichtext($_smarty_tpl->tpl_vars['indicator']->value['name']));?>
</span><?php } else { ?><span class="printsubheading" style="cursor: pointer" title="indicatorID: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
" onclick="getForm(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
)"><?php echo preg_replace('!<[^>]*?>!', ' ', smarty_modifier_sanitizeRichtext($_smarty_tpl->tpl_vars['indicator']->value['name']));?>
</span><?php }
} else { ?><div class="printsubblock" id="subIndicator_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
"><div class="printsublabel"><?php if ($_smarty_tpl->tpl_vars['indicator']->value['required'] == 1 && $_smarty_tpl->tpl_vars['indicator']->value['isEmpty'] == true) {?><div class="printsubheading_missing"><?php } else { ?><div class="printsubheading"<?php if ($_smarty_tpl->tpl_vars['indicator']->value['name'] == '') {?> style="display: none"<?php }?>><?php }
if ($_smarty_tpl->tpl_vars['indicator']->value['format'] == null) {?><span class="printsubheading" title="indicatorID: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
"><?php echo preg_replace('!^!m',str_repeat('',$_smarty_tpl->tpl_vars['depth']->value),preg_replace('!<[^>]*?>!', ' ', smarty_modifier_sanitizeRichtext($_smarty_tpl->tpl_vars['indicator']->value['name'])));?>
</span><?php } else { ?><span class="printsubheading" title="indicatorID: <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
"><?php echo preg_replace('!^!m',str_repeat('',$_smarty_tpl->tpl_vars['depth']->value),preg_replace('!<[^>]*?>!', ' ', smarty_modifier_sanitizeRichtext($_smarty_tpl->tpl_vars['indicator']->value['name'])));?>
</span><?php }
if ($_smarty_tpl->tpl_vars['date']->value < $_smarty_tpl->tpl_vars['indicator']->value['timestamp'] && $_smarty_tpl->tpl_vars['date']->value > 0) {?>&nbsp;<img src="../libs/dynicons/?img=appointment.svg&amp;w=16" alt="View History" title="View History" style="cursor: pointer" onclick="getIndicatorLog(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
)" tabindex="0" role="button" onkeypress="if (event.keyCode==13){ getIndicatorLog(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
, <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
); }"/><?php }
}?></div><div class="printResponse<?php if ($_smarty_tpl->tpl_vars['indicator']->value['is_sensitive'] == 1) {?> sensitiveIndicator<?php }?>" id="xhrIndicator_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['indicatorID']);?>
_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['indicator']->value['series']);?>
"><?php $_smarty_tpl->_subTemplateRender("file:print_subindicators_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?></div><!-- end print reponse --></div><!-- end print sublabel --></div><!-- end print block --><?php if ($_smarty_tpl->tpl_vars['depth']->value == 0) {?><br style="clear: both" /><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></div><br /><?php }
}
}
