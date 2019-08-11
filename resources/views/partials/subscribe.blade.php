<div class="container center-div" id="subscription-layout">
	
	<div class="row" id="newsletter">
		
		<div class="col">
			<h4 class="h4">Newsletter</h4>
			<p>Subscribe to get special offers, free giveaways, and one-in-a-lifetime deals.<br />
			We promise to send emails you with love.</p>
		</div>
	</div>
   @include('partials.errors')

    <div class="row" id="subscription-form">
   		<div class="col">
			<form id="join-form" action="/home" method="post">
				@csrf
    			<input type="hidden"></input>
       
				<input type="text" name="email" placeholder="Enter your email address" value="">
				<button id="join-btn">Join</button>

			</form>
		</div>
	</div>
	
	@include('partials.flash')
</div><!-- end container-->

