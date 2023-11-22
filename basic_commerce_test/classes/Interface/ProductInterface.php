<?php

interface ProductInterface
{
     public function productInsert($data, $file);

     public function getAllProduct();

     public function getProById($proid);

     public function productUpdate($data, $file, $proid);

     public function getNewProduct();

}