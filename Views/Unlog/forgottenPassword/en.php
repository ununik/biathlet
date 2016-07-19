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
$container .= '<label>Insert your email adress:</label>';
$container .= '<input type="text" name="email" value="' . $email . '">';
$container .= '</div>';

$container .= '<input type="submit" name="emailFrom" class="submit_button" value="Send">';

$container .= '</form>';

return $container;