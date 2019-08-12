@extends('layouts.app')

@section('links_events')
    <link rel="stylesheet" type="text/css" href="/css/admin_sidebar.css" />

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

@endsection

@section('content')

@if(Session::has('errors'))
	<script>

		// If there are errors, open modal form when the page load
		$(document).ready(function(){
			$("#ModalmenuitemForm").modal('show');
		});
	</script>
@else
	<script>
	    // If there aren't errors, hide modal form when the page load

	    $(document).ready(function(){
	        $("#ModalmenuitemForm").hide();
	    });

	    /*
	    * When modal is shown, fill fields value in the form
		*/
		$(function() {
		    $("#ModalmenuitemForm").on("shown.bs.modal", function (e) { 
			    $("#iditem").val($(e.relatedTarget).data('iditem'));
			    $("#item_name").val($(e.relatedTarget).data('item_name'));
			    $("#description").val($(e.relatedTarget).data('description'));
			    $("#price").val($(e.relatedTarget).data('price'));
			    $("#nutrition_facts").val($(e.relatedTarget).data('nutrition_facts'));
			    $("#idcategory").val($(e.relatedTarget).data('idcategory'));
			    $("#image").val($(e.relatedTarget).data('image'));
		    });
	    });	 

	</script>
@endif

    <div class="d-flex" id="wrapper">
        @include('admin.sidebar')

		<div class="container mb-3 mt-3 ml-0">

			<div class="col">

			    <h1 class="h1 text-left">Menu Items</h1>

				@include('partials.flash')
	
				<div class="card mt-5">
				  <div class="card-body">
				    <div id="table" class="table-editable">

				      <table class="table table-bordered table-responsive-md table-striped text-center">
				        <thead>
				          <tr scope="row">
				          	<th scope="col" class="text-center">Item Name</th>
				            <th scope="col" class="text-center">Description</th>
				            <th scope="col" class="text-center">Price</th>
				            <th scope="col" class="text-center">Nutrition Facts</th>
				            <th scope="col" class="text-center">Category</th>
				            <th scope="col" class="text-center">Image</th>
				            <th scope="col" class="text-center"></th>
				          </tr>
				        </thead>
				        <tbody>
				        	@foreach ($menuitems as $menuitem)
				            <tr scope="row">
	
					            <td>
					                {{ $menuitem->item_name }}
		    	                </td>
		    	                <td>
									{{ $menuitem->description }} 
		    	                </td>
		    	                <td>
									{{ $menuitem->price }}
		    	                </td>
		    	                <td>
		    	                	{{ $menuitem->nutrition_facts}}
		    	                </td>
		    	                <td>
									{{ $menuitem->idcategory }} 
		    	                </td>
		    	                <td>
									{{ $menuitem->image }}
		    	                </td>		    	                	

		    	                <td>
		    	                	<a
		    	                	class="button red"
		    	                	data-toggle="modal" 
		    	                	data-target="#ModalmenuitemForm" 
		    	                	data-title="Edit Menu Item"
		    	                	data-iditem="{{ $menuitem->iditem }}"
				                    data-item_name="{{ $menuitem->item_name }}"
				                    data-description="{{ $menuitem->description }}"
				                    data-price="{{ $menuitem->price }}"
				                    data-nutrition_facts="{{ $menuitem->nutrition_facts }}"
				                    data-idcategory="{{ $menuitem->idcategory }}"
				                    data-image="{{ $menuitem->image }}"
		    	                	id="edit">Edit</a>
		    	                </td>

				            </tr>
				            @endforeach
				         </tbody>
				      </table>
				    </div>
				  </div>
				</div>		

				<button type="button" class="button" 
				    data-toggle="modal" 
				    data-target="#ModalmenuitemForm"
				    data-title="Add menuitem"
				    data-iditem="new"
                    data-item_name=""
                    data-description=""
                    data-price=""
                    data-nutrition_facts=""
                    data-idcategory=""
                    data-image=""                
				    >
				    Add New menuitem
				</button>
			</div>

		</div>
    </div>
    <!-- /#page-content-wrapper -->


<!-- Modal HTML Markup -->
<div id="ModalmenuitemForm" class="modal fade"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="title" class="modal-title">Menu Item Details</h1>
                <button type="button" class="close" 
                        data-dismiss="modal">&times;</button>
            </div>

            @include('partials.errors')

            <div class="modal-body">
			    <form id="form" action="/dominos/menuitems" 
			          method="post" autocomplete="off">

			    	@csrf <!-- to create csrf token in the form -->

			    	@method('PUT')
		
			    	<input id="iditem" name="iditem" type="hidden" 
			    	value="{{ old('iditem') }}">

			        <div class ="form-group">
						<label for="item_name">Item Name</label>
						<input id="item_name" 
						       name="item_name"
						       type="text" 
						       class="form-control" 
						       value="{{ old('item_name') }}">
						@if($errors->has('item_name'))
					    <span class="error text-danger">{{ $errors->first('item_name') }}</span>
					    @endif					
					</div>

			        <div class ="form-group">
						<label for="description">Description</label>
						<input id="description" 
						       name="description"
						       type="text" 
						       class="form-control" 
						       value="{{ old('description') }}">
						@if($errors->has('description'))
					    <span class="error text-danger">{{ $errors->first('description') }}</span>
					    @endif					
					</div>		

			        <div class ="form-group">
						<label for="price">Price</label>
						<input id="price" 
						       name="price"
						       type="text" 
						       class="form-control" 
						       value="{{ old('price') }}">
						@if($errors->has('price'))
					    <span class="error text-danger">{{ $errors->first('price') }}</span>
					    @endif					
					</div>

			        <div class ="form-group">
						<label for="nutrition_facts">Nutrition Facts</label>
						<input id="nutrition_facts" 
						       name="nutrition_facts"
						       type="text" 
						       class="form-control" 
						       value="{{ old('nutrition_facts') }}">
						@if($errors->has('nutrition_facts'))
					    <span class="error text-danger">
					    	{{ $errors->first('nutrition_facts') }}</span>
					    @endif	
                    </div>	

			        <div class ="form-group">
						<label for="idcategory">Category</label>
						<input id="idcategory" 
						       name="idcategory"
						       type="text" 
						       class="form-control" 
						       value="{{ old('idcategory') }}">
						@if($errors->has('idcategory'))
					    <span class="error text-danger">
					    	{{ $errors->first('idcategory') }}</span>
					    @endif	
                    </div>	

			        <div class ="form-group">
						<label for="image">Image</label>
						<input id="image" 
						       name="image"
						       type="text" 
						       class="form-control" 
						       value="{{ old('image') }}">
						@if($errors->has('image'))
					    <span class="error text-danger">
					    	{{ $errors->first('image') }}</span>
					    @endif	
                    </div>	                                                       

					<div class="row mt-5">
						<button name="submit" 
						        type="submit" 
						        id="form-submit"
						        class="button mr-3 ml-3">Save</button>

						<a name="btn-cancel" 
						        id="btn-cancel"
						        class="button"
						        href="/dominos/menuitems">Cancel</a>


					</div>
					
				</form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

@endsection