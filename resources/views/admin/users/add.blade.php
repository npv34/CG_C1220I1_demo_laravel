@extends('home')
@section('page_title')
    Danh sach nguoi dung
@endsection
@section('content')
{{--    @include('layouts.core.navbar')--}}

    <div class="card mt-2">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('users.store') }}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Group</label>
                    <select class="custom-select" name="group_id">
                        <option selected>Choose...</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">Role</div>
                    <div class="col-sm-10">
                        @foreach($roles as $role)
                        <div class="form-check">
                            <input value="{{ $role->id }}" name="role_id[{{$role->id}}]" class="form-check-input" type="checkbox" id="gridCheck-{{$role->id}}">
                            <label class="form-check-label" for="gridCheck-{{$role->id}}">
                                {{ $role->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

