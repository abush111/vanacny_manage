
<div class="form-group {{ $errors->has('bsc_value') ? 'has-error' : '' }}">
    <label for="bsc_value" class="col-md-2 control-label">Bsc Value</label>
    <div class="col-md-10">
        <input class="form-control" name="bsc_value" type="text" id="bsc_value" value="{{ old('bsc_value', optional($performance)->bsc_value) }}" minlength="1" placeholder="Enter bsc value here...">
        {!! $errors->first('bsc_value', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('competency_value') ? 'has-error' : '' }}">
    <label for="competency_value" class="col-md-2 control-label">Competency Value</label>
    <div class="col-md-10">
        <input class="form-control" name="competency_value" type="text" id="competency_value" value="{{ old('competency_value', optional($performance)->competency_value) }}" minlength="1" placeholder="Enter competency value here...">
        {!! $errors->first('competency_value', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('pos_type') ? 'has-error' : '' }}">
    <label for="pos_type" class="col-md-2 control-label">Pos Type</label>
    <div class="col-md-10">
        <input class="form-control" name="pos_type" type="text" id="pos_type" value="{{ old('pos_type', optional($performance)->pos_type) }}" minlength="1" placeholder="Enter pos type here...">
        {!! $errors->first('pos_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Employee_id') ? 'has-error' : '' }}">
    <label for="Employee_id" class="col-md-2 control-label">Employee</label>
    <div class="col-md-10">
        <select class="form-control" id="Employee_id" name="Employee_id">
        	    <option value="" style="display: none;" {{ old('Employee_id', optional($performance)->Employee_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select employee</option>
        	@foreach ($employees as $key => $employee)
			    <option value="{{ $key }}" {{ old('Employee_id', optional($performance)->Employee_id) == $key ? 'selected' : '' }}>
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
        	    <option value="" style="display: none;" {{ old('Yearsetting_id', optional($performance)->Yearsetting_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select yearsetting</option>
        	@foreach ($yearsettings as $key => $yearsetting)
			    <option value="{{ $key }}" {{ old('Yearsetting_id', optional($performance)->Yearsetting_id) == $key ? 'selected' : '' }}>
			    	{{ $yearsetting }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Yearsetting_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Level_id') ? 'has-error' : '' }}">
    <label for="Level_id" class="col-md-2 control-label">Level</label>
    <div class="col-md-10">
        <select class="form-control" id="Level_id" name="Level_id">
        	    <option value="" style="display: none;" {{ old('Level_id', optional($performance)->Level_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select level</option>
        	@foreach ($levels as $key => $level)
			    <option value="{{ $key }}" {{ old('Level_id', optional($performance)->Level_id) == $key ? 'selected' : '' }}>
			    	{{ $level }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Level_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

