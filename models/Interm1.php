<?php
  class  Interm1 { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getTheCCs(){
      $this->db->query('SELECT DISTINCT collection_center_id FROM neccesity WHERE status = "pending" ORDER BY ordered_date');
      
      $results = $this->db->resultSet(); 
      //$row = $this->db->single();

      return $results;
    }

    public function showSelCCOrders($id){
      $this->db->query('SELECT * FROM neccesity WHERE collection_center_id = :ccid AND status = "pending" ORDER BY ordered_date');
      $this->db->bind(':ccid', $id);

      $results = $this->db->resultSet(); 

      return $results;
    }

    public function showExforSelCC($id){
      $this->db->query('SELECT * FROM excess WHERE collection_center_id != :ccid AND status = "pending" ORDER BY ordered_date');
      $this->db->bind(':ccid', $id);

      $results = $this->db->resultSet(); 

      return $results;
    }

    //function not needed
    public function showExforSelCCPrd($data){
      $this->db->query('SELECT * FROM excess WHERE collection_center_id != :ccid AND product_id = :pid AND status = "pending"');
      $this->db->bind(':ccid', $data['collection_center_id']);
      $this->db->bind(':pid', $data['product_id']);

      $results = $this->db->resultSet(); 

      return $results;
    }
    
    public function confirmCCOrders($id){
      $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE excess_neccesity_assignment.delivery_status = "temporary allocation" AND neccesity.collection_center_id = :ccid');
      $this->db->bind(':ccid', $id);

      $results = $this->db->resultSet(); 

      $this->db->query('UPDATE neccesity SET neccesity.status = "rejected"  WHERE neccesity.status = "pending" AND neccesity.collection_center_id = :ccid');
      $this->db->bind(':ccid', $id);
      if($this->db->execute()){
        return $results;
      } else {
        return false;
      }
    }

    public function confirmCCOrdersNR($id){
      $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE excess_neccesity_assignment.delivery_status = "temporary allocation" AND neccesity.collection_center_id = :ccid');
      $this->db->bind(':ccid', $id);

      $results = $this->db->resultSet(); 

      return $results;
    }

    public function checkTemps($id){
      $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE excess_neccesity_assignment.delivery_status = "temporary allocation" AND neccesity.collection_center_id = :ccid');
      $this->db->bind(':ccid', $id);

      $row = $this->db->single();

      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    public function ccidOfexid($exidstr){
      $this->db->query('SELECT collection_center_id FROM excess WHERE excess_id = :eid AND status = "assigned"');
      $this->db->bind(':eid', $exidstr);

      $row = $this->db->single();

      return $row->collection_center_id;
    }

    public function confCCOrdersE($eidnew){
      $this->db->query('SELECT * FROM excess LEFT JOIN excess_neccesity_assignment ON  excess.excess_id = excess_neccesity_assignment.excess_id WHERE excess_neccesity_assignment.delivery_status = "temporary allocation" AND excess.collection_center_id = :eid');
      $this->db->bind(':eid', $eidnew);

      $results = $this->db->resultSet(); 

      return $results;
    }


    public function viewCCOrders() {
      $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE excess_neccesity_assignment.delivery_status = "temporary allocation" GROUP BY neccesity.collection_center_id');
      
      $results = $this->db->resultSet(); 

      return $results;
    }

    public function AddedEx($data) {
      $this->db->query('INSERT INTO excess_neccesity_assignment(necessity_id, excess_id) VALUES (:nid, :eid)');
      $this->db->bind(':eid', $data['excess_id']);
      $this->db->bind(':nid', $data['neccesity_id']);

      // Execute
      if($this->db->execute()){
         $nexcessid = $this->quantityOfExForNec($data['excess_id']);
         $this->db->query('UPDATE excess SET status = "assigned", assigned_quantity = excess.quantity, assigned_date = :date1 WHERE excess_id=:eid ');
         $this->db->bind(':eid', $data['excess_id']);
         $this->db->bind(':date1', date('Y-m-d'));
         
         if($this->db->execute()){
          $this->db->query('UPDATE neccesity SET status = "assigned", assigned_quantity = :nexcessid, assigned_date = :date2 WHERE neccesity_id=:nid ');
          $this->db->bind(':nid', $data['neccesity_id']);
          $this->db->bind(':date2', date('Y-m-d'));
          $this->db->bind(':nexcessid', $nexcessid);
          if($this->db->execute()){
            $this->db->query('SELECT * FROM neccesity WHERE collection_center_id = :nid AND status = "pending" ORDER BY ordered_date');
            $this->db->bind(':nid', $data['necessity_ccid']);
            $results = $this->db->resultSet(); 
            return $results;
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

    public function showExOfCC($eccid){
      $this->db->query('SELECT * FROM excess WHERE collection_center_id = :ccid AND status = "pending"');
      $this->db->bind(':ccid', $eccid);

      $results = $this->db->resultSet(); 

      return $results;
    }
    public function quantityOfExForNec($excessid){
      $this->db->query('SELECT quantity FROM excess LEFT JOIN excess_neccesity_assignment ON excess_neccesity_assignment.excess_id = excess.excess_id  WHERE excess_neccesity_assignment.excess_id = :excessid');
      
      $this->db->bind(':excessid', $excessid);

      $row = $this->db->single(); 

      return $row->quantity;
    }

    
    public function deleteTempAlloc($nid,$eid){
      $this->db->query('DELETE FROM excess_neccesity_assignment WHERE excess_neccesity_assignment.excess_id = :eid AND excess_neccesity_assignment.necessity_id = :nid AND excess_neccesity_assignment.delivery_status = "temporary allocation"');
      $this->db->bind(':nid', $nid);
      $this->db->bind(':eid', $eid);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }
    
    public function resetEx($eid) {
      $this->db->query('UPDATE excess SET status = "pending", assigned_quantity = 0.00, assigned_date = NULL WHERE excess_id=:eid AND status = "assigned" ');
      $this->db->bind(':eid', $eid);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function resetNec($nid) {
      $this->db->query('UPDATE neccesity SET status = "pending", assigned_quantity = 0.00, assigned_date = NULL  WHERE neccesity_id=:nid AND status = "assigned" ');
      $this->db->bind(':nid', $nid);
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }


    public function assignDriver($data){

      $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity  ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id  WHERE excess_neccesity_assignment.delivery_status = "temporary allocation" AND neccesity.collection_center_id = :ccid');
      
      $this->db->bind(':ccid', $data['ncc_id']);

      $results = $this->db->resultSet(); 

      $data1 = [
        'results' => $results
      ];

      //print_r($data1['results']);
      $row = $data1['results'];
      $c = count($row);
      $x = 777;
      $code = $data['ncc_id'].": ";
      //print_r($row);
      //print_r($c);

      for($i=0; $i<$c; $i++) {
        if(!empty($row[$i]->product_id)){
          $this->db->query('SELECT product_id FROM excess WHERE excess.excess_id = :eid');
      
          $this->db->bind(':eid', $row[$i]->excess_id);
    
          $row1 = $this->db->single();

          if($this->db->execute()){
            //print_r($row[$i]);
            //print_r(strval($row[$i]->excess_id));
            if($row[$i]->product_id==$row1->product_id) {
              $this->db->query('UPDATE excess_neccesity_assignment SET delivery_status = "driver assigned", driver_id = :driver_id WHERE excess_id = :excess_id');
              $this->db->bind(':excess_id', strval($row[$i]->excess_id));
              $this->db->bind(':driver_id', $data['driver_id']);
              if($this->db->execute()){//seems not needed below part 
              /*
              $code = $code.strval($row[$i]->excess_id)."-".strval($row[$i]->neccesity_id)." ";
              */
              //print_r($code);
              /*
              $this->db->query('UPDATE drivers SET status = "Not Available", assigned_to = :code  WHERE driver_id = :driver_id');
              $this->db->bind(':code', $code);
              $this->db->bind(':driver_id', $data['driver_id']);
              if($this->db->execute()){
              */
                $x = $x + 1;
              /*
              } else {
                return false;
              }*/
              } else {
                return false;
              }
            } else {
              
              $this->db->query('DELETE FROM excess_neccesity_assignment WHERE excess_neccesity_assignment.excess_id = :eid AND excess_neccesity_assignment.necessity_id = :nid AND excess_neccesity_assignment.delivery_status = "temporary allocation"');
              $this->db->bind(':nid', $row[$i]->necessity_id);
              $this->db->bind(':eid', $row[$i]->excess_id);
              if($this->db->execute()){
                $this->db->query('UPDATE excess SET status = "pending", assigned_quantity = 0.00, assigned_date = NULL WHERE excess_id=:eid AND status = "assigned" ');
                $this->db->bind(':eid', $row[$i]->excess_id);
                if($this->db->execute()){
                  $this->db->query('UPDATE neccesity SET status = "pending", assigned_quantity = 0.00, assigned_date = NULL  WHERE neccesity_id=:nid AND status IN ("rejected", "assigned")');
                  $this->db->bind(':nid', $row[$i]->necessity_id);
                  if($this->db->execute()){
                      echo '<script>alert("The selected excess product is not same as the ordered product!!! ")</script>';
                      continue;
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

          } else {
            return false;
          }
        }
      } return true;
    
      
    }

  

    public function showAssigned(){
      $this->db->query('SELECT * FROM excess_neccesity_assignment WHERE excess_neccesity_assignment.delivery_status IN ("driver assigned","received")');

      $results = $this->db->resultSet(); 

      return $results;
    }

    public function showColcenE($excess_id1){
      $this->db->query('SELECT * FROM excess WHERE excess_id = :excess_id1');
      $this->db->bind(':excess_id1',$excess_id1);
      $results = $this->db->resultSet(); 

      return $results;
    }

    public function showColcenN($necessity_id1){
      $this->db->query('SELECT * FROM neccesity WHERE neccesity_id = :necessity_id1');
      $this->db->bind(':necessity_id1',$necessity_id1);
      $results = $this->db->resultSet(); 

      return $results;
    }
    
    public function showNecessity(){
      $this->db->query('SELECT * FROM neccesity WHERE status = "pending" ORDER BY ordered_date');

      $results = $this->db->resultSet(); 

      return $results;
    }

    public function showExcess(){
      $this->db->query('SELECT * FROM excess WHERE status = "pending" ORDER BY ordered_date');

      $results = $this->db->resultSet(); 

      return $results;
    }
  }
