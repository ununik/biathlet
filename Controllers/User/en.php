<?php
if (!isset($_GET['user']) || $_GET['user'] == '' || $_GET['user'] == 0) {
    header('Location: '. $page->getLink($page->getHomepageId()));
}

$profil = new User($_GET['user']);
if ($profil === false) {
    header('Location: '. $page->getLink($page->getHomepageId()));
}