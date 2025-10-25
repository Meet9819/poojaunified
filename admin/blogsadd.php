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
					<h4 class="box-title">Add Blogs</h4>
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

            move_uploaded_file($_FILES["image"]["tmp_name"],"../images/blog/" . $_FILES["image"]["name"]);

            $img="" . $_FILES["image"]["name"];

  $name = $_POST['name'];

    $description = $_POST['description'];
    $metatitle = $_POST['metatitle'];
    $metatag = $_POST['metatag'];
    $metadescription = $_POST['metadescription'];
      
    $metakeywords = $_POST['metakeywords'];

   		
   			$datee = $_POST['datee']; 

   			$postedby = $_POST['postedby'];
   			
      		$status = 1;

            $save=mysqli_query($con,"INSERT INTO blogss (img,name,description,datee,status,postedby,metatitle,metatag,metadescription,metakeywords) 
            VALUES ('$img','$name','$description','$datee','$status','$postedby','$metatitle','$metatag','$metadescription','$metakeywords')");
          
 

 

           ?>
                <script>
                alert('Successfully Inserted ...');
                window.location.href='blogsview.php';
                </script>
                <?php

                             
    }
?>
  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
 
 		<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label"> Image</label>
								<div class="col-sm-6">
									<input type="file" id="" name="image" required="">
								<p class="help-block">Image should be 3527 x 2372 in pixels</p>
								</div>

								</div>


							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Title</label>
								<div class="col-sm-6">
									<input type="text" name="name" class="form-control" id="" placeholder="Enter Title" required="">
								</div>
							</div>

	
					
	<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="description" id="text" placeholder="Write your Product Description"></textarea>  

  							    
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
								<label for="inp-type-1" class="col-sm-3 control-label">Posted by</label>
								<div class="col-sm-6">
									<input type="text" name="postedby" class="form-control" id="" placeholder="Enter Posted by" required="">
								</div>
							</div>



							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Date</label>
								<div class="col-sm-6">
									<input type="date" name="datee" class="form-control" id="" placeholder="Enter Date" required="">
								</div>
							</div> 
	<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Meta Title</label>
								<div class="col-sm-6">
									<input type="text" name="metatitle" class="form-control" id="" placeholder="Enter metatitle" required="">
								</div>
							</div>

	<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Meta Tag</label>
								<div class="col-sm-6">
									<input type="text" name="metatag" class="form-control" id="" placeholder="Enter metatag" required="">
								</div>
							</div>
	<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Meta Description</label>
								<div class="col-sm-6">
									<input type="text" name="metadescription" class="form-control" id="" placeholder="Enter metadescription" required="">
								</div>
							</div>
	<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Meta Keywords</label>
								<div class="col-sm-6">
									<input type="text" name="metakeywords" class="form-control" id="" placeholder="Enter metakeywords" required="">
								</div>
							</div>



							<div class="form-group margin-bottom-0">
									<label for="inp-type-5" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">
										 <input class="btn btn-dark btn-sm waves-effect waves-light" type="submit" name="Submit" value="Submit" />

								
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
