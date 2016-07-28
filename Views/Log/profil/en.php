<?php
$container = '<h3>'.$user->getFullName().'</h3>';
$container .= '<a href="' . $page->getLink(103) . '">Update profil</a>';

return $container;