@extends('layouts.header')
@section('header')
@include('layouts.navbar')

@include('layouts.sidebar')    
@include('layouts.cart')
@include('layouts.login')

<aside class="col-md-6 col-lg-5 col-sm-12 mt-4" style="margin: auto;">
	<div class="" style="padding: 15px; border-radius: 5px; border: 1px solid #ebecf0;">
		<div class="card-body register-form">
			<div class="" style="text-align:center;">
				<h4 class="card-title">Sign up</h4>
			</div>
			
			<form action="{{url('/register')}}" method="POST" autocomplete="off" id="register-form">
				@csrf
				<div class="form-row">
					<div class="col form-group">
						<label for="name">Full Name <span class="text-danger fs-24">*</span></label>
						<input type="text" class="form-control" placeholder="Enter Name" id="name" name="name">
						<div class="invalid-feedback">Name Required.</div>
					</div>
				</div>

				<div class="form-row">
					<div class="col form-group">
						<label for="email">Email</label>
						<input class="form-control" type="email" id="email" name="email" placeholder="Enter Email Address">
						<div class="invalid-feedback" id="error-email-div">Email Required.</div>
					</div>
				</div>

				<div class="form-row">
					<div class="col form-group">
						<label for="phone">Phone <span class="text-danger fs-24">*</span></label>
						<input class="form-control" type="number" id="phone" name="phone" placeholder="Enter Phone Number">
						<div class="invalid-feedback" id="error-phone-div">Phone Number Required.</div>
					</div>
				</div>

				
				<div class="form-row">
					<div style="width: 100%;" class="form-group col-md-6 col-sm-6">
						<label for="password">Create Password <span class="text-danger fs-24">*</span></label>
						<input class="form-control" type="password" id="password" name="password" placeholder="Enter Password">
						<div class="invalid-feedback" id="error-password-div">Password Required.</div>
					</div>
          
					<div style="width: 100%;" class="form-group col-md-6 col-sm-6">
						<label for="cpassword">Repeat Password <span class="text-danger fs-24">*</span></label>
						<input class="form-control" type="password" id="cpassword" name="cpassword" placeholder="Confirm Password">
						<div class="invalid-feedback">Password Required.</div>
					</div>
				</div>

				<div class="form-group mt-3">
					<button type="button" id="btn" class="btn btn-success"> Register Now</button>
				</div>   
				<p class="text-muted">By clicking the 'Register Now' button, you confirm that you accept our Terms of use and Privacy Policy.</p>
			</form>
			<hr>
			<p class="text-center" >Have an account?<b style="cursor:pointer; color:blue;" data-toggle="modal" data-target="#loginModal"> Log In</b></p>
		</div>
	</div>
</aside>
<br><br>
@include('layouts.footer')
@include('layouts.others')


