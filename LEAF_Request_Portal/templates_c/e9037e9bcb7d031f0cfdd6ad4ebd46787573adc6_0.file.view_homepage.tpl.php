<?php
/* Smarty version 3.1.33, created on 2018-12-19 17:00:25
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\view_homepage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1abf7956d520_74797429',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9037e9bcb7d031f0cfdd6ad4ebd46787573adc6' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\view_homepage.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1abf7956d520_74797429 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="menu2" style="width: 315px; float: left">

<a href="?a=newform" role="button">
    <span class="menuButtonSmall" style="background-color: #2372b0; color: white">
        <img class="menuIconSmall" src="../libs/dynicons/?img=document-new.svg&amp;w=76" style="position: relative" />
        <span class="menuTextSmall" style="color: white">New Request</span><br />
        <span class="menuDescSmall" style="color: white">Start a new request</span>
    </span>
</a>

<?php if ($_smarty_tpl->tpl_vars['inbox_status']->value == 0) {?>
<a href="?a=inbox" role="button">
    <span class="menuButtonSmall" style="background-color: #c9c9c9">
        <img class="menuIconSmall" src="../libs/dynicons/?img=folder-open.svg&amp;w=76" style="position: relative" />
        <span class="menuTextSmall">Inbox</span><br />
        <span class="menuDescSmall">Your inbox is currently empty</span>
    </span>
</a>
<?php } else { ?>
<a href="?a=inbox" role="button">
    <span class="menuButtonSmall" style="background-color: #b6ef6d">
        <img class="menuIconSmall" src="../libs/dynicons/?img=document-open.svg&amp;w=76" style="position: relative" />
        <span class="menuTextSmall">Inbox</span><br />
        <span class="menuDescSmall">Review and apply actions to active requests</span>
    </span>
</a>
<?php }?>

<a href="?a=bookmarks" role="button">
    <span class="menuButtonSmall" style="background-color: #7eb2b3">
        <img class="menuIconSmall" src="../libs/dynicons/?img=bookmark.svg&amp;w=76" style="position: relative" />
        <span class="menuTextSmall">Bookmarks</span><br />
        <span class="menuDescSmall">View saved links to requests</span>
    </span>
</a>

<a href="?a=reports&v=3" role="button">
    <span class="menuButtonSmall" style="background-color: black">
        <img class="menuIconSmall" src="../libs/dynicons/?img=x-office-spreadsheet.svg&amp;w=76" style="position: relative" />
        <span class="menuTextSmall" style="color: white">Report Builder</span><br />
        <span class="menuDescSmall" style="color: white">Create custom reports</span>
    </span>
</a>

</div>

<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['tpl_search']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('is_service_chief'=>$_smarty_tpl->tpl_vars['is_service_chief']->value,'is_admin'=>$_smarty_tpl->tpl_vars['is_admin']->value,'empUID'=>$_smarty_tpl->tpl_vars['empUID']->value,'userID'=>$_smarty_tpl->tpl_vars['userID']->value), 0, true);
}
}
