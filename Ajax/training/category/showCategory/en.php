<?php
$language = 'en';
define ('HOME_DIR', $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/biathlete');
session_start();
if (!isset($_SESSION['biathlete_user']) || $_SESSION['biathlete_user'] == '') {
    die();
}

require HOME_DIR . '/autoloading.php';

$training = new Training();

$return = '';
foreach ($training->getAllTrainingsSubcategories($language, $_POST['id']) as $subcategory) {
    $return .= $subcategory['title'];
}

echo $return;