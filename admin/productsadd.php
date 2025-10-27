 <?php
session_start();
if(!isset($_SESSION["user"]["type"])){
header("Location: login.php");
exit(); }
?>

<?php include "allcss.php" ?>


<!--  -->



<body>

<?php include "header.php" ?>


<div id="wrapper">
	<div class="main-content">
		                                     
		<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Add Product</h4>
					<!-- /.box-title -->
					<div class="card-content">

						<?php

include "db.php";

$result = mysqli_query($con, "SELECT * FROM products ORDER BY id DESC LIMIT 1");

while ($row = mysqli_fetch_array($result)) {
    $idcount = $row['id'] + 1;
    
    //echo $idcount;
}
?>

						<form class="form-horizontal" action="productupload.php" method="post" enctype="multipart/form-data" >

 


							<input type="hidden" name="id" value="<?php echo $idcount;?>">

							<input type="hidden" name="status" value="1">

							<div class="form-group">
								<label for="one" class="col-sm-3 control-label">Product Name</label>
								<div class="col-sm-3">
									<input type="text" name="name" class="form-control" id="one" >
								</div>

 
								<div class="col-sm-3">
								 
								</div>


							</div>




							<div class="form-group">
								<label for="three" class="col-sm-3 control-label">Select Category</label>
								<div class="col-sm-3"> 

									<select name="maincat" id="three" class="form-control" >
										  <option> </option>
										   <?php

											include"db.php";

											$result = mysqli_query($con,"SELECT * FROM menu where parent_id = 0 AND status = '1'");
											while($row = mysqli_fetch_array($result))
											{
											echo '<option value="' .$row['menu_id'].'">' .$row['menu_name'].'</option>';
											} 
											?>

									</select> 
								</div>  
								<div class="col-sm-3">
								 
								</div>



								</div>

 


								<div class="form-group">
								<label for="four" class="col-sm-3 control-label">Main Image</label>
								<div class="col-sm-3">
									<input type="file" id="four" name="image" >
									<p class="help-block">Image should be 1000 x 1000 in pixels</p>
								</div>

								 
									 <div class="col-sm-3">
									 
									</div> 
									


								</div>
  

						 

							<div class="form-group">
								<label for="seventeen" class="col-sm-3 control-label">Short Description</label>
								<div class="col-sm-9">
									<textarea class="form-control" name="shortdescription" id="seventeen" ></textarea>
								</div>
							</div>

						 

							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="description" id="text"  ></textarea>  

									    <script>
										        ClassicEditor
										            .create(document.querySelector('#text'))
										            .catch(error => {
										                console.error(error);
										            });
										    </script>

								</div>
							</div>


							<div class="form-group">
								<label for="text2" class="col-sm-3 control-label">Long Description</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="descr" id="text2"  ></textarea>  

									   
									    <script>
										        ClassicEditor
										            .create(document.querySelector('#text2'))
										            .catch(error => {
										                console.error(error);
										            });
										    </script>


								</div>
							</div>


					    
 

					  </div>

							<div class="form-group margin-bottom-0">
									<label for="" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">  
										<input type="submit" name="submit" value="Submit" class="btn btn-dark btn-sm waves-effect waves-light">
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
