<?php
  class driver {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO drivers (name, age, address, contact_number, email, init_username, init_password) VALUES(:name, :age, :address, :con_number, :email, :init_username, :init_password)');
      
      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':age', $data['age']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':con_number', $data['con_number']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':init_username', $data['init_username']);
      $this->db->bind(':init_password', $data['init_password']);

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

      $this->db->bind(':request_id', $data['driver']-> request_id);

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

      $this->db->bind(':id', $data['driver']-> request_id);
      $this->db->bind(':user_name', $data['driver']-> center_name);
      $this->db->bind(':email', $data['driver']-> email);
      $this->db->bind(':password', $data['password'] = $data['driver']-> email);
      //$this->db->bind(':password', $data['password'] = password_hash($data['driver']-> email, PASSWORD_DEFAULT));
      $this->db->bind(':type', '3');

      // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
      
    }


    // Regsiter user
    public function addd($data){
      $this->db->query('INSERT INTO drivers (driver_id, name, address, contact_number, email, initial_username, initial_password) VALUES(:id, :name, :address, :con_number, :email, :init_username, :init_password)');
      //$this->db->query('INSERT INTO accounts (user_name, email, password, type) VALUES(:name,  :email,  :password , 2)');
      // Bind values

      $this->db->bind(':id', $data['driver']-> request_id);
      $this->db->bind(':name', $data['driver']-> center_name);
      $this->db->bind(':address', $data['driver']-> address);
      $this->db->bind(':con_number', $data['driver']-> Contact_Number);
      $this->db->bind(':email', $data['driver']-> email);
      $this->db->bind(':init_username', $data['driver']-> center_name);
      $this->db->bind(':init_password',  $data['password'] = password_hash($data['driver']-> email, PASSWORD_DEFAULT));

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }



    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM drivers WHERE email = :email');
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

    //driver registration request list
    public function getdriverrequest(){
      $this->db->query('SELECT requester_name, request_id FROM user_request WHERE type= :type AND status= :status ');
      
      //bind value
      $this->db->bind(':type','driver');
      $this->db->bind(':status','0');

      $results = $this->db->resultSet();

      if($this->db->rowCount() > 0){
        return $results;
      }else{
        return 'no requests';
      }

      return $results;
    }

    // public function getdriverById($id){
    //   $this->db->query('SELECT * FROM drivers WHERE id = :id');
    //   $this->db->bind(':id',$id);

    //   $row = $this->db->single();

    //   return $row;
    // }

    public function getdriverByRequestId($request_id){
      $this->db->query('SELECT * FROM user_request WHERE request_id = :request_id');
      $this->db->bind(':request_id',$request_id);

      $row = $this->db->single();

      return $row;
    }

    //
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

    // Find requested driver collection center
    public function findcc($ccname){
      $this->db->query('SELECT collection_center_id FROM collection_center WHERE  collection_center_name= :ccname');
      // Bind value
      $this->db->bind(':ccname', $ccname);

      $row = $this->db->single();

      return $row;
    }

  }