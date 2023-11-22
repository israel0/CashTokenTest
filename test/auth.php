<?php 

//  Start Session
 session_start();

 require_once "App/autoload.php";

 // 
 if($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = $_POST["email"];
      $password = $_POST["password"];
      
      $auth = new User($db);
      $Authenticated =  $auth->authenticate($email, $password);

      if($Authenticated) {
            $_SESSION["user_id"] = $auth->getId();
            $_SESSION["fullname"] = $auth->getFullname();
            header("location: dashboard.php");
            exit();
      } else {
        $_SESSION["login_error"]  = "Invalid Login Credentials";
        header("location: auth.php");
        exit();
      }

 } else {
     echo "Login Failed to get Request";
 }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
</body>
</html>


<form action="login" method="post">
        <input type="email" name="email">
        <input type="password" name="password">
        <input type="submit">
</form>





