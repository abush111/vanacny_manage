@extends('layouts.app')
@section('pagetitle')
{{__('employee.Dashboard')}}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active">{{__('employee.Dashboard')}}</li>
@endsection
@section('content')
<h2> Welcome {{ Auth::user()->email }} </h2>

           
             
            </div>
            <!-- /.card -->
                         <div class="col-md-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <p class="text-muted fw-medium">Permission</p>
                                        </div>

                                        <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="bx bx-archive-in font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
               <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Usage</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <canvas id="pieChart" height="150"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <li><i class="far fa-circle text-danger"></i> Role</li>
                      <li><i class="far fa-circle text-success"></i> user</li>
                      <li><i class="far fa-circle text-warning"></i> Permission</li>
                      <li><i class="far fa-circle text-info"></i> male</li>
                      <li><i class="far fa-circle text-primary"></i> female</li>
                      <li><i class="far fa-circle text-secondary"></i> total</li>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
             
@endsection