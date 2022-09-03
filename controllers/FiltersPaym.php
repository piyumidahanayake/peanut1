<?php
    class FiltersPaym extends Controller {
      public function __construct(){
        $this->paymentsfiltrModel = $this->model('FilterPaym');
        $this->colcen1Model = $this->model('Colcen1');
        $this->colcen2Model = $this->model('Colcen2');
        $this->outlet1Model = $this->model('Outlet1');
        $this->paymentst1Model = $this->model('PaymentsT1');
      }



      public function filtering(){
      //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //If method id form; then process the form
          //die('Values submitted')
        //Initialize data below
          $data =[
            'outlet_id' => trim($_POST['outlet_id']),
            'ordered_date' => trim($_POST['date_ordered']),
            'status' => trim($_POST['payment_status'])
          ];

          if($data['outlet_id']==" ") {
            $data['outlet_id'] = "0"; 
          }
          if($data['status']==" ") {
            $data['status'] = "0"; 
          }
          if($data['ordered_date']==" ") {
            $data['ordered_data'] = NULL; 
          }



          if($data['outlet_id']=="0"){
            if($data['ordered_date']==NULL) {
              if($data['status']=="0") {
                $invoiceNP = $this->paymentsfiltrModel->getOrders();
                $outlet_id = " ";
                $ordered_date = " ";
                $status = " ";
                $outlet_name = " ";
              } else {
                $outlet_id = " ";
                $ordered_date = " ";
                $status = $data['status'];
                $outlet_name = " ";
                $invoiceNP = $this->paymentsfiltrModel->getOrders001($data);
              }
            } else {
              if($data['status']=="0") {
                $status = " ";
                $outlet_id = " ";
                $ordered_date = $data['ordered_date'];
                $outlet_name = " ";
                $invoiceNP = $this->paymentsfiltrModel->getOrders010($data);
              } else {
                $status = $data['status'];
                $outlet_id = " ";
                $ordered_date = $data['ordered_date'];
                $outlet_name = " ";
                $invoiceNP = $this->paymentsfiltrModel->getOrders011($data);
              }
            }
          } else {
            if($data['ordered_date']==NULL) {
              if($data['status']=="0") {
                $ordered_date = " ";
                $status = " ";
                $outlet_id = $data['outlet_id'];
                $outlet_nm = $this->paymentsfiltrModel->getSelOrdOutlet($outlet_id);
                $outlet_name = $outlet_nm->outlet_name;
                $invoiceNP = $this->paymentsfiltrModel->getOrders100($data);
              } else {
                $ordered_date = " ";
                $status = $data['status'];
                $outlet_id = $data['outlet_id'];
                $outlet_nm = $this->paymentsfiltrModel->getSelOrdOutlet($outlet_id);
                $outlet_name = $outlet_nm->outlet_name;
                $invoiceNP = $this->paymentsfiltrModel->getOrders101($data);
              }
            } else {
              if($data['status']=="0") {
                $ordered_date = $data['ordered_date'];
                $status = " ";
                $outlet_id = $data['outlet_id'];
                $outlet_nm = $this->paymentsfiltrModel->getSelOrdOutlet($outlet_id);
                $outlet_name = $outlet_nm->outlet_name;
                $invoiceNP = $this->paymentsfiltrModel->getOrders110($data);
              } else {
                $ordered_date = $data['ordered_date'];
                $status = $data['status'];
                $outlet_id = $data['outlet_id'];
                $outlet_nm = $this->paymentsfiltrModel->getSelOrdOutlet($outlet_id);
                $outlet_name = $outlet_nm->outlet_name;
                $invoiceNP = $this->paymentsfiltrModel->getOrders111($data);
              }
            }
          }

          $invoicePd = array();
          $invoiceCm = array();

          $outlet1 = $this->outlet1Model->getTheOutlets($_SESSION['user_id']);
        
          if($this->paymentst1Model->setStateL()){
            if($this->paymentst1Model->setStateS()) {
              $data = [
                'invoiceNP' => $invoiceNP,
                'invoicePd' => $invoicePd,
                'invoiceCm' => $invoiceCm,
                'outlet1' => $outlet1,
                'outlet_id' => $outlet_id,
                'outlet_name' => $outlet_name,
                'status' => $status,
                'ordered_date' => $ordered_date
              ];
        
              $this->view('financial operator/FO_Payment_Catalogue', $data);
            }
          }
      } else {
        $invoiceNP = $this->paymentst1Model->getNotPaidOrders($_SESSION['user_id']);
        $invoicePd = $this->paymentst1Model->getPaidOrders($_SESSION['user_id']);
        $invoiceCm = $this->paymentst1Model->getCompOrders($_SESSION['user_id']);
        $outlet1 = $this->outlet1Model->getTheOutlets($_SESSION['user_id']);
        
        if($this->paymentst1Model->setStateL($_SESSION['user_id'])){
          if($this->paymentst1Model->setStateS($_SESSION['user_id'])) {
            $data = [
              'invoiceNP' => $invoiceNP,
              'invoicePd' => $invoicePd,
              'invoiceCm' => $invoiceCm,
              'outlet1' => $outlet1,
              'outlet_id' => $outlet_id,
              'outlet_name' => $outlet_name,
              'status' => $status,
              'ordered_date' => $ordered_date
            ];
      
            $this->view('financial operator/FO_Payment_Catalogue', $data);
          }
        }
      }

       
    }

    public function returning(){
      $invoiceNP = $this->paymentst1Model->getNotPaidOrders($_SESSION['user_id']);
      $invoicePd = $this->paymentst1Model->getPaidOrders($_SESSION['user_id']);
      $invoiceCm = $this->paymentst1Model->getCompOrders($_SESSION['user_id']);
      $outlet1 = $this->outlet1Model->getTheOutlets($_SESSION['user_id']);
      
      if($this->paymentst1Model->setStateL($_SESSION['user_id'])){
        if($this->paymentst1Model->setStateS($_SESSION['user_id'])) {
          $data = [
            'invoiceNP' => $invoiceNP,
            'invoicePd' => $invoicePd,
            'invoiceCm' => $invoiceCm,
            'outlet1' => $outlet1
          ];
    
          $this->view('financial operator/FO_Payment_Catalogue', $data);
        }
      }
    }

    public function searching(){
      //Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //If method id form; then process the form
        //die('Values submitted')
        //Initialize data below
        $data =[
          'searchterm' => trim($_POST['searchterm'])
        ];

        if($data['searchterm']==NULL){
          echo "Please type something to search!";
          return;
        }

        $invoiceNP = $this->paymentsfiltrModel->getOrdersSearch($data);

        if(empty($invoiceNP)) {
          echo "<h3>No results found!</h3>";
          echo "<a href='returning'>Back</a>";
          return;
          /*$invoicePd = array("order_id_id"=>" ", "outlet_id"=>" ", "toatal_amount"=>" ", "payment_status"=>" ");*/
        }

        $outlet_id = " ";
        $ordered_date = " ";
        $status = " ";
        $outlet_name = " ";

        $invoiceCm = array();
        $invoicePd = array();

        $outlet1 = $this->outlet1Model->getTheOutlets($_SESSION['user_id']);

        if($this->paymentst1Model->setStateL()){
          if($this->paymentst1Model->setStateS()) {
            $data = [
              'invoiceNP' => $invoiceNP,
              'invoicePd' => $invoicePd,
              'invoiceCm' => $invoiceCm,
              'outlet1' => $outlet1,
              'outlet_id' => $outlet_id,
              'outlet_name' => $outlet_name,
              'status' => $status,
              'ordered_date' => $ordered_date
            ];

      $this->view('financial operator/FO_Payment_Catalogue', $data);
    }
  }
      } else {
        $invoiceNP = $this->paymentst1Model->getNotPaidOrders($_SESSION['user_id']);
        $invoicePd = $this->paymentst1Model->getPaidOrders($_SESSION['user_id']);
        $invoiceCm = $this->paymentst1Model->getCompOrders($_SESSION['user_id']);
        $outlet1 = $this->outlet1Model->getTheOutlets($_SESSION['user_id']);
        
        if($this->paymentst1Model->setStateL($_SESSION['user_id'])){
          if($this->paymentst1Model->setStateS($_SESSION['user_id'])) {
            $data = [
              'invoiceNP' => $invoiceNP,
              'invoicePd' => $invoicePd,
              'invoiceCm' => $invoiceCm,
              'outlet1' => $outlet1
            ];
      
            $this->view('financial operator/FO_Payment_Catalogue', $data);
          }
        }
      }
    }
  }

    
    