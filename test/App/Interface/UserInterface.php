<?php

interface UserInterface
{
     public function createUsers($fullname, $email, $password, $user_type);
     public function updateUsers($fullname, $email, $user_type, $id);
     public function deleteUsers($user_id);
     public function getById($user_id);
     public function getUsers();

}