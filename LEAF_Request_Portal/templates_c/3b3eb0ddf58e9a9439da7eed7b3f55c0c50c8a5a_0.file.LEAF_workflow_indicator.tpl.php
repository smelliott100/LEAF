<?php
/* Smarty version 3.1.33, created on 2018-12-19 22:32:30
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\scripts\workflowStepModules\LEAF_workflow_indicator.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1ac6fea995e2_24280830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b3eb0ddf58e9a9439da7eed7b3f55c0c50c8a5a' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\scripts\\workflowStepModules\\LEAF_workflow_indicator.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1ac6fea995e2_24280830 (Smarty_Internal_Template $_smarty_tpl) {
?>workflowStepModule[<?php echo $_smarty_tpl->tpl_vars['stepID']->value;?>
] = workflowStepModule[<?php echo $_smarty_tpl->tpl_vars['stepID']->value;?>
] || {};
workflowStepModule[<?php echo $_smarty_tpl->tpl_vars['stepID']->value;?>
]['LEAF_workflow_indicator'] = (function() {
	var prefixID = 'workflowStepModule' + Math.floor(Math.random()*1000) + '_';
	var depID = null;
	var config = JSON.parse('<?php echo $_smarty_tpl->tpl_vars['moduleConfig']->value;?>
');
	var series = 1;
	var form;

	function init(step) {
		recordID = step.recordID;
		depID = step.dependencyID;
		indicatorID = config.indicatorID;
		$('#form_dep_extension' + depID).html('<div style="padding: 8px 24px 8px">\
				<div style="background-color: white; border: 1px solid black; padding: 16px">\
					<div id="'+prefixID+'container"></div>\
					<div id="'+prefixID+'anchor"></div>\
				</div>\
				</div>');

		form = new LeafForm(prefixID + 'anchor');
		form.initCustom(prefixID + 'anchor', prefixID + 'container', prefixID + 'anchor', prefixID + 'anchor', prefixID + 'anchor');
		form.setHtmlFormID('form_dep'+ depID);
		form.setRecordID(recordID);
		form.getForm(indicatorID, series);
	}

	function trigger(callback) {
		if(callback != undefined) {
			form.setPostModifyCallback(callback);
		}
		form.dialog().clickSave();
	}

	return {
		init: init,
		trigger: trigger
	};
})();<?php }
}
