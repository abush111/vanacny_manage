@extends('layouts.app')
@section('pagetitle')
    {{ __('Competency') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('Competency') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('Competency ') }}</h3>
        </div>

        <div class="card-body">

            @if (count($competences) == 0)
                <h4 class="text-center">{{ __('Competency Available') }}.</h4>
            @else
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Competency Title') }}</th>
                            <th>{{ __('Competency Name') }}</th>
                            <th>{{ __('setting.Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competences as $key => $competency)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $competency->title }}</td>
                                <td>{{ $competency->name }}</td>
                                <td>
                                    <form method="POST" action="{{ route('competency.destroy', $competency->id) }}"
                                        accept-charset="UTF-8">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                        <div class="btn-group btn-group-xs pull-right" role="group">


                                            <a href="{{ route('competency.edit', $competency->id) }}"
                                                class="btn btn-warning" title="Edit Certification">
                                                <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                            </a>


                                            <button type="submit" class="btn btn-danger" title="Delete Certification"
                                                onclick="return confirm(&quot;Click Ok to delete Competency.&quot;)">
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
                {{ $competences->links() }}
            </div>


        </div>
    </div>

    <a href="{{ route('competency.create') }}" class="btn btn-success mr-2" title="Add New Weight">
        <span class="fa fa-plus" aria-hidden="true"> {{ __('Add New Comptetency') }}</span>
    </a>



@endsection
