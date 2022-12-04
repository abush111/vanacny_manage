@extends('layouts.app')
@section('pagetitle')
    {{ __('Competency') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('competency.index', $employee) }}">{{ __('Competency') }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('Edit Competency') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-1">{{ __('Edit Competency') }}</h3>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('competency.update', $competency->id) }}" accept-charset="UTF-8"
                id="create_employee_certification_form" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{-- @if ($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

            @endif --}}


                <h6 class="ml-2">{{ __('setting.requiredField') }}<span class="text-danger">*</span> </h6>
                <hr>
                <div class="row">
                    <div class="form-group col-md-12 {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-12 control-label">{{ __('Competency Title') }} <span
                                class="text-danger">*</span></label>
                        <div class="col-md-12">
                            <input type="text" name="title" id="title" class="form-control "
                                value="{{ Request::old('title') ?: $competency->title }}" placeholder="name">
                            <span
                                class="{{ $errors->has('title') ? 'helper-text red-text' : '' }}">{{ $errors->first('title') }}</span>
                        </div>
                    </div>

                    <div class="form-group col-md-8 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="col-md-12 control-label">{{ __('Competency Name') }} <span
                                class="text-danger">*</span></label>
                        <div class="col-md-12">
                            <input type="text" name="competency[0][name]" id="name" class="form-control "
                                value="{{ Request::old('name') ?: $competency->name }}" placeholder="name">
                            <span
                                class="{{ $errors->has('name') ? 'helper-text red-text' : '' }}">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="action">Action</label>
                        <div class="input-group">
                            <button type="button" name="add" id="add" class="btn btn-success w-md">Add More</button>
                        </div>
                    </div>
                </div>

                <div id="dynamicTable"></div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-12 text-center">
                        <input class="btn btn-primary mr-5" type="submit" value="{{ __('setting.save') }}">
                        <a href="{{ route('weight.index', $employee) }}" class="btn btn-warning mr-5"
                            title="Show All Competency">
                            {{ __('setting.cancel') }}
                        </a>
                        <input class="btn btn-danger" type="reset" value="{{ __('setting.Reset') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@section('javascripts')
    <script type="text/javascript">
        var i = 0;

        $("#add").click(function() {

            ++i;

            $("#dynamicTable").append(
                '<tr1><div class="row"><div class="col-lg-8"><div class="mb-3 ajax-select mt-3 mt-lg-0"><label class="form-label">Competency Name<span class="text-danger">*</span></label><input type="text" name="competency[' +
                i +
                '][name]" id="name" class="form-control " value="{{ Request::old('name') ?: $competency->name }}"placeholder="Competency Name"><span class="text-danger">{{ $errors->first('name') }}</span></div></div><div class="col-md-4"><label  for="remove">Action</label><div class="input-group"><button type="button" class="btn btn-danger remove-tr1">Remove</button></div></div></div></tr1>'
                );
        });

        $(document).on('click', '.remove-tr1', function() {

            $(this).parents('tr1').remove();

        });
    </script>
@stop
@endsection
