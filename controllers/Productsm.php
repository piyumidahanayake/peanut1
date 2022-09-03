<?php
    class Productsm extends Controller {
      public function __construct(){
        $this->productmModel = $this->model('Productm');
      }



      public function addProducts(){
      //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //If method id form; then process the form
          //die('Values submitted')
        //Initialize data below
          $data =[
            'name' => trim($_POST['name']),
            'type' => trim($_POST['type']),
            'description' => trim($_POST['description']),
            'name_err' => '',
            'type_err' => '',
            'description_err' => '',
            'productm' => ''
         
          ];
        
        $s = 0;
        //Validations
          if(empty($data['name']) || $data['name']=="Name" || is_numeric($data['name'])){
            $data['name_err'] = 'Please enter a product name';
            $s = $s + 1;
          } else {
            if($this->productmModel->checkName($data['name'])){
              $data['name_err'] = 'Product name already exists!';
              $s = $s + 1;
            }
          }

          if(empty($data['type'])){
            $data['type_err'] = 'Please select a type';
            $s = $s + 1;
          }
          if(empty($data['description']) || $data['description']=="Description"){
            $data['description_err'] = 'Please add a description';
            $s = $s + 1;
          }

          $productm = $this->productmModel->getMainProducts($_SESSION['user_id']);
          $data['productm'] = $productm;
  
          if($s == 0) { //Validated
            if($this->productmModel->addProducts($data)){
              flash('success','Product successfully added');
              redirect('financialoperatorpages/productlist');
            } 
          } else { //Load view with errors
            $this->view('financial operator/FO_Prd_Cat_productlist', $data);
          }

        } else {
          // Init data
          $data =[    
            'name' => '',
            'type' => '',
            'description' => '',
            'name_err' => '',
            'type_err' => '',
            'description_err' => '',
            'productm' => ''     
          ];
          $productm = $this->productmModel->getMainProducts($_SESSION['user_id']);
          $data['productm'] = $productm;
  
          // Load view
          $this->view('financial operator/FO_Prd_Cat_productlist', $data);
        }
      }

      
      public function searching(){
      //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

          $data =[
            'searchterm' => trim($_POST['searchterm'])
          ];

          if($data['searchterm']==NULL){
            echo "Please type something to search!";
            return;
          }

          $productm = $this->productmModel->getProductsSearch($data);

          if(empty($productm)) {
            echo "<h3>No results found!</h3>";
            echo "<a href='returning'>Back</a>";
            return;
          } else {
           $data =[    
            'name' => '',
            'type' => '',
            'description' => '',
            'name_err' => '',
            'type_err' => '',
            'description_err' => '',
            'productm' => ''     
           ];
           $data['productm'] = $productm;
  
           // Load view
           $this->view('financial operator/FO_Prd_Cat_productlist', $data);
          }
       }
      }

      public function returning(){
        $data =[    
          'name' => '',
          'type' => '',
          'description' => '',
          'name_err' => '',
          'type_err' => '',
          'description_err' => '',
          'productm' => ''     
         ];
         $productm = $this->productmModel->getMainProducts();
         $data['productm'] = $productm;

         // Load view
         $this->view('financial operator/FO_Prd_Cat_productlist', $data);
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
