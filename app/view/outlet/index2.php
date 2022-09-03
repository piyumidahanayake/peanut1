<?php 


$database = new DBController();



$food = new Food();


if(isset($_POST["add"])){
	if(isset($_SESSION["cart"])){
		$item_array_id = array_column($_SESSION["cart"], "food_id");
		if(!in_array($_GET["id"], $item_array_id)){
			$count = count($_SESSION["cart"]);
			$item_array = array(
				'food_id' => $_GET["id"],
				'item_name' => $_POST["item_name"],
				'item_price' => $_POST["item_price"],
				'item_id' => $_POST["item_id"],
				'item_quantity' => $_POST["quantity"]
			);
			$_SESSION["cart"][$count] = $item_array;
			echo '<script>window.location="index2"</script>';
		} else {					
			echo '<script>window.location="index2"</script>';
		}
	} else {
		$item_array = array(
			'food_id' => $_GET["id"],
			'item_name' => $_POST["item_name"],
			'item_price' => $_POST["item_price"],
			'item_id' => $_POST["item_id"],
			'item_quantity' => $_POST["quantity"]
		);
		$_SESSION["cart"][0] = $item_array;
	}
}

if(isset($_GET["action"])){
	if($_GET["action"] == "delete"){
		foreach($_SESSION["cart"] as $keys => $values){
			if($values["food_id"] == $_GET["id"]){
				unset($_SESSION["cart"][$keys]);						
				echo '<script>window.location="index2"</script>';
			}
		}
	}
}

if(isset($_GET["action"])){
	if($_GET["action"] == "empty"){
		foreach($_SESSION["cart"] as $keys => $values){
			unset($_SESSION["cart"]);					
			echo '<script>window.location="index2"</script>';
		}
	}
}



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Make New Order</title>
  <link rel="stylesheet" type = "text/css" href ="<?php echo URLROOT; ?>/css/foods.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
  

  

 

        <style type="text/css">
         
        input[type=submit],input[type=reset]{

          background-color: #4CAF50;
          border: none;
          color: white;
          cursor: pointer;
         }
         input[type=text]{
          background-color: white;
          border: none;
         }
          .topnav {
  overflow: hidden;
  background-color:#006b38ff;

}

.topnav a {
  float: left;
  display: block;
color: white;
  text-align: center;
  padding: 8px 12px;
  text-decoration: none;
  font-size: 22px;
  font-family: bevan;
  width:50%;
  box-sizing: border-box;
  
}
.active{
    background-color: #013220;
}
.topnav input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 84px;
  border: none;
  font-size: 17px;

}
 .new{
         background-color: rgba(255,255,255, 0.5);
         
         border:1px solid white;
         border-radius: 8px;
         border-top:0px;
         width:50%;
         margin-left:auto;
         margin-right:auto;
         margin-bottom: 300px;
         display: inline;
     }
     .content{
  width: (100% - 250px); margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background1.jpg') no-repeat;
      background-position: center;
      background-color: cyan;
      background-size: cover;
      
      transition: 0.5s;
}


       </style>
     </head>
      







<body>

 <?php include_once('header.php'); ?>
<div class="sidebar">
      <div class="profile_info">
        <img src="<?php echo URLROOT; ?>/img/profile1.jpg" class="profile_image" alt="">
        <a href="<?php echo URLROOT; ?>/users/register" > <h4><?php echo $data['p'] ?></h4></a>
      </div>
       <button class="dropdown-btn">
        <a href="home"><i class="fas fa-bars"></i><span>Products</span></a>
    </button>
    
   
    <button class="dropdown-btn" style="background-color: rgba(24, 23, 23, 0.8);">
        <a  href="#"><i class="fas fa-bars"></i><span>Orders</span></a>
    </button>
    <div class="dropdown-container drop-active">
      <a href="index1" style="background-color: rgba(24, 23, 23, 0.8);"><i class="fas fa-bars"><span></i>New Order</span></a>
      <a href="orderhistory"><i class="fas fa-bars"><span></i>Order History</span></a>
      <a href="accsort" ><i class="fas fa-bars"><span></i>Rejected Order</span></a>
      <a href="reportsort"><i class="fas fa-bars"><span></i>Order Report</span></a>
    </div>
        <button class="dropdown-btn " >
            <a href="#"><i class="fas fa-bars"></i><span>Payment</span></a>
        </button>
        
          <div class="dropdown-container ">
            <a href="viewin"><i class="fas fa-bars"><span></i>View Invoice</span></a>
            <a href="pay"><i class="fas fa-bars"><span></i>Pay Online</span></a>
            <a href="payhistry1"><i class="fas fa-bars"><span></i>Payment History</span></a>
           
          </div>
          
        
          
          
        <button class="dropdown-btn" >
          <a href="#"><i class="fas fa-bars"></i><span>Sales</span></a>
      </button>
      
        <div class="dropdown-container">
          <a href="newsale1"><i class="fas fa-bars"><span></i>New Sale</span></a>
          <a href="dailysale1"><i class="fas fa-bars"><span></i>Daily Sale</span></a>
          <a href="weeklysale"><i class="fas fa-bars"><span></i>Periodic Sale</span></a>
          <a href="editrate1"><i class="fas fa-bars"><span></i>Edit Rate</span></a>
          <a href="prediction1"><i class="fas fa-bars"><span></i>Prediction</span></a>
          
        </div>
        <button class="dropdown-btn">
          <a href="pp"><i class="fas fa-bars"></i><span>Financial Report</span></a>
      </button>
     
        <button class="dropdown-btn" >
            <a href="collection"><i class="fas fa-bars"></i><span>Collection Center</span></a>
        </button>
       
    </div>
    <!--sidebar end-->


