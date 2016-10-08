<?php
$container = '<h3>Shop</h3>';
if ($page->getSpecialValue(1) != '') {
    $container .= include HOME_DIR . '/Views/Log/shop/shopDetail/en.php';
    return $container;
}
foreach ($shops->getAllShops($page->_language) as $shop) {
    $container .= '<div class="shopItemBoxWrapper">';
    $container .= '<a href="'.$page->getLink(113).''.$shop['url'].'/" class="NewTrainingCategory">';
    $container .= '<div class="title">'.$shop['title'].'</div>';
    $container .= '</a>';
    $container .= '</div>';
}

return $container;