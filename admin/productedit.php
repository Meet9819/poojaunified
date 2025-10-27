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
		
		<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
				 
					
					<h4 class="box-title">Edit Product</h4>
					<!-- /.box-title -->
					<div class="card-content">


<?php
 error_reporting(E_ALL);
ini_set('display_errors', 1);
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT * FROM products WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: productsview.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    {


        $maincat = !empty($_POST['maincat']) ? $_POST['maincat'] : 0; 
		$name             = !empty($_POST['name']) ? $_POST['name'] : '';
		$description      = !empty($_POST['description']) ? $_POST['description'] : '';
		$descr            = !empty($_POST['descr']) ? $_POST['descr'] : '';
		$metatitle        = !empty($_POST['metatitle']) ? $_POST['metatitle'] : '';
		$metatag          = !empty($_POST['metatag']) ? $_POST['metatag'] : '';
		$metadescription  = !empty($_POST['metadescription']) ? $_POST['metadescription'] : '';
		$shortdescription = !empty($_POST['shortdescription']) ? $_POST['shortdescription'] : '';
		$sqft       = !empty($_POST['sqft']) ? $_POST['sqft'] : 0;
		$developer    = !empty($_POST['developer']) ? $_POST['developer'] : 0;
		$bed      = !empty($_POST['bed']) ? $_POST['bed'] : '';
		$bath    = !empty($_POST['bath']) ? $_POST['bath'] : '';
		$price   = !empty($_POST['price']) ? $_POST['price'] : '';
		$newold      = !empty($_POST['newold']) ? $_POST['newold'] : '';
		$sale        = !empty($_POST['sale']) ? $_POST['sale'] : 0;
            $address           = !empty($_POST['address']) ? $_POST['address'] : '';
            $amenities           = !empty($_POST['amenities']) ? $_POST['amenities'] : '';
            $highlights           = !empty($_POST['highlights']) ? $_POST['highlights'] : '';
		 
 

        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];
                    
        if($imgFile)
        { 
        
            
            $upload_dir = '../images/products/'; // upload directory 
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('JPG','jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $img = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$edit_row['img']);
                    move_uploaded_file($tmp_dir,$upload_dir.$img);
                }
                else
                {
                    $errMSG = "Sorry, your file is too large it should be less then 5MB";
                }
            }
            else
            {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
            }   
        }
        else
        {
            // if no image selected the old image remain as it is.
            $img = $edit_row['img']; // old image from database
        }   
              

         


		$price = !empty($_POST['price']) ? $_POST['price'] : 0;
		$mrp   = !empty($_POST['mrp'])   ? $_POST['mrp']   : 0;


        // if no error occured, continue ....
        if(!isset($errMSG))
        { 

  

		    // 1. Delete existing product price
		    $deleteStmt = $DB_con->prepare("DELETE FROM productprice WHERE productid = :id");
		    $deleteStmt->bindParam(':id', $id, PDO::PARAM_INT);
		    $deleteStmt->execute();

		    // 2. Insert new product price
		    $insertStmt = $DB_con->prepare("
		        INSERT INTO productprice (productid, type, units, price, mrp) 
		        VALUES (:id, :type, :units, :price, :mrp)
		    ");
		    $type  = 1;
		    $units = 'pc';
		    $insertStmt->bindParam(':id', $id, PDO::PARAM_INT);
		    $insertStmt->bindParam(':type', $type, PDO::PARAM_INT);
		    $insertStmt->bindParam(':units', $units, PDO::PARAM_STR);
		    $insertStmt->bindParam(':price', $price);
		    $insertStmt->bindParam(':mrp', $mrp);
		    $insertStmt->execute();





        $stmt = $DB_con->prepare('UPDATE products SET  maincat=:maincat,   name=:name,  img=:img, description=:description,  descr=:descr,  metatitle=:metatitle, metatag=:metatag, metadescription=:metadescription , shortdescription=:shortdescription, sqft=:sqft
        , developer=:developer, bed=:bed, bath=:bath, price=:price, newold=:newold, sale=:sale, address =:address, amenities =:amenities,  highlights =:highlights

         WHERE id=:id');
 
         	$stmt->bindParam(':maincat',$maincat);   
            $stmt->bindParam(':name',$name);    
            $stmt->bindParam(':img',$img); 
            $stmt->bindParam(':description',$description);    
            $stmt->bindParam(':descr',$descr);   
            $stmt->bindParam(':metatag',$metatag);   
            $stmt->bindParam(':metatitle',$metatitle);    
            $stmt->bindParam(':metadescription',$metadescription);    
            $stmt->bindParam(':shortdescription',$shortdescription);  
            $stmt->bindParam(':sqft',$sqft);       
            $stmt->bindParam(':developer',$developer);       
            $stmt->bindParam(':bed',$bed);       
            $stmt->bindParam(':bath',$bath);       
            $stmt->bindParam(':price',$price);          
            $stmt->bindParam(':newold',$newold);          
            $stmt->bindParam(':sale',$sale);       
            $stmt->bindParam(':address',$address);     
            $stmt->bindParam(':amenities',$amenities);     
            $stmt->bindParam(':highlights',$highlights);    

            $stmt->bindParam(':id',$id);

            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                 window.location.href='productsview.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }
        
        }
        
                        
    }
    
?>




					<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >

                               
						
							<div class="form-group">
								<label for="one" class="col-sm-3 control-label">Product Name</label>
								<div class="col-sm-3">
                                    <input type="hidden" name="id"   value="<?php echo $_GET['edit_id']; ?>" >
									<input type="text" name="name" class="form-control" id="one"   value="<?php echo $name; ?>" >
								</div>


							 
								<div class="col-sm-3">
									 
								</div>


							</div>


							<div class="form-group">
								<label for="three" class="col-sm-3 control-label">Select Category</label>
								<div class="col-sm-3"> 

								<select name="maincat" id="three" class="form-control"> 
								    <?php
								    include "db.php";

								    $result = mysqli_query($con, "SELECT * FROM menu WHERE parent_id = 0 AND status = '1'");
								    while ($row = mysqli_fetch_array($result)) {
								        $selected = ($row['menu_id'] == $maincat) ? 'selected' : '';
								        echo '<option value="' . $row['menu_id'] . '" ' . $selected . '>' . $row['menu_name'] . '</option>';
								    }
								    ?>
								</select> 
							
								</div> 
                               
                                <div class="col-sm-3">
                                   
                                </div>

								</div>

 


							<div class="form-group">
							
								<label for="four" class="col-sm-3 control-label"> Main Image</label>
								<div class="col-sm-3">   
									<img src="../images/products/<?php echo $img; ?>" height="70" width="150" />
									<input type="file" id="four" name="user_image"> 
									<p class="help-block">Image should be 1000 x 1000 in pixels</p>
								</div>

								<div class="col-sm-3">							 
								</div>

							</div>

						 
 	
							 


                            <div class="form-group">
                                <label for="seventeen" class="col-sm-3 control-label">Short Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="shortdescription" id=" " > <?php echo $shortdescription; ?> </textarea>
                                </div>
                            </div>

 
							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
								<textarea class="form-control" name="description" id="text"   ><?php echo $description; ?></textarea>  

    							 <script>
                                                ClassicEditor
                                                    .create(document.querySelector('#text'))
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                                </script>
								</div>
							</div>


                            <div class="form-group">
                                <label for="text2" class="col-sm-3 control-label">Long Description</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="descr" id="text2"  ><?php echo $descr; ?> </textarea>  

    <script>
                                                ClassicEditor
                                                    .create(document.querySelector('#text2'))
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                                </script>

                                </div>
                            </div>
 
 
 
							<div class="form-group margin-bottom-0">
									<label for="" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">  

<input type="submit" name="btn_save_updates" value="Update" class="btn btn-dark btn-sm waves-effect waves-light">
   
<a href="productsview.php" class="btn btn-danger btn-sm waves-effect waves-light"> Close </a>


										</div>
							</div>


						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white --> 



 

			</div>




















	</div>
	<!-- /.main-content --> 

 

</div><!--/#wrapper -->
	
 
 
</div>
 
	
<?php include "allscripts.php"; ?>
