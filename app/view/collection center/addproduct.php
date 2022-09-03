<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product - <?php echo $data['name1']?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/form_style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/header.css">
    
    <script src="<?php echo URLROOT; ?>/js/validation.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <style>
    .content{
width: (100% - 250px);padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background.jpg') no-repeat;
  background-position: center;
  background-color: cyan;
  background-size: cover;
  transition: 0.5s;
  height:800px;
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
        <button class="dropdown-btn" style="background-color: rgba(24, 23, 23, 0.8);">
        <a href="<?php echo URLROOT; ?>/Collectioncenterpages/home"><i class="fas fa-bars"></i><span>Collections</span></a>
    </button>
  
    <button class="dropdown-btn" >
        <a  href="#"><i class="fas fa-bars"></i><span>Orders</span></a>
    </button>
    <div class="dropdown-container">
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingorders" ><i class="fas fa-bars"><span></i>Pending orders</span></a>
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
      
        <div class="dropdown-container">
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/addExcess"><i class="fas fa-bars"><span></i>Add Excess</span></a>
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingExcess"><i class="fas fa-bars"><span></i>Pending Excess</span></a>
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
        <a href="<?php echo URLROOT; ?>/Collectioncenterpages/expensesReport"><i class="fas fa-bars"></i><span>Expenses reports</span></a>
    </button>
    <button class="dropdown-btn">
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/outlets"><i class="fas fa-bars"></i><span>My outlets</span></a>
      </button>
     
        
       
    </div>
    <!--sidebar end-->

    <div class="content">
        <div class="testbox">
        <?php flash('add-new-collection'); ?>
            <form onsubmit="empty()"action="<?php echo URLROOT; ?>/collectioncenterpages/addProductSubmit" method="post">
            <?php flash('add_success'); ?>
              <div style="text-align:left;color:#006b38ff;padding:0px;font-family:bevan;font-size: 35px;text-align: center;">Add product - <?php echo $data['name1']?></div>
              <div class="item">
                
                <div class="item">
                    <p>Product name</p>
                    <select name="product_name" >
                    <option value="<?php echo $data['name']?>"><?php echo $data['name1']?>(Max Rate:<?php echo $data['max_rate']?>)</option>
                    </select>
                   
                  </div>
              </div>
              
              <div class="item">
                <p>Quantity</p>
                <input required id ="quantity" oninput="addQuantity()" type="text" name="quantity" >
            <span id="quantityerror"class="invalid-feedback"></span>
              
              </div>
            
              <div class="item">
                <p>Seller'S name</p>
                <select name="farmer">
                
                <?php foreach($data['m'] as $farmers) : ?>
                      <option value=" <?php echo $farmers->NIC ?>"><?php echo $farmers->name ?> - <?php echo $farmers->NIC ?></option>
                      <?php endforeach; ?>
                </select>
             
              </div>
            
              <div class="item">
                <p>Rate(per 1kg)</p>
                <p id="max_rate" style="display:none;"><?php echo $data['max_rate']?></p>
                <input id="rate" oninput="validaterate()" type="text" required name="rate"/>
                <span id="rateerror" class="invalid-feedback"></span>
              </div>
              <div class="item">
                <p>Bought Date</p>
                <input id="datefield" max="2022-03-26" type="date" name="date" required/>
                <i class="fas fa-calendar-alt"></i>
              </div>
              
             
             
              <div class="btn-block">
                <button id="submit"type="submit" href="/">Submit</button>
              </div>
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
 

function validaterate(){
  var max_rate=document.getElementById("max_rate").innerHTML;
    var buy_rate=document.getElementById("rate").value;
   // console.log(Number(max_rate)<buy_rate)
    if(Number(buy_rate)>max_rate){
        document.getElementById("rateerror").innerHTML="Rate Should be Lesser Than maximum buying rate";
    }
  else if(isNaN(buy_rate)){
        document.getElementById("rateerror").innerHTML="Rate Should be in decimal format"
    }
   
    else{
        document.getElementById("rateerror").innerHTML="";
    }
  console.log(Number(buy_rate)>max_rate);
}

function empty(){
  var quantity=document.getElementById("quantity").value;
  var rate=document.getElementById("rate").value;

}
      </script>
  


  </body>
</html>
      