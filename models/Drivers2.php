<?php
  class Drivers2 { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getTheDrivers() {
      date_default_timezone_set('Asia/Kolkata');
      $today = date('Y-m-d');
      $this->db->query('SELECT  drivers.driver_id, drivers.name, drivers.address, drivers.contact_number, drivers.email, availabiity.availability FROM drivers LEFT JOIN availabiity ON drivers.driver_id = availabiity.driver_id WHERE availabiity.availability = "1" AND availabiity.date = :today ORDER BY drivers.name ASC');
      /*SELECT drivers.driver_id, drivers.name, drivers.address, drivers.contact_number, drivers.email FROM drivers WHERE drivers.status ="Available"*/
      //$this->db->bind(':id', $id);
      /*No need to bind?*/ 
      $this->db->bind(':today', $today);

      $results = $this->db->resultSet(); 
      //resultSet() is a function in Database.php to get results for the values (query and bindings) of Current object's db variable.

      return $results;
    }


   
  }
