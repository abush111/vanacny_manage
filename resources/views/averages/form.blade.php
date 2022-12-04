
<div class="form-group {{ $errors->has('average_value') ? 'has-error' : '' }}">
    <label for="average_value" class="col-md-2 control-label">Average Value</label>
    <div class="col-md-10">
        <input class="form-control" name="average_value" type="number" id="average_value" value="{{ old('average_value', optional($average)->average_value) }}" placeholder="Enter average value here...">
        {!! $errors->first('average_value', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('evaluation_type') ? 'has-error' : '' }}">
    <label for="evaluation_type" class="col-md-2 control-label">Evaluation Type</label>
    <div class="col-md-10">
        <input class="form-control" name="evaluation_type" type="text" id="evaluation_type" value="{{ old('evaluation_type', optional($average)->evaluation_type) }}" minlength="1" placeholder="Enter evaluation type here...">
        {!! $errors->first('evaluation_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Employee_id') ? 'has-error' : '' }}">
    <label for="Employee_id" class="col-md-2 control-label">Employee</label>
    <div class="col-md-10">
        <select class="form-control" id="Employee_id" name="Employee_id">
        	    <option value="" style="display: none;" {{ old('Employee_id', optional($average)->Employee_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select employee</option>
        	@foreach ($employees as $key => $employee)
			    <option value="{{ $key }}" {{ old('Employee_id', optional($average)->Employee_id) == $key ? 'selected' : '' }}>
			    	{{ $employee }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Employee_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Yearsetting_id') ? 'has-error' : '' }}">
    <label for="Yearsetting_id" class="col-md-2 control-label">Yearsetting</label>
    <div class="col-md-10">
        <select class="form-control" id="Yearsetting_id" name="Yearsetting_id">
        	    <option value="" style="display: none;" {{ old('Yearsetting_id', optional($average)->Yearsetting_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select yearsetting</option>
        	@foreach ($yearsettings as $key => $yearsetting)
			    <option value="{{ $key }}" {{ old('Yearsetting_id', optional($average)->Yearsetting_id) == $key ? 'selected' : '' }}>
			    	{{ $yearsetting }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Yearsetting_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

