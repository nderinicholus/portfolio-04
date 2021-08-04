@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header inline-flex">{{ __('Services') }}
                        <a href="{{ route('services.create') }}" class="btn btn-success btn-sm float-right">Create</a>
                </div>
                

                <div class="card-body">

                    @if(($services->count()) > 0)
                    
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
                            <th scope="row">1</th>
                            <td>{{ $service->title }}</td>
                            <td>
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-info btn-sm">Edit</a>

                                <form action="{{ route('blog.destroy', $post->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                <input type="submit" value="Delete" class="btn btn-danger btn-sm form-control float-right">

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