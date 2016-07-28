<?php
$language = 'en';
define ('HOME_DIR', $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/biathlete');
session_start();
if (!isset($_SESSION['biathlete_user']) || $_SESSION['biathlete_user'] == '') {
    die();
}

require HOME_DIR . '/autoloading.php';

$user = new User($_SESSION['biathlete_user']);

if ($user->_lastActivityTimestamp >= time()) {
    echo $user->_lastActivity;
    
    $date = date('m/d/Y H:i:s', $user->_lastActivityTimestamp);
    echo ' <span id="odpocet" data-konec="'.$date.'" data-hlaska="" data-zbyva=""></span><script>
  odpocet(document.getElementById(\'odpocet\'));
</script>';
    return;
}

echo '---';