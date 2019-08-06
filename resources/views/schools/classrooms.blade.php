@extends('layouts.app')

@section('content')

<h1>Classrooms</h1>

    
    <form id="form-list-client">
            <legend>List of classrooms</legend>
    
    <div class="pull-right">
        
        <a class="btn btn-default-btn-xs btn-success"><i class="fas fa-plus"></i>Add a Classroom</a>
        <a class="btn btn-default-btn-xs btn-success"><i class="fas fa-file-upload"></i>Upload a file/a>
    </div>

    @foreach($classrooms as $result)
    <table class="table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <td>Classroom</td>
                <th>Description</th>
                <th>Actions</th>
            </tr>
                
        </thead>
        <tbody id="form-list-client-body">
            <tr>
                <td>{{$result['classroom']}}</td>
                <td>{{$result['description']}}</td>
                <td>
                    
                    <a title="edit this classroom" class="btn btn-default btn-sm "> <i class="farfa-edit text-primary"></i> </a>

                    <a title="delete this classroom" class="btn btn-default btn-sm "> <i class="fas fa-trash text-danger"></i> </a>
                    
                </td>
            </tr>
        </tbody>
    </table>
    @endforeach

    </form>

    
</div>

	

@endsection