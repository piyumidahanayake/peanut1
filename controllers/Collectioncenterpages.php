<?php
  class Collectioncenterpages extends Controller {
    public function __construct(){
     if(!isLoggedIn()){
        redirect('users/login');
     }
      $this->productModel = $this->model('Products');
      $this->excessModel = $this->model('excess');
      $this->neccesityModel = $this->model('neccesity');
      $this->requestModel = $this->model('request');
      $this->outletModel = $this->model('outlet');
      $this->notificModel = $this->model('Notific');
    }
    
    public function home(){
      $products = $this->productModel->getProducts($_SESSION['user_id']);
      $notificount = $this->notificModel->CountAlert($_SESSION['user_id']);
      $data = [
        'products' => $products,
        'notificount' => $notificount
      ];
     
      $this->view('collection center/home', $data);
    }
   public function addProduct(){
      $productList=$this->productModel->getProductList();
      $farmerList=$this->productModel->getFarmersList();
      
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $data = [
        'n' => $productList,
        'm' => $farmerList,
        'name'=> $_POST['product']
      ];
      $max_rate=$this->productModel->getmaxrate($data['name']);
      $max_rate_n=$max_rate->maximum_buying_rate;
      $product=$this->productModel->getproductname($data['name']);
      $name1=$product->name;
      $data = [
        'n' => $productList,
        'm' => $farmerList,
        'name'=> $_POST['product'],
        'name1'=> $name1,
        'max_rate'=>$max_rate_n
      ];

      $this->view('collection center/addproduct', $data);
    }

    }
    public function addProductSubmit(){
      $productList=$this->productModel->getProductList();
      $farmerList=$this->productModel->getFarmersList();
     
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $rate= trim($_POST['rate']);
      $quantity= trim($_POST['quantity']);

        $data =[
          'n' => $productList,
          'm' => $farmerList,
          'name'=> trim($_POST['product_name']),
          'quantity' => $quantity,
          'farmer' => trim($_POST['farmer']),
          'rate' => $rate,
          'date' => trim($_POST['date']),
         
        ];
       // $total_value=$data['rate']*$data['quantity'];
        $max_rate=$this->productModel->getproductname($data['name']);
        $max_rate_n=$max_rate->maximum_buying_rate;
        $today=date("Y-m-d") ;
          $this->productModel->addBought($data);
          $this->productModel->updateStock($data);
          redirect('collectioncenterpages/home');
      


      }
      else{
        $data =[    
          'n' => $productList,
          'm' => $farmerList,
          'name'=> '',
          'quantity' => '',
          'farmer' =>'',
          'rate' => '',
          'date' => '',
          'total'=>'',
          'quantity_err'=>'',
          'farmer_err'=>'',
          'rate_err'=>'',
        ];

        // Load view
        $this->view('collection center/addproduct', $data);
      }
  }
 public function assigndriver(){
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
      $data =[
        'id'=> trim($_POST['order_id']),
        'driver' => trim($_POST['driver']),
       
      ];
      if($data['driver'] == ""){
        redirect('collectioncenterpages/error');
      }
     if($this->productModel->assigndriver($data)){
      redirect('collectioncenterpages/deliveredorders');
     }


    }
 } 
  public function assignorder(){
      $data =[
        'id'=> $_GET['id'],
        'order' =>'',
        'error'=>''
      ];
      $order=$this->productModel->getorder($data['id']);

      $data =[
        'id'=> $_GET['id'],
        'order' =>$order,
      ];
      $this->view('collection center/order_completion',$data);
  }   
  public function orderdescription(){
    $data =[
      'id'=> $_GET['id'],
      'order' =>'',
      
    ];
    $order=$this->productModel->getorder($data['id']);

    $data =[
      'id'=> $_GET['id'],
      'order' =>$order,
    ];
    $this->view('collection center/order_description',$data);
} 

  public function assignment(){
    $id=$_POST['order_id'];
    $delivery_date=$_POST['date'];
   // $outlet_id=$_POST['outlet_id'];
    if($delivery_date<=date("Y-m-d")){
      $this->view('collection center/error');
    }
    else{
      
    foreach ($_POST as $key=>$value):
      if($key!='order_id' || $key!='date'){
     // $stock = $this->productModel->checkstock($key);
     // $stockn=$stock->quantity;
     // if($stockn<0){
      $this->productModel->updateorder($key,$id,$value);
      $this->productModel->reduceStock($key,$value);
      $outlet=$this->productModel->getOutletId($id);
      $outlet_id=$outlet->outlet_id;
     // $this->notificModel->Write($outlet_id,"Your order has been accepted - Reference number(".$id.")");
     // }
     // else{
       // $this->view('collection center/error');
      //}
     
     }
    // $this->notificModel->Write($outlet_id,"Your order has been accepted - Reference number(".$id.")");
     
      
    endforeach;
  if($value=1){
    $assigned_date=date("Y/m/d");
    $this->productModel->updatedeliveryDate($id,$assigned_date,$delivery_date);
    $this->completedorders();
  }
}
  }
  public function pendingorders(){
    $result= $this->productModel->pendingorders();
    $outlets=$this->productModel->getoutlets();
    $data = [
      'result'=>$result,
      'outlets'=>$outlets,
    ];
    $this->view('collection center/pending_orders',$data);
  }
  public function changeOrderStatus(){
    $id =$_GET['id'];
    $this->productModel->changeOrderStatus($id);
    redirect('collectioncenterpages/pendingorders');
  }
  public function completedorders(){
    $result= $this->productModel->completedorders();
    $outlets=$this->productModel->getoutlets();
    $data = [
      'result'=>$result,
      'outlets'=>$outlets,
    ];
    $this->view('collection center/completed_orders',$data);
  }
  public function ordercompletion(){
    $data = [
    ];
   
    $this->view('collection center/order_completion');
  }
   public function deliveredorders(){
    $result= $this->productModel->deliveredorders();
    $outlets=$this->productModel->getoutlets();
    $data = [
      'result'=>$result,
      'outlets'=>$outlets,
    ];
   
    $this->view('collection center/delivered_orders',$data);
  }
  
  public function deliveredordersmore(){
    $id=$_GET['id'];
    $order=$this->productModel->deliveredordersmore($id);
    $data = [
      'order'=>$order
    ];
   
    $this->view('collection center/delivered_orders_more',$data);
  }
  public function farmers(){
    $results=$this->productModel->farmers();
    $data = [
      'result'=>$results
    ];
   
    $this->view('collection center/farmers',$data);
  }
  public function addfarmers(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Process form
      $products= $this->productModel->getProductList();
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data =[
        'nic'=> trim($_POST['nic']),
        'name' => trim($_POST['name']),
        'address'=>trim($_POST['address']),
        'con_number' => trim($_POST['con_number']),
        'product'=>trim($_POST['product']),
        'name_err' => '',
        'address_err' => '',
        'con_number_err' => '',
        'nic_err'=>'',
        'products'=>$products
      ];

      if(empty($data['nic'])){
        $data['name_err'] = 'Please enter National identity number';
      }
      if($this->productModel->findUserBynic($data['nic'])){
        $data['nic_err']="Already registerd with this number";
      } 
      if(empty($data['name'])){
        $data['name_err'] = 'Please enter requester name';
      }
      if(empty($data['con_number'])){
        $data['con_number_err'] = 'please enter contact number';
      }
      if(strlen($data['con_number'])<10){
        $data['con_number_err'] = 'please enter correct contact number';
      }
      if(empty($data['address'])){
        $data['address_err'] = 'plese fill your address';
      }
   
      if(empty($data['name_err']) && empty($data['con_number_err']) && empty($data['address_err']) && empty($data['nic_err'])){
        // Validated


        // Register User
        if($this->productModel->addfarmerdata($data)){
          flash('register_success', 'Registered successfully, We will serve for your requeest');
          redirect('collectioncenterpages/addfarmers');
          
        } else {
          die('Something went wrong');
        }

      } else {
        // Load view with errors
        $this->view('collection center/add_farmer', $data);
      }

    } else {
      // Init data
      $products= $this->productModel->getProductList();
      $data =[
        'nic'=>'',
        'name' =>'',
        'con_number' => '',
        'address' => '',
        'product'=>'',
        'name_err' => '',
        'address_err' => '',
        'con_number_err' => '',
        'nic_err'=>'',
        'products'=>$products
      ];

      // Load view
      $this->view('collection center/add_farmer', $data);
    }
  }
  public function editfarmer(){
    $nic=$_GET['NIC'];
    $farmer=$this->productModel->farmerBio($nic);
    $products= $this->productModel->getProductList();
  $data=[
    'farmer'=>$farmer,
    'products'=>$products
  ];
    $this->view('collection center/edit_farmer', $data);

  }
  public function updatefarmer(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Process form
      $products= $this->productModel->getProductList();
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data =[
        'nic'=>trim($_POST['nic']),
        'name' => trim($_POST['name']),
        'address'=>trim($_POST['address']),
        'con_number' => trim($_POST['con_number']),
        'product'=>trim($_POST['product']),
      ];
      $this->productModel->updatefarmer($data);
      $results=$this->productModel->farmers();
      $data = [
        'result'=>$results
      ];
     
      $this->view('collection center/farmers',$data);
    }
  }
  public function nonlistedboughts(){
    $nic=$_GET['NIC'];
    $broughts=$this->productModel->nonlistedbroughts($nic);
    $data = [
      'broughts'=>$broughts
    ];
    if(sizeof($data['broughts'])==0){
      redirect('collectioncenterpages/notpending');
    }
   else { $this->view('collection center/non-listed-boughts',$data);}
   
  }
  public function createinvoice(){
    $nic=$_GET['NIC'];
    $total=$_GET['total'];
    $today=date("Y/m/d");
   $this->productModel->insertInvoiceRecord($nic,$total,$today);
   $invoiceNumberRow= $this->productModel->getInvoiceNumber();
   $this->productModel->incrementBalance($nic,$total);
   $invoiceNumber = $invoiceNumberRow->invoice;
   $this->productModel->updateInvoiceStatus($nic,$invoiceNumber);

  redirect('Collectioncenterpages/farmers');
   
   
 // $this->view('collection center/farmers');
  }
  public function invoice(){
    $invoice_id=$_GET['id'];
    $invoice=$this->productModel->invoice($invoice_id);
    $data = [
      'invoice'=>$invoice
    ];
     $this->view('collection center/invoiceDetails',$data);
   
  }
  public function setInvoiceStatus(){
    $invoice_id=$_GET['invoice_id'];
    $nic=$_GET['farmer_id'];
    $total=$_GET['total'];
    $data = [
      'invoice'=>$invoice_id
    ];
   
    $today=date("Y-m-d");
   $this->productModel->setInvoiceStatus($invoice_id,$today);
   $this->productModel->decrementBalance($nic,$total);
   $invoice = $this->productModel->farmerInvoice($nic);
   $datanew=[
     'farmer_invoice'=>$invoice,
     'nic'=>$nic 
   ];
   $this->view('collection center/payment_management',$datanew);
  }

  public function paymentmanagement(){
    $nic=$_GET['NIC'];
    $invoice = $this->productModel->farmerInvoice($nic);
    $data = [
      'farmer_invoice'=>$invoice,
      'nic'=>$nic
    ];
   
    $this->view('collection center/payment_management',$data);
  }
  public function employeeSalary(){
    $data = [
    ];
   
    $this->view('collection center/employee_salary');
  }
  public function assignedordersmore($id = 202){
    $order=$this->productModel->assignordermore($id);
    $data = [
      'order'=>$order
    ];
   
    $this->view('collection center/assignedordersmore',$data);
  
  }
  public function assignedordersmore1(){
   $id=$_GET['id'];
    $order=$this->productModel->assignordermore($id);
    $routeddate=$this->productModel->getRoutingDate($id)->delivery_date;
    $drivers=$this->productModel->getdrivers($routeddate);
    $data = [
      'order'=>$order,
      'drivers'=>$drivers
    ];
   
    $this->view('collection center/assignedordersmore',$data);
  

  }
 
  public function addExcess(){
    $products = $this->productModel->getProducts($_SESSION['user_id']);
    $data = [
      'products'=>$products
    ];
   
    $this->view('collection center/add_excess',$data);
  } 

  public function addNewExcess(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
        $data =[
          'quantity'=> trim($_POST['quantity']),
          'product_id' => trim($_POST['product_id']),
          'stock'=>trim($_POST['stock'])
         
        ];
       if($data['quantity']==0){
        redirect('collectioncenterpages/addExcess');
       }
       elseif($data['stock']<$data['quantity']){
         redirect('Collectioncenterpages/error');
       }
       else{
          $today=date("Y/m/d");
          $this->excessModel->addnewexcess($today,$data);
          $this->productModel->reduceStock($data['product_id'],$data['quantity']);
          redirect('collectioncenterpages/pendingExcess');

       }
      }
  }

  public function removeExcess(){
    $data =[
      'quantity'=> $_GET['quantity'],
      'name' =>$_GET['pr_id'],
      
     
    ];
    $id=$_GET['id'];
    
    
   $this->excessModel->removeexcess($id);
   $this->productModel->updateStock($data);
   redirect('collectioncenterpages/pendingExcess');
  }

  public function excessAssignment(){
    
    $result= $this->excessModel->excessDetails();

    $data = [
      'result'=>$result
    ];
   
    $this->view('collection center/excess_assignment',$data);
  }
  public function pendingExcess(){
    $result= $this->excessModel->pendingExcessDetails();
    $data = [
      'result'=>$result
    ];
   
    $this->view('collection center/pending_excess',$data);
  }
  public function orderNeccesity(){
    $products = $this->productModel->getProducts($_SESSION['user_id']);
    $data = [
      'products'=>$products
    ];
   
    $this->view('collection center/order_neccesity',$data);
  }
  public function addNeccesityOrder(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
        $data =[
          'quantity'=> trim($_POST['quantity']),
          'product_id' => trim($_POST['product_id']),
         
        ];
       if($data['quantity']==0){
        redirect('collectioncenterpages/orderNeccesity');
       }
       else{
          //$today=date("Y/m/d");
          $this->neccesityModel->addNeccesityOrder($data['quantity'],$data['product_id']);
          redirect('collectioncenterpages/pendingNeccesity');

       }
      }
  }
  public function pendingNeccesity(){
    $result= $this->neccesityModel->pendingNeccesityDetails();
    $data = [
      'result'=>$result
    ];
   
    $this->view('collection center/pending_neccesity',$data);
  }
  public function neccesityArrival(){
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data =[
      'quantity'=> trim($_POST['quantity']),
      'name' => trim($_POST['pr_id']),
      'date'=>trim($_POST['date']),
      'n_id'=>trim($_POST['n_id']),
     
    ];
    $n_id=$data['n_id'];
    $this->productModel->updateStock($data);
    $this->productModel->changeneccesityStatus($n_id);
    redirect('collectioncenterpages/pendingNeccesity');




  }
  public function reject(){
    $data = [
    ];
   
    $this->view('collection center/reject');
  }
  public function employee(){
    $data = [
    ];
   
    $this->view('collection center/employee');
  }
  public function error(){
    $data = [
    ];
   
    $this->view('collection center/error');
  }
  public function notpending(){
    $data = [
    ];
   
    $this->view('collection center/notpending');
  }
  public function edit(){
    $data = [
    ];
   
    $this->view('collection center/edit_farmer');
  }
  public function editEmployee(){
    $data = [
    ];
   
    $this->view('collection center/edit_employee');
  }
  public function addemployee(){
    $data = [
    ];
   
    $this->view('collection center/add_employee');
  }
  public function removefarmer(){
    $nic=$_GET['id'];
    $this->productModel->removeFarmer($nic);
    redirect('collectioncenterpages/farmers');


  }
  public function productRequest(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
      'productName'=>trim($_POST['productName']),
      'description'=>trim($_POST['description']),
      'type'=>trim($_POST['type']),
      'filename' =>$_FILES["uploadfile"]["name"],
      'tempname'=> $_FILES["uploadfile"]["tmp_name"]
    ];
    $today=date("Y/m/d");
    $folder= '../public/img/vegetables/'.$data['filename'];
    move_uploaded_file($data['tempname'],$folder);
    $this->requestModel->addRequest($data,$today);
    $this->notificModel->Write('373','New product requests has been arrived');
    redirect('collectioncenterpages/pendingRequest');
  }
   else{
    $this->view('collection center/product_request');
   }
  }

  public function pendingRequest(){
    $result= $this->requestModel->getPendingRequests();
    $data = [
      'result'=>$result
    ];
   
    $this->view('collection center/pending_request',$data);
  }
  public function cancelrequest(){
$request_id=$_GET['id'];
$this->requestModel->deleterequest($request_id);
redirect('collectioncenterpages/pendingRequest');
  }
  public function expensesReport(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data =[
        'year' => trim($_POST['year']),
        'month'=>trim($_POST['month']),
        'description' => trim($_POST['description']),
        'total' => trim($_POST['total']),
      ];
      $token=0;
      $result1=$this->requestModel->getExpenseReport();
      $user_id=$this->requestModel->getUserId();
      foreach($result1 as $reports){
        if($reports->year==$data['year'] && $reports->month==$data['month'] && $reports->collection_center_id==$user_id){
          $token=1;
        }
      }
      if($token==0){
        $today=date("Y/m/d");
        $this->requestModel->addExpenseReport($data,$today);
        $this->notificModel->Write('373',"New expenses report has been arrived from ".$_SESSION['user_name']);
       redirect('collectioncenterpages/previousReports');
      }
      elseif($token){
         redirect('collectioncenterpages/reportError');
      }
  }
    $data = [
    ];
    $this->view('collection center/expense_report',$data);
  }
  public function reportError(){
    $this->view('collection center/reporterror');
  }
  public function previousReports(){
    $result= $this->requestModel->getExpenseReport();

    $data = [
      'result'=>$result
    ];
   
    $this->view('collection center/previous_reports',$data);
  }
  public function changeRequestStatus(){
    $request_id=$_GET['id'];
    $this->requestModel->changeRequest($request_id);
    redirect('collectioncenterpages/previousReports');

  }
  public function outlets(){
    $outlets=$this->outletModel->getOutlets();
    $data = [
      'outlets'=> $outlets
    ];
   
    $this->view('collection center/my_outlet',$data);
  }
}
  ?>