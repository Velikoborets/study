
<?php

session_start();

if ($_SESSION['num'] == true) {
    echo 'hello' . '<br>';
}

echo password_hash('12345', PASSWORD_DEFAULT);

?>