@extends('layouts.app')
@section('pagetitle')
    {{ __('setting.NewGPAScale') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('settings.setting.index') }}">{{ __('setting.Setting') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('gpa_scales.gpa_scale.index') }}">{{ __('setting.GPAScales') }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('setting.New') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-1">{{ __('setting.CreateNewGPAScale') }}</h3>
        </div>
        <div class="card-body">
            @permission('setting_GPAScales-AddNew')
                <form method="POST" action="{{ route('gpa_scales.gpa_scale.store') }}" accept-charset="UTF-8"
                    id="create_gpa_scale_form" name="create_gpa_scale_form" class="form-horizontal">
                    {{ csrf_field() }}
                    @include('settings.gpa_scales.form', [
                        'gPAScale' => null,
                    ])
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-12 text-center">
                            <input class="btn btn-primary mr-5" type="submit" value="{{ __('setting.save') }}">
                            <a href="{{ route('gpa_scales.gpa_scale.index') }}" class="btn btn-warning mr-5"
                                title="Show All GPA Scale">
                                {{ __('setting.cancel') }}
                            </a>
                            <input class="btn btn-danger" type="reset" value="{{ __('setting.Reset') }}">
                        </div>
                    </div>
                </form>
            @endpermission
        </div>
    </div>
@endsection
@section('javascripts')
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        $(function() {
            $('#create_gpa_scale_form').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
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
