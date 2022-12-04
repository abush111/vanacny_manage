@extends('master')
@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@endsection

<div class="row justify-content-center">
    
    <div class="col-12">
        <form wire:submit.prevent="registers" >

            {{-- STEP 1 --}}
    
            @if ($currentStep == 1)
                
         
            <div class="step-one">
                <div class="card">
                   
  
                      <div > 
                    <div class="card-header  text-white" style="background-color: #00068E">
                        <div style="text-align: center">   <h1> Ethiopian Broadcasting Corporation</h1>
                            <h2> Job Application Form</h2></div>
                    <div style="color: white"> 
                        <hr width="100%" 
                          size="7" 
                          color="white"
                         align="center">
                    </div>
                            <div  style=" background-color: #00068E;"> STEP 1/3 - Personal Details</div>
                        </div>
                        
                    <div class="card-body" style=" background-color: #E5E6E7;">
                        <div class="row">
                        
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">First name</label>
                                    <input type="text" class="form-control" placeholder="" wire:model="First_name">
                                   <span class="text-danger">@error('First_name'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                               <div class="form-group">
                                   <label for="">Last name</label>
                                   <input type="text" class="form-control" placeholder="" wire:model="Last_name">
                                   <span class="text-danger">@error('Last_name'){{ $message }}@enderror</span>
                               </div>
                           </div>
                           <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" placeholder="" wire:model="Email">
                                <span class="text-danger">@error('Email'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" placeholder="" wire:model="Phone">
                                <span class="text-danger">@error('Phone'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text" class="form-control" placeholder="" wire:model="City">
                                <span class="text-danger">@error('City'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Zone</label>
                                <input type="text" class="form-control" placeholder="" wire:model="Zone">
                                <span class="text-danger">@error('Zone'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Region</label>
                                <input type="text" class="form-control" placeholder="" wire:model="Region">
                                <span class="text-danger">@error('Region'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Woreda</label>
                                <input type="text" class="form-control" placeholder="" wire:model="Woreda">
                                <span class="text-danger">@error('Woreda'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">House number</label>
                                <input type="text" class="form-control" placeholder="" wire:model="House_number">
                                <span class="text-danger">@error('House_number'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div x-data="datepicker()">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <select  class="form-control" wire:model="Gender">
                                               <option value="" selected>Choose gender</option>
                                               <option value="male">Male</option>
                                               <option value="female">Female</option>
                                        </select>
                                        <span class="text-danger">@error('Gender'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">BirthDate</label>
                                    <input type="date" class="form-control"  wire:model="BirthDate"  >
                                    <span class="text-danger">@error('BirthDate'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            
                           
                        </div>
                           
                            
                             </div>
                        <div class="row">
                            
                            <div class="col-md-4" style="margin-left: 8px">
    
                                <h6 class="mb-2 pb-1">Disablity: </h6>
              
                                <div class="form-check form-check-inline">
                                  
                                  <label class="form-check-label1" for="femaleGender"><input class="form-check-input" type="checkbox"id="femaleGender"
                                    value="Yes" checked  wire:model="Disablity"/>Yes</label>
                                </div>
              
                               
                                  
                                  <label class="form-check-label" for="maleGender"> <input class="form-check-input" type="checkbox"  id="maleGender"
                                    value="NO"  wire:model="Disablity"/> No</label>
                            
                                
                                <span class="text-danger">@error('Disablity'){{ $message }}@enderror</span>
                                
              
                              </div>
                              <div class="col-md-4 ">
    
                                <h6 class="mb-2 pb-1">Marital status: </h6>
              
                                <div class="form-checks form-check-inline">
                                  <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="femaleGender"
                                    value="Single" checked wire:model="Marital_status" />
                                  <label class="form-checks-label" for="femaleGender">Single</label>
                                </div>
              
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="maleGender"
                                    value="Married" wire:model="Marital_status"/>
                                  <label class="form-checks-label" for="maleGender">Married</label>
                                </div>
              
                                <div class="form-checks form-check-inline">
                                  <input class="form-checks-input" type="checkbox" name="inlineRadioOptions" id="otherGender"
                                    value="Divorced" wire:model="Marital_status" />
                                  <label class="form-checks-label" for="otherGender">Divorced</label>
                                </div>
                                <span class="text-danger">@error('Marital_status'){{ $message }}@enderror</span>
                              </div>
                           
                        </div>
                        
                      
                          
                          
                        </div>
                       
                    </div>
                </div>
            </div>
         
            @endif
    
            {{-- STEP 2 --}}
    
            @if ($currentStep == 2)
                
           
            <div class="step-two">
                <div class="card">
                    <div class="card-header  text-white" style="background-color: #00068E">STEP 2/3 - Work Experience</div>
                    <div class="card-body" style=" background-color: #E5E6E7;">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Job class applied for </label>
                                    <input type="text" class="form-control" placeholder=" " wire:model="Jobclassname_you_appliedfor">
                                    <span class="text-danger">@error('Jobclassname_you_appliedfor'){{ $message }}@enderror</span>
                                </div>
                            </div>
                        <div class="card-headers" style="align-content: center">
                            <h3> work experience </h3>
                        </div>
                           
                         </div>


                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Job title </label>
                                    <input type="text" class="form-control" placeholder=" " wire:model="Job_title">
                                    <span class="text-danger">@error('Job_title'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                               <div class="form-group">
                                   <label for=""> From date*
                                </label>
                                 
                                   <input type="date"  wire:model="From_date" class="form-control" >
                                   <span class="text-danger">@error('From_date'){{ $message }}@enderror</span>
                               </div>
                           </div>
                           <div class="col-md-3">
                            <div class="form-group">
                                <label for="">To date*
                             </label>
                             <input type="date"  wire:model="To_date" class="form-control" >
                                <span class="text-danger">@error('To_date'){{ $message }}@enderror</span>
                            </div>
                        </div>
                          
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Employer phone number </label>
                                <input type="text" class="form-control" placeholder="" wire:model="Employer_phonenumber">
                                
                                <span class="text-danger">@error('Employer_phonenumber'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""> Employer postal number</label>
                                <input type="text" class="form-control" placeholder="" wire:model="Employer_postalnumber">
                                <span class="text-danger">@error('Employer_postalnumber'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Salary</label>
                                <input type="text" class="form-control" placeholder="" wire:model="Salary">
                                <span class="text-danger">@error('Salary'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div  style="margin-bottom: 23px">
                            <button class="btn text-white btn-info btn-sm" wire:click.prevent="add()">Add</button> </div>
                            </div>
                        @foreach($contacts as $key => $contact)
                        <div class=" add-input">
                        <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for=""> Job title</label>
                        <input type="text" class="form-control" placeholder="" wire:model="contacts.{{$key}}.Job_title">
                        @error('contacts.'.$key.'.Job_title') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="">From date</label>
                        <input type="date" class="form-control"  wire:model="contacts.{{$key}}.From_date" placeholder="">
                        @error('contacts.'.$key.'.From_date') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">To date</label>
                            <input type="date"  class="form-control" placeholder="" wire:model="contacts.{{$key}}.To_date">
                            @error('contacts.'.$key.'.To_date') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            </div>
                           
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Employer Phone Number</label>
                            <input type="email" class="form-control" wire:model="contacts.{{$key}}.Employer_phonenumber" placeholder="">
                            @error('contacts.'.$key.'.Employer_phonenumber') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Salary</label> 
                                <input type="text" class="form-control" placeholder="" wire:model="contacts.{{$key}}.Salary">
                                @error('contacts.'.$key.'.Salary') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="">Employer Postal Number</label> 
                                    <input type="text" class="form-control" placeholder="" wire:model="contacts.{{$key}}.Employer_postalnumber">
                                    @error('contacts.'.$key.'.Employer_postalnumber') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    </div>
                        <div>
                        <div class="col-md-2" style="margin-bottom: 23px">
                        <button class="btn btn-danger btn-sm" wire:click="delete({{$key}})">remove</button>
                        </div>
                        </div>
                        </div>
                        </div>
                        @endforeach
                    <div class="row"> 
                        <div class="col-md-6 mb-4">
                        
                            <h6 class="mb-2 pb-1">Do you currently on work ? </h6>
                    
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="femaleGender"
                                value="option1" checked   wire:model="Current_on_work"/>
                              <label class="form-check-label" for="femaleGender">Yes</label>
                            </div>
                    
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="maleGender"
                                value="option2" wire:model="Current_on_work"/>
                              <label class="form-check-label" for="maleGender">No</label>
                            </div>
                    
                            <span class="text-danger">@error('Current_on_work'){{ $message }}@enderror</span>
                            
                           
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Write your reason if say no</label>
                                <input type="text" class="form-control" placeholder="" wire:model="If_have_noreason">
                                <span class="text-danger">@error('If_have_noreason'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    
                    </div>
                    
                    
                    
                    <div class="card-headers" style="align-content: center">
                      <h3> Reference </h3>
                    </div>
                    
                    
                    <div>
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                        {{ session('message') }}
                        </div>
                        @endif
                        <form>
                        <div class=" add-input">
                        <div class="row">
                        <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Name first</label>
                        <input type="text" class="form-control" placeholder="" wire:model="Reference_namefirst">
                        @error('Reference_namefirst') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        </div>
                        <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Last name</label>
                        <input type="text" class="form-control" wire:model="Reference_lastname" placeholder=" ">
                        @error('Reference_lastname') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Address</label>
                            <input type="text" class="form-control" placeholder="" wire:model="Reference_address">
                            @error('Reference_address') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            </div>
                            <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Job title</label>
                            <input type="email" class="form-control" wire:model="Reference_jobtitle" placeholder="">
                            @error('Reference_jobtitle') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Phone number</label>
                                <input type="email" class="form-control" wire:model="Reference_phonenumber" placeholder="">
                                @error('Reference_phonenumber') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                </div>
                             
                                <div class="col-md-2">
                                    <button class="btn text-white btn-info btn-sm" wire:click.prevent="add()">Add</button>
                                    </div>
                                
                        
                        @foreach($contacts as $key => $contact)
                    <div class=" add-input">
                    <div class="row">
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for=""> First Name</label>
                    <input type="text" class="form-control" placeholder="" wire:model="contacts.{{$key}}.Reference_namefirst">
                    @error('contacts.'.$key.'.Reference_namefirst') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="email" class="form-control" wire:model="contacts.{{$key}}.Reference_lastname" placeholder="">
                    @error('contacts.'.$key.'.Reference_lastname') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                        <input type="text" class="form-control" placeholder="" wire:model="contacts.{{$key}}.Reference_phonenumber">
                        @error('contacts.'.$key.'.Reference_phonenumber') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        </div>
                       
                        <div class="col-md-4">
                        <div class="form-group">
                        <label for=""> Address</label>
                        <input type="email" class="form-control" wire:model="contacts.{{$key}}.Reference_address" placeholder="">
                        @error('contacts.'.$key.'.Reference_address') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Job title</label>
                            <input type="text" class="form-control" placeholder="" wire:model="contacts.{{$key}}.Reference_jobtitle">
                            @error('contacts.'.$key.'.Reference_jobtitle') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            </div>
                            
                    <div class="col-md-2">
                    <button class="btn btn-danger btn-sm" wire:click="delete({{$key}})">remove</button>
                    </div>
                    </div>
                    </div>
                    @endforeach
                           
                       
                           
                           
    
                    </div>
    </div>
    </div>
    
          
            @endif
            {{-- STEP 3 --}}
    
            @if ($currentStep == 3)
                
        
            <div class="step-three" >
                <div class="card" >
                    <div class="card-header  text-white" style="background-color:#00068E">STEP 3/3 -Educational Background</div>
                    <div class="card-body" style=" background-color: #E5E6E7;">
                        <div class="card-headers" style="align-content: center">
                            <h2> Language</h2>
                            
                              </div>
                   
                <div class="row"> 
                    <div class="col-md-6" >
                        <div class="form-group">
                            <label for="">Select Language </label>
                            <select class="form-control"  wire:model="language">
                                <option value="" selected>Select level of education</option>
                                <option value="Amaharic">Amaharic</option>
                                <option value="Afan oromo">Afan oromo</option>
                                <option value="English">English</option>
                                
                             
                            </select>
                            <span class="text-danger">@error('language'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                           
                            <label for="">Level Language </label>
                            <select class="form-control" wire:model="leveloflanguage">
                                <option value="" selected>Select level of education</option>
                                <option value="Beginner">	Beginner</option>
                                <option value="Elementary">Elementary</option>
                                <option value="	Intermediate">Intermediate</option>
                                <option value="	Upper Intermediate">Intermediate</option>
                                
                             
                            </select>
                            @error('leveloflanguage') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-2" style="margin-bottom: 12px">
                        <button class="btn text-white btn-info btn-sm" wire:click.prevent="addLan()">Add</button>
                        </div>
                    </div>
                <div class="row">
                @foreach($contactm as $key => $contact)
                <div class=" add-input">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                               
                                <label for="">Select Language </label>
                              
                                <select class="form-control" wire:model="contactm.{{ $key }}.language">
                                    <option value="" selected>Select level of education</option>
                                    <option value="Amaharic">Amaharic</option>
                                    <option value="Afan oromo">Afan oromo</option>
                                    <option value="English">English</option>
                                    
                                 
                                </select>
                                @error('language.'.$key) <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              
                                <label for="">Level of  Language </label>
                                <select class="form-control" wire:model="contactm.{{ $key }}.leveloflanguage">
                                    <option selected>Select level of education</option>
                                    <option value="Beginner">Beginner</option>
                                    <option value="Elementary">Elementary</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Upper Intermediate">Upper Intermediate</option>
                                 
                                </select>
                                @error('leveloflanguage.'.$key) <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">Remove</button>
                        </div>
                    </div>
                </div>
            @endforeach

                                                                                                            
                </div>               
     

                                <div class="card-headers" style="align-content: center">
                                    <h2> Level Education</h2></div>
                        <div class="row">
                            
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Level of Education* </label>
                                    <select class="form-control" wire:model="Level_education">
                                        <option value="" selected>Select level of education</option>
                                        <option value="Degree">Degree</option>
                                        <option value="Master">Master</option>
                                        <option value="PHD">PHD</option>
                                        
                                     
                                    </select>
                                    <span class="text-danger">@error('Level_education'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                   <label for=""> Date of Graduation    </label>
                               
                                   <input type="date"  wire:model="Dateof_Graduation" class="form-control" >
                                   <span class="text-danger">@error('Dateof_Graduation'){{ $message }}@enderror</span>
                               </div>
                           </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">  Cumulative GPA 
                                 </label>
                                    <input type="text" class="form-control" placeholder="" wire:model="CummulativeGpa"  id="datepicker">
                                    
                                    
                                    <span class="text-danger">@error('CummulativeGpa'){{ $message }}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Institute(College or University) </label>
                                    <select class="form-control" wire:model="Institute">
                                        <option value="" selected>Select level of education</option>
                                        <option value="Addisa Ababa University">Addisa Ababa University </option>
                                        <option value="Adama University">Adama University</option>
                                        <option value="Addis Ababa Commercial College">Addis Ababa Commercial College</option>
                                        <option value="Jimma University">Jimma University</option>
                                        <option value="Arba Minch University">Arba Minch University</option>
                                        <option value="Bahir Dar University">Bahir Dar University</option>
                                        
                                     
                                    </select>
                                    <span class="text-danger">@error('Institute'){{ $message }}@enderror</span>
                                </div>
                            </div>
                          
 
 
                            
    
    
      
                        </div>
                        <div class="card-headers" style="align-content: center">
                            <h3> Attachmen your CV  </h3>
                         </div>
                         
                        <div class="row"> 
                            <div class="col-md-12">
                          
                                <div class="form-group">
                                      <label>  CV</label>
                                  
                                         <input type="file" class="form-control" wire:model="Attachement" >
                                    
                                   
                                    <span class="text-danger">@error('Attachement'){{ $message }}@enderror</span>
                                </div>
                                
                            </div>
                            
                        
                        </div>
                        
       
                            
                            <div class=" add-input">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Education credentional</label>
                                            <input type="file" class="form-control" placeholder="Enter Name" wire:model="Education">
                                            @error('Education') <span class="text-danger error">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                            </div>
                       
                    </div>
                   
                </div>
            </div>
            @endif
    
            {{-- STEP 4 --}}
            @if ($currentStep == 4)
             
     
   
            @endif
            <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">
    
               @if ($currentStep == 1)
                   <div></div>
               @endif
    
               @if ($currentStep == 2 || $currentStep == 3 )
                   <button type="button" style="background-color: #00068E" class="btn btn-md text-white" wire:click="decreaseStep()">Back</button>
               @endif
               
               @if ($currentStep == 1 || $currentStep == 2 )
                   <button type="button"style="background-color: #00068E"  class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>
               @endif
               
               @if ($currentStep == 3)
                    <button type="submit" style="background-color: #00068E" class="btn btn-md btn-primary">Submit</button>
               @endif
                   
                  
            </div>
    
        </form>
    </div>
</div>


@once
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
       
                    flatpickr('#myDatepicker', {})
                    document.addEventListener('alpine:init', () => {
            Alpine.data('datepicker', () => ({
              
                init(){
                    this.pickr = flatpickr(this.$refs.myDatepicker, {})
                  
            }}
            ))
        })
           
    </script>
@endonce

