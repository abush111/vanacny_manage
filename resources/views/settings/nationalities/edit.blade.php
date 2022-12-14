@extends('layouts.app')
@section('pagetitle')
    {{ __('employee.Edit Nationality') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('settings.setting.index') }}">{{ __('setting.Setting') }}</a></li>
    <li class="breadcrumb-item"><a
            href="{{ route('nationalities.nationality.index') }}">{{ __('employee.Nationality') }}</a></li>
    <li class="breadcrumb-item active">{{ __('setting.edit') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-1">{{ __('employee.Edit Nationality') }}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @permission('setting_Nationality-Edit')
                <form method="POST" action="{{ route('nationalities.nationality.update', $nationality->id) }}"
                    id="edit_nationality_form" name="edit_nationality_form" accept-charset="UTF-8" class="form-horizontal">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    @include('settings.nationalities.form', [
                        'nationality' => $nationality,
                    ])

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-12 text-center">
                            <input class="btn btn-primary mr-5" type="submit" value="{{ __('setting.update') }}">
                            <a href="{{ route('nationalities.nationality.index') }}" class="btn btn-warning"
                                title="Show All Nationality">
                                {{ __('setting.cancel') }}
                            </a>
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
            $('#edit_nationality_form').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                    },
                    code: {
                        required: true,
                        minlength: 2
                    },
                },
                messages: {
                    name: {
                        required: "Please enter a name",
                        minlength: "Your name must be at least 2 characters long"
                    },
                    code: {
                        required: "Please enter a code",
                        minlength: "Your code must be at least 2 characters long"
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
