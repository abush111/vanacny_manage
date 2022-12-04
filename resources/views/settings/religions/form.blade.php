<h6 class="ml-2">{{(__('setting.requiredField'))}}<span class="text-danger">*</span> </h6>
<hr>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">{{(__('setting.ReligionName'))}} <span class="text-danger">*</span></label>
    <div class="col-md-12">
        <input class="form-control" name="name" type="text" oninput="processs(this)" id="name"
            value="{{ old('name', optional($religion)->name) }}" minlength="1" maxlength="255" required="true"
            placeholder="{{(__('employee.Enter Religion Name Here'))}}">
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-4 control-label">{{(__('setting.Description'))}}</label>
    <div class="col-md-12">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1"
            maxlength="1000">{{ old('description', optional($religion)->description) }}</textarea>
    </div>
</div>
<script>
    // function to accept only alephbet and space even in copy pase
  function processs(input)
   {
  let value = input.value;
  let text = value.replace(/[^A-Z,a-z, ]/g, "");
  input.value = text;
   }

</script>