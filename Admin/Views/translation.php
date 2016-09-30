<?php
$container = 'Překlady';
$container .= '<table>';
$container .= '<tr><th>original</th><th>preklad</th><th></th></tr>';
foreach ($translation->showAllWords('cs') as $translationTable) {
	$container .= '<tr>';
	$container .= '<td>';
	$container .= $translationTable['original'];
	$container .= '</td>';
	$container .= '<td>';
	$container .= '<input type="text" value="';
	$container .= $translationTable['translated'];
	$container .= '" name="'.$translationTable['id'].'" id="translation-'.$translationTable['id'].'">';
	$container .= '</td>';
	$container .= '<td><input type="submit" value="Ulozit" onclick="saveTranslation(\''.$translationTable['id'].'\')"></td>';
	$container .= '</tr>';
}
$container .= '</table>';

return $container;