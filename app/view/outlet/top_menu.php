<?php
if (isset($_SESSION["name"])) {
  ?>
   <ul class="nav navbar-nav navbar-right">
	<li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION["name"]; ?> </a></li>
	<li class="active" ><a href="index2"><span class="glyphicon glyphicon-cutlery"></span> Food List </a></li>
	<li><a href="index2"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
	  if(isset($_SESSION["cart"])){
	  $count = count($_SESSION["cart"]); 
	  echo "$count"; 
		}
	  else
		echo "0";
	  ?>) </a></li>
	
  </ul>
<?php        
}
?>