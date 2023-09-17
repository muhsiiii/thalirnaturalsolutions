@extends('layouts.header')
@section('header')
@include('layouts.navbar')

@include('layouts.sidebar')  
@include('layouts.cart')
@include('layouts.login')

<aside class="col-md-6 col-sm-3 mt-4" style="margin: auto;">
	<div class="" style="padding: 15px; border-radius: 5px; border: 1px solid #ebecf0;">
		<div class="card-body register-form">
			<div class="" style="text-align:center;">
				<h4 class="card-title">Update Profile</h4>
			</div>
			
			
			<form action="{{url('/register/update/'.$user->id)}}" method="POST" autocomplete="off" id="profileEditForm">
				@csrf
				<div class="form-row">
					<div class="col form-group">
						<label for="name">Full Name <span class="text-danger fs-24">*</span></label>
						<input type="text" class="form-control" placeholder="Enter Name" id="name" name="name"
            			value="{{$user->name}}">
						<div class="invalid-feedback">Name Required.</div>
					</div>
				</div>

				<div class="form-row">
					<div class="col form-group">
						<label for="email">Email</label>
						<input class="form-control" type="email" id="email" name="email" placeholder="Enter Email Address"  value="{{$user->email}}">
						<div class="invalid-feedback" id="error-email-div">Email Required.</div>
					</div>
				</div>


		
				<div class="form-group mt-3">
					<button type="button" id="updateBtn" class="btn btn-success">Update</button>
				</div>   
			
			</form>
			<hr>
		</div>
	</div>
</aside>

@include('layouts.footer')
@include('layouts.others')
<script type="text/javascript">
	$('#updateBtn').click( function() {
		$('#profileEditForm').submit();
	});
</script>


@endsection
