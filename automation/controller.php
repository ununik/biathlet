<?php 
$return = '';
if ($page->getLog() == true) {
	//SET COUNTRY
	if ($user->_countryId == 0) {
		$html->addToJs(URL_PATH.'/js/country.js');
		$return = '<script>$(document).ready(function() {noCountry();});</script>';
	}
}

$html->addToContent($return);