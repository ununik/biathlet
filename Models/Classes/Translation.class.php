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
}