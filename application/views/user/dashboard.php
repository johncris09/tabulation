<!DOCTYPE html> 
<html lang="en" class="light-style " dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url(); ?>assets/" data-template="horizontal-menu-template">

<head>
	<?php $this->view('layout/meta') ?>
	<?php $this->view('layout/css') ?>
	<style>
		.display-card{
			display: none;
		}
	</style>
</head>

<body> 
	<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
		<div class="layout-container">
			<?php $this->view('layout/header') ?> 
				<div class="layout-page"> 
					<div class="content-wrapper">
						<?php $this->view('layout/menu') ?>
						<div class="container-xxl flex-grow-1 container-p-y">
		
							<div class="row mb-5"> 
								<div data-settings="talent_presentation_card" class="col-md-3 col-lg-3 col-sm-4 mb-3 display-card">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/talent.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">TALENT PRESENTATION</h3>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>talent_presentation">Score</a> 
											</div>
										</div>
									</div>
								</div> 
								<div data-settings="production_number_card" class="col-md-3 col-lg-3 col-sm-4 mb-3 display-card">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/production_number.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">PRODUCTION NUMBER</h3>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>production_number">Score</a> 
											</div>
										</div>
									</div>
								</div> 
								<div data-settings="production_attire_card" class="col-md-3 col-lg-3 col-sm-4 mb-3 display-card">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/production_attire.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">PRODUCTION ATTIRE</h3><br>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>production_attire">Score</a> 
											</div>
										</div>
									</div>
								</div> 
								<div data-settings="swim_wear_card" class="col-md-3 col-lg-3 col-sm-4 mb-3 display-card">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/swim_wear.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">BEST IN SWIM WEAR</h3><br>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>swim_wear">Score</a> 
											</div>
										</div>
									</div>
								</div> 
								<div data-settings="evening_gown_card" class="col-md-3 col-lg-3 col-sm-4 mb-3 display-card">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/evening_gown.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">BEST IN EVENING GOWN</h3>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>evening_gown">Score</a> 
											</div>
										</div>
									</div>
								</div>  
								<div data-settings="top_five_card" class="col-md-3 col-lg-3 col-sm-4 mb-3 display-card">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/top_5.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">TOP 5</h3><br>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>top_five">Score</a> 
											</div>
										</div>
									</div>
								</div> 
								<div data-settings="final_round_card" class="col-md-3 col-lg-3 col-sm-4 mb-3 display-card">
									<div class="card h-100">
										<img class="card-img-top p-2" src="<?php echo base_url(); ?>assets/img/5.jpg" alt="Card image cap">
										<div class="card-body">
											<h3 class="card-title text-center">FINAL ROUND</h3><br>
											<div class="d-grid gap-2 col-lg-6 mx-auto">
												<a class="btn btn-primary  " href="<?php echo base_url() ?>final_round">Score</a> 
											</div>
										</div>
									</div>
								</div>  
							</div> 
  

						<?php $this->view('layout/footer') ?>
						<div class="content-backdrop fade"></div>
					</div> 
				</div> 
		</div>
	</div> 
	<div class="layout-overlay layout-menu-toggle"></div> 
	<div class="drag-target"></div> 
	<?php $this->view('layout/js') ?>
	<script>
		
		$(document).ready(function(){ 
			
			setInterval(function(){   
				display_card();
			}, 500); 
			
			function display_card(){ 
				$('.display-card').each(function(){   
					var _this = $(this)  
					$.ajax({
						type : 'POST',
						url : BASE_URL + "settings/get_settings",
						data : { 
							settings : $(this).data('settings'), 
						},
						dataType: "json",
						success : function(data){   
							if(data != 1){
								$('div[data-settings="'+_this.data('settings')+'"]').hide()
							}else{
								$('div[data-settings="'+_this.data('settings')+'"]').show()
							}
							// $('td.candidate-consolidate.'+data.judge_no+'.candidate-' + data.candidate).html(data.rank == 0 ? "" : data.rank) 

						}, 
						error: function(xhr, textStatus, error){
							console.info(xhr.responseText);
						}
					});
				})
			}

			

			
			// $('.toggle-button').on('change', function() {
			// 	var status = this.checked ? 1 : 0;
			// 	var settings = $(this).data('table') 
			// 	$.ajax({
			// 		type : 'POST',
			// 		url : BASE_URL + "settings/update", 
			// 		data : {
			// 		status : status,
			// 		settings : settings,  
			// 		},
			// 		dataType: "json",
			// 		success : function(data){   
			// 			console.info(data)
			// 		}
				
			// 	}); 
			// });

		});


	</script>
</body>

</html>
