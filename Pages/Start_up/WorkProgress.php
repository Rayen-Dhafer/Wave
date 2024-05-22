<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Work In Progress</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-onix-digital.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<!--

TemplateMo 565 Onix Digital

https://templatemo.com/tm-565-onix-digital

-->
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
              WHERE P.status = 'in progress' AND U.id = P.id_freelancer  AND id_startup=$id";
          
              $result = $conn->query($sql);
      
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
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li class="scroll-to-section"><a href="WorkProgress.php?id='.$id.'"class="active">WorkProgress</a></li>
                      <li class="scroll-to-section"><a href="portfolio.php?id='.$id.'">portfolio</a></li>
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
          <div id="services" class="our-services section">
            <div class="services-right-dec">
              <img src="assets/images/services-right-dec.png" alt="">
            </div>
            <div class="container">
              <div class="services-left-dec">
                <img src="assets/images/services-left-dec.png" alt="">
              </div>
              <div class="row">
              
              
                <div class="col-lg-6 offset-lg-3">
                  <div class="section-heading">
                    <h2>Project <em>under</em> Continuous  <span>Improvements</span></h2>
                    <span>In Progress</span>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-lg-12 d-flex flex-wrap justify-content-between">
              ';
              while($row = $result->fetch_assoc()){
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
          if($deadline>=$current_date){

              
              echo'
              <script> 
              .col-lg-12 {
                display: flex;
                flex-wrap: wrap;
              }
              
              .item {
                flex: 0 0 auto;
                width: calc(33.33% - 20px); 
                margin-bottom: 20px; 
                box-sizing: border-box; 
              }
              
              </script>
              
              
  <div class="item">
    <h4> The project '.$row['projectName'].'</h4>
    <p><em>Deadline '.$row['deadline'].'</em></p><br>
    <div class="icon"><img src="assets/images/5956592.png"  alt=""></div>
    <p>Freelancer : '.$row['full_name'].'</p><br>
    <div class="progress">
      <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:'.$porcentage.'%" >'.$porcentage.'%</div>
    </div>
  </div>
  ';           }else{
    $id_projet=$row['id_projet'];
   
    $sql = "UPDATE Projects 
    SET status = 'finished' 
    WHERE id_projet = $id_projet";
    $conn->query($sql);

  }
                    
              }   
                  echo'
                  </div>  
                  
                </div>
              </div>
            </div>
          </div>
         ';
         ?>
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
  <footer><br><br><br>
  <br><br><br><br><br><br>
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
  </body>