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
						<h3 class="card-title">Reviews for Product: {{$product->name}}</h3>
					</div>
					<div class="card-body table-responsive p-0">
						<table class="table table-hover text-nowrap table-bordered table-extra">
							<thead>
							<tr>
								<th>#</th>
								<th>Customer Name</th>
								<th>Rating</th>
								<th>Comment</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tbody>
								@if(count($reviews) > 0)
									@foreach($reviews as $key => $value)
									<tr>
										<td align="center"><?php echo $key+1; ?></td>
										<td align="center">
											{{$value->customername ?? ''}}
										</td>
										<td align="center">{{$value->rating ?? ''}}</td>
										<td style="white-space: normal !important;word-break: break-all !important; max-width: 220px;">{{ \Illuminate\Support\Str::limit($value->comment, 150, $end='...') }}</td>
										<td align="center">
											<div class="row">
												{{-- <div class="col-sm-6" align="right">
													<a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-add" title="Edit Banner" onclick="mkeEditForm('{{$value->id}}','{{$value->image}}','{{$value->name}}','{{$value->desc}}')">
														<i class="fa fa-edit" style="font-size:16px"></i> <b>Edit</b>
													</a>
												</div> --}}
												<div class="col-sm-6" align="left">
													<form action="{{url('/admin/products/reviews/delete/'.$value->product_id)}}" method="POST" role="form">
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
										<td colspan="5" align="center">No Reviews Found</td>
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
		<a href="" data-toggle="modal" data-target="#modal-add" title="Add New Review" onclick="mkeAddForm();">
			<i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
		</a>
	</div>
	<!-- /.content-wrapper -->

	<!-- banner add model -->
	<div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      	<form action="{{url('/admin/products/reviews/'.$productid.'/create')}}" id="addform" method="POST" enctype="multipart/form-data">
      		@csrf

	        <div class="modal-header">
						<h4 class="modal-title">Create Product Review</h4>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">&times;</span>
	          </button>
	        </div>
	        <div class="modal-body">
	        	
						<div class="card-body">
							<div class="form-group row">
								<label for="customername" class="col-sm-2 col-form-label text-right">Name: </label>
								<div class="col-sm-8">
									<input class="form-control" placeholder="Enter Customer Name" name="customername" type="text" value="" id="customername">
									<span class="invalid-feedback">Customer Name Required.</span>
								</div>
							</div>

							
							<div class="form-group row">
								<label for="customername" class="col-sm-2 col-form-label text-right">Rating: </label>
								<div class="col-sm-8">
									<select id="rating" name="rating" class="form-control">
										<option value="5">5</option>
										<option value="4">4</option>
										<option value="3">3</option>
										<option value="2">2</option>
										<option value="1">1</option>
									</select>
									<span class="invalid-feedback">Customer Rating Required.</span>
								</div>
							</div>

							<div class="form-group row">
								<label for="comment" class="col-sm-2 col-form-label text-right">Comments:</label>
								<div class="col-sm-8">
									<textarea class="form-control" placeholder="Enter Comments" name="comment" id="comment" type="text" rows="3"></textarea>
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

  function validate() {
    var error = 0;
    if($('#customername').val() == '') {
      $('#customername').addClass('is-invalid');
      $('#customername').focus();
      error = 1;
    } else {
      $('#customername').removeClass('is-invalid');
    }

    if($('#comment').val() == '') {
      $('#comment').addClass('is-invalid');
      $('#comment').focus();
      error = 1;
    } else {
      $('#comment').removeClass('is-invalid');
    }

    if(error == 0) {
      $('#addform').submit();
    }
  }

</script>

@endsection