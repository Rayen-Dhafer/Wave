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
    <link rel="stylesheet" href="assets/css/owl.css">   
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css " rel="stylesheet">

   </head>
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



        $sql = "SELECT P.* , U.full_name 
        FROM Projects P , User U  
        WHERE P.status = 'in progress' AND U.id = P.id_startup  AND $id = P.id_freelancer";
    
        $result = $conn->query($sql);





       
        if(isset($_POST['finished']))
        {  
          $id_projet = $_POST['finished'];
          $url_project = $_POST['url_project'];

          $sql = "UPDATE Projects 
          SET status = 'finished' , project_url = '$url_project'
          WHERE id_projet = $id_projet";

          $conn->query($sql);

          header("Refresh:0; url=Current.php?id=$id");
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
       <!-- ***** Header Area End ***** -->
     














       <div id="services" class="our-services section">
         <div class="container"><br>';

        
         while($row = $result->fetch_assoc()) {

          $start_date = $row["start_date"]; 
          $deadline = $row["deadline"];
          $current_date = date("Y-m-d");

          $start_date_time = new DateTime($start_date);
          $deadline_time = new DateTime($deadline);
          $current_date_time = new DateTime($current_date);

          $interval_all = $start_date_time->diff($deadline_time);
          $interval_reste = $current_date_time->diff($deadline_time);

          $days_of_projet = $interval_all->days;
          $days_reste = $interval_reste->days;

          $porcentage=round( ($days_reste*100) / $days_of_projet ) ;
          

          echo'
           <div class="row">
             <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
               <div class="left-image">
                 <img src="assets/images/services-left-image.png" alt="">
               </div>
             </div>
             <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
               <div class="section-heading">
                 <h2><em>Project</em>   <span>'.$row["projectName"].'</span></h2>
                 <p>'.$row["description"].' <br>
                      Deadline : '.$deadline.' <br>
                      '.$days_reste.' days left / '.$days_of_projet.' days
                 </p>
               </div>
               
               <div class="row">
                 <div class="col-lg-12">
                 <div class="first-bar progress-skill-bar" style="--wid : '.$porcentage.'%">
                     <h4>Analysis</h4>
                     <span>'.$porcentage.' %</span>
                     <div class="filled-bar"></div>
                     <div class="full-bar"></div>
                   </div>
                 </div>

               </div>';


              echo'
              <form method="POST" >
               <div class="row">
                 <div class="col-md-3">
                  <div class="main-blue-button">
                      <button name="finished" value="'.$row["id_projet"].'" >Valider</button>  <div>&nbsp;</div>
                  </div>                 
                 </div>
                 <div class="col-md-9">
                   <input type="text" name="url_project" class="form-control" placeholder="Url github" autocomplete="off">
                 </div>
               </div>
               </form>';
            
     

          echo '
             </div>
           </div> <br><br><br><br><br><br><br>' ;
          };

        echo '
         </div>
       </div>









       











     

     
       <footer>
       <br><br><br><br><br><br><br>
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
