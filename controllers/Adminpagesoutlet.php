<?php
    class Adminpagesoutlet extends Controller{

        public function __construct(){
         $this->outletModel = $this->model('outlet');
        }

        //outlet
        public function oaddrequest(){
            //get outlet request list
            
  
            $outletaddrequest = $this->outletModel->getoutletrequest();
            $data = [
              'outletaddrequest' => $outletaddrequest
            ];
           
            $this->view('Admin/Adminoutletadingrequest', $data);
        }

        public function outletlist(){
          //get outlet list
            $outlets = $this->outletModel->geto();
            $data = [
              'outlets' => $outlets
            ];
           
            $this->view('Admin/AdminoutletList', $data);
        }
        //show details of an outlet
        public function outletdetail($id){
          $outlet = $this->outletModel->getOutletById($id);
          $data = [
            'outlet' => $outlet
          ];
           
            $this->view('Admin/AdminviewOutlet', $data);
        }
        // public function outletlocation(){
        //    $data = [
    
        //    ];
         
        //   $this->view('Admin/AdminoutletLocation', $data);
        // }
        public function outletlocation($locationid){
          $embedcode=$this->outletdetail->getembedcode($locationid);
          $data = [
            'embedcode'=>$embedcode
          ];
           
           $this->view('Admin/AdminoutletLocation', $data);
         }

        public function addoutlet($request_id){
          $outlet = $this->outletModel->getOutletByRequestId($request_id);
          $cclist = $this->outletModel->getcollectioncenterlist();
          $data = [
            'outlet' => $outlet,
            'cc'=>$cclist,
            'location'=>"",
            'collectioncenter_id' =>""
          ];

          // Load view
          $this->view('Admin/AdminaddOutlet', $data);
          
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            //die('submittsed');
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Init data
            $data =[
              'outlet' => $outlet,
              'cc'=>$cclist,
              'location' => trim($_POST['location']),
              'collectioncenter_id' => trim($_POST['ccid']),
            ];

            echo $this->outletModel->updateStatus($data);
            echo $this->outletModel->addAccount($data);
            echo $this->outletModel->addo($data);


            if($this->outletModel->updateStatus($data) && $this->outletModel->addo($data) &&  $this->outletModel->addAccount($data)){
              // flash('adding_success', 'We will serve for your request');
              $to = $data['outlet']->email;
              $subject = 'regarding adding outlet request';
              $message = "you successfully added. <br>Your,<br>";
              $message .= "username: {$data['outlet']->center_name} <br>";
              $message .= "password: {$data['outlet']->email}";
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
  
              redirect('Adminpagesoutlet/addoutletsuccess'); 
              //$this->view('Admin/AdminaddOutletSUCCESS');       
            }
          }
        }

        public function addoutletsuccess(){
          $data = [
            
          ];
         
          $this->view('Admin/AdminaddOutletSUCCESS');
      }

        public function outletadderror($request_id){
            // $outlets = $this->outletModel->geto();
            // $data = [
            //   'outlets' => $outlets
            // ];

          $outlet = $this->outletModel->getOutletByRequestId($request_id);
          $data = [
            'outlet' => $outlet
          ];

            $to = $data['outlet']->email;
            $subject = 'regarding adding outlet request';
            $message = "your request rejected due to incorrect , invalid or untrusted details.<br>Please send a request again with valid details.";
            $headers = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
                        'MIME-Version: 1.0' . "\r\n" .
                        'Content-type: text/html; charset=utf-8';
            mail($to, $subject, $message, $headers);

            $this->outletModel->updatestatusforrejection($request_id);
           
            $this->view('Admin/AdminaddOutlet ERROR');
        }
        
        public function oremove($id){
        
         // echo $this->outletModel->notpaidpayments($id);
      if($this->outletModel->notpaidpayments($id)==0){
            $this->outletModel->removeofrom_accounts($id);
            $this->outletModel->removeofrom_outlets($id);
            $this->outletModel->removeofromoutlet_payment($id);
            $this->outletModel->removeofromoutlet_sale($id);
            $this->outletModel->removeofromoutlet_stock($id);
            $this->outletModel->removeofromoutlet_transactions($id);


           
          }
         $outlets = $this->outletModel->geto();
          $data = [
            'outlets' => $outlets
          ];
         
          $this->view('Admin/AdminoutletList', $data);
          
        }






        // public function addoutlet(){
        //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //         // Process form
        //         //die('submittsed');
        //         // Sanitize POST data
        //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        //         // Init data
        //         $data =[
        //           'name' => trim($_POST['name']),
        //           'address' => trim($_POST['address']),
        //           'con_number' => trim($_POST['con_number']),
        //           'email' => trim($_POST['email']),
        //           // 'location' => trim($_POST['location']),
        //           'manager_name' => trim($_POST['manager_name']),
        //           'init_username' => trim($_POST['init_username']),
        //           'init_password' => trim($_POST['init_password']),
        //           'name_err' => '',
        //           'address_err' => '',
        //           'con_number_err' => '',
        //           'email_err' => '',
        //           // 'location_err' => '',
        //           'manager_name_err' => '',
        //           'init_username_err' => '',
        //           'init_password_err' => '',
        //         ];

        //         // Validate Name
        //         if(empty($data['name'])){
        //           $data['name_err'] = 'Please enter outlet name';
        //         }

        //         //
        //         if(empty($data['address'])){
        //           $data['address_err'] = 'please enter address';
        //         }
        //         //validate contact number
        //         if(empty($data['con_number'])){
        //           $data['con_number_err'] = 'please enter contact number';
        //         } elseif(strlen($data['con_number']) != 10){
        //           $data['con_number_err'] = 'contact number must be exactly 10 characters';
        //         }
        
        //         // Validate Email
        //         if(empty($data['email'])){
        //           $data['email_err'] = 'Pleae enter email';
        //         } else {
        //           // Check email
        //           if($this->outletModel->findUserByEmail($data['email'])){
        //             $data['email_err'] = 'Email is already taken';
        //           }
        //         }

        //         // 
        //         if(empty($data['location'])){
        //           $data['location_err'] = 'please enter location';
        //         }
        //         if(empty($data['manager_name'])){
        //           $data['manager_name_err'] = 'enter the manger name';
        //         }
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
        //         if(empty($data['email_err']) && empty($data['name_err']) && empty($data['address_err']) && empty($data['con_number_err'])  && empty($data['manager_name_err']) && empty($data['init_username_err']) && empty($data['init_Password_err'])){
        //           // Validated
          
        
        //           // Register User
        //           if($this->outletModel->register($data)){
        //             flash('register_success', 'We will serve for your request');
        //             redirect('Adminpagesoutlet/oaddrequest');
                    
        //           } else {
        //             die('Something went wrong');
        //           }
        
        //         } else {
        //           // Load view with errors
        //           $this->view('Admin/AdminaddOutlet', $data);
                  
        //         }
        
        //       } else {
        //         // Init data  
        //         $data =[
        //           'name' => '',
        //           'address' => '',
        //           'con_number' => '',
        //           'email' => '',
        //           // 'location' => '',
        //           'manager_name' => '',
        //           'init_username' => '',
        //           'init_password' =>'',
        //           'name_err' => '',
        //           'address_err' => '',
        //           'con_number_err' => '',
        //           'email_err' => '',
        //           // 'location_err' => '',
        //           'manager_name_err' => '',
        //           'init_username_err' => '',
        //           'init_password_err' => ''
        //         ];
        
        //         // Load view
        //         $this->view('Admin/AdminaddOutlet', $data);
        //       }
        //     }   
        }
?>