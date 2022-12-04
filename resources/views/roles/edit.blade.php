@extends('layouts.app')

@section('content')

<div class="panel panel-default">

    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">{{ !empty($roles->name) ? $roles->name : 'Roles' }}</h4>
        </div>
        <div class="btn-group btn-group-sm pull-right" role="group">

            <a href="{{ route('roles.role.create') }}" class="btn btn-success m-2" title="Create New Roles">
                <span class="fas fa-plus ml-1" aria-hidden="true"> Add New Role</span>
            </a>
            <a href="{{ route('roles.role.index') }}" class="btn btn-info m-2" title="Go Back">
                <span class="fas fa-arrow-circle-left" aria-hidden="true"> {{(__('employee.Go Back'))}}</span>
            </a>

        </div>
    </div>

    <div class="panel-body">

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        @permission('role-Edit')
        <form method="POST" action="{{ route('roles.role.update', $roles->id) }}" id="edit_roles_form"
            name="edit_roles_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('roles.edit_role', [
            'roles' => $roles,
            ])

            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input class="btn btn-primary" type="submit" value="Update">
                </div>
            </div>
        </form>
        @endpermission
    </div>
</div>

@endsection
