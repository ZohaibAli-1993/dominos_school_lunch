@extends('layouts.app')

@section('content')

@include('partials.flash')

<div class="container">

    

    <h1 class="h1">Classroom List</h1>
   
    <form id="classroom-list-layout">
    
        <div id="classrooms-buttons">
            
            <p>
                <a class="button" data-toggle="modal" data-target="#classroomListModal">Add a Classroom</a>&nbsp; &nbsp;
       
                <a class="button" href="/schools/upload">Upload classrooms list</a>

            </p>

        </div>

        <table class="table table-bordered table-striped classrooms-list">
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
                           
                            <p>
                               <a href="/schools/classrooms/{{$result->idclassroom}}" class="button edit"><i class="far fa-edit"></i></a>
                            </p>

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
                    <label for="classroom">Classroom</label>
                    <input type="text" id="classroom" name="classroom" />
                </p>
                <p>
                    <label for="description">Description</label>
                    Description: <input type="text" id="description" name="description" />
                </p>
                <button type="submit" class="button">Save</button>
                <button type="button" class="button" data-dismiss="modal">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>

</div>


@endsection