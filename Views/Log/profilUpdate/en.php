<?php
$container = $user->getFullName();

if (count($err) > 0) {
    $container .= '<ul>';
    foreach ($err as $err) {
        $container .= "<li>$err</li>";
    }
    $container .= '</ul>';
}

$container .= '<form action="" method="post">';
$container .= '<label>Firstname</label>';
$container .= '<input type="text" name="firstname" value="' . $firstname . '">';

$container .= '<label>Lastname</label>';
$container .= '<input type="text" name="lastname" value="' . $lastname . '">';

$container .= '<label>Mail</label>';
$container .= '<input type="text" name="mail" value="' . $mail . '">';

$container .= '<label>Login</label>';
$container .= '<input type="text" name="login" value="' . $login . '">';

$container .= '<input type="submit" name="profilUpdate">';
$container .= '</form>';

$container .= '<form action="" method="post">';
$container .= '<label>Old password</label>';
$container .= '<input type="password" name="oldPassword">';

$container .= '<label>New password</label>';
$container .= '<input type="password" name="newPassword">';

$container .= '<label>New password again</label>';
$container .= '<input type="password" name="newPassword2">';

$container .= '<input type="submit" name="passwordUpdate">';
$container .= '</form>';

return $container;