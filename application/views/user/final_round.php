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
                    <th>Final Round</th>
                    <td>Each candidate will be rated 1 to 10, 1 being the lowest and 10 being the highest based on <strong>Wit and Intelligence, General Beauty, Stage Presence.</strong></td>
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
      load_score(); 
      load_rank();
      

    function load_rank(){
 
      $.ajax({
        url: BASE_URL + 'final_round/get_ranking_specific_judge',
        type: 'POST',   
        dataType: 'JSON',
        success: function(data){   
          $.each(data, function (key, val) {   
            $.ajax({
              type : 'POST',
              url : BASE_URL + "final_round/update_rank",
              data : { 
                candidate : val.candidate,
                judge : '<?php echo $_SESSION['id'] ?>', 
                rank :  val.rank,
              },
              dataType: "json",
              success : function(data){
              }, 
              error: function(xhr, textStatus, error){
                console.info(xhr.responseText);
              }
            });
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
              url : BASE_URL + "final_round/get_candidate_score",
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

				// remove border red
				if($(this).attr('style') != undefined){
					$(this).removeAttr('style') 
				}
 
 
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
            url : BASE_URL + "final_round/delete_previous_score", 
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
            url : BASE_URL + "final_round/delete_previous_score", 
            data : { 
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>', 
            },
            dataType: "json",
            success : function(data){    
              load_rank();
            }
          }); 
        }else if(_this.value  == ""   ){  
          _this.value = "";  
          $('.rank.candidate-' + candidate).html('')  
					// delete previous score by candidate and judge
					$.ajax({
            type : 'POST',
            url : BASE_URL + "final_round/delete_previous_score", 
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
            url : BASE_URL + "final_round/insert", 
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
						
						// animate
						$('input[data-candidate='+val+']').addClass('animate__animated animate__headShake')
            setTimeout(function(){
						  $('input[data-candidate='+val+']').removeClass('animate__animated animate__headShake')
            }, 700);
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
									url : BASE_URL + "final_round/update_rank",
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
