@extends('layouts.app')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('pagetitle')
{{(__('setting.Roles'))}}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('settings.setting.index') }}">{{(__('setting.Setting'))}}</a></li>
<li class="breadcrumb-item active">{{(__('setting.Banks'))}}</li>
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
                text: "Are you sure you want to delete this bank?",
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
                        url: "{{ url('settings/banks/delete') }}/" + id,
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

@if(Session::has('success_message'))
<div class="alert alert-success">
    <span class="glyphicon glyphicon-ok"></span>
    {!! session('success_message') !!}

    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
@endif
@permission('role-List')
<div class="panel panel-default">

    <div class="panel-heading clearfix">

        <div class="pull-left">
            <h4 class="mt-0 mb-2">Manage Roles</h4>
        </div>
        @permission('role-AddNew')
        <div class="btn-group btn-group-sm pull-left mb-2" role="group">
            <a href="{{ route('roles.role.create') }}" class="btn btn-success" title="Create New Roles">
                <span class="fa fa-plus" aria-hidden="true"> {{(__('setting.AddNew'))}}</span>
            </a>
        </div>
        @endpermission

    </div>

    @if(count($rolesObjects) == 0)
    <div class="panel-body text-center">
        <h4>No Roles Available.</h4>
    </div>
    @else
    <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

            <table class="table table-striped" id="role_table">
                <thead>
                    <tr>
                        <th>{{(__('setting.Number'))}}</th>
                        <th>Name</th>
                        <th>Display Name</th>
                        <th>Permission</th>

                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rolesObjects as $roles)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $roles->name }}</td>
                        <td>{{ $roles->display_name }}</td>
                        <td>
                            @if($roles->permissions())

                            @foreach ($roles->permissions()->get() as $permission )
                            {{ $permission->name }} ,
                            @endforeach

                            @endif
                        </td>

                        <td>

                            <form method="POST" action="{!! route('roles.role.destroy', $roles->id) !!}"
                                accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                <div class="btn-group btn-group-xs pull-right" role="group">
                                    @permission('role-Show')
                                    <a href="{{ route('roles.role.show', $roles->id) }}" class="btn btn-primary ml-2"
                                        title="Show roles">
                                        <span class="fa fa-eye" aria-hidden="true"></span>
                                    </a>
                                    @endpermission
                                    @permission('role-Edit')
                                    <a href="{{ route('roles.role.edit', $roles->id) }}" class="btn btn-warning ml-2"
                                        title="Edit roles">
                                        <span class="fa fa-edit text-white" aria-hidden="true"></span>
                                    </a>
                                    @endpermission

                                    @permission('role-Delete')
                                    <button type="submit" class="btn btn-danger ml-2" title="Delete Role"
                                        onclick="return confirm(&quot;Click Ok to delete Attendance.&quot;)">
                                        <span class="fa fa-trash text-white" aria-hidden="true"></span></buttton>


                                    </button>
                                    @endpermission
                                </div>

                            </form>
                        <td>
                        </td>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="panel-footer">
        {!! $rolesObjects->render() !!}
    </div>

    @endif

</div>
@endpermission
@endsection

@section('javascripts')
<script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
            var table = $('#role_table').DataTable({
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
            $("#role_table_filter").addClass("d-inline float-right");
            $("<hr>").insertBefore("#role_table");
        });

</script>
@endsection

@section('javascripts')
<script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function() {
            var table = $('#role_table').DataTable({
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
            $("#role_table_filter").addClass("d-inline float-right");
            $("<hr>").insertBefore("#role_table");
        });

</script>
@endsection
