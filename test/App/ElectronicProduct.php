<?php 

require_once "Interface/DiscountInterface.php";
require_once "Product.php";

class ElectronicProduct extends Product implements DiscountInterface
{
     private $id;
     private $product_name;
     private $product_price;
     private $product_description;
     private $product_category;
     private $user_type;


    public function __construct($user_type) {
          $this->user_type = $user_type;
    }


    /**
     * Create Product function
     *
     * @param string $product_name
     * @param int $product_price
     * @param string $product_description
     * @return void
     */

     public function createProduct($db, $product_name, $product_price, $product_description) {
          
         $productData = [
          "product_name" =>  $product_name,
          "product_price"=> $product_price,
          "product_description" => $product_description,
          "product_category" => $this->product_category(),
          "discount" => $this->getDiscount($product_price),
          "user_type" => $this->getUserType()
         ];

          $product = new Product($db);
          $product->createProducts($productData);
     }

     
    /**
     * Undocumented function
     *
     * @param int $price
     * @return void
     */
     public function getDiscount($price) {
            // Apply Discount by User Type
            if($this->user_type == 'admin') {
                 $discount =  $this->newUserDiscount();
            } elseif($this->user_type == 'customer') {
                 $discount = $this->existingUserDiscount();
            } else {
                 $discount = 0;
            }
            return  $price * $discount;
     }

     public function getUserType() {
          return $this->user_type;
     }

     public function newUserDiscount() {
         return 0.5;
     }

     public function existingUserDiscount() {
         return 0.9;
     }

     public function product_category() {
          return "electronics";
     }
}