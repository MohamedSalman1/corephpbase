<?php

    include_once('includes/functions.php');
    include_once('controllers/users.php');

    if (isset($_POST['signup_token'])) {
        $obj = new Users();
        echo $obj->saveUser();
        die;
    }
