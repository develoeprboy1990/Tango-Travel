<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Invoice</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">

body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}
.style3 {
	font-size: 20px;
	font-weight: bold;
}
.style5 {font-size: 14px}
.style6 {
	font-size: 16px;
	font-weight: bold;
}
  @page {
                margin-top: 0.5cm;
                margin-bottom: 0.5cm;
                margin-left: 0.5cm;
                margin-right: 0.5cm;
            }

</style>
 <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <!-- END: Custom CSS-->
</head>
<body>
<?php 
$company = DB::table('company')->get(); 
?>
<table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
    <td width="50%" rowspan="4" valign="top"><img src="{{asset('documents/'.$company[0]->Logo)}}" width="50%;" ></td>
    <td align="right">
    <span class="style5">
    <img src="{{asset('assets/images/mobile.png')}}" width="3%;"  > {{$company[0]->Contact}}
    </span>
    </td>
  </tr>
  <tr>
  <td align="right"><span class="style5"><img src="{{asset('assets/images/telephone.png')}}" width="3%;" > {{$company[0]->Contact}}</span></td>
</tr>
  <tr>
  <td align="right"><img src="{{asset('assets/images/mail.jpg')}}" width="3%;" > {{$company[0]->Email}} </td>
</tr>
  <tr>
  <td align="right"><img src="{{asset('assets/images/map.png')}}" width="3%;" > {{$company[0]->Address}}</td>
</tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr>
  <td colspan="2" align="center" > <b><u style="margin-top: 20px;font-size: 24px;">{{$company[0]->SaleInvoiceTitle}}</u></b></td>
  <tr><td colspan="2">&nbsp;</td></tr>
  <tr><td colspan="2">&nbsp;</td></tr>
</tr>
</table>
<table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
      <table width="100%" cellspacing="1" cellpadding="0" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:2px black solid;border-radius: 25px;">
        <tr>
          <td valign="top" style="padding: 20px;font-size: 16px;"><b>
            {{$invoice_mst[0]->PartyName}} <br><br>
              Contact: {{$invoice_mst[0]->Phone}}<br><br> 
              {{$invoice_mst[0]->Address}}  <br></b>
            </td>
        </tr>
    </table>
    </td>
    <td valign="top">
      <table width="80%" align="center" cellpadding="0" cellspacing="3" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:2px black solid;border-radius: 25px;">
        <tr>
          <td valign="top" style="padding: 15px;">
            DATE: {{dateformatman($invoice_mst[0]->Date)}} <br><br>
            REFERENCE: YASEEN<br><br>
            CUSTOM CODE: {{$invoice_mst[0]->InvoiceMasterID}}
            </td>
        </tr>
    </table>
    </td>
  </tr>
  <tr><td colspan="2">&nbsp;</td></tr>
</table>

<table width="80%" border="0" cellspacing="0" cellpadding="0" border="1" align="center">
  <tr>
    <td width="50">
      <table width="100%" border="1" style="border:1px black solid;" cellpadding="0" cellspacing="0" bordercolor="#999999" style="border-collapse:collapse;">
      <tr >
        <td width="70%" height="10" >
          <div align="center" style="padding:8px;font-size: 16px;font-weight: bold;">
            <strong>PARTICULAR</strong>
          </div>
        </td>
        <td width="30%" height="15" >
          <div align="center" style="padding:8px;font-size: 16px;font-weight: bold;">
            <strong>AMOUNT AED</strong>
          </div>
        </td>
      </tr>
   
      @foreach($invoice_det as $key => $value)
      <tr>
        <td height="200" valign="top" style="padding: 10px;font-size: 14px;" >
            <b>{{$value->ItemName}}</b><BR>
            <b>{{$value->PaxName}}</b><BR>
            <b>{{$value->PNR}}</b><BR> 
            <!-- {{$value->Sector}}<BR>
            {{number_format($value->Fare,2)}}
            {{number_format($value->Taxable,2)}} -->
        </td>

        <td height="200" valign="top" style="padding: 10px;font-size: 14px;"> 
          <div style="padding: 1px;">
            <div align="center"><b>{{number_format($value->Total,2)}}</b></div>
          </div>
          <BR>
        </td>
      </tr>
     @endforeach
  <tr>
    <td height="15" align="right" style="padding:5px;font-size: 14px;" >
      <strong>TOTAL </strong>
      <div align="center">
      <div align="center">
      <div align="center">
    </td>
    
    <td width="10%" height="15" >
      <div align="center">
        <strong>{{number_format($invoice_mst[0]->Total,2)}}</strong>
      </div>
    </td>
  </tr>
  <tr>
   <td height="15" align="right" style="padding:5px;font-size: 14px;" >
    <strong>PREVIOUS BALANCE </strong>
    </td>
   <td height="15" >
    <div align="center">
      <strong>{{number_format($invoice_mst[0]->Paid,2)}}</strong>
    </div>
  </td>
 </tr>
 <tr>
   <td height="15"  style="padding:5px;font-size: 14px;">
    <strong>NET PAYABLE AED </strong>
    {{ucwords(convert_number_to_words($invoice_mst[0]->Paid))}} Only/-</td>
   <td height="15" >
    <div align="center">
    <strong>{{number_format($invoice_mst[0]->Balance,2)}}</strong>
  </div>
  </td>
 </tr>
  
    </table></td>
  </tr>

</table>

<table>
  <tr >
      <td  height="40"    align="center" valign="middle">Sign & Stamp </td>
      <td  height="40"    align="center" valign="middle">Verify Online</td>
     </tr>

   


    <tr>
      <td align="center"><img src="{{asset('documents/'.$company[0]->Signature)}}" width="30%;" ></td>
      <td align="center"><img src="data:image/png;base64, {!! base64_encode(QrCode::size(45)->generate(url()->current())) !!} "></td>
    </tr>
</table>

</body>
</html>