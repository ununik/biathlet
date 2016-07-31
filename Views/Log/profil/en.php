<?php
$container = '<h3>'.$user->getFullName().'</h3>';

$container .= '<ul>';
$container .= '<li><a href="' . $page->getLink(114) . '">Workroom</a></li>';
$container .= '<li><a href="' . $page->getLink(103) . '">Update profil</a></li>';
$container .= '<li>Link to profil: <a href="'.$page->getLink(116).'?user='.$user->_id.'">'.$page->getLink(116).'?user='.$user->_id.'</a></li>';
$container .= '</ul>';

$container .= '<h4>My equipment</h4>';
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
        $container .= '<div class="title">'.$item['title'].'</div>';
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