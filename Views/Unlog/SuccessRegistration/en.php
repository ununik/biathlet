<?php
$container = '<p>Thank you for the registration. We send you a message on your mail. Now you can log in with your login and password.</p>';
$container .= '<form action="" method="post">';

$container .= '<label>Login</label>';
$container .= '<input type="text">';

$container .= '<label>Password</label>';
$container .= '<input type="password">';

$container .= '<input type="submit">';

$container .= '</form>';

return $container;