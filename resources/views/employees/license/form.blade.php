@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-calendar/css/redmond.calendars.picker.css') }}">
@endsection
<h6 class="ml-2">{{ __('setting.requiredField') }}<span class="text-danger">*</span> </h6>
<hr>
<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('title') ? 'has-error' : '' }}">
        <label for="title" class="col-md-12 control-label">{{ __('employee.Title') }} <span
                class="text-danger">*</span></label>
        <div class="col-md-12">
            <input class="form-control" name="title" type="text" id="title" oninput="process(this)"
                value="{{ old('title', optional($employeeLicense)->title) }}" minlength="1" maxlength="255"
                required="true" placeholder="{{ __('employee.Enter title here') }}">
        </div>
    </div>

    <div class="form-group col-md-4 {{ $errors->has('type') ? 'has-error' : '' }}">
        <label for="type" class="col-md-4 control-label">{{ __('employee.License Type') }} <span
                class="text-danger">*</span></label>
        <div class="col-md-12">
            <select class="form-control" id="type" name="type" required="true">
                <option value="" style="display: none;"
                    {{ old('type', optional($employeeLicense)->type ?: '') == '' ? 'selected' : '' }} disabled
                    selected>{{ __('employee.Select license Type') }}</option>
                @foreach ($licenseTypes as $key => $licenseType)
                    <option value="{{ $key }}"
                        {{ old('type', optional($employeeLicense)->type) == $key ? 'selected' : '' }}>
                        {{ $licenseType }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-4 {{ $errors->has('issuing_organization') ? 'has-error' : '' }}">
        <label for="issuing_organization"
            class="col-md-12 control-label">{{ __('employee.Issuing Organization') }}</label>
        <div class="col-md-12">
            <input class="form-control" name="issuing_organization" type="text" id="issuing_organization"
                value="{{ old('issuing_organization', optional($employeeLicense)->issuing_organization) }}" oninput="process(this)"
                minlength="1" required="true" placeholder="{{ __('employee.Enter issuing organization here') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('expiry_date') ? 'has-error' : '' }}">
        <label for="expiry_date" class="col-md-12 control-label">{{ __('employee.Expiry Date') }}</label>
        <div class="col-md-12">
            <input class="form-control" name="expiry_date" type="text" id="expiry_date"
                value="{{ old('expiry_date', optional($employeeLicense)->expiry_date) }}">
        </div>
    </div>

    <div class="form-group col-md-4 {{ $errors->has('file') ? 'has-error' : '' }}">
        <label for="file" class="col-md-12 control-label">{{ __('employee.File') }} <span
                class="text-danger">*</span></label>
        <div class="col-md-12">
            <div class="input-group uploaded-file-group">
                <label class="input-group-btn">
                    <span class="btn btn-default">
                        {{ __('employee.Browse') }} <input type="file" required="true" name="file" id="file" class="hidden">
                    </span>
                </label>
                <input type="text" class="form-control uploaded-file-name" readonly>
            </div>

            @if (isset($employeeLicense->file) && !empty($employeeLicense->file))
                <div class="input-group input-width-input">
                    <span class="input-group-addon">
                        <input type="checkbox" name="custom_delete_file" class="custom-delete-file" value="1"
                            {{ old('custom_delete_file', '0') == '1' ? 'checked' : '' }}>
                        {{ __('setting.delete') }}
                    </span>

                    <span class="input-group-addon custom-delete-file-name">
                        {{ $employeeLicense->file }}
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
        $('#expiry_date').calendarsPicker({
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
@endsection
