<?php
    class FiltersOrd extends Controller {
      public function __construct(){
        $this->filterOrdModel = $this->model('FilterOrdm');
        $this->colcen1Model = $this->model('Colcen1');
        $this->colcen2Model = $this->model('Colcen2');
        $this->outlet1Model = $this->model('Outlet1');
      }



      public function report(){
      //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //If method id form; then process the form
          //die('Values submitted')
        //Initialize data below
          $data =[
            'report_type' => trim($_POST['report_type']),
            'collection_center_id' => trim($_POST['collection_center_id']),
            'outlet_id' => trim($_POST['outlet_id']),
            'from_date' => trim($_POST['from_date']),
            'to_date' => trim($_POST['to_date']),
            'comments' => trim($_POST['comments']),
            'sort_by' => trim($_POST['sort']),
          ];

          date_default_timezone_set('Asia/Kolkata');
          $today = date('Y-m-d');
          if($data['from_date']>$data['to_date'] || $data['from_date']>$today || $data['to_date']>$today) {
               // Load view *
                $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
                $outlet1 = $this->outlet1Model->getTheOutlets($_SESSION['user_id']);
                $data = [
                  'colcen1' => $colcen1,
                  'outlet1' => $outlet1
          
                ];
                $this->view('financial operator/FO_CC_Outlet_Orders_Report', $data);
                echo '<script>alert("Invalid period of time selected!")</script>';
                //return;
          } else {
            $fromd = $data['from_date'];
            $tod = $data['to_date'];
            $comm = $data['comments'];
            $sortby = $data['sort_by'];

          if($data['report_type']=="1"){
            if($data['collection_center_id']=="0") {
              // Load view *
              $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
              $outlet1 = $this->outlet1Model->getTheOutlets($_SESSION['user_id']);
              $data = [
                'colcen1' => $colcen1,
                'outlet1' => $outlet1
        
              ];
              $this->view('financial operator/FO_CC_Outlet_Orders_Report', $data);
              echo '<script>alert("Please select a valid collection center!")</script>';
              //return;
            } else {
              $action1 = "processed and supplied ";
              $ccid = $data['collection_center_id'];
              $ccname = $this->colcen2Model->getSelCCdetails($ccid);
              $placenm = $ccname->collection_center_name;
              if($data['sort_by']=="Date") {
                if($data['from_date']==NULL) {
                  if($data['to_date']==NULL) {
                    $genReport = $this->filterOrdModel->reportalltime($data);
                    $genReport1 = $this->filterOrdModel->reportalltime1($data);
                  } else {
                    $genReport = $this->filterOrdModel->reporttodate($data);
                    $genReport1 = $this->filterOrdModel->reporttodate1($data);
                  }
                } else {
                  if($data['to_date']==NULL) {
                    $genReport = $this->filterOrdModel->reportfromdate($data);
                    $genReport1 = $this->filterOrdModel->reportfromdate1($data);
                  } else {
                    $genReport = $this->filterOrdModel->reportfromtodate($data);
                    $genReport1 = $this->filterOrdModel->reportfromtodate1($data);
                  }
                }
              } elseif ($data['sort_by']=="Value") {
                if($data['from_date']==NULL) {
                  if($data['to_date']==NULL) {
                    $genReport = $this->filterOrdModel->reporvalltime($data);
                    $genReport1 = $this->filterOrdModel->reporvalltime1($data);
                  } else {
                    $genReport = $this->filterOrdModel->reporvtodate($data);
                    $genReport1 = $this->filterOrdModel->reporvtodate1($data);
                  }
                } else {
                  if($data['to_date']==NULL) {
                    $genReport = $this->filterOrdModel->reporvfromdate($data);
                    $genReport1 = $this->filterOrdModel->reporvfromdate1($data);
                  } else {
                    $genReport = $this->filterOrdModel->reporvfromtodate($data);
                    $genReport1 = $this->filterOrdModel->reporvfromtodate1($data);
                  }
                }
              } else {
                // Load view *
                $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
                $outlet1 = $this->outlet1Model->getTheOutlets($_SESSION['user_id']);
                $data = [
                  'colcen1' => $colcen1,
                  'outlet1' => $outlet1
        
                ];
                $this->view('financial operator/FO_CC_Outlet_Orders_Report', $data);
                echo '<script>alert("Please select a valid sort parameter!")</script>';
                //return;
              }
            }  
          } elseif ($data['report_type']=="2"){
            if($data['outlet_id']=="0") {
               // Load view *
               $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
               $outlet1 = $this->outlet1Model->getTheOutlets($_SESSION['user_id']);
               $data = [
                 'colcen1' => $colcen1,
                 'outlet1' => $outlet1
       
               ];
               $this->view('financial operator/FO_CC_Outlet_Orders_Report', $data);
               echo '<script>alert("Please select a valid outlet!")</script>';
               //return;
            } else {
              $action1 = "initiated and received ";
              $oid = $data['outlet_id'];
              $outletname = $this->filterOrdModel->getSelOrdOutlet($oid);
              $placenm = $outletname->outlet_name;
              if($data['sort_by']=="Date") {
                if($data['from_date']==NULL) {
                  if($data['to_date']==NULL) {
                    $genReport = $this->filterOrdModel->repordalltime($data);
                    $genReport1 = $this->filterOrdModel->repordalltime1($data);
                  } else {
                    $genReport = $this->filterOrdModel->repordtodate($data);
                    $genReport1 = $this->filterOrdModel->repordtodate1($data);
                  }
                } else {
                  if($data['to_date']==NULL) {
                    $genReport = $this->filterOrdModel->repordfromdate($data);
                    $genReport1 = $this->filterOrdModel->repordfromdate1($data);
                  } else {
                    $genReport = $this->filterOrdModel->repordfromtodate($data);
                    $genReport1 = $this->filterOrdModel->repordfromtodate1($data);
                  }
                }
              } elseif ($data['sort_by']=="Value") {
                if($data['from_date']==NULL) {
                  if($data['to_date']==NULL) {
                    $genReport = $this->filterOrdModel->reporlalltime($data);
                    $genReport1 = $this->filterOrdModel->reporlalltime1($data);
                  } else {
                    $genReport = $this->filterOrdModel->reporltodate($data);
                    $genReport1 = $this->filterOrdModel->reporltodate1($data);
                  }
                } else {
                  if($data['to_date']==NULL) {
                    $genReport = $this->filterOrdModel->reporlfromdate($data);
                    $genReport1 = $this->filterOrdModel->reporlfromdate1($data);
                  } else {
                    $genReport = $this->filterOrdModel->reporlfromtodate($data);
                    $genReport1 = $this->filterOrdModel->reporlfromtodate1($data);
                  }
                }
              } else {
                // Load view *
                $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
                $outlet1 = $this->outlet1Model->getTheOutlets($_SESSION['user_id']);
                $data = [
                  'colcen1' => $colcen1,
                  'outlet1' => $outlet1
                ];
                $this->view('financial operator/FO_CC_Outlet_Orders_Report', $data);
                echo '<script>alert("Please select a valid sort parameter!")</script>';
                //return;
              }
            } 
              
          } else {
             // Load view *
             $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
             $outlet1 = $this->outlet1Model->getTheOutlets($_SESSION['user_id']);
             $data = [
               'colcen1' => $colcen1,
               'outlet1' => $outlet1
             ];
             $this->view('financial operator/FO_CC_Outlet_Orders_Report', $data);
             echo '<br><b><script>alert("Please select a collection center or an outlet!")</script></b><br>';
             //return;
          }

          } //close else of date validation
         


          $data = [
            'genReport' => $genReport,
            'genReport1' => $genReport1
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
          $txt0 =$txt0."<br><br> Total quantity of all orders (initial) : ".$total."Kg <br>Total value of all orders (final) : Rs.".$total1."/=<br>The value of items returned after delivery : Rs.".$was1."/=<br>";

          date_default_timezone_set('Asia/Kolkata');
          $time = date('h-i-sa');

          $all=" ";
          //print_r($data['genReport']);
          foreach($data['genReport1'] as $row) {
             $all = $all."<p> "." Order ID : ".$row->order_id." Ordered Date : ".$row->order_date." Ordered by : ".$row->outlet_id." Driver Assigned On : ".$row->assigned_date." Assigned Driver: ".$row->driver." Delivered On : ".$row->delivery_date." <br>Item ID : ".$row->product_id." Ordered Quantity : ".$row->ordered_quantity." Assigned Quantity : ".$row->assigned_quantity." Rejected Quantity : ".$row->rejected_quantity." Value of delivered order : ".$row->value_before_deliver." Value after returns : ".$row->value_after_delivery." ;</p>";
          }

          $res1 = print_r($all, true);
          $txt1 = "<!DOCTYPE html><head><title>Report on Delivered Orders</title></head><body><h3><b>AGROMASTER:</b> Report on Delivered Orders</h3><br>Orders ".$action1."by: ".$placenm."<br>From : ".$fromd."<br>To : ".$tod."<br>Sorted by: ".$sortby."<br>Comments or suggestions of Financial Operator: ".$comm."<br><br><br>".$res1."<br><br>".$txt0."<br><br><br>Report generated on ".$today." at ".$time." <br><br><br>END<br><br><br></body></html>";

          date_default_timezone_set('Asia/Kolkata');
          $datenow = date('Y-m-d h-i-sa');

          $filename = $datenow." NormalOrdersReport.php";
          
          $file1 = fopen($filename, "w");

          fwrite($file1,$txt1);

          fclose($file1);

          require_once '../public/' . $filename;

        } else {
          // Load view
          redirect('financialoperatorpages/ccoutletorderrprt');
        }
      }
    }
    
    