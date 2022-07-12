@extends('layouts.master')
@section('head')
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/custom.css'); ?>" />
<script type="text/javascript" src="<?php echo asset('assets/js/ng-form-plugin.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.js" ></script>
<script stype="text/javascript">
    var ngInvoicesApp = angular.module('ngInvoicesApp', [], function($interpolateProvider)
    {$interpolateProvider.startSymbol('<%'); $interpolateProvider.endSymbol('%>'); });
    ngInvoicesApp.controller('ngInvoicesAppcontroller', function($scope) {
    $scope.user = [];
    
    $('#Invoices-form').Add({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Invoices', ModuleItemName:'InvoicesItem', NgAppName:'ngInvoicesApp'});
    $('#Invoices-form').Edit({Type:'GET',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Invoices', ModuleItemName:'InvoicesItem', NgAppName:'ngInvoicesApp'});
    $('#Invoices-form').Delete({Type:'DELETE',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Invoices', ModuleItemName:'InvoicesItem', NgAppName:'ngInvoicesApp'});
    $('#Invoices-form').Submit({Type:'POST',Headers:{'X-CSRF-TOKEN':'<?php echo csrf_token();?>'}, ModuleName:'Invoices', ModuleItemName:'InvoicesItem', NgAppName:'ngInvoicesApp'});
    });</script>
<style type="text/css">
    p{margin:0px}
</style>
@stop
@section('content')
<div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Invoice
                    <small>
                        Some examples to get you started
                    </small>
                </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_content">

                                    <section class="content invoice">
                                        <!-- title row -->
                                        <div class="row">
                                            <div class="col-xs-12 invoice-header">
                                                <h1>
                                        <i class="fa fa-globe"></i> Invoice.
                                        <small class="pull-right">Date: {{ $invoice->created_at }}</small>
                                    </h1>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- info row -->
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                                From
                                                <address>
                                        <strong>{{ $invoice->from_company_name }}</strong>
                                        {!! $invoice->from_company_address !!}
                                        Phone: {{ $invoice->from_company_phone }}
                                        <br>Email: {{ $invoice->from_company_email }}
                                    </address>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">
                                                To
                                                <address>
                                        <strong>{{ $invoice->to_company_name }}</strong>
                                        {!! $invoice->to_company_address !!}
                                        Phone: {{ $invoice->to_company_phone }}
                                        <br>Email: {{ $invoice->to_company_email }}
                                    </address>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 invoice-col">
                                                <b>Invoice #{{ $invoice->invoice_number }}</b>
                                                <br>
                                                <b>Payment Due:</b> {{ $invoice->payment_due }}
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- Table row -->
                                        <div class="row">
                                            <div class="col-xs-12 table">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Qty</th>
                                                            <th>Product / Service</th>
                                                            <th style="width: 59%">Description</th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($invoice->details  as $detail)
                                                        <tr>
                                                            <td>{{ $detail->quantity }}</td>
                                                            <td>{{ $detail->product }}</td>
                                                            <td>{{ $detail->description }}
                                                            </td>
                                                            <td>${{ $detail->subtotal }}</td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td colspan="5">No item details added</td>
                                                        </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <div class="row">
                                            <!-- /.col -->
                                            <div class="col-xs-6">
                                                <p class="lead">Amount Due {{ $invoice->payment_due }}</p>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th>Tax </th>
                                                                <td>${{ $invoice->tax }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Shipping:</th>
                                                                <td>${{ $invoice->shipping }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total:</th>
                                                                <td>${{ $invoice->total }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <!-- this row will not appear when printing -->
                                        <div class="row no-print">
                                            <div class="col-xs-12">
                                                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@stop

@section('footer')
@stop