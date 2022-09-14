$(document).ready(function(){

    // Log in User
    $(document).on('submit','#formAuthentication',function(e){  
      e.preventDefault();  
      $.ajax({
        url: BASE_URL + 'login/login',
        type: 'POST',  
        data: $('#formAuthentication').serialize(),
        dataType: 'JSON',
        success: function(data){ 
          if(data.response){
              location.reload();
          }else{ 
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Invalid Username/Password', 
            })
          }
        },
        // Error Handler
        error: function(xhr, textStatus, error){
          console.info(xhr.responseText);
        }
      }); 
  
    }); 
  
});