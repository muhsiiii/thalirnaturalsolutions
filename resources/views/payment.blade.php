

<button id="rzp-button1" style="margin:1px; padding:1px; display: none;"></button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var options = {
    "key": "{{ env('razor_key') }}",
    "amount": "300",
    "currency": "INR",
    "name": "Thalir Natural Solutions",
    "description": "Payment for Order : {{$orderid}}",
    "image": "",
    "order_id": "{{$order_id}}",
    "handler": function (response){
      document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
      document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
      document.getElementById('razorpay_signature').value = response.razorpay_signature;
      document.getElementById('status').value = 'Success';
      document.getElementById('razorpay_submit').click();
    },
    "prefill": {
      "name": "{{$prefill['name']}}",
      "email": "{{$prefill['email']}}",
      "contact": "{{$prefill['contact']}}"
    },
    "notes": {
      "address": ""
    },
    "theme": {
      "color": "{{$theme['color']}}"
    }
  };
  var rzp1 = new Razorpay(options);
    rzp1.on('payment.failed', function (response){
    document.getElementById('reason').value = response.error.reason;
    document.getElementById('razorpay_payment_id').value = response.error.metadata.payment_id;
    document.getElementById('razorpay_order_id').value = response.error.metadata.order_id;
    document.getElementById('status').value = 'Failed';
    document.getElementById('razorpay_submit').click();
  });
  window.onload = function() {
    document.getElementById('rzp-button1').click();
  }
  document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
  }
</script>
<form method="POST" action="{{url('/payresult')}}" id="addForm">
  {!! csrf_field() !!}
  <input type="hidden" id="orderid" name="orderid" value="{{$orderid}}">
  <input type="hidden" id="razorpay_payment_id" name="razorpay_payment_id" value="">
  <input type="hidden" id="razorpay_order_id" name="razorpay_order_id" value="">
  <input type="hidden" id="razorpay_signature" name="razorpay_signature" value="">
  <input type="hidden" id="reason" name="reason" value="">
  <input type="hidden" id="status" name="status">
  <input style="width:1px; height:1px; display:none;" type="submit" id="razorpay_submit" value="">
</form>