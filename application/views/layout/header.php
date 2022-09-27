


<!-- Navbar --> 
<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-xxl"> 
      
      <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="<?php echo base_url(); ?>" class="app-brand-link gap-2">
          <span class="app-brand-logo demo">
            <img src="<?php echo base_url() ?>assets/img/icon.png" style="width: 1000px; height:30px;" alt="Icon">
        </span>
          <span class="app-brand-text demo menu-text fw-bold">Automated Scoring Tabulation System</span>
        </a> 
        
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
          <i class="bx bx-x bx-sm align-middle"></i>
        </a>
        
      </div>
       
      
      
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none  ">
        <a class="nav-item nav-link px-0 me-xl-4" href="<?php echo base_url(); ?>">
          <i class="bx bx-menu bx-sm"></i> 
        </a>
      </div>
      

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        

        <ul class="navbar-nav flex-row align-items-center ms-auto">
           


          
          <!-- Search -->
          <li class="nav-item navbar-search-wrapper me-2 me-xl-0">
            <a class="nav-item nav-link search-toggler" href="javascript:void(0);">
              <i class="bx bx-search bx-sm"></i>
            </a>
          </li>
          <!-- /Search -->
          

          <!-- Style Switcher -->
          <li class="nav-item me-2 me-xl-0">
            <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
              <i class='bx bx-sm'></i>
            </a>
          </li>
          <!--/ Style Switcher -->
 
 

          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="<?php echo base_url(); ?>assets/img/profile.png" alt class="rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src="<?php echo base_url(); ?>assets/img/profile.png" alt class="rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-semibold d-block lh-1"><?php echo $_SESSION['name']; ?></span>
                      <small><?php echo $_SESSION['role_type']; ?></small>
                    </div>
                  </div>
                </a>
              </li> 
              <li>
                <a class="dropdown-item" href="<?php echo base_url() ?>dashboard/signout"  >
                  <i class="bx bx-power-off me-2"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ User -->
          

        </ul>
      </div>

      
      <!-- Search Small Screens -->
      <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
        <input type="text" class="form-control search-input  border-0" placeholder="Search..." aria-label="Search...">
        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
      </div>
      
      
    </div>
  </nav>
  

  
<!-- / Navbar -->
