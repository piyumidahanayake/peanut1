<?php
require_once "DBController.php";

class Order  extends DBController {	
   
	    
	
	 
	
	function add(){		
		if($this->product_id) {
			$query = $this->conn->prepare("
			INSERT INTO order_description(`product_id`, `ordered_quantity`, `order_date`, `order_id`, `value_before_deliver`)
			VALUES(?,?,?,?,?)");		
			$this->product_id = htmlspecialchars(strip_tags($this->product_id));
			
			$this->quantity = htmlspecialchars(strip_tags($this->ordered_quantity));
			$this->order_date = htmlspecialchars(strip_tags($this->order_date));
			$this->order_id = htmlspecialchars(strip_tags($this->order_id));	
			$this->value_before_delivery = htmlspecialchars(strip_tags($this->value_before_delivery));	
			$query->bind_param("iisii", $this->product_id,  $this->ordered_quantity, $this->order_date, $this->order_id, $this->value_before_delivery);			
			if($query->execute()){
				return true;
			}		
		}
	}
	function make(){		
		if($this->product_id) {
			$query = $this->conn->prepare("
			INSERT INTO orders(`outlet_id`, `collection_center_id`, `order_date`, `order_id`,  `assigned_status`, `delivery_status`)
			VALUES(?,?,?,?,?,?)");		
			$this->outlet_id = htmlspecialchars(strip_tags($this->outlet_id));
			$this->collection_center_id = htmlspecialchars(strip_tags($this->collection_center_id));
			$this->order_date = htmlspecialchars(strip_tags($this->order_date));
			$this->order_id = htmlspecialchars(strip_tags($this->order_id));
			$this->assigned_status = htmlspecialchars(strip_tags($this->assigned_status));
			$this->delivery_status = htmlspecialchars(strip_tags($this->delivery_status));
			$query->bind_param("iisiss", $this->outlet_id, $this->collection_center_id, $this->order_date, $this->order_id, $this->assigned_status, $this->delivery_status);			
			if($query->execute()){
				return true;
			}		
		}
	}


	function pay(){		
		if($this->product_id) {
			$query = $this->conn->prepare("
			INSERT INTO outlet_payment( `order_id`,  `payment_status`, `outlet_id`)
			VALUES(?,?,?)");		
			
			$this->order_id = htmlspecialchars(strip_tags($this->order_id));
			$this->payment_status = htmlspecialchars(strip_tags($this->payment_status));
			$this->outlet_id = htmlspecialchars(strip_tags($this->outlet_id));
			$query->bind_param("isi", $this->order_id, $this->payment_status,$this->outlet_id);			
			if($query->execute()){
				return true;
			}		
		}
	}

	
}
?>