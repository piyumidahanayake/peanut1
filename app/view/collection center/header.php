<?php
?>
<style>
    
.container .logo a {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    height: 60px;
    text-decoration: none;
  
    font-size: 14px;
    color:#19B3D3
}
.container{
    height: 80px;
    width: 100%;
    background-color:#262626;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    overflow: hidden;
    padding-left: 6px;
    padding-right: 8vw;
    z-index: 1;
      position: fixed;
      background: #22242A;
      padding: 20px;
      width: calc(100% - 0%);
      top: 0;
      height: 30px;
}
.container .logo{
    padding-left:3px;max-width: 250px;
    padding: 0 10px;
    overflow: hidden;
}
.container h3{
color: #fff;
      margin: 0;
      text-transform: uppercase;
      font-size: 26px;
      font-weight: 900;
}
.container .navbar ul {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    list-style: none;
    margin: 0;
    padding: 0;
}

.container .navbar ul li a {
    text-decoration: none;
    color: #108882;
    font-size: 14px;
    display: block;
    cursor: pointer;
    padding: 10px;
    margin-right: 5px;
}

.container .navbar ul li a:hover {
    border-radius: 5px;
    border: solid 1px #108882;
}


</style>
<div class="container" style=" ">
    <div class="logo" style="">
    <h3 style=" ">Agro                <span style=" color: #19B3D3;margin-left:30px">Master</span>
    </div>
    <div  class="navbar" style="display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    padding: 0 10px;
    margin-left: 50%;">
        <ul id="nav-lists" >
            <li><a  style="color:#19B3D3" href="<?php echo URLROOT; ?>/pages/home">Home</a></li>
            <li><a  style="color:#19B3D3"href="<?php echo URLROOT; ?>/pages/home/index#about-us">About Us</a></li>
            <li><a  style="color:#19B3D3"href="<?php echo URLROOT; ?>/pages/home/index#contact-us">Contact Us</a></li>
            <li><a  style="color:#19B3D3"href="<?php echo URLROOT; ?>/users/logout" >Logout</a></li>
        </ul>
    </div>
   
</div>