@extends('layouts.app')

@section('content')   
    <main class="main-content main-content-bg mt-0">
        <div class="page-header min-vh-100"
            style="background-image: url('https://images.unsplash.com/photo-1506012787146-f92b2d7d6d96?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1769&q=80');">
            <span class="mask opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-7">
                        <div class="card border-0 mb-0">
                            <div class="card-header bg-transparent">
                                <h5 class="text-dark text-center mt-2 mb-3">Sign in</h5>                                
                            </div>
                            <div class="card-body px-lg-5 pt-0">                                
                                <form role="form" method="POST" action="{{route('login.perform') }}" class="text-start">
                                @csrf
                                    <div class="mb-3">
                                        <input type="email" class="form-control" value="{{ old('email') ?? 'admin@argon.com' }}" placeholder="Email" aria-label="Email" name="email">
                                        @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" placeholder="Password" value="secret"
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

    @include('layouts.footers.auth.desc-footer')
@endsection
