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
									<button class="btn btn-outline-primary" id="print-summary"> <i class="bx bx-printer "></i> Print Summary</button>
									<button class="btn btn-primary" id="print-result"> <i class="bx bx-printer "></i> Print Result</button>
								</div>
              </div>
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr class="text-center"> 
                      <th>Candidate</th> 
                      <?php
                        foreach($judge as $row){
                          echo '
                            <th>
															'.$row['short_name'].'
                              <i style="font-size: 15px;" class="bx bx-lock text-danger font-weight-bolder unlock" title="Unlock"  data-judge-id="'.$row['id'].'"></i>
                              <i style="font-size: 15px;" class="bx bx-printer text-primary font-weight-bolder print-score-summary" title="Print"  data-judge="'.$row['id'].'"></i>
														</th>
                          ';
                        } 
                      ?>
                      <th>Total Score</th> 
                      <th>Rank</th> 
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <?php 
                    
                    $tot_score = 0;
                      if($candidate->num_rows() > 0){
                        foreach($candidate->result_array() as $row){
                          echo '
                            <tr class="candidate-row">
                              <td> <div class="star">' .$row['number']. '</div>   <div style="margin-top: 10px !important;">' .$row['name'].'</div></td>   
                              <td class="text-center candidate-consolidate judge1 candidate-'.$row['id'].'" data-candidate="'.$row['id'].'" data-judge="judge1"></td>   
                              <td class="text-center candidate-consolidate judge2 candidate-'.$row['id'].'" data-candidate="'.$row['id'].'" data-judge="judge2"></td>  
                              <td class="text-center candidate-consolidate judge3 candidate-'.$row['id'].'" data-candidate="'.$row['id'].'" data-judge="judge3"></td>  
                              <td class="text-center candidate-consolidate judge4 candidate-'.$row['id'].'" data-candidate="'.$row['id'].'" data-judge="judge4"></td>  
                              <td class="text-center candidate-consolidate judge5 candidate-'.$row['id'].'" data-candidate="'.$row['id'].'" data-judge="judge5"></td>  
                            ';  
                          echo '    
                              <td data-candidate="'.$row['id'].'"  data-score="'.$tot_score.'" class="text-center candidate-'.$row['id'].' tot-score" style="border-left: 1px dotted #677788;border-right: 1px dotted #677788;"></td>  
                              <td class="text-center"> <span data-candidate="'.$row['id'].'" class="rank h6 text-center candidate-'.$row['id'].'"></span></td>  
                            </tr>
                          ';
                          
                          $tot_score = 0; 
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
    
    $(document).ready(function(){  
      
      setInterval(function(){  
        consolidate_rank()  
        get_tot_score();
        load_rank();
      }, 1000); 
      
 
      function consolidate_rank(){
        $('.candidate-consolidate').each(function(){   
          var _this = $(this) 
          $.ajax({
            type : 'POST',
            url : BASE_URL + "production_number/get_candidate_consolidated_score",
            data : { 
              candidate : $(this).data('candidate'),
              judge_no : $(this).data('judge'), 
            },
            dataType: "json",
            success : function(data){  
              $('td.candidate-consolidate.'+data.judge_no+'.candidate-' + data.candidate).html(data.rank == 0 ? "" : data.rank) 
              

            }, 
            error: function(xhr, textStatus, error){
              console.info(xhr.responseText);
            }
          });
        })
      }

      function get_tot_score(){
        $('.tot-score').each(function(){   
          var _this = $(this) 
          $.ajax({
            type : 'POST',
            url : BASE_URL + "production_number/get_tot_score",
            data : { 
              candidate : $(this).data('candidate'), 
            },
            dataType: "json",
            success : function(data){   
              $('td.candidate-' + data.candidate +'.tot-score').html(data.tot_score == 0 ? "" : data.tot_score) 
              $.ajax({
                type : 'POST',
                url : BASE_URL + "production_number/insert", 
                data : {
                  score : data.tot_score,
                  candidate : $(_this).data('candidate'),
                  judge : 0, 
                },
                dataType: "json",
                success : function(data){ 
                }
              });

            }, 
            error: function(xhr, textStatus, error){
              console.info(xhr.responseText);
            }
          });
        })
      } 
      


      function load_rank(){ 
        $.ajax({
          url: BASE_URL + 'production_number/get_consolidated_ranking',
          type: 'POST',   
          dataType: 'JSON',
          success: function(data){   
            $.each(data, function (key, val) {    
              $('span.rank.candidate-' + val.candidate).html(val.rank)  
              // update rank
              $.ajax({
                type : 'POST',
                url : BASE_URL + "production_number/update_rank",
                data : { 
                  candidate : val.candidate,
                  judge : 0, 
                  rank : val.rank,
                },
                dataType: "json",
                success : function(data){   
                }, 
                error: function(xhr, textStatus, error){
                  console.info(xhr.responseText);
                }
              }); 


            });
            
          },
          // Error Handler
          error: function(xhr, textStatus, error){
            console.info(xhr.responseText);
          }
        });  
      }   
 
      
      $('.print-score-summary').on('click', function(){

        var _this = $(this)
        var judge = _this.data('judge') 
        $.ajax({
          type : 'POST',
          url : BASE_URL + "production_number/is_judge_done_scoring",
          data: {
            judge: judge
          },
          dataType: "json",
          success : function(data){  
            if(data == 12){
              window.open(BASE_URL + "production_number/result_judge_score/" + judge, "_blank")
            }else{ 
              Swal.fire({
                title: "Unavailable this time",
                icon: 'error',
                text: 'Please wait until all judges have completed their scoring.', 
              })
            }
          }, 
          error: function(xhr, textStatus, error){
            console.info(xhr.responseText);
          } 
        })

      })



      $('#print-summary').on('click', function(){ 
        $.ajax({
          type : 'POST',
          url : BASE_URL + "production_number/is_all_done_scoring", 
          dataType: "json",
          success : function(data){ 
            if(data == 5){
              window.open( BASE_URL + "production_number/print_summary" , "Print Summary", "toolbar=yes,scrollbars=yes,resizable=yes,top=150,left=450,width=870,height=630");
            }else{ 
              Swal.fire({
                title: "Unavailable this time",
                icon: 'error',
                text: 'Please wait until all judges have completed their scoring.', 
              }) 
            }
          }, 
          error: function(xhr, textStatus, error){
            console.info(xhr.responseText);
          } 
        })

      })

				
      $('#print-result').on('click', function(){
        $.ajax({
          type : 'POST',
          url : BASE_URL + "production_number/is_all_done_scoring", 
          dataType: "json",
          success : function(data){
            if(data == 5){
              window.open( BASE_URL + "production_number/result" , "Print Result",  "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=600,width=600,height=870");
            }else{ 
              Swal.fire({
                title: "Unavailable this time",
                icon: 'error',
                text: 'Please wait until all judges have completed their scoring.', 
              }) 
            }
          }, 
          error: function(xhr, textStatus, error){
            console.info(xhr.responseText);
          } 
        })

      })

								
        $('.unlock').on('click', function(){
          var _this = $(this) 
          // check password 
          Swal.fire({
            title: "Enter Password To Unlock",
            input: 'password',  
            icon: "info",
            customClass:{
              validationMessage: "my-validation-message",
            }, 
            preConfirm: (value) => { 
              if(!value){
                Swal.showValidationMessage('This field is required'); 
              } 
            },
            showCancelButton: true,
            confirmButtonText: "Unlock"
          }).then(function(result) {  
            if (result.value) {  
              $.ajax({
                url: BASE_URL + 'user/check_password',
                type: 'POST',   
                data: {'password' : result.value},
                dataType: 'JSON',
                success: function(data){    
                  if(data){ 
                  $.ajax({
                    url: BASE_URL + 'production_number/unlock',
                    type: 'POST',   
                    data: _this.data(),
                    dataType: 'JSON',
                    success: function(data){    
                      Swal.fire({
                        icon: 'success',
                        title: data.message, 
                      })  
                    },
                    // Error Handler
                    error: function(xhr, textStatus, error){
                      console.info(xhr.responseText);
                    }
                  });  
                  } else {
                    Swal.fire({
                      icon: 'error',
                      title: "Invalid Password", 
                    })  
                  }
                },
                // Error Handler
                error: function(xhr, textStatus, error){
                  console.info(xhr.responseText);
                }
              });  
            }
          }); 

          
          
        })

    });



  </script>
</body>

</html>
