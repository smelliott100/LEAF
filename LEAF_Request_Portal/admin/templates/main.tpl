{strip}<!DOCTYPE html>
<html>
<head>
    {if $tabText != ''}
    <title>{$tabText} - {$title} | {$city}</title>
    {else}
    <title>{$title} | {$city}</title>
    {/if}
    <style type="text/css" media="screen">
        @import "../../libs/js/jquery/css/dcvamc/jquery-ui.custom.min.css";
{section name=i loop=$stylesheets}
        @import "{$stylesheets[i]}";
{/section}
        @import "css/style.css";
        @import "../../libs/js/jquery/chosen/chosen.min.css";
        @import "../../libs/js/jquery/trumbowyg/ui/trumbowyg.min.css";
        @import "../../libs/js/jquery/icheck/skins/square/blue.css";
    </style>
    <style type="text/css" media="print">
        @import "css/printer.css";
    </style>
    <script type="text/javascript" src="../../libs/js/jquery/jquery.min.js"></script>
    {if $useUI == true}
    <script type="text/javascript" src="../../libs/js/jquery/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="../js/dialogController.js"></script>
    <script type="text/javascript" src="../../libs/js/jquery/chosen/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="../../libs/js/jquery/trumbowyg/trumbowyg.min.js"></script>
    <script type="text/javascript" src="../../libs/js/jquery/icheck/icheck.js"></script>
    {else if $useLiteUI == true}
    <script type="text/javascript" src="../js/dialogController.js"></script>
    <script type="text/javascript" src="../../libs/js/jquery/chosen/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="../../libs/js/jquery/trumbowyg/trumbowyg.min.js"></script>
    <script type="text/javascript" src="../../libs/js/jquery/icheck/icheck.js"></script>
    {/if}
{section name=i loop=$javascripts}
    <script type="text/javascript" src="{$javascripts[i]}"></script>
{/section}
    <link rel="icon" href="../vafavicon.ico" type="image/x-icon" />
</head>
<body class="claro">
<div id="header">
    {if $qrcodeURL != ''}
    <div style="float: left"><img class="print nodisplay" style="width: 72px" src="../../libs/qrcode/?encode={$qrcodeURL}" alt="QR code" /></div>
    {/if}
    <div style="cursor: pointer" onclick="window.location='./'">
      <span style="position: absolute">{$logo}</span>
      <span id="headerLabel">{$city}</span>
      <span id="headerDescription">{$title}</span>
    </div>
    <span id="headerHelp">
        {if $onPrem === true}
        <div class="alert" style="display: inline">
            <span>This site is not on the VA Enterprise Cloud. Do not enter PHI/PII.</span>
        </div>
        {/if}
        {$login}
    </span>
    <span id="headerLogin"></span>
    <span id="headerTab">{$emergency}{$tabText}</span>
    <span id="headerTabImg"><img src="../images/tab.png" alt="tab" /></span>
    <span id="headerMenu">{$menu}</span>
</div>
<div id="body">
    <div id="content">
        {if $status != ''}
        <div class="alert"><span>{$status}</span></div>
        {/if}
        <div id="bodyarea">
            {$body}
        </div>
    </div>
</div>

<div class="noprint" id="footer"{if $hideFooter == true} style="visibility: hidden; display: none"{/if}>
    <br /><br /><a id="versionID" href="../?a=about">{$smarty.const.PRODUCT_NAME}<br />Version {$smarty.const.VERSION_NUMBER} r{$revision}</a>
</div>

</body>
</html>{/strip}
