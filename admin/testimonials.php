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
					<h4 class="box-title">Add Testimonials</h4>
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

            move_uploaded_file($_FILES["image"]["tmp_name"],"../images/testimonial/" . $_FILES["image"]["name"]);

            $img="" . $_FILES["image"]["name"];

  $name = $_POST['name'];

    $post = $_POST['post'];
      $message = $_POST['message'];
      $star = $_POST['star'];
 

            $save=mysqli_query($con,"INSERT INTO testimonials (name,post,message,img , star ) VALUES ('$name','$post','$message','$img','$star')");
          


           ?>
                <script>
                alert('Successfully Inserted ...');
                window.location.href='testimonials.php';
                </script>
                <?php

                             
    }
?>
  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">





					


							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Customer Name</label>
								<div class="col-sm-6">
									<input type="text" name="name" class="form-control" id="" placeholder="Enter Client Name" >
								</div>
							</div>

							<div  class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">User Pic </label>
								<div class="col-sm-6">
									<input type="file" id="" name="image" >
								<p class="help-block">Image should be 140 x 32 in pixels</p>
								</div>

								</div>


						<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Designation</label>
								<div class="col-sm-6">
									<input type="text" name="post" class="form-control" id="" placeholder="Enter Post of User " >
								</div>
							</div>


						<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Message </label>
								<div class="col-sm-6">
									<input type="text" name="message" class="form-control" id="" placeholder="Enter Message " >
								</div>
							</div>



							<div  class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">star </label>
								<div class="col-sm-6">
									<input type="number" minlength="3" maxlength="5" name="star" class="form-control" id="" placeholder="Enter star" >
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
					<h4 class="box-title">Testimonials</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
 								 
									<th>Customer Name</th>
									<th>Designation</th>
									<TH>Message</TH> 


								<th>Action</th>
							
							</tr>
						</thead>
					

							<?php
/* code for data delete */
if(isset($_GET['del']))
{
    $SQL = mysqli_query($con,"DELETE FROM testimonials WHERE id=".$_GET['del']);

 ?>
                <script>
                alert('Successfully Deleted ...');
                window.location.href='testimonials.php';
                </script>
                <?php

}
/* code for data delete */

$result = mysqli_query($con,"SELECT * FROM testimonials order by id desc"); 
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
								 
								<td>'.$row['name'].'</td>
							<td>'.$row['post'].'</td>
								<td>'.$row['message'].'</td> 
							
								  <td> 


<a  href="testimonialsedit.php?edit_id='.$row['id'].'" style="font-size: 12px;line-height: 22px; padding: 5px 15px;" class="btn-success btn-xs waves-effect waves-light"><b style="color:white">Edit</b></a> 

								 <a class="btn btn-danger btn-xs waves-effect waves-light" href="?del='.$row['id'].'"> <i class="fa fa-trash-o"></i></a> </td>

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
