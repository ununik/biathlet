<?php
$container = '<h3>'.$user->getFullName().'</h3>';
$container .= '<div class="form"><div class="step" onclick="step(\'personal\', this)">'.Translation::t($page->_language, 'Personal').'</div><div class="step inactiveCategoryTitle" onclick="step(\'login\', this)">'.Translation::t($page->_language, 'Password').'</div></div>';
if (count($err) > 0) {
    $container .= '<ul class="form">';
    foreach ($err as $err) {
        $container .= "<li>$err</li>";
    }
    $container .= '</ul>';
}
        
$container .= '<form action="" method="post" class="form steps '.$inactiveStepsPersonal.'" id="personal">';

$container .= '<div class="formField">';
$container .= '<label>'.Translation::t($page->_language, 'Firstname').'</label>';
$container .= '<input type="text" name="firstname" value="' . $firstname . '">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>'.Translation::t($page->_language, 'Lastname').'</label>';
$container .= '<input type="text" name="lastname" value="' . $lastname . '">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>'.Translation::t($page->_language, 'Gender').'</label>';
$container .= '<select name="gender">';
$container .= '<option value="n">---</option>';

$container .= '<option value="f"';
if ($gender == 'f') {
$container .= ' selected';
}
$container .= '>'.Translation::t($page->_language, 'FEMALE').'</option>';

$container .= '<option value="m"';
if ($gender == 'm') {
$container .= ' selected';
}
$container .= '>'.Translation::t($page->_language, 'MALE').'</option>';
$container .= '</select>';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>'.Translation::t($page->_language, 'Country').'</label>';
$container .= '<select name="country">';
$container .= $countryOptions;
$container .= '</select>';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>'.Translation::t($page->_language, 'Mail').'</label>';
$container .= '<input type="text" name="mail" value="' . $mail . '">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>'.Translation::t($page->_language, 'Login').'</label>';
$container .= '<input type="text" name="login" value="' . $login . '">';
$container .= '</div>';

$container .= '<input type="submit" name="profilUpdate" class="submit_button" value="save">';
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

$container .= '<input type="submit" name="passwordUpdate" class="submit_button" value="save">';
$container .= '</form>';

return $container;