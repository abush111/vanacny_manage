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
                <h4 class="mt-5 mb-5">Peersevaluations</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('peersevaluations.peersevaluation.create') }}" class="btn btn-success" title="Create New Peersevaluation">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($peersevaluations) == 0)
            <div class="panel-body text-center">
                <h4>No Peersevaluations Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Peersvalue</th>
                            <th>Peers Status</th>
                            <th>Competency</th>
                            <th>Competency Weight Competencylist</th>
                            <th>Employee</th>
                            <th>Peersevaluator</th>
                            <th>Yearsetting</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($peersevaluations as $peersevaluation)
                        <tr>
                            <td>{{ $peersevaluation->peersvalue }}</td>
                            <td>{{ $peersevaluation->peers_status }}</td>
                            <td>{{ optional($peersevaluation->competency)->id }}</td>
                            <td>{{ optional($peersevaluation->competencyWeightCompetencylist)->id }}</td>
                            <td>{{ optional($peersevaluation->employee)->title }}</td>
                            <td>{{ optional($peersevaluation->peersevaluator)->id }}</td>
                            <td>{{ optional($peersevaluation->yearsetting)->from }}</td>

                            <td>

                                <form method="POST" action="{!! route('peersevaluations.peersevaluation.destroy', $peersevaluation->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('peersevaluations.peersevaluation.show', $peersevaluation->id ) }}" class="btn btn-info" title="Show Peersevaluation">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('peersevaluations.peersevaluation.edit', $peersevaluation->id ) }}" class="btn btn-primary" title="Edit Peersevaluation">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Peersevaluation" onclick="return confirm(&quot;Click Ok to delete Peersevaluation.&quot;)">
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
            {!! $peersevaluations->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection