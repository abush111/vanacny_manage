
<div class="form-group {{ $errors->has('employeecompetency_name') ? 'has-error' : '' }}">
    <label for="employeecompetency_name" class="col-md-2 control-label">Employeecompetency Name</label>
    <div class="col-md-10">
        <input class="form-control" name="employeecompetency_name" type="text" id="employeecompetency_name" value="{{ old('employeecompetency_name', optional($employeecompetency)->employeecompetency_name) }}" minlength="1" placeholder="Enter employeecompetency name here...">
        {!! $errors->first('employeecompetency_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('employee_competency_description') ? 'has-error' : '' }}">
    <label for="employee_competency_description" class="col-md-2 control-label">Employee Competency Description</label>
    <div class="col-md-10">
        <input class="form-control" name="employee_competency_description" type="text" id="employee_competency_description" value="{{ old('employee_competency_description', optional($employeecompetency)->employee_competency_description) }}" minlength="1" placeholder="Enter employee competency description here...">
        {!! $errors->first('employee_competency_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

