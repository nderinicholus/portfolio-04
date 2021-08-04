@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="border-bottom mb-3">
                <h2 class="pt-3 text-muted">{{ $service->title }}</h2>
                <span class="small"><a href="{{ route('services.index') }}">Services</a> > Preview service</span>
            </div>
            <div class="card">
                <div class="card-header inline-flex">{{ $service->title }}
                    <span class="float-right">
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-info btn-sm text-white">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                        <a href="{{ route('services.create') }}" class="btn btn-success btn-sm pl-2">Create <i class="fa fa-plus" aria-hidden="true"></i></a>

                        <form class="pl-1 float-right" action="{{ route('services.destroy', $service->id) }}"
                            method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure you want to delete {{ $service->title }}?')">Delete <i class="fa fa-trash"></i></button>

                            

                        </form>

                    </span>
                </div>


                <div class="card-body">

                    <div class="pb-3 px-3">
                        <img src="{{ asset('storage/' . $service->photo) }}" alt="Photo of the {{ $service->title }}">
                    </div>

                    {!! $service->body !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection