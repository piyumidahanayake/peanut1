<?php
class OutletsX extends Controller{
    public function __construct(){
        $this->outletModel = $this->model('outlet');
    }

    public function showSelectedOutlet($id){
      $sOutlet = $this->outletModel->getSelOutlet($id);
      $data = [
        'sOutlet' => $sOutlet
      ];
      $this->view('collection center/my_selected_outlet', $data);
    }
      
}