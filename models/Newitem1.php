<?php
  class Newitem1 { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }
      /*get all new item requests; so no id needed*//*$id*/
    public function getNewItems(){
      $this->db->query('SELECT new_item_requests.request_id, new_item_requests.requested_by, new_item_requests.item_name, new_item_requests.notes_or_details FROM new_item_requests WHERE new_item_requests.status = "New"');
      //$this->db->bind(':id', $id);
      /*No need to bind?*/ 
      

      $results = $this->db->resultSet(); 
      //resultSet() is a function in Database.php to get results for the values (query and bindings) of Current object's db variable.

      return $results;
    }
    public function deleteTheRequest($data){
 
      $this->db->query('DELETE FROM new_item_requests WHERE request_id=:request_id ');
     //Bind values
      $this->db->bind(':request_id', $data['request_id']);
      /*$this->db->bind(':mbuy_rate', $data['maximum_buying_rate']);
      $this->db->bind(':sell_rate', $data['selling_rate']);*/

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    public function findproductByid($product_id){
      $this->db->query('SELECT * FROM products WHERE product_id = :product_id');
      // Bind value
      $this->db->bind(':product_id', $product_id);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
  }
