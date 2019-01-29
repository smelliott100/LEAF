<?php
/* Smarty version 3.1.33, created on 2019-01-08 21:41:11
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\templates\browse_employee.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c3518f7b17755_40070063',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '468c1856a3c08d4907ae5299865e5bce4e400aee' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\templates\\browse_employee.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:site_elements/generic_xhrDialog.tpl' => 1,
    'file:site_elements/genericJS_toolbarAlignment.tpl' => 1,
  ),
),false)) {
function content_5c3518f7b17755_40070063 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="toolbar" class="toolbar_right toolbar noprint">
    <div id="tools" style="visibility: hidden"><h1>Tools</h1>
        <div onclick="alert('Not implemented yet');"><img src="../libs/dynicons/?img=emblem-train.svg&amp;w=32" style="vertical-align: middle" alt="Add Employee" title="Add Employee" /> Request Travel/Training</div>
        <div onclick="alert('Not implemented yet');"><img src="../libs/dynicons/?img=car.svg&amp;w=32" style="vertical-align: middle" alt="Change Service" title="Change Service" /> Request Govt. Vehicle</div>
        <div onclick="alert('Not implemented yet');"><img src="../libs/dynicons/?img=emblem-parking.svg&amp;w=32" style="vertical-align: middle" alt="Change Service" title="Change Service" /> Request Parking Decal</div>
        <div onclick="alert('Not implemented yet');"><img src="../libs/dynicons/?img=award-ribbon.svg&amp;w=32" style="vertical-align: middle" alt="Change Service" title="Change Service" /> Recommend for Award</div>
    </div>
</div>

<div id="maincontent">
    <div id="employee">
        <div id="employeeHeader">
            <span id="employeeName">Employee Search:</span>
        </div>
        <div id="employeeBody">
                <div id="employeeSelector"></div>
        </div>
    </div>
</div>

<div id="orgchartForm"></div>
<?php $_smarty_tpl->_subTemplateRender("file:site_elements/generic_xhrDialog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
/* <![CDATA[ */

<?php $_smarty_tpl->_subTemplateRender("file:site_elements/genericJS_toolbarAlignment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

var empSel;
var intval;
$(function() {
    empSel = new employeeSelector('employeeSelector');
    empSel.initialize();
    empSel.enableNoLimit();

    empSel.setSelectHandler(function() {
        window.location = '?a=view_employee&empUID=' + empSel.selection;
    });
});

/* ]]> */
<?php echo '</script'; ?>
><?php }
}
