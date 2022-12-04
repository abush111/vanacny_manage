@extends('layouts.app')
@section('pagetitle')
{{(__('Leadership Summary Form'))}}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active">{{(__('Leadership Summary Form'))}}</li>
@endsection
@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{(__('Leadership Summary Form List'))}}</h3>
    </div>

    <div class="card-body">

        @if (count($leaders) == 0)
        <h4 class="text-center">{{__('Leadership Summary Form Available')}}.</h4>
        @else
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>{{(__('ID'))}}</th>
                    <th>{{(__('Title'))}}</th>
                    <th>{{(__('Total Weight'))}}</th>
                    <th>{{(__('setting.Actions'))}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaders as$key=>$leader)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $leader->title }}</td>
                    <td>{{ $leader->total_weight }}</td>
                    <td>
                        <form method="POST" action="{{ route('leadership_summary_form.destroy', $leader->id) }}"
                            accept-charset="UTF-8">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs pull-right" role="group">

                                @permission('leader-Edit')
                                <a href="{{ route('leadership_summary_form.edit', $leader->id) }}"
                                    class="btn btn-warning" title="Edit Certification">
                                    <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                </a>
                                @endpermission

                                @permission('leader-Delete')
                                <button type="submit" class="btn btn-danger" title="Delete Certification"
                                    onclick="return confirm(&quot;Click Ok to delete Leader.&quot;)">
                                    <span class="fa fa-trash" aria-hidden="true"></span>
                                </button>
                                @endpermission

                            </div>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        <div class="d-flex justify-content-center mt-2">
            {{ $leaders->links() }}
        </div>


    </div>
</div>


<a href="{{route('leadership_summary_form.create')}}" class="btn btn-success mr-2" title="Add New Weight">
    <span class="fa fa-plus" aria-hidden="true"> {{(__('Add New Leadership Summary'))}}</span>
</a>


@endsection
