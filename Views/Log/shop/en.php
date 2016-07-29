<?php
$container = '<h3>Shop</h3>';
if (isset($_GET['shop'])) {
    $container .= include HOME_DIR . '/Views/Log/shop/shopDetail/en.php';
    return $container;
}
foreach ($shops->getAllShops($page->_language) as $shop) {
    $container .= '<div class="shopItemBoxWrapper">';
    $container .= '<a href="'.$page->getLink(113).'?shop='.$shop['id'].'" class="NewTrainingCategory">';
    $container .= '<div class="title">'.$shop['title'].'</div>';
    $container .= '<div>'.$shop['description'].'</div>';
    $container .= '</a>';
    $container .= '</div>';
}

return $container;