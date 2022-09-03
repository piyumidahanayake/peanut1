<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outlet Pay Process - Test</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/payment_style-1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>


    <style> 
 

.tabx {
  tab-size: 4;
}
.selected {
  background-color: greenyellow;
}

table {
  border-spacing:0;
}


.content{
  width: 81%; margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background1.jpg') no-repeat;
      background-position: center;
      background-color: cyan;
      background-size: cover;
      
      transition: 0.5s;
}

#SpecialOne {
  display: block; width:250px; padding:0px; height: 30px;pointer-events: none;
}

#SpecialTwwo {
  display: block; width:250px; padding:0px; height: 30px;
}

#desg1 {
  width: 250px; padding: 0px; height:40px; margin-bottom: 38px;
}
#desg2 {
  width: 250px; margin-bottom: 30px;
}
#desg3 {
  width: 250px;
}

#HOne {
  display: none;
}

</style>
  </head>
  <body>

  <?php include_once('header.php'); ?>
      
  
     <div class="sidebar">
      <div class="profile_info">
        <img src="<?php echo URLROOT; ?>/img/profile1.jpg" class="profile_image" alt="">
        <a href="<?php echo URLROOT; ?>/users/register" > <h4 style="color: yellowgreen;"><?php echo $data['p'] ?></h4></a>
      </div>
      <button class="dropdown-btn">
        <a href="home"><i class="fas fa-bars"></i><span>Products</span></a>
    </button>
   
    <button class="dropdown-btn" >
        <a  href="#"><i class="fas fa-bars"></i><span>Orders</span></a>
    </button>
    <div class="dropdown-container ">
      <a href="index2"><i class="fas fa-bars"><span></i>New Order</span></a>
      <a href="orderhistory"><i class="fas fa-bars"><span></i>Order History</span></a>
      <a href="accsort"><i class="fas fa-bars"><span></i>Rejected Order</span></a>
      <a href="reportsort"><i class="fas fa-bars"><span></i>Order Report</span></a>
    </div>
        <button class="dropdown-btn " style="background-color: rgba(24, 23, 23, 0.8);">
            <a href="#"><i class="fas fa-bars"></i><span>Payment</span></a>
        </button>
        
          <div class="dropdown-container drop-active" style="display:block;">
            <a href="viewin"><i class="fas fa-bars"><span></i>View Invoice</span></a>
            <a href="pay" style="background-color: rgba(24, 23, 23, 0.8);"><i class="fas fa-bars"><span></i>Pay Online</span></a>
            <a href="payhistry1"><i class="fas fa-bars"><span></i>Payment History</span></a>
           
          </div>
          
        
          
          
        <button class="dropdown-btn">
          <a href="#"><i class="fas fa-bars"></i><span>Sales</span></a>
      </button>
      
        <div class="dropdown-container">
          <a href="newsale1"><i class="fas fa-bars"><span></i>New Sale</span></a>
          <a href="dailysale1"><i class="fas fa-bars"><span></i>Daily Sale</span></a>
          <a href="weeklysale"><i class="fas fa-bars"><span></i>Periodic Sale</span></a>
          <a href="editrate1"><i class="fas fa-bars"><span></i>Edit Rate</span></a>
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



    <div class="content">

        <div class="testbox">

        

<!--      
<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
paypal.Button.render({
// Configure environment
env: 'sandbox',
client: {
sandbox: 'AeLE-8_kzO7OpyUbSbf9UNrEiGFoGLuuivsqxk-4jua9QVf5G9Il_WMpH4MMCRCwQg1j9pH1J7ruaCjG',
production: 'demo_production_client_id'
},
// Customize button (optional)
locale: 'en_US',
style: {
size: 'small',
color: 'gold',
shape: 'pill',
},
// Set up a payment
payment: function (data, actions) {
return actions.payment.create({
transactions: [{
amount: {
total: '0.01',
currency: 'USD'
}
}]
});
},
// Execute the payment
onAuthorize: function (data, actions) {
return actions.payment.execute()
.then(function () {
// Show a confirmation message to the buyer
window.alert('Thank you for your purchase!');
});
}
}, '#paypal-button');
</script> -->
<form id="form1A" method="POST">
<table><tr><td width="0px"></td><td width="100px"><h5>Date:</h5></td><td style="color: blue">
                <?php echo date('Y-m-d')?>
                <?php $date1= date('Y-m-d')?>
                <div class="item"><input type="hidden" name="date" value="<?php echo $date1?>"></td><td>
                </div></td></tr>
