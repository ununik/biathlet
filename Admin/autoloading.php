<?php
/**
 * Autoloading classes for admin
 * @param unknown $nameOfClass
 */
function __autoload($name)
{
    require_once HOME_DIR . '/Admin/Models/Classes/' . $name . '.class.php';
}

require HOME_DIR . '/Configuration/DBConfig.php';
require HOME_DIR . '/Models/Classes/Connection.class.php';