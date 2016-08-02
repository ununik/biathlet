<?php
$container = '<h3>Workroom</h3>';

$container .= '<h4>Completed weapon</h4>';
$container .= $userItem->showWeapon($page->_language, $stock['svgImage'], $harness['svgImage']);

//weapon
$container .= '<div class="workshopItemBoxWrapper">';
$container .= '<div class="workshopItemBox">';
$container .= '<div class="detail">';
$container .= '<div class="title">'.$weapon['title'].'</div>';
if ($weapon['image'] != '') {
	$container .= '<img src="'.URL_PATH.$weapon['image'].'" class="ilustration">';
}
$container .= '</div>';
$container .= '</div>';
$container .= '</div>';

//stock
$container .= '<div class="workshopItemBoxWrapper">';
$container .= '<div class="workshopItemBox">';
$container .= '<div class="detail">';
$container .= '<div class="title">'.$stock['title'].'</div>';
if ($stock['image'] != '') {
	$container .= '<img src="'.URL_PATH.$stock['image'].'" class="ilustration">';
}
$container .= '</div>';
$container .= '</div>';
$container .= '</div>';

//harness
$container .= '<div class="workshopItemBoxWrapper">';
$container .= '<div class="workshopItemBox">';
$container .= '<div class="detail">';
$container .= '<div class="title">'.$harness['title'].'</div>';
if ($harness['image'] != '') {
	$container .= '<img src="'.URL_PATH.$harness['image'].'" class="ilustration">';
}
$container .= '</div>';
$container .= '</div>';
$container .= '</div>';
////////////////////////////////////////////////////////////////////////////////////////////////////
$container .= '<div class="workroom_activePart"><div class="title">weapon</div><div class="description">'.$weapon['title'].'</div></div>';
$container .= '<div class="workroom_activePart"><div class="title">stock</div><div class="description">'.$stock['title'].'</div></div>';
$container .= '<div class="workroom_activePart"><div class="title">diopter</div><div class="description">'.$user->_diopter.'</div></div>';
$container .= '<div class="workroom_activePart"><div class="title">rifle sling</div><div class="description">'.$user->_rifleSling.'</div></div>';
$container .= '<div class="workroom_activePart"><div class="title">harness</div><div class="description">'.$harness['title'].'</div></div>';

return $container;
