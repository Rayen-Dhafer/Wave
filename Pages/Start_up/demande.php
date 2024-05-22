<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>demande</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-onix-digital.css">
  <link rel="stylesheet" href="assets/css/animated.css">
  <link rel="stylesheet" href="assets/css/owl.css">
</head>
<body>
  <?php
         $servername = "127.0.0.1"; 
         $username = "root"; 
         $password = ""; 
         $database = "Mydb"; 
         
         $conn = mysqli_connect($servername, $username, $password, $database);
   
         if (!$conn) {
             die("Connection failed: " . mysqli_connect_error());
         }
        $id=$_GET['id'];
        $sql = "SELECT *
                FROM Projects
                Where status='pending'and id_startup =$id";
     
     $result = $conn->query($sql);
        
   ?>
  <?php 
  echo '
       <!-- ***** Preloader Start ***** -->
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
  <!-- ***** Preloader End ***** -->
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav class="main-nav">
                <!-- ***** Logo Start ***** -->
                <a class="logo">
                <h4>Work<span> Wave</span></h4>
              </a>
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                <li class="scroll-to-section"><a href="WorkProgress.php?id='.$id.'">WorkProgress</a></li>
                <li class="scroll-to-section"><a href="portfolio.php?id='.$id.'">portfolio</a></li>
                <li class="scroll-to-section"><a href="demande.php?id='.$id.'"class="active">Demande</a></li> 
                <li class="scroll-to-section"><a href="New.php?id='.$id.'">New</a></li> 
                <li class="scroll-to-section"><a href="profile.php?id='.$id.'">Profile</a></li>
                <li class="scroll-to-section"><div class="main-red-button"><a href="#"> <i class="fa fa-bell"></i> 8 </a></div></li> 
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
  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="assets/images/about-left-image.png" alt="Two Girls working together">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Feel Free to <em>Discover</em> &amp <em> Explore</em> our <span>Projects</span></h2>
            
            <div class="row">
            ';
            
            while($row = $result->fetch_assoc()) {
              $idprojet=$row['id_projet'];
              $sql="select count(*) as number from Request  where' $idprojet'=id_projet";
              $res = $conn->query($sql);
              $chiheb = mysqli_fetch_assoc($res);
            echo '

              
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/5956592.png" alt="">
                    </div>
                    <div class="count-digit">'.$chiheb['number'].'</div>
                    <div class="count-title">'.$row['projectName'].'</div>
                    <p>'.$row['description'].'</p>
                  </div>
                  <div class="main-blue-button-hover">
                       <a href="invitationchaqueprojet.php?id='.$id.'&id_projet='.$idprojet.'">View more details </a>
                  </div>
                
                 
                  

                  

                  </div>
                </div>
              </div>
              
            
              ';
            }
              echo '


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-dec">
  <img src="assets/images/footer-dec.png" alt="">
</div>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 container">
        <div class="about footer-item">
          <div class="logo">
            <a ><img src="assets/images/service-icon-01.png"></a>
          </div>
          <a >Chiheb benammar</a>
          <ul>
            <li><a href="https://www.facebook.com/profile.php?id=100004474756575"><i class="fa fa-facebook"></i></a></li>
            
            <li><a href="https://www.linkedin.com/in/mohamed-chiheb-eddine-benammar-0aa456284/"><i class="fa fa-behance"></i></a></li>
            <li><a href="https://www.instagram.com/chiheb_benammar/"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 container">
      <div class="about footer-item">
      <div class="logo">
        <a ><img src="assets/images/service-icon-03.png" ></a>
      </div>
      <a >anwer bouhereb</a>
      <ul>
        <li><a href="https://www.facebook.com/profile.php?id=100011017338125"><i class="fa fa-facebook"></i></a></li>
        
        <li><a href="https://www.linkedin.com/in/anwer-bouharb-0b7a6028a/"><i class="fa fa-behance"></i></a></li>
        <li><a href="https://www.instagram.com/anwer_bouharb/"><i class="fa fa-instagram"></i></a></li>
      </ul>
    </div>
    </div>
  </div>



  </div>
      <div class="col-lg-12">
        <div class="copyright">
          <p>Copyright © 2024 , Ltd. All Rights Reserved. 
          <br>
          Designed by <a rel="nofollow" href="" >Chiheb et anwer</a></p>
        </div>
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
  <script src="assets/js/custom.js"></script>

  <script>
  // Acc
    $(document).on("click", ".naccs .menu div", function() {
      var numberIndex = $(this).index();

      if (!$(this).is("active")) {
          $(".naccs .menu div").removeClass("active");
          $(".naccs ul li").removeClass("active");

          $(this).addClass("active");
          $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

          var listItemHeight = $(".naccs ul")
            .find("li:eq(" + numberIndex + ")")
            .innerHeight();
          $(".naccs ul").height(listItemHeight + "px");
        }
    });
  </script>'
  ?>
 


</body>
</html>