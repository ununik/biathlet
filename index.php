<?php
session_start();
define('HOME_DIR', __DIR__);
require HOME_DIR . '/autoloading.php';

$html = new HTML();
$page = new Page();

$html->setCssFile('css/unlog.css');
//Authentication
if (isset($_SESSION['biathlete_user']) && $_SESSION['biathlete_user'] != '') {
	$user = new User($_SESSION['biathlete_user']);
	if (!$user->checkUser()) {
		$_SESSION['biathlete_user'] = '';
	} else {
		$page->changeLog(true);
		$html->setCssFile('css/log.css');
		$html->setHeader($user->getHeader());
	}
} else {
	$user = new User();
}

//Language setting
if (isset($_GET['L']) && $_GET['L'] != '') {
	$page->changeLanguage($_GET['L']);
}

//Page id
if (isset($_GET['pid']) && $_GET['pid'] != '') {
	$page->changePID($_GET['pid']);
}

//Main menu
foreach ($page->getMainMenu() as $menu) {
	$active = false;
	if ($page->getPID() == $menu['pidLink']) {
		$active == true;
	}
	$html->addToMenu($menu['title'], $page->getLink($menu['pidLink'], $menu['externalLink']), '', $active);
}

//Content
$actualPage = $page->getActualPage();
$html->setHeaderTitle($actualPage['title']);

if ($actualPage['controller'] != '') {
	require HOME_DIR . $actualPage['controller'];
}
if ($actualPage['view'] != '') {
	$html->addToContent(require HOME_DIR . $actualPage['view']);
}

print($html->printHTML());