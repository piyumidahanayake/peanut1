<?php
  class Pay extends Controller {
    public function __construct(){
      $this->transact1Model = $this->model('Transaction1');
    }
    
    public function test(){
      
      $orders1 = $this->transact1Model->getOrdersToPay($_SESSION['user_id']);
      $data = [
        'orders1' => $orders1,
        
      ];

       $this->view('financial operator/FO_Outlet_Paypal_Sandbox_Test', $data); /*CHANGE financialoperator into outlet*/ /*add as a part of outletpages.php controller*/
    }


  }

