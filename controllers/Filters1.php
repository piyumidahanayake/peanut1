<?php
    class Filters1 extends Controller {
      public function __construct(){
        $this->filter1Model = $this->model('Filter1');
        $this->colcen1Model = $this->model('Colcen1');
        $this->colcen2Model = $this->model('Colcen2');
      }



      public function summery(){
      //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //If method id form; then process the form
          //die('Values submitted')
        //Initialize data below
          $data =[
            'collection_center_id' => trim($_POST['collection_center_id']),
            'from_date' => trim($_POST['from_date']),
            'to_date' => trim($_POST['to_date']),
          ];

          //print_r($data['collection_center_id']);
          if($data['collection_center_id']=="0"){
            if($data['from_date']==NULL) {
              if($data['to_date']==NULL) {
                $prvtransfers1 = $this->filter1Model->summaryall();
                $prvtransfers2 = $this->filter1Model->summaryrall();
              } else {
                $prvtransfers1 = $this->filter1Model->summarytodate($data);
                $prvtransfers2 = $this->filter1Model->summaryrtodate($data);
              }
            } else {
              if($data['to_date']==NULL) {
                $prvtransfers1 = $this->filter1Model->summaryfromdate($data);
                $prvtransfers2 = $this->filter1Model->summaryrfromdate($data);
              } else {
                $prvtransfers1 = $this->filter1Model->summaryfromtodate($data);
                $prvtransfers2 = $this->filter1Model->summaryrfromtodate($data);
              }
            }
            $ccid = "0";
            $ccname = " ";
            $ccnm = "All Collection Centers";
          } else {
            if($data['from_date']==NULL) {
              if($data['to_date']==NULL) {
                $prvtransfers1 = $this->filter1Model->summarycc($data);
                $prvtransfers2 = $this->filter1Model->summaryrcc($data);
              } else {
                $prvtransfers1 = $this->filter1Model->summarycctodate($data);
                $prvtransfers2 = $this->filter1Model->summaryrcctodate($data);
              }
            } else {
              if($data['to_date']==NULL) {
                $prvtransfers1 = $this->filter1Model->summaryccfromdate($data);
                $prvtransfers2 = $this->filter1Model->summaryrccfromdate($data);
              } else {
                $prvtransfers1 = $this->filter1Model->summaryccfromtodate($data);
                $prvtransfers2 = $this->filter1Model->summaryrccfromtodate($data);
              }
            }
            $ccid = $data['collection_center_id'];
            $ccname = $this->colcen2Model->getSelCCdetails($ccid);
            $ccnm = $ccname->collection_center_name;
          }

         
          $fromd = $data['from_date'];
          $tod = $data['to_date'];
          $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
    
          $data = [
            'prvtransfers1' => $prvtransfers1,
            'prvtransfers2' => $prvtransfers2,
            'colcen1' => $colcen1,
            'ccnm' => $ccnm,
            'ccid' => $ccid,
            'fromd' => $fromd,
            'tod' => $tod
          ];

          $this->view('financial operator/FO_Sumry_Req_Transf', $data);
        } else {
          // Init data
          $data = [
            'prvtransfers1' => '',
            'prvtransfers2' => '',
            'colcen1' => '',
            'ccnm' => '',
            'ccid' => '',
            'fromd' => '',
            'tod' => ''
          ];
  
          // Load view
          $this->view('financial operator/FO_Sumry_Req_Transf', $data);
        }
      }
    }
    
    