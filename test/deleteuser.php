<?php 

    require_once "App/autoload.php";
    $user = new User($db);
    $create = $user->deleteUsers(5);
    echo "User Deleted Successfully";

