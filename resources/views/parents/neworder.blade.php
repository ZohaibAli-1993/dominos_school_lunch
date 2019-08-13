@extends('layouts.app')

@section('content')

<div class="text content">
    <h2 class="h2">New Order</h2>
    <div class="row">
        <strong>Event Id:</strong> {{ $data['event']->idevent }}
    </div>
    <div class="row">
        <strong>School:</strong> {{ $data['school']->school_name }}
    </div>
    <div class="row">
        <strong>Student:</strong> {{ $data['student']->first_name . ' ' . $data['student']->last_name }}
    </div>
    <div class="row">

    <div class="col-xs-12 main-tab">
            <div class="tab-content py-3 px-3 px-sm-0">
                <?php $i=0; ?>    
                
                <?php $i++; ?>
                <div class="tab-pane fade show active">
                    <div class="table-responsive text-nowrap">
                        <form action="/parents/order/checkout" onsubmit="return validateForm()"  method="post">
                            @csrf
                            <input type="hidden" value="{{ $data['event']->idevent }}" name="idevent">
                            <input type="hidden" value="{{ $data['student']->idstudent }}" name="idstudent">
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
                                    <?php $cursor=0; ?>
                                    @foreach ($data['items'] as $item)
                                    <tr>
                                        <td>{{$item->iditem}}</td>
                                        <td>
                                            <?php if ($data['item_description'][$cursor]) :?>
                                                {{ $data['item_description'][$cursor]->item_name }}
                                            <?php else :?>
                                                Not available
                                            <?php endif; ?>
                                        </td>
                                        <td><span class="price" id="price{{$item->iditem}}">{{ number_format($item->final_price,2) }}</span></td>
                                        <td><input class="qty" id="qty{{$item->iditem}}" name="qty{{$item->iditem}}" type="number" min="0" step="1"></td>
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
                                            Tax(es)
                                        </td>
                                        <td><input type="text" readonly name="taxes" id="taxes"></td>
                                    </tr>
                                    <tr>
                                        <td class="alignrigth" colspan="3">
                                            Total
                                        </td>
                                        <td><input type="text" readonly name="total" id="total"></td>
                                    </tr>
                                    <tr>
                                        <td class="alignrigth" colspan="4">
                                            <button class="btn btn-danger" href="">Pay Now</button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </form>

                    </div>


                </div>


            </div>
            <div class="alignleft">
            
            </div>

        </div>        
        
    </div>
</div>


<script>

$(document).ready(function() {
    $('.qty').on('input propertychange',function(e){
        e.preventDefault();
        calculateTotal();
    });

});

function validateForm(){
        if(document.getElementById('total').value <= 0){
            alert('No items selected');
            return false;
        }
}

function calculateTotal(){
    var subtotal = 0;
    var taxes = 0;
    var total = 0;



    var prices = $('.price').toArray();
    
    for(var i=0; i< prices.length; i++){
        
        var id_item = prices[i].getAttribute("id").substring(5); 
        var price =  prices[i].innerHTML;

        var qty_str = "qty";
        var str = qty_str.concat(id_item);

        var qty = document.getElementById(str).value;
        
        if (isNaN(qty)){
            qty = 0;
        }
        
        subtotal = subtotal + (qty * price);
    }

    taxes = subtotal * 0.05;
    total = subtotal * 1.05;

    document.getElementById('subtotal').value = subtotal.toFixed(2);
    document.getElementById('taxes').value = taxes.toFixed(2);
    document.getElementById('total').value = total.toFixed(2);
}
</script>


@endsection