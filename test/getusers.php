<?php 

    require_once "App/autoload.php";
    $user = new User($db);
    $getUsers = $user->getUsers();

     foreach($getUsers as $user) {
        echo $user['fullname'] . '<br>';
     }

