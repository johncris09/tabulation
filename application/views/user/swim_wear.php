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
            
        
 
            <div class="card"> 
              <div class="card-header d-flex justify-content-between pb-3">
                <div class="conversion-title">
                  <h5 class="card-title mb-1"> <?php echo $page_title; ?> </h5> 
                </div> 
              </div>
              <div class="card-body"> 
                <table class="table "> 
                  <tr class="text-center">
                    <th colspan="2" class="text-danger">Criteria</th>
                  </tr> 
                  <tr>
                    <th>Best in Swim Wear</th>
                    <td>Each candidate will be rated 1 to 10, 1 being the lowest and 10 being the highest based on <strong>Attire to candidate's match, Execution and projection and General beauty.</strong></td>
                  </tr>   
                  <tr>
                    <th>Top Five</th>
                    <td>Each candidate will be rated 1 to 10, 1 being the lowest and 10 being the highest based on <strong>Beauty and Face Charm, Poise, Grace and Carriage, Stage Projection, Wit and Intelligence.</strong></td>
                  </tr> 
                </table>
                
                <hr style="border-top:1px dotted #000;"> 
                <div class="table-responsive text-nowrap">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr class="text-center"> 
                        <th rowspan="2">  </th>  
                        <th colspan="2">Swim Wear</th>
                        <th class="seperate pb-5" rowspan="2" colspan="2">Top Five</th> 
                      </tr>
                      <tr class="text-center">  
                        <th colspan="2"><button class="btn btn-primary" <?php echo $status == "locked" ? "disabled" : "" ?> id="submit-score"> <i class=" bx bx-check"> </i> Submit Swim Wear Scores</button></th> 
                      </tr>
                      <tr class="text-center"> 
                        <th>Candidate</th>  
                        <th>Score</th>
                        <th>Rank</th> 
                        <th class="seperate" >Score</th>
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
                                <td><input '.$readonly.'  data-table="swim-wear"  id="score-swim-wear"  type="number" data-candidate="'.$row['id'].'"  step="0.01" min="1" max="10"  class="form-control text-center candidate"  ></td>
                                <td> <span data-table="swim-wear"  data-candidate="'.$row['id'].'" class="rank-swim-wear h6 text-center candidate-'.$row['id'].'"></span> </td> 
                              ';

                              $top_five_status = $this->top_five_model->get_scoring_status(['candidate' => $row['id']]);
                              $top_five_status = ($top_five_status == "locked")  ? "readonly" :"" ; 
                              echo ' 
                                <td class="seperate" ><input  '.$top_five_status.' id="score-top-five" type="number" data-candidate="'.$row['id'].'"  step="0.01" min="1" max="10"  class="form-control text-center candidate"  ></td>
                                <td> <span data-candidate="'.$row['id'].'" class="rank-top-five h6 text-center candidate-'.$row['id'].'"></span> </td> 
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
      load_swim_wear_score(); 
      load_swim_wear_rank();

      load_top_five_score(); 
      load_top_five_rank();
      

      
      //________________________________//
      //________________________________//
      //       Best in Swim Wear
      //________________________________//
      //________________________________//  
      function load_swim_wear_rank(){

        $.ajax({
          url: BASE_URL + 'swim_wear/get_ranking_specific_judge',
          type: 'POST',   
          dataType: 'JSON',
          success: function(data){   
            $.each(data, function (key, val) {  
              $.ajax({
                type : 'POST',
                url : BASE_URL + "swim_wear/update_rank",
                data : { 
                  candidate : val.candidate,
                  judge : '<?php echo $_SESSION['id'] ?>', 
                  rank :  val.rank,
                  status : "unlocked",
                },
                dataType: "json",
                success : function(data){
                }, 
                error: function(xhr, textStatus, error){
                  console.info(xhr.responseText);
                }
              });
              $('span.rank-swim-wear.candidate-' + val.candidate).html(val.rank) 
            });
            
          }, 
          error: function(xhr, textStatus, error){
            console.info(xhr.responseText);
          }
        }); 

      }

      // load score
      function load_swim_wear_score()
      {
        $('input#score-swim-wear.candidate').each(function(){   
          var _this = $(this)
            $.ajax({
              type : 'POST',
              url : BASE_URL + "swim_wear/get_candidate_score",
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

      $('input#score-swim-wear').on('keyup', function(){  
        var _this = this
        var candidate = $(this).data('candidate') 
 
 
        if(_this.value > 10  ){ 
          Swal.fire({
            icon: 'error',
            title: 'Please only provide ratings between 1 and 10.', 
          }).then(function(){
            // empty all fields
            _this.value = "";  
            $('.rank-swim-wear.candidate-' + candidate).html('')
          }) 
					 

					// delete previous score by candidate and judge
					$.ajax({
            type : 'POST',
            url : BASE_URL + "swim_wear/delete_previous_score", 
            data : { 
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>', 
            },
            dataType: "json",
            success : function(data){    
              load_swim_wear_rank();
            }
          });  

        }else if(_this.value  == 0  ){    
					_this.value = "";  
            $('.rank-swim-wear.candidate-' + candidate).html('') 
					// delete previous score by candidate and judge
					$.ajax({
            type : 'POST',
            url : BASE_URL + "swim_wear/delete_previous_score", 
            data : { 
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>', 
            },
            dataType: "json",
            success : function(data){    
              load_swim_wear_rank();
            }
          }); 
        }else if(_this.value  == ""   ){  
          _this.value = "";  
          $('.rank-swim-wear.candidate-' + candidate).html('')  
					// delete previous score by candidate and judge
					$.ajax({
            type : 'POST',
            url : BASE_URL + "swim_wear/delete_previous_score", 
            data : { 
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>', 
            },
            dataType: "json",
            success : function(data){    
              load_swim_wear_rank();
            }
          }); 
        }else{  
          var _this = $(this)  
          $.ajax({
            type : 'POST',
            url : BASE_URL + "swim_wear/insert", 
            data : {
              score : $(this).val(),
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>',

            },
            dataType: "json",
            success : function(data){   
              load_swim_wear_rank();
            }
          }); 
        } 
      });
      

      
      //________________________________//
      //________________________________//
      //        Top Five
      //________________________________//
      //________________________________//  
      function load_top_five_rank(){
        
        $.ajax({
          url: BASE_URL + 'top_five/get_ranking_specific_judge',
          type: 'POST',   
          dataType: 'JSON',
          success: function(data){   
            $.each(data, function (key, val) {   
              $.ajax({
                type : 'POST',
                url : BASE_URL + "top_five/update_rank",
                data : { 
                  candidate : val.candidate,
                  judge : '<?php echo $_SESSION['id'] ?>', 
                  rank :  val.rank,
                  status : "unlocked",
                },
                dataType: "json",
                success : function(data){
                }, 
                error: function(xhr, textStatus, error){
                  console.info(xhr.responseText);
                }
              });
              $('span.rank-top-five.candidate-' + val.candidate).html(val.rank) 
            }); 
          }, 
          error: function(xhr, textStatus, error){
            console.info(xhr.responseText);
          }
        }); 

      }

      
      // load score
      function load_top_five_score()
      {
        $('input#score-top-five.candidate').each(function(){   
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


      $('input#score-top-five').on('keyup', function(){  
        var _this = this
        var candidate = $(this).data('candidate') 
 
 
        if(_this.value > 10  ){ 
          Swal.fire({
            icon: 'error',
            title: 'Please only provide ratings between 1 and 10.', 
          }).then(function(){
            // empty all fields
            _this.value = "";  
            $('.rank-top-five.candidate-' + candidate).html('')
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
              load_top_five_rank();
            }
          });  

        }else if(_this.value  == 0  ){    
					_this.value = "";  
            $('.rank-top-five.candidate-' + candidate).html('') 
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
              load_top_five_rank();
            }
          }); 
        }else if(_this.value  == ""   ){  
          _this.value = "";  
          $('.rank-top-five.candidate-' + candidate).html('')  
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
              load_top_five_rank();
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
              load_top_five_rank();
            }
          }); 
        } 
      }); 

      
      //________________________________//
      //________________________________//
      //        Submit Score
      //________________________________//
      //________________________________//
      $('#submit-score').on('click', function(){  
        var _this = $(this)  
				
				var emp = []; 
				$('.rank-swim-wear').each(function(){ 
					if($(this).html() == ""){  
						emp.push($(this).data('candidate'))
					} 
				})  
 
        // no empty fields
				if(emp.length > 0){ 
					Swal.fire({
						icon: 'error',
						title: 'All input fields in swim wear must not be empty',
					})

					$.each(emp , function(index, val) {  
						$('input[data-table=swim-wear][data-candidate='+val+']').css({"border": "1px solid red"})
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
							$('.rank-swim-wear').each(function(){   
								var _this = $(this) 
								$.ajax({
									type : 'POST',
									url : BASE_URL + "swim_wear/update_rank",
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
							$('input#score-swim-wear').prop('readonly', true)

						}
					});  

				}

				
         
      }); 



 
      });



  </script>
</body>

</html>
