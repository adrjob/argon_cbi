@extends('layouts.app')

@section('content')

@include('layouts.navbars.auth.topnav')
    
    <div class="container-fluid py-4">
        <div class="row mb-5">
            <div class="col-lg-9 col-12 mx-auto">
                <div class="card card-body mt-4">
                    <h6 class="mb-0">New Role</h6>
                    <hr class="horizontal dark my-3">
                    <form method="POST" action="{{ route('role-new.store') }}">
                        @csrf
                        <label for="name" class="form-label">Name</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') ?? '' }}">
                            @error('name')
                                <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                            @enderror
                        </div>
                        <label class="mt-4"> Description</label>
                        <textarea name="description" rows="4" class="w-100 form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                        @enderror
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('role-management') }}" class="btn btn-light m-0">Back</a>
                            <button type="submit" class="btn bg-gradient-primary m-0 ms-2">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script src="/assets/js/plugins/quill.min.js"></script>
    <script>
        if (document.getElementById('editor')) {
            var quill = new Quill('#editor', {
                theme: 'snow' // Specify theme in configuration
            });
        }
    </script>
@endpush
