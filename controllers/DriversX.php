<?php
    class DriversX extends Controller {
      public function __construct(){
        
        $this->driverXModel = $this->model('DriverX');
      }



        public function showSelectedDriver($id){
          $sdriver = $this->driverXModel->getSelDriver($id);
          $data = [
            'sdriver' => $sdriver
          ];

          $this->view('intermediate operator/ITO Selected Driver', $data);
        }
      }
    
    
