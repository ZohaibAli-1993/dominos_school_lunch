@extends('layouts.app')

@section('content')
<script>
	$(document).ready(function(){

		$('#show_token_form').click(function(){
			$('#overlay_form').css('opacity', .5);
			$('#form_cover').animate({
				left: '30%'
			},500);
			$('#form_cover').css('display', 'block');
			$('#token_form').css('display', 'block');

		});//end set time out
		
		$('#close_box').click(function(){
			$('#overlay_form').fadeTo(400,0);
			$('#form_cover').fadeTo(400,0);
		});//end close_box
    })//end document ready
</script>
<div id="parents_page" >

	@include('partials.flash')
	<!--background-image: url(pizza_parent_account111.jpg); background-repeat: no-repeat; width: 100%;-->
	<h1>Welcome, {{$parentRegister->first_name}} {{$parentRegister->last_name}}</h1>
	<div class="container">
	<!--<img src="/img/pizza_parent_account111.jpg" width="100%">-->
		<div class="row">

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="parent_account card">
					<div class="card-header">
					    <h3>Contact Details</h3>
					</div><!-- /card header-->

					<div class="card-body">
						<ul id="parents_contact">
							<li>
								<i class="fas fa-envelope-open"></i> {{$parentRegister->email}}
							</li>

							<li>
								<i class="fas fa-phone-volume"></i> {{$parentRegister->phone}}
							</li>
						</ul>

						<div>
							<a class="button" href="/parents/{{$parentRegister->idparent}}/edit" title="Edit Profile">
			    				<i class="fas fa-address-card"></i> Edit Profile
			    			</a>

			    			<a class="button red" href="/parents/{{$parentRegister->idparent}}/changePass" title="Profile">
			    				<i class="fas fa-unlock-alt"></i> Change Password
			    			</a>
						</div>

					</div><!-- /card body-->
					
	    		</div><!-- /parents acc-->
			</div><!-- /col-->

			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="parent_account card">
					<div class="card-header">
						<h3>Student List</h3>
					</div>

					<div class="card-body">
						<table class="table table-striped">
							<thead >
								<tr>
									<th>Name</th>
									<th>School</th>
									<th id="classroom">Classroom</th>
									<th>Edit/Delete</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($students as $student)
								<tr>
									<td>{{$student['first_name']}} {{$student['last_name']}}</td>
									<td>{{$school[$student['idschool']]}}</td>
									<td>{{$student['idclassroom']}}</td>
									<td class="text-justify">
										<a href="/parents/{{$parentRegister->idparent}}/{{$student->idstudent}}/edit" title="Edit Student" class="edit_student"><i class="fas fa-user-edit"></i></a>

										<form action="/parents/{{$parentRegister->idparent}}/{{$student->idstudent}}" method="post" novalidate="novalidate" class="delete_student">
											@csrf
											@method('DELETE')
											<button type="submit">
												<i class="fas fa-user-minus"></i>
											</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="add_student">
							<a class="button" href="#" id="show_token_form" title="Add Student">
			    				<i class="fas fa-user-plus"></i> Add Student
			    			</a>

			    			<a class="button red" href="" title=" My Orders">
			    				<i class="fas fa-shopping-bag"></i> My Orders
			    			</a>
						</div><!-- /add student-->
					</div>
					
					
	    		</div><!-- /parents acc-->
			</div><!-- /col-->

			
		</div><!-- /row-->
	</div><!-- /container-->

	

	<div id="overlay_form"></div>
		<div id="form_cover">
			<div id="box">
				<div id="close_box">X</div>
				<div id="token_form">
					<form action="" method="post" novalidate="novalidate">
						@csrf
						<input type="hidden" name="idparent" value="{{$parentRegister->idparent}}">
						<label for="token">Please insert your school's token</label><br/>
						<input type="text" name="token" placeholder="token">
						<button type="submit" class="button">Submit</button>
					</form>
				</div>
			</div>
		</div><!-- /box cover-->
	</div>

	

@endsection