@extends('layouts.app')

@section('content')

<div class="text content">
    <h2>New Order</h2>
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
                                    <td>{{ $item->final_price }}</td>
                                    <td><input type="text" class="qty" name="qty{{$item->iditem}}"></td>
                                </tr>
                                <?php $cursor++; ?>
                                @endforeach

                                <tr>
                                    <td class="alignrigth" colspan="3">
                                        Subtotal
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="alignrigth" colspan="3">
                                        Tax(es)
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="alignrigth" colspan="3">
                                        Total
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="alignrigth" colspan="4">
                                        <a class="btn btn-danger" href="">Pay Now</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>


                </div>


            </div>
            <div class="alignleft">
            
            </div>

        </div>        
        
    </div>
</div>



@endsection