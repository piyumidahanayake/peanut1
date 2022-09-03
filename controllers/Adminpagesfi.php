<?php
    class Adminpagesfi extends Controller {

        public function __construct(){
            $this->userModel = $this->model('operators');
        }

        public function home(){
          $data = [

          ];
          $this->view('Admin/AdminHome', $data);
        }
        
        //financial operator
        public function financial(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form
                //die('submittsed');
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                // Init data
                $data =[
                  'name' => trim($_POST['name']),
                  'address' => trim($_POST['address']),
                  'con_number' => trim($_POST['con_number']),
                  'email' => trim($_POST['email']),
                  'type' => trim($_POST['type']),
                  // 'username' => trim($_POST['username']),
                  // 'password' => trim($_POST['password']),
                  'name_err' => '',
                  'address_err' => '',
                  'con_number_err' => '',
                  'email_err' => '',
                  'type_err' => '',
                  // 'username_err' => '',
                  // 'password_err' => '',
                ];

                // Validate Name
                if(empty($data['name'])){
                  $data['name_err'] = 'Please enter financial operator name';
                }

                //
                if(empty($data['address'])){
                  $data['address_err'] = 'please enter address';
                }
                //
                if(strlen($data['con_number'])!=10){
                  $data['con_number_err'] = 'length incorrect contact number';
                }
                // if(is_nan($data['con_number'])){
                //   $data['con_number_err'] = 'please enter numbers only';
                // }
                if(empty($data['con_number'])){
                  $data['con_number_err'] = 'please enter contact number';
                }

                
                // Validate Email
                if(empty($data['email'])){
                  $data['email_err'] = 'Pleae enter email';
                } else {
                  // Check email
                  if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                  }
                }

                //validate type
                if(empty($data['type'])){
                  $data['type_err'] = 'Please enter financial operator user type';
                }

                // //
                // if(empty($data['username'])){
                //   $data['username_err'] = 'please enter initial user name';
                // }

                // // Validate Password
                // if(empty($data['password'])){
                //    $data['password_err'] = 'Pleae enter password';
                // } elseif(strlen($data['password']) < 6){
                //   $data['password_err'] = 'Password must be at least 6 characters';
                // }
        
                
                
        
                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['type_err']) && empty($data['name_err']) && empty($data['address_err']) && empty($data['con_number_err'])){
                  // Validated
          
        
                  // Register User
                  if($this->userModel->register($data) && $this->userModel->addtoaccounts($data)){
                    flash('register_success', 'We will serve for your requeest');



                    $to = $data['email'];
                    $subject = 'regarding adding Financial Operator';
                    $message = "you successfully added. <br>Your,<br>";
                    $message .= "username: {$data['name']} <br>";
                    $message .= "password: {$data['email']}";
                    $headers = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
                                'MIME-Version: 1.0' . "\r\n" .
                                'Content-type: text/html; charset=utf-8';
            
                                mail($to, $subject, $message, $headers);

                                redirect('Adminpagesfi/financial');

                  } else {
                    die('Something went wrong');
                  }
        
                } else {
                  // Load view with errors
                  $this->view('Admin/AdmininitialFinancial', $data);
                }
        
              } else {
                // Init data  
                $data =[
                  'name' => '',
                  'address' => '',
                  'con_number' => '',
                  'email' => '',
                  'type' => '',
                  // 'username' => '',
                  // 'password' =>'',
                  'name_err' => '',
                  'address_err' => '',
                  'con_number_err' => '',
                  'email_err' => '',
                  'type_err' => '',
                  // 'username_err' => '',
                  // 'password_err' => ''
                ];
        
                // Load view
                $this->view('Admin/AdmininitialFinancial', $data);
              }
           
        }

        //intermediate transport operator
        public function intermediate(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form
                //die('submittsed');
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                // Init data
                $data =[
                  'name' => trim($_POST['name']),
                  'address' => trim($_POST['address']),
                  'con_number' => trim($_POST['con_number']),
                  'email' => trim($_POST['email']),
                  'type' => trim($_POST['type']),
                  // 'username' => trim($_POST['username']),
                  // 'password' => trim($_POST['password']),
                  'name_err' => '',
                  'address_err' => '',
                  'con_number_err' => '',
                  'email_err' => '',
                  'type_err' => '',
                  // 'username_err' => '',
                  // 'password_err' => '',
                ];

                // Validate Name
                if(empty($data['name'])){
                  $data['name_err'] = 'Please enter financial operator name';
                }

                //
                if(empty($data['address'])){
                  $data['address_err'] = 'please enter address';
                }
                if(empty($data['con_number'])){
                  $data['con_number_err'] = 'please enter contact number';
                }
                if(strlen($data['con_number'])!=10){
                  $data['con_number_err'] = 'length incorrect contact number';
                }
                if(strlen($data['con_number'])!=10){
                  $data['con_number_err'] = 'please enter numbers only';
                }
        
                // Validate Email
                if(empty($data['email'])){
                  $data['email_err'] = 'Pleae enter email';
                } else {
                  // Check email
                  if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                  }
                }

                //validate type
                if(empty($data['type'])){
                  $data['type_err'] = 'Please enter financial operator user type';
                }

                // //
                // if(empty($data['username'])){
                //   $data['username_err'] = 'please enter initial user name';
                // }

                // // Validate Password
                // if(empty($data['password'])){
                //    $data['password_err'] = 'Pleae enter password';
                // } elseif(strlen($data['password']) < 6){
                //   $data['password_err'] = 'Password must be at least 6 characters';
                // }
        
                
                
        
                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['type_err']) && empty($data['name_err']) && empty($data['address_err']) && empty($data['con_number_err'])){
                  // Validated
          
        
                  // Register User
                  if($this->userModel->register($data) && $this->userModel->addtoaccountsintermediate($data)){
                    flash('register_success', 'We will serve for your requeest');

                   


                    $to = $data['email'];
                    $subject = 'regarding adding Intermediate Transport Operator';
                    $message = "you successfully added. <br>Your,<br>";
                    $message .= "username: {$data['name']} <br>";
                    $message .= "password: {$data['email']}";
                    $headers = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
                                'MIME-Version: 1.0' . "\r\n" .
                                'Content-type: text/html; charset=utf-8';
            
                                mail($to, $subject, $message, $headers);

                                redirect('Adminpagesfi/intermediate');
                    
                  } else {
                    die('Something went wrong');
                  }
                  $this->view('Admin/AdmininitialIntermediate', $data);
        
                } else {
                  // Load view with errors
                //  $this->view('Admin/AdmininitialFinancialAfteradding', $data);
                $this->view('Admin/AdmininitialIntermediate', $data);

                }
        
              } else {
                // Init data  
                $data =[
                  'name' => '',
                  'address' => '',
                  'con_number' => '',
                  'email' => '',
                  'type' => '',
                  // 'username' => '',
                  // 'password' =>'',
                  'name_err' => '',
                  'address_err' => '',
                  'con_number_err' => '',
                  'email_err' => '',
                  'type_err' => '',
                  // 'username_err' => '',
                  // 'password_err' => ''
                ];
        
                // Load view
                $this->view('Admin/AdmininitialIntermediate', $data);
              }
           
            
        }

       

    }