<?php

require_once "Interface/UserInterface.php";
/**
 * User class Definition
 */
class User implements UserInterface
{
     private $id;

     private $email;

     private $password;

     private $user_type;

     private  $fullname;

     private $db;

     /**
      * User Constructor function
      *
      * @param DatabaseConnection $db
      */
     public function __construct(DatabaseConnection $db) {
         $this->db = $db;
     }

     public function authenticate($email, $password) {
            $emailvalidate = $this->EmailUserExist($email);
            if($emailvalidate && $this->verify($password , $emailvalidate["password"])) {
                   return true;
            }
            return false;
     }

     public function getId() {
           return $this->id;
     }

     public function getFullname() {
        return $this->fullname;
  }

     public function EmailUserExist($email) {
          $sql = "SELECT * FROM users WHERE email = ?";
          $stmt = $this->db->getConnection()->prepare($sql);
          $stmt->execute([$email]);
          return $stmt->fetch();
     }

     // Verify Password Input
     public function verify($tocheckpassword,$hashpassword){
          return  password_verify($tocheckpassword,$hashpassword);
     }

     public function password_encrypted($password) 
     {
         return password_hash($password, PASSWORD_DEFAULT);
     }

     // Get Users
     public function getUsers() {
          $sql = "SELECT * FROM users";
          $stmt = $this->db->getConnection()->prepare($sql);
          $stmt->execute();
          return $stmt->fetchAll();
     }


    /**
     * Create User function
     *
     * @param string $fullname
     * @param string $email
     * @param string $password
     * @param int $user_type
     * @return void
     */
     public function createUsers($fullname, $email, $password, $user_type) {
           $sql = 'INSERT INTO users (fullname, email, password, user_type) VALUES (?,?,?,?)';
           $stmt = $this->db->getConnection()->prepare($sql);
           $params = [
               $fullname, $email, $this->password_encrypted($password), $user_type
           ];
           $stmt->execute($params);
     }

     /**
      * Update User function
      *
     * @param string $fullname
     * @param string $email
     * @param string $password
     * @param int $user_type
      * @return void
      */
     public function updateUsers($fullname, $email, $user_type, $id) {
        $sql = 'UPDATE users SET fullname = ?, email = ?, user_type = ? WHERE id = ?';
        $stmt = $this->db->getConnection()->prepare($sql);
        $params = [
            $fullname, $email, $user_type, $id
        ];
        $stmt->execute($params);
     }

     /**
      * Delete User function
      *
      * @param int $user_id
      * @return void
      */
     public function deleteUsers($user_id) {
            $sql = 'DELETE FROM users WHERE id = ?';
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute([$user_id]);
     }

    /**
     * Get Single User function
     *
     * @param int $user_id
     * @return void
     */
     public function getById($user_id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetch();
     }

}