@extends('layouts.app')

@section('content')

<div class="text content">
    <h2>CheckOut Page</h2>

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

                                    @foreach ($order as $item)
                                    <tr>
                                        <td>{{$item['iditem']}}</td>
                                        <td>
                                            <?php if ($item['item_name']) :?>
                                                {{$item['item_name']->item_name}}
                                            <?php else :?>
                                                Not available
                                            <?php endif; ?>
                                        </td>
                                        <td>{{ $item['final_price'] }}</td>
                                        <td>{{ $item['qty'] }}</td>
                                    </tr>
                                    <?php $cursor++; ?>
                                    @endforeach


                                </tbody>
                            </table>

</div>


@endsection