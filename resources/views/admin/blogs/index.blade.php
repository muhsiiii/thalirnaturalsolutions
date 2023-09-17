@extends('admin.layouts.header')

@section('adminheader')
<div class="wrapper">
  @include('admin.layouts.navbar')
  @include('admin.layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('admin.layouts.content-header')
    <div class="row m-20">
      <div class="col-sm-4">
        <input type="text" id="search" placeholder="Search Something Here..." value="{{ $search }}" class="form-control">
      </div>

      <div class="col-sm-1">
        <input type="button" id="searchBtn" class="btn btn-primary" value="Search">
      </div>
    </div>

    <div class="row m-20">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Blogs List</h3>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap table-bordered table-extra">
              <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Type</th>
                <th>Title</th>
                <th>Content</th>
                <th>Status/Actions</th>
              </tr>
              </thead>
              <tbody>
                @if(count($blogs) > 0)
                  @foreach($blogs as $key => $value)
                  <?php $no++; ?>
                  <tr>
                    <td align="center">{{$no}}</td>
                    <td align="center">
                    @if($value->image != '')
                    <img src="{{url($value->image)}}" class="img-thumbnail" style="max-height:80px; max-width: 80px;">
                    @endif
                    </td>
                    <td>{{$value->type}}</td>
                    <td>{{$value->title}}</td>
                    <td>{!! $settinvaluegs->content ?? '' !!}</td>
                    <td align="left">
                    <table class="table-borderless">
                      <tr>
                        <td>
                          <select id="status" class="form-control" onchange="setStatus(this.value, '{{$value->id}}')" style="max-width:120px; min-width:110px;">
                            <option value="Active" @if($value->status == 'Active') selected @endif >Active</option>
                            <option value="Inactive" @if($value->status == 'Inactive') selected @endif >Inactive</option>
                          </select>
                        </td>

                      </tr>
                      <tr>
                       
                        <td>
                          <a href="{{url('/admin/blogs/'.$value->id)}}" class="btn btn-warning" target="_blank" title="Edit Product" style="color: white; font-size:15px; font-weight: 600; margin:2px;">
                            <i class="fa fa-edit" style="font-size:16px"></i> Edit
                          </a>
                        </td>
                        <td style="padding:0px !important;">
                          <form action="{{url('/admin/blogs/delete/'.$value->id)}}" method="POST" role="form" id="delform{{$value->id}}">
                            {!! csrf_field() !!}
                            <button type="button" class="btn btn-danger" title="Delete Product" data-toggle="modal" data-target="#modal-delete" onclick="mkeDelModal('{{$value->id}}','{{$value->name}}');" style="color: white; font-size:15px; font-weight: 600; margin:2px;">
                              <i class="fa fa-trash" style="font-size:16px" aria-hidden="true"></i> Delete
                            </button>
                          </form>
                        </td>
                      </tr>
                    </table>
                  </td>
                  </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="6" align="center">No Results Found</td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix ">
            @if(count($blogs) > 0)
              {{$blogs->appends( array("q" => $search))->links()}}
            @endif
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- Add new Banner link -->
    <a href="{{url('/admin/blogs/create')}}" title="Add New Blog">
      <i class="fa fa-plus-circle fa-add-new" aria-hidden="true"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->



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
          <p>Do you want to Delete this Blog.</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" onclick="delBlog()">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <input type="hidden" id="delId">
  
  @include('admin.layouts.footer')
</div>
@include('admin.layouts.js')
@include('admin.layouts.messages')
<script>
  $('#searchBtn').click(function() {
    var url = '/admin/notifications?q=' + $('#search').val();
    window.location.href = url;
  });

  $(function () {
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });


  function validate() {
    var error = 0;
    if($('#heading').val() == '') {
      $('#heading').addClass('is-invalid');
      error = 1;
    } else {
      $('#heading').removeClass('is-invalid');
    }

    if($('#sub_heading').val() == '') {
      $('#sub_heading').addClass('is-invalid');
      error = 1;
    } else {
      $('#sub_heading').removeClass('is-invalid');
    }

    if(error == 0) {
      $('#addform').submit();
    }
  }

  function mkeDelModal(id, name) {
    $('#deltitle').html('Delete ' + name);
    $('#delId').val(id);
  }

  function delBlog() {
    $('#delform'+$('#delId').val()).submit();
  }

  function setStatus(status, id) {
    $.ajax({
      type: "GET",
      url: "{{url('/ajax/blog/status')}}",
      data : { status:status, id:id },
      success: function(data){
        var obj = JSON.parse(data);
        if(obj.sts == '01') {
          toastr.success ('Status Updated');
        } else {
          toastr.error ('Something Went Wrong!');
        }
      }
    });
  }
</script>

@endsection