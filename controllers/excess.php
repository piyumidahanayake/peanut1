<?php
class Excess extends Controller{
    public function __construct(){
        if(!isLoggedIn()){
          redirect('users/login');
        }
        $this->excessModel = $this->model('Excess');
      }
      
}