@extends('layouts.app')

@section('content')

<div class="text content pt-5">
    <h2 class="h2">CheckOut Page</h2>
    <div class="row">
        <strong>Event Name:</strong> {{ $data['event_name'] }}
    </div>
    <div class="row">
        <strong>School:</strong> {{ $data['school']->school_name }}
    </div>
    <div class="row">
        <strong>Student:</strong> {{ $data['student']->first_name . ' ' . $data['student']->last_name }}
    </div>
    <div class="row">
        <?php $mytime = Carbon\Carbon::now(); ?>
        <strong>Date: </strong>{{ $mytime->format('d-m-Y') }};
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Item ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody>
            
            <?php $cursor=0;  ?>

            @foreach ($data['order'] as $item)
            <tr>
                <td>
                    {{$item['iditem']}}
                </td>
                <td>
                    <?php if ($item['item_name']) :?>
                    {{$item['item_name']->item_name}}
                    <?php else :?>
                    Not available
                    <?php endif; ?>
                </td>
                <td><span class="price" id="price{{$item['iditem']}}">{{ number_format($item['final_price'],2) }}</span>
                </td>
                <td><span class="qty" id="qty{{$item['iditem']}}"
                        name="qty{{$item['iditem']}}">{{ $item['qty'] }}</span></td>
            </tr>
            <?php $cursor++; ?>
            @endforeach
            <tr>
                <td class="alignrigth" colspan="3">
                    Subtotal
                </td>
                <td><input type="text" readonly name="subtotal" id="subtotal"></td>
            </tr>
            <tr>
                <td class="alignrigth" colspan="3">
                    GST
                </td>
                <td><input type="text" readonly name="tcalculated_gst" id="tcalculated_gst"></td>
            </tr>
            <tr>
                <td class="alignrigth" colspan="3">
                    PST
                </td>
                <td><input type="text" readonly name="tcalculated_pst" id="tcalculated_pst"></td>
            </tr>
            <tr>
                <td class="alignrigth" colspan="3">
                    HST
                </td>
                <td><input type="text" readonly name="tcalculated_hst" id="tcalculated_hst"></td>
            </tr>
            <tr>
                <td class="alignrigth" colspan="3">
                    QST
                </td>
                <td><input type="text" readonly name="tcalculated_qst" id="tcalculated_qst"></td>
            </tr>
            <tr>
                <td class="alignrigth" colspan="3">
                    Total
                </td>
                <td><input type="text" readonly name="total" id="total"></td>
            </tr>
            <tr>
                <td class="alignleft" colspan="4">
                <?php $referer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);
	
                    if (!empty($referer)) {
                        
                        echo '<a class="button" href="'. $referer .'" title="Return to the previous page">Edit</a>';
                        
                    }

                    echo '<a class="button" href="/parents/order" title="Cancel Order"> Cancel</a>';


                ?>
                    <button class="button red" id="btn_pay" href="">CheckOut Now</button>
                </td>
            </tr>


        </tbody>
    </table>
    
    <div id="payment_gateway">
                    
        <div>
            <h2>Process Payment</h2>
        </div>
        <div>
            @include('partials.paypal')
        </div>
        
    </div>

</div>

<script>
$(document).ready(function() {
    $('#payment_gateway').css('display','none');

    calculateTotal();


    $('#btn_pay').on('click',function(e){
        e.preventDefault();

        $('#payment_gateway').toggle();
        window.location.hash = "#payment_gateway";


    });

});

function calculateTotal() {
    var subtotal = 0;
    var taxes = 0;
    var total = 0;

    var prices = $('.price').toArray();

    for (var i = 0; i < prices.length; i++) {

        var id_item = prices[i].getAttribute("id").substring(5);
        var price = prices[i].innerHTML;

        var qty_str = "qty";
        var str = qty_str.concat(id_item);

        var qty = document.getElementById(str).innerHTML;

        if (isNaN(qty)) {
            qty = 0;
        }

        subtotal = subtotal + (qty * price);

    }

    taxes = subtotal * 0.05;
    total = subtotal * 1.05;

    document.getElementById('subtotal').value = subtotal.toFixed(2);

    var gst = document.getElementById('calculated_gst').value * subtotal * 0.01;
    var pst = document.getElementById('calculated_pst').value * subtotal * 0.01;
    var hst = document.getElementById('calculated_hst').value * subtotal;
    var qst = document.getElementById('calculated_qst').value * subtotal;
    var total = subtotal + gst + pst + hst + qst;

    document.getElementById('subtotal').value = subtotal.toFixed(2);
    document.getElementById('tcalculated_gst').value = gst.toFixed(2);
    document.getElementById('tcalculated_pst').value = pst.toFixed(2);
    document.getElementById('tcalculated_hst').value = hst.toFixed(2);
    document.getElementById('tcalculated_qst').value = qst.toFixed(2);
    document.getElementById('total').value = total.toFixed(2);
    
    document.getElementById('total').value = total.toFixed(2);
    document.getElementById('paypal_total').value = subtotal.toFixed(2);
}
</script>


@endsection