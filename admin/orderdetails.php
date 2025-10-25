<?php
session_start();
if(!isset($_SESSION["user"]["type"])){
header("Location: login.php");
exit(); 
}
?>

<?php include "allcss.php" ?>

 <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

  <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css'>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">


<body>
<?php include "header.php" ?>
<div id="wrapper"> 




	<div class="main-content"> 
									<?php
									    error_reporting( ~E_NOTICE );    
									    require_once 'dbconfig.php';  
									    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
									    {
									        $id = $_GET['edit_id'];
									        $stmt_edit = $DB_con->prepare('SELECT status,deliveryboy,discount FROM payment WHERE id =:id');
									        $stmt_edit->execute(array(':id'=>$id));
									        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
									        extract($edit_row);
									        $statussss = $edit_row['status'];  
											
									        $deliveryboy = $edit_row['deliveryboy']; $discount = $edit_row['discount']; 
									    }


if(isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
} else {
    die("Error: ID not provided.");
}
									        
if(isset($_POST['btn_save_updates'])) {
 $status = $_POST['status'] ?? 0;
$deliveryboy = $_POST['deliveryboy'] ?? '';
$discount = !empty($_POST['discount']) ? $_POST['discount'] : 0;

    // Ensure database connection is valid
    if($DB_con) {
        $stmt = $DB_con->prepare('UPDATE payment SET status=:status, deliveryboy=:deliveryboy, discount=:discount WHERE id=:id');
        $stmt->bindParam(':status', $status);    
        $stmt->bindParam(':deliveryboy', $deliveryboy);       
        $stmt->bindParam(':discount', $discount);    
        $stmt->bindParam(':id', $id);                

        if($stmt->execute()) {
            echo "<script>alert('Successfully Updated ...'); window.location.href='order.php';</script>";
        } else {
            echo "<script>alert('Sorry, Data Could Not Be Updated!');</script>";
        }
    } else {
        echo "<script>alert('Database Connection Failed!');</script>";
    }
}
									    
									?>

                                <div class="row small-spacing">
									
									    <div class="col-xs-6">
                                        <div class="box-content"> 	<h4 class="box-title">Bill No -  <?php echo $_GET['billno']; ?></h4> 	
										<p style="   font-size: 16px;    text-align: left;    font-weight: 500;">						
											<?php 
											$bill_no = $_GET["billno"]; 
											$email = $row['email'];
											?> 
											<?php 
											include('db.php');       
					                                        $result = mysqli_query($con, "SELECT * FROM payment where billno = '$bill_no' limit 1"); 
					                                        while ($row = mysqli_fetch_array($result)) {  
					                                        echo 'Name -'.$name = $row['name'].'<br>';
					                                        echo 'Email Id -'.$email = $row['email'];
					                                        echo 'Contact No -'.$phone = $row['phone'].'<br>';
					                                        echo 'Mode of Payment -'.$modeofpayment = $row['modeofpayment'].'<br>';
					 										echo 'Address -'.$address = $row['address'].'<br>';
					                                        echo 'Delivery Boy -'.$deliveryboy = $row['deliveryboy'].'<br>';
                                                            echo 'Payment Id -'.$row['paymentid'].'<br>';
                                                            echo 'Ship Rocket Id -'.$row['shiprocket'];
					                                       }
					                                    ?> 

										</p> 
											
											<a href="order.php" class="btn btn-danger btn-sm waves-effect waves-light">Close </a>
											<?php echo '<a target="_blank" href="billprint.php?billno='.$bill_no.'&user='.$email.'" class="btn btn-info btn-sm waves-effect waves-light">Print </a> ';?>

                                            

                                            <a target="_blank" href="https://app.shiprocket.in/seller/home" class="btn btn-success btn-sm waves-effect waves-light">SHIP ROCKET  </a>
				
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="box-content">
                                          
										
                                         
                                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                            	  <div class="form-group">
                                                        <label for="inp-type-1" class="col-sm-3 control-label">Discount %</label>
                                                        <div class="col-sm-6">
                                                          <input type="text" name="discount" class="form-control" value="<?php echo $discount; ?>">
                                                        </div>
                                                    </div>


                                                  <div class="form-group">
                                                        <label for="inp-type-1" class="col-sm-3 control-label">Delivery Boy</label>
                                                        <div class="col-sm-6">
                                                           
                                                            <select name="deliveryboy" class="form-control">  

                                                            <option value="<?php echo $deliveryboy; ?>"><?php echo $deliveryboy; ?></option>
                                                            <?php 
                                                                include('db.php');     
                                                                $result = mysqli_query($con,"SELECT * from adminlogin where type = 'Delivery Boy'"); 
                                                                 while($row = mysqli_fetch_array($result))
                                                                {
                                                                echo ' <option value="'.$row['username'].' / '.$row['contact'].'">'.$row['username'].'</option> ';
                                                                } ?>                                                             
                                                            </select>
                                                        </div>
                                                    </div>
                                               
							                            <div class="form-group">
							                                <label for="inp-type-1" class="col-sm-3 control-label">Status</label>
							                                <div class="col-sm-6">
							                                   
							                                    <select name="status" class="form-control"> 
																	
																	<?php 
																	
																	$statussss = $edit_row['status']; 
																	
																	if($statussss == '0'){
																		$statusvalue = 'Received Order';
																	}
																	else if($statussss == '1'){
																		$statusvalue = 'Processed';
																	}
																	else if($statussss == '2'){
																		$statusvalue = 'Shipped';
																	}
																	else if($statussss == '3'){
																		$statusvalue = 'Delivered';
																	}else if($statussss == '4'){
																		$statusvalue = 'Cancelled';
																	}
																	?>
							                                        <option value="<?php echo $statussss; ?>"><?php echo $statusvalue; ?></option>
							                                        <option value="0">0 - Received Order</option>
							                                        <option value="1">1 - Processed</option>  
							                                        <option value="2">2 - Shipped</option>  
							                                        <option value="3">3 - Delivered</option> 
							                                         <option value="4">4 - Cancelled</option>
							                                    </select>
							                                </div>
							                            </div>                        

                                                <div class="form-group margin-bottom-0" style="   text-align: center;">
                                                    <br>
                                                    <input class="btn btn-success btn-sm waves-effect waves-light" type="submit" name="btn_save_updates" value="Update" />
													
													

                                                </div>

                                            </form>
                                        </div>
                                      
                                    </div>
                             

                                  


                                </div> 




		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content">
							
					 <table id="example" class="table table-striped table-bordered display" style="width:100%">
    <thead>
        <tr>
            <th>Invoice No</th>
            <th>Product Code</th>    
            <th>Product Name</th>
            <th>Qty</th>
            <th>GP Price</th>    
            <th>Units</th>
            <th>Sub Total</th>                                            
            <th> Shipping Charges</th> 
            <th>Action</th>     
            <th>Delete</th> 
        </tr>
    </thead>

    <tbody>
        <?php 
        include('db.php');

        $o = $_GET['edit_id']; 
        $result = mysqli_query($con, "SELECT * FROM payment WHERE id = '$o'"); 

        while ($row = mysqli_fetch_array($result)) {
            $bil = $row['billno'];
        }

        // Fetch order details from 'o' table
        $result = mysqli_query($con, "SELECT * FROM o WHERE billno = '$bil'"); 

        // Initialize sum variables
        $total_subtotal = 0;
        $total_finalamount = 0;
        $total_shippingcharge = 0;

        while ($row = mysqli_fetch_array($result)) {
            // Sum up the total values
            $total_subtotal += $row['subtotal'];
            $total_finalamount += $row['finalamount'];
            $total_shippingcharge += $row['shippingcharge'];

            echo '            
            <tr>                                  
                <td>'.$row['billno'].'</td>
                <td>'.$row['productcode'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['qty'].'</td> 
                <td>&#8377; '.$row['price'].'</td>    
                <td>'.$row['weight'].' '.$row['units'].'</td>                        
                <td>&#8377; '.$row['subtotal'].'</td> 
                <td>&#8377; '.$row['shippingcharge'].'</td>                            
                <td>'.$row['datee'].' </td> '; ?>
                <td>
                    <span data="<?php echo $row['id'];?>" class="status_checks btn-sm <?php echo ($row['status']) ? 'btn-success' : 'btn-danger'?>">
                        <?php echo ($row['status']) ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>'?>
                    </span>
                </td>
            <?php echo '</tr>'; 
        } ?>
    </tbody>

    <!-- Display the Total Row -->
    <tfoot>
        <tr>
            <td colspan="6" style="text-align: right;"><strong>Total:</strong></td>
            <td><strong>&#8377; <?php echo number_format($total_subtotal, 2); ?></strong></td>
            <td><strong>&#8377; <?php echo number_format($total_shippingcharge, 2); ?></strong></td>
            <td colspan="2"></td>
        </tr>
    </tfoot>
</table>

				</div>

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
				<script type="text/javascript">
				$(document).on('click','.status_checks',function(){
				var status = ($(this).hasClass("btn-success")) ? '0' : '1';
				var msg = (status=='0')? 'Not Available' : 'Available';
				if(confirm("Are you sure to "+ msg)){
				  var current_element = $(this);
				  url = "canceldeliver.php";
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
			</div>
		</div>
	</div>



</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
         "order": [[ 1, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>


    <script src="assets/scripts/modernizr.min.js"></script>
    <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/plugin/nprogress/nprogress.js"></script>
    <script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
    <script src="assets/plugin/waves/waves.min.js"></script>
    <!-- Full Screen Plugin -->
    <script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

    <!-- Percent Circle -->
    <script src="assets/plugin/percircle/js/percircle.js"></script>

    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Chartist Chart -->
    <script src="assets/plugin/chart/chartist/chartist.min.js"></script>
    <script src="assets/scripts/chart.chartist.init.min.js"></script>

    <!-- FullCalendar -->
    <script src="assets/plugin/moment/moment.js"></script>
    <script src="assets/plugin/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/scripts/fullcalendar.init.js"></script>

    <script src="assets/scripts/main.min.js"></script>


