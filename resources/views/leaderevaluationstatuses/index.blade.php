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
                <h4 class="mt-5 mb-5">Leaderevaluationstatuses</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('leaderevaluationstatuses.leaderevaluationstatus.create') }}" class="btn btn-success" title="Create New Leaderevaluationstatus">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($leaderevaluationstatuses) == 0)
            <div class="panel-body text-center">
                <h4>No Leaderevaluationstatuses Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Employee</th>
                            <th>Evaluator</th>
                            <th>Yearsetting</th>
                            <th>Evaluator Type</th>
                            <th>Hr Status</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($leaderevaluationstatuses as $leaderevaluationstatus)
                        <tr>
                            <td>{{ optional($leaderevaluationstatus->employee)->title }}</td>
                            <td>{{ optional($leaderevaluationstatus->evaluator)->id }}</td>
                            <td>{{ optional($leaderevaluationstatus->yearsetting)->created_at }}</td>
                            <td>{{ $leaderevaluationstatus->evaluator_type }}</td>
                            <td>{{ $leaderevaluationstatus->hr_status }}</td>

                            <td>

                                <form method="POST" action="{!! route('leaderevaluationstatuses.leaderevaluationstatus.destroy', $leaderevaluationstatus->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('leaderevaluationstatuses.leaderevaluationstatus.show', $leaderevaluationstatus->id ) }}" class="btn btn-info" title="Show Leaderevaluationstatus">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('leaderevaluationstatuses.leaderevaluationstatus.edit', $leaderevaluationstatus->id ) }}" class="btn btn-primary" title="Edit Leaderevaluationstatus">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Leaderevaluationstatus" onclick="return confirm(&quot;Click Ok to delete Leaderevaluationstatus.&quot;)">
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
            {!! $leaderevaluationstatuses->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection