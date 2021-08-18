@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="border-bottom mb-3">
                <h2 class="pt-3 text-muted">{{ $setting->title }}</h2>
                <span class="small"><a href="/dashboard">General Settings</a> > Preview Setting</span>
            </div>
            <div class="card">
                <div class="card-header inline-flex text-primary">{{ $setting->title }}, {{ $setting->user->name }}
                    <span class="float-right">
                        <a href="{{ route('settings.edit', $setting->id) }}" class="btn btn-info btn-sm text-white">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                    </span>
                </div>


                <div class="card-body">
                    <div class="social-media">
                    @if ($setting->github)
                    <span><a href="https://github.com/{{ (str_contains($setting->github, '@')) ? substr($setting->github, 1) : $setting->github }}" target="_blank"><i class="fa fa-github fa-2x text-dark" aria-hidden="true"></i></a></span>
                    @else
                        
                    @endif
                    
                    @if ($setting->twitter)
                    <span><a href="https://twitter.com/{{ (str_contains($setting->twitter, '@')) ? substr($setting->twitter, 1) : $setting->twitter }}" target="_blank"><i class="fa fa-twitter-square fa-2x text-primary" aria-hidden="true"></i></a></span>
                    @else
                        
                    @endif
                    
                    @if ($setting->linkedin)
                    <span><a href="https://ke.linkedin.com/{{ (str_contains($setting->linkedin, '@')) ? substr($setting->linkedin, 1) : $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin-square fa-2x text-primary" aria-hidden="true"></i></a></span>
                    @else
                        
                    @endif

                    @if ($setting->youtube)
                    <span>
                        <a href="https://youtube.com/user/{{ (str_contains($setting->youtube, '@')) ? substr($setting->youtube, 1) : $setting->youtube }}" target="_blank"><i class="fa fa-youtube-square fa-2x text-danger" aria-hidden="true"></i></a>    
                    </span>
                    @else
                        
                    @endif

                    </div>
                    <hr>

                    <div class="pb-3 px-3">
                        <img src="{{ asset('storage/' . $setting->photo) }}" alt="Photo of the {{ $setting->title }}">
                    </div>

                    {!! $setting->body !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection