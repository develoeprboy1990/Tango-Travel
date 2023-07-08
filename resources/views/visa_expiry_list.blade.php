@extends('template.tmp')

@section('title', $pagetitle)
 

@section('content')



<div class="main-content">

 <div class="page-content">
 <div class="container-fluid">
  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-print-block d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Visa Expiry List</h4>
                                      
 
                                </div>
                            </div>
                        </div>
 @if (session('error'))

 <div class="alert alert-{{ Session::get('class') }} p-1" id="success-alert">
                    
                   {{ Session::get('error') }}  
                </div>

@endif

 @if (count($errors) > 0)
                                 
                            <div >
                <div class="alert alert-danger p-1   border-3">
                   <p class="font-weight-bold"> There were some problems with your input.</p>
                    <ul>
                        
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>

                        @endforeach
                    </ul>
                </div>
                </div>
 
            @endif

            
            
  <div class="card">
      <div class="card-body">
        
 @if(count($visaexpirylist)>0)    
<table class="table table-sm table-striped align-middle table-nowrap mb-0">
<thead><tr>
<th class="col-md-1">S.No</th>
<th class="col-md-2">Visa No</th>
<th class="col-md-4">Passanger Name</th>
<th class="col-md-1">Date</th>
<th class="col-md-1">Due Date</th>
<th class="col-md-1">Days Left</th>
<th class="col-md-2">Nationality</th>
<th class="col-md-2">Party Name</th>
</tr>
</thead>
<tbody>
@foreach ($visaexpirylist as $key =>$value)
 <tr>
 <td class="col-md-1">{{$key+1}}</td>
 <td class="col-md-1">{{$value->VisaNo}}</td>
 <td class="col-md-1">{{$value->PassangerName}}</td>
 <td class="col-md-1">{{$value->Date}}</td>
 <td class="col-md-1">{{$value->DueDate}}</td>
 <td class="col-md-1">{{$value->VisaExpiry}}</td>
 <td class="col-md-1">{{$value->Nationality}}</td>
 <td class="col-md-1">{{$value->PartyName}}</td>
 </tr>
 @endforeach   
 </tbody>
 </table>
 @else
   <p class=" text-danger">No data found</p>
 @endif   

      </div>
  </div>
  
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
 
  @endsection