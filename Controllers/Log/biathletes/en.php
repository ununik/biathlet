<?php
$issetSearch = false;

if (isset($_GET['search'])) {
    $issetSearch = true;
    $searchWord = $_GET['search'];
    $words = \Library\extra\getWordsFromString($searchWord);
    $columnsInTable = array('firstname', 'lastname', 'mail', 'login');
}