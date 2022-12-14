@extends('layouts.app')
@section('pagetitle')
    {{ __('employee.Families') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('employee.Families') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('employee.Families List') }}</h3>
        </div>

        <div class="card-body">
            @permission('families-List')
                @if (count($employeeFamilies) == 0)
                    <h4 class="text-center">{{ __('employee.No Families Available') }}.</h4>
                @else
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>{{ __('setting.Number') }}</th>
                                <th>{{ __('setting.Name') }}</th>
                                <th>{{ __('employee.Sex') }}</th>
                                <th>{{ __('setting.Relationships') }}</th>
                                <th>{{ __('employee.Date Of Birth') }}</th>
                                <th>{{ __('employee.Photo') }}</th>
                                <th>{{ __('employee.Certificate') }}</th>
                                <th>{{ __('employee.Status') }}</th>
                                <th>{{ __('employee.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employeeFamilies as $employeeFamily)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employeeFamily->name }}</td>
                                    <td>{{ $employeeFamily->sexes->name }}</td>
                                    <td>{{ $employeeFamily->relationships->name }}</td>
                                    <td>{{ $employeeFamily->date_of_birth }}</td>
                                    <td>
                                        @permission('families-Show')
                                            @if (isset($employeeFamily->photo))
                                                <a href="{{ asset('uploads/family/' . $employeeFamily->photo) }}"
                                                    class="btn btn-outline-primary"
                                                    target="_blank">{{ __('employee.View Photo') }}</a>
                                            @endif
                                        @endpermission
                                    </td>
                                    <td>
                                        @permission('families-Show')
                                            @if (isset($employeeFamily->file))
                                                <a href="{{ asset('uploads/family/' . $employeeFamily->file) }}"
                                                    class="btn btn-outline-primary"
                                                    target="_blank">{{ __('employee.View Certificate') }}</a>
                                            @endif
                                        @endpermission
                                    </td>
                                    <td>
                                        @if ($employeeFamily->status == 1)
                                            {{ __('employee.Pending') }}
                                        @elseif($employeeFamily->status == 2)
                                            {{ __('employee.Rejected') }}
                                        @else
                                            {{ __('employee.Approved') }}
                                        @endif
                                    </td>

                                    <td>
                                        @permission('families_approve-Reject')
                                            @if ($employeeFamily->status == 1)
                                                <a href="{{ route('employee_families.employee_family.approve', ['employee' => $employeeFamily->employees->id, 'employeeFamily' => $employeeFamily->id]) }}"
                                                    class="btn btn-outline-success mr-3" title="Approve Family">
                                                    {{ __('employee.Approve') }}
                                                </a>
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                                    data-target="#modal-reject">
                                                    {{ __('employee.Reject') }}
                                                </button>
                                                <div class="modal fade" id="modal-reject">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary">
                                                                <h4 class="modal-title">{{ __('employee.Reject Family') }}
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form method="POST" action="{!! route('employee_families.employee_family.reject', ['employee' => $employeeFamily->employees->id, 'employeeFamily' => $employeeFamily->id]) !!}"
                                                                accept-charset="UTF-8">
                                                                {{ csrf_field() }}
                                                                <div class="modal-body">
                                                                    <label for="note">{{ __('employee.Note') }}</label>
                                                                    <textarea class="form-control" name="note" cols="50" rows="10" id="note" minlength="1" maxlength="1000"
                                                                        required="true"></textarea>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">{{ __('employee.Close') }}</button>
                                                                    <input class="btn btn-danger" type="submit" value="Reject">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endpermission
                                        @elseif($employeeFamily->status == 2)
                                            @permission('families-Delete')
                                                <form method="POST" action="{!! route('employee_families.employee_family.destroy', ['employee' => $employeeFamily->employees->id, 'employeeFamily' => $employeeFamily->id]) !!}" accept-charset="UTF-8">
                                                    @method('DELETE')
                                                    {{ csrf_field() }}
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <button type="submit" class="btn btn-danger" title="Delete Family"
                                                            onclick="return confirm(&quot;Click Ok to delete Family.&quot;)">
                                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                                        </button>
                                                    </div>
                                                </form>
                                            @endpermission
                                        @else
                                            <form method="POST" action="{!! route('employee_families.employee_family.destroy', ['employee' => $employeeFamily->employees->id, 'employeeFamily' => $employeeFamily->id]) !!}" accept-charset="UTF-8">
                                                @method('DELETE')
                                                {{ csrf_field() }}
                                                <div class="btn-group btn-group-xs pull-right" role="group">
                                                    @permission('families-Edit')
                                                        <a href="{{ route('employee_families.employee_family.edit', ['employee' => $employeeFamily->employees->id, 'employeeFamily' => $employeeFamily->id]) }}"
                                                            class="btn btn-warning" title="Edit Family">
                                                            <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                                        </a>
                                                    @endpermission

                                                    @permission('families-Delete')
                                                        <button type="submit" class="btn btn-danger" title="Delete Family"
                                                            onclick="return confirm(&quot;Click Ok to delete Family.&quot;)">
                                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                                        </button>
                                                    @endpermission
                                                </div>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-2">
                        {{ $employeeFamilies->links() }}
                    </div>
                @endif
            @endpermission
        </div>
    </div>
    @permission('families-AddNew')
        <a href="{{ route('employee_families.employee_family.create', $employee) }}" class="btn btn-success mr-2"
            title="Create New Family">
            <span class="fa fa-plus" aria-hidden="true"> {{ __('setting.AddNew') }}</span>
        </a>
    @endpermission
    @if (count($employeeFamilies) > 0)
        @permission('families-Print')
            <a href="{{ route('employee_families.employee_family.print', $employee) }}" class="btn btn-primary"
                title="Print Employee Family" target="_blank">
                <span class="fa fa-print" aria-hidden="true"> {{ __('employee.Print') }}</span>
            </a>
        @endpermission
    @endif
@endsection
