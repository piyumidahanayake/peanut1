
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/driver/driverHome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

  <header>
      <div class="left_area">
        <h3>Agro <span>Master</span></h3>
      </div>
      <div class="right_area">
        <a href="#" class="logout_btn">Logout</a>
      </div>
    </header>
      
    <?php include_once('header.php'); ?>


    <style>
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


  
    <div class="sidebar">
      <div class="profile_info">
      <!-- <span class="badge" onclick="window.location.href='<?php echo URLROOT; ?>/Notifications/read';"><?php echo $data['notificount']?></span>  -->
      <img src="<?php echo URLROOT; ?>/img/usericon.jpg" class="profile_image" alt="">
        <h4><?php echo $_SESSION['user_name']?></h4>

      </div>
    <button class="dropdown-btn">
        <a href="<?php echo URLROOT; ?>/Ddriverpages/cclist" method="post"><i class="fas fa-bars"></i><span>Collection Centers</span></a>
    </button>
    <button class="dropdown-btn">
        <a href="<?php echo URLROOT; ?>/Ddriverpages/olist" method="post" ><i class="fas fa-bars"></i><span>Outlets</span></a>
    </button>

    <!-- <button class="dropdown-btn">
        <a href="driver-outlet.html"><i class="fas fa-bars"></i><span>Outlets</span></a>
    </button> -->

    <button class="dropdown-btn">
        <a href="<?php echo URLROOT; ?>/Ddriverpages/orderlist" method="post"><i class="fas fa-bars"></i><span>Orders</span></a>
    </button>
    
    <button class="dropdown-btn">
        <a href="<?php echo URLROOT; ?>/Ddriverpages/availabilitycalender" method="post"><i class="fas fa-bars"></i><span>Availability</span></a>
    </button>

       <!-- <div class="dropdown-container">
        <a href="driver-newEntry.html" class="fas fa-bars">New Entry</a>
        <a href="driver-editEntry .html" class="fas fa-bars">Edit Entry</a>
      </div> -->
       
    </div>
    <!--sidebar end-->

    <div class="content">
      <div class="black">
        <table>
          <tr>
            <td align="center"><h1>Welcome!</h1> <p>You are the person responsible for deliver agriculturel products among collection centers and outlets. <br> <b>Wish you safe journey.</b> </p> </td>
            <!-- <td align="center"><img src="driver-2.JFIF" class="image" alt=""></td> -->
          </tr>
        </table>
      </div>

      
    </div>

    <!-- <footer>
      <p>© 2021 All rights reserved by CSG31</p>
    </footer>  -->

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
      