<?php 



$database = new DBController();






?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Check Orders</title>
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
  padding: 8px 16px;
  text-decoration: none;
  font-size: 25px;
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
          background-color: rgba(255,255,255, 0.4);
         
         border:1px solid white;
         border-top:0px;
         width:60%;
         margin-left:auto;
         margin-right:auto;
         margin-top: 100px;
         
         border-radius:10px;
     }
    
     .content{
  width: (100% - 250px); margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background1.jpg') no-repeat;
      background-position: center;
      background-color: cyan;
      background-size: cover;
      height:800px;
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
  <div class="new">
	<div class="container-fluid">		
		
		<div class='row'>		
        <?php include('top_menu.php'); ?> 
		</div>
		<?php
		$orderTotal = 0;
		$c=0;
		foreach($_SESSION["cart"] as $keys => $values){
			$total = ($values["item_quantity"] * $values["item_price"]);
			$orderTotal = $orderTotal + $total;
			$c=$c+1;
		}
		?>
		<div class='row'>
			<div class="col-md-6">
						
			</div>
			<?php 
			$randNumber1 = rand(100,999); 
			$randNumber2 = rand(100,999); 
			$randNumber3 = rand(100,999);
			$orderNumber = $randNumber1.$randNumber2.$randNumber3;
			?>
			<div class="col-md-6">
<h3 style="text-align:center;font-size: 24px;">Order Summery</h3>
        <p style="text-align:center;"><strong>Total Items</strong>:<?php echo $c; ?></p>
				
				
        <p style="text-align:center;"><strong>Order Total</strong>: Rs:<?php echo $orderTotal; ?>.00</p>
        <form>
        <select name="driver_id" style="background: white; color: black; font-weight: bold;">
        <option value="">Assign An Available Driver</option>
        <?php foreach($data['drivers1'] as $drivers1) : ?>
        <option value="<?php echo $drivers1->driver_id?>"><?php echo $drivers1->dr_name?></option>
        <?php endforeach; ?> 
        </select>
        </form>
        <div style="display:inline;">
       <p style="text-align:left; margin-left: 10px;"><a href="index2"><button class="btn btn-warning" style="background-color:#006b38ff;height:40px;color: white;border-radius: 8px;">Back To Order</button></a><var style="text-align: right;margin-left: 500px;">
				<a href="process_order1?order=<?php echo $orderNumber;?>"><button class="btn btn-warning" style="background-color:#006b38ff;height:40px;color: white;border-radius: 8px;">Place Order</button></a></p></var></div>
			</div>
		</div>
		   
    </div> </div>       

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
    
		
