<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Projet</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css " rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">   
   </head>
    <body>
        <?php


      $id_projet = $_GET['id_projet'];
      $id_freelancer = $_GET['id_freelancer'];

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

      $sql = "SELECT P.* , U.* FROM Projects P , User U WHERE P.id_projet = $id_projet  AND U.id = P.id_startup ";
      $result = $conn->query($sql);
      $row = mysqli_fetch_assoc($result);



      if (isset($_GET['send'])) {


        $sql = "INSERT INTO `Request` (`id_freelancer`, `id_projet`) 
        VALUES 
        ('$id_freelancer', '$id_projet')";    

        $conn->query($sql);

            echo "   
            <script>
            Swal.fire({
                icon: 'info',
                title: 'Send Request Successfully',
                showConfirmButton: false,
                showCloseButton: true,
                confirmButtonText: 'Go Home',
            }).then((result) => {
              if (result.isConfirmed) {
                  location.href='http://localhost:8000/Pages/Freelancer/Home.php?id=$id_freelancer';
              } else {
                  location.href='http://localhost:8000/Pages/Freelancer/Home.php?id=$id_freelancer';
              }
            }
          );
            </script>";

        
      }









       echo '
       <div class="main-blue-button" id="go_home" >
            <a href="Home.php?id='.$id_freelancer.'">
              <i class="zmdi zmdi-chevron-left"></i> Home
            </a>
       </div>
       <div id="about" class="about-us section">
         <div class="container">
           <div class="row">
             <div class="col-lg-4">
               <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                 <img src="assets/images/about-left-image.png" alt="person graphic">
               </div>
             </div>
             <div class="col-lg-8 align-self-center">
               <div class="services">
                 <div class="row">
                   <div class="col-lg-6">
                     <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                       <div class="icon">
                         <img src="assets/images/service-icon-01.png" alt="reporting">
                       </div>
                       <div class="right-text">
                         <h4>'.$row['full_name'].'</h4>
                         <p><i class="zmdi zmdi-email"></i> &nbsp;&nbsp;&nbsp;'.$row['email'].'</p>
                         <p><i class="zmdi zmdi-phone material-icons-name"></i> &nbsp;&nbsp;&nbsp;'.$row['phone'].'</p>
                         <p class="left_info"><i class="zmdi zmdi-globe material-icons-name"></i>  &nbsp;&nbsp;&nbsp;'.$row['country'].'</p>
                         <p class="left_info"><i class="zmdi zmdi-assignment material-icons-name"></i> &nbsp;&nbsp;&nbsp;'.$row['info'].'</p>
                       </div>
                     </div>
                   </div>

                   
                   
                   <div class="col-lg-6">
                     <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                       <div class="icon">
                         <img src="assets/images/service-icon-03.png" alt="">
                       </div>
                       <div class="right-text">
                         <h4>'.$row['projectName'].'</h4>
                         <p><i class="zmdi zmdi-calendar-check"></i> &nbsp;&nbsp;&nbsp;'.$row['start_date'].'</p>
                         <p><i class="zmdi zmdi-timer-off"></i> &nbsp;&nbsp;&nbsp;'.$row['deadline'].'</p>
                         <p class="left_info"><i class="zmdi zmdi-money"></i> &nbsp;&nbsp;&nbsp;'.$row['budget'].' DT &nbsp;&nbsp;/&nbsp;&nbsp;'.$row['paiementMethode'].'</p>
                         <p class="left_info"><i class="zmdi zmdi-sort-amount-desc"></i> &nbsp;&nbsp;&nbsp;'.$row['description'].'</p>
                       </div>
                     </div>
                   </div>
 
                   <div class="main-blue-button" id="send_req" >
                      <a href="Projet.php?id_freelancer='.$id_freelancer.'&id_projet='.$id_projet.'&send=true">Send Request</a>
                   </div>
                 </div>
               </div>
             </div>
           </div>
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
       <script src=vendor/jquery/jquery.min.js"></script>
       <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
       <script src="assets/js/owl-carousel.js"></script>
       <script src="assets/js/animation.js"></script>
       <script src="assets/js/imagesloaded.js"></script>
       <script src="assets/js/templatemo-custom.js"></script>
     
';
        ?>
    </body>
</html>