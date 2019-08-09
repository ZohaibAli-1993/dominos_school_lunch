@extends('layouts.app')

@section('content')

<div class="text content">

<h1 class="h1">Gift Cards</h1>

<h3 class="h3">Domino's gift cards can be purchased at the following retail stores in Winnipeg</h3>

<div class="row">
	<div class="col-6">
    <img src="/img/gift_card.jpg" width="100%" >
	</div>

	<div class="col-6">
    	<div class="row">
    		<div class="col-4 gift-img mb-5"">
    			<img src="/img/walmart.png" width="100%">
    		</div>
    		<div class="col-4">
    			<img src="/img/giant_tiger.png" width="100%">
    		</div>
    		<div class="col-4">
    			<img src="/img/pharmasave.png" width="100%">
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-4 gift-img mb-5">
    			<img src="/img/petro_canada.png" width="100%">
    		</div>
    		<div class="col-4">
    			<img src="/img/husky.png" width="100%">
    		</div>
    		<div class="col-4">
    			<img src="/img/shell.png" width="100%">
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-4 gift-img mb-5">
    			<img src="/img/outfitters.png" width="100%">
    		</div>
    		<div class="col-4">
    			<img src="/img/toys.png" width="100%">
    		</div>
    		<div class="col-4 mb-10">
    			<img src="/img/money_mart.png" width="100%">
    		</div>
    	</div>
    </div>
</div>


</div>

@include('partials.subscribe')

@endsection