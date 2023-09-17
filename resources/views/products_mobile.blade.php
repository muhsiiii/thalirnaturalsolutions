@extends('layouts.header')
@section('header')
@include('layouts.navbar')


<header class="header">
    <nav class="navbar">
      <button aria-label="Open Mobile Menu" class="open-mobile-menu">
        <i class="fas fa-filter"> <strong>&nbsp; Filter</strong></i>
      </button>

      <div class="top-menu-wrapper">
        <ul class="top-menu">
          <li class="mob-block" style="margin-left: 100%;">
            <button aria-label="Close Mobile Menu" class="close-mobile-menu">
              <i class="fas fa-times"></i>
            </button>
          </li>
          <aside class="col-md-3">

            <div class="card">
              <article class="filter-group">
                <header class="card-header" >
                  <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" style="width: 100%;">
                    <i class="icon-control fa fa-chevron-down"></i>
                    <h6 class="title">Select Your Choice</h6>
                  </a>
                </header>
                <div class="filter-content collapse show" id="collapse_1">
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

              <article class="filter-group" >
                <header class="card-header">
                  <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" style="width: 100%;">
                    <i class="icon-control fa fa-chevron-down"></i>
                    <h6 class="title"> Categories </h6>
                  </a>
                </header>
                <div class="filter-content collapse show" id="collapse_2" >
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
                            <?php $count = App\Http\Controllers\AdminCategoryController::countSubCatProducts($svalue->id); ?>@if($count > 0)
                            <label for="subcats_{{$svalue->id}}" class="custom-control custom-checkbox">
                            <input type="checkbox" name="subcats[]" chType="subcats" id="subcats_{{$svalue->id}}"  @if($svalue->id == $subcat) checked="" @endif  onclick="loadProducts(1);" catval="{{$value->id}}" class="custom-control-input subcats" value="{{ $svalue->id }}">
                            <div class="custom-control-label">{{ $svalue->name }}
                                <b class="badge badge-pill badge-light float-right">{{ $count }}</b>
                            </div>

                            </label> @endif
                            @endforeach
                        </div>
                        </label>
                        @endif
                    @endforeach

                  </div>
                </div>
              </article>

              <article class="filter-group " >
                <header class="card-header">
                  <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" style="width: 100%;">
                    <i class="icon-control fa fa-chevron-down"></i>
                    <h6 class="title">Price range </h6>
                  </a>
                </header>
                <div class="filter-content collapse show" id="collapse_3" >
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
        </ul>
      </div>
    </nav>
  </header>

  <main class="col-md-9" id="shwProducts">
    <center style="padding:30px;">
      <div class="spinner-grow text-dark spinner-grow-sm"></div>&nbsp; <b>Loading...</b>
      <input type="hidden" id="selOrderBy" value="">
    </center>
  </main>

@include('layouts.footer')
@include('layouts.others')
<style>
  *,*::before,*::after {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }
  body {
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    font-size: 1rem;
    line-height: 1.5;
    min-height: 100vh;
  }
  ul {
    list-style: none;
  }
  a {
    text-decoration: none;
    color: inherit;
  }
  img {
    display: block;
    max-width: 100%;
    height: auto;
  }
  a,button {
    cursor: default;
  }
  button {
    color: inherit;
    background: transparent;
    border: none;
    outline: none;
  }
  .no-transition {
    transition: none !important;
  }
  .header {
    position: relative;
    padding: 1rem 1.5rem;
    background: #ffffff;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.15), 0 2px 1px -5px rgba(0, 0, 0, 0.12), 0 1px 6px 0 rgba(0, 0, 0, 0.2);
  }
  .header .navbar {
    display: flex;
    flex-direction: row;
    flex: 1;
    flex-basis: auto;
    align-items: center;
    justify-content: space-between;
  }
  .header .navbar .top-menu-wrapper {
    color: #221f1f;
  }
  .header .navbar .top-menu-wrapper::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: -1;
    transition: background 0.5s;
  }
  .header .navbar .open-mobile-menu i {
    color: #221f1f;
  }
  .header .navbar .top-menu {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    z-index: 2;
    transform: translate3d(-100%, 0, 0);
    transition: transform 0.4s cubic-bezier(0.23, 1, 0.32, 1);
  }
  .header .navbar .top-menu {
    display: flex;
    flex-direction: column;
    width: 100%;
    overflow-y: auto;
    padding: 1.5rem 1.5rem;
    background: #ffffff;
  }
  .header .navbar .top-menu-wrapper.show-offcanvas::before {
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
  }
  .header .navbar .top-menu-wrapper.show-offcanvas .panel,
  .header .navbar .top-menu-wrapper.show-offcanvas .top-menu {
    transform: translate3d(0, 0, 0);
    transition-duration: 0.7s;
  }
  .header .navbar .top-menu-wrapper.show-offcanvas .top-menu {
    transition-delay: 0.2s;
  }
  .header .navbar ul a {
    display: inline-block;
    font-size: 1rem;
    font-weight: 600;
    text-transform: uppercase;
    transition: color 0.35s ease-out;
  }
  .header .navbar ul a:hover {
    color: #d93622;
  }
  .header .navbar .has-dropdown i {
    display: none;
  }
  .header .navbar .sub-menu {
    padding: 0.5rem 1.5rem 0 1.5rem;
  }
  .header .navbar .sub-menu a {
    text-transform: capitalize;
    font-size: 1rem;
    font-weight: 400;
    margin-top: 0rem;
  }
  .header .navbar .top-menu li + li {
    margin-top: 1.3rem;
  }
  .header .navbar .top-menu .mob-block {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
  }
  .header .navbar .top-menu .mob-block i {
    color: #221f1f;
  }
  .padding-10 {
    padding-top: 1%;
  }
</style>

<script>
  const pageHeader = document.querySelector(".header");
  const openMobMenu = document.querySelector(".open-mobile-menu");
  const closeMobMenu = document.querySelector(".close-mobile-menu");
  const topMenuWrapper = document.querySelector(".top-menu-wrapper");
  const isVisible = "is-visible";
  const showOffCanvas = "show-offcanvas";
  const noTransition = "no-transition";
  let resize;

  openMobMenu.addEventListener("click", () => {
    topMenuWrapper.classList.add(showOffCanvas);
  });

  closeMobMenu.addEventListener("click", () => {
    topMenuWrapper.classList.remove(showOffCanvas);
  });

  window.addEventListener("resize", () => {
    pageHeader.querySelectorAll("*").forEach(function(el) {
      el.classList.add(noTransition);
    });
    clearTimeout(resize);
    resize = setTimeout(resizingComplete, 500);
  });

  function resizingComplete() {
    pageHeader.querySelectorAll("*").forEach(function(el) {
      el.classList.remove(noTransition);
    });
  }

</script>

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
