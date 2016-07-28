<?php
$container = '<form action="" method="post" class="form">';

$container .= '<div class="formField">';
if ($stayLogin == 1) {
    $container .= '<input type="checkbox" name="stayLogin" class="checkbox" checked>';
} else {
    $container .= '<input type="checkbox" name="stayLogin" class="checkbox">';
}
$container .= '<label class="checkbox">Stay login.</label>';
$container .= '</div>';


$container .= '<input type="submit" name="settingsForm" class="submit_button" value="SAVE">';

$container .= '</form>';

$container .= '<a href="' . $page->getLink(103) . '">Update profil</a>';
$container .= '<a href="'.$page->getLink(109).'">Rules</a>';

return $container;