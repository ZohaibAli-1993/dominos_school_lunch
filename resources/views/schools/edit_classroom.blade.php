@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="h1">Edit Classrooms</h1>
       
    <form id="form" action="/schools/{{$school->idschool}}/classrooms" method="POST">

        @csrf
        @method('PUT')
        <input type="hidden" name="idclassroom" value="{{$classroom->idclassroom}}" />

        <div class ="form-group">
            <p>
                <label for="classroom">Classroom</label>
                <input type="text" class="form-control" id="classroom" name="classroom" value="{{ old('classroom',$classroom->classroom) }}" />
            </p>
        </div>

        <div class ="form-group">
            <p>
                <label class="description">Description</label>
                <input type="text" id="description" class="form-control" name="description" value="{{ old('description',$classroom->description) }}"  />
            </p>
        </div>

        <div class="row mt-5">
            <button type="submit" class="button mr-3 ml-3">Save</button>
            <button class="button" onclick="history.go(-1)">Cancel</button>
        </div>

    </form>

</div>



@endsection