<section class="pay-area">
  <div>
   <img height="60" src="/img/paypal.png">
   @if (session('error') || session('success'))
   <p class="{{ session('error') ? 'error':'success' }}">
    {{ session('error') ?? session('success') }}
   </p>
   @endif
   <form method="POST" action="{{ route('create-payment') }}">
    @csrf
    <div class="m-2">
     <input type="text" name="amount" id="paypal_total" readonly placeholder="Amount">
     @if ($errors->has('amount'))
     <span class="error"> {{ $errors->first('amount') }} </span>
     @endif
    </div>
    <button>Pay Now</button>
   </form>
  </div>
 </section>