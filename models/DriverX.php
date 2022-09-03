<?php
  class DriverX { 

    private $db;
    

    public function __construct(){
      $this->db = new Database;
    }
  

    public function getSelDriver($id) {
      date_default_timezone_set('Asia/Kolkata');
      $today = date('Y-m-d');
      $this->db->query('SELECT * FROM drivers LEFT JOIN availabiity ON drivers.driver_id = availabiity.driver_id WHERE availabiity.date = :today AND drivers.driver_id = :id ');
      $this->db->bind(':id', $id);
      $this->db->bind(':today', $today);
      
      $row = $this->db->single();

      return $row;
    }
   
  }
