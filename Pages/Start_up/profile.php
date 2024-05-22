<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title >Work In Progress</title>
    

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-onix-digital.css">
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


    $sel = "SELECT * FROM User WHERE id = '$id' ";
    $result = mysqli_query($conn, $sel);
    $row = mysqli_fetch_assoc($result);

    $name=$row['full_name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $info = $row['info'];
    $country  = $row['country'];
    $my_password  = $row['password'];

    $sel = "SELECT * FROM Credit_card WHERE id_user = '$id' ";
         $result = mysqli_query($conn, $sel);
         $row = mysqli_fetch_assoc($result);

         $brand=$row['brand'];
         $number = $row['number'];
         $expiration = $row['expiration'];
         $cvv = $row['cvv'];

         if(isset($_POST['Save_info']))
         {   
          $name=$_POST['full_name'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $info = $_POST['description'];
          $country  = $_POST['country'];

          if( $name && $email && $phone && $info && $country){
            $sql = "UPDATE User 
                    SET full_name = '$name' , email = '$email' , phone = '$phone' , info = '$info' , country = '$country'
                    WHERE id = $id";
            $conn->query($sql);
            successfully("Information");
          } else{
            error("Information");
          }
        }

        if(isset($_POST['save_password']))
         { 

          $new_password = $_POST['new_password'];
          $hashed_old_password = md5(  $_POST['old_password'] );

          if( $new_password && ( $hashed_old_password == $my_password  ) ){

            $hashed_new_password = md5($new_password);

            $sql = "UPDATE User 
                    SET password = '$hashed_new_password' 
                    WHERE id = $id";
            $conn->query($sql);
            successfully("Password");
          }else {
            error("Password");
          }
        
         }

         if(isset($_POST['save_card']))
         { 

          $brand = $_POST['brand'];
          $number = $_POST['number'];
          $expiration = $_POST['expiration'];
          $cvv = $_POST['cvv'];

          if( $brand && $brand && $expiration && $cvv ){

            $sql = "UPDATE Credit_card 
                    SET brand = '$brand' , number = '$number' , expiration = '$expiration' , cvv = '$cvv'
                    WHERE id_user = $id";

            $conn->query($sql);

            successfully("Credit Card");

          }else {
            error("Credit Card");
          }
        
         }





        function error($msg) {
            echo "
            <script>
            Swal.fire({
              title: 'Error',
              text: 'Cant save your $msg ',
              icon: 'info',
              confirmButtonColor: '#DD6B55',   
            });
            </script>
            ";
            }
  
            function successfully($msg) {
              echo "
              <script>
              Swal.fire({
                title: 'Successfully',
                text: 'Your $msg Saved',
                icon: 'success',
                confirmButtonColor: '#DD6B55',   
              });
              </script>
              ";
              }
echo '<div id="js-preloader" class="js-preloader">
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
        <li class="scroll-to-section"><a href="demande.php?id='.$id.'"class="active">Demande</a></li> 
        <li class="scroll-to-section"><a href="New.php?id='.$id.'">New</a></li> 
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
<div id="parti_1" class="row">
    <div class="col-lg-7">
    <div class="section-heading">
        <h2>Feel free to <em>change  </em> Your   <span> Informations</span></h2>
    </div>
    <div class="col-lg-12 ">
    <form id="contact" action="" method="POST">
        <div class="row">
        <div class="col-lg-12">
            <fieldset>
            <input type="name" name="full_name" id="name" placeholder="Name" autocomplete="on" value='.$name.'>
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
            <input  type="text" name="email" id="name" placeholder="Email"  value='.$email.'></input>
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
            <input type="budget" name="phone" id="budget" placeholder="Phone number" autocomplete="on" value='.$phone.'>
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
            <textarea type="text" name="description" id="website" placeholder="Description" >'.$info.'</textarea>
            </fieldset>
        </div>
        <div class="col-lg-12">
            <fieldset>
            <select id="country" name="country" class="form-control" value="Albania">
            <option value="'.$country.'"><i class="zmdi zmdi-globe"></i>'.$country.'</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Åland Islands">Åland Islands</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antarctica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="Brunei Darussalam">Brunei Darussalam</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoros">Comoros</option>
            <option value="Congo">Congo</option>
            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Cote Divoire">Cote Divoire</option>
            <option value="Croatia">Croatia</option>
            <option value="Cuba">Cuba</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="French Guiana">French Guiana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern Territories">French Southern Territories</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guernsey">Guernsey</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-bissau">Guinea-bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
            <option value="Iraq">Iraq</option>
            <option value="Ireland">Ireland</option>
            <option value="Isle of Man">Isle of Man</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jersey">Jersey</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Korea, Democratic Peoples Republic of">Korea, Democratic Peoples Republic of</option>
            <option value="Korea, Republic of">Korea, Republic of</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option>
            <option value="Lao Peoples Democratic Republic">Lao Peoples Democratic Republic</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macao">Macao</option>
            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option>
            <option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option>
            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
            <option value="Moldova, Republic of">Moldova, Republic of</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montenegro">Montenegro</option>
            <option value="Montserrat">Montserrat</option>
            <option value="Morocco">Morocco</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option>
            <option value="Netherlands Antilles">Netherlands Antilles</option>
            <option value="New Caledonia">New Caledonia</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norfolk Island">Norfolk Island</option>
            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
            <option value="Norway">Norway</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palau">Palau</option>
            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
            <option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option>
            <option value="Philippines">Philippines</option>
            <option value="Pitcairn">Pitcairn</option>
            <option value="Poland">Poland</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option>
            <option value="Reunion">Reunion</option>
            <option value="Romania">Romania</option>
            <option value="Russian Federation">Russian Federation</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint Helena">Saint Helena</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option>
            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia">Serbia</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
            <option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
            <option value="Taiwan">Taiwan</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
            <option value="Thailand">Thailand</option>
            <option value="Timor-leste">Timor-leste</option>
            <option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Viet Nam">Viet Nam</option>
            <option value="Virgin Islands, British">Virgin Islands, British</option>
            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
            <option value="Wallis and Futuna">Wallis and Futuna</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
        </select>
        </fieldset>
        </div><br> &nbsp; <br><br>
        <div class="col-lg-12">
            <fieldset>
            <button type="submit" id="form-submit" name="Save_info" class="main-button">Save</button>
            </fieldset>
        </div>
        </div>
    </form>
    </div>
</div>

<div class="col-lg-5 align-self-center" >
    
</div>
</div>
<div class="contact-dec">
    <img src="assets/images/contact-dec.png" alt="">
</div>
<div class="contact-left-dec">
    <img src="assets/images/contact-left-dec.png" alt="">
</div>
</div><br><br><br><br>




<div  class="col-lg-10 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s" >
<form id="contact" action=""  method="POST" class="parti_2" >
 <a class="logo">
   <h4>Change<span> Password</span></h4>
 </a>
 <br>
  <div class="row">
  
    <div class="col-lg-12">
       <fieldset>
       <input type="password" name="old_password" id="old_password" placeholder="Old password" autocomplete="off" >
       </fieldset>
    </div>
    &nbsp;
    <div class="col-lg-12">
      <fieldset>
      <input type="password" name="new_password" id="new_password" placeholder="New password" autocomplete="off">
      </fieldset>
    </div>

    &nbsp;
     <div class="col-lg-12">
      <fieldset>
        <button name="save_password"  >Save</button>
      </fieldset>
    </div>

  </div><br><br><br><br><br><br><br>



  <div class="col-lg-10 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s" >
           <form id="contact" action=""  method="POST">
            <a class="logo">
              <h4>Add <span>Credit Card</span></h4>  
            </a>
            <br>
             <div class="row">

                <div class="col-lg-12">
                  <fieldset>
                    <input type="text" name="brand" id="brand" placeholder="Brand" autocomplete="off" value='.$brand.'>
                  </fieldset>
                </div>

                <div class="col-lg-12">
                  <fieldset>
                    <input type="text" name="number" id="number" placeholder="Number" autocomplete="off" value='.$number.'>
                  </fieldset>
                </div>

               <div class="col-lg-6">
                 <fieldset>
                 <input type="text" name="expiration" id="expiration" placeholder="Expiration" autocomplete="off" value='.$expiration.'>
                 </fieldset>
               </div>
               <div class="col-lg-6">
                 <fieldset>
                   <input type="text" name="cvv" id="cvv" placeholder="Cvv" autocomplete="off" value='.$cvv.'>
                 </fieldset>
               </div>


                <div class="col-lg-12">
                 <fieldset>
                   <button name="save_card"  >Save</button>
                 </fieldset>
               </div>

             </div>

           </form>
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
</html>