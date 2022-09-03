<?php
  class Ccrequest1 { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }
      /*get all products; so no id needed*/ /*$id*/
    public function getTheRequests(){
      $this->db->query('SELECT collection_center_requests.request_id, collection_center_requests.collection_center_id, collection_center_requests.amount_requested, collection_center_requests.date_of_request, collection_center_requests.request_status, collection_center_requests.transferred_amount FROM collection_center_requests WHERE collection_center_requests.request_status IN ("Early","New")');
      //$this->db->bind(':id', $id);
      /*No need to bind?*/ 
      

      $results = $this->db->resultSet(); 
      //resultSet() is a function in Database.php to get results for the values (query and bindings) of Current object's db variable.

      return $results;
    }

    public function setAsViewed(){
 
      $this->db->query('UPDATE collection_center_requests SET request_status="Early" WHERE request_status = "New"');
     //Bind values
      //$this->db->bind(':request_id', $data['request_id']);
      //$this->db->bind(':request_status', $data['request_status']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

   
  }
