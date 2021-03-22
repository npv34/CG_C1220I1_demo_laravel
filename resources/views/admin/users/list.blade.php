@extends('home')
@section('page_title')
    Danh sach nguoi dung
@endsection
@section('content')
    <h1 class="mt-4">Danh sach nguoi dung</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Group</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Group</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{ $role->name. ',' }}
                                @endforeach
                            </td>
                            <td><a href="">{{  $user->group->name ?? '' }}</a></td>
                            <td>
                                <a onclick="return confirm('Are you sure delete user: {{ $user->name }}')"
                                   class="btn btn-danger" href="{{ route('users.delete', $user->id) }}">Delete</a>
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
