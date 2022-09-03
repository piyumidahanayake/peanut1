<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home1.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pending_orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <style>
   
     .new{
        background-color: rgba(255,255,255, 0.1);
         
         border:1px solid #006b38ff;
         border-top:0px;
         margin-bottom: 850px;
     }
     .topnav {
  overflow: hidden;
  background-color:#006b38ff;

}
.content{
width: (100% - 250px); margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background.jpg') no-repeat;
  background-position: center;
  background-color: cyan;
  background-size: cover;
  transition: 0.5s;
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

.topnav input[type=text] {
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
        <a href="<?php echo URLROOT; ?>/users/register" > <h4><?php echo $_SESSION['user_name']?></h4></a>
      </div>
      <button class="dropdown-btn">
        <a href="<?php echo URLROOT; ?>/Collectioncenterpages/home"><i class="fas fa-bars"></i><span>Collections</span></a>
    </button>
  
    <button class="dropdown-btn" >
        <a  href="#"><i class="fas fa-bars"></i><span>Orders</span></a>
    </button>
    <div class="dropdown-container">
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingorders" ><i class="fas fa-bars"><span></i>Pending orders</span></a>
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/completedorders"><i class="fas fa-bars"><span></i>Assigned orders</span></a>
      <a href="<?php echo URLROOT; ?>/Collectioncenterpages/deliveredorders"><i class="fas fa-bars"><span></i>Delivered orders</span></a>
    </div>
        <button class="dropdown-btn " >
            <a href="#"><i class="fas fa-bars"></i><span>Farmers</span></a>
        </button>
        
          <div class="dropdown-container ">
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/farmers"><i class="fas fa-bars"><span></i>Farmer mangement</span></a>
            <a href="<?php echo URLROOT; ?>/Collectioncenterpages/addfarmers"><i class="fas fa-bars"><span></i>Add farmer</span></a>
            <a href="<?php echo URLROOT; ?>/Collectioncenterpages/nonlistedboughts"><i class="fas fa-bars"><span></i>Un listed broughts</span></a>
</div>
          <button class="dropdown-btn" >
            <a href="#"><i class="fas fa-bars"></i><span>Employees</span></a>
        </button>
        
          <div class="dropdown-container drop-active">
          <a  href="<?php echo URLROOT; ?>/Collectioncenterpages/employee"><i class="fas fa-bars"><span></i>Employee mangement</span></a>
            <a href="<?php echo URLROOT; ?>/Collectioncenterpages/addemployee"><i class="fas fa-bars"><span></i>Add Employee</span></a>
            <a style="background-color: rgba(24, 23, 23, 0.8);"href="<?php echo URLROOT; ?>/Collectioncenterpages/employeeSalary"><i class="fas fa-bars"><span></i>Salary management</span></a>
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
        <a href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingNeccesity"><i class="fas fa-bars"><span></i>pending</span></a>
      </div>
      <button class="dropdown-btn">
        <a href="#"><i class="fas fa-bars"></i><span>Financial reports</span></a>
    </button>
    <div class="dropdown-container">
      <a href="#"><i class="fas fa-bars"><span></i>sales</span></a>
      <a href="#"><i class="fas fa-bars"><span></i>Expenses</span></a>
    </div>
      <button class="dropdown-btn">
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/reject"><i class="fas fa-bars"></i><span>Return management</span></a>
      </button>
     
        
     
        
       
    </div>
    <!--sidebar end-->

    <div class="content">
        <div class="new">
            <div class="topnav">
                <a  href="#home">Employee salary management - January 2021</a>
                <input type="text" placeholder="Search by month..">
               
              </div>
              <table id="customers">
                <tr>
                  <th>Employee I.D</th>
                  <th>Name</th>
                 
                  <th>Month salary</th>
                  <th>Payment status</th>
                  <th>update status</th>
                 

                </tr>
                <tr>
                  <td>E -100</td>
                    <td>A.T.Sunil</td>
                    <td>20000/=</td>
                   
                    <td >Done</td>
                    <td class="td-center"><a href="#"> Set payment</a></td>
                </tr>
                <tr>
                    <td>E -100</td>
                    <td>A.T.Sunil</td>
                    <td>20000/=</td>
                   
                    <td >Done</td>
                    <td class="td-center"><a href="#"> Set payment</a></td>
                  </tr>
                  <tr>
                    <td>E -100</td>
                      <td>A.T.Sunil</td>
                      <td>20000/=</td>
                     
                      <td >Done</td>
                      <td class="td-center"><a href="#"> Set payment</a></td>
                  </tr>
                  <tr>
                    <tr>
                      <td>E -100</td>
                        <td>A.T.Sunil</td>
                        <td>20000/=</td>
                       
                        <td >Done</td>
                        <td class="td-center"><a href="#"> Set payment</a></td>
                    </tr>
                  </tr>
                  <tr>
                    <tr>
                      <td>E -100</td>
                        <td>A.T.Sunil</td>
                        <td>20000/=</td>
                       
                        <td >Done</td>
                        <td class="td-center"><a href="#"> Set payment</a></td>
                    </tr>
                  </tr>
               
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
    </script>


  </body>
</html>