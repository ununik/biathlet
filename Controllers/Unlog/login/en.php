<?php
$login = '';
$err = array();

if (isset($_POST['loginFrom'])) {
    $login = \Library\Forms\safeText($_POST['login']);
    $password = \Library\Forms\safeText($_POST['password']);
    
    if (strlen($login) == 0) {
        $err[] = Translation::t($page->_language, 'Login is mandatory field.');
    }
    
    if (strlen($password) == 0) {
        $err[] = Translation::t($page->_language, 'Password is mandatory field.');
    }
    
    if (count($err) == 0) {
        if ($user->makeLogin($login, $password)) {
            header('Location: '. $page->getLink(101));
        } else {
            $err[] = Translation::t($page->_language, 'Wrong login or password');
        }
    }
}