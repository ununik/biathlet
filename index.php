<?php
session_start();
define('HOME_DIR', __DIR__);
require HOME_DIR . '/autoloading.php';

$html = new HTML();
$page = new Page();

$html->setCssFile(URL_PATH . '/css/unlog.css');
//Authentication
if (isset($_SESSION['biathlete_user']) && $_SESSION['biathlete_user'] != '') {
	$user = new User($_SESSION['biathlete_user']);
	if (!$user->checkUser()) {
		$_SESSION['biathlete_user'] = '';
	} else {
		$page->changeLog(true);
		$html->setCssFile(URL_PATH . '/css/log.css');
		$html->setHeader($user->getHeader());
	}
} elseif (isset($_COOKIE['biathlete_user']) && $_COOKIE['biathlete_user'] != '') {
    $cookies = \Library\Extra\getCookiesPart($_COOKIE['biathlete_user']);
    if (!$user->makeLogin($cookies[0], $cookies[1])) {
        $_COOKIE['biathlete_user'] = '';
    }
    header('Location: '.URL_PATH . '/index.php/'. $_SERVER['PATH_INFO']);
} else {
	$user = new User();
}

//Language setting
$page->changeLanguage($languagePath);

$page->changePID($pagePath);

//Main menu
foreach ($page->getMainMenu() as $menu) {
	$active = false;
	if ($page->getPID() == $menu['pidLink']) {
		$active = true;
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