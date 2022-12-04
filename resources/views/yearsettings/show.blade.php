@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Yearsetting' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('yearsettings.yearsetting.destroy', $yearsetting->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('yearsettings.yearsetting.index') }}" class="btn btn-primary" title="Show All Yearsetting">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('yearsettings.yearsetting.create') }}" class="btn btn-success" title="Create New Yearsetting">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('yearsettings.yearsetting.edit', $yearsetting->id ) }}" class="btn btn-primary" title="Edit Yearsetting">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Yearsetting" onclick="return confirm(&quot;Click Ok to delete Yearsetting.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ __('setting.from') }}</dt>
            <dd>{{ $yearsetting->from }}</dd>
            <dt>{{ __('setting.to') }}</dt>
            <dd>{{ $yearsetting->to }}</dd>

        </dl>

    </div>
</div>

@endsection
