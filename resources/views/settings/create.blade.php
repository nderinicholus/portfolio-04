@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="border-bottom mb-3">
                <h2 class="pt-3 text-muted">Create settings</h2>
                <span class="small"><a href="{{ route('settings.index') }}">General Settings</a> > Create settings</span>
            </div>
            <div class="card">
                <div class="card-header inline-flex">{{ __('Settings') }}
                    
                </div>


                <div class="card-body">

                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success:</strong> {{ Session::get('success') }}
                    </div>
                    @endif


                    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" placeholder="Enter title" value="{{ old('title') }}">
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body"
                                placeholder="Enter Body">{{ old('body') }}</textarea>
                            <small class="text-danger">{{ $errors->first('body') }}</small>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('github') is-invalid @enderror" name="github"
                                id="github" placeholder="@github" value="{{ old('github') }}">
                            <small class="text-danger">{{ $errors->first('github') }}</small>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter"
                                id="twitter" placeholder="@twitter" value="{{ old('twitter') }}">
                            <small class="text-danger">{{ $errors->first('twitter') }}</small>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin"
                                id="linkedin" placeholder="@linkedin" value="{{ old('linkedin') }}">
                            <small class="text-danger">{{ $errors->first('linkedin') }}</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="photo" class="col-sm-2"></label>
                            <input type="file" class="form-control" name="photo" id="photo">
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