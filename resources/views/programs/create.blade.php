@extends('layouts.app')

@section('content')

    <div class="container-fluid my-5 py-2">
        <div class="d-flex justify-content-center mb-5">
            <div class="col-lg-9 mt-lg-0 mt-4">
                <!-- Card Basic Info -->
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <h5>New Program</h5>
                    </div>
                    <div class="card-body pt-0">
                        <form method="POST" action="{{ route('program.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">Name</label>
                                    <div class="input-group">
                                        <input id="name" name="name" class="form-control" type="text"
                                            placeholder="Program Name" value="{{ old('name') }}">
                                    </div>
                                    @error('name')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="col-6">
                                <label class="form-label">Type</label>
                                    <select class="form-control" name="type" id="choices-gender" require>                                        
                                        <option>Choose</option>
                                        <option value="0">Residency</option>
                                        <option value="1">Citizenship</option>
                                </div>                                
                            </div>    
                            <input type="text" style='display: none'>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ route('programs') }}" class="btn btn-light m-0">Back</a>
                                <button type="submit" class="btn gold_bg m-0 ms-2">Save</button>
                            </div>                                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('css')
    <style>
        .choices {
            margin-bottom: 0;
        }

    </style>
@endpush

@push('js')
    <script src="/assets/js/plugins/choices.min.js"></script>
    <script>
        if (document.getElementById('choices-gender')) {
            var gender = document.getElementById('choices-gender');
            const example = new Choices(gender);
        }

        if (document.getElementById('choices-language')) {
            var language = document.getElementById('choices-language');
            const example = new Choices(language);
        }       
    </script>
@endpush
