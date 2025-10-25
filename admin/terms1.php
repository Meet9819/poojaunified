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
        
    
            <div class="col-xs-12">
                <div class="box-content">
                    <h4 class="box-title">View </h4>
                
                    <!-- /.dropdown js__dropdown -->
                    <table id="example" class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                    <th>Id</th> 
                                    <th>title</th>
                                    <th>content</th> 
                                    <th>Edit</th>  
                            </tr>
                        </thead>
                    

                            <?php 
                            include('db.php'); 

$result = mysqli_query($con,"SELECT * FROM terms   "); 
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
                                 <td> '.$row['title'].'</td>

                                 <td> '.substr($row['content'],0,200).'...</td>
 

<td>

<a  href="terms1edit.php?edit_id='.$row['id'].'" style="font-size: 12px;
    line-height: 22px;
    padding: 5px 15px;" class="btn-success btn-xs waves-effect waves-light"><b style="color:white">Edit</b></a> 
</td> 

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
