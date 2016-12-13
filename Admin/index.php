<?php
define ('HOME_DIR', __DIR__ . '/..');
require_once 'autoloading.php';

$html = new HTML();
$html->addToJs('', 'const HOME_DIR = "'.__DIR__.'"');
$html->addToJs('', 'const URL_PATH = "'.URL_PATH.'/Admin"');

$html->addToMenu('Překlad', '?page=translation');
$html->addToMenu('Vybavení', '?page=vybaveni');

if (isset($_GET['page'])) {
	include __DIR__ . '/Controllers/'.$_GET['page'].'.php';
	$html->addToContent(include __DIR__ . '/Views/'.$_GET['page'].'.php');
}
print $html->printHTML();