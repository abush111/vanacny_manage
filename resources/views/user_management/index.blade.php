@extends('layouts.app')
@section('pagetitle')
    {{ __('setting.users') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">
            {{ __('setting.user') }} </a></li>
    <li class="breadcrumb-item active">{{ __('setting.users') }}</li>
@endsection
@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('setting.Newuser') }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        @permission('users-List')
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Picture</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->count())
                            @foreach ($users as $key => $admin)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img height="40" width="40" src="{{ asset('storage/admins/' . $admin->picture) }}">
                                    </td>
                                    <td>{{ $admin->en_name }}</td>
                                    <td>{{ $admin->username }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        @if ($admin->roles()->get())
                                            @foreach ($admin->roles()->get() as $role)
                                                {{ $role->name }}
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>

                                        <div class="btn-group btn-group-xs pull-right" role="group">

                                            @if (Auth::user()->id == $admin->id)
                                                <a href="{{ route('users.edit', $admin->id) }}" class="btn btn-warning"
                                                    title="Edit User">
                                                    <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                                </a>
                                            @elseif(!$admin->roles()->get()->contains('id', $roleid))
                                                <a href="{{ route('users.edit', $admin->id) }}" class="btn btn-warning"
                                                    title="Edit User">
                                                    <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                                </a>
                                            @else
                                                <a class="btn btn-warning disabled"> <span class="fa fa-edit text-white"
                                                        aria-hidden="true"></span>
                                                </a>
                                            @endif

                                            <form action="{{ route('users.destroy', $admin->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf()
                                                @if (Auth::user()->id == $admin->id)
                                                    <button type="submit" class="btn btn-danger" title="Delete Users">
                                                        <span class="fa fa-trash" aria-hidden="true"></span>
                                                    </button>
                                                @elseif(!$admin->roles()->get()->contains('id', $roleid))
                                                    <button type="submit" class="btn btn-danger" title="Delete Users">
                                                        <span class="fa fa-trash" aria-hidden="true"></span>
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn btn-danger" title="Delete Users">
                                                        <span class="fa fa-trash" aria-hidden="true"></span>
                                                    </button>
                                                @endif
                                            </form>



                                        </div>


                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        @endpermission
    </div>
    @if (count($users) > 0)
        @permission('users-AddNew')
            <a href="{{ route('users.create') }}" class="btn btn-success" title="Create New User">
                <span class="fa fa-plus" aria-hidden="true"> {{ __('setting.AddNew') }}</span>
            </a>
        @endpermission
    @endif
@endsection
