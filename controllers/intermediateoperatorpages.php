<?php
  class intermediateoperatorpages extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      $this->colcen1Model = $this->model('Colcen1');
      $this->colcen2Model = $this->model('Colcen2');
      $this->drivers1Model = $this->model('Drivers1');
      $this->drivers2Model = $this->model('Drivers2');
      $this->interm1Model = $this->model('Interm1');
      $this->notificModel = $this->model('Notific');
    }
    
    public function home(){
      $drivers1 = $this->drivers1Model->getTheDrivers($_SESSION['user_id']);
      $drivers2 = $this->drivers2Model->getTheDrivers($_SESSION['user_id']);
      $notificount = $this->notificModel->CountAlert($_SESSION['user_id']);
      $data = [
        'drivers1' => $drivers1,
        'drivers2' => $drivers2,
        'notificount' => $notificount
      ];
     
      $this->view('intermediate operator/home', $data);
    }


    public function ccdetails(){
      $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
      //$colcen2 = $this->colcen2Model->getSelectedCCdetails($_SESSION['user_id']);
      $data = [
        'colcen1' => $colcen1//,
        //'colcen2' => $colcen2
      ];
      

   
      $this->view('intermediate operator/ITO CC Details', $data);
    }
  



    public function driverdetails(){
      $drivers1 = $this->drivers1Model->getTheDrivers($_SESSION['user_id']);
      $drivers2 = $this->drivers2Model->getTheDrivers($_SESSION['user_id']);
      $data = [
        'drivers1' => $drivers1,
        'drivers2' => $drivers2
      ];
 
      $this->view('intermediate operator/ITO Driver Details', $data);
    }

  

    public function excessnecessity(){
      $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
    
      $necs = $this->interm1Model->showNecessity($_SESSION['user_id']);
      $exes = $this->interm1Model->showExcess($_SESSION['user_id']);

      $data = [
        'necs' => $necs,
        'exes' => $exes,
        'colcen1' => $colcen1
      ];

  
      $this->view('intermediate operator/ITO Excess Necessity', $data);
    }

    public function iorder0(){
      $necessitycc1 = $this->interm1Model->getTheCCs($_SESSION['user_id']);
      $data = [
        'necessitycc1' => $necessitycc1
      ];

      $this->view('intermediate operator/ITO Intermediate Orders 0', $data);
    }


    public function iorder1(){
      $colcen1 = $this->colcen1Model->getTheCCs($_SESSION['user_id']);
      $data = [
        'colcen1' => $colcen1
      ];

      $this->view('intermediate operator/ITO Intermediate Orders 1', $data);
    }


    public function iorder2(){
      $drivers1 = $this->drivers1Model->getTheDrivers($_SESSION['user_id']);
      $data = [
        'drivers1' => $drivers1
      ];

      $this->view('intermediate operator/ITO Intermediate Orders 2', $data);
    }



    public function iorder3(){
     $data = [
  
      ];

      $this->view('intermediate operator/ITO Intermediate Orders 3', $data);
    }



    public function newdrivers(){
      $data = [
        'name_err' =>'',
        'colcen_err' => '',
        'address_err' => '',
        'contact_number_err' => '',
        'email_err' => '',
        'initial_username_err' => '',
        'initial_password_err' => ''
      ];

      $this->view('intermediate operator/ITO New Driver Requests', $data);
    }
  }


