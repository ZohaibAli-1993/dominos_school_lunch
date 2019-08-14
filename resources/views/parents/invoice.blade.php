@extends('layouts.app')

@section('content')

<div class="text content pt-5">
<div class="row">
        <h2>Welcome {{ $data['name'] }}</h2>
    </div>
    <div class="row">
        <h3 class="h3">Invoice</h3>
    </div>    
    <div class="row">
        <strong>Event Id:</strong> {{ $data['event']->idevent }}
    </div>
    <div class="row">
        <strong>Student:</strong> {{ $data['student']->first_name . ' ' . $data['student']->last_name }}
    </div>
    <div class="row">
        <strong>Date:</strong> {{ $data['order']->created_at  }}
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
                                        <td><span class="price" id="price{{$item->iditem}}">{{ number_format($item->sub_total,0) }}</span></td>
                                        <td><span class="price" id="price{{$item->iditem}}">{{ number_format($item->quantity,0) }}</span></td>
                                    </tr>
                                    <?php $cursor++; ?>
                                    @endforeach

                                    <tr>
                                        <td class="alignrigth" colspan="3">
                                            Subtotal
                                        </td>
                                        <td>{{ number_format($data['order']->amount,2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="alignrigth" colspan="3">
                                            GST
                                        </td>
                                        <td>{{ number_format($data['order']->calculated_gst,2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="alignrigth" colspan="3">
                                            PST
                                        </td>
                                        <td>{{ number_format($data['order']->calculated_pst,2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="alignrigth" colspan="3">
                                            HST
                                        </td>
                                        <td>{{ number_format($data['order']->calculated_hst,2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="alignrigth" colspan="3">
                                            QST
                                        </td>
                                        <td>{{ number_format($data['order']->calculated_qst,2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="alignrigth" colspan="3">
                                            Total
                                        </td>
                                        <td>{{ number_format($data['order']->total_amount,2) }}</td>
                                    </tr>

                                    <tr>
                                        <td class="left" colspan="4">
                                            <a href="/parents/order" class="button" href="">Back</a>
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



@endsection