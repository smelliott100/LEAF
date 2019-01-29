<?php
/* Smarty version 3.1.33, created on 2018-12-19 22:28:25
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\admin\templates\view_form_library.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1ac609829be0_10459142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c522564b2c0364e03932cb01a9341efddde3a85' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\admin\\templates\\view_form_library.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:site_elements/generic_simple_xhrDialog.tpl' => 1,
  ),
),false)) {
function content_5c1ac609829be0_10459142 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="../js/dialogController.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../js/formGrid.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../js/formQuery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../js/formSearch.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../js/LeafPreview.js"><?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:site_elements/generic_simple_xhrDialog.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
>
function showPreview(recordID) {
	var formData = grid.getDataByRecordID(recordID);
	var title = formData.title;
    var authors = '';
    if(formData.s1.id9 != undefined
        && formData.s1.id9 != '') {
        authors = 'By ' + formData.s1.id9;
    }
    if(formData.s1.id10 != undefined
        && formData.s1.id10 != '') {
        authors += ', ' + formData.s1.id10;
    }
    if(formData.s1.id11 != undefined
        && formData.s1.id11 != '') {
        authors += '<br />' + formData.s1.id11;
    }

	dialog_simple.setTitle('Preview');
	dialog_simple.setContent('<button id="btn_download" class="buttonNorm" style="float: right"><img src="../../libs/dynicons/?img=edit-copy.svg&w=32" /> Get a copy!</button><div style="font-size: 170%; font-weight: bold">' + title + '</div><div>'+ authors +'</div><br /><br /><div id="preview"></div>');
	dialog_simple.show();

    preview = new LeafPreview('preview');
    preview.setNexusURL('<?php echo $_smarty_tpl->tpl_vars['LEAF_NEXUS_URL']->value;?>
');
    preview.load(recordID, 1, 0);

    $('#btn_download').one('click', function() {
    	$.ajax({
    		type: 'POST',
    		url: 'ajaxIndex.php?a=importForm',
    		data: { formPacket: JSON.stringify(preview.getRawForm()),
    			    formLibraryID: recordID},
    		success: function() {
    			window.location = '?a=form&referFormLibraryID=' + recordID;
    		}
    	});
    });
}

function applyFilter(search) {
    query.updateDataTerm('data', '3', 'LIKE', '*' + search + '*');
    query.execute();
    announceFilter(search);
}

var query;
var grid;
var preview;
var data;
var dialog_simple;
$(function() {
	dialog_simple = new dialogController('simplexhrDialog', 'simplexhr', 'simpleloadIndicator', 'simplebutton_save', 'simplebutton_cancelchange');

    query = new LeafFormQuery();
    query.useJSONP(true);
    query.setRootURL('<?php echo $_smarty_tpl->tpl_vars['LEAF_NEXUS_URL']->value;?>
LEAF/library/');
    query.onSuccess(function(res) {
        data = res;
        
        grid = new LeafFormGrid('forms', {readOnly: true});
        grid.setRootURL('../');
        grid.hideIndex();
        grid.importQueryResult(res);
        grid.setHeaders([
            {name: 'Form', indicatorID: 'form', editable: false, sortable: false, callback: function(data, blob) {
            	$('#'+data.cellContainerID).html('<span style="font-weight: bold; font-size: 120%">' + blob[data.index].title + '</span>');
            }},
            {name: 'Description', indicatorID: 5, sortable: false, editable: false},
            {name: 'Author(s)', indicatorID: 'authors', editable: false, sortable: false, callback: function(data, blob) {
            	var authors = '';
            	if(blob[data.index].s1.id9 != undefined
            		&& blob[data.index].s1.id9 != '') {
            		authors = blob[data.index].s1.id9;
            	}
                if(blob[data.index].s1.id10 != undefined
                    && blob[data.index].s1.id10 != '') {
                    authors += ', ' + blob[data.index].s1.id10;
                }

                $('#'+data.cellContainerID).html(authors);
            }},
            {name: 'Workflow Example', indicatorID: 6, sortable: false, editable: false, callback: function(data, blob) {
                if(blob[data.index].s1.id6 != undefined
                        && blob[data.index].s1.id6 != '') {
                	var imageURL = '<?php echo $_smarty_tpl->tpl_vars['LEAF_NEXUS_URL']->value;?>
LEAF/library/image.php?form=' + blob[data.index].recordID + '&id=6&series=1&file=0';
                    $('#'+data.cellContainerID).html('<img id="workflowImg_'+ blob[data.index].recordID +'" src="'+ imageURL +'" alt="Screenshot of workflow" style="border: 1px solid black; max-width: 150px; cursor: pointer" />');
                    $('#workflowImg_'+ blob[data.index].recordID).on('click', function() {
                    	dialog_simple.setTitle(blob[data.index].title + ' (example workflow)');
                        dialog_simple.setContent('<a href="'+ imageURL +'" target="_blank"><img id="workflowImg_'+ blob[data.index].recordID +'" src="'+ imageURL +'" alt="Screenshot of workflow" style="cursor: zoom-in; border: 1px solid black; width: 540px" /></a>');
                        dialog_simple.show();
                    });
                }
            }},
            {name: 'Preview', indicatorID: 'preview', editable: false, sortable: false, callback: function(data, blob) {
            	$('#'+data.cellContainerID).html('<button class="buttonNorm" onclick="showPreview('+ blob[data.index].recordID +')" style="white-space: nowrap"><img src="../../libs/dynicons/?img=edit-find.svg&w=32" /> Preview</button>');
            }}
        ]);
        
        grid.setPostRenderFunc(function() {
            $('#' + grid.getPrefixID() + 'table > tbody > tr > td').css({
                'border-right': '0px',
                'border-left': '0px',
            });
        });
        grid.renderBody();

/*        $('#forms').html('<table class="leaf_grid"><tbody id="table_forms">');
        for(var i in res) {
            $('#table_forms').append('<tr><td class="table_editable" onclick="showPreview('+ res[i].recordID +');" style="padding: 8px; border: 1px solid"><span style="font-weight: bold; font-size: 120%">' + res[i].title + '</span><br />' + res[i].s1.id5 + '</td></tr>');
        }
        $('#forms').append('</tbody></table>');*/
    });

    var leafSearch = new LeafFormSearch('searchContainer');
    leafSearch.setRootURL('../');
    leafSearch.setOrgchartPath('<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
');
    leafSearch.setSearchFunc(function(search) {
        query.clearTerms();
        query.importQuery({"terms":[{"id":"categoryID","operator":"=","match":"form_68aa4"},{"id":"dependencyID","indicatorID":"9","operator":"=","match":"1"},{"id":"deleted","operator":"=","match":0}],"getData":["3","5","4","1","9","10","11","6"]});
        query.addDataTerm('data', '0', 'LIKE', '*' + search + '*');
        query.execute();
    });

    leafSearch.init();
    $('#' + leafSearch.getPrefixID() + 'advancedSearchButton').css('display', 'none');
});

