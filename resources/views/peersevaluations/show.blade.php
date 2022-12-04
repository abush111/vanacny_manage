@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Peersevaluation' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('peersevaluations.peersevaluation.destroy', $peersevaluation->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('peersevaluations.peersevaluation.index') }}" class="btn btn-primary" title="Show All Peersevaluation">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('peersevaluations.peersevaluation.create') }}" class="btn btn-success" title="Create New Peersevaluation">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('peersevaluations.peersevaluation.edit', $peersevaluation->id ) }}" class="btn btn-primary" title="Edit Peersevaluation">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Peersevaluation" onclick="return confirm(&quot;Click Ok to delete Peersevaluation.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Peersvalue</dt>
            <dd>{{ $peersevaluation->peersvalue }}</dd>
            <dt>Peers Status</dt>
            <dd>{{ $peersevaluation->peers_status }}</dd>
            <dt>Competency</dt>
            <dd>{{ optional($peersevaluation->competency)->id }}</dd>
            <dt>Competency Weight Competencylist</dt>
            <dd>{{ optional($peersevaluation->competencyWeightCompetencylist)->id }}</dd>
            <dt>Employee</dt>
            <dd>{{ optional($peersevaluation->employee)->title }}</dd>
            <dt>Peersevaluator</dt>
            <dd>{{ optional($peersevaluation->peersevaluator)->id }}</dd>
            <dt>Yearsetting</dt>
            <dd>{{ optional($peersevaluation->yearsetting)->from }}</dd>

        </dl>

    </div>
</div>

@endsection