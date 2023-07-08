@extends('template.tmp')

@section('title', $pagetitle)
 

@section('content')

 <div class="main-content">

 <div class="page-content">
<div class="container-fluid">

 <!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
 <h4 class="mb-sm-0 font-size-18">Update Visa Details</h4>

 <div class="page-title-right">
<div class="page-title-right">

</div>
</div>
</div>
</div>
<div>
 <!-- end page title -->

 @if (session('error'))

 <div class="alert alert-{{ Session::get('class') }} p-3">
                    
                   {{ Session::get('error') }}  
                </div>

@endif

 @if (count($errors) > 0)
                                 
                            <div >
                <div class="alert alert-danger pt-3 pl-0   border-3">
                   <p class="font-weight-bold"> There were some problems with your input.</p>
                    <ul>
                        
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>

                        @endforeach
                    </ul>
                </div>
                </div>
 
            @endif
<div class="row">
 <div class="col-12">
    <form action="{{URL('/VisaUpdate')}}" method="post">
        {{csrf_field()}}
<div class="card">
<div class="card-body">

 
 <input type="hidden" name="VisaID" value="{{$visa[0]->VisaID}}" >


<div class="mb-3 row">
<label for="example-email-input" class="col-md-2 col-form-label">Visa No</label>
<div class="col-md-4">
<input class="form-control" type="text"   name="VisaNo" id="example-email-input" value="{{$visa[0]->VisaNo}}" required="">
</div>
</div>


<div class="mb-3 row">
<label for="example-email-input" class="col-md-2 col-form-label">Passanger Name</label>
<div class="col-md-4">
<input class="form-control" type="text"   name="PassangerName" id="example-email-input" value="{{$visa[0]->PassangerName}}" required="">
</div>
</div>


<div class="mb-3 row">
<label for="example-email-input" class="col-md-2 col-form-label">Date</label>
<div class="col-md-4">
 <div class="input-group" id="datepicker2">
  <input type="text" name="Date" autocomplete="off" class="form-control" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" data-date-container="#datepicker2" data-provide="datepicker" data-date-autoclose="true" value="{{dateformatman($visa[0]->Date)}}" required="">
  <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
    </div>
</div>
</div>


<div class="mb-3 row">
<label for="example-email-input" class="col-md-2 col-form-label">Due Date</label>
<div class="col-md-4">
 <div class="input-group" id="datepicker2">
  <input type="text" name="DueDate" autocomplete="off" class="form-control" placeholder="dd/mm/yyyy" data-date-format="dd/mm/yyyy" data-date-container="#datepicker2" data-provide="datepicker" data-date-autoclose="true" value="{{dateformatman($visa[0]->DueDate)}}" required="">
  <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
    </div>
</div>
</div>


 <div class="mb-3 row">
<label for="example-email-input" class="col-md-2 col-form-label">Nationality</label>
<div class="col-md-4">
<input class="form-control" type="text"   name="Nationality" id="example-email-input" value="{{$visa[0]->Nationality}}" required="">
</div>
</div>
 

<div class="mb-3 row">
<label for="example-email-input" class="col-md-2 col-form-label">Supplier</label>
<div class="col-md-4">
<select name="SupplierID" id="SupplierID" class="form-select select2" required="">
    <option value="">Select</option>

     @foreach($supplier as $value)
      <option value="{{$value->PartyID}}" {{($value->PartyID== $visa[0]->SupplierID) ? 'selected=selected':'' }}>{{$value->PartyName}}</option>
     @endforeach
    
   </select>
</div>
</div>



<div class="mb-3 row">
<label for="example-email-input" class="col-md-2 col-form-label">Customer</label>
<div class="col-md-4">
<select name="PartyID" id="PartyID" class="form-select select2" required="">
    <option value="">Select</option>

     @foreach($party as $value)
      <option value="{{$value->PartyID}}" {{($value->PartyID== $visa[0]->PartyID) ? 'selected=selected':'' }}>{{$value->PartyName}}</option>
     @endforeach
    
   </select>
</div>
</div>


 

 




</div>




<div class="mb-3 row">
<label for="example-url-input" class="col-md-2 col-form-label">  </label>
<div class="col-md-10">
   <input type="submit" class="btn btn-primary w-md" value="Update"  >  

    <a href="{{URL('/Visa')}}" class="btn btn-secondary w-md">Cancel</a>  
</div>

</div>
 
 
                                      
                               
                                   
    
                                      
                                        

                                       

                                    </div>
                                </div>

                            </form>
                            </div> <!-- end col -->
                        </div>
                      

  
                         
                     
                        
                    </div> <!-- container-fluid -->
                </div>


    
</div>
  @endsection