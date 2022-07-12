<form  id="fields-form" class="form-horizontal form-label-left" method="post" action='{!! route("field_create_update") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="field_name">Field Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model='field.field_name' type="text" id="name" name='field_name' required="required" class="form-control col-md-7 col-xs-12" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="field_label">Field Label <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model='field.field_label' type="text" id="label" name='field_label' required="required" class="form-control col-md-7 col-xs-12" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="field_type">Field Type <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control column_type" name="field_type" id="field_type" ng-model='field.field_type'>
                                    <option></option>
                                    <option ng-repeat="filedtypeoption in fieldtypes" value="<% filedtypeoption.id %>"><% filedtypeoption.field_text|uppercase %></option>    
                                </select>
                            </div>
                        </div>
                        <div class="form-group" ng-show="ifHasRelation()">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="related_table">Related Table <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control column_type" name="related_table" id="related_table" ng-model='field.related_table'>
                                    <option></option>
                                    <option ng-repeat="(related_table_key,related_table_value) in TableNames" value="<% related_table_key %>"><% related_table_key %></option>    
                                </select>
                            </div>
                        </div>
                        <div class="form-group" ng-show="ifHasRelation()">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="related_table_field">Related Table Field <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control column_type" name="related_table_field" id="related_table_field" ng-model='field.related_table_field'>
                                    <option></option>
                                    <option ng-selected="related_table_field_value['Field']==field.related_table_field" ng-repeat="(related_table_field_key,related_table_field_value) in TableNames[field.related_table]" ng-if='related_table_field_value["Key"]=="PRI"' value="<% related_table_field_value['Field'] %>"><% related_table_field_value['Field'] %></option>    
                                </select>
                            </div>
                        </div>
                        <div class="form-group" ng-show="ifHasRelation()">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="related_table_field">Related Table Field To Display <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control column_type" name="related_table_field_display" id="related_table_field_display" ng-model='field.related_table_field_display'>
                                    <option></option>
                                    <option ng-selected="related_table_field_value['Field']==field.related_table_field_display"  ng-repeat="(related_table_field_key,related_table_field_value) in TableNames[field.related_table]" ng-if='related_table_field_value["Key"]!="PRI"' value="<% related_table_field_value['Field'] %>"><% related_table_field_value['Field'] %></option>    
                                </select>
                            </div>
                        </div>
                        <div class="form-group" ng-show="isOptionsField()">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="options_field">Field Options<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type='text' class="form-control"  name="field_options" id="field_options" ng-model='field.field_options' placeholder="Add option" />
<!--                                <select class="form-control  select2_multiple" multiple='multiple' name="field_options" id="field_options" style='width: 100%'>
                                    <option ng-repeat="(field_options_key,field_options_value) in TableNames[field.field_options]" value="<% field_options_value['Field'] %>"><% field_options_value['Field'] %></option>    
                                </select>-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="field_length">Field Length<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model='field.field_length' type="number" min="0" max="1000" id="field_length" name='field_length'  class="form-control col-md-7 col-xs-12" value="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="field_length">Show in List View<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model='field.show_in_list' type="radio"  name='show_in_list'  value="1" checked > yes
                                <input ng-model='field.show_in_list' type="radio"  name='show_in_list'  value="0" > No
                            </div>
                        </div>
                        @include('modulebuilder.forms.validation_fields')
                        <input ng-model='field.id' type="text" id="id" name="id" style="display: none" />
                        <input ng-model='field.module_id' type="text" id="module_id" name="module_id" value='{{ $module_id }}'style="display: none" />
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="reset" class="cancel btn btn-primary">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
  </form>