@extends('layouts.app')
@section('pagetitle')
{{ $employees->en_name }}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active"><a href="{{ route('organization_units.organization_unit.index') }}">
        {{(__('setting.Units'))}}</a></li>
<li class="breadcrumb-item active">{{(__('setting.View'))}}</li>
@endsection
@section('content')
@if($count_three== $count_evaluators)
<div class="card card-primary">
    <div class="card-header clearfix">
        <h4 class="card-title">የቅርብ ሃላፊ</h4>
        <div class="card-tools">
            {{-- <form method="POST"
                action="{!! route('organization_units.organization_unit.destroy', $organizationUnit->id) !!}"
                accept-charset="UTF-8">
                @method('DELETE')
                {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">

                    <a href="{{ route('organization_units.organization_unit.edit', $organizationUnit->id) }}"
                        class="btn btn-warning" title="Edit Organization Unit">
                        <span class="fa fa-edit" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Organization Unit"
                        onclick="return confirm(&quot;Click Ok to delete Organization Unit.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>

                </div>
            </form> --}}
        </div>
    </div>

    <div class="card-body">

        <dl class="dl-horizontal">

            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>  #</th>
                      <th>  {{ __('setting.Name') }}</th>
                        <th>{{ __('setting.OrganizationUnit') }}</th>
                        <th>Status</th>
                       

                    </tr>
                </thead>
                <tbody>


                        <tr>

                            <td>1</td>
                            <td>{{ $employees->organizationUnitse->reportsTo->org_chairman->name }}</td>
                            <td>{{$employees->organizationUnitse->reportsTo->en_name }} </td>

                            @if ($evaluators->contains('evaluator_id', $employees->organizationUnitse->reportsTo->org_chairman->employee))
                            <td>{{ $immediateevaluation}}</td>
                            @else
                            <td>no </td>
                            @endif

                             
                                </tr>

                </tbody>
            </table>
            @if ($evaluators->contains('evaluator_id', $employees->organizationUnitse->reportsTo->org_chairman->employee))
            <a href="" class="btn btn-success"
            title="Create New Organization Unit">
            <span  aria-hidden="true"> የቅርብ ሃላፊ (0.55)= {{ $immediatemult }}</span>
            </a>
                   @endif
        </dl>

    </div>

</div>

<div class="card card-primary">
    <div class="card-header clearfix">
        <h4 class="card-title">እኩዪች</h4>
        <div class="card-tools">

        </div>
    </div>

    <div class="card-body">

        <dl class="dl-horizontal">
            @if (count($equivalentreportsto) == 0)
                <h4 class="text-center">{{(__('employee.No Judiciary Punishments Available'))}}.</h4>
            @else
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>  #</th>
                      <th>  {{ __('setting.Name') }}</th>
                        <th>{{ __('setting.OrganizationUnit') }}</th>
                        <th>Status</th>
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach($equivalentreportsto as $equivalentreportstos)

                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $equivalentreportstos->org_chairman->name }}</td>
                            <td>{{$equivalentreportstos->en_name }} </td>
                            @php
                            $equsum=0;
                        @endphp
                   @foreach ($equivalentevaluations as $equivalentevaluationss)
                    @if($equivalentevaluationss->peersevaluator_id== $equivalentreportstos->org_chairman->employee)
                         @php
                            $equsum+=$equivalentevaluationss->peersvalue;
                        @endphp
                    @endif
                   @endforeach
                            @if ($evaluators->contains('evaluator_id', $equivalentreportstos->org_chairman->employee))
                            <td>{{ $equsum }}</td>
                            @else
                            <td>no </td>
                            @endif
                          

                                </tr>
                                @endforeach
                </tbody>
            </table>
            @if ($evaluators->contains('evaluator_id', $equivalentreportstos->org_chairman->employee))
            @php
                $equtotalcount=count($equivalentreportsto);
                $equtotalsum=$equivalentevaluations->sum('peersvalue');
                $equaverage=$equtotalsum/$equtotalcount;
                $equmulti=0.25*$equaverage;
            @endphp
            <a href="" class="btn btn-success"
            title="Create New Organization Unit">
            <span  aria-hidden="true"> የእኩዮች አማካይ={{ $equaverage}}</span>
            </a>
            <a href="" class="btn btn-success"
            title="Create New Organization Unit">
            <span  aria-hidden="true"> የእኩዮች (0.25)={{ $equmulti}}</span>
            </a>
            @endif
            @endif
        </dl>

    </div>

