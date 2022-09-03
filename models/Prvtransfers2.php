<?php
  class Prvtransfers2 { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }
      /*get all products; so no id needed*/ /*$id*/
    public function getTheRequests(){
      $this->db->query('SELECT collection_center_requests.request_id, collection_center_requests.collection_center_id, collection_center_requests.amount_requested, collection_center_requests.date_of_request, collection_center_requests.request_status, collection_center_requests.transferred_amount FROM collection_center_requests WHERE collection_center_requests.request_status IN ("Rejected")');
      //$this->db->bind(':id', $id);
      /*No need to bind?*/ 
      

      $results = $this->db->resultSet(); 
      //resultSet() is a function in Database.php to get results for the values (query and bindings) of Current object's db variable.

      return $results;
    }

   
  }
