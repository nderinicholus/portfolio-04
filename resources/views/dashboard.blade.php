@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                
                    <div class="row justify-content-center">
                        <div class="card m-3" style="width: 15rem;">
                            <div class="card-header">
                                <h5 class="card-title"><i class="fa fa-cogs" aria-hidden="true"></i> Settings</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('settings.edit', $setting->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('settings.show', $setting->id) }}" class="btn btn-primary">Preview</a>
                            </div>
                        </div>
    
    
                        <div class="card m-3" style="width: 15rem;">
                            <div class="card-header">
                                <h5 class="card-title"><i class="fa fa-server" aria-hidden="true"></i> Services</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('services.index') }}" class="btn btn-primary">View</a>
                                
                            </div>
                        </div>

                        

                        <div class="card m-3" style="width: 15rem;">
                            <div class="card-header">
                                <h5 class="card-title"><i class="fa fa-th" aria-hidden="true"></i> Portfolio</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('portfolio.index') }}" class="btn btn-primary">View</a>
                                
                            </div>
                        </div>

                        <div class="card m-3" style="width: 15rem;">
                            <div class="card-header">
                                <h5 class="card-title"><i class="fa fa-snowflake-o" aria-hidden="true"></i> Blog</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('blog.index') }}" class="btn btn-primary">View</a>
                                <a href="{{ route('categories.index') }}" class="btn btn-primary">Posts Categories</a>
                                
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>

    @stop