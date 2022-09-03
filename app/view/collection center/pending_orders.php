<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending orders - <?php echo $_SESSION['user_name']?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home1.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
     <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/header.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pending_orders.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo URLROOT; ?>/js/orders.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
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
  background-size: cover;
  height: auto;
  transition: 0.5s;
  min-height: 1000px;
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

    <div class="content">
        <div class="new">
          <div class="topnav">
          <a  href="#home">Pending Orders</a>
                <input id="searchterm" onkeyup="myFunction()" type="text" placeholder="Search on Ref. number..">
                <select class="custom-select" id="mySelect" onchange="search()" style="float: right; padding: 6px;color:black;background-color:white;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;">
                  <option value="all">Select outlet</option>
                  <?php foreach($data['outlets'] as $outlets) : ?>
                  <option value="<?php echo $outlets->outlet_name?>"><?php echo $outlets->outlet_name?></option>
                  <?php endforeach; ?>
                </select>
           
          </div>
              <table id="customers">
                <tr class="header">
                  <th>Ref. number</th>
                  <th>Outlet</th>
                  <th>Ordered date</th>
                  <th>More details</th>
                  <th>Complete order</th>
                  <th>Reject order</th>
                 
                 
                </tr>
                <?php foreach($data['result'] as $pending_orders) : ?>
                  <tr>
              
                  <td name="id" value="hdh"><?php echo $pending_orders->id?></td>
                  <td><?php echo $pending_orders->outlet_name?></td>
                  <td><?php echo $pending_orders->order_date?></td>
                   <td class="td-center td-cen"><a class="table-button" href="<?php echo URLROOT; ?>/collectioncenterpages/orderdescription?id=<?php echo $pending_orders->id?>">More details</a></td>
                  <td class="td-center td-cen"><a class="table-button" href="<?php echo URLROOT; ?>/collectioncenterpages/assignorder?id=<?php echo $pending_orders->id?>">Complete order</a></td>
                  <td class="td-center"><a style="background-color:white;border:0px"id="delete" onclick="aler()"><i class="fas fa-trash"></i></a></td>
                  
             </form>
                </tr>
                <?php endforeach; ?>
               
              </table>
  
      
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
    window.location.href = "<?php echo URLROOT; ?>/Collectioncenterpages/changeOrderStatus?id=<?php echo $pending_orders->id;?>";
  } else if (result.isDenied) {
    Swal.fire('Order was not rejected')
  }
})
  
  }

  function search(){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("mySelect").value;
 // filter = input.value.toUpperCase();
  table = document.getElementById("customers");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (input=="all") {
        tr[i].style.display = "";
      } else if(input==txtValue){
        tr[i].style.display = "";
      }
      else{
        tr[i].style.display = "none";
      }
    }       
  }
}

function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchterm");
    filter = input.value.toUpperCase();
    table = document.getElementById("customers");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
    </script>


  </body>
</html>