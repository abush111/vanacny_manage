@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header" >
		<div class="row" style=" background-color: #E5E6E7;">
            <span> <img src="/images/ebc.jpg" sizes="34"  style="height: 120px"/> </span>
			<div  style="margin-left: 250px"><h1 style="color: #00068E " >  Ethiopian Broadcasting Corporation </h1>
                <div style="margin-left: 220px"> <h1  style="color: #00068E" >  Applicants list </h1> </div>  
            </div>
                
			<div class="col col-md-6">
				
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<tr style="background-color:#00068E">

				<th style="color:white"> Vacancy discriptions</th>
				<th style="color:white">Disclaimer</th>
				<th style="color:white">How to apply</th>
				<th style="color:white">Position of job</th>
                <th style="color:white">Job Requirement</th>
				
             
				<th style="color:white">Action</th>
			</tr>
			

				@foreach($work_experience as $row)

					<tr>
						
						<td>{{ $row->discription_of_jobebc }}</td>
						<td>{{ $row->disclaimer  }}</td>
						<td>{{ $row->how_to_apply}}</td>
                       
						<td>{{ $row->position_of_jobs}}</td>
                        <td>{{ $row->job_requirements }}</td>
					
                        
                        
                            
						<td>
                            
                            
                            <div class="column" style="margin-bottom: 7px">
                            <a  href="/deletepost/{{$row->id}}"><button class="btn btn-danger btn-sm"> <span class="fa fa-trash" aria-hidden="true"></span></button></a>
                            </div>
                            <div>
                            <a  href="/postEdit/{{$row->id}}"><button  class="btn btn-warning">  <span class="fa fa-edit text-white" aria-hidden="true"></span></button></a>
                            </div>
						</td>
					</tr>

				@endforeach

			
		</table>
		
	</div>
</div>

@endsection