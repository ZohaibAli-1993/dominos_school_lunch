@extends('layouts.app')

@section('content')

@include('partials.flash')

<div class="container">

    <h1 class="h1">Upload CSV file</h1>
   
    <form action="{{url('/schools/upload')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">

            <input type="file" name="upload-file" class="form-control" />

        </div>

        <input class="button" type="submit" value="Upload File" name="submit" />

    </form>

</div>


@endsection