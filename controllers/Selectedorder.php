<?php
    class Selectedorder extends Controller {
      public function __construct(){
        $this->selorder1Model = $this->model('Selectedorder1');
        $this->fetchModel = $this->model('Fetch');
        $this->notificModel = $this->model('Notific');
        $this->filterOrdModel = $this->model('FilterOrdm');
      }



        public function showDescrpT($id){
          $descorder = $this->selorder1Model->getSelOrdTrans($id);
          $data = [
            'descorder' => $descorder
          ];

          $this->view('financial operator/FO Selected Payment', $data);
        }

        public function setAsComp($id){
          if($this->selorder1Model->setAsCompleted($id)) {
            redirect('financialoperatorpages/paymentcat');
          }
        }

        public function checkInFetch($id){

          $tid = $this->selorder1Model->checkTID($id);

          echo "  Checked:  "; print_r($id); echo "<br>"; echo "  Transaction ID:  "; print_r($tid); echo "<br>";

          $transmonth1 = $this->fetchModel->getTheTransactions();

          $word = '"transaction_id":"'.$tid.'"';

          if (substr_count($transmonth1,$word)){
            echo " Connected to server. <br> Retrieved transactions successfully. <br> <b> Paypal has confirmed the payment! </b>";
          } else {
            echo " Payment might be older than a month or <br> It might have occured within last 24 hours, <br> Otherwise : has <strong>NOT</strong> paid to Agromaster! </b>";
          }
        }

        public function email($outletstatus){
          $outletstatus_arr = explode('-',$outletstatus);

          //print_r($outletstatus_arr);

          $outlet = $outletstatus_arr[0];
          $status = $outletstatus_arr[1];
          $order = $outletstatus_arr[2];

         

          $ccc = $this->filterOrdModel->getSelOrdOutlet($outlet);
          $cc = $ccc->collection_center_id;

         //The account id of each outlet and collection center is same as outlet id and collection center id in corresponding table.

          if($status=="Late"){
            $x = "You are late to pay for the order ".$order.".Please make the payment as soon as possible. Agromaster will suspend all its services for you until the entire order value is paid. After completing payment contact your collection center to restart services";
            $this->notificModel->Write($outlet,$x);
            print("Message sent! <br>To: <br> registered outlet ".$outlet." <br>");
            $y = "Please note that no new order made by outlet ".$outlet." should be delivered. They have failed to pay for order ".$order." delivered by your collection center. Please enquire Financial Operator to restart services whenever they claim that the payment is completed.";
            $this->notificModel->Write($cc,$y);
            print(" colection center ".$cc." ");
          } elseif($status="Suspend") {
            $x = "You have failed to make the payment for order ".$order." before the deadline! Your regestration will be cancelled until the payment is completed. Please contact Agromaster Administrator to register again.";
            $this->notificModel->Write($outlet,$x);
            print("Message sent! <br>To: <br> registered outlet ".$outlet." <br>");
            $y = "The outlet ".$outlet." has been removed from Agromaster system. Do not continue or restart supplying services for outlet ".$outlet.".";
            $this->notificModel->Write($cc,$y);
            print(" colection center ".$cc." <br>");
            $z = "IMPORTANT: The outlet ".$outlet." should be immediately removed from the system. Please activate registration only if the payment for order ".$order." is paid.";
            $this->notificModel->Write(1,$z);
            print(" system administrator ");
          } else {
            print(" No Message! ");
          }
        }

      }
    
    
