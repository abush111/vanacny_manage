@extends('layouts.app')
@section('pagetitle')
    {{ __('employee.Show Salary Scale') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a
            href="{{ route('salary_scales.salary_scale.index') }}">{{ __('employee.Salary Scale') }}</a></li>
    <li class="breadcrumb-item active">{{ __('setting.Show') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header clearfix">
            <h3 class="card-title">{{ $salaryScale->name }}</h3>
            <div class="card-tools">
                <form method="POST" action="{!! route('salary_scales.salary_scale.destroy', $salaryScale->id) !!}" accept-charset="UTF-8">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        @permission('salaryScales-Edit')
                            <a href="{{ route('salary_scales.salary_scale.edit', $salaryScale->id) }}" class="btn btn-warning"
                                title="Edit Salary Scale">
                                <span class="fa fa-edit" aria-hidden="true"></span>
                            </a>
                        @endpermission
                        @permission('salaryScales-Delete')
                            <button type="submit" class="btn btn-danger" title="Delete Salary Scale"
                                onclick="return confirm(&quot;Click Ok to delete Salary Scale.?&quot;)">
                                <span class="fa fa-trash" aria-hidden="true"></span>
                            </button>
                        @endpermission
                    </div>
                </form>
            </div>
        </div>

        <div class="card-body">
            @permission('salaryScales-Show')
                <dl class="dl-horizontal">
                    <dt>{{ __('setting.Name') }}</dt>
                    <dd>{{ $salaryScale->name }}</dd>
                    <dt>{{ __('setting.Description') }}</dt>
                    <dd>{{ $salaryScale->description }}</dd>
                    <div class="row">
                        <div class="col-md-3">
                            <dt>{{ __('employee.Job Category') }}</dt>
                            <dd>{{ $salaryScale->jobCategories->name }}</dd>
                        </div>
                        <div class="col-md-3">
                            <dt>{{ __('employee.Stair Height') }}</dt>
                            <dd>{{ $salaryScale->stair_height }}</dd>
                        </div>
                        <div class="col-md-3">
                            <dt>{{ __('employee.Salary Steps') }}</dt>
                            <dd>{{ $salaryScale->salary_steps }}</dd>
                        </div>
                        <div class="col-md-3">
                            <dt>{{ __('employee.Is Enabled Salary Scale') }}</dt>
                            <dd>{{ $salaryScale->is_enabled ? 'Yes' : 'No' }}</dd>
                        </div>
                    </div>
                </dl>
                <hr>

                <table class="table">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center align-middle">{{ __('employee.Level') }}</th>
                            <th rowspan="2" class="text-center align-middle">{{ __('employee.Base Salary') }}</th>
                            <th colspan="{{ $salaryScale->salary_steps }}" class="text-center">
                                {{ __('employee.Steps') }}({{ $steps = $salaryScale->salary_steps }})</th>
                            <th rowspan="2" class="text-center align-middle">{{ __('employee.Maximum Salary') }}</th>
                        </tr>
                        <tr>
                            @for ($i = 1; $i <= $steps; $i++)
                                <th scope="col" class="text-center">{{ $i }} </th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salaryHeights as $salaryHeight)
                            <tr>
                                <td class="text-center">{{ $salaryHeight->level }}</td>
                                <td class="text-center">{{ $salaryHeight->initial_salary }}</td>
                                @foreach ($salaries as $salary)
                                    @if ($salary->salary_height == $salaryHeight->id)
                                        <td class="text-center">{{ $salary->amount }}</td>
                                    @endif
                                @endforeach
                                <td class="text-center">{{ $salaryHeight->maximum_salary }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endpermission
    </div>

@endsection
