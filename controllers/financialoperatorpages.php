<?php
  class financialoperatorpages extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      $this->product1Model = $this->model('Product1');
      $this->productmModel = $this->model('Productm');
      $this->newitem1Model = $this->model('Newitem1');
      $this->ccrequest1Model = $this->model('Ccrequest1');
      $this->prvtransfers1Model = $this->model('Prvtransfers1');
      $this->prvtransfers2Model = $this->model('Prvtransfers2');
      $this->colcen1Model = $this->model('Colcen1');
      $this->outlet1Model = $this->model('Outlet1');
      $this->drivers1Model = $this->model('Drivers1');
      $this->drivers2Model = $this->model('Drivers2');
      $this->fetchModel = $this->model('Fetch');
      $this->transactdModel = $this->model('TransactionD');
      $this->transact1Model = $this->model('Transaction1');
      $this->paymentst1Model = $this->model('PaymentsT1');
      $this->notificModel = $this->model('Notific');

    }
    
    public function home(){
     $newccreq = $this->paymentst1Model->addNewRequests();
      $newpaids = $this->paymentst1Model->addPaidOrders();
      $notificount = $this->notificModel->CountAlert($_SESSION['user_id']);
      $data = [
       'newccreq' => $newccreq,
        'newpaids' => $newpaids,
        'notificount' => $notificount
      ];
      
     
     
      $this->view('financial operator/home', $data);
    }

   
  

    public function ccrequests(){
      $ccrequest1 = $this->ccrequest1Model->getTheRequests($_SESSION['user_id']);
      $row = $this->ccrequest1Model->setAsViewed();
      $data = [
        'ccrequest1' => $ccrequest1,
        'row' => $row
      ];
      
   
      $this->view('financial operator/foccrequests', $data);
    }



    public function ccoutletorderrprt(){
      $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
      $outlet1 = $this->outlet1Model->getTheOutlets($_SESSION['user_id']);
      $data = [
        'colcen1' => $colcen1,
        'outlet1' => $outlet1

      ];
 
      $this->view('financial operator/FO_CC_Outlet_Orders_Report', $data);
    }

  

    public function intermorderreport(){
      $drivers1 = $this->drivers1Model->getTheDrivers($_SESSION['user_id']);
      $drivers2 = $this->drivers2Model->getTheDrivers($_SESSION['user_id']);
      $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
      $data = [
        'drivers1' => $drivers1,
        'drivers2' => $drivers2,
        'colcen1' => $colcen1
      ];
 
      $this->view('financial operator/FO_Interm_Orders_Report', $data);
    }


    public function paymentcat(){
      $invoiceNP = $this->paymentst1Model->getNotPaidOrders();
      $invoicePd = $this->paymentst1Model->getPaidOrders();
      $invoiceCm = $this->paymentst1Model->getCompOrders();
      $outlet1 = $this->outlet1Model->getTheOutlets();
      
      if($this->paymentst1Model->setStateL()){
        if($this->paymentst1Model->setStateS()) {
          $data = [
            'invoiceNP' => $invoiceNP,
            'invoicePd' => $invoicePd,
            'invoiceCm' => $invoiceCm,
            'outlet1' => $outlet1
          ];
    
          $this->view('financial operator/FO_Payment_Catalogue', $data);
        }
      }

      /*$data = [
        'invoiceNP' => $invoiceNP,
        'invoicePd' => $invoicePd,
        'invoiceCm' => $invoiceCm
      ];

      $this->view('financial operator/FO_Payment_Catalogue', $data);*/
    }

    public function paymentview(){
      $transmonth1 = $this->fetchModel->getTheTransactions();
      $data = [
        'transmonth1' => $transmonth1
      ];

      $this->view('financial operator/FO Transactions', $data);
    }

    public function paymentview1(){
      $transacts1 = $this->transactdModel->getTransactions();
      $data = [
        'transacts1' => $transacts1
      ];

      $this->view('financial operator/FO Transactions1', $data);
    }


    public function fomaxrates(){
      $product1 = $this->product1Model->getTheProducts();
        $data = [
          'product1' => $product1
        ];

      $this->view('financial operator/fomaxrates', $data);
    }



    public function newitems(){
      $newitem1 = $this->newitem1Model->getNewItems();
        $data = [
          'newitem1' => $newitem1
        ];

      $this->view('financial operator/FO_Prd_Cat_newitems', $data);
    }



    public function productlist(){
    
      $productm = $this->productmModel->getMainProducts();
        $data = [
          'productm' => $productm,
          'name_err' => '',
          'type_err' => '',
          'description_err' => ''
        ];
   

      $this->view('financial operator/FO_Prd_Cat_productlist', $data);
    }

    public function productcat(){
      $newitem1 = $this->newitem1Model->getNewItems();
        $data = [
          'newitem1' => $newitem1
        ];
        
      $this->view('financial operator/FO_Prd_Cat_newitems', $data);
      //$this->view('financial operator/FO_Product_Catalogue_home', $data);
    }


    public function sumreqtransf(){
      $prvtransfers1 = $this->prvtransfers1Model->getTheRequests();
      $prvtransfers2 = $this->prvtransfers2Model->getTheRequests();
      $colcen1 = $this->colcen1Model->getTheCCs();

      $data = [
        'prvtransfers1' => $prvtransfers1,
        'prvtransfers2' => $prvtransfers2,
        'colcen1' => $colcen1,
        'ccnm' => '',
        'ccid' => '',
        'fromd' => '',
        'tod' => ''
      ];
      

      $this->view('financial operator/FO_Sumry_Req_Transf', $data);
    }
   
  }

