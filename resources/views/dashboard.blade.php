@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                @if (!$setting->title > 0)
                    <a href="{{ route('settings.create') }}" class="btn btn-primary">Create</a>
                    @else
                    <div class="row justify-content-center">
                        <div class="card m-3" style="width: 15rem;">
                            <div class="card-body">
                                <h5 class="card-title">Settings</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $setting->title }}</h6>
    
                                <a href="{{ route('settings.edit', $setting->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('settings.show', $setting->id) }}" class="btn btn-primary">Preview</a>
                            </div>
                        </div>
    
    
                        <div class="card m-3" style="width: 15rem;">
                            <div class="card-body">
                                <h5 class="card-title">Services</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Services</h6>
    
                                <a href="{{ route('services.index') }}" class="btn btn-primary">View</a>
                                
                            </div>
                        </div>

                        <div class="card m-3" style="width: 15rem;">
                            <div class="card-body">
                                <h5 class="card-title">Portfolio</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Portfolio</h6>
    
                                <a href="{{ route('portfolio.index') }}" class="btn btn-primary">View</a>
                                
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    @stop