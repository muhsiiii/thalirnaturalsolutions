@extends('admin.layouts.header')

@section('adminheader')
<div class="wrapper">
  @include('admin.layouts.navbar')
  @include('admin.layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('admin.layouts.content-header')
    <div class="row m-20">
      <div class="col-sm-3">
        <input type="text" id="search" placeholder="Search Category..." value="{{ $search }}"
        class="form-control">
      </div>

      <div class="col-sm-1">
        <input type="button" id="searchBtn" class="btn btn-primary" value="Search">
      </div>
    </div>

    <div class="row m-20">
      <div class="col-md-10">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Sub-Category List</h3>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap table-bordered table-extra">
              <thead>
                <tr>
                  <th>#</th>
                  <th>SubCategory</th>
                  <th>Category</th>
                  <th>No of Products</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(count($subCategories) > 0)
                @foreach($subCategories as $key => $value)
                <?php $no++; ?>
                <tr>
                  <td align="center">{{$no}}</td>
                  <td align="left">{{$value->name}}</td>
                  <td align="left">@if(isset($categories[$value->cat_id])){{$categories[$value->cat_id]}}@endif</td>
                  <?php $count = App\Http\Controllers\AdminCategoryController::countSubCatProducts($value->id); ?>
                  <td align="center">{{$count}}</td>
                  <td align="center">
                    <div class="row">
                      <div class="col-sm-6" align="right">
                        <a href="" class="btn btn-sm btn-warning" title="Edit Category"
                        data-toggle="modal" data-target="#modal-add"
                        onclick='mkeEditForm("{{$value->id}}","{{$value->name}}","{{$value->cat_id}}")'
                        style="color: white;">
                        <i class="fa fa-edit" style="font-size:16px"></i> <b>Edit</b>
                      </a>
                    </div>
                    <div class="col-sm-6" align="left">
                      <form action="{{url('/admin/subcategory/delete/'.$value->id)}}"
                        method="POST" role="form" id="delform{{$value->id}}">
                        {!! csrf_field() !!}
                        <button type="button" class="btn btn-sm btn-danger"
                        title="Delete SubCategory" data-toggle="modal"
                        data-target="#modal-delete"
                        onclick='mkeDelModal("{{$value->id}}","{{$value->name}}");'
                        @if($count> 0) disabled @endif >
                        <i class="fa fa-trash" style="font-size:16px"
                        aria-hidden="true"></i> <b>Delete</b>
                      </button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>

            @endforeach
            @else
            <tr>
              <td colspan="6" align="center">No Results Found!</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix ">
        @if(count($subCategories) > 0)
        {{$subCategories->appends( array("search" => $search))->links()}}
        @endif
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>
<!-- Add new Banner link -->
<a href="" data-toggle="modal" data-target="#modal-add" title="Add New SubCategory" onclick="mkeAddForm();">
  <i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
</a>
</div>
<!-- /.content-wrapper -->

<!-- banner add model -->
<div class="modal fade" id="modal-add">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{url('/admin/subcategory/create')}}" method="POST" id="addform" role="form"
      enctype="multipart/form-data">
      {!! csrf_field() !!}
      <input type="hidden" name="id" id="id" value="">

      <div class="modal-header">
        <h4 class="modal-title" id="bannerHeading">Add New SubCategory</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="card-body">
          <div class="form-group row">
            
            <form>
            <div class="col-sm-6">
              <select class="form-control" style="width: 100%;" name="cat_id" id="cat_id">
                <option value="">Select Category</option>
                @if($categories)
                @foreach($categories as $id => $name)
                <option value="{{$id}}">{{$name}}</option>
                @endforeach
                @endif
              </select>
              <div class="invalid-feedback">Product Category Required.</div>
            </div>
            <div class="col-sm-3">
              <a class="btn btn-light btn-link" href="{{url('/admin/category?o=1')}}"
              target="_blank">
              Add New Category
            </a>
          </div>
        </div>

        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label text-right">SubCategory Name*:</label>
          <div class="col-sm-7">
            <input class="form-control" placeholder="Enter SubCategory Name" name="name"
            type="text" value="" id="name">
            <span class="invalid-feedback">Please enter SubCategory Name.</span>
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

<div class="modal fade" id="modal-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="deltitle">Delete</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Are You Sure ?</h5>
        <p>If you Delete this SubCategory, All Cources Associated with it may be Effected.</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" onclick="delCategory()">Delete</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="delId">

@include('admin.layouts.footer')
</div>
@include('admin.layouts.js')
@include('admin.layouts.messages')
<style>
.table-extra td {
  padding: 0.4rem !important;
}
</style>
<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  });

  $('.backcolor').colorpicker()

  $('.backcolor').on('colorpickerChange', function(event) {
    $('.backcolor .fa-square').css('color', event.color.toString());
  });

  $('#searchBtn').click(function() {
    var url = '{{url('/admin/subcategory')}}?search=' + $('#search').val();
    window.location.href = url;
  });

  $(function() {
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });

  $('#cat_id').select2({
    theme: 'bootstrap4',
    placeholder: "Select Category",
  });


  function mkeAddForm() {
    $('#addform').attr('action', '{{url('/admin/subcategory/create')}}');
    $('#name,#id').val('');
    $('#bannerHeading').html('Add New Category');
    $('#name').removeClass('is-invalid');
  }

  function mkeEditForm(id, name, cat_id) {

    $('#cat_id').val(cat_id);
    $("#cat_id").trigger("change");
    $('#name').removeClass('is-invalid');
    $('#addform').attr('action', '{{url('/admin/subcategory/update')}}');
    $('#bannerHeading').html('Update SubCategory');
    $('#id').val(id);
    $('#name').val(name);
  }

  function validate() {
    var error = 0;
    if ($('#name').val() == '') {
      $('#name').addClass('is-invalid');
      error = 1;
    } else {
      $('#name').removeClass('is-invalid');
    }

    if (error == 0) {
      $('#addform').submit();
    }
  }

  function mkeDelModal(id, name) {
    $('#deltitle').html('Delete ' + name);
    $('#delId').val(id);
  }

  function delCategory() {
    $('#delform' + $('#delId').val()).submit();
  }
</script>
@if(isset($_GET['o']) && $_GET['o'] == '1')
<script>
  $('#modal-add').modal('show');
</script>
@endif
@endsection
