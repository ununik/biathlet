<?php
unset($_SESSION['biathlete_user']);
header('Location: '. $page->getLink(2));