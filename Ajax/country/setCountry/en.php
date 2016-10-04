<?php
$language = 'en';
define ('HOME_DIR', $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/biathlete');
session_start();
if (!isset($_SESSION['biathlete_user']) || $_SESSION['biathlete_user'] == '') {
	die();
}

require HOME_DIR . '/autoloading.php';

$country = new Country();
$options = '';

foreach ($country->getAllCountries($language) as $countryOption) {
	$options .= '<option value="'. $countryOption['id'] .'">'.$countryOption['name'].'</option>';
}

$return = '<h3>Set your country</h3>';
$return .= '<select id="CountryForm">'.$options.'</select>';
$return .= '<div class="setValue" onclick="selectCountry()"></div>';

echo $return;