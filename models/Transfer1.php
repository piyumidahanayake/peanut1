<?php
  class Transfer1 { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function UpdateTransAmount($data){
 
      $this->db->query('UPDATE collection_center_requests SET transferred_amount=:transferred_amount, request_status=:request_status, transferred="1", transfer_date=CURRENT_TIMESTAMP WHERE request_id = :request_id');
     //Bind values
      $this->db->bind(':request_id', $data['request_id']);
      $this->db->bind(':transferred_amount', $data['transferred_amount']);
      $this->db->bind(':request_status', $data['request_status']);

      // Execute
      if($this->db->execute()){
        $row = $this->findrequestByid($data['request_id']);
        $this->db->query('UPDATE collection_center_last_transfer SET last_transfer_amount = :new_amount, last_transfer_date = CURRENT_TIMESTAMP, balance_of_last_transfer = 0 WHERE collection_center_id = :cc_id');
        $this->db->bind(':cc_id', $row->collection_center_id);
        $this->db->bind(':new_amount', $row->transferred_amount);
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
    }
    public function findrequestByid($request_id){
      $this->db->query('SELECT * FROM collection_center_requests WHERE request_id = :request_id');
      // Bind value
      $this->db->bind(':request_id', $request_id);

      $row = $this->db->single();

      return $row;
    }
    public function deleteTransfer($data){
 
      $this->db->query('UPDATE collection_center_requests SET request_status=:request_status WHERE request_id = :request_id');
     //Bind values
      $this->db->bind(':request_id', $data['request_id']);
      $this->db->bind(':request_status', $data['request_status']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }
