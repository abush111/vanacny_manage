


@extends('layouts.app')
@section('pagetitle')
    {{ __('setting.competency_weight') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('setting.competency_weight') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('setting.competency_weight_list') }}</h3>
        </div>

        <div class="card-body">

            @if(count($competencyWeights) == 0)
                <h4 class="text-center">{{ __('setting.competency_weightAvailable') }}.</h4>
            @else
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{(__('setting.Number'))}}</th>
                            <th>{{ __('setting.weight') }}</th>
                            <th>{{ __('setting.competency') }}</th>

                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($competencyWeights as $competencyWeight)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $competencyWeight->Weight_value }}</td>
                                <td>{{ optional($competencyWeight->competency)->title }}</td>
                                <td>
                                    <form method="POST" action="{!! route('competency_weights.competency_weight.destroy', $competencyWeight->id) !!}"
                                        accept-charset="UTF-8">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs pull-right" role="group">


                                            <a href="{{ route('competency_weights.competency_weight.edit', $competencyWeight->id ) }}"
                                                class="btn btn-warning" title="Edit Certification">
                                                <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                            </a>


                                            <button type="submit" class="btn btn-danger" title="Delete Competency Weight" onclick="return confirm(&quot;Click Ok to delete Competency Weight.&quot;)">
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
                {{ $competencyWeights->links() }}
            </div>


        </div>
    </div>

    <a href="{{ route('competency_weights.competency_weight.create') }}"  class="btn btn-success mr-2" title="Add New Weight">
        <span class="fa fa-plus" aria-hidden="true"> {{ __('setting.Addcompetency_weight') }}</span>
    </a>



@endsection
