<?php
$container = '<h3>'.$venue['title'].'</h3>';
$container .= 'Country: '. $country[$page->_language];
if ($venue['map'] != '') {
    $container .= '<div class="venueMap" id="venueMap" style="background-image: url('.URL_PATH.$venue['map'].')"></div>';
    foreach ($venueClass->getTracksForVenue($venue['id'], $page->_language) as $track) {
        $container .= '<div style="background-color: #'.$track['color'].'" class="trackColor" onclick="showMap(\''.URL_PATH.$track['map'].'\', \''.$track['id'].'\')">'.$track['length'].'</div>';
    }
}

return $container;