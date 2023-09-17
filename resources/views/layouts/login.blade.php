<div  class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div style="background: #ffff;width: 95%;border-radius: 20px; padding: 20px 20px;border: 1px solid #008C16;margin: auto;" class="modal-content login-modal">

          <div class="modal-body modal-loginform">
        <div style="position: absolute; top:0px; padding:0; right:10px;"  class="d-inline clossse" class="close" data-dismiss="modal" aria-label="Close"><i  class="ri-close-circle-line"></i></div>
            
           <br>
           <div class="clearfix"></div>
           <div class="" style="text-align:center;">
            <h4 class="" style="font-size:20px; color:#000; font-weight:600; ">Sign in</h4>
          </div>
            
            <div class="form-row">
              <div class="col form-group">
            <label for="phone">Phone Number </label> <br>
            <input name="log-phone" id="log-phone" class="form-control" placeholder="Mobile Number" type="number">
            <div class="invalid-feedback" id="error-log-phone-div">Phone Number Required.</div>
          </div>
				</div>

            <div class="form-row">
              <div class="col form-group">
            <label for="password">Password </label> <br>
            <input name="log-password" id="log-password" class="form-control" placeholder="Password" type="password">
            <div class="invalid-feedback" id="error-log-password-div">Password Required.</div>
          </div>
				</div>

            <p>By Continuing, you agree to Thalir <a class="grn" href="#">Terms of use</a> And <a class="grn" href="#"> Privacy Policy  </a></p>

            <button type="submit" id="btnsubmit" >Login</button> 
    
       
              <!-- <label for="name">Name</label> <br>
              <input type="text" id="name" name="name">      
              <label for="email">Email</label><br>     
              <input type="email" id="email" name="email">
              <label for="email">Phone Number</label> <br>
              <input type="email" id="email" name="email">
              <p>By Continuing, you agree to Ayuga's <a class="grn" href="#">Terms of use</a> And <a class="grn" href="#"> Privacy Policy  </a></p>
              <button type="button" data-target="#exampleModal11" href="exampleModal11" data-toggle="modal" data-dismiss="modal">Next</button> -->
        
          </div>
          <div class="card-footer text-center" style="padding: 20px 10px;">
          Don't have an account? <a href="{{url('/register')}}">Sign Up</a>
          </div> 
        </div>                                    
      </div>              
</div>

<script type="text/javascript">

$(document).ready(function(){
  $("#log-phone").keyup(function(){
    $('#log-phone').removeClass('is-invalid');
    if($("#log-phone").val().length == 10)
    {
      $.ajax({
          url: "{{url('api/check')}}", 
          type: 'POST',
          data: {"phone": $("#log-phone").val(),},
          success:function(resp){
            response = $.parseJSON(resp);
            console.log(response.sts);
          if(response.sts!='01')
          {
            $('#log-phone').addClass('is-invalid');
            $('#error-log-phone-div').html('This phone number is not registered');
          }
     }
   })
   .done(function() {
     console.log("success");
   });
   
    }
  });
});

  $(document).on('click', '#btnsubmit', function(event) {
          event.preventDefault();
          var valid=false;
          if($("#log-phone").val().length == 10)
          {
            valid=true;
            $('#log-phone').removeClass('is-invalid');
          }
          else
          {
            $('#log-phone').addClass('is-invalid');
            $('#error-log-phone-div').html('Please enter a valid phone number!');
            valid=false;
          }
          
          if($("#log-password").val().length > 2 )
          {
            valid=true;
            $('#log-password').removeClass('is-invalid');
          }
          else
          {
            $('#error-log-password-div').html('Please enter a valid password!');
            $('#log-password').addClass('is-invalid');
            valid=false;
          }

         $('.required').each(function () {
         if(!$(this).val()){
          $('#btnsubmit').text('Login');
          valid=false;
         } });
         if(valid){
          $('#btnsubmit').text('Please wait...');
         $.ajax({ url: "{{url('ajax/login')}}", type: 'POST',
          data: {
          _token: '{{ csrf_token() }}',
          phone: $("#log-phone").val(),
          password: $("#log-password").val(),},
  
          success:function(resp){
          $('#btnsubmit').text('Login');
          if(resp.status=='01')
          {
            $("#log-phone").val('');
            $("#log-password").val('');
            $('#btnsubmit').prop('disabled', true);
            console.log(resp)
            location.reload();
          }else
          {
          mySnack('', resp.msg);
          }
     }
   })
   .done(function() {
    $('#btnsubmit').text('Login');
     console.log("success");
     
   });
   }
  });
   
  </script>