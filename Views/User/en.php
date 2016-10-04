<?php
   $container = '<h3>' . $profil->getFullName().'</h3>';
   $container .= $userItem->showWeapon(
	$page->_language,
	$weapon['svgImage'],
	$weapon['svgImage2'],
	$stock['svgImage'],
	$harness['svgImage'],
	$diopter['svgImage'],
	$buttPlate['svgImage'],
   	Partners::getStickerFromId($profil->_sticker),
   	'/uploads/images/equipment/background.svg',
   	'userWeapon'
);
   return $container;