@extends('layouts.app')

@section('content')

<div class="text content">

    <form class="form contact border border-light p-5" action="/contact"
          method="post" autocomplete="off">
        @csrf
        <h1 class="h1 mb-4 mt4">Contact us</h1>

        <h5 class="h5 mt-3">Please fill out the fields below and we will contact you shortly</h5>

        <!-- Name -->
        <div class ="form-group">
            <label for="name">Name</label>
            <input id="name" 
                   name="name"
                   type="text" 
                   class="form-control" 
                   value="{{ old('name') }}">
            @if($errors->has('name'))
            <span class="error text-danger">{{ $errors->first('name') }}</span>
            @endif                  
        </div>

        <!-- Email -->
        <div class ="form-group">
            <label for="email_">Email</label>
            <input id="email_" 
                   name="email"
                   type="text" 
                   class="form-control" 
                   value="{{ old('email') }}">
            @if($errors->has('email'))
            <span class="error text-danger">{{ $errors->first('email') }}</span>
            @endif                  
        </div>        

        <!-- Subject -->
        <div class ="form-group">
            <label for="subject">Subject</label>
            <input id="subject" 
                   name="subject"
                   type="text" 
                   class="form-control" 
                   value="{{ old('subject') }}">
            @if($errors->has('subject'))
            <span class="error text-danger">{{ $errors->first('subject') }}</span>
            @endif                  
        </div>

        <!-- Message -->
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control rounded-0" id="message" name="message" rows="3"></textarea>
            @if($errors->has('message'))
            <span class="error text-danger">{{ $errors->first('message') }}</span>
            @endif              
        </div>

        <!-- Copy -->
        <div class="custom-control custom-checkbox mb-4">
            <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy">
            <label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>
        </div>

        <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">

            <label for="password" class="col-md-4 control-label">Captcha</label>


            <div class="col-md-12">

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

        <!-- Send button -->
        <button class="button" type="submit">Send</button>

        <a class="button ml-3" href="/home">Cancel</a>

    </form>
    <!-- Default form contact -->
</div>

@endsection