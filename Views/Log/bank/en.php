<?php
$container = '<h3>'.Translation::t($page->_language, 'Bank').'</h3>';

$container .= '<h4>'.Translation::t($page->_language, 'Money operations').'</h4>';
$container .= '<table class="bankTable">';
$container .= '<tr><th>date</th><th>action</th>';
$container .= '<th>costs</th>';
$container .= '<th>revenues</th></tr>';

foreach ($bank->getAllEntries($user->_id) as $entry) {
	$container .= '<tr>';
	
	$container .= '<td class="datum">';
	$container .= date('j. n. Y - H:i:s', $entry['timestamp']);
	$container .= '</td>';
	
	$container .= '<td>';
	$container .= $entry['title'];
	$container .= '</td>';
	
	if ($entry['revenue'] > 0) {
		$container .= '<td>';
		$container .= '</td>';
		$container .= '<td class="positive">';
		$container .= \Library\Extra\moneyFormat($entry['revenue']);
		$container .= '</td>';
	} else {
		$container .= '<td class="negative">';
		$container .= \Library\Extra\moneyFormat($entry['revenue']);
		$container .= '</td>';
		$container .= '<td>';
		$container .= '</td>';
	}
	
	$container .= '</tr>';
}
$container .= '</table>';

return $container;