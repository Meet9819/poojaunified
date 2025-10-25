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
					<h4 class="box-title">Add Project Gallery</h4>
					<!-- /.box-title -->
					<div class="card-content">
						
<?php $q = $_GET['q'];
include('db.php');
if (!isset($_FILES['image']['tmp_name'])) {
    echo "";
    }else{
    $file=$_FILES['image']['tmp_name'];
    
   
    $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name= addslashes($_FILES['image']['name']);

            move_uploaded_file($_FILES["image"]["tmp_name"],"media/projects/" . $_FILES["image"]["name"]);

            $img="" . $_FILES["image"]["name"];
 $projectsid = $_POST['projectsid']; 
           
            

            $save=mysqli_query($con,"INSERT INTO projectsimages (img,projectsid ) VALUES ('$img','$projectsid' )");
          


           ?>
                <script>
                alert('Successfully Inserted ...');
                window.location.href='productsgallery.php?q=<?php echo $q;?>';
                </script>
                <?php

                             
    }
?>
  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

						<input type="hidden" value="<?php echo $q;?>" name="projectsid" class="form-control" id="" required placeholder="Enter projectsid" >


							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Project name</label>
								<div class="col-sm-6">

								<?php 

								 $result = mysqli_query($con,"SELECT p.id,p.categoryid, c.title as category, p.img,p.title,p.area,p.datee,p.location,p.description,p.status FROM `projects` p LEFT JOIN `category` c on p.categoryid = c.id where p.id = $q"); 
								 
									while($row = mysqli_fetch_array($result))
									{

									echo '<input type="text" id="" name="" class="form-control" readonly value="'.$row['category'].'" >';
									
									}
								?>

							 
								</div>

								</div> 


							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Image</label>
								<div class="col-sm-6">
									<input type="file" id="" name="image" required="">
								<p class="help-block">Desktop Image should be 1400 x 802 in pixels </p>
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
					<h4 class="box-title">Gallery</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
							
								<th>Image</th> <th style="display:none;">Project</th>
									
									 
								<th>Action</th>
							
							</tr>
						</thead>
					

							<?php
/* code for data delete */
if(isset($_GET['del']))
{
    $SQL = mysqli_query($con,"DELETE FROM projectsimages WHERE id=".$_GET['del']);

 ?>
                <script>
                alert('Successfully Deleted ...');
                window.location.href='productsgallery.php?q=<?php echo $_GET['goto'];?>';
                </script>
                <?php

}
/* code for data delete */

$result = mysqli_query($con,"SELECT * FROM projectsimages where projectsid = $q order by id desc"); 
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
								<td><img style="width:100px" src="media/projects/'.$row['img'].'"></td>
									<td style="display:none">'.$row['projectsid'].'</td>
							 
								<td> <a class="btn btn-danger btn-xs waves-effect waves-light" href="?del='.$row['id'].'&goto='.$q.'"> <i class="fa fa-trash-o"></i></a></td>

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
