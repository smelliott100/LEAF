<?php
/* Smarty version 3.1.33, created on 2019-01-08 21:40:41
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Nexus\templates\view_employee.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c3518d95220e8_78335434',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33679afe16ed2e3203245814aa5f6c0c3df3270f' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Nexus\\templates\\view_employee.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:site_elements/generic_xhrDialog.tpl' => 1,
    'file:site_elements/generic_confirm_xhrDialog.tpl' => 1,
    'file:site_elements/genericJS_toolbarAlignment.tpl' => 1,
    'file:site_elements/orgchartForm_updateOutlook.js.tpl' => 1,
  ),
),false)) {
function content_5c3518d95220e8_78335434 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),));
?>
<div id="toolbar" class="toolbar_right toolbar noprint">
    <div id="tools"><h1>Tools</h1>
        <div onclick="assignBackup();"><img src="../libs/dynicons/?img=gnome-system-users.svg&amp;w=32" style="vertical-align: middle" alt="Set Backup" title="Set Backup" /> Assign Backup</div>
        <br />
<?php if ($_smarty_tpl->tpl_vars['summary']->value['employee']['deleted'] == 0) {?>
        <div onclick="disableAccount();"><img src="../libs/dynicons/?img=process-stop.svg&amp;w=32" style="vertical-align: middle" alt="Disable Account" title="Disable Account" /> Disable Account</div>
<?php } else { ?>
        <div onclick="enableAccount();"><img src="../libs/dynicons/?img=edit-redo.svg&amp;w=32" style="vertical-align: middle" alt="Enable Account" title="Enable Account" /> Enable Account</div>
<?php }?>
<!--         <div onclick="alert('Not implemented yet');"><img src="../libs/dynicons/?img=emblem-train.svg&amp;w=32" style="vertical-align: middle" alt="Add Employee" title="Add Employee" /> Request Travel/Training</div>
        <div onclick="alert('Not implemented yet');"><img src="../libs/dynicons/?img=car.svg&amp;w=32" style="vertical-align: middle" alt="Change Service" title="Change Service" /> Request Govt. Vehicle</div>
        <div onclick="alert('Not implemented yet');"><img src="../libs/dynicons/?img=emblem-parking.svg&amp;w=32" style="vertical-align: middle" alt="Change Service" title="Change Service" /> Request Parking Decal</div>
        <div onclick="alert('Not implemented yet');"><img src="../libs/dynicons/?img=award-ribbon.svg&amp;w=32" style="vertical-align: middle" alt="Change Service" title="Change Service" /> Recommend for Award</div>
 -->
    </div>
</div>

<div id="maincontent">
    <div id="employee" style="max-width: 400px">
        <div id="employeeHeader">
            <div id="employeeName">Employee Search:</div>
            <div id="employeeAccount"></div>
        </div>
        <div id="employeeBody">
                <div id="employeeSelector"></div>
        </div>
    </div>
    <div id="position" style="width: 400px; margin-left: 8px">
        <div id="positionHeader">
            <span id="positionTitle">Position Assignments</span>
        </div>
        <div id="positionBody">
            <ul>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['summary']->value['employee']['positions'], 'position');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['position']->value) {
?>
                <li id="pos_<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['position']->value['positionID']);?>
"><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['position']->value['positionID']);?>
</li>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    </div>
    <div id="group" style="width: 400px; margin: 8px">
        <div id="groupHeader">
            <span id="groupTitle">Group Assignments</span>
        </div>
        <div id="groupBody" style="width: 100%">
            <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'group');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['group']->value) {
?>
                <li><a href="?a=view_group&groupID=<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['group']->value['groupID']);?>
"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['group']->value['groupTitle']);?>
</a></li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </ul>
        </div>
    </div>
    <div id="backup" style="float: left; width: 400px; margin: 8px; border: 1px solid black">
        <div id="backupHeader" style="padding: 4px">
            <span id="backupTitle">Backup for <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['summary']->value['employee']['firstName']);?>
 <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['summary']->value['employee']['lastName']);?>
</span>
        </div>
        <div id="backupBody" style="width: 100%; padding: 4px 4px 4px 16px"></div>
    </div>
    <div id="backupFor" style="float: left; width: 400px; margin: 8px; border: 1px solid black">
        <div id="backupForHeader" style="padding: 4px">
            <span id="backupForTitle"><?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['summary']->value['employee']['firstName']);?>
 <?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['summary']->value['employee']['lastName']);?>
 serves as a backup for</span>
        </div>
        <div id="backupForBody" style="width: 100%; padding: 4px 4px 4px 16px"></div>
    </div>
</div>

<div id="orgchartForm"></div>
<?php $_smarty_tpl->_subTemplateRender("file:site_elements/generic_xhrDialog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:site_elements/generic_confirm_xhrDialog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript">
/* <![CDATA[ */

