<?php
$container = '';

if (count($err) > 0) {
	$container .= '<ul class="formErrors">';
	foreach ($err as $err) {
		$container .= "<li>$err</li>";
	}
	$container .= '</ul>';
}

$container .= '<form action="" method="post" class="form">';

$container .= '<div class="formField">';
$container .= '<label>'.Translation::t($page->_language, 'Login').'</label>';
$container .= '<input type="text" name="login" value="'.$login.'">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>'.Translation::t($page->_language, 'Mail').'</label>';
$container .= '<input type="text" name="mail" value="'.$mail.'">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>'.Translation::t($page->_language, 'Password').'</label>';
$container .= '<input type="password" name="password">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>'.Translation::t($page->_language, 'Password again').'</label>';
$container .= '<input type="password" name="passwordAgain">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<input type="checkbox" name="rules" class="checkbox">';
$container .= '<label class="checkbox"><a href="'. $page->getLink(5) .'" target="_blank" >'.Translation::t($page->_language, 'I agree with rules.').'</a></label>';
$container .= '</div>';

$container .= '<div>';
$container .= '<input type="submit" name="registration" value="'.Translation::t($page->_language, 'REGISTER').'" class="submit_button">';
$container .= '</div>';

$container .= '</form>';

$container .= '<div class="formLinks"><a href="'. $page->getLink(2) .'">'.Translation::t($page->_language, 'I have an account.').'</a></div>';

return $container;