@extends('layouts.app')

@section('content')

<div class="text content">

<h1 class="h1 mt-3">Gift Cards</h1>

<h3 class="h3 mt-3 mb-3">Domino's gift cards can be purchased at the following retail stores in Winnipeg</h3>

<div class="row">
	<div class="col-6">
    <img src="/img/gift_card.jpg" alt="gift card" width="100%" >
	</div>

	<div class="col-6">
    	<div class="row">
    		<div class="col-4 gift-img mb-5"">
    			<img src="/img/walmart.png" alt="walmart sign" width="100%">
    		</div>
    		<div class="col-4">
    			<img src="/img/giant_tiger.png" alt="giant tiger sign" width="100%">
    		</div>
    		<div class="col-4">
    			<img src="/img/pharmasave.png" alt="pharmasave sign" width="100%">
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-4 gift-img mb-5">
    			<img src="/img/petro_canada.png" alt="petro canada sign" width="100%">
    		</div>
    		<div class="col-4">
    			<img src="/img/husky.png" alt="husky sign" width="100%">
    		</div>
    		<div class="col-4">
    			<img src="/img/shell.png" alt="shell sign" width="100%">
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-4 gift-img mb-5">
    			<img src="/img/outfitters.png" alt="outfitters sign" width="100%">
    		</div>
    		<div class="col-4">
    			<img src="/img/toys.png" alt="toys sign" width="100%">
    		</div>
    		<div class="col-4 mb-10">
    			<img src="/img/money_mart.png" alt="money mart sign" width="100%">
    		</div>
    	</div>
    </div>
</div>


</div>

@include('partials.subscribe')

@endsection