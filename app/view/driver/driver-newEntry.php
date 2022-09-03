<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/driver/driver-newEntry.css">

    
    <script src="<?php echo URLROOT; ?>/js/qtyvalidation.js"></script>

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
    #input1{
      display: none;
    } 
    </style>
  
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
    <!-- <div class="dropdown-container">
        <a href="<?php echo URLROOT; ?>/Ddriverpages/returnentry/<?php echo $data['id']; ?>" method="post" style="background-color : #08161E;"><i class="fas fa-bars"></i><span>Deliver</span></a>
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
      <!-- <img src="RHA.jpg" class="bellicon"> -->
      <div class="form">
      <!-- <input type="text" name="" placeholder="order id" id="id"><br><br><br> -->
      <h4>Order ID - <?php echo $data['id']; ?></h4>

      <!-- <input type="text" name="" placeholder="return entry id" id="id"><br><br><br> -->

        <form action= "<?php echo URLROOT; ?>/Ddriverpages/submitreturnentry?orderid=<?php echo $data['id']; ?>"  method="post" >
        
        <label for="date">Delivered date - </label><input id="status" min="2022-03-24" type="date" name="da" size="30" style="height:30px; width:70%; background-color: #50f761;" method="post">


        <table id="entry">
          <tr style="height:35px;">
            <th>Product id</th>
            <th>Product name</th>
            <th>Quentity(Kg)</th>
            <!-- <th><button>+</button></th> -->
            <th></th>
          </tr>
            

          
          <?php foreach($data['order'] as $order) : ?>
            
          <tr id="row" style="height:35px;">
            <!-- <td><input value="<?php echo $data['id']; ?>" method="post" id="input1" style=""> <?php echo (!empty($data['itemid_err'])) ? 'is-invalid' : ''; ?> <?php echo $order->item_id; ?><input value=" <?php echo $order->item_id; ?>"  type="text"  id="input1" name="name" size="60" class="form-control form-control-lg" disable/><br></td>
            <td><?php echo (!empty($data['pname_err'])) ? 'is-invalid' : ''; ?><?php echo $order-> pname; ?><input value="" type="text" id="input1" name="name" size="60" class="form-control form-control-lg " disable><br></td> -->
            <td><?php echo $order->item_id; ?><br></td>
            <td><?php echo $order-> pname; ?><br></td>
            <input id="orderedqty" style="display: none;" value="<?php echo $order-> ordered_quantity; ?>" style="height:35px;">
            <td><input type="text" id="inputvalue" name="<?php echo $order->item_id; ?>" oninput="quantityValidation()" size="60" style="width:100px;"class="form-control form-control-lg <?php echo (!empty($data['qty_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $order-> ordered_quantity; ?>"><br></td>
            <!-- <td><button onclick="demoDisplay()">-</button></td> -->
          </tr>
          <p style="color:red; font-size: 15px;" id="error"></p>
        <?php endforeach; ?>
        
          <!-- <tr>
            <td><input type="text" name="" placeholder="product id" id="product"></td>
            <td><input type="text" name="" placeholder="Qty" id="qty"></td>
            <td><button>-</button></td>
          </tr>
          </tr>   -->
        </table>
        
        <!-- <br><button class="save">Save</button>  -->
        <br><br>
        <div class="col"> 
            <input type="submit" value="Return" class="btn btn-success btn-block" style="background-color: #0feb25; width:50%;display: block;margin-right: auto;margin-left: auto;">
          </div>

        </form>
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



function quantityValidation(){
    //console.log(10);
    var x = document.getElementById("orderedqty").innerHTML;
    var y=document.getElementById("inputvalue").value;
    if(x-y<0){
        document.getElementById("error").innerHTML="you cannot reject that much of quantity.enter value less than ordered quantity";
        document.getElementById("inputvalue").innerHTML="";
    }
    if(isNaN(y)){
    document.getElementById("error").innerHTML="Enter numeric value";
    }
    else{
        document.getElementById("error").innerHTML="";
        document.getElementById("inputvalue").innerHTML="";
    }
}
    </script>




  </body>
</html>
      