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
					<h4 class="box-title">Edit  </h4>
					<!-- /.box-title -->
					<div class="card-content">
						




<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT * FROM terms WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: terms1.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    {
        $title = $_POST['title']; 
      $content = $_POST['content']; 
              
        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
			$stmt = $DB_con->prepare('UPDATE terms SET title=:title,  content=:content WHERE id=:id');

            $stmt->bindParam(':title',$title);   
            $stmt->bindParam(':content',$content);  
            $stmt->bindParam(':id',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='terms1.php';
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
								<label for="inp-type-1" class="col-sm-3 control-label">Title</label>
								<div class="col-sm-6">
									<input type="text" name="title" class="form-control" readonly  id="" placeholder="Enter Title" required=""  value="<?php echo $title; ?>">
								</div>
							</div>
 
							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Content</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="content" id="text"  > <?php echo $content; ?></textarea>  

									   
										    <script>
										        ClassicEditor
										            .create(document.querySelector('#text'))
										            .catch(error => {
										                console.error(error);
										            });
										    </script>
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
