<?php 

 require_once "App/autoload.php";

 $products = new ElectronicProduct("customer");
 $products->createProduct($db, "Ori Frame" , 2000, 'This is an original oriframe');

 echo "Product Created Successfully";
 