<?php $_smarty_tpl->_subTemplateRender("file:site_elements/genericJS_toolbarAlignment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

function getBackupInfo() {
    // get backup info
    $('#backupBody').html('');
    $.ajax({
        url: "./api/?a=employee/" + <?php echo $_smarty_tpl->tpl_vars['empUID']->value;?>
 + "/backup",
        success: function(response) {
            if(response != '') {
                for(var key in response) {
                    $('#backupBody').append('<div id="backup_'+ response[key].backupEmpUID +'">'+response[key].backupEmpUID+'</div>');
                    $.ajax({
                        url: "./api/?a=employee/" + response[key].backupEmpUID,
                        success: function(response) {
                            $('#backup_'+response.employee.empUID).html(response.employee.firstName + ' ' + response.employee.lastName + ' [ <a href="#" onclick="removeBackup('+ response.employee.empUID +');">Remove</a> ]');
                        },
                        cache: false
                    });
                }
            }
            else {
                $('#backupBody').html('None');
            }
        },
        cache: false
    });
}

function getBackupForInfo() {
    // get backup for info
    $('#backupForBody').html('');
    $.ajax({
        url: "./api/?a=employee/" + <?php echo $_smarty_tpl->tpl_vars['empUID']->value;?>
 + "/backupFor",
        success: function(response) {
            if(response != '') {
                for(var key in response) {
                    $('#backupForBody').append('<div id="backupFor_'+ response[key].empUID +'">'+response[key].empUID+'</div>');
                    $.ajax({
                        url: "./api/?a=employee/" + response[key].empUID,
                        success: function(response) {
                            $('#backupFor_'+response.employee.empUID).html(response.employee.firstName + ' ' + response.employee.lastName);
                        },
                        cache: false
                    });
                }
            }
            else {
                $('#backupForBody').html('None');
            }
        },
        cache: false
    });
}

function removeBackup(backupEmpUID) {
    confirm_dialog.setContent('<img src="../libs/dynicons/?img=help-browser.svg&amp;w=48" alt="question icon" style="float: left; padding-right: 16px" /> <span style="font-size: 150%">Are you sure you want to remove this backup?</span>');
    confirm_dialog.setTitle('Confirmation');
    confirm_dialog.setSaveHandler(function() {
        $.ajax({
            type: 'DELETE',
            url: './api/?a=employee/<?php echo $_smarty_tpl->tpl_vars['empUID']->value;?>
/backup/' + backupEmpUID + '&' + $.param({CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'}),
            success: function(response) {
            	getBackupInfo();
            	confirm_dialog.hide();
            },
            cache: false
        });
    });
    confirm_dialog.show();
}

function assignBackup() {
	dialog.setTitle('Assign backup');
    dialog.setContent('Employee Search: <div id="employeeSelector"></div>');
    dialog.show(); // need to show early because of ie6

    empSel = new nationalEmployeeSelector('employeeSelector');
    empSel.initialize();
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
                success: function(empUID) {
                    if(!isNaN(empUID)) {
                        $.ajax({
                            type: 'POST',
                            url: './api/?a=employee/<?php echo $_smarty_tpl->tpl_vars['empUID']->value;?>
/backup',
                            data: {backupEmpUID: empUID,
                                CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
                            success: function(response) {
                                getBackupInfo();
                                dialog.hide();
                            },
                            cache: false
                        });
                    }
                    else {
                        alert(empUID);
                    }
                }
            });
        }
        else {
            alert('An employee has not been selected.');
        }
    });
}

