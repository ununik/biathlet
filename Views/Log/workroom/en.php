<?php
$container = '<h3>'.Translation::t($page->_language, 'Workroom').'</h3>';

$container .= '<h4>'.Translation::t($page->_language, 'Completed weapon').'</h4>';
$container .= $userItem->showWeapon(
	$page->_language,
	$weapon['svgImage'],
	$weapon['svgImage2'],
	$stock['svgImage'],
	$harness['svgImage'],
	$diopter['svgImage'],
	$buttPlate['svgImage']
		);

//weapon
$container .= '<div class="workshopItemBoxWrapper">';
$container .= '<div class="workshopItemBox" onclick="showAllInCategories(\''.$weapon['categoryInShop'].'\', \'en\')">';
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
$container .= '<div class="workshopItemBox" onclick="showAllInCategories(\''.$stock['categoryInShop'].'\', \'en\')">';
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
$container .= '<div class="workshopItemBox" onclick="showAllInCategories(\''.$harness['categoryInShop'].'\', \'en\')">';
$container .= '<div class="detail">';
$container .= '<div class="title">'.$harness['title'].'</div>';
if ($harness['image'] != '') {
	$container .= '<img src="'.URL_PATH.$harness['image'].'" class="ilustration">';
}
$container .= '</div>';
$container .= '</div>';
$container .= '</div>';

//diopter
$container .= '<div class="workshopItemBoxWrapper">';
$container .= '<div class="workshopItemBox" onclick="showAllInCategories(\''.$diopter['categoryInShop'].'\', \'en\')">';
$container .= '<div class="detail">';
$container .= '<div class="title">'.$diopter['title'].'</div>';
if ($diopter['image'] != '') {
	$container .= '<img src="'.URL_PATH.$diopter['image'].'" class="ilustration">';
}
$container .= '</div>';
$container .= '</div>';
$container .= '</div>';

//buttPlate
$container .= '<div class="workshopItemBoxWrapper">';
$container .= '<div class="workshopItemBox" onclick="showAllInCategories(\''.$buttPlate['categoryInShop'].'\', \'en\')">';
$container .= '<div class="detail">';
$container .= '<div class="title">'.$buttPlate['title'].'</div>';
if ($buttPlate['image'] != '') {
	$container .= '<img src="'.URL_PATH.$buttPlate['image'].'" class="ilustration">';
}
$container .= '</div>';
$container .= '</div>';
$container .= '</div>';

$container .= '<div id="test"></div>';
////////////////////////////////////////////////////////////////////////////////////////////////////
/*$container .= '<div class="workroom_activePart"><div class="title">weapon</div><div class="description">'.$weapon['title'].'</div></div>';
$container .= '<div class="workroom_activePart"><div class="title">stock</div><div class="description">'.$stock['title'].'</div></div>';
$container .= '<div class="workroom_activePart"><div class="title">diopter</div><div class="description">'.$user->_diopter.'</div></div>';
$container .= '<div class="workroom_activePart"><div class="title">rifle sling</div><div class="description">'.$user->_rifleSling.'</div></div>';
$container .= '<div class="workroom_activePart"><div class="title">harness</div><div class="description">'.$harness['title'].'</div></div>';
*/
return $container;
