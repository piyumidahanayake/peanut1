
<?php 


$database = new DBController();



$sale = new sale();



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

          background-color:  #006b38ff;
          border: none;
          color: white;
          cursor: pointer;
          height: 50px;
          width: 140px;
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
  width: 90%; margin-top: 60px;padding: 20px;margin-left: 110px;background: url('<?php echo URLROOT; ?>/img/background1.jpg') no-repeat;
      background-position: center;
      background-color: cyan;
      background-size: cover;
      height: 900px;
      transition: 0.5s;
}

       </style>
      </head>
      










<body>

 <?php include_once('header.php'); ?>
 <div class="sidebar">
      <div class="profile_info">
        <img src="<?php echo URLROOT; ?>/img/profile1.jpg" class="profile_image" alt="">
        <a href="<?php echo URLROOT; ?>/users/register" > <h4 style="color: yellowgreen;"><?php echo $data['p'] ?></h4></a>
      </div>
      <button class="dropdown-btn">
        <a href="home"><i class="fas fa-bars"></i><span>Products</span></a>
    </button>
    
     <button class="dropdown-btn" >
        <a  href="#"><i class="fas fa-bars"></i><span>Orders</span></a>
    </button>
    <div class="dropdown-container drop-active">
      <a href="index2"><i class="fas fa-bars"><span></i>New Order</span></a>
      <a href="orderhistory"><i class="fas fa-bars"><span></i>Order History</span></a>
      <a href="accsort"><i class="fas fa-bars"><span></i>Rejected Order</span></a>
      <a href="reportsort"><i class="fas fa-bars"><span></i>Order Report</span></a>
    </div>
        <button class="dropdown-btn ">
            <a href="#"><i class="fas fa-bars"></i><span>Payment</span></a>
        </button>
        
          <div class="dropdown-container ">
            <a href="viewin"><i class="fas fa-bars"><span></i>View Invoice</span></a>
            <a href="pay"><i class="fas fa-bars"><span></i>Pay Online</span></a>
            <a href="payhistry1"><i class="fas fa-bars"><span></i>Payment History</span></a>
           
          </div>
         
        
          
          
        <button class="dropdown-btn" style="background-color: rgba(24, 23, 23, 0.8);">
          <a href="#"><i class="fas fa-bars"></i><span>Sales</span></a>
      </button>
      
        <div class="dropdown-container drop-active" style="display:block;">
          <a href="newsale1" style="background-color: rgba(24, 23, 23, 0.8);"><i class="fas fa-bars"><span></i>New Sale</span></a>
          <a href="dailysale1"><i class="fas fa-bars"><span></i>Daily Sale</span></a>
          <a href="weeklysale"><i class="fas fa-bars"><span></i>Periodic Sale</span></a>
          <a href="editrate1"><i class="fas fa-bars"><span></i>Edit Rate</span></a>
          <a href="prediction1"><i class="fas fa-bars"><span></i>Prediction</span></a>
          
        </div>
        <button class="dropdown-btn">
          <a href="pp"><i class="fas fa-bars"></i><span>Financial Report</span></a>
      </button>
     
         <button class="dropdown-btn" >
            <a href="collection.html"><i class="fas fa-bars"></i><span>Collection Center</span></a>
        </button>
       
    </div>
    <!--sidebar end-->




 
<div class="content" >
  <div class="new">
  <div class="container-fluid"> 
    <div class='row'>
     <?php if(!empty($_GET['sale'])) {     
        $total = 0;
        $selling_date = date('Y-m-d');
        $outlet_id=$_SESSION['user_id'];
       
       
        if(isset($_SESSION["cart"])) {
          foreach($_SESSION["cart"] as $keys => $values){         
             foreach($data['check'] as $check) :
             if($values["item_id"]==$check->id){
            $sale->item_id = $values["item_id"];
            $sale->outlet_id=$outlet_id;
           $sale->quantity = $values["item_quantity"];
           $sale->money_received = $values["item_quantity"]*$check->rate;
           $sale->selling_date=$selling_date;
            
            $sale->addsale();
            $sale->reducestock();
          }
           endforeach; 
          }
          
          unset($_SESSION["cart"]);
        }       
      ?>
        
          
            <h1 class="text-center" style="text-align:center;color: #013220;margin-top: 10px;"> New Sale added Successfully.</h1>
          
        
        <br>
        
        
       
        
        
      
        <h3 class="text-center" style="text-align: center;">Add <a href="newsale1">New Sale!</a></h3>
      <?php } else { ?>
        <h3 class="text-center">Add <a href="newsale1">New Sale!</a></h3>
      <?php } ?>  
      
    </div>    
    </div>  </div>


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
