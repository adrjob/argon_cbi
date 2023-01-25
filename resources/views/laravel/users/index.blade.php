@extends('layouts.app')

@section('content')

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="mb-0">Users Management</h5>
                        <a href="{{ route('user-new') }}" class="btn bg-gradient-dark btn-sm float-end mb-0">Add User</a>
                    </div>
                    <div class="px-4" id="alert">
                        @include('components.alert')
                    </div>
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Avatar
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Role
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
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-sm font-weight-normal">
                                            <span class="my-2 text-xs">
                                                <img src="{{ $user->avatarUrl() }}" alt="bruce"
                                                    class="border-radius-lg shadow-sm" style='width: 50px; height: 50px'>
                                            </span>
                                        </td>
                                        <td class="text-sm font-weight-normal">{{ $user->firstname }}
                                            {{ $user->lastname }}</td>
                                        <td class="text-sm font-weight-normal">{{ $user->email }}</td>
                                        <td class="text-sm font-weight-normal">{{ $user->role->name }}</td>
                                        <td class="text-sm font-weight-normal">{{ $user->created_at }}</td>
                                        <td class="text-sm">
                                            <span class="d-flex">
                                                @can('update', $user)
                                                    <a href="{{ route('user-edit', $user->id) }}" class="me-3"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                    </a>
                                                @endcan
                                                @can('delete', $user)
                                                    <form action="{{ route('user-destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        <button
                                                            onclick="confirm('Are you sure you want to remove the tag?') || event.stopImmediatePropagation()"
                                                            data-bs-toggle="tooltip" data-bs-original-title="Delete user"
                                                            class="border-0 bg-white">
                                                            <i class="fas fa-trash text-secondary"></i>
                                                        </button>
                                                    </form>
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
                select: [0, 5],
                sortable: false
            }]
        });
    </script>
@endpush
