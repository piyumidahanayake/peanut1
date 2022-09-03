<?php
  class pay1 {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    
     public function pay($data){
      $this->db->query('INSERT INTO payment (order_id, amount) VALUES(:order_id,  :amount)');
      // Bind values
      $this->db->bind(':order_id', $data['order_id']);
     
      $this->db->bind(':amount', $data['amount']);
      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function addacc(){
      $this->db->query('INSERT INTO orders (received_date) VALUES(:date1)');
      $this->db->bind(':date1', 2021-11-14);

    }

public function viewinvoice(){
      $this->db->query('SELECT orders.order_id as id, orders.order_date as date1,orders.delivery_date as date2,orders.delivery_status as status1,outlet_payment.payment_status as status
      FROM orders  INNER JOIN outlet_payment ON  orders.order_id=outlet_payment.order_id where orders.delivery_status="Received" and orders.outlet_id=:id');
      
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }
    public function viewinvoice11(){
      $this->db->query('SELECT orders.order_id as id, orders.order_date as date1,orders.delivery_date as date2,orders.delivery_status as status1,outlet_payment.payment_status as status
      FROM orders  INNER JOIN outlet_payment ON  orders.order_id=outlet_payment.order_id where  orders.outlet_id=:id');
      
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }
    public function rep(){
      $this->db->query('SELECT orders.order_id as id, orders.order_date as date1,orders.delivery_date as date2,orders.delivery_status as status1,outlet_payment.payment_status as status
      FROM orders  INNER JOIN outlet_payment ON  orders.order_id=outlet_payment.order_id where   orders.outlet_id=:id and orders.delivery_status="Not Received" and orders.assigned_date!="0000-00-00"');
      
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }

    public function o_histry($status,$date1){
      $this->db->query('SELECT orders.order_id as id, orders.order_date as date1,orders.delivery_date as date2,orders.delivery_status as status1,outlet_payment.payment_status as status
      FROM orders  INNER JOIN outlet_payment ON  orders.order_id=outlet_payment.order_id where   orders.outlet_id=:id and orders.delivery_status=:status and orders.order_date=:date1');
      
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':status', $status);
       $this->db->bind(':date1', $date1);
      $results = $this->db->resultSet();

      return $results;
    }

    public function o_histry1($date1){
      $this->db->query('SELECT orders.order_id as id, orders.order_date as date1,orders.delivery_date as date2,orders.delivery_status as status1,outlet_payment.payment_status as status
      FROM orders  INNER JOIN outlet_payment ON  orders.order_id=outlet_payment.order_id where   orders.outlet_id=:id and orders.order_date=:date1');
      
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':date1', $date1);
      $results = $this->db->resultSet();

      return $results;
    }
    
    public function viewin1($date1){
      $this->db->query('SELECT orders.order_id as id, orders.order_date as date1,orders.delivery_date as date2,orders.delivery_status as status1,outlet_payment.payment_status as status
      FROM orders  INNER JOIN outlet_payment ON  orders.order_id=outlet_payment.order_id where   orders.outlet_id=:id1 AND orders.order_date=:date1');
      $this->db->bind(':date1', $date1);
      $this->db->bind(':id1', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }
    public function rep1($date1){
      $this->db->query('SELECT orders.order_id as id, orders.order_date as date1,orders.delivery_date as date2,orders.delivery_status as status1,outlet_payment.payment_status as status
      FROM orders  INNER JOIN outlet_payment ON  orders.order_id=outlet_payment.order_id where   orders.outlet_id=:id AND orders.order_date=:date1 and orders.delivery_status="Not Received" and orders.assigned_date!="0000-00-00"');
      $this->db->bind(':date1', $date1);
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }
    public function viewin2($status,$date1){
      $this->db->query('SELECT orders.order_id as id, orders.order_date as date1,orders.delivery_date as date2,orders.delivery_status as status1,outlet_payment.payment_status as status
      FROM orders  INNER JOIN outlet_payment ON  orders.order_id=outlet_payment.order_id where   orders.outlet_id=:id AND outlet_payment.payment_status=:date1 AND orders.order_date=:date2');
      $this->db->bind(':date2', $date1);
      $this->db->bind(':date1', $status);
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }
    public function rep2($status){
      $this->db->query('SELECT orders.order_id as id, orders.order_date as date1,orders.delivery_date as date2,orders.delivery_status as status1,outlet_payment.payment_status as status
      FROM orders  INNER JOIN outlet_payment ON  orders.order_id=outlet_payment.order_id where   orders.outlet_id=:id AND outlet_payment.payment_status=:date1 and orders.delivery_status="Not Received" and orders.assigned_date!="0000-00-00"');
      $this->db->bind(':date1', $status);
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }
public function accsort1($id1){
      $this->db->query('SELECT orders.order_id as id, orders.order_date as date1,orders.delivery_date as date2,orders.delivery_status as status1,outlet_payment.payment_status as status
      FROM orders  INNER JOIN outlet_payment ON  orders.order_id=outlet_payment.order_id where 
      orders.outlet_id=:id AND orders.order_id=:id1');
      $this->db->bind(':id1', $id1);
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }




    public function assignordermore($id){
      $this->db->query('SELECT orders.order_id as id, orders.delivery_status as status1, products.product_id as product_id, products.name as product_name,order_description.ordered_quantity as oredered_quantity,
      order_description.assigned_quantity as assigned_quantity,order_description.rejected_quantity as reject, order_description.assigned_quantity*products.selling_rate as price,products.selling_rate as price1, outlet_payment.payment_status as status FROM orders INNER JOIN order_description ON  orders.order_id=order_description.order_id  INNER JOIN outlets ON  orders.outlet_id=outlets.outlet_id 
      INNER JOIN products ON  order_description.product_id=products.product_id INNER JOIN outlet_payment ON orders.order_id=outlet_payment.order_id where  orders.order_id=:order_id');
      $this->db->bind(':order_id', $id);
      $results = $this->db->resultSet();

      return $results;
    }

public function assignorder($id){
      $this->db->query('SELECT orders.order_id as id, orders.delivery_status as status1, products.product_id as product_id, products.name as product_name,order_description.ordered_quantity as oredered_quantity,
      order_description.assigned_quantity as assigned_quantity,order_description.rejected_quantity as reject, order_description.assigned_quantity*products.selling_rate as price,products.selling_rate as price1, outlet_payment.payment_status as status FROM orders INNER JOIN order_description ON  orders.order_id=order_description.order_id  INNER JOIN outlets ON  orders.outlet_id=outlets.outlet_id 
      INNER JOIN products ON  order_description.product_id=products.product_id INNER JOIN outlet_stock ON  order_description.product_id=outlet_stock.product_id INNER JOIN outlet_payment ON orders.order_id=outlet_payment.order_id where  orders.order_id=:order_id');
      $this->db->bind(':order_id', $id);
      $results = $this->db->resultSet();

      return $results;
    }



    public function assign($id){
      $this->db->query('SELECT orders.order_id as id,  products.product_id as product_id, products.name as product_name,order_description.ordered_quantity as oredered_quantity,
      order_description.assigned_quantity as assigned_quantity,order_description.rejected_quantity as reject, order_description.assigned_quantity*products.selling_rate as price,products.selling_rate as price1, outlet_payment.payment_status as status FROM orders INNER JOIN order_description ON  orders.order_id=order_description.order_id  INNER JOIN outlets ON  orders.outlet_id=outlets.outlet_id 
      INNER JOIN products ON  order_description.product_id=products.product_id INNER JOIN outlet_payment ON orders.order_id=outlet_payment.order_id where  orders.order_id=:order_id and orders.delivery_status="Not Received"');
      $this->db->bind(':order_id', $id);
      $results = $this->db->resultSet();

      return $results;
    }
public function payst($id){
$this->db->query('SELECT  outlet_payment.payment_status as status, outlet_payment.paid_amount as p_amount FROM outlet_payment INNER JOIN orders ON outlet_payment.order_id =orders.order_id where  outlet_payment.order_id=:order_id');
      $this->db->bind(':order_id', $id);
      $results = $this->db->resultSet();

      return $results;

}
public function payst1(){
$this->db->query('SELECT  outlet_payment.order_id as id,outlet_payment.paid_amount as p_amount,outlet_payment.toatal_amount as amount FROM outlet_payment INNER JOIN orders ON outlet_payment.order_id =orders.order_id where  outlet_payment.payment_status="Not Paid" OR outlet_payment.payment_status="Suspend"  and orders.delivery_status="Received" and outlet_payment.outlet_id=:id');
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;

}

     public function getProducts($id){
      $this->db->query('SELECT outlet_stock.outlet_id,outlet_stock.product_id as id,outlet_stock.selling_rate as rate,
      products.name as name,products.images as img
      FROM outlet_stock INNER JOIN products ON  outlet_stock.product_id=products.product_id where  outlet_stock.outlet_id=:id');
      $this->db->bind(':id', $id);

      $results = $this->db->resultSet();

      return $results;
    }

    public function getProducts_cc(){
      $this->db->query('SELECT products.product_id as id,products.name as name,products.selling_rate as rate,products.type as type,
      products.images as img
      FROM  products INNER JOIN collection_center_stock ON products.product_id=collection_center_stock.product_id INNER JOIN outlets ON outlets.collection_center_id=collection_center_stock.collection_center_id where outlets.outlet_id=:id ');
      
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }

    public function getProducts_se($p_id){
      $this->db->query('SELECT products.product_id as id,products.name as name,products.selling_rate as rate,products.type as type,
      products.images as img
      FROM  products where products.product_id=:p_id');
      $this->db->bind(':p_id', $p_id);

      $results = $this->db->resultSet();

      return $results;
    }

    public function getProductss($id,$p_id){
      $this->db->query('SELECT outlet_stock.outlet_id,outlet_stock.product_id as id,outlet_stock.selling_rate as rate,
      products.name as name,products.images as img
      FROM outlet_stock INNER JOIN products ON  outlet_stock.product_id=products.product_id where  outlet_stock.outlet_id=:id and outlet_stock.product_id=:p_id');
      $this->db->bind(':id', $id);
      $this->db->bind(':p_id', $p_id);
      $results = $this->db->resultSet();

      return $results;
    }

    public function getProducts1($id,$p_id){
      $this->db->query('SELECT outlet_stock.outlet_id,outlet_stock.product_id as id,outlet_stock.selling_rate as rate,
      products.name as name,products.images as img
      FROM outlet_stock INNER JOIN products ON  outlet_stock.product_id=products.product_id where  outlet_stock.outlet_id=:id and outlet_stock.product_id=:p_id');
      $this->db->bind(':id', $id);
      $this->db->bind(':p_id', $p_id);

      $results = $this->db->resultSet();

      return $results;
    }

   public function editrate($id){
      $this->db->query('SELECT outlet_stock.outlet_id,outlet_stock.product_id ,outlet_stock.selling_rate as rate,
      products.name as name,products.images as img
      FROM outlet_stock INNER JOIN products ON  outlet_stock.product_id=products.product_id where  outlet_stock.outlet_id=2 AND outlet_stock.product_id=:id');
      
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();

      return $results;
    }

    public function daily($date1){
      $this->db->query('SELECT outlet_sale.outlet_id,outlet_sale.item_id as id,outlet_sale.quantity as quantity,outlet_sale.money_received as money1,
      products.name as name
      FROM outlet_sale INNER JOIN products ON  outlet_sale.item_id=products.product_id where  outlet_sale.outlet_id=:id AND outlet_sale.selling_date=:date1');
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':date1', $date1);
      $results = $this->db->resultSet();

      return $results;
    }
   
       public function updaterate($rate,$id,$uid){
      $this->db->query('UPDATE outlet_stock SET selling_rate =:rate  where outlet_id=:id1 AND product_id=:id');
      // Bind values
      $this->db->bind(':rate', $rate);
       $this->db->bind(':id', $id);
       $this->db->bind(':id1', $uid);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
 public function updateacc($id,$outlet_id){
    $this->db->query('UPDATE orders SET delivery_status = "Received"  where outlet_id=:outlet_id AND order_id=:id');
      // Bind values
      $this->db->bind(':outlet_id', $outlet_id);
       $this->db->bind(':id', $id);
      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

 }
public function updatetotal($outlet_id,$id,$c){
    $this->db->query('UPDATE outlet_payment SET toatal_amount = :c  where outlet_id=:outlet_id AND order_id=:id');
      // Bind values
      $this->db->bind(':outlet_id', $outlet_id);
       $this->db->bind(':id', $id);
       $this->db->bind(':c', $c);
      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

 }

public function payhistry($id1){
      $this->db->query('SELECT outlet_payment.order_id as id,outlet_payment.outlet_id ,outlet_payment.payment_status as status ,outlet_payment.paid_date as date1,
      outlet_payment.toatal_amount as amount
      FROM outlet_payment INNER JOIN orders ON  outlet_payment.order_id=orders.order_id  and outlet_payment.outlet_id=orders.outlet_id   where  outlet_payment.payment_status= "Paid" AND  outlet_payment.outlet_id=:id1');
      
      $this->db->bind(':id1', $id1);
      $results = $this->db->resultSet();

      return $results;
    }


public function payhistry2($date1){
      $this->db->query('SELECT outlet_payment.order_id as id,outlet_payment.outlet_id ,outlet_payment.payment_status as status ,outlet_payment.paid_date as date1,
      outlet_payment.toatal_amount as amount
      FROM outlet_payment INNER JOIN orders ON  outlet_payment.order_id=orders.order_id  and outlet_payment.outlet_id=orders.outlet_id   where  outlet_payment.payment_status= "Paid" AND  outlet_payment.outlet_id=:id and outlet_payment.paid_date=:date1');
      $this->db->bind(':date1', $date1);
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }


    public function payinv($no){
      $this->db->query('SELECT outlet_payment.order_id as id,outlet_payment.outlet_id ,outlet_payment.payment_status as status ,outlet_payment.paid_date as date1,
      outlet_payment.toatal_amount as amount
      FROM outlet_payment INNER JOIN orders ON  outlet_payment.order_id=orders.order_id  and outlet_payment.outlet_id=orders.outlet_id   where  outlet_payment.payment_status= "Paid" AND  outlet_payment.outlet_id=:id and outlet_payment.order_id=:no');
      $this->db->bind(':no', $no);
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }




public function addSale($data){
        $this->db->query('INSERT INTO outlet_sale (outlet_id, product_id, amount,money_receive,selling_date) VALUES(:outlet_id, :product_id, :amount,:money_receive,:selling_date)');
        // Bind values
        $this->db->bind(':outlet_id', $data['outlet_id']);
        $this->db->bind(':product_id', $data['id']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':money_receive', $data['money_receive']);
        $this->db->bind(':selling_date', $data['date']);
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      public function reduceStock($data){
      $this->db->query('UPDATE outlet_stock SET amount =amount - :quantitydown  WHERE outlet_id = :id and product_id=:product_id');
      // Bind values
      $this->db->bind(':quantitydown',$data['amount']);
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':product_id', $data['id']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function getproductname($id){
      $this->db->query('SELECT * FROM products WHERE product_id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }
    public function updateorder($id,$quantity){
      $this->db->query('UPDATE order_description SET rejected_quantity = :quantity  WHERE order_id = :order_id ') ;
      // Bind values
      
      $this->db->bind(':order_id', $id);
     $this->db->bind(':quantity', $quantity);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
public function updateorder1($id,$p_id,$quantity){
      $this->db->query('UPDATE order_description SET rejected_quantity = :quantity  WHERE order_id = :order_id AND product_id=:p_id') ;
      // Bind values
      
      $this->db->bind(':order_id', $id);
      $this->db->bind(':p_id', $p_id);
     $this->db->bind(':quantity', $quantity);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
 public function updatedelivery($id,$date1){
  $this->db->query('UPDATE orders SET delivery_date = :date1   WHERE order_id = :order_id ') ;
      // Bind values
      
      $this->db->bind(':order_id', $id);
     $this->db->bind(':date1', $date1);
      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

 }
 public function updatereject($id){
  $this->db->query('UPDATE orders SET delivery_status = "Rejected"   WHERE order_id = :order_id and outlet_id=:id') ;
      // Bind values
      
      $this->db->bind(':order_id', $id);
    $this->db->bind(':id', $_SESSION['user_id']);
      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

 }

public function updatestock($outlet_id,$p_id,$a_quantity){
  $this->db->query('UPDATE outlet_stock SET amount = amount+:q   WHERE outlet_id=:outlet_id AND product_id=:product_id') ;
      // Bind values
      
      $this->db->bind(':outlet_id', $outlet_id);
     $this->db->bind(':product_id', $p_id);
      $this->db->bind(':q', $a_quantity);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

 }



public function updateprice($id,$p_id,$p1){
  $this->db->query('UPDATE order_description SET value_after_delivery = :q   WHERE  product_id=:product_id AND order_id=:order_id' ) ;
      // Bind values
      
     
      $this->db->bind(':order_id', $id);
     $this->db->bind(':product_id', $p_id);
      $this->db->bind(':q', $p1);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

 }





 public function deletereject($id){
  $this->db->query('DELETE FROM outlet_payment WHERE outlet_payment.outlet_id=:outlet_id AND outlet_payment.order_id=:id') ;
      // Bind values
      
      $this->db->bind(':outlet_id', $_SESSION['user_id']);
     $this->db->bind(':id', $id);
      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

 }
 public function deletereject1($id){
  $this->db->query('DELETE FROM order_description WHERE  order_description.order_id=:id') ;
      // Bind values
      
      
     $this->db->bind(':id', $id);
      
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

 }
public function weeklysale($date1,$date2){
    $this->db->query('SELECT outlet_sale.item_id as id,outlet_sale.quantity as quantity,outlet_sale.money_received as money_receive,products.name as name 
      FROM outlet_sale INNER JOIN outlet_stock ON  outlet_sale.item_id=outlet_stock.product_id  INNER JOIN products ON  outlet_sale.item_id=products.product_id   where outlet_sale.outlet_id= :id and  outlet_sale.selling_date between  :date1 and :date2');
      $this->db->bind(':date1', $date1);
      $this->db->bind(':date2', $date2);
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;


  }
  public function prediction(){
      $this->db->query('SELECT orders.order_id as id, products.product_id as product_id, products.name as product_name,order_description.ordered_quantity as oredered_quantity,
      order_description.assigned_quantity as assigned_quantity,order_description.rejected_quantity as reject, order_description.assigned_quantity*products.selling_rate as price, outlet_payment.payment_status as status FROM orders INNER JOIN order_description ON  orders.order_id=order_description.order_id  INNER JOIN outlets ON  orders.outlet_id=outlets.outlet_id 
      INNER JOIN products ON  order_description.product_id=products.product_id INNER JOIN outlet_payment ON orders.order_id=outlet_payment.order_id   ORDER BY order_description.order_date DESC');


      
      
      $results = $this->db->resultSet();

      return $results;
    }
public function collection(){
    $this->db->query('SELECT collection_center.collection_center_id as id, collection_center.collection_center_name as name,collection_center.contact_number as no,collection_center.address as address, accounts.email as email,outlets.collection_center_id FROM collection_center INNER JOIN accounts ON  collection_center.collection_center_id=accounts.id  INNER JOIN outlets ON  collection_center.collection_center_id=outlets.collection_center_id
       where  outlets.outlet_id=:id');
     $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;

}
public function financial($year,$month1){
    $this->db->query('SELECT outlet_sale.item_id as id, outlet_sale.money_received as money1,outlet_sale.selling_date as date1 FROM outlet_sale   INNER JOIN outlet_stock ON  outlet_sale.item_id=outlet_stock.product_id
       where  outlet_sale.outlet_id=:id and month(outlet_sale.selling_date)=:month1 and year(outlet_sale.selling_date)=:year ORDER BY outlet_sale.selling_date ASC ');
     $this->db->bind(':id', $_SESSION['user_id']);
     $this->db->bind(':month1', $month1);
      $this->db->bind(':year', $year);
   
      $results = $this->db->resultSet();

      return $results;

}


public function financial_p($year,$month1){
    $this->db->query('SELECT outlet_payment.toatal_amount as amount FROM outlet_payment  
       where  outlet_payment.outlet_id=:id and month(outlet_payment.paid_date)=:month1 and year(outlet_payment.paid_date)=:year and outlet_payment.payment_status="Paid" ');
     $this->db->bind(':id', $_SESSION['user_id']);
     $this->db->bind(':month1', $month1);
      $this->db->bind(':year', $year);
   
      $results = $this->db->resultSet();

      return $results;

}

  }