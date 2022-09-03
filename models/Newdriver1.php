<?php
  class Newdriver1 { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }
 
   
    public function addDriver($data){
 //Bind values
      $cname = $this->getCC($data['colcen']);
      $this->db->query('INSERT INTO user_request (requester_name, email, type, Contact_Number, center_name, address, district) VALUES (:name, :email, "driver", :contact_number, :cc, :address, " ")');
      $x = "Intermediate Transport operator";
      $this->db->bind(':name', $x);
      $this->db->bind(':cc', $data['name']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':contact_number', $data['contact_number']);
      $this->db->bind(':email', $data['email']);
      //$this->db->bind(':initial_username', $data['initial_username']);
      //$this->db->bind(':initial_password', $data['initial_password']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  

    public function checkDriver($name){
      $keyword="%".$name."%";
      $this->db->query('SELECT * FROM drivers WHERE drivers.name LIKE :nmkw');
      $this->db->bind(':nmkw', $keyword);
      
      $row = $this->db->single();

      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }

    }

    
    public function checkCC($ccid){
      $this->db->query('SELECT * FROM collection_center WHERE collection_center.collection_center_id = :ccid');
      $this->db->bind(':ccid', $ccid);
      
      $row = $this->db->single();

      if($this->db->rowCount() > 0){
        return false;
      } else {
        return true;
      }

    }

     
    public function getCC($ccid){
      $this->db->query('SELECT * FROM collection_center WHERE collection_center.collection_center_id = :ccid');
      $this->db->bind(':ccid', $ccid);
      
      $row = $this->db->single();

      if($this->db->rowCount() > 0){
        return $row->collection_center_name;
      } else {
        return $ccid;
      }

    }
  }
