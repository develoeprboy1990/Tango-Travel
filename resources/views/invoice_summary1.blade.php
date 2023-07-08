@extends('template.tmp')

@section('title', $pagetitle)
 

@section('content')



<div class="main-content">

 <div class="page-content">
 <div class="container-fluid">
  <!-- start page title -->
                      
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

            
            <?php 
            $DrTotal=0;
            $CrTotal=0;
             ?>
  <div class="card">
      <div class="card-body">
  <table style="width: 100%;">
    <tr>
      <td colspan="2"><div align="center" class="style1">{{session::get('CompanyName')}} </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><strong> INVOICE SUMMARY SALEMAN WISE</strong></div></td>
    </tr>
    <tr>
      <td width="50%">From {{request()->StartDate}} TO {{request()->EndDate}}</td>
    <td width="50%"><div align="right">DATED: {{date('d-m-Y')}}</div></td>
    
    </tr>
  </table>
   
  
  <table class="table  table-sm">
  <thead style="display: table-header-group;">
   <tr class="bg-light">
     <th width="5%" bgcolor="#CCCCCC"><div align="center"><strong>SALEMAN #</strong></div></th>
      <th width="15%" bgcolor="#CCCCCC"><div align="center"><strong>SALEMAN NAME</strong></div></th>
      <th width="5%" bgcolor="#CCCCCC"><div align="center"><strong>QTY</strong></div></th>
      <th width="10%" bgcolor="#CCCCCC"><div align="center"><strong>GROSS</strong></div></th>
      <th width="10%" bgcolor="#CCCCCC"><div align="right"><strong>TAXES </strong></div></th>
       <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>PAYABLE </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>SERVICE </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>DIS/ </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>PROFIT </strong></div></th>
      <th width="9%" bgcolor="#CCCCCC"><div align="right"><strong>NET </strong></div></th>
      
   </tr>
  </thead>
  <tbody>
   @foreach ($invoice_summary as $key => $value)
    
    
   <tbody>
      <tr>
      
      <td><div align="center">{{$value->UserID}}</div></td>
      <td>{{$value->SalemanName}}</td>
      <td>{{$value->Qty}}</td>
      <td><div align="right">{{number_format($value->Total,0)}}</div></td>
     
      <td><div align="right">{{number_format($value->Taxable,0)}}</div></td>
     
      <td><div align="right">{{number_format($value->Total,0)}}</div></td>
     
      <td><div align="right">{{number_format($value->Service,0)}}</div></td>
     
      <td><div align="right">{{number_format($value->Discount,0)}}</div></td>
      <td><div align="right">{{number_format($value->Service,0)}}</div></td>
      
     <td><div align="right">{{number_format($value->Total,0)}}</div></td> 


    </tr>
   </tbody>
@endforeach
    <tr class="bg-light">
     
       <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong></strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong> </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>TOTAL  </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>{{number_format($invoice_total[0]->Fare,0)}} </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>{{number_format($invoice_total[0]->Taxable,0)}} </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>{{number_format($invoice_total[0]->Service,0)}} </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>{{number_format($invoice_total[0]->Fare,0)}} </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>{{number_format($invoice_total[0]->Discount,0)}} </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>{{number_format($invoice_total[0]->Total,0)}} </strong></div></td>
      <td width="9%" bgcolor="#CCCCCC"><div align="right"><strong>{{number_format($invoice_total[0]->Profit,0)}} </strong></div></td>
       
      
      
   </tr>

    

   
  </tbody>
</table>     
      </div>
  </div>
  
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
 
  @endsection