<?php
    class Transactions1 extends Controller {
      public function __construct(){
        $this->transaction1Model = $this->model('Transaction1');
      $this->notificModel = $this->model('Notific');

      }



      public function NewPay(){
      //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //If method id form; then process the form
          //die('Values submitted')
        //Initialize data below
          $data =[
            'transaction_id' => trim($_POST['transaction_id']),
            'amount_paid' => trim($_POST['amount']),
            'entered_date' => trim($_POST['date']),
            'invoice_no' => trim($_POST['invoice_no']),
            'transaction_id_err' => '',
            'amount_paid_err' => '',
            'entered_date_err' => '',
            'invoice_no_err' => ''
           
         
          ];

        //Validations
          

          if(empty($data['transaction_id'])){
           $data['transaction_id_err'] = 'Please enter transaction id';
          
          }
          
          

          if($this->transaction1Model->insertTransact($data)){
            redirect('Pay/test'); //change to outlet pages / pay
             $this->notificModel->Write('373',"Payment has been successfully completed - Invoice number(".$data['invoice_no'].")");
          } else {
           flash('update_success', 'New values added');
         //  $this->notificModel->Write('373',"Payment has been successfully completed ".$data['invoice_no']);

          }
        } else {
          // Init data
          $data =[    
            'transaction_id' => '',
            'amount_paid' => '',
            'entered_date' => '',
            'invoice_no' => '',
            'transaction__id_err' => '',
            'amount_paid_err' => '',
            'entered_date_err' => '',
            'invoice_no_err' => ''  
          ];
  
          // Load view
          $this->view('Outletpages/test', $data); //change to outlet pages / pay
        }
      }
    }
    
    
 
