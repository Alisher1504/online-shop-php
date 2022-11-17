<?php
session_start();

if(isset($_SESSION['auth'])){

    unset($_SESSION['auth']);
    unset($_SESSION['auth_users']);

    $_SESSION['message'] = 'logged out successfully';

}

header('Location: index.php');

?>