<script src="./js/employeeSelector.js"></script>
<script src="./js/dialogController.js"></script>
<script src="./js/orgchartForm.js"></script>
<div id="main">

    <div id="currentEmployee" style="width: 50%; background-color: #ffe3e3; border: 1px solid black;">
    <!--{if $employee[0].empUID > 0}-->
        <div id="currentEmployeeHeader" style="background-color: #f4bcbc; font-size: 110%; font-weight: bold; padding: 4px"><a href="?a=view_employee&empUID=<!--{$employee[0].empUID}-->"><!--{$employee[0].firstName}--> <!--{$employee[0].lastName}--></a></div>
        <div id="currentEmployeeBody" style="padding: 4px">Loading...</div>
    <!--{else}-->
        <div style="padding: 8px">Your account is not present in the Org. Chart database.</div>
    <!--{/if}-->
    </div>
</div>

<div id="orgchartForm"></div>
<!--{include file="site_elements/generic_xhrDialog.tpl"}-->

<script type="text/javascript">
/* <![CDATA[ */

var empSel, posSel, grpSel, grp2Sel;
var ppInterval;
var sideOffset = 580;
var timer = 0;
$(function() {

    <!--{if $employee[0].empUID > 0}-->
    $.ajax({
        url: "ajaxEmployee.php?a=getForm&empUID=<!--{$employee[0].empUID}-->",
        success: function(response) {
            if(response != '') {
                $('#currentEmployeeBody').html(response);
                $('#currentEmployeeBody img').css('max-width', '64px');
            }
            else {
                $('#currentEmployeeBody').html('');
            }
        },
        cache: false
    });
    orgchartForm = new orgchartForm('orgchartForm');
    orgchartForm.initialize();
    <!--{/if}-->
});

/* ]]> */
</script>