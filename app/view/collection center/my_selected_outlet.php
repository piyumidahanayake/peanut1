<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection Center - Selected Outlet Details</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/itocc_style.css">
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

      

<style> 
.tabx {
	tab-size: 4;
}

.content {
    width: 100%;
    margin-top: -50px;
    padding: 0px;
    margin-left: 0px;
    background:url('<?php echo URLROOT; ?>/img/background.jpg') no-repeat; 
    background-position: center;
    background-size: 100%;
    height:3000px;
    transition: 0.5s;
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
         margin-top: 30px;
         border:2px solid #006b38;
         border-top:100px;
         padding: 0px 0px 0px 0px;
         width: 600px;
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
    width: 300px;
    padding: 0px;
    border: none;
    -webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 5px; 
    background-color: black;
    font-size: 22px;
    color: #fff;
    cursor: pointer;
    opacity: 3;
    }
.myButton:hover {
    background-color: greenyellow;
    color: white; 
    } 
.tabx {
	tab-size: 4;
}
.selected button {
  background-color: darkgreen;
}

table {
	border-spacing:0;
}

#mybutton {
  height:30px; padding-top:2px; padding-bottom:2px;
}

form {
  width:280px; padding-right:0px; box-shadow:none; padding-bottom:0px; padding-left:0px; padding-top:0px;
}

select {
  width:200px;
}
</style>

  
  </head>
  <body>
   
<br>
<div class="content">
   <div class="new">
      <div class="topnav"> 
        <a class="active">Basic Details</a>
      </div> 
<form>
        <table border="0" cellspacing="0" width="600px" bgcolor="white" padding-top="30px">

         <tr height="60px">
         <td><pre>    </pre></td>
         <th align="left">Outlet:</th>
         <th align="left"><?php echo $data['sOutlet']->outlet_name; ?> </th>
        </tr>

 <tr height="60px"><td><pre>    </pre></td><th align="left">Location:</th><th align="left"><?php echo $data['sOutlet']->address; ?></th></tr>
 <tr height="60px"><td><pre>    </pre></td><th align="left">Contact Number:</th><th align="left"><?php echo $data['sOutlet']->con_number; ?></th></tr>
 <tr height="60px"><td><pre>    </pre></td><th align="left">Email:</th><th align="left"><?php echo $data['sOutlet']->email; ?></th></tr>
 <tr height="60px"><td><pre>    </pre></td><th align="left">Manager's name:</th><th align="left"><?php echo $data['sOutlet']->manager_name; ?></th></tr>



</table>
</form>
<!--div class="topnav">
        <a href="<-?php echo URLROOT; ?>/intermediateoperatorpages/ccdetails"> Back </a> 
      </div-->
</div>
</div>
	

 

  


  </body>
</html>
      