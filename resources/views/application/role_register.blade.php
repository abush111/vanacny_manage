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

				<th style="color:white"> Level education</th>
				<th style="color:white">Date of Graduation</th>
				<th style="color:white">Cummulative Gpa</th>
				<th style="color:white">Institute</th>
                <th style="color:white">level of Language</th>
				<th style="color:white">Language</th>
                <th style="color:white">Education_credentinal</th>
				<th style="color:white">CV</th>
				<th style="color:white">Action</th>
			</tr>
			

				@foreach($background_educations as $row)

					<tr>
						
						<td>{{ $row->Level_education }}</td>
						<td>{{ $row->Dateof_Graduation  }}</td>
						<td>{{ $row->CummulativeGpa}}</td>
                       
						<td>{{ $row->Institute  }}</td>
                        <td>{{ $row->leveloflanguage }}</td>
					
                        <td>{{ $row->language}}</td>
                        
                            <td><a href="{{url('/viewman',$row->Education)}}"> View</a></td>
                        <td><a href="{{url('/view',$row->Attachement)}}"> View</a></td>
						<td>
                            
                            <a  href="/delete/{{$row->id}}"><button class="btn btn-danger btn-sm"> <span class="fa fa-trash" aria-hidden="true"></span></button></a>
							
						</td>
					</tr>

				@endforeach

			
		</table>
		
	</div>
</div>

@endsection