<?php echo '</script'; ?>
>

<div id="menu" style="float: left; width: 180px">
    <span style="position: absolute; color: transparent" aria-atomic="true" aria-live="assertive" id="filterStatus" role="status"></span>
    <a role="button" class="buttonNorm" tabindex="0" href="?a=form" style="display: inherit; width: 150px; text-decoration: none; color: black" id="backToForm"><img src="../../libs/dynicons/?img=edit-undo.svg&amp;w=32" alt="Go back" title="Go back"/> Back to My Forms</a>
    <br /><br />
    Filter by Business Lines:
    <div role="button" onkeydown="triggerKeydown(event, this)" class="buttonNorm" tabindex="0" onclick="applyFilter('')" style="width: 150px"><img aria-hidden="true" src="../../libs/dynicons/?img=Accessories-dictionary.svg&amp;w=32" alt="Icon" title="Icon"/> All Business Lines</div>
    <br />
    <div role="button" onkeydown="triggerKeydown(event, this)" class="buttonNorm" tabindex="0" onclick="applyFilter('Administrative')" style="width: 150px"><img aria-hidden="true" src="../../libs/dynicons/?img=applications-office.svg&amp;w=32" alt="Icon" title="Icon" /> Administrative</div>
    <div role="button" onkeydown="triggerKeydown(event, this)" class="buttonNorm" tabindex="0" onclick="applyFilter('Human Resources')" style="width: 150px"><img aria-hidden="true" src="../../libs/dynicons/?img=system-users.svg&amp;w=32" alt="Icon" title="Icon" /> Human Resources</div>
    <div role="button" onkeydown="triggerKeydown(event, this)" class="buttonNorm" tabindex="0" onclick="applyFilter('Information Technology')" style="width: 150px"><img aria-hidden="true" src="../../libs/dynicons/?img=network-idle.svg&amp;w=32" alt="Icon" title="Icon" /> Information Technology</div>
    <div role="button" onkeydown="triggerKeydown(event, this)" class="buttonNorm" tabindex="0" onclick="applyFilter('Logistics')" style="width: 150px"><img aria-hidden="true" src="../../libs/dynicons/?img=package-x-generic.svg&amp;w=32" alt="Icon" title="Icon" /> Logistics</div>
    <div role="button" onkeydown="triggerKeydown(event, this)" class="buttonNorm" tabindex="0" onclick="applyFilter('Fiscal')" style="width: 150px"><img aria-hidden="true" src="../../libs/dynicons/?img=x-office-spreadsheet.svg&amp;w=32" alt="Icon" title="Icon" /> Fiscal</div>
</div>
<div id="formEditor_content" style="margin-left: 184px; padding-left: 8px">

    Search form library:
    <div id="searchContainer"></div>
    <div id="forms"></div>
</div>

<div id="previewShim" style="display: none"></div>
<?php echo '<script'; ?>
>
    $('#backToForm').focusin(function() {
        $('#backToForm').css('color', 'white');
    });
    $('#backToForm').focusout(function() {
        $('#backToForm').css('color', 'black');
    });
    $('#backToForm').mouseover(function() {
        $('#backToForm').css('color', 'white');
    });
    $('#backToForm').mouseout(function() {
        $('#backToForm').css('color', 'black');
    });
    var filter_id;

    function announceFilter(id) {
        if(filter_id !== id) {
            $('#filterStatus').attr('aria-label', 'Filtering results by ' + id);
            filter_id = id;
        } else {
            alert('Filter already active');
        }
    }

    function triggerKeydown(e, id) {
        if(e.keyCode === 13 || e.keyCode === 32) {
            $('#' + id).trigger('click');
        }
    }
<?php echo '</script'; ?>
>
<?php }
}
