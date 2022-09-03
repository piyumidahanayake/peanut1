<?php
  class TransferD { 

    private $db;
    

    public function __construct(){
      $this->db = new Database;
    }
  

    public function getSelTran1($id) {
      $this->db->query('SELECT * FROM collection_center_requests WHERE request_id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function getSelTran2($id) {
      $this->db->query('SELECT collection_center_id FROM collection_center_requests WHERE request_id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      $row1 = $this->getSelTran3($row);

      return $row1;

    }

    public function getSelTran3($ccid) {
      $this->db->query('SELECT * FROM collection_center_last_transfer WHERE collection_center_id = :ccid');
      $this->db->bind(':ccid', $ccid->collection_center_id);

      $row = $this->db->single();

      return $row;
    }
   
  }
