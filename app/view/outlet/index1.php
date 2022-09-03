<?php


             $member_id = 0;
            
            
          
            
 // you can your integerate authentication module here to get logged in member

$shoppingCart = new ShoppingCart();
if (! empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (! empty($_POST["quantity"])) {
                
                $productResult = $shoppingCart->getProductByCode($_GET["code"]);
                
                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["id"], $member_id);
                
                if (! empty($cartResult)) {
                    // Update cart item quantity in database
                    $newQuantity = $cartResult[0]["quantity"] + $_POST["quantity"];
                    
                    $shoppingCart->updateCartQuantity($newQuantity,$cartResult[0]["id"]);

                } else {
                    // Add to cart table
                    
                    $shoppingCart->addToCart($productResult[0]["id"], $_POST["quantity"], $member_id);

                    
                }
            }
            break;
        case "remove":
            // Delete single entry from the cart
            $shoppingCart->deleteCartItem($_GET["id"]);
            break;
        case "empty":
            // Empty cart
            $shoppingCart->emptyCart($member_id);
            break;

    }
     
}

 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <TITLE>Enriched Responsive Shopping Cart in PHP</TITLE>


<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/st.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <style>
   
     .new{
         background-color: rgba(255,255,255, 0.1);
         
         border:1px solid white;
         border-top:0px;
         width:80%;
         margin-left:auto;
         margin-right:auto;
         margin-bottom: 300px;
         border-radius:10px;
         
     }
     .topnav {
  overflow: hidden;
  background-color:#006b38ff;

}

.topnav a {
  float: left;
  display: block;
color: white;
  text-align: center;
  padding: 8px 16px;
  text-decoration: none;
  font-size: 25px;
  font-family: bevan;
  width:50%;
  box-sizing: border-box;
  
}
.active{
    background-color: #013220;
}



.topnav input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;
}
 .content{
   margin-top: 40px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background1.jpg') no-repeat;
      background-position: center;
      background-color: cyan;
      background-size: cover;
      width: 81%;
      transition: 0.5s;
      height: auto;
}
input[type=submit],input[type=reset]{

          background-color: #013220;
          border: none;
          color: white;
          cursor: pointer;
          height: 50px;
         }
       input[type=submit]:hover {
    background-color: #0666a3;
    }  
    
    </style>
  </head>
  <body>

     <?php include_once('header.php'); ?>
    <div class="sidebar">
      <div class="profile_info">
        <img src="<?php echo URLROOT; ?>/img/profile1.jpg" class="profile_image" alt="">
        <a href="<?php echo URLROOT; ?>/users/register" > <h4 style="color: yellowgreen;">Hettipola Supermarket</h4></a>
      </div>
      <button class="dropdown-btn">
        <a href="home"><i class="fas fa-bars"></i><span>Home</span></a>
    </button>
    
   
    <button class="dropdown-btn" style="background-color: rgba(24, 23, 23, 0.8);">
        <a  href="#"><i class="fas fa-bars"></i><span>Orders</span></a>
    </button>
    <div class="dropdown-container drop-active">
      <a href="index1" style="background-color: rgba(24, 23, 23, 0.8);"><i class="fas fa-bars"><span></i>New Order</span></a>
      <a href="orderhistory"><i class="fas fa-bars"><span></i>Order History</span></a>
      <a href="accsort" ><i class="fas fa-bars"><span></i>Rejected Order</span></a>
      <a href="reportsort"><i class="fas fa-bars"><span></i>Order Report</span></a>
    </div>
        <button class="dropdown-btn " >
            <a href="#"><i class="fas fa-bars"></i><span>Payment</span></a>
        </button>
        
          <div class="dropdown-container ">
            <a href="viewin"><i class="fas fa-bars"><span></i>View Invoice</span></a>
            <a href="pay"><i class="fas fa-bars"><span></i>Pay Online</span></a>
            <a href="payhistry1"><i class="fas fa-bars"><span></i>Payment History</span></a>
           
          </div>
          
        
          
          
        <button class="dropdown-btn" >
          <a href="#"><i class="fas fa-bars"></i><span>Sales</span></a>
      </button>
      
        <div class="dropdown-container">
          <a href="newsale1"><i class="fas fa-bars"><span></i>New Sale</span></a>
          <a href="dailysale1"><i class="fas fa-bars"><span></i>Daily Sale</span></a>
          <a href="weeklysale"><i class="fas fa-bars"><span></i>Periodic Sale</span></a>
          <a href="editrate"><i class="fas fa-bars"><span></i>Edit Rate</span></a>
          <a href="prediction1"><i class="fas fa-bars"><span></i>Prediction</span></a>
          
        </div>
        <button class="dropdown-btn">
          <a href="pp"><i class="fas fa-bars"></i><span>Financial Report</span></a>
      </button>
     <button class="dropdown-btn" >
            <a href="collection"><i class="fas fa-bars"></i><span>Collection Center</span></a>
        </button>
        
       
    </div>
    <!--sidebar end-->


