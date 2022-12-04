
<div class="form-group {{ $errors->has('Employee_id') ? 'has-error' : '' }}">
    <label for="Employee_id" class="col-md-2 control-label">Employee</label>
    <div class="col-md-10">
        <select class="form-control" id="Employee_id" name="Employee_id">
        	    <option value="" style="display: none;" {{ old('Employee_id', optional($leaderevaluationstatus)->Employee_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select employee</option>
        	@foreach ($employees as $key => $employee)
			    <option value="{{ $key }}" {{ old('Employee_id', optional($leaderevaluationstatus)->Employee_id) == $key ? 'selected' : '' }}>
			    	{{ $employee }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Employee_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('evaluator_id') ? 'has-error' : '' }}">
    <label for="evaluator_id" class="col-md-2 control-label">Evaluator</label>
    <div class="col-md-10">
        <select class="form-control" id="evaluator_id" name="evaluator_id">
        	    <option value="" style="display: none;" {{ old('evaluator_id', optional($leaderevaluationstatus)->evaluator_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select evaluator</option>
        	@foreach ($evaluators as $key => $evaluator)
			    <option value="{{ $key }}" {{ old('evaluator_id', optional($leaderevaluationstatus)->evaluator_id) == $key ? 'selected' : '' }}>
			    	{{ $evaluator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('evaluator_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Yearsetting_id') ? 'has-error' : '' }}">
    <label for="Yearsetting_id" class="col-md-2 control-label">Yearsetting</label>
    <div class="col-md-10">
        <select class="form-control" id="Yearsetting_id" name="Yearsetting_id">
        	    <option value="" style="display: none;" {{ old('Yearsetting_id', optional($leaderevaluationstatus)->Yearsetting_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select yearsetting</option>
        	@foreach ($yearsettings as $key => $yearsetting)
			    <option value="{{ $key }}" {{ old('Yearsetting_id', optional($leaderevaluationstatus)->Yearsetting_id) == $key ? 'selected' : '' }}>
			    	{{ $yearsetting }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Yearsetting_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('evaluator_type') ? 'has-error' : '' }}">
    <label for="evaluator_type" class="col-md-2 control-label">Evaluator Type</label>
    <div class="col-md-10">
        <input class="form-control" name="evaluator_type" type="text" id="evaluator_type" value="{{ old('evaluator_type', optional($leaderevaluationstatus)->evaluator_type) }}" minlength="1" placeholder="Enter evaluator type here...">
        {!! $errors->first('evaluator_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hr_status') ? 'has-error' : '' }}">
    <label for="hr_status" class="col-md-2 control-label">Hr Status</label>
    <div class="col-md-10">
        <input class="form-control" name="hr_status" type="text" id="hr_status" value="{{ old('hr_status', optional($leaderevaluationstatus)->hr_status) }}" minlength="1" placeholder="Enter hr status here...">
        {!! $errors->first('hr_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

