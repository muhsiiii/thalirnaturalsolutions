@extends('layouts.header')
@section('header')

@include('layouts.navbar')

<aside class="col-md-3 mt-5" style="margin: auto;">

  <div class="card" style="padding: 15px; border-radius: 5px;">
    <div class="card-body">
      <h4 class="card-title mb-4">Sign in</h4>
              @csrf
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>
            <input name="log-phone" id="log-phone" class="form-control" placeholder="Mobile Number" type="number">
            <div class="invalid-feedback" id="error-log-phone-div">Phone Number Required.</div>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input name="log-password" id="log-password" class="form-control" placeholder="Password" type="password">
            <div class="invalid-feedback" id="error-log-password-div">Password Required.</div>
          </div>
        </div>

      

      <div class="form-group">
        <button id="btnsubmit" class="btn btn-primary btn-block"> Login </button>
      </div>
      <div class="card-footer text-center" style="padding: 20px 10px;">
        Don't have an account? <a href="{{url('/register')}}">Sign Up</a>
      </div>

    </div>
  </div>
</aside>

<br><br>
@include('layouts.footer')
@include('layouts.others')
<style type="text/css">
  .invalid-feedback {
    font-weight: 500;
    font-size: 10px;
    letter-spacing: 0.2px;
  }
</style>
<script type="text/javascript">

$(document).on('click', '#btnsubmit', function(event) {
        event.preventDefault();
        $('#btnsubmit').text('Plase wait...');
        var valid=true;
        if(!$("#photo").val()){
        $('#btnsubmit').text('Add');
        valid=false;
        Toastify({ text: "Please upload image!", gravity: "bottom",position: "center"}).showToast();
       }
       $('.required').each(function () {
       if(!$(this).val()){
        $('#btnsubmit').text('Add');
        valid=false;
        Toastify({ text: "Some required fields are empty!", gravity: "bottom",position: "center"}).showToast();
       } });
       if(valid){
       $.ajax({ url: "{{url('api/customer/save')}}", type: 'POST',
        data: {
        "name": $("#name").val(),
        "date": $("#date").val(),
        "phone": $("#phone").val(),
        "aadhaar": $("#aadhaar").val(),
        "pincode": $("#pincode").val(),
        "state": $("#state").val(),
        "district": $("#district").val(),
        "area": $("#area").val(),
        "address": $("#address").val(),
        "gender": $("#gender").val(),
        "age": $("#age").val(),
        "plan": $("#plan").val(),
        "weight": $("#weight").val(),
        "height": $("#height").val(),
        "bmi": $("#bmi").val(),
        "fee": $("#fee").val(),
        "photo": $("#photo").val()},

        success:function(resp){
        $('#btnsubmit').text('Add');
        if(resp.status=='01')
        {
          $('#btnsubmit').prop('disabled', true);
          Toastify({ text: "Customer added.", duration: 1800, gravity: "bottom",position: "center",
          callback: function(){
            window.location.href = "{{url('/customers')}}";
          }}).showToast();
        }else
        {
        Toastify({ text: "Something went wrong!", gravity: "bottom",position: "center"}).showToast();
        }
   }
 })
 .done(function() {
  $('#btnsubmit').text('Add');
   console.log("success");
   
 });
 }
});
 
</script>

@endsection