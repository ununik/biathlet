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
	$buttPlate['svgImage'],
	'/uploads/images/sponsors/sticks/viessmann.svg',
	'/uploads/images/equipment/background.svg',
	'workroomWeapon'
);

$container .= '<div class="workroomParts">';

//weapon
$container .= '<div class="workshopItemBoxWrapper">';
$container .= '<div class="workshopItemBox workroom-weapon" onclick="showAllInCategories(\''.$weapon['categoryInShop'].'\', \'en\')">';
$container .= '<div class="detail">';
$container .= '<div class="title">'.$weapon['title'].'</div>';
$container .= '</div>';
$container .= '</div>';
$container .= '</div>';

//stock
$container .= '<div class="workshopItemBoxWrapper">';
$container .= '<div class="workshopItemBox workroom-stock" onclick="showAllInCategories(\''.$stock['categoryInShop'].'\', \'en\')">';
$container .= '<div class="detail">';
$container .= '<div class="title">'.$stock['title'].'</div>';
$container .= '</div>';
$container .= '</div>';
$container .= '</div>';

//harness
$container .= '<div class="workshopItemBoxWrapper">';
$container .= '<div class="workshopItemBox workroom-harness" onclick="showAllInCategories(\''.$harness['categoryInShop'].'\', \'en\')">';
$container .= '<div class="detail">';
$container .= '<div class="title">'.$harness['title'].'</div>';
$container .= '</div>';
$container .= '</div>';
$container .= '</div>';

//diopter
$container .= '<div class="workshopItemBoxWrapper">';
$container .= '<div class="workshopItemBox workroom-diopter" onclick="showAllInCategories(\''.$diopter['categoryInShop'].'\', \'en\')">';
$container .= '<div class="detail">';
$container .= '<div class="title">'.$diopter['title'].'</div>';
$container .= '</div>';
$container .= '</div>';
$container .= '</div>';

//buttPlate
$container .= '<div class="workshopItemBoxWrapper">';
$container .= '<div class="workshopItemBox workroom-buttPlate" onclick="showAllInCategories(\''.$buttPlate['categoryInShop'].'\', \'en\')">';
$container .= '<div class="detail">';
$container .= '<div class="title">'.$buttPlate['title'].'</div>';
$container .= '</div>';
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
