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
                <h4 class="mt-5 mb-5">Immediateevaluations</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('immediateevaluations.immediateevaluation.create') }}" class="btn btn-success" title="Create New Immediateevaluation">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($immediateevaluations) == 0)
            <div class="panel-body text-center">
                <h4>No Immediateevaluations Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Immediateevalue</th>
                            <th>Immediate Status</th>
                            <th>Competency</th>
                            <th>Competency Weight Competencylist</th>
                            <th>Employee</th>
                            <th>Immediateevaluator</th>
                            <th>Yearsetting</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($immediateevaluations as $immediateevaluation)
                        <tr>
                            <td>{{ $immediateevaluation->immediateevalue }}</td>
                            <td>{{ $immediateevaluation->immediate_status }}</td>
                            <td>{{ optional($immediateevaluation->competency)->id }}</td>
                            <td>{{ optional($immediateevaluation->competencyWeightCompetencylist)->id }}</td>
                            <td>{{ optional($immediateevaluation->employee)->title }}</td>
                            <td>{{ optional($immediateevaluation->immediateevaluator)->id }}</td>
                            <td>{{ optional($immediateevaluation->yearsetting)->from }}</td>

                            <td>

                                <form method="POST" action="{!! route('immediateevaluations.immediateevaluation.destroy', $immediateevaluation->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('immediateevaluations.immediateevaluation.show', $immediateevaluation->id ) }}" class="btn btn-info" title="Show Immediateevaluation">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('immediateevaluations.immediateevaluation.edit', $immediateevaluation->id ) }}" class="btn btn-primary" title="Edit Immediateevaluation">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Immediateevaluation" onclick="return confirm(&quot;Click Ok to delete Immediateevaluation.&quot;)">
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
            {!! $immediateevaluations->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection