<section class="pay-area">
  @include('partials.errors')
  <div>
   <img height="60" src="/img/paypal.png">
   @if (session('error') || session('success'))
   <p class="{{ session('error') ? 'error':'success' }}">
    {{ session('error') ?? session('success') }}
   </p>
   @endif
   <!--<form method="POST" action="{{ route('create-payment') }}">-->
   <form method="POST" action="/parents/order/neworder/process">
    @csrf
    <input type="hidden" name="idevent" value="{{ $data['idevent'] }}">
    <input type="hidden" name="idstudent" value="{{ $data['student']->idstudent }}">
    <input type="hidden" name="idclassroom" value="{{ $data['student']->idclassroom }}">
    <input type="hidden" name="idschool" value="{{ $data['school']->idschool }}">
    <div class="m-2">
     <input type="text" name="amount" id="paypal_total" readonly placeholder="Amount">
     @if ($errors->has('amount'))
     <span class="error"> {{ $errors->first('amount') }} </span>
     @endif


     @foreach ($data['order'] as $item)
            <input type="hidden" name="item{{$item['iditem']}}" value="{{ $item['iditem'] }}">
            <input type="hidden" name="qty{{$item['iditem']}}" value="{{ $item['qty'] }}">
      @endforeach


    </div>
    <button>Pay Now</button>
   </form>
  </div>
 </section>