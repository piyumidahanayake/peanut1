<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/driver/driver-availabilityviewer.css">
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
      
  
    <div class="sidebar">
      <div class="profile_info">
        <img src="<?php echo URLROOT; ?>/img/usericon.jpg" class="profile_image" alt="">
        <h4><?php echo $_SESSION['user_name']?></h4>
      </div>
      <button class="dropdown-btn">
        <a href="<?php echo URLROOT; ?>/Ddriverpages/cclist" method="post"><i class="fas fa-bars"></i><span>Collection Centers</span></a>
      </button>
      <button class="dropdown-btn">
        <a href="<?php echo URLROOT; ?>/Ddriverpages/olist" method="post"><i class="fas fa-bars"></i><span>Outlets</span></a>
    </button>

      <!-- <button class="dropdown-btn">
        <a href="driver-outlet.html"><i class="fas fa-bars"></i><span>Outlets</span></a>
      </button> -->

      <button class="dropdown-btn">
        <a href="<?php echo URLROOT; ?>/Ddriverpages/orderlist" method="post"><i class="fas fa-bars"></i><span>Orders</span></a>
      </button>
    
      <button class="dropdown-btn">
        <a href="<?php echo URLROOT; ?>/Ddriverpages/availabilitycalender" method="post" style="background-color : #08161E;"><i class="fas fa-bars"></i><span>Availability</span></a>
      </button>
    
       <!-- <div class="dropdown-container">
        <a href="driver-newEntry.html" class="fas fa-bars">New Entry</a>
        <a href="driver-editEntry .html" class="fas fa-bars">Edit Entry</a>
      </div> -->
       
    </div>
    <!--sidebar end-->

    <div class="content">
        <div class="tables">
        <h1><?php echo $data['day']; ;?></h1>
        
<table id="orders">
  <form action="#" method="post">
  <tr>
    <td align="center">
      <input type="checkbox" name="timeslots[]" value="1->12.00AM - 03.00AM" id="availability" class="btn"  style="float:right" onclick="myfunction()"/>12.00AM - 03.00AM
      <input type="hidden" name="timeslots[]" value="0->12.00AM - 03.00AM" id="not-availability" class="btn" onclick="" style="float:right"/>
    </td>

  </tr>
  <tr>
    <td align="center">
      <input type="checkbox" name="timeslots[]" value="1->03.00AM - 06.00AM" id="availability" class="btn" onclick="" style="float:right" />03.00AM - 06.00AM
      <input type="hidden" name="timeslots[]" value="0->03.00AM - 06.00AM" id="not-availability" class="btn" onclick="" style="float:right"/>
    </td>
  </tr>
  <tr>
    <td align="center">
      <input type="checkbox" name="timeslots[]" value="1->06.00AM - 09.00AM" id="availability" class="btn" onclick="" style="float:right"/>06.00AM - 09.00AM
      <input type="hidden" name="timeslots[]" value="0->06.00AM - 09.00AM" id="not-availability" class="btn" onclick="" style="float:right"/>
    </td>
  </tr>
  <tr>
    <td align="center">
      <input type="checkbox" name="timeslots[]" value="1->09.00AM - 12.00PM" id="availability" class="btn" onclick="" style="float:right"/>09.00AM - 12.00PM
      <input type="hidden" name="timeslots[]" value="0->09.00AM - 12.00PM" id="not-availability" class="btn" onclick="" style="float:right"/>
    </td>
  </tr>
  <tr>
    <td align="center">
      <input type="checkbox" name="timeslots[]" value="1->12.00PM - 03.00PM" id="availability" class="btn" onclick="" style="float:right"/>12.00PM - 03.00PM
      <input type="hidden" name="timeslots[]" value="0->12.00PM - 03.00PM" id="not-availability" class="btn" onclick="" style="float:right"/>
    </td>
  </tr>
  <tr>
    <td align="center">
      <input type="checkbox" name="timeslots[]" value="1->03.00PM - 06.00PM" id="availability" class="btn" onclick="" style="float:right"/>03.00PM - 06.00PM
      <input type="hidden" name="timeslots[]" value="0->03.00PM - 06.00PM" id="not-availability" class="btn" onclick="" style="float:right"/>
    </td>
  </tr>
  <tr>
    <td align="center">
      <input type="checkbox" name="timeslots[]" value="1->06.00PM - 09.00PM" id="availability" class="btn" onclick="" style="float:right"/>06.00PM - 09.00PM
      <input type="hidden" name="timeslots[]" value="0->06.00PM - 09.00PM" id="not-availability" class="btn" onclick="" style="float:right"/>
    </td>
  </tr>
  <tr>
    <td align="center">
      <input type="checkbox" name="timeslots[]" value="1->09.00PM - 12.00AM" id="availability" class="btn" onclick="" style="float:right"/>09.00PM - 12.00AM
      <input type="hidden" name="timeslots[]" value="0->09.00PM - 12.00AM" id="not-availability" class="btn" onclick="" style="float:right"/>
    </td>
  </tr>
  <tr>
    <td align="center"><a href="<?php echo URLROOT; ?>/Ddriverpages/availabilityview/<?php echo $data['day']; ?>"> <button type="submit" class="btn" name="submit_button">Save</button></a></td>
  </tr>
  </form>

  <script>
     function myfunction(){
      if(document.getElementById("availability").checked==true) {
          document.getElementById("not-availability").disabled;
        }
     }
  </script>

  <?php 
  
    if(isset($_POST['submit_button'])){
      $timeslots=$_POST['timeslots'];
      //echo $timeslots;
      foreach($timeslots as $timeslot){
          echo $timeslot . "<br>";
          //$query="INSERT INTO availability (time_slot) values ('$timeslot')";
          //$query_run=mysqli_query();
      }
    }
  
  ?>
  
  
  
  
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
      