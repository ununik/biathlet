<?php

$optionCategory = '';
foreach ($categories as $category) {
    if ($item['categoryInShop'] == $category['id']) {
        $optionCategory .= '<option value="'.$category['id'].'" selected>'.$category['title'].'</option>';
    } else {
        $optionCategory .= '<option value="'.$category['id'].'">'.$category['title'].'</option>';
    }
}

$container = 'Uprava vybaveni - '. $language;
$container .= '<form action="" method="post" enctype="multipart/form-data">';
$container .= '<h3>'.$item['title'].'</h3>';
$container .= '<table>';

$container .= '<tr>';
$container .= '<td>Jmeno</td><td><input type="text" value="'.$item['title'].'" name="title"></td>';
$container .= '</tr>';

$container .= '<tr>';
$container .= '<td>Kategorie</td><td><select name="category">'.$optionCategory.'</select></td>';
$container .= '</tr>';

$container .= '<tr>';
$container .= '<td>Přesnost</td><td><input type="text" value="'.$item['accuracy'].'" name="accuracy"></td>';
$container .= '</tr>';

$container .= '<tr>';
$container .= '<td>Síla nohou</td><td><input type="text" value="'.$item['legPower'].'" name="legPower"></td>';
$container .= '</tr>';

$container .= '<tr>';
$container .= '<td>Síla rukou</td><td><input type="text" value="'.$item['handPower'].'" name="handPower"></td>';
$container .= '</tr>';

$container .= '<tr>';
$container .= '<td>Vytrvalost</td><td><input type="text" value="'.$item['endurance'].'" name="endurance"></td>';
$container .= '</tr>';

$container .= '<tr>';
$container .= '<td>Stabilita</td><td><input type="text" value="'.$item['stability'].'" name="stability"></td>';
$container .= '</tr>';

$container .= '<tr>';
$container .= '<td>Ilustrační obrázek</td><td><input type="file" name="image">';
if ($item['image'] != '') {
    $container .= '<img src="'.URL_PATH.$item['image'].'" height="35px">';
}
$container .= '</td>';
$container .= '</tr>';

$container .= '<tr>';
$container .= '<td>Aktivni</td><td><input type="checkbox" '.$itemActive.' name="active"></td>';
$container .= '</tr>';

$container .= '</table>';
$container .= '<input type="submit" value="Ulozit" name="save">';
$container .= '</form>';

return $container;