<?php
session_start();
if(!isset($_SESSION["user"]["type"])){
header("Location: login.php");
exit(); }
?>


<?php include "allcss.php" ?>

<style type="text/css">
	/* Light Blue - Base Color */
.color-light-blue {
    background-color: #a78000;
}

/* Orange */
.color-orange {
    background-color: #d8ae2499; 
}

/* Green */
.color-green {
    background-color: #da447f52;
}

/* Yellow */
.color-yellow {
    background-color: #7f0032e6;
}

/* Purple */
.color-purple {
    background-color: #8e286c;
}

.text {
	color: black !important;
	font-weight: bold;
}

.counter {
	    color: white !important;
    font-size: 40px;
    font-weight: bold;
}

.color-one {
    background-color: #d8ae24;
}
.color-two {
    background-color: #d8ae247d;
}
.box-content .box-title {
    color: white !important;
}
</style>

<body>

<?php include "header.php" ?>




<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content"> 



		<div class="row small-spacing">

<!-- 
		<div class="col-lg-3 col-md-6 col-xs-12 ">
		    <div class="box-content color-orange">
		        <h4 class="box-title">New Order</h4> 
		        <div class="content widget-stat"> 
		            <div class="right-content">  
		                <?php
		                include "db.php";

		                // Query to get the number of admin users
		                $result = mysqli_query($con, "SELECT COUNT(1) FROM payment");
		                
		                if ($result) {
		                    $row = mysqli_fetch_array($result);
		                    $total = $row[0];
		                    echo '<h2 class="counter">' . $total . '</h2>';
		                } else {
		                    echo '<h2 class="counter">0</h2>'; // Fallback if query fails
		                    error_log("Error fetching admin user count: " . mysqli_error($con));
		                }
		                ?> 
		                <p class="text">No of New Order</p> 
		            </div> 
		            
		            
		        </div> 
		    </div> 
		</div> 



		<div class="col-lg-3 col-md-6 col-xs-12 ">
		    <div class="box-content color-one">
		        <h4 class="box-title">Properties</h4> 
		        <div class="content widget-stat"> 
		            <div class="right-content">  
		                <?php
		                include "db.php";

		                // Query to get the number of admin users
		                $result = mysqli_query($con, "SELECT COUNT(1) FROM products");
		                
		                if ($result) {
		                    $row = mysqli_fetch_array($result);
		                    $total = $row[0];
		                    echo '<h2 class="counter">' . $total . '</h2>';
		                } else {
		                    echo '<h2 class="counter">0</h2>'; // Fallback if query fails
		                    error_log("Error fetching admin user count: " . mysqli_error($con));
		                }
		                ?> 
		                <p class="text">No of Items</p> 
		            </div> 
		             
		            
		        </div> 
		    </div> 
		</div>
 
		<div class="col-lg-3 col-md-6 col-xs-12 ">
		    <div class="box-content color-two">
		        <h4 class="box-title">Registered User</h4> 
		        <div class="content widget-stat"> 
		            <div class="right-content">  
		                <?php
		                include "db.php";

		                // Query to get the number of admin users
		                $result = mysqli_query($con, "SELECT COUNT(1) FROM payment");
		                
		                if ($result) {
		                    $row = mysqli_fetch_array($result);
		                    $total = $row[0];
		                    echo '<h2 class="counter">' . $total . '</h2>';
		                } else {
		                    echo '<h2 class="counter">0</h2>'; // Fallback if query fails
		                    error_log("Error fetching admin user count: " . mysqli_error($con));
		                }
		                ?> 
		                <p class="text">No of Registered User</p> 
		            </div> 
		            
		            
		        </div> 
		    </div> 
		</div>
		  


		<div class="col-lg-3 col-md-6 col-xs-12 ">
		    <div class="box-content color-light-blue">
		        <h4 class="box-title">Admin Login</h4> 
		        <div class="content widget-stat"> 
		            <div class="right-content">  
		                <?php
		                include "db.php";

		                // Query to get the number of admin users
		                $result = mysqli_query($con, "SELECT COUNT(1) FROM adminlogin");
		                
		                if ($result) {
		                    $row = mysqli_fetch_array($result);
		                    $total = $row[0];
		                    echo '<h2 class="counter">' . $total . '</h2>';
		                } else {
		                    echo '<h2 class="counter">0</h2>'; // Fallback if query fails
		                    error_log("Error fetching admin user count: " . mysqli_error($con));
		                }
		                ?> 
		                <p class="text">No of Admin User</p> 
		            </div> 
		             
		            
		        </div> 
		    </div> 
		</div>
 


 -->

		  



		<div class="col-lg-12 col-md-12 col-xs-12">


 			<div class="title" style="margin: 50px;text-align: center;"> <img style="width:300px;opacity: 0.2;" src="images/logo.png"></div>


		</div>



			<!-- /.col-lg-6 col-xs-12 -->
		</div>
		
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->


<?php include "allscripts.php" ?>