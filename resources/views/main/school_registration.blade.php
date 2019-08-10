@extends('layouts.app')

@section('content')   

<div id="registration">
<!-- Tabs Titles -->
    @include('partials.flash')
    <!-- Icon -->
    <div class="fadeIn first">
        <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
        <h2 class="h2"><strong>Registration</strong></h2> 
        <h4 class="h4">School Account</h4>
    </div>

    <!-- Login Form -->
    <form method="post" action="/school_registration" novalidate="novalidate">
        @csrf

        <input type="text" id="registration_school_name" class="fadeIn third zero-raduis" name="school_name" placeholder="School Name" value="{{old('school_name')}}">
        @if($errors->has('school_name'))
            <div class="text-danger error">{{ $errors->first('school_name') }}</div>
        @endif

        <input type="text" id="registration_address" class="fadeIn third zero-raduis" name="address" placeholder="Address" value="{{old('address')}}"> 
        @if($errors->has('address'))
            <div class="text-danger error">{{ $errors->first('address') }}</div>
        @endif 

        <input type="text" id="registration_city" class="fadeIn third zero-raduis" name="city" placeholder="City" value="{{old('city')}}">
        @if($errors->has('city'))
            <div class="text-danger error">{{ $errors->first('city') }}</div>
        @endif 

        <input type="text" id="registration_postal" class="fadeIn third zero-raduis" name="postal_code" placeholder="Postal Code" value="{{old('postal_code')}}">
        @if($errors->has('postal_code'))
            <div class="text-danger error">{{ $errors->first('postal_code') }}</div>
        @endif 

        <select id="province_list" name="province"> 
            <option value="">Select a Province</option>
            @foreach ($provinces as $key=>$value)
                <option value="{{$key}}" {{($key == old('province')) ? 'selected' : ''}}>{{$value}}</option>
            @endforeach
        </select>
        @if($errors->has('province'))
            <span class="text-danger error">{{ $errors->first('province') }}</span>
        @endif

        <select id="store_list" name="idstore"> 
            <option value="">Select a Domino's store</option>
            @foreach ($stores as $key=>$value)
                <option value="{{$key}}" {{($key == old('idstore')) ? 'selected' : ''}}>{{$value}}</option>
            @endforeach
        </select>
        @if($errors->has('idstore'))
            <span class="text-danger error">{{ $errors->first('idstore') }}</span>
        @endif

        <input type="text" id="coordinator_first_name" class="fadeIn second zero-raduis" name="coordinator_first_name" placeholder="Representative First Name" value="{{old('coordinator_first_name')}}">
        @if($errors->has('coordinator_first_name'))
            <div class="text-danger error">{{ $errors->first('coordinator_first_name') }}</div>
        @endif  

        <input type="text" id="coordinator_last_name" class="fadeIn third zero-raduis" name="coordinator_last_name" placeholder="Representative Last Name" value="{{old('coordinator_last_name')}}">
        @if($errors->has('coordinator_last_name'))
            <div class="text-danger error">{{ $errors->first('coordinator_last_name') }}</div>
        @endif 
        <input type="email" id="registration_email" class="fadeIn third zero-raduis" name="email" placeholder="Email Address" value="{{old('email')}}">  
        @if($errors->has('email'))
            <div class="text-danger error">{{ $errors->first('email') }}</div>
        @endif 

        <input type="tel" id="registration_phone" class="fadeIn third zero-raduis" name="phone" placeholder="Phone" value="{{old('phone')}}">
        @if($errors->has('phone'))
            <div class="text-danger error">{{ $errors->first('phone') }}</div>
        @endif 

        <input type="password" id="registration_password" class="fadeIn third zero-raduis password" name="password" placeholder="Password">
        @if($errors->has('password'))
            <div class="text-danger error">{{ $errors->first('password') }}</div>
        @endif 

        <input type="password" id="registration_verify_password" class="fadeIn third zero-raduis password" name="verify_password" placeholder="Verify Password"> 
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