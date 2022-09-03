<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>collection center</title>
     <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/collection.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
  
  
       
       <style type="text/css">
          .new{
        background-color: rgba(255,255,255, 0.1);
         
         border:1px solid white;
         border-top:0px;
         width:90%;
         margin-left:auto;
         margin-right:auto;
         margin-bottom: 300px;
         border-radius:10px;
         height: 550px;
         
     }
          input[type=submit],input[type=reset]{

          background-color: #095484;
          border: none;
          color: white;
          cursor: pointer;
          height: 50px;
         }
     .topnav {
  overflow: hidden;
  background-color:#006b38ff;
border-radius: 20px;
margin-top: 40px;
}

.topnav a {
  float: left;
  display: block;
color: white;
  text-align: center;
  padding: 8px 16px;
  text-decoration: none;
  font-size: 30px;
  font-family: bevan;
  width:100%;
  box-sizing: border-box;
  
}
.active{
    background-color: #013220;
}
.content{
  width: 81%; margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background1.jpg') no-repeat;
      background-position: center;
      background-color: cyan;
      background-size: cover;
      
      transition: 0.5s;
}
#customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 85%;
        margin-top: 40px;
        margin-left: 90px;
      }
      
      #customers td, #customers th {
        border: 8px solid #ddd;
        padding: 26px;
        text-align: center;
       
      }
      
      #customers tr:nth-child(even){background-color: #f2f2f2;}
      
     #customers tr{background-color: #ddd;}
      
      #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color:white;
        color: blue;
        font-size: 36px;
      }
    #customers  td a{
          background-color:white;
          padding:5px;
          text-decoration:none;
          color:blue;
          font-size: 52px;
      }
#customers td{
  font-size: 25px;
  color: blue;
}
 #customers td a : hover{
      background-color: #013220;
    }
       #cc a:hover{
        background-color: #013221;
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
            <a href="collection" style="background-color: rgba(24, 23, 23, 0.8);"><i class="fas fa-bars"></i><span>Collection Center</span></a>
        </button>
    </div>
    <!--sidebar end-->

    <div class="content">
        <div class="new">
            <div class="topnav">
                <a class="active" href="#home"><marquee behavior="alternate">Your Assigned Collection Center</marquee></a>
                 
                
               
              </div>
      <?php foreach($data['collection'] as $result1) :?>
      <div class="testbox" style="background-color: white;margin-top: 60px;height: 300px;background: transparent;margin-left: 100px;margin-right: 100px;border-radius: 15px;">
      <table id="customers">
        <tr>
          <td>
            <td>Name:</td>
            <td style="color: green;font-style: italic;"><?php echo $result1->name?></td>

          </td>
        </tr>
        <tr>
          <td>
            <td>Address:</td>
            <td style="color: green;font-style: italic;"><?php echo $result1->address?></td>

          </td>
          </tr>
          <tr>
          <td>
            <td>Mobile No:</td>
            <td style="color: green;font-style: italic;"><?php echo $result1->no?></td>

          </td>
        </tr>
         <tr>
          <td>
            <td>E-mail:</td>
            <div id = "cc">
            <td style="font-size: 10px;font-style: italic;"><a href="https://mail.google.com/mail/u/0/?nocheckbrowser" style="font-size: 26px;color: darkblue;"><u><?php echo $result1->email?></u></a></td></div>

          </td>
        </tr>


      </table>
      <?php endforeach; ?>
<div><marquee behavior="alternate"><img style="max-height: 210px;margin-left: -100px;margin-top: -10px;border-radius: 75px;border: blue;max-width: 150px" src="<?php echo URLROOT; ?>/img/fruit-seller-box-full-vegetables-51020397.jpg"></marquee></div>
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
      