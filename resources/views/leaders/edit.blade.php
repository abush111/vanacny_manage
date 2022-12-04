@extends('layouts.app')
@section('pagetitle')
{{(__('Weight'))}}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('weight.index', $employee) }}">{{(__('Weight'))}}</a>
</li>
<li class="breadcrumb-item active">{{(__('Edit Weight'))}}</li>
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title mb-1">{{(__('Edit Weight'))}}</h3>
    </div>
    <div class="card-body">

        <form method="POST" action="{{ route('weight.update', $weights->id) }}" accept-charset="UTF-8"
            id="create_employee_certification_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('put')

            <h6 class="ml-2">{{ __('setting.requiredField') }}<span class="text-danger">*</span> </h6>
            <hr>
            <div class="row">
                <div class="form-group col-md-12 {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title" class="col-md-12 control-label">{{ __('Title') }} <span
                            class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="text" name="title" id="title" class="form-control "
                            value="{{Request::old('title') ? : $weights->title}}" placeholder="title">
                        <span
                            class="{{$errors->has('title') ? 'helper-text red-text' : ''}}">{{$errors->first('title')}}</span>
                    </div>
                </div>

                <div class="form-group col-md-12 {{ $errors->has('total_weight') ? 'has-error' : '' }}">
                    <label for="total_weight" class="col-md-12 control-label">{{ __('Total Weight') }} <span
                            class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input type="number" name="total_weight" id="total_weight" class="form-control "
                            value="{{Request::old('total_weight') ? : $weights->total_weight}}"
                            placeholder="total_weight">
                        <span
                            class="{{$errors->has('total_weight') ? 'helper-text red-text' : ''}}">{{$errors->first('total_weight')}}</span>
                    </div>
                </div>
            </div>




            <div class="form-group">
                <div class="col-md-offset-2 col-md-12 text-center">
                    <input class="btn btn-primary mr-5" type="submit" value="{{(__('setting.save'))}}">
                    <a href="{{ route('weight.index', $employee) }}" class="btn btn-warning mr-5"
                        title="Show All Weights">
                        {{(__('setting.cancel'))}}
                    </a>

                </div>
            </div>
        </form>


    </div>
</div>
@endsection
