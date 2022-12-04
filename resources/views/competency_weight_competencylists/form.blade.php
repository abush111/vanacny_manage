
<div class="form-group {{ $errors->has('listWeight_value') ? 'has-error' : '' }}">
    <label for="listWeight_value" class="col-md-2 control-label">{{ __('setting.weight') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="listWeight_value" type="text" oninput="processs(this)"  id="listWeight_value" value="{{ old('listWeight_value', optional($competencyWeightCompetencylist)->listWeight_value) }}" minlength="1" placeholder="Enter list weight value here...">
        {!! $errors->first('listWeight_value', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Competency_id') ? 'has-error' : '' }}">
    <label for="Competency_id" class="col-md-2 control-label">{{ __('setting.competency') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="Competency_id" name="Competency_id">
        	    <option value="" style="display: none;" {{ old('Competency_id', optional($competencyWeightCompetencylist)->Competency_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select competency</option>
        	@foreach ($competencies as $key => $competency)
			    <option value="{{ $key }}" {{ old('Competency_id', optional($competencyWeightCompetencylist)->Competency_id) == $key ? 'selected' : '' }}>
			    	{{ $competency }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('Competency_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Competencylist_id') ? 'has-error' : '' }}">
    <label for="Competencylist_id" class="col-md-2 control-label">{{ __('setting.competency_listname') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="Competencylist_id" name="Competencylist_id">
        	    <option value="" style="display: none;" {{ old('Competencylist_id', optional($competencyWeightCompetencylist)->Competencylist_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select competencylist</option>
        	@foreach ($competencylists as $key => $competencylist)
			    <option value="{{ $key }}" {{ old('Competencylist_id', optional($competencyWeightCompetencylist)->Competencylist_id) == $key ? 'selected' : '' }}>
			    	{{ $competencylist }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('Competencylist_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<script>
    function processs(input) {
        let value = input.value;
        let text = value.replace(/[^0-9, ]/g, "");
        input.value = text;
    }
</script>