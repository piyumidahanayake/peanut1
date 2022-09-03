<?php

    //namespace Dompdf;
    //include_once 'dompdf/autoload.inc.php';

    class FiltersS extends Controller {
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

          $table2 = " ";
          $tableX = " ";
          $table1 = "<br><table border='1' cellspacing='2'><tr><th>Request_ID</th><th>Collection Center ID</th><th>Amount Requested</th><th>Date of Request</th><th>Year</th><th>Month</th><th>Description</th><th>Request Status</th><th>Transferred</th><th>Transferred Amount</th><th>Transferred Date</th></tr>";
          foreach ($data['prvtransfers1'] as $row1) {
            $table2 = $table2."<tr>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->request_id; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->collection_center_id; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->amount_requested; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->date_of_request; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->Year; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->month; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->description; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->request_status; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->transferred; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->transferred_amount; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->transfer_date; $table2 = $table2."</td>";
            $table2 = $table2."</tr>";
            $tableX = $tableX.$table2;
            $table2 = " ";
          }
          $table3 = "</table><br>";
          $tableFinal1 =  $table1.$tableX.$table3;

          $table2 = " ";
          $tableX = " ";
          $table1 = "<br><table border='1' cellspacing='2'><tr><th>Request_ID</th><th>Collection Center ID</th><th>Amount Requested</th><th>Date of Request</th><th>Year</th><th>Month</th><th>Description</th><th>Request Status</th><th>Transferred</th></tr>";
          foreach ($data['prvtransfers2'] as $row1) {
            $table2 = $table2."<tr>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->request_id; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->collection_center_id; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->amount_requested; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->date_of_request; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->Year; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->month; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->description; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->request_status; $table2 = $table2."</td>";
            $table2 = $table2."<td>"; $table2 = $table2.$row1->transferred; $table2 = $table2."</td>";
            $table2 = $table2."</tr>";
            $tableX = $tableX.$table2;
            $table2 = " ";
          }
          $table3 = "</table><br>";
          $tableFinal2 =  $table1.$tableX.$table3;
 
          $res1 = print_r($prvtransfers1, true);
          $res2 = print_r($prvtransfers2, true);

          $txt1 = "<html><head><title>Summary of Collection Center Requests</title></head><body>Collection center: ".$ccnm."<br>From: ".$fromd."&nbsp&nbspTo: ".$tod."<br><br><b>Accepted Requests<b><br>".$tableFinal1."<br><b>Rejected Requests<b><br>".$tableFinal2."<br></body></html>";

          date_default_timezone_set('Asia/Kolkata');
          $datenow = date('Y-M-d h-i-sa');
          $filename = $datenow." PrevCCReqsSummary.html";
          
          $file1 = fopen($filename, "w");

          fwrite($file1,$txt1);

          fclose($file1);

          

          $file_to_download = $filename;
          $client_file = $filename;
          $download_rate = 200; // 200Kbps
          $file2 = null;
          try {
            if (!file_exists($file_to_download)) {
              throw new Exception('File ' . $file_to_download . ' does not exist');
            }
            if (!is_file($file_to_download)) {
              throw new Exception('File ' . $file_to_download . ' is not valid');
            }
            header('Cache-control: private');
            header('Content-Type: application/octet-stream');
            header('Content-Length: ' . filesize($file_to_download));
            header('Content-Disposition: filename=' . $client_file);

            flush();

            $file2 = fopen($filename, "r");

            while (!feof($file2)) {
             print fread($file2, round($download_rate*1024));
             flush();
             sleep(1);
            }
          } catch (\Throwable $e) {
            echo $e->getMessage();
          } finally {
            if ($file2) {
              fclose($file2);
              readfile($filename);
            }
          }

         


        
        /*
         $path1 = "C:/xampp/htdocs/agromaster/public/".$filename;

          $path2 = str_replace('/','\\', $path1);

          header('Location: C:/xampp/htdocs/agromaster/public/$filename');
          exit;

          $filenameb = basename($path2);

          file_put_contents($filenameb, file_get_contents($path2));
        */

        /*
          $pdf = new HTML2FPDF();

          $pdf->AddPage();

          $file2 = fopen($filename, "r");

          $strContent = fread($file2, filesize($filename));

          fclose($file2);

          $pdf->WriteHTML($strContent);

          $fullpath = $datenow." PrevCCReqsSummary".".pdf";

          $pdf->Output($fullpath, D);
        */

        /*
          $dompdf = new Dompdf();
          $dompdf->loadhtml(' '.$txt1.' ');
          $dompdf->setPaper('A4', 'landscape');
          $dompdf->render();
          $dompdf->stream("",array("Attachment" => false));
        */
          //redirect('financialoperatorpages/sumreqtransf');
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
    
    