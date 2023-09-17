@extends('admin.layouts.header')

@section('adminheader')
<div class="wrapper">
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    @include('admin.layouts.navbar')
    @include('admin.layouts.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.layouts.content-header')
       
        <div class="row m-10">
            <div class="col-12">
               <div class="card card-primary">
                 <div class="card-header">
                   <h3 class="card-title">Settings</h3>
                 </div>
                 <form action="{{url('/admin/settings/update')}}" method="POST" role="form" id="addForm" enctype="multipart/form-data">
                <div class="card-body">
                <!-- form start -->
                    <div class="form-group row">
                   <label for="delivery_charge" class="col-sm-3 col-form-label text-right">Delivery Charge:</label>

                        <div class="col-sm-6">
                            <input type="number" name="delivery_charge" value="<?php echo $settings->delivery_charge; ?>" class="form-control" placeholder="Enter Delivery Charge">

                            <div class="invalid-feedback">Enter Valid  Delivery Charge.</div>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="promobanner" class="col-sm-3 col-form-label text-right">Promotion Banner:</label>

                        <div class="col-sm-6">
                            <input type="text" name="promobanner" value="<?php echo $settings->promobanner; ?>" class="form-control" placeholder="Enter Promotion Banner Text">

                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="promobannerurl" class="col-sm-3 col-form-label text-right">Promotion Banner Redirect Url:</label>

                        <div class="col-sm-6">
                           <input type="text" name="promobannerurl" value="<?php echo $settings->promobannerurl; ?>" class="form-control" placeholder="Enter Promotion Banner Url">

                        </div>
                    </div>

                    <div class="form-group row">
                    
                    <label for="email" class="col-sm-3 col-form-label text-right">Email:</label>
                        <div class="col-sm-6">
                            <input type="text" name="email" value="<?php echo $settings->email; ?>" class="form-control" placeholder="Enter Email">

                        </div>
                    </div>

                    <div class="form-group row">
                    
                    <label for="email" class="col-sm-3 col-form-label text-right">Mobile Number:</label>
                        <div class="col-sm-6">
                            <input type="number" name="phone" value="<?php echo isset($settings->phone) ? $settings->phone : ''; ?>" class="form-control border-form-control pb-4 pt-4" placeholder="10-digit Mobile Number" style="border-radius: 5px;" id="mobile">

                        </div>
                    </div>

                    <div class="form-group row">
                 
                    <label for="address" class="col-sm-3 col-form-label text-right">Address:</label>
                        <div class="col-sm-6">
                            <input type="text" name="address" value="<?php echo $settings->address; ?>" class="form-control" placeholder="Enter Address">

                        </div>
                    </div>

                    <div class="form-group row">
                    
                    <label for="pincode" class="col-sm-3 col-form-label text-right">Pincode:</label>
                        <div class="col-sm-6">
                            <input type="number" name="pincode" value="<?php echo $settings->pincode; ?>" class="form-control" placeholder="Enter Pincode">

                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="latitude" class="col-sm-3 col-form-label text-right">Latitude:</label>
                        <div class="col-sm-6">
                            <input type="text" name="latitude" value="<?php echo $settings->latitude; ?>" class="form-control" placeholder="Enter Latitude">

                        </div>
                    </div>


                    <div class="form-group row">
                    <label for="longitude" class="col-sm-3 col-form-label text-right">Longitude:</label>
                        <div class="col-sm-6">
                            <input type="text" name="longitude" value="<?php echo $settings->longitude; ?>" class="form-control" placeholder="Enter Longitude">

                        </div>
                    </div>


                    <div class="form-group row">
                    
                    <label for="website" class="col-sm-3 col-form-label text-right">Website:</label>
                        <div class="col-sm-6">
                            <input type="text" name="website" value="<?php echo $settings->website; ?>" class="form-control" placeholder="Enter Website name">

                        </div>
                    </div>
                    
                  
					<div class="form-group row">
                   
                    <label for="fburl" class="col-sm-3 col-form-label text-right">FaceBook Url:</label>
                        <div class="col-sm-6">
                            <input type="text" name="fburl" value="<?php echo $settings->fburl; ?>" class="form-control" placeholder="Enter Facebook Url">
                        </div>
                    </div>

			
					<div class="form-group row">
                    
                    <label for="instaurl" class="col-sm-3 col-form-label text-right">Instagram Url:</label>
                        <div class="col-sm-6">
                            <input type="text" name="instaurl" value="<?php echo $settings->instaurl; ?>" class="form-control" placeholder="Enter Instagram Url">

                        </div>
                    </div>

					<div class="form-group row">
                    
                    <label for="whatsappurl" class="col-sm-3 col-form-label text-right">WhatsApp Url:</label>
                        <div class="col-sm-6">
                            <input type="text" name="whatsappurl" value="<?php echo $settings->whatsappurl; ?>" class="form-control" placeholder="Enter WhatsApp Url">

                        </div>
                    </div>

					
					<div class="form-group row">
                    
                    <label for="youtubeurl" class="col-sm-3 col-form-label text-right">Youtube Url:</label>
                        <div class="col-sm-6">
                            <input type="text" name="youtubeurl" value="<?php echo $settings->youtubeurl; ?>" class="form-control" placeholder="Youtube Url">

                        </div>
                    </div>

					<div class="form-group row">
                    
                    <label for="appandroidurl" class="col-sm-3 col-form-label text-right">Android App Url:</label>
                        <div class="col-sm-6">
                            <input type="text" name="appandroidurl" value="<?php echo $settings->appandroidurl; ?>" class="form-control" placeholder="Android App Url">

                        </div>
                    </div>

					<div class="form-group row">
                    
                    <label for="appiosurl" class="col-sm-3 col-form-label text-right">IOS App Url:</label>
                        <div class="col-sm-6">
                          <input type="text" name="appiosurl" value="<?php echo $settings->appiosurl; ?>" class="form-control" placeholder="IOS App Url">

                        </div>
                    </div>

                    <div class="form-group row">
                   
                    <label for="ourstory" class="col-sm-3 col-form-label text-right">Our Story:</label>
                        <div class="col-sm-6">
                        <textarea name="ourstory" class="ckeditor form-control"><?php echo $settings->ourstory; ?></textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                   
                    <label for="aboutus" class="col-sm-3 col-form-label text-right">About Us:</label>
                        <div class="col-sm-6">
                        <textarea name="aboutus" class="ckeditor form-control"><?php echo $settings->aboutus; ?></textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                    
                    <label for="termsandconditions" class="col-sm-3 col-form-label text-right">Terms & Conditions:</label>
                        <div class="col-sm-6">
                        <textarea name="termsandconditions" class="ckeditor form-control"><?php echo $settings->terms; ?></textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                    
                    <label for="privacypolicy" class="col-sm-3 col-form-label text-right">Privacy Policy:</label>
                        <div class="col-sm-6">
                        <textarea name="privacypolicy" class="ckeditor form-control"><?php echo $settings->privacypolicy; ?></textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                   
                    <label for="returnpolicy" class="col-sm-3 col-form-label text-right">Return Policy:</label>
                        <div class="col-sm-6">
                        <textarea name="returnpolicy" class="ckeditor form-control"><?php echo $settings->returnpolicy; ?></textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                   
                    <label for="shippingpolicy" class="col-sm-3 col-form-label text-right">Shipping Policy:</label>
                        <div class="col-sm-6">
                        <textarea name="shippingpolicy" class="ckeditor form-control"><?php echo $settings->shippingpolicy; ?></textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                    
                    <label for="refundpolicy" class="col-sm-3 col-form-label text-right">Refund Policy:</label>
                        <div class="col-sm-6">
                        <textarea name="refundpolicy" class="ckeditor form-control"><?php echo $settings->refundpolicy; ?></textarea>

                        </div>
                    </div>

                    
					<input id="id" name="id" type="hidden" value="{{$settings->id}}">
                    
                
                    
                <div class="card-footer">
                  @csrf
                    <a class="btn btn-default offset-sm-3" href="{{url('/admin')}}">Back</a>&emsp;
                    <button type="button" id="addBtn" class="btn btn-primary"> Update </button>
                </div>
                    
                </div>    
                </form>
               </div>
               <!-- /.card -->
            </div>
        </div>

</div>
<!-- /.content-wrapper -->



    <input type="hidden" id="delId">
    <input type="hidden" id="adddisporder" value="<?php echo $disporder ?? '1'; ?>">

    @include('admin.layouts.footer')
</div>
@include('admin.layouts.js')
@include('admin.layouts.messages')

<script>
    CKEDITOR.replace( 'termsandconditions' );
    $('#addBtn').click(function() {
		var error = 0

		if($('#delivery_charge').val() == '' || $('#delivery_charge').val() < 0){
			$('#delivery_charge').addClass('is-invalid');
            document.getElementById("delivery_charge").focus();
			error = 1;
		} else {
			$('#delivery_charge').removeClass('is-invalid');
		}


		if(error == 0) {
			$('#addForm').submit();
		}
	});
</script>

@endsection
