
@extends('layouts.layout')
@section('content')
<head>
          <link rel="stylesheet" href="{{ url('admin/css/bootstrap.css') }}">
</head>
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
             <h3 class="font-weight-bold">Ice & Fire</h3>
            <h6 class="font-weight-normal mb-0">Books</h6>
          </div>
        </div>
      </div>
    </div>
      <!-- Categories Table Begins Here -->

      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <p class="card-title">Books Table</p>
              <div class="">
                 {{-- Success Response Display --}}
                    @if(Session::has('success_msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Alert:</strong> {{ Session::get('success_msg'); }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif {{-- Login Response Display Ends--}}

                    {{-- Success Response Display --}}
                    @if(Session::has('error_msg'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Error:</strong> {{ Session::get('error_msg'); }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    @endif {{-- Login Response Display Ends--}}

                <div class="table-responsive pt-3">
                  <table id="book" class="table table-bordered" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>ISBN</th>
                        <th>Authors</th>
                         <th>Number of Pages</th>
                        <th>Publisher</th>
                        <th>Country</th>
                        <th>Release Date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>                    
                      @foreach($books as $book)
                      <tr>
                        <td>No id</td>
                        <td>{{$book['name']}}</td>
                        <td>{{$book['isbn']}}</td>
                        <td>
                          <?php 
                            $author = implode(", ", $book['authors']);
                            echo $author;
                          ?>
                        </td>
                        <td>{{$book['numberOfPages']}}</td>
                        <td>{{$book['publisher']}}</td>
                        <td>{{$book['country']}}</td>
                        <td>{{$book['released']}}</td>
                        <td>
                          <a class="#" href="{{ url('edit-book') }}"><i style="font-size:22px;" class="fa fa-pencil"></i></a>

                          <a class="confirmDelete" href="javascript:void(0)" module="book" moduleId=""><i style="font-size:25px; color: red;" class="fa fa-trash"></i></a> 
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
        </div>

  </div>
  <script>
    $(document).ready(function() {
      $('#app').DataTable();
    });
  </script>
  <!-- content-wrapper ends -->
@endsection
