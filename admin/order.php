<?php
session_start();
if(!isset($_SESSION["user"]["type"])){
header("Location: login.php");
exit(); 
}
?>

<?php include "allcss.php"; ?>

 <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

  <link rel='stylesheet' href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css'>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">


 <script language="JavaScript" type="text/javascript">
            $(document).ready(function() {
                $("a.delete").click(function(e) {
                    if (!confirm('Are you sure?')) {
                        e.preventDefault();
                        return false;
                    }
                    return true;
                });
                
            });
            
           /* function checkUncheckAllManifest()    {
                var a = document.getElementsByName("add-to-manifest");
                for (var i = 0; i < a.length; i++) {
                    a[i].checked ? a[i].checked = false : a[i].checked = true;
                }
            }
            
            function generateShippingManifest() {
                var url = "https://sadhanamotors.com/admin/generate_shipping_manifest.php?";
                var a = document.getElementsByName("add-to-manifest");
                for (var i = 0; i < a.length; i++) {
                    if (a[i].checked)   {
                        url += "billno[]=" + a[i].value + "&";
                    }
                }
                
                url = url.substr(0, url.length - 1);
                
                window.open(url);
            }*/
</script>

<body>
<?php include "header.php" ?>
<div id="wrapper">
	<div class="main-content">  
		<div class="row small-spacing">
			<div class="col-xs-12">
				<div class="box-content" >
					<h4 class="box-title">Orders</h4>
				
				
				
					<!-- /.dropdown js__dropdown 
					<div style="margin: 5px;" >
					    <a type="button" class="btn btn-dark btn-sm waves-effect waves-light" onclick="generateShippingManifest()">Generate Shipping Manifest</a>
					</div>  -->
					
					<div class="col-xs-12" style="    overflow-x: auto;">
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
							   
							       <!--  <th title="Select All"><button class="btn btn-dark btn-sm waves-effect waves-light" onclick="checkUncheckAllManifest()" title="Add All to Manifest">
							            <span class="fas fa-plus"></span>
							        </button>  </th>-->
							   
								<th>Invoice No </th>    
                                <th>Order Id  </th> 
                                 <th>Mobile No</th>
								<th>User Email Id</th>
                              <th>Date / Time</th>
                               <th>Paid Amount</th> 
                                <th>Mode of Payment</th> 
                               
								
                                <th style="width:14%">View / Print Bill</th>
                                <th>Received Order </th>
								
							</tr>
						</thead>
						<tbody>
			<?php 
			include('db.php');
                /* code for data delete */
                if(isset($_GET['del']))
                {
                    $SQL = mysqli_query($con,"DELETE FROM payment WHERE id=".$_GET['del']);

                 ?>
                <script>
                alert('Successfully Deleted ...');
                window.location.href='order.php';
                </script>
                <?php

                    }
                    /* code for data delete */
                     
                    $result = mysqli_query($con,"SELECT 
                                                    p.id AS id, 
                                                    p.status AS status, 
                                                    p.billno, 
                                                    p.name, 
                                                    p.email, 
                                                    p.phone,  
                                                    p.product_name, 
                                                    p.paymentid, 
                                                    p.address, 
                                                    p.productcode, 
                                                    p.created, 
                                                    p.modeofpayment, 
                                                    p.paymentid, 
                                                    COALESCE(o.total_sum, 0) AS total_sum
                                                FROM `payment` p  
                                                LEFT JOIN (
                                                    SELECT billno, SUM(total) AS total_sum 
                                                    FROM `o` 
                                                    GROUP BY billno
                                                ) o ON p.billno = o.billno  
                                                WHERE  p.paymentid != ''"); 
                     $tmpCount = 1;

                    while($row = mysqli_fetch_array($result))
                    {   

                        $status = $row['status'];

                    echo '					
							<tr>    	   
                                <td>'.$row['id'].'</td> 						
    						 	<td>'.$row['billno'].'</td> 	    						 	
    						 	<td><a target="_blank" href="https://web.whatsapp.com/" >'.$row['phone'].'</a></td>
    						 
    						 	<td>'.$row['email'].' <br> <span style="
    font-weight: bold;
">[ '.$row['paymentid'].' ]</span></td>  
                                <td>'.$row['created'].'</td>

    						 	<td>&#8377; '.$row['total_sum'].'</td>   
                                <td>'.$row['modeofpayment'].'</td>

    						
    						 		
    						 <td> 

                                <a  href="orderdetails.php?edit_id='.$row['id'].'&billno='.$row['billno'].'" class="text-inverse" data-toggle="tooltip"><i style="background-color:#ff24ee;color:black" class="fa fa-eye btn  btn-sm waves-effect waves-light"></i></a> &nbsp;&nbsp;
                            
                                <a href="billprint.php?billno='. $row['billno'] .'&user=' . $row['email'] . '" target="_blank" class="text-inverse"  data-toggle="tooltip"><i style="background-color:#0095ff;color:black" class="fa fa-print btn  btn-sm waves-effect waves-light"></i></a> &nbsp;&nbsp;
                            
                            </td>
    						    <td> 

                                '; if($status == 0)
                                {
                                   echo '  <a style="background-color:#e7ff24;color:black" href="#" type="button" class="btn  btn-sm waves-effect waves-light"  >Received Order</a>' ;
                                }
                                else if($status == 1)
                                {
                                    echo '  <a href="#" type="button" class="btn btn-info btn-sm waves-effect waves-light"  >Processed Order</a>' ;
                                }
                                elseif($status == 2)
                                {
                                    echo '  <a style="    background-color: #6d0e95;    color: white;" href="#" type="button" class="btn  btn-sm waves-effect waves-light"  >Shipped Order</a>' ;
                                }
                                elseif($status == 3)
                                {
                                    echo '  <a href="#" type="button" class="btn btn-success btn-sm waves-effect waves-light"  >Delivered Order</a>' ;
                                }
                                else if($status == 4)
                                {
                                    echo '  <a href="#" type="button" class="btn btn-danger btn-sm waves-effect waves-light"  >Cancelled Order</a>' ;
                                }
                                         ?> <?php echo '

                                  
                                </td>
						 	</tr>

						


							'; } ?>

						</tbody>
					</table> 
					
					
					
					
					
					
					
				</div>
				<!-- /.box-content -->
			</div>
		
			<!-- /.col-xs-12 -->
		</div>
	
	</div>
	<!-- /.main-content -->
</div>
<!-- ACTIVE AND INACTIVE KA CODE <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[25, 50, -1], [25, 50, "All"]]
    } );
} );
</script> -->


<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).on('click','.status_checks',function(){
var status = ($(this).hasClass("btn-success")) ? '0' : '1';
var msg = (status=='0')? 'Deactivate' : 'Activate';
if(confirm("Are you sure to "+ msg)){
  var current_element = $(this);
  url = "productajax.php";
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
<script>
    function generatePDF(billno)  {
        let url = window.location.href;
        urlBase = url.substring(0, url.lastIndexOf('/')+1);
        url = urlBase + "generate_pdf.php?billno=" + billno;
        $.get(url);
    }
</script>

     <!-- ACTIVE AND INACTIVE KA CODE -->  

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

