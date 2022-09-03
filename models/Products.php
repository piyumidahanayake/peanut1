<?php
  class Products {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getProducts($id){
      $this->db->query('SELECT collection_center_stock.collection_center_id,collection_center_stock.product_id as id,collection_center_stock.quantity as stock,
      products.name as name,products.images as image_url,products.type,products.description,products.maximum_buying_rate,products.selling_rate,products.type as type
      FROM collection_center_stock INNER JOIN products ON  collection_center_stock.product_id=products.product_id where  collection_center_stock.collection_center_id=:id order by collection_center_stock.quantity');
      $this->db->bind(':id', $id);

      $results = $this->db->resultSet();

      return $results;
    }
    public function getProductList(){
        $this->db->query('SELECT * from products');
        
  
        $results = $this->db->resultSet();
  
        return $results;
      }
      public function getproductid($productname){

        $this->db->query('SELECT * from products where name=:productname');
        $this->db->bind(':productname', $productname);
  
        $results = $this->db->resultSet();
  
        return $results;
      }
    public function getFarmerslist(){
        $this->db->query('SELECT * from farmers');
        
  
        $results = $this->db->resultSet();
  
        return $results;
    }
    public function findUserBynic($nic){
      $this->db->query('SELECT * FROM farmers WHERE nic = :nic');
      // Bind value
      $this->db->bind(':nic', $nic);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
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
    public function getmaxrate($id){
      $this->db->query('SELECT * FROM products WHERE product_id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function addBought($data){
        $this->db->query('INSERT INTO non_listed_boughts (farmer_NIC, product_id, quantity,total_value, rate,invoice_status,date) VALUES(:farmer, :product_name, :quantity,:total_value,:rate,:invoice_status,:date)');
        // Bind values
        $this->db->bind(':farmer', $data['farmer']);
        $this->db->bind(':product_name', $data['name']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':rate', $data['rate']);
        $this->db->bind(':total_value', $data['quantity']*$data['rate']);
        $this->db->bind(':invoice_status','pending');
        $this->db->bind(':date',$data['date']);
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
    }
    public function insertInvoiceRecord($nic,$total,$date){
      $this->db->query('INSERT INTO bought_invoice (farmer_id, date,total_amount,payment_status,paid_date) VALUES(:nic, :date, :total,:status,:paid_date)');
      // Bind values
      $this->db->bind(':nic', $nic);
      $this->db->bind(':date', $date);
      $this->db->bind(':total', $total);
      $this->db->bind(':status', 'not paid');
      $this->db->bind(':paid_date','-');
      //$this->db->bind(':invoice_status','pending');
      //$this->db->bind(':date',$data['date']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
  }
  
  public function getInvoiceNumber(){
    $this->db->query('SELECT max(invoice_id) as invoice FROM bought_invoice');
    $row = $this->db->single();

    return $row;
  }
  public function updateInvoiceStatus($nic,$invoice){
    $this->db->query('UPDATE non_listed_boughts SET invoice_id =:invoice,invoice_status=:invoiced  WHERE farmer_NIC = :nic and invoice_status=:not_invoiced');
    // Bind values
    $this->db->bind(':nic', $nic);
    $this->db->bind(':invoice', $invoice);
    $this->db->bind(':invoiced','invoiced' );
    $this->db->bind(':not_invoiced','pending');

    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }
  public function changeOrderStatus($id){
    $this->db->query('UPDATE orders SET assigned_status =:rejected,assigned_date=:date WHERE order_id = :id');
    // Bind values
    $this->db->bind(':id', $id);
    $this->db->bind(':rejected', 'rejected');
    $this->db->bind(':date', date("Y-m-d"));

    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }
  public function incrementBalance($nic,$total){
    $this->db->query('UPDATE farmers SET balance =balance+:totalup  WHERE NIC = :nic');
    // Bind values
    $this->db->bind(':nic', $nic);
    $this->db->bind(':totalup', $total);

    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }
  public function decrementBalance($nic,$total){
    $this->db->query('UPDATE farmers SET balance =balance-:totaldown  WHERE NIC = :nic');
    // Bind values
    $this->db->bind(':nic', $nic);
    $this->db->bind(':totaldown', $total);

    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }
  public function setInvoiceStatus($invoice_id,$today){
    $this->db->query('UPDATE bought_invoice SET payment_status =:paid,paid_date=:paid_date WHERE invoice_id = :invoice_id ');
    // Bind values
    $this->db->bind(':invoice_id', $invoice_id);
    $this->db->bind(':paid_date', $today);
    $this->db->bind(':paid','paid' );
  

    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }
    public function updateStock($data){
      $this->db->query('UPDATE collection_center_stock SET quantity =quantity + :quantityup  WHERE collection_center_id = :id and product_id=:product_id');
      // Bind values
      $this->db->bind(':quantityup', $data['quantity']);
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':product_id', $data['name']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function changeneccesityStatus($n_id){
      $this->db->query('UPDATE neccesity SET status =:recived  WHERE neccesity_id = :n_id');
      // Bind values
      $this->db->bind(':n_id',$n_id);
      $this->db->bind(':recived','recived');
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function pendingorders(){
      $this->db->query('SELECT orders.order_id as id,orders.order_date as order_date, outlets.outlet_name as outlet_name, products.name as product_name,order_description.ordered_quantity as quantity
      FROM orders INNER JOIN order_description ON  orders.order_id=order_description.order_id  INNER JOIN outlets ON  orders.outlet_id=outlets.outlet_id 
      INNER JOIN products ON  order_description.product_id=products.product_id where  orders.assigned_status=:s and orders.collection_center_id=:id group by orders.order_id order by orders.order_date desc');
      $this->db->bind(':s','Not_assigned');
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }
    public function completedorders(){
      $this->db->query('SELECT orders.order_id as id,orders.delivery_date as delivery_date,orders.assigned_date as assigned_date, outlets.outlet_name as outlet_name, products.name as product_name,order_description.ordered_quantity as quantity
      FROM orders INNER JOIN order_description ON  orders.order_id=order_description.order_id  INNER JOIN outlets ON  orders.outlet_id=outlets.outlet_id 
      INNER JOIN products ON  order_description.product_id=products.product_id where  orders.assigned_status=:s and orders.driver=:x and orders.collection_center_id=:id group by orders.order_id order by orders.assigned_date desc');
      $this->db->bind(':s','Assigned');
      $this->db->bind(':x','');
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }
    public function deliveredorders(){
      $this->db->query('SELECT orders.order_id as id,drivers.name as driver, orders.delivery_date as delivery_date,orders.delivery_status as delivery_status, outlets.outlet_name as outlet_name, products.name as product_name,order_description.ordered_quantity as quantity
      FROM orders INNER JOIN order_description ON  orders.order_id=order_description.order_id  INNER JOIN outlets ON  orders.outlet_id=outlets.outlet_id 
      INNER JOIN products ON  order_description.product_id=products.product_id inner join drivers on orders.driver=drivers.driver_id where  orders.driver!=:s or orders.delivery_status =:d and orders.collection_center_id=:id group by orders.order_id order by orders.delivery_status desc');
      $this->db->bind(':s','');
      $this->db->bind(':d','delivered');
      $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }
    public function assignordermore($id){
      $this->db->query('SELECT orders.order_id as id,orders.delivery_date as delivery_date, outlets.outlet_name as outlet_name, products.name as product_name,order_description.ordered_quantity as oredered_quantity,
      orders.order_date as order_date, orders.assigned_date as assigned_date, orders.driver as driver, orders.delivery_date as delivery_date,order_description.assigned_quantity as assigned_quantity FROM orders INNER JOIN order_description ON  orders.order_id=order_description.order_id  INNER JOIN outlets ON  orders.outlet_id=outlets.outlet_id 
      INNER JOIN products ON  order_description.product_id=products.product_id where  orders.order_id=:order_id');
      $this->db->bind(':order_id', $id);
      $results = $this->db->resultSet();

      return $results;
    }
    public function nonlistedbroughts($nic){
      $this->db->query('SELECT non_listed_boughts.farmer_NIC as nic, non_listed_boughts.quantity as quantity , non_listed_boughts.rate as rate, non_listed_boughts.total_value as value, non_listed_boughts.date as date, 
      farmers.name as farmers_name,products.name as product_name  from non_listed_boughts INNER JOIN farmers ON  non_listed_boughts.farmer_NIC=farmers.NIC 
      INNER JOIN products ON  non_listed_boughts.product_id=products.product_id where  non_listed_boughts.farmer_NIC=:nic and  non_listed_boughts.invoice_status=:invoice_status order by non_listed_boughts.date asc');
      $this->db->bind(':nic', $nic);
      $this->db->bind(':invoice_status',"pending");
      $results = $this->db->resultSet();

      return $results;
    }
    public function farmerInvoice($nic){
      $this->db->query('SELECT invoice_id, date ,total_amount,payment_status, paid_date from bought_invoice  where  farmer_id=:nic order by payment_status,total_amount desc');
      $this->db->bind(':nic', $nic);
      $results = $this->db->resultSet();

      return $results;
    }
    public function invoice($invoice_id){
      $this->db->query('SELECT bought_invoice.invoice_id as invoice_id, bought_invoice.farmer_id as farmer_id , bought_invoice.date as invoice_date, bought_invoice.total_amount as total, bought_invoice.payment_status as payment_status, 
     bought_invoice.paid_date as paid_date,non_listed_boughts.quantity as quantity,non_listed_boughts.rate as rate,non_listed_boughts.total_value as value,products.name as product_name  from bought_invoice inner JOIN non_listed_boughts ON  bought_invoice.invoice_id=non_listed_boughts.invoice_id 
      INNER JOIN products ON  non_listed_boughts.product_id=products.product_id where  bought_invoice.invoice_id=:invoice_id ');
      $this->db->bind(':invoice_id', $invoice_id);
      $results = $this->db->resultSet();

      return $results;
    }
    public function deliveredordersmore($id){
      $this->db->query('SELECT orders.order_id as id,orders.delivery_date as delivery_date,orders.assigned_date as assigned_date, outlets.outlet_name as outlet_name, products.name as product_name,order_description.ordered_quantity as ordered_quantity,
      orders.order_date as order_date, orders.assigned_date as assigned_date,orders.delivery_status as delivery_status, drivers.name as driver, orders.delivery_date as delivery_date,order_description.assigned_quantity as assigned_quantity, order_description.rejected_quantity as rejected_quantity FROM orders INNER JOIN order_description ON  orders.order_id=order_description.order_id  INNER JOIN outlets ON  orders.outlet_id=outlets.outlet_id 
      INNER JOIN products ON  order_description.product_id=products.product_id inner join drivers on drivers.driver_id=orders.driver where  orders.order_id=:order_id');
      $this->db->bind(':order_id', $id);
      $results = $this->db->resultSet();

      return $results;
    }
    public function getorder($id){
      $this->db->query('SELECT products.name as product_name,products.product_id as id, order_description.ordered_quantity as quantity, collection_center_stock.quantity as center_stock from order_description inner join products on order_description.product_id = products.product_id inner join collection_center_stock on products.product_id = collection_center_stock.product_id where order_id=:id and 
      collection_center_stock.collection_center_id =:center_id');
      $this->db->bind(':id',$id);
      $this->db->bind(':center_id',$_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }
    public function getOutletId($order_id){
      $this->db->query('SELECT outlet_id FROM orders WHERE order_id = :order_id');
      $this->db->bind(':order_id',$order_id);

      $row = $this->db->single();

      return $row;
    }
    public function checkstock($product_id){
      $this->db->query('SELECT quantity FROM collection_center_stock WHERE product_id = :product_id and collection_center_id =:collection_center_id');
      $this->db->bind(':product_id',$product_id);
      $this->db->bind(':collection_center_id',$_SESSION['user_id']);

      $row = $this->db->single();

      return $row;
    }
    public function getRoutingDate($id){
      $this->db->query('SELECT delivery_date FROM orders WHERE order_id = :id');
      $this->db->bind(':id',$id);

      $row = $this->db->single();

      return $row;
    }
    public function farmers(){
      $this->db->query('SELECT farmers.name as name,farmers.NIC as NIC,farmers.home_address as home_address, farmers.contact_number as contact_number,products.name as product_name,farmers.balance as balance FROM farmers INNER JOIN products ON farmers.MFI1=products.product_id');
     // $this->db->bind(':order_id', $id);
      $results = $this->db->resultSet();

      return $results;
    }
    public function getoutlets(){
      $this->db->query('SELECT * from outlets where collection_center_id=:id');
     $this->db->bind(':id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
    }

    public function updateorder($product_id,$order_id,$quantity){
      $this->db->query('UPDATE order_description SET assigned_quantity =:quantity  WHERE order_id = :order_id and product_id=:product_id');
      // Bind values
      $this->db->bind(':quantity', $quantity);
      $this->db->bind(':order_id', $order_id);
      $this->db->bind(':product_id', $product_id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function updatedeliveryDate($id,$assigned_date,$delivery_date){
      $this->db->query('UPDATE orders SET assigned_date =:assigned_date,assigned_status=:assigned,delivery_date=:delivery_date  WHERE order_id = :order_id');
      // Bind values
      $this->db->bind(':assigned_date', $assigned_date);
     $this->db->bind(':delivery_date', $delivery_date);
      $this->db->bind(':order_id', $id);
      $this->db->bind(':assigned', 'Assigned');

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function assigndriver($data){
    //  return true;
    $this->db->query('UPDATE orders SET driver=:driver   WHERE order_id = :order_id');
      // Bind valuees
      $this->db->bind(':driver', $data['driver']);
      $this->db->bind(':order_id', $data['id']);
  


      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  
    public function reduceStock($product_id,$quantity){
      $this->db->query('UPDATE collection_center_stock SET quantity =quantity - :quantitydown  WHERE collection_center_id = :id and product_id=:product_id');
      // Bind values
      $this->db->bind(':quantitydown', $quantity);
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':product_id', $product_id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    

    public function addfarmerdata($data){
      $this->db->query('INSERT INTO farmers (NIC, name, home_address,contact_number,collection_center_id,balance,MFI1) VALUES(:nic, :name, :address,:contact_number,:collection_center,:balance,:product)');
      $balance=0.00;
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':nic', $data['nic']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':contact_number', $data['con_number']);
      $this->db->bind(':product', $data['product']);
      $this->db->bind(':collection_center', $_SESSION['user_id']);
      $this->db->bind(':balance', $balance);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function farmerBio($nic){
      $this->db->query('SELECT  name,NIC,home_address, contact_number, MFI1 from farmers where NIC=:nic');
     $this->db->bind(':nic', $nic);
      $row = $this->db->single();

      return $row;
    }
    public function updatefarmer($data){
      $this->db->query('UPDATE farmers SET name = :name, home_address = :address,contact_number=:contact_number,MFI1=:MFI WHERE NIC= :id');
      // Bind values
      $this->db->bind(':id', $data['nic']);
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':contact_number', $data['con_number']);
      $this->db->bind(':MFI', $data['product']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function removeFarmer($id){
      $this->db->query('DELETE from farmers where NIC=:id');
      $this->db->bind(':id', $id);
      $this->db->execute();

    }
    public function getdrivers($routeddate){
      $this->db->query('SELECT drivers.driver_id as driver_id,drivers.name as name from drivers inner join availabiity on drivers.driver_id = availabiity.driver_id where availabiity.date=:routeddate and availabiity.availability=:zero');
      $this->db->bind(':zero', '0');
      $this->db->bind(':routeddate', $routeddate);
      $results = $this->db->resultSet();

      return $results;
    }
  }