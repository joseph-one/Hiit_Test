<?php
/*require_once ('controllers/RouterC.php');

$router = new RouterC();
$router->route();
*/
//error_reporting(0);

define('WEBPUBLIC',dirname(__FILE__));
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(WEBPUBLIC));
define('CORE',ROOT.DS.'core');
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));




//print_r(ROOT);

require CORE.DS.'includes.php';

new Dispatcher();



?>

<a href=""></a>

