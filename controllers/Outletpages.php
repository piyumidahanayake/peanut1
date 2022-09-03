<?php
  class Outletpages extends Controller {
    public function __construct(){
    
      $this->productModel = $this->model('pay1');
      $this->transact1Model = $this->model('Transaction1');
        $this->notificModel = $this->model('Notific');
        $this->drivers1Model = $this->model('Drivers1');

    }
    
    public function home(){
      $p=$_SESSION['user_name'];
      $products = $this->productModel->getProducts($_SESSION['user_id']);
       $notificount = $this->notificModel->CountAlert($_SESSION['user_id']);
      $data = [
         'products' => $products,
         'p'=>$p,
         'notificount' => $notificount,
      ];
     
      $this->view('outlet/home', $data);
     
    }


    public function iorder2(){
      $drivers1 = $this->drivers1Model->getTheDrivers($_SESSION['user_id']);
      $data = [
        'drivers1' => $drivers1
      ];

      $this->view('outlet/checkout', $data);
    }

    public function home1(){
      $p=$_SESSION['user_name'];
      $p_id=$_POST['product_id'];
      $products = $this->productModel->getProducts1($_SESSION['user_id'],$p_id);
      $data = [
        'products' => $products,
        'p'=>$p
      ];
     
      $this->view('outlet/home', $data);
     
    }

   public function accsort(){
    $p=$_SESSION['user_name'];
     $result= $this->productModel->viewinvoice();
      $data = [
       'result' => $result,
       'p'=>$p
      ];
     
      $this->view('outlet/accsort', $data);
      
    }
   
    public function accsort2(){
      $p=$_SESSION['user_name'];
  $date1=$_POST['order_date'];
  $result=$this->productModel->viewin1($date1);
      $data = [
        'result' => $result,
        'p'=>$p
      ];
     
      $this->view('outlet/accsort', $data);
      
    }
 public function acc1(){
  $p=$_SESSION['user_name'];
      $data =[
        'id'=> $_GET['id1'],
        'order' =>'',

      ];
      $order=$this->productModel->assignordermore($data['id']);



      $data = [
        
        'order' => $order,
        'p'=>$p
      ];
     
      $this->view('outlet/acc1', $data);
      
    }
    public function accdetails(){
      $p=$_SESSION['user_name'];
     $data =[
        'id'=> $_GET['id'],
        'order' =>'',
      ];
      $order=$this->productModel->assignordermore($data['id']);



      $data = [
        'id'=> $_GET['id'],
        'order' => $order,
        'p'=>$p
      ];
     
      $this->view('outlet/accdetails', $data);
      
    }
public function accfinal1(){
  $p=$_SESSION['user_name'];
      $data = [
        'title' => 'SharePosts',
        'p'=>$p
      ];
     
      $this->view('outlet/accfinal1', $data);
      
    }
public function collection(){
  $p=$_SESSION['user_name'];
  $collection=$this->productModel->collection();
      $data = [
        'collection' => $collection,
        'p'=>$p
      ];
     
      $this->view('outlet/collection', $data);
      
    }
public function dailysale(){
  $p=$_SESSION['user_name'];
  $date1=$_POST['selling_date'];
  $daily=$this->productModel->daily($date1);
      $data = [
        'daily' => $daily,
        'p'=>$p
      ];
     
      $this->view('outlet/dailysale', $data);
      
    }
public function dailysale1(){
  $p=$_SESSION['user_name'];
      $data = [
        'title' => 'SharePosts',
        'p'=>$p
      ];
     
      $this->view('outlet/dailysale1', $data);
      
    }
public function weeklysale1(){
$p=$_SESSION['user_name'];
   
  $date1=$_POST['from_date'];
  $date2=$_POST['to_date'];
  $result = $this->productModel->weeklysale($date1,$date2);
  $result1=$this->productModel->getProducts($_SESSION['user_id']);

      $data = [
        
        'result' => $result,
        'result1'=>$result1,
        'p'=>$p
        
      ];
      
      $this->view('outlet/weeklysale1', $data);
      
    }
    public function weeklysale(){
      $p=$_SESSION['user_name'];
      $data = [
        'title' => 'SharePosts',
        'p'=>$p
      ];
     
      $this->view('outlet/weeklysale', $data);
      
    }
    
public function viewin1(){
  $p=$_SESSION['user_name'];
  $date1=$_POST['order_date'];
  $result=$this->productModel->viewin1($date1);
      $data = [
        'result' => $result,
        'p'=>$p
      ];
     
      $this->view('outlet/viewin', $data);
      
    }
public function viewin2(){
  $p=$_SESSION['user_name'];
  $date1=$_POST['order_date'];
  $status=filter_input(INPUT_POST,'status' ,FILTER_SANITIZE_STRING);
  $result=$this->productModel->viewin2($status,$date1);
      $data = [
        'result' => $result,
        'p'=>$p
      ];
     
      $this->view('outlet/viewin', $data);
      
    }
public function editrate(){
  $p=$_SESSION['user_name'];
     $data =[
      
        'id'=> $_GET['id'],
        'order' =>'',
      ];
      $order=$this->productModel->editrate($data['id']);



      $data = [
        'id'=> $_GET['id'],
        'order' => $order,
        'p'=>$p
      ];
     
      $this->view('outlet/editrate', $data);
      
    }
    public function editrate1(){
      $p=$_SESSION['user_name'];
      $edit = $this->productModel->getProducts($_SESSION['user_id']);
      $data = [
        'edit' => $edit,
        'p'=>$p
      ];
     
      $this->view('outlet/editrate1', $data);
      
    }
public function financial(){

$p=$_SESSION['user_name'];


      $data = [
        
        'financial' => '$financial',
        'p'=>$p
      ];
     
      $this->view('outlet/financial', $data);
      
    }
    public function financial1(){
      $p=$_SESSION['user_name'];
      $year=$_POST['year'];
$month1=$_POST['month1'];

$financial = $this->productModel->financial($year,$month1);
$financial1 = $this->productModel->financial_p($year,$month1);
      $data = [
        'financial' => $financial,
        'financial1' => $financial1,
        'm'=>$month1,
        'y'=>$year,
        'p'=>$p
      ];
     
      $this->view('outlet/financial1', $data);
      
    }
public function full(){
  $p=$_SESSION['user_name'];
      $data = [
        'title' => 'SharePosts',
        'p'=>$p
      ];
     
      $this->view('outlet/full', $data);
      
    }
public function full1(){
  $p=$_SESSION['user_name'];
$data =[
        'id'=> $_GET['id'],
        'order' =>'',

      ];
      $order=$this->productModel->assignordermore($data['id']);
$order1=$this->productModel->payst($data['id']);


      $data = [
        'id'=> $_GET['id'],
        'order' => $order,
        'order1' => $order1,
        'p'=>$p
      ];
    
      $this->view('outlet/full1', $data);
      
    }

    public function orderdescription(){
      $p=$_SESSION['user_name'];
      $data =[
        'id'=> $_GET['id'],
        'order' =>'',
      ];
      $order=$this->productModel->assignordermore($data['id']);
$order1=$this->productModel->payst($data['id']);


      $data = [
        'id'=> $_GET['id'],
        'order' => $order,
        'order1' => $order1,
        'p'=>$p
      ];
    
      $this->view('outlet/orderdescription', $data);
    }
public function newsale1(){
  $p=$_SESSION['user_name'];
   $productList=$this->productModel->getProducts($_SESSION['user_id']);
      $data = [
        'products' => $productList,
        'p'=>$p
      ];
     
      $this->view('outlet/newsale1', $data);
      
    
    }

  public function addProductSubmit(){
    $p=$_SESSION['user_name'];
      $productList=$this->productModel->getProducts($_SESSION['user_id']);
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data =[
          'n' => $productList,
          'outlet_id'=>2,
          'id'=> trim($_POST['product_id']),
          'amount' => trim($_POST['amount']),
          'money_receive' => trim($_POST['money_receive']),
          'date' => trim($_POST['date']),
          'p'=>$p
        ];

        if($this->productModel->addSale($data) && $this->productModel->reduceStock($data)){
          redirect('Outletpages/dailysale1');
          //flash('add_success', 'We will serve for your requeest');
        }
        else{
          $this->view('outlet/newsale1', $data);
        }


      }
      else{
        $data =[    
          'n' => $productList,
          'm' => $farmerList,
          'id'=> $s,
          'quantity' => '',
          'farmer' =>'',
          'rate' => '',
          'date' => '',
          
          'quantity_err'=>'',
          'farmer_err'=>'',
          'rate_err'=>'',
        ];

        // Load view
        $this->view('outlet/newsale1', $data);
      }

  }
      
    


    public function pay(){
      $p=$_SESSION['user_name'];
     $orders1=$this->productModel->payst1();
    $data = [
        'orders1' => $orders1,
        'p'=>$p
      ];
     
       $this->view('outlet/FO_Outlet_Paypal_Sandbox_Test', $data);
      
    }
     
     public function pay1(){
      $p=$_SESSION['user_name'];
      $data =[
        'id'=> $_GET['id'],
        'order' =>'',
        'st' => $_GET['st']
      ];
      $order=$this->productModel->assignordermore($data['id']);



      $data = [
        'id'=> $_GET['id'],
        'order' => $order,
        'st'=> $_GET['st'],
        'p'=>$p
      ];
    
       $this->view('outlet/pay1', $data);
      
    }
      
    
