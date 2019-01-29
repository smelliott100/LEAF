<?php
/* Smarty version 3.1.33, created on 2019-01-08 21:41:10
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\templates\browse_search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c3518f6770da3_23936357',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '075cd0fb947c5ae4c222fef74585e5d18db367ff' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\templates\\browse_search.tpl',
      1 => 1498077428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:site_elements/genericJS_toolbarAlignment.tpl' => 1,
  ),
),false)) {
function content_5c3518f6770da3_23936357 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="toolbar" class="toolbar_right toolbar noprint">
    <div id="tools"><h1>Options</h1>
        <div onclick="window.location='?a=browse_group';"><img src="../libs/dynicons/?img=preferences-desktop-theme.svg&amp;w=32" style="vertical-align: middle" alt="Search Groups" title="Search Groups" /> View Groups</div>
        <div onclick="window.location='?a=browse_position';"><img src="../libs/dynicons/?img=system-users.svg&amp;w=32" style="vertical-align: middle" alt="Search Position" title="Search Position" /> View Positions</div>
        <div onclick="window.location='?a=browse_employee';"><img src="../libs/dynicons/?img=contact-new.svg&amp;w=32" style="vertical-align: middle" alt="Search Employees" title="Search Employees" /> View Employees</div>
    </div>
</div>

<div id="maincontent">
<div id="searchContainer">
    <div style="padding: 8px; color: white; font-weight: bold; font-size: 140%; background-color: #5A79A5">
        Search: <input id="search" style="width: 80%; font-size: 140%; padding: 2px; border: 1px solid black" type="text" />
    </div>
    <br />
    <div style="margin-bottom: 8px" id="employee">
        <div id="employeeHeader">
            <span id="employeeName">Employees</span>
        </div>
        <div id="employeeBody">
                <div id="employeeSelector"></div>
        </div>
    </div>
    <div style="margin-bottom: 8px" id="position">
        <div id="positionHeader">
            <span id="positionTitle">Positions</span>
        </div>
        <div id="positionBody" style="width: 99%">
                <div id="positionSelector"></div>
        </div>
    </div>
    <div id="group">
        <div id="groupHeader">
            <span id="groupTitle">Groups</span>
        </div>
        <div id="groupBody" style="width: 99%">
                <div id="groupSelector"></div>
        </div>
    </div>
    <br /><br /><br />
</div>
</div>

<div id="orgchartForm"></div>

<?php echo '<script'; ?>
 type="text/javascript">
/* <![CDATA[ */

function postProcess()
{
	if(empSel.numResults == 0) {
		$('#employee').css('display', 'none');
	}
	else {
		$('#employee').css('display', 'inline');
	}
	if(posSel.numResults == 0) {
        $('#position').css('display', 'none');
    }
    else {
        $('#position').css('display', 'inline');
    }
	if(grpSel.numResults == 0) {
        $('#group').css('display', 'none');
    }
    else {
        $('#group').css('display', 'inline');
    }
}

<?php $_smarty_tpl->_subTemplateRender("file:site_elements/genericJS_toolbarAlignment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

var empSel, posSel, grpSel;
var ppInterval;
$(function() {
	empSel = new employeeSelector('employeeSelector');
	empSel.initialize();
	empSel.hideInput();
    empSel.setSelectHandler(function() {
        window.location = '?a=view_employee&empUID=' + empSel.selection;
    });

	posSel = new positionSelector('positionSelector');
	posSel.initialize();
	posSel.hideInput();
    posSel.setSelectHandler(function() {
         window.location = '?a=view_position&positionID=' + posSel.selection;
    });

	grpSel = new groupSelector('groupSelector');
	grpSel.initialize();
	grpSel.hideInput();
	grpSel.setSelectHandler(function() {
        window.location = '?a=view_group&groupID=' + grpSel.selection;
    });

    $('#search').focus();
    $('#search').on('keyup', function() {
        empSel.forceSearch($('#search').val());
        posSel.forceSearch($('#search').val());
        grpSel.forceSearch($('#search').val());
    });

    ppInterval = setInterval(function(){postProcess();}, 300);

    orgchartForm = new orgchartForm('orgchartForm');
    orgchartForm.initialize();
});

/* ]]> */
<?php echo '</script'; ?>
><?php }
}
