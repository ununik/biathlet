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
$container .= '<label>Login</label>';
$container .= '<input type="text" name="login" value="'.$login.'">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>Mail</label>';
$container .= '<input type="text" name="mail" value="'.$mail.'">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>Password</label>';
$container .= '<input type="password" name="password">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<label>Password again</label>';
$container .= '<input type="password" name="passwordAgain">';
$container .= '</div>';

$container .= '<div class="formField">';
$container .= '<input type="checkbox" name="rules" class="checkbox">';
$container .= '<label class="checkbox">I agree with <a href="'. $page->getLink(5) .'" target="_blank" >rules</a>.</label>';
$container .= '</div>';

$container .= '<div>';
$container .= '<input type="submit" name="registration" value="REGISTER" class="submit_button">';
$container .= '</div>';

$container .= '</form>';

$container .= '<div class="formLinks"><a href="'. $page->getLink(2) .'">I have an account.</a></div>';

return $container;