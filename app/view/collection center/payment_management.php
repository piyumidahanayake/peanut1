<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment management - <?php echo $data['nic']?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home1.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pending_orders.css">
    <script src="<?php echo URLROOT; ?>/js/moment.js"></script>
    <script src="<?php echo URLROOT; ?>/js/orders.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <style>
   
     .new{
        background-color: rgba(255,255,255, 0.3);
         
         border:1px solid #006b38ff;
         border-top:0px;
        
     }
     .topnav {
  overflow: hidden;
  background-color:#006b38ff;

}

.topnav a {
  float: left;
  display: block;
color: white;
  text-align: left;
  padding: 6px 16px;
  text-decoration: none;
  font-size: 20px;
  font-family: bevan;
  width:50%;
  box-sizing: border-box;
  
}




.topnav input[type=date],.topnav i,.topnav span {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;
}
.content{
width: (100% - 250px); margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background.jpg') no-repeat;
  background-position: center;
  background-color: cyan;
  background-size: cover;
  transition: 0.5s;
  min-height: 1000px;
 }  
    
    </style>
  </head>
  <body>

    <header>
       
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
        <div class="new">
          <div class="topnav">
            <a  href="#home">Payment managemnet - <?php echo $data['nic']?></a>
           <span style="color: white;">To</span> <input  onchange="datesearch()" type="date" name="date" id="datefilterto" data-date-split-input="true"/>
                <span style="color: white;">From</span>
                <input  onchange="datesearch()" type="date" name="date" id="datefilterfrom" data-date-split-input="true"/>
                
           
          </div>
              <table id="customers">
                <tr>
                  <th>Invoice number</th>
                  <th>Date</th>
                 
                  <th>Total amount</th>
                 
                  <th>payemnet status</th>
                  <th>Paid date</th>
                  <th>More</th>
                </tr>
                <?php foreach($data['farmer_invoice'] as $invoices) : ?>
                <tr <?php if($invoices->payment_status=="not paid"){?> style="background-color:#00FFFF"<?php echo "hdhf";}?>>
              
                  <td name="id" value="hdh"><?php echo $invoices->invoice_id?></td>
                  <td><?php echo $invoices->date?></td>
                  <td><?php echo $invoices->total_amount?></td>
                  <td><?php echo $invoices->payment_status?></td>
                  <td><?php echo $invoices->paid_date?></td>
                  <td class="td-center"><a href="<?php echo URLROOT; ?>/collectioncenterpages/invoice?id=<?php echo $invoices->invoice_id?>">More details</a></td>
                
             </form>
                </tr>
                <?php endforeach; ?>
               
              </table>
  
      
            </div>
    </div>
    <script type="text/javascript">
      moment().format();
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