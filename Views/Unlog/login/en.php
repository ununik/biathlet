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
$container .= '<input type="text" value="' . $login . '" name="login">';
$container .= '</div>';


$container .= '<div class="formField">';
$container .= '<label>'.Translation::t($page->_language, 'Password').'</label>';
$container .= '<input type="password" name="password">';
$container .= '</div>';


$container .= '<input type="submit" name="loginFrom" class="submit_button" value="LOGIN">';

$container .= '</form>';

$container .= '<div class="formLinks"><a href="' . $page->getLink(4) . '">'.Translation::t($page->_language, 'I forgot my password.').'</a></div>';
$container .= '<div class="formLinks"><a href="' . $page->getLink(1) . '">'.Translation::t($page->_language, 'I don\'t have any account.').'</a></div>';

return $container;