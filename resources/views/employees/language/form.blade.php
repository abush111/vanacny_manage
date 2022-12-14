<h6 class="ml-2">{{(__('setting.requiredField'))}}<span class="text-danger">*</span> </h6>
<hr>
<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('language') ? 'has-error' : '' }}">
        <label for="language" class="col-md-12 control-label">{{(__('employee.Languages'))}} <span class="text-danger">*</span></label>
        <div class="col-md-12">
            <select class="form-control" id="language" name="language" required="true">
                <option value="" style="display: none;"
                    {{ old('language', optional($employeeLanguage)->language ?: '') == '' ? 'selected' : '' }}
                    disabled selected>{{(__('employee.Enter Language Name Here'))}}</option>
                @foreach ($languages as $key => $language)
                    <option value="{{ $key }}"
                        {{ old('language', optional($employeeLanguage)->language) == $key ? 'selected' : '' }}>
                        {{ $language }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-4 {{ $errors->has('reading') ? 'has-error' : '' }}">
        <label for="reading" class="col-md-12 control-label">{{(__('employee.Reading'))}} <span class="text-danger">*</span></label>
        <div class="col-md-12">
            <select class="form-control" id="reading" name="reading" required="true">
                <option value="" style="display: none;"
                    {{ old('reading', optional($employeeLanguage)->reading ?: '') == '' ? 'selected' : '' }} disabled
                    selected>{{(__('employee.Enter Reading level here'))}}</option>
                @foreach ($languageLevels as $key => $languageLevel)
                    <option value="{{ $key }}"
                        {{ old('reading', optional($employeeLanguage)->reading) == $key ? 'selected' : '' }}>
                        {{ $languageLevel }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-4 {{ $errors->has('writing') ? 'has-error' : '' }}">
        <label for="writing" class="col-md-12 control-label">{{(__('employee.Writing'))}} <span class="text-danger">*</span></label>
        <div class="col-md-12">
            <select class="form-control" id="writing" name="writing" required="true">
                <option value="" style="display: none;"
                    {{ old('writing', optional($employeeLanguage)->writing ?: '') == '' ? 'selected' : '' }} disabled
                    selected>{{(__('employee.Enter Writing level here'))}}</option>
                @foreach ($languageLevels as $key => $languageLevel)
                    <option value="{{ $key }}"
                        {{ old('writing', optional($employeeLanguage)->writing) == $key ? 'selected' : '' }}>
                        {{ $languageLevel }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4 {{ $errors->has('listening') ? 'has-error' : '' }}">
        <label for="listening" class="col-md-12 control-label">{{(__('employee.Listening'))}} <span class="text-danger">*</span></label>
        <div class="col-md-12">
            <select class="form-control" id="listening" name="listening" required="true">
                <option value="" style="display: none;"
                    {{ old('listening', optional($employeeLanguage)->listening ?: '') == '' ? 'selected' : '' }}
                    disabled selected>{{(__('employee.Enter Listening level here'))}}</option>
                @foreach ($languageLevels as $key => $languageLevel)
                    <option value="{{ $key }}"
                        {{ old('listening', optional($employeeLanguage)->listening) == $key ? 'selected' : '' }}>
                        {{ $languageLevel }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-4 {{ $errors->has('speaking') ? 'has-error' : '' }}">
        <label for="speaking" class="col-md-12 control-label">{{(__('employee.Speaking'))}} <span class="text-danger">*</span></label>
        <div class="col-md-12">
            <select class="form-control" id="speaking" name="speaking" required="true">
                <option value="" style="display: none;"
                    {{ old('speaking', optional($employeeLanguage)->speaking ?: '') == '' ? 'selected' : '' }}
                    disabled selected>{{(__('employee.Enter Speaking level here'))}}</option>
                @foreach ($languageLevels as $key => $languageLevel)
                    <option value="{{ $key }}"
                        {{ old('speaking', optional($employeeLanguage)->speaking) == $key ? 'selected' : '' }}>
                        {{ $languageLevel }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-4 {{ $errors->has('is_prefered') ? 'has-error' : '' }}">
        <label for="is_prefered" class="col-md-12 control-label">{{(__('employee.Is Prefered'))}}</label>
        <div class="col-md-12">
            <div class="checkbox">
                <label for="is_prefered_1">
                    <input id="is_prefered_1" class="" name="is_prefered" type="checkbox" value="1"
                        {{ old('is_prefered', optional($employeeLanguage)->is_prefered) == '1' ? 'checked' : '' }}>
                    {{(__('setting.Yes'))}}
                </label>
            </div>
        </div>
    </div>
</div>
