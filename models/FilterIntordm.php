<?php
  class FilterIntordm { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }



    public function reportalltime($data){
      $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE excess_neccesity_assignment.delivery_status = "received" AND neccesity.collection_center_id = :ccid ORDER BY neccesity.ordered_date ASC');
      $this->db->bind(':ccid', $data['destination']);
  
      $results = $this->db->resultSet(); 
      
  
      return $results;
    }
  
  
    public function reportalltime1($data){
      $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess_neccesity_assignment.delivery_status = "received" AND excess.collection_center_id = :ccid ORDER BY excess.ordered_date ASC');
      $this->db->bind(':ccid', $data['source']);
  
      $results = $this->db->resultSet(); 
    
  
      return $results;
  }


  public function reporttodate($data){
    $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE neccesity.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND neccesity.collection_center_id = :ccid ORDER BY neccesity.ordered_date ASC');
    $this->db->bind(':ccid', $data['destination']);
    $this->db->bind(':tod', $data['to_date']);

    $results = $this->db->resultSet(); 
    

    return $results;
  }


  public function reporttodate1($data){
    $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND excess.collection_center_id = :ccid ORDER BY excess.ordered_date ASC');
    $this->db->bind(':ccid', $data['source']);
    $this->db->bind(':tod', $data['to_date']);

    $results = $this->db->resultSet(); 
  

    return $results;
}


public function reportfromdate($data){
  $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE neccesity.ordered_date >= :fod AND excess_neccesity_assignment.delivery_status = "received" AND neccesity.collection_center_id = :ccid ORDER BY neccesity.ordered_date ASC');
  $this->db->bind(':ccid', $data['destination']);
  $this->db->bind(':fod', $data['from_date']);

  $results = $this->db->resultSet(); 
  

  return $results;
}


public function reportfromdate1($data){
  $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess.ordered_date >= :fod AND excess_neccesity_assignment.delivery_status = "received" AND excess.collection_center_id = :ccid ORDER BY excess.ordered_date ASC');
  $this->db->bind(':ccid', $data['source']);
  $this->db->bind(':fod', $data['from_date']);

  $results = $this->db->resultSet(); 


  return $results;
}


public function reportfromtodate($data){
  $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE neccesity.ordered_date >= :fod AND neccesity.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND neccesity.collection_center_id = :ccid ORDER BY neccesity.ordered_date ASC');
  $this->db->bind(':ccid', $data['destination']);
  $this->db->bind(':fod', $data['from_date']);
  $this->db->bind(':tod', $data['to_date']);

  $results = $this->db->resultSet(); 
  

  return $results;
}


public function reportfromtodate1($data){
  $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess.ordered_date >= :fod AND excess.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND excess.collection_center_id = :ccid ORDER BY excess.ordered_date ASC');
  $this->db->bind(':ccid', $data['source']);
  $this->db->bind(':fod', $data['from_date']);
  $this->db->bind(':tod', $data['to_date']);

  $results = $this->db->resultSet(); 


  return $results;
}






















  public function reporkalltime($data){
    $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE excess_neccesity_assignment.delivery_status = "received" AND neccesity.collection_center_id = :ccid ORDER BY neccesity.assigned_quantity ASC');
    $this->db->bind(':ccid', $data['destination']);

    $results = $this->db->resultSet(); 
    

    return $results;
  }


  public function reporkalltime1($data){
    $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess_neccesity_assignment.delivery_status = "received" AND excess.collection_center_id = :ccid ORDER BY excess.assigned_quantity ASC');
    $this->db->bind(':ccid', $data['source']);

    $results = $this->db->resultSet(); 
  

    return $results;
}


public function reporktodate($data){
  $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE neccesity.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND neccesity.collection_center_id = :ccid ORDER BY neccesity.assigned_quantity ASC');
  $this->db->bind(':ccid', $data['destination']);
  $this->db->bind(':tod', $data['to_date']);

  $results = $this->db->resultSet(); 
  

  return $results;
}


public function reporktodate1($data){
  $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND excess.collection_center_id = :ccid ORDER BY excess.assigned_quantity ASC');
  $this->db->bind(':ccid', $data['source']);
  $this->db->bind(':tod', $data['to_date']);

  $results = $this->db->resultSet(); 


  return $results;
}


public function reporkfromdate($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE neccesity.ordered_date >= :fod AND excess_neccesity_assignment.delivery_status = "received" AND neccesity.collection_center_id = :ccid ORDER BY neccesity.assigned_quantity ASC');
$this->db->bind(':ccid', $data['destination']);
$this->db->bind(':fod', $data['from_date']);

$results = $this->db->resultSet(); 


return $results;
}


public function reporkfromdate1($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess.ordered_date >= :fod AND excess_neccesity_assignment.delivery_status = "received" AND excess.collection_center_id = :ccid ORDER BY excess.assigned_quantity ASC');
$this->db->bind(':ccid', $data['source']);
$this->db->bind(':fod', $data['from_date']);

$results = $this->db->resultSet(); 


return $results;
}


public function reporkfromtodate($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE neccesity.ordered_date >= :fod AND neccesity.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND neccesity.collection_center_id = :ccid ORDER BY neccesity.assigned_quantity ASC');
$this->db->bind(':ccid', $data['destination']);
$this->db->bind(':fod', $data['from_date']);
$this->db->bind(':tod', $data['to_date']);

$results = $this->db->resultSet(); 


return $results;
}


