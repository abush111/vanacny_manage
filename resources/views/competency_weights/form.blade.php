
<div class="form-group {{ $errors->has('Weight_value') ? 'has-error' : '' }}">
    <label for="Weight_value" class="col-md-2 control-label">{{ __('setting.weight') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Weight_value"  type="text" oninput="processs(this)" id="Weight_value" value="{{ old('Weight_value', optional($competencyWeight)->Weight_value) }}" minlength="1" placeholder="Enter weight value here...">
        {!! $errors->first('Weight_value', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Competency_id') ? 'has-error' : '' }}">
    <label for="Competency_id" class="col-md-2 control-label">{{ __('setting.competency') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="Competency_id" name="Competency_id">
        	    <option value="" style="display: none;" {{ old('Competency_id', optional($competencyWeight)->Competency_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select competency</option>
        	@foreach ($competencies as $key => $competency)
			    <option value="{{ $key }}" {{ old('Competency_id', optional($competencyWeight)->Competency_id) == $key ? 'selected' : '' }}>
			    	{{ $competency }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('Competency_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<script>
    function processs(input) {
        let value = input.value;
        let text = value.replace(/[^0-9, ]/g, "");
        input.value = text;
    }
</script>