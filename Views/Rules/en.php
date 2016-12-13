<?php
$container = '<h3>'.Translation::t($page->_language, 'Rules').'</h3>';
$rules = new Rules();
$container .= '<ul>';
foreach ($rules->getAllRules($page->_language) as $rule) {
    $container .= '<li>'.$rule['text'].'</li>';
}
$container .= '</ul>';

return $container;