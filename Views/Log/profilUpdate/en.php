<?php
$container = '<h3>'.$user->getFullName().'</h3>';
$container .= '<div class="form"><div class="step" onclick="step(\'personal\')">Personal</div><div class="step" onclick="step(\'login\')">Password</div></div>';
if (count($err) > 0) {
    $container .= '<ul class="form">';
    foreach ($err as $err) {
        $container .= "<li>$err</li>";
    }
    $container .= '</ul>';
}
        
$container .= '<form action="" method="post" class="form steps '.$inactiveStepsPersonal.'" id="personal">';

$container .= '<div class="formField">';
$container .= '<label>Firstname</label>';
$container .= '<input type="text" name="firstname" value="' . $firstname . '">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>Lastname</label>';
$container .= '<input type="text" name="lastname" value="' . $lastname . '">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>Mail</label>';
$container .= '<input type="text" name="mail" value="' . $mail . '">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>Login</label>';
$container .= '<input type="text" name="login" value="' . $login . '">';
$container .= '</div>';

$container .= '<input type="submit" name="profilUpdate">';
$container .= '</form>';

$container .= '<form action="" method="post" class="form steps '.$inactiveStepsLogin.'" id="login">';
$container .= '<div class="formField">';
$container .= '<label>Old password</label>';
$container .= '<input type="password" name="oldPassword">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>New password</label>';
$container .= '<input type="password" name="newPassword">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>New password again</label>';
$container .= '<input type="password" name="newPassword2">';
$container .= '</div>';

$container .= '<input type="submit" name="passwordUpdate">';
$container .= '</form>';

return $container;