@extends('layouts.app')

@section('content')   

      <div id="parents_registration">
        <!-- Tabs Titles -->
@include('partials.flash')
        <!-- Icon -->
        <div class="fadeIn first">
          <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
          <h2 class="my-5"><strong>Registration</strong></h2> 
          <h4>Parents Account</h4>
        </div>

        <!-- Login Form -->
        <form action="/registration" method="post">
            @csrf 

          <input type="text" id="registration_first_name" class="fadeIn second zero-raduis" name="first_name" placeholder="First Name" value="{{old('coordinator_first_name')}}">  
           @if($errors->has('first_name'))
            <div class="text-danger error">{{ $errors->first('first_name') }}</div>
        @endif

          <input type="text" id="registration_last_name" class="fadeIn third zero-raduis" name="last_name" placeholder="Last Name">   
          @if($errors->has('last_name'))
            <div class="text-danger error">{{ $errors->first('last_name') }}</div>
        @endif
          <br/>
          <input type="text" id="registration_email" class="fadeIn third zero-raduis" name="email" placeholder="Email Address">   
          @if($errors->has('email'))
            <div class="text-danger error">{{ $errors->first('email') }}</div>
        @endif

          <input type="text" id="registration_phone" class="fadeIn third zero-raduis" name="phone" placeholder="Phone">  
        @if($errors->has('phone'))
            <div class="text-danger error">{{ $errors->first('phone') }}</div>
        @endif
          <input type="password" id="registration_password" class="fadeIn third zero-raduis" name="password" placeholder="Password">  
          @if($errors->has('password'))
            <div class="text-danger error">{{ $errors->first('password') }}</div>
        @endif
          <input type="password" id="registration_verify_password" class="fadeIn third zero-raduis" name="verify_password" placeholder="Verify Password">   
          @if($errors->has('verify_password'))
            <div class="text-danger error">{{ $errors->first('verify_password') }}</div>
        @endif
          <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">

                      <label for="password" class="col-md-4 control-label">Captcha</label>


                      <div class="col-md-12">footer

                          <div class="captcha">

                          <span>{!! captcha_img() !!}</span>

                          <button type="button" class="btn btn-danger btn-refresh"><i class="fas fa-sync"></i></button>

                          </div>

                          <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">


                          @if ($errors->has('captcha'))

                              <span class="help-block">

                                  <strong>{{ $errors->first('captcha') }}</strong>

                              </span>

                          @endif

                      </div>

                  </div>
         <input type="submit" id="register" class="fadeIn fourth zero-raduis" value="Register"> 


          
        </form>
        
        
      </div>
@endsection