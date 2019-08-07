@extends('layouts.app')

@section('content')


<h1>Schools Home Page</h1>

<div class="md-marked">
    <div class="mbsc-align-center">
        <div class="mbsc-note mbsc-note-primary">Use colored dots for important events. Display event description below.</div>
    </div>

    <div id="demo"></div>

    <ul class="md-marked-list mbsc-cloak">
        <li>
            <span class="md-marked-points md-points-type1"></span> Garbage collection
        </li>
        <li>
            <span class="md-marked-points md-points-type2"></span> Special events
        </li>
        <li>
            <span class="md-marked-points md-points-type3"></span> Town council meeting
        </li>
        <li>
            <span class="md-marked-points md-points-type4"></span> Town hall closed
        </li>
        <li>
            <span class="md-marked-points md-points-type5"></span> National holidays
        </li>
    </ul>
</div>

<a href="/schools/menu">Show Menu</a>

@endsection