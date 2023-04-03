<?php
/**
 * Checkout Process Page
 *
 * @package page
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: header_php.php for Amazon Pay V2 2022-03-29 19:02:16Z webchills $
 */

// bof Amazon Pay V2
if (defined('MODULE_PAYMENT_AMAZON_PAY_V2_STATUS') && MODULE_PAYMENT_AMAZON_PAY_V2_STATUS == 'True') {
if (isset($_SESSION['payment']) && $_SESSION['payment'] == 'amazon_pay_v2') {
if (isset($_POST['comments'])) {
    $_SESSION['comments'] = $_POST['comments'];
}
require(DIR_FS_CATALOG . DIR_WS_MODULES . 'payment/amazon_pay_v2/includes/actions/checkout_process.php'); 
}
}
// eof Amazon Pay V2
$zco_notifier->notify('NOTIFY_HEADER_START_CHECKOUT_PROCESS');

  require(DIR_WS_MODULES . zen_get_module_directory('checkout_process.php'));

// load the after_process function from the payment modules
  $payment_modules->after_process();

  $zco_notifier->notify('NOTIFY_CHECKOUT_PROCESS_BEFORE_CART_RESET', $insert_id);
  $_SESSION['cart']->reset(true);

// unregister session variables used during checkout
  unset($_SESSION['sendto']);
  unset($_SESSION['billto']);
  unset($_SESSION['shipping']);
  unset($_SESSION['payment']);
  unset($_SESSION['comments']);
  $order_total_modules->clear_posts();//ICW ADDED FOR CREDIT CLASS SYSTEM

  // This should be before the zen_redirect:
  $zco_notifier->notify('NOTIFY_HEADER_END_CHECKOUT_PROCESS');

  zen_redirect(zen_href_link(FILENAME_CHECKOUT_SUCCESS, (isset($_GET['action']) && $_GET['action'] == 'confirm' ? 'action=confirm' : ''), 'SSL'));

  require(DIR_WS_INCLUDES . 'application_bottom.php');
