<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="driverHome-createReturnEntry.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
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
      
  
    <div class="sidebar">
      <div class="profile_info">
        <img src="usericon.jpg" class="profile_image" alt="">
        <h4><?php echo $_SESSION['user_name']?></h4>
      </div>
    <button class="dropdown-btn">
        <a href="driver-collectioncenter.html"><i class="fas fa-bars"></i><span>Collection Centers</span></a>
    </button>

    <button class="dropdown-btn">
        <a href="driver-orderlist.html"><i class="fas fa-bars"></i><span>Orders</span></a>
    </button>
    
    <button class="dropdown-btn">
        <a href="driver-availability-calender.html"><i class="fas fa-bars"></i><span>Availability</span></a>
    </button>
    
    <button class="dropdown-btn">
        <a href="#"><i class="fas fa-bars"></i><span>Return Entry</span></a>
    </button>
       <div class="dropdown-container">
        <a href="driver-newEntry.html">New Entry</a>
        <a href="driver-editEntry .html">Edit Entry</a>
      </div>
       
    </div>
    <!--sidebar end-->

    <div class="content">
      <!-- <img src="RHA.jpg" class="bellicon"> -->
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
      