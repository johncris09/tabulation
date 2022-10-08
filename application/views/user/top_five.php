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
            
        

            <!-- Basic Bootstrap Table -->
            <div class="card"> 
              <div class="card-header d-flex justify-content-between pb-3">
                <div class="conversion-title">
                  <h5 class="card-title mb-1"> <?php echo $page_title; ?> </h5>  
                </div>
								<div>
									<button class="btn btn-primary" <?php echo $status == "locked" ? "disabled" : "" ?> id="submit-score"> <i class=" bx bx-check"> </i> Submit Score</button>
								</div>
              </div>
              <div class="card-body">
                <table class="table "> 
                  <tr class="text-center">
                    <th colspan="2" class="text-danger">Criteria</th>
                  </tr> 
                  <tr>
                    <th>Top Five &nbsp;&nbsp;&nbsp;</th>
                    <td>Each candidate will be rated 1 to 10, 1 being the lowest and 10 being the highest based on <strong>Beauty and Face Charm, Poise, Grace and Carriage, Stage Projection,  Wit and Intelligence.</strong></td>
                  </tr>  
                </table>

                <hr style="border-top:1px dotted #000;">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-center">
                        <th>Candidate</th> 
                        <th>Score</th>
                        <th>Rank</th> 
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php 
                        if($candidate->num_rows() > 0){
                          foreach($candidate->result_array() as $row){
                            $readonly = ($status == "locked") ? "readonly" :"" ;
                            echo '
                              <tr class="text-center"> 
                                <td class=""> <div class="star">#' .$row['number']. '</div></td>
                                <td><input '.$readonly.'  type="number" data-candidate="'.$row['id'].'"  step="0.01" min="1" max="10"  class="form-control text-center candidate"  ></td>
                                <td> <span data-candidate="'.$row['id'].'" class="rank h6 text-center candidate-'.$row['id'].'"></span> </td> 
                              </tr>
                            ';
                          } 
                        }
                      ?> 
                    </tbody>
                  </table>
                </div>

                

              </div>
            </div> 
						
						<div class="modal-onboarding modal fade animate__animated" id="criteria-modal" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-xl" role="document">
								<div class="modal-content text-center">
									<div class="modal-header"> 
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
										</button>
									</div>
									<div class="modal-body onboarding-horizontal p-0">
										<div class="onboarding-media">
											<img src="<?php echo base_url() ?>assets/img/rate1.png" alt="boy-verify-email-light" width="273" class="img-fluid" data-app-light-img="illustrations/boy-verify-email-light.png" data-app-dark-img="illustrations/boy-verify-email-dark.png">
										</div>
										<div class="onboarding-content mb-0">
											<h4 class="onboarding-title text-body">Criteria</h4>
											<div class="onboarding-info"><span class="h6">ELIMINATION ROUND</span> (Selection of 5 finalist) <br>
											Each candidate will be rated 1 to 10, 1 being the lowest and 10 being the highest based on the following
											</div>
                      <hr>
											 <table class="table table-bordered"> 
                        <thead>
                          <tr>
                            <th>Criteria</th>
                            <th>Rating</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr> 
                            <th>Beauty and Face Charm</th>
                            <td>3</td>
                          </tr>
                          <tr>
                            <th>Poise, Grace and Carriage</th>
                            <td>2</td>
                          </tr>
                          <tr>
                            <th>Stage Projection</th>
                            <td>2</td>
                          </tr>
                          <tr>
                            <th>Wit and Intelligence</th>
                            <td>3</td>
                          </tr> 
                          <tr>
                            <td> </td>
                            <td>10</td>
                          </tr> 
                        </tbody>
                       </table>
										</div>
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
    // window.onload = function () {
    //   load_rank();
    // }
    $(document).ready(function(){  
      load_score(); 
      load_rank();
      

    function load_rank(){
 
      $.ajax({
        url: BASE_URL + 'top_five/get_ranking_specific_judge',
        type: 'POST',   
        dataType: 'JSON',
        success: function(data){  
          // console.info(data)
          $.each(data, function (key, val) {  
            $('span.candidate-' + val.candidate).html(val.rank) 
          });
          
        }, 
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText);
        }
      }); 

    }

      // load score
    function load_score()
      {
        $('input.candidate').each(function(){   
          var _this = $(this)
            $.ajax({
              type : 'POST',
              url : BASE_URL + "top_five/get_candidate_score",
              data : { 
                candidate : $(this).data('candidate'),
                judge : '<?php echo $_SESSION['id'] ?>', 
              },
              dataType: "json",
              success : function(data){   
                $(_this).val(data)
              }
            }); 
        })
      }
			

			
      // save score while typing
      // 1 to 10 input only

      $('input').on('keyup', function(){  
        var _this = this
        var candidate = $(this).data('candidate') 
 
 
        if(_this.value > 10  ){ 
          Swal.fire({
            icon: 'error',
            title: 'Please only provide ratings between 1 and 10.', 
          }).then(function(){
            // empty all fields
            _this.value = "";  
            $('.rank.candidate-' + candidate).html('')
          })

					// delete previous score by candidate and judge
					$.ajax({
            type : 'POST',
            url : BASE_URL + "top_five/delete_previous_score", 
            data : { 
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>', 
            },
            dataType: "json",
            success : function(data){    
              load_rank();
            }
          });  
        }else if(_this.value  == 0  ){    
					_this.value = "";  
            $('.rank.candidate-' + candidate).html('') 
					// delete previous score by candidate and judge
					$.ajax({
            type : 'POST',
            url : BASE_URL + "top_five/delete_previous_score", 
            data : { 
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>', 
            },
            dataType: "json",
            success : function(data){    
              load_rank();
            }
          }); 
        }else if(_this.value  == ""){ 
          $('.rank.candidate-' + candidate).html('') 
					// delete previous score by candidate and judge
					$.ajax({
            type : 'POST',
            url : BASE_URL + "top_five/delete_previous_score", 
            data : { 
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>', 
            },
            dataType: "json",
            success : function(data){    
              load_rank();
            }
          }); 
        }else{  
          var _this = $(this)  
          $.ajax({
            type : 'POST',
            url : BASE_URL + "top_five/insert", 
            data : {
              score : $(this).val(),
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>',

            },
            dataType: "json",
            success : function(data){   
              load_rank();
            }
          }); 
        } 
      });
      

      // submit score 
      $('#submit-score').on('click', function(){  
        var _this = $(this)
				
				var emp = []; 
				$('.rank').each(function(){ 
					if($(this).html() == ""){  
						emp.push($(this).data('candidate'))
					} 
				})
 
        // no empty fields
				if(emp.length > 0){ 
					Swal.fire({
						icon: 'error',
						title: 'All input fields must not be empty', 
					})

					$.each(emp , function(index, val) { 
						$('input[data-candidate='+val+']').css({"border": "1px solid red"})
					});
  
				}else{
					
					Swal.fire({
						title: "Is this your final Score?",
						html: "This tabulator will be locked once you have submitted your score. Please review your score. <br> <span class='text-danger'><small>Note: If you want to adjust your score, you can consult with administrator.</small></span>  ",
						icon: "warning",
						showCancelButton: true,
						confirmButtonText: "Yes, submit it!"
					}).then(function(result) { 
						if (result.value) { 
							$('.rank').each(function(){   
								var _this = $(this) 
								$.ajax({
									type : 'POST',
									url : BASE_URL + "top_five/update_rank",
									data : { 
										candidate : $(this).data('candidate'),
										judge : '<?php echo $_SESSION['id'] ?>', 
										rank : $(this).html(),
										status : "locked",
									},
									dataType: "json",
									success : function(data){  
									}, 
									error: function(xhr, textStatus, error){
										console.info(xhr.responseText);
									}
								}); 
							})  


							Swal.fire({
								icon: 'success',
								title: 'Score Submitted', 
							}) 

							// locked tabulator
							$('#submit-score').prop('disabled', true)
							$('table  input').prop('readonly', true)

						}
					});   
				}
 
      });  
 
      });



  </script>
</body>

</html>