</div>

<div class="card card-primary">
    <div class="card-header clearfix">
        <h4 class="card-title">ሰራተኞች</h4>
        <div class="card-tools">

        </div>
    </div>

    <div class="card-body">

        <dl class="dl-horizontal">
            @if (count($immediatereportsto) == 0)
            <h4 class="text-center">{{(__('employee.No Judiciary Punishments Available'))}}.</h4>
        @else

                       <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>  #</th>
                              <th>  {{ __('setting.Name') }}</th>
                                <th>{{ __('setting.OrganizationUnit') }}</th>
                                <th>Status</th>
                               

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($immediatereportsto as $immediatereportstos)

                                <tr>

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $immediatereportstos->org_chairman->name }}</td>
                                    <td>{{$immediatereportstos->en_name }} </td>
                                    @php
                                        $exsum=0;
                                    @endphp
                               @foreach ($expertevaluation as $expertevaluations)
                                @if($expertevaluations->evaluator_id== $immediatereportstos->org_chairman->employee)
                                     @php
                                        $exsum+=$expertevaluations->value;
                                    @endphp
                                @endif
                               @endforeach

                            @if ($evaluators->contains('evaluator_id', $immediatereportstos->org_chairman->employee))
                            <td>{{ $exsum }} </td>
                            @else
                            <td>no </td>
                            @endif
                                    
                                        </tr>
                                        @endforeach
                        </tbody>
                    </table>
                    @if ($evaluators->contains('evaluator_id', $immediatereportstos->org_chairman->employee))
                    @php
                    $exptotalcount=count($immediatereportsto);
                    $exptotalsum=$expertevaluation->sum('value');
                    $expaverage=$exptotalsum/$exptotalcount;
                    $expmulti=0.2*$expaverage;
                @endphp
                    <a href="" class="btn btn-success"
                    title="Create New Organization Unit">
                    <span  aria-hidden="true"> የሰራተኞች አማካይ =={{ $expaverage }}, የሰራተኞች (0.2)=={{ $expmulti }}</span>
                    </a>
                 @endif
                 @if($performance != null)
                 @php
                     $total=$performance->bsc_value + $performance->competency_value;
                 @endphp
                   
                     <a href="" class="btn btn-primary">
                     <span  aria-hidden="true"> የአመራር አፈፃፀም =={{ $total }},{{$performance->level->name}} </span>
                     </a>
                     @endif
        </dl>

    </div>

</div>

@php

$totalsum=$expmulti+$equmulti+$immediatemult;
@endphp
@endif
@if($performance == null)
<form method="POST" action="{{ route('competencylists.competencylist.final_performance') }}" accept-charset="UTF-8"
id="create_employee_certification_form" class="form-horizontal" enctype="multipart/form-data">
{{ csrf_field() }}

<a href="" class="btn btn-success"
title="Create New Organization Unit">
<span  aria-hidden="true"> 40%=={{ $totalsum }}</span>
</a>
<input type="text" name="bscvalue">
<input type="hidden" value="{{ $totalsum }}" name="compvalue">
<input type="hidden" value="1" name="type">
{{-- <input type="hidden" value="1" name="level"> --}}
<input type="hidden" value="{{ $evaluatedyear->id }}"name="YS" >
<input type="hidden" value="{{$employees->id  }}" name="empid" >
<div class="form-group">
    <div class="col-md-offset-2 col-md-12 text-center">
        <input class="btn btn-primary mr-5" type="submit" value="{{ __('setting.save') }}">

    </div>
