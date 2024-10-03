
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="https://gpmautomatedtradingsystem.com/cloud/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../img/logo.png">
  <title>
    GPM Automated Trading System | Registration
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css@v=1.0.7.css" rel="stylesheet" />
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <!--Sweet alert JS-->
  <script src="https://www.jquery-az.com/javascript/alert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://www.jquery-az.com/javascript/alert/dist/sweetalert.css">
  <!--Sweet alert JS ends here-->
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../../index.html">
        <img src="../../img/logo.png" width="150px" height="80px">
      </a>

    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../../images/use.jpg');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 text-center mx-auto">
              <br>
              <h1 class="text-white mb-2 mt-5">Welcome!</h1>
             </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-6 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
              <div class="card-body">
                <form class="theme-form login-form" method="POST" action="register.php">
                <h4>Create your account</h4>
          				<!-- <p style='' for="google-signup-btn">Sign up with Google</p> -->
                  <div class="google-signup">
                  <a href="<br />
<b>Warning</b>:  Undefined variable $auth_url in <b>/home/u101008997/domains/gpmautomatedtradingsystem.com/public_html/cloud/pages/signup.php</b> on line <b>397</b><br />
" class="google-signup-link">
                    <!-- <span class="google-signup-icon"><i class="fa fa-google"></i></span> -->
                    <!-- <span class="google-signup-text">Sign up with Google</span> -->
                  </a>
                  </div>
                
                  <div class="or-separator">
                    <!-- <span>Or</span> -->
                  </div>
                  <h6>Enter your personal details to create account</h6>
				  <?php if(isset($_GET['error'])){ ?>
                <div style="color:red;background-color:#eba8aa;padding:10px;">
                    <?php echo $_GET['error']; ?>
                </div>
                <?php } ?>

                <?php if(isset($_GET['success'])){ ?>
                <div style="color:green;background-color:#b9eba8;padding:10px;">
                    <?php echo $_GET['success']; ?>
                </div>
                <?php } ?><br>
                  <div class="form-group">
                  <label>Your Fullname</label>
                  <div class="small-group">
                    <div class="input-group"><span class="input-group-text"><i class="fas fa-user"></i></span>
                      <input class="form-control" type="text" required="" placeholder="Fullname" name="name">
                    </div>
                  </div>
                </div>
				          <div class="form-group">
                  <label>Email</label>
                  <div class="input-group"><span class="input-group-text"><i class="fas fa-envelope"></i></span>

					<input class="form-control" type="email" required="" placeholder="Enter email" name="email">

                  </div>
                </div>
				<div class="form-group">
                  <div class="small-group">
                    <div class="input-group">

					<span class="input-group-text"><i class="fas fa-user"></i></span>
                      <input class="form-control" type="text" required="" placeholder="Enter Username" name="username">
                    </div>
                    <div class="input-group">

					<span class="input-group-text"><i class="fas fa-phone"></i></span>
                      <input class="form-control" type="text" name="cnumber" required="" placeholder="Enter Phone Number" >
					  <input class="form-control" type="hidden" name="refer" value="none" placeholder="Enter Phone Number" >
                    </div>
                  </div>
                </div>
				<div class="form-group">
                  <div class="small-group">
                    <div class="input-group"><span class="input-group-text"><i class="fas fa-lock"></i></span>
                      <input class="form-control" type="password" name="password" required="" placeholder="enter password" >
                    </div>
                    <div class="input-group"><span class="input-group-text"><i class="fas fa-lock"></i></span>
                      <input class="form-control" type="password" name="cpassword" required="" placeholder="confirm password" >
                      <input class="form-control" type="hidden" name="upline" value="" required="" placeholder="" >
                    </div>
                    <div class="input-group"><span class="input-group-text"><i class="fas fa-user"></i></span>
                      <select class="form-control" name="gender">
						<option>Male</option>
						<option>Female</option>
					</select>
                    </div>
                  </div>
                </div>

				<div class="form-group">
                  <label>Date of Birth</label>
                  <div class="input-group"><span class="input-group-text"><i class="fas fa-calendar"></i></span>
					<input class="form-control digits" type="date" value="2005-01-01" name="dob" required="" placeholder="Enter date of birth">
                  </div>
                </div>
				<div class="form-group">
                  <label>Residential Address</label>
                  <div class="input-group"><span class="input-group-text"><i class="fas fa-location"></i></span>
                    <input class="form-control" type="text" name="address" required="" placeholder="Enter residential address" >
                  </div>
                </div>


                            <input class="form-control" type="hidden" name="ssn" placeholder="SSN format: 000-00-0000" value="000-0000-00000">

				<div class="form-group">
                  <label>Country</label>
                  <div class="input-group"><span class="input-group-text"><i class="fas fa-landmark"></i></span>
            <select name="country" class="form-control">
  						<option value="" disabled>Country...</option>
  						<option value="Afganistan">Afghanistan</option>
  						<option value="Albania">Albania</option>
  						<option value="Algeria">Algeria</option>
  						<option value="American Samoa">American Samoa</option>
  						<option value="Andorra">Andorra</option>
  						<option value="Angola">Angola</option>
  						<option value="Anguilla">Anguilla</option>
  						<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
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
  						<option value="Bonaire">Bonaire</option>
  						<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
  						<option value="Botswana">Botswana</option>
  						<option value="Brazil">Brazil</option>
  						<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
  						<option value="Brunei">Brunei</option>
  						<option value="Bulgaria">Bulgaria</option>
  						<option value="Burkina Faso">Burkina Faso</option>
  						<option value="Burundi">Burundi</option>
  						<option value="Cambodia">Cambodia</option>
  						<option value="Cameroon">Cameroon</option>
  						<option value="Canada">Canada</option>
  						<option value="Canary Islands">Canary Islands</option>
  						<option value="Cape Verde">Cape Verde</option>
  						<option value="Cayman Islands">Cayman Islands</option>
  						<option value="Central African Republic">Central African Republic</option>
  						<option value="Chad">Chad</option>
  						<option value="Channel Islands">Channel Islands</option>
  						<option value="Chile">Chile</option>
  						<option value="China">China</option>
  						<option value="Christmas Island">Christmas Island</option>
  						<option value="Cocos Island">Cocos Island</option>
  						<option value="Colombia">Colombia</option>
  						<option value="Comoros">Comoros</option>
  						<option value="Congo">Congo</option>
  						<option value="Cook Islands">Cook Islands</option>
  						<option value="Costa Rica">Costa Rica</option>
  						<option value="Cote DIvoire">Cote D'Ivoire</option>
  						<option value="Croatia">Croatia</option>
  						<option value="Cuba">Cuba</option>
  						<option value="Curaco">Curacao</option>
  						<option value="Cyprus">Cyprus</option>
  						<option value="Czech Republic">Czech Republic</option>
  						<option value="Denmark">Denmark</option>
  						<option value="Djibouti">Djibouti</option>
  						<option value="Dominica">Dominica</option>
  						<option value="Dominican Republic">Dominican Republic</option>
  						<option value="East Timor">East Timor</option>
  						<option value="Ecuador">Ecuador</option>
  						<option value="Egypt">Egypt</option>
  						<option value="El Salvador">El Salvador</option>
  						<option value="Equatorial Guinea">Equatorial Guinea</option>
  						<option value="Eritrea">Eritrea</option>
  						<option value="Estonia">Estonia</option>
  						<option value="Ethiopia">Ethiopia</option>
  						<option value="Falkland Islands">Falkland Islands</option>
  						<option value="Faroe Islands">Faroe Islands</option>
  						<option value="Fiji">Fiji</option>
  						<option value="Finland">Finland</option>
  						<option value="France">France</option>
  						<option value="French Guiana">French Guiana</option>
  						<option value="French Polynesia">French Polynesia</option>
  						<option value="French Southern Ter">French Southern Ter</option>
  						<option value="Gabon">Gabon</option>
  						<option value="Gambia">Gambia</option>
  						<option value="Georgia">Georgia</option>
  						<option value="Germany">Germany</option>
  						<option value="Ghana">Ghana</option>
  						<option value="Gibraltar">Gibraltar</option>
  						<option value="Great Britain">Great Britain</option>
  						<option value="Greece">Greece</option>
  						<option value="Greenland">Greenland</option>
  						<option value="Grenada">Grenada</option>
  						<option value="Guadeloupe">Guadeloupe</option>
  						<option value="Guam">Guam</option>
  						<option value="Guatemala">Guatemala</option>
  						<option value="Guinea">Guinea</option>
  						<option value="Guyana">Guyana</option>
  						<option value="Haiti">Haiti</option>
  						<option value="Hawaii">Hawaii</option>
  						<option value="Honduras">Honduras</option>
  						<option value="Hong Kong">Hong Kong</option>
  						<option value="Hungary">Hungary</option>
  						<option value="Iceland">Iceland</option>
  						<option value="India">India</option>
  						<option value="Indonesia">Indonesia</option>
  						<option value="Iran">Iran</option>
  						<option value="Iraq">Iraq</option>
  						<option value="Ireland">Ireland</option>
  						<option value="Isle of Man">Isle of Man</option>
  						<option value="Israel">Israel</option>
  						<option value="Italy">Italy</option>
  						<option value="Jamaica">Jamaica</option>
  						<option value="Japan">Japan</option>
  						<option value="Jordan">Jordan</option>
  						<option value="Kazakhstan">Kazakhstan</option>
  						<option value="Kenya">Kenya</option>
  						<option value="Kiribati">Kiribati</option>
  						<option value="Korea North">Korea North</option>
  						<option value="Korea Sout">Korea South</option>
  						<option value="Kuwait">Kuwait</option>
  						<option value="Kyrgyzstan">Kyrgyzstan</option>
  						<option value="Laos">Laos</option>
  						<option value="Latvia">Latvia</option>
  						<option value="Lebanon">Lebanon</option>
  						<option value="Lesotho">Lesotho</option>
  						<option value="Liberia">Liberia</option>
  						<option value="Libya">Libya</option>
  						<option value="Liechtenstein">Liechtenstein</option>
  						<option value="Lithuania">Lithuania</option>
  						<option value="Luxembourg">Luxembourg</option>
  						<option value="Macau">Macau</option>
  						<option value="Macedonia">Macedonia</option>
  						<option value="Madagascar">Madagascar</option>
  						<option value="Malaysia">Malaysia</option>
  						<option value="Malawi">Malawi</option>
  						<option value="Maldives">Maldives</option>
  						<option value="Mali">Mali</option>
  						<option value="Malta">Malta</option>
  						<option value="Marshall Islands">Marshall Islands</option>
  						<option value="Martinique">Martinique</option>
  						<option value="Mauritania">Mauritania</option>
  						<option value="Mauritius">Mauritius</option>
  						<option value="Mayotte">Mayotte</option>
  						<option value="Mexico">Mexico</option>
  						<option value="Midway Islands">Midway Islands</option>
  						<option value="Moldova">Moldova</option>
  						<option value="Monaco">Monaco</option>
  						<option value="Mongolia">Mongolia</option>
  						<option value="Montserrat">Montserrat</option>
  						<option value="Morocco">Morocco</option>
  						<option value="Mozambique">Mozambique</option>
  						<option value="Myanmar">Myanmar</option>
  						<option value="Nambia">Nambia</option>
  						<option value="Nauru">Nauru</option>
  						<option value="Nepal">Nepal</option>
  						<option value="Netherland Antilles">Netherland Antilles</option>
  						<option value="Netherlands">Netherlands (Holland, Europe)</option>
  						<option value="Nevis">Nevis</option>
  						<option value="New Caledonia">New Caledonia</option>
  						<option value="New Zealand">New Zealand</option>
  						<option value="Nicaragua">Nicaragua</option>
  						<option value="Niger">Niger</option>
  						<option value="Nigeria">Nigeria</option>
  						<option value="Niue">Niue</option>
  						<option value="Norfolk Island">Norfolk Island</option>
  						<option value="Norway">Norway</option>
  						<option value="Oman">Oman</option>
  						<option value="Pakistan">Pakistan</option>
  						<option value="Palau Island">Palau Island</option>
  						<option value="Palestine">Palestine</option>
  						<option value="Panama">Panama</option>
  						<option value="Papua New Guinea">Papua New Guinea</option>
  						<option value="Paraguay">Paraguay</option>
  						<option value="Peru">Peru</option>
  						<option value="Phillipines">Philippines</option>
  						<option value="Pitcairn Island">Pitcairn Island</option>
  						<option value="Poland">Poland</option>
  						<option value="Portugal">Portugal</option>
  						<option value="Puerto Rico">Puerto Rico</option>
  						<option value="Qatar">Qatar</option>
  						<option value="Republic of Montenegro">Republic of Montenegro</option>
  						<option value="Republic of Serbia">Republic of Serbia</option>
  						<option value="Reunion">Reunion</option>
  						<option value="Romania">Romania</option>
  						<option value="Russia">Russia</option>
  						<option value="Rwanda">Rwanda</option>
  						<option value="St Barthelemy">St Barthelemy</option>
  						<option value="St Eustatius">St Eustatius</option>
  						<option value="St Helena">St Helena</option>
  						<option value="St Kitts-Nevis">St Kitts-Nevis</option>
  						<option value="St Lucia">St Lucia</option>
  						<option value="St Maarten">St Maarten</option>
  						<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
  						<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
  						<option value="Saipan">Saipan</option>
  						<option value="Samoa">Samoa</option>
  						<option value="Samoa American">Samoa American</option>
  						<option value="San Marino">San Marino</option>
  						<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
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
  						<option value="Spain">Spain</option>
  						<option value="Sri Lanka">Sri Lanka</option>
  						<option value="Sudan">Sudan</option>
  						<option value="Suriname">Suriname</option>
  						<option value="Swaziland">Swaziland</option>
  						<option value="Sweden">Sweden</option>
  						<option value="Switzerland">Switzerland</option>
  						<option value="Syria">Syria</option>
  						<option value="Tahiti">Tahiti</option>
  						<option value="Taiwan">Taiwan</option>
  						<option value="Tajikistan">Tajikistan</option>
  						<option value="Tanzania">Tanzania</option>
  						<option value="Thailand">Thailand</option>
  						<option value="Togo">Togo</option>
  						<option value="Tokelau">Tokelau</option>
  						<option value="Tonga">Tonga</option>
  						<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
  						<option value="Tunisia">Tunisia</option>
  						<option value="Turkey">Turkey</option>
  						<option value="Turkmenistan">Turkmenistan</option>
  						<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
  						<option value="Tuvalu">Tuvalu</option>
  						<option value="Uganda">Uganda</option>
  						<option value="Ukraine">Ukraine</option>
  						<option value="United Arab Erimates">United Arab Emirates</option>
  						<option value="United Kingdom">United Kingdom</option>
  						<option value="USA">United States of America</option>
  						<option value="Uraguay">Uruguay</option>
  						<option value="Uzbekistan">Uzbekistan</option>
  						<option value="Vanuatu">Vanuatu</option>
  						<option value="Vatican City State">Vatican City State</option>
  						<option value="Venezuela">Venezuela</option>
  						<option value="Vietnam">Vietnam</option>
  						<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
  						<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
  						<option value="Wake Island">Wake Island</option>
  						<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
  						<option value="Yemen">Yemen</option>
  						<option value="Zaire">Zaire</option>
  						<option value="Zambia">Zambia</option>
  						<option value="Zimbabwe">Zimbabwe</option>
  					</select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                    <input id="checkbox1" checked required type="checkbox">
                    <label class="text-muted" for="checkbox1">Agree with <span><a href="signup.php#">Terms and conditions ?</a></span></label>
                  </div>
                  <!--Secret key-->
                  <!-- <div class="g-recaptcha" data-sitekey="6Le9gYkdAAAAAEUgZGjnpJPWAcqXzsocLy43CFPT"></div> -->
                <!-- </div> -->

                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit" name="register">Create Account</button>
                </div>
                <p>Already have an account?<a class="ms-2" href="login.php">Sign in</a></p>
              </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-4 mx-auto text-center">
            <a href="../../index.html" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              Home
            </a>
            <a href="../../index.html" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
              About Us
            </a>

          </div>

        </div>
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
              </script>
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js@v=1.0.7"></script>
</body>

</html>
