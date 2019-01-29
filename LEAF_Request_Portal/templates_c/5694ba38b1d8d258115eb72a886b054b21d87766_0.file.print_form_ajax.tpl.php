<?php
/* Smarty version 3.1.33, created on 2018-12-19 17:00:27
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\print_form_ajax.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1abf7b372124_10301371',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5694ba38b1d8d258115eb72a886b054b21d87766' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\print_form_ajax.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:print_form_ajax_tags.tpl' => 1,
    'file:print_subindicators.tpl' => 1,
  ),
),false)) {
function content_5c1abf7b372124_10301371 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),1=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!-- form -->
<br />
<div class="printmainform" style="border-bottom: 0px; min-height: 64px">
    <div id="requestTitle"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['title']->value);?>
 <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['subtype']->value);?>

    <?php if ($_smarty_tpl->tpl_vars['submitted']->value == 0 || $_smarty_tpl->tpl_vars['is_admin']->value) {?>
        <img src="../libs/dynicons/?img=accessories-text-editor.svg&amp;w=16" style="cursor: pointer" alt="Edit Title" title="Edit Title" onclick="changeTitle()" tabindex="0" role="button" onkeypress="if (event.keyCode==13){ changeTitle(); }" />
    <?php }?>

    <br /><span style="font-weight: normal; color: #686868; font-style: italic"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['categoryText']->value);?>
</span>
    </div>
    <div id="requestInfo">
        <table>
            <tr>
                <td><?php if ($_smarty_tpl->tpl_vars['service']->value != '') {?>Service<?php } else { ?>&nbsp;<?php }?>
                </td>
                <td><b><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['service']->value);?>
</b>
                    <?php if ($_smarty_tpl->tpl_vars['submitted']->value == 0) {?>
                        <img src="../libs/dynicons/?img=accessories-text-editor.svg&amp;w=16" style="cursor: pointer" alt="Edit Service" title="Edit Service" onclick="changeService()" role="button" tabindex="0" onkeypress="if (event.keyCode==13){ changeService(); }"/>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td>Initiated by</td>
                <td><b><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['name']->value);?>
</b></td>
            </tr>
            <tr<?php if ($_smarty_tpl->tpl_vars['date']->value == 0) {?> style="display: none"<?php }?>>
                <td>Submitted</td>
                <td><b><?php if ($_smarty_tpl->tpl_vars['date']->value > 0) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%A, %B %e, %Y");
} else { ?>Not submitted<?php }?></b></td>
            </tr>
        </table>
    </div>
    <br class="noprint" style="clear: both"/>
</div>
<div class="tags<?php if (count($_smarty_tpl->tpl_vars['tags']->value) == 0) {?> noprint<?php }?>" id="tags" style="border: 1px solid black; padding: 2px; text-align: right" role="status" aria-live="polite">
    <?php $_smarty_tpl->_subTemplateRender("file:print_form_ajax_tags.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('tags'=>$_smarty_tpl->tpl_vars['tags']->value), 0, false);
?>
</div>

<div class="printmainform">
    <?php $_smarty_tpl->_subTemplateRender("file:print_subindicators.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form'=>$_smarty_tpl->tpl_vars['form']->value,'orgchartPath'=>$_smarty_tpl->tpl_vars['orgchartPath']->value), 0, false);
?>
</div>


<br /><br />
<?php }
}
