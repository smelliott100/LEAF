<?php
/* Smarty version 3.1.33, created on 2018-12-19 17:00:25
  from 'C:\d0x\www\LEAF\LEAF\LEAF_Request_Portal\templates\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1abf7958c121_87874419',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '929deaaa6b693d131da903cbc7d43723ce18e95b' => 
    array (
      0 => 'C:\\d0x\\www\\LEAF\\LEAF\\LEAF_Request_Portal\\templates\\menu.tpl',
      1 => 1543348772,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:menu_links.tpl' => 1,
  ),
),false)) {
function content_5c1abf7958c121_87874419 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['action']->value != '') {?>
    <a href="./" class="buttonNorm"><img src="../libs/dynicons/?img=go-home.svg&amp;w=16" role="button" />Main Page</a>
<?php }?>
<div id="headerMenu_container" style="display: inline-block">
    <a id="button_showLinks" tabindex="0" class="buttonNorm" alt="Links Dropdown" title="Links" aria-haspopup="true" aria-expanded="false" role="button">Links</a>
    <div id="headerMenu_links">
    <?php $_smarty_tpl->_subTemplateRender("file:menu_links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</div>
<?php if ($_smarty_tpl->tpl_vars['is_admin']->value == true) {?>
     <a href="./admin/" class="buttonNorm" role="button"><img src="../libs/dynicons/?img=applications-system.svg&amp;w=16"/>Admin Panel</a>
<?php }
if ($_smarty_tpl->tpl_vars['hide_main_control']->value == 1) {
}?>

<?php echo '<script'; ?>
>
    var menuButton = $('#button_showLinks');
    var subMenu = $('#headerMenu_links');
    var subMenuButton = $('#headerMenu_links').find('a');

    $(menuButton).keypress(function(e) {
        if (e.keyCode === 13) {
            $(subMenu).css("display", "block");
            $(menuButton).attr('aria-expanded', 'true');
            subMenuButton.focus();
        }
    });

    $(subMenuButton).focusout(function() {
            $(subMenu).css("display", "none");
            $(menuButton).attr('aria-expanded', 'false');
            $(menuButton).focus();
    });
<?php echo '</script'; ?>
>

<br />
<noscript><div class="alert"><span>Javascript must be enabled for this version of software to work!</span></div></noscript>
<?php }
}
