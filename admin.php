<?php
define('HOME_DIR', __DIR__);
require HOME_DIR . '/Admin/autoloading.php';

$html = new HTML();

print($html->printHTML());