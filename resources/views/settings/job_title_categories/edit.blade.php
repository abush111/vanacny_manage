@extends('layouts.app')
@section('pagetitle')
    {{ __('employee.Edit Job Title Category') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('settings.setting.index') }}">{{ __('setting.Setting') }}</a></li>
    <li class="breadcrumb-item"><a
            href="{{ route('job_title_categories.job_title_category.index') }}">{{ __('employee.Job Title Category') }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('setting.edit') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-1">{{ __('employee.Edit Job Title Category') }}</h3>
        </div>
        <div class="card-body">
            @permission('setting_JobTitleCategory-Edit')
                <form method="POST"
                    action="{{ route('job_title_categories.job_title_category.update', $jobTitleCategory->id) }}"
                    id="edit_job_title_category_form" name="edit_job_title_category_form" accept-charset="UTF-8"
                    class="form-horizontal">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    @include('settings.job_title_categories.form', [
                        'jobTitleCategory' => $jobTitleCategory,
                    ])
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-12 text-center">
                            <input class="btn btn-primary mr-5" type="submit" value="{{ __('setting.update') }}">
                            <a href="{{ route('job_title_categories.job_title_category.index') }}" class="btn btn-warning"
                                title="Create New Job Title Category">
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
            $('#edit_job_title_category_form').validate({
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
