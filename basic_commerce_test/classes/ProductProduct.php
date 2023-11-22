<?php 

$filepath = realpath(dirname(__FILE__));

include_once($filepath.'/../classes/Interface/DiscountInterface.php');
include_once($filepath.'/../classes/Product.php');




/**
 * 
 * ============================ Israel Akinsola  ====================== 
 *  22-10-23
 *  Create ElectronicProduct Class
 */
class ProductDiscount implements DiscountInterface
{
      private $brand;
      private $price;


    public function __construct($brand, $price) {
          $this->brand = $brand;
          $this->price = $price;
    }
     
    /**
     * Undocumented function
     *
     * @param int $price
     * @return void
     */
     public function getDiscount() {
            // Apply Discount by User Type
            if($this->brand == 'Samsung') {
                 $discount =  $this->newSamsungDiscount();
            } elseif($this->brand == 'customer') {
                 $discount = $this->getIphoneDiscount();
            } else {
                 $discount = 0;
            }
            return  $this->price * $discount;
     }

     public function newSamsungDiscount() {
         return 0.5;
     }

     public function getIphoneDiscount() {
         return 0.9;
     }

     public function product_category() {
          return "electronics";
     }
}