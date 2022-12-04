@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Immediateevaluation' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('immediateevaluations.immediateevaluation.destroy', $immediateevaluation->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('immediateevaluations.immediateevaluation.index') }}" class="btn btn-primary" title="Show All Immediateevaluation">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('immediateevaluations.immediateevaluation.create') }}" class="btn btn-success" title="Create New Immediateevaluation">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('immediateevaluations.immediateevaluation.edit', $immediateevaluation->id ) }}" class="btn btn-primary" title="Edit Immediateevaluation">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Immediateevaluation" onclick="return confirm(&quot;Click Ok to delete Immediateevaluation.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Immediateevalue</dt>
            <dd>{{ $immediateevaluation->immediateevalue }}</dd>
            <dt>Immediate Status</dt>
            <dd>{{ $immediateevaluation->immediate_status }}</dd>
            <dt>Competency</dt>
            <dd>{{ optional($immediateevaluation->competency)->id }}</dd>
            <dt>Competency Weight Competencylist</dt>
            <dd>{{ optional($immediateevaluation->competencyWeightCompetencylist)->id }}</dd>
            <dt>Employee</dt>
            <dd>{{ optional($immediateevaluation->employee)->title }}</dd>
            <dt>Immediateevaluator</dt>
            <dd>{{ optional($immediateevaluation->immediateevaluator)->id }}</dd>
            <dt>Yearsetting</dt>
            <dd>{{ optional($immediateevaluation->yearsetting)->from }}</dd>

        </dl>

    </div>
</div>

@endsection