function disableAccount(backupEmpUID) {
    confirm_dialog.setContent('<img src="../libs/dynicons/?img=help-browser.svg&amp;w=48" alt="question icon" style="float: left; padding-right: 16px" /> <span style="font-size: 150%">Are you sure you want to disable this account?</span>');
    confirm_dialog.setTitle('Confirmation');
    confirm_dialog.setSaveHandler(function() {
        $.ajax({
            type: 'DELETE',
            url: './api/?a=employee/<?php echo $_smarty_tpl->tpl_vars['empUID']->value;?>
' + '&' + $.param({CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'}),
            success: function(response) {
                confirm_dialog.hide();
                if(response == true) {
                    alert('The account has been disabled.');
                    window.location.reload();
                }
            },
            cache: false
        });
    });
    confirm_dialog.show();
}

function enableAccount(backupEmpUID) {
    confirm_dialog.setContent('<img src="../libs/dynicons/?img=help-browser.svg&amp;w=48" alt="question icon" style="float: left; padding-right: 16px" /> <span style="font-size: 150%">Are you sure you want to enable this account?</span>');
    confirm_dialog.setTitle('Confirmation');
    confirm_dialog.setSaveHandler(function() {
        $.ajax({
            type: 'POST',
            url: './api/?a=employee/<?php echo $_smarty_tpl->tpl_vars['empUID']->value;?>
/activate',
            data: {CSRFToken: '<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
'},
            success: function(response) {
                confirm_dialog.hide();
                if(response == true) {
                    alert('The account has been enabled.');
                    window.location.reload();
                }
            },
            cache: false
        });
    });
    confirm_dialog.show();
}

var empSel;
var intval;
var dialog;
var confirm_dialog;
$(function() {
	var positionData = new Object();

    $.ajax({
        url: "ajaxEmployee.php?a=getForm&empUID=<?php echo $_smarty_tpl->tpl_vars['empUID']->value;?>
",
        success: function(response) {
            if(response != '') {
                $('#employeeName').html('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['summary']->value['employee']['firstName'], ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['summary']->value['employee']['lastName'], ENT_QUOTES, 'UTF-8', true);?>
 <?php if ($_smarty_tpl->tpl_vars['summary']->value['employee']['deleted'] != 0) {?>(Disabled account)<?php }?>');
                $('#employeeAccount').html('<?php echo $_smarty_tpl->tpl_vars['summary']->value['employee']['userName'];?>
');
                $('#employeeBody').html(response);
            }
            else {
                $('#maincontent').html('');
            }
        },
        cache: false
    });
    $('#tools').css('visibility', 'visible');

    // import position data
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['summary']->value['employee']['positions'], 'position');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['position']->value) {
?>
    $.ajax({
        url: "./api/?a=position/" + <?php echo $_smarty_tpl->tpl_vars['position']->value['positionID'];?>
,
        success: function(response) {
            if(response != '') {
                $("#pos_" + <?php echo $_smarty_tpl->tpl_vars['position']->value['positionID'];?>
).html('<a href="?a=view_position&positionID=<?php echo $_smarty_tpl->tpl_vars['position']->value['positionID'];?>
">' + response.title + '</a>');
            }
        },
        cache: false
    });
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    getBackupInfo();
    getBackupForInfo();

    orgchartForm = new orgchartForm('orgchartForm');
    orgchartForm.initialize();
    dialog = new dialogController('xhrDialog', 'xhr', 'loadIndicator', 'button_save', 'button_cancelchange');
    confirm_dialog = new dialogController('confirm_xhrDialog', 'confirm_xhr', 'confirm_loadIndicator', 'confirm_button_save', 'confirm_button_cancelchange');
    <?php $_smarty_tpl->_subTemplateRender("file:site_elements/orgchartForm_updateOutlook.js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
});

/* ]]> */
<?php echo '</script'; ?>
>
<?php }
}
