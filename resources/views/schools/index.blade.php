@extends('layouts.app')

@section('content')




<h1 class="h1 mt-3 mb-3" style="margin-top: 15px;">Schools Home Page</h1>

<div class="container">
    <div class="row">
        <div class="col">
            <img src="/img/thinking.png" width="100%">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Most Canadian children attend school for more than six hours a day and get almost a half of their daily calories at school. Kids who eat healthy foods at school learn better and are readier to learn.</p>
            <p>Schools play an important role in shaping kids healthy habits. Healthy students are better learners. Research shows that nutrition affects student achievement. </p>
            <p>Domino's Lunch program helps schools to reduce paper work with ordering pizza and collecting money for it. You do not think about all details, we will do it for you.</p>
        </div>
    </div>
<!--<div class="md-marked">
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
</div>-->



<a type="button" class="button" href="/schools/menu">Show Menu</a>
<a type="button" class="button" href="/schools/reports">Reports</a>
<a type="button" class="button" href="/schools/events">Events</a>
<a type="button" class="button red" href="/registration">Sign Up</a>

</div>
@include('partials.subscribe')

@endsection