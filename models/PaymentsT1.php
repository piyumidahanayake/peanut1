<?php
  error_reporting(~E_NOTICE); //Notice type errors - prevented displaying
  class PaymentsT1 { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }
      /*get all products; so no id needed*//*$id*/
    

    public function getNotPaidOrders(){
      //Toatal in db;
      $this->db->query('SELECT outlet_payment.order_id, outlet_payment.outlet_id, outlet_payment.payment_status, outlet_payment.toatal_amount FROM outlet_payment WHERE outlet_payment.payment_status IN ("Not Paid","Late","Suspend") ORDER BY CASE WHEN payment_status LIKE "Suspend" THEN 1 END DESC, CASE WHEN payment_status LIKE "Late" THEN 2 END DESC, CASE WHEN payment_status LIKE "Not Paid" THEN 3 END DESC');
      
      $results = $this->db->resultSet(); 

      return $results;
    }

    public function getPaidOrders(){
      $this->db->query('SELECT outlet_payment.order_id, outlet_payment.outlet_id, outlet_payment.payment_status, outlet_payment.toatal_amount FROM outlet_payment WHERE outlet_payment.payment_status IN ("Paid")');
      
      $results = $this->db->resultSet(); 

      return $results;
    }

    public function getCompOrders(){
      $this->db->query('SELECT outlet_payment.order_id, outlet_payment.outlet_id, outlet_payment.payment_status, outlet_payment.toatal_amount FROM outlet_payment WHERE outlet_payment.payment_status IN ("Completed")');
      
      $results = $this->db->resultSet(); 

      return $results;
    }


    public function setStateL(){
      $this->db->query('SELECT * FROM orders WHERE order_date < :date1 AND order_date > :date2 ORDER BY order_date ASC');
      $date1 = Date('y:m:d',strtotime('-32 days'));
      $date2 = Date('y:m:d',strtotime('-46 days'));
      $this->db->bind(':date1', $date1);
      $this->db->bind(':date2', $date2);
     
      $results = $this->db->resultSet();

      $data = [
        'results' => $results
      ];
      $counter = 0;
      $countern = 0;
      //print_r($data['results']); echo"   fff<br>";
      foreach($data['results'] as $row) {
        //Print_r($row->order_id); echo " :";
        $this->db->query('SELECT * FROM outlet_payment WHERE order_id = :order_id AND payment_status NOT IN ("Paid", "Completed")');
       
        $p = $row->order_id;
        $x = print_r($p, true);
        //print_r($x); echo "<br>";
        $this->db->bind(':order_id', $x);
        $results1 = $this->db->resultSet();
        //print_r($results1); echo "<br>";
        if(!empty($results1)){
          $value1 = $results1[0]->order_id;
          //print_r($value1); echo "<br>";
          $this->db->query('UPDATE outlet_payment SET payment_status = "Late" WHERE order_id = :order_id1');
          $this->db->bind(':order_id1', $value1);
          if($this->db->execute()){
            $counter = $counter + 1;
            //print_r("ok<br>");
          } else {
            $countern = $countern + 1;
            //print_r("nah<br>");
          }
        }
      }
      if($countern==0) {
        return true;
      } else {
        print_r("something is wrong!");
        return false;
      }
  }


  public function setStateS(){
    $this->db->query('SELECT * FROM orders WHERE order_date <= :date2 ORDER BY order_date ASC');
    $date2 = Date('y:m:d',strtotime('-46 days'));
    $this->db->bind(':date2', $date2);
   
    $results = $this->db->resultSet();

    $data = [
      'results' => $results
    ]; 
    
    $counter = 0;
    $countern = 0;
    //print_r($data['results']); echo"   fff<br>";
    foreach($data['results'] as $row) {
      //Print_r($row->order_id); echo " :";
      $this->db->query('SELECT * FROM outlet_payment WHERE order_id = :order_id AND payment_status NOT IN ("Paid", "Completed")');
     
      $p = $row->order_id;
      $x = print_r($p, true);
      //print_r($x); echo "<br>";
      $this->db->bind(':order_id', $x);
      $results1 = $this->db->resultSet();
      //print_r($results1); echo "<br>";
      if(!empty($results1)){
        $value1 = $results1[0]->order_id;
        //print_r($value1); echo "<br>";
        $this->db->query('UPDATE outlet_payment SET payment_status = "Suspend" WHERE order_id = :order_id1');
        $this->db->bind(':order_id1', $value1);
        if($this->db->execute()){
          $counter = $counter + 1;
          //print_r("ok<br>");
        } else {
          $countern = $countern + 1;
          //print_r("nah<br>");
        }
      }
    }
    if($countern==0) {
      return true;
    } else {
      print_r("something is wrong!");
      return false;
    }
   
}


    public function addPaidOrders(){
      $this->db->query('SELECT * FROM outlet_payment WHERE outlet_payment.payment_status = "Paid"');
      
      $results = $this->db->resultSet(); 
      
      $total = 0;
      //print_r($results);
      //count($results);

      $data = [
        'results' => $results
      ];
      $i=0;
      foreach ($data['results'] as $row) {
        $this->db->query('SELECT amount_paid FROM outlet_transactions WHERE outlet_transactions.invoice_no = :row1');
        $this->db->bind(':row1', $row->order_id);
        $results1 = $this->db->resultSet();
        if(!empty($results1)){
         //print_r($results1[0]->amount_paid); echo "<br>";
         $total = $total + intval($results1[0]->amount_paid);
         $i = $i + 1;
        } else {
          $total = $total + 0;
        }
      }
      //print_r($total);
      return $total;
    }

    public function addNewRequests(){
      $this->db->query('SELECT request_id FROM collection_center_requests WHERE collection_center_requests.request_status = "New"');
      
      $results = $this->db->resultSet(); 

      $total = 0;

      $data = [
        'results' => $results
      ];
      $i=0;
      foreach ($data['results'] as $row) {
        $this->db->query('SELECT * FROM collection_center_requests WHERE collection_center_requests.request_id = :row1');
        $this->db->bind(':row1', $row->request_id);
        $results1 = $this->db->resultSet(); 
        $total = $total + intval($results1[0]->amount_requested);
        $i = $i + 1;
      }
      return $total;
    }





    
  }
