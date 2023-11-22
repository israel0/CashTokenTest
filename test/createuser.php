<?php

    require_once "App/autoload.php";
    $user = new User($db);
    $create = $user->createUsers("Akinsola Oluwaseye Israel", "seyeakinsola@gmail.com", "password" , 1);
    echo "User Created Successfully";


