@extends('template.tmp')

@section('title', $pagetitle)
 

@section('content')


 


<div class="main-content">

 <div class="page-content">
 <div class="container-fluid">

<script>
       function delete_invoice(id) {        


        url = '{{URL::TO('/')}}/InvoiceDelete/'+ id;
        
    
       
            jQuery('#staticBackdrop').modal('show', {backdrop: 'static'});
            document.getElementById('delete_link').setAttribute('href' , url);
         
    }
</script>


    <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Invoice</h4>
                                        <a href="{{URL('/InvoiceCreate')}}"  class="btn btn-primary w-md float-right "><i class="bx bx-plus"></i> Add New</a>

                                   

                                </div>
                            </div>
                        </div>



          <div class="row">
  <div class="col-12">
  
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
          <table id="student_table" class="table table-striped table-sm " style="width:100%">
        <thead>
            <tr>
                <th>Invoice#</th>
                <th class="col-md-3">Item</th>
                <th class="col-md-3">Customer</th>
                <th class="col-md-2">Date</th>
                 <th class="col-md-3">PaxName</th>
                <th class="col-md-3">Ref #</th>
                <th class="col-md-3">PNR</th>
                <th class="col-md-3"> Sector</th>
                <th>Total</th>
                <th>Paid</th>
                 <th>Action</th>
             </tr>
        </thead>
    </table>
      </div>
  </div>
  
  </div>
</div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
<script type="text/javascript">
$(document).ready(function() {
     $('#student_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ url('ajax_invoice') }}",
        "columns":[
            { "data": "InvoiceMasterID" },
              { "data": "ItemName" },
            { "data": "PartyName" },
            { "data": "Date" },
              { "data": "PaxName" },
              { "data": "RefNo" },
            { "data": "PNR" },
            { "data": "Sector" },
            { "data": "Total" },
            { "data": "Paid" },
             { "data": "action" },
            
        ],
          "order": [[0, 'desc']],
     });
});


$(document).ready(function() {
                    $('#student_table  tr').clone(true).appendTo( '#student_table thead' );
                    $('#student_table thead tr:eq(1) th').each( function (i) {
                        var title = $(this).text();
                        $(this).html( '<input type="text" placeholder=" Search '+title+'"  class="form-control form-control-sm" />' );


// hide text field from any column you want too
if (title == 'Action') {
    $(this).hide();
  }
    
                        $( 'input', this ).on( 'keyup change', function () {
                        
                            if ( table.column(i).search() !== this.value ) {
                                table
                                    .column(i)
                                    .search( this.value )
                                    .draw();
                            }
                        });
                        
                    });
                    var table = $('#student_table').DataTable( {
                        orderCellsTop: false,
                        fixedHeader: true,
                        retrieve: true,
                        paging: false

                    });
                });

 



</script>


 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

 

 <script>
   $( document ).ready(function() {
    
  $('body').addClass('sidebar-enable vertical-collpsed')
 // $('body').removeClass('sidebar-enable vertical-collpsed')
// setTimeout(function(){
        //   $("body").removeClass("sidebar-enable vertical-collpsed");
    //  },5000);
});
 </script>
 
 
 

      <!-- BEGIN: Vendor JS-->
    <script src="{{asset('assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->


  @endsection