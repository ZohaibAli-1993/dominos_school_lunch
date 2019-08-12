@extends('layouts.app')

@section('links_events')
    <link rel="stylesheet" type="text/css" href="/css/admin_sidebar.css" />
@endsection

@section('content')

    <div class="d-flex" id="wrapper">
        @include('admin.sidebar')

		<div class="container mb-3 mt-3 ml-0">

			<div class="col">

			    <h1 class="h1 text-left"> Setup</h1>

				@include('partials.flash')
				@include('partials.errors')

			    <form id="form" action="/dominos/setup" 
			          method="post" autocomplete="off">


			    	@csrf <!-- to create csrf token in the form -->

			    	@method('PUT')

			    	<input id="idsetup" name="idsetup" type="hidden" value="1">

			        <div class ="form-group">
						<label for="store_max_events">Max Events by Store</label>
						<input id="store_max_events" 
						       name="store_max_events"
						       type="text" 
						       class="form-control col-lg-2" 
						       value="{{ old('store_max_events', $setup->store_max_events) }}">
						@if($errors->has('store_max_events'))
					    <span class="error text-danger">{{ $errors->first('store_max_events') }}</span>
					    @endif					
					</div>

			        <div class ="form-group">
						<label for="markup_default">Markup Default</label>
						<input id="markup_default" 
						       name="markup_default"
						       type="text" 
						       class="form-control col-lg-2" 
						       value="{{ old('markup_default', $setup->markup_default) }}">
						@if($errors->has('markup_default'))
					    <span class="error text-danger">{{ $errors->first('markup_default') }}</span>
					    @endif					
					</div>

			        <div class ="form-group">
						<label for="cutoff_days">Cutoff Days</label>
						<input id="cutoff_days" 
						       name="cutoff_days"
						       type="number" 
						       class="form-control col-lg-2" 
						       value="{{ old('cutoff_days', $setup->cutoff_days) }}">
						@if($errors->has('cutoff_days'))
					    <span class="error text-danger">{{ $errors->first('cutoff_days') }}</span>
					    @endif					
					</div>			

					<?php 
					    if(old('available_weekends', 
                                   $setup->available_weekends)==0){
                            $selec0 =  'selected';
                        } else 
                        { $selec0 =  '';}
					    if(old('available_weekends', 
                                   $setup->available_weekends)==1){
                            $selec1 =  'selected';
                        } else 
                        { $selec1 =  '';}                        
					?>

			        <div class ="form-group">
						<label for="available_weekends">Available on Weekends</label>
					    <select name="available_weekends" 
					            id="available_weekends"
					            class="form-control col-lg-2" >
                        <option value="0" 
                                {{ $selec0 }}
                                >No</option>
                        <option value="1"
                                {{ $selec1 }}
                                >Yes</option>
                    	</select>	
                    </div>	


					<div class="row mt-5">
						<button name="submit" 
						        type="submit" 
						        id="form-submit"
						        class="button mr-3 ml-3">Save</button>

						<a name="btn-cancel" 
						        id="btn-cancel"
						        class="button"
						        href="/dominos/setup">Cancel</a>


					</div>
					
				</form>

			</div>
		</div>

    </div>
    <!-- /#page-content-wrapper -->

@endsection