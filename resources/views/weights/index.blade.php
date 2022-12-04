@extends('layouts.employee')
@section('pagetitle')
{{(__('Weight'))}}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item active">{{(__('Weight'))}}</li>
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{(__('Weight List'))}}</h3>
    </div>

    <div class="card-body">

        @if (count($weights) == 0)
        <h4 class="text-center">{{__('Weight Available')}}.</h4>
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
                @foreach ($weights as $weight)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $weight->title }}</td>
                    <td>{{ $weight->total_weight }}</td>
                    <td>
                        <form method="POST" action="{{ route('weight.destroy', $weight->id) }}" accept-charset="UTF-8">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs pull-right" role="group">


                                <a href="{{ route('weight.edit', $weight->id) }}" class="btn btn-warning"
                                    title="Edit Certification">
                                    <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                </a>


                                <button type="submit" class="btn btn-danger" title="Delete Certification"
                                    onclick="return confirm(&quot;Click Ok to delete Weight.&quot;)">
                                    <span class="fa fa-trash" aria-hidden="true"></span>
                                </button>

                            </div>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        <div class="d-flex justify-content-center mt-2">
            {{ $weights->links() }}
        </div>


    </div>
</div>

<a href="{{route('weight.create')}}" class="btn btn-success mr-2" title="Add New Weight">
    <span class="fa fa-plus" aria-hidden="true"> {{(__('Add New Weight'))}}</span>
</a>



@endsection
