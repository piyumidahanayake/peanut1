<?php
require_once "DBController.php";
class Food extends DBController{	
   
	

	function getAllProduct()
    {
        $query = "SELECT product_id, name, type, description, selling_rate, images FROM products";
        
        $productResult = $this->getDBResult($query);
        

        return $productResult;
    }
	
}
?>