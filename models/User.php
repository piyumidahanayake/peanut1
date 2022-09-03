<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data){
      $this->db->query('INSERT INTO user_request (requester_name, contact_number, center_name,email,type,address,status) VALUES(:name, :con_number, :cen_name,:email,:type,:address,:status)');
      // Bind values
      $data0=0;
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':con_number', $data['con_number']);
      $this->db->bind(':cen_name', $data['cen_name']);
      $this->db->bind(':address', $data['location']);
    // $this->db->bind(':district', $data['district']);
      $this->db->bind(':status', $data0);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function setVerification($pass,$data){
      $this->db->query('UPDATE accounts SET verification_code =:pass  WHERE email = :email ');
      // Bind values
      $this->db->bind(':pass', $pass);
      $this->db->bind(':email', $data['email']);
     

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function change_password($data){
      $this->db->query('UPDATE accounts SET password =:pass  WHERE email = :email ');
      // Bind values
      $this->db->bind(':pass', $data['password']);
      $this->db->bind(':email', $data['email']);
     

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // Login User
    public function login($email, $password){
      $this->db->query('SELECT * FROM accounts WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if($password == $hashed_password){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($email,$verification_code){
      $this->db->query('SELECT * FROM accounts WHERE verification_code = :verification_code');
      // Bind value
     
      $this->db->bind(':verification_code', $verification_code);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
    public function findUserByaEmail($email){
      $this->db->query('SELECT * FROM accounts WHERE email = :email');
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
  }