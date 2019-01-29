<?php
/* Smarty version 3.1.33, created on 2019-01-08 17:56:26
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\templates\view_position.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34e44ae55999_24960788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '23bb69e5d2c245b80f3029692e98a003f382332e' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\templates\\view_position.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:site_elements/generic_xhrDialog.tpl' => 1,
    'file:site_elements/generic_confirm_xhrDialog.tpl' => 1,
    'file:site_elements/genericJS_toolbarAlignment.tpl' => 1,
  ),
),false)) {
function content_5c34e44ae55999_24960788 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),));
?>
<div id="toolbar" class="toolbar_right toolbar noprint">
    <div id="tools"><h1>Tools</h1>
        <div onclick="window.location='?a=navigator&amp;rootID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['positionID']->value);?>
';"><img src="../libs/dynicons/?img=preferences-system-windows.svg&amp;w=32" style="vertical-align: middle" alt="Add Employee" title="Add Employee" /> View in Org Chart</div>
        <div onclick="addEmployee()"><img src="../libs/dynicons/?img=list-add.svg&amp;w=32" style="vertical-align: middle" alt="Add Employee" title="Add Employee" /> Add Employee</div>
        <div onclick="editTitle()"><img src="../libs/dynicons/?img=edit-select-all.svg&amp;w=32" style="vertical-align: middle" alt="Edit" title="Edit" /> Edit Title</div>
        <div onclick="changeSupervisor()"><img src="../libs/dynicons/?img=system-users.svg&amp;w=32" style="vertical-align: middle" alt="Change Service" title="Change Service" /> Change Supervisor</div>
        <div onclick="window.location='mailto:?subject=FW:%20Org.%20Chart%20-%20&amp;body=Organizational%20Chart%20URL:%20<?php if ($_SERVER['HTTPS'] == 'on') {?>https<?php } else { ?>http<?php }?>://<?php echo $_SERVER['SERVER_NAME'];
echo rawurlencode($_SERVER['REQUEST_URI']);?>
%0A%0A'"><img src="../libs/dynicons/?img=mail-forward.svg&amp;w=32" style="vertical-align: middle" alt="Forward as Email" title="Forward as Email" /> Forward as Email</div>
        <br />
        <div onclick="confirmRemove()"><img src="../libs/dynicons/?img=process-stop.svg&amp;w=16" style="vertical-align: middle" alt="Delete Position" title="Delete Position" /> Delete Position</div>
    </div>

    <!-- <div style="background-color: white; border: 1px solid black; padding: 2px"><h1>Tags</h1>
        <div class="tags">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value, 'tag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
?>
            <span><?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
 </span>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php if ($_smarty_tpl->tpl_vars['positionPrivileges']->value[$_smarty_tpl->tpl_vars['positionID']->value]['write'] == 1) {?>
            <span>Add Tag</span>
            <?php }?>
        </div>
    </div> -->

    <div class="toolbar_group"><h1>Groups</h1>
        <div>
            <?php if (count($_smarty_tpl->tpl_vars['groups']->value) == 0) {?>
                None
            <?php }?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
?>
                <div> - <a href="?a=view_group&amp;groupID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['group']->value['groupID']);?>
"><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['group']->value['groupTitle']);?>
</a></div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php if ($_smarty_tpl->tpl_vars['positionPrivileges']->value[$_smarty_tpl->tpl_vars['positionID']->value]['write'] == 1) {?>
            <br /><br />
            <div class="buttonNorm" onclick="addGroup()">Assign Group</div>
            <?php }?>
        </div>
    </div>
<br />
    <div class="toolbar_security"><h1>Security Permissions</h1>
        <div>
        <?php if ($_smarty_tpl->tpl_vars['positionPrivileges']->value[$_smarty_tpl->tpl_vars['positionID']->value]['read'] == 1) {?>
            <img src="../libs/dynicons/?img=edit-find.svg&amp;w=32" alt="Read Access" style="vertical-align: middle" /> You have read access
        <?php } else { ?>
            <img src="../libs/dynicons/?img=emblem-readonly.svg&amp;w=32" alt="No Read Access" style="vertical-align: middle" /> You do not have read access
        <?php }?>
        </div>
        <div>
        <?php if ($_smarty_tpl->tpl_vars['positionPrivileges']->value[$_smarty_tpl->tpl_vars['positionID']->value]['write'] == 1) {?>
            <img src="../libs/dynicons/?img=accessories-text-editor.svg&amp;w=32" alt="Write Access" style="vertical-align: middle" /> You have write access
        <?php } else { ?>
            <img src="../libs/dynicons/?img=emblem-readonly.svg&amp;w=32" alt="No Write Access" style="vertical-align: middle" /> You do not have write access
        <?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['positionPrivileges']->value[$_smarty_tpl->tpl_vars['positionID']->value]['grant'] != 0) {?>
        <div class="buttonNorm" onclick="window.open('index.php?a=view_position_permissions&amp;positionID=<?php echo $_smarty_tpl->tpl_vars['positionID']->value;?>
','OrgChart','width=840,resizable=yes,scrollbars=yes,menubar=yes').focus();">
            <img src="../libs/dynicons/?img=emblem-system.svg&amp;w=32" alt="Change Permissions" style="vertical-align: middle" /> Change Permissions
        </div>
        <?php }?>
    </div>
</div>

<div id="maincontent">
    <div id="position">
        <div id="positionHeader">
            <span id="positionTitle"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['positionSummary']->value['title']);?>
</span><br />
            <?php $_smarty_tpl->_assignInScope('counter', 0);?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['positionSummary']->value['services'], 'services');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['services']->value) {
?>
            <span id="serviceName"><?php if ($_smarty_tpl->tpl_vars['counter']->value++ > 0) {?>- <?php }
echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['services']->value['groupTitle']);?>
</span>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>&nbsp;

            <?php $_smarty_tpl->_assignInScope('numSupervisors', 0);?>
            <span id="supervisor" style="float: right">Supervisor:
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['positionSummary']->value['supervisor'], 'supervisor');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['supervisor']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['supervisor']->value['firstName'] != '') {?>
                <a href="?a=view_position&amp;positionID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['supervisor']->value['positionID']);?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['supervisor']->value['firstName']);?>
 <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['supervisor']->value['lastName']);?>

                    <?php if ($_smarty_tpl->tpl_vars['supervisor']->value['isActing'] == 1) {?>(Acting)<?php }?></a>
                <?php } elseif ($_smarty_tpl->tpl_vars['supervisor']->value['positionID'] != '') {?>
                <a href="?a=view_position&amp;positionID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['supervisor']->value['positionID']);?>
">VACANT</a>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </span>
        </div>
        <div id="positionBody">
            <div style="visibility: visible; text-align: center; font-size: 24px; font-weight: bold; padding: 16px; height: 95%; width: 95%">Loading... <img src="images/largespinner.gif" alt="loading..." /></div>
        </div>
        <?php $_smarty_tpl->_assignInScope('counter', 0);?>
        <?php $_smarty_tpl->_assignInScope('numActing', 0);?>
        <?php if ($_smarty_tpl->tpl_vars['positionSummary']->value['employeeList'][0]['empUID'] != '') {?>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['positionSummary']->value['employeeList'], 'employee');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['employee']->value) {
?>
          <?php $_smarty_tpl->_assignInScope('counter', $_smarty_tpl->tpl_vars['counter']->value+1);?>
          <?php if ($_smarty_tpl->tpl_vars['employee']->value['isActing'] != 0) {?>
            <?php $_smarty_tpl->_assignInScope('numActing', $_smarty_tpl->tpl_vars['numActing']->value+1);?>
          <?php }?>
          <div id="employee_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
" class="employee">
              <div id="employeeHeader_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
" class="employeeHeader">
                  <img src="../libs/dynicons/?img=process-stop.svg&amp;w=16" style="float: right; cursor: pointer" onclick="confirmUnlink(<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['employee']->value['empUID']);?>
); return false;" alt="Unlink Employee" title="Unlink Employee" />
                  <span id="employeeName_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
" class="employeeName" style="cursor: pointer" onclick="window.location='?a=view_employee&amp;empUID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['employee']->value['empUID']);?>
'"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['employee']->value['lastName']);?>
, <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['employee']->value['firstName']);
if ($_smarty_tpl->tpl_vars['employee']->value['isActing'] == 1) {?> <span style="font-weight: bold; color: blue">(Acting)</span><?php }?></span>
              </div>
              <div id="employeeBody_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
" class="employeeBody">
                  <div style="visibility: visible; text-align: center; font-size: 24px; font-weight: bold; padding: 16px; height: 95%; width: 95%">Loading... <img src="images/largespinner.gif" alt="loading..." /></div>
              </div>
          </div>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['counter']->value-$_smarty_tpl->tpl_vars['numActing']->value < $_smarty_tpl->tpl_vars['positionSummary']->value['positionData'][19]['data'] && $_smarty_tpl->tpl_vars['positionSummary']->value['positionData'][19]['data'] != '') {?>
            <div class="employee">
                <div class="employeeHeader">
                    <span class="employeeName" style="cursor: pointer" onclick="addEmployee()">VACANT</span><br />
                </div>
                <div class="employeeBody">
                    <div class="button" onclick="startFTE()"><img src="../libs/dynicons/?img=document-new.svg&amp;w=32" style="vertical-align: middle" alt="Add Employee" title="Add Employee" /> Initiate FTE Request to fill Vacancy</div>
                </div>
            </div>
          <?php } elseif ($_smarty_tpl->tpl_vars['positionSummary']->value['positionData'][19]['data'] == '') {?>
            <div class="employee">
                <div class="employeeHeader">
                    <span class="employeeName">No Vacancies?</span><br />
                </div>
                <div class="employeeBody">
                    The &quot;Total Headcount&quot; field will need to be increased to support more vacancies.
                </div>
            </div>
          <?php }?>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:site_elements/generic_xhrDialog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:site_elements/generic_confirm_xhrDialog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div id="start_requestxhrDialog" style="visibility: hidden">
<form id="start_requestrecord" enctype="multipart/form-data" action="javascript:void(0);">
    <div>
        <span id="start_requestbutton_cancelchange" class="buttonNorm" style="position: absolute; left: 10px"><img src="../libs/dynicons/?img=process-stop.svg&amp;w=16" alt="cancel" /> Cancel</span>
        <div style="border-bottom: 2px solid black; line-height: 30px"><br /></div>
        <div id="start_requestloadIndicator" style="visibility: hidden; position: absolute; text-align: center; font-size: 24px; font-weight: bold; background: white; padding: 16px; height: 100px; width: 460px">Loading... <img src="images/largespinner.gif" alt="loading..." /></div>
        <div id="start_requestxhr" style="width: 540px; height: 100px; overflow: auto; font-size: 12px"></div>
        <div id="start_requestbutton_save" class="buttonNorm" style="width: 80%"><img src="../libs/dynicons/?img=go-next.svg&amp;w=32" alt="save" /> Start FTE Request to fill <b><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['positionSummary']->value['employeeList'][0]['positionTitle']);?>
</b></div>
        <br /><br />
    </div>
</form>
</div>


<div id="orgchartForm"></div>

<?php echo '<script'; ?>
 type="text/javascript">
/* <![CDATA[ */

