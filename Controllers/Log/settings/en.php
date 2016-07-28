<?php
$stayLogin = $user->_stayLogin;
if (isset($_POST['settingsForm'])) {
    if (isset($_POST['stayLogin'])) {
        $stayLogin = 1;
    } else {
        $stayLogin = 0;
    }
    $user->changeStayLog($stayLogin);
    
    header('Location: '. $page->getLink(106));
}