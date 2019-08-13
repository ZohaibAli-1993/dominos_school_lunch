@extends('layouts.app')

@section('content')

<div class="text content">
    <h2 class="h2">Orders</h2>
    <div>
        <a class="btn btn-danger" href="">Upcoming Orders</a>
        <a class="btn btn-danger" href="">Previous Orders</a>
    </div>
    <div class="row">

        <div class="col-xs-12 main-tab">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <?php $i=0;?>
                @foreach($data['students'] as $student)
                    <?php $i++; ?>
                    <a class="nav-item nav-link <?= ($i==1 ? 'active' : '') ?>" id="nav-profile<?=$i?>-tab" data-toggle="tab" href="#nav-profile<?=$i?>" role="tab"
                        aria-controls="nav-profile<?=$i?>" aria-selected="<?= ($i==1 ? 'true' : 'false') ?>">{{ $student->first_name . ' ' . $student->last_name }}</a>
                @endforeach
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <?php $i=0; ?>    
                
                @foreach($data['all_events'] as $events_student)

                <?php $i++; ?>
                <div class="tab-pane fade  <?= ($i==1 ? 'show active' : ' ') ?>" id="nav-profile<?=$i?>" role="tabpanel" aria-labelledby="nav-profile<?=$i?>-tab">
                <strong>School:</strong>  {{ $data['schools_info'][$i-1]['school'] }} <br />
                    <strong>Classroom: </strong> {{ $data['schools_info'][$i-1]['classroom'] }}
                    <div class="table-responsive text-nowrap">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Event Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Order</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events_student as $event)
                                <tr>
                                    <td>{{ $event['idevent'] }}</td>
                                    <td> {{ $event['event_date'] }} </td>
                                    <td> {{ $event['status'] }} </td>
                                    <td> {{ $event['total_amount'] }} </td>
                                    <td> {{ $event['order'] }} </td>
                                    <td> 
                                        <?php if($event['action'] == 'show') : ?>
                                            Show Invoice
                                        <?php else: ?>
                                            <?php $order_button = "<a class='btn btn-danger' id='btn" . $event['idevent']  . "' href='/parents/order/neworder/" . $event['idevent'] . "/" . $event['idstudent'] . "'>Order</a>"; ?>
                                            <?= $order_button ?>
                                        <?php endif; ?>

                                        
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>


                </div>
                @endforeach


            </div>
            <div class="alignleft">
            
            </div>

        </div>
    </div>
</div>



@endsection