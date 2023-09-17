@extends('admin.layouts.header')

@section('adminheader')
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
          <h3 class="card-title">Update Blog</h3>
        </div>
        <!-- form start -->
        <form action="{{ action('AdminBlogsController@update', $blog->id) }}" method="POST" role="form" id="blogEditForm" enctype="multipart/form-data">
    @csrf
        <div class="card-body">

          <div class="form-group row">
           <label for="type" class="col-sm-3 col-form-label text-right">Type :</label>
            <div class="col-sm-6">
              <input type="text" name="type" value="{{ $blog->type }}" class="form-control" placeholder="Enter Blog Type">

              <div id="name-span" class="invalid-feedback">Blog Type Required.</div>
            </div>
          </div>

          <div class="form-group row">
          <label for="title" class="col-sm-3 col-form-label text-right">Title :</label>

          <div class="col-sm-6">
            <input type="text" name="title" value="{{ $blog->title }}" class="form-control" placeholder="Enter Blog Title">

            <div id="name-span" class="invalid-feedback">Blog Title Required.</div>
          </div>
        </div>

        <div class="form-group row">
           <label for="content" class="col-sm-3 col-form-label text-right">Content :</label>

            <div class="col-sm-6">
           <textarea name="content" class="ckeditor form-control">{{ $blog->content }}</textarea>

            <div id="name-span" class="invalid-feedback">Blog Content Required.</div>
            </div>
          </div>

        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label text-right">Status :</label>

          <div class="col-sm-6">
            <select class="form-control select2bs4" style="width: 100%;" name="status" id="status">
              <option value="">Select Status</option>
              <option value="Active" @if($blog->status == 'Active') selected @endif  >Active</option>
              <option value="Inactive"  @if($blog->status == 'Inactive') selected @endif >Inactive</option>
            </select>
            <div class="invalid-feedback">Blog Status Required.</div>
          </div>
        </div>

          <div class="form-group row">
            <label for="image" class="col-sm-3 col-form-label text-right">Blog Image :</label>
            <div class="col-sm-6 col-10">
              <div class="input-group">
                <div class="custom-file">
                  <input class="custom-file-input" id="image" name="image" type="file">
                  <input id="imageOld" name="imageOld" type="hidden" value="{{$blog->image}}">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
              </div>
              <span class="error span-extra hide text-danger" id="helpimage"></span>
            </div>
            <div class="col-sm-1 col-2">
              <button type="button" class="btn btn-secondary btn-tooltip float-left" data-toggle="tooltip" data-placement="top" title="Product in Aspect Ratio of 4:5 Required. ie Image with Resolution 200 x 250px, 300 x 375px etc.">
                <i class="fa fa-info" aria-hidden="true"></i>
              </button>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-3 offset-sm-3">
              <img id="showimage"  class="img-thumbnail <?php if($blog->image == '') echo 'hide'; ?>" src="{{url($blog->image)}}" width="75%" height="auto" style="min-width:140px;">
            </div>
          </div>

        </div>

        <div class="card-footer">
          <a class="btn btn-default offset-sm-3" href="{{url('/admin/blogs')}}">Back</a>&emsp;
          <button type="button" id="addBtn" class="btn btn-primary"> Save </button>
        </div>
        <!-- /.card-body -->
        <input type="hidden" name="_method" value="PUT">

        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
<!-- /.content-wrapper -->
@include('admin.layouts.footer')
@include('admin.layouts.js')
<script>

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

$('#subcat_id').select2({
  theme: 'bootstrap4',
  placeholder: "Select Sub-Category",
  ajax: {
  url: '{{url('/api/search/subcategory')}}',
  data: function (params) {
      return {
      term: params.term,
      search: 'false',
      cat_id: $('#cat_id').val()
      }
  },
  dataType: 'json',
  }
});

var _URL = window.URL || window.webkitURL;
  $('#image').change(function (e) {
  readURL(this, '1');
  $('#image-error').addClass('hide');
  $('#showimage').removeClass('hide');
  var file, img;
  if ((file = this.files[0])) {
    img = new Image();
    img.onload = function () {
      var res = this.width/this.height;
      if (res < 0.75 || res > 1.10) {
        $('#image').addClass('is-invalid').val('');
        $('#showimage').addClass('hide');
        $('#helpimage').html('Product in Aspect Ratio of 4:5 Required. ie Image with Resolution 200 x 250px, 300 x 375px etc.').removeClass('hide');
      } else {
        $('#image').removeClass('is-invalid');
        $('#showimage').removeClass('hide');
        $('#helpimage').html('').addClass('hide');
      }
    };
    img.src = _URL.createObjectURL(file);
  }
});


function readURL(input, type) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      if(type == 1) {
        $('#showimage').attr('src', e.target.result);
      } else if(type == 2) {
        $('#showimage2').attr('src', e.target.result);
      } else if(type == 3) {
        $('#showimage3').attr('src', e.target.result);
      } else if(type == 4) {
        $('#showimage4').attr('src', e.target.result);
      }
    }
  reader.readAsDataURL(input.files[0]);
 }
}

$('#cat_id').select2({
  theme: 'bootstrap4',
  placeholder: "Select Category",
});

$('#addBtn').click(function() {
  var error = 0



  if($('#type').val() == ''){
    $('#type').addClass('is-invalid');
    error = 1;
  } else {
    $('#type').removeClass('is-invalid');
  }

  if($('#title').val() == ''){
    $('#title').addClass('is-invalid');
    error = 1;
  } else {
    $('#title').removeClass('is-invalid');
  }

  // if($('#content').val() == ''){
  //   $('#content').addClass('is-invalid');
  //   error = 1;
  // } else {
  //   $('#content').removeClass('is-invalid');
  // }

  if($('#status').val() == ''){
    $('#status').addClass('is-invalid');
    error = 1;
  } else {
    $('#status').removeClass('is-invalid');
  }

  if($('#image').val() == '' && $('#imageOld').val() == ''){
      $('#image').addClass('is-invalid');
      $('#helpimage').removeClass('hide').html('Product Image Required.');
      error = 1;
  } else {
      $('#image').removeClass('is-invalid');
      $('#helpimage').addClass('hide').html('');
  }

  if(error == 0) {
    $('#blogEditForm').submit();
  }
});
</script>
@endsection

