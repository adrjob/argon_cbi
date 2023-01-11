@extends('layouts.app', ['class' => 'virtual-reality'])

@section('content')
    <div>
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg  mt-4  px-0 mx-4 shadow-none border-radius-xl z-index-sticky  bg-primary"
            id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                @include('layouts.navbars.auth.topnav', ['title' => 'VR Info'])
                <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
                    <a href="javascript:;" class="nav-link p-0">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            @include('auth.logout')
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                        <li class="nav-item position-relative pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../../../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 "
                                                    alt="user image">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../../../assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm bg-gradient-dark  me-3 " alt="logo spotify">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                            fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>
    <div class="border-radius-xl mt-4 mx-4 position-relative"
        style="background-image: url('../../../assets/img/vr-bg.jpg') ; background-size: cover;">
        @include('layouts.navbars.auth.sidenav')
        <main class="main-content mt-1 border-radius-lg">
            <div class="section min-vh-85 position-relative transform-scale-0 transform-scale-md-7">
                <div class="container-fluid">
                    <div class="row pt-5 pt-md-10">
                        <div class="col-lg-1 col-md-1 pt-5 pt-lg-0 ms-lg-5 text-center d-flex d-md-block mb-4 mb-md-0">
                            <a href="javascript:;" class="avatar avatar-md border-0 d-block mb-2" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="My Profile">
                                <img class="border-radius-lg" alt="Image placeholder" src="../../../assets/img/team-1.jpg">
                            </a>
                            <button class="btn btn-white border-radius-lg p-2 mt-0 mt-md-2 d-block mx-2 mx-md-0"
                                type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Home">
                                <i class="fas fa-home p-2"></i>
                            </button>
                            <button class="btn btn-white border-radius-lg p-2 d-block" type="button"
                                data-bs-toggle="tooltip" data-bs-placement="left" title="Search">
                                <i class="fas fa-search p-2"></i>
                            </button>
                            <button class="btn btn-white border-radius-lg p-2 d-block ms-2 ms-md-0" type="button"
                                data-bs-toggle="tooltip" data-bs-placement="left" title="Minimize">
                                <i class="fas fa-ellipsis-h p-2"></i>
                            </button>
                        </div>
                        <div class="col-lg-8 col-md-11 ps-md-5">
                            <div class="d-flex">
                                <div class="me-auto">
                                    <h1 class="display-1 font-weight-bold mb-0">12°C</h1>
                                    <h6 class="text-uppercase mb-0 ms-1">Cloudy</h6>
                                </div>
                                <div class="ms-auto">
                                    <img class="w-50 float-end mt-md-n5"
                                        src="../../../assets/img/small-logos/icon-sun-cloud.png" alt="image sun">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card move-on-hover overflow-hidden">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <h6 class="mb-0 me-3">08:00</h6>
                                                <h6 class="mb-0">Synk up with Mark
                                                    <small class="text-secondary font-weight-normal">Hangouts</small>
                                                </h6>
                                            </div>
                                            <hr class="horizontal dark">
                                            <div class="d-flex">
                                                <h6 class="mb-0 me-3">09:30</h6>
                                                <h6 class="mb-0">Gym <br />
                                                    <small class="text-secondary font-weight-normal">World Class</small>
                                                </h6>
                                            </div>
                                            <hr class="horizontal dark">
                                            <div class="d-flex">
                                                <h6 class="mb-0 me-3">11:00</h6>
                                                <h6 class="mb-0">Design Review<br />
                                                    <small class="text-secondary font-weight-normal">Zoom</small>
                                                </h6>
                                            </div>
                                        </div>
                                        <a href="javascript:;" class="bg-gray-100 w-100 text-center py-1"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                            <i class="fas fa-chevron-down text-primary"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 mt-4 mt-sm-0">
                                    <div class="card bg-gradient-dark move-on-hover">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <h5 class="mb-0 text-white">To Do</h5>
                                                <div class="ms-auto">
                                                    <h1 class="text-white text-end mb-0 mt-n2">7</h1>
                                                    <p class="text-sm mb-0 text-white">items</p>
                                                </div>
                                            </div>
                                            <p class="text-white mb-0">Shopping</p>
                                            <p class="mb-0 text-white">Meeting</p>
                                        </div>
                                        <a href="javascript:;" class="w-100 text-center py-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Show More">
                                            <i class="fas fa-chevron-down text-white"></i>
                                        </a>
                                    </div>
                                    <div class="card move-on-hover mt-4">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <p class="mb-0">Emails (21)</p>
                                                <a href="javascript:;" class="ms-auto" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Check your emails">
                                                    Check
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 mt-4 mt-lg-0">
                                    <div
                                        class="card card-background card-background-mask-primary move-on-hover align-items-start">
                                        <div class="cursor-pointer">
                                            <div class="full-background"
                                                style="background-image: url('https://images.unsplash.com/photo-1518609878373-06d740f60d8b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2370&q=80')">
                                            </div>
                                            <div class="card-body">
                                                <h5 class="text-white mb-0">Some Kind Of Blues</h5>
                                                <p class="text-white text-sm">Deftones</p>
                                                <div class="d-flex mt-5">
                                                    <button class="btn btn-outline-white rounded-circle p-2 mb-0"
                                                        type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Prev">
                                                        <i class="fas fa-backward p-2"></i>
                                                    </button>
                                                    <button class="btn btn-outline-white rounded-circle p-2 mx-2 mb-0"
                                                        type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Pause">
                                                        <i class="fas fa-play p-2"></i>
                                                    </button>
                                                    <button class="btn btn-outline-white rounded-circle p-2 mb-0"
                                                        type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Next">
                                                        <i class="fas fa-forward p-2"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card move-on-hover mt-4 mb-4 mb-md-0 mt-md-4">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <p class="my-auto">Messages</p>
                                                <div class="ms-auto">
                                                    <div class="avatar-group">
                                                        <a href="javascript:;"
                                                            class="avatar avatar-sm border-0 rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="2 New Messages">
                                                            <img alt="Image placeholder"
                                                                src="../../../assets/img/team-1.jpg">
                                                        </a>
                                                        <a href="javascript:;"
                                                            class="avatar avatar-sm border-0 rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="1 New Message">
                                                            <img alt="Image placeholder"
                                                                src="../../../assets/img/team-2.jpg">
                                                        </a>
                                                        <a href="javascript:;"
                                                            class="avatar avatar-sm border-0 rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="13 New Messages">
                                                            <img alt="Image placeholder"
                                                                src="../../../assets/img/team-3.jpg">
                                                        </a>
                                                        <a href="javascript:;"
                                                            class="avatar avatar-sm border-0 rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="7 New Messages">
                                                            <img alt="Image placeholder"
                                                                src="../../../assets/img/team-4.jpg">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('layouts.footers.auth.footer')
@endsection
