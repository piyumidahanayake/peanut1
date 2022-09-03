<?php
  class Interms1 extends Controller {
    public function __construct(){
      $this->interm1Model = $this->model('Interm1');
      $this->colcen2Model = $this->model('Colcen2');
      $this->drivers1Model = $this->model('Drivers1');
      $this->notificModel = $this->model('Notific');
    }
    
    public function showSelCCOrders($id){
      if($this->interm1Model->checkTemps($id)) {
          //if there are temps of this cc; redirect to show those temps
          //when confirm the added sources; remaining necessities must change status into "Rejected"
          $this->confirm($id);
      } else {
        $ordersN = $this->interm1Model->showSelCCOrders($id);
        $excesses = $this->interm1Model->showExforSelCC($id);
        $ccid = $id;
        $ccname = $this->colcen2Model->getSelCCdetails($ccid);
        $ccnm = $ccname->collection_center_name;
        $data = [
          'ordersN' => $ordersN,
          'excesses' => $excesses,
          'ccid' => $ccid,
          'ccnm' => $ccnm
        ];

        $this->view('intermediate operator/ITO Intermediate Orders 1', $data); 
      }
    }

    public function confirm($id){
      //before turning temporary allocations into "confirmed allocation", 
      //view all temporary allocations of current cc; let delete some allocations; let allocate a driver to cc
      $orders = $this->interm1Model->confirmCCOrders($id);
      $data1 = [
        'orders' => $orders
      ];

      if (!empty($orders)){
       $exid = $data1['orders'][0]->excess_id;
       $exidstr = strval($exid);
       $eid = $this->interm1Model->ccidOfexid($exidstr);
       $eidnew = strval($eid);
       //print_r($eidnew);
       $ordersE = $this->interm1Model->confCCOrdersE($eidnew);
      } else {
        $ordersE = $orders;
      } 
      $allorders = $this->interm1Model->viewCCOrders();
      $drivers1 = $this->drivers1Model->getTheDrivers($_SESSION['user_id']);
      $ccid = $id;
      $ccname = $this->colcen2Model->getSelCCdetails($ccid);
      $ccnm = $ccname->collection_center_name;
      $data = [
        'orders' => $orders,
        'ordersE' => $ordersE,
        'allorders' => $allorders,
        'drivers1' => $drivers1,
        'ccid' => $ccid,
        'ccnm' => $ccnm
      ];

      $this->view('intermediate operator/ITO Intermediate Orders 2', $data); 
    }

    
    public function exesneces(){
      //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //If method id form; then process the form
          //die('Values submitted')
        //Initialize data below
          $data =[
            'neccesity_id' => trim($_POST['necessity_id']),
            'excess_id' => trim($_POST['excess_id']),
            'necessity_ccid' => trim($_POST['necessity_ccid']),
            'excess_ccid' => trim($_POST['excess_ccid']),
          ];
         
          $nccid = $data['necessity_ccid'];
          $eccid = $data['excess_ccid'];
          $ordersN =  $this->interm1Model->AddedEx($data); //insert assignment;
          
          //show excesses not from any other but from excess_ccid; however don't show already added one or ones -> so set them as "temporary allocated"
          
          $excesses = $this->interm1Model->showExOfCC($eccid); //only pending ones; not temprary allocations

          $ccid = $nccid;
          $ccname = $this->colcen2Model->getSelCCdetails($ccid);
          $ccnm = $ccname->collection_center_name;
          $data = [
            'ordersN' => $ordersN,
            'excesses' => $excesses,
            'ccid' => $ccid,
            'ccnm' => $ccnm
          ];

          $this->view('intermediate operator/ITO Intermediate Orders 1', $data);
        } else {
          // Init data
          $data = [
            'ordersN' => '',
            'excesses' => '',
            'ccid' => '',
            'ccnm' => ''
          ];
  
          // Load view
          $this->view('intermediate operator/ITO Intermediate Orders 1', $data);
        }
      }

      public function cancelAdd($word) {
        $word_arr = explode(',',$word);

        $nid = $word_arr[1];
        $eid = $word_arr[2];
        $ccid = $word_arr[3];
        //print_r($ccid);
        
        if($this->interm1Model->deleteTempAlloc($nid,$eid)){
         $this->interm1Model->resetEx($eid);
         $this->interm1Model->resetNec($nid);
         $this->confirmNoReject($ccid);
        }
        
      }

      
    public function confirmNoReject($id){
      $orders = $this->interm1Model->confirmCCOrdersNR($id);
      $data1 = [
        'orders' => $orders
      ];

      if (!empty($orders)){
       $exid = $data1['orders'][0]->excess_id;
       $exidstr = strval($exid);
       $eid = $this->interm1Model->ccidOfexid($exidstr);
       $eidnew = strval($eid);
       //print_r($eidnew);
       $ordersE = $this->interm1Model->confCCOrdersE($eidnew);
      } else {
        $ordersE = $orders;
      } 
      $allorders = $this->interm1Model->viewCCOrders();
      $drivers1 = $this->drivers1Model->getTheDrivers($_SESSION['user_id']);
      $ccid = $id;
      $ccname = $this->colcen2Model->getSelCCdetails($ccid);
      $ccnm = $ccname->collection_center_name;
      $data = [
        'orders' => $orders,
        'ordersE' => $ordersE,
        'allorders' => $allorders,
        'drivers1' => $drivers1,
        'ccid' => $ccid,
        'ccnm' => $ccnm
      ];

      $this->view('intermediate operator/ITO Intermediate Orders 2', $data); 
    }

    
    public function driverstoCC(){
      //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      
          $data =[
            'driver_id' => trim($_POST['driver_id']),
            'ncc_id' => trim($_POST['ccid']),
          ];

         
          $nccid = $data['ncc_id'];
          $deiverid = $data['driver_id'];
          
          if($this->interm1Model->assignDriver($data)){
            if($this->notificModel->Write($data['driver_id'],"You were assigned to an intermediate order.")){
              echo '<script>alert("Notification successfully sent to the driver.")</script>';
            } else {
              echo '<script>alert("Could not notify the driver!!!")</script>';
            }
          }
          
          $assignments = $this->interm1Model->showAssigned();
          //print_r($assignments);
          if (!empty($assignments)){
            $data1 = [
              'assignments' => $assignments
            ];
            $i = 0;
            $x = 1;
            foreach($data1['assignments'] as $row) {
              $excess_id1 = $row->excess_id;
              $necessity_id1 = $row->necessity_id;
         
              $assignmentsE[$i] = $this->interm1Model->showColCenE($excess_id1);
              $assignmentsN[$i] = $this->interm1Model->showColCenN($necessity_id1);
              //print_r($assignmentsE);
              $assignmentsECid[$i] = $assignmentsE[$i][0]->collection_center_id;
              $assignmentsNCid[$i] = $assignmentsN[$i][0]->collection_center_id;

              //print_r($assignmentsECid);
              $EC = $this->colcen2Model->getSelCCdetails($assignmentsECid[$i]);
              $NC = $this->colcen2Model->getSelCCdetails($assignmentsNCid[$i]);
              //print_r($EC);
              $ccnmE[$i] = $EC->collection_center_name;
              $ccnmN[$i] = $NC->collection_center_name;
              //print_r($ccnmN);
              $i = $i + $x;

            }
            //print_r($assignmentsECid);
            //print_r($ccnmE);
            $data = [
              'assignments' => $assignments,
              'assignmentsECid' => $assignmentsECid,
              'assignmentsNCid' => $assignmentsNCid,
              'ccnmE' => $ccnmE,
              'ccnmN' => $ccnmN
            ];

          } else {
            //print_r($assignments);
            $assignmentsECid = array();
            $assignmentsNCid = array();
            $ccnmE = array();
            $ccnmN = array();
           $data = [
            'assignments' => $assignments,
            'assignmentsECid' => $assignmentsECid,
            'assignmentsNCid' => $assignmentsNCid,
            'ccnmE' => $ccnmE,
            'ccnmN' => $ccnmN
           ];
          }

          $this->view('intermediate operator/ITO Intermediate Orders 3', $data);
        } else {
          // Init data
          $data = [
            'assignments' => '',
            'assignmentsECid' => '',
            'assignmentsNCid' => '',
            'ccnmE' => '',
            'ccnmN' => ''
          ];
  
          // Load view
          $this->view('intermediate operator/ITO Intermediate Orders 3', $data);
        }

      
    }
    public function showAllIntm() {
          $assignments = $this->interm1Model->showAssigned();
          //print_r($assignments);
          if (!empty($assignments)){
            $data1 = [
              'assignments' => $assignments
            ];
            $i = 0;
            $x = 1;
            foreach($data1['assignments'] as $row) {
              $excess_id1 = $row->excess_id;
              $necessity_id1 = $row->necessity_id;
         
              $assignmentsE[$i] = $this->interm1Model->showColCenE($excess_id1);
              $assignmentsN[$i] = $this->interm1Model->showColCenN($necessity_id1);
              //print_r($assignmentsE);
              $assignmentsECid[$i] = $assignmentsE[$i][0]->collection_center_id;
              $assignmentsNCid[$i] = $assignmentsN[$i][0]->collection_center_id;

              //print_r($assignmentsECid);
              $EC = $this->colcen2Model->getSelCCdetails($assignmentsECid[$i]);
              $NC = $this->colcen2Model->getSelCCdetails($assignmentsNCid[$i]);
              //print_r($EC);
              $ccnmE[$i] = $EC->collection_center_name;
              $ccnmN[$i] = $NC->collection_center_name;
              //print_r($ccnmN);
              $i = $i + $x;

            }
            //print_r($assignmentsECid);
            //print_r($ccnmE);
            $data = [
              'assignments' => $assignments,
              'assignmentsECid' => $assignmentsECid,
              'assignmentsNCid' => $assignmentsNCid,
              'ccnmE' => $ccnmE,
              'ccnmN' => $ccnmN
            ];

          } else {
            //print_r($assignments);
            $assignmentsECid = array();
            $assignmentsNCid = array();
            $ccnmE = array();
            $ccnmN = array();
           $data = [
            'assignments' => $assignments,
            'assignmentsECid' => $assignmentsECid,
            'assignmentsNCid' => $assignmentsNCid,
            'ccnmE' => $ccnmE,
            'ccnmN' => $ccnmN
           ];
          }

          $this->view('intermediate operator/ITO Intermediate Orders 3', $data);
    }


  }

