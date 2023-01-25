@extends('layouts.app')

@section('content')
    
            
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card" >
                    <!-- Card header -->
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Clients</h5>
                        <a href="{{ route('clients.create') }}" class="btn bg-gradient-dark btn-sm float-end mb-0">Add Client</a>
                    </div>
                    <div class="px-4" id="alert">
                        @include('components.alert')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Program
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Created Date
                                    </th>                                    
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td class="text-sm font-weight-normal">                                            
                                            {{ $client->name }}
                                        </td>
                                        <td class="text-sm font-weight-normal">{{ $client->program_name }}</td>
                                        <td class="text-sm font-weight-normal">
                                           {{ $client->created_at }}
                                        </td>   
                                        

                                        <td class="text-sm">                                        
                                            <span class="d-flex">                                                
                                                <a href="{{ route('clients.show', $client->id) }}" class="me-3"
                                                    data-bs-toggle="tooltip" data-bs-original-title="View Client">
                                                    <i class="fas fa-eye text-secondary"></i>
                                                </a>
                                                <a href="{{ route('clients.edit', $client->id) }}" class="me-3"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit Client">
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