public function payhistry1(){
  $p=$_SESSION['user_name'];
     $payhistry = $this->productModel->payhistry($_SESSION['user_id']);
      $data = [
        'payhistry' => $payhistry,
        'p'=>$p
      ];
     
      $this->view('outlet/payhistry1', $data);
      
    }
    public function payhistry2(){
      $p=$_SESSION['user_name'];
      $date1=$_POST['paid_date'];
     $payhistry = $this->productModel->payhistry2($date1);
      $data = [
        'payhistry' => $payhistry,
        'p'=>$p
      ];
     
      $this->view('outlet/payhistry1', $data);
      
    }
public function payinv(){
  $p=$_SESSION['user_name'];
      $no=$_POST['order_no'];
     $payhistry = $this->productModel->payinv($no);
      $data = [
        'payhistry' => $payhistry,
        'p'=>$p
      ];
     
      $this->view('outlet/payhistry1', $data);
      
    }




public function prediction1(){
  $p=$_SESSION['user_name'];
$result= $this->productModel->prediction();
$products = $this->productModel->getProducts($_SESSION['user_id']);
      $data = [
        'result' => $result,
        'products' => $products,
        'p'=>$p
      ];

       $this->view('outlet/prediction1', $data);
      
       
    }
public function rep(){
  $p=$_SESSION['user_name'];
     $data =[
        'id'=> $_GET['id'],
        'order' =>'',
      ];
      $order=$this->productModel->assign($data['id']);



      $data = [
        'id'=>$_GET['id'],
        'order' => $order,
        'p'=>$p
      ];
     
      $this->view('outlet/rep', $data);
      
    }
    public function rep1(){
      $p=$_SESSION['user_name'];
      $data = [
        'title' => 'SharePosts',
        'p'=>$p
      ];
     
      $this->view('outlet/rep1', $data);
      
    }
