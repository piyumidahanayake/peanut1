<?php
    class Transfers1 extends Controller {
      public function __construct(){
        $this->transfer1Model = $this->model('Transfer1');
      }



      public function ccrequests(){
      //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //If method id form; then process the form
          //die('Values submitted')
        //Initialize data below
          $data =[
            'request_id' => trim($_POST['request_id']),
            'transferred_amount' => trim($_POST['transferred_amount']),
            'request_status' => trim($_POST['request_status']),
            'request_id_err' => '',
            'transferred_amount_err' => '',
            'request_status_err' => ''
         
          ];

        //Validations
          if(empty($data['transferred_amount'])){
            $data['transferred_amount_err'] = 'Please enter value';

          }

          
          if($this->transfer1Model->findrequestById($data['request_id'])){
            // Product found
          } else {
            // Product not found
            $data['request_id_err'] = 'No such request found!';
          }

          if(empty($data['transferred_amount_err']) && empty($data['request_id_err'])){
           //Validated
           //die('SUCCESS');
          } else {
            $data['request_id_err'] = 'Incorrect Request ID';

            $this->view('users/login', $data);
          }

          if($this->transfer1Model->updateTransAmount($data)){
            redirect('financialoperatorpages/ccrequests');
          } else {
           flash('update_success', 'New values added');
          }
        } else {
          // Init data
          $data =[    
            'request_id' => '',
            'transferred_amount' => '',
            'request_status' => '',
            'request_id_err' => '',
            'transferred_amount_err' => '',
            'request_status_err' => '',      
          ];
  
          // Load view
          $this->view('financialoperatorpages/ccrequests', $data);
        }
      }

      public function delrequests(){
        //Check for POST
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          //If method id form; then process the form
            //die('Values submitted')
          //Initialize data below
            $data =[
              'request_id' => trim($_POST['request_id']),
              'request_status' => 'Rejected',
              'request_id_err' => '',
              'request_status_err' => ''
           
            ];
  
          //Validations
            if(empty($data['request_id'])){
              $data['request_id_err'] = 'Please select a request';
  
            }
  
            
            if($this->transfer1Model->findrequestById($data['request_id'])){
              // Product found
            } else {
              // Product not found
              $data['request_id_err'] = 'No such request found!';
            }
  
            if(empty($data['request_id_err'])){
             //Validated
             //die('SUCCESS');
            } else {
              $data['request_id_err'] = 'Incorrect Request ID';
  
              $this->view('users/login', $data);
            }
  
            if($this->transfer1Model->deleteTransfer($data)){
              redirect('financialoperatorpages/ccrequests');
            } else {
             flash('delete_success', 'Request Deleted');
            }
          } else {
            // Init data
            $data =[    
              'request_id' => '',
              //'transferred_amount' => '',
              'request_status' => '',
              'request_id_err' => '',
              //'transferred_amount_err' => '',
              'request_status_err' => '',      
            ];
    
            // Load view
            $this->view('financialoperatorpages/ccrequests', $data);
          }
        }
    }
    
    
      
