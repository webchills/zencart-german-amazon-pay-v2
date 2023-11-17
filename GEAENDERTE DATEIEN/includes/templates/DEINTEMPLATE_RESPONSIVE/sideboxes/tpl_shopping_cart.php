<?php
/**
 * Side Box Template
 *
 * Zen Cart German Specific (158 code in 157)
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_shopping_cart.php for Amazon Pay V2 2023-11-15 19:55:16Z webchills $
 */
  $content ="";

  $content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">';
  if ($_SESSION['cart']->count_contents() > 0) {
  $content .= '<div id="cartBoxListWrapper">' . "\n" . '<ul class="list-links">' . "\n";
    $products = $_SESSION['cart']->get_products();
    foreach ($products as $product) {
      $content .= '<li>';

      $css_class = 'cartOldItem';
      if (isset($_SESSION['new_products_id_in_cart']) && ($_SESSION['new_products_id_in_cart'] == $product['id'])) {
        $css_class = 'cartNewItem';
        $_SESSION['new_products_id_in_cart'] = '';
      }

      $content .= '<span class="' . $css_class . '">' . $product['quantity'] . CART_QUANTITY_SUFFIX . '</span>';

      $content .= '<a href="' . zen_href_link(zen_get_info_page($product['id']), 'products_id=' . $product['id']) . '">';
      $content .= '<span class="' . $css_class . '">' . $product['name'] . '</span></a>';

      $content .= '</li>' . "\n";
    }
    $content .= '</ul>' . "\n" . '</div>';
  } else {
    $content .= '<div id="cartBoxEmpty">' . BOX_SHOPPING_CART_EMPTY . '</div>';
  }

  if ($_SESSION['cart']->count_contents() > 0) {
    $content .= '<hr>';
    $content .= '<div class="cartBoxTotal">' . $currencies->format($_SESSION['cart']->show_total()) . '</div>';
    $content .= '<br class="clearBoth">';
  }

  if (zen_is_logged_in() && !zen_in_guest_checkout()) {
    $gv_query = "select amount
                 from " . TABLE_COUPON_GV_CUSTOMER . "
                 where customer_id = '" . $_SESSION['customer_id'] . "'";
   $gv_result = $db->Execute($gv_query);

    if ($gv_result->RecordCount() && $gv_result->fields['amount'] > 0 ) {
      $content .= '<div id="cartBoxGVButton"><a href="' . zen_href_link(FILENAME_GV_SEND, '', 'SSL') . '">' . zen_image_button(BUTTON_IMAGE_SEND_A_GIFT_CERT , BUTTON_SEND_A_GIFT_CERT_ALT) . '</a></div>';
      $content .= '<div id="cartBoxVoucherBalance">' . VOUCHER_BALANCE . $currencies->format($gv_result->fields['amount']) . '</div>';
    }
  }
  
   if (isset($_SESSION['amazonpaylogin']) && $_SESSION['amazonpaylogin'] == true) {
   if (!in_array($current_page_base,explode(",",'checkout_shipping_amazon,checkout_payment_amazon,checkout_confirmation_amazon')) ) {
$content .= '<div class="amazon-pay-button" style="float:right;"></div>';
}
} else {
	$content .= '<div class="amazon-login-button" style="float:right;"></div>';
}

  $content .= '<br class="clearBoth">';
  $content .= '</div>';
  
  
