@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
        <div class="border-bottom mb-3">
            <h2 class="pt-3 text-muted">Create a service</h2>
            <span><a href="{{ route('services.index') }}">Services</a> > Create a service</span>
        </div>
            <div class="card">
                <div class="card-header inline-flex">{{ __('Services') }}
                        <a href="{{ route('services.create') }}" class="btn btn-success btn-sm float-right">Create</a>
                </div>
                

                <div class="card-body">

                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ old('title') }}">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="body" id="body" placeholder="Enter Body">{{ old('body') }}</textarea>
                        </div>

                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                          </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection