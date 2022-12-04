
<div class="form-group {{ $errors->has('immediateevalue') ? 'has-error' : '' }}">
    <label for="immediateevalue" class="col-md-2 control-label">Immediateevalue</label>
    <div class="col-md-10">
        <input class="form-control" name="immediateevalue" type="text" id="immediateevalue" value="{{ old('immediateevalue', optional($immediateevaluation)->immediateevalue) }}" minlength="1" placeholder="Enter immediateevalue here...">
        {!! $errors->first('immediateevalue', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('immediate_status') ? 'has-error' : '' }}">
    <label for="immediate_status" class="col-md-2 control-label">Immediate Status</label>
    <div class="col-md-10">
        <input class="form-control" name="immediate_status" type="text" id="immediate_status" value="{{ old('immediate_status', optional($immediateevaluation)->immediate_status) }}" minlength="1" placeholder="Enter immediate status here...">
        {!! $errors->first('immediate_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Competency_id') ? 'has-error' : '' }}">
    <label for="Competency_id" class="col-md-2 control-label">Competency</label>
    <div class="col-md-10">
        <select class="form-control" id="Competency_id" name="Competency_id">
        	    <option value="" style="display: none;" {{ old('Competency_id', optional($immediateevaluation)->Competency_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select competency</option>
        	@foreach ($competencies as $key => $competency)
			    <option value="{{ $key }}" {{ old('Competency_id', optional($immediateevaluation)->Competency_id) == $key ? 'selected' : '' }}>
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
        	    <option value="" style="display: none;" {{ old('CompetencyWeightCompetencylist_id', optional($immediateevaluation)->CompetencyWeightCompetencylist_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select competency weight competencylist</option>
        	@foreach ($competencyWeightCompetencylists as $key => $competencyWeightCompetencylist)
			    <option value="{{ $key }}" {{ old('CompetencyWeightCompetencylist_id', optional($immediateevaluation)->CompetencyWeightCompetencylist_id) == $key ? 'selected' : '' }}>
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
        	    <option value="" style="display: none;" {{ old('Employee_id', optional($immediateevaluation)->Employee_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select employee</option>
        	@foreach ($employees as $key => $employee)
			    <option value="{{ $key }}" {{ old('Employee_id', optional($immediateevaluation)->Employee_id) == $key ? 'selected' : '' }}>
			    	{{ $employee }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Employee_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('immediateevaluator_id') ? 'has-error' : '' }}">
    <label for="immediateevaluator_id" class="col-md-2 control-label">Immediateevaluator</label>
    <div class="col-md-10">
        <select class="form-control" id="immediateevaluator_id" name="immediateevaluator_id">
        	    <option value="" style="display: none;" {{ old('immediateevaluator_id', optional($immediateevaluation)->immediateevaluator_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select immediateevaluator</option>
        	@foreach ($immediateevaluators as $key => $immediateevaluator)
			    <option value="{{ $key }}" {{ old('immediateevaluator_id', optional($immediateevaluation)->immediateevaluator_id) == $key ? 'selected' : '' }}>
			    	{{ $immediateevaluator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('immediateevaluator_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Yearsetting_id') ? 'has-error' : '' }}">
    <label for="Yearsetting_id" class="col-md-2 control-label">Yearsetting</label>
    <div class="col-md-10">
        <select class="form-control" id="Yearsetting_id" name="Yearsetting_id">
        	    <option value="" style="display: none;" {{ old('Yearsetting_id', optional($immediateevaluation)->Yearsetting_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select yearsetting</option>
        	@foreach ($yearsettings as $key => $yearsetting)
			    <option value="{{ $key }}" {{ old('Yearsetting_id', optional($immediateevaluation)->Yearsetting_id) == $key ? 'selected' : '' }}>
			    	{{ $yearsetting }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Yearsetting_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

