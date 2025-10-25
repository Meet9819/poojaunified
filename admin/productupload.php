 


     <?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

        include "db.php";

        if(isset($_POST['submit']))
        {
           
            $file=$_FILES['image']['tmp_name'];
            $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name= addslashes($_FILES['image']['name']);

            move_uploaded_file($_FILES["image"]["tmp_name"],"../images/products/" . $_FILES["image"]["name"]);

             $img=$_FILES["image"]["name"];


            $file2=$_FILES['imgdesc']['tmp_name'];
            $imgdesc= addslashes(file_get_contents($_FILES['imgdesc']['tmp_name']));
            $imgdesc_name= addslashes($_FILES['imgdesc']['name']);

            move_uploaded_file($_FILES["imgdesc"]["tmp_name"],"../images/products/" . $_FILES["imgdesc"]["name"]);

             $img2=$_FILES["imgdesc"]["name"];


            $id=$_POST['id'];  

            $sale             = !empty($_POST['sale']) ? $_POST['sale'] : 0;
            $newold           = !empty($_POST['newold']) ? $_POST['newold'] : '';
            $maincat          = !empty($_POST['maincat']) ? $_POST['maincat'] : 0;
              
            $pdf              = !empty($_POST['pdf']) ? $_POST['pdf'] : ''; 
            $name             = !empty($_POST['name']) ? $_POST['name'] : '';
            $bath             = !empty($_POST['bath']) ? $_POST['bath'] : 0;
            $bed              = !empty($_POST['bed']) ? $_POST['bed'] : 0;
            $sqft             = !empty($_POST['sqft']) ? $_POST['sqft'] : 0;
            $developer        = !empty($_POST['developer']) ? $_POST['developer'] : '';
            $developerid      = isset($_POST['developerid']) && is_numeric($_POST['developerid']) ? (int)$_POST['developerid'] : 0;
            $price            = !empty($_POST['price']) ? $_POST['price'] : 0;
            $address          = !empty($_POST['address']) ? $_POST['address'] : '';
            $shortdescription = !empty($_POST['shortdescription']) ? $_POST['shortdescription'] : '';
            $description      = !empty($_POST['description']) ? $_POST['description'] : '';
            $descr            = !empty($_POST['descr']) ? $_POST['descr'] : '';
            $amenities        = !empty($_POST['amenities']) ? $_POST['amenities'] : '';
            $highlights       = !empty($_POST['highlights']) ? $_POST['highlights'] : '';
            $metatag          = !empty($_POST['metatag']) ? $_POST['metatag'] : '';
            $metatitle        = !empty($_POST['metatitle']) ? $_POST['metatitle'] : '';
            $metadescription  = !empty($_POST['metadescription']) ? $_POST['metadescription'] : '';
            $status           = !empty($_POST['status']) ? $_POST['status'] : 0;
            $address           = !empty($_POST['address']) ? $_POST['address'] : '';


            $amenities           = !empty($_POST['amenities']) ? $_POST['amenities'] : '';
            $highlights           = !empty($_POST['highlights']) ? $_POST['highlights'] : '';

 
            $insert = "INSERT INTO products (sale, newold, maincat, img, imgdesc, pdf, name, bath, bed, sqft, developer, developerid, price, address, shortdescription, description, descr, amenities, highlights, metatag, metatitle, metadescription, status, address,amenities,highlights) 

            VALUES ('$sale', '$newold', '$maincat', '$img', '$img2', '$pdf', '$name', '$bath', '$bed', '$sqft', '$developer', '$developerid', '$price', '$address', '$shortdescription', '$description', '$descr', '$amenities', '$highlights', '$metatag', '$metatitle', '$metadescription', '$status','$address', '$amenities', '$highlights')";
 

               $query =  mysqli_query($con,$insert) or die(mysqli_error($con));

                
        ?>
                <script>
                alert('Successfully Inserted...Your data has been Submitted');
              window.location.href='productsview.php';
                </script>
                <?php

                   
    }
?>



