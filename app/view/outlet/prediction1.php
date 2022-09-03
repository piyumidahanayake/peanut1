<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediction of all products</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pre.css">
    <script src="<?php echo URLROOT; ?>/js/edit.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <style>
   
     .new{
        background-color: rgba(255,255,255, 0.1);
         
         border:1px solid #006b38ff;
         border-top:0px
     }
     .topnav {
  overflow: hidden;
  background-color:#006b38ff;

}

.topnav a {
  float: left;
  display: block;
color: white;
  text-align: left;
  padding: 8px 16px;
  text-decoration: none;
  font-size: 25px;
  font-family: bevan;
  width:70%;
  box-sizing: border-box;
  
}
.active{
    background-color: #013220;
}



.topnav input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;
}
  .content{
  width: (100% - 250px); margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background1.jpg') no-repeat;
      background-position: center;
      background-color: cyan;
      background-size: cover;
      
      transition: 0.5s;
}  
#customers tr{
  background: transparent;

}
#customers td{
  font-size: 18px
}

input[type=text]{
      background: lightgreen;
      max-height: 15px;
      border-style: groove;
      border-radius: 10px;
      border-width: 12px;
      margin-top: -5px;
    }
    #searchterm{
  background-image:url(<?php echo URLROOT; ?>/img/search.png); 
  background-position: 10px 8px;
  background-repeat: no-repeat;
  
  font-size: 14px;
  padding: 14px 10px 5px 40px;
 
}
    </style>
  </head>
  <body>

     <?php include_once('header.php'); ?>
    <div class="sidebar">
      <div class="profile_info">
        <img src="<?php echo URLROOT; ?>/img/profile1.jpg" class="profile_image" alt="">
        <a href="<?php echo URLROOT; ?>/users/register" > <h4 style="color:yellowgreen;"><?php echo $data['p'] ?></h4></a>
      </div>
      <button class="dropdown-btn">
        <a href="home"><i class="fas fa-bars"></i><span>Products</span></a>
    </button>
     
    <button class="dropdown-btn" >
        <a  href="#"><i class="fas fa-bars"></i><span>Orders</span></a>
    </button>
    <div class="dropdown-container ">
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
          <a href="newsale1"><i class="fas fa-bars"><span></i>New Sale</span></a>
          <a href="dailysale1"><i class="fas fa-bars"><span></i>Daily Sale</span></a>
          <a href="weeklysale"><i class="fas fa-bars"><span></i>Periodic Sale</span></a>
          <a href="editrate1"><i class="fas fa-bars"><span></i>Edit Rate</span></a>
          <a href="prediction1" style="background-color: rgba(24, 23, 23, 0.8);"><i class="fas fa-bars"><span></i>Prediction</span></a>
          
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

                
                <a class="active" href="index2">Predicted Quantity</a>
                <input id="searchterm" onkeyup="myFunction()" type="text" placeholder="Search by Product Name..">
               
              </div>
              <table id="customers">
                <tr>
    <th>Product No        </th>
    <th>Product Name      </th>
    <th>Quantity For Last Order<br>(kg)</th>
    <th>Predicted Amount For Next Route<br>(kg) </th>
  </tr>
  <?php foreach($data['products'] as $products) :
   ?>
      <?php 
        $q=0;
       
      foreach($data['result'] as $result1) : 
          
          if ($products->id==$result1->product_id) {
                $q=$q+$result1->assigned_quantity;
              
            ?>  
  <tr>
  
    <td><b><?php echo $result1->product_id?></b></td>
    <td ><b><?php echo $result1->product_name?></b></td>
    <td><b><?php echo $result1->assigned_quantity?></b></td>
    <?php
   break;
   }  
    
 endforeach;

 ?>

  <?php 
  $q=0;
  $t=0;
  foreach($data['result'] as $result1) :
       if ($products->id==$result1->product_id) {
          $q=$q+$result1->assigned_quantity;
          $t=$t+1;
       }
    ?>
    
   <?php endforeach; ?>
   <td><b><?php echo round($q/$t,2);?></b></td>
   
    
  <?php  endforeach;?>

  </tr>
      

   
              </table>
  
      
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