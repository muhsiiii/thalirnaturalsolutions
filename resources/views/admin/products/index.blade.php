@extends('admin.layouts.header')

@section('adminheader')
<div class="wrapper">
  @include('admin.layouts.navbar')
  @include('admin.layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('admin.layouts.content-header')
    <div class="row m-10">

      <div class="col-sm-3 mb-10">
        <select class="form-control" style="width: 100%;" name="scategory" id="scategory" style="width: 100%;">
          <option value="All">Select Category</option>
          @if($category)
           @foreach($category as $id => $name)
          <option value="{{$id}}" @if($scategory==$id) selected @endif>{{$name}}</option>
           @endforeach
          @endif
        </select>
      </div>

      <div class="col-sm-3 mb-10">
        <select id="status" class="form-control select2bs4" style="width:100%;">
          <option value="All">Select Status</option>
          <option value="Available" @if($status=='Available' ) selected @endif>Available</option>
          <option value="Not Available" @if($status=='Not Available' ) selected @endif>Not Available</option>
        </select>
      </div>

      <div class="col-sm-3 mb-10">
        <input type="text" class="form-control" id="search" placeholder="Search Something Here..." value="{{ $search }}">
      </div>

      <div class="col-sm-1 mb-10">
        <select id="slimit" class="form-control" style="width: 100%;">
          <option value="10" @if($slimit=='10' ) selected @endif>10</option>
          <option value="25" @if($slimit=='25' ) selected @endif>25</option>
          <option value="50" @if($slimit=='50' ) selected @endif>50</option>
          <option value="100" @if($slimit=='100' ) selected @endif>100</option>
        </select>
      </div>

      <div class="col-sm-1 mb-10">
        <input type="button" id="searchBtn" class="btn btn-primary" value="Search">
      </div>
    </div>

    <div class="row m-10">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Product List</h3>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap table-bordered table-extra" id="rtable" style="font-size: 15px !important;">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Product Details</th>
                  <th>Other Details</th>
                  <th>Descripton</th>
                  <!-- <th>Units Details</th> -->
                  <th>Status/Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(count($products) > 0)
                @foreach($products as $key => $value)
                <tr>
                  <td align="center">{{$value->id}}</td>
                  <td align="center">
                    @if($value->image != '')
                    <img src="{{url($value->image)}}" class="img-thumbnail" style="max-height:80px; max-width: 80px;">
                    @endif
                  </td>
                  <td style="white-space: normal !important;word-break: break-all !important; max-width: 220px; min-width: 140px;">
                    <b>{{$value->name}}</b>
                  </td>
                  <td>
                    Category: <b>@if(isset($category[$value->cat_id])){{$category[$value->cat_id]}}@endif</b><br>
                    Sub-Category: <b>@if(isset($subCategory[$value->subcat_id])){{$subCategory[$value->subcat_id]}}@endif</b><br>
                    Price: <b>{{$value->price}}</b><br>
                    Offer price: <b>{{$value->offerprice}}</b>
                  </td>
                  <td>
                    Stock Avalible: <b>
                      @if($value->stock_avalible > 3)
                      <span class="text-success">{{$value->stock_avalible}}</span>
                      @else
                      <span class="text-danger">{{$value->stock_avalible}}</span>
                      @endif
                    </b><br>
                    Best Seller: <b>@if($value->best_seller == '1') Yes @else No @endif</b><br>
                    Featured: <b>@if($value->featured == '1') Yes @else No @endif</b><br>
                    Trending: <b>@if($value->trending == '1') Yes @else No @endif</b><br>
                  </td>
                  <td style="white-space: normal !important;word-break: break-all !important; max-width: 220px; min-width: 140px;">
                    <?php if (strlen($value->desc) > 150) {
                      echo substr($value->desc, 0, 150) . '...';
                    } else {
                      echo $value->desc;
                    } ?>
                  </td>

                  <td align="left" style="max-width: 320px; min-width:300px;">
                    <div class="row">
                      <div class="col-4">
                        <select id="status" class="form-control" onchange="setStatus(this.value, '{{$value->id}}')" style="">
                          <option value="Available" @if($value->status == 'Available') selected @endif >Available</option>
                          <option value="Not Available" @if($value->status == 'Not Available') selected @endif >Not Available</option>
                        </select>
                      </div>
                      <div class="col-4">
                        <a href="{{url('/admin/products/ingredients/'.$value->id)}}" target="_blank" class="btn btn-primary btn-block"" title="Add Ingredients" style="color: white; font-size:15px; font-weight: 600; margin:2px;">
                          <i class="fa fa-plus-square" style="font-size:16px"></i> Ingredients
                        </a>
                      </div>
                      <div class="col-4">
                        <a href="{{url('/admin/products/benefits/'.$value->id)}}" target="_blank" class="btn btn-primary btn-block"" title="Add Benefits" style="color: white; font-size:15px; font-weight: 600; margin:2px;">
                          <i class="fa fa-plus-square" style="font-size:16px"></i> Benefits
                        </a>
                      </div>
                      <div class="col-4">
                        <button type="button" class="btn btn-info btn-block" title="Add Stock" data-toggle="modal" data-target="#modal-stock" onclick="$('#productid').val({{$value->id}});" style="color: white; font-size:15px; font-weight: 600; margin:2px;">
                          <i class="fa fa-layer-group" style="font-size:16px"></i> Mng Stocks
                        </button>
                      </div>
                      <div class="col-4">
                        <a href="{{url('/admin/products/'.$value->id)}}" class="btn btn-warning btn-block" target="_blank" title="Edit Product" style="color: white; font-size:15px; font-weight: 600; margin:2px;">
                          <i class="fa fa-edit" style="font-size:16px"></i> Edit
                        </a>
                      </div>
                      <div class="col-4">
                        <form action="{{url('/admin/products/delete/'.$value->id)}}" method="POST" role="form" id="delform{{$value->id}}">
                          {!! csrf_field() !!}
                          <button type="button" class="btn btn-danger btn-block"" title="Delete Product" data-toggle="modal" data-target="#modal-delete" style="color: white; font-size:15px; font-weight: 600; margin:2px;"  onclick="mkeProductDelteForm('{{$value->id}}')">
                            <i class="fa fa-trash" style="font-size:16px" aria-hidden="true"></i> Delete
                          </button>
                        </form>
                      </div>
                      <div class="col-4">
                        <a href="{{url('/admin/products/reviews/'.$value->id)}}" target="_blank" class="btn btn-primary btn-block"" title="Add Reviews" style="color: white; font-size:15px; font-weight: 600; margin:2px;">
                          <i class="fa fa-star" style="font-size:16px"></i> Reviews
                        </a>
                      </div>
                      <div class="col-4">
                        <a href="{{url('/admin/products/howtouse/'.$value->id)}}" target="_blank" class="btn btn-primary btn-block" title="Add Reviews" style="color: white; font-size:15px; font-weight: 600; margin:2px;">
                          <i class="fa fa-sign-language" style="font-size:16px"></i> How To Use
                        </a>
                      </div>
                      <div class="col-4">
                        <a href="{{url('/admin/products/faqs/'.$value->id)}}" target="_blank" class="btn btn-primary btn-block" title="Add Reviews" style="color: white; font-size:15px; font-weight: 600;  margin:2px;">
                          <i class="fa fa-question"" style="font-size:16px"></i> Faqs
                        </a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="11" align="center">No Results Found!</td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            @if(count($products) > 0)
            {{$products->appends(['s' => $status, 'q' => $search, 'slimit' => $slimit, 'scategory' => $scategory])->links('pagination::bootstrap-4')}}
            @endif
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- Add new user link -->
    <a href="{{url('/admin/products/create')}}" title="Add New Products">
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
          <p>Do you Really Want to delete this Product.</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" onclick="delForm()">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-stock">
    <form action="{{url('/admin/products/stock')}}" method="POST">
      @csrf
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="deltitle">Manage Stock for Product</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="productid" name="productid" value="0">

            <div class="form-group row">
           <label for="type" class="col-sm-4 col-form-label text-right">Add/Substract:</label>
              <div class="col-sm-6">
                <select class="form-control" style="width: 100%;" name="type" id="type">
                  <option value="Add" selected>Add Stock</option>
                  <option value="Sub">Minus Stock</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
            <label for="stock_avalible" class="col-sm-4 col-form-label text-right">Add Stock:</label>

              <div class="col-sm-6">
                <input type="number" name="stock_avalible" value="1" class="form-control" placeholder="Enter Stock Number" required min="0">

              </div>
            </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Add Stock</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <input type="hidden" id="delId">
</div>
@include('admin.layouts.footer')
@include('admin.layouts.js')
@include('admin.layouts.messages')
<style>
  .col-sm-3 {
    padding-right: 5px;
    padding-left: 5px;
  }

  .btn-group-sm>.btn,
  .btn-sm {
    padding: .125rem .4rem;
  }
</style>
<script type="text/javascript">
  $('#scategory').select2({
    theme: 'bootstrap4',
    placeholder: "Select Category"
  });

  function setStatus(status, id) {
    $.ajax({
      type: "GET",
      url: "{{url('/ajax/product/status')}}",
      data: {
        status: status,
        id: id
      },
      success: function(data) {
        var obj = JSON.parse(data);
        if (obj.sts == '01') {
          toastr.success('Status Updated');
        } else {
          toastr.error('Something Went Wrong!');
        }
      }
    });
  }

  $('#searchBtn').click(function() {
    var url = '{{(' / admin / products ')}}?s=' + $('#status').val() + '&q=' + $('#search').val() + '&slimit=' + $('#slimit').val() + '&scategory=' + $('#scategory').val();
    window.location.href = url;
  });

  $(function() {
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });


  $('#addChangeBtn').click(function() {
    var error = 0
    if ($('#nuser_id').val() == '' || $('#nuser_id').val() == undefined) {
      $('#nuser_id').addClass('is-invalid');
      error = 1;
    } else {
      $('#nuser_id').removeClass('is-invalid');
    }

    if ($('#npassword').val() == '' || $('#npassword').val() == '0') {
      $('#npassword').addClass('is-invalid');
      error = 1;
    } else {
      $('#npassword').removeClass('is-invalid');
    }

    if (error == 0) {
      $('#addChangeForm').submit();
    }
  });

  function mkeDelModal(id, name) {
    $('#deltitle').html('Delete ' + name);
    $('#delId').val(id);
  }

  function delForm() {
    console.log("here");
    $('#delform' + $('#delId').val()).submit();
  }

  function mkeProductDelteForm(productid) {
    $('#delId').val(productid);
  }
</script>
@endsection