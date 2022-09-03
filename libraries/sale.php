<?php
require_once "DBController.php";

class sale  extends DBController {	
   
	    
	
	 
	
	

	function addsale(){		
		if($this->item_id) {
			$query = $this->conn->prepare("
			INSERT INTO outlet_sale( `outlet_id`, `item_id`, `quantity`, `money_received`, `selling_date` )
			VALUES(?,?,?,?,?)");		
			
			$this->outlet_id = htmlspecialchars(strip_tags($this->outlet_id));
			$this->item_id = htmlspecialchars(strip_tags($this->item_id));
			$this->quantity = htmlspecialchars(strip_tags($this->quantity));
			$this->money_received = htmlspecialchars(strip_tags($this->money_received));
			$this->selling_date = htmlspecialchars(strip_tags($this->selling_date));
			$query->bind_param("iiiis", $this->outlet_id,$this->item_id,$this->quantity,$this->money_received,$this->selling_date);			
			if($query->execute()){
				return true;
			}		
		}
	}

	function reducestock(){		
		if($this->item_id) {
			$stmt = $this->conn->prepare("
			UPDATE outlet_stock SET  amount= amount- $this->quantity where outlet_id = $this->outlet_id and product_id = $this->item_id");		
			
			$this->outlet_id = htmlspecialchars(strip_tags($this->outlet_id));
			$this->item_id = htmlspecialchars(strip_tags($this->item_id));
			$this->quantity = htmlspecialchars(strip_tags($this->quantity));
			
						
			if($stmt->execute()){
				return true;
			}		
		}
	}


function updatestock(){		
		if($this->item_id) {
			$stmt = $this->conn->prepare("
			UPDATE order_description SET  rejected_quantity= assigned_quantity- $this->quantity where outlet_id = $this->outlet_id and order_id = $this->order_id and product_id = $this->item_id");		
			
			$this->outlet_id = htmlspecialchars(strip_tags($this->outlet_id));
			$this->item_id = htmlspecialchars(strip_tags($this->item_id));
			$this->quantity = htmlspecialchars(strip_tags($this->quantity));
			$this->order_id = htmlspecialchars(strip_tags($this->order_id));
						
			if($stmt->execute()){
				return true;
			}		
		}
	}






	
}
?>