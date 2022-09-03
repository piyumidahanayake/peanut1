<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer management - <?php echo $_SESSION['user_name']?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home1.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/employee.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/header.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <style>
         .c{
        width: 20%;
        margin: 15px;
        box-sizing: border-box;
        float: left;
        text-align:center;
       border-radius:4px;
      font-family:'roboto';
        padding-top: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: .4s;
      background-color: rgb(240, 173, 78);
      border:2px solid black;
      box-sizing: border-box;
        }
        .c:hover{
      box-shadow: 0 0 11px rgba(33,33,33,.2);
      transform: translate(0px, -8px);
      transition: .6s;
      }
     
      .content img{
      width: 190px;
      height: 170px;
      text-align: center;
      margin: 0 auto;
      display: block;
      }
      .content p{
      text-align: left;
      color: black;
      padding: 0 8px;
      font-family: 'roboto';
      font-size:14px;
      }
      .content h4{
      text-align: left;
      color: black;
      padding: 0 8px;
      font-family: 'roboto';
      font-size:14px;
      }
      .content h6{
      font-size: 20px;
      text-align: center;
      color: #19B3D3;
      margin: 0;
      font-family: rubik,sans-serif;
      }
      .c a{
          text-decoration: none; 
          color: #feb236;
      }
      ul.a li span{
        position:relative;
left:-0.5em;
      }
      
      
      
     
     .content button{
      text-align: center;
      font-size: 16px;
      color: #fff;
      width: 50%;
      padding: 10px;
      border-bottom:1px solid black;
      outline: none;
      cursor: pointer;
      color:white;
      background-color:#006b38ff;
      display: inline;
      
    
    
      
      }
      .content button:hover{
          background-color:#013220;
          
      }
      .content .button1{
        margin-bottom:0px;
        border-bottom-left-radius: 4px;
      
        
        float:left;
      }
      .content .button2{
          float: left;
          border-bottom-right-radius:4px;
      }
     

      .gallery{
      display: flex;
      flex-wrap: wrap;
      width: 100%;
      justify-content: left;
      align-items: center;
      margin: 0px 0;
     
    
      }
     .new{
        background-color: rgba(255,255,255, 0.1);
         border-radius:4px;
         border:1px solid #006b38ff
     }
     .topnav {
  overflow: hidden;
  background-color:#006b38ff;
  border-radius: 3px;
}

.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 6px 16px;
  text-decoration: none;
  font-size: 20px;
  font-family: bevan;
  
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
width: (100% - 250px); margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background.jpg') no-repeat;
  background-position: center;
  background-color: cyan;
  background-size: cover;
  transition: 0.5s;
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

    <div class="content">
        <div class="new">
            <div class="topnav">
                <a class="active" href="#home">Farmer management</a>
                
                <input type="text" id="searchterm" onkeyup="myFunction()"  placeholder="Search by name..">
              </div>
              
    <div class = "gallery">
           
          
            <?php foreach($data['result'] as $farmers) : ?>
            <div onload="disable2()" class="c">
            <img src="<?php echo URLROOT; ?>/img/farmer-icon.jpg">
            <h4 style="display:none"><?php echo $farmers->name?></h4>
            <h4 style="text-align: left;"><?php echo $farmers->name?> - <?php echo $farmers->NIC?></h4>
              <p><?php echo $farmers->home_address?> <br><?php echo $farmers->contact_number?> <br><?php echo $farmers->product_name?> </p>
              <a  href="<?php echo URLROOT; ?>/collectioncenterpages/nonlistedboughts?NIC=<?php echo $farmers->NIC?>"><h6 style="color:#006699">Unlisted broughts</h6></a>
                <a href="<?php echo URLROOT; ?>/collectioncenterpages/paymentmanagement?NIC=<?php echo $farmers->NIC?>"><h6 id="balance" style="color:#E50914">Balance - Rs.<?php echo $farmers->balance?> </h6></a>
             
             <a href="<?php echo URLROOT; ?>/collectioncenterpages/editfarmer?NIC=<?php echo $farmers->NIC?>"> <button  class="buy-1 button1">Edit</button></a>
            <a href="#" <?php if($farmers->balance==0){?>onclick="remove()"<?php echo "";} else if($farmers->balance>0){?>style="cursor:no-drop"<?php echo "";}?>> <button  id="remove" class="buy-1 button2">Remove </button></a>
            </div>
            <?php endforeach; ?>
          
           
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

function disable2(){
  var x = document.getElementById("remove").value;
  var y = document.getElementById("balance").value;
  if(y>0){
    //x.disabled=TRUE;
  }
}
function myFunction() {
  var input, filter, gallery, tr, td, i, txtValue;
  input = document.getElementById("searchterm").value;
  table = document.getElementsByClassName("gallery");
  tr = document.getElementsByClassName("c");
  for(i=0;i<tr.length;i++){
    td = tr[i].getElementsByTagName("h4")[0];
    txtValue=tr[i].getElementsByTagName("h4")[0].innerHTML;
    if(td){
      if (txtValue.indexOf(input) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
    // console.log(txtValue)
    }
  
  }}
 
function remove(){
  Swal.fire({
  title: 'Do you want to Remove farmer from the system?',
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
    window.location.href = "<?php echo URLROOT; ?>/Collectioncenterpages/removefarmer?id=<?php echo $farmers->NIC;?>";
    

  } else if (result.isDenied) {
    Swal.fire('Farmer was not removed')
  }
})
}


    </script>


  </body>
</html>
      