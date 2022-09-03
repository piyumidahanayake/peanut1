<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page - <?php echo $_SESSION['user_name']?></title>
   
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home1.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/header.css">
    <script src="<?php echo URLROOT; ?>/js/orders.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <style>
 .content{
width: (100% - 250px); margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background.jpg') no-repeat;
  background-position: center;
  background-color: cyan;
  background-position: center;
  transition: 0.5s;
  height:auto;
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
        <img src="<?php echo URLROOT; ?>/img/profile.jpg" class="profile_image" alt="">
        <a href="<?php echo URLROOT; ?>/users/register" > <h4><?php echo $_SESSION['user_name']?></h4></a>
      </div>
      <button class="dropdown-btn" >
        <a style="background-color: rgba(24, 23, 23, 0.8)" href="<?php echo URLROOT; ?>/Collectioncenterpages/home"><i class="fas fa-bars"></i><span>Collections</span></a>
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
        
          <div class="dropdown-container ">
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/farmers"><i class="fas fa-bars"><span></i>Farmer mangement</span></a>
            <a href="<?php echo URLROOT; ?>/Collectioncenterpages/addfarmers"><i class="fas fa-bars"><span></i>Add farmer</span></a>
           
</div>
          
        <button class="dropdown-btn">
          <a href="#"><i class="fas fa-bars"></i><span>Excess</span></a>
      </button>
      
        <div class="dropdown-container ">
          <a  href="<?php echo URLROOT; ?>/Collectioncenterpages/addExcess"><i class="fas fa-bars"><span></i>Add Excess</span></a>
          <a  href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingExcess"><i class="fas fa-bars"><span></i>Pending Excess</span></a>
        </div>
        <button class="dropdown-btn">
          <a href="#"><i class="fas fa-bars"></i><span>Neccesity</span></a>
      </button>
      <div class="dropdown-container">
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/orderNeccesity"><i class="fas fa-bars"><span></i>Order</span></a>
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
        <a href="<?php echo URLROOT; ?>/Collectioncenterpages/expensesReport"><i class="fas fa-bars"></i><span>Expenses request</span></a>
    </button>
    <button class="dropdown-btn">
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/outlets"><i class="fas fa-bars"></i><span>My outlets</span></a>
      </button>
     
        
       
    </div>
    <!--sidebar end-->

    <div class="content">
        <div class="new">
            <div class="topnav">
                <a class="active" href="#home">Stock Management</a>
                <input type="text" id="searchterm" onkeyup="myFunction()" placeholder="Search on product..">
                
                <select id="mySelect" onchange="search()" style="float: right; padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;">
                  <option value="all">Select type</option>
                  <option value="Vegetable">Vegetable</option>
                  <option value="Fruit">Fruit</option>
                </select>
              </div>
              
    <div id="productList" class = "gallery">
        <?php foreach($data['products'] as $products) : ?>
            <div id="product" class="c">
                <form action="<?php echo URLROOT; ?>/Collectioncenterpages/addproduct" method="post">
                <img src="<?php echo URLROOT; ?>/img/<?php echo $products->image_url?>">
                <h4 style="display:none"><?php echo $products->name." "?></h4>
                <h4 id="x" style="display:none"><?php echo $products->type?></h4>
                <h3 style="text-align:left;margin:20px"><?php echo $products->name?> </h3>
                <p style="margin-left:12px">Buying rate - Rs.<?php echo $products->maximum_buying_rate?> <br>Selling rate   - Rs.<?php echo $products->selling_rate?></p>
                <h6>Stock : <?php echo $products->stock?>Kg</h3>
              <button name="product" value="<?php echo $products->id?>" onclick = "location.href='<?php echo URLROOT; ?>/Collectioncenterpages/addproduct'" class="buy-1 button1">Add more</button>
              </form>
            </div>
            <?php endforeach; ?>
           
      
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
  input = document.getElementById("searchterm").value;
  tr = document.getElementsByClassName("gallery");
 tr = document.getElementsByClassName("c");
  for(i=0;i<tr.length;i++){
    td = tr[i].getElementsByTagName("h4")[0];
    txtValue=tr[i].getElementsByTagName("h4")[0].innerHTML
    if(td){
      if (txtValue.indexOf(input) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
    console.log(txtValue);
  
  }
}
  //filter = input.value.toUpperCase();
  /*gallery = document.getElementsByTagName("form");
  tr = document.getElementsByTagName("form");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("h3").value;
    console.log(td);
    if (td) {
      txtValue = td;
     
    }       
  }*/
}
function search(){
  var input = document.getElementById("mySelect").value.toLowerCase();
  table = document.getElementsByClassName("gallery");
  tr = document.getElementsByClassName("c");
  for(i=0;i<tr.length;i++){
    td = tr[i].getElementsByTagName("h4")[0];
    txtValue=tr[i].getElementsByTagName("h4")[1].innerHTML.toLowerCase();
    if(input=='all'){
      tr[i].style.display = "";
    }
   else if(txtValue==input){
      tr[i].style.display = "";
      console.log(txtValue);
    }
    else{
      tr[i].style.display = "none";
    }
    
  
  }
}
    </script>


  </body>
</html>