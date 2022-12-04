@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Competency Weight Competencylist' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('competency_weight_competencylists.competency_weight_competencylist.destroy', $competencyWeightCompetencylist->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('competency_weight_competencylists.competency_weight_competencylist.index') }}" class="btn btn-primary" title="Show All Competency Weight Competencylist">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('competency_weight_competencylists.competency_weight_competencylist.create') }}" class="btn btn-success" title="Create New Competency Weight Competencylist">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('competency_weight_competencylists.competency_weight_competencylist.edit', $competencyWeightCompetencylist->id ) }}" class="btn btn-primary" title="Edit Competency Weight Competencylist">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Competency Weight Competencylist" onclick="return confirm(&quot;Click Ok to delete Competency Weight Competencylist.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ __('setting.weight') }}</dt>
            <dd>{{ $competencyWeightCompetencylist->listWeight_value }}</dd>
            <dt>{{ __('setting.competency') }}</dt>
            <dd>{{ optional($competencyWeightCompetencylist->competency)->title }}</dd>
            <dt>{{ __('setting.competency_listname') }}</dt>
            <dd>{{ optional($competencyWeightCompetencylist->competencylist)->created_at }}</dd>

        </dl>

    </div>
</div>

@endsection
