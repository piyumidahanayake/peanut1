<?php
  class Transaction1 { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }
      /*get all products; so no id needed*//*$id*/
    public function insertTransact($data){
      $this->db->query('INSERT INTO outlet_transactions (transaction_id, transaction_date, outlet_id, entered_date, amount_paid, invoice_no) VALUES (:transaction_id, CURRENT_TIMESTAMP, :outlet_id, :entered_date, :amount_paid, :invoice_no)');
      $this->db->bind(':transaction_id',$data['transaction_id']);
      $this->db->bind(':outlet_id',$_SESSION['user_id']);
      $this->db->bind(':entered_date',$data['entered_date']);
      $this->db->bind(':amount_paid',$data['amount_paid']);
      $this->db->bind(':invoice_no',$data['invoice_no']);
       
      
      /* Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }*/

      if($this->db->execute()){
        $this->db->query('UPDATE outlet_payment SET payment_status="Paid", paid_date=CURRENT_TIMESTAMP  WHERE outlet_payment.order_id =:invoice_no and outlet_payment.toatal_amount=outlet_payment.paid_amount');
        $this->db->bind(':invoice_no',$data['invoice_no']);
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }

    }


    public function getOrdersToPay(){
      $this->db->query('SELECT * FROM outlet_payment /*WHERE outlet_payment.payment_status IN ("Not_Paid", "Late", "Suspend")*/');
      
      $results = $this->db->resultSet(); 

      return $results;
    }


    
  }
