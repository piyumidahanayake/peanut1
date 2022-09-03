<?php
  class Fi_report { 

    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function reportalltime($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid ORDER BY orders.order_id ASC, orders.order_date ASC');
      $this->db->bind(':ccid', $_SESSION['user_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function salealltime($data){
      $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid ORDER BY  outlet_sale.selling_date ASC');
      $this->db->bind(':ccid', $_SESSION['user_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }



    public function reporttodate($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid AND orders.order_date <= :to ORDER BY orders.order_id ASC, orders.order_date ASC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':to', $data['to_date']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

     public function saletodate($data){
      $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid AND outlet_sale.selling_date <= :to ORDER BY  outlet_sale.selling_date ASC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':to', $data['to_date']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }



    public function reportfromdate($data){
        $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid AND orders.order_date >= :from ORDER BY orders.order_id ASC, orders.order_date ASC');
        $this->db->bind(':ccid', $_SESSION['user_id']);
        $this->db->bind(':from', $data['from_date']);

        $results = $this->db->resultSet(); 
        
  
        return $results;
      }


      public function salefromdate($data){
        $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  orders.outlet_id = :ccid AND outlet_sale.selling_date >= :from ORDER BY  outlet_sale.selling_date ASC');
        $this->db->bind(':ccid', $_SESSION['user_id']);
        $this->db->bind(':from', $data['from_date']);

        $results = $this->db->resultSet(); 
        
  
        return $results;
      }

    
    public function reportfromtodate($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid AND orders.order_date >= :from AND orders.order_date <= :to  ORDER BY orders.order_id ASC, orders.order_date ASC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $results = $this->db->resultSet(); 
      

      return $results;
    }


    public function salefromtodate($data){
      $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid AND outlet_sale.selling_date >= :from AND outlet_sale.selling_date <= :to  ORDER BY  outlet_sale.selling_date ASC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $results = $this->db->resultSet(); 
      

      return $results;
    }
    



    public function reporvalltime($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid ORDER BY orders.order_id ASC, order_description.ordered_quantity DESC');
      $this->db->bind(':ccid', $_SESSION['user_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }


    public function salevalltime($data){
      $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid ORDER BY outlet_sale.item_id ASC, outlet_sale.quantity DESC');
      $this->db->bind(':ccid', $_SESSION['user_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }




    public function reporvtodate($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid AND orders.order_date <= :to ORDER BY orders.order_id ASC, order_description.ordered_quantity DESC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':to', $data['to_date']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function salevtodate($data){
      $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid AND outlet_sale.selling_date <= :to ORDER BY outlet_sale.item_id ASC, outlet_sale.quantity DESC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':to', $data['to_date']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function reporvfromdate($data){
        $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid AND orders.order_date >= :from ORDER BY orders.order_id ASC, order_description.ordered_quantity DESC');
        $this->db->bind(':ccid', $_SESSION['user_id']);
        $this->db->bind(':from', $data['from_date']);

        $results = $this->db->resultSet(); 
        
  
        return $results;
      }

      public function salevfromdate($data){
        $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.product_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid AND outlet_sale.selling_date >= :from ORDER BY outlet_sale.item_id ASC, outlet_sale.quantity DESC');
        $this->db->bind(':ccid', $_SESSION['user_id']);
        $this->db->bind(':from', $data['from_date']);

        $results = $this->db->resultSet(); 
        
  
        return $results;
      }
    
    public function reporvfromtodate($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid AND orders.order_date >= :from AND orders.order_date <= :to  ORDER BY orders.order_id ASC, order_description.ordered_quantity DESC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function salevfromtodate($data){
      $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid AND outlet_sale.selling_date >= :from AND outlet_sale.selling_date <= :to  ORDER BY outlet_sale.item_id ASC, outlet_sale.quantity DESC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $results = $this->db->resultSet(); 
      

      return $results;
    }










    public function repordalltime($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id= :outlet ORDER BY orders.order_id ASC, orders.order_date ASC');
      $this->db->bind(':outlet', $data['outlet_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function repordtodate($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id= :outlet AND orders.order_date <= :to ORDER BY orders.order_id ASC, orders.order_date ASC');
      $this->db->bind(':outlet', $data['outlet_id']);
      $this->db->bind(':to', $data['to_date']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function repordfromdate($data){
        $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id= :outlet AND orders.order_date >= :from ORDER BY orders.order_id ASC, orders.order_date ASC');
        $this->db->bind(':outlet', $data['outlet_id']);
        $this->db->bind(':from', $data['from_date']);

        $results = $this->db->resultSet(); 
        
  
        return $results;
      }

    
    public function repordfromtodate($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id= :outlet AND orders.order_date >= :from AND orders.order_date <= :to  ORDER BY orders.order_id ASC, orders.order_date ASC');
      $this->db->bind(':outlet', $data['outlet_id']);
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $results = $this->db->resultSet(); 
      

      return $results;
    }


    



    public function reporlalltime($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :outlet ORDER BY orders.order_id ASC, order_description.ordered_quantity DESC');
      $this->db->bind(':outlet', $data['outlet_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function reporltodate($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :outlet AND orders.order_date <= :to ORDER BY orders.order_id ASC, order_description.ordered_quantity DESC');
      $this->db->bind(':outlet', $data['outlet_id']);
      $this->db->bind(':to', $data['to_date']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function reporlfromdate($data){
        $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.collection_center_id = :outlet AND orders.order_date >= :from ORDER BY orders.order_id ASC, order_description.ordered_quantity DESC');
        $this->db->bind(':outlet', $data['outlet_id']);
        $this->db->bind(':from', $data['from_date']);

        $results = $this->db->resultSet(); 
        
  
        return $results;
      }

    
    public function reporlfromtodate($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.collection_center_id = :outlet AND orders.order_date >= :from AND orders.order_date <= :to  ORDER BY orders.order_id ASC, order_description.ordered_quantity DESC');
      $this->db->bind(':outlet', $data['outlet_id']);
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $results = $this->db->resultSet(); 
      

      return $results;
    }
   

    public function getSelOrdOutlet($oid) {
      $this->db->query('SELECT * FROM outlets WHERE outlets.outlet_id = :ouid');
      $this->db->bind(':ouid', $oid);

      $row = $this->db->single();
      //print_r($row);
      return $row;



    }



















    public function reportalltime1($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid ORDER BY orders.order_date ASC');
      $this->db->bind(':ccid',$_SESSION['user_id'] );

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function salealltime1($data){
      $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid ORDER BY outlet_sale.selling_date ASC');
      $this->db->bind(':ccid',$_SESSION['user_id'] );

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function reporttodate1($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid AND orders.order_date <= :to ORDER BY orders.order_date ASC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':to', $data['to_date']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function saletodate1($data){
      $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid AND outlet_sale.selling_date <= :to ORDER BY outlet_sale.selling_date ASC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':to', $data['to_date']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function reportfromdate1($data){
        $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid AND orders.order_date >= :from ORDER BY orders.order_date ASC');
        $this->db->bind(':ccid', $_SESSION['user_id']);
        $this->db->bind(':from', $data['from_date']);

        $results = $this->db->resultSet(); 
        
  
        return $results;
      }

      public function salefromdate1($data){
        $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid AND outlet_sale.selling_date >= :from ORDER BY outlet_sale.selling_date ASC');
        $this->db->bind(':ccid', $_SESSION['user_id']);
        $this->db->bind(':from', $data['from_date']);

        $results = $this->db->resultSet(); 
        
  
        return $results;
      }

    
    public function reportfromtodate1($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid AND orders.order_date >= :from AND orders.order_date <= :to  ORDER BY orders.order_date ASC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $results = $this->db->resultSet(); 
      

      return $results;
    }


    public function salefromtodate1($data){
      $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid AND outlet_sale.selling_date >= :from AND outlet_sale.selling_date <= :to  ORDER BY outlet_sale.selling_date ASC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $results = $this->db->resultSet(); 
      

      return $results;
    }
    



    public function reporvalltime1($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid ORDER BY order_description.value_after_delivery DESC');
      $this->db->bind(':ccid', $_SESSION['user_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }


    public function salevalltime1($data){
      $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid ORDER BY outlet_sale.money_received DESC');
      $this->db->bind(':ccid', $_SESSION['user_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function reporvtodate1($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid AND orders.order_date <= :to ORDER BY order_description.value_after_delivery DESC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':to', $data['to_date']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function salevtodate1($data){
      $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid AND outlet_sale.selling_date <= :to ORDER BY outlet_sale.money_received DESC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':to', $data['to_date']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }


    public function reporvfromdate1($data){
        $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid AND orders.order_date >= :from ORDER BY order_description.value_after_delivery DESC');
        $this->db->bind(':ccid', $_SESSION['user_id']);
        $this->db->bind(':from', $data['from_date']);

        $results = $this->db->resultSet(); 
        
  
        return $results;
      }


      public function salevfromdate1($data){
        $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid AND outlet_sale.selling_date >= :from ORDER BY outlet_sale.money_received DESC');
        $this->db->bind(':ccid', $_SESSION['user_id']);
        $this->db->bind(':from', $data['from_date']);

        $results = $this->db->resultSet(); 
        
  
        return $results;
      }



    
    public function reporvfromtodate1($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :ccid AND orders.order_date >= :from AND orders.order_date <= :to  ORDER BY order_description.value_after_delivery DESC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function salevfromtodate1($data){
      $this->db->query('SELECT * FROM outlet_sale LEFT JOIN products ON outlet_sale.item_id = products.product_id WHERE  outlet_sale.outlet_id = :ccid AND outlet_sale.selling_date >= :from AND outlet_sale.selling_date <= :to  ORDER BY outlet_sale.money_received DESC');
      $this->db->bind(':ccid', $_SESSION['user_id']);
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $results = $this->db->resultSet(); 
      

      return $results;
    }










    public function repordalltime1($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id= :outlet ORDER BY orders.order_date ASC');
      $this->db->bind(':outlet', $data['outlet_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function repordtodate1($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id= :outlet AND orders.order_date <= :to ORDER BY orders.order_date ASC');
      $this->db->bind(':outlet', $data['outlet_id']);
      $this->db->bind(':to', $data['to_date']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function repordfromdate1($data){
        $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id= :outlet AND orders.order_date >= :from ORDER BY orders.order_date ASC');
        $this->db->bind(':outlet', $data['outlet_id']);
        $this->db->bind(':from', $data['from_date']);

        $results = $this->db->resultSet(); 
        
  
        return $results;
      }

    
    public function repordfromtodate1($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id= :outlet AND orders.order_date >= :from AND orders.order_date <= :to  ORDER BY orders.order_date ASC');
      $this->db->bind(':outlet', $data['outlet_id']);
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $results = $this->db->resultSet(); 
      

      return $results;
    }


    



    public function reporlalltime1($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :outlet ORDER BY order_description.value_after_delivery DESC');
      $this->db->bind(':outlet', $data['outlet_id']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function reporltodate1($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.outlet_id = :outlet AND orders.order_date <= :to ORDER BY order_description.value_after_delivery DESC');
      $this->db->bind(':outlet', $data['outlet_id']);
      $this->db->bind(':to', $data['to_date']);

      $results = $this->db->resultSet(); 
      

      return $results;
    }

    public function reporlfromdate1($data){
        $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.collection_center_id = :outlet AND orders.order_date >= :from ORDER BY order_description.value_after_delivery DESC');
        $this->db->bind(':outlet', $data['outlet_id']);
        $this->db->bind(':from', $data['from_date']);

        $results = $this->db->resultSet(); 
        
  
        return $results;
      }

    
    public function reporlfromtodate1($data){
      $this->db->query('SELECT * FROM orders LEFT JOIN order_description ON orders.order_id = order_description.order_id WHERE orders.delivery_status= "Received" AND orders.collection_center_id = :outlet AND orders.order_date >= :from AND orders.order_date <= :to  ORDER BY order_description.value_after_delivery DESC');
      $this->db->bind(':outlet', $data['outlet_id']);
      $this->db->bind(':from', $data['from_date']);
      $this->db->bind(':to', $data['to_date']);
      $results = $this->db->resultSet(); 
      

      return $results;
    }
  }
