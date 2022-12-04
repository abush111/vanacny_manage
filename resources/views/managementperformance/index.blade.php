@extends('layouts.app')
@section('pagetitle')
{{(__('setting.performance'))}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">{{(__('setting.performance'))}}</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h4>{{__('setting.Employees')}}</h4>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="fas">##</i>
                </div>
                <a href="{{ route('competencylists.competencylist.performance_form_list', ['employee' => $employee]) }}" class="small-box-footer">
                    {{(__("setting.Configure"))}} <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h4>{{__('setting.equivalent')}}</h4>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="fas">##</i>
                </div>
                <a href="{{ route('competencylists.competencylist.equiperformance_form_list', ['employee' => $employee]) }}" class="small-box-footer">
                    {{(__("setting.Configure"))}} <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h4>{{__('setting.director')}}</h4>
                    <p>&nbsp;</p>
                </div>
                <div class="icon">
                    <i class="fas">###</i>
                </div>
                <a href="{{ route('competencylists.competencylist.immediateperformance_form_list', ['employee' => $employee]) }}" class="small-box-footer">
                    {{(__("setting.Configure"))}} <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>
    @endsection
