@extends('layouts.app')

@section('content')   

<<<<<<< HEAD
<div id="parents_registration">
<!-- Tabs Titles -->

<!-- Icon -->
<div class="fadeIn first">
<!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
<h2 class="my-5"><strong>Registration</strong></h2> 
<h4>Parents Account</h4>
</div>

<!-- Login Form -->
    <form>
        @csrf 

        <input type="email" id="registration_first_name" class="fadeIn second zero-raduis" name="email" placeholder="First Name"> 

        <input type="text" id="registration_last_name" class="fadeIn third zero-raduis" name="login" placeholder="Last Name">  
        <br/>
        <input type="text" id="registration_email" class="fadeIn third zero-raduis" name="login" placeholder="Email Address">  

        <input type="text" id="registration_phone" class="fadeIn third zero-raduis" name="login" placeholder="Phone"> 
        <input type="text" id="registration_password" class="fadeIn third zero-raduis" name="login" placeholder="Password"> 
        <input type="text" id="registration_verify_password" class="fadeIn third zero-raduis" name="login" placeholder="Verify Password">  
        <!--**********Capcha**************-->
        <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">

            <label for="password" class="col-md-4 control-label">Captcha</label>


            <div class="col-md-12">footer

                <div class="captcha">

                <span>{!! captcha_img() !!}</span>

                <button type="button" class="btn btn-danger btn-refresh"><i class="fas fa-sync"></i></button>

                </div><!-- /capcha-->

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
=======
      <div id="parents_registration">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
          <h2 class="my-5"><strong>Registration</strong></h2> 
          <h4>Parents Account</h4>
        </div>

        <!-- Login Form -->
        <form>
            @csrf 

          <input type="email" id="registration_first_name" class="fadeIn second zero-raduis" name="email" placeholder="First Name"> 

          <input type="text" id="registration_last_name" class="fadeIn third zero-raduis" name="login" placeholder="Last Name">  
          <br/>
          <input type="text" id="registration_email" class="fadeIn third zero-raduis" name="login" placeholder="Email Address">  

          <input type="text" id="registration_phone" class="fadeIn third zero-raduis" name="login" placeholder="Phone"> 
          <input type="text" id="registration_password" class="fadeIn third zero-raduis" name="login" placeholder="Password"> 
          <input type="text" id="registration_verify_password" class="fadeIn third zero-raduis" name="login" placeholder="Verify Password">  
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
>>>>>>> 70e2ac7ce6896196327e298d6bc6cc168162f838
@endsection