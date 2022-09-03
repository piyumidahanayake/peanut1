<?php
  class FilterPaym { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }
      /*get all products; so no id needed*//*$id*/
    

    public function getOrders(){
      //Toatal in db;
      $this->db->query('SELECT * FROM outlet_payment');
      
      $results = $this->db->resultSet(); 

      return $results;
    }


    public function getOrders001($data){
      //Toatal in db;
      $this->db->query('SELECT * FROM outlet_payment WHERE outlet_payment.payment_status = :status1');
      $this->db->bind(':status1', strval($data['status']));
      $results = $this->db->resultSet(); 

      return $results;
    }


    public function getOrders010($data){
      //Toatal in db;
      $this->db->query('SELECT * FROM outlet_payment LEFT JOIN orders ON outlet_payment.order_id =  orders.order_id WHERE orders.order_date = :date1');
      $this->db->bind(':date1', $data['ordered_date']);
      $results = $this->db->resultSet(); 

      return $results;
    }


    public function getOrders011($data){
      //Toatal in db;
      $this->db->query('SELECT * FROM outlet_payment LEFT JOIN orders ON outlet_payment.order_id =  orders.order_id WHERE orders.order_date = :date1 AND outlet_payment.payment_status = :status1');
      $this->db->bind(':date1', $data['ordered_date']);
      $this->db->bind(':status1', strval($data['status']));
      $results = $this->db->resultSet(); 

      return $results;
    }


    public function getOrders100($data){
      //Toatal in db;
      $this->db->query('SELECT * FROM outlet_payment WHERE outlet_payment.outlet_id = :ouid');
      $this->db->bind(':ouid', strval($data['outlet_id']));
      $results = $this->db->resultSet(); 

      return $results;
    }


    public function getOrders101($data){
      //Toatal in db;
      $this->db->query('SELECT * FROM outlet_payment WHERE  outlet_payment.outlet_id = :ouid AND outlet_payment.payment_status = :status1');
      $this->db->bind(':ouid', strval($data['outlet_id']));
      $this->db->bind(':status1', strval($data['status']));
      $results = $this->db->resultSet(); 

      return $results;
    }


    public function getOrders110($data){
      //Toatal in db;
      $this->db->query('SELECT * FROM outlet_payment LEFT JOIN orders ON outlet_payment.order_id =  orders.order_id WHERE orders.order_date = :date1 AND outlet_payment.outlet_id = :ouid');
      $this->db->bind(':date1', $data['ordered_date']);
      $this->db->bind(':ouid', strval($data['outlet_id']));
      $results = $this->db->resultSet(); 

      return $results;
    }


    public function getOrders111($data){
      //Toatal in db;
      $this->db->query('SELECT * FROM outlet_payment LEFT JOIN orders ON outlet_payment.order_id =  orders.order_id WHERE orders.order_date = :date1 AND outlet_payment.outlet_id = :ouid AND outlet_payment.payment_status = :status1');
      $this->db->bind(':date1', $data['ordered_date']);
      $this->db->bind(':ouid', strval($data['outlet_id']));
      $this->db->bind(':status1', strval($data['status']));
      $results = $this->db->resultSet(); 

      return $results;
    }


    public function getSelOrdOutlet($oid) {
      $this->db->query('SELECT * FROM outlets WHERE outlets.outlet_id = :ouid');
      $this->db->bind(':ouid', $oid);

      $row = $this->db->single();

      return $row;

    }


    public function getOrdersSearch($data){
      //Toatal in db;
      $keyword="%".$data['searchterm']."%";
      $this->db->query('SELECT * FROM outlet_payment WHERE (outlet_id LIKE :st OR order_id LIKE :st OR toatal_amount LIKE :st OR payment_status LIKE :st OR paid_date LIKE :st)');
      $this->db->bind(':st', $keyword);
      $results = $this->db->resultSet(); 

      return $results;
    }
  





    
  }