public function reporkfromtodate1($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess.ordered_date >= :fod AND excess.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND excess.collection_center_id = :ccid ORDER BY excess.assigned_quantity ASC');
$this->db->bind(':ccid', $data['source']);
$this->db->bind(':fod', $data['from_date']);
$this->db->bind(':tod', $data['to_date']);

$results = $this->db->resultSet(); 


return $results;
}
 





























public function repordalltime($data){
  $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE excess_neccesity_assignment.delivery_status = "received" AND  excess_neccesity_assignment.driver_id = :driver AND neccesity.collection_center_id = :ccid ORDER BY neccesity.ordered_date ASC');
  $this->db->bind(':ccid', $data['destination']);
  $this->db->bind(':driver', $data['driver_id']);

  $results = $this->db->resultSet(); 
  

  return $results;
}


public function repordalltime1($data){
  $this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND excess.collection_center_id = :ccid ORDER BY excess.ordered_date ASC');
  $this->db->bind(':ccid', $data['source']);
  $this->db->bind(':driver', $data['driver_id']);

  $results = $this->db->resultSet(); 


  return $results;
}


public function repordtodate($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE neccesity.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND neccesity.collection_center_id = :ccid ORDER BY neccesity.ordered_date ASC');
$this->db->bind(':ccid', $data['destination']);
$this->db->bind(':tod', $data['to_date']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}


public function repordtodate1($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND excess.collection_center_id = :ccid ORDER BY excess.ordered_date ASC');
$this->db->bind(':ccid', $data['source']);
$this->db->bind(':tod', $data['to_date']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}


public function repordfromdate($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE neccesity.ordered_date >= :fod AND excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND neccesity.collection_center_id = :ccid ORDER BY neccesity.ordered_date ASC');
$this->db->bind(':ccid', $data['destination']);
$this->db->bind(':fod', $data['from_date']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}


public function repordfromdate1($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess.ordered_date >= :fod AND excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND excess.collection_center_id = :ccid ORDER BY excess.ordered_date ASC');
$this->db->bind(':ccid', $data['source']);
$this->db->bind(':fod', $data['from_date']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}


public function repordfromtodate($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE neccesity.ordered_date >= :fod AND neccesity.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND neccesity.collection_center_id = :ccid ORDER BY neccesity.ordered_date ASC');
$this->db->bind(':ccid', $data['destination']);
$this->db->bind(':fod', $data['from_date']);
$this->db->bind(':tod', $data['to_date']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}


public function repordfromtodate1($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess.ordered_date >= :fod AND excess.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND excess.collection_center_id = :ccid ORDER BY excess.ordered_date ASC');
$this->db->bind(':ccid', $data['source']);
$this->db->bind(':fod', $data['from_date']);
$this->db->bind(':tod', $data['to_date']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}






















public function reporwalltime($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND neccesity.collection_center_id = :ccid ORDER BY neccesity.assigned_quantity ASC');
$this->db->bind(':ccid', $data['destination']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}


public function reporwalltime1($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND excess.collection_center_id = :ccid ORDER BY excess.assigned_quantity ASC');
$this->db->bind(':ccid', $data['source']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}


public function reporwtodate($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE neccesity.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND neccesity.collection_center_id = :ccid ORDER BY neccesity.assigned_quantity ASC');
$this->db->bind(':ccid', $data['destination']);
$this->db->bind(':tod', $data['to_date']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}


public function reporwtodate1($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND excess.collection_center_id = :ccid ORDER BY excess.assigned_quantity ASC');
$this->db->bind(':ccid', $data['source']);
$this->db->bind(':tod', $data['to_date']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}


public function reporwfromdate($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE neccesity.ordered_date >= :fod AND excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND neccesity.collection_center_id = :ccid ORDER BY neccesity.assigned_quantity ASC');
$this->db->bind(':ccid', $data['destination']);
$this->db->bind(':fod', $data['from_date']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}


public function reporwfromdate1($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess.ordered_date >= :fod AND excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND excess.collection_center_id = :ccid ORDER BY excess.assigned_quantity ASC');
$this->db->bind(':ccid', $data['source']);
$this->db->bind(':fod', $data['from_date']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}


public function reporwfromtodate($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN neccesity ON excess_neccesity_assignment.necessity_id = neccesity.neccesity_id WHERE neccesity.ordered_date >= :fod AND neccesity.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND neccesity.collection_center_id = :ccid ORDER BY neccesity.assigned_quantity ASC');
$this->db->bind(':ccid', $data['destination']);
$this->db->bind(':fod', $data['from_date']);
$this->db->bind(':tod', $data['to_date']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}


public function reporwfromtodate1($data){
$this->db->query('SELECT * FROM excess_neccesity_assignment LEFT JOIN excess ON excess_neccesity_assignment.excess_id = excess.excess_id WHERE excess.ordered_date >= :fod AND excess.ordered_date <= :tod AND excess_neccesity_assignment.delivery_status = "received" AND excess_neccesity_assignment.driver_id = :driver AND excess.collection_center_id = :ccid ORDER BY excess.assigned_quantity ASC');
$this->db->bind(':ccid', $data['source']);
$this->db->bind(':fod', $data['from_date']);
$this->db->bind(':tod', $data['to_date']);
$this->db->bind(':driver', $data['driver_id']);

$results = $this->db->resultSet(); 


return $results;
}
}
