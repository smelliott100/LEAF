<?php
/* Smarty version 3.1.33, created on 2019-01-08 17:56:40
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\templates\view_about.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34e45867f3f4_54609735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8fa8bfb1136fba74036dcfc881ee5720a9692cd' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\templates\\view_about.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c34e45867f3f4_54609735 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<span style="font-size: 150%; font-style: italic; font-weight: bold" id="version"></span>
<br /><br />
<span style="line-height: 140%">
This software was developed at the Washington D.C.<br />
VA Medical Center in an effort to improve resource<br />
requesting processes.
<br /><br />
<img src="../libs/dynicons/?img=internet-mail.svg&amp;w=16" alt="email icon" /> Developer Contact: <a href="mailto:Michael.Gao@va.gov&amp;subject=ERM:">Michael.Gao@va.gov</a>
</span>
<br /><br />

<table class="agenda">
    <tr>
        <td>Database version</td>
        <td><?php echo $_smarty_tpl->tpl_vars['dbversion']->value;?>
</td>
    </tr>
    <tr>
        <td>Server Timezone</td>
        <td><?php echo date('T - e');?>
</td>
    </tr>
    <tr>
        <td>Server Date</td>
        <td><?php echo smarty_modifier_date_format(time(),"%A, %B %e, %Y");?>
</td>
    </tr>
    <tr>
        <td>Server Time</td>
        <td><?php echo smarty_modifier_date_format(time(),"%l:%M %p");?>
</td>
    </tr>
</table>

<img style="position: absolute; bottom: 0px; right: 0px; width: 57%; z-index: -999" src="images/aboutlogo.png" alt="logo" />
<?php echo '<script'; ?>
 type="text/javascript">
/* <![CDATA[ */

$(function() {
    $('#version').html($('#versionID').html());
});
/* ]]> */
<?php echo '</script'; ?>
><?php }
}
