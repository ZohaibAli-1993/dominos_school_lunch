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
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Student 1</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Student 2</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                        aria-controls="nav-contact" aria-selected="false">Student 3</a>
                    <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab"
                        aria-controls="nav-about" aria-selected="false">Student 4</a>
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    Student 2 Table
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    Student 3 Table
                </div>
                <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                    Student 4 Table
                </div>
            </div>
            <div class="alignleft">
            <a class="btn btn-danger " href="">Add New</a>
            </div>

        </div>
    </div>
</div>



@endsection