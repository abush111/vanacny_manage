@extends('layouts.employee')
@section('pagetitle')
{{(__('Level'))}}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active">{{(__('Level'))}}</li>
@endsection
@section('content')
@permission('leave_types_list')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{(__('Level List'))}}</h3>
    </div>

    <div class="card-body">

        @if (count($levels) == 0)
        <h4 class="text-center">{{__('Level Not Available')}}.</h4>
        @else
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>{{(__('ID'))}}</th>
                    <th>{{(__('Name'))}}</th>
                    <th>{{(__('Value Form'))}}</th>
                    <th>{{(__('Value To'))}}</th>
                    <th>{{(__('setting.Actions'))}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($levels as$key=> $level)
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{ $level->name }}</td>
                    <td>{{ $level->value_from }}</td>
                    <td>{{ $level->value_to }}</td>
                    <td>
                        <form method="POST" action="{{ route('level.destroy', $level->id) }}" accept-charset="UTF-8">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs pull-right" role="group">

                                @permission('leave_types_edit')
                                <a href="{{ route('level.edit', $level->id) }}" class="btn btn-warning"
                                    title="Edit Certification">
                                    <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                </a>
                                @endpermission
                                @permission('leave_types_delete')
                                <button type="submit" class="btn btn-danger" title="Delete Certification"
                                    onclick="return confirm(&quot;Click Ok to delete Level.&quot;)">
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
            {{ $levels->links() }}
        </div>


    </div>
</div>
@permission('leave_types_addNew')
<a href="{{route('level.create')}}" class="btn btn-success mr-2" title="Add New Level">
    <span class="fa fa-plus" aria-hidden="true"> {{(__('Add New Level'))}}</span>
</a>
@endpermission
@endpermission

@endsection
