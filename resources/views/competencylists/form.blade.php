<div class="form-group {{ $errors->has('competency_list_name') ? 'has-error' : '' }}">
    <label for="competency_list_name" class="col-md-2 control-label">{{ __('setting.competency_listname') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="competency_list_name" type="text" id="competency_list_name"
            value="{{ old('competency_list_name', optional($competencylist)->competency_list_name) }}" minlength="1"
            placeholder="Enter competency list name here...">
        {!! $errors->first('competency_list_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('comperency_description') ? 'has-error' : '' }}">
    <label for="comperency_description" class="col-md-2 control-label">{{ __('setting.competency_listdesc') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="comperency_description" type="text" id="comperency_description"
            value="{{ old('comperency_description', optional($competencylist)->comperency_description) }}"
            minlength="1" placeholder="Enter comperency description here...">
        {!! $errors->first('comperency_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Competency_id') ? 'has-error' : '' }}">
    <label for="Competency_id" class="col-md-2 control-label">{{ __('setting.competency') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="Competency_id" name="Competency_id">
            <option value="" style="display: none;"
                {{ old('Competency_id', optional($competencylist)->Competency_id ?: '') == '' ? 'selected' : '' }}
                disabled selected>Select competency</option>
            @foreach ($competencies as $key => $competency)
                <option value="{{ $key }}"
                    {{ old('Competency_id', optional($competencylist)->name) == $key ? 'selected' : '' }}>
                    {{ $competency }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('Competency_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
