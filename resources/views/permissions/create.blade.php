@extends('layouts.app')

@section('content')

<div class="panel panel-default">

    <div class="panel-heading clearfix">
        @section('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('reports.report.index') }}">{{(__('setting.Report'))}}</a></li>
        <li class="breadcrumb-item active">{{(__('setting.New'))}}</li>
        @endsection

        <span class="pull-left">
            <h4 class="mt-5 mb-5">Create New Permissions</h4>
        </span>
        <div class="btn-group btn-group pull-right" role="group">
            <a href="{{ route('permissions.permissions.index') }}" class="btn btn-primary" title="Show All Permissions">
                Back <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
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

        @permission('permission_Addnew')
        <form method="POST" action="{{ route('permissions.permissions.store') }}" accept-charset="UTF-8"
            id="create_permissions_form" name="create_permissions_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('permissions.form', [
            'permissions' => null,
            ])
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input class="btn btn-primary" type="submit" value="Add">
                </div>
            </div>

        </form>
        @endpermission

    </div>
</div>

@endsection
