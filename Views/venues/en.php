<?php
$container = '<h3>Venues</h3>';
foreach ($country->getAllCountries($page->_language) as $countryName) {
	$container .= '<h4>'. $countryName['name'].'</h4>';
	foreach ($venues->getAllVenuesInCountry($page->_language, $countryName['id']) as $venueName) {
			$container .= '<a href="'.$page->getLink($venueLink).$venueName['url'].'/">'.$venueName['title'].'</a>';
	}
}

return $container;