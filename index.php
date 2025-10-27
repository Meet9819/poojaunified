<?php include 'css.php';?>
<?php include 'header.php';?>

 <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative"> 
        <?php
        include('admin/db.php'); 

        $result = mysqli_query($con,"SELECT * FROM slider"); 
         $tmpCount = 1;
        while($row = mysqli_fetch_array($result))
        {

        echo '

            <div class="owl-carousel-item position-relative" data-dot="<img src="images/sliders/'.$row['img'].'">">
                <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                <div class="owl-carousel-inner owl-carousel-white">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-1 text-dark animated slideInDown">'.$row['title'].' </h1>
                                <p class="fs-5 fw-medium text-dark">'.$row['description'].'  </p>
                                <div class="d-flex align-items-center pt-4 animated slideInDown">
                                    <a href="'.$row['link'].'" class="btn btn-dark py-sm-3 px-3 px-sm-5 me-5">'.$row['buttonname'].'</a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        ';
        }
        ?>
 
        </div>
    </div>
    <!-- Carousel End -->

 

    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container pt-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/icon-2.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Mission</h3>
                        <p class="mb-0">To establish Unified Industries as a global leader in elevator component solutions, trusted by manufacturers worldwide for quality, innovation, and performance.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/icon-3.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Vision</h3>
                        <p class="mb-0">To build a globally respected brand in elevator components, known for innovation, profitability, and a culture that attracts top talent and delivers enduring value to stakeholders.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                        <div class="fact-icon">
                            <img src="img/icons/icon-4.png" alt="Icon">
                        </div>
                        <h3 class="mb-3">Values</h3>
                        <p class="mb-0">We champion deep expertise, proactive initiative, and a relentless drive to exceed expectations in every solution we deliver.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="img/about-1.jpg" alt="">
                        <img class="img-fluid" src="img/about-2.jpg" alt="">
                        <div class="about-img-overlay">
                            <div class="d-flex align-items-center justify-content-center border border-5 mb-4" style="width: 120px; height: 120px;">
                                <h1 class="display-1 text-dark mb-0" data-toggle="counter-up">13</h1>
                            </div>
                            <span class="fs-5 fw-bold text-dark">Years Experience</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h4 class="section-title">About Us</h4>
                    <h1 class="display-5 mb-4">Delivering trusted solutions for more than 10 years</h1>
                    <p>With over 13 years of proven expertise, Unified Industries stands at the forefront of elevator technology—delivering advanced, precision-engineered solutions to clients worldwide. </p>
                    <p class="mb-4">We specialize in the design, manufacturing, and global supply of premium elevator components, built to meet the highest standards of safety, performance, and reliability.</p>
                    <div class="row g-4 mb-4 pb-2">
                        <div class="col-4">
                            <h1 class="mb-0" data-toggle="counter-up">100</h1>
                            <span class="fw-bold">Expert Workers</span>
                        </div>
                        <div class="col-4">
                            <h1 class="mb-0" data-toggle="counter-up">1000</h1>
                            <span class="fw-bold">Active Clients</span>
                        </div>
                        <div class="col-4">
                            <h1 class="mb-0" data-toggle="counter-up">1234</h1>
                            <span class="fw-bold">Projects Done</span>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5" href="about.php">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Our Products</h4>
                <h1 class="display-5 mb-4">Discover the Distinct Edge of Unified Solutions</h1>
            </div>
            <div class="row g-4">
                <?php
                include('admin/db.php'); 

                $result = mysqli_query($con,"SELECT * FROM products limit 3"); 
                 $tmpCount = 1;
                while($row = mysqli_fetch_array($result))
                {

                echo '

                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item-2 bg-light h-100 p-5">
                                <img class="img-fluid mb-4" src="img/icons/icon-5.png" alt="Icon">
                                <h3 class="mb-3"> '.substr($row['name'],0,200).'</h3>
                                <p>'.substr($row['shortdescription'],0,200).'... </p>
                                <a class="btn" href="control.php">Read More</a>
                            </div>
                        </div>

                        ';
                    }
                    ?>

                

            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h4 class="section-title">Why Choose Us!</h4>
                    <h1 class="display-5 mb-4">Why You Should Trust Us? Learn More About Us!</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <img class="flex-shrink-0" src="img/icons/icon-2.png" alt="Icon">
                                <div class="ms-4">
                                    <h3>Design Approach</h3>
                                    <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <img class="flex-shrink-0" src="img/icons/icon-3.png" alt="Icon">
                                <div class="ms-4">
                                    <h3>Innovative Solutions</h3>
                                    <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-start">
                                <img class="flex-shrink-0" src="img/icons/icon-4.png" alt="Icon">
                                <div class="ms-4">
                                    <h3>Project Management</h3>
                                    <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="feature-img">
                        <img class="img-fluid" src="img/about-2.jpg" alt="">
                        <img class="img-fluid" src="img/about-1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Project Start -->
    <div class="container-xxl project py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Our Projects</h4>
                <h1 class="display-5 mb-4">Visit Our Latest Projects And Our Innovative Works</h1>
            </div>
            <div class="row g-0 project-items">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="project-item" href="#">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/project-md-1.jpg" alt="">
                            <div class="project-text p-4">
                                <p class="text-dark fw-bold mb-2">Architecture</p>
                                <h3 class="mb-0">Shopping Complex</h3>
                            </div>
                        </div>
                    </a>
                    <a class="project-item" href="#">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/project-lg-1.jpg" alt="">
                            <div class="project-text p-4">
                                <p class="text-dark fw-bold mb-2">Architecture</p>
                                <h3 class="mb-0">Shopping Complex</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="project-item" href="#">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/project-lg-2.jpg" alt="">
                            <div class="project-text p-4">
                                <p class="text-dark fw-bold mb-2">Architecture</p>
                                <h3 class="mb-0">Shopping Complex</h3>
                            </div>
                        </div>
                    </a>
                    <a class="project-item" href="#">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/project-md-2.jpg" alt="">
                            <div class="project-text p-4">
                                <p class="text-dark fw-bold mb-2">Architecture</p>
                                <h3 class="mb-0">Shopping Complex</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="project-item" href="#">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/project-md-3.jpg" alt="">
                            <div class="project-text p-4">
                                <p class="text-dark fw-bold mb-2">Architecture</p>
                                <h3 class="mb-0">Shopping Complex</h3>
                            </div>
                        </div>
                    </a>
                    <a class="project-item" href="#">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/project-lg-3.jpg" alt="">
                            <div class="project-text p-4">
                                <p class="text-dark fw-bold mb-2">Architecture</p>
                                <h3 class="mb-0">Shopping Complex</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->


    <!-- Design Conversion Start -->
    <div class="container-xxl project py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Design Conversion</h4>
                <h1 class="display-5 mb-4">What We Do! Check Our Architecture Design Conversion</h1>
            </div>
            <div class="twentytwenty-container wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid w-100" src="img/carousel-1.jpg" alt="">
                <img class="img-fluid w-100" src="img/carousel-2.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Design Conversion End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Team Members</h4>
                <h1 class="display-5 mb-4">We Are Creative Architecture Team For Your Dream Home</h1>
            </div>
            <div class="row g-0 team-items">

                  <?php
                include('admin/db.php'); 

                $result = mysqli_query($con,"SELECT * FROM team"); 
                 $tmpCount = 1;
                while($row = mysqli_fetch_array($result))
                {

                echo '

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid" src="images/team/'.$row['img'].'" alt="">
                            <div class="team-social text-center">
                                <a class="btn btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h3 class="mt-2">'.$row['name'].'   </h3>
                            <span class="text-primary">'.$row['designation'].'</span>
                        </div>
                    </div>
                </div>

                        ';
                    }
                    ?> 
                
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Testimonial</h4>
                <h1 class="display-5 mb-4">Thousands Of Customers Who Trust Us And Our Services</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                 <?php
                include('admin/db.php'); 

                $result = mysqli_query($con,"SELECT * FROM testimonials"); 
                 $tmpCount = 1;
                while($row = mysqli_fetch_array($result))
                {

                echo '
                <div class="testimonial-item text-center" data-dot="<img class="img-fluid" src="img/testimonial-1.jpg">
                    <p class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</p>
                    <h3>Client Name</h3>
                    <span class="text-primary">Profession</span>
                </div>

                        ';
                    }
                    ?> 

            </div>      
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Latest Blog</h4>
                <h1 class="display-5 mb-4">Latest Architecture Articles From Our Blog Post</h1>
            </div>
            <div class="row g-4">

                 <?php
                include('admin/db.php'); 

                $result = mysqli_query($con,"SELECT * FROM blogss"); 
                 $tmpCount = 1;
                while($row = mysqli_fetch_array($result))
                {

                echo '
              

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="blog-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="images/blog/'.$row['img'].'" alt="">
                        </div>
                        <div class="bg-light p-4">
                            <div class="breadcrumb blog-meta">
                                <div class="breadcrumb-item"><a href="#">'.$row['datee'].'</a></div>
                                <div class="breadcrumb-item"><a href="#">'.$row['postedby'].'</a></div>
                            </div>
                                    <a href="#" class="d-block h3 mb-4"> '.substr($row['name'],0,200).'...</a>
                                    <p> '.substr($row['description'],0,200).'...</p>
                            <a href="#" class="btn btn-sm btn-outline-body px-3">Read More</a>
                        </div>
                    </div>
                </div>
                

                        ';
                    }
                    ?> 
                 
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Footer Start -->
<?php include 'footer.php';?>
    <!-- Footer End -->

<?php include 'script.php';?>
</body>


<!-- Mirrored from home-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Sep 2025 10:13:54 GMT -->
</html>