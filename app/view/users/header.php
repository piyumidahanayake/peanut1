<?php
?>


<div class="container" >
    <div class="logo" >
    <h3 style=" ">Agro                <span style="">Master</span>
    </div>
    <div  class="navbar" style="">
        <ul id="nav-lists" >
            <li><a  style="color:#19B3D3" href="<?php echo URLROOT; ?>/pages/home">Home</a></li>
            <li><a  style="color:#19B3D3"href="<?php echo URLROOT; ?>/pages/home/index#about-us">About Us</a></li>
            <li><a  style="color:#19B3D3"href="<?php echo URLROOT; ?>/pages/home/index#contact-us">Contact Us</a></li>
            <li><a  style="color:#19B3D3"href="<?php echo URLROOT; ?>/users/login" >Login</a></li>
            <li><a  style="color:#19B3D3"href="<?php echo URLROOT; ?>/users/register" >Register</a></li>
        </ul>
    </div>
   
</div>


<?php 
?>
<div class="container">
    <div class="logo">
        <a href="<?php echo fullURLfront; ?>/main/index"><img src="<?php echo fullURLfront; ?>/assets/images/build.png"> Task Hub</a>
    </div>
    <div class="navbar">
        <ul id="nav-lists">
            <li><a href="<?php echo fullURLfront; ?>/main/index">Home</a></li>
            <li><a href="<?php echo fullURLfront; ?>/Employee/employee_dashboard" class="<?php echo (empty($_SESSION['loggedin'])) ? 'disabled-link' : ''; ?>">Dashboard</a></li>
            <li><a href="<?php echo fullURLfront; ?>/auth/login" class="<?php echo (!empty($_SESSION['loggedin'])) ? 'disabled-link' : ''; ?>">Login</a></li>
            <li><a href="<?php echo fullURLfront; ?>/main/index#about-us">About Us</a></li>
            <li><a href="<?php echo fullURLfront; ?>/main/index#contact-us">Contact Us</a></li>
        </ul>
    </div>
    <div class="user" >
        <h4><i class="fa fa-user-circle-o" aria-hidden="true" ></i> </h4>
    </div>
</div>