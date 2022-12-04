@extends('layouts.app')

@section('content')

@if(Session::has('success_message'))
<div class="alert alert-success">
    <span class="glyphicon glyphicon-ok"></span>
    {!! session('success_message') !!}

    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
@endif
@permission('permission-List')
<div class="panel panel-default">

    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-5 mb-5">Permissions</h4>
        </div>
        <div class="btn-group btn-group-sm pull-right" role="group">\
            @permission('permission-Addnew')
            <a href="{{ route('permissions.permissions.create') }}" class="btn btn-success"
                title="Create New Permissions">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
            @endpermission
        </div>

    </div>

    @if(count($permissionsObjects) == 0)
    <div class="panel-body text-center">
        <h4>No Permissions Available.</h4>
    </div>
    @else
    <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>{{(__('setting.Number'))}}</th>
                        <th>Name</th>
                        <th>Display Name</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissionsObjects as $permissions)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $permissions->name }}</td>
                        <td>{{ $permissions->display_name }}</td>

                        <td>

                            <form method="POST"
                                action="{!! route('permissions.permission.destroy', $permissions->id) !!}"
                                accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                <div class="btn-group btn-group-xs pull-right" role="group">
                                    @permission('permission-Show')
                                    <a href="{{ route('permissions.permission.show', $permissions->id) }}"
                                        class="btn btn-primary ml-2" title="Show permissions">
                                        <span class="fa fa-eye" aria-hidden="true"></span>
                                    </a>
                                    @endpermission

                                    @permission('permission-Edit')
                                    <a href="{{ route('permissions.permission.edit', $permissions->id) }}"
                                        class="btn btn-warning ml-2" title="Edit permissions">
                                        <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                    </a>
                                    @endpermission
                                    @permission('permission-Delete')
                                    <button type="submit" class="btn btn-danger ml-2" title="Delete Role"
                                        onclick="return confirm(&quot;Click Ok to delete Attendance.&quot;)">
                                        <span class="fa fa-trash text-white" aria-hidden="true"></span></buttton>


                                    </button>
                                    @endpermission
                                </div>

                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="panel-footer">
        {!! $permissionsObjects->render() !!}
    </div>

    @endif

</div>
@endpermission
@endsection
