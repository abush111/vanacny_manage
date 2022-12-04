




@extends('layouts.app')
@section('pagetitle')
    {{ __('setting.year_setting') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('setting.year_setting') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('setting.year_setting') }}</h3>
        </div>

        <div class="card-body">

            @if(count($yearsettings) == 0)
                <h4 class="text-center">{{ __('setting.year_settingAvailable') }}.</h4>
            @else
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>  {{ __('setting.Number') }}</th>
                            <th>{{ __('setting.from') }}</th>
                            <th>{{ __('setting.to') }}</th>

                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($yearsettings as $yearsetting)

                       <tr>
                        <td>{{ $loop->iteration }}</td>
                            <td>{{ $yearsetting->from }}</td>
                            <td>{{ $yearsetting->to }}</td>

                            <td>

                                <form method="POST" action="{!! route('yearsettings.yearsetting.destroy', $yearsetting->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs pull-right" role="group">


                                            <a href="{{ route('yearsettings.yearsetting.edit', $yearsetting->id ) }}"
                                                class="btn btn-warning" title="Edit competency list">
                                                <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                            </a>


                                            <button type="submit" class="btn btn-danger" title="Delete Competency List" onclick="return confirm(&quot;Click Ok to delete yearsetting.&quot;)">
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
                {{ $yearsettings->links() }}
            </div>


        </div>
    </div>

    <a href="{{ route('yearsettings.yearsetting.create') }}"  class="btn btn-success mr-2" title="Add New year settings">
        <span class="fa fa-plus" aria-hidden="true"> {{ __('setting.Addyear_setting') }}</span>
    </a>



@endsection
