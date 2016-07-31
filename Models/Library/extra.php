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
    return number_format ($number, 2 , '.', ' ');
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