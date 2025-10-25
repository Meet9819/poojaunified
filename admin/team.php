<?php
session_start();
if(!isset($_SESSION["user"]["type"])){
header("Location: login.php");
exit(); }
?>

<?php include "allcss.php" ?>
 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script language="JavaScript" type="text/javascript">
            $(document).ready(function() {
                $("a.btn").click(function(e) {
                    if (!confirm('Are you sure?')) {
                        e.preventDefault();
                        return false;
                    }
                    return true;
                });
            });
        </script>
<body>

<?php include "header.php" ?>


<div id="wrapper">
	<div class="main-content">
		
			<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Add Team</h4>
					<!-- /.box-name -->
					<div class="card-content">
						
<?php
include('db.php');
if (!isset($_FILES['image']['tmp_name'])) {
    echo "";
    }else{
    $file=$_FILES['image']['tmp_name'];
    
   
    $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name= addslashes($_FILES['image']['name']);

            move_uploaded_file($_FILES["image"]["tmp_name"],"../images/team/" . $_FILES["image"]["name"]);

            $img="" . $_FILES["image"]["name"];
 $name = $_POST['name'];
 	 $designation = $_POST['designation']; 
 	 $description = $_POST['description']; 
           
           
            

            $save=mysqli_query($con,"INSERT INTO team (img,name,designation,description) VALUES ('$img','$name','$designation','$description')");
          


           ?>
                <script>
                alert('Successfully Inserted ...');
                window.location.href='team.php';
                </script>
                <?php

                             
    }
?>
  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

						

	

							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label"> Image</label>
								<div class="col-sm-6">
									<input type="file" id="" name="image" required="">
								<p class="help-block">Image should be 285 x 285 in pixels</p>
								</div>

								</div>
						

							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Name </label>
								<div class="col-sm-6">
									<input type="text" name="name" class="form-control" id="" placeholder="Enter name" required="">
								</div>
							</div>

							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Designation</label>
								<div class="col-sm-6">
										<input type="text" name="designation" class="form-control" id="" placeholder="Enter designation" >

								</div>
							</div>
							
							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
										<input type="text" name="description" class="form-control" id="" placeholder="Enter description" >

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





			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Team</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
							
								<th>Image</th><th>name</th><th>designation</th><th>description</th>
									<th>Edit</th>
								<th>Action</th>
							
							</tr>
						</thead>
					

							<?php
/* code for data delete */
if(isset($_GET['del']))
{
    $SQL = mysqli_query($con,"DELETE FROM team WHERE id=".$_GET['del']);

 ?>
                <script>
                alert('Successfully Deleted ...');
                window.location.href='team.php';
                </script>
                <?php

}
/* code for data delete */

$result = mysqli_query($con,"SELECT * FROM team"); 
 $tmpCount = 1;
while($row = mysqli_fetch_array($result))
{

echo '

						<tbody>
							<tr>
								 ';?>
                                                    <td>
                                                        <?php echo $tmpCount++ ?>
                                                    </td>
                                                    <?php echo '
							<td><img style="width:100px" src="../images/team/'.$row['img'].'"></td>
									<td>'.$row['name'].'</td>
							<td>'.$row['designation'].'</td> 	<td>'.$row['description'].'</td>
							<td>
							<a href="teamedit.php?edit_id='.$row['id'].'">
							   <button type="button" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button>
							  </a> 
							  </td>
							<td>
								 <a class="btn btn-danger btn-xs waves-effect waves-light" href="?del='.$row['id'].'"> <i class="fa fa-trash-o"></i></a></td>

							</tr>
						
						</tbody>

                                   

';
}
?>



					</table>
				</div>
				<!-- /.box-content -->
			</div>


	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
	
<?php include "allscripts.php"; ?>
