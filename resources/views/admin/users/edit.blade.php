@extends('home')
@section('page_title')
    Danh sach nguoi dung
@endsection
@section('content')
    <div class="card mt-2">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('users.store') }}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Group</label>
                    <select class="custom-select" name="group_id">
                        @foreach($groups as $group)
                            <option
                                @if($group->id == $user->group_id)
                                    selected
                                @endif
                                value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" value="{{ $user->email }}" name="email" class="form-control">
                </div>
                {{--                <div class="form-group">--}}
                {{--                    <label>Role</label>--}}
                {{--                    <select class="custom-select" name="role" id="inputGroupSelect01">--}}
                {{--                        <option selected>Choose...</option>--}}
                {{--                        <option value="1">Admin</option>--}}
                {{--                        <option value="2">User</option>--}}
                {{--                    </select>--}}
                {{--                </div>--}}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

