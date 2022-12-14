@extends('layouts.app')
@section('pagetitle')
{{(__('employee.New Judiciary Punishment'))}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a
            href="{{ route('employee_judiciary_punishments.employee_judiciary_punishment.index', $employee) }}">{{(__('employee.Judiciary Punishment'))}}</a></li>
    <li class="breadcrumb-item active">{{(__('setting.New'))}}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-1">{{(__('employee.Create New Judiciary Punishment'))}}</h3>
        </div>
        <div class="card-body">
            @permission('judiciaryPunishments-AddNew')
            <form method="POST"
                action="{{ route('employee_judiciary_punishments.employee_judiciary_punishment.store', $employee) }}"
                accept-charset="UTF-8" id="create_employee_judiciary_punishment_form"
                name="create_employee_judiciary_punishment_form" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include ('employees.judiciary_punishment.form', [
                'employeeJudiciaryPunishment' => null,
                ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-12 text-center">
                        <input class="btn btn-primary mr-5" type="submit" value="{{(__('setting.save'))}}">
                        <a href="{{ route('employee_judiciary_punishments.employee_judiciary_punishment.index', $employee) }}"
                            class="btn btn-warning mr-5" title="Show All Judiciary Punishment">
                            {{(__('setting.cancel'))}}
                        </a>
                        <input class="btn btn-danger" type="reset" value="{{(__('setting.Reset'))}}">
                    </div>
                </div>
            </form>
            @endpermission
        </div>
    </div>
@endsection
