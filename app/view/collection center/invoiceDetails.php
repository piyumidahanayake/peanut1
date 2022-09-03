<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home1.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/ordert.css">
   
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <style>
     body {
    background:url('<?php echo URLROOT; ?>/img/background.jpg') no-repeat;
    height: 100vh;
    vertical-align: middle;
    display: flex;
    font-family: Muli;
    font-size: 14px;
    background-position: center;
    background-size:cover;
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
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/expensesReport"><i class="fas fa-bars"></i><span>Expenses requests</span></a>
      </button>
      <button class="dropdown-btn">
            <a href="<?php echo URLROOT; ?>/Collectioncenterpages/outlets"><i class="fas fa-bars"></i><span>My outlets</span></a>
        </button>
       
          
         
      </div>
    <!--sidebar end-->

  
        <div class="card" style="margin-top:80px">
            <div class="title">Brought invoice</div>
            <div class="info">
              
                <div class="row">
                <div class="columnhead"> <span id="heading">Invoice No.</span><br> <span id="details"><?php echo $data['invoice'][0]->invoice_id?></span> </div>
                    <div class="columnhead"> <span id="heading">Invoiced Date</span><br> <span id="details"> <?php echo $data['invoice'][0]->invoice_date?></span> </div>
                
                    <div class="columnhead"> <span id="heading">Farmer NIC</span><br> <span id="details"><?php echo $data['invoice'][0]->farmer_id?></span> </div>
                    <div class="columnhead"> <span id="heading">Payment status</span><br> <span id="details"><?php echo $data['invoice'][0]->payment_status?></span> </div>
                </div>
            </div>
            <div class="pricing">
            <div class="row head" style="font-weight: bold;
      font-size:large; ">
                  
                  <div class="column3"> <span id="name">Product name</span> </div>
                  <div class="column3"> <span id="price">Brought quantity</span> </div>
                  <div class="column3"> <span id="price">Rate</span> </div>
                  <div class="column3"> <span id="price">Total value</span> </div>
              </div>
              <?php foreach ($data['invoice'] as $invoice):?>
                <div class="row">
                  
                    <div class="column3"> <span id="name"> <?php echo $invoice->product_name ?></span> </div>
                    <div class="column3"> <span id="price"> <?php echo $invoice->quantity ?>kg</span> </div>
                    <div class="column3"> Rs.<span id="price"><?php echo $invoice->rate ?> </span> </div>
                    <div class="column3"> Rs.<span id="price"><?php echo $invoice->value ?> </span> </div>

                </div>
                <?php endforeach; ?>
                <div class="row">
                    <div class="column2"><big>Total amount</big></div>
                    <div class="column3"></div>
                    <div class="column3"><big>RS.<?php echo $data['invoice'][0]->total; ?></big></div>
                </div>
                
            </div>  
            <div class="row">
                    <div class="column2"><a class="save" href="<?php echo URLROOT; ?>/collectioncenterpages/farmers">Back</a></div>
                    <div class="column3"></div>
                    <div class="column3"><a  class="save" href="<?php echo URLROOT; ?>/collectioncenterpages/setInvoiceStatus?invoice_id=<?php echo $data['invoice'][0]->invoice_id?>&farmer_id=<?php echo $data['invoice'][0]->farmer_id?>&total=<?php echo $data['invoice'][0]->total; ?>">Set as paid</a></div>
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