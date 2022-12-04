@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Employeecompetency' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('employeecompetencies.employeecompetency.destroy', $employeecompetency->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('employeecompetencies.employeecompetency.index') }}" class="btn btn-primary" title="Show All Employeecompetency">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('employeecompetencies.employeecompetency.create') }}" class="btn btn-success" title="Create New Employeecompetency">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('employeecompetencies.employeecompetency.edit', $employeecompetency->id ) }}" class="btn btn-primary" title="Edit Employeecompetency">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Employeecompetency" onclick="return confirm(&quot;Click Ok to delete Employeecompetency.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Employeecompetency Name</dt>
            <dd>{{ $employeecompetency->employeecompetency_name }}</dd>
            <dt>Employee Competency Description</dt>
            <dd>{{ $employeecompetency->employee_competency_description }}</dd>

        </dl>

    </div>
</div>

@endsection