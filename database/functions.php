<?php

    require ('database/DBController.php');

    require ('database/product.php');

    require ('database/Cart.php');

    $db =new DBController(); 


    $product= new Product($db); 


    $product->getData();


   $Cart = new Cart($db);

