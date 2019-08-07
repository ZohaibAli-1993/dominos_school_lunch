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
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Student - {{ $i }}</a>
                @endforeach
                </div>
            </nav>
            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                <?php $i=0; reset($students);  ?>    
                
                @foreach($students as $student)
                    <?php $i++; ?>
                <div class="tab-pane fade" id="nav-profile <?= $i ?>" role="tabpanel" aria-labelledby="nav-profile-tab">
                    Student <?= $i ?>
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