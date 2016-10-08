<?php
$container = '<h3>Biathletes</h3>';

$search = '<form action="" method="get">';
$search .= '<input type="text" placeholder="search..." name="search">';
$search .= '<input type="submit" value="search">';
$search .= '</form>';

if ($issetSearch === true) {
    $search .= 'SEARCH: <b>'.$searchWord.'</b>';
    $profils = $user->searchUser($words, $columnsInTable);
    if (count($profils) > 0) {
        $search .= '<table>';
        $search .= '<tr>';
        $search .= '<td>Name</td>';
        $search .= '</tr>';
       foreach ($profils as $profil) {
          $search .= '<tr>';
          if ($profil['id'] == $user->_id) {
          	$search .= '<td class="table_message"></td>';
          } else {
          	$search .= '<td class="table_message"><a href="'.$page->getLink(118).$profil['login'].'/"><img src="http://localhost/biathlete/images/icons/messageReaded.svg"></a></td>';
          }
          $search .= '<td class="table_name"><a href="'.$page->getLink(116).$profil['login'].'/">'.$user->getFullName($profil['id']).'</a></td>';
          $search .= '</tr>';
       }
     } else {
        $search .= 'No results';
     }
}

$container .= $search;

return $container;