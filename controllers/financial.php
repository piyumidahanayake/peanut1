<?php
    class financial extends Controller {
      public function __construct(){
        $this->report = $this->model('Fi_report');
        
      }



      public function report(){
      //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //If method id form; then process the form
          //die('Values submitted')
        //Initialize data below
          $data =[
            
            'from_date' => trim($_POST['from_date']),
            'to_date' => trim($_POST['to_date']),
            'comments' => trim($_POST['comments']),
            'sort_by' => trim($_POST['sort']),
          ];

          date_default_timezone_set('Asia/Kolkata');
          $today = date('Y-m-d');
          if($data['from_date']>$data['to_date'] || $data['from_date']>$today || $data['to_date']>$today) {
              echo "Invalid period of time selected!";
              return;
          } else {
            $fromd = $data['from_date'];
            $tod = $data['to_date'];
            $comm = $data['comments'];
            $sortby = $data['sort_by'];

          
          
              if($data['sort_by']=="Date") {
                if($data['from_date']==NULL) {
                  if($data['to_date']==NULL) {
                    $genReport = $this->report->reportalltime($data);
                    $saleReport = $this->report->salealltime($data);
                    $genReport1 = $this->report->reportalltime1($data);
                    $saleReport1 = $this->report->salealltime1($data);
                  } else {
                    $genReport = $this->report->reporttodate($data);
                    $saleReport = $this->report->saletodate($data);
                    $genReport1 = $this->report->reporttodate1($data);
                    $saleReport1 = $this->report->saletodate1($data);
                  }
                } else {
                  if($data['to_date']==NULL) {
                    $genReport = $this->report->reportfromdate($data);
                    $saleReport = $this->report->salefromdate($data);
                    $genReport1 = $this->report->reportfromdate1($data);
                    $saleReport1 = $this->report->salefromdate1($data);
                  } else {
                    $genReport = $this->report->reportfromtodate($data);
                    $saleReport = $this->report->salefromtodate($data);
                    $genReport1 = $this->report->reportfromtodate1($data);
                    $saleReport1 = $this->report->salefromtodate1($data);
                  }
                }
              } elseif ($data['sort_by']=="Value") {
                if($data['from_date']==NULL) {
                  if($data['to_date']==NULL) {
                    $genReport = $this->report->reporvalltime($data);
                    $saleReport = $this->report->salevalltime($data);
                    $genReport1 = $this->report->reporvalltime1($data);
                    $saleReport1 = $this->report->salevalltime1($data);
                  } else {
                    $genReport = $this->report->reporvtodate($data);
                    $saleReport = $this->report->salevtodate($data);
                    $genReport1 = $this->report->reporvtodate1($data);
                    $saleReport1 = $this->report->salevtodate1($data);
                  }
                } else {
                  if($data['to_date']==NULL) {
                    $genReport = $this->report->reporvfromdate($data);
                    $saleReport = $this->report->salevfromdate($data);
                    $genReport1 = $this->report->reporvfromdate1($data);
                    $saleReport1 = $this->report->salevfromdate1($data);
                  } else {
                    $genReport = $this->report->reporvfromtodate($data);
                    $saleReport = $this->report->salevfromtodate($data);
                    $genReport1 = $this->report->reporvfromtodate1($data);
                    $saleReport1 = $this->report->salevfromtodate1($data);
                  }
                }
              } else {
                echo "Please select a valid sort parameter!";
                return;
              }
              
           

          } //close else of date validation
         


          $data = [
            'genReport' => $genReport,
            'genReport1' => $genReport1,
            'saleReport' => $saleReport,
            'saleReport1' => $saleReport1
          ];

          $i = 1;
          $ids[0]=0;
          $sum[0] = 0;
          $sum1[0] = 0;
          $total = 0;
          $total1 = 0;
          $total2 = 0;
          $txt0 = "<br> ";
          foreach($data['genReport'] as $row) {
            if($ids[$i-1]==$row->order_id) {
              $ids[$i]=$row->order_id;
              $sum[$i] = $sum[$i-1] + $row->ordered_quantity;
              $sum1[$i] = $sum1[$i-1] + $row->value_after_delivery;
              $x = 1;
              $i = $i + $x;
              $total = $total + $row->ordered_quantity;
              $total2 = $total2 +  $row->value_before_deliver;
              $total1 = $total1 +  $row->value_after_delivery;
              //print_r($ids);
            } else {
              if($ids[$i-1] != 0) {
                $txt0 =  $txt0."<br>Order : ".$ids[$i-1]." - Total Quantity : ".$sum[$i-1]."Kg | Total Value After Delivery : Rs.".$sum1[$i-1]."/=";
              }
              $ids[$i] = $row->order_id;
              $sum[$i] = $row->ordered_quantity;
              $sum1[$i] = $row->value_after_delivery;
              $x = 1;
              $i = $i + $x;
              $total = $total + $row->ordered_quantity;
              $total2 = $total2 +  $row->value_before_deliver;
              $total1 = $total1 +  $row->value_after_delivery;
            }

          } $txt0 =  $txt0."<br>Order : ".$ids[$i-1]." - Total Quantity : ".$sum[$i-1]."Kg | Total Value After Delivery : Rs.".$sum1[$i-1]."/=";
          $wastage = $total2 - $total1;
          if($wastage>=0){
            $was1 = $wastage;
          } else {
            $was1 =  "#";
          }
          //print_r($txt0);
          $txt2 = $txt0."<br><br> Total quantity of all orders (initial) : ".$total."Kg <br>Total value of all orders (final) : Rs.".$total1."/=<br>The value of items returned after delivery : Rs.".$was1."/=<br>";

          date_default_timezone_set('Asia/Kolkata');
          $time = date('h-i-sa');

          $all=" ";
          //print_r($data['genReport']);
          foreach($data['genReport1'] as $row) {
             $all = $all."<p> "." Order ID : ".$row->order_id." Ordered Date : ".$row->order_date." Ordered by : ".$row->outlet_id." Driver Assigned On : ".$row->assigned_date." Assigned Driver: ".$row->driver." Delivered On : ".$row->delivery_date." <br>Item ID : ".$row->product_id." Ordered Quantity : ".$row->ordered_quantity." Assigned Quantity : ".$row->assigned_quantity." Rejected Quantity : ".$row->rejected_quantity." Value of delivered order : ".$row->value_before_deliver." Value after returns : ".$row->value_after_delivery." ;</p>";
          }



          $i = 1;
          $ids[0]=0;
          $sum[0] = 0;
          $sum1[0] = 0;
          $total = 0;
          $total11 = 0;
          $total2 = 0;
          $txt0 = "<br> ";


          foreach($data['saleReport'] as $row) {
            if($ids[$i-1]==$row->item_id) {
              $ids[$i]=$row->item_id;
              $sum[$i] = $sum[$i-1] + $row->quantity;
              $sum1[$i] = $sum1[$i-1] + $row->money_received;
              $x = 1;
              $i = $i + $x;
              $total = $total + $row->quantity;
              
              $total11 = $total11 +  $row->money_received;
            } else {
             
              $ids[$i] = $row->item_id;
              $sum[$i] = $row->quantity;
              $sum1[$i] = $row->money_received;
              $x = 1;
              $i = $i + $x;
              $total = $total + $row->quantity;
             
              $total11 = $total11 +  $row->money_received;
            }
            $txt3 =  $txt0."<br>Order : ".$ids[$i-1]." - Total Quantity : ".$sum[$i-1]."Kg | Total Value After Delivery : Rs.".$sum1[$i-1]."/=";


          }

          
          

          //print_r($txt0);

          $txt0 =$txt0."<br><br> Total quantity of all sales (initial) : ".$total."Kg <br>Total value of all sales (final) : Rs.".$total11."/=";

          $wastage = $total11 - $total1;
         // if($wastage>=0){
            $was1 = $wastage;
         // } else {
           // $was1 =  "#";
         // }
          $txt0 =$txt0."<br><br>  <br>Total value of all selling (final) : Rs.".$total11."/=<br>Profit : Rs.".$was1."/=<br>";







          $res1 = print_r($all, true);
          $txt1 = "<!DOCTYPE html><head><title>Report on Delivered Orders</title></head><body><h3><b>AGROMASTER:</b> Report on Delivered Orders</h3><br>Orders <br>From : ".$fromd."<br>To : ".$tod."<br>Sorted by: ".$sortby."<br>Comments or suggestions of Outlet User: ".$comm."<br><br><br>".$res1."<br>".$txt2."<br>".$txt0."<br>".$txt3."<br><br><br>Report generated on ".$today." at ".$time." <br><br><br>END<br><br><br></body></html>";

          date_default_timezone_set('Asia/Kolkata');
          $datenow = date('Y-m-d h-i-sa');

          $filename = $datenow." NormalOrdersReport.php";
          
          $file1 = fopen($filename, "w");

          fwrite($file1,$txt1);

          fclose($file1);

          require_once '../public/' . $filename;

        } else {
          // Load view
          redirect('Outletpages/pp');
        }
      }
    }
    
    