public function reportsort(){
  $p=$_SESSION['user_name'];
     $result= $this->productModel->rep();
      $data = [
       'result' => $result,
       'p'=>$p
      ];
     
     
     
      $this->view('outlet/reportsort', $data);
      
    }

    public function reportsort1(){
      $p=$_SESSION['user_name'];
  $date1=$_POST['order_date'];
  $result=$this->productModel->rep1($date1);
      $data = [
        'result' => $result,
        'p'=>$p
      ];
     
      $this->view('outlet/reportsort', $data);
      
    }

    public function reportsort2(){
      $p=$_SESSION['user_name'];
  $status=filter_input(INPUT_POST,'status' ,FILTER_SANITIZE_STRING);
  $result=$this->productModel->rep2($status);
      $data = [
        'result' => $result,
        'p'=>$p
      ];
     
      $this->view('outlet/reportsort', $data);
      
    }
public function viewin(){
  $p=$_SESSION['user_name'];
  $result= $this->productModel->viewinvoice();
      $data = [
       'result' => $result,
       'p'=>$p
      ];
     
      $this->view('outlet/viewin', $data);
      
    }


public function product(){
  $p=$_SESSION['user_name'];
      $data = [
        'title' => 'SharePosts',
        'p'=>$p
      ];
     
      $this->view('outlet/product', $data);
      
    }
