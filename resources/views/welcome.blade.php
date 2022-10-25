@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-black">{{ __('Welcome to PMSM!') }}</h1>
                        <p class="text-lead text-light">
                            {{ __('The Products Marketing and Sales Monitoring system by ANKA Support services supports interesting startups ') }}
                                 {{ __('by innovative individuals')}}
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
