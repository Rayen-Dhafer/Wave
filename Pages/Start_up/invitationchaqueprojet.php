<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title>chaque projet</title>


  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-onix-digital.css">
  <link rel="stylesheet" href="assets/css/animated.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        .message {
            background-color: #fff;
            padding: 250px;
            border-radius: 100px;
            box-shadow: 0 0 100px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
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
   $id2=$_GET['id_projet'];
   
   $sql = "SELECT R.*,P.*,U.*
           FROM Request R,Projects P,User U 
           Where  U.id=R.id_freelancer and R.id_projet=P.id_projet and R.id_projet=$id2";

$result = $conn->query($sql); 

if(isset($_POST['delete_request'])){

  $deleteValue = $_POST['delete_request'];
    $values = explode(':', $deleteValue);
    $id_freelancer = intval($values[0]);
    $id_projet = intval($values[1]);



  $sql_delete = "DELETE FROM Request WHERE id_freelancer= '$id_freelancer' AND id_projet= '$id_projet'";
  $conn->query($sql_delete) ;
  header("Refresh:0; url=invitationchaqueprojet.php?id=$id&id_projet=$id2");
}

   

if(isset($_POST['confirm_freelancer'])){

  $confirmValue = $_POST['confirm_freelancer'];
    $values = explode(':', $confirmValue);
    $id_freelancer = intval($values[0]);
    $id_projet = intval($values[1]);

    
    $sql = "UPDATE Projects 
    SET status = 'in progress' , id_freelancer = $id_freelancer
    WHERE id_projet = $id_projet";
    $conn->query($sql);

    $sql_delete = "DELETE FROM Request WHERE id_freelancer= '$id_freelancer' AND id_projet= '$id_projet'";
    $conn->query($sql_delete) ;

    header("Refresh:0; url=demande.php?id=$id");
  }


?> 
<?php 
echo '

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
     </header> <br><br><br><br>';
 

 
 if($result->num_rows==0){
   echo '<div class="message">
   <h2>Il n'."'".'existe pas de client</h2>
</div>';

 } 
 else{
  echo ' <h2>'.$row["projectName"].'</h2><br>';
  while($row = $result->fetch_assoc()) {
    
    
  echo'

  <style>
  .caa {
    font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 90px;
        }
        #lesbouttons {
          padding: 20px 10px;
          font-size: 16px;
          cursor: pointer;
          margin: 10px;
      }
        #confirmBtn {
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
        }
        #cancelBtn {
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .col-sm-12 {
          flex: 0 0 auto;
          width: 100%;
        }

    </style>
    
    
  <div class="container-fluid caa">
  <div class="row ">
    <div class="col-lg-12">
      <div class="col-lg-12 col-sm-12>
        <div class="item">
          <div class="thumb">
            



            <form method="POST" class="register-form" id="login-form">
                <div class="hover-effect" id="lesbouttons">
                <div class="inner-content ">
                
                  <a rel="sponsored" href="" target="_parent"><h4>'.$row['full_name'].'</h4></a>
                  <br>
                  <h6>'.$row['email'].'</h6>
                  <h6>'.$row['phone'].'</h6>
                  <h6>'.$row['country'].'</h6>
                  <h6>'.$row['info'].'</h6>
                  
                  
                  <br>
                  <button id="confirmBtn" name="confirm_freelancer" value="'.$row['id'].':'.$row['id_projet'].'">Confirm</button>
                   
                  <button id="cancelBtn" name="delete_request" value="'.$row['id'].':'.$row['id_projet'].'">Delete</button>
                  
                </div>
              </div>
            </form>



















          </div>
        </div>
        <div><br>
        </div>
      
    </div>
  </div>
</div>';
  
  }

 }

 





      ?>    
      <footer>
        <br><br><br><br>
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
</body>
</html>