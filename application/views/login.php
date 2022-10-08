
<!DOCTYPE html> 
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url(); ?>assets/" data-template="horizontal-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo $page_title; ?></title>
    
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 admin, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://1.envato.market/frest_admin">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/vendor/fonts/boxicons/css/boxicons.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/libs/typeahead-js/typeahead.css" /> -->
    <!-- Vendor -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/css/pages/page-auth.css">
    <!-- Helpers -->
    <script src="<?php echo base_url(); ?>assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="<?php echo base_url(); ?>assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo base_url(); ?>assets/js/config.js"></script>

    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
      

    <style>
      .center {
        display: block;
        width: 60%;
        margin-left: auto;
        margin-right: auto;
      }
			/* ---- reset ---- */
		
		canvas {
			display: block;
			vertical-align: bottom;
		} /* ---- particles.js container ---- */
		#particles-js {
			position: absolute;
			width: 65%;
			height: 100%;
			background-image: url("");
			background-repeat: no-repeat;
			background-size: cover;
			background-position: 50% 50%;
		}  

    </style>

    
      
</head>

<body>

  <!-- Content -->

<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
			<div id="particles-js"></div>
      <div class="flex-row text-center mx-auto">
        <img src="<?php echo base_url(); ?>assets/img/pages/login-light.png" alt="Miss Teen Oroqueita City" width="100%" class="img-fluid authentication-cover-img" data-app-light-img="pages/login-light.png" data-app-dark-img="pages/login-dark.png">
        <!-- <div class="mx-auto">
          <h3>Discover the powerful admin template 🥳</h3>
          <p>
            Perfectly suited for all level of developers which helps you to <br> kick start your next big projects & Applications.
          </p>
        </div> -->
      </div>
    </div>
    <!-- /Left Text -->

    

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto"> 
        <div class="app-brand mb-4 ">
          <a href="<?php echo base_url(); ?>" class="app-brand-link gap-2 mb-2">   
            <img class="center" class="text-center" src="<?php echo base_url() ?>assets/img/logo.png" alt="">
          </a>
        </div>
        <div class="text-center">
          <h6>Automated Scoring Tabulation System</h6>
        </div>

                      
        <!-- /Logo -->
        <h4 class="mb-2">Login</h4>
        <p class="mb-4">Please sign-in to your account </p>

        <form id="formAuthentication" class="mb-3" action="login/login" method="POST">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your  username" autofocus>
          </div>
          <div class="mb-3 form-password-toggle"> 
            <div class="input-group input-group-merge">
              <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me">
              <label class="form-check-label" for="remember-me">
                Remember Me
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary d-grid w-100" id="submitbutton">
            Sign in
          </button>
        </form> 
 
      </div>
    </div>
    <!-- /Login -->
  </div>
</div>

<!-- / Content -->
 

  
  <script>
    var BASE_URL = "<?php echo base_url(); ?>"; 
  </script>
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->  
  <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/libs/popper/popper.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/js/bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/vendor/libs/hammer/hammer.js"></script>
  

  <script src="<?php echo base_url(); ?>assets/vendor/libs/i18n/i18n.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/libs/typeahead-js/typeahead.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?php echo base_url(); ?>assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

  <!-- Main JS -->
  <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/sweetalert.js"></script>
  <!-- Page JS -->
  <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
  <!-- <script src="<?php echo base_url(); ?>assets/js/pages-auth.js"></script> -->
	<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
	<script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
	<script> 
  

    $(document).ready(function() {
      
      
      setInterval(function() {
        bubble()
      }, Math.floor(Math.random() * (10000 - 3000)) + 3000 ); 

      function bubble(){
        particlesJS("particles-js", {
          particles: {
            number: {
              value: 20,
              density: { enable: true, value_area: 1603.4120608655228 }
            },
            color: { value: "#ffffff" },
            shape: {
              type: "circle",
              stroke: { width: 0, color: "#fff" },
              polygon: { nb_sides: 6 },
              image: { src: "<?php echo base_url() ?>assets/img/bubble.jpg", width: 100, height: 100 }
            },
            opacity: {
              value: 0.5,
              random: true,
              anim: { enable: false, speed: 1, opacity_min: 0.1, sync: false }
            },
            size: {
              value: 95,
              random: true,
              anim: {
                enable: true,
                speed: 0,
                size_min: 0,
                sync: false
              }
            },
            line_linked: {
              enable: false,
              distance: 978.5430756240181,
              color: "#ffffff",
              opacity: 0.3,
              width: 2.8409315098761816
            },
            move: {
              enable: true,
              speed: 20,
              direction: "none",
              random: true,
              straight: false,
              out_mode: "out",
              bounce: false,
              attract: { enable: true, rotateX: 600, rotateY: 1183.721462448409 }
            }
          },
          interactivity: {
            detect_on: "canvas",
            events: {
              onhover: { enable: false, mode: "grab" },
              onclick: { enable: false, mode: "push" },
              resize: true
            },
            modes: {
              grab: { distance: 400, line_linked: { opacity: 1 } },
              bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 },
              repulse: { distance: 200, duration: 0.4 },
              push: { particles_nb: 4 },
              remove: { particles_nb: 2 }
            }
          },
          retina_detect: true
        });
        requestAnimationFrame(update); 

      } 

    });
	</script>
</body>

</html>
