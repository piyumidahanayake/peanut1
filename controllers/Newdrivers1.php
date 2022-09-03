<?php
    class Newdrivers1 extends Controller {
      public function __construct(){
        $this->newdriver1Model = $this->model('Newdriver1');
        $this->notificModel = $this->model('Notific');
      }



      public function Newdriverreq(){
      //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //If method id form; then process the form
          //die('Values submitted')
        //Initialize data below
          $data =[
            'name' => trim($_POST['name']),
            'colcen' => trim($_POST['colcen']),
            'address' => trim($_POST['address']),
            'contact_number' => trim($_POST['contact_number']),
            'email' => trim($_POST['email']),
           // 'initial_username' => trim($_POST['initial_username']),
            // 'initial_password' => trim($_POST['initial_password']),
            'name_err' =>'',
            'colcen_err' => '',
            'address_err' => '',
            'contact_number_err' => '',
            'email_err' => '',
            //'initial_username_err' => '',
            //'initial_password_err' => ''
            
         
          ];
          
          $s = 0;
        //Validations
          if(empty($data['name']) || is_numeric($data['name'])){
            $data['name_err'] = 'Please enter a name';
            $s = $s + 1;
          } else {
            if($this->newdriver1Model->checkDriver($data['name'])){
              $data['name_err'] = 'Driver already exists!';
              $s = $s + 1;
            }
          }
          if(empty($data['colcen']) || !is_numeric($data['colcen']) || $data['colcen']==0 ){
            $data['colcen_err'] = 'Please enter a valid collection center ID';
            $s = $s + 1;
          }
          if($this->newdriver1Model->checkCC($data['colcen'])){
            $data['colcen_err'] = 'Collection center does not exist!';
            $s = $s + 1;
          }
          if(empty($data['address'])){
            $data['address_err'] = 'Please enter an address';
            $s = $s + 1;
          }
          if(empty($data['contact_number']) || !is_numeric($data['contact_number'])){
            $data['contact_number_err'] = 'Please enter a contact number';
            $s = $s + 1;
          }
          if(empty($data['email'])){
            $data['email_err'] = 'Please enter a valid email';
            $s = $s + 1;
          } /*
          if(empty($data['initial_username'])){
            $data['initial_username_err'] = 'Please enter a username';
            $s = $s + 1;
          }
          if(empty($data['initial_password'])){
            $data['initial_password_err'] = 'Please enter a password';
            $s = $s + 1;
          }*/
          
          if($s == 0) { //Validated
            if($this->newdriver1Model->addDriver($data)){
              flash('success','Request submitted successfully');
              $this->notificModel->Write("1","New request to add new driver");
              redirect('intermediateoperatorpages/newdrivers');   
            } else {
              die('Something went wrong!');
            }
          } else { //Load with errors
            $this->view('intermediate operator/ITO New Driver Requests', $data);
          }

        } else {
          // Init data
          $data =[    
            'name' =>'',
            'colcen' => '',
            'address' => '',
            'contact_number' => '',
            'email_err' => '',
           // 'initial_username' => '',
           // 'initial_password' => '',
            'name_err' =>'',
            'colcen_err' => '',
            'address_err' => '',
            'contact_number_err' => '',
            'email_err' => '',
           // 'initial_username_err' => '',
            //'initial_password_err' => ''   
          ];
  
          // Load view
          $this->view('intermediateoperatorpages/newdrivers', $data);
        }
      }
    }
    
    
