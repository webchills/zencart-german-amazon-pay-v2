<?php
/**
 * Amazon Pay V2 for Zen Cart German 1.5.7
 * Copyright 2023 webchills (www.webchills.at)
 * based on Amazon Pay for Modified by AlkimMedia (www.alkim.de)
 * (https://github.com/AlkimMedia/AmazonPay_Modified_2060)
 * Portions Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * Dieses Modul ist DONATIONWARE
 * Wenn Sie es in Ihrem Zen Cart Shop einsetzen, spenden Sie f�r die Weiterentwicklung der deutschen Zen Cart Version auf
 * https://spenden.zen-cart-pro.at
 * @version $Id: amazon_pay_v2.php 2023-03-25 09:18:16Z webchills $
 */
define('FILENAME_CHECKOUT_SHIPPING_AMAZON', 'checkout_shipping_amazon');
define('FILENAME_CHECKOUT_PAYMENT_AMAZON', 'checkout_payment_amazon');
define('FILENAME_CHECKOUT_CONFIRMATION_AMAZON', 'checkout_confirmation_amazon');
define('TABLE_AMAZON_PAY_V2_TRANSACTIONS', DB_PREFIX . 'amazon_pay_v2_transactions');
define('TABLE_AMAZON_PAY_V2_LOG', DB_PREFIX . 'amazon_pay_v2_log');