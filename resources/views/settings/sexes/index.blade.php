@extends('layouts.app')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('pagetitle')
    {{ __('setting.Sexes') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('settings.setting.index') }}">{{ __('setting.Setting') }}</a></li>
    <li class="breadcrumb-item active">{{ __('setting.Sexes') }}</li>
@endsection
@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script type="text/javascript">
        function deleteConfirmation(id) {
            swal.fire({
                title: "Delete?",
                type: 'question',
                text: "Are you sure you want to delete this sex?",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: '<span class="fa fa-trash"></span> Yes, delete it!',
                cancelButtonText: "No, cancel!",
                confirmButtonColor: '#d33',
                reverseButtons: !0
            }).then(function(e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('settings/sexes/delete') }}/" + id,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            if (results.success === true) {
                                swal.fire("Done!", results.message, "success");
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                swal.fire("Error!", results.message, "error");
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function(dismiss) {
                return false;
            })
        }
    </script>
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('setting.SexesList') }}</h3>
        </div>

        <div class="card-body">
            @permission('setting_Sexes-List')
                @if (count($sexes) == 0)
                    <h4 class="text-center">{{ __('setting.NoSexesAvailable') }}.</h4>
                @else
                    <table class="table table-striped" id="sex_table">
                        <thead>
                            <tr>
                                <th>{{ __('setting.Number') }}</th>
                                <th>{{ __('setting.Name') }}</th>
                                <th>{{ __('setting.Description') }}</th>
                                <th class="text-center">{{ __('setting.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sexes as $sex)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sex->name }}</td>
                                    <td>{{ $sex->description }}</td>
                                    <td class="text-center">
                                        @permission('setting_Sexes-Edit')
                                            <a href="{{ route('sexes.sex.edit', $sex->id) }}" class="btn btn-warning mr-4"
                                                title="Edit Sex">
                                                <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                            </a>
                                        @endpermission
                                        @permission('setting_Sexes-Delete')
                                            <button class="btn btn-danger remove-data"
                                                onclick="deleteConfirmation({{ $sex->id }})">
                                                <span class="fa fa-trash" aria-hidden="true"></span>
                                            </button>
                                        @endpermission
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-2">
                        {{ $sexes->links() }}
                    </div>
                @endif
            @endpermission
        </div>
    </div>
    @permission('setting_Sexes-AddNew')
        <a href="{{ route('sexes.sex.create') }}" class="btn btn-success" title="Create New Sex">
            <span class="fa fa-plus" aria-hidden="true"> {{ __('setting.AddNew') }}</span>
        </a>
    @endpermission
@endsection
@section('javascripts')
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#sex_table').DataTable({
                paging: false,
                info: false,
                colReorder: true,
                dom: '<"wrapper clearfix"Bfrp>',
                buttons: [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }, {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],
                columnDefs: [{
                    targets: 3,
                    orderable: false
                }]
            });
            $("#sex_table_filter").addClass("d-inline float-right");
            $("<hr>").insertBefore("#sex_table");
        });
    </script>
@endsection
