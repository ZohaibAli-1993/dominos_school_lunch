@extends('layouts.app')

@section('content')   

<div id="edit">
<!-- Tabs Titles -->
    @include('partials.flash')
    <!-- Icon -->
    <div class="fadeIn first">
        <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
        <h2 class="my-5">Edit {{$school->school_name}} Profile</h2>
    </div>

    <!-- Login Form -->
    <form method="post" action="/schools/{{$school->idschool}}" novalidate="novalidate">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row">
                <div class="col">
                    <label for="address">School Name <span class="notice fadeIn third zero-raduis">(This field can not be changed)</span></label>
                    
                    <input type="text" id="edit_school_name" class="fadeIn third zero-raduis" name="school_name" placeholder="School Name" value="{{$school->school_name}}" readonly>
                    
                </div><!-- /col-->
            </div><!-- /row-->

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    
                    <label for="address">School Address</label>
                    <input type="text" id="edit_address" class="fadeIn third zero-raduis" name="address" placeholder="Address" value="{{old('address', $school->address)}}"> 
                    @if($errors->has('address'))
                        <div class="text-danger error">{{ $errors->first('address') }}</div>
                    @endif 
                </div><!-- /col-->

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="city">City</label>
                    <input type="text" id="edit_city" class="fadeIn third zero-raduis" name="city" placeholder="City" value="{{old('city', $school->city)}}">
                    @if($errors->has('city'))
                        <div class="text-danger error">{{ $errors->first('city') }}</div>
                    @endif 
                </div><!-- /col-->
            </div><!-- /row-->

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="province">Province</label>
                    <select id="edit_province" name="province" class="fadeIn third zero-raduis"> 
                        <option value="">Select a Province</option>
                        @foreach ($provinces as $key=>$value)
                            <option value="{{$key}}" {{($key == old('province', $school->province)) ? 'selected' : ''}}>{{$value}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('province'))
                    <span class="text-danger error">{{ $errors->first('province') }}</span>
                    @endif
                </div><!-- /col-->

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" id="edit_postal" class="fadeIn third zero-raduis" name="postal_code" placeholder="Postal Code" value="{{old('postal_code', $school->postal_code)}}">
                    @if($errors->has('postal_code'))
                        <div class="text-danger error">
                            {{ $errors->first('postal_code') }}
                        </div>
                    @endif 
                </div><!-- /col-->
            </div><!-- /row-->

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="idstore">Domino Store</label>
                    <select id="edit_store" name="idstore" class="fadeIn third zero-raduis"> 
                        <option value="">Select a Domino's store</option>
                        @foreach ($stores as $key=>$value)
                            <option value="{{$key}}" {{($key == old('idstore', $school->idstore)) ? 'selected' : ''}}>{{$value}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('idstore'))
                        <span class="text-danger error">{{ $errors->first('idstore') }}</span>
                    @endif
                </div><!-- /col-->

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="markup">Markup Price (in %)</label>
                    <input type="text" id="markup" class="fadeIn third zero-raduis" name="markup" placeholder="Markup Price" value="{{old('markup', $school->markup)}}">
                    @if($errors->has('markup'))
                        <div class="text-danger error">
                            {{ $errors->first('markup') }}
                        </div>
                    @endif 
                </div><!-- /col-->
            </div><!-- /row-->

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="coordinator_first_name">Coordinator First Name</label>
                    <input type="text" id="edit_first_name" class="fadeIn second zero-raduis" name="coordinator_first_name" placeholder="Representative First Name" value="{{old('coordinator_first_name', $school->coordinator_first_name)}}">
                    @if($errors->has('coordinator_first_name'))
                        <div class="text-danger error">{{ $errors->first('coordinator_first_name') }}</div>
                    @endif 
                </div><!-- /col-->

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="coordinator_last_name">Coordinator Last Name</label>
                    <input type="text" id="edit_last_name" class="fadeIn third zero-raduis" name="coordinator_last_name" placeholder="Representative Last Name" value="{{old('coordinator_last_name',$school->coordinator_last_name)}}">
                    @if($errors->has('coordinator_last_name'))
                        <div class="text-danger error">{{ $errors->first('coordinator_last_name') }}</div>
                    @endif
                </div><!-- /col-->
            </div><!-- /row-->

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="email">Contact Email</label>
                    <input type="email" id="edit_email" class="fadeIn third zero-raduis" name="email" placeholder="Email Address" value="{{old('email', $school->email)}}">  
                    @if($errors->has('email'))
                        <div class="text-danger error">{{ $errors->first('email') }}</div>
                    @endif 
                </div><!-- /col-->

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="edit_phone" class="fadeIn third zero-raduis" name="phone" placeholder="Phone" value="{{old('phone', $school->phone)}}">
                    @if($errors->has('phone'))
                        <div class="text-danger error">{{ $errors->first('phone') }}</div>
                    @endif
                </div><!-- /col-->
            </div><!-- /row-->
        </div><!-- /container-->
        

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
        <div class="container">
            <div class="row">
                <div class="col">
                    <input type="submit" id="edit_butt" class="fadeIn fourth zero-raduis" value="Save Changes">
                </div><!-- /col-->
            </div><!-- /row-->
        </div><!-- /container-->
        
    </form>

</div>


@endsection