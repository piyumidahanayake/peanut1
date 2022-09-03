<?php
  class Selectedorder1 { 

    private $db;
    

    public function __construct(){
      $this->db = new Database;
    }
  

    public function getSelOrdTrans($id) {
      $this->db->query('SELECT * FROM outlet_transactions WHERE invoice_no = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();
  
      return $row;

    }


    public function setAsCompleted($id){
 
      $this->db->query('UPDATE outlet_payment SET payment_status = "Completed" WHERE order_id=:order_id ');
     //Bind values
      $this->db->bind(':order_id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function checkTID($id) {
      $this->db->query('SELECT * FROM outlet_transactions WHERE invoice_no = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();
      
      $tid = $row->transaction_id;
      
      return $tid;
    }

   
  }
