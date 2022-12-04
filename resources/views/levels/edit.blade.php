@extends('layouts.employee')
@section('pagetitle')
{{(__('Level'))}}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('level.index', $employee) }}">{{(__('Level'))}}</a>
</li>
<li class="breadcrumb-item active">{{(__('Edit Level'))}}</li>
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title mb-1">{{(__('Edit Level'))}}</h3>
    </div>
    <div class="card-body">
        @permission('level_edit')
        <form method="POST" action="{{ route('level.update', $levels->id) }}" accept-charset="UTF-8"
            id="create_employee_certification_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('put')

            <h6 class="ml-2">{{ __('setting.requiredField') }}<span class="text-danger">*</span> </h6>
            <hr>
            <div class="row">
                <div class="form-group col-md-12 {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-md-12 control-label">{{ __('Level Name') }} <span
                            class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="text" name="name" id="name" class="form-control "
                            value="{{Request::old('name') ? : $levels->name}}" placeholder="name">
                        <span
                            class="{{$errors->has('name') ? 'helper-text red-text' : ''}}">{{$errors->first('name')}}</span>
                    </div>
                </div>

                <div class="form-group col-md-6 {{ $errors->has('value_from') ? 'has-error' : '' }}">
                    <label for="value_from" class="col-md-12 control-label">{{ __('Value (From)') }} <span
                            class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="number" name="value_from" id="value_from" class="form-control "
                            value="{{Request::old('value_from') ? : $levels->value_from}}" placeholder="value_from">
                        <span
                            class="{{$errors->has('value_from') ? 'helper-text red-text' : ''}}">{{$errors->first('value_from')}}</span>
                    </div>
                </div>

                <div class="form-group col-md-6 {{ $errors->has('value_to') ? 'has-error' : '' }}">
                    <label for="value_to" class="col-md-12 control-label">{{ __('Value (To)') }} <span
                            class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="number" name="value_to" id="value_to" class="form-control "
                            value="{{Request::old('value_to') ? : $levels->value_to}}" placeholder="value_to">
                        <span
                            class="{{$errors->has('value_to') ? 'helper-text red-text' : ''}}">{{$errors->first('value_to')}}</span>
                    </div>
                </div>
            </div>




            <div class="form-group">
                <div class="col-md-offset-2 col-md-12 text-center">
                    <input class="btn btn-primary mr-5" type="submit" value="{{(__('setting.save'))}}">
                    <a href="{{ route('level.index', $employee) }}" class="btn btn-warning mr-5"
                        title="Show All levels">
                        {{(__('setting.cancel'))}}
                    </a>

                </div>
            </div>
        </form>
        @endpermission

    </div>
</div>
@endsection
