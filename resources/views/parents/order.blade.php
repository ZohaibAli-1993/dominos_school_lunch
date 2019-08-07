@extends('layouts.app')

@section('content')

<div class="text content">
    <div>
        <a class="btn btn-danger" href="">Upcoming Orders</a>
        <a class="btn btn-danger" href="">Previous Orders</a>
    </div>
    <div class="row">

        <div class="col-xs-12 main-tab">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <?php $i=0;?>
                @foreach($students as $student)
                    <?php $i++; ?>
                    <a class="nav-item nav-link <?= ($i==1 ? 'active' : '') ?>" id="nav-profile<?=$i?>-tab" data-toggle="tab" href="#nav-profile<?=$i?>" role="tab"
                        aria-controls="nav-profile<?=$i?>" aria-selected="<?= ($i==1 ? 'true' : 'false') ?>">{{ $student->first_name . ' ' . $student->last_name }}</a>
                @endforeach
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <?php $i=0; ?>    
                
                @foreach($students as $student)

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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>08/20/2019</td>
                                    <td>Paid</td>
                                    <td>$ 20.00</td>
                                    <td>001</td>
                                    <td><a href="#">Download</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>08/20/2019</td>
                                    <td>Paid</td>
                                    <td>$ 20.00</td>
                                    <td>002</td>
                                    <td><a href="#">Download</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>08/20/2019</td>
                                    <td>Paid</td>
                                    <td>$ 20.00</td>
                                    <td>003</td>
                                    <td><a href="#">Download</a></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>


                </div>
                @endforeach


            </div>
            <div class="alignleft">
            <a class="btn btn-danger " href="">Add New</a>
            </div>

        </div>
    </div>
</div>



@endsection