</table>

<table><tr><td width="0px"></td><td width="100px"><h5> Invoice No:</h5></td><td>
                <div class="item"><select id="desg3" name="invoice_no" >
   <option value="">Select Invoice</option> 
 <?php 
$p=0;
$id=0;
$m=0;
 foreach($data['orders1'] as $orders1) : 
  $p=$orders1->amount-$orders1->p_amount;
  ?>
   <option value="<?php echo $orders1->id?>"><?php echo $orders1->id?>- Rs: <?php echo $p?>.00</option>

 <?php 
$id=$orders1->id;
endforeach; ?> 
  </select><!--input type="text" name="invoice_no" id="SpecialTwwo"/-->
              </div></td></tr>
</table>  

<table><tr><td width="0px"></td><td width="100px"><h5> Amount (Rs):</h5></td><td>
                <div class="item"><input type="number" name="amount" id="SpecialTwwo" max="10000" min="1" value="0" step="0.01" required="" />
              </div></td></tr>
</table>
<br>
<div><input type="submit"  value="Continue to PayPal..." id="desg2" style="background: green;color: white"/></div>
</form>
<?php if(isset($_POST['amount'])){
  $p=0;
  foreach($data['orders1'] as $orders1) : 
    if($_POST['invoice_no']==$orders1->id){
    $p=$orders1->amount-$orders1->p_amount;
      if($_POST['amount']>$p){
        $amount=$p;
      }else if($_POST['amount']<=$p){
        $amount = $_POST['amount'];
      }
    }
    endforeach;
  
  $date = $_POST['date'];
  $invoice_no = $_POST['invoice_no'];
  //$dollarrupee = 0.004937;
  //$amountus = $amount * $dollarrupee;
}
?>

<br>
<form action="<?php echo URLROOT; ?>/Transactions1/Newpay" id="form1" method="post">

<script type="text/javascript">
  var totalPrice = <?php echo $amount; ?>;
///function funcL(val) {
  //var amount = document.getElementById(SpecialVal);
  //var usamount = parseFloat(amount.value)/ 202.50;
  ///usamount = parseFloat(val)/ 202.50;
  //document.write("Output: " + usamount.toString());
  ///globalThis.valueW = usamount.toString();
///}
</script> 


 <!-- Set up a container element for the button -->
 <div id="paypal-button-container"></div>

<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=AeLE-8_kzO7OpyUbSbf9UNrEiGFoGLuuivsqxk-4jua9QVf5G9Il_WMpH4MMCRCwQg1j9pH1J7ruaCjG&currency=USD"></script>
 
<script>
    // Render the PayPal button into #paypal-button-container
  
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: totalPrice
                    }
                }]
            });
        },
        // Execute the payment
        onAuthorize: function (data, actions) {
          return actions.payment.execute()
            .then(function () {
              // Show a confirmation message to the buyer
                  window.alert('Thank you for your purchase!');
            });
          },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\Thank You!');
                // Replace the above to show a success message within this page, e.g.
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '';
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
                var trans = transaction.id;
                var t_acc = transaction.account_id;
                
                document.getElementById('SpecialOne').value = trans;
               

            });
        }


    }).render('#paypal-button-container');
</script>

<div><h5>Generated Transaction ID:</h5><input type="text" name="transaction_id" id="SpecialOne" /></div>
<input type="text" name="amount" id="HOne" value="<?php echo $amount; ?>"/>
<input type="text" name="date" id="HOne" value="<?php echo $date; ?>"/>
<input type="text" name="invoice_no" id="HOne" value="<?php echo $invoice_no; ?>"/>
<div><input type="submit" value="CONFIRM TRANSACTION" id="desg1" size="5px" style="background: green;color: white" /><div>
    </form>
        </div>
    </div>


    <!--script type="text/javascript">
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
    </script-->

  </body>
</html>
      