public function index1(){
  $p=$_SESSION['user_name'];
      $data = [
        
        'p'=>$p
      ];
     
      $this->view('outlet/index1', $data);
      
    }
    public function process_order(){
      $p=$_SESSION['user_name'];
      $data = [
        'p'=>$p
      ];
     
      $this->view('outlet/process_order', $data);
      
    }
    public function index2(){
      $p=$_SESSION['user_name'];
      $productList=$this->productModel->getProducts_cc();
      $data = [
        'products' => $productList,
        'p'=>$p
      ];
     
      $this->view('outlet/index2', $data);
      
    }

    public function index_se(){
      $p=$_SESSION['user_name'];
     $p_id=$_POST['product_id'];
      $productList=$this->productModel->getProducts_se($p_id);
      $data = [
        'products' => $productList,
        'p'=>$p
      ];
     
      $this->view('outlet/index2', $data);
      
    }


    public function index22(){
      $p=$_SESSION['user_name'];
     $p_id=$_POST['product_id'];
      $productList=$this->productModel->getProductss($_SESSION['user_id'],$p_id);
      $data = [
        'products' => $productList,
        'p'=>$p
      ];
     
      $this->view('outlet/newsale1', $data);
      
    }




    public function orderhistory(){
      $p=$_SESSION['user_name'];
     $result= $this->productModel->viewinvoice11();
      $data = [
       'result' => $result,
       'p'=>$p
      ];
     
      $this->view('outlet/orderhistory', $data);


      
    }

    public function o_histry(){
      $p=$_SESSION['user_name'];
      $date1=$_POST['ordered_date'];
      $status=filter_input(INPUT_POST,'status' ,FILTER_SANITIZE_STRING);
     $result= $this->productModel->o_histry($status,$date1);
      $data = [
       'result' => $result,
       'p'=>$p
      ];
     
      $this->view('outlet/orderhistory', $data);


      
    }
    public function o_histry1(){
      $p=$_SESSION['user_name'];
       $date1=$_POST['ordered_date'];
     $result= $this->productModel->o_histry1($date1);
      $data = [
       'result' => $result,
       'p'=>$p
      ];
     
      $this->view('outlet/orderhistory', $data);


      
    }

    public function checkout(){
      $p=$_SESSION['user_name'];
      $data = [
        'p'=>$p
      ];
     
      $this->view('outlet/checkout', $data);
      
    }
    public function checkout1(){
      $p=$_SESSION['user_name'];
      $check = $this->productModel->getProducts($_SESSION['user_id']);
      $data = [
        'check' => $check,
        'p'=>$p
      ];
     
      $this->view('outlet/checkout1', $data);
      
    }
    public function process_order1(){
      $p=$_SESSION['user_name'];
      $data = [
        'p'=>$p
      ];
     
      $this->view('outlet/process_order1', $data);
      
    }
    public function profile1(){
      $p=$_SESSION['user_name'];
      $data = [
        'p'=>$p
      ];
     
      $this->view('outlet/profile1', $data);
      
    }

    public function assignment(){
      $p=$_SESSION['user_name'];
    $rate=$_POST['selling_rate'];
    $id=$_POST['product_id'];
    $uid=$_SESSION['user_id'];
    $this->productModel->updaterate($rate,$id,$uid);

    $edit = $this->productModel->getProducts($_SESSION['user_id']);
      $data = [
        'edit' => $edit,
        'p'=>$p
      ];
     
      $this->view('outlet/editrate1', $data);
      
    }
      public function reject(){
        
      $id=$_POST['order_id'];
      $this->productModel->updatereject($id);
      $this->productModel->deletereject($id);
      if($this->productModel->deletereject1($id)){
        redirect('Outletpages/reportsort');
      }


      
      }
   
    

    public function accept(){
      $p=$_SESSION['user_name'];
    $id=$_POST['order_id'];
    $quantity=$_POST['quantity'];
    $date1=date('Y-m-d');
    $outlet_id=$_SESSION['user_id'];
    $c=0;
    $p=0;
    $this->productModel->updateorder($id,$quantity);
    $this->productModel->updatedelivery($id,$date1);
    $this->productModel->updateacc($id,$outlet_id);
    $order=$this->productModel->assignordermore($id);
    $data = [
        'id' => $id,
        'order' => $order
      ];
         foreach ($data['order'] as $order):
          
          $p_id=$order->product_id;
          $a_quantity=$order->assigned_quantity;
           $p=$a_quantity*$order->price1;
          $c = $c+($a_quantity*$order->price1);
          $this->productModel->updatestock($outlet_id,$p_id,$a_quantity);
          $this->productModel->updateprice($id,$p_id,$p);
          endforeach;
         if($this->productModel->updatetotal($outlet_id,$id,$c)){
           redirect('Outletpages/orderhistory');
         }
        
    }

    public function accept1(){
    $id=$_POST['order_id'];
    $p=$_SESSION['user_name'];
    $date1=date('Y-m-d');
    $outlet_id=$_SESSION['user_id'];
    $c1=0;
    $c2=0;
    $p1=0;
    $data =[
        'id'=> $id,
        'order' =>'',
      ];
      $order=$this->productModel->assignordermore($id);



      $data = [
        
        'order' => $order,
         'p'=>$p
      ];
     
      $this->view('outlet/acc1', $data);
    $this->productModel->updatedelivery($id,$date1);
    $this->productModel->updateacc($id,$outlet_id);
    $order=$this->productModel->assignordermore($id);
    $data = [
        'id' => $id,
        'order' => $order
      ];
         foreach ($data['order'] as $order):
          $p_id=$order->product_id;
          if($_POST['product_id']==$p_id){
            if($_POST['quantity']>0){
            

          $a_quantity=$_POST['quantity'];
          $p1=$a_quantity*$order->price1;
          $c1 = $c1+($a_quantity*$order->price1);
          $quantity=$order->assigned_quantity-$a_quantity;
          $this->productModel->updateorder1($id,$p_id,$quantity);
          $this->productModel->updatestock($outlet_id,$p_id,$a_quantity);
          $this->productModel->updateprice($id,$p_id,$p1);
        }
        else{
          
           $a_quantity=$order->assigned_quantity;
           $p1=$a_quantity*$order->price1;
          $c2 = $c2+($a_quantity*$order->price1);
          $this->productModel->updatestock($outlet_id,$p_id,$a_quantity);
          $this->productModel->updateprice($id,$p_id,$p1);
              }
        }
        
          endforeach;
          $c=$c1+$c2;
          $this->productModel->updatetotal($outlet_id,$id,$c);

    }


    public function test(){
      $p=$_SESSION['user_name'];
      $orders1 = $this->transact1Model->getOrdersToPay();
      $data = [
        'orders1' => $orders1,
        'p'=>$p
      ];

      $this->view('outlet/FO_Outlet_Paypal_Sandbox_Test', $data); /*CHANGE financialoperator into outlet*/ /*add as a part of outletpages.php controller*/
    }

    public function pp(){
       $p=$_SESSION['user_name'];
    $data = [
       'p'=>$p
    ];
   
    $this->view('outlet/pp',$data);
  }
    

  }


?>




