@extends('layouts.app')
@section('pagetitle')
    {{ __('User Managment') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Level') }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('Create User') }}</li>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title mb-1">{{ __('Create User') }}</h3>
        </div>
        <div class="card-body">
            @permission('users-AddNew')
                <form method="POST" action="{{ route('users.store') }}" accept-charset="UTF-8" id="create_users_form"
                    class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <h6 class="ml-2">{{ __('setting.requiredField') }}<span class="text-danger">*</span> </h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Employee Name</label>
                                <select name="employee" class="form-control select2 select2-hidden-accessible"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" value="" disabled=""
                                        ed{{ old('employee') ? '' : 'selected' }}> Choose
                                        Employee</option>
                                    @foreach ($employees as $key => $employee)
                                        <option data-select2-id="{{ $key }}" value="{{ $employee->id }}"
                                            {{ old('employee') ? 'selected' : '' }}>
                                            {{ $employee->en_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <!-- /.form-group -->

                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group col-md-12 {{ $errors->has('username') ? 'has-error' : '' }}">
                                <label for="username" class="col-md-12 control-label">{{ __('User Name') }} <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-12">
                                    <input type="text" name="username" id="username" class="form-control "
                                        value="{{ Request::old('username') ?: '' }}" placeholder="user name">
                                    <span
                                        class="{{ $errors->has('username') ? 'helper-text red-text' : '' }}">{{ $errors->first('username') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">{{ __('email') }}
                                <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="email" name="email" id="email" class="form-control "
                                    value="{{ Request::old('email') ?: '' }}" placeholder="email">
                                <span
                                    class="{{ $errors->has('email') ? 'helper-text red-text' : '' }}">{{ $errors->first('email') }}</span>
                            </div>
                        </div>

                        <div class="form-group col-md-6 {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">{{ __('password') }} <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="password" name="password" id="password" class="form-control "
                                    value="{{ Request::old('password') ?: '' }}" placeholder="password">
                                <span
                                    class="{{ $errors->has('password') ? 'helper-text red-text' : '' }}">{{ $errors->first('password') }}</span>
                            </div>
                        </div>


                    </div>




                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-12 text-center">
                            <input class="btn btn-primary mr-5" type="submit" value="{{ __('setting.save') }}">
                            <a href="{{ route('weight.index', $employee) }}" class="btn btn-warning mr-5"
                                title="Show All Weights">
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
