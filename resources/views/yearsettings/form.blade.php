

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-calendar/css/redmond.calendars.picker.css') }}">
@endsection

<div class="form-group col-md-4 {{ $errors->has('from') ? 'has-error' : '' }}">
    <label for="from" class="col-md-12 control-label">{{ __('setting.from') }} <span
            class="text-danger">*</span></label>
    <div class="col-md-12">
        <input class="form-control" name="from" type="text" id="from"
            value="{{ old('from', optional($yearsetting)->from) }}" minlength="1"
            required="true">
    </div>
</div>

<div class="form-group col-md-4 {{ $errors->has('to') ? 'has-error' : '' }}">
    <label for="to" class="col-md-12 control-label">{{ __('setting.to') }} <span
            class="text-danger">*</span></label>
    <div class="col-md-12">
        <input class="form-control" name="to" type="text" id="to"
            value="{{ old('to', optional($yearsetting)->to) }}" minlength="1"
            required="true">
    </div>
</div>

@section('javascripts')
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.plugin.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.plus.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.picker.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.ethiopian.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.ethiopian-am.js') }}"></script>
    <script>
        $('#from').calendarsPicker({
            calendar: $.calendars.instance('ethiopian', 'am'),
            pickerClass: 'myPicker',
            dateFormat: 'yyyy-mm-dd'
        });
    </script>
    <script>
        $('#to').calendarsPicker({
            calendar: $.calendars.instance('ethiopian', 'am'),
            pickerClass: 'myPicker',
            dateFormat: 'yyyy-mm-dd'
        });
    </script>
   @endsection

