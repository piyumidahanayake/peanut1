<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/driver/driver-collectioncenter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>
      
    <?php include_once('header.php'); ?>
      
  
    <div class="sidebar">
      <div class="profile_info">
      <img src="<?php echo URLROOT; ?>/img/usericon.jpg" class="profile_image" alt="">
      <h4><?php echo $_SESSION['user_name']?></h4>
      </div>
    <button class="dropdown-btn">
        <a href="<?php echo URLROOT; ?>/Ddriverpages/cclist" method="post" ><i class="fas fa-bars"></i><span>Collection Centers</span></a>
    </button>
    <button class="dropdown-btn">
        <a href="<?php echo URLROOT; ?>/Ddriverpages/olist" method="post" style="background-color : #08161E;"><i class="fas fa-bars"></i><span>Outlets</span></a>
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
        <div class="tables">
        <h1>Outletts</h1>

<table id="collectioncenters">
  <tr>
    <th>Outlet</th>
    <th>Address</th>
    <th>Contact number</th>
  </tr>

  <tr>
    <?php foreach($data['outlets'] as $outlet) : ?>
    <td> <?php echo $outlet-> outlet_name; ?> </td>
    <td> <?php echo $outlet-> address; ?> </td>
    <td> <?php echo $outlet-> con_number; ?> </td>
  </tr>
  <?php endforeach; ?>


  <!--<tr>
    <td>Kandy</td>
    <td>main streat,plus junction</td>
    <td>+94768867295</td>     -->
    <!-- <td align="center"><a href="driver-location.html">location</a></td> -->
  </tr>
  <!-- <tr>
    <td>Mathara</td>
    <td>parakumba streat,tree junction</td>
    <td>+94768867295</td>
  </tr>
  <tr>
    <td>Mathale</td>
    <td>sub streat,divide junction</td>
    <td>+94768867295</td>
  </tr>
  <tr>
    <td>Kurunegala</td>
    <td>parakumba streat,tree junction</td>
    <td>+94768867295</td>
  </tr>     -->
  
  
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
      