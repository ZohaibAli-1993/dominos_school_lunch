<div class="subscription-layout">
	<div class="newsletter">
		<h4>Newsletter</h4>
		<p>Subscribe to get special offers, free giveaways, and one-in-a-lifetime deals.<br />
		We promise to send emails you with love.</p>
	</div>
   @include('partials.errors')
   <div class="form-group">
		<form id="join-form" action="/home" method="post">
			@csrf
	    		<input type="hidden"></input>
	        

			<input class="form-control col-lg-4" type="text" name="email" placeholder="Enter your email address" value="">
			<button class="btn btn-primary" >Join</button>

		</form>
	</div>
	@include('partials.flash')
</div><!-- end col-->

