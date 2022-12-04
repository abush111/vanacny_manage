

@extends('layouts.app')
@section('pagetitle')
    {{ __('setting.leadershipform') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('setting.leadershipform') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('setting.leadershipform') }}</h3>
        </div>

        <div class="card-body">

            {{-- @if(count($competencylists) == 0) --}}
                {{-- <h4 class="text-center">{{ __('setting.leadershipformAvailable') }}.</h4> --}}
            {{-- @else --}}
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>  #</th>
                          <th>  {{ __('setting.Name') }}</th>
                            <th>{{ __('setting.OrganizationUnit') }}</th>
                            <th>{{ __('setting.EnglishAcronym') }}</th>
                            <th>{{ __('setting.from') }}</th>
                            <th>{{ __('setting.to') }}</th>
                            <th>{{ __('setting.Actions') }}</th>



                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($year as $years) --}}
                        @if($employee->organizationUnitse->chairman == Auth::user()->id )
                        <tr>
                        <td>1</td>
                        <td>{{ $employee->organizationUnitse->reportsTo->org_chairman->name }}</td>
                        <td>{{$employee->organizationUnitse->reportsTo->en_name }}</td>
                        <td>{{ $employee->organizationUnitse->reportsTo->en_name  }}</td>
                        <td>{{ $year->from  }}</td>
                        <td>{{ $year->to  }}</td>
                        <td>

                            <form method="POST" action="{!! route('competencylists.competencylist.destroy', $employee) !!}" accept-charset="UTF-8">
                            <input name="_method" value="DELETE" type="hidden">
                            {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                            @if(count($evaluatedyear) > 0)
                                            @foreach($evaluatedyear as $evaluatedyears)

                                            @if($employee->organizationUnitse->reportsTo->org_chairman->employee ==  $evaluatedyears->Employee_id)
                                            <a href="{{ route('competencylists.competencylist.performance_show', ['employee' => $employee->organizationUnitse->reportsTo->org_chairman->employee,  'year' => $year->id]) }}"
                                                class="btn btn-success" title="Add Performance">
                                                <span class="fa fa-eye text-white" aria-hidden="true"></span>
                                            </a>
                                            {{-- @break; --}}
                                            @else

                                            <a href="{{ route('competencylists.competencylist.performance_form_create', ['employee' => $employee->organizationUnitse->reportsTo->org_chairman->employee,  'year' => $year->id] ) }}"
                                                class="btn btn-primary " title="Edit competency list">
                                                <span class="fa fa-plus text-white" aria-hidden="true"></span>
                                            </a>
                                            @endif

                                          @endforeach
                                      {{--   @else
                                         <a href="{{ route('competencylists.competencylist.performance_form_create', ['employee' => $employee->organizationUnitse->reportsTo->org_chairman->employee,  'year' => $years->id] ) }}"
                                            class="btn btn-primary " title="Edit competency list">
                                            <span class="fa fa-plus text-white" aria-hidden="true"></span>
                                        </a>--}}
                                        @endif 
                                            <button type="submit" class="btn btn-danger" title="Delete Competency List" onclick="return confirm(&quot;Click Ok to delete Competencylist.&quot;)">
                                                <span class="fa fa-trash" aria-hidden="true"></span>
                                            </button>

                                        </div>
                                    </form>

                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>1</td>
                                <td>{{ $employee->organizationUnitse->org_chairman->name }}</td>
                                <td>{{$employee->organizationUnitse->org_chairman->en_name }}</td>
                                <td>{{ $employee->organizationUnitse->org_chairman->reportsTo->parent  }}</td>
                                <td>{{ $year->from  }}</td>
                                <td>{{ $year->to  }}</td>
                                <td>

                                    <form method="POST" action="{!! route('competencylists.competencylist.destroy', $employee) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                                <div class="btn-group btn-group-xs pull-right" role="group">


                                                    @foreach($evaluatedyear as $evaluatedyears)

                                                    @if($employee->organizationUnitse->reportsTo->org_chairman->employee ==  $evaluatedyears->Employee_id)
                                                    <a href="{{ route('competencylists.competencylist.performance_form_create', ['employee' => $employee->organizationUnitse->reportsTo->org_chairman->employee,  'year' => $year->id] ) }}"
                                                        class="btn btn-success" title="Add Performance">
                                                        <span class="fa fa-eye text-white" aria-hidden="true"></span>
                                                    </a>
                                                    @else

                                                    <a href="{{ route('competencylists.competencylist.performance_form_create', ['employee' => $employee->organizationUnitse->reportsTo->org_chairman->employee,  'year' => $year->id] ) }}"
                                                        class="btn btn-primary " title="Edit competency list">
                                                        <span class="fa fa-plus text-white" aria-hidden="true"></span>
                                                    </a>
                                                    @endif

                                                 @endforeach



                                                    <button type="submit" class="btn btn-danger" title="Delete Competency List" onclick="return confirm(&quot;Click Ok to delete Competencylist.&quot;)">
                                                        <span class="fa fa-trash" aria-hidden="true"></span>
                                                    </button>

                                                </div>
                                            </form>

                                        </td>
                                    </tr>
                                    @endif
                                    {{-- @endforeach --}}
                    </tbody>
                </table>
            {{-- @endif --}}
            <div class="d-flex justify-content-center mt-2">

            </div>


        </div>
    </div>

    {{-- <a href="{{ route('competencylists.competencylist.create') }}"  class="btn btn-success mr-2" title="Add New competency_list">
        <span class="fa fa-plus" aria-hidden="true"> {{ __('setting.Employees') }}</span>
    </a> --}}



@endsection
