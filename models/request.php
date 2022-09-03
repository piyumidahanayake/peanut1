<?php
class Request{
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    public function addRequest($data,$today){
        $this->db->query('INSERT INTO new_item_requests (requested_by, requested_date,filename, item_name, notes_or_details,type) VALUES(:collection_center, :today, :file_name,:item_name,:notes,:type)');
        // Bind values
        $s=".jpg";
        $this->db->bind(':collection_center', $_SESSION['user_id']);
        $this->db->bind(':today', $today);
        $this->db->bind(':file_name', $data['filename']);
        $this->db->bind(':item_name', $data['productName']);
        $this->db->bind(':notes', $data['description']);
        $this->db->bind(':type',$data['type']);
        //$this->db->bind(':date',$data['date']);
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
    }
    public function getPendingRequests(){
        $this->db->query('SELECT *
        FROM new_item_requests where  new_item_requests.requested_by=:center_id and new_item_requests.status=:status');
       
        $this->db->bind(':center_id', $_SESSION['user_id']);
        $this->db->bind(':status', 'NEW');
        $results = $this->db->resultSet();
  
        return $results;
    }
    public function getExpenseReport(){
      $this->db->query('SELECT *
      FROM collection_center_requests where  collection_center_requests.collection_center_id=:center_id order by request_status');
     
      $this->db->bind(':center_id', $_SESSION['user_id']);
      $results = $this->db->resultSet();

      return $results;
  }
  public function addExpenseReport($data,$today){
    $this->db->query('INSERT INTO collection_center_requests (collection_center_id,year,month, description, amount_requested,date_of_request) VALUES(:collection_center, :year, :month,:description,:total,:date)');
    // Bind values
    $s=".jpg";
    $this->db->bind(':collection_center', $_SESSION['user_id']);
    $this->db->bind(':month', $data['month']);
    $this->db->bind(':year', $data['year']);
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':total', $data['total']);
    $this->db->bind(':date', $today);
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
}

public function deleterequest($request_id){
  $this->db->query('UPDATE new_item_requests SET status = :cancelled WHERE request_id = :id');
  $this->db->bind(':cancelled', 'cancelled');
  $this->db->bind(':id', $request_id);
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }

}

public function changeRequest($request_id){
  $this->db->query('UPDATE collection_center_requests SET request_status = :recived WHERE request_id = :id');
  $this->db->bind(':recived', 'Recived');
  $this->db->bind(':id', $request_id);
  if($this->db->execute()){
    return true;
  } else {
    return false;
  }
}
  public function getUserId(){
    return $_SESSION['user_id'];
  }

  

}

?>