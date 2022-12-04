

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
                            <th>{{ __('setting.Actions') }}</th>



                        </tr>
                    </thead>
                    <tbody>
                        @if($employee->organizationUnitse->chairman == Auth::user()->id )
                        @foreach($immediatereportsto as $immediatereportstos)
                        {{-- @foreach($year as $years) --}}
                        <tr>
                        <td>1</td>
                        <td>{{ $immediatereportstos->org_chairman->name }}</td>
                        <td>{{$immediatereportstos->reportsTo->en_name }} </td>
                        <td>{{ $immediatereportstos->reportsTo->en_name }}  </td>

                        <td>

                            <form method="POST" action="{!! route('competencylists.competencylist.destroy', $employee) !!}" accept-charset="UTF-8">
                            <input name="_method" value="DELETE" type="hidden">
                            {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">

{{--
                                            @foreach($evaluatedyear as $evaluatedyears)

                                            @if($years->id ==  $evaluatedyears->Yearsetting_id)
                                            <a href="{{ route('competencylists.competencylist.immediateperformance_form_create', ['employee' => $employee->organizationUnitse->reportsTo->org_chairman->employee,  'year' => $years->id] ) }}"
                                                class="btn btn-success" title="Add Performance">
                                                <span class="fa fa-eye text-white" aria-hidden="true"></span>
                                            </a>
                                            @else

                                            <a href="{{ route('competencylists.competencylist.immediateperformance_form_create', ['employee' => $employee->organizationUnitse->reportsTo->org_chairman->employee,  'year' => $years->id] ) }}"
                                                class="btn btn-primary " title="Edit competency list">
                                                <span class="fa fa-plus text-white" aria-hidden="true"></span>
                                            </a>
                                            @endif

                                         @endforeach --}}

                                         {{-- @if(count($evaluatedyear) > 0)
                                         @foreach($evaluatedyear as $evaluatedyears)

                                         @if($years->id ==  $evaluatedyears->Yearsetting_id)
                                         <a href="{{ route('competencylists.competencylist.immediateperformance_form_show', ['employee' => $immediatereportstos->org_chairman->employee,  'year' => $years->id] ) }}"
                                             class="btn btn-success" title="Add Performance">
                                             <span class="fa fa-eye text-white" aria-hidden="true"></span>
                                         </a>
                                         @else

                                         <a href="{{ route('competencylists.competencylist.immediateperformance_form_create', ['employee' => $immediatereportstos->org_chairman->employee,  'year' => $years->id] ) }}"
                                             class="btn btn-primary " title="Edit competency list">
                                             <span class="fa fa-plus text-white" aria-hidden="true"></span>
                                         </a>
                                         @endif

                                      @endforeach
                                      @else
                                      <a href="{{ route('competencylists.competencylist.immediateperformance_form_create', ['employee' => $immediatereportstos->org_chairman->employee,  'year' => $years->id] ) }}"
                                         class="btn btn-primary " title="Edit competency list">
                                         <span class="fa fa-plus text-white" aria-hidden="true"></span>
                                     </a>
                                     @endif --}}

                                     @foreach($evaluatedyear as $evaluatedyears)

                                     @if($immediatereportstos->org_chairman->employee ==  $evaluatedyears->Employee_id)
                                     <a href="{{ route('competencylists.competencylist.immediateperformance_form_show', ['employee' => $immediatereportstos->org_chairman->employee,  'year' => $year->id] ) }}"
                                         class="btn btn-success" title="Add Performance">
                                         <span class="fa fa-eye text-white" aria-hidden="true"></span>
                                     </a>
                                     @else

                                     <a href="{{ route('competencylists.competencylist.immediateperformance_form_create', ['employee' => $immediatereportstos->org_chairman->employee,  'year' => $year->id] ) }}"
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
                            {{-- @endforeach --}}
                            @endforeach
                            @endif

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
