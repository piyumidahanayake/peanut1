<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page of outlet user</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <style>
         .c{
        width: 20%;
        margin: 15px;
        box-sizing: border-box;
        float: left;
        text-align: center;
        border-radius:8px;
       box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.8);
        padding-top: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: .4s;
      background-color: white;
      border-bottom: 1px solid #006b38ff;
      box-sizing: border-box;
     border-style: double;
  }  
        }
        .c:hover{
      box-shadow: 0 0 11px rgba(33,33,33,.2);
      transform: translate(0px, -8px);
      transition: .6s;
      }
      .content img{
      width: 190px;
      height: 170px;
      text-align: center;
      margin: 0 auto;
      display: block;
      }
      .content p{
      text-align: left;
      color: black;
      padding: 0 8px;
      font-family: rubik,sans-serif;
      }
      .content h6{
      font-size: 26px;
      text-align: center;
      color: #222f3e;
      margin: 0;
      font-family: rubik;
      }
     
     .content button{
      text-align: center;
      font-size: 16px;
      color: #fff;
      width: 100%;
      padding: 10px;
      border:0px;
      outline: none;
      cursor: pointer;
      color:white;
      background-color:#006b38ff;
      display: inline;
    
    
      
      }
      .content button:hover{
          background-color:#013220;
          
      }
      .content .button1{
        margin-bottom:0px;
        
        
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
      }
     

      .gallery{
      display: flex;
      flex-wrap: wrap;
      width: 100%;
      justify-content: left;
      align-items: center;
      margin: 0px 0;
     transition: 0.2s;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      }
     .new{
        background-color: rgba(255,255,255, 0.1);
         border-radius:3px;
         border:1px solid #006b38ff
     }
     .topnav {
  overflow: hidden;
  background-color:#006b38ff;
  border-radius: 3px;
}
.active{
    background-color: #013220;
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



.topnav input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 2px;
  border: none;
  font-size: 15px;
  width: 140px;
}
.content{
  width:(100%); height:1000px ;margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background1.jpg') no-repeat;
      background-position: center;
      background-color: cyan;
      background-size: cover;
      
      transition: 0.5s;
}
input[type=text]{
      background: lightgreen;
      max-height: 14px;
      border-style: groove;
      border-radius: 13px;
      border-width: 16px;
    }
    .badge {
    position:relative;
    top:25px;
    right:-30px;
    padding:5px 10px;
    border-radius: 50%;
    background: red;
    color:white;
    cursor: pointer;
  }

  
    </style>
  </head>
  <body>

     <?php include_once('header.php'); ?>
    <div class="sidebar">
      <div class="profile_info">
          <span class="badge" onclick="window.location.href='<?php echo URLROOT; ?>/Notifications/read';"><?php echo $data['notificount']?></span>  
        <img src="<?php echo URLROOT; ?>/img/profile1.jpg" class="profile_image" alt="">
        <a href="profile1" > <h4><?php echo $data['p'] ?></h4></a>
      </div>
       <button class="dropdown-btn" style="background-color: rgba(24, 23, 23, 0.8);" >
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
            <a href="viewin" ><i class="fas fa-bars"><span></i>View Invoice</span></a>
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
                <a class="active" href="#home">Products</a>
                <table style="float: right;">
               <form action="<?php echo URLROOT; ?>/Outletpages/home1" method="post">
                <div style="border-width: 10px;position: absolute;">
                <td><input type="text" name="product_id" value="" placeholder="search by product id" required="/"></td>
                <td><input type="image" src="<?php echo URLROOT; ?>/img/search.png" alt="submit" style="margin-top: 11px"></td></div>
                </form></table>
              </div>
              
    <div class = "gallery" >
           <?php foreach($data['products'] as $products) : ?>
            <div class="c">
                <img src="<?php echo URLROOT; ?>/img/<?php echo $products->img?>">
                <h3 style="background-color: yellowgreen;border-radius: 7px;"><?php echo $products->name?> - <?php echo $products->id?></h3>
                <a href="editrate1?"><button class="btn btn-success pull-right" style="background-color:#013220;color:white;"><span class="glyphicon glyphicon-share-alt"> Selling rate - <?php echo $products->rate?>/=</span></button></a>
                
               
             
            
            
            </div>
            <?php endforeach; ?>
            
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