function assocEmployeePosition(empUID) {
    $.ajax({
        type: 'POST',
        url: './api/?a=position/<?php echo $_smarty_tpl->tpl_vars['positionID']->value;?>
/employee',
        data: {empUID: empUID,
            isActing: $('#isActing').prop('checked') ? 1 : 0,
            CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
        success: function(response) {
            window.location.reload();
        },
        cache: false
    });
}

function addEmployee() {
    dialog.setContent('Employee Search: <div id="employeeSelector"></div>\
    		<fieldset><legend>Options</legend>\
            <input id="isActing" type="checkbox"> Acting for vacant position</div>\
            </fieldset>');
    dialog.show(); // need to show early because of ie6

    empSel = new nationalEmployeeSelector('employeeSelector');
    empSel.initialize();
//    empSel.setDomain('<?php echo $_smarty_tpl->tpl_vars['userDomain']->value;?>
');
    empSel.clearSearch();

    dialog.setSaveHandler(function() {
    	if(empSel.selection != '') {
            dialog.indicateBusy();
            var selectedUserName = empSel.selectionData[empSel.selection].userName;
            $.ajax({
            	type: 'POST',
            	url: './api/employee/import/_' + selectedUserName,
            	data: {CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
            	success: function(res) {
            		if(!isNaN(res)) {
            			assocEmployeePosition(res);
            		}
            		else {
            			alert(res);
            		}
            	}
            });
    	}
    	else {
    		alert('An employee has not been selected.');
    	}
    });
}

function startFTE() {
	if('<?php echo $_smarty_tpl->tpl_vars['positionSummary']->value['services'][0]['groupID'];?>
' == '') {
		alert('Error: <?php echo $_smarty_tpl->tpl_vars['positionSummary']->value['employeeList'][0]['positionTitle'];?>
 has not been configured with a service. Please contact your system administrator.');
		return false;
	}

    start_request_dialog.setContent('Description for this request (optional): <input class="dialogInput" id="description" type="text"></input>');
    start_request_dialog.show(); // need to show early because of ie6

    start_request_dialog.setSaveHandler(function() {
    	start_request_dialog.indicateBusy();
    	description = '';
    	if($('#description').val() != '') {
    		description = ' - ' + $('#description').val();
    	}
        $.ajax({
        	type: 'POST',
            url: '<?php echo $_smarty_tpl->tpl_vars['ERM_site_resource_management']->value;?>
api/?a=form/new',
            dataType: 'json',
            data: {service: '<?php echo $_smarty_tpl->tpl_vars['positionSummary']->value['services'][0]['groupID'];?>
',
                      title: '<?php echo $_smarty_tpl->tpl_vars['positionSummary']->value['title'];?>
' + description,
                      priority: 0,
                      numGeneral: 1,
                      numFTE: 1,
                      CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
            success: function(response) {
            	var recordID = parseFloat(response);
            	if(!isNaN(recordID) && isFinite(recordID) && recordID != 0) {
            		$.ajax({
            			type: 'POST',
            			url: '<?php echo $_smarty_tpl->tpl_vars['ERM_site_resource_management']->value;?>
api/?a=form/' + recordID,
            			dataType: 'json',
            			data: {
            				7: <?php echo $_smarty_tpl->tpl_vars['positionID']->value;?>
,
            				series: 1,
            				CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'
            			},
            			success: function() {
                            window.location = '<?php echo $_smarty_tpl->tpl_vars['ERM_site_resource_management']->value;?>
?a=view&recordID=' + recordID;
            			},
            			cache: false
            		});
            	}
            	else {
            		start_request_dialog.hide();
            		alert(response + ' Error Triggering FTE request. Please visit the Resource Management site, and start your FTE request from there.');
            	}
                return response;
            },
            cache: false
        });
    });
}

function editTitle() {
    dialog.setContent('Position Title: <input id="inputtitle" style="width: 300px" class="dialogInput" value="<?php echo $_smarty_tpl->tpl_vars['positionSummary']->value['employeeList'][0]['positionTitle'];?>
"></input>');
    dialog.show(); // need to show early because of ie6

    dialog.setSaveHandler(function() {
        dialog.indicateBusy();
        $.ajax({
        	type: 'POST',
            url: './api/?a=position/<?php echo $_smarty_tpl->tpl_vars['positionID']->value;?>
/title',
            data: {title: $('#inputtitle').val(),
            	CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
            success: function(response) {
                window.location.reload();
            },
            cache: false
        });
    });
}

function addGroup() {
    dialog.setContent('Group Search: <div id="groupSelector"></div><br /><fieldset><legend>Options</legend><input id="includeSub" type="checkbox" disabled="disabled" /> Apply to all subordinates</fieldset>');
    dialog.show(); // need to show early because of ie6

    grpSel = new groupSelector('groupSelector');
    grpSel.initialize();
    //grpSel.searchTag('service');

    dialog.setSaveHandler(function() {
        dialog.indicateBusy();

        $.ajax({
        	type: 'POST',
            url: './api/?a=group/'+ grpSel.selection +'/position',
            data: {positionID: <?php echo $_smarty_tpl->tpl_vars['positionID']->value;?>
,
                CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
            success: function(response) {
                window.location.reload();
            },
            cache: false
        });
    });
}

function changeSupervisor() {
    dialog.setContent('Supervisor\'s Name or Title: <div id="positionSelector"></div>');
    dialog.show(); // need to show early because of ie6

    posSel = new positionSelector('positionSelector');
    posSel.initialize();
    posSel.enableEmployeeSearch();

    dialog.setSaveHandler(function() {
        dialog.indicateBusy();
        $.ajax({
        	type: 'POST',
            url: './api/?a=position/<?php echo $_smarty_tpl->tpl_vars['positionID']->value;?>
/supervisor',
            data: {positionID: posSel.selection,
                      CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
            success: function(response) {
                window.location.reload();
            },
            cache: false
        });
    });
}

function confirmUnlink(empUID) {
	confirm_dialog.setContent('<img src="../libs/dynicons/?img=help-browser.svg&amp;w=48" alt="question icon" style="float: left; padding-right: 16px" /> <span style="font-size: 150%">Are you sure you want to unlink this employee?</span>');
	confirm_dialog.setTitle('Confirmation');
	confirm_dialog.setSaveHandler(function() {
        $.ajax({
        	type: 'DELETE',
            url: './api/?a=position/<?php echo $_smarty_tpl->tpl_vars['positionID']->value;?>
/employee/' + empUID + '&' + $.param({CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'}),
            success: function(response) {
                window.location.reload();
            },
            cache: false
        });
    });
	confirm_dialog.show();
}

function confirmRemove() {
    confirm_dialog.setContent('<img src="../libs/dynicons/?img=help-browser.svg&amp;w=48" alt="question icon" style="float: left; padding-right: 16px" /> <span style="font-size: 150%">Are you sure you want to delete this position?</span>');
    confirm_dialog.setTitle('Confirmation');
    confirm_dialog.setSaveHandler(function() {
        $.ajax({
        	type: 'DELETE',
            url: './api/?a=position/<?php echo $_smarty_tpl->tpl_vars['positionID']->value;?>
' + '&' + $.param({CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'}),
            success: function(response) {
            	if(response == 1) {
                    alert('Position has been deleted.');
                    history.back();
            	}
            	else {
            		alert('Error: ' + response);
            	}
            },
            cache: false
        });
    });
    confirm_dialog.show();
}

<?php $_smarty_tpl->_subTemplateRender("file:site_elements/genericJS_toolbarAlignment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

var dialog;
$(function() {
    //empSel = new employeeSelector('test');
    //empSel.initialize();

    orgchartForm = new orgchartForm('orgchartForm');
    orgchartForm.initialize();
    orgchartForm.addUpdateEvent(19, function(response) {
    	if(($('.employee').size() - 1) < $('#data_19_2_<?php echo $_smarty_tpl->tpl_vars['positionID']->value;?>
').html()) {
    		window.location.reload();
    	}
    });
    // include file="site_elements/orgchartForm_updateOutlook.js.tpl"

    // Load position form and data
    $.ajax({
        url: "ajaxPosition.php?a=getForm&pID=" + <?php echo $_smarty_tpl->tpl_vars['positionID']->value;?>
,
        success: function(response) {
            if(response != '') {
                $('#positionBody').html(response);
            }
            else {
                $('#positionBody').html('');
            }
        },
        cache: false
    });

    // Load employee form and data
    <?php $_smarty_tpl->_assignInScope('counter', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['positionSummary']->value['employeeList'], 'employee');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['employee']->value) {
?>
    <?php $_smarty_tpl->_assignInScope('counter', $_smarty_tpl->tpl_vars['counter']->value+1);?>
        <?php if ($_smarty_tpl->tpl_vars['employee']->value['empUID'] != '') {?>
        $.ajax({
            url: "ajaxEmployee.php?a=getForm&empUID=<?php echo $_smarty_tpl->tpl_vars['employee']->value['empUID'];?>
",
            success: function(response) {
                if(response != '') {
                    $('#employeeBody_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
').html(response);
                    // if it's a long list, use an abridged format
                    if(<?php echo $_smarty_tpl->tpl_vars['numEmployees']->value;?>
 > 2) {
                    	$('.employee .printformblock').css({'display': 'none'});
                    	$('#employeeHeader_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
').append('<div class="tempText" style="float: right; border: 1px solid black; background-color: #FFE3E3; padding: 2px; margin: 4px">'+ $('span[id^="data_5_1_<?php echo $_smarty_tpl->tpl_vars['employee']->value['empUID'];?>
"]').html() +'<br />'+ $('span[id^="data_6_1_<?php echo $_smarty_tpl->tpl_vars['employee']->value['empUID'];?>
"]').html() +'</div><br /><br />');
                    }
                }
                else {
                    $('#employeeBody_<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
').html('');
                }
            },
            cache: false
        });
        <?php }?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    // find FTE requests, if available
    <?php if ($_smarty_tpl->tpl_vars['ERM_site_resource_management']->value != '') {?>
    //$.ajax({

    //});
    <?php }?>

    dialog = new dialogController('xhrDialog', 'xhr', 'loadIndicator', 'button_save', 'button_cancelchange');
   	start_request_dialog = new dialogController('start_requestxhrDialog', 'start_requestxhr', 'start_requestloadIndicator', 'start_requestbutton_save', 'start_requestbutton_cancelchange');
    confirm_dialog = new dialogController('confirm_xhrDialog', 'confirm_xhr', 'confirm_loadIndicator', 'confirm_button_save', 'confirm_button_cancelchange');
});

/* ]]> */
<?php echo '</script'; ?>
>
<?php }
}
