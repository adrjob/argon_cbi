@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav')           
            
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Programs</h5>
                        <a href="{{ route('program.create') }}" class="btn bg-gradient-dark btn-sm float-end mb-0">Add Program</a>
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
                                @foreach ($programs as $program)
                                    <tr>
                                        <td class="text-sm font-weight-normal">
                                            @if($program->flag != NULL)    
                                            <span class="my-2 text-xs">                                                                                        
                                            <img src="{{ $program->flagUrl() }}" class="shadow-sm height-7 w-7">
                                            </span>
                                            @else
                                            {{ _("Upload Flag") }}
                                            @endif
                                        </td>
                                        <td class="text-sm font-weight-normal">{{ $program->name }}</td>
                                        <td class="text-sm font-weight-normal">
                                            @if($program->type == 1)
                                            {{ _("Citizenship") }}
                                            @else
                                            {{ _("Residency") }}
                                            @endif
                                        </td>   
                                        
                                        <td class="text-sm">
                                            <span class="d-flex">                                                
                                                    <a href="{{ route('program.edit', $program->id) }}" class="me-3"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit role">
                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                    </a>                                                                                                                                                        
                                            </span>
                                        </td>
                                        
                                    </tr>
                                @endforeach
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
    <script src="/assets/js/plugins/datatables.js"></script>
    <script>
        const dataTableBasic = new simpleDatatables.DataTable("#datatable-basic", {
            searchable: true,
            fixedHeight: true,            
        });
    </script>
@endpush
