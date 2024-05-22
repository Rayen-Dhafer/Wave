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
    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css " rel="stylesheet">
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


        try{
            $conn = mysqli_connect($servername, $username, $password, $database);
            }
            catch (mysqli_sql_exception $e){
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }


        if(isset($_POST['create']))
        {

            $projectName = $_POST['Project_Name'];
            $deadline = $_POST['Deadline'] ;
            $description = $_POST['Description'];
            $paiementMethode= $_POST['Paiement_Methode'];
            $budget = $_POST['Budget'];
            $start_date= $_POST['start_date'];


            if( $paiementMethode && $projectName && $deadline && $description && $budget && $start_date ){

                $exist_project = "SELECT projectName FROM Projects WHERE projectName = '$projectName'"  ;
                $res = mysqli_query($conn, $exist_project);

                if (mysqli_num_rows($res) == 0) {
            $sel = "SELECT MAX(id_projet) AS max_id FROM Projects";
                    $result = mysqli_query($conn, $sel);
                    $row = mysqli_fetch_assoc($result);
            
                    if ( $row['max_id'] > 1)
                        {    $my_id = $row['max_id']+1;   } 
                    else 
                        {    $my_id = 14725836 ; }
                    mysqli_free_result($result);

                    $sql = "INSERT INTO `Projects` (`id_projet`, `projectName`, `description`, `budget`, `paiementMethode`, `start_date` ,`deadline`, `status`, `payment`, `id_startup`) VALUES ('$my_id', '$projectName', '$description', '$budget', '$paiementMethode', '$start_date', '$deadline', 'pending', '0', '$id')";
                    $conn->query($sql); 
                    echo "   
            <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'New Task Added Success',
                showConfirmButton: false,
                timer: 1900
            });
            </script>";
        }
        else{
            echo "   
            <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Task already exists',
                showConfirmButton: false,
                timer: 1500
              });
            </script>";
        }
    }
}
                

                
            
        












         echo '
         <br><br><br>
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
                    <li class="scroll-to-section"><a href="WorkProgress.php?id='.$id.'">WorkProgress</a></li>
                    <li class="scroll-to-section"><a href="portfolio.php?id='.$id.'">portfolio</a></li>
                    <li class="scroll-to-section"><a href="demande.php?id='.$id.'">Demande</a></li> 
                    <li class="scroll-to-section"><a href="New.php?id='.$id.'"class="active">New</a></li> 
                    <li class="scroll-to-section"><a href="profile.php?id='.$id.'">Profile</a></li>
                    <li class="scroll-to-section"><div class="main-red-button"><a href="#"> <i class="fa fa-bell"></i> 8 </a></div></li> 

                    <!-- ***** Menu End ***** -->
                </nav>
                </div>
            </div>
            </div>
        </header>
          <div id="contact" class="contact-us section">
            <div class="container">
            <div class="row">
                <div class="col-lg-7">
                <br><br>
                <div class="section-heading">
                    <h2>Feel free to <em>Add </em> Your   <span> Desirable Project</span></h2>
                </div>
                <br><br>
                <div id="map">
                    <img src="assets/images/5956592.png" width="100%" height="360px" frameborder="0" style="border:0" allowfullscreen=""></img>
                </div>
            </div>
            <div class="col-lg-5 align-self-center">
                <form id="contact" action="" method="POST">
                    <div class="row">
                    <div class="col-lg-12">
                        <fieldset>
                        <input type="name" name="Project_Name" id="name" placeholder="Project Name" autocomplete="on" required>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                        <textarea  type="text" name="Description" id="name" placeholder="Description" autocomplete="on" size="999"  required=""></textarea>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                        <input type="budget" name="Budget" id="budget" placeholder="Budget" autocomplete="on"  required>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                        <input type="text" name="Paiement_Methode" id="website" placeholder="Paiement Methode" required>
                        </fieldset>
                    </div>

                    <div class="col-lg-12">
                        <div>Start date</div>
                        <fieldset>
                            <input type="date" name="start_date" id="surname" placeholder="Start date" autocomplete="on"  required>
                        </fieldset>
                    </div>
                    
                    <div class="col-lg-12">
                        <div>Deadline</div>
                        <fieldset>
                            <input type="date" name="Deadline" id="surname" placeholder="Deadline" autocomplete="on"  required>
                        </fieldset>
                    </div>

                    <div class="col-lg-12">
                        <fieldset>
                        <button type="submit" id="form-submit" name="create" class="main-button">Submit New Task</button>
                        </fieldset>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            <div class="contact-dec">
                <img src="assets/images/contact-dec.png" alt="">
            </div>
            <div class="contact-left-dec">
                <img src="assets/images/contact-left-dec.png" alt="">
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
  </body>
  