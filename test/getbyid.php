<?php 

    require_once "App/autoload.php";
    $user = new User($db);
    $getdata = $user->getById(3);


     echo $getdata['fullname'];
    

