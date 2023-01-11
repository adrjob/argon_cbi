@extends('layouts.app')

@section('content')
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                @include('layouts.navbars.auth.topnav-auth', [
                    'classes' => 'mt-4 blur border-radius-lg top-0 z-index-3 shadow py-2 start-0 end-0 mx-4',
                ])
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain py-lg-3">
                                <div class="card-body text-center">
                                    <h4 class="mb-0 font-weight-bolder">Mike Priesler</h4>
                                    <p class="mb-4">Enter password to unlock your account.</p>
                                    <form role="form">
                                        <div class="mb-3">
                                            <input type="password" class="form-control" placeholder="Password"
                                                aria-label="password">
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-lg w-100 btn-dark mb-0">Unlock</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-dark h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/lock-ill.jpg');
              background-size: cover;">
                                <span class="mask bg-dark opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new
                                    currency"</h4>
                                <p class="text-white position-relative">The more effortless the writing looks, the more
                                    effort the writer actually put into the process.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
