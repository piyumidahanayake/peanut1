<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home1.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pending_orders.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/all.min.css">
    <script src="<?php echo URLROOT; ?>/js/orders.js"></script>
    <script src="<?php echo URLROOT; ?>/js/moment.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
  height: 100vh;
  transition: 0.5s;
  min-height: 1000px;
 } 

 
.topnav input[type=date],.topnav i,.topnav span {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;
}
    </style>
  </head>
  <body>

  <?php include_once('header.php'); ?>
      
  
    <div class="sidebar">
      <div class="profile_info">
        <img src="<?php echo URLROOT; ?>/img/profile.jpg" class="profile_image" alt="">
        <h4>Kothalawala collection center</h4>
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
      <div class="dropdown-container ">
      <a  href="<?php echo URLROOT; ?>/Collectioncenterpages/orderNeccesity"><i class="fas fa-bars"><span></i>order</span></a>
        <a  href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingNeccesity"><i class="fas fa-bars"><span></i>Neccesity management</span></a>
      </div>
      <button class="dropdown-btn">
        <a href="#"><i class="fas fa-bars"></i><span>Requests</span></a>
    </button>
    <div class="dropdown-container ">
    <a  href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingRequest"><i class="fas fa-bars"><span></i>Previous requests</span></a>
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/productRequest"><i class="fas fa-bars"><span></i>Product request</span></a>
    </div>
    <button style="background-color: rgba(24, 23, 23, 0.8)" class="dropdown-btn">
        <a href="<?php echo URLROOT; ?>/Collectioncenterpages/expensesReport"><i class="fas fa-bars"></i><span>Expenses requests</span></a>
    </button>
    <button class="dropdown-btn">
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/outlets"><i class="fas fa-bars"></i><span>My outlets</span></a>
      </button>
     
        
       
    </div>
    <!--bar end-->

    <div class="content">
        <div class="new">
          <div class="topnav">
            <a  href="#home">Expenses Requests</a>
            <span style="color: white;">To</span> <input  onchange="datesearch1()" type="date" name="date" id="datefilterto" data-date-split-input="true"/>
                <span style="color: white;">From</span>
                <input  onchange="datesearch1()" type="date" name="date" id="datefilterfrom" data-date-split-input="true"/>
           
          </div>
              <table id="customers">
                <tr class="header">
                <th>Ref. Number</th>
                  <th>Year</th>
                  <th>Month</th>
                  <th>Requested date</th>
                  <th>Desription</th>
                  <th>Requested Amount</th>
                  <th>Status</th>
                  <th>Recived Amount</th>
                  <th>Recived Date</th>
                  <th>Set Status</th>
                </tr>
                <?php $count =0; foreach($data['result'] as $previous_reports) : ?>
                <tr <?php if($previous_reports->request_status=="New"){?> style="background-color:#00FFFF"<?php echo "";}?>>
              
                <td name="id" value="hdh"><?php echo $previous_reports->request_id?></td>
                  <td name="id" value="hdh"><?php echo $previous_reports->Year?></td>
                  <td><?php echo $previous_reports->month?></td>
                  <td><?php echo $previous_reports->date_of_request?></td>
                  <td><?php echo $previous_reports->description?></td>
                  <td><?php echo $previous_reports->amount_requested?></td>
                  <td><?php echo $previous_reports->request_status?></td>
                  <td><?php echo $previous_reports->transferred_amount?></td>
                  <td><?php echo $previous_reports->transfer_date?></td>
                  <td class="td-center"><a href="#" <?php if($previous_reports->request_status=='Completed'){?>onclick="change()"<?php $x=$previous_reports->request_id; echo "";} else{?>style="cursor:no-drop"<?php echo "";}?> class="table-button">Recived</a></td>

            
                </tr>
                <?php $count+=1;endforeach; ?>
               
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

 
  function change(){
  Swal.fire({
  title: 'Requested amount has arrived',
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
   window.location.href = "<?php echo URLROOT; ?>/Collectioncenterpages/changeRequestStatus?id=<?php echo $x;?>";
    

  } else if (result.isDenied) {
    Swal.fire('Status had not changed')
  }
})
}
function datesearch1(){

var from = $('#datefilterfrom').val();
var to = $('#datefilterto').val();

if (!from && !to) { // no value for from and to
  return;
}

from = from || '1970-01-01'; // default from to a old date if it is not set
to = to || '2999-12-31';

var dateFrom = moment(from);
var dateTo = moment(to);

$('#customers tr').each(function(i, tr) {
  var val = $(tr).find("td:nth-child(4)").text();
  console.log(val)
  var dateVal = moment(val, "YYYY-MM-DD");
  var visible = (dateVal.isBetween(dateFrom, dateTo, null, [])) ? "" : "none"; // [] for inclusive
  $(tr).css('display', visible);
});

}

    </script>


  </body>
</html>