<?php
define ('HOME_DIR', $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/biathlete');

require HOME_DIR . '/autoloading.php';

$translation = new Translation();

$translation->updateTranslation($_POST['translated'], $_POST['id']);