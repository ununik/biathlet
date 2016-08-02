<?php
   $container = '<h3>' . $profil->getFullName().'</h3>';
   $container .= $userItem->showWeapon($page->_language, $stock['svgImage'], $harness['svgImage']);
   
   return $container;