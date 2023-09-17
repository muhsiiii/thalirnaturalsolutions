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
    {!! Form::open(['action' => ['CustomerAddressController@update', $address->id], 'method' => 'POST', 'role' => 'form', 'id' => 'editAddressForm', 'enctype' => 'multipart/form-data','style' => 'display:contents;']) !!}

    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
      <div class="form-group">
        <input placeholder="name" id="name" class="form-control" type="text" name="name" value="{{$address->name ?? ''}}">
        <div id="name-span" class="invalid-feedback">Name Required.</div>
      </div>
    </div>
    
    <div class="col-xs-12  col-sm-8 col-md-6 col-lg-6">
      <div class="form-group">
        <input placeholder="Phone number" id="mobile" class="form-control" type="number" name="mobile" value="{{$address->mobile ?? ''}}">
        <div id="name-span" class="invalid-feedback">Mobile Number Required.</div>
      </div>
    </div>
    <div class=" col-lg-12">
      <div class="form-group">
        <textarea style="width: 100%;padding: 10px 10px;border-radius: 10px;" name="address" id="address" value="{{$address->address ?? ''}}" class="form-control">{{$address->address ?? ''}}</textarea>
        <div id="name-span" class="invalid-feedback">Address  Required.</div>
      </div>
    </div>

    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
      <div class="form-group">
        <input placeholder="District" id="district" class="form-control" type="text" name="district" value="{{$address->district ?? ''}}">
        <div id="name-span" class="invalid-feedback">District  Required.</div>
      </div>
    </div>

    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
      <div class="form-group">
        <input placeholder="State" id="state" class="form-control" type="text" name="state" value="{{$address->state ?? ''}}">
        <div id="name-span" class="invalid-feedback">State  Required.</div>
      </div>
    </div>

    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
      <div class="form-group">
        <input placeholder="city" id="city" class="form-control" type="text" name="city" value="{{$address->city ?? ''}}">
        <div id="name-span" class="invalid-feedback">City  Required.</div>
      </div>
    </div>
    <div class="col-xs-12  col-sm-8 col-md-6 col-lg-6">
      <div class="form-group">
        <input placeholder="Landmark" id="landmark" class="form-control" type="text" name="landmark" value="{{$address->landmark ?? ''}}">
        <div id="name-span" class="invalid-feedback">Landmark  Required.</div>
      </div>
    </div>

    <div class="col-xs-12  col-sm-8 col-md-6 col-lg-6">
      <div class="form-group">
        <input placeholder="Pincode" id="pincode" class="form-control" type="number" name="pincode" value="{{$address->pincode ?? ''}}">
        <div id="picode-span" class="invalid-feedback">Pincode  Required.</div>
      </div>
    </div>

    <button type="button"  id="addressEditBtn">Update</button>
    {{Form::hidden('_method', 'PUT')}}
    {!! Form::close() !!}
  </div>
</section>

<input type="hidden" id="userid" value="{{$userid ?? '0'}}">
@include('layouts.freeshipping')
@include('layouts.footer')
@include('layouts.others')

<script>
  $('#addressEditBtn').click(function() {

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

    console.log({error});
 
    if(error == 0) {
      $('#editAddressForm').submit();
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
  });
</script>
@endsection