<form class="changePass" method="post" action=""> 
	@csrf
	@method('PUT')
  	<div class="form-group">
    	<label for="current_pass">Current Password</label>
    	<input type="password" class="form-control password" id="current_pass" name="current_pass" value="{{old('password')}}">
    	@if($errors->has('current_pass'))
    		<span class="text-danger error">{{ $errors->first('current_pass') }}</span>
		@endif
  	</div><!-- /form group-->

  	<div class="form-group">
    	<label for="password">New Password</label>
    	<input type="password" class="form-control password" id="pass" name="password" value="{{old('password')}}">
    	@if($errors->has('password'))
    		<span class="text-danger error">{{ $errors->first('password') }}</span>
		@endif
  	</div><!-- /form group-->

  	<div class="form-group">
    	<label for="new_pass">Confirm Password</label>
    	<input type="password" class="form-control password" id="new_pass" name="new_pass" value="{{old('new_pass')}}">
    	@if($errors->has('new_pass'))
    		<span class="text-danger error">{{ $errors->first('new_pass') }}</span>
		@endif
  	</div><!-- /form group-->

  	<button type="submit" class="button">Submit</button>
</form>