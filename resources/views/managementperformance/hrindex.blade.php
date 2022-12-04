

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

            {{-- @if(count($employee) == 0)
                <h4 class="text-center">{{ __('setting.leadershipformAvailable') }}.</h4>
            @else --}}
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

                        @foreach($organization as $organizations)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $organizations->org_chairman->user_employee->en_name }}</td>
                            <td>{{$organizations->en_name }}</td>
                            <td>{{ $organizations->parents->en_name }}</td>
                            <td>{{ $year->from  }}</td>
                            <td>{{ $year->to  }}</td>
                        <td>

                            <form method="POST" action="{!! route('competencylists.competencylist.destroy', $organizations) !!}" accept-charset="UTF-8">
                            <input name="_method" value="DELETE" type="hidden">
                            {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">

                                            <a href="{{ route('competencylists.competencylist.hrperformance_form_list_detail', ['employee' => $organizations->org_chairman->user_employee->id,  'year' => $year->id] ) }}"
                                                class="btn btn-success" title="Add Performance">
                                                <span class="fa fa-eye text-white" aria-hidden="true"></span>
                                            </a>


                                        </div>
                                    </form>

                                </td>
                            </tr>

                            @endforeach

                    </tbody>
                </table>
            {{-- @endif --}}
            <div class="d-flex justify-content-center mt-2">

            </div>


        </div>
    </div>




@endsection
