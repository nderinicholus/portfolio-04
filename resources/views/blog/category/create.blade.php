@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="border-bottom mb-3">
                <h2 class="pt-3 text-muted">Create a Post Category</h2>
                <span class="small"><a href="{{ route('categories.index') }}">Categories</a> > Create a category</span>
            </div>
            <div class="card">
                <div class="card-header inline-flex">{{ __('Posts Categories') }}
                    
                </div>


                <div class="card-body">

                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success:</strong> {{ Session::get('success') }}
                    </div>
                    @endif


                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" placeholder="Enter title" value="{{ old('title') }}">
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content"
                                placeholder="Enter Content">{{ old('content') }}</textarea>
                            <small class="text-danger">{{ $errors->first('content') }}</small>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('project_link') is-invalid @enderror" name="project_link"
                                id="project_link" placeholder="Enter project link" value="{{ old('project_link') }}">
                            <small class="text-danger">{{ $errors->first('project_link') }}</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="photo" class="col-sm-2"></label>
                            <input type="file" class="form-control" name="photo" id="photo" value="{{ old('photo') }}">
                            <small class="text-danger">{{ $errors->first('photo') }}</small>
                        </div>

                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection