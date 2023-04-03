<?php
/**
 * Zen Cart German Specific
 * jscript_main
 *
 
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * Dieses Modul ist DONATIONWARE
 * Wenn Sie es in Ihrem Zen Cart Shop einsetzen, spenden Sie f�r die Weiterentwicklung der deutschen Zen Cart Version auf
 * https://spenden.zen-cart-pro.at
 * @version $Id: jscript_main.php 2022-04-09 10:31:16Z webchills $
 */
?>
<?php
  if (DISPLAY_WIDERRUF_DOWNLOADS_ON_CHECKOUT_CONFIRMATION == 'true') {
?>
<script type="text/javascript">
$(document).ready(function(){
 $('#btn_submit').hide(); 
 $('#widerruf_downloads').mouseup(function () {
    $('#btn_submit').toggle();
 });
});
</script>
<?php
  }
?>
<script type="text/javascript">
var submitter = null;
function popupWindow(url) {
  window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=450,height=320,screenX=150,screenY=150,top=150,left=150')
}

function couponpopupWindow(url) {
  window.open(url,'couponpopupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=450,height=320,screenX=150,screenY=150,top=150,left=150')
}

function submitFunction($gv,$total) {
   if ($gv >=$total) {
     submitter = 1;
   }
}

</script>
