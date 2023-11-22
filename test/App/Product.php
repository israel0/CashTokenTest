<?php

require_once "Interface/ProductInterface.php";
/**
 * Product class Definition
 */
class Product implements ProductInterface
{

     private $db;

     /**
      * Product Constructor function
      *
      * @param DatabaseConnection $db
      
      */

      public function __construct($db) {
          $this->db = $db;
      }

     // Get Products
     public function getProducts() {
          $sql = "SELECT * FROM Products";
          $stmt = $this->db->getConnection()->prepare($sql);
          $stmt->execute();
          return $stmt->fetchAll();
     }


    /**
     * Create Product function
     *
     * @param array $product
     * @return void
     */
     public function createProducts($product) {
           $sql = 'INSERT INTO products (product_name, product_price, product_description, product_category, discount , user_type) VALUES (?,?,?,?,?,?)';
           $stmt = $this->db->getConnection()->prepare($sql);
           $params = [
                    $product['product_name'],
                    $product['product_price'],
                    $product['product_description'],
                    $product['product_category'],
                    $product['discount'],
                    $product['user_type']
           ];
           $stmt->execute($params);
     }



}