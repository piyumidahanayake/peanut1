<?php

    class collectioncenter{
      private $db;
      
      public function __construct(){
          $this->db = new Database;


      }
    
        // Regsiter user
        public function register($data){
        $this->db->query('INSERT INTO collection_center(collection_center_name, address, location, contact_number, email,  manager_name, init_username, init_password) VALUES(:name, :address, :location, :con_number, :email,  :manager_name, :init_username, :init_password)');
        //$this->db->query('INSERT INTO accounts (user_name, email, password, type) VALUES(:name,  :email,  :password , 2)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':district', $data['district']);
        $this->db->bind(':con_number', $data['con_number']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':manager_name', $data['manager_name']);
        $this->db->bind(':init_username', $data['init_username']);
        $this->db->bind(':init_password', $data['init_password']);
  
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }


      // Regsiter user
    public function addcce($data){
      $this->db->query('INSERT INTO collection_center(collection_center_id, address, contact_number,  manager_name, collection_center_name,location, email) VALUES(:collection_center_id, :address, :con_number,  :manager_name, :name, :location, :email)');
      //$this->db->query('INSERT INTO accounts (user_name, email, password, type) VALUES(:name,  :email,  :password , 2)');
      // Bind values
      $this->db->bind(':collection_center_id', $data['outlet']-> request_id);
      $this->db->bind(':name', $data['outlet']-> center_name);
      $this->db->bind(':address', $data['outlet']-> address);
      $this->db->bind(':con_number', $data['outlet']-> Contact_Number);
      $this->db->bind(':email', $data['outlet']-> email);
      $this->db->bind(':location', $data['location']);
      $this->db->bind(':manager_name', $data['outlet']-> requester_name);
      // $this->db->bind(':init_username', $data['outlet']-> center_name);
      // $this->db->bind(':init_password',  $data['password'] = password_hash($data['outlet']-> email, PASSWORD_DEFAULT));

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //update request table status
    public function updateStatus($data){
      $this->db->query('UPDATE user_request SET status = 1 WHERE request_id = :request_id');

      $this->db->bind(':request_id', $data['outlet']-> request_id);

       // Execute
       if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    //add to accounts table
    public function addAccount($data){
      $this->db->query('INSERT INTO accounts (id, user_name, email, password, type) VALUES(:id, :user_name, :email, :password, :type)');

      $this->db->bind(':id', $data['outlet']-> request_id);
      $this->db->bind(':user_name', $data['outlet']-> center_name);
      $this->db->bind(':email', $data['outlet']-> email);
      //$this->db->bind(':password', $data['password'] = password_hash($data['outlet']-> email, PASSWORD_DEFAULT));
      $this->db->bind(':password', $data['password'] = $data['outlet']-> email);
      $this->db->bind(':type', '1');

      // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
      
    }





  
      // Find user by email
      public function findUserByEmail($email){
        $this->db->query('SELECT * FROM collection_center WHERE email = :email');
        // Bind value
        $this->db->bind(':email', $email);
  
        $row = $this->db->single();
  
        // Check row
        if($this->db->rowCount() > 0){
          return true;
        } else {
          return false;
        }
      }
  
      //
      public function getcc(){
        $this->db->query('SELECT collection_center_id,collection_center_name, address, contact_number, location FROM collection_center');
    
         $results = $this->db->resultSet();

        return $results;
      }



      //outlet registration request list
    public function getccrequest(){
      $this->db->query('SELECT requester_name, request_id FROM user_request WHERE type= :type AND status= :status ');
      
      //bind value
      $this->db->bind(':type','collection center');
      $this->db->bind(':status','0');

      $results = $this->db->resultSet();

      if($this->db->rowCount() > 0){
        return $results;
      }else{
        return 'no requests';
      }

      return $results;
    }

    public function getccById($id){
      $this->db->query('SELECT * FROM collection_center WHERE collection_center_id = :id');
      $this->db->bind(':id',$id);

      $row = $this->db->single();

      return $row;
    }

    public function getccByRequestId($request_id){
      $this->db->query('SELECT * FROM user_request WHERE request_id = :request_id');
      $this->db->bind(':request_id',$request_id);

      $row = $this->db->single();

      return $row;
    }

    public function updatestatusforrejection($request_id){
      $this->db->query('UPDATE user_request SET status = 2 WHERE request_id = :request_id');

      $this->db->bind(':request_id', $request_id);

       // Execute
       if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    
    public function getembedcode($locationid){
      $this->db->query('SELECT location FROM collection_center WHERE collection_center_id = :locationid');
      $this->db->bind(':locationid',$locationid);

      $row = $this->db->single();

      return $row;
    }

    //remoce collection cennter
    public function removeccfrom_collectioncenter($id){
      
      // $this->db->query('DELETE FROM collection_center
      //                   WHERE NOT EXISTS(
      //                     SELECT * FROM orders o
      //                     WHERE o.collection_center_id=:id 
      //                     )
      //                   ') ;
          
      $this->db->query('DELETE FROM collection_center WHERE collection_center_id=:id') ;

      // Bind values
      $this->db->bind(':id', $id);
          
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    
    }

    public function removeccfrom_accounts($id){
      $this->db->query('DELETE FROM accounts WHERE id=:id') ;

      $this->db->bind(':id', $id);
          
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    
    }

    public function removeccfrom_collection_center_expenses($id){
      $this->db->query('DELETE FROM collection_center_expenses WHERE collection_center_id=:id') ;

      $this->db->bind(':id', $id);
          
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    
    }

    public function removeccfrom_collection_center_requests($id){
      $this->db->query('DELETE FROM collection_center_requests WHERE collection_center_id=:id') ;

      $this->db->bind(':id', $id);
          
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    
    }

    public function removeccfrom_collection_center_stock($id){
      $this->db->query('DELETE FROM collection_center_stock WHERE collection_center_id=:id') ;

      $this->db->bind(':id', $id);
          
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    
    }

    public function removeccfrom_excess($id){
      $this->db->query('DELETE FROM excess WHERE collection_center_id=:id') ;

      $this->db->bind(':id', $id);
          
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    
    }

    public function removeccfrom_expenses($id){
      $this->db->query('DELETE FROM expenses WHERE collection_center_id=:id') ;

      $this->db->bind(':id', $id);
          
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    
    }
//
public function balancesforfarmers($id){
  $this->db->query('SELECT * FROM farmers WHERE collection_center_id = :id AND balance<>:balance');
  // Bind value
  $balance=0.00;
  $this->db->bind(':id', $id);
  $this->db->bind(':balance', $balance);

  $row = $this->db->single();

  // Check row
  if($this->db->rowCount() > 0){
    return true;
  } else {
    return false;
  }
}

    public function removeccfrom_farmers($id){
      $this->db->query('DELETE FROM farmers WHERE collection_center_id=:id') ;

      $this->db->bind(':id', $id);
          
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    
    }

    public function removeccfrom_neccesity($id){
      $this->db->query('DELETE FROM neccesity WHERE collection_center_id=:id') ;

      $this->db->bind(':id', $id);
          
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    
    }

//
    public function incompleteordersofcc($id){
      $this->db->query('SELECT * FROM orders WHERE collection_center_id = :id AND delivery_status=:status');
      // Bind value
      $status="Not Received";
      $this->db->bind(':id', $id);
      $this->db->bind(':status', $status);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    public function removeccfrom_orders($id){
      $this->db->query('DELETE FROM orders WHERE collection_center_id=:id') ;

      $this->db->bind(':id', $id);
          
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    
    }

}

