@extends('layouts.header')
@section('header')
@include('layouts.navbar')

@include('layouts.sidebar')
@include('layouts.cart')
@include('layouts.login')

<!-- address bar  -->
<div class="container-main">
     <div class="row">
         <div class="col-lg-12">
             @foreach($addresses as $address)
             <div class="adresses adrssmoblebar">
                 <div class="leftadrss">
                    <input type="radio" id="{{$address->id}}" name="address" value="" onclick="setDefault({{$address->id}})"  @if(isset($address->default_address) && $address->default_address == '1') checked @endif />
                 </div>
                 <div class="cntr-adrss" style="padding-left: 0px !important;">
                    <label for="{{$address->id}}">
                     <h6>{{$address->name ?? ''}}</h6>
                     <h6>{{$address->phone ?? ''}}</h6>
                     <h6>{{$address->address ?? ''}} {{$address->landmark ?? ''}},{{$address->city ?? ''}}{{$address->district ?? ''}},{{$address->state ?? ''}} {{$address->pincode ?? ''}}</h6>
                     </label>
                 </div>
                 <div class="rgt-adrss">
                     <a class="editbtn" href="{{url('/address/'.$address->id)}}"><i style="vertical-align: bottom;" class="ri-pencil-line"></i> edit</a> <br>
                     <form action="{{url('/address/delete/'.$address->id)}}" method="GET" role="form" id="delform{{$address->id}}">
                     {!! csrf_field() !!}
                     <button class="dtlbtn"><i style="vertical-align: bottom;" class="ri-delete-bin-line"></i> Delete</button>
            </form>
                 </div>
             </div>
             @endforeach
             
             <div style="text-align:center;" class="adrees-list">
                 <a style="display: block;" class="adrss-new" href="{{url('/address/create')}}"><img src="./images/plus.png" alt=""> Add address</a>
             </div>
         </div>
         
     </div>
 </div>

@include('layouts.footer')
@include('layouts.others')
<script>
function setDefault( addressid)
{
  $('#loader').show();
  $.ajax({
    type: "POST",
    url:"{{ route('setDefaultAddress') }}",
    data: {
      _token: '{{ csrf_token() }}',
      addressid: addressid
    },
    success: function(resp){
      $('#loader').hide();
      window.location.reload();
      var obj = JSON.parse(resp);
      if(obj.sts == '01') {
        
      }
    }
  });
}
</script>
@endsection