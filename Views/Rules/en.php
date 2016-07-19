<?php
$rules = new Rules();
$container = '<ul>';
foreach ($rules->getAllRules($page->_language) as $rule) {
    $container .= '<li>'.$rule['text'].'</li>';
}
$container .= '</ul>';

return $container;