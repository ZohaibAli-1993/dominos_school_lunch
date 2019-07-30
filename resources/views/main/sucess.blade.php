@extends('layouts.app')

@section('content')

<div class="success icon .text-danger">
    <i class="far fa-check-circle"></i>
    <h3>Thanks for your message!</h3>
    <h4>We will be in touch soon.</h4>
</div>


<div>

<input type="text" id="select_date" class="selecteShipDate" />

</div>

<script>
$(document).ready(function () {
    $input = $("#select_date");
    $input.datepicker({
        format: 'dd MM yyyy'
    });
    $input.data('datepicker').hide = function () {};
    $input.datepicker('show');
});
</script>
@endsection
