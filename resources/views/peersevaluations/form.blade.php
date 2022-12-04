
<div class="form-group {{ $errors->has('peersvalue') ? 'has-error' : '' }}">
    <label for="peersvalue" class="col-md-2 control-label">Peersvalue</label>
    <div class="col-md-10">
        <input class="form-control" name="peersvalue" type="text" id="peersvalue" value="{{ old('peersvalue', optional($peersevaluation)->peersvalue) }}" minlength="1" placeholder="Enter peersvalue here...">
        {!! $errors->first('peersvalue', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('peers_status') ? 'has-error' : '' }}">
    <label for="peers_status" class="col-md-2 control-label">Peers Status</label>
    <div class="col-md-10">
        <input class="form-control" name="peers_status" type="text" id="peers_status" value="{{ old('peers_status', optional($peersevaluation)->peers_status) }}" minlength="1" placeholder="Enter peers status here...">
        {!! $errors->first('peers_status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Competency_id') ? 'has-error' : '' }}">
    <label for="Competency_id" class="col-md-2 control-label">Competency</label>
    <div class="col-md-10">
        <select class="form-control" id="Competency_id" name="Competency_id">
        	    <option value="" style="display: none;" {{ old('Competency_id', optional($peersevaluation)->Competency_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select competency</option>
        	@foreach ($competencies as $key => $competency)
			    <option value="{{ $key }}" {{ old('Competency_id', optional($peersevaluation)->Competency_id) == $key ? 'selected' : '' }}>
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
        	    <option value="" style="display: none;" {{ old('CompetencyWeightCompetencylist_id', optional($peersevaluation)->CompetencyWeightCompetencylist_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select competency weight competencylist</option>
        	@foreach ($competencyWeightCompetencylists as $key => $competencyWeightCompetencylist)
			    <option value="{{ $key }}" {{ old('CompetencyWeightCompetencylist_id', optional($peersevaluation)->CompetencyWeightCompetencylist_id) == $key ? 'selected' : '' }}>
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
        	    <option value="" style="display: none;" {{ old('Employee_id', optional($peersevaluation)->Employee_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select employee</option>
        	@foreach ($employees as $key => $employee)
			    <option value="{{ $key }}" {{ old('Employee_id', optional($peersevaluation)->Employee_id) == $key ? 'selected' : '' }}>
			    	{{ $employee }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Employee_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('peersevaluator_id') ? 'has-error' : '' }}">
    <label for="peersevaluator_id" class="col-md-2 control-label">Peersevaluator</label>
    <div class="col-md-10">
        <select class="form-control" id="peersevaluator_id" name="peersevaluator_id">
        	    <option value="" style="display: none;" {{ old('peersevaluator_id', optional($peersevaluation)->peersevaluator_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select peersevaluator</option>
        	@foreach ($peersevaluators as $key => $peersevaluator)
			    <option value="{{ $key }}" {{ old('peersevaluator_id', optional($peersevaluation)->peersevaluator_id) == $key ? 'selected' : '' }}>
			    	{{ $peersevaluator }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('peersevaluator_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Yearsetting_id') ? 'has-error' : '' }}">
    <label for="Yearsetting_id" class="col-md-2 control-label">Yearsetting</label>
    <div class="col-md-10">
        <select class="form-control" id="Yearsetting_id" name="Yearsetting_id">
        	    <option value="" style="display: none;" {{ old('Yearsetting_id', optional($peersevaluation)->Yearsetting_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select yearsetting</option>
        	@foreach ($yearsettings as $key => $yearsetting)
			    <option value="{{ $key }}" {{ old('Yearsetting_id', optional($peersevaluation)->Yearsetting_id) == $key ? 'selected' : '' }}>
			    	{{ $yearsetting }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Yearsetting_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

