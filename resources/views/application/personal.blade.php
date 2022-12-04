@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="card" style="width: 100%">
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
	<div class="co1-6">
		<table class="table table-bordered" style="width: 100%">
			<tr style="background-color:#00068E">

				<th style="color:white">First name</th>
				<th style="color:white">Last name</th>
				<th style="color:white">Phone</th>
				<th style="color:white">Email</th>
                <th style="color:white">Age</th>
                <th style="color:white">BirthDate</th>
                <th style="color:white">City</th>
				<th style="color:white">Region</th>
				<th style="color:white">Disablity</th>
                <th style="color:white">Woreda</th>
				<th style="color:white">Marital_status</th>
				<th style="color:white">Action</th>
			
			</tr>
			

				@foreach($personal_detial  as $row)

					<tr>
						
						<td>{{ $row->First_name }}</td>
						<td>{{ $row->Last_name }}</td>
						<td>{{ $row->Phone}}</td>
                       
						<td>{{ $row->Email }}</td>
                        <td>{{ $row->Age}}</td>
					
                        <td>{{ $row->BirthDate}}</td>
                        <td>{{ $row->City }}</td>
						<td>{{ $row->Region}}</td>
                       
						
                        <td>{{ $row->Disablity}}</td>
					
                       
                        <td>{{ $row->Woreda }}</td>
					
                        <td>{{ $row->Marital_status}}</td>
                        <td>
                            <a  href="/destory/{{$row->id}}"><button class="btn btn-danger btn-sm"> <span class="fa fa-trash" aria-hidden="true"></span></button></a>
                        </td>
                        
                        
                        
					
					</tr>

				@endforeach

			
		</table>
		
	</div>
</div>

@endsection