@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
        <div class="border-bottom mb-3">
            <h2 class="pt-3 text-muted">{{ $project->title }}</h2>
            <span class="small"><a href="{{ route('portfolio.index') }}">Portfolio</a> > Edit a project</span>
        </div>
            <div class="card">
                <div class="card-header inline-flex">{{ __('portfolios') }}
                        <a href="{{ route('portfolio.create') }}" class="btn btn-success btn-sm float-right">Create <i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
                

                <div class="card-body">

                    <form action="{{ route('portfolio.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" placeholder="Enter title" value="{{ $project->title }}">
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content"
                                placeholder="Enter Content" value="{{ $project->content }}">{{ $project->content }}</textarea>
                            <small class="text-danger">{{ $errors->first('content') }}</small>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('project_link') is-invalid @enderror" name="project_link"
                                id="project_link" placeholder="Enter project link" value="{{ $project->project_link }}">
                            <small class="text-danger">{{ $errors->first('project_link') }}</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="photo" class="col-sm-2"></label>
                            <input type="file" class="form-control" name="photo" id="photo" value="{{ $project->photo }}">
                            <small class="text-danger">{{ $errors->first('photo') }}</small>
                        </div>

                        <img src="{{ asset('storage/' . $project->photo) }}" alt="Photo of the {{ $project->title }}" style="width:20%;" class="pb-2">

                        

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