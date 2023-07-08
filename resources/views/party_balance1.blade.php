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
                                    <h4 class="mb-sm-0 font-size-18">Party Balances</h4>
                                        <strong class="text-end"><div align="center">{{(request()->ReportType=='C') ? 'Creditor Customers' : 'Debitor Customers' }}</div></strong> 
        From {{request()->StartDate}} TO {{request()->EndDate}}

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

            
            <?php 
            $DrTotal=0;
            $CrTotal=0;
            $BalanceTotal=0;
             ?>
  <div class="card">
      <div class="card-body">
      @if(count($party)>0)     
  <table  class="table table-striped table-sm" >
    <tr>
      <td width="6%" bgcolor="#CCCCCC"><div align="center"><strong>S.NO</strong></div></td>
      <td width="10%" bgcolor="#CCCCCC"><div class="text-start"><strong>Party</strong></div></td>
      <td width="40%" bgcolor="#CCCCCC"><div align="left"><strong>NAME</strong></div></td>
      <td width="16%" bgcolor="#CCCCCC"><div align="right"><strong>DEBIT</strong></div></td>
      <td width="16%" bgcolor="#CCCCCC"><div align="right"><strong> CREDIT </strong></div></td>
      <td width="16%" bgcolor="#CCCCCC"><div align="right"><strong>BALANCE</strong></div></td>
    </tr>
   @foreach ($party as $key => $value)
    
   <?php 

            $DrTotal=$DrTotal+ $value->Dr;
            $CrTotal=$CrTotal + $value->Cr;
            $BalanceTotal= $BalanceTotal + ($value->Dr-$value->Cr);


    ?>

    
    <tr>
      <td><div align="center">{{$key+1}}.</div></td>
      <td><div align="left">{{$value->PartyID}}</div></td>
      <td>{{$value->PartyName}}</td>
      <td><div align="right">{{number_format($value->Dr,2)}}</div></td>
      <td><div align="right">{{number_format($value->Cr,2)}}</div></td>
      <td><div align="right">{{number_format($value->Dr-$value->Cr,2)}}</div></td>
    </tr>
@endforeach
 <tr>
      <td><div align="center"></div></td>
      <td><div align="left"></div></td>
      <td><div align="center"><strong>Total</strong></div></td>
      
      <td><div align="right">{{number_format($DrTotal,2)}}</div></td>
      <td><div align="right">{{number_format($CrTotal,2)}}</div></td>
      <td><div align="right">{{number_format($BalanceTotal,2)}}</div></td>
    </tr>


  </table>      
  @else
<p class="text-danger">no record found</p>
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