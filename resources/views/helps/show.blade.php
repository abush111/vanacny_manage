@extends('layouts.app')
@section('pagetitle')
    {{ $help->title }} {{(__('setting.Helps'))}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('helps.help.index') }}">{{(__('setting.Helps'))}}</a></li>
    <li class="breadcrumb-item active">{{(__('setting.view'))}}</li>
@endsection
@section('content')
@permission('setting_Helps-Show')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $help->title }}</h3>
            <div class="card-tools">
                <form method="POST" action="{!! route('helps.help.destroy', $help->id) !!}" accept-charset="UTF-8">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        @permission('setting_Helps-Edit')
                        <a href="{{ route('helps.help.edit', $help->id) }}" class="btn btn-warning" title="Edit Help">
                            <span class="fa fa-edit" aria-hidden="true"></span>
                        </a>
                        @endpermission
                        @permission('setting_Helps-Delete')
                        <button type="submit" class="btn btn-danger" title="Delete Help"
                            onclick="return confirm(&quot;Click Ok to delete Help.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                        @endpermission
                    </div>
                </form>
                </button>
            </div>
        </div>
        <div class="card-body">
            <dl class="dl-horizontal">
                <div class="row">
                    @if (isset($help->description))
                        <div class="col-md-4">
                            <dt>{{(__('setting.Description'))}}</dt>
                            <dd>{{ $help->description }}</dd>
                        </div>
                    @endif
                    <div class="col-md-3">
                        <dt>{{(__('setting.Topic For'))}}</dt>
                        <dd>{{ $help->topic_for }}</dd>
                    </div>
                    @if (isset($help->parent))
                        <div class="col-md-2">
                            <dt>{{(__('setting.Parent'))}}</dt>
                            <dd>{{ optional($help->helpes)->id }}</dd>
                        </div>
                    @endif
                    <div class="col-md-2">
                        <dt>{{(__('setting.Language'))}}</dt>
                        <dd>{{ optional($help->languagers)->name }}</dd>
                    </div>
                </div>
                <hr>
                <dt>{{(__('setting.Data'))}}</dt>
                <dd>{!! $help->data !!}</dd>
            </dl>
        </div>
    </div>
    @endpermission
@endsection
