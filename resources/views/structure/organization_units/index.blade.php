@extends('layouts.app')
@section('pagetitle')
{{(__('setting.NewOrganizationUnit'))}}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active"><a href="{{ route('organizations.organization.index') }}">
        {{(__('setting.Organization'))}} </a></li>
<li class="breadcrumb-item active">{{(__('setting.Units'))}}</li>
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{(__('setting.SearchandFilter'))}}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('organization_units.organization_unit.filter') }}" method="POST" accept-charset="UTF-8"
            id="filter_organization_unit_form" name="filter_organization_unit_form" class="form-horizontal">
            {{-- @permission('organization_units-List') --}}
            <div class="row">
                {{ csrf_field() }}
                <div class="form-group col-md-2">
                    <select class="form-control" name="job_category_id" id="job_category_id">
                        <option value="NULL">{{(__('setting.Selectorganizationlocation'))}}</option>
                        @foreach ($jobCategories as $key => $jobCategory)
                        <option value="{{ $key }}">
                            {{ $jobCategory }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <select class="form-control" name="organization_location_id" id="organization_location_id">
                        <option value="NULL">{{(__('setting.Selectorganizationlocation'))}}</option>
                        @foreach ($organizationLocations as $key => $organizationLocation)
                        <option value="{{ $key }}">
                            {{ $organizationLocation }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <input type="text" placeholder={{(__('setting.Name'))}} class="form-control"
                        id="organization_unit_name" name="organization_unit_name">
                </div>
                <div class="form-group col-md-2 d-flex justify-content-between">
                    {{-- @permission('organization_units-Filter') --}}
                    <input type="submit" class="btn btn-success btn-md  mr-3" value={{(__('setting.Filter'))}}>
                    {{-- @endpermission
                    @permission('organization_units-Reset') --}}
                    <a href="{{ route('organization_units.organization_unit.index') }}" class="btn btn-danger mr-5"
                        title="Show All Organization Unit">
                        {{(__('setting.Reset'))}}
                    </a>
                    {{-- @endpermission --}}
                </div>
            </div>
            {{-- @endpermission --}}
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{(__('setting.NewOrganizationUnit'))}}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    {{-- @permission('setting_OrganizationLocation-List') --}}
    <div class="card-body">
        @if (count($organizationUnits) == 0)
        <h4 class="text-center">{{(__('setting.NoOrganizationfound.'))}}</h4>
        @else
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>{{(__('setting.Number'))}}</th>
                    <th>{{(__('setting.EnglishName'))}}</th>
                    <th>{{(__('setting.Chairman'))}}</th>
                    <th>{{(__('setting.Location'))}}</th>
                    <th class="text-center">{{(__('setting.Actions'))}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($organizationUnits as $organizationUnit)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $organizationUnit->en_name }}</td>
                    <td>{{ optional($organizationUnit->org_chairman)->name }}</td>
                    <td>{{ optional($organizationUnit->locations)->name }}</td>
                    <td>
                        <div class="d-flex justify-content-between">
                            {{-- @permission('organization_units-Offices') --}}
                            <a href="{{ route('organization_units.organization_unit.offices', $organizationUnit->id) }}"
                                class="btn btn-outline-danger btn-sm" title="Show Sub Offices">
                                Offices
                            </a>
                            {{-- @endpermission
                            @permission('organization_units-Employes') --}}
                            <a href="{{ route('organization_units.organization_unit.employee', $organizationUnit->id) }}"
                                class="btn btn-outline-primary btn-sm" title="Show Employees">
                                Employees
                            </a>
                            {{-- @endpermission
                            @permission('organization_units-Jobs') --}}
                            <a href="{{ route('organization_units.organization_unit.jobs', $organizationUnit->id) }}"
                                class="btn btn-outline-success btn-sm" title="Show Jobs">
                                Jobs
                            </a>
                            {{-- @endpermission
                            @permission('organization_units-Details') --}}
                            <a href="{{ route('organization_units.organization_unit.show', $organizationUnit->id) }}"
                                class="btn btn-outline-warning btn-sm" title="Show Organization Unit">
                                Details
                            </a>
                            {{-- @endpermission --}}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $organizationUnits->render() !!}
        @endif
    </div>
    {{-- @endpermission --}}
</div>
@if (count($organizations) > 0)
{{-- @permission('organization_units-AddNew') --}}
<a href="{{ route('organization_units.organization_unit.create') }}" class="btn btn-success"
    title="Create New Organization Unit">
    <span class="fa fa-plus" aria-hidden="true"> {{(__('setting.AddNew'))}}</span>
</a>
{{-- @endpermission --}}
@endif
@endsection
