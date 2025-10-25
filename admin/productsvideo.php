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
					<h4 class="box-title">Add Projects Video</h4>
					<!-- /.box-title -->
					<div class="card-content">
						
<?php  $q = $_GET['q'];
include('db.php');
 
 if(isset($_POST['save'])) {
 
 	 $projectsid = $_POST['projectsid'];   
 	 $link = $_POST['link']; 

            $save=mysqli_query($con,"INSERT INTO projectsvideo (projectsid,link) VALUES ('$projectsid','$link')");
          


           ?>
                <script>
                alert('Successfully Inserted ...');
                window.location.href='productsvideo.php?q=<?php echo $q;?>';
                </script>
                <?php

                             
    }
?>
  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

						

	

						 
 							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Youtube Embed Link</label>
								<div class="col-sm-6">
										<input type="text" name="link" class="form-control" id="" placeholder="Enter link" >


										<input type="hidden" value="<?php echo $q;?>" name="projectsid" class="form-control" id="" required placeholder="Enter projectsid" >

								</div>
							</div>

 


							<div class="form-group margin-bottom-0">
									<label for="inp-type-5" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">
										 <input class="btn btn-dark btn-sm waves-effect waves-light" type="submit" name="save" value="Submit" />

								
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
					<h4 class="box-title">Projects Video</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th><th>projectsid</th>  
							
								 <th>link</th>
									
								 
								<th>Action</th>
							
							</tr>
						</thead>
					

							<?php
/* code for data delete */
if(isset($_GET['del']))
{
    $SQL = mysqli_query($con,"DELETE FROM projectsvideo WHERE id=".$_GET['del']);

 ?>
                <script>
                alert('Successfully Deleted ...');
                window.location.href='productsview.php';
                </script>
                <?php

}
/* code for data delete */

$result = mysqli_query($con,"SELECT * FROM projectsvideo where projectsid = $q"); 
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
							<td>'.$row['projectsid'].'</td> 
							 
									<td>'.$row['link'].'</td>
							
  
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
