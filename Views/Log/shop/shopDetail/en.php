<?php
$actualShop = $shops->getActualShop($_GET['shop'], $page->_language);
$return = '<h4>'.$actualShop['title'].'</h4>';
$return .= '<div>'.$actualShop['description'].'</div>';

$categories = $shops->getAllCategories($page->_language);
$i = 0;
foreach ($categories as $category) {
    $shopItems = $shops->getAllItemsForCategory($_GET['shop'], $category['id'], $page->_language);
    if (count($shopItems) == 0) {
        continue;
    }
    $itemsArray[$i]['category'] = $category;
    $itemsArray[$i]['items'] = $shopItems;
    $i++;
}

$return .= '<div id="shopCategoriesPanel">';
for ($n =0; $n < $i; $n++) {
    $return .= '<div onclick="showCategory(\''.$itemsArray[$n]['category']['id'].'\')" class="shopCategoriesTitles">'.$itemsArray[$n]['category']['title'].'</div>';
}
$return .= '</div>';

for ($n=0; $n < $i; $n++) {
    if ($n == 0) {
        $return .= '<div class="shopCategory" id="'.$itemsArray[$n]['category']['id'].'">';
    } else {
        $return .= '<div class="shopCategory shopInactiveCategory" id="'.$itemsArray[$n]['category']['id'].'">';
    }
    foreach ($itemsArray[$n]['items'] as $item) {
        $return .= '<div class="shopItemBox">';
        $return .= '<div class="title">'.$item['title'].'</div>';
        $return .= '<div>'.$item['description'].'</div>';
        $return .= '<div>'. \Library\Extra\moneyFormat($item['price']) .' EUR</div>';
        if ($user->_money < $item['price']) {
            $return .= '<div class="buy noMoney">Buy</div>';
        } else {
            $return .= '<div class="buy" onclick="buyItem(\''.$item['id'].'\', \''.$page->_language.'\')">Buy</div>';
        }
        $return .= '</div>';
    }
    $return .= '</div>';
}

$return .= '<div id="shopResult"></div>';


return $return;