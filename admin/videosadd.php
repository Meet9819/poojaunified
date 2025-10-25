
<?php
session_start();
if(!isset($_SESSION["user"]["type"])){
header("Location: login.php");
exit(); }
?>

<?php include "allcss.php" ?>




<body>

<?php include "header.php" ?>


<div id="wrapper">
	<div class="main-content">
		
		<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Add Videos</h4>
					<!-- /.box-title -->
					<div class="card-content">
						
<?php
include('db.php');
 if(isset($_POST['save']))
{
   
			$link = $_POST['link'];
   			
   			
            $save=mysqli_query($con,"INSERT INTO video (link) VALUES 
            	('$link')");
          


           ?>
                <script>
                alert('Successfully Inserted ...');
               window.location.href='videosview.php';
                </script>
                <?php

                             
    }
?>
  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
 
 								

							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Link</label>
								<div class="col-sm-6">
									<input type="text" name="link" class="form-control" id="" placeholder="Enter Link" required="">
								</div>
							</div>

							

				
 
							<div class="form-group margin-bottom-0">
									<label for="inp-type-5" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">
										 <input class="btn btn-primary btn-sm waves-effect waves-light" type="submit" name="save" value="Submit" />

								</div>
							</div>


						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>




	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
	
<?php include "allscripts.php"; ?>
