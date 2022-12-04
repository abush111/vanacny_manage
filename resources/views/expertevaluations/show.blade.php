@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Expertevaluation' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('expertevaluations.expertevaluation.destroy', $expertevaluation->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('expertevaluations.expertevaluation.index') }}" class="btn btn-primary" title="Show All Expertevaluation">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('expertevaluations.expertevaluation.create') }}" class="btn btn-success" title="Create New Expertevaluation">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('expertevaluations.expertevaluation.edit', $expertevaluation->id ) }}" class="btn btn-primary" title="Edit Expertevaluation">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Expertevaluation" onclick="return confirm(&quot;Click Ok to delete Expertevaluation.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Value</dt>
            <dd>{{ $expertevaluation->value }}</dd>
            <dt>Evaluation Status</dt>
            <dd>{{ $expertevaluation->evaluation_status }}</dd>
            <dt>Competency</dt>
            <dd>{{ optional($expertevaluation->competency)->id }}</dd>
            <dt>Competency Weight Competencylist</dt>
            <dd>{{ optional($expertevaluation->competencyWeightCompetencylist)->id }}</dd>
            <dt>Employee</dt>
            <dd>{{ optional($expertevaluation->employee)->title }}</dd>
            <dt>Evaluator</dt>
            <dd>{{ optional($expertevaluation->evaluator)->id }}</dd>
            <dt>Yearsetting</dt>
            <dd>{{ optional($expertevaluation->yearsetting)->from }}</dd>

        </dl>

    </div>
</div>

@endsection