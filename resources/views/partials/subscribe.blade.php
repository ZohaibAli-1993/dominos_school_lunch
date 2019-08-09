<div class="subscription-layout">
	<div class="newsletter">
		<h4>Newsletter</h4>
		<p>Subscribe to get special offers, free giveaways, and one-in-a-lifetime deals.<br />
		We promise to send emails you with love.</p>
	</div>
   @include('partials.errors')
	<form id="join-form" action="/home" method="post">
		@csrf
    		<input type="hidden"></input>
        

		<input type="text" name="email" placeholder="Enter your email address" value="">
		<button id="join-btn" >Join</button>

	</form>
	
	@include('partials.flash')
</div><!-- end col-->

