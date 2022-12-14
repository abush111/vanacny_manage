@extends('layouts.app')
@section('pagetitle')
    {{ __('employee.Edit Marital Status') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('settings.setting.index') }}">{{ __('setting.Setting') }}</a></li>
    <li class="breadcrumb-item"><a
            href="{{ route('marital_statuses.marital_status.index') }}">{{ __('employee.Marital Status') }}</a></li>
    <li class="breadcrumb-item active">{{ __('setting.edit') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-1">{{ __('employee.Edit Marital Status') }}</h3>
        </div>
        <div class="card-body">
            @permission('setting_MaritalStatus-Edit')
                <form method="POST" action="{{ route('marital_statuses.marital_status.update', $maritalStatus->id) }}"
                    id="edit_marital_status_form" name="edit_marital_status_form" accept-charset="UTF-8" class="form-horizontal">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    @include('settings.marital_statuses.form', [
                        'maritalStatus' => $maritalStatus,
                    ])
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10 text-center">
                            <input class="btn btn-primary mr-5" type="submit" value="{{ __('setting.update') }}">
                            <a href="{{ route('marital_statuses.marital_status.index') }}" class="btn btn-warning"
                                title="Show All Marital Status">
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
            $('#edit_marital_status_form').validate({
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
