@extends("templates.".config("sysconfig.theme").".master")

@section('head')
<script src="{{asset('assets/js/angular.js')}}" ></script>
    <!--select-2-->
    <link href="{{ asset('assets/css/select/select2.min.css') }}" rel="stylesheet">
<script stype="text/javascript">
    var ngFieldsApp = angular.module('ngFieldsApp', [], function($interpolateProvider)
    {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
    ngFieldsApp.controller('ngFieldsController', function($scope) {
        $scope.module_title = "@lang('modules.module_title')";
        $scope.page_title = "@lang('modules.module_name')"+' : '+" {{ $module[0]->module_name }}";
        $scope.fieldtypes =<?php echo $field_types; ?>;
        $scope.TableNames ={!! $GetTableNames !!};
        $scope.field=[];
        $scope.field.module_id="{{ $module[0]->id }}";
        $scope.ifHasRelation=function(){
            if($scope.field.field_type=='11')
              {return true;}
              return false;
        }
        $scope.isOptionsField=function(){
            if($scope.field.field_type=='13' || $scope.field.field_type=='14')
              {return true;}
              return false;
        }
        //$(".select2_multiple").select2({ tags:true,selectOnClose: false});
        $('#field_options').tagsInput({width: 'auto','placeholder':'Add Option' });
        $('body').on('click','.edit',function(){
        var URL=$(this).attr('data-url');
            $.ajax({
                url:URL,
                type:'GET',
                data:{'_token':'<?php echo csrf_token();?>'},
                success:function(field){
                $scope.validation_rules=[];
                $scope.$apply();    
                $scope.validation_rules=JSON.parse(field)[0].validation_rules;
                // Reset Form
                var Module_id=$scope.field.module_id;    
                $('#fields-form')[0].reset();$scope.field=[];
                $scope.field.module_id=Module_id;
                $scope.$apply();
                $('#field_options').importTags('');
                $scope.field=JSON.parse(field)[0];
                $('#field_options').importTags($scope.field.field_options);
                $scope.$apply();
                $('input').iCheck('update');
                $('.bd-example-modal-lg').modal('show');
                }
            }); 
       });
       $('body').on('click','.delete',function(){
        var URL=$(this).attr('data-url');
            $.ajax({
                url:URL,
                type:'GET',
                data:{'_token':'<?php echo csrf_token();?>'},
                success:function(field){
                // Reset Form
                $('#fields-form')[0].reset();$scope.field=[];$scope.$apply();
                fields.ajax.reload();
                }
            }); 
       });
       $('#fields-form').on('submit',function(e){
       e.preventDefault();
       $.ajax({
                url:$(this).attr('action'),
                type:'post',
                data:$(this).serialize(),
                success:function(){
                var Module_id=$scope.field.module_id;    
                $('#fields-form')[0].reset();$scope.field=[];
                $scope.field.module_id=Module_id;
                $scope.$apply();fields.ajax.reload();
                $('.bd-example-modal-lg').modal('hide');
                },
                error:function(moduleerrors){$scope.moduleerrors=moduleerrors.responseJSON;$scope.$apply();}
            });
       });
       $('.add-new-field').on('click',function(){
            var Module_id=$scope.field.module_id;    
            $('#fields-form')[0].reset();$scope.field=[];$scope.field.show_in_list='1';
            $('#field_options').importTags('');
            $scope.field.module_id=Module_id;         
            $scope.$apply();
       });
       $('.cancel').on('click',function(){
       $scope.field=[];$scope.$apply();
       $('#field_options').importTags('');    
       $('.bd-example-modal-lg').modal('hide');
       });

    });
</script>
@stop

@section('content')
<?php //print_r($FinalTablesInfo);  ?>
<div class="" ng-app="ngFieldsApp" ng-controller="ngFieldsController">
    <div class="page-title">
        <div class="title_left">
            <h3 ng-bind="module_title"></h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                       <div class="col-md-8 col-sm-8 col-xs-7"><h2 ng-bind="page_title"></h2></div>
                       <div class="col-md-4 col-sm-4 col-xs-5">
                            <button class="btn btn-primary add-new-field pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">@lang('modules.module_add_new_field')</button>
                       </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    
                    <table class="table table-striped responsive-utilities jambo_table dataTable" id="fields-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="check-all" class="flat"></th>
                                <th>ID</th>
                                <th>Field Name</th>
                                <th>Field Label</th>
                                <th>Field Type</th>
                                <th>Validation Rules</th>
                                <th>Show in List View</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <a href="{{ Route('genearatemodule',$module_id) }}" class="btn btn-primary create-module">@lang('modules.module_generate_module')</a>
            </div>
        </div>

    </div>
    
    <!-- Form modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">Add/Edit Field
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
        </h4>
      </div>
      <div class="modal-body">
        @include('modulebuilder.forms.add_new_field')
      </div>
    </div>
  </div>
</div>

</div>
@stop

@section('footer')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <!-- select2 -->
<script src="{{ asset('assets/js/select/select2.full.js') }}"></script>
<script src="{{ asset('assets/js/tags/jquery.tagsinput.min.js') }}"></script>
<script type='text/javascript'>
var fields;
jQuery(document).ready(function(){
        var ajaxAction=function(url,action){ $.ajax({url:url,type:action,data:{'_token':"{{ csrf_token()}}" ,'selected_rows':SelectedCheckboxes() },success:function(){}}); }
        var SelectedCheckboxes = function() { return $('input:checkbox:checked.field_record').map(function () { return this.value; }).get(); }    
           fields = $('#fields-table').DataTable({
            dom: '<"row"<"col-sm-7 col-md-8"<"hidden-xs hidden-sm"l>B><"col-sm-5 col-md-4"f>><"row"<"col-sm-12 table-responsive"rt>><"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print',{  text: 'Delete',
                    action: function ( e, dt, node, config ) {   
                     var TrashItem = confirm('Are Your sure you want to Delete this Field/s');
                     if (TrashItem) {ajaxAction("{!! route('multiple_fields_delete') !!}",'DELETE'); fields.ajax.reload();}
                    }
            }],
            processing: true,
            serverSide: true,
            ajax: '{!! route("fieldslist",$module_id) !!}',
            columns: [
                {data: 'Select', name: 'Select',searchable:false,sortable:false},
                {data: 'id', name: 'id'},
                {data: 'field_name', name: 'field_name'},
                {data: 'field_label', name: 'field_label'},
                {data: 'field_type', name: 'field_type'},
                {data: 'validation_rules', name: 'validation_rules'},
                {data: 'show_in_list', name: 'show_in_list'},
                {data: 'created_at', name: 'created_at'},
                {data: 'actions', name: 'actions','searchable':false}
            ],
            order: [[1, 'asc']],
            drawCallback:function(){$('.dataTable input').iCheck({checkboxClass: 'icheckbox_flat-green'});}
        });
        $('body').on('ifToggled','#check-all', function (event) {
            if($(this).is(':checked')){$('input.field_record').iCheck('check'); } else { $('input.field_record').iCheck('uncheck');}
        });
        $('.create-module').on('click',function(e){
            e.preventDefault();
            var URL=$(this).attr('href');
            var AjaxLoaderInt='';
            var percentage=10;
            $.ajax({url:URL,
                type:'GET',
                beforeSend:function(){
                    $('.ajaxLoader').show();
                    AjaxLoaderInt=setInterval(function(){
                        if(percentage<90)
                        {percentage=percentage+10;$('.ajaxLoader .progress .progress-bar').width(percentage+'%');}
                    },200);
                },
                success:function(){
                    $('.ajaxLoader .progress .progress-bar').width('100%');
                    clearInterval('AjaxLoaderInt');
                    $('.ajaxLoader').hide();
                    new PNotify({title: 'Module Generated Successfully',text: 'You can Now use your module !',type: 'success'});
                    setTimeout(function(){window.location="{{ route('all_modules') }}";},3000 );
                }
            });
        });
});
</script>
<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>

@stop