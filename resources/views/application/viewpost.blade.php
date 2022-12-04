






<div class="card" >
	
		<div class="row" style=" background-color: #E5E6E7;">
            <div class="col-md-6" style=" place-items: center;"> 
                <span> <img src="/images/ebc.jpg" sizes="34"  style="height: 280px"  /> </span>
            </div>
            
			<div class="col-md-6">
                
            </div>
        </div>
		
		</div>
       
        <div class="card-body" style="margin-top: 12px" >
	
            <div class="row" style=" background-color:white;">
                
                

                <div class="col-3"><p >     @foreach($post as $posts)   {{ $posts->discription_of_jobebc }} </p> @endforeach
              
                </div>
            </div>
            
            </div>
            
   <div class="card" style="width: 48rem;background-color: #00068E;color:white">

  <div class="card-body">
    <h1 class="card-title">Quick Detial About EBC</h1>
    <p class="card-text">
        
            <ul>
        <li>Organization:Ethiopian Broadcasting Corporation </li>
      <li>  Known us: EBC </li>
       <li> Established:2004 </li>
       <li> Number of employee:10000 </li>
       <li> Address:Tkur Anbess </li>
      <li>  Head Quarter:Addisa Ababa ,Ethiopian </li>
            </ul>
        


 </p>
    
  </div>
</div>
<div style="color:#00068E"><h1  > Job vanancy </h1>
    
    
</div>
<div>
    <h5 style="font-size: 23px">Job Postion:@foreach($post as $posts)  {{ $posts->position_of_jobs }}  @endforeach</h5>
    <p> 
      
       
        <ul> @foreach($post as $posts)
            <li> {{ $posts->job_requirements }}</li>
            @endforeach
           
                </ul>
        
        <p>
     </div>
     <div style="color:#00068E"><h1  > How to Apply </h1>
    
    
     </div>
     <div> 
        <p> 
           
            <ul>
                @foreach($post as $posts)
                <li>{{ $posts->how_to_apply }}
                 </li>
                
               @endforeach
                    </ul>
            
            <p>
     </div>
     <div>
        <p>
            Intersted applicant should submit their CV as presrcribed in the employment notification.Along  with  supporting  documentts Via Online form: 
             </p>
             <link > <a style="font-size: 23px" href="{{url('/registers')}}"> Apply now</a>
             <link>
     </div>
    
     @once
     <style>

        img{
            display: block;
            margin: 0 auto;
            width: 100%;
        }
        a{
            align-items: center;
        }
        </style>
     @endonce