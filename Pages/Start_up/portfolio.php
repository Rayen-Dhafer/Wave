<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>portfolio</title>

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
$id= $_GET['id'];
$servername = "127.0.0.1"; 
$username = "root"; 
$password = ""; 
$database = "Mydb"; 


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
    $id= $_GET['id'];
    $sql = "SELECT P.* , U.full_name 
    FROM Projects P , User U  
    WHERE P.status = 'fineshed' AND U.id = P.id_startup  AND id_startup=$id";

    $result = $conn->query($sql);




    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT P.* , U.full_name 
        FROM Projects P , User U  
        WHERE P.status = 'finished' AND U.id = P.id_startup  AND id_startup=$id";
    
        $result = $conn->query($sql);
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
            <li class="scroll-to-section"><a href="portfolio.php?id='.$id.'"class="active">portfolio</a></li>
            <li class="scroll-to-section"><a href="demande.php?id='.$id.'">Demande</a></li> 
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

  <div id="portfolio" class="our-portfolio section">
    <div class="portfolio-left-dec">
      <img src="assets/images/portfolio-left-dec.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>Our Recent <em>Projects</em> &amp; Case Studies <span>for Clients</span></h2>
            <span>Our Portfolio</span>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-portfolio">
            <div >

            </div>';

            $c=0;
            while($row = $result->fetch_assoc()){
              $c++;
              if( $c > 4){
                $c=1;
              };
              echo'
            <div class="item">
              <div class="thumb">
                <img src="assets/images/portfolio-0'.$c.'.jpg" alt="">';
                if( $c == 2 ){
                  echo'<br><br>';
                };
                echo'
                <div class="hover-effect">
                  <div class="inner-content">
                    <a href="#"><h4>'.$row['projectName'].'</h4></a>
                    '.$row['description'].'
                    <br>'.$row['budget'].'
                    <br>
                    <span> <br><a href='.$row['project_url'].' target="_blank">URL Git</a></span>
                  </div>
                </div>
              </div><br><br><br><br>v<br><br><br><br><br><br><br>
            </div>';
            }
            echo'


      
         
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer><br><br><br>
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
    </script>
' 
?>   
  
  
</body>
</html>