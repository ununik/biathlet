<?php
$container = '';

foreach ($training->getAllTrainingsCategories($page->_language) as $category) {
    $container .= '<div class="shopItemBoxWrapper">';
    $container .= '<div class="NewTrainingCategory" onclick="showCategory('.$category['id'].', \''. $page->_language .'\')">';
    $container .= '<div class="title">'.$category['title'].'</div>';
    $container .= '<div>'.$category['subtitle'].'</div>';
    $container .= '</div>';
    $container .= '</div>';
}
$container .= '<div id="oneCategory"></div>';

return $container;