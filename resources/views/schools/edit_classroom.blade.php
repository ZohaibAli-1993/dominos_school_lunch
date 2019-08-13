@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="h1" style="text-align:left">Edit Classrooms</h1>
       
    <form action="/schools/classrooms" method="POST">

        @csrf
        @method('PUT')
        <input type="hidden" name="idclassroom" value="{{$classroom->idclassroom}}" />
        <p>
            <label for="classroom">Classroom</label>
            <input type="text" id="classroom" name="classroom" value="{{ old('classroom',$classroom->classroom) }}" />
        </p>
        <p>
            <label class="description">Description</label>
            <input type="text" id="description" name="description" value="{{ old('description',$classroom->description) }}"  />
        </p>
        <button type="submit" class="button">Save</button>
        <button class="button" onclick="history.go(-1)">Cancel</button>

    </form>

</div>



@endsection