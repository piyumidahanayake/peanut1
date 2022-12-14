<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My outlets - <?php echo $_SESSION['user_name'];?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/ito_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script language="JavaScript">
	function showInput() {
		document.getElementById("displaycc1").innerHTML = document.getElementById("cc1").value;
		document.getElementById("displayitm1").innerHTML = document.getElementById("itm1").value;
		document.getElementById("displayqty1").innerHTML = document.getElementById("qty1").value;
	}
    </script>
  </head>
  <body>

  <?php include_once('header.php'); ?>
      
      
  
  <div class="sidebar">
      <div class="profile_info">
        <img src="<?php echo URLROOT; ?>/img/profile.jpg" class="profile_image" alt="">
        <a href="<?php echo URLROOT; ?>/users/register" > <h4><?php echo $_SESSION['user_name']?></h4></a>
      </div>
      <button class="dropdown-btn" >
        <a  href="<?php echo URLROOT; ?>/Collectioncenterpages/home"><i class="fas fa-bars"></i><span>Collections</span></a>
    </button>
  
    <button class="dropdown-btn " >
        <a  href="#"><i class="fas fa-bars"></i><span>Orders</span></a>
    </button>
    <div class="dropdown-container ">
      <a  href="<?php echo URLROOT; ?>/Collectioncenterpages/pendingorders" ><i class="fas fa-bars"><span></i>Pending orders</span></a>
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
        <a href="<?php echo URLROOT; ?>/Collectioncenterpages/expensesReport"><i class="fas fa-bars"></i><span>Expenses reports</span></a>
    </button>
    <button style="background-color: rgba(24, 23, 23, 0.8)" class="dropdown-btn">
          <a href="<?php echo URLROOT; ?>/Collectioncenterpages/outlets"><i class="fas fa-bars"></i><span>My outlets</span></a>
      </button>
     
        
       
    </div>
    <!--sidebar end-->

<style> 
.tabx {
	tab-size: 4;
}
</style>


  <style>
         .c{
        width: 20%;
        margin: 15px;
        box-sizing: border-box;
        float: left;
        text-align: center;
        border-radius:10px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        padding-top: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: .4s;
        background-color:white;
        }
        .c:hover{
      box-shadow: 0 0 11px rgba(33,33,33,.2);
      transform: translate(0px, -8px);
      transition: .6s;
	}
      .content img{
      width: 100px;
      height: 100px;
      text-align: center;
      margin: 0 auto;
      display: block;
      }
      .content p{
      text-align: center;
      color: black;
      padding: 0 8px;
      }
      .content h6{
      font-size: 26px;
      text-align: center;
      color: #222f3e;
      margin: 0;
      }
      .content a{
        float: left;
        display: block;
        color: #006b38 ;
        background-color: white;
        text-align: center;
        padding: 3px 6px;
        text-decoration: none;
        font-size: 18px;
        font-family: bevan;
        width:100%;
        box-sizing: border-box;
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
         
         border:2px solid #006b38;
         border-top:100px;
         padding: 0px 0px 0px 0px;
     }
     .topnav {
  overflow: hidden;
  background-color:#006b38;

}

.topnav a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 13px 16px;
  
  text-decoration: none;
  font-size: 15px;
  font-family: bevan;
  width:100%;
  box-sizing: border-box;
  
}
.active{
    background-color: #006b38;
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

<style>

.myButton  {
    margin-top: 20px;
    text-align: center;
    width: auto;
    padding: 20px;
    border: none;
    -webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 5px; 
    background-color: black;
    font-size: 20px;
    color: #fff;
    cursor: pointer;
    opacity: 3;
    }
.myButton:hover {
    background-color: #006b38;
    color: white; 
    } 
.tabx {
	tab-size: 4;
}
.selected {
	background-color: greenyellow;
}

table {
	border-spacing:0;
}

select {
  width:200px;
}


.content{
width: (100% - 250px); margin-top: 60px;padding: 20px;margin-left: 250px;background: url('<?php echo URLROOT; ?>/img/background.jpg') no-repeat;
  background-position: center;
  background-color: cyan;
  height:auto;
  background-size: cover;
  transition: 0.5s;
 } 
</style>

  
  </head>

  <body>
    

 
    <div class="content">
	

<br>
<table>
<tr>

	<td valign="top">

 <table border="1" cellspacing="0" cellpadding="5"  width="280px" bgcolor="white" margin-left="0px">
 

 <tr height="60px">
 <th>Assigned Outlets</th>
 </tr>
 

 <?php foreach($data['outlets'] as $outlets) : ?>
  
 <tr height="10px" align="center" onclick="var s = this.parentNode.querySelector('tr.selected'); s && s.classList.remove('selected'); this.classList.add('selected');">
 <td><a href="<?php echo URLROOT; ?>/OutletsX/showSelectedOutlet/<?php echo $outlets->outlet_id; ?>" target="framename" class="myButton"><?php echo $outlets->outlet_name?></a></td>
 </tr>

 <?php endforeach; ?>

 </table>

  </td>
       
  <td><pre>    </pre></td>

  <td valign="top">

  <iframe src="<?php echo URLROOT; ?>/OutletsX/showSelectedOutlet/5" name="framename" height="360" width="604" scrolling="no" style="display:block; overflow:hidden; " ></iframe>

  </td>

</tr>
</table>
<br> 


</body>
</html>
      