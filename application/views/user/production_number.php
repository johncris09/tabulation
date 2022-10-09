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
                	
								</div>
              </div>
              <div class="card-body">
                <table class="table "> 
                  <tr class="text-center">
                    <th colspan="2" class="text-danger">Criteria</th>
                  </tr> 
                  <tr>
                    <th>Production Number</th>
                    <td>Each candidate will be rated 1 to 10, 1 being the lowest and 10 being the highest based on <strong>Mastery, Gracefulness and Stage projection.</strong></td>
                  </tr> 
                  <tr>
                    <th>Production Attire</th>
                    <td>Each candidate will be rated 1 to 10, 1 being the lowest and 10 being the highest based on <strong>Attire to candidate's match, Poise and carriage and General beauty.</strong></td>
                  </tr>  
                  <tr>
                    <th>Top Five</th>
                    <td>Each candidate will be rated 1 to 10, 1 being the lowest and 10 being the highest based on <strong>Beauty and Face Charm, Poise, Grace and Carriage, Stage Projection, Wit and Intelligence.</strong></td>
                  </tr>  
                </table> 

                <hr style="border-top:1px dotted #000;">
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr class="text-center"> 
                        <th rowspan="2">  </th>  
                        <th colspan="2">Production Number </th>
                        <th colspan="2">Production Attire</th>
                        <th class="seperate pb-5" rowspan="2" colspan="2">Top Five</th> 
                      </tr>
                      <tr class="text-center">  
                        <th colspan="2"><button class="btn btn-primary" <?php echo $production_number_status == "locked" ? "disabled" : "" ?> id="submit-production-number-score"> <i class=" bx bx-check"> </i> Submit Production Number Scores</button></th>
                        <th colspan="2"><button class="btn btn-primary" <?php echo $production_attire_status == "locked" ? "disabled" : "" ?> id="submit-production-attire-score"> <i class=" bx bx-check"> </i> Submit Production Attire Scores</button></th> 
                      </tr>
                      <tr class="text-center"> 
                        <th rowspan="2">Candidate</th> 
                        <th>Score</th>
                        <th>Rank</th> 
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
                            echo '
                              <tr class="text-center"> 
                                <td class=""> <div class="star">#' .$row['number']. '</div> </td> 
                              ';

                              $production_number_data = array(
                                'candidate' => $row['id'],
                                'judge' => $_SESSION['id']
                              );
                              $production_number_status = $this->production_number_model->get_scoring_status($production_number_data);
                              $production_number_status = ($production_number_status == "locked")  ? "readonly" :"" ; 
                            echo '
                                <td><input '.$production_number_status.' data-table="production-number" id="score-production-number" type="number"  data-candidate="'.$row['id'].'"  step="0.01" min="1" max="10"  class="form-control text-center candidate"  ></td>
                                <td> <span data-table="production-number" data-candidate="'.$row['id'].'" class="rank-production-number h6 text-center candidate-'.$row['id'].'"></span> </td> 
                                ';

                                $production_attire_data = array(
                                  'candidate' => $row['id'],
                                  'judge' => $_SESSION['id']
                                );
                                $production_attire_status = $this->production_attire_model->get_scoring_status($production_attire_data);
                                $production_attire_status = ($production_attire_status == "locked")  ? "readonly" :"" ; 
                              echo '
                                
                                <td><input  '.$production_attire_status.'  data-table="production-attire"   id="score-production-attire" type="number"  data-candidate="'.$row['id'].'"  step="0.01" min="1" max="10"  class="form-control text-center candidate"  ></td>
                                <td> <span data-table="production-attire" data-candidate="'.$row['id'].'" class="rank-production-attire h6 text-center candidate-'.$row['id'].'"></span> </td> 
                              ';
                              $top_five_data = array(
                                'candidate' => $row['id'],
                                'judge' => $_SESSION['id']
                              );
                              $top_five_status = $this->top_five_model->get_scoring_status($top_five_data);
                              $top_five_status = ($top_five_status == "locked")  ? "readonly" :"" ; 
                              echo ' 
                                <td class="seperate" ><input '.$top_five_status.' id="score-top-five" type="number" data-candidate="'.$row['id'].'"  step="0.01" min="1" max="10"  class="form-control text-center candidate"  ></td>
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

      load_production_number_score(); 
      load_production_number_rank();


      load_production_attire_score(); 
      load_production_attire_rank();

      load_top_five_score(); 
      load_top_five_rank();
      


      

      //________________________________//
      //________________________________//
      //        Production Number
      //________________________________//
      //________________________________//
      function load_production_number_rank(){
  
        $.ajax({
          url: BASE_URL + 'production_number/get_ranking_specific_judge',
          type: 'POST',   
          dataType: 'JSON',
          success: function(data){   
            $.each(data, function (key, val) {   
              $.ajax({
                type : 'POST',
                url : BASE_URL + "production_number/update_rank",
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
              $('span.rank-production-number.candidate-' + val.candidate).html(val.rank) 
            });
            
          }, 
          error: function(xhr, textStatus, error){
            console.info(xhr.responseText);
          }
        }); 

      } 

      // load score
      function load_production_number_score()
      {
        $('input#score-production-number.candidate').each(function(){   
          var _this = $(this)
            $.ajax({
              type : 'POST',
              url : BASE_URL + "production_number/get_candidate_score",
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

      $('input#score-production-number').on('keyup', function(){  
        var _this = this
        var candidate = $(this).data('candidate') 
 
 
        if(_this.value > 10  ){ 
          Swal.fire({
            icon: 'error',
            title: 'Please only provide ratings between 1 and 10.', 
          }).then(function(){
            // empty all fields
            _this.value = "";  
            $('.rank-production-number.candidate-' + candidate).html('')
          }) 
					 

					// delete previous score by candidate and judge
					$.ajax({
            type : 'POST',
            url : BASE_URL + "production_number/delete_previous_score", 
            data : { 
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>', 
            },
            dataType: "json",
            success : function(data){    
              load_production_number_rank();
            }
          });  

        }else if(_this.value  == 0  ){    
					_this.value = "";  
            $('.rank-production-number.candidate-' + candidate).html('') 
					// delete previous score by candidate and judge
					$.ajax({
            type : 'POST',
            url : BASE_URL + "production_number/delete_previous_score", 
            data : { 
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>', 
            },
            dataType: "json",
            success : function(data){    
              load_production_number_rank();
            }
          }); 
        }else if(_this.value  == ""   ){  
          _this.value = "";  
          $('.rank-production-number.candidate-' + candidate).html('')  
					// delete previous score by candidate and judge
					$.ajax({
            type : 'POST',
            url : BASE_URL + "production_number/delete_previous_score", 
            data : { 
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>', 
            },
            dataType: "json",
            success : function(data){    
              load_production_number_rank();
            }
          }); 
        }else{  
          var _this = $(this)  
          $.ajax({
            type : 'POST',
            url : BASE_URL + "production_number/insert", 
            data : {
              score : $(this).val(),
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>',

            },
            dataType: "json",
            success : function(data){   
              load_production_number_rank();
            }
          }); 
        } 
      });


      

      //________________________________//
      //________________________________//
      //        Production Attire
      //________________________________//
      //________________________________//  
      function load_production_attire_rank(){
        
        $.ajax({
          url: BASE_URL + 'production_attire/get_ranking_specific_judge',
          type: 'POST',   
          dataType: 'JSON',
          success: function(data){   
            $.each(data, function (key, val) {  
              $.ajax({
                type : 'POST',
                url : BASE_URL + "production_attire/update_rank",
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
              $('span.rank-production-attire.candidate-' + val.candidate).html(val.rank) 
            });
            
          }, 
          error: function(xhr, textStatus, error){
            console.info(xhr.responseText);
          }
        }); 

      }

      
      // load score
      function load_production_attire_score()
      {
        $('input#score-production-attire.candidate').each(function(){   
          var _this = $(this)
            $.ajax({
              type : 'POST',
              url : BASE_URL + "production_attire/get_candidate_score",
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


      $('input#score-production-attire').on('keyup', function(){  
        var _this = this
        var candidate = $(this).data('candidate') 
 
 
        if(_this.value > 10  ){ 
          Swal.fire({
            icon: 'error',
            title: 'Please only provide ratings between 1 and 10.', 
          }).then(function(){
            // empty all fields
            _this.value = "";  
            $('.rank-production-attire.candidate-' + candidate).html('')
          }) 
					 

					// delete previous score by candidate and judge
					$.ajax({
            type : 'POST',
            url : BASE_URL + "production_attire/delete_previous_score", 
            data : { 
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>', 
            },
            dataType: "json",
            success : function(data){    
              load_production_attire_rank();
            }
          });  

        }else if(_this.value  == 0  ){    
					_this.value = "";  
            $('.rank-production-attire.candidate-' + candidate).html('') 
					// delete previous score by candidate and judge
					$.ajax({
            type : 'POST',
            url : BASE_URL + "production_attire/delete_previous_score", 
            data : { 
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>', 
            },
            dataType: "json",
            success : function(data){    
              load_production_attire_rank();
            }
          }); 
        }else if(_this.value  == ""   ){  
          _this.value = "";  
          $('.rank-production-attire.candidate-' + candidate).html('')  
					// delete previous score by candidate and judge
					$.ajax({
            type : 'POST',
            url : BASE_URL + "production_attire/delete_previous_score", 
            data : { 
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>', 
            },
            dataType: "json",
            success : function(data){    
              load_production_attire_rank();
            }
          }); 
        }else{  
          var _this = $(this)  
          $.ajax({
            type : 'POST',
            url : BASE_URL + "production_attire/insert", 
            data : {
              score : $(this).val(),
              candidate : $(this).data('candidate'),
              judge : '<?php echo $_SESSION['id'] ?>',

            },
            dataType: "json",
            success : function(data){   
              load_production_attire_rank();
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
            // console.info(data)
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
      //        Submit Production Number Score
      //________________________________//
      //________________________________//
      $('#submit-production-number-score').on('click', function(){  
        var _this = $(this)   

				var emp = [];
				var count = 1;
				$('.rank-production-number').each(function(){ 
					if($(this).html() == ""){  
						emp.push(count)
					}
					count++ 
				})  
  
 
        // no empty fields
				if(emp.length > 0){ 
          
					Swal.fire({
						icon: 'error',
						title: 'All input fields in production number must not be empty', 
					})

					$.each(emp , function(index, val) { 
						$('input[data-table=production-number][data-candidate='+val+']').css({"border": "1px solid red"})
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
							$('.rank-production-number').each(function(){    
								var _this = $(this)  
								$.ajax({
									type : 'POST',
									url : BASE_URL + "production_number/update_rank",
									data : { 
										candidate : $(this).data('candidate'),
										judge : '<?php echo $_SESSION['id'] ?>', 
										rank :  $(this).html(),
										status : "locked",
									},
									dataType: "json",
									success : function(data){  
                    console.info(data)
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
							$('#submit-production-number-score').prop('disabled', true)
							$('input#score-production-number').prop('readonly', true)

						}
					});  

				} 
      }); 


      
      
      //________________________________//
      //________________________________//
      //        Submit Production Attire Score
      //________________________________//
      //________________________________//
      $('#submit-production-attire-score').on('click', function(){  
        var _this = $(this)   

				var emp = [];
				var count = 1;
				$('.rank-production-attire').each(function(){ 
					if($(this).html() == ""){  
						emp.push(count)
					}
					count++ 
				})  
  
 
        // no empty fields
				if(emp.length > 0){ 
          
					Swal.fire({
						icon: 'error',
						title: 'All input fields in production attire must not be empty', 
					})

					$.each(emp , function(index, val) { 
						$('input[data-table=production-attire][data-candidate='+val+']').css({"border": "1px solid red"})
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
							$('.rank-production-attire').each(function(){    
								var _this = $(this)  
								$.ajax({
									type : 'POST',
									url : BASE_URL + "production_attire/update_rank",
									data : { 
										candidate : $(this).data('candidate'),
										judge : '<?php echo $_SESSION['id'] ?>', 
										rank :  $(this).html(),
										status : "locked",
									},
									dataType: "json",
									success : function(data){  
                    console.info(data)
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
							$('#submit-production-attire-score').prop('disabled', true)
							$('input#score-production-attire').prop('readonly', true)

						}
					});  

				} 
      }); 




      

			
    
    });



  </script>
</body>

</html>
