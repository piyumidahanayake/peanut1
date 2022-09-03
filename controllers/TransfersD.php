<?php
    class TransfersD extends Controller {
      public function __construct(){
        //$this->colcen1Model = $this->model('Colcen1');
        $this->transferdModel = $this->model('TransferD');
      }



        public function showDescrp($id){
          $desctran = $this->transferdModel->getSelTran1($id);
          $lasttran = $this->transferdModel->getSelTran2($id);
          $data = [
            'desctran' => $desctran,
            'lasttran' => $lasttran
          ];

          $this->view('financial operator/FO Selected Transfer', $data);
        }
      }
    
    