</div>
</form>
@endif

@else

<div class="card card-primary">
    <div class="card-header clearfix">
        <h4 class="card-title">የቅርብ ሃላፊ</h4>
        <div class="card-tools">
            
        </div>
    </div>

    <div class="card-body">

        <dl class="dl-horizontal">

            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>  #</th>
                      <th>  {{ __('setting.Name') }}</th>
                        <th>{{ __('setting.OrganizationUnit') }}</th>
                        <th>Status</th>
                       

                    </tr>
                </thead>
                <tbody>


                        <tr>

                            <td>1</td>
                            <td>{{ $employees->organizationUnitse->reportsTo->org_chairman->name }}</td>
                            <td>{{$employees->organizationUnitse->reportsTo->en_name }} </td>

                            @if ($evaluators->contains('evaluator_id', $employees->organizationUnitse->reportsTo->org_chairman->employee))
                            <td>{{ $immediateevaluation}}</td>
                            @else
                            <td>no </td>
                            @endif

                           

                                </tr>

                </tbody>
            </table>
           
        </dl>

    </div>

</div>


<div class="card card-primary">
    <div class="card-header clearfix">
        <h4 class="card-title">እኩዪች</h4>
        <div class="card-tools">

        </div>
    </div>

    <div class="card-body">

        <dl class="dl-horizontal">
            @if (count($equivalentreportsto) == 0)
                <h4 class="text-center">{{(__('setting.No Peer employees'))}}.</h4>
            @else
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>  #</th>
                      <th>  {{ __('setting.Name') }}</th>
                        <th>{{ __('setting.OrganizationUnit') }}</th>
                        <th>Status</th>
                       

                    </tr>
                </thead>
                <tbody>
                    @foreach($equivalentreportsto as $equivalentreportstos)

                        <tr>

                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $equivalentreportstos->org_chairman->name }}</td>
                            <td>{{$equivalentreportstos->en_name }} </td>
                            @php
                            $equsum=0;
                        @endphp
                   @foreach ($equivalentevaluations as $equivalentevaluationss)
                    @if($equivalentevaluationss->peersevaluator_id== $equivalentreportstos->org_chairman->employee)
                         @php
                            $equsum+=$equivalentevaluationss->peersvalue;
                        @endphp
                    @endif
                   @endforeach
                            @if ($evaluators->contains('evaluator_id', $equivalentreportstos->org_chairman->employee))
                            <td>{{ $equsum }}</td>
                            @else
                            <td>no </td>
                            @endif
                          

                                </tr>
                                @endforeach
                </tbody>
            </table>
           
            @endif
        </dl>

    </div>

</div>

<div class="card-body">

    <dl class="dl-horizontal">
        @if (count($immediatereportsto) == 0)
        <h4 class="text-center">{{(__('setting.NO Employees'))}}.</h4>
    @else

                   <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>  #</th>
                          <th>  {{ __('setting.Name') }}</th>
                            <th>{{ __('setting.OrganizationUnit') }}</th>
                            <th>Status</th>
                           

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($immediatereportsto as $immediatereportstos)

                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $immediatereportstos->org_chairman->name }}</td>
                                <td>{{$immediatereportstos->en_name }} </td>
                                @php
                                    $exsum=0;
                                @endphp
                           @foreach ($expertevaluation as $expertevaluations)
                            @if($expertevaluations->evaluator_id== $immediatereportstos->org_chairman->employee)
                                 @php
                                    $exsum+=$expertevaluations->value;
                                @endphp
                            @endif
                           @endforeach

                        @if ($evaluators->contains('evaluator_id', $immediatereportstos->org_chairman->employee))
                        <td>{{ $exsum }} </td>
                        @else
                        <td>no </td>
                        @endif
                               
                                    </tr>
                                    @endforeach
                    </tbody>
                </table>
               
             
    </dl>

</div>

</div>


@endif
@endif
@endsection
