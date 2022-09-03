<?php
  class TransactionD { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getTransactions(){
      $this->db->query('SELECT * FROM outlet_transactions');
      
      $results = $this->db->resultSet(); 

      return $results;
    }



    
  }
