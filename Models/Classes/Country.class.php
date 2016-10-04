<?php
class Country
{
	public function getAllCountries($language)
	{
		$result = Connection::connect()->prepare(
				'SELECT * FROM `countries` WHERE `language`=:language AND `active`=1 AND `deleted`=0;'
				);
		$result->execute(array(
				':language' => $language
		));
		 
		$countries = $result->fetchAll();
		
		return $countries;
	}
	
	public function getCountryFromId($id)
	{
		$result = Connection::connect()->prepare(
				'SELECT name, language FROM `countries` WHERE `active`=1 AND `deleted`=0 AND `id`=:id;'
				);
		$result->execute(array(
				':id' => $id
		));
			
		$countries = $result->fetchAll();
		
		$countryArray = array();
		foreach ($countries as $country) {
			$countryArray[$country['language']] = $country['name'];
		}
		return $countryArray;
	}
}