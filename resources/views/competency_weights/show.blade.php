@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Competency Weight' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('competency_weights.competency_weight.destroy', $competencyWeight->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('competency_weights.competency_weight.index') }}" class="btn btn-primary" title="Show All Competency Weight">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('competency_weights.competency_weight.create') }}" class="btn btn-success" title="Create New Competency Weight">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('competency_weights.competency_weight.edit', $competencyWeight->id ) }}" class="btn btn-primary" title="Edit Competency Weight">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Competency Weight" onclick="return confirm(&quot;Click Ok to delete Competency Weight.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ __('setting.weight') }}</dt>
            <dd>{{ $competencyWeight->Weight_value }}</dd>
            <dt>{{ __('setting.competency') }}</dt>
            <dd>{{ optional($competencyWeight->competency)->title }}</dd>

        </dl>

    </div>
</div>

@endsection
