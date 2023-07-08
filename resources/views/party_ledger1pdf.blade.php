<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{$pagetitle}}</title>
    <style type="text/css">
<!--
.style1 {
	font-size: 18px;
	font-weight: bold;
}
body,td,th {
	font-size: 13px;
}
-->
    </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<div align="center" class="style1">{{session::get('CompanyName')}}</div>
<div align="center">{{$party[0]->PartyName}} - {{$party[0]->PartyID}}</div>
<div align="center">Contact : {{$party[0]->Phone}}</div>
<div align="center">From {{session::get('StartDate')}} TO {{session::get('EndDate')}}
    </div>
 
        <p>
          <?php 
            $DrTotal=0;
            $CrTotal=0;
          
		       ?>
          @if(count($journal)>0) </p>
        <table width="100%" border="1" align="center" cellpadding="3" style="border-collapse: collapse;">
          <thead><tr>
           <th bgcolor="#CCCCCC" width="3%" ><div align="center">DATE</div></th>
          <th bgcolor="#CCCCCC"  width="3%"   ><div align="center">VHNO</div></th>

          <th bgcolor="#CCCCCC"  width="15%"  ><div align="center">PNAME</div></th>

          <th bgcolor="#CCCCCC"  width="7%"  ><div align="center">Ticket#</div></th>
          <th bgcolor="#CCCCCC"  width="7%"  ><div align="center">PNR</div></th>
          <th bgcolor="#CCCCCC"  width="7%"  ><div align="center">SECTOR</div></th>
          <th bgcolor="#CCCCCC"  width="7%"  ><div align="center">BILL/DR</div></th>
          <th bgcolor="#CCCCCC"  width="5%"  ><div align="center">RECEIPT/CR</div></th>
          <th bgcolor="#CCCCCC"  width="10%"  ><div align="center">Balance</div></th>
           </tr>
          </thead>
          <tbody>
            <tr> 
  <td><div align="center"></div></td>
            <td><div align="center"></div></td>
             <td><div align="center"></div></td>
            <td><div align="center">Opending Balance</div></td>
            <td><div align="right"></div></td>
            <td><div align="right"></div></td>
            <td><div align="right"></div></td>
            <td><div align="right"></div></td>
             <td  ><div align="right">{{$sql[0]->Balance}}</div></td>
			</tr>
          @foreach ($journal as $key =>$value)

          <?php 

          $invoice_detail = DB::table('v_invoice_detail')->where('InvoiceMasterID',$value->InvoiceMasterID)->get();

           ?>
           <tr>
            <td valign="top"  ><div align="center">{{dateformatman($value->Date)}}</div></td>
           <td valign="top"  ><div align="center">{{$value->VHNO}}</div></td>

           <td valign="top" >@foreach ($invoice_detail as $key => $value1) 
             
<div align="left">{{$value1->PaxName}}</div><br>
           @endforeach</td>

           <td valign="top" >
             
@foreach ($invoice_detail as $key => $value1) 
             
<div align="left">{{$value1->RefNo}}</div><br>
           @endforeach

           </td>


           <td valign="top" >
             
@foreach ($invoice_detail as $key => $value1) 
             
<div align="left">{{$value1->PNR}}</div><br>
           @endforeach


           </td> 


            <td valign="top" >
             
@foreach ($invoice_detail as $key => $value1) 
             
<div align="left">{{$value1->Sector}}</div><br>
           @endforeach


           </td>

           <td valign="top"  > <div align="right">{{($value->Dr==0) ? '' : number_format($value->Dr,2)}}</div></td>
           <td valign="top"  > <div align="right">{{($value->Cr==0) ? '' : number_format($value->Cr,2)}}</div></td>
           <td valign="top"  >
               

               <div align="right">
                 <?php 

if(!isset($balance)) { 

             $balance  =  $sql[0]->Balance + ($value->Dr-$value->Cr);
             $DrTotal = $DrTotal+$value->Dr;
             $CrTotal = $CrTotal+$value->Cr;
             echo number_format($balance);


}
else
{
  $balance = $balance + ($value->Dr-$value->Cr);
  $DrTotal = $DrTotal+$value->Dr;
             $CrTotal = $CrTotal+$value->Cr;
   echo number_format($balance);
}
              ?>
             {{($balance>0) ? "DR" : "CR"}} </div></td>
           </tr>
            </tbody>
           @endforeach   
             <tfoot>
          <tr  class="table-active">
              
           <td></td>
           <td></td>
           <td></td>
           <td>TOTAL</td>
            <td  ></td>
            <td  ></td>
           <td  ><div align="right">{{number_format($DrTotal,2)}}</div></td>
           <td  ><div align="right">{{number_format($CrTotal,2)}}</div></td>
            
            <td  > <div align="right"></div></td>
          </tr>
          </tfoot>
</table>
           @else
             <p class=" text-danger">No data found</p>
           @endif
		   
		   
</body>
</html>