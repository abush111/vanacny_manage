@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-calendar/css/redmond.calendars.picker.css') }}">
@endsection
<h6 class="ml-2">{{ __('setting.requiredField') }}<span class="text-danger">*</span> </h6>
<hr>
<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('type') ? 'has-error' : '' }}">
        <label for="type" class="col-md-4 control-label">{{ __('employee.Experience Type') }} <span
                class="text-danger">*</span></label>
        <div class="col-md-12">
            <select class="form-control" id="type" name="type" required="true">
                <option value="" style="display: none;"
                    {{ old('type', optional($employeeExperience)->type ?: '') == '' ? 'selected' : '' }} disabled
                    selected>{{ __('employee.Select experience type') }}</option>
                @foreach ($experienceTypes as $key => $experienceType)
                    <option value="{{ $key }}"
                        {{ old('type', optional($employeeExperience)->type) == $key ? 'selected' : '' }}>
                        {{ $experienceType }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-4 {{ $errors->has('organization_name') ? 'has-error' : '' }}">
        <label for="organization_name" class="col-md-12 control-label">{{ __('employee.Organization Name') }} <span
                class="text-danger">*</span></label>
        <div class="col-md-12">
            <input class="form-control" name="organization_name" type="text" id="organization_name"
                oninput="process(this)"
                value="{{ old('organization_name', optional($employeeExperience)->organization_name) }}"
                minlength="1" required="true" placeholder="{{ __('employee.Enter organization name here') }}">
        </div>
    </div>

    <div class="form-group col-md-4 {{ $errors->has('organization_address') ? 'has-error' : '' }}">
        <label for="organization_address" class="col-md-12 control-label">{{ __('employee.Organization Address') }}
            <span class="text-danger">*</span></label>
        <div class="col-md-12">
            <input class="form-control" name="organization_address" type="text" id="organization_address"
                value="{{ old('organization_address', optional($employeeExperience)->organization_address) }}"
                minlength="1" placeholder="{{ __('employee.Enter organization_address here') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('job_position') ? 'has-error' : '' }}">
        <label for="job_position" class="col-md-12 control-label">{{ __('employee.Job Position') }} <span
                class="text-danger">*</span></label>
        <div class="col-md-12">
            <input class="form-control" name="job_position" type="text" id="job_position" oninput="process(this)"
                value="{{ old('job_position', optional($employeeExperience)->job_position) }}" minlength="1"
                required="true" placeholder="{{ __('employee.Enter job position here') }}">
        </div>
    </div>

    <div class="form-group col-md-4 {{ $errors->has('level') ? 'has-error' : '' }}">
        <label for="level" class="col-md-12 control-label">{{ __('setting.level') }}</label>
        <div class="col-md-12">
            <input class="form-control" name="level" type="text" id="level"
                value="{{ old('level', optional($employeeExperience)->level) }}" minlength="1" required="true"
                placeholder="{{ __('employee.Enter level here') }}">
        </div>
    </div>

    <div class="form-group col-md-4 {{ $errors->has('salary') ? 'has-error' : '' }}">
        <label for="salary" class="col-md-12 control-label">{{ __('setting.Salary') }} <span
                class="text-danger">*</span></label>
        <div class="col-md-12">
            <input class="form-control" name="salary" type="text" id="salary" oninput="processs(this)"
                value="{{ old('salary', optional($employeeExperience)->salary) }}" minlength="1" required="true"
                placeholder="{{ __('employee.Enter salary here') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('left_reason') ? 'has-error' : '' }}">
        <label for="left_reason" class="col-md-12 control-label">{{ __('employee.Left Reason') }} <span
                class="text-danger">*</span></label>
        <div class="col-md-12">
            <select class="form-control" id="left_reason" name="left_reason" required="true">
                <option value="" style="display: none;"
                    {{ old('left_reason', optional($employeeExperience)->left_reason ?: '') == '' ? 'selected' : '' }}
                    disabled selected>{{ __('employee.Select left reason') }}</option>
                @foreach ($leftReasons as $key => $leftReason)
                    <option value="{{ $key }}"
                        {{ old('left_reason', optional($employeeExperience)->left_reason) == $key ? 'selected' : '' }}>
                        {{ $leftReason }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-4  {{ $errors->has('start_date') ? 'has-error' : '' }}">
        <label for="start_date" class="col-md-12 control-label">{{ __('employee.Start Date') }} <span
                class="text-danger">*</span></label>
        <div class="col-md-12">
            <input class="form-control" name="start_date" type="text" id="start_date"
                value="{{ old('start_date', optional($employeeExperience)->start_date) }}" required="true">
        </div>
    </div>

    <div class="form-group col-md-4 {{ $errors->has('end_date') ? 'has-error' : '' }}">
        <label for="end_date" class="col-md-12 control-label">{{ __('employee.End Date') }} <span
                class="text-danger">*</span></label>
        <div class="col-md-12">
            <input class="form-control" name="end_date" type="text" id="end_date"
                value="{{ old('end_date', optional($employeeExperience)->end_date) }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('attachment') ? 'has-error' : '' }}">
        <label for="attachment" class="col-md-12 control-label">{{ __('employee.Attachment') }} <span
                class="text-danger">*</span></label>
        <div class="col-md-12">
            <div class="input-group uploaded-file-group">
                <label class="input-group-btn">
                    <span class="btn btn-default">
                        {{ __('employee.Browse') }} <input type="file" name="attachment" id="attachment"
                            class="hidden" required="true">
                    </span>
                </label>
                <input type="text" class="form-control uploaded-file-name" readonly>
            </div>

            @if (isset($employeeExperience->attachment) && !empty($employeeExperience->attachment))
                <div class="input-group input-width-input">
                    <span class="input-group-addon mr-2">
                        <input type="checkbox" name="custom_delete_attachment" class="custom-delete-file"  value="1"
                            {{ old('custom_delete_attachment', '0') == '1' ? 'checked' : '' }}>
                        {{ __('setting.delete') }}
                    </span>

                    <span class="input-group-addon custom-delete-file-name">
                        {{ $employeeExperience->attachment }}
                    </span>
                </div>
            @endif
        </div>
    </div>
</div>
@section('javascripts')
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.plugin.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.plus.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.picker.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.ethiopian.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.ethiopian-am.js') }}"></script>
    <script>
        $('#start_date').calendarsPicker({
            calendar: $.calendars.instance('ethiopian', 'am'),
            pickerClass: 'myPicker',
            dateFormat: 'yyyy-mm-dd'
        });

    </script>
    <script>
        $('#end_date').calendarsPicker({
            calendar: $.calendars.instance('ethiopian', 'am'),
            pickerClass: 'myPicker',
            dateFormat: 'yyyy-mm-dd'
        });

    </script>
    <script>
        function process(input) {
            let value = input.value;
            let text = value.replace(/[^A-Z,a-z, ]/g, "");
            input.value = text;
        }

    </script>
    <script>
        function processs(input) {
            let value = input.value;
            let text = value.replace(/[^0-9,.,:, ]/g, "");
            input.value = text;
        }

    </script>
@endsection
