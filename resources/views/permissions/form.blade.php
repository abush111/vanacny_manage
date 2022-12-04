
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($permissions)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($permissions)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
    <label for="display_name" class="col-md-2 control-label">Display Name</label>
    <div class="col-md-10">
        <input class="form-control" name="display_name" type="text" id="display_name" value="{{ old('display_name', optional($permissions)->display_name) }}" minlength="1" placeholder="Enter display name here...">
        {!! $errors->first('display_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