<div class="content" style="background-position: center;">
        <div class="new" style="margin-left:130px;">
            
<?php
$item_price = 0;
    $c=0;
$cartItem = $shoppingCart->getMemberCartItem($member_id);
if (! empty($cartItem)) {
    $orderDate = date('Y-m-d');
    $item_quantity = 0;
    $item_price = 0;
    
    if (! empty($cartItem)) {
        $c=0;
        foreach ($cartItem as $item) {
            $item_quantity = $item_quantity + $item["quantity"];
            $item_price = $item_price + ($item["price"] * $item["quantity"]);
            $c=$c+1;
        }
    }
}?>

    <div id="shopping-cart" >
        <div class="txt-heading" style="background-color:#006b38ff">
            <div class="txt-heading-label">Shopping Cart</div>

            <a id="btnEmpty" href="index1?action=empty"><img
                src="<?php echo URLROOT; ?>/img/empty-cart.png" alt="empty-cart" title="Empty Cart"
                class="float-right" /></a>
            <div class="cart-status" style="color:white;">
                <div>Total Items: <?php echo $c; ?></div>
                <div>Total Price: <?php echo $item_price; ?></div>
            </div>
        </div>
<?php
if (! empty($cartItem)) {
    ?>
<div class="shopping-cart-table" style="background-color:white;" >
            <div class="cart-item-container header" style="background-color:#006b38ff;">
                <div class="cart-info title">Title</div>
                <div class="cart-info">Quantity</div>
                <div class="cart-info price">Price</div>

            </div>
<?php
    foreach ($cartItem as $item) {
        ?>
				<div class="cart-item-container">
                <div class="cart-info title">
                    <?php echo $item["name"]; ?>
                </div>

                <div class="cart-info">
                        <?php echo $item["quantity"]; ?>
                    </div>

                <div class="cart-info price">
                        <?php echo "Rs:".$item["price"]; ?>
                    </div>


                <div class="cart-info action">
                    <a
                        href="index1?action=remove&id=<?php echo $item["cart_id"]; ?>"
                        class="btnRemoveAction"><img
                        src="<?php echo URLROOT; ?>/img/icon-delete.png" alt="icon-delete"
                        title="Remove Item" /></a>
                </div>
            </div>

          <?php  if (! empty($_POST["quantity"])) {
$productResult = $shoppingCart->getProductByCode($_GET["code"]);
                
$cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["id"], $member_id);
 if (! empty($cartResult)) {
    $orderDate= 2021/11/25;
    $member_id= 5;
$shoppingCart->addToCart1($productResult[0]["id"], $_POST["quantity"],$orderDate, $member_id);

}}?>

                
<?php  
           }

    ?>

           
    
 


        
<p> <a href="process_order?"><button class="btn btn-warning" style="background-color:#013220;border-radius: 7px;color: white;width: 120px;">Place Order</button></a></p>
</div>
  <?php
}
?>
</div>

<div id="product-grid">
    <div class="txt-heading" style="text-align: center;font-size: 28px;">
        <div class="txt-heading-label" >Products</div>
    </div>
    <?php
    $query = "SELECT * FROM tbl_product";
    $product_array = $shoppingCart->getAllProduct($query);
    if (! empty($product_array)) {
        foreach ($product_array as $key => $value) {
            ?>
        <div class="product-item" style="background-color:#006b38ff;height: 200px;">
        <form method="post"
            action="index1?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
            <div class="product-image" style="height: 150px;">
                <img src="<?php echo URLROOT; ?>/img/<?php echo $product_array[$key]["image"]; ?>">
                <div class="product-title">
                    <?php echo $product_array[$key]["name"]; ?>
                </div>
            </div>
            <div class="product-footer">
                <div class="float-right">
                    <input type="text" name="quantity" value="1"
                        size="2" class="input-cart-quantity" /><input type="image"
                        src="<?php echo URLROOT; ?>/img/add-to-cart.png" class="btnAddAction" />
                </div>
                <div class="product-price float-left" style="color:yellow;"><?php echo "1kg - Rs:".$product_array[$key]["price"]; ?></div>
                
            </div>
        </form>
    </div>
    <?php
        }
       
    }
    ?>
</div>

    </div>


    </div>

?>
    

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

