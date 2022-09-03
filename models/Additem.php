<?php
  class Additem { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }
      /*get all products; so no id needed*//*$id*/
    public function insertRequest($data){
      $this->db->query('INSERT INTO products (name, description, images) SELECT new_item_requests.item_name, new_item_requests.notes_or_details, new_item_requests.filename FROM new_item_requests WHERE request_id =:request_id');
      $this->db->bind(':request_id',$data['request_id']);
      
      // Execute 
      if($this->db->execute()){
        $product_id=$this->checkId($data['request_id']);
        $this->db->query('SELECT * FROM new_item_requests WHERE request_id =:request_id');
        $this->db->bind(':request_id',$data['request_id']);
        $row = $this->db->single();
        $ccid = $row->requested_by;
        if($this->db->execute()){
         $this->db->query('INSERT INTO collection_center_stock (collection_center_id, product_id, quantity) VALUES (:ccid,:product_id, :zero)');
         $this->db->bind(':ccid',$ccid);
         $this->db->bind(':product_id',intval($product_id));
         $this->db->bind(':zero',"0");
         if($this->db->execute()){
            $this->db->query('UPDATE new_item_requests SET status="Accepted", accepted_date=CURRENT_TIMESTAMP  WHERE new_item_requests.request_id =:request_id');
            $this->db->bind(':request_id',$data['request_id']);
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
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

    public function deleteRequest($data){
      $this->db->query('UPDATE new_item_requests SET status="Rejected", accepted_date=CURRENT_TIMESTAMP  WHERE new_item_requests.request_id =:request_id');
      $this->db->bind(':request_id',$data['request_id']);
      
      //Execute
      if($this->db->execute()){
          return true;
        } else {
          return false;
        }

    }

    public function checkName($id){
      $this->db->query('SELECT item_name FROM new_item_requests WHERE new_item_requests.request_id = :id');
      $this->db->bind(':id', $id);
      $row = $this->db->single();
      $name = $row->item_name;
      
      $keyword="%".$name."%";
      $this->db->query('SELECT * FROM products WHERE products.name LIKE :nmkw');
      $this->db->bind(':nmkw', $keyword);
      
      $row1 = $this->db->single();

      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }

    }
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

    
  }
