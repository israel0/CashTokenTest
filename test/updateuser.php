<?php 
    require_once "App/autoload.php";
    $user = new User($db);
    $create = $user->updateUsers("Akinsola Oluwaseye Israel", "seyeakinsola@gmail.com", 1 ,1);
    echo "User Update Successfully";

