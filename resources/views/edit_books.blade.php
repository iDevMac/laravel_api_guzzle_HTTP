@extends('layouts.layout')
@section('content')

<div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Management Books</h3>
            <h6 class="font-weight-normal mb-0">Edit Books <i class="mdi mdi-arrow-down"></i></h6>
          </div>
        </div>
      </div>
    </div>

    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-8 mx-auto">
            <div class="card">
             <div class="card-body">
                <h4 class="card-title">Update Book<i class="icon-down"></i></h4>
                
                <form action="{{ url('edit-books') }}" method="post" enctype="multipart/form-data">@csrf

                  <div class="form-group">
                    <label for="name">Book Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" @if(!empty($category['name'])) value="{{ $category['name'] }}" @else value="{{ old('name') }}" @endif placeholder="Enter Book name">
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                   
                  <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" id="isbn" placeholder="Enter ISBN">
                    @error('isbn')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>  

                  <div class="form-group">
                    <label for="authors">Authors</label>
                    <input type="text" class="form-control @error('authors') is-invalid @enderror" name="authors" id="authors" placeholder="Enter Authors">
                    @error('authors')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="number_of_pages">Number of Pages</label>
                    <input type="text" class="form-control @error('number_of_pages') is-invalid @enderror" name="number_of_pages" id="number_of_pages" value="{{ old('number_of_pages') }}"placeholder="Enter Number of Pages">
                    @error('number_of_pages')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="publisher">Publisher</label>
                    <input type="text" class="form-control @error('publisher') is-invalid @enderror" name="publisher" id="publisher" placeholder="Enter Publisher">
                    @error('publisher')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" placeholder="Enter Country">
                    @error('country')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="released">Release Date</label>
                    <input type="text" class="form-control @error('released') is-invalid @enderror" name="released" id="released" placeholder="Enter the ReleasE Date">
                   @error('released')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  <a href="#" class="btn btn-light">Cancel</a>
                </form>
                </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <!-- content-wrapper ends -->

@endsection

