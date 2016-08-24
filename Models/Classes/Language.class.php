<?php
class Language
{
	public function getAllLanguages($language = 'en', $withActual = false)
	{
		if ($withActual) {
			$result = Connection::connect()->prepare(
					'SELECT * FROM `languages` WHERE `active`=1 AND `deleted`=0;'
					);
			$result->execute();
		} else {
			$result = Connection::connect()->prepare(
					'SELECT * FROM `languages` WHERE `short`!=:language AND `active`=1 AND `deleted`=0;'
					);
			$result->execute(array(
					':language' => $language
			));
		}
		 
		$languages = $result->fetchAll();
		
		return $languages;
	}
}