<?php
$container = '';

if (count($err) > 0) {
	$container .= '<ul>';
	foreach ($err as $err) {
		$container .= "<li>$err</li>";
	}
	$container .= '</ul>';
}

$container .= '<form action="" method="post">';

$container .= '<label>Login</label>';
$container .= '<input type="text" name="login" value="'.$login.'">';

$container .= '<label>Mail</label>';
$container .= '<input type="text" name="mail" value="'.$mail.'">';

$container .= '<label>Password</label>';
$container .= '<input type="password" name="password">';

$container .= '<label>Password again</label>';
$container .= '<input type="password" name="passwordAgain">';

$container .= '<input type="submit" name="registration">';

$container .= '</form>';

return $container;