@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
        <div class="border-bottom mb-3">
            <h2 class="pt-3 text-muted">{{ $service->title }}</h2>
            <span class="small"><a href="{{ route('services.index') }}">Services</a> > Edit a service</span>
        </div>
            <div class="card">
                <div class="card-header inline-flex">{{ __('Services') }}
                        <a href="{{ route('services.create') }}" class="btn btn-success btn-sm float-right">Create <i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
                

                <div class="card-body">

                    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ $service->title }}">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="body" id="body" rows="10" placeholder="Enter Body">{{ $service->body }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="photo" class="col-sm-2"></label>
                            <input type="file" class="form-control" name="photo" id="photo">
                            <small class="text-danger">{{ $errors->first('photo') }}</small>
                        </div>


                        <img src="{{ asset('storage/' . $service->photo) }}" alt="Photo of the {{ $service->title }}" style="width:20%;" class="pb-2">


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