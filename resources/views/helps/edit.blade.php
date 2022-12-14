@extends('layouts.app')
@section('pagetitle')
{{(__('setting.Edit Help'))}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('helps.help.index') }}">{{(__('setting.Helps'))}}</a></li>
    <li class="breadcrumb-item active">{{(__('setting.edit'))}}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-1">{{(__('setting.Edit Help'))}}</h3>
        </div>
        <div class="card-body">
            @permission('setting_Helps-Edit')
            <form method="POST" action="{{ route('helps.help.update', $help->id) }}" id="edit_help_form"
                name="edit_help_form" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @include ('helps.form', [
                'help' => $help,
                ])
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-12 text-center">
                        <input class="btn btn-primary mr-5" type="submit" value="{{(__('setting.update'))}}">
                        <a href="{{ route('helps.help.index') }}" class="btn btn-warning mr-5" title="Show All Help">
                            {{(__('setting.cancel'))}}
                        </a>
                    </div>
                </div>
            </form>
            @endpermission
        </div>
    </div>
@endsection

@section('javascripts')
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/plugins/ckeditor/adapters/jquery.js') }}"></script>
    <script>
        function loadEditors() {
            var $editors = $("textarea.ckeditor");
            if ($editors.length) {
                $editors.each(function() {
                    var editorID = $(this).attr("id");
                    var instance = CKEDITOR.instances[editorID];
                    CKEDITOR.replace(editorID);
                });
            }
        }
        CKEDITOR.replace('data', {
            filebrowserUploadUrl: "{{ route('helps.help.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        $(function() {
            $('#edit_help_form').validate({
                rules: {
                    title: {
                        required: true,
                        minlength: 2,
                    },
                    data: {
                        required: true
                    },
                    topic_for: {
                        required: true,
                        minlength: 2
                    },
                    language: {
                        required: true
                    },
                },
                messages: {
                    title: {
                        required: "Please enter a title",
                        minlength: "Your title must be at least 2 characters long"
                    },
                    data: {
                        required: "Please enter a valid data"
                    },
                    topic_for: {
                        required: "Please enter a topic",
                        minlength: "Your topic must be at least 2 characters long"
                    },
                    language: {
                        required: "Please choose a language"
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
