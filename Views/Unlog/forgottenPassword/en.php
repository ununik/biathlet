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

$container .= '<label>Insert your email adress:</label>';
$container .= '<input type="text" name="email" value="' . $email . '">';

$container .= '<input type="submit" name="emailFrom">';

$container .= '</form>';

return $container;