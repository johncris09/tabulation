<!DOCTYPE html> 
<html lang="en" class="light-style " dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url(); ?>assets/" data-template="horizontal-menu-template">

<head>
	<?php $this->view('layout/meta') ?>
		<?php $this->view('layout/css') ?>
</head>

<body> 
	<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
		<div class="layout-container">
			<?php $this->view('layout/header') ?> 
				<div class="layout-page"> 
					<div class="content-wrapper">
						<?php $this->view('layout/menu') ?>
						<div class="container-xxl flex-grow-1 container-p-y">
             

							<!-- Examples -->
							<div class="row mb-5">
								<div class="col-md-3 col-lg-3 col-sm-4 mb-3">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/talent.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">TALENT PRESENTATION</h3>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>talent_presentation">View Score</a> 
											</div>
										</div>
									</div>
								</div> 
								<div class="col-md-3 col-lg-3 col-sm-4 mb-3">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/production_number.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">PRODUCTION NUMBER</h3>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>production_number">View Score</a> 
											</div>
										</div>
									</div>
								</div> 
								<div class="col-md-3 col-lg-3 col-sm-4 mb-3">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/production_attire.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">PRODUCTION ATTIRE</h3>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>production_attire">View Score</a> 
											</div>
										</div>
									</div>
								</div> 
								<div class="col-md-3 col-lg-3 col-sm-4 mb-3">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/swim_wear.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">BEST IN SWIM WEAR  </h3>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>swim_wear">View Score</a> 
											</div>
										</div>
									</div>
								</div> 
								<div class="col-md-3 col-lg-3 col-sm-4 mb-3">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/evening_gown.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">BEST IN EVENING GOWN</h3>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>evening_gown">View Score</a> 
											</div>
										</div>
									</div>
								</div>  
								<div class="col-md-3 col-lg-3 col-sm-4 mb-3">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/top_5.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">TOP 5</h3>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>top_five">View Score</a> 
											</div>
										</div>
									</div>
								</div> 
								<div class="col-md-3 col-lg-3 col-sm-4 mb-3">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/5.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">FINAL ROUND</h3>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>final_round">View Score</a> 
											</div>
										</div>
									</div>
								</div>  
							</div>
							<!-- Examples -->
  

						<?php $this->view('layout/footer') ?>
						<div class="content-backdrop fade"></div>
					</div> 
				</div> 
		</div>
	</div> 
	<div class="layout-overlay layout-menu-toggle"></div> 
	<div class="drag-target"></div> 
	<?php $this->view('layout/js') ?>
</body>

</html>