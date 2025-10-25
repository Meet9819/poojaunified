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



<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
  
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT status,deliveryboy FROM payment WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);

        $statussss = $edit_row['status']; 
        $deliveryboy = $edit_row['deliveryboy'];
    }
   
    
    
    
    if(isset($_POST['btn_save_updates']))
    {
        $status = $_POST['status'];  
        $deliveryboy = $_POST['deliveryboy'];

        // if no error occured, continue ....
        if(!isset($errMSG))
        {
        $stmt = $DB_con->prepare('UPDATE payment SET status=:status, deliveryboy =:deliveryboy
        WHERE id=:id');
            $stmt->bindParam(':status',$status);    
         $stmt->bindParam(':deliveryboy',$deliveryboy);    
       
            $stmt->bindParam(':id',$id);                
            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='order.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }
        
        }
        
                        
    }
    
?>

                            
    
                                <div class="row small-spacing">
                                    <div class="col-xs-12">
                                        <div class="box-content">
                                            <h4 class="box-title">Received Order</h4>

                                            <!-- /.dropdown js__dropdown -->
                                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

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
                                        <option value="<?php echo $statussss; ?>"><?php echo $statussss; ?></option>
                                        <option value="0">0 - Received Order</option>
                                        <option value="1">1 - Processed</option>  
                                        <option value="2">2 - Shipped</option>  
                                        <option value="3">3 - Delivered</option> 
                                         <option value="4">4 - Cancelled</option>
                                    </select>
                                </div>
                            </div>

                         


                                                <div class="form-group margin-bottom-0">

                                                    <br>
                                                    <input class="btn btn-danger btn-sm waves-effect waves-light" type="submit" name="btn_save_updates" value="Update" />

                                                </div>

                                            </form>
                                        </div>
                                        <!-- /.box-content -->
                                    </div>
                                    <!-- /.col-xs-12 -->

                                </div> 

















                    </div>
                    <!-- /.main-content -->
                </div>
                <!--/#wrapper -->

                <?php include "allscripts.php"; ?>