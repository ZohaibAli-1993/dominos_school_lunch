@extends('layouts.app')

@section('content')

<div class="text content">

    
    <!-- Material form contact -->
    <!-- Default form contact -->
    <form class="form contact text-center border border-light p-5" action="/contact" method="post">
        @csrf
        <p class="h4 mb-4">Contact us</p>

        <h5>Please fill out the fields below and we will contact you shortly</h5>

        <!-- Name -->
        <input type="text" id="name" name="name" class="form-control mb-4" placeholder="Name">

        <!-- Email -->
        <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail">

        <!-- Subject -->
        <input type="text" id="subject" name="subject" class="form-control mb-4" placeholder="Subject">

        <!-- Message -->
        <div class="form-group">
            <textarea class="form-control rounded-0" id="message" name="message" rows="3"
                placeholder="Message"></textarea>
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
        <button class="btn btn-danger btn-block" type="submit">Send</button>

    </form>
    <!-- Default form contact -->
</div>

@include('partials.subscribe')

@endsection