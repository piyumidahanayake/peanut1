<?php
  class Notific { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function Write($intndd_for,$msg){
      $init_by = $_SESSION['user_id'];
      $this->db->query('INSERT INTO notifications (Date_Time, Content, init_by, intndd_for) VALUES (CURRENT_TIMESTAMP, :msg, :init_by, :intndd_for)');
      $this->db->bind(':init_by',$init_by);
      $this->db->bind(':intndd_for',$intndd_for);
      $this->db->bind(':msg',$msg); 
      
      // Execute 
      if($this->db->execute()){
        return true;
      } else {
        return false;
      } 

    }

    public function Read(){
      $reader = $_SESSION['user_id'];
      $this->db->query('SELECT * FROM notifications WHERE notifications.intndd_for = :reader AND notifications.Status="New"');
      $this->db->bind(':reader', $reader);
      //$row = $this->db->single();
      $results = $this->db->resultSet(); 
      if($this->db->execute()){
        $this->db->query('UPDATE notifications SET status="Viewed" WHERE notifications.intndd_for = :reader AND notifications.Status="Interm"');
        $this->db->bind(':reader', $reader);
        if($this->db->execute()){
            $this->db->query('UPDATE notifications SET status="Interm" WHERE notifications.intndd_for = :reader AND notifications.Status="New"');
            $this->db->bind(':reader', $reader);
            if($this->db->execute()){
              $data = [
                'results' => $results
              ];
              $i = 0;
              $name = [];
              foreach($data['results'] as $row) {
                $id = $row->init_by;
                $name[$i] = $this->checkName($id);
                $i = $i + 1;
              }
              $data1 = [
                'name' => $name,
                'results' => $results
              ];
              return $data1;
            } else {
              return false;
            }  
        } else {
          return false;
        }   
      } else {
        return false;
      }

    }

    public function CountAlert($reader){
      //$reader = $_SESSION['user_id'];
      $this->db->query('SELECT * FROM notifications WHERE notifications.intndd_for = :reader AND notifications.Status="New"');
      $this->db->bind(':reader', $reader);
      $results = $this->db->resultSet();
      $data = [
        'results' => $results
      ];
      $count = 0;
      foreach($data['results'] as $row) {
        $count = $count + 1;
      }
      if($count>0){
        return $count;
      } else {
        $count = 0;
        return $count;
      }

    }

    public function ReadOlder(){
      $reader = $_SESSION['user_id'];
      $this->db->query('SELECT * FROM notifications WHERE notifications.intndd_for = :reader AND notifications.Status="Viewed"');
      $this->db->bind(':reader', $reader);
      $results = $this->db->resultSet();
      if($this->db->execute()){
        $data = [
          'results' => $results
        ];
        $i = 0;
        $name = [];
        foreach($data['results'] as $row) {
          $id = $row->init_by;
          $name[$i] = $this->checkName($id);
          $i = $i + 1;
        }
        $data1 = [
          'name' => $name,
          'results' => $results
        ];
        return $data1;
      } else {
        return false;
      }

    }

    public function checkName($id){
      $this->db->query('SELECT user_name FROM accounts WHERE accounts.id = :id');
      $this->db->bind(':id', $id);
      $row = $this->db->single();
      $name = $row;

      if($this->db->rowCount() > 0){
        return $name;
      } else {
        return false;
      }

    }

    public function ReadMessage($notifiid){
      $this->db->query('SELECT Content FROM notifications WHERE notifications.Notification_ID = :id');
      $this->db->bind(':id', $notifiid);
      $row = $this->db->single();

      if($this->db->rowCount() > 0){
        return $row->Content;
      } else {
        return false;
      }

    }
    
    /*
    public function checkId($reqid){
      $this->db->query('SELECT item_name FROM new_item_requests WHERE new_item_requests.request_id = :reqid');
      $this->db->bind(':reqid', $reqid);
      $row = $this->db->single();
      $name = $row->item_name;
      if($this->db->execute()){
        $this->db->query('SELECT product_id FROM products WHERE products.name = :name');
        $this->db->bind(':name', $name);
        $row = $this->db->single();
        $pid = $row->product_id;

        if($this->db->rowCount() > 0){
          return $pid;
        } else {
          return false;
        }
      }  else {
        return false;
      }

    }

   */ 
  }
