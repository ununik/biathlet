<?php
$venueClass = new Venues();

if ($page->getSpecialValue(1) == '') {
	if ($page->getLog()) {
		header('Location: '. $page->getLink(121));
	}
	header('Location: '. $page->getLink(11));
}

$venueId = $venueClass->getVenueIdFromUrl($page->getSpecialValue(1));
if ($venueId == false) {
	if ($page->getLog()) {
		header('Location: '. $page->getLink(121));
	}
	header('Location: '. $page->getLink(11));	
}

$venue = $venueClass->getVenueFromId($venueId, $page->_language);
$countryClass = new Country();
$country = $countryClass->getCountryFromId($venue['country']);