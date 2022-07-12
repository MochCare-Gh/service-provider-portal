<form  id="modules-form" class="form-horizontal form-label-left" method="post" action='{!! route("module_create_update") !!}' autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Module Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model='module.module_name' type="text" name="module_name" id='module_name'  class="form-control col-md-7 col-xs-12" />
                                <label class='danger alert-danger' ng-repeat='module_nameError in moduleerrors.module_name' ng-bind='module_nameError'></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Module Icon <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input ng-model='module.module_icon' type="text" name="module_icon" id='module_icon' class="form-control col-md-7 col-xs-12" />
                                <label class='danger alert-danger' ng-repeat='module_iconError in moduleerrors.module_icon' ng-bind='module_iconError'></label>
                            </div>
                        </div>
                        <input ng-model='module.id' type="text" id="id" name="id" style="display: none" />
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="reset" class="btn btn-primary cancel">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
  </form>