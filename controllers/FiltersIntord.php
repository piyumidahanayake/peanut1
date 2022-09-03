<?php
    class FiltersIntord extends Controller {
      public function __construct(){
        $this->filterOrdModel = $this->model('FilterIntordm');
        $this->colcen1Model = $this->model('Colcen1');
        $this->colcen2Model = $this->model('Colcen2');
        $this->driversModel = $this->model('DriverX');
        $this->drivers1Model = $this->model('Drivers1');
        $this->drivers2Model = $this->model('Drivers2');
      }



      public function report(){
      //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //If method id form; then process the form
          //die('Values submitted')
        //Initialize data below
          $data =[
            'source' => trim($_POST['source']),
            'destination' => trim($_POST['destination']),
            'driver_id' => trim($_POST['driver']),
            'from_date' => trim($_POST['from_date']),
            'to_date' => trim($_POST['to_date']),
            'highlights' => trim($_POST['highlights']),
            'sort_by' => trim($_POST['sort']),
          ];

          date_default_timezone_set('Asia/Kolkata');
          $today = date('Y-m-d');
          if($data['from_date']>$data['to_date'] || $data['from_date']>$today || $data['to_date']>$today) {
              // Load view *
              $drivers1 = $this->drivers1Model->getTheDrivers($_SESSION['user_id']);
              $drivers2 = $this->drivers2Model->getTheDrivers($_SESSION['user_id']);
              $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
              $data = [
                'drivers1' => $drivers1,
                'drivers2' => $drivers2,
                'colcen1' => $colcen1
              ];
              $this->view('financial operator/FO_Interm_Orders_Report', $data);
              echo '<script>alert("Invalid period of time selected!")</script>';
              //return;
          } else {
          if($data['source']=="0" || $data['destination']=="0"){
               // Load view *
               $drivers1 = $this->drivers1Model->getTheDrivers($_SESSION['user_id']);
               $drivers2 = $this->drivers2Model->getTheDrivers($_SESSION['user_id']);
               $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
               $data = [
                 'drivers1' => $drivers1,
                 'drivers2' => $drivers2,
                 'colcen1' => $colcen1
               ];
               $this->view('financial operator/FO_Interm_Orders_Report', $data);
               echo '<script>alert("Please select TWO valid collection centers as source & destination!!")</script>';
               //return;
            } elseif ($data['driver_id']=="0") { 
              $ccid = $data['source'];
              $ccname = $this->colcen2Model->getSelCCdetails($ccid);
              $placenm = $ccname->collection_center_name;
              $dccid = $data['destination'];
              $dccname = $this->colcen2Model->getSelCCdetails($dccid);
              $dplacenm = $dccname->collection_center_name;
        
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
              } elseif ($data['sort_by']=="Weight") {
                if($data['from_date']==NULL) {
                  if($data['to_date']==NULL) {
                    $genReport = $this->filterOrdModel->reporkalltime($data);
                    $genReport1 = $this->filterOrdModel->reporkalltime1($data);
                  } else {
                    $genReport = $this->filterOrdModel->reporktodate($data);
                    $genReport1 = $this->filterOrdModel->reporktodate1($data);
                  }
                } else {
                  if($data['to_date']==NULL) {
                    $genReport = $this->filterOrdModel->reporkfromdate($data);
                    $genReport1 = $this->filterOrdModel->reporkfromdate1($data);
                  } else {
                    $genReport = $this->filterOrdModel->reporkfromtodate($data);
                    $genReport1 = $this->filterOrdModel->reporkfromtodate1($data);
                  }
                }
              } else {
                // Load view *
                $drivers1 = $this->drivers1Model->getTheDrivers($_SESSION['user_id']);
                $drivers2 = $this->drivers2Model->getTheDrivers($_SESSION['user_id']);
                $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
                $data = [
                  'drivers1' => $drivers1,
                  'drivers2' => $drivers2,
                  'colcen1' => $colcen1
                ];
                $this->view('financial operator/FO_Interm_Orders_Report', $data);
                echo '<script>alert("Please select a valid sort parameter!")</script>';
                //return;
              }
            }  else {
              $ccid = $data['source'];
              $ccname = $this->colcen2Model->getSelCCdetails($ccid);
              $placenm = $ccname->collection_center_name;
              $dccid = $data['destination'];
              $dccname = $this->colcen2Model->getSelCCdetails($dccid);
              $dplacenm = $dccname->collection_center_name;
              $did = $data['driver_id'];
              $driver = $this->driversModel->getSelDriver($did);
              $drivername = $driver->name;
        
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
              } elseif ($data['sort_by']=="Weight") {
                if($data['from_date']==NULL) {
                  if($data['to_date']==NULL) {
                    $genReport = $this->filterOrdModel->reporwalltime($data);
                    $genReport1 = $this->filterOrdModel->reporwalltime1($data);
                  } else {
                    $genReport = $this->filterOrdModel->reporwtodate($data);
                    $genReport1 = $this->filterOrdModel->reporwtodate1($data);
                  }
                } else {
                  if($data['to_date']==NULL) {
                    $genReport = $this->filterOrdModel->reporwfromdate($data);
                    $genReport1 = $this->filterOrdModel->reporwfromdate1($data);
                  } else {
                    $genReport = $this->filterOrdModel->reporwfromtodate($data);
                    $genReport1 = $this->filterOrdModel->reporwfromtodate1($data);
                  }
                }
              } else {
                // Load view *
                $drivers1 = $this->drivers1Model->getTheDrivers($_SESSION['user_id']);
                $drivers2 = $this->drivers2Model->getTheDrivers($_SESSION['user_id']);
                $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
                $data = [
                  'drivers1' => $drivers1,
                  'drivers2' => $drivers2,
                  'colcen1' => $colcen1
                ];
                $this->view('financial operator/FO_Interm_Orders_Report', $data);
                echo '<script>alert("Please select a valid sort parameter!")</script>';
                //return;
              }
            }
          }  //close else of date validation
         
          $fromd = $data['from_date'];
          $tod = $data['to_date'];
          $high = $data['highlights'];
          $sortby = $data['sort_by'];
          $did = $data['driver_id'];

          $data = [
            'genReport' => $genReport, //necessity
            'genReport1' => $genReport1 //excess
          ];

          date_default_timezone_set('Asia/Kolkata');
          $time = date('h-i-sa');

          $all=" ";
          $all1=" ";
          //print_r($data['genReport']);
          //print_r($data['genReport1']);

          foreach($data['genReport1'] as $row) {
             $all = $all."<p> "." Excess ID : ".$row->excess_id." Added On : ".$row->ordered_date." Added by : ".$row->collection_center_id." Item Added : ".$row->product_id." Added Quantity : ".$row->quantity." ;";
             if(empty($data['genReport'])) {
              $all = $all."<br> "." Necessity ID : ".$row->necessity_id." *No necessity found within the entered period of time ";
             } else {
                foreach($data['genReport'] as $row1) {
                    if($row->necessity_id==$row1->necessity_id){
                      $all = $all."<br> "." Necessity ID : ".$row1->necessity_id." Ordered On : ".$row1->ordered_date." Ordered by : ".$row1->collection_center_id." Item Ordered : ".$row1->product_id." Ordered Quantity : ".$row1->quantity." <br> Assigned On : ".$row1->assigned_date." Assigned Driver : ".$row1->driver_id." Assigned Quantity : ".$row1->assigned_quantity." ;</p>";
                    } else {
                      $all = $all."<br> "." Necessity ID : ".$row->necessity_id." *The relevant necessity is not within the entered period of time ";
                    }
                }
             }
          }
         

          $res1 = print_r($all, true);
          $res2 = print_r($all1, true);
          $txt1 = "<!DOCTYPE html><head><title>Report on Intermediate Orders</title></head><body><h3><b>AGROMASTER:</b> Report on Orders Processed by Intermediate Transport Service</h3><br>Source : ".$placenm."<br>Destination : ".$dplacenm."<br>From : ".$fromd."<br>To : ".$tod."<br>Sorted by: ".$sortby."<br>Highlights by Financial Operator: ".$high."<br><br><br><table><tr><td>".$res1."</td><td>".$res2."</td></tr></table><br><br><br>Report generated on ".$today." at ".$time." <br><br><br>END<br><br><br></body></html>";

          date_default_timezone_set('Asia/Kolkata');
          $datenow = date('Y-m-d h-i-sa');

          $filename = $datenow." IntermediateOrdersReport.php";
          
          $file1 = fopen($filename, "w");

          fwrite($file1,$txt1);

          fclose($file1);

          require_once '../public/' . $filename;

        } else {
          // Load view
          redirect('financialoperatorpages/intermorderrprt');
        }
      }
    }
    
    