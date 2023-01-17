@extends('layouts.app')

@section('content')

@include('layouts.navbars.auth.topnav')
    
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Role Management</h5>
                        @if (!config('app.is_demo'))
                            <a href="{{ route('role-new') }}" class="btn bg-gradient-dark btn-sm float-end mb-0">Add
                                Role</a>
                        @endif
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
                                        Description
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Creation Date
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="text-sm font-weight-normal">{{ $role->name }}</td>
                                        <td class="text-sm font-weight-normal">{{ $role->description }}</td>
                                        <td class="text-sm font-weight-normal">{{ $role->created_at }}</td>
                                        <td class="text-sm">
                                            <span class="d-flex">
                                                @can('manage-users', auth()->user())
                                                    <a href="{{ route('role-edit', $role->id) }}" class="me-3"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit role">
                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                    </a>
                                                    @if (!config('app.is_demo'))
                                                        <form action="{{ route('role-destroy', $role->id) }}" method="post">
                                                            @csrf
                                                            <button
                                                                onclick="confirm('Are you sure you want to remove the role?') || event.stopImmediatePropagation()"
                                                                data-bs-toggle="tooltip" data-bs-original-title="Delete role"
                                                                class="border-0 bg-white">
                                                                <i class="fas fa-trash text-secondary"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @endcan
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
            columns: [{
                select: [3],
                sortable: false
            }]
        });
    </script>
@endpush
