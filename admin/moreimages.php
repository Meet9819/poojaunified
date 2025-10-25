

<?php $id = $_GET['edit_id']; 
?>


<div class="col-lg-6 col-xs-12">
   <div class="box-content card white">
      <h4 class="box-title">Add More Images</h4>
      <!-- /.box-title -->
      <div class="card-content">
         <form action="productsubimgupload.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idd" value="<?php echo $id = $_GET['edit_id']; ?> ">
            <div class="form-group">
               <div class="col-sm-6">
                  <input type="file" name="files[]" multiple >
                  <p class="help-block">Image should be 3527 x 2372 in pixels</p>
                  <input class="btn btn-dark btn-sm waves-effect waves-light" type="submit"  name="submit" value="Upload" /> 
               </div>
            </div>
         </form>
      </div>
   </div>
</div>

<div class="col-lg-6 col-xs-12">
           
                
       
<?php
//index.php
$connect = mysqli_connect("localhost","pmaroot","yIGMS1+7fmOHmMasvamEkQ==","crownstone"); 

$id = $_GET['edit_id'];

$query = "SELECT * FROM productimages where idd = $id";
$result = mysqli_query($connect, $query);
?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <style>
   #box
   {
    width:600px;
    background:gray;
    color:white;
    margin:0 auto;
    padding:10px;
    text-align:center;
   }
  </style>



<div class="box-content">
  <div class="">
   <?php
   if(mysqli_num_rows($result) > 0)
   {
   ?>
   <div class="table-responsive"> 
    
    <table class="table table-bordered">
     <tr>
      <th>Name</th>    
      <th>Delete</th>
     </tr>
   <?php
    while($row = mysqli_fetch_array($result))
    {
   ?>
     <tr id="<?php echo $row["id"]; ?>" >
      <td> <a href="../images/productdesc/<?php echo $row["file_name"]; ?>" target="_blank"> <img width="50px" src="../images/productdesc/<?php echo $row["file_name"]; ?>"> </a> </td>     
      <td><input style="width: 30px;height: 30px" type="checkbox" name="id[]" class="delete_customer" value="<?php echo $row["id"]; ?>" /></td>
     </tr>
   <?php
    }
   ?>
    </table>
   </div>
   <?php
   }
   ?>
   <div align="center">
    <button type="button" name="btn_delete" id="btn_delete" class="btn btn-danger">Delete</button>
   </div>
</div>

<script>
$(document).ready(function(){
 
 $('#btn_delete').click(function(){
  
  if(confirm("Are you sure you want to delete this?"))
  {
   var id = [];
   
   $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
   });
   
   if(id.length === 0) //tell you if the array is empty
   {
    alert("Please Select atleast one checkbox");
   }
   else
   {
    $.ajax({
     url:'ajaxdel/delete.php',
     method:'POST',
     data:{id:id},
     success:function()
     {
      for(var i=0; i<id.length; i++)
      {
       $('tr#'+id[i]+'').css('background-color', '#ccc');
       $('tr#'+id[i]+'').fadeOut('slow');
      }
     }
     
    });
   }
   
  }
  else
  {
   return false;
  }
 });
 
});
</script>



</div>
</div>