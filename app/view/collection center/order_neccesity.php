<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order neccesity - <?php echo $_SESSION['user_name'];?></title>
   
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/header.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/excess1.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/excess2.css">
    <script src="<?php echo URLROOT; ?>/js/orders.js"></script>
    <script src="<?php echo URLROOT; ?>/js/validation.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
        <style>
      .item2 {
          position: relative;
          margin: 5px 5px;
          }
          .item2 p{
            margin-bottom: 0px;
          }
          .item2:hover p, .item:hover i {
          color: #095484;
          }
          input:hover, select:hover, textarea:hover {
          box-shadow: 0 0 5px 0 #095484;
          }
          input, select{
    margin-bottom: 1px;
    margin-top: 5px;
    border: 1px solid;
    border-radius: 3px;
    }
    .item{
      background-color:#00C851;
      
    }
  
    .content{
width: (100% - 250px); margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background.jpg') no-repeat;
  background-position: center;
  background-color: cyan;
  background-size: cover;
  transition: 0.5s;
 } 

 .button1{
    
    background-color: black; /* Green */
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size:12px;
    margin-top: 1px;
    
    transition-duration: 0.4s;
    cursor: pointer;
  
}
.item {
    padding: 5px 30px;
    height: 80px;
    display: flex;
  }

.description span{
  color:black;
  font-size: 18px;
}
.total-price {
    width: 230px;
    padding-top: 27px;
    text-align: center;
    font-size: 18px;
    color: black;
    font-weight: 300;
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
      <a style="background-color: rgba(24, 23, 23, 0.8)" href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingorders" ><i class="fas fa-bars"><span></i>Pending orders</span></a>
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/completedorders"><i class="fas fa-bars"><span></i>Assigned orders</span></a>
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/deliveredorders"><i class="fas fa-bars"><span></i>Delivered orders</span></a>
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
      <div class="dropdown-container drop-active">
      <a style="background-color: rgba(24, 23, 23, 0.8)" href="<?php echo URLROOT; ?>/Collectioncenterpages/orderNeccesity"><i class="fas fa-bars"><span></i>order</span></a>
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
       
        <div style="background-color:black" class="shopping-cart">
            <!-- Title -->
            <form>
            
            <div style="background-color:black"class="title">
              <span>Order Necessity Stock</span>
              <span style="float:right"> <input id="searchterm" onkeyup="myFunction()" type="text" placeholder="Search On Product Name.."></span>
            </div>
          
            
            <!-- Product #1 -->
            <?php foreach($data['products'] as $products) : ?>
                <form method="POST" action="<?php echo URLROOT; ?>/collectioncenterpages/addNeccesityOrder">
              <div class="item">
                
              <div class="buttons">
                <input class="button1" type="submit" value="Order Necessity">
                </div>
                <div class="image">
                  <img width="120" height="80"src="<?php echo URLROOT; ?>/img/<?php echo $products->image_url?>" alt="" />
                </div>
        
                <div class="description">
                <p></p>
                 <p></p>
                  <span style="display:none"><?php echo $products->type?></span>
                  <span ><?php echo $products->name?></span>
                  <span style="visibility:hidden"><input type="text" name="stock" value="<?php echo $products->stock?>"></span>
                  <span style="visibility:hidden"><input type="text" name="product_id" value="<?php echo $products->id?>"></span>
                </div>
        
                <div class="quantity">
                
                  <input type="number" name="quantity" min="0"value="0">
                </div>
        
                <div class="total-price">Stock I.H - <?php echo $products->stock?>kg</div>
             
              </div>
              </form>
              <?php endforeach?>
            <!-- Product #2 -->
           
          
        </form>
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
function myFunction() {
  var input, filter, gallery, tr, td, i, txtValue;
  input = document.getElementById("searchterm").value;
  //table = document.getElementsByClassName("gallery");
  tr = document.getElementsByClassName("item");
  for(i=0;i<tr.length;i++){
    td = tr[i].getElementsByTagName("span")[1];
    txtValue=tr[i].getElementsByTagName("span")[1].innerHTML;
    if(td){
      if (txtValue.indexOf(input) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
    console.log(txtValue)
    }
  
  }}

  
    </script>


  </body>
</html>