<?php
session_start();
if(!isset($_SESSION["user"]["type"])){
header("Location: login.php");
exit(); }
?>


<?php include "allcss.php" ?>
 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<body>

<?php include "header.php" ?>


<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Sale Product</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
								<th>Main Image</th>
								<th>Product Name</th> 
							<th>SALE</th> 
						

							</tr>
						</thead>
					
						<tbody>
								<?php 
								include('db.php');
/* code for data delete */
if(isset($_GET['del']))
{
    $SQL = mysqli_query($con,"DELETE FROM products WHERE id=".$_GET['del']);

 ?>
                <script>
                alert('Successfully Deleted ...');
                window.location.href='productsview.php';
                </script>
                <?php

}
/* code for data delete */

$result = mysqli_query($con,"SELECT * FROM products order by sale desc"); 

 $tmpCount = 1;

while($row = mysqli_fetch_array($result))
{

echo '

					
							<tr>
								  ';?>
                                                    <td>
                                                        <?php echo $tmpCount++ ?>
                                                    </td>
                                                    <?php echo '
						 
<td style="width:5%"><img style="width:50px" src="../images/products/'.$row['img'].'"> <br>'.$row['img'].'</td>
								<td>'.$row['name'].'</td> 
											

  ';?> <td><span data="<?php echo $row['id'];?>" class="status_checks btn-sm <?php echo ($row['sale'])? 'btn-warning' : 'btn-info'?>"><?php echo ($row['sale'])? 'Sale' : 'Not in Sale'?></span></td>
<?php echo '
   


							</tr>

						


							'; } ?>

						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>
		
			<!-- /.col-xs-12 -->
		</div>
		<!-- /.row small-spacing -->		
	
	</div>
	<!-- /.main-content -->
</div>
<!-- ACTIVE AND INACTIVE KA CODE -->

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).on('click','.status_checks',function(){
  var status = ($(this).hasClass("btn-warning")) ? '0' : '1';
  var msg = (status == '0') ? 'Deactivate' : 'Activate';

  if (confirm("Are you sure to " + msg)) {
    var current_element = $(this);
    $.ajax({
      type: "POST",
      url: "productsaleajax.php",
      data: {
        id: $(current_element).attr('data'),
        status: status
      },
      success: function(response) {   
        if (response == "1") {
          location.reload(); // or replace with DataTable reload
        } else {
          alert("Failed to update sale status.");
        }
      }
    });
  }      
});
</script>


     <!-- ACTIVE AND INACTIVE KA CODE -->  

<?php include "allscripts.php"; ?>
