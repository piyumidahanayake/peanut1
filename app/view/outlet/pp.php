<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial  Report</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/payment_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
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
    <div class="dropdown-container">
      <a href="index2"><i class="fas fa-bars"><span></i>New Order</span></a>
      <a href="orderhistory"><i class="fas fa-bars"><span></i>Order History</span></a>
      <a href="accsort"><i class="fas fa-bars"><span></i>Rejected Order</span></a>
      <a href="reportsort"><i class="fas fa-bars"><span></i>Order Report</span></a>
    </div>
        <button class="dropdown-btn ">
            <a href="#"><i class="fas fa-bars"></i><span>Payment</span></a>
        </button>
        
          <div class="dropdown-container ">
            <a href="viewin"><i class="fas fa-bars"><span></i>View Invoice</span></a>
            <a href="pay"><i class="fas fa-bars"><span></i>Pay Online</span></a>
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
        <button class="dropdown-btn" style="background-color: rgba(24, 23, 23, 0.8);">
          <a href="pp"><i class="fas fa-bars"></i><span>Financial Report</span></a>
      </button>
      <button class="dropdown-btn" >
            <a href="collection"><i class="fas fa-bars"></i><span>Collection Center</span></a>
        </button>
        
       
    </div>
    <!--sidebar end-->

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

#tabord {
  border: solid 2px none;
}


.content{
  width: (100% - 350px); margin-top: 30px;padding: 10px;margin-left: 150px;background: url('<?php echo URLROOT; ?>/img/background1.jpg') no-repeat; background-position: center; background-size: cover; height: 98vh; transition: 0.5s; overflow-x:hidden;
}

.testbox{
  margin-left: 10px; width:1200px; padding-left: -190px;
}

#ocs {
  display: none;
}
#ors {
  display: none;
}


</style>

<script type="text/javascript">
function showDiv(divId1, divId2, element) 
{
  document.getElementById(divId2).style.display = element.value == 2 ? 'block' : 'none';
  document.getElementById(divId1).style.display = element.value == 1 ? 'block' : 'none';
}

</script>

    <div class="content">

        <div class="testbox">
		
        <form  method="post" action="<?php echo URLROOT; ?>/financial/report" id="forCheck">
		 

	     
              
		<table padding-top="0px">
			<tr> 
<td width="30px"></td>
 	    
<td width="230px">
</td>	     


	    
            


			</tr>
		</table>
	

		<table padding-top="0px" padding-bottom="2px" padding-top="-8px"> 
			<tr>
<td>
                <label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDuration: </label> 
</td>
<td>	
	<table><tr><td width="150px"><pre>&nbspStart&nbspdate&nbsp</pre></td><td>
                <div class="item"><input type="date" name="from_date"/></td><td>
                <i class="fas fa-calendar-alt"></i></div></td></tr>
	</table>
</td>
<td>
		
	<table><tr><td width="150px"><pre>&nbsp&nbspEnd&nbspdate&nbsp</pre></td><td>
                <div class="item"><input type="date" name="to_date"/></td><td>
                <i class="fas fa-calendar-alt"></i></div></td></tr>
	</table>
           

</td>
			</tr>
		</table>
<table border="0" >
  
<tr align="left" >
  <!--table id="tabord" width="560px"><tr>
	<td valign="top" align="left">Include:</td>
	<td valign="top" align="left">
   
<table width="300px"><tr><td>
		<pre><div>
<input type="checkbox" name="include" id="check1" value="Order_ID" margin-right="-20px">Order ID
<input type="checkbox" name="include" id="check2" value="Ordered_Oulet">Ordered Outlet
<input type="checkbox" name="include" id="check3" value="Ordered_Date">Ordered Date   
</div></pre></td><td><pre>       </pre></td>
		<td><pre><div>   
<input type="checkbox" name="include" id="check4" value="Order_Value">Order Value
<input type="checkbox" name="include" id="check5" value="Quantities_of_Items">Quantities of Items
<input type="checkbox" name="include" id="check6" value="Returned_Amount">Returned Amount
</div></pre></td>
</tr></table-->
	</td><td></td>
</tr></table>
</tr>
<tr><td>.</td></tr>
<tr align="left">
  <table border="0" id="tabord" width="600px"><tr>
	<td valign="top" align="left">Sort by:</td>
	<td valign="top" align="left" width="100px">        
<pre><div><input type="radio" name="sort" id="radio1" value="Date" checked>Date</div></pre>
<pre><div><input type="radio" name="sort" id="radio1" value="Value">Product</div></pre>
	</td><td width="350px"></td>
</tr></table>
</tr>
<tr><tr><td>.</td></tr></tr>
<tr align="left">
  <!--table border="0" id="tabord" width="560px"><tr>
	<td valign="top" align="left">Calculate:</td>
	<td valign="top" align="left" width="100px">
		<pre><div>
<input type="checkbox" name="calculate" id="check11" value="Total_Qty">Total quantities
<input type="checkbox" name="calculate" id="check22" value="Total_Rtrn">Total returns
<input type="checkbox" name="calculate" id="check33" value="Total_Rvn">Total revenue
</div></pre>
		
	</td><td width="320px"></td></tr></table-->
</tr>

<tr> <table><tr>
	<td valign="top" align="right" margin-left="170px" padding-left="100px">Comments/ Suggestions<!--/Graphs-->: </td>
	<td align="left" width="15px" height="30px">
		
		<textarea id="commsugg" name="comments" cols="20" rows="3" padding-left="20px"></textarea>
		
		
	</td><td valign="top" align="left">

<div class="btn-vlock" style="align:right; padding-top:20px; padding-right:100px; padding-left:170px; height:8px;">
                <button type="submit">Generate Report</button>
	</td>
</tr></table>
</tr>
</table>
	      </div>
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
      