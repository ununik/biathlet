<?php
define('DB_NAME', 'edelbellis');
define('DB_HOST', 'localhost');
if ($_SERVER["REMOTE_ADDR"] == '127.0.0.1') {
    define('DB_LOGIN', 'root');
} else {
    define('DB_LOGIN', 'ununik');
}
define('DB_PASSWORD', 'Unununium111');