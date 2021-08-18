@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                    @if (Auth::user()->title)

                        <a href="{{ route('settings.create') }}" class="btn btn-primary">Create</a>
                    @else
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title">{{ Auth::user()->settings->id }}</h5>
                          <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                          
                          <a href="{{ route('settings.edit', Auth::user()->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                      </div>

                        
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
