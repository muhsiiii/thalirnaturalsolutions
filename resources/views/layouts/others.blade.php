  <script type="text/javascript">
    $('#search').keyup(function() {
      if($('#search').val().length > 0) {
        $('#listSearch').removeClass('hide');
        $.ajax({
          type: "POST",
          url: "{{url('/ajax/search/products')}}",
          data: {
            _token: '{{ csrf_token() }}',
            search: $('#search').val()
          },
          success: function (result) {
            $('#listSearch').html(result);
          }
        });
      } else {
        $('#listSearch').addClass('hide');
      }
    });

    $('#searchMob').keyup(function() {
      if($('#searchMob').val().length > 0) {
        $('#listSearch2').removeClass('hide');
        $.ajax({
          type: "POST",
          url: "{{url('/ajax/search/products')}}",
          data: {
            _token: '{{ csrf_token() }}',
            search: $('#searchMob').val()
          },
          success: function (result) {
            $('#listSearch2').html(result);
          }
        });
      } else {
        $('#listSearch2').addClass('hide');
      }
    });

    function removeCart(cartid) {
      $.ajax({
        type: "GET",
        url: "{{url('/ajax/removecart')}}",
        data : { cartid:cartid },
        success: function(resp){
          var obj = JSON.parse(resp);
          if(obj.sts == '01') {
            toastr.success (obj.msg);
            getCart();
          } else {
            toastr.error ('Something Went Wrong!');
          }
        }
      });
    }

    function getCartCount() {
      $.ajax({
        type: "GET",
        url: "{{url('/ajax/getcartcount')}}",
        success: function(resp){
          $('#cartCount').html(resp);
        }
      });
    }

  function changeQuantity(uid, cid)
  {
    $.ajax({
      type: "GET",
      url: "{{url('/ajax/changequantity')}}",
      data : {
        cartid:cid,
        quantity:$('#myNumber'+cid).val(),
      },
      success: function(resp){
        var obj = JSON.parse(resp);
        if(obj.sts == '01') {
          toastr.success (obj.msg);
          getCart();
        }else if(obj.sts == '02'){
            toastr.error ('maximum limit 10 items!');
        }
        else  {
          toastr.error ('Something Went Wrong!');
        }
      }
    });
  }

  function directAddToCart(pid,pname,qty) {
    // if ($('#userid').val() > 0) {
      // if ($('#selSize').val() > 0) {

        // alert("askd");
        // return false;
        // alert(pid);
        // alert(pname);
        // alert(qty);
        // return false;

        $.ajax({
          type: "POST",
          url: "{{url('/ajax/addtocart')}}",
          data: {
            _token: '{{ csrf_token() }}',
            productid: pid,
            productname: pname,
            quantity: qty,
            unitid: 0
          },
          success: function(resp) {
            var obj = JSON.parse(resp);
            if (obj.sts == '01') {
              toastr.success(obj.msg);
              getCart();
            }
            else if(obj.sts == '02') {
              toastr.error('maximum limit 10 items!');
            }
             else {
              toastr.error('Something Went Wrong!');
            }
          }
        });
    //   } else {
    //     toastr.error('Please Select Product Size!');
    //   }
    // } else {
    //   toastr.error('Please Login to Add Product to Cart.');
    // }
  }

  function getCart()
  {
    $.ajax({
      type: "POST",
      url: "{{url('/ajax/getCart')}}",
      data: {
        _token: '{{ csrf_token() }}',
        search: $('#search').val()
      },
      success: function (result) {

        $.ajax({
                type: "POST",
                url: "{{url('/ajax/cartcount')}}",
                data: {
                  _token: '{{ csrf_token() }}',
                },
                success: function(count) {
                  $('#cartCounticon').html(count);
                }
              });

        $('#listCart').html(result);
      }
    });
  }

  function mySnack( type, msg)
{
    if(type == 'primary')
    {
        bgcolor='#008C16';
        textColor='#ffffff';
    }else   if(type == 'error')
    {
        bgcolor='#bf1212';
        textColor='#ffffff';
    }else   if(type == 'warning')
    {
        bgcolor='#FFFF00';
        textColor='#ffffff';
    }else   if(type =='success')
    {
        bgcolor='#008C16';
        textColor='#ffffff';
    }else
    {
        bgcolor='';
        textColor='';
    }
    Snackbar.show({text: msg, showAction: false, pos: 'top-right', textColor: textColor, backgroundColor: bgcolor});
}

</script>

@if(Session::has('success'))
  <script>
    toastr.success('{{Session::get('success')}}')
  </script>
@endif

@if(Session::has('error'))
  <script>
    toastr.error('{{Session::get('error')}}')
  </script>
@endif

@if(Session::has('warning'))
  <script>
    toastr.warning('{{Session::get('warning')}}')
  </script>
@endif


<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
