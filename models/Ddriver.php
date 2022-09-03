<?php
  class Ddriver {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getcc(){
      $this->db->query('SELECT collection_center_name, address, contact_number, collection_center_id FROM collection_center');
  
       $results = $this->db->resultSet();

      return $results;
    }

    public function geto(){
      $this->db->query('SELECT outlet_name, address, con_number, outlet_id FROM outlets');
  
       $results = $this->db->resultSet();

      return $results;
    }

    
    public function orderforreturnentry($orderid){
      $this->db->query('SELECT order_description.product_id as item_id,ordered_quantity,p.name as pname
                        FROM order_description
                        JOIN products AS p
                        ON order_description.product_id=p.product_id
                        WHERE order_id=:orderid');

      $this->db->bind(':orderid',$orderid);
  
      $results = $this->db->resultSet();

      return $results;
    }

    //submit return entry
    public function insertreturnentry($key,$value,$orderid){
      $this->db->query('UPDATE order_description set  rejected_quantity=:rqty WHERE order_id=:oid AND product_id=:itemid ');
      
      $this->db->bind(':oid',$orderid);
      $this->db->bind(':rqty',$value);
      $this->db->bind(':itemid',$key);

  
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }

    public function updatereject_status($orderid){
      $this->db->query('UPDATE orders set  delivery_status=:status WHERE order_id=:oid');
      
      $status="Rejected";
      $this->db->bind(':oid',$orderid);
      $this->db->bind(':status',$status);

  
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }

    //
    public function updateorder_status($orderid,$date){
      $this->db->query('UPDATE orders set  delivery_status=:status,delevered_date=:date WHERE order_id=:oid');
      
      $status="Received";
      $this->db->bind(':oid',$orderid);
      $this->db->bind(':status',$status);
      $this->db->bind(':date',$date);

  
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }

    public function deliverorderfully($orderid){
      $this->db->query('UPDATE order_description set  rejected_quantity=:qty WHERE order_id=:oid');
      
      $qty=0;
      $this->db->bind(':oid',$orderid);
      $this->db->bind(':qty',$qty);

  
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }


    



    public function orderdisplay($orderid){
      $this->db->query('SELECT order_description.product_id as item,order_description.ordered_quantity as qty,order_description.order_date as od,orders.delivery_date as dd,p.name as pname
                        FROM order_description 
                        INNER JOIN orders
                        ON order_description.order_id=orders.order_id
                        JOIN products AS p
                        ON order_description.product_id=p.product_id
                        WHERE order_description.order_id=:orderid'
                        );

      $this->db->bind(':orderid',$orderid);

      $results = $this->db->resultSet();
      
      return $results;
    }

    public function odrlist(){
      $this->db->query('SELECT orders.order_id as id ,orders.delivery_date as dd,c.collection_center_name as ccn,c.address as cca,c.contact_number as ccc,o.outlet_name as oun,o.address as oua,o.con_number as ouc
                        FROM orders
                        INNER JOIN collection_center AS c 
                        ON orders.collection_center_id=c.collection_center_id
                        INNER JOIN outlets AS o 
                        ON orders.outlet_id=o.outlet_id
                        WHERE orders.driver=:driverid AND orders.delivery_status="Not Received"
                        ORDER BY dd ASC'
                        );

      $this->db->bind(':driverid',$_SESSION['user_id'] );
  
      $results = $this->db->resultSet();

      return $results;
    }

    public function getccid($id){
      $this->db->query('SELECT orders.collection_center_id as ccid
                        FROM orders
                        WHERE orders.order_id=:id'
                        );

      $this->db->bind(':id',$id );
  
      $row = $this->db->single();

      return $row;
    }

   
    

    public function deliverydate($orderid){
      $this->db->query('SELECT delivery_date
                        FROM orders
                        WHERE order_id=:orderid');

      $this->db->bind(':orderid',$orderid);

      $row = $this->db->single();

      return $row;
    }

    /*not related
    public function setavilability($current_day){
      $this->db->query('INSERT INTO availability (date,12AM_03AM,03AM_06AM,06AM_09AM,09AM_12PM,12PM_03PM,03PM_06PM,06PM_09PM,09PM_12AM) VALUES (:day,)');

      $this->db->bind(':day',$current_day);

      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }*/

    //find date exist in database
    public function finddateavailability($date,$driver_id){
      $this->db->query('SELECT availability FROM availabiity WHERE date = :date and driver_id=:id');
      // Bind value
      $this->db->bind(':date', $date);
      $this->db->bind(':id', $driver_id);
      $row = $this->db->single();

      // Check row
      return $row;
    }

    //set availability on existing date related to id
    public function setavailabilitytoone($date,$driver_id){
      $this->db->query('UPDATE availabiity set  availability=:yes WHERE date=:ddate AND driver_id=:id');
      $x=0;
      //$detailss=explode(',',$details,2);
      $this->db->bind(':ddate',$date);
      $this->db->bind(':id',$driver_id);
      $this->db->bind(':yes',$x);

  
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }

    public function setavailabilitytozero($date,$driver_id){
      $this->db->query('UPDATE availabiity set  availability=:no WHERE date=:ddate AND driver_id=:id');
      $x=1;
      //$detailss=explode(',',$details,2);
      $this->db->bind(':ddate',$date);
      $this->db->bind(':id',$driver_id);
      $this->db->bind(':no',$x);

  
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }


    //set availability
    public function setavailabilityinitially($id,$date){
      $this->db->query('INSERT INTO availabiity (driver_id,date,availability) VALUES (:id,:date,1)');
      
      $this->db->bind(':date',$date);
      $this->db->bind(':id',$id);
  
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

  }

  //get availability column
  public function getavailability($id){
    date_default_timezone_set('Asia/Kolkata');
    $today=date('Y-m-d');
    $this->db->query('SELECT date,availability
                      FROM availabiity WHERE driver_id=:id AND date>:today ORDER BY date ASC');

    $this->db->bind(':id',$id);
    $this->db->bind(':today',$today);

    $results = $this->db->resultSet();
    
    return $results;
  }


}
