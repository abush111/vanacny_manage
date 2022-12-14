@extends('layouts.app')
@section('pagetitle')
{{__('setting.Helps')}}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active">{{__('setting.Helps')}}</li>
@endsection
@section('content')
@permission('setting_Helps-List')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{__('setting.SearchandFilter')}}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('helps.help.filter') }}" method="POST" accept-charset="UTF-8" id="filter_help_form"
            name="filter_help_form" class="form-horizontal">
            <div class="row">
                {{ csrf_field() }}
                <div class="form-group col-md-2">
                    <select class="form-control" name="language" id="language">
                        <option value="NULL">{{(__('setting.SelectLanguage'))}}</option>
                        @foreach ($languages as $key => $language)
                        <option value="{{ $key }}">
                            {{ $language }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <select class="form-control" name="parent_id" id="parent_id">
                        <option value="NULL">{{(__('setting.SelectParent'))}}</option>
                        @foreach ($helpers as $key => $helper)
                        <option value="{{ $key }}">
                            {{ $helper }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" placeholder="enter title here" class="form-control" id="title" name="title">
                </div>
                <div class="form-group col-md-2 d-flex justify content-between">
                    <input type="submit" class="btn btn-success btn-md  mr-3" value="Filter">
                    <a href="{{ route('helps.help.index') }}" class="btn btn-danger mr-5" title="Show All Helps">
                        {{(__('setting.Reset'))}}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{(__('setting.HelpsList'))}}</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        @if (count($helps) == 0)
        <h4 class="text-center">{{(__('setting.NoHelpsAvailable'))}}.</h4>
        @else
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>{{(__('setting.Number'))}}</th>
                    <th>{{(__('setting.Title'))}}</th>
                    <th>{{(__('setting.TopicFor'))}}</th>
                    <th>{{(__('setting.Language'))}}</th>
                    <th>{{(__('setting.Actions'))}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($helps as $help)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $help->title }}</td>
                    <td>{{ $help->topic_for }}</td>
                    <td>{{ optional($help->languagers)->name }}</td>

                    <td>
                        <form method="POST" action="{!! route('helps.help.destroy', $help->id) !!}"
                            accept-charset="UTF-8">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs pull-right" role="group">
                                @permission('setting_Helps-Show')
                                <a href="{{ route('helps.help.show', $help->id) }}" class="btn btn-primary"
                                    title="Show Help">
                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                </a>
                                @endpermission
                                @permission('setting_Helps-Edit')
                                <a href="{{ route('helps.help.edit', $help->id) }}" class="btn btn-warning"
                                    title="Edit Help">
                                    <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                </a>
                                @endpermission
                                @permission('setting_Helps-Delete')
                                <button type="submit" class="btn btn-danger" title="Delete Help"
                                    onclick="return confirm(&quot;Click Ok to delete Help.&quot;)">
                                    <span class="fa fa-trash" aria-hidden="true"></span>
                                </button>
                                @endpermission
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-2">
            {{ $helps->links() }}
        </div>
        @endif
    </div>
</div>
@permission('setting_Helps-AddNew')
<a href="{{ route('helps.help.create') }}" class="btn btn-success" title="Create New Help">
    <span class="fa fa-plus" aria-hidden="true"> {{(__('setting.AddNew'))}}</span>
</a>
@endpermission
{{-- do not delete the line beow as it is not a duplicate --}}
@endpermission
@endsection
