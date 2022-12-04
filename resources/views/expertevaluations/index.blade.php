@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Expertevaluations</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('expertevaluations.expertevaluation.create') }}" class="btn btn-success" title="Create New Expertevaluation">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($expertevaluations) == 0)
            <div class="panel-body text-center">
                <h4>No Expertevaluations Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Value</th>
                            <th>Evaluation Status</th>
                            <th>Competency</th>
                            <th>Competency Weight Competencylist</th>
                            <th>Employee</th>
                            <th>Evaluator</th>
                            <th>Yearsetting</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($expertevaluations as $expertevaluation)
                        <tr>
                            <td>{{ $expertevaluation->value }}</td>
                            <td>{{ $expertevaluation->evaluation_status }}</td>
                            <td>{{ optional($expertevaluation->competency)->id }}</td>
                            <td>{{ optional($expertevaluation->competencyWeightCompetencylist)->id }}</td>
                            <td>{{ optional($expertevaluation->employee)->title }}</td>
                            <td>{{ optional($expertevaluation->evaluator)->id }}</td>
                            <td>{{ optional($expertevaluation->yearsetting)->from }}</td>

                            <td>

                                <form method="POST" action="{!! route('expertevaluations.expertevaluation.destroy', $expertevaluation->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('expertevaluations.expertevaluation.show', $expertevaluation->id ) }}" class="btn btn-info" title="Show Expertevaluation">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('expertevaluations.expertevaluation.edit', $expertevaluation->id ) }}" class="btn btn-primary" title="Edit Expertevaluation">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Expertevaluation" onclick="return confirm(&quot;Click Ok to delete Expertevaluation.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $expertevaluations->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection