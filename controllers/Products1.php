<?php
    class Products1 extends Controller {
      public function __construct(){
        $this->product1Model = $this->model('Product1');
      }



      public function fomrates(){
      //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //If method id form; then process the form
          //die('Values submitted')
        //Initialize data below
          $data =[
            'product_id' => trim($_POST['product_id']),
            'maximum_buying_rate' => trim($_POST['maximum_buying_rate']),
            'selling_rate' => trim($_POST['selling_rate']),
            'product_id_err' => '',
            'maximum_buying_rate_err' => '',
            'selling_rate_err' => ''
         
          ];

        //Validations
          if(empty($data['maximum_buying_rate'])){
            $data['maximum_buying_rate_err'] = 'Please enter value';

          }

          if(empty($data['selling_rate'])){
           $data['selling_rate_err'] = 'Please enter value';
          
          }
          
          if($this->product1Model->findproductByid($data['product_id'])){
            // Product found
          } else {
            // Product not found
            $data['product_id_err'] = 'No such product found!';
          }

          if(empty($data['maximum_buying_rate_err']) && empty($data['selling_rate_err'])){
           //Validated
           //die('SUCCESS');
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/login', $data);
          }

          if($this->product1Model->updateTheRates($data)){
            redirect('financialoperatorpages/fomaxrates');
          } else {
           flash('update_success', 'New values added');
          }
        } else {
          // Init data
          $data =[    
            'product_id' => '',
            'maximum_buying_rate' => '',
            'selling_rate' => '',
            'product_id_err' => '',
            'maximum_buying_rate_err' => '',
            'selling_rate_err' => '',      
          ];
  
          // Load view
          $this->view('financialoperatorpages/fomaxrates', $data);
        }
      }
    }
    
    
      /*
      public function fomaxrates(){
        $products1 = $this->products1Model->getTheProducts();
          $data = [
            'products1' => $products1
          ];

          $this->view('financial operator/fomaxrates', $data);
        }
        */

        /*
      public function updatemrates($data){
         //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          //If method id form; then process the form
          die('Values submitted')
          //Initialize data below
          $data =[
            'maximum_buying_rate' => trim($_POST['maximum_buying_rate']),
            'selling_rate' => trim($_POST['selling_rate']),
            'maximum_buying_rate_err' => '',
            'selling_rate_err' => ''
            
          ];

          //Validations
          if(empty($data['maximum_buying_rate'])){
            $data['maximum_buying_rate_err'] = 'Please enter value';

          }

          if(empty($data['selling_rate'])){
            $data['selling_rate_err'] = 'Please enter value';
            
          }

          if(empty($data['maximum_buying_rate_err']) && if(empty($data['selling_rate_err']){
            //Validated
            die('SUCCESS');
          }
        }*/
