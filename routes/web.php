<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Accounts;
use App\Http\Controllers\User;
use App\Http\Controllers\CompanyController;




Route::get('/',[Accounts::class,'Login']);
Route::get('/Login',[Accounts::class,'Login']);
Route::post('/UserVerify',[Accounts::class,'UserVerify']);

 Route::group(['middleware' => ['CheckAdmin']], function () {

 
Route::get('/Dashboard',[Accounts::class,'Dashboard']);



Route::get('/Invoice',[Accounts::class,'Invoice']);

Route::get('/InvoiceCreate',[Accounts::class,'InvoiceCreate']);
Route::get('/ajax_invoice',[Accounts::class,'ajax_invoice']);

Route::post('/InvoiceSave',[Accounts::class,'InvoiceSave']);
route::get('/InvoiceEdit/{id}',[Accounts::class,'InvoiceEdit']);
route::get('/InvoicePDF/{id}',[Accounts::class,'InvoicePDF']);
route::get('/InvoicePDF1/{id}',[Accounts::class,'InvoicePDF1']);

route::get('/InvoiceView/{id}',[Accounts::class,'InvoiceView']);

Route::post('/InvoiceUpdate',[Accounts::class,'InvoiceUpdate']);
route::get('/InvoiceDelete/{id}',[Accounts::class,'InvoiceDelete']);

Route::post('/Ajax_Balance',[Accounts::class,'Ajax_Balance']);
Route::post('/Ajax_Ticket',[Accounts::class,'Ajax_Ticket']);
Route::post('/Ajax_VHNO',[Accounts::class,'Ajax_VHNO']);

Route::get('/Voucher',[Accounts::class,'Voucher']);
Route::get('/VoucherCreate/{vouchertype}',[Accounts::class,'VoucherCreate']);
Route::post('/VoucherSave',[Accounts::class,'VoucherSave']);
Route::get('/ajax_voucher',[Accounts::class,'ajax_voucher']);
Route::get('/VoucherEdit/{id}',[Accounts::class,'VoucherEdit']);
Route::post('/VoucherUpdate',[Accounts::class,'VoucherUpdate']);
Route::get('/VoucherDelete/{id}',[Accounts::class,'VoucherDelete']);
Route::get('/VoucherView/{id}',[Accounts::class,'VoucherView']);

Route::get('/JV/',[Accounts::class,'JV']);


Route::get('/Item',[Accounts::class,'Item']);
Route::post('/ItemSave',[Accounts::class,'ItemSave']);
Route::get('/ItemEdit/{id}',[Accounts::class,'ItemEdit']);
Route::post('/ItemUpdate/',[Accounts::class,'ItemUpdate']);
Route::get('/ItemDelete/{id}',[Accounts::class,'ItemDelete']); 




Route::get('/User',[User::class,'Show']);
Route::post('/UserSave',[User::class,'UserSave']);
Route::get('/UserEdit/{id}',[User::class,'UserEdit']);
Route::post('/UserUpdate/',[User::class,'UserUpdate']);
Route::get('/UserDelete/{id}',[User::class,'UserDelete']); 



Route::get('/Supplier',[Accounts::class,'Supplier']);
Route::post('/SaveSupplier',[Accounts::class,'SaveSupplier']);
Route::get('/SupplierEdit/{id}',[Accounts::class,'SupplierEdit']);
Route::post('/SupplierUpdate/',[Accounts::class,'SupplierUpdate']);
Route::get('/SupplierDelete/{id}',[Accounts::class,'SupplierDelete']);


Route::get('/Parties',[Accounts::class,'Parties']);
Route::post('/SaveParties',[Accounts::class,'SaveParties']);
Route::get('/PartiesEdit/{id}',[Accounts::class,'PartiesEdit']);
Route::post('/PartiesUpdate/',[Accounts::class,'PartiesUpdate']);
Route::get('/PartiesDelete/{id}',[Accounts::class,'PartiesDelete']);



Route::get('/CheckUserRole1/{userid},{tablename},{action}',[Accounts::class,'CheckUserRole1']);




Route::get('/table',[Accounts::class,'table']);
Route::get('/datatable',[Accounts::class,'datatable']);



// Petty Cash

Route::get('/PettyCashCreate',[Accounts::class,'PettyCashCreate']);
Route::get('/PettyCash',[Accounts::class,'PettyCash']);
Route::get('/ajax_pettycash',[Accounts::class,'ajax_pettycash']);
Route::post('/PettyCashSave',[Accounts::class,'PettyCashSave']);
route::get('/PettyCashEdit/{id}',[Accounts::class,'PettyCashEdit']);
Route::post('/PettyCashUpdate',[Accounts::class,'PettyCashUpdate']);
Route::post('/Ajax_PVHNO',[Accounts::class,'Ajax_PVHNO']);


// Visa

Route::get('/Visa',[Accounts::class,'Visa']);
Route::get('/VisaCreate',[Accounts::class,'VisaCreate']);
Route::get('/ajax_visa',[Accounts::class,'ajax_visa']);
Route::post('/VisaSave',[Accounts::class,'VisaSave']);
route::get('/VisaEdit/{id}',[Accounts::class,'VisaEdit']);
Route::post('/VisaUpdate',[Accounts::class,'VisaUpdate']);
route::get('/VisaDelete/{id}',[Accounts::class,'VisaDelete']);


Route::get('/VisaExpiryList/',[Accounts::class,'VisaExpiryList']);



Route::get('/ChartOfAcc/',[Accounts::class,'ChartOfAcc']);


route::get('/PartyLedger/',[Accounts::class,'PartyLedger']);
route::post('/PartyLedger1/',[Accounts::class,'PartyLedger1']);
route::post('/PartyLedger1PDF/',[Accounts::class,'PartyLedger1PDF']);


route::get('/SupplierLedger/',[Accounts::class,'SupplierLedger']);
route::get('/AdjustmentBalance/',[Accounts::class,'AdjustmentBalance']);
route::post('/AdjustmentBalanceSave/',[Accounts::class,'AdjustmentBalanceSave']);

route::get('/SupplierBalance/',[Accounts::class,'SupplierBalance']);
route::post('/SupplierBalance1/',[Accounts::class,'SupplierBalance1']);
route::post('/SupplierBalance1PDF/',[Accounts::class,'SupplierBalance1PDF']);


route::get('/PartyList/',[Accounts::class,'PartyList']);
route::get('/PartyListPDF/',[Accounts::class,'PartyListPDF']);
route::get('/OutStandingInvoice/',[Accounts::class,'OutStandingInvoice']);
route::post('/OutStandingInvoice1/',[Accounts::class,'OutStandingInvoice1']);
route::post('/OutStandingInvoice1PDF/',[Accounts::class,'OutStandingInvoice1PDF']);


route::get('/PartyWiseSale/',[Accounts::class,'PartyWiseSale']);
route::post('/PartyWiseSale1/',[Accounts::class,'PartyWiseSale1']);
route::post('/PartyWiseSale1PDF/',[Accounts::class,'PartyWiseSale1PDF']);

route::get('/YearlyPartyBalance/',[Accounts::class,'YearlyPartyBalance']);
route::post('/YearlyPartyBalance1/',[Accounts::class,'YearlyPartyBalance1']);




route::get('/PartyBalance/',[Accounts::class,'PartyBalance']);
route::post('/PartyBalance1/',[Accounts::class,'PartyBalance1']);
route::post('/PartyBalance1PDF/',[Accounts::class,'PartyBalance1PDF']);

route::get('/PartyYearlyBalance/',[Accounts::class,'PartyYearlyBalance']);
route::post('/PartyYearlyBalance1/',[Accounts::class,'PartyYearlyBalance1']);
route::post('/PartyYearlyBalance1PDF/',[Accounts::class,'PartyYearlyBalance1PDF']);


// supplier reports

route::get('/SupplierLedger/',[Accounts::class,'SupplierLedger']);
route::post('/SupplierLedger1/',[Accounts::class,'SupplierLedger1']);
route::post('/SupplierLedger1PDF/',[Accounts::class,'SupplierLedger1PDF']);

route::get('/SupplierWiseSale/',[Accounts::class,'SupplierWiseSale']);
route::post('/SupplierWiseSale1/',[Accounts::class,'SupplierWiseSale1']);
route::post('/SupplierWiseSale1PDF/',[Accounts::class,'SupplierWiseSale1PDF']);

route::get('/TaxReport/',[Accounts::class,'TaxReport']);
route::post('/TaxReport1/',[Accounts::class,'TaxReport1']);
route::post('/TaxReport1PDF/',[Accounts::class,'TaxReport1PDF']);

route::get('/SalemanReport/',[Accounts::class,'SalemanReport']);
route::post('/SalemanReport1/',[Accounts::class,'SalemanReport1']);
route::post('/SalemanReport1PDF/',[Accounts::class,'SalemanReport1PDF']);

route::get('/AirlineSummary/',[Accounts::class,'AirlineSummary']);
route::post('/AirlineSummary1/',[Accounts::class,'AirlineSummary1']);
route::post('/AirlineSummary1PDF/',[Accounts::class,'AirlineSummary1PDF']);

//[accounts::class,'report

route::get('/VoucherReport/',[Accounts::class,'VoucherReport']);
route::post('/VoucherReport1/',[Accounts::class,'VoucherReport1']);
route::post('/VoucherReport1PDF/',[Accounts::class,'VoucherReport1PDF']);

route::get('/CashbookReport/',[Accounts::class,'CashbookReport']);
route::post('/CashbookReport1/',[Accounts::class,'CashbookReport1']);
route::post('/CashbookReport1PDF/',[Accounts::class,'CashbookReport1PDF']);

route::get('/DaybookReport/',[Accounts::class,'DaybookReport']);
route::post('/DaybookReport1/',[Accounts::class,'DaybookReport1']);
route::post('/DaybookReport1PDF/',[Accounts::class,'DaybookReport1PDF']);


route::get('/GeneralLedger/',[Accounts::class,'GeneralLedger']);
route::post('/GeneralLedger1/',[Accounts::class,'GeneralLedger1']);
route::post('/GeneralLedger1PDF/',[Accounts::class,'GeneralLedger1PDF']);

route::get('/TrialBalance/',[Accounts::class,'TrialBalance']);
route::post('/TrialBalance1/',[Accounts::class,'TrialBalance1']);
route::post('/TrialBalance1PDF/',[Accounts::class,'TrialBalance1PDF']);


route::get('/TrialBalanceActivity/',[Accounts::class,'TrialBalanceActivity']);
route::post('/TrialBalanceActivity1/',[Accounts::class,'TrialBalanceActivity1']);
route::post('/TrialBalanceActivity1PDF/',[Accounts::class,'TrialBalanceActivity1PDF']);

route::get('/BalanceSheet/',[Accounts::class,'BalanceSheet']);
route::post('/BalanceSheet1/',[Accounts::class,'BalanceSheet1']);


route::get('/TicketRegister/',[Accounts::class,'TicketRegister']);
route::post('/TicketRegister1/',[Accounts::class,'TicketRegister1']);
route::post('/TicketRegister1PDF/',[Accounts::class,'TicketRegister1PDF']);

route::get('/InvoiceSummary/',[Accounts::class,'InvoiceSummary']);
route::post('/InvoiceSummary1/',[Accounts::class,'InvoiceSummary1']);
route::post('/InvoiceSummary1PDF/',[Accounts::class,'InvoiceSummary1PDF']);

route::get('/ProfitAndLoss/',[Accounts::class,'ProfitAndLoss']);
route::post('/ProfitAndLoss1/',[Accounts::class,'ProfitAndLoss1']);

 

route::get('/tmp/',[Accounts::class,'tmp']); 

Route::get('/Logout',[Accounts::class,'Logout']);




route::get('/Role/{UserID}',[Accounts::class,'Role']);
 route::post('/RoleSave',[Accounts::class,'RoleSave']);
 route::get('/RoleView/{UserID}',[Accounts::class,'RoleView']);
 route::post('/RoleUpdate',[Accounts::class,'RoleUpdate']);

 route::get('/checkUserRole/{UserID}',[Accounts::class,'checkUserRole']);


 route::get('/UserProfile',[Accounts::class,'UserProfile']);
 route::get('/ChangePassword',[Accounts::class,'ChangePassword']);
 route::post('/UpdatePassword',[Accounts::class,'UpdatePassword']);


  // ............Company............
Route::get('/Company',[CompanyController::class,'Company']);
Route::post('/SaveCompany',[CompanyController::class,'SaveCompany']);
Route::get('/CompanyEdit/{id}',[CompanyController::class,'CompanyEdit']);
Route::post('/CompanyUpdate/',[CompanyController::class,'CompanyUpdate']);
Route::get('/CompanyDelete/{id}',[CompanyController::class,'CompanyDelete']); 


});