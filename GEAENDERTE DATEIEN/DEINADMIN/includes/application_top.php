<?php
/**
 * Zen Cart German Specific
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: application_top.php for Amazon Pay V2 2023-03-29 21:52:36Z webchills $
 */
/**
 * File contains just application_top code
 *
 * Initializes common classes & methods. Controlled by an array which describes
 * the elements to be initialised and the order in which that happens.
 *
 */
require_once('includes/application_bootstrap.php');
/**
 * Prepare init-system
 */

use Zencart\InitSystem\InitSystem;
use Zencart\FileSystem\FileSystem;

$autoLoadConfig = array();
if (isset($loaderPrefix)) {
  $loaderPrefix = preg_replace('/[^a-z_]/', '', $loaderPrefix);
} else {
  $loaderPrefix = 'config';
}
$loader_file = $loaderPrefix . '.core.php';
$initSystem = new InitSystem('admin', $loaderPrefix, FileSystem::getInstance());

if (defined('DEBUG_AUTOLOAD') && DEBUG_AUTOLOAD == true) $initSystem->setDebug(true);

$loaderList = $initSystem->loadAutoLoaders();
$initSystemList = $initSystem->processLoaderList($loaderList);

require(DIR_FS_CATALOG . 'includes/autoload_func.php');
include DIR_FS_CATALOG.'includes/modules/payment/amazon_pay_v2/includes/amazon_pay_v2_admin_actions.php';