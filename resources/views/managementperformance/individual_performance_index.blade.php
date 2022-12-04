

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
                            <th>{{ __('setting.from') }}</th>
                            <th>{{ __('setting.to') }}</th>
                            <th>{{ __('setting.level') }}</th>
                            <th>{{ __('setting.performance') }}</th>


                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if($employee->organizationUnitse->chairman == Auth::user()->id ) --}}
                        @foreach($performance as $performances)
                        {{-- @foreach($year as $years) --}}
                        <tr>
                        <td>1</td>
                        <td>{{ $performances->employee->en_name }} </td>
                        <td>{{$performances->yearsetting->from }} </td>
                        <td>{{$performances->yearsetting->to }} </td>
                        <td>{{ $performances->level->name }}  </td>
                        <td>
                            @php
                            $total=$performances->bsc_value + $performances->competency_value;
                        @endphp
                            {{ $total}}  </td>
                        <td>

                            
                                </td>
                            </tr>
                            {{-- @endforeach --}}
                            @endforeach
                            {{-- @endif --}}

                    </tbody>
                </table>
            {{-- @endif --}}
            <div class="d-flex justify-content-center mt-2">

            </div>
        </div>
    </div>

@endsection
