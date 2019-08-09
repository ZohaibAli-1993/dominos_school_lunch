@extends('layouts.app')

@section('content')

<div class="text content">

	@include('partials.flash')
	<!--background-image: url(pizza_parent_account111.jpg); background-repeat: no-repeat; width: 100%;-->
	<h1>Welcome, {{$parentRegister->first_name}} {{$parentRegister->last_name}}</h1>
	<div class="text content container">
	<!--<img src="/img/pizza_parent_account111.jpg" width="100%">-->
		<div class="row">
			<div class="col">
				<div class="parent_account">
					<h2>Student List</h2>
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th>Student Name</th>
								<th>School Name</th>
								<th>Classroom</th>
								<th>Orders</th>
								<th>Edit/Delete Students</th>
							</tr>
						</thead>
						
						@foreach ($students as $student)
						<tr>
							<td>{{$student['first_name']}} {{$student['last_name']}}</td>
							<td>{{$school[$student['idschool']]}}</td>
							<td>{{$student['idclassroom']}}</td>
							<td></td>
							<td>
								<a class="btn btn-primary" href="/parents/{{$parentRegister->idparent}}/{{$student->idstudent}}/edit"><i class="fas fa-user-edit"></i></a>

								<a class="btn btn-danger" href=""><i class="fas fa-user-minus"></i></a>
							</td>
						</tr>
						@endforeach
					</table>
	    		</div><!-- /parents acc-->
			</div><!-- /col-->
		</div><!-- /row-->
		<div class="row">
			<div class="col12">
				<div class="parent_account">
	    			<a class="button" href="/parents/{{$parentRegister->idparent}}/student/add" id="show_token_form">Add students</a>
	    		</div>
			</div><!-- /col-->
		</div><!-- /row-->
	</div><!-- /container-->

	<div id="token_form">
		<form action="" method="post" novalidate="novalidate">
			@csrf
			<input type="hidden" name="idparent" value="{{$parentRegister->idparent}}">
			<label for="token">Please insert your school's token</label><br/>
			<input type="text" name="token" placeholder="token">
			<button type="submit">Submit</button>
		</form>
	</div>

</div>

@endsection