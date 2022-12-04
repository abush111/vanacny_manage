
<div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
    <label for="value" class="col-md-2 control-label">Value</label>
    <div class="col-md-10">
        <input class="form-control" name="value" type="text" id="value" value="{{ old('value', optional($expertevaluation)->value) }}" minlength="1" placeholder="Enter value here...">
        {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('evaluation_status') ? 'has-error' : '' }}">
    <label for="evaluation_status" class="col-md-2 control-label">Evaluation Status</label>
    <div class="col-md-10">
        <input class="form-control" name="evaluation_status" type="text" id="evaluation_status" value="{{ old('evaluation_status', optional($expertevaluation)->evaluation_status) }}" minlength="1" placeholder="Enter evaluation status here...">
        {!! $errors->first('evaluation_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Competency_id') ? 'has-error' : '' }}">
    <label for="Competency_id" class="col-md-2 control-label">Competency</label>
    <div class="col-md-10">
        <select class="form-control" id="Competency_id" name="Competency_id">
        	    <option value="" style="display: none;" {{ old('Competency_id', optional($expertevaluation)->Competency_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select competency</option>
        	@foreach ($competencies as $key => $competency)
			    <option value="{{ $key }}" {{ old('Competency_id', optional($expertevaluation)->Competency_id) == $key ? 'selected' : '' }}>
			    	{{ $competency }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Competency_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('CompetencyWeightCompetencylist_id') ? 'has-error' : '' }}">
    <label for="CompetencyWeightCompetencylist_id" class="col-md-2 control-label">Competency Weight Competencylist</label>
    <div class="col-md-10">
        <select class="form-control" id="CompetencyWeightCompetencylist_id" name="CompetencyWeightCompetencylist_id">
        	    <option value="" style="display: none;" {{ old('CompetencyWeightCompetencylist_id', optional($expertevaluation)->CompetencyWeightCompetencylist_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select competency weight competencylist</option>
        	@foreach ($competencyWeightCompetencylists as $key => $competencyWeightCompetencylist)
			    <option value="{{ $key }}" {{ old('CompetencyWeightCompetencylist_id', optional($expertevaluation)->CompetencyWeightCompetencylist_id) == $key ? 'selected' : '' }}>
			    	{{ $competencyWeightCompetencylist }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('CompetencyWeightCompetencylist_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Employee_id') ? 'has-error' : '' }}">
    <label for="Employee_id" class="col-md-2 control-label">Employee</label>
    <div class="col-md-10">
        <select class="form-control" id="Employee_id" name="Employee_id">
        	    <option value="" style="display: none;" {{ old('Employee_id', optional($expertevaluation)->Employee_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select employee</option>
        	@foreach ($employees as $key => $employee)
			    <option value="{{ $key }}" {{ old('Employee_id', optional($expertevaluation)->Employee_id) == $key ? 'selected' : '' }}>
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
        	    <option value="" style="display: none;" {{ old('evaluator_id', optional($expertevaluation)->evaluator_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select evaluator</option>
        	@foreach ($evaluators as $key => $evaluator)
			    <option value="{{ $key }}" {{ old('evaluator_id', optional($expertevaluation)->evaluator_id) == $key ? 'selected' : '' }}>
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
        	    <option value="" style="display: none;" {{ old('Yearsetting_id', optional($expertevaluation)->Yearsetting_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select yearsetting</option>
        	@foreach ($yearsettings as $key => $yearsetting)
			    <option value="{{ $key }}" {{ old('Yearsetting_id', optional($expertevaluation)->Yearsetting_id) == $key ? 'selected' : '' }}>
			    	{{ $yearsetting }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Yearsetting_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

