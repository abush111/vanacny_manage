@extends('layouts.app')
@section('pagetitle')
{{(__('employee.Edit Language'))}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('employee_languages.employee_language.index', $employee) }}">{{(__('employee.Languages'))}}</a>
    </li>
    <li class="breadcrumb-item active">{{(__('setting.edit'))}}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-1">{{(__('employee.Edit Language'))}}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @permission('languages-Edit')
            <form method="POST"
                action="{{ route('employee_languages.employee_language.update', ['employee' => $employee->id, 'employeeLanguage' => $employeeLanguage->id]) }}"
                id="edit_employee_language_form" name="edit_employee_language_form" accept-charset="UTF-8"
                class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @include ('employees.language.form', [
                'employeeLanguage' => $employeeLanguage,
                ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-12 text-center">
                        <input class="btn btn-primary mr-5" type="submit" value="{{(__('setting.update'))}}">
                        <a href="{{ route('employee_languages.employee_language.index', $employee) }}"
                            class="btn btn-warning mr-5" title="Show All Language">
                            {{(__('setting.cancel'))}}
                        </a>
                    </div>
                </div>
            </form>
            @endpermission
        </div>
    </div>
@endsection
