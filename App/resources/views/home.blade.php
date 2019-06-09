@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height" id="home-page">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
            <div class="content-inner">
                    <div class="logo-container">
                        <div class="logo">
                            <img src="img/download (1).jpg" class="img-responsive" alt="">
                        </div>
                    </div>
                </div>
        {{-- <div class="title m-b-md">
            Daily
        </div> --}}
    </div>
</div>
@endsection
