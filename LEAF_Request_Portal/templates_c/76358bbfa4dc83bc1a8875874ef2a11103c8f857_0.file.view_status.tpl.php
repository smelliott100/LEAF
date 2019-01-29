<?php
/* Smarty version 3.1.33, created on 2018-12-19 17:00:30
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\view_status.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1abf7ecdee27_32249968',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76358bbfa4dc83bc1a8875874ef2a11103c8f857' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\view_status.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1abf7ecdee27_32249968 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),1=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div><a href="?a=status&amp;recordID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
"><img src="../libs/dynicons/?img=printer.svg&amp;w=16" alt="Print status" /></a></div>
<div> <!-- main content -->
<span style="font-weight: bold; font-size: 16px">History of Request ID#: <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['recordID']->value);?>
</span>
<br />
Service: <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['service']->value);?>
<br />
Title of request: <a href="?a=printview&amp;recordID=<?php echo htmlspecialchars(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['title']->value);?>
</a><br /><br />

<div style="float: left; padding: 2px">
<table class="agenda" id="maintable">
<thead>
<tr>
    <th>Timestamp</th>
    <th>Action Taken</th>
</tr>
</thead>
<tr>
    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%B %e, %Y. %l:%M %p");?>
</td>
    <td>New Request Opened by <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['name']->value);?>
</td>
</tr>


<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['agenda']->value, 'indicator');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['indicator']->value) {
?><tr><td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['indicator']->value['time'],"%B %e, %Y. %l:%M %p");?>
</td><td><span><b><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['description']);?>
</b> by <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['userName']);
if ($_smarty_tpl->tpl_vars['indicator']->value['comment'] != '') {?><br />Comment: <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['indicator']->value['comment']);?>
</span><?php }?></td></tr><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
</div>

<div style="float: left; padding: 2px">
Required Actions:<br />
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dependencies']->value, 'dependency');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dependency']->value) {
if ($_smarty_tpl->tpl_vars['dependency']->value['filled'] == 1) {?><span style="padding: 4px; margin: 4px; color: green; font-weight: bold"><img class="print" src="../libs/dynicons/?img=dialog-apply.svg&w=16" alt="checked" /> <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['dependency']->value['description']);?>
</span><br /><?php } elseif ($_smarty_tpl->tpl_vars['dependency']->value['filled'] == 0) {?><span style="padding: 4px; margin: 4px; color: gray">[ ? ] <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['dependency']->value['description']);?>
 (Pending)</span><br /><?php } else { ?><span style="padding: 4px; margin: 4px; color: red"><img class="print" src="../libs/dynicons/?img=process-stop.svg&w=16" alt="not checked" /> <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['dependency']->value['description']);?>
</span><br /><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

</div> <!-- close main content -->
<?php }
}
