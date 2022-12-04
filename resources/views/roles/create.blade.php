@extends('layouts.app')

@section('content')
@section('style')
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }} ">
<!-- js for duallist  -->
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/css/bootstrap-duallistbox.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/css/bootstrap-duallistbox.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/css/prettify.min.css')}}">


<!-- end of dual list script -->
@stop

<div class="panel panel-default">

    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">Create New Roles</h4>
        </span>



    </div>

    <div class="panel-body">

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        @permission('role-AddNew')
        <form method="POST" action="{{ route('roles.role.store') }}" accept-charset="UTF-8" id="create_roles_form"
            name="create_roles_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('roles.form', [
            'roles' => null,
            ])

            <div class="btn-group btn-group-md pull-left mb-2" role="group">

                <input class="btn btn-primary btn btn-primary" type="submit" value="{{(__('setting.AddNew'))}}">

            </div>

            <div class="btn-group btn-group-md" role="group">
                <a href="{{ route('roles.role.index') }}" class="btn btn-info pull-right" title="Create New Roles">
                    <span class="fas fa-arrow-circle-left" aria-hidden="true"> {{(__('employee.Go Back'))}}</span>
                </a>
            </div>
    </div>


    </form>
    @endpermission
</div>
</div>

@endsection
