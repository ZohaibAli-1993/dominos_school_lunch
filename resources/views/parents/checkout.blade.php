@extends('layouts.app')

@section('content')

<div class="text content">
    <h2 class="h2">CheckOut Page</h2>

    <div class="row">
        <?php $mytime = Carbon\Carbon::now(); ?>
        <strong>Date: </strong>{{ $mytime->format('d-m-Y') }};
    </div>

    

</div>


@endsection