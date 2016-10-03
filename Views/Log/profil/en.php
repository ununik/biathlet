<?php
$container = '<h3>'.$user->getFullName().'</h3>';

$container .= '<table class="personalDefinition">';
$container .= '<tr><td class="personal_left">'.Translation::t($page->_language, 'Accuracy').'</td><td>'.$user->getAccuracy().'</td><tr>';
$container .= '<tr><td class="personal_left">'.Translation::t($page->_language, 'Best cartridge').'<br><small>'.Translation::t($page->_language, '(for competitions)').'</small></td><td>'.$bestCartridge['title'].'</td><tr>';
$container .= '<tr><td class="personal_left">'.Translation::t($page->_language, 'Leg power').'</td><td>'.$user->getLegPower().'</td><tr>';
$container .= '<tr><td class="personal_left">'.Translation::t($page->_language, 'Hand power').'</td><td>'.$user->getHandPower().'</td><tr>';
$container .= '<tr><td class="personal_left">'.Translation::t($page->_language, 'Hand power').'</td><td>'.$user->getEndurance().'</td><tr>';
$container .= '<tr><td class="personal_left">'.Translation::t($page->_language, 'Stability').'</td><td>'.$user->getStability().'</td><tr>';
$container .= '</table>';

$container .= $userItem->showWeapon(
	$page->_language,
	$weapon['svgImage'],
	$weapon['svgImage2'],
	$stock['svgImage'],
	$harness['svgImage'],
	$diopter['svgImage'],
	$buttPlate['svgImage'],
	'/uploads/images/sponsors/sticks/viessmann.svg',
	'/uploads/images/equipment/background.svg'
);

$container .= '<ul>';
$container .= '<li><a href="' . $page->getLink(114) . '">'.Translation::t($page->_language, 'Workroom').'</a></li>';
$container .= '<li><a href="' . $page->getLink(103) . '">'.Translation::t($page->_language, 'Update profil').'</a></li>';
$container .= '<li>'.Translation::t($page->_language, 'Link to profil:').' <a href="'.$page->getLink(116).'?user='.$user->_id.'">'.$page->getLink(116).'?user='.$user->_id.'</a></li>';
$container .= '</ul>';

$container .= '<h4>'.Translation::t($page->_language, 'My equipment').'</h4>';
$categories = $shops->getAllCategories($page->_language);
$i = 0;
foreach ($categories as $category) {
    $items = $userItem->getAllItemsForUser($user->_id, $category['id'], $page->_language);
    if (count($items) == 0) {
        continue;
    }
    $itemsArray[$i]['category'] = $category;
    $itemsArray[$i]['items'] = $items;
    $i++;
}

$container .= '<div id="shopCategoriesPanel">';
for ($n =0; $n < $i; $n++) {
    if ($n == 0) {
        $container .= '<div onclick="showCategory(\''.$itemsArray[$n]['category']['id'].'\', this)" class="shopCategoriesTitles">'.$itemsArray[$n]['category']['title'].'</div>';
    } else {
        $container .= '<div onclick="showCategory(\''.$itemsArray[$n]['category']['id'].'\', this)" class="shopCategoriesTitles inactiveCategoryTitle">'.$itemsArray[$n]['category']['title'].'</div>';    
    }
}
$container .= '</div>';

for ($n=0; $n < $i; $n++) {
    if ($n == 0) {
        $container .= '<div class="shopCategory" id="'.$itemsArray[$n]['category']['id'].'">';
    } else {
        $container .= '<div class="shopCategory shopInactiveCategory" id="'.$itemsArray[$n]['category']['id'].'">';
    }
    foreach ($itemsArray[$n]['items'] as $item) {
        $container .= '<div class="profilItemBoxWrapper">';
        $container .= '<div class="profilItemBox">';
        $container .= '<div class="detail">';
        $container .= '<div class="title"><a href="'.$page->getLink(117).'?id='.$item['item'].'" target="_blank">'.$item['title'].'</a></div>';
        if ($item['image'] != '') {
            $container .= '<img src="'.URL_PATH.$item['image'].'" class="ilustration">';
        }
        
        $container .= '</div>';
        if ($item['count'] > 1) {
            $container .= '<div class="count">'.$item['count'].'</div>';
        }
        $container .= '<div class="count"></div>';
        $container .= '</div>';
        $container .= '</div>';
    }
    $container .= '</div>';
}

return $container;