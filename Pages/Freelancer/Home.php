<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Accaille</title>

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
                WHERE P.status = 'pending' AND U.id = P.id_startup  
                AND $id NOT IN
                      (
                      SELECT  R.id_freelancer
                      FROM    Request R
                      WHERE R.id_projet = P.id_projet
                      AND R.id_freelancer = $id
                      )ORDER BY P.id_projet DESC";
            
        $result = $conn->query($sql);

        $search_name= "";
        
        if(isset($_POST['search']))
        {  

          $search_name= $_POST['search_name'];

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
     


       <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
       <div class="container">
         <div class="row">
           <div class="col-lg-12">
             <div class="row">
               <div class="col-lg-6 align-self-center">
                 <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                   <h6>Welcome to Up Work</h6>
                 <h2>Vous recherchez un <em>freelance</em> ?  Voici les <span>offres</span> suggérées</h2>
                 <form id="search" method="POST">
                     <fieldset>
                       <input name="search_name" placeholder="Name projet" autocomplete="off">
                     </fieldset>
                     <button type="submit"name="search" >Search</button> 
                     <div class="form-group form-button">
                 </div>
                   </form>
                 </div>
               </div>
               <div class="col-lg-6">
                 <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                   <img src="assets/images/banner-right-image.png" alt="team meeting">
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>


     <div id="portfolio" class="our-portfolio section">
       <div class="container">
         <div class="row">';



         while($row = $result->fetch_assoc()) {

          if( !$search_name || strpos( strtoupper($row["projectName"]) , strtoupper($search_name) ) !== false ){
            echo'
            <div class="col-lg-12 col-sm-12">
              <a  href="Projet.php?id_freelancer='.$id.'&id_projet='.$row["id_projet"].'">
                <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                  <div class="hidden-content col-lg-12 col-sm-12">
                    <h4>'.$row["full_name"].'</h4> 
                    <p>'.$row["description"].'</p>
                  </div>
                  <a> 
                   <div class="showed-content">
                   <span><i class="fa fa-calendar"></i> '.$row["start_date"].'</span>
                   <a><h4>'.$row["projectName"].'</h4></a>
                   <br><p><h6>budget : '.$row["budget"].' dt</h6></p> <br>
                     <img src="assets/images/portfolio-image.png" alt="">
                   </div>
                  </a>
                </div>
              </a>
            </div>
            <div><br><br><br><br><br></div>';
          };
          }


       echo '</div>
       </div>
     </div>
   
     
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