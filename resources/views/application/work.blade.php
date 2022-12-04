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

				<th style="color:white">Job class name</th>
				<th style="color:white">Employer Salary</th>
				
				<th style="color:white">Job_title</th>
                <th style="color:white" >From_date</th>
                <th style="color:white">To_date</th>
                <th style="color:white">Emp_phonenumber</th>
				<th style="color:white">Re_namefirst</th>
                <th style="color:white">Re_Address</th>
				<th style="color:white">Re_lastname</th>
				<th style="color:white">Action</th>
			
			</tr>
			

				@foreach($work_experience  as $row)

					<tr >
						
						<td>{{ $row->Jobclassname_you_appliedfor }}</td>
						<td>{{ $row->Salary}}</td>
						
                       
						<td>{{ $row->Job_title }}</td>
                        <td>{{ $row->From_date}}</td>
					
                        <td>{{ $row->To_date}}</td>
                        <td>{{ $row->Employer_phonenumber}}</td>
						
                       
						
                        <td>{{ $row->Reference_namefirst}}</td>
					
                       
                        <td>{{ $row->Reference_address }}</td>
					
                        <td>{{ $row->Reference_lastname}}</td>
                        <td>
                            <a  href="/remove/{{$row->id}}"><button class="btn btn-danger btn-sm"> <span class="fa fa-trash" aria-hidden="true"></span></button></a>
                        
                        
                        </td>
					
					</tr>

				@endforeach

			
		</table>
		
	</div>
</div>

@endsection