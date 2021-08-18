@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header inline-flex"><a href="{{ route('dashboard') }}">Dashboard</a> > {{ __('Services') }}
                        <a href="{{ route('services.create') }}" class="btn btn-success btn-sm float-right">Create <i class="fa fa-plus" aria-hidden="true"></i></a>
                </div>
                

                <div class="card-body">

                  @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success:</strong> {{ Session::get('success') }}
                    </div>
                    @endif

                  @if (($services->count()) > 0)
                    
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($services as $service)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="{{ route('services.show', $service->id) }}">{{ $service->title }}</a></td>
                            <td>
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-info btn-sm float-left mr-1 text-white">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                
                            
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete {{ $service->title }}?')">Delete <i class="fa fa-trash"></i></button>

                                </form>
                            </td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>

                      @else
                      <div class="alert alert-info" role="alert">No services found</div>

                      @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection