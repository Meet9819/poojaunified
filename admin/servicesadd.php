
 </head>

  
  




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
					<h4 class="box-title">Add Services</h4>
					<!-- /.box-title -->
					<div class="card-content">
						
<?php
include('db.php');
if (!isset($_FILES['image']['tmp_name'])) {
    echo "";
    }else{
    $file=$_FILES['image']['tmp_name'];
    
   
    $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name= addslashes($_FILES['image']['name']);

            move_uploaded_file($_FILES["image"]["tmp_name"],"media/services/" . $_FILES["image"]["name"]);

            $img="" . $_FILES["image"]["name"]; 
   			
   			$description = $_POST['description']; 
   			$title = $_POST['title'];
   			$category = $_POST['category'];
   			$long_description = $_POST['long_description']; 
   			 
		    
   			
            $save=mysqli_query($con,"INSERT INTO services (img,description,title,category, long_description) VALUES 
            	('$img','$description','$title','$category','$long_description')");
          


           ?>
                <script>
                alert('Successfully Inserted ...');
               window.location.href='servicesview.php';
                </script>
                <?php

                             
    }
?>
  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
 
 								


 							<div   class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label"> Image</label>
								<div class="col-sm-6">
									<input required type="file" id="" name="image" >
								<p class="help-block">Image should be 800 x 385 in pixels</p>
								</div>
							</div> 



							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Category</label>
								<div class="col-sm-6">
									<select type="text" name="category" class="form-control" id="">
										<option>TECHNICALSUPPORT</option>
										<option>DIGITALMARKETING</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Service name</label>
								<div class="col-sm-6">
									<input type="text" name="title" class="form-control" id="" placeholder="Enter Title" >
								</div>
							</div>

							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">  Description</label>
								<div class="col-sm-6">
										<textarea class="form-control" name="description" id="description" placeholder="Enter   Description"></textarea>  

																			    
										     <script>
										        ClassicEditor
										            .create(document.querySelector('#description'))
										            .catch(error => {
										                console.error(error);
										            });
										    </script>  

									  
								</div>
							</div>
							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">  Long Description</label>
								<div class="col-sm-6">
										<textarea class="form-control" name="long_description" id="long_description" placeholder="Enter   Description"></textarea>  

																			    
										     <script>
										        ClassicEditor
										            .create(document.querySelector('#long_description'))
										            .catch(error => {
										                console.error(error);
										            });
										    </script>  

									  
								</div>
							</div>

					 
 
														<div class="form-group margin-bottom-0">
									<label for="inp-type-5" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">
										 <input class="btn btn-primary btn-sm waves-effect waves-light" type="submit" name="Submit" value="Submit" />

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
