<?php
$pagePath = '';
$languagePath = '';
$specialValue1 = '';
if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '') {
    $path = explode("/",$_SERVER['PATH_INFO']);
    //page3
    if (isset($path[2])) {
        $pagePath = $path[2];
    }
    //language
    if (isset($path[1])) {
        $languagePath = $path[1];
    }
    
    //specialValue1
    if (isset($path[3])) {
    	$specialValue1 = $path[3];
    }
}



/**
 * Autoloading classes for users
* @param unknown $nameOfClass
*/
function __autoload($name)
{
	require_once HOME_DIR . '/Models/Classes/' . $name . '.class.php';
}

require HOME_DIR . '/Configuration/DBConfig.php';
require HOME_DIR . '/Configuration/WebSettings.php';
require HOME_DIR . '/Configuration/PasswordConfig.php';
require HOME_DIR . '/Configuration/DefaultItems.php';
require HOME_DIR . '/Models/Library/forms.php';
require HOME_DIR . '/Models/Library/extra.php';