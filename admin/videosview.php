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
		
			<a class="btn btn-primary" href="videosadd.php"> Video Add </a>

			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">View Videos</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
							
									<th>Link</th>
																				
								
								<th>Action</th>
							
							</tr>
						</thead>
	

	<?php include('db.php');
/* code for data delete */
if(isset($_GET['del']))
{
    $SQL = mysqli_query($con,"DELETE FROM video WHERE id=".$_GET['del']);
 ?>
                <script>
                alert('Successfully Deleted ...');
                window.location.href='videosview.php';
                </script>
                <?php

}
/* code for data delete */

$result = mysqli_query($con,"SELECT * FROM video order by id desc"); 
 $tmpCount = 1;
while($row = mysqli_fetch_array($result))
{

echo '	<tbody>
			<tr>
			 ';?>
                                 <td>
                                     <?php echo $tmpCount++ ?>
                                 </td>
                                <?php echo '
								<td> '.$row['link'].'</td>
								
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
