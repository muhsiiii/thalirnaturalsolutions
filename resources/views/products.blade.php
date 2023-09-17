@extends('layouts.header')
@section('header')
@include('layouts.navbar')

<section class="section-content padding-y">
  <div class="container">

    <div class="row">
      <aside class="col-md-3"><br><br><br><br>

        <div class="card">

          <div>
            <header class="card-header" style="background-color:#DAD9D4;">
              <center>
                <h6>SEARCH FILTERS</h6>
              </center>
            </header>
          </div>

          <article class="filter-group" style="padding-bottom:0px; padding-left:15%; margin-top:12px;">
            <header class="card-header">
              <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                <i class="icon-control fa fa-chevron-down"></i>
                <h6 class="title">Select Your Choice</h6>
              </a>
            </header>
            <div class="filter-content collapse show" id="collapse_1" style="">
              <div class="card-body">
                <form>
                  <div class="input-group">
                    <input type="search" id="ajaxSearch" class="form-control" placeholder="Search Products Here...">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button" onclick="loadProducts(1);">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </article>

          <article class="filter-group" style="padding-bottom:0px; padding-left:15%; margin-top:12px;">
            <header class="card-header">
              <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="false" class="">
                <i class="icon-control fa fa-chevron-down"></i>
                <h6 class="title">All Categories</h6>
              </a>
            </header>
            <div class="filter-content collapse show" id="collapse_2" style="">
              <div class="card-body">
                @foreach($categories as $key => $value)
                <?php $cCount = App\Http\Controllers\AdminCategoryController::countProducts($value->id); ?>
                @if($cCount > 0)
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" name="cats[]" id="cats_{{ $value->id }}" chType="cats" class="custom-control-input cats" value="{{$value->id}}" onclick="loadProducts(1);" @if($value->id == $cat) checked="" @endif>
                  <div class="custom-control-label">{{$value->name}}
                    <b class="badge badge-pill badge-light float-right">{{$cCount}}</b>
                  </div>
                  <div class="sp" id="sp_{{ $value->id }}">
                    <?php $subCats = App\Http\Controllers\AdminCategoryController::getSubCats($value->id); ?>
                    @foreach($subCats as $skey => $svalue)
                      <?php
                        $count = App\Http\Controllers\AdminCategoryController::countSubCatProducts($svalue->id);
                      ?>
                      @if($count > 0)
                        <label for="subcats_{{$svalue->id}}" class="custom-control custom-checkbox">
                          <input type="checkbox" name="subcats[]" chType="subcats" id="subcats_{{$svalue->id}}"  @if($svalue->id == $subcat) checked="" @endif  onclick="loadProducts(1);" catval="{{$value->id}}" class="custom-control-input subcats" value="{{ $svalue->id }}">
                          <div class="custom-control-label">{{ $svalue->name }}
                            <b class="badge badge-pill badge-light float-right">{{ $count }}</b>
                          </div>
                        </label>
                      @endif
                    @endforeach
                  </div>
                </label>
                @endif
                @endforeach
              </div>
            </div>
          </article>

          <article class="filter-group"  style="padding-bottom:0px; padding-left:15%; margin-top:12px;">
            <header class="card-header">
              <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
                <i class="icon-control fa fa-chevron-down"></i  >
                <h6 class="title">Price range </h6>
              </a>
            </header>
            <div class="filter-content collapse show" id="collapse_3" style="">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input class="form-control" placeholder="Min-Amount" type="number" id="minAmount">
                  </div>
                  <div class="form-group text-right col-md-6">
                    <input class="form-control" placeholder="Max-Amount" type="number" id="maxAmount">
                  </div>
                </div>
                <button class="btn btn-block btn-primary" onclick="loadProducts(1);">Apply</button>
              </div>
            </div>
          </article>

        </div>
      </aside>

      <main class="col-md-9" id="shwProducts">
        <center style="padding:30px;">
          <div class="spinner-grow text-dark spinner-grow-sm"></div>&nbsp; <b>Loading...</b>
          <input type="hidden" id="selOrderBy" value="">
        </center>
      </main>

    </div>
  </div>
</section>

@include('layouts.footer')
@include('layouts.others')

<script type="text/javascript">

  $(document).ready(function() {
      loadProducts(1);
  });

  function loadProducts(page) {
    $('.sp').hide();

    var catids = [];
    var subcatids = [];

    $('input.cats:checkbox:checked').each(function() {
      catids.push($(this).val());
      $('#sp_'+$(this).val()).show();
    });
    $('input.subcats:checkbox:checked').each(function(e) {
      subcatids.push($(this).val());
    });

    orderby = $('#selOrderBy').val();

    $('#shwProducts').html('<center style="padding:30px;"><div class="spinner-grow text-dark spinner-grow-sm"></div>&nbsp; <b>Loading...</b></center>');

    $.ajax({
      type: "POST",
      url: "{{url('/ajax/get/products')}}",
      data: {
        _token: '{{ csrf_token() }}',
        search: $('#ajaxSearch').val(),
        catids: catids,
        subcatids: subcatids,
        min: $('#minAmount').val(),
        max: $('#maxAmount').val(),
        orderby: orderby,      
        page: page
      },
      success: function(resp) {
        $('#shwProducts').html(resp);
      }
    });

  }
</script>

@endsection
