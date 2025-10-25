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
					<h4 class="box-title">Edit Blogs </h4>
					<!-- /.box-title -->
					<div class="card-content">
						




<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT * FROM blogss WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: blogsview.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    {
        $name = $_POST['name'];
         $postedby = $_POST['postedby'];
      $description = $_POST['description'];
  $datee = $_POST['datee'];  $metatitle = $_POST['metatitle'];
    $metatag = $_POST['metatag'];
    $metadescription = $_POST['metadescription'];
      
    $metakeywords = $_POST['metakeywords'];


        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];
                    
        if($imgFile)
        {
            $upload_dir = '../images/blog/'; // upload directory 
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $img = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$edit_row['img']);
                    move_uploaded_file($tmp_dir,$upload_dir.$img);
                }
                else
                {
                    $errMSG = "Sorry, your file is too large it should be less then 5MB";
                }
            }
            else
            {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
            }   
        }
        else
        {
            // if no image selected the old image remain as it is.
            $img = $edit_row['img']; // old image from database
        }   
                        
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
$stmt = $DB_con->prepare('UPDATE blogss SET name=:name,  img=:img,description=:description,  postedby=:postedby,datee=:datee, metatitle=:metatitle,metatag=:metatag,metadescription=:metadescription,
metakeywords=:metakeywords
    WHERE id=:id');
            $stmt->bindParam(':name',$name);    
            $stmt->bindParam(':img',$img);
              $stmt->bindParam(':postedby',$postedby);
             $stmt->bindParam(':description',$description);
             $stmt->bindParam(':metatitle',$metatitle);
             $stmt->bindParam(':metatag',$metatag);
             $stmt->bindParam(':metadescription',$metadescription);
             $stmt->bindParam(':metakeywords',$metakeywords);

  $stmt->bindParam(':datee',$datee);

            $stmt->bindParam(':id',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='blogsview.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }
        
        }
        
                        
    }
    
?>




  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
 
 		<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label"> Image</label>
								<div class="col-sm-6"> 

									  <img src="../images/blog/<?php echo $img; ?>" height="70" width="150" />

  <input type="file" name="user_image" accept="image/*" />

								<p class="help-block">Image should be 3527 x 2372 in pixels</p>
								</div>

								</div>


							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Title</label>
								<div class="col-sm-6">
									<input type="text" name="name" class="form-control" id="" placeholder="Enter Title" required=""  value="<?php echo $name; ?>">
								</div>
							</div>

	
							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Posted By</label>
								<div class="col-sm-6">
									<input type="text" name="postedby" class="form-control" id="" placeholder="Enter Posted By" required=""  value="<?php echo $postedby; ?>">
								</div>
							</div>


					
	<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="description" id="text" placeholder="Write your Product Description"> <?php echo $description; ?></textarea>  

 
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
								<label for="inp-type-1" class="col-sm-3 control-label">Date</label>
								<div class="col-sm-6">
									<input type="date" name="datee" class="form-control" id="" placeholder="Enter Date" value="<?php echo $datee; ?>">
								</div>
							</div>

	<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Meta Title</label>
								<div class="col-sm-6">
									<input type="text" name="metatitle" class="form-control" id="" placeholder="Enter metatitle" required="" value="<?php echo $metatitle; ?>">
								</div>
							</div>

	<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Meta Tag</label>
								<div class="col-sm-6">
									<input type="text" name="metatag" class="form-control" id="" placeholder="Enter metatag" required="" value="<?php echo $metatag; ?>">
								</div>
							</div>
	<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Meta Description</label>
								<div class="col-sm-6">
									<input type="text" name="metadescription" class="form-control" id="" placeholder="Enter metadescription" required="" value="<?php echo $metadescription; ?>">
								</div>
							</div>
	<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Meta Keywords</label>
								<div class="col-sm-6">
									<input type="text" name="metakeywords" class="form-control" id="" placeholder="Enter metakeywords" required="" value="<?php echo $metakeywords; ?>">
								</div>
							</div>


						


							<div class="form-group margin-bottom-0">
									<label for="inp-type-5" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">
									   <input class="btn btn-dark btn-sm waves-effect waves-light" type="submit"  name="btn_save_updates" value="Update" /> 




								
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