<script type="text/javascript">
	$('#name').blur(function() {
		if($('#name').val() == '') {
			$('#name').addClass('is-invalid');
		} else {
			$('#name').removeClass('is-invalid');
		}
	})

	$('#phone').blur(function() {
		if($('#phone').val() == '') {
			$('#phone').addClass('is-invalid');
			$('#error-phone-div').html('Phone Number Required.');
		} else if($('#phone').val().length != 10) {
			$('#phone').addClass('is-invalid');
			$('#error-phone-div').html('10 Digit Mobile Number Required.');
		} else {
			$.ajax({
        type: "GET",
        url: "{{url('/api/check/number')}}?number=" + $('#phone').val(),
        data: '',
        success: function(resp){
          var obj = JSON.parse(resp);
          if(obj.sts == '01') {
            $('#phone').addClass('is-invalid');
            $('#error-phone-div').html('Mobile Number Already Registred, Try Login!');
          } else {
            $('#phone').removeClass('is-invalid');
          }
        }
      });
		}
	})

	$('#pincode').blur(function() {
		if($('#pincode').val().length == 6) {
			$('#pincode').removeClass('is-invalid');
      $.ajax({
        type: "GET",
        url: "{{url('/api/getpincodedetails')}}",
        data : { pincode:$('#pincode').val() },
        success: function(resp){
          var obj = JSON.parse(resp);
          if(obj.sts == '01') {
            $('#district').val(obj.District);
            $('#state').val(obj.State);
            $('#district').trigger('change');
            $('#state').trigger('change');
            $('#district').removeClass('is-invalid');
            $('#state').removeClass('is-invalid');
          }
        }
      });
		} else {
			$('#pincode').addClass('is-invalid');
		}
	})

	$('#area').blur(function() {
		if($('#area').val() == '') {
			$('#area').addClass('is-invalid');
		} else {
			$('#area').removeClass('is-invalid');
		}
	})

	$('#district').change(function() {
		if($('#district').val() == '' || $('#district').val() == null) {
			$('#district').addClass('is-invalid');
		} else {
			$('#district').removeClass('is-invalid');
		}
	})

	$('#state').change(function() {
		if($('#state').val() == '' || $('#state').val() == null) {
			$('#state').addClass('is-invalid');
		} else {
			$('#state').removeClass('is-invalid');
		}
	})

	$('#address').blur(function() {
		if($('#address').val() == '') {
			$('#address').addClass('is-invalid');
		} else {
			$('#address').removeClass('is-invalid');
		}
	})


	$('#password').blur(function() {
		if($('#password').val() == '') {
			$('#password').addClass('is-invalid');
			$('#error-password-div').html('Password Required.');
			error = 1;
		} else if($('#password').val().length < 8) {
			$('#password').addClass('is-invalid');
			$('#error-password-div').html('Minimum 8 chars password Required.');
			error = 1;
		} else {
			$('#password').removeClass('is-invalid');
		}
	})


	$('#cpassword').blur(function() {
		if($('#cpassword').val() == '') {
			$('#cpassword').addClass('is-invalid');
		} else {
			$('#cpassword').removeClass('is-invalid');
		}
	})


	$('#btn').click( function() {
		var error = 0;
		$('#btn').prop('disabled', true);

		if($('#name').val() == '') {
			$('#name').addClass('is-invalid');
			error = 1;
		} else {
			$('#name').removeClass('is-invalid');
		}

		if($('#email').val() == '') {
			$('#email').addClass('is-invalid');
			error = 1;
		} else {
			$('#email').removeClass('is-invalid');
		}

		if($('#phone').val() == '') {
			$('#phone').addClass('is-invalid');
			$('#error-phone-div').html('Phone Number Required.');
			error = 1;
		} else if($('#phone').val().length != 10) {
			$('#phone').addClass('is-invalid');
			$('#error-phone-div').html('10 Digit Mobile Number Required.');
			error = 1;
		} else {
			$('#phone').removeClass('is-invalid');
		}

		if($('#password').val() == '') {
			$('#password').addClass('is-invalid');
			$('#error-password-div').html('Password Required.');
			error = 1;
		} else if($('#password').val().length < 8) {
			$('#password').addClass('is-invalid');
			$('#error-password-div').html('Minimum 8 chars password Required.');
			error = 1;
		} else {
			$('#password').removeClass('is-invalid');
		}

		if($('#cpassword').val() == '') {
			$('#cpassword').addClass('is-invalid');
			error = 1;
		} else {
			$('#cpassword').removeClass('is-invalid');
		}

		if($('#password').val().length > 7) {
			if($('#cpassword').val() != $('#password').val()) {
				$('#cpassword').addClass('is-invalid');
				$('#password').addClass('is-invalid');
				$('#error-password-div').html('Password Does Not Match.');
				error = 1;
			}
		}

		if(error == 0) {
			$.ajax({
        type: "GET",
        url: "{{url('/api/check/number')}}?number=" + $('#phone').val(),
        data: '',
        success: function(resp){
          var obj = JSON.parse(resp);
          if(obj.sts == '01') {
            $('#phone').addClass('is-invalid');
            $('#error-phone-div').html('Mobile Number Already Registred, Try Login!');
            $('#btn').prop('disabled', false);
          } else {
            $('#phone').removeClass('is-invalid');
						$('#register-form').submit();
          }
        }
      });
		} else {
			$('#btn').prop('disabled', false);
		}

	});
</script>

@endsection
