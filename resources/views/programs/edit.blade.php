@extends('layouts.app')

@section('content')

@include('layouts.navbars.auth.topnav')
    <div class="container-fluid py-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="card card-body mt-4">
                    <h6 class="mb-0">Edit Program</h6>
                    <hr class="horizontal dark my-3">
                    <form method="POST" action="{{ route('program.update', $program->id) }}" enctype="multipart/form-data">
                        @csrf
                        <label for="name" class="form-label">Name</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $program->name) }}">
                            @error('name')
                                <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                            @enderror
                        </div>

                        <label class="form-label">Type</label>
                        <select class="form-control" name="type" id="choices-gender" require>                                        
                            <option value='{{ $program->type}}' selected>
                            @if($program->type == 1)
                            {{ _("Citizenship") }}
                            @else
                            {{ _("Residency") }}
                            @endif
                            </option>
                            <option value="0">Residency</option>
                            <option value="1">Citizenship</option>
                        </select>

                        <label class="mt-4 form-label" for="avatar">Add Image</label>
                                    <input type="file" name="flag" accept="image/*" id="flag" class="form-control">
                                    @error('flag')
                                        <p class='text-danger text-xs pt-1'> {{ $message }} </p>
                                    @enderror
                        
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('programs') }}" class="btn btn-light m-0">Back</a>
                            <button type="submit" class="btn gold_bg m-0 ms-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">
            <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex justify-content-between">
                    <h6 class="mb-0">Documents</h6>
                        <a href="{{ route('program.create') }}" class="btn bg-gradient-dark btn-sm float-end mb-0">Add Document</a>
                    </div>
                    <div class="px-4" id="alert">
                        @include('components.alert')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Flag
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Type
                                    </th>                                    
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
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
