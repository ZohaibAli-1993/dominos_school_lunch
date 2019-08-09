@extends('layouts.app')

@section('content')

<h1>Edit Classrooms</h1>
   
<form action="/schools/classrooms" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="idclassroom" value="{{$classroom->idclassroom}}" />
    <p>
        Classroom: <input type="text" id="classroom" name="classroom" value="{{ old('classroom',$classroom->classroom) }}" />
    </p>
    <p>
        Description: <input type="text" id="description" name="description" value="{{ old('description',$classroom->description) }}"  />
    </p>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>



@endsection