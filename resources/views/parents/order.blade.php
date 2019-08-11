@extends('layouts.app')

@section('content')

<script>

    $()

</script>

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
                        aria-controls="nav-profile<?=$i?>" aria-selected="<?= ($i==1 ? 'true' : 'false') ?>">{{ $student['first_name'] . ' ' . $student['last_name'] }}</a>
                @endforeach
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <?php $i=0; ?>    
                
                @foreach($data['students'] as $student)

                    <?php $i++; ?>
                <div class="tab-pane fade  <?= ($i==1 ? 'show active' : ' ') ?>" id="nav-profile<?=$i?>" role="tabpanel" aria-labelledby="nav-profile<?=$i?>-tab">
                <strong>School:</strong> <br />
                    <strong>Classroom:</strong>
                    <div class="table-responsive text-nowrap">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Event Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Order</th>
                                    <th scope="col">Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['all_events'][$i-1] as $event)
                                <?php $pendient = true; ?>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $event->event_time }}</td>
                                    <td>    
                                        <?php if($data['all_orders'][$i] != "") : ?>
                                            <?php if(count($data['all_orders'][$i])>0) :?>
                                                
                                                <?= (in_array($event->idevent,$data['all_orders'][$i]) ? 'Completed' : 'Pendient') ?>
                                                <?php if(in_array($event->idevent,$data['all_orders'][$i])){$pendient=false;} ?> 
                                            <?php else : ?>
                                                Pendient
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= ($pendient) ? 'Pendient' : '$ 20.00' ?></td>
                                    <td><?= ($pendient) ? 'Pendient' : 'order-id' ?></td>
                                    <td>
                                        <?php $order_button = "<a class='btn btn-danger' id='btn" . $event['idevent']  . "' href='/parents/order/neworder/" . $event['idevent'] . "/" . $student['idstudent'] . "'>Order</a>" ?>
                                        <?= ($pendient) ? $order_button : 'Pendient' ?>
                                        <!--<a href="#">Download</a>-->
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