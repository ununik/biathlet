<?php
$shopId = $shops->getShopByUrl($page->getSpecialValue(1));
if ($shopId == false) {
	header('Location: '.$page->getLink($page->getHomepageId()));
}
$actualShop = $shops->getActualShop($shopId, $page->_language);
$return = '<h4>'.$actualShop['title'].'</h4>';
$return .= '<div>'.$actualShop['description'].'</div>';

$categories = $shops->getAllCategories($page->_language);

$i = 0;
foreach ($categories as $category) {
    $shopItems = $shops->getAllItemsForCategory($shopId, $category['id'], $page->_language, $user->getLevel());
    if (count($shopItems) == 0) {
        continue;
    }
    $itemsArray[$i]['category'] = $category;
    $itemsArray[$i]['items'] = $shopItems;
    $i++;
}

$return .= '<div id="shopCategoriesPanel">';
for ($n =0; $n < $i; $n++) {
    if ($n == 0) {
        $return .= '<div onclick="showCategory(\''.$itemsArray[$n]['category']['id'].'\', this)" class="shopCategoriesTitles">'.$itemsArray[$n]['category']['title'].'</div>';
    } else {
        $return .= '<div onclick="showCategory(\''.$itemsArray[$n]['category']['id'].'\', this)" class="shopCategoriesTitles inactiveCategoryTitle">'.$itemsArray[$n]['category']['title'].'</div>';    
    }
}
$return .= '</div>';

for ($n=0; $n < $i; $n++) {
    if ($n == 0) {
        $return .= '<div class="shopCategory" id="'.$itemsArray[$n]['category']['id'].'">';
    } else {
        $return .= '<div class="shopCategory shopInactiveCategory" id="'.$itemsArray[$n]['category']['id'].'">';
    }
    foreach ($itemsArray[$n]['items'] as $item) {
        $return .= '<div class="shopItemBoxWrapper">';
        $return .= '<div class="shopItemBox">';
        $return .= '<div class="detail">';
        $return .= '<div class="title"><a href="'.$page->getLink(117).$item['id'].'/" target="_blank">'.$item['title'].'</a></div>';
        //$return .= '<div>'.$item['description'].'</div>';
        if ($item['image'] != '') {
            $return .= '<img src="'.URL_PATH.$item['image'].'" class="ilustration">';
        }
        $return .= '<div class="price">'. \Library\Extra\moneyFormat($item['price']) .'</div>';
        $return .= '</div>';
        if ($user->_money < $item['price']) {
            $return .= '<div class="buy noMoney">Buy</div>';
        } else {
            $return .= '<div class="buy" onclick="buyItem(\''.$item['id'].'\', \''.$page->_language.'\')">Buy</div>';
        }
        $return .= '</div>';
        $return .= '</div>';
    }
    $return .= '</div>';
}

$return .= '<div id="shopResult"></div>';


return $return;