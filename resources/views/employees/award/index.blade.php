@extends('layouts.app')
@section('pagetitle')
{{(__('employee.Awards'))}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active"> {{(__('employee.Awards'))}}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{(__('employee.Awards List'))}}</h3>
        </div>

        <div class="card-body">
            @permission('awards-List')
            @if (count($employeeAwards) == 0)
                <h4 class="text-center">{{(__('employee.No Awards Available'))}}</h4>
            @else
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{(__('setting.Number'))}}</th>
                            <th>{{__('setting.Organization')}}</th>
                            <th>{{__('setting.AwardType')}}</th>
                            <th>{{(__('employee.Awarded On'))}}</th>
                            <th>{{(__('employee.Status'))}}</th>
                            <th>{{__('setting.Actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employeeAwards as $employeeAward)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $employeeAward->organization }}</td>
                                <td>{{ $employeeAward->types->name }}</td>
                                <td>{{ $employeeAward->awarded_on }}</td>
                                <td>
                                    @if ($employeeAward->status == 1)
                                        {{(__('employee.Pending'))}}
                                    @elseif($employeeAward->status == 2)
                                        {{(__('employee.Rejected'))}}
                                    @else
                                        {{(__('employee.Approved'))}}
                                    @endif
                                </td>

                                <td>
                                    @if ($employeeAward->status == 3)
                                        <form method="POST" action="{!! route('employee_awards.employee_award.destroy', ['employee' => $employeeAward->employees->id, 'employeeAward' => $employeeAward->id]) !!}" accept-charset="UTF-8">
                                            @method('DELETE')
                                            {{ csrf_field() }}
                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                @permission('awards-Show')
                                                <a href="{{ route('employee_awards.employee_award.show', ['employee' => $employeeAward->employees->id, 'employeeAward' => $employeeAward->id]) }}"
                                                    class="btn btn-primary" title="Show Award">
                                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                                </a>
                                                @endpermission
                                                @permission('awards-Edit')
                                                <a href="{{ route('employee_awards.employee_award.edit', ['employee' => $employeeAward->employees->id, 'employeeAward' => $employeeAward->id]) }}"
                                                    class="btn btn-warning" title="Edit Award">
                                                    <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                                </a>
                                                @endpermission
                                                @permission('awards-Delete')
                                                <button type="submit" class="btn btn-danger" title="Delete Award"
                                                    onclick="return confirm(&quot;Click Ok to delete Award.&quot;)">
                                                    <span class="fa fa-trash" aria-hidden="true"></span>
                                                </button>
                                                @endpermission
                                            </div>
                                        </form>
                                    @else
                                    @permission('awards-Show')
                                        <a href="{{ route('employee_awards.employee_award.show', ['employee' => $employeeAward->employees->id, 'employeeAward' => $employeeAward->id]) }}"
                                            class="btn btn-primary" title="Show Award">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        @endpermission
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-2">
                {{ $employeeAwards->links() }}
                </div>
            @endif
            @endpermission
        </div>
    </div>
    @permission('awards-AddNew')
    <a href="{{ route('employee_awards.employee_award.create', $employee) }}" class="btn btn-success mr-2"
        title="Create New Employee Award">
        <span class="fa fa-plus" aria-hidden="true"> {{(__('setting.AddNew'))}}</span>
    </a>
    @endpermission
    @if (count($employeeAwards) > 0)
    @permission('awards-Print')
        <a href="{{ route('employee_awards.employee_award.print', $employee) }}" class="btn btn-primary" title="Print Employee Award" target="_blank">
            <span class="fa fa-print" aria-hidden="true"> {{(__('employee.Print'))}}</span>
        </a>
        @endpermission
    @endif
@endsection
