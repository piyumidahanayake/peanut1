<?php
    class Notifications extends Controller {
      public function __construct(){
        $this->notificModel = $this->model('Notific');
      }



      public function read(){
        $read = $this->notificModel->Read();
        $name = $read['name'];
        $results = $read['results'];
        $data = [
          'read' => $results,
          'name' => $name 
        ];
        $this->view('pages/notifications_page', $data);
      }

      public function readOlder(){
        $read = $this->notificModel->ReadOlder();
        $name = $read['name'];
        $results = $read['results'];
        $data = [
          'read' => $results,
          'name' => $name 
        ];
        $this->view('pages/notifications_page', $data);
      }

      public function viewfull($mid){
        $message = $this->notificModel->ReadMessage($mid);
        echo ("<h4><b>".$message.".</b></h4>");
      }

    }
    
     
