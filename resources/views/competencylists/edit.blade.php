

@extends('layouts.app')
@section('pagetitle')
    {{ __('setting.Editcompetency_weight') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#" ></a></li>
    <li class="breadcrumb-item"><a
            href="{{ route('competencylists.competencylist.index') }}">{{ __('setting.Addcompetency_weight') }}</a></li>
    <li class="breadcrumb-item active">{{ __('setting.edit') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-1">{{ __('setting.Editcompetency_weight') }}</h3>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('competencylists.competencylist.update', $competencylist->id) }}" id="edit_competencylist_form" name="edit_competencylist_form" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @include ('competencylists.form', [
                                            'competencylist' => $competencylist,
                                          ])
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-12 text-center">
                            <input class="btn btn-primary mr-5" type="submit" value="{{ __('setting.update') }}">
                            <a href="{{ route('competencylists.competencylist.index') }}" class="btn btn-warning mr-5"
                                title="Show All competency weights">
                                {{ __('setting.cancel') }}
                            </a>
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
            $('#edit_address_type_form').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2,
                    },
                    description: {
                        minlength: 5
                    },
                },
                messages: {
                    name: {
                        required: "Please enter a name",
                        minlength: "Your name must be at least 2 characters long"
                    },
                    description: {
                        minlength: "Your description must be at least 5 characters long"
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
