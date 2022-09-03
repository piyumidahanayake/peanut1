<?php
  class Productm { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }
      /*get all products; so no id needed*//*$id*/
    public function getMainProducts(){
      $this->db->query('SELECT products.product_id, products.name, products.description FROM products');
      

      $results = $this->db->resultSet(); 
      //resultSet() is a function in Database.php to get results for the values (query and bindings) of Current object's db variable.

      return $results;
    } 
    public function addProducts($data){
 //Bind values
 
      $this->db->query('INSERT INTO products(name, type, description, maximum_buying_rate, selling_rate) VALUES (:name, :type, :description, 0, 0)');
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':description', $data['description']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    public function checkName($name){
      $keyword="%".$name."%";
      $this->db->query('SELECT * FROM products WHERE products.name LIKE :nmkw');
      $this->db->bind(':nmkw', $keyword);
      
      $row = $this->db->single();

      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }

    }

    
    public function getProductsSearch($data){
      //Toatal in db;
      $keyword="%".$data['searchterm']."%";
      $this->db->query('SELECT * FROM products WHERE (product_id LIKE :st OR name LIKE :st OR type LIKE :st OR description LIKE :st)');
      $this->db->bind(':st', $keyword);
      $results = $this->db->resultSet(); 

      return $results;
    }
    /*
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
    }*/
  }
