@extends('layouts.app')
@section('pagetitle')
{{(__('setting.JobPosition'))}}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active">{{(__('setting.JobPosition'))}}</li>
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{(__('setting.JobPositionsList'))}}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        @permission('jobsPosition-List')
        @if (count($jobPositions) == 0)

        <h4 class="text-center">{{(__('setting.No Job Positions Available'))}}.</h4>
        @else
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>{{(__('setting.Number'))}}</th>
                    <th>{{(__('setting.JobTitle'))}}</th>
                    <th>{{(__('setting.NewOrganizationUnit'))}}</th>
                    <th>{{(__('setting.PositionCode '))}}</th>
                    <th>{{(__('setting.PositionID '))}}</th>
                    <th>{{(__('setting.Salary'))}}</th>
                    <th>{{(__('setting.IsAvailable'))}}</th>
                    <th>{{(__('setting.Actions'))}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobPositions as $jobPosition)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @if ($jobPosition->jobTitleCategories)
                    <td>{{ $jobPosition->jobTitleCategories->name }}</td>
                    @endif
                    <td>{{ $jobPosition->organizationUnits->en_name }}</td>
                    <td>{{ $jobPosition->position_code }}</td>
                    <td>{{ $jobPosition->position_id }}</td>
                    @if ($jobPosition->salarys)
                    <td>{{ $jobPosition->salarys->amount }}</td>
                    @endif
                    <td>{{ $jobPosition->status ? 'Yes' : 'No' }}</td>

                    <td>
                        <form method="POST"
                            action="{!! route('job_positions.job_position.destroy', $jobPosition->id) !!}"
                            accept-charset="UTF-8">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs pull-right" role="group">
                                @permission('jobsPosition-Benefits')
                                <a href="{{ route('job_positions.job_position.benefits', $jobPosition->id) }}"
                                    class="btn btn-outline-success" title="Benefits">
                                    {{(__('setting.Benefits'))}}
                                </a>
                                @endpermission
                                @permission('jobsPosition-Show')
                                <a href="{{ route('job_positions.job_position.show', $jobPosition->id) }}"
                                    class="btn btn-primary" title="Show Job Position">
                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                </a>
                                @endpermission
                                @permission('jobsPosition-Edit')
                                <a href="{{ route('job_positions.job_position.edit', $jobPosition->id) }}"
                                    class="btn btn-warning" title="Edit Job Position">
                                    <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                </a>
                                @endpermission
                                @permission('jobsPosition-Delete')
                                <button type="submit" class="btn btn-danger" title="Delete Job Position"
                                    onclick="return confirm(&quot;Click Ok to delete Job Position.&quot;)">
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
            {{ $jobPositions->links() }}
        </div>
        @endif
        @endpermission
    </div>
</div>
@permission('jobsPosition-AddNew')
<a href="{{ route('job_positions.job_position.create') }}" class="btn btn-success" title="Create New Job Position">
    <span class="fa fa-plus" aria-hidden="true"> {{(__('setting.AddNew'))}}</span>
</a>
@endpermission
@endsection
