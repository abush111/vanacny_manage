{{-- @extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">Create New Competency Weight</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('competency_weights.competency_weight.index') }}" class="btn btn-primary" title="Show All Competency Weight">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('competency_weights.competency_weight.store') }}" accept-charset="UTF-8" id="create_competency_weight_form" name="create_competency_weight_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('competency_weights.form', [
                                        'competencyWeight' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection
 --}}



@extends('layouts.app')
@section('pagetitle')
    {{ __('setting.Addcompetency_weight') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('settings.setting.index') }}">{{ __('setting.Setting') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('address_types.address_type.index') }}">
            {{ __('setting.competency_weight') }}</a></li>
    <li class="breadcrumb-item active">{{ __('setting.New') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-1">{{ __('setting.Addcompetency_weight') }}</h3>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('competency_weights.competency_weight.store') }}" accept-charset="UTF-8" id="create_competency_weight_form" name="create_competency_weight_form" class="form-horizontal">
                {{ csrf_field() }}
                @include ('competency_weights.form', [
                    'competencyWeight' => null,
                  ])
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-12 text-center">
                            <input class="btn btn-primary mr-5" type="submit" value="{{ __('setting.save') }}">
                            <a href="{{ route('competency_weights.competency_weight.index') }}" class="btn btn-warning mr-5 text-white"
                                title="Show All Address Type">
                                {{ __('setting.cancel') }}
                            </a>
                            <input class="btn btn-danger" type="reset" value="{{ __('setting.Reset') }}">
                        </div>
                    </div>
                </form>

        </div>
    </div>
@endsection
@section('javascripts')
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        $(function() {
            $('#create_address_type_form').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    description: {
                        minlength: 1
                    },
                },
                messages: {
                    name: {
                        required: "Please enter a name",
                        minlength: "Your name must be at least 2 characters long"
                    },
                    description: {
                        minlength: "Your description must be at least 1 characters long"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
