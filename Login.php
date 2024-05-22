<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="Pages/Freelancer/assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="Pages/Freelancer/assets/css/style.css">

    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css " rel="stylesheet">
</head>
<body>


<?php
        $servername = "127.0.0.1"; 
        $username = "root"; 
        $password = ""; 
        $database = "Mydb"; 

        try{
            $conn = mysqli_connect($servername, $username, $password, $database);
        }
        catch (mysqli_sql_exception $e){
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }



        if(isset($_POST['login']))
        {  
            $email = $_POST['email'];
            $hashedPassword = md5(  $_POST['password'] );

            $sel = "SELECT id , type FROM User WHERE email = '$email' AND password = '$hashedPassword'";
            $result = mysqli_query($conn, $sel);
            $row = mysqli_fetch_assoc($result);
            
            $id=$row['id'];
            $type=$row['type'];

            if ( $id > 1)
            {   
                if($type == "Freelancer"){
                    echo "<script> location.href='http://localhost:8000/Pages/Freelancer/Home.php?id=$id'; </script>";  
                }else{
                    echo "<script> location.href='http://localhost:8000/Pages/Start_up/New.php?id=$id'; </script>";  
                }
                
            }else{
                echo "   
                <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Error login',
                    showConfirmButton: false,
                    timer: 1500
                  });
                </script>";
            }
      
        }


        if (isset($_GET['my_inscrire'])) {
              
        echo "   
        <script>
        Swal.fire({
            title: 'Account as ?',
            showDenyButton: true,
            showCloseButton: true,
            confirmButtonText: 'Freelancer',
            denyButtonText: 'Start up'
          }).then((result) => {
            if (result.isConfirmed) {
                location.href='http://localhost:8000/Pages/Signup.php?type=Freelancer';
            } else if (result.isDenied) {
                location.href='http://localhost:8000/Pages/Signup.php?type=Start up';
            } else {
                location.href='http://localhost:8000/Login.php';
            }
          }
        );
          
        </script>";
        }

echo '
<div class="main">
<section class="Login">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="Pages/Freelancer/assets/images/signin-image.jpg" alt="sing up image"></figure>
                <a href="Login.php?my_inscrire=true" class="signup-image-link"name="login" >Create account ?</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Login</h2>
                <form method="POST" class="register-form" id="login-form">
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input autocomplete="off" type="email" name="email" id="email"  placeholder="Your Email"/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password"  placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                    </div>
                    <div class="form-group form-button">
                        <input  type="submit" name="login" id="login" class="form-submit" value="Log in"/>
                    </div>
                </form>
                <div class="social-login">
                    <span class="social-label">Or login with</span>
                    <ul class="socials">
                        <li ><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

</div>

<!-- JS -->
<script src="Pages/Freelancer/assets/vendor/jquery/jquery.min.js"></script>
<script src="Pages/Freelancer/assets/js/main.js"></script>
';






?>
</body>
</html>