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
			$("#ModalcategoryForm").modal('show');
		});
	</script>
@else
	<script>
	    // If there aren't errors, hide modal form when the page load

	    $(document).ready(function(){
	        $("#ModalcategoryForm").hide();
	    });

	    /*
	    * When modal is shown, fill fields value in the form
		*/
		$(function() {
		    $("#ModalcategoryForm").on("shown.bs.modal", function (e) { 
			    $("#idcategory").val($(e.relatedTarget).data('idcategory'));
			    $("#category").val($(e.relatedTarget).data('category'));
		    });
	    });	 

	</script>
@endif

    <div class="d-flex" id="wrapper">
        @include('admin.sidebar')

		<div class="container mb-3 mt-3 ml-0">

			<div class="col">

			    <h1 class="h1 text-left">Categories</h1>

				@include('partials.flash')
	
				<div class="card mt-5">
				  <div class="card-body">
				    <div id="table" class="table-editable">

				      <table class="table table-bordered table-responsive-md table-striped text-center">
				        <thead>
				          <tr scope="row">
				          	<th scope="col" class="text-center">Category</th>
				            <th scope="col" class="text-center"></th>
				          </tr>
				        </thead>
				        <tbody>
				        	@foreach ($categories as $category)
				            <tr scope="row">
	
					            <td>
					                {{ $category->category }}
		    	                </td>
		    	                <td>
		    	                	<a
		    	                	class="button"
		    	                	data-toggle="modal" 
		    	                	data-target="#ModalcategoryForm" 
		    	                	data-title="Edit category"
		    	                	data-idcategory="{{ $category->idcategory }}"
				                    data-category="{{ $category->category }}"       
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
				    data-target="#ModalcategoryForm"
				    data-title="Add Category"
				    data-idcategory="new"
                    data-category=""                 
				    >
				    Add New Category
				</button>
			</div>

		</div>
    </div>
    <!-- /#page-content-wrapper -->


<!-- Modal HTML Markup -->
<div id="ModalcategoryForm" class="modal fade"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 id="title" class="modal-title">Category Details</h1>
                <button type="button" class="close" 
                        data-dismiss="modal">&times;</button>
            </div>

            @include('partials.errors')

            <div class="modal-body">
			    <form id="form" action="/dominos/categories" 
			          method="post" autocomplete="off">

			    	@csrf <!-- to create csrf token in the form -->

			    	@method('PUT')
		
			    	<input id="idcategory" name="idcategory" type="hidden" 
			    	value="{{ old('idcategory') }}">

			        <div class ="form-group">
						<label for="category">Category</label>
						<input id="category" 
						       name="category"
						       type="text" 
						       class="form-control" 
						       value="{{ old('category') }}">
						@if($errors->has('category'))
					    <span class="error text-danger">{{ $errors->first('category') }}</span>
					    @endif					
					</div>

					<div class="row mt-5">
						<button category="submit" 
						        type="submit" 
						        id="form-submit"
						        class="button mr-3 ml-3">Save</button>

						<a category="btn-cancel" 
						        id="btn-cancel"
						        class="button"
						        href="/dominos/categories">Cancel</a>

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