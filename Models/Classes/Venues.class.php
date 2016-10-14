<?php
class Venues
{
	public function getAllVenuesInCountry($language, $country)
	{
		$result = Connection::connect()->prepare(
				'SELECT * FROM `venues` WHERE `language`=:language AND `country`=:country AND active=1 AND deleted=0;'
				);
		$result->execute(array(
				':language' => $language,
				':country' => $country
		));
		
		$venues = $result->fetchAll();
		
		return $venues;
	}
	
	public function getVenueIdFromUrl($url)
	{
		$result = Connection::connect()->prepare(
				'SELECT id FROM `venues` WHERE `url`=:url AND `active`=1 AND deleted=0 LIMIT 1;'
				);
		$result->execute(array(
				':url' => $url,
		));
		
		$venue = $result->fetch();
		if (!isset($venue['id']) ||  $venue['id'] == 0) {
			return false;
		}
		 
		return $venue['id'];
	}
	
	public function getVenueFromId($id, $language)
	{
		$result = Connection::connect()->prepare(
				'SELECT * FROM `venues` WHERE `language`=:language AND `id`=:id AND active=1 AND deleted=0 LIMIT 1;'
				);
		$result->execute(array(
				':language' => $language,
				':id' => $id
		));
		
		$venues = $result->fetch();
		
		return $venues;
	}
	public function getTracksForVenue($venue, $language)
	{
	    $result = Connection::connect()->prepare(
	            'SELECT * FROM `venue-tracks` WHERE `language`=:language AND `venue`=:venue AND active=1 AND deleted=0;'
	            );
	    $result->execute(array(
	        ':language' => $language,
	        ':venue' => $venue
	    ));
	
	    $venues = $result->fetchAll();
	
	    return $venues;
	}
}