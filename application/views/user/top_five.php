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
                <button class="btn btn-primary" <?php echo $status == "locked" ? "disabled" : "" ?> id="submit-score"> <i class=" bx bx-check"> </i> Submit Score</button>
              </div>
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr> 
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
                            <tr> 
                              <td> <div class="star">' .$row['number']. '</div>   <div style="margin-top: 10px !important;">' .$row['name'].'</div></td> 
                              <td><input '.$readonly.'  type="number" data-candidate="'.$row['id'].'"  step="0.01" min="1" max="10" onKeyUp="if(this.value>10){this.value=\'10\';}else if(this.value<0){this.value=\'0\';}" class="form-control text-center candidate"  ></td>
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
      $('input').on('keyup', function(){  
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
            if(data.response == true){ 
              
              $(_this).css("border", "2px solid blue");
              $(_this).css('font-weight', 'bolder');
              setTimeout(function() {  
                $(_this).css("border", "1px solid black");
                $(_this).css('font-weight', 'normal');
              }, 500); 
              
            }

            load_rank();
          }
        });
      });
      

      

      // submit score 
      $('#submit-score').on('click', function(){  
        var _this = $(this)  
				
				Swal.fire({
					title: "Is this your final Score?",
					text: "This tabulator will be locked after submitting your score. Please review your score.",
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

				
         
      });



 
      });



  </script>
</body>

</html>
