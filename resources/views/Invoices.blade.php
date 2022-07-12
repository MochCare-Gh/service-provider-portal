@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/datatables/tools/css/dataTables.tableTools.css'); ?>" />
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngInvoicesApp = angular.module('ngInvoicesApp', [], function ($interpolateProvider)
    {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
    ngInvoicesApp.controller('ngInvoicesAppcontroller', function ($scope) {
        $scope.user = [];
        $scope.addNewDetail = function () {
            if ($scope.InvoicesItem.details) {
                $scope.InvoicesItem.details.push({quantity: 1, product: '', description: '', subtotal: ''})
            } else {
                $scope.InvoicesItem.details = [{quantity: 1, product: '', description: '', subtotal: ''}];
            }
        }

        $scope.RemoveDetail = function (index) {
            $scope.InvoicesItem.details.splice($scope.InvoicesItem.details.indexOf(index));
        }
        $('#Invoices-form').Add({Type: 'POST', Headers: {'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'}, ModuleName: 'Invoices', ModuleItemName: 'InvoicesItem', NgAppName: 'ngInvoicesApp'});
        $('#Invoices-form').Edit({Type: 'GET', Headers: {'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'}, ModuleName: 'Invoices', ModuleItemName: 'InvoicesItem', NgAppName: 'ngInvoicesApp'});
        $('#Invoices-form').Delete({Type: 'DELETE', Headers: {'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'}, ModuleName: 'Invoices', ModuleItemName: 'InvoicesItem', NgAppName: 'ngInvoicesApp'});
        $('#Invoices-form').Submit({Type: 'POST', Headers: {'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'}, ModuleName: 'Invoices', ModuleItemName: 'InvoicesItem', NgAppName: 'ngInvoicesApp'});
    });</script>
@stop
@section('content')
<div class="">
        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Invoices</h1>
          </div><!-- /.col -->
<!--          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div> /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-7"><h2>Invoices's List</h2></div>
                        <div class="col-md-4 col-sm-4 col-xs-5">
                            <button class="btn btn-primary form-modal-button pull-right" data-toggle="modal" data-target=".form-modal">Add New Invoices</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped responsive-utilities jambo_table dataTable" id="Invoices-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="check-all" class="flat"></th>
                                <th>ID</th>
                                <th>From Company Name</th><th>To company name</th><th>Invoice Number</th><th>Payment due</th><th>tax</th><th>Shipping</th><th>Total</th><th>Payment status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Form modal -->
    <div class="modal fade form-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Invoices
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    <form ng-app="ngInvoicesApp" ng-controller="ngInvoicesAppcontroller" id="Invoices-form" class="form-horizontal form-label-left" method="post" action='{!! route("Invoicescreateorupdate") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_company_name"> From Company Name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model="InvoicesItem.from_company_name" type="text" id="from_company_name" name="from_company_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_company_address"> From company address <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea ng-model="InvoicesItem.from_company_address" id="from_company_address" name="from_company_address" required="required" class="editor form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_company_phone"> From company phone <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model="InvoicesItem.from_company_phone" type="text" id="from_company_phone" name="from_company_phone" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="from_company_email"> From company email <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model="InvoicesItem.from_company_email" type="text" id="from_company_email" name="from_company_email" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="to_company_name"> To company name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model="InvoicesItem.to_company_name" type="text" id="to_company_name" name="to_company_name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="to_company_address"> To company address <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea ng-model="InvoicesItem.to_company_address" id="to_company_address" name="to_company_address" required="required" class="editor form-control col-md-7 col-xs-12"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="to_company_phone"> To company phone <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model="InvoicesItem.to_company_phone" type="text" id="to_company_phone" name="to_company_phone" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="to_company_email"> To company email <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model="InvoicesItem.to_company_email" type="text" id="to_company_email" name="to_company_email" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="invoice_number"> Invoice Number <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model="InvoicesItem.invoice_number" type="text" id="invoice_number" name="invoice_number" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="payment_due"> Payment due <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model="InvoicesItem.payment_due" type="text" id="payment_due" name="payment_due" required="required" class="form-control col-md-7 col-xs-12 datepicker">
                            </div>
                        </div>
                        <!-- begin details-->
                        <div  class='form-group'>
                            @include('invoice_details_list')
                        </div>
                        <!-- end details-->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tax"> tax <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model="InvoicesItem.tax" type="text" id="tax" name="tax" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="shipping"> Shipping <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model="InvoicesItem.shipping" type="text" id="shipping" name="shipping" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="total"> Total <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model="InvoicesItem.total" type="text" id="total" name="total" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="payment_status"> Payment status <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" id="payment_status" name="payment_status">
                                    <option ng-selected="InvoicesItem.payment_status == 'Paid'" class="form-control col-md-7 col-xs-12" value="Paid">Paid</option>
                                    <option ng-selected="InvoicesItem.payment_status == 'UnPaid'" class="form-control col-md-7 col-xs-12" value="UnPaid">UnPaid</option>
                                    <option ng-selected="InvoicesItem.payment_status == 'Partial Paid'" class="form-control col-md-7 col-xs-12" value="Partial Paid">Partial Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="invoice_type"> Invoice Type <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" id="invoice_type" name="invoice_type">
                                    <option ng-selected="InvoicesItem.invoice_type == 'Recurring'" class="form-control col-md-7 col-xs-12" value="Recurring">Recurring</option>
                                    <option ng-selected="InvoicesItem.invoice_type == 'One Time'" class="form-control col-md-7 col-xs-12" value="One Time">One Time</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="renewal_date"> Renewal date <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model="InvoicesItem.renewal_date" type="text" id="renewal_date" name="renewal_date" required="required" class="form-control col-md-7 col-xs-12 datepicker">
                            </div>
                        </div>
                        <input ng-model='InvoicesItem.id' type="text" id="id" name="id" style="display: none" />
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-primary cancel">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
<script type="text/javascript">
    var ListTable;
    $(document).ready(function () {
        var ajaxAction = function (url, action) {
            $.ajax({url: url, type: action, data: {'_token': "{{ csrf_token()}}", 'selected_rows': SelectedCheckboxes()}, success: function () {
                    ListTable.ajax.reload();
                }});
        }
        var SelectedCheckboxes = function () {
            return $('input:checkbox:checked.Invoices_record').map(function () {
                return this.value;
            }).get();
        }
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}', 'X-Requested-With': 'XMLHttpRequest'}
        });
        ListTable = $('#Invoices-table').DataTable({
            dom: '<"row"<"col-sm-7 col-md-8"<"hidden-xs hidden-sm"l>B><"col-sm-5 col-md-4"f>><"row"<"col-sm-12 table-responsive"rt>><"row"<"col-sm-5"i><"col-sm-7"p>>',
            processing: true,
            serverSide: true,
            ajax: {url: '{!! route("Invoiceslist") !!}',
                headers: {'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'}
            },
            columns: [
                {data: 'Select', name: 'Select', searchable: false, sortable: false},
                {data: 'id', name: 'id'},
                {data: 'from_company_name', name: 'from_company_name'}, {data: 'to_company_name', name: 'to_company_name'}, {data: 'invoice_number', name: 'invoice_number'}, {data: 'payment_due', name: 'payment_due'}, {data: 'tax', name: 'tax'}, {data: 'shipping', name: 'shipping'}, {data: 'total', name: 'total'}, {data: 'payment_status', name: 'payment_status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'updated_at', name: 'updated_at'},
                {data: 'actions', name: 'actions', 'searchable': false}
            ],
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis',
                {text: 'Delete',
                    action: function (e, dt, node, config) {
                        var TrashItem = confirm('Are Your sure you want to Delete this Item/s');
                        if (TrashItem) {
                            ajaxAction("{!! route('Invoicesdeletemultiple') !!}", 'DELETE');
                        }
                    }
                }
            ],
            order: [[1, 'asc']],
            drawCallback: function () {
                $('.dataTable input').iCheck({checkboxClass: 'icheckbox_flat-green'});
            }
        });
        $('body').on('ifToggled', '#check-all', function (event) {
            if ($(this).is(':checked')) {
                $('input.Invoices_record').iCheck('check');
            } else {
                $('input.Invoices_record').iCheck('uncheck');
            }
        });
    });</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.colVis.min.js"></script>
@stop