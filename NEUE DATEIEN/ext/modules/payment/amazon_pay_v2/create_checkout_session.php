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
 * @version $Id: create_checkout_session.php 2023-03-19 17:35:16Z webchills $
 */
chdir('../../../../');

require_once 'includes/application_top.php';
require_once 'includes/modules/payment/amazon_pay_v2/amazon_pay_v2.php';

$checkoutHelper = new \ZencartAmazonPayV2\CheckoutHelper();
$checkoutSession = $checkoutHelper->createCheckoutSession();
echo json_encode(['amazonCheckoutSessionId'=>$checkoutSession->getCheckoutSessionId()]);