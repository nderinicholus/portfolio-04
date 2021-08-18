@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header inline-flex"><a href="{{ route('dashboard') }}">Dashboard</a> >
          {{ __('Post Categories') }}
        </div>


        <div class="card-body">

          @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
            <strong>Success:</strong> {{ Session::get('success') }}
          </div>
          @endif

          @if (($categories->count()) > 0)

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->title }}</a></td>
                <td>
                  <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm float-left mr-1 text-white">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </a>

                  <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger btn-sm clickBtn"
                      onclick="return confirm('Are you sure you want to delete {{ $category->title }}?')">Delete <i
                        class="fa fa-trash"></i></button>

                  </form>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>

          @else
          <div class="alert alert-info" role="alert">No categories found</div>

          @endif

        </div>
      </div>



      




    </div>

    <div class="col-md-4">
      <div class="card" style="width: 15rem;">
        <div class="card-header">Create Post Category</div>
        <div class="card-body">

          <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                placeholder="Enter title" value="{{ old('title') }}">
              <small class="text-danger">{{ $errors->first('title') }}</small>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-sm btn-block">Submit <i class="fa fa-floppy-o"
                  aria-hidden="true"></i></button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection