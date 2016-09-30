<?php
class Translation
{
	public function t($language, $text)
	{
		$result = Connection::connect()->prepare(
				'SELECT translated FROM `translation` WHERE `language`=:language AND `original`=:original;'
				);
		$result->execute(array(
				':language' => $language,
				':original' => $text
		));
		 
		$translation = $result->fetch();
		
		if (!isset($translation['translated'])) {
			return $text;
		}
		
		return $translation['translated'];
	}
	
	public function showAllWords($language)
	{
		$result = Connection::connect()->prepare(
				'SELECT * FROM `translation` WHERE `language`=:language;'
				);
		$result->execute(array(
				':language' => $language
		));
			
		$translation = $result->fetchAll();
		
		return $translation;
	}
	
	public function updateTranslation($translated, $id)
	{
		$result = Connection::connect()->prepare(
				'UPDATE `translation` SET `translated`=:translated WHERE `id`=:id;'
				);
		$result->execute(array(
				':translated' => $translated,
				':id' => $id
		));
	}
}