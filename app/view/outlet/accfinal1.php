<?php 


$database = new DBController();



$sale = new sale();



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accept Order Details</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/accfinal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <style>
   
     .new{
        background-color: rgba(255,255,255, 0.1);
         
         border:1px solid #006b38ff;
         border-top:0px;
         width:70%;
         margin-left:auto;
         margin-right:auto;
         margin-bottom: 300px;
         border-radius:10px;
         
     }
     .topnav {
  overflow: hidden;
  background-color:#006b38ff;
  border-radius: 10px;

}

.topnav a {
  float: left;
  display: block;
color: white;
  text-align: center;
  padding: 6px 16px;
  text-decoration: none;
  font-size: 18px;
  font-family: bevan;
  width:100%;
  box-sizing: border-box;
  
}
.active{
    background-color: #013220;
}
.topnav a:hover{
  background-color: #013220 ;
}


.content{
  width: (100% - 250px); margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background1.jpg') no-repeat;
      background-position: center;
      background-color: cyan;
      background-size: cover;
      
      transition: 0.5s;
}
.topnav input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;
}
    
    </style>
  </head>
  <body>

    <header>
       
        <div class="left_area">
          <h3>Agro <span>Master</span><span style="margin-left:22%;font-family: z;font-weight: 800 ;"><?php echo $data['p'] ?></span></h3>
        </div>
        <div class="right_area">
          <a href="<?php echo URLROOT; ?>/users/logout" class="logout_btn">Logout</a>
        </div>
      </header>
    <div class="sidebar">
      <div class="profile_info">
        <img src="<?php echo URLROOT; ?>/img/profile1.jpg" class="profile_image" alt="">
        <a href="<?php echo URLROOT; ?>/users/register" > <h4 style="color: yellowgreen;">Hettipola Supermarket</h4></a>
      </div>
      <button class="dropdown-btn">
        <a href="home"><i class="fas fa-bars"></i><span>Products</span></a>
    </button>
    
    <button class="dropdown-btn" style="background-color: rgba(24, 23, 23, 0.8);">
        <a  href="#"><i class="fas fa-bars"></i><span>Orders</span></a>
    </button>
    <div class="dropdown-container drop-active" >
      <a href="index2" ><i class="fas fa-bars" ><span></i>New Order</span></a>
      <a href="orderhistory"><i class="fas fa-bars"><span></i>Order History</span></a>
      <a href="accsort" style="background-color: rgba(24, 23, 23, 0.8);"><i class="fas fa-bars"><span></i>Rejected Order</span></a>
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
          
        
          
          
        <button class="dropdown-btn">
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
        <div class="topnav">

<?php if(!empty($_GET['sale'])) {     
        $total = 0;
        $delivery_date = date('Y-m-d');
        $outlet_id=2;
       $delivery_status = "Received";
       
        if(isset($_SESSION["c"])) {
          foreach($_SESSION["c"] as $keys => $values){         
            
            $sale->item_id = $values["item_id"];
            $sale->outlet_id=$outlet_id;
           $sale->quantity = $values["item_quantity1"];
           $sale->delivery_date=$delivery_date;
           $sale->delivery_status=$delivery_status;
            $sale->order_id = $values["order_id"];
            
            $sale->updatestock();
            
          }
          
          unset($_SESSION["c"]);
        }       
      ?>
        
           <a class="active" href="#home">Accepted Order Items<var style="margin-left: 40px;">Invoice No: 42011</var></a>
            <a  href="#home">Date:</a>
            
      <?php } else { ?>
        <h3 class="text-center">Add <a href="newsale1">New Sale!</a></h3>
      <?php } ?>  



            
           
          </div>
          <div class="wrapper">
            <div class="product-info back1">
             <div class="product-text">
                <h1>Order From</h1>
                <h2>Chillaw Collection Center</h2>
                <p>Ordered date       - 2021/10/12<br> Delivered date - 2021/10/15<br>  Total amount(b.d) - RS.790.00<br> Total amount(A.d) - RS.6900.00 </p>
              </div>
              <div class="product-price-btn">
                
                
              </div>
            </div>
            <div class="product-info">
              <div class="product-text">
                <h1>Product Rejection</h1>
                <h2></h2>
                <p>Carrot Rejected 26kg from 67kg<br> Beans Rejected 20kg from 67kg<br>Cabbage Rejected 26kg from 67kg</p>
              </div>
             
            </div>
          </div>
  
        </div>
    </div>

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