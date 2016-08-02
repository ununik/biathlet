<?php
$pagePath = '';
$languagePath = '';
if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '') {
    $path = explode("/",$_SERVER['PATH_INFO']);
    if (isset($path[count($path)-2])) {
        $pagePath = $path[count($path)-2];
    }
    
    if (isset($path[count($path)-3])) {
        $languagePath = $path[count($path)-3];
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