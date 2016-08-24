<?php
$container = '<h3>'.$equipment['title'].'</h3>';
$container .= '<table>';
if (isset($producer['title']) && $producer['title'] != '') {
	$container .= '<tr><td>Producer</td><td>';
	if ($producer['link'] != '') {
		$container .= '<a href="'.$producer['link'].'" target="_blank">';
		$container .= $producer['title'];
		$container .= '</a>';	
	} else {
		$container .= $producer['title'];
	}
	$container .= '</td></tr>';
}
if (isset($category['title']) && $category['title'] != '') {
	$container .= '<tr><td>Category</td><td>';
	$container .= $category['title'];
	$container .= '</td></tr>';
}
$container .= '</table>';

return $container;