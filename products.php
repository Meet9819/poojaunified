 <?php include 'css.php';?>

 <?php include 'header2.php';?>






    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0 wow fadeIn" data-wow-delay="0.1s" style="background-image: url(img/carousel-2.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container py-5">
                    <?php
                        include('admin/db.php');  $q = $_GET['q'];

                        $result = mysqli_query($con,"SELECT * FROM menu where menu_id = $q"); 
                         $tmpCount = 1;
                        while($row = mysqli_fetch_array($result))
                        {

                        echo '

                <h1 class="display-1 text-white animated slideInDown">'.substr($row['menu_name'],0,200).'</h1>
                ';
            }
            ?>

                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb text-uppercase mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li> 
                        <li class="breadcrumb-item text-primary active" aria-current="page">Products  </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Blog Grid Start -->
                <div class="col-lg-8">
                    <div class="row g-5">

                         <?php
                        include('admin/db.php');  $q = $_GET['q'];

                        $result = mysqli_query($con,"SELECT * FROM products where maincat = $q"); 
                         $tmpCount = 1;
                        while($row = mysqli_fetch_array($result))
                        {

                        echo '
                        <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="blog-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="images/products/'.$row['img'].'" alt="">
                                </div>
                                <div class="bg-light p-4"> 
                                    <a href="#" class="d-block h3 mb-4"> '.substr($row['name'],0,200).'</a>
                                    <p> '.substr($row['shortdescription'],0,200).'...</p>
                                    <a href="#" class="btn btn-sm btn-outline-body px-3">Read More</a>
                                </div>
                            </div>
                        </div>

                            ';
                        }
                        ?>

                     
                    </div>
                </div>
                <!-- Blog Grid End -->
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Keyword">
                            <button class="btn btn-dark px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                    <!-- Search Form End -->

                    <!-- Category Start -->
                    <div class="bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="section-title text-dark mb-4">Categories</h3>
                        <div class="category-list d-flex flex-column">

                             <?php
                            include('admin/db.php'); 

                            $result = mysqli_query($con,"SELECT * FROM menu"); 
                             $tmpCount = 1;
                            while($row = mysqli_fetch_array($result))
                            {

                            echo '

                            <a href="products.php?q='.$row['menu_id'].'" class="bg-white text-body" >'.$row['menu_name'].'</a>
                            ';
                            }
                            ?>   
                        </div>
                    </div>
                    <!-- Category End -->

             

                    <!-- Image Start -->
                    <div class="bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="#">
                            <img class="img-fluid" src="img/blog-md-1.jpg" alt="">
                        </a>
                    </div>
                    <!-- Image End -->

                    <!-- Tag Start -->
                    <div class="bg-light p-4 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h3 class="section-title text-dark mb-4">Tags Cloud</h3>
                        <div class="d-flex flex-wrap m-n1">
                              <?php
                            include('admin/db.php'); 

                            $result = mysqli_query($con,"SELECT * FROM menu"); 
                             $tmpCount = 1;
                            while($row = mysqli_fetch_array($result))
                            {

                            echo '

                            <a href="products.php?q='.$row['menu_id'].'" class="btn btn-tag m-1">'.$row['menu_name'].'</a>
                            ';
                            }
                            ?>    
                        </div>
                    </div>
                    <!-- Tag End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->
        

    <!-- Footer Start -->
     <?php include 'footer.php';?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="code.jquery.com/jquery-3.4.1.min.js" type="696ff835670149cbd8c5a791-text/javascript"></script>
    <script src="cdn.jsdelivr.net/npm/bootstrap%405.0.0/dist/js/bootstrap.bundle.min.js" type="696ff835670149cbd8c5a791-text/javascript"></script>
    <script src="lib/wow/wow.min.js" type="696ff835670149cbd8c5a791-text/javascript"></script>
    <script src="lib/easing/easing.min.js" type="696ff835670149cbd8c5a791-text/javascript"></script>
    <script src="lib/waypoints/waypoints.min.js" type="696ff835670149cbd8c5a791-text/javascript"></script>
    <script src="lib/counterup/counterup.min.js" type="696ff835670149cbd8c5a791-text/javascript"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js" type="696ff835670149cbd8c5a791-text/javascript"></script>
    <script src="lib/tempusdominus/js/moment.min.js" type="696ff835670149cbd8c5a791-text/javascript"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js" type="696ff835670149cbd8c5a791-text/javascript"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js" type="696ff835670149cbd8c5a791-text/javascript"></script>
    <script src="lib/twentytwenty/jquery.event.move.js" type="696ff835670149cbd8c5a791-text/javascript"></script>
    <script src="lib/twentytwenty/jquery.twentytwenty.js" type="696ff835670149cbd8c5a791-text/javascript"></script>

    <!-- Template Javascript -->
    <script src="js/main.js" type="696ff835670149cbd8c5a791-text/javascript"></script>
<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="696ff835670149cbd8c5a791-|49" defer></script></body>


<!-- Mirrored from blog-grid.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Sep 2025 10:14:43 GMT -->
</html>