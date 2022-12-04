
@extends('layouts.app')
@section('pagetitle')
    {{ __('setting.empcompetency_list') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('setting.empcompetency_list') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('setting.empcompetency_list') }}</h3>
        </div>

        <div class="card-body">

            @if(count($employeecompetencies) == 0)
                <h4 class="text-center">{{ __('setting.empcompetency_listAvailable') }}.</h4>
            @else
                <table class="table table-striped ">
                    <thead>
                        <tr>
                          <th>  {{ __('setting.Number') }}</th>
                            <th>{{ __('setting.competency_listname') }}</th>
                            <th>{{ __('setting.competency_listdesc') }}</th>
                            <th>{{ __('setting.Actions') }}</th>

                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employeecompetencies as $employeecompetency)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                        <td>{{ $employeecompetency->employeecompetency_name }}</td>
                            <td>{{ $employeecompetency->employee_competency_description }}</td>

                            <td>

                                <form method="POST" action="{!! route('employeecompetencies.employeecompetency.destroy', $employeecompetency->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">


                                            <a href="{{ route('employeecompetencies.employeecompetency.edit', $employeecompetency->id ) }}"
                                                class="btn btn-warning" title="Edit competency list">
                                                <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                            </a>


                                            <button type="submit" class="btn btn-danger" title="Delete Competency List" onclick="return confirm(&quot;Click Ok to delete employeecompetency.&quot;)">
                                                <span class="fa fa-trash" aria-hidden="true"></span>
                                            </button>

                                        </div>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            <div class="d-flex justify-content-center mt-2">
                {{ $employeecompetencies->links() }}
            </div>


        </div>
    </div>

    <a href="{{ route('employeecompetencies.employeecompetency.create') }}"  class="btn btn-success mr-2" title="Add New competency_list">
        <span class="fa fa-plus" aria-hidden="true"> {{ __('setting.Addcompetency_list') }}</span>
    </a>



@endsection
