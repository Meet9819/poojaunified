
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>
    <link rel="stylesheet" href="assets/styles/style.min.css">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">
   
  <?php
session_start();
$conn=mysqli_connect('localhost','pmaroot','yIGMS1+7fmOHmMasvamEkQ==','crownstone');

//Getting Input value
if(isset($_POST['login'])){
  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $password=mysqli_real_escape_string($conn,$_POST['password']);
  if(empty($username)&&empty($password)){
  $error= 'Fileds are Mandatory';
  }else{
 //Checking Login Detail
 $result=mysqli_query($conn,"SELECT * FROM adminlogin WHERE username='$username' AND password='$password'");
 $row=mysqli_fetch_assoc($result);
 $count=mysqli_num_rows($result);
 if($count==1){
      $_SESSION['user']=array(
  'username'=>$row['username'],
   'password'=>$row['password'],
 'contact'=>$row['contact'],
     'email'=>$row['email'],

   'type'=>$row['type']
   );
   $type=$_SESSION['user']['type'];
   //Redirecting User Based on Role
  
      
         ?> 
         <script> window.location = 'index.php';</script>
         <?php

 }else{
 $error='Your PassWord or UserName is not Found';
 }
}
}
?>



        <form action="" class="frm-single" name="login" method="post">

        <div class="inside"> 

           <div class="title" style="margin: 50px;"> <img src="images/logo.png"></div>
            <!-- /.title -->
            <div class="frm-title">Admin Login</div>


        
            
            <!-- /.frm-title -->
            <div class="frm-input">

            

                 <input type="text" name="username" placeholder="Username" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
            <!-- /.frm-input -->
            <div class="frm-input"><input type="password" name="password" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
            <!-- /.frm-input -->
        
            <!-- /.clearfix
            <button type="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>    -->

            <input  class="frm-submit" name="login" type="submit" value="Login" />

            <div class="row small-spacing">
                <div class="col-sm-12">

    
                <div class='txt-login-with txt-center'>
<?php if(isset($error)){ echo $error; }?></div>


                    <!-- /.txt-login-with -->
                </div>
            </div>
            <!-- /.row -->
            <div class="frm-footer"> Crown Stone Properties  © 2025.</div>
            <!-- /.footer -->
        </div>
        <!-- .inside -->
    </form>
    <!-- /.frm-single -->
</div><!--/#single-wrapper -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="assets/script/html5shiv.min.js"></script>
        <script src="assets/script/respond.min.js"></script>
    <![endif]-->
    <!-- 
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/scripts/jquery.min.js"></script>
    <script src="assets/scripts/modernizr.min.js"></script>
    <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugin/nprogress/nprogress.js"></script>
    <script src="assets/plugin/waves/waves.min.js"></script>

    <script src="assets/scripts/main.min.js"></script>
</body>
</html>