<?php
    class Adminpagesd extends Controller {

        public function __construct(){
            $this->userModel = $this->model('driver');
        }


        //driver
        public function driveraddrequest(){
          
            //get outlet request list
           $driveraddrequest = $this->userModel->getdriverrequest();
           $data = [
              'driveraddrequest' => $driveraddrequest
           ];

           //print_r($driveraddrequest);
           $this->view('Admin/AdmindriverAddRequest', $data);
        }

        public function adddriver($request_id){
         // $request_id=$_GET['id'];
          $outlet = $this->userModel->getdriverByRequestId($request_id);
          $data = [
            'driver' => $outlet
          ];

          // echo $this->userModel->addd($data);
          // echo $this->userModel->updateStatus($data);
          // echo $this->userModel->addAccount($data);

          // Load view
          $this->view('Admin/AdminaddDriver', $data);
          if($this->userModel->addd($data) && $this->userModel->updateStatus($data) && $this->userModel->addAccount($data)){
            // flash('adding_success', 'We will serve for your request');
            $to = $data['driver']->email;
          $subject = 'regarding adding driver request';
          $message = "you successfully added. <br>Your,<br>";
          $message .= "username: {$data['driver']->center_name} <br>";
          $message .= "password: {$data['driver']->email}";
          $headers = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
                      'MIME-Version: 1.0' . "\r\n" .
                      'Content-type: text/html; charset=utf-8';
          // $mailResult = mail($to, $subject, $message, $headers);
          // if($mailResult){
          //   echo "Email sent";
          // }else{
          //   echo "Email sending failed";
          // }
          mail($to, $subject, $message, $headers);

          redirect('Adminpagesd/driveraddrequest');
            //$this->view('Admin/AdminaddOutletSUCCESS');       
          }
        }

      public function addoutletsuccess(){
          $this->view('Admin/AdminaddOutletSUCCESS');
      }

        public function driveradderror($request_id){

        $outlet = $this->userModel->getdriverByRequestId($request_id);
        $data = [
          'driver' => $outlet
        ];

          $to = $data['driver']->email;
          $subject = 'regarding adding outlet request';
          $message = "your request rejected due to incorrect , invalid or untrusted details.<br>Please send a request again with valid details.";
          $headers = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
                      'MIME-Version: 1.0' . "\r\n" .
                      'Content-type: text/html; charset=utf-8';
          mail($to, $subject, $message, $headers);

          $this->userModel->updatestatusforrejection($request_id);
         
          $this->view('Admin/AdminaddOutlet ERROR');
      }

      

        // public function adddriver(){
        //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //         // Process form
        //         //die('submittsed');
        //         // Sanitize POST data
        //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        //         // Init data
        //         $data =[
        //           'name' => trim($_POST['name']),
        //           'age' => trim($_POST['age']),
        //           'address' => trim($_POST['address']),
        //           'con_number' => trim($_POST['con_number']),
        //           'email' => trim($_POST['email']),
        //           'init_username' => trim($_POST['init_username']),
        //           'init_password' => trim($_POST['init_password']),
        //           'name_err' => '',
        //           'age_err' => '',
        //           'address_err' => '',
        //           'con_number_err' => '',
        //           'email_err' => '',
        //           'init_username_err' => '',
        //           'init_password_err' => '',
        //         ];

        //         // Validate Name
        //         if(empty($data['name'])){
        //           $data['name_err'] = 'Please enter outlet name';
        //         }

        //         //
        //         if(empty($data['age'])){
        //             $data['age_err'] = 'please enter location';
        //           }
        //         if(empty($data['address'])){
        //           $data['address_err'] = 'please enter address';
        //         }
        //         if(empty($data['con_number'])){
        //           $data['con_number_err'] = 'please enter contact number';
        //         }
        
        //         // Validate Email
        //         if(empty($data['email'])){
        //           $data['email_err'] = 'Pleae enter email';
        //         } else {
        //           // Check email
        //           if($this->userModel->findUserByEmail($data['email'])){
        //             $data['email_err'] = 'Email is already taken';
        //           }
        //         }

        //         // 
        //         if(empty($data['init_username'])){
        //           $data['init_username_err'] = 'please enter initial user name';
        //         }

        //         // Validate Password
        //         if(empty($data['init_password'])){
        //            $data['init_password_err'] = 'Please enter password';
        //         } elseif(strlen($data['init_password']) < 6){
        //           $data['init_password_err'] = 'Password must be at least 6 characters';
        //         }
        
                
                
        
        //         // Make sure errors are empty
        //         if(empty($data['email_err']) && empty($data['name_err']) && empty($data['address_err']) && empty($data['con_number_err']) && empty($data['age_err']) && empty($data['init_username_err']) && empty($data['init_Password_err'])){
        //           // Validated
          
        
        //           // Register User
        //           if($this->userModel->register($data)){
        //             flash('register_success', 'We will serve for your requeest');
                    
        //           } else {
        //             die('Something went wrong');
        //           }
        
        //         } else {
        //           // Load view with errors
        //           $this->view('Admin/AdminaddDriver', $data);
        //         }
        
        //       } else {
        //         // Init data  
        //         $data =[
        //           'name' => '',
        //           'age' => '',
        //           'address' => '',
        //           'con_number' => '',
        //           'email' => '',
        //           'init_username' => '',
        //           'init_password' =>'',
        //           'name_err' => '',
        //           'age_err' => '',
        //           'address_err' => '',
        //           'con_number_err' => '',
        //           'email_err' => '',
        //           'init_username_err' => '',
        //           'init_password_err' => ''
        //         ];
        
        //         // Load view
        //         $this->view('Admin/AdminaddDriver', $data);
        //       }
           
            
        // }

    }