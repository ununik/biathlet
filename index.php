<?php
session_start();
define('HOME_DIR', __DIR__);
require HOME_DIR . '/autoloading.php';

$html = new HTML();
$page = new Page();
$languageClass = new Language();
//Language setting
$page->changeLanguage($languagePath);

$html->setCssFile(URL_PATH . '/css/unlog.css');
//Authentication
if (isset($_SESSION['biathlete_user']) && $_SESSION['biathlete_user'] != '') {
	$user = new User($_SESSION['biathlete_user']);
	if (!$user->checkUser()) {
		$_SESSION['biathlete_user'] = '';
	} else {
		$page->changeLog(true);
		$html->setCssFile(URL_PATH . '/css/log.css');
		$html->addToJs('', 'const HOME_DIR = "'.HOME_DIR.'"');
		$html->addToJs('', 'const URL_PATH = "'.URL_PATH.'"');
		$html->addToJs(URL_PATH . '/js/jquery-3.1.0.min.js');
		$html->addToJs(URL_PATH . '/js/ajax.js');
		$html->addToJs(URL_PATH . '/js/basicFunctions.js');
		$html->setHeader($user->getHeader($page->_language));
		$html->addToActualActivity($user->getActualActivity($page->_language));
	}
} elseif (isset($_COOKIE['biathlete_user']) && $_COOKIE['biathlete_user'] != '') {
    $user = new User();
    $cookies = \Library\Extra\getCookiesPart($_COOKIE['biathlete_user']);
    if (!$user->makeLogin($cookies[0], $cookies[1])) {
        $_COOKIE['biathlete_user'] = '';
    }
    header('Location: '.URL_PATH . '/index.php'. $_SERVER['PATH_INFO']);
} else {
	$user = new User();
}

$page->changePID($pagePath);
$html->setHomepageLink($page->getLink($page->getHomepageId()));

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

//LANGUAGE MENU
foreach ($languageClass->getAllLanguages($page->_language, false) as $langNavigation) {
	$html->addToTranslationNavigation($langNavigation['originalTitle'], $page->getLink($page->getPID(), '', $langNavigation['short']));
}

require HOME_DIR . '/automation/controller.php';

print($html->printHTML());