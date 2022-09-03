<?php
  class Colcen2 { 

    private $db;
    

    public function __construct(){
      $this->db = new Database;
    }
  
    public function getSelectedCCdetails($data){
     //$this->db->bind($data['collection_center_name'], ':collection_center_name');
    
      $this->db->query('SELECT collection_center.collection_center_name, collection_center.address, collection_center.contact_number, collection_center.manager_name FROM collection_center WHERE collection_center_id=100');
      //$this->db->bind(':collection_center_id', $data['collection_center_id']);
      //No need to bind?
      

      $results = $this->db->resultSet(); 
      //resultSet() is a function in Database.php to get results for the values (query and bindings) of Current object's db variable.

      return $results;
    }/*
    public function getSelectedCCdetails($data){
      $this->db->query('SELECT * FROM collection_center WHERE collection_center_id = :collection_center_id');
      // Bind value
      $this->db->bind(':collection_center_id', $data['collection_center_id']);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return $row;
      } else {
        return false;
      }
    }*/

    public function getSelCCdetails($id) {
      $this->db->query('SELECT * FROM collection_center WHERE collection_center_id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }
   
  }
