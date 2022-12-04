@extends('layouts.app')
@section('pagetitle')
    {{ __('Leadership Summary Form') }}
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-calendar/css/redmond.calendars.picker.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a
        href="{{ route('leadership_summary_form.index', $employee) }}">{{ __('Leadership Summary
                Form') }}</a>
</li>
<li class="breadcrumb-item active">{{ __('Create Leadership Summary Form') }}</li>
@endsection
@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title mb-1">{{ __('Create Leadership Summary Form') }}</h3>
    </div>
    <div class="card-body">

        <form method="POST" action="{{ route('competencylists.competencylist.performance_form_store') }}" accept-charset="UTF-8"
            id="create_employee_certification_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <h6 class="ml-2">{{ __('setting.requiredField') }}<span class="text-danger">*</span> </h6>
            {{-- <h5 class="ml-2">1. የተጨባጭ ውጤት አፈጻጸም ምዘና (60%)</h5> --}}
            <hr>
            <input type="hidden" value="1" name="status">
            <input type="hidden" value="{{ $years->id }}"name="YS" >
            <input type="hidden" value="{{$employee->id  }}" name="empid" >
         <input type="hidden" value="{{$employee_evaluated->id  }}"name="evaluatedid" >
            <div class="row">
                <div class="form-group col-md-6 {{ $errors->has('employee_id') ? 'has-error' : '' }}">
                    <label for="employee_id" class="col-md-12 control-label">{{ __('የተመዛኝ ስም') }} <span
                            class="text-danger">*</span></label>
                    <div class="col-md-12">
                        {{-- <select class="form-control form-control-uniform" name="employee_id"
                            data-button-class="btn bg-teal-400" data-fouc>
                            <option value="" disabled="" ed{{ old('employee_id') ? '' : 'selected' }}>የተመዛኝ ስም ይመረጡ
                            </option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('employee_id') ? 'selected' : '' }}>
                                    {{ $employee->am_name }}</option>
                                <span
                                    class="{{ $errors->has('employee_id') ? 'helper-text red-text' : '' }}">{{ $errors->first('employee_id') }}</span>
                            @endforeach
                        </select> --}}

                        <input class="form-control" name="en_acronym" type="text" id="en_acronym"
                value="{{ $employee_evaluated->en_name }}" minlength="1">

                    </div>
                </div>

                <div class="form-group col-md-6 {{ $errors->has('sector_id') ? 'has-error' : '' }}">
                    <label for="title" class="col-md-12 control-label">{{ __('ዘርፍ') }} <span
                            class="text-danger">*</span></label>
                    <div class="col-md-12">
                        {{-- <select class="form-control form-control-uniform" name="sector_id"
                            data-button-class="btn bg-teal-400" data-fouc>
                            <option value="" disabled="" ed{{ old('sector_id') ? '' : 'selected' }}>ዘርፍ
                            </option>
                            @foreach ($sectors as $sector)
                                <option value="{{ $sector->id }}" {{ old('sector_id') ? 'selected' : '' }}>
                                    {{ $sector->en_name }}</option>
                                <span
                                    class="{{ $errors->has('sector_id') ? 'helper-text red-text' : '' }}">{{ $errors->first('sector_id') }}</span>
                            @endforeach
                        </select> --}}

                        <input class="form-control" name="en_acronym" type="text" id="en_acronym"
                value="{{$employee_evaluated->organizationUnitse->en_name }}" minlength="1">

                    </div>
                </div>

                <div class="form-group col-md-6 {{ $errors->has('level_id') ? 'has-error' : '' }}">
                    <label for="title" class="col-md-12 control-label">{{ __('የተመዘነበት የሃላፊነት ደረጃ') }} <span
                            class="text-danger">*</span></label>
                    <div class="col-md-12">
                        {{-- <select class="form-control form-control-uniform" name="level_id"
                            data-button-class="btn bg-teal-400" data-fouc>
                            <option value="" disabled="" ed{{ old('level_id') ? '' : 'selected' }}>ዘርፍ
                            </option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" {{ old('level_id') ? 'selected' : '' }}>
                                    {{ $level->job_description }}</option>
                                <span
                                    class="{{ $errors->has('level_id') ? 'helper-text red-text' : '' }}">{{ $errors->first('level_id') }}</span>
                            @endforeach
                        </select> --}}

                        <input class="form-control" name="en_acronym" type="text" id="en_acronym"
                value="{{$employee_evaluated->jobPositions->job_description }}" minlength="1">


                    </div>
                </div>

                <div class="form-group col-md-3 {{ $errors->has('from') ? 'has-error' : '' }}">
                    <label for="from" class="col-md-12 control-label">{{ __('የምዘና ጊዜ (ከ)') }} <span
                            class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <input class="form-control" name="en_acronym" type="text" id="en_acronym"
                        value="{{$years->from }}" minlength="1">
                    </div>
                </div>
                <div class="form-group col-md-3 {{ $errors->has('to') ? 'has-error' : '' }}">
                    <label for="to" class="col-md-12 control-label">{{ __('የምዘና ጊዜ (እስከ)') }} <span
                            class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input class="form-control" name="en_acronym" type="text" id="en_acronym"
                                value="{{$years->to }}" minlength="1">
                            </div>
                </div>
                {{-- <div class="form-group col-md-6 {{ $errors->has('performed_tasks') ? 'has-error' : '' }}">
                    <label for="to" class="col-md-12 control-label">{{ __('የተከናወኑ ተግባራት') }} <span
                            class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="performed_tasks" type="text" id="performed_tasks"
                            value="{{ Request::old('performed_tasks') ?: '' }}" placeholder="የተከናወኑ ተግባራት"></textarea>
                        <span
                            class="{{ $errors->has('performed_tasks') ? 'helper-text red-text' : '' }}">{{ $errors->first('performed_tasks') }}</span>
                    </div>
                </div> --}}

                {{-- <div class="form-group col-md-6 {{ $errors->has('results_obtained') ? 'has-error' : '' }}">
                    <label for="to" class="col-md-12 control-label">{{ __('የተገኘ ዉጤት') }} <span
                            class="text-danger">*</span></label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="results_obtained" type="text" id="results_obtained"
                            value="{{ Request::old('results_obtained') ?: '' }}" placeholder="የተገኘ ዉጤት"></textarea>
                        <span
                            class="{{ $errors->has('results_obtained') ? 'helper-text red-text' : '' }}">{{ $errors->first('results_obtained') }}</span>
                    </div>
                </div> --}}
            </div>
            <h5 class="ml-2">2. የኮምፒተንሲ አፈጻጸም (40%)</h5>
            <hr>
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th rowspan="2">የኮምፒተንሲ ዝርዝር</th>
                            <th style="padding-left: 19vw;" colspan="3">የሚመዘኑበት ክብደት</th>
                        </tr>
                        <tr>
                            @permission('employeemanagement-List')
                            <td>ሰራተኞች</td>
                            @endpermission
                            {{-- @permission('equivalentmanagement-List')
                            <td>እኩዮች </td>
                            @endpermission
                            @permission('directormanagement-List')
                            <td>የቅርብ ሃላፊ </td>
                            @endpermission --}}
                        </tr>
                    </thead>
                    <tbody>
                  @foreach ($competencies as $competency)


                        <tr style="background-color: blue;">
                            <td>{{$competency->title}}</td>
                            @permission('employeemanagement-List')
                            <td>{{$competency->weight->Weight_value}}</td>
                            @endpermission
                            {{-- @permission('equivalentmanagement-List')
                            <td>{{$competency->weight->Weight_value}}</td>
                            @endpermission
                            @permission('directormanagement-List')
                            <td>{{$competency->weight->Weight_value}}</td>
                            @endpermission --}}
                        </tr>
                        @if($competency->competecylists->count()>0)
                        @foreach ($competency->competecylists as $list)
                        {{-- @foreach ($competency_weight_lists as $CWL) --}}

                        <tr>
                            {{-- <td>{{$list->competency_list_name}}={{$list->weight->listWeight_value}}</td> --}}
                            <td>{{$list->competency_list_name}}</td>
                            @permission('employeemanagement-List')
                            <td><input type="text" name="empvalue[]">

                                <input type="hidden" value="{{$competency->id  }}" name="competency[]">
                                <input type="hidden" value="{{$list->id }}" name="comlistweight[]">

                            </td>
                            @endpermission
                            {{-- @permission('equivalentmanagement-List')
                            <td><input type="text" name="equvalue[]"></td>
                            <input type="hidden" value="{{$competency->id  }}" name="competency[]">
                                <input type="hidden" value="{{ $list->weight->listWeight_value  }}" name="comlistweight[]">
                            @endpermission
                            @permission('directormanagement-List')
                            <td><input type="text" name="dirvalue[]"></td>
                            <input type="hidden" value="{{$competency->id  }}" name="competency[]">
                                <input type="hidden" value="{{ $list->weight->listWeight_value  }}" name="comlistweight[]">
                            @endpermission --}}
                        </tr>
                        @endforeach


                        {{-- @endforeach --}}
@endif
                        @endforeach


                    </tbody>
                    {{-- <tfoot>
                  <tr>
                    <th>ድምር</th>
                    <th>የምዘና ድርሻ</th>
                    <th>ጠ.ድምር</th>

                  </tr>
                  </tfoot> --}}
                </table>
            </div>

    </div>




    <div class="form-group">
        <div class="col-md-offset-2 col-md-12 text-center">
            <input class="btn btn-primary mr-5" type="submit" value="{{ __('setting.save') }}">
            <a href="{{ route('weight.index', $employee) }}" class="btn btn-warning mr-5" title="Show All Weights">
                {{ __('setting.cancel') }}
            </a>
            <input class="btn btn-danger" type="reset" value="{{ __('setting.Reset') }}">
        </div>
    </div>
    </form>


</div>
</div>
@section('javascripts')
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.plugin.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.plus.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.picker.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.ethiopian.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-calendar/js/jquery.calendars.ethiopian-am.js') }}"></script>

    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
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

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@stop
@endsection
