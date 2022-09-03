<?php
    class Ddriverpages extends Controller{
        public function __construct(){
            $this->DSdriverModel = $this->model('Ddriver');
            //$this->notificModel = $this->model('Notific');
        }

        public function driverhome(){
         // $notificount=$this->notificModel->CountAlert($_SESSION['user_id']);
          $data = [
           // 'notificount' => $notificount
          ];

            $this->view('driver/driverHome', $data);
          }

        /*public function availabilitycalender(){
            //get cc request list
            //$ccaddrequest = $this->DSdriverModel->getccrequest();
              $data = [
                
              ];
             
              $this->view('driver/driver-availability-calender', $data);
        }*/

        public function orderlist(){
            //get order list
            $orders = $this->DSdriverModel->odrlist();
              $data = [
                'orders'=>$orders
              ];
             
              $this->view('driver/driver-orderlist', $data);
        }

        public function olist(){
          //get collectioncenter list
          $outlets = $this->DSdriverModel->geto();
          $data = [
              'outlets' => $outlets
          ];
         
          $this->view('driver/driver-outlets', $data);
      }
 
        
        public function availabilityview($current_day){
          $day=$current_day;

              $data = [
                'day'=>$day
              ];
             
              $this->view('driver/driver-availabilityviewer', $data);
        }

        public function cclist(){
          //get collectioncenter list
          $collectioncenters = $this->DSdriverModel->getcc();
          $data = [
              'collectioncenters' => $collectioncenters
          ];
         
          $this->view('driver/driver-collectioncenter', $data);
      }

      public function orderdisplay($orderid){
        $order = $this->DSdriverModel->orderdisplay($orderid);
        //print_r($order);
        $order_id = $orderid;
          $data = [
            'order'=>$order,
            'id'=>$order_id
            //'delivery_date'=>$order[1]
          ];
         
          $this->view('driver/driver-orderdisplay', $data);
      }

      // public function rejectorder($orderid){
      //   //$date=$_GET['x'];
      //   $date = $_POST['da'];

      //   $order = $this->DSdriverModel->updatereject_status($orderid,$date);
      
       
      //   $this->view('driver/driver-orderlist', $data);
      // }

      public function rejectorder($orderid){
        // $date = $_POST['da'];
        // $id=$_POST['id'];
        $order = $this->DSdriverModel->updatereject_status($orderid);
      
        $orders = $this->DSdriverModel->odrlist();
              $data = [
                'orders'=>$orders
              ];
        $this->view('driver/driver-orderlist', $data);
      }

      public function deliverfullorder($orderid){
        $date=$_POST['da'];
        echo $date;
        echo $orderid;
        $order = $this->DSdriverModel->updateorder_status($orderid,$date);
        $order = $this->DSdriverModel->deliverorderfully($orderid);
        
        
        $orders = $this->DSdriverModel->odrlist();
              $data = [
                'orders'=>$orders
              ];
        $this->view('driver/driver-orderlist', $data);
      }



      public function returnentry($orderid){
        $order = $this->DSdriverModel->orderforreturnentry($orderid);
        $order_id = $orderid;
          $data = [
            'order'=>$order,
            'id'=>$order_id
          ];
          //print_r($data);
        
        $this->view('driver/driver-newEntry', $data);
      }

      //submitt return entry
      public function submitreturnentry(){
        $id=$_GET['orderid'];
        
          $date = $_POST['da'];

          foreach ($_POST as $key=>$value):
            $returned = $this->DSdriverModel->insertreturnentry($key,$value,$id);
            $returned = $this->DSdriverModel->updateorder_status($id,$date);
          endforeach;

          // $ccid=$this->DSdriverModel->getccid($id);
          //   $x="Return entry of order ".$id."sent.";
          //   $this->notificModel->Write($ccid,$x);

        


        //   $data1 =[
        //     'id' => trim($_POST['id']),
        //     'item_id' => trim($_POST['item_id']),
        //     'pname' => trim($_POST['pname']),
        //     'rejected_quantity' => trim($_POST['ordered_quantity']),
        //     'itemid_err' => '',
        //     'pname_err' => '',
        //     'qty_err' => ''

        //   ];
        //   $data=[
        //     'order'=>$data1
        //   ];
        //   print_r($data);
        // }
        //$returned = $this->DSdriverModel->insertreturnentry($data);

        $orders = $this->DSdriverModel->odrlist();
              $datas = [
                'orders'=>$orders
              ];
             
        $this->view('driver/driver-orderlist', $datas);
      }


      public function location(){
        //$order = $this->DSdriverModel->orderforreturnentry($orderid);
          $data = [
          ];
         
          $this->view('driver/driver-location', $data);
      }


      //display calender
      public function availabilitycalender(){
        //$availability_value=$this->DSdriverModel->getavailability($id);

        // foreach($data['collectioncenters'] as $collectioncenter) : 

        // endforeach;

          $data = [
            // 'val'=>$availability_value
            'val'=>-1
          ];
         
          $this->view('driver/driver-availability-calender', $data);
      }


      /*
      //get availability
      public function get_availability($date){
        $ddate = $this->DSdriverModel->getavailability($date);
          $data = [
            'date'=>$ddate
          ];
         
          $this->view('driver/driver-availability-calender', $data);
      }
      */

      //
      public function setavailability($details){
      //  echo $details;

       /* $ddate = $this->DSdriverModel->setavailability($date);
          $data = [
            'date'=>$ddate
          ];
         
          $this->view('driver/driver-availability-calender', $data);*/
          //$date=$_GET['day'];
          //echo $date;

          /*echo $details;
          print "<br>";
          */
          $data = [
            
          ];
        $detail_s=$details;
          $detailss = explode(',',$details,2);
        //  echo $detailss[0];
          //print_r($detailss[0]);
        $dateExistOrNot = $this->DSdriverModel->finddateavailability($detailss[0],$detailss[1]);
        $availability=$dateExistOrNot->availability;
       if($availability==1){
            $this->DSdriverModel->setavailabilitytoone($detailss[0],$detailss[1]);
            $data['val']='1';
            // $this->view('driver/driver-availability-calender',$data);
          }else{
            $this->DSdriverModel->setavailabilitytozero($detailss[0],$detailss[1]);
            $data['val']='0';
            // $this->view('driver/driver-availability-calender',$data);
            /*if($set_initial==TRUE){
              $this->view('driver/driver-availability-calender');
            }else{
              echo "not executed correctly";
            }*/
          
          }
          $this->view('driver/driver-availability-calender',$data);
    }

}