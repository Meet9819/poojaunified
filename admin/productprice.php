<?php
session_start();
if(!isset($_SESSION["user"]["type"])){
header("Location: login.php");
exit(); }
?>

<?php include "allcss.php"; ?>
<?php include "header.php"; ?> 
<!-- Main Content -->

  <div class="main-content">


        <div class="col-lg-12 col-xs-12">
            <div class="panel panel-default border-panel ">
              <div  class="panel-wrapper collapse in">
                <div  class="panel-body" style="text-align: right;">
                  <div> 
                    <a  href="" id="add_button" data-target="#adddocumentmaster" 
                       data-toggle="modal"  class="btn btn-default btn-outline btn-icon right-icon">
                      <i class="fa fa-plus">
                      </i>
                      <span class="btn-text">Add Variant of Id = <?php echo $qq = $_GET['edit_id'] ?>
                      </span> 
                    </a>
                  </div> 
                </div>
              </div>
            </div>
        </div>
      
   
<div class="col-lg-12 col-xs-12">
            <div class="panel panel-default border-panel ">
              <div  class="panel-wrapper collapse in">
                <div  class="panel-body" >



                       <?php
                        error_reporting( ~E_NOTICE );                        
                        require_once 'dbconfig.php';                        
                        if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
                        {
                            $id = $_GET['edit_id'];
                            $stmt_edit = $DB_con->prepare('SELECT maincat, categoryid, productcode, name ,description,img,discount,descr,star,newold,metatitle,metatag,metadescription,stock,brand,gst,weight,hsncode,units,pr FROM products WHERE id =:id');
                            $stmt_edit->execute(array(':id'=>$id));
                            $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
                            extract($edit_row);
                        }
                        else
                        {
                            header("Location: productsview.php");
                        }
                        ?>

                        <div class="col-md-2">

                       <img src="../images/products/<?php echo $img; ?>" height="70" width="150" />
                     </div>
                     <div class="col-md-10" style="    font-size: 20px;">
                      <b>Product Name</b> - <?php echo $name; ?> <br>
                       <b>Product Code </b>- <?php echo $productcode; ?> <br><b> Product Description </b>- <?php echo $description; ?> <br>
                    
                     </div>

                </div>
              </div>
            </div>
        </div>




    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default border-panel card-view">
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <div class="table-wrap">
                <table id="user_data" class="table table-bordered table-striped">
                  <thead>
                    <tr> <th width="1%">Sr.no</th> 
                        
                        <th width="1%">Product Id</th> 
                     
                      <th width="2%">Qty</th>   <th width="2%">Units</th>                   
                         
                      <th width="1%">Mrp</th>  
                      <th width="1%">Price 
                      </th>
                      <th width="1%">Edit
                      </th> <th width="1%">Delete
                      </th>
                     
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- adddocumentmaster -->


</div>

    <div id="adddocumentmaster" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		
		
		
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
            </button>
            <h5 class="modal-title">Create Accounts Sub Head Master
            </h5>
          </div>
          <div class="modal-body">  
			  
			  			        <div class="col-md-4">
                       <img src="../images/products/<?php echo $img; ?>" height="auto" width="60" />
                     </div>
                     <div class="col-md-8" style="    font-size: 20px;">
                      Product Name - <?php echo $name; ?> <br>
                      Product Code - <?php echo $productcode; ?> <br>
                     
                     </div>

            <form method="post" id="user_form" enctype="multipart/form-data">
               

               <div class="form-group">
                <label for="message-text" class="control-label mb-10">Product Id
                </label>
                  <input readonly="" type="text" name="productid" id="productid" class="form-control" value="<?php echo $_GET['edit_id'] ?>" />
              </div>   


               <div class="form-group">
                <label for="message-text" class="control-label mb-10">Enter Qty 
                </label>
                  <input  type="text" name="type" id="type" class="form-control" value="" />
                </div>   
          
               <div class="form-group">
                <label for="message-text" class="control-label mb-10">Enter Units 
                </label>
                  <input  type="text" name="units" id="units" class="form-control" value="" />
                </div>   
        

              <div class="form-group">
                <label for="message-text" class="control-label mb-10">Enter MRP 
                </label>
                  <input type="text" name="mrp" id="mrp" class="form-control" />
              </div>    
              <div class="form-group">
                <label for="message-text" class="control-label mb-10">Enter Discounted Price 
                </label>
                  <input type="text" name="price" id="price" class="form-control" />
              </div>    

              </div>
            <div class="modal-footer">
              <input type="hidden" name="id" id="id" />
              <input type="hidden" name="operation" id="operation" />
              <input type="submit" name="action" id="action" class="btn btn-primary" value="Add" />
              <button type="button" class="btn btn-default" data-dismiss="modal">Close
              </button>
            </div>
            </form>
        </div>
      </div>
    </div>
    <!-- adddocumentmaster --> 
    
  </div>
</div>
<!-- /Main Content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
</script>
<script type="text/javascript" language="javascript" >
  $(document).ready(function(){

    $('#add_button').click(function(){
      $('#user_form')[0].reset();
      $('.modal-title').text("Add Accounts Title ");
      $('#action').val("Add");
      $('#operation').val("Add");
    });

    var dataTable = $('#user_data').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
        url:"onetime/accountsdailyexpensesfetch.php?q=<?php echo $qq; ?>",
        type:"POST"
      }
      ,
      "columnDefs":[
        {
          "targets":[0],
          "orderable":false,
        }
        ,
      ],
    }
                                             );
    $(document).on('submit', '#user_form', function(event){
      event.preventDefault();
      var type = $('#type').val(); 

       var productid  = $('#productid').val(); 
       var price  = $('#price').val(); 
       var units  = $('#units').val(); 

       
       var mrp  = $('#mrp').val(); 



      if(type != ''  && productid != ''  && price != ''  && mrp != '')
      {
        $.ajax({
          url:"onetime/accountsdailyexpensesinsert.php",
          method:'POST',
          data:new FormData(this),
          contentType:false,
          processData:false,
          success:function(data)
          {
            alert(data);
            $('#user_form')[0].reset();
            $('#adddocumentmaster').modal('hide');
            dataTable.ajax.reload();
          }
        }
              );
      }
      else
      {
        alert("Both Fields are Required");
      }
    }
                  );
    $(document).on('click', '.update', function(){
      var id = $(this).attr("id");
      $.ajax({
        url:"onetime/accountsdailyexpensesfetch_single.php",
        method:"POST",
        data:{
          id:id}
        ,
        dataType:"json",
        success:function(data)
        {
          $('#adddocumentmaster').modal('show');
          $('#type').val(data.type);     $('#units').val(data.units);   

             $('#productid ').val(data.productid );
             $('#price ').val(data.price );
             $('#mrp ').val(data.mrp );


          $('.modal-title').text("Edit Accounts Title");
          $('#id').val(id);
          $('#action').val("Edit");
          $('#operation').val("Edit");
        }
      }
            )
    }
                  );
    $(document).on('click', '.delete', function(){
      var id = $(this).attr("id");
      if(confirm("Are you sure you want to delete this?"))
      {
        $.ajax({
          url:"onetime/accountsdailyexpensesdelete.php",
          method:"POST",
          data:{
            id:id}
          ,
          success:function(data)
          {
            alert(data);
            dataTable.ajax.reload();
          }
        }
              );
      }
      else
      {
        return false;
      }
    }
                  );
  }
                   );
</script>
<!-- jQuery -->
<?php include "allscripts.php"; ?>
