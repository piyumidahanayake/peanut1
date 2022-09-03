<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit farmer - <?php echo $data['farmer']->NIC;?></title>
   

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/header.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/expenses.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/form_style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <style>
 .content{
width: (100% - 250px); margin-top: 40px;padding: 60px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background.jpg') no-repeat;
  background-position: center;
  background-color: cyan;
  
  transition: 0.5s;


 } 
 select {
  outline: none;
  display: block;
  background: rgba(0, 0, 0, 0.1);
  width: 100%;
  border: 0;
  border-radius: 4px;
  box-sizing: border-box;
  padding: 12px 20px;
  color: rgba(0, 0, 0, 0.6);
  font-family: inherit;
  font-size: inherit;
  font-weight: 500;
  line-height: inherit;
  transition: 0.3s ease;
}
 
 
    </style>
  </head>
  <body>

  <?php include_once('header.php'); ?>
      
  
    <div class="sidebar">
      <div class="profile_info">
        <img src="<?php echo URLROOT; ?>/img/profile.jpg" class="profile_image" alt="">
        <a href="<?php echo URLROOT; ?>/users/register" > <h4><?php echo $_SESSION['user_name']?></h4></a>
      </div>
      <button class="dropdown-btn" ">
        <a href="<?php echo URLROOT; ?>/Collectioncenterpages/home"><i class="fas fa-bars"></i><span>Collections</span></a>
    </button>
  
    <button class="dropdown-btn " >
        <a  href="#"><i class="fas fa-bars"></i><span>Orders</span></a>
    </button>
    <div class="dropdown-container ">
      <a  href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingorders" ><i class="fas fa-bars"><span></i>Pending orders</span></a>
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/completedorders"><i class="fas fa-bars"><span></i>Assigned orders</span></a>
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/deliveredorders"><i class="fas fa-bars"><span></i>Completed orders</span></a>
    </div>
        <button class="dropdown-btn " >
            <a href="#"><i class="fas fa-bars"></i><span>Farmers</span></a>
        </button>
        
          <div class="dropdown-container drop-active">
          <a style="background-color: rgba(24, 23, 23, 0.8)" href="<?php echo URLROOT; ?>/Collectioncenterpages/farmers"><i class="fas fa-bars"><span></i>Farmer mangement</span></a>
            <a href="<?php echo URLROOT; ?>/Collectioncenterpages/addfarmers"><i class="fas fa-bars"><span></i>Add farmer</span></a>
           
</div>
          
        <button class="dropdown-btn">
          <a href="#"><i class="fas fa-bars"></i><span>Excess</span></a>
      </button>
      
        <div class="dropdown-container">
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/addExcess"><i class="fas fa-bars"><span></i>Add Excess</span></a>
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/excessAssignment"><i class="fas fa-bars"><span></i>Excess assignment</span></a>
        </div>
        <button class="dropdown-btn">
          <a href="#"><i class="fas fa-bars"></i><span>Neccesity</span></a>
      </button>
      <div class="dropdown-container">
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/orderNeccesity"><i class="fas fa-bars"><span></i>order</span></a>
        <a href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingNeccesity"><i class="fas fa-bars"><span></i>Neccesity management</span></a>
      </div>
      <button class="dropdown-btn">
        <a href="#"><i class="fas fa-bars"></i><span>Requests</span></a>
    </button>
    <div class="dropdown-container">
    <a href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingRequest"><i class="fas fa-bars"><span></i>Previous requests</span></a>
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/productRequest"><i class="fas fa-bars"><span></i>Product request</span></a>
    </div>
    <button class="dropdown-btn">
        <a href="<?php echo URLROOT; ?>/Collectioncenterpages/expensesReport"><i class="fas fa-bars"></i><span>Expenses requests</span></a>
    </button>
    <button class="dropdown-btn">
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/outlets"><i class="fas fa-bars"></i><span>My outlets</span></a>
      </button>
     
        
       
    </div>
    <!--sidebar end-->

    <div class="content">
    
    <div class="testbox">
  
  
   <!-- <div class="form-header">
      <h1>Add New Farmer</h1>
    </div>-->
  
      <form method="POST" action="<?php echo URLROOT; ?>/collectioncenterpages/updatefarmer">
      <div class ="form-header" style="text-align:left;color:#006b38ff;padding:0px;font-family:bevan;font-size: 35px;text-align: center;"><h1>Edit Profile - <?php echo $data['farmer']->NIC?></h1></div>
        <div class="form-group">
          <label for="nic">National Identity Card Number</label>
          <input id="nic" type="text" name="nic"  value="<?php echo $data['farmer']->NIC;?>" />
          <span id="name" class="invalid-feedback"></span>
        </div>
        <div class="form-group">
          <label for="name">Full Name</label>
          <input id="name" type="text" name="name"  value="<?php echo $data['farmer']->name; ?>" />
          <span id="name" class="invalid-feedback"></span>
        </div>
        <div class="form-group">
          <label for="address">Home Address</label>
          <input id="address" type="text" name="address"  value="<?php echo $data['farmer']->home_address; ?>"/>
          <span id="name" class="invalid-feedback"></span>
        </div>
        <div class="form-group">
          <label for="con_number">Contact Number</label>
          <input id="con_number" type="text" name="con_number" value="<?php echo $data['farmer']->contact_number; ?>"/>
          <span id="name" class="invalid-feedback"></span>
        </div>
        <div class="form-group">
          <label for="product">Most Selling Item:</label>
         <select name="product" id="product" value="<?php echo $data['farmer']->MFI1; ?>">
         <?php foreach($data['products'] as $products) : ?>
          <option value="<?php echo $products->product_id;?>"><?php echo $products->name;?></option>           <?php endforeach?>
         </select>
        </div>
  
        <div class="btn-block">
                <button style="background-color:#4285F4" id="submit"type="submit" href="/">Submit</button>
              </div>
       <!-- <div class="form-group">
          <button type="submit">Submit</button>
        </div>-->
      </form>
    
  
  
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

function myFunction() {
  var input, filter, gallery, tr, td, i, txtValue;
  input = document.getElementById("searchterm");
  console.log(input.value)
  //filter = input.value.toUpperCase();
  gallery = document.getElementsByTagName("form");
  tr = document.getElementsByTagName("form");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("h3").value;
    console.log(td);
    if (td) {
      txtValue = td;
     
    }       
  }
}

    </script>


  </body>
</html>