<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/driver/driver-orderdisplay.css">
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
        <a href="<?php echo URLROOT; ?>/Ddriverpages/orderlist" method="post" style="background-color : #08161E;"><i class="fas fa-bars"></i><span>Orders</span></a>
    </button>
    <!-- <div class="dropdown-container">
        <a href="<?php echo URLROOT; ?>/Ddriverpages/returnentry/<?php echo $data['id']; ?>" method="post"><i class="fas fa-bars"></i><span>Deliver</span></a>
      </div> -->
    
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
      <h1>Order ID - <?php echo $data['id']; ?></h1>
     <!-- <h1>Due Dilivery Date - <?php echo $data['order']->dd; ?></h1>   -->

      <table id="details">
           <tr>
            <th>Product ID</th>
            <th>Product name</th>
            <th>Quantity(Kg)</th>
          </tr>

        <?php foreach($data['order'] as $order) : ?>
          <tr>
            <td><?php echo $order-> item; ?></td>
            <td><?php echo $order-> pname; ?></td>
            <td><?php echo $order-> qty; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>

      </div>

      <div class="form">
      <form action="" method="post">
        <!-- <p>Due Delivery Date - <?php echo $order->dd; ?></p><br> -->

        <!-- <label for="status">Delivery Status - </label>
        <input list="statuss" type="text" name="statusoforder" id="status"> 
        <datalist name="dilivery_status" id="statuss">
          <option value="rejected"></option>
          <option value="delevered"></option>
        </datalist> -->
        <!-- <select name="dilivery status" id="status">
          <option hidden selected></option>
          <option value="rejected">rejected</option>
          <option value="delevered">delevered</option>
        </select> -->
        <!-- <input type="text" name="status" size="30"> --><br><br>
        
         <label for="date">Delivered date - </label><input id="status" min="2022-03-24" type="date" name="da" size="30" style="height:30px; width:70%; background-color: #50f761;" method="post"><br><br><br>
        <!--<input type="text" style="visibility:hidden;" name="id" value="<?php echo $data['id']; ?>"> -->
        <!-- <button type="button"><b>Submitt</b> </button> -->
        <!-- <button type="submit" name="submit" value="submit" class="task" formaction="<?php echo URLROOT; ?>/driverpagesd/rejectorder/<?php echo $data['id']; ?>">Reject</button> -->
        <button type="submit" name="submit" value="submit" class="task" formaction="<?php echo URLROOT; ?>/Ddriverpages/rejectorder/<?php echo $data['id']; ?>">Reject</button><br><br><br>
        <button name="deliver" value="deliver" class="task" formaction="<?php echo URLROOT; ?>/Ddriverpages/deliverfullorder/<?php echo $data['id']; ?>">Deliver</button><br><br><br>
        </form>
        <button ><a style="text-decoration: none; color:black;" href="<?php echo URLROOT; ?>/Ddriverpages/returnentry/<?php echo $data['id']; ?>" method="post"><span>Return</span></a></button>
      
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
      