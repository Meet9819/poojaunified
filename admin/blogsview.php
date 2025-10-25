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
                <div class="box-content card white" style="padding:10px;text-align: right;">
                        <a href="blogsadd.php"><span style="font-weight:bold;background-color: black;" name="view" value="view"  class="btn btn-info btn-xs view_data" data-toggle="modal">Add Blogs</span>           </a>
                </div> 
            </div>

			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">View Blogs</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
							
								<th>Image</th>
									<th>Name</th>
									<th>Description</th>
									
									<th>Date</th>
									 <th>Posted By</th>
									
									<th>Status</th><th>Edit</th>
								<th>Action</th>
							
							</tr>
						</thead>
					

							<?php 
							include('db.php');
/* code for data delete */
if(isset($_GET['del']))
{
    $SQL = mysqli_query($con,"DELETE FROM blogss WHERE id=".$_GET['del']);

 ?>
                <script>
                alert('Successfully Deleted ...');
                window.location.href='blogsview.php';
                </script>
                <?php

}
/* code for data delete */

$result = mysqli_query($con,"SELECT * FROM blogss order by datee desc"); 
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
								<td><img style="width:200px" src="../images/blog/'.$row['img'].'"></td>
								
							
								  <td> '.$row['name'].'</td>

								 <td> '.substr($row['description'],0,200).'...</td>

								 

								 <td> '.$row['datee'].'</td>


 <td> '.$row['postedby'].'</td>

								
														

';  ?> 

 <td><span data="<?php echo $row['id'];?>" class="status_checks btn-sm <?php echo ($row['status'])? 'btn-success' : 'btn-danger'?>"><?php echo ($row['status'])? 'Active' : 'Inactive'?></span></td>

<?php echo '



<td>

<a  href="blogsedit.php?edit_id='.$row['id'].'" style="font-size: 12px;
    line-height: 22px;
    padding: 5px 15px;" class="btn-success btn-xs waves-effect waves-light"><b style="color:white">Edit</b></a> 
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
	
	
<!-- ACTIVE AND INACTIVE KA CODE -->

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).on('click','.status_checks',function(){
var status = ($(this).hasClass("btn-success")) ? '0' : '1';
var msg = (status=='0')? 'Deactivate' : 'Activate';
if(confirm("Are you sure to "+ msg)){
  var current_element = $(this);
  url = "blogsajax.php";
  $.ajax({
  type:"POST",
  url: url,
  data: {id:$(current_element).attr('data'),status:status},
  success: function(data)
    {   
      location.reload();
    }
  });
  }      
});
</script>

     <!-- ACTIVE AND INACTIVE KA CODE -->      
<?php include "allscripts.php"; ?>
