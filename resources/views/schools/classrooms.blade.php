@extends('layouts.app')

@section('content')


@include('partials.flash')

<div class="container pt-5">
    <h1 class="h1">{{$school->school_name}} </h1>
    <h2 class="h2 mb-3">Classroom List</h2>

    <form id="classroom-list-layout">
    
        <div id="classrooms-buttons">
            <p>

                <a href="" class="button" data-toggle="modal" data-target="#classroomListModal">Add a Classroom</a>&nbsp; &nbsp;
       
                <a class="button mr-2" href="/schools/{{$school->idschool}}/upload">Upload Classrooms List</a>

                <a class="button red" href="/schools/{{$school->idschool}}/event">New Lunch Event</a>
            </p>

        </div>

        <table class="table table-bordered table-responsive-md table-striped text-center">
            <thead>
                <tr scope="row">
                    <th scope="col">Classroom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
                    
            </thead>

            <tbody id="form-list-client-body">

            @foreach($classrooms as $result)
                
                    <tr scope="row">
                        <td>{{$result->classroom}}</td>
                        <td>{{$result->description}}</td>
                        <td style="width:200px">
                           
                           <div class="row">
                                <div class="col-lg-6">
                                       <a 
                                        href="/schools/{{$school->idschool}}/classrooms/{{$result->idclassroom}}" 
                                        class="button"><i class="far fa-edit"></i></a>
                                </div>

                                <div class="col-lg-6">
                                    <form action="/schools/{{$school->idschool}}/classrooms/{{$result->idclassroom}}" method="post" class="delete_form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
            
            @endforeach

            </tbody>

        </table>


    </form>


  <div class="modal fade" id="classroomListModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width:500px">
          <div class="modal-header">
            <h1 class="h1 modal-title" style="text-align:center">Add a Classroom</h1>
          </div>

          @include('partials.errors')

          <div class="modal-body">

            <form style="padding:20px" action="/schools/classrooms" method="POST">

                @csrf

                <div class="form-group">
                    <p>
                        <label for="classroom">Classroom</label>
                        <input type="text" class="form-control" id="classroom" name="classroom" />
                    </p>
                </div>

                <div class="form-group">
                    <p>
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" />
                    </p>
                </div>

                <div class="row mt-5">

                    <button type="submit" class="button mr-3 ml-3">Save</button>
                    <button type="button" class="button" data-dismiss="modal">Cancel</button>
                </div>

            </form>
            
        </div><!-- modal body -->
      </div><!-- modal content -->
    </div><!-- modal dialog-->

</div><!--modal-->

</div><!-- container-->


@endsection