<div class="content">
      <div class="new" style="background-color:rgba(255,255,255, 0.5)">
            <div class="topnav">
                <a class="active" href="#home">Your Cart</a>
                
                
               
              </div>
<div class="content1" style="background-color:wheat;">
	<div class="container-fluid">		
		<div class='row'>		
		<?php include('top_menu.php'); ?> 
		</div>
		<div class='row'>		
		<?php
		if(!empty($_SESSION["cart"])){
		?>      
			  
			<table class="table table-striped">
			 <thead class="thead-dark">
			<tr>
			<th >Product Name</th>
			<th >Quantity</th>
			<th >Price Details</th>
			<th >Order Total</th>
			
			<th width="5%">Action</th>
			</tr>
			</thead>
			<?php
			$total = 0;
			foreach($_SESSION["cart"] as $keys => $values){
			?>
				<tr>
				<td style="text-align: center;"><?php echo $values["item_name"]; ?></td>
				<td style="text-align: center;"><?php echo $values["item_quantity"] ?></td>
				<td style="text-align: center;">Rs: <?php echo $values["item_price"]; ?>.00</td>
				<td style="text-align: center;">Rs: <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
				<td ><a href="index2?action=delete&id=<?php echo $values["food_id"]; ?>"><input type="image" src="<?php echo URLROOT; ?>/img/remove.jpg" alt="submit" height="20px 5px";></a></td>
				</tr>
				<?php 
				$total = $total + ($values["item_quantity"] * $values["item_price"]);
			}
			?>
			<tr><br>
			<td colspan="3" align="right"><b>Total</b></td>
			<td align="right"><b>Rs: <?php echo number_format($total, 2); ?></b></td>
			<td></td>
			</tr>
			</table>
		
			<a href="index2?action=empty"><button class="btn btn-danger" style="background-color: #013220;color: white;"><span class="glyphicon glyphicon-trash"> Empty Cart</span></button></a>&nbsp;<a href="checkout"><button class="btn btn-success pull-right" style="background-color:#013220;color:white;"><span class="glyphicon glyphicon-share-alt"> Check Out</span></button></a>
			
		<?php
		} elseif(empty($_SESSION["cart"])){
		?>
			
			<h3 style="text-align: center;color: red;">Your cart is empty. </h3>        
			    
		<?php
		}
		?>		
		</div>		   
	</div> 	
</div></div>















      <div class="new">
            <div class="topnav">
                <a class="active" href="#home">Product Gallery</a>
                <table style="float: right;margin-top: -12px;">
               <form action="<?php echo URLROOT; ?>/Outletpages/index_se" method="post">
                <div style="border-width: 10px;position: absolute;">
                <td><input type="text" name="product_id"  value="" placeholder="search by product id" required="/"></td>
                <td><input type="image" src="<?php echo URLROOT; ?>/img/search.png" alt="submit" style="margin-top: 11px;margin-left:-60px; "></td></div>
                </form></table>
                
               
              </div>


<div class="content1" >
	<div class="container-fluid">		
		<div class='row'>		
        <?php include('top_menu.php'); ?> 
		</div>
			<div class='row'>
			<?php 
        $count=0;
      foreach($data['products'] as $products) : ?>
				<div class="col-md-3" style="
    padding: 0px;
    margin:8px;
    text-align: center;
    
    
    width: 200px;
    display: inline-block;
    margin-left: 5px;">
					<div id="gridview" style=" text-align: center;margin-left: 50px;transition: 0.2s">
					<form method="post" 
					action="index2?action=add&id=<?php echo $products->id?>">
						<div class="mypanel" style=" margin: 10px;display: inline-block; position: relative;">
							<img src="<?php echo URLROOT; ?>/img/<?php echo $products->img?>" class="img-responsive" style= "width: 100%; max-width: 200px;height: auto;border: 1px solid #ccp;hover:box-shadow: 0 5px 5px 0 rgba(0, 0, 0, 0.32), 0 0 0 0px rgba(0, 0, 0, 0.16);margin-left:0px;left: 10px;right: 0px;">
							<div class="product-info" style="position: relative;bottom: 4px;left: 0px;right: 0px;padding: 5% .75rem .75rem .75rem;background-color: #006b38ff; background-image: -webkit-linear-gradient(transparent,rgba(0,0,0,0.8));background-image: linear-gradient(transparent,rgba(0,0,0,0.8));background-position-y: -1px;color: #FFF;text-align: center;margin-left: 0px;width: 180px;">
							<h4 class="text-dark" style="font-size: 20px"><?php echo $products->name?></h4>
							<h5 class="text-info"><?php echo $products->type?></h5>
							<h5 class="text-danger">1kg - Rs: <?php echo $products->rate?>/-</h5>
							<h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
							<input type="hidden" name="item_name" value="<?php echo $products->name?>">
							<input type="hidden" name="item_price" value="<?php echo $products->rate?>">
							<input type="hidden" name="item_id" value="<?php echo $products->id?>">
							<input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
						</div></div>
					</form>    
				</div></div>

			<?php 
			$count++;
			if($count==5)
			{
			  echo "</div>";
			  $count=0;
			}

			
			?>
    <?php endforeach; ?>
			</div>
		   
    </div>        
		</div></div>

 <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });

    var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
    </script>


</body>
</html>