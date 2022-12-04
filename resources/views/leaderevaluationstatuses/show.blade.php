@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Leaderevaluationstatus' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('leaderevaluationstatuses.leaderevaluationstatus.destroy', $leaderevaluationstatus->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('leaderevaluationstatuses.leaderevaluationstatus.index') }}" class="btn btn-primary" title="Show All Leaderevaluationstatus">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('leaderevaluationstatuses.leaderevaluationstatus.create') }}" class="btn btn-success" title="Create New Leaderevaluationstatus">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('leaderevaluationstatuses.leaderevaluationstatus.edit', $leaderevaluationstatus->id ) }}" class="btn btn-primary" title="Edit Leaderevaluationstatus">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Leaderevaluationstatus" onclick="return confirm(&quot;Click Ok to delete Leaderevaluationstatus.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Employee</dt>
            <dd>{{ optional($leaderevaluationstatus->employee)->title }}</dd>
            <dt>Evaluator</dt>
            <dd>{{ optional($leaderevaluationstatus->evaluator)->id }}</dd>
            <dt>Yearsetting</dt>
            <dd>{{ optional($leaderevaluationstatus->yearsetting)->created_at }}</dd>
            <dt>Evaluator Type</dt>
            <dd>{{ $leaderevaluationstatus->evaluator_type }}</dd>
            <dt>Hr Status</dt>
            <dd>{{ $leaderevaluationstatus->hr_status }}</dd>

        </dl>

    </div>
</div>

@endsection