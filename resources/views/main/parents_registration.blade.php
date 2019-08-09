@extends('layouts.app')

@section('content')   

      <div id="parents_registration">
        <!-- Tabs Titles -->
@include('partials.flash')
        <!-- Icon -->
        <div class="fadeIn first">
          <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
          <h2 class="h2">Registration</h2> 
          <h4 class="h4">Parents Account</h4>
        </div>

        <!-- Login Form -->
        <form action="/registration" method="post">
            @csrf 

          <input type="text" id="registration_first_name"  name="first_name" placeholder="First Name" value="{{old('coordinator_first_name')}}">  
           @if($errors->has('first_name'))
            <div class="text-danger error">{{ $errors->first('first_name') }}</div>
        @endif

          <input type="text" id="registration_last_name"  name="last_name" placeholder="Last Name">   
          @if($errors->has('last_name'))
            <div class="text-danger error">{{ $errors->first('last_name') }}</div>
        @endif
          <br/>
          <input type="email" id="registration_email"  name="email" placeholder="Email Address">   
          @if($errors->has('email'))
            <div class="text-danger error">{{ $errors->first('email') }}</div>
        @endif

          <input type="text" id="registration_phone"  name="phone" placeholder="Phone">  
        @if($errors->has('phone'))
            <div class="text-danger error">{{ $errors->first('phone') }}</div>
        @endif
          <input type="password" id="registration_password"  name="password" placeholder="Password">  
          @if($errors->has('password'))
            <div class="text-danger error">{{ $errors->first('password') }}</div>
        @endif
          <input type="password" id="registration_verify_password"  name="verify_password" placeholder="Verify Password">   
          @if($errors->has('verify_password'))
            <div class="text-danger error">{{ $errors->first('verify_password') }}</div>
        @endif
          <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">

              <div class="col-md-6">

                  <div class="captcha">

                  <span>{!! captcha_img() !!}</span>

                  <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>

                  </div>

                  <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">


                  @if ($errors->has('captcha'))

                  <div class="text-danger error">{{ $errors->first('captcha') }}</div>
                  @endif

              </div>

          </div>

         <input type="submit" id="register"  value="Register"> 


          
        </form>
        

      </div>
@endsection