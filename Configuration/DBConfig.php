<?php
define('DB_NAME', '');
define('DB_HOST', 'localhost');
if ($_SERVER["REMOTE_ADDR"] == '127.0.0.1') {
    define('DB_LOGIN', 'root');
} else {
    define('DB_LOGIN', '');
}
define('DB_PASSWORD', '');