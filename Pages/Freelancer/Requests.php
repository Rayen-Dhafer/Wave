<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Demandes</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">    </head>
    <body>
        <?php
        
         $id = $_GET['id'];

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


         $sql = "SELECT R.* , P.projectName , P.start_date , P.description
                 FROM Request R , Projects P
                 WHERE R.id_freelancer = '$id' 
                 AND R.id_projet = P.id_projet";
     
        $result = $conn->query($sql);





        if(isset($_GET['cancel']))
        {  
          $id_to_delete = $_GET['cancel'];

          $sql = "DELETE FROM Request WHERE id_freelancer = '$id' AND id_projet = '$id_to_delete'";
          $conn->query($sql);

          header("Refresh:0; url=Requests.php?id=$id");
        }


         echo '

         <div id="js-preloader" class="js-preloader">
         <div class="preloader-inner">
           <span class="dot"></span>
           <div class="dots">
             <span></span>
             <span></span>
             <span></span>
           </div>
         </div>
       </div>

       <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
         <div class="container">
           <div class="row">
             <div class="col-12">
               <nav class="main-nav">
                 <!-- ***** Logo Start ***** -->
                 <a class="logo">
                 <h4>Work<span> Wave</span></h4>
               </a>

                 <ul class="nav">
                    <li class="scroll-to-section"><a href="Home.php?id='.$id.'" class="active">Home</a></li>
                    <li class="scroll-to-section"><a href="Works.php?id='.$id.'">Works</a></li>
                    <li class="scroll-to-section"><a href="Current.php?id='.$id.'">Current projects</a></li>
                    <li class="scroll-to-section"><a href="Requests.php?id='.$id.'">Requests</a></li>
                    <li class="scroll-to-section"><a href="Profile.php?id='.$id.'">Profile</a></li>
                    <li class="scroll-to-section"><div class="main-red-button"><a href="#"> <i class="fa fa-bell"></i> 3 </a></div></li> 
                 </ul>         
                 <a class="menu-trigger">
                     <span>Menu</span>
                 </a>
                 <!-- ***** Menu End ***** -->
               </nav>
             </div>
           </div>
         </div>
       </header>


       <br><br>';

       while($row = $result->fetch_assoc()) {

        echo '
       <div id="blog" class="our-blog section">
       <div class="container">
         <div class="row">
           <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
           <span><i class="fa fa-calendar"></i> '.$row["start_date"].' </span>
           <a href="#"><h4>'.$row["projectName"].'</h4></a>
           <p>'.$row["description"].'</p>
           <br>
           <div class="main-blue-button">
              <a href="Requests.php?id='.$id.'&cancel='.$row["id_projet"].'">Cancel Request</a>
           </div>
           </div>

           <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
             <div class="top-dec">
               <img src="assets/images/blog-dec.png" alt="">
             </div>
           </div>
         </div>
       </div>  
      </div>';
    }

           
           
     
     echo'  
     <br><br><br><br><br><br><br>
       <footer>
       <br><br><br><br><br>
         <div class="container">
           <div class="row">
             <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
               <p>© Copyright 2023  
               <br>
               <a rel="nofollow" href="https://www.linkedin.com/in/rayen-dhafer/" target="_blank"> Rayen </a>/
               <a rel="nofollow" href="https://www.linkedin.com/in/ghada-derouiche-aa2b57237/" target="_blank"> Ghada </a>
               </p> 
             </div>
           </div>
         </div>
       </footer>
       <!-- Scripts -->
       <script src="vendor/jquery/jquery.min.js"></script>
       <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
       <script src="assets/js/owl-carousel.js"></script>
       <script src="assets/js/animation.js"></script>
       <script src="assets/js/imagesloaded.js"></script>
       <script src="assets/js/templatemo-custom.js"></script>
     
';
        ?>
    </body>
</html>