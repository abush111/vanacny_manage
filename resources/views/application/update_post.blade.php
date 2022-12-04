@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header" style="background-color: #00068E;color:white">Job vanancy post </div>
    <div class="card-body">
        
        <form action="{{url('jobppost')}}" method="post">
            @csrf
            @method('PUT')
          <div class="mb-6"> 
            <label>Vacancy discriptions</label></br>
          <textarea type="text"  name="discription_of_jobebc" rows="5"  class="form-control"> {{$art_objs->discription_of_jobebc}}</textarea></br>
          </div>
          
          <label>Disclaimer</label></br>
          <textarea type="text" name="disclaimer"   rows="5" class="form-control">{{$art_objs->disclaimer}} </textarea></br>
          <label>How to apply</label></br>
          <textarea type="text" name="how_to_apply"  rows="5"  class="form-control">{{$art_objs->how_to_apply}} </textarea></br>
          <label>Position of job</label></br>
          <textarea type="text" name="position_of_jobs"  rows="5"  class="form-control">{{$art_objs->position_of_jobs}}</textarea></br>
          <label>Job Requirement</label></br>
          <textarea type="text" name="job_requirements"  rows="5"  class="form-control">{{$art_objs->job_requirements}} </textarea></br>
          <input type="submit" value="Update" class="btn btn-success"></br>
      </form>
    
    </div>
  </div>
@endsection