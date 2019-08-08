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
        
        
    </div>
</div>



@endsection