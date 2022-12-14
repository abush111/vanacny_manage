@extends('layouts.app')
@section('pagetitle')
    {{ __('employee.Edit Salary Scale') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a
            href="{{ route('salary_scales.salary_scale.index') }}">{{ __('employee.Salary
                    Scale') }}</a></li>
    <li class="breadcrumb-item active">{{ __('setting.edit') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-1">{{ __('employee.Edit Salary Scale') }}</h3>
        </div>
        <div class="card-body">
            @permission('salaryScales-Edit')
                <form method="POST" action="{{ route('salary_scales.salary_scale.update', $salaryScale->id) }}"
                    id="edit_salary_scale_form" name="edit_salary_scale_form" accept-charset="UTF-8" class="form-horizontal">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    @include('payment.salary_scales.form', [
                        'salaryScale' => $salaryScale,
                    ])

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-12 text-center">
                            <input class="btn btn-primary mr-5" type="submit" value="{{ __('setting.update') }}">
                            <a href="{{ route('salary_scales.salary_scale.index') }}" class="btn btn-warning mr-5"
                                title="Show All Salary Scale">
                                {{ __('setting.cancel') }}
                            </a>
                        </div>
                    </div>
                </form>
            @endpermission
        </div>
    </div>
@endsection
