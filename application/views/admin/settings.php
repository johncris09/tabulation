<!DOCTYPE html> 
<html lang="en" class="light-style " dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url(); ?>assets/" data-template="horizontal-menu-template">

<head>
	<?php $this->view('layout/meta') ?>
	<?php $this->view('layout/css') ?>
	<style>
		
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
								<div class="card">
									<h5 class="card-header">Settings</h5>
									<div class="table-responsive text-nowrap">
										<table class="table">
											<thead>
												<tr>
												<th></th>
												<th>Card Show/Hide</th>
												<th>Button Show/Hide</th> 
												</tr>
											</thead>
											<tbody class="table-border-bottom-0">  
												<?php 
													$event = [
														[
															"text" => "talent presentation",
															"value" => "talent_presentation"
														], 
														[
															"text" => "production number",
															"value" => "production_number"
														],  
														[
															"text" => "productionn attire",
															"value" => "production_attire"
														],   
														[
															"text" => "swim wear",
															"value" => "swim_wear"
														],   
														[
															"text" => "evening gown",
															"value" => "evening_gown"
														],   
														[
															"text" => "top five",
															"value" => "top_five"
														],     
														[
															"text" => "final round",
															"value" => "final_round"
														],     
													];
													foreach($event as $row){  
														$card_status = $this->settings_model->get_settings(['settings' => $row['value'] . '_card']);
														$card_check = ($card_status) ? "checked" : "";
														$button_status = $this->settings_model->get_settings(['settings' => $row['value'] . '_button']); 
														$button_check = ($button_status ) ? "checked" : "";
														echo '
															<tr>
																<td>'.ucwords($row['text']).'</td>
																<td>
																	<div class="form-check form-switch mb-2">
																		<input class="form-check-input toggle-button" '.$card_check.' data-table="'.$row['value'].'_card"  type="checkbox" id="">
																		<label class="form-check-label" for="">Show/Hide</label>
																	</div>
																</td> 
																<td>
																	<div class="form-check form-switch mb-2">
																		<input class="form-check-input toggle-button" '.$button_check.'   data-table="'.$row['value'].'_button"  type="checkbox" id="">
																		<label class="form-check-label" for="">Show/Hide</label>
																	</div>
																</td>  
															</tr>
														';

													}
												?>
											</tbody>
										</table>
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
	$('.toggle-button').on('change', function() {
		var status = this.checked ? 1 : 0;
		var settings = $(this).data('table') 
		$.ajax({
            type : 'POST',
            url : BASE_URL + "settings/update", 
            data : {
              status : status,
              settings : settings,  
            },
            dataType: "json",
            success : function(data){   
				console.info(data)
            }
		
		}); 
	});

});
	</script>
</body>

</html>
