@extends('layouts.app')

@section('content')

<div class="text content">


	<!--background-image: url(pizza_parent_account111.jpg); background-repeat: no-repeat; width: 100%;-->
<h1>Welcome, {{$parentRegister->first_name}} {{$parentRegister->last_name}}</h1>
<div class="text content container">
<!--<img src="/img/pizza_parent_account111.jpg" width="100%">-->
	<div class="row">
		<div class="col">
			<div class="parent_account">
				<h2>Student List</h2>
				<table>
					<tr>
						<th>Student Name</th>
						<th>School Name</th>
						<th>Orders</th>
						<th>More Students</th>
					</tr>
					@foreach ($students as $student)
					<tr>
						<td>{{$student['first_name']}} {{$student['last_name']}}</td>
						<td>{{$school[$student['idschool']]}}</td>
						<td></td>
						<td>
							<a class="button show_form" href="">Add</a>
							<div id="add_form">
								<form action="" method="post" novalidate="novalidate">
									<input type="hidden" name="idschool" value="{{$student['idschool']}}">

									<input type="hidden" name="idparent" value="{{$parentRegister['idparent']}}">

									<input type="text" name="first_name" placeholder="First Name" >

									<input type="text" name="last_name" placeholder="Last Name">


									<button type="submit" class="button">Add</button>
								</form>
							</div>
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
    			<a class="button" href="/parents/{{$parentRegister->idparent}}/student/add">Add students</a>
    		</div>
		</div><!-- /col-->
	</div><!-- /row-->
</div><!-- /container-->


</div>

@endsection