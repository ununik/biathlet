<?php
$err = array();
$email = '';

if (isset($_POST['emailFrom'])) {
    $mail = \Library\Forms\safeText($_POST['email']);
    
    if (strlen($mail) == 0) {
        $err[] = 'Mail is mandatory field.';
    }
    if (strlen($mail) > 255) {
        $err[] = 'Mail is too long.';
    }
    if (!\Library\Forms\validateEMAIL($mail)) {
        $err[] = 'Mail has not valid format';
    }
    if (!$user->existsMail($mail)) {
        $err[] = 'This mail doesn\'t exist.';
    }
    
    if (count($err) == 0) {
        $password = $user->randomPassword($mail);
        
        die('send via email - ' . $password . "\n /Controller/Unlog/forgottenPassword/en.php");
    }
}