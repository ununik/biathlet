<?php
$language = 'en';
define ('HOME_DIR', $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/biathlete');
session_start();
if (!isset($_SESSION['biathlete_user']) || $_SESSION['biathlete_user'] == '') {
    die();
}

require HOME_DIR . '/autoloading.php';

$user = new User($_SESSION['biathlete_user']);
$nextEnergy = $user->_nextEnergy;
$actualEnergy = $user->_actualEnergy;

$plus = 0;
if ( $nextEnergy <= time()) {
    $plus = floor((time() - $nextEnergy) / $user->_howLongToNextEnergy) + 1;
    $nextEnergy = ((time() - $nextEnergy) % $user->_howLongToNextEnergy) + $nextEnergy + $user->_howLongToNextEnergy;
    if ($user->_actualEnergy + $plus > $user->_maxEnergy) {
        $actualEnergy = $user->_maxEnergy;
    } else {
        $actualEnergy = $user->_actualEnergy + $plus;
    }
    $user->setActualEnergy($actualEnergy, $nextEnergy);
}

echo $actualEnergy.'/'.$user->_maxEnergy;

$date = date('m/d/Y H:i:s', $nextEnergy);
echo '<script>var konec = new Date(\''.$date.'\');
	var ted = new Date();
    var rozdil = konec - ted;
    if (rozdil > 0) {
	    setTimeout(function() {
	    	reloadEnergy(); 
	      }, rozdil);
    }</script>';