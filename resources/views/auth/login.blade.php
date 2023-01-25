@extends('layouts.app')

@section('content')   

<style>
        .gold_bg {
            background: -webkit-linear-gradient(left, #936a0b, #936a0b, #936a0b);    
            color: white;
        }
        .gold_bg_color {            
            color: #936a0b;
        }
       
        .fab {
            color: #936a0b;
        }
    </style>

    <main class="main-content main-content-bg mt-0">
        <div class="page-header min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1506012787146-f92b2d7d6d96?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1769&q=80');">
            <span class="mask opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-7">
                        <div class="card border-0 mb-0">
                            <div class="card-header bg-transparent">
                            <img src="{{ $logo ?? '/assets/img/vancis_logo.png'}}" class="navbar-brand-img" style='max-width: 120px; margin-left: 32%;' alt="main_logo">                             
                                <h5 class="text-dark text-center mt-2 mb-3">Sign in</h5>                                   
                            </div>
                            <div class="card-body px-lg-5 pt-0">                                
                                <form role="form" method="POST" action="{{route('login.perform') }}" class="text-start">
                                @csrf
                                    <div class="mb-3">
                                        <input type="email" class="form-control" value="{{ old('email') ?? 'test@test.com' }}" placeholder="Email" aria-label="Email" name="email">
                                        @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" placeholder="Password" value="test123"
                                            aria-label="Password" name="password">
                                            @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-100 my-4 mb-2 bg-gradient-dark">Sign in</button>
                                    </div>                                                                        
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-85 mt-2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6" style='margin-left: 10%'>
                            <div class="card" style='max-width:70%'>
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{route('login.perform') }}" class="text-start">
                                    @csrf
                                        <div class="mb-3">
                                        <input type="email" class="form-control" value="{{ old('email') ?? 'test@test.com' }}" placeholder="Email" aria-label="Email" name="email">
                                        @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class="mb-3">
                                        <input type="password" class="form-control" placeholder="Password" value="test123"
                                            aria-label="Password" name="password">
                                            @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg gold_bg btn-lg w-100 mt-4 mb-0">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>                                
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden">
                            <img src="{{ $logo ?? '/assets/img/vancis_logo.png'}}" class="navbar-brand-img" style='max-width: 50%; margin-left: 22%;' alt="main_logo">                             
                                <h4 class="mt-5 gold_bg_color font-weight-regular fab position-relative" style="text-transform: capitalize;">DSP APPLICATION PORTAL <br>SECURE LOGIN</h4>                                
                        </div>
                    </div>
                </div>
            </div>            
        </section>
    </main>

    @include('layouts.footers.auth.desc-footer')
@endsection
