@extends('admin.layouts.header')

@section('adminheader')
<div class="wrapper">
	@include('admin.layouts.navbar')
	@include('admin.layouts.sidebar')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		@include('admin.layouts.content-header')
		<div class="row m-20">
			<div class="col-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Faqs for Product: {{$product->name}}</h3>
					</div>
					<div class="card-body table-responsive p-0">
						<table class="table table-hover text-nowrap table-bordered table-extra">
							<thead>
							<tr>
								<th>#</th>
                  				<th>Question</th>
                  				<th>Answer</th>
                  				<th>Actions</th>
							</tr>
							</thead>
							<tbody>
								@if(count($faqs) > 0)
									@foreach($faqs as $key => $value)
									<tr>
										<td align="center"><?php echo $key+1; ?></td>
										<td style="white-space: normal !important;word-break: break-all !important; max-width: 220px;">{{ \Illuminate\Support\Str::limit($value->question, 150, $end='...') }}</td>
										<td style="white-space: normal !important;word-break: break-all !important; max-width: 220px;">{{ \Illuminate\Support\Str::limit($value->answer, 150, $end='...') }}</td>
										<td align="center">
											<div class="row">
												<div class="col-sm-6" align="right">
													<a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-add" title="Edit Banner" onclick="mkeEditForm('{{$value->id}}','{{$value->question}}','{{$value->answer}}')">
														<i class="fa fa-edit" style="font-size:16px"></i> <b>Edit</b>
													</a>
												</div>
												<div class="col-sm-6" align="left">
													<form action="{{url('/admin/products/faqs/delete/'.$value->productid)}}" method="POST" role="form">
														<input type="hidden" name="did" value="{{$value->id}}">
														{!! csrf_field() !!}
														<button type="submit" class="btn btn-sm btn-danger" title="Delete Banner">
															<i class="fa fa-trash" style="font-size:16px" aria-hidden="true"></i> <b>Delete</b>
														</button>
													</form>
												</div>
											</div>
										</td>
									</tr>
									@endforeach
								@else
									<tr>
										<td colspan="5" align="center">No Faqs Found</td>
									</tr>
								@endif
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
					<div class="card-footer clearfix ">
					</div>
				</div>
				<!-- /.card -->
			</div>
		</div>
		<!-- Add new Banner link -->
		<a href="" data-toggle="modal" data-target="#modal-add" title="Add New Banner" onclick="mkeAddForm();">
			<i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
		</a>
	</div>
	<!-- /.content-wrapper -->

	<!-- banner add model -->
	<div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<form action="{{url('/admin/products/faqs/save/'.$productid)}}" id="addform" method="POST" enctype="multipart/form-data">
      		{!! csrf_field() !!}
					<input type="hidden" name="type" value="1">
					<input type="hidden" name="id" id="id" value="">
					<input type="hidden" name="redi" value="first">
					<input type="hidden" name="imageOld" id="imageOld" value="">
					<input type="hidden" id="eid" name="eid" value="0">


	        <div class="modal-header">
				<h4 class="modal-title" id ="modalHeading">Add Product Faq</h4>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	        	
						<div class="card-body">
							<div class="form-group row">
								<label for="name" class="col-sm-2 col-form-label text-right">Question: </label>
								<div class="col-sm-8">
									<input class="form-control" placeholder="Enter Question" name="question" type="text" value="" id="question">
									<span class="invalid-feedback">Please enter Question.</span>
								</div>
							</div>

							<div class="form-group row">
								<label for="url" class="col-sm-2 col-form-label text-right">Answer:</label>
								<div class="col-sm-8">
									<textarea class="form-control" placeholder="Enter Answer" name="answer" id="answer" type="text" rows="3"></textarea>
								</div>
							</div>
							

							<div class="row">
								<div class="col-sm-8 offset-sm-2">
									<img id="showImage" class="img-thumbnail hide" width="50%" height="auto" style="min-width:140px;">
								</div>
							</div>
						</div>
						<!-- /.card-body -->
					
	        </div>
	        <div class="modal-footer justify-content-between">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	          <input class="btn btn-primary offset-sm-2" type="button" onclick="validate();" value="Save">
	        </div>
	      </form>
      </div>
    </div>
  </div>
	
	@include('admin.layouts.footer')
</div>
@include('admin.layouts.js')
@include('admin.layouts.messages')

<style>
  .error.invalid-feedback {
    padding-left: 10px;
  }
</style>
<script type="text/javascript">
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });

  var _URL = window.URL || window.webkitURL;
  $('#image').change(function (e) {
    readURL(this);
    $('#image-error').addClass('hide');
    $('#showImage').removeClass('hide');
    var file, img;
    if ((file = this.files[0])) {
      img = new Image();
      img.onload = function () {
        var res = this.width/this.height;
        if (res < 0.60|| res > 1.10) {
          $('#image').addClass('is-invalid').val('');
          $('#showImage').addClass('hide');
          $('#helpImage').html('Image in Aspect Ratio of 1:1,4:5 Required.').removeClass('hide');
        } else {
          $('#image').removeClass('is-invalid');
          $('#showImage').removeClass('hide');
          $('#helpImage').html('').addClass('hide');
        }
      };
      img.src = _URL.createObjectURL(file);
    }
  });

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  function validate() {
    var error = 0;
    if($('#question').val() == '') {
      $('#question').addClass('is-invalid');
      $('#question').focus();
      error = 1;
    } else {
      $('#question').removeClass('is-invalid');
    }


	if($('#answer').val() == '') {
      $('#answer').addClass('is-invalid');
      $('#answer').focus();
      error = 1;
    } else {
      $('#answer').removeClass('is-invalid');
    }

  
    if(error == 0) {
      $('#addform').submit();
    }
  }

  function mkeAddForm() {
    $('#name,#id,#image,#imageOld').val('');
    $('#showImage').attr('src', '');
    $('#showImage').addClass('hide');
    $('#bannerHeading').html('Add New Banner');
    $('#image').removeClass('is-invalid');
    $('#name').removeClass('is-invalid');
    $('#helpImage').html('').addClass('hide');
  }

  function mkeEditForm(id, question, answer) {
    $('#question').removeClass('is-invalid');
    $('#question').removeClass('is-invalid');
    $('#modalHeading').html('Update Faq');
	$('#addform').attr('action', '{{url('/admin/products/faqs/update/'.$productid)}}');
    $('#id').val(id);

    $('#question').val(question);
    $('#answer').val(answer);
	$('#eid').val(id);
  }
</script>

@endsection