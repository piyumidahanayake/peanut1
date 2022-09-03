<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Sales Management</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/dailysale.css">
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
  margin-right: 16px;
  border: none;
  font-size: 17px;
}
.pt{
    overflow: hidden;margin-top: 40px;}
    input[type=submit],input[type=reset]{

          background-color: #013220;
          border: none;
          color: white;
          cursor: pointer;
          height: 50px;
         }
         
    input[type=submit]:hover {
    background-color: #0666a3;
    }
    .content{
  width: (100% - 250px); margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background1.jpg') no-repeat;
      background-position: center;
      background-color: cyan;
      background-size: cover;
      height: 900px;
      transition: 0.5s;
}
.btn-block {
    margin-top: 5px;
    text-align: left;
    font-size:15px;
    }
    .btn-hlock {
    margin-top: 20px;
    text-align: left;
    font-size:15px;
    }
    .btn-vlock {
    margin-top: -18px;
    text-align: left;
    font-size:15px;
    }
    .btn-mlock {
    margin-top: 2px;
    text-align: left;
    font-size:15px;
    }
    button {
    width: 120px;
    padding: 10px;
    border: none;
    -webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 5px; 
    background-color: #013220;
    font-size: 15px;
    color: #fff;
    cursor: pointer;
    opacity: 3;
    }
    button:hover {
    background-color: #0666a3;
    }
    input[type=date]{
      background: lightgreen;
      max-height: 12px;
      border-style: groove;
      border-radius: 15px;
      border-width: 25px;
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
    <div class="dropdown-container">
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
      
        <div class="dropdown-container drop-active">
          <a href="newsale1"><i class="fas fa-bars"><span></i>New Sale</span></a>
          <a href="dailysale1" style="background-color: rgba(24, 23, 23, 0.8);"><i class="fas fa-bars"><span></i>Daily Sale</span></a>
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
                <a class="active" href="#home">Daily Sales Management</a>
                 <a class="" href="newsale1">Add New Sale</a>
                
               
              </div>
              <table padding-top="0px">
      <tr> 
        <td>
        <div class="btn-hlock" style="align:left; padding-bottom:13px; padding-right:1px; padding-left:10px;margin-left: 50px">
                <button type="select" style="background: green" href="/" disabled>Selected By Date</button> </div>
                <td width="1020px">
                
</td>


       

<td>
  <form action="<?php echo URLROOT; ?>/Outletpages/dailysale" method="post">
        
    
             <td class="item"> <input type="date" name="selling_date" required/>
             </td> 
                
            <td>  <button type="submit" >Done</button></td>
              
                </form>
</td>
            
</td>

      </tr>
    </table>
              
              <table id="customers">
               <tr>
    <th>Product No         </th>
    <th>Product Name       </th>
    <th>Quantity</th>
    <th>Money Received(Rs.)</th>
  </tr>
   <?php foreach($data['daily'] as $daily) : ?>
 <tr>
 <td><?php echo $daily->id?></td>
 <td><?php echo $daily->name?></td>
 <td><?php echo $daily->quantity?></td>
 <td><?php echo $daily->money1?></td>
 </tr>
 <?php endforeach; ?>
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