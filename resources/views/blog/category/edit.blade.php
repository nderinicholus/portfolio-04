@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
        <div class="border-bottom mb-3">
            <h2 class="pt-3 text-muted">{{ $category->title }}</h2>
            <span class="small"><a href="{{ route('categories.index') }}">Categories</a> > Edit a project</span>
        </div>
            <div class="card">
                <div class="card-header inline-flex">{{ __('Categories') }}</div>
                

                <div class="card-body">

                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" placeholder="Enter title" value="{{ $category->title }}">
                            <small class="text-danger">{{ $errors->first('title') }}</small>
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