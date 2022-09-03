<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home1.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pending_orders.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/order_completion.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/header.css">
    <script src="<?php echo URLROOT; ?>/js/validation.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <style>
    .content{
width: (100% - 250px); margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background.jpg') no-repeat;
  background-position: center;
  background-color: cyan;
  background-size: cover;
  transition: 0.5s;
 } 
  </style>
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
    <div class="dropdown-container drop-active">
      <a style="background-color: rgba(24, 23, 23, 0.8)" href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingorders" ><i class="fas fa-bars"><span></i>Pending orders</span></a>
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/completedorders"><i class="fas fa-bars"><span></i>Assigned orders</span></a>
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/deliveredorders"><i class="fas fa-bars"><span></i>Completed orders</span></a>
    </div>
        <button class="dropdown-btn " >
            <a href="#"><i class="fas fa-bars"></i><span>Farmers</span></a>
        </button>
        
          <div class="dropdown-container ">
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/farmers"><i class="fas fa-bars"><span></i>Farmer mangement</span></a>
            <a href="<?php echo URLROOT; ?>/Collectioncenterpages/addfarmers"><i class="fas fa-bars"><span></i>Add farmer</span></a>
            <a href="<?php echo URLROOT; ?>/Collectioncenterpages/nonlistedboughts"><i class="fas fa-bars"><span></i>Un listed broughts</span></a>
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
    <!--sidebar end-->

    <div class="content">
        <div class="testbox">
        
            <form action="<?php echo URLROOT; ?>/Collectioncenterpages/pendingorders">
              <div style="text-align:left;color:#006b38ff;padding:0px;font-family:bevan;font-size: 25px;">Order Completion - Reference number(<?php echo $data['id']?>) </div>
             
              <input style="display:none" type="text" name="order_id" value ="<?php echo $data['id']?>">
                <div class="table-header">
                  <div class="col col-1">Product name</div>
                  <div class="col col-2">Ordered quantity(kg)</div>
                  <div class="col col-4"></div>
                  <div class="col col-3">In hand stock(kg)</div>
          
                </div>
               <?php foreach($data['order'] as $order) : ?>
               
                <div class="table-tx">
            
                  <div class="col col-1"><?php echo $order->product_name?> - <?php echo $order->id?></div>
                  <div class="col col-2"><?php echo $order->quantity?></div>
                  <div id="stock" class="col col-4"></div>
                  <div id="stock" class="col col-3"><?php echo $order->center_stock?></div>
             
                
                </div>
                <p style="color:red" id="error"></p>
               
                <?php endforeach; ?>
            
              
             
             
              <div class="btn-block">
               <button id="submit" href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingorders">Back to Orders</button>
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
function aler(){
 // var ask=window.confirm("Are you sure you want to delete this post?");
  //if(ask){
    //window.location.href = "<?php echo URLROOT; ?>/Collectioncenterpages/changeOrderStatus?id=<?php echo $pending_orders->id;?>";
    Swal.fire({
  title: 'Do you want to reject the order?',
  showDenyButton: true,
  confirmButtonText: 'Yes',
  denyButtonText: 'No',
  customClass: {
    actions: 'my-actions',
    cancelButton: 'order-1 right-gap',
    confirmButton: 'order-2',
    denyButton: 'order-3',
  }
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = "<?php echo URLROOT; ?>/Collectioncenterpages/changeOrderStatus?id=<?php echo $pending_orders->$_SESSION['user_id'];?>";
  } else if (result.isDenied) {
    Swal.fire('Order was not rejected')
  }
})
  
  }
    </script>


  </body>
</html>
      