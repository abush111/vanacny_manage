@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($roles->name) ? $roles->name : 'Roles' }}</h4>
        </span>

        <div class="pull-right">
            @permission('role-Show')
            <form method="POST" action="{!! route('roles.roles.destroy', $roles->id) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('roles.roles.index') }}" class="btn btn-primary" title="Show All Roles">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('roles.roles.create') }}" class="btn btn-success" title="Create New Roles">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('roles.roles.edit', $roles->id ) }}" class="btn btn-primary" title="Edit Roles">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Roles"
                        onclick="return confirm(&quot;Click Ok to delete Roles.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>
            @endpermission
        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $roles->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $roles->description }}</dd>
            <dt>Display Name</dt>
            <dd>{{ $roles->display_name }}</dd>
            <dt>Permission Name</dt>
            <dd>@foreach($permissions as $permission)

                @if(in_array($permission->id, $selectedPermission))
                <option value="{{$permission->id}}" selected>{{$permission->name}}</option>


                @endif

                @endforeach
            </dd>

        </dl>

    </div>
</div>

@endsection
