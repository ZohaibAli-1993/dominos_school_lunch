@extends('layouts.app')

@section('content')    

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <div id="loginformContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
          <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
          <h2 class="my-5">Sign In</h2>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <input type="email" id="email" class="fadeIn second zero-raduis" name="email" placeholder="email"> 
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <input type="password" id="password" class="fadeIn third zero-raduis" name="login" placeholder="password"> 
          @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
           @enderror
              <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
          </div>
          <input type="submit" class="fadeIn fourth zero-raduis" value="login">
          <h3>You don't have a account ?</h2>
          <input type="button" class="fadeIn fourth zero-raduis pc" value="register">
        </form>
        

      </div>
  </div>
     
      
    </div>
  </div>
</div> 

@endsection