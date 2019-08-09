@extends('layouts.app')

@section('content')

<h1>Classrooms</h1>
   
<form id="classroom-list-layout">
    
    <legend class="classrooms-legend">List of classrooms</legend>

    <div id="classrooms-buttons">
        
        <a class="button" data-toggle="modal" data-target="#classroomListModal"><i class="fas fa-plus"></i>Add a Classroom</a>

        <a class="button"><i class="fas fa-file-upload"></i>Upload a file</a>

    </div>

    <table class="table table-striped table-hover classrooms-list">
        <thead>
            <tr>
                <th>Classroom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
                
        </thead>

        <tbody id="form-list-client-body">

        @foreach($classrooms as $result)
            
                <tr>
                    <td>{{$result->classroom}}</td>
                    <td>{{$result->description}}</td>
                    <td>
                       
                        <a href="/schools/classrooms/{{$result->idclassroom}}" class="button edit"><i class="far fa-edit"></i></a>

                        &nbsp;
                        &nbsp;

                        <form action="/schools/classrooms/{{$result->idclassroom}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button delete"><i class="fas fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
        
        @endforeach

        </tbody>

    </table>


</form>


<div class="modal fade" id="classroomListModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_heading">Add a new Classroom</h4>
      </div>
      <div class="modal-body">
        <form action="/schools/classrooms" method="POST">
            @csrf
            <p>
                Classroom: <input type="text" id="classroom" name="classroom" />
            </p>
            <p>
                Description: <input type="text" id="description" name="description" />
            </p>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


@endsection