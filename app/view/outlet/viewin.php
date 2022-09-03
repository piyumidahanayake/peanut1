<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoices</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/viewin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <style>
   
     .new{
        background-color: rgba(255,255,255, 0.6);
         
         border:3px solid black;
         border-top:0px
        border-radius:30px;
        border:5px solid #006b38ff;
         border-top:0px;
         width:75%;
         margin-left:auto;
         margin-right:auto;
         margin-bottom: 300px;
         border-radius:10px;
     }
     .topnav {
  overflow: hidden;
  background-color:#006b38ff;

}
.content{
   margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background1.jpg') no-repeat;
      background-position: center;
      background-color: cyan;
      background-size: cover;
      width: 81%;
      transition: 0.5s;
      height: auto;

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
  width:75%;
  box-sizing: border-box;
  
}
.active{
    background-color: #013220;
}



.topnav input[type=date] {
  float: right;
  padding: 12px;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;
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
      max-height: 14px;
      border-style: groove;
      border-radius: 13px;
      border-width: 12px;
    }
    select{
      background: lightgreen;
      max-height: 30px;
      border-style: groove;
      border-radius: 10px;
      width: 135px;
      border-width: 8px;
    }
    #customers tr{
      border-color: green;
      background: transparent;
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
        <button class="dropdown-btn " style="background-color: rgba(24, 23, 23, 0.8);">
            <a href="#"><i class="fas fa-bars"></i><span>Payment</span></a>
        </button>
        
          <div class="dropdown-container drop-active" style="display:block;">
            <a href="viewin" style="background-color: rgba(24, 23, 23, 0.8);"><i class="fas fa-bars"><span></i>View Invoice</span></a>
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
           
             

<table padding-top="0px">
      <tr> 
        <td>
        <div class="btn-hlock" style="align:left; padding-bottom:13px; padding-right:10px; padding-left:10px;">
                <button type="select" href="/" style="background: transparent;color: black;" disabled><b>Sorted By</b></button> </div><td width="1020px">
                
</td>
<form action="<?php echo URLROOT; ?>/Outletpages/viewin2" method="post">
<td>
        
               <td>
                <select name="status">
                  <option value="">Payment Status</option>
                  <option value="Not Paid">Not Paid</option>
                  <option value="Paid">Paid</option>
                  
                </select></td>
               <td> <button type="" style="font-size: 13px; background: transparent; color:black; font-size: 15px"><b>Ordered Date</b></button></td>
</td>
       

<td>
        
    <td class="item">
               <input type="date" name="order_date" required/>
                <i class="fas fa-calendar-alt"></i>

    </td>
    <td> <button type="submit" style="background: black;height: 45px"><input type="image" src="<?php echo URLROOT; ?>/img/arro11.jpg" alt="submit" height="35px 5px" ;></button></td>
            
</td>
</form>
      </tr>
    </table>
              <table id="customers">
                <tr>
    <tr>
    <th>Invoice No         </th>
    <th>Ordered Date      </th>
    <th>Payment Status</th>
    <th>Date Received</th>
    <th>Payment<br>Description</th>
  </tr>
  <?php foreach($data['result'] as $viewin) : ?>
  <tr>
    <td name ="id" value ="hdh"><?php echo $viewin->id?></td>
    <td><?php echo $viewin->date1?></td>
    <td><?php echo $viewin->status?></td>
    <td><?php echo $viewin->date2?></td>
     <td><a style="background-color:#013220;border-radius: 8px;" href="<?php echo URLROOT; ?>/Outletpages/full1?id=<?php echo $viewin->id?>">more</a></td>
   
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