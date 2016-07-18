<?php
/**
 * Autoloading classes for users
* @param unknown $nameOfClass
*/
function __autoload($name)
{
	require_once HOME_DIR . '/Models/Classes/' . $name . '.class.php';
}

require HOME_DIR . '/Configuration/DBConfig.php';
require HOME_DIR . '/Configuration/PasswordConfig.php';
require HOME_DIR . '/Models/Library/forms.php';
require HOME_DIR . '/Models/Library/extra.php';