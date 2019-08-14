<section class="pay-area">
    @include('partials.errors')
    <div>
        <img height="60" src="/img/paypal.png">
        @if (session('error') || session('success'))
        <p class="{{ session('error') ? 'error':'success' }}">
            {{ session('error') ?? session('success') }}
        </p>
        @endif
        <!--<form method="POST" action="/parents/order/paypal">-->
        <form method="POST" action="/parents/order/neworder/process">
            @csrf
            <input type="hidden" name="idevent" value="{{ $data['idevent'] }}">
            <input type="hidden" name="idstudent" value="{{ $data['student']->idstudent }}">
            <input type="hidden" name="idclassroom" value="{{ $data['student']->idclassroom }}">
            <input type="hidden" name="idschool" value="{{ $data['school']->idschool }}">

            <input type="hidden" value="{{ $data['province']->gst_rate }}" name="calculated_gst" id="calculated_gst">
            <input type="hidden" value="{{ $data['province']->pst_rate }}" name="calculated_pst" id="calculated_pst">
            <input type="hidden" value="{{ $data['province']->hst_rate }}" name="calculated_hst" id="calculated_hst">
            <input type="hidden" value="{{ $data['province']->qst_rate }}" name="calculated_qst" id="calculated_qst">

            <div class="m-2">
                <input type="text" name="amount" id="paypal_total" readonly placeholder="Amount">
                @if ($errors->has('amount'))
                <span class="error"> {{ $errors->first('amount') }} </span>
                @endif


                @foreach ($data['order'] as $item)
                <input type="hidden" name="item[]" value="{{ $item['iditem'] }}">
                <input type="hidden" name="qty[]}}" value="{{ $item['qty'] }}">
                @endforeach


            </div>
            <button>Pay Now</button>
        </form>
    </div>
</section>