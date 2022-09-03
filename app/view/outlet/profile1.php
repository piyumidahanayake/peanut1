<!DOCTYPE html>
<head>
<html lang="en" dir="ltr">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/profile1.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Spectral|Rubik|Trirong|Audiowide">
    <link href='https://fonts.googleapis.com/css?family=Bevan' rel='stylesheet'>
    <style type="text/css">
    .new{
         background-color: rgba(255,255,255, 0.5);
         margin-top: 100px;
         border:1px solid white;
         border-radius: 8px;
         border-top:0px;
         width:50%;
         margin-left:auto;
         margin-right:auto;
         margin-bottom: 300px;
         display: inline;
         
     }
      .content{
  width: (100% - 250px); margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background1.jpg') no-repeat;
      background-position: center;
      background-color: cyan;
      background-size: cover;
      height: 900px;
      transition: 0.5s;
}

     </style>
</head>

<body>

 <?php include_once('header.php'); ?>
<div class="sidebar">
      <div class="profile_info">
        <img src="<?php echo URLROOT; ?>/img/profile1.jpg" class="profile_image" alt="">
        <a href="<?php echo URLROOT; ?>/users/register" > <h4 style="color:yellowgreen;">Hettipola Supermarket</h4></a>
      </div>
      <button class="dropdown-btn">
        <a href="home"><i class="fas fa-bars"></i><span>Products</span></a>
    </button>
    
   
    <button class="dropdown-btn" >
        <a  href="#"><i class="fas fa-bars"></i><span>My Order</span></a>
    </button>
    <div class="dropdown-container ">
      <a href="index1" ><i class="fas fa-bars"><span></i>New Order</span></a>
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
          <a href="weeklysale"><i class="fas fa-bars"><span></i>Weekly Sale</span></a>
          <a href="editrate1"><i class="fas fa-bars"><span></i>Edit Rate</span></a>
          <a href="prediction1"><i class="fas fa-bars"><span></i>Prediction</span></a>
          
        </div>
        <button class="dropdown-btn">
          <a href="financial"><i class="fas fa-bars"></i><span>Financial Report</span></a>
      </button>
     <button class="dropdown-btn" >
            <a href="collection"><i class="fas fa-bars"></i><span>Collection Center</span></a>
        </button>
        
       
    </div>
    <!--sidebar end-->
  <div class="content">
        <div class="new">

 

  <div class="col" style="width:500px">
    <div class="row">
      <div class="col mb-3">
        
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                      <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    
                    
                    
                    <div class="mt-2" style="text-align: center;margin-left: 430px;">
                      <button class="btn btn-primary" type="button">
                        <i class="fa fa-fw fa-camera"></i>
                        <span style="font-size: 12px;">Change Photo</span>
                      </button>
                    </div>
                  </div>
                  
                </div>
              </div>
             
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" novalidate="" style="margin-left: 200px;width: 600px;background-color: wheat;">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label> Name</label>
                              <input class="form-control" type="text" name="name" placeholder="John Smith" value="Hettipola Supermarket">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label> Location</label>
                              <input class="form-control" type="text" name="name" placeholder="John Smith" value="Hettipola">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Username</label>
                              <input class="form-control" type="text" name="username" placeholder="johnny.s" value="johnny.s">
                            </div>
                          </div>
                            <div class="col">
                            <div class="form-group">
                              <label> Account number</label>
                              <input class="form-control" type="text" name="name" placeholder="John Smith" value="xxxxxxxxxxx">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" type="text" placeholder="user@example.com">
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2" style="font-size:20px"><b>Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Current Password</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>New Password</label>
                              <input class="form-control" type="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" placeholder="••••••"></div>
                          </div>
                        </div>
                      </div>
                      
                    <div class="row">
                      <div class="col d-flex justify-content-end" style="display: inline-block;">
                        <button class="btn btn-primary" type="submit">Back to Home</button>
                        <button class="btn btn-primary" style="margin-left:240px" type="submit">Save Changes</button>
                      </div>
                    </div>
                  </form>

                
          
      </div>

      
    </div>

  </div>
</div>
</div></div></div>

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