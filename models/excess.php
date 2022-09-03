<?php

class Excess{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function addnewexcess($today,$data){
      $this->db->query('INSERT INTO excess (collection_center_id, product_id, quantity, ordered_date, status) VALUES(:collection_center_id, :product_id, :quantity,:ordered_date,:status)');
      // Bind values
      $this->db->bind(':collection_center_id', $_SESSION['user_id']);
      $this->db->bind(':product_id', $data['product_id']);
      $this->db->bind(':quantity', $data['quantity']);
      $this->db->bind(':ordered_date', date("Y/m/d"));
      $this->db->bind(':status','pending');
      //$this->db->bind(':invoice_status','pending');
      //$this->db->bind(':date',$data['date']);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
      }

      public function excessDetails(){
        $this->db->query('SELECT excess.excess_id as id, excess.order_date as ordered_date, excess.quantity  as quantity, excess.status as status,
        excess.assigned_quantity as assigned_quantity, products.name as product_name, excess.assigned_date as assigned_date
        FROM excess INNER JOIN products ON  excess.product_id=products.product_id where  excess.collection_center_id=:center_id and excess.status=:status');
       
        $this->db->bind(':center_id', $_SESSION['user_id']);
        $this->db->bind(':status', 'assigned');
        $results = $this->db->resultSet();
  
        return $results;
      }

      public function pendingExcessDetails(){
        $this->db->query('SELECT excess.excess_id as id, excess.ordered_date as ordered_date, excess.quantity  as quantity, excess.status as status,
        excess.assigned_quantity as assigned_quantity, products.name as product_name,products.product_id as product_id, excess.assigned_date as assigned_date
        FROM excess INNER JOIN products ON  excess.product_id=products.product_id where  excess.collection_center_id=:center_id and excess.status=:status');
       
        $this->db->bind(':center_id', $_SESSION['user_id']);
        $this->db->bind(':status', 'pending');
        $results = $this->db->resultSet();
  
        return $results;
      }

      public function removeexcess($id){
        $this->db->query('UPDATE excess set status = :removed where excess_id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':removed', 'removed');

        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

}

?>