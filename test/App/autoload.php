<?php 

/**
 *   AutoLoad Database and Connection Method
 */
require_once "App/DatabaseConnection.php";
require_once "App/User.php";
require_once "App/ElectronicProduct.php";
$db = new DatabaseConnection();
$db->connect();


?>