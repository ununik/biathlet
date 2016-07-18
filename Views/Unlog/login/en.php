<?php
$container = '';

if (count($err) > 0) {
    $container .= '<ul>';
    foreach ($err as $err) {
        $container .= "<li>$err</li>";
    }
    $container .= '</ul>';
}

$container .= '<form action="" method="post" class="form">';

$container .= '<div class="formField">';
$container .= '<label>Login</label>';
$container .= '<input type="text" value="' . $login . '" name="login">';
$container .= '</div>';


$container .= '<div class="formField">';
$container .= '<label>Password</label>';
$container .= '<input type="password" name="password">';
$container .= '</div>';


$container .= '<input type="submit" name="loginFrom" class="submit_button" value="LOGIN">';

$container .= '</form>';

$container .= '<div class="formLinks"><a href="' . $page->getLink(4) . '">I forgot my password.</a></div>';

return $container;