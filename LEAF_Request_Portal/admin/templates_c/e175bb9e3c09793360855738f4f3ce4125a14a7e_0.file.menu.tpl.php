<?php
/* Smarty version 3.1.33, created on 2018-12-19 22:06:41
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\admin\templates\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1ac0f1eafe51_51193447',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e175bb9e3c09793360855738f4f3ce4125a14a7e' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\admin\\templates\\menu.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu_links.tpl' => 1,
  ),
),false)) {
function content_5c1ac0f1eafe51_51193447 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="../" class="buttonNorm"><img src="../../libs/dynicons/?img=go-home.svg&amp;w=16" alt="Main Page" title="Main Page" />Main Page</a>
<div id="headerMenu_container" style="display: inline-block">
    <a id="button_showLinks" tabindex="0" class="buttonNorm" alt="Links Dropdown" title="Links">Links</a>
    <div id="headerMenu_links">
    <?php $_smarty_tpl->_subTemplateRender("file:menu_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</div>
<a href="./" class="buttonNorm"><img src="../../libs/dynicons/?img=applications-system.svg&amp;w=16" alt="Admin Panel" title="Admin Panel" />Admin Panel</a>

<br />
<noscript><div class="alert"><span>Javascript must be enabled for this version of software to work!</span></div></noscript>

<div id="links" style="position: absolute; padding: 24px; z-index: 1000; display: none; background-color: white; border: 1px solid black; width: 310px; box-shadow: 0 2px 6px #8e8e8e;">
<a href="../<?php echo $_smarty_tpl->tpl_vars['orgchartPath']->value;?>
">
    <span class="menuButtonSmall" style="background-color: #ffecb7">
        <img class="menuIconSmall" src="../../libs/dynicons/?img=system-users.svg&amp;w=76" style="position: relative" alt="Org Chart" title="Org Chart" />
        <span class="menuTextSmall">Organizational Chart</span><br />
        <span class="menuDescSmall">Update/Review Org. Charts and Employee Information</span>
    </span>
</a>

<?php echo '<script'; ?>
>
    $('#button_showLinks').keypress(function(e) {
        if (e.keyCode === 13) {
            $('#headerMenu_links').css("display", "block");
        }
    });
<?php echo '</script'; ?>
>

</div>
<?php }
}
