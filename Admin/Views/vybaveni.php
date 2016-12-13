<?php 
$container = 'Vybavení';
$container .= '<table><tr>';
$container .= '<th>EN</th>';
$container .= '<th>CS</th>';
$container .= '</tr>';
foreach ($equipmentClass->getAllCategories() as $category) {
    foreach ($equipmentClass->getAllItemsOrderByCategory($category['id']) as $item) {
        $container .= '<tr>';
        $container .= '<td><a href="?page=upravitVybaveni&language=en&id='.$item['id'].'">'.$item['title'].'</a></td>';
        
        //CS
        if ($equipmentClass->issetTranslationForItem($item['id'], 'cs')) {
            $container .= '<td><a href="?page=upravitVybaveni&language=cs&id='.$item['id'].'">upravit</a></td>';
        } else {
            $container .= '<td><a href="?page=upravitVybaveni&language=cs&id='.$item['id'].'&new=true">vytvořit</a></td>';
        }
        
        $container .= '</tr>';
    }
}
$container .= '</table>';

return $container;