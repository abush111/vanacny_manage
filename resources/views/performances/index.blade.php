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
                <h4 class="mt-5 mb-5">Performances</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('performances.performance.create') }}" class="btn btn-success" title="Create New Performance">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($performances) == 0)
            <div class="panel-body text-center">
                <h4>No Performances Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Bsc Value</th>
                            <th>Competency Value</th>
                            <th>Pos Type</th>
                            <th>Employee</th>
                            <th>Yearsetting</th>
                            <th>Level</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($performances as $performance)
                        <tr>
                            <td>{{ $performance->bsc_value }}</td>
                            <td>{{ $performance->competency_value }}</td>
                            <td>{{ $performance->pos_type }}</td>
                            <td>{{ optional($performance->employee)->title }}</td>
                            <td>{{ optional($performance->yearsetting)->created_at }}</td>
                            <td>{{ optional($performance->level)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('performances.performance.destroy', $performance->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('performances.performance.show', $performance->id ) }}" class="btn btn-info" title="Show Performance">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('performances.performance.edit', $performance->id ) }}" class="btn btn-primary" title="Edit Performance">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Performance" onclick="return confirm(&quot;Click Ok to delete Performance.&quot;)">
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
            {!! $performances->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection