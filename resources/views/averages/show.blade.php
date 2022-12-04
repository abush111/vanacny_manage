@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Average' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('averages.average.destroy', $average->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('averages.average.index') }}" class="btn btn-primary" title="Show All Average">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('averages.average.create') }}" class="btn btn-success" title="Create New Average">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('averages.average.edit', $average->id ) }}" class="btn btn-primary" title="Edit Average">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Average" onclick="return confirm(&quot;Click Ok to delete Average.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Average Value</dt>
            <dd>{{ $average->average_value }}</dd>
            <dt>Evaluation Type</dt>
            <dd>{{ $average->evaluation_type }}</dd>
            <dt>Employee</dt>
            <dd>{{ optional($average->employee)->title }}</dd>
            <dt>Yearsetting</dt>
            <dd>{{ optional($average->yearsetting)->from }}</dd>

        </dl>

    </div>
</div>

@endsection