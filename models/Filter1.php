<?php
  class Filter1 { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function summaryall(){
      $this->db->query('SELECT * FROM collection_center_requests WHERE collection_center_requests.request_status = "Completed"');
      

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function summarytodate($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE date_of_request <= :to AND collection_center_requests.request_status = "Completed"');
      $this->db->bind(':to', $data['to_date']);
    
      

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function summaryfromdate($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE date_of_request >= :from AND collection_center_requests.request_status = "Completed"');
      $this->db->bind(':from', $data['from_date']);
    
      

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    
    public function summaryfromtodate($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE date_of_request >= :from AND date_of_request  <= :to AND collection_center_requests.request_status = "Completed"');
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      

      $results = $this->db->resultSet(); 
      

      return $results;
    }


    public function summarycc($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE collection_center_requests.collection_center_id = :ccid AND collection_center_requests.request_status = "Completed"');
      $this->db->bind(':ccid', $data['collection_center_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }


    public function summarycctodate($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE date_of_request <= :to AND collection_center_requests.collection_center_id = :ccid AND collection_center_requests.request_status = "Completed"');
      $this->db->bind(':to', $data['to_date']);
      $this->db->bind(':ccid', $data['collection_center_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function summaryccfromdate($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE date_of_request >= :from AND collection_center_requests.collection_center_id = :ccid AND collection_center_requests.request_status = "Completed"');
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':ccid', $data['collection_center_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function summaryccfromtodate($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE date_of_request >= :from AND date_of_request <= :to AND collection_center_requests.collection_center_id = :ccid AND collection_center_requests.request_status = "Completed"');
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $this->db->bind(':ccid', $data['collection_center_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function summaryrall(){
      $this->db->query('SELECT * FROM collection_center_requests WHERE collection_center_requests.request_status = "Rejected"');
      

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function summaryrtodate($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE date_of_request <= :to AND collection_center_requests.request_status = "Rejected"');
      $this->db->bind(':to', $data['to_date']);
    
      

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function summaryrfromdate($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE date_of_request >= :from AND collection_center_requests.request_status = "Rejected"');
      $this->db->bind(':from', $data['from_date']);
    
      

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    
    public function summaryrfromtodate($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE date_of_request >= :from AND date_of_request < :to AND collection_center_requests.request_status = "Rejected"');
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      

      $results = $this->db->resultSet(); 
      

      return $results;
    }


    public function summaryrcc($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE collection_center_requests.collection_center_id = :ccid AND collection_center_requests.request_status = "Rejected"');
      $this->db->bind(':ccid', $data['collection_center_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }


    public function summaryrcctodate($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE date_of_request <= :to AND collection_center_requests.collection_center_id = :ccid AND collection_center_requests.request_status = "Rejected"');
      $this->db->bind(':to', $data['to_date']);
      $this->db->bind(':ccid', $data['collection_center_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function summaryrccfromdate($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE date_of_request >= :from AND collection_center_requests.collection_center_id = :ccid AND collection_center_requests.request_status = "Rejected"');
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':ccid', $data['collection_center_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function summaryrccfromtodate($data){
      $this->db->query('SELECT * FROM collection_center_requests WHERE date_of_request >= :from AND date_of_request <= :to AND collection_center_requests.collection_center_id = :ccid AND collection_center_requests.request_status = "Rejected"');
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $this->db->bind(':ccid', $data['collection_center_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    

   
  }
