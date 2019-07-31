@extends('layouts.app')

@section('content')   

      <div id="registration">
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
         <select id="province_list"> 
              <option value="">Select a Province</option>
              <option value="Onatario">Onatario</option>
              <option value="Manitoba">Manitoba</option>
              <option value="King Edward Island">King Edward Island</option>
              <option value="Alberta">Alberta</option> 
              <option value="New Brunswick">New Brunswick</option> 
              <option value="Nova Scotia">Nova Scotia</option> 
              <option value="Qubec">Qubec</option>  
              <option value="Saskatchewan">Saskatchewan</option>  
              


         </select>
          <input type="text" id="registration_city" class="fadeIn third zero-raduis" name="login" placeholder="City"> 
          <input type="text" id="registration_school_name" class="fadeIn third zero-raduis" name="login" placeholder="School Name"> 
          <input type="text" id="registration_street" class="fadeIn third zero-raduis" name="login" placeholder="Street Address"> 
          <input type="text" id="registration_postal" class="fadeIn third zero-raduis" name="login" placeholder="Postal Code">
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