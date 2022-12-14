@extends('layouts.app')
@section('pagetitle')
    {{ __('setting.Salary Heights') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('setting.Salary Heights') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('setting.Salary Heights List') }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            @permission('salaryHeights-List')
                @if (count($salaryHeights) == 0)
                    <h4 class="text-center">{{ __('setting.No Salary Heights Available') }}.</h4>
                @else
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>{{ __('setting.Number') }}</th>
                                <th>{{ __('setting.Salary Scale') }}</th>
                                <th>{{ __('setting.Level') }}</th>
                                <th>{{ __('setting.Initial Salary') }}</th>
                                <th>{{ __('setting.MaximumSalary') }}</th>
                                <th>{{ __('setting.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salaryHeights as $salaryHeight)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $salaryHeight->salaryScales->name }}</td>
                                    <td>{{ $salaryHeight->level }}</td>
                                    <td>{{ $salaryHeight->initial_salary }}</td>
                                    <td>{{ $salaryHeight->maximum_salary }}</td>
                                    <td>
                                        <form method="POST" action="{!! route('salary_heights.salary_height.destroy', $salaryHeight->id) !!}" accept-charset="UTF-8">
                                            @method('DELETE')
                                            {{ csrf_field() }}
                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                @permission('salaryHeights-Show')
                                                    <a href="{{ route('salary_heights.salary_height.show', $salaryHeight->id) }}"
                                                        class="btn btn-primary" title="Show Salary Height">
                                                        <span class="fa fa-eye" aria-hidden="true"></span>
                                                    </a>
                                                @endpermission
                                                @permission('salaryHeights-Edit')
                                                    <a href="{{ route('salary_heights.salary_height.edit', $salaryHeight->id) }}"
                                                        class="btn btn-warning" title="Edit Salary Height">
                                                        <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                                    </a>
                                                @endpermission
                                                @permission('salaryHeights-Delete')
                                                    <button type="submit" class="btn btn-danger" title="Delete Salary Height"
                                                        onclick="return confirm(&quot;Click Ok to delete Salary Height.&quot;)">
                                                        <span class="fa fa-trash" aria-hidden="true"></span>
                                                    </button>
                                                @endpermission
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-2">
                        {{ $salaryHeights->links() }}
                    </div>
                @endif
            @endpermission
        </div>
    </div>
    @permission('salaryHeights-AddNew')
        <a href="{{ route('salary_heights.salary_height.create') }}" class="btn btn-success"
            title="Create New Salary Height">
            <span class="fa fa-plus" aria-hidden="true"> {{ __('setting.AddNew') }}</span>
        </a>
    @endpermission
@endsection
