<?php
/* Smarty version 3.1.33, created on 2018-12-19 17:00:28
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\ajaxForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1abf7cc48865_18643872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93d082f4d1bdbcf8ef4c1ad221ae51b2cff9962d' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\ajaxForm.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1abf7cc48865_18643872 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\d0x\\www\\LEAF\\LEAF\\libs\\smarty\\plugins\\modifier.sanitize.php','function'=>'smarty_modifier_sanitize',),));
?>
<input name="series" type="hidden" value="<?php echo smarty_modifier_sanitize($_smarty_tpl->tpl_vars['series']->value);?>
" />
<input name="CSRFToken" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['CSRFToken']->value;?>
" />
<div class="mainform">
    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['subindicatorsTemplate']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form'=>$_smarty_tpl->tpl_vars['form']->value,'recordID'=>$_smarty_tpl->tpl_vars['recordID']->value,'orgchartPath'=>$_smarty_tpl->tpl_vars['orgchartPath']->value), 0, true);
?>
</div>
<?php echo '<script'; ?>
>
var recordID = <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['recordID']->value);?>
;
var serviceID = <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['serviceID']->value);?>
;
var orgchartPath = '<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['orgchartPath']->value);?>
';
<?php echo '</script'; ?>
><?php }
}
