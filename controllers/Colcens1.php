<?php
    class Colcens1 extends Controller {
      public function __construct(){
        //$this->colcen1Model = $this->model('Colcen1');
        $this->colcen2Model = $this->model('Colcen2');
      }



        public function showSelectedCC($id){
          $ccenter = $this->colcen2Model->getSelCCdetails($id);
          $data = [
            'ccenter' => $ccenter
          ];

          $this->view('intermediate operator/ITO Selected CC', $data);
        }
      }
    
    
