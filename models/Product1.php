<?php
  class Product1 { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }
      /*get all products; so no id needed*//*$id*/
    public function getTheProducts(){
      $this->db->query('SELECT products.product_id, products.name, products.maximum_buying_rate, products.selling_rate FROM products');
      //$this->db->bind(':id', $id);
      /*No need to bind?*/ 
      

      $results = $this->db->resultSet(); 
      //resultSet() is a function in Database.php to get results for the values (query and bindings) of Current object's db variable.

      return $results;
    }
    public function updateTheRates($data){
 
      $this->db->query('UPDATE products SET maximum_buying_rate=:mbuy_rate, selling_rate=:sell_rate WHERE product_id=:product_id ');
     //Bind values
      $this->db->bind(':product_id', $data['product_id']);
      $this->db->bind(':mbuy_rate', $data['maximum_buying_rate']);
      $this->db->bind(':sell_rate', $data['selling_rate']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function findproductByid($product_id){
      $this->db->query('SELECT * FROM products WHERE product_id = :product_id');
      // Bind value
      $this->db->bind(':product_id', $product_id);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
  }
