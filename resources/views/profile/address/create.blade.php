@extends('layouts.header')
@section('header')
@include('layouts.navbar')


<div class="search-box mobli-search">
      <input style="background: none;" class="search-input" type="text" placeholder="Search something..">
      <button class="search-btn"><i class="ri-search-line"></i></button>
</div>

@include('layouts.sidebar')  
@include('layouts.cart')
@include('layouts.login')

<section class="add-addres">
    <div class="row">
      
      <form action="/cusaddress" method="POST" role="form" id="addAddressForm" enctype="multipart/form-data" style="display:contents;">
    @csrf
      
      <div class="col-lg-12">
        <h4 class="delivery-caption">Delivery Address   -  All Fields are mandatory</h4>
      </div>
      <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
        <div class="form-group">
          <input placeholder="Name" class="form-control" type="text" id="name" name="name" required>
          <div id="name-span" class="invalid-feedback">Name Required.</div>
        </div>
      </div>
      <div class="col-xs-12  col-sm-8 col-md-6 col-lg-6">
        <div class="form-group">
          <input  placeholder="Mobile number" id="mobile" class="form-control" type="number" name="mobile" required>
          <div id="name-span" class="invalid-feedback">Mobile Number Required.</div>
        </div>
      </div>
      <div class=" col-lg-12">
        <div class="form-group">
         <textarea style="width: 100%;padding: 10px 10px;border-radius: 10px;" name="address" id="address"  placeholder="Address" class="form-control"></textarea>
         <div id="name-span" class="invalid-feedback">Address  Required.</div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
        <div class="form-group">
          <input placeholder="District" id="district" class="form-control" type="text" name="district" required>
          <div id="name-span" class="invalid-feedback">District  Required.</div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
        <div class="form-group">
          <input placeholder="State" id="state" class="form-control" type="text" name="state" required>
          <div id="name-span" class="invalid-feedback">State  Required.</div>
        </div>
      </div>


      <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
        <div class="form-group">
          <input placeholder="City" id="city" class="form-control" type="text" name="city" required>
          <div id="name-span" class="invalid-feedback">City  Required.</div>
        </div>
      </div>
      <div class="col-xs-12  col-sm-8 col-md-6 col-lg-6">
        <div class="form-group">
          <input  placeholder="Landmark" id="landmark" class="form-control" type="text" name="landmark" required>
          <div id="name-span" class="invalid-feedback">Landmark  Required.</div>
        </div>
      </div>

      <div class="col-xs-12  col-sm-8 col-md-6 col-lg-6">
        <div class="form-group">
          <input  placeholder="Pincode" id="pincode" class="form-control" type="number" name="pincode" min="6" max="6" required>
          <div id="picode-span" class="invalid-feedback"> 6 Digit Pincode  Required.</div>
        </div>
      </div>
      <div class=" col-lg-12">
        <div class="form-group">
          <label for="">Order notes (optional)</label>
         <textarea style="width: 100%;padding: 10px 10px;border-radius: 10px;" name="address" id="address"  placeholder="notes about your order, e.g.special notes for delivery" class="form-control"></textarea>
         <div id="name-span" class="invalid-feedback">Address  Required.</div>
        </div>
      </div>
      <button  type="button"  id="addressAddBtn">Add</button>
     </form>
    </div>
</section>
  

  
<input type="hidden" id="userid" value="{{$userid ?? '0'}}">


@include('layouts.freeshipping') 
@include('layouts.footer')
@include('layouts.others')

<script>
  $('#addressAddBtn').click(function() {

    var error = 0;

    if($('#name').val() == '') {
      $('#name').addClass('is-invalid');
      error = 1;
    } else {
      $('#name').removeClass('is-invalid');
    }

    if($('#mobile').val() == '') {
      $('#mobile').addClass('is-invalid');
      error = 1;
    } else {
      $('#mobile').removeClass('is-invalid');
    }
   
    if($('#address').val() == '') {
      $('#address').addClass('is-invalid');
      error = 1;
    } else {
      $('#address').removeClass('is-invalid');
    }

    if($('#district').val() == '') {
      $('#district').addClass('is-invalid');
      error = 1;
    } else {
      $('#district').removeClass('is-invalid');
    }
    if($('#state').val() == '') {
      $('#state').addClass('is-invalid');
      error = 1;
    } else {
      $('#state').removeClass('is-invalid');
    }
    if($('#city').val() == '') {
      $('#city').addClass('is-invalid');
      error = 1;
    } else {
      $('#city').removeClass('is-invalid');
    }
    if($('#landmark').val() == '') {
      $('#landmark').addClass('is-invalid');
      error = 1;
    } else {
      $('#landmark').removeClass('is-invalid');
    }

    if($('#pincode').val() == '') {
      $('#pincode').addClass('is-invalid');
      error = 1;
    } else {
      $('#pincode').removeClass('is-invalid');
    }
 
    if(error == 0) {
      $('#addAddressForm').submit();
    }

  });

  $('#pincode').blur(function() {
    if($('#pincode').val().length == 6) {
      $('#pincode').removeClass('is-invalid');
      $.ajax({
        type: "GET",
        url: "{{ url('/ajax/getpincodedetails') }}",
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
          else{
              $('#picode-span').html("Invalid PinCode!");
              $('#pincode').addClass('is-invalid');
          }
        }
      });
    } else {
      $('#pincode').addClass('is-invalid');
    }
  })
</script>
@endsection
