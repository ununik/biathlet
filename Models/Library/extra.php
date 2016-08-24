<?php
namespace Library\Extra;

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function cookies($login, $password)
{
    return $login . '_;_' . $password;
}

function getCookiesPart($string)
{
    return explode('_;_', $string);
}

function moneyFormat($number)
{
    return number_format ($number, 2 , '.', ' ') .'<img src="'.URL_PATH.'/images/icons/euro.svg" class="euro">';
}

/**
 *  return array
 *   
 **/ 
function getWordsFromString($string)
{
    $string = str_replace(',', ' ', $string);
    $string = str_replace('.', ' ', $string);
    $string = str_replace('?', ' ', $string);
    $string = str_replace('!', ' ', $string);
    $string = str_replace(':', ' ', $string);
    $string = str_replace('&', ' ', $string);
    $string = str_replace("'", ' ', $string);
    $string = str_replace('"', ' ', $string);
    $words = explode(' ', $string);
    $return = array();
    
    foreach ($words as $word) {
        if ($word == '') {
           continue;
        }
        
        $return[] = \Library\forms\safeText($word);
    }
    
    return $return;
}

function getColumnNameInProfilFromEquipmentCategory($categoryId, $object = false)
{
	if ($object === true) {
		switch ($categoryId) {
			case 1:
				return '_weapon';
				break;
			case 4:
				return '_stock';
				break;
			case 5:
				return '_diopter';
				break;
			case 6:
				return '_rifleSling';
				break;
			case 7:
				return '_harness';
				break;
			case 8:
				return '_buttPlate';
				break;
		}
	} else {
		switch ($categoryId) {
			case 1:
				return 'weapon';
				break;
			case 4:
				return 'stock';
				break;
			case 5:
				return 'diopter';
				break;
			case 6:
				return 'rifle_sling';
				break;
			case 7:
				return 'harness';
				break;
			case 8:
				return 'buttPlate';
				break;
		}
	}
	
	return '';
}

function getEasiestTimeFormSeconds($seconds)
{
	$seconds = $seconds - 3600;
	return date('H:i:s', $seconds);
}