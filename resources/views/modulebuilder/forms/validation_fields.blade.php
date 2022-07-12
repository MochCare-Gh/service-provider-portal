<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="field_length">Validation rules<span class="required">*</span></label>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="field_length">Field Type<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="radio col-md-6 col-sm-6 col-xs-12">
            <label>
                <input type="radio" ng-model="validation_rules.type" name="validation_field_type" class=" flat" value="string" /> String
            </label>
        </div>
        <div class="radio col-md-6 col-sm-6 col-xs-12">
            <label>
                <input type="radio" ng-model="validation_rules.type"  name="validation_field_type" class=" flat" value="integer" /> Integer
            </label>
        </div>
        <div class="radio col-md-6 col-sm-6 col-xs-12">
            <label>
                <input type="radio" ng-model="validation_rules.type" name="validation_field_type" class=" flat" value="url" /> URL
            </label>
        </div>
        <div class="radio col-md-6 col-sm-6 col-xs-12">
            <label>
                <input type="radio" ng-model="validation_rules.type" name="validation_field_type" class=" flat" value="email" /> E-mail
            </label>
        </div>
        <div class="radio col-md-6 col-sm-6 col-xs-12">
            <label>
                <input type="radio" ng-model="validation_rules.type" name="validation_field_type" class=" flat" value="date" /> Date
            </label>
        </div>
        <div class="radio col-md-6 col-sm-6 col-xs-12">
            <label>
                <input type="radio" ng-model="validation_rules.type" name="validation_field_type" class=" flat" value="numeric" /> Numeric
            </label>
        </div>
        <div class="radio col-md-6 col-sm-6 col-xs-12">
            <label>
                <input type="radio" ng-model="validation_rules.type" name="validation_field_type" class=" flat" value="image" /> Image
            </label>
        </div>
        <div class="radio col-md-6 col-sm-6 col-xs-12">
            <label>
                <input type="radio" ng-model="validation_rules.type" name="validation_field_type" class=" flat" value="file" /> File
            </label>
        </div>
        <div class="radio col-md-6 col-sm-6 col-xs-12">
            <label>
                <input type="radio" ng-model="validation_rules.type" name="validation_field_type" class=" flat" value="ip" /> IP Address
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="field_length">Other Rules<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        
        <div class="col-md-12 col-sm-12 col-xs-12">
            <label>
                <input type="checkbox" name="validation_unique" class=" flat" value="unique" ng-checked="validation_rules.unique =='unique'" ng-model="validation_rules.unique"  /> unique
            </label>
        </div>
        
        <div class="col-md-12 col-sm-12 col-xs-12">
            <label>
                <input type="checkbox" ng-checked="validation_rules.min !=''" name="validation_min" class=" flat" value="min" /> Min value
                <input type="number" min='0' name="validation_min_value" ng-model="validation_rules.min" />
            </label>
        </div>
        
        <div class="col-md-12 col-sm-12 col-xs-12">
            <label>
                <input type="checkbox" ng-checked="validation_rules.max !=''" name="validation_max" class=" flat" value="max" /> Max value
                <input type="number" min='0' name="validation_max_value" ng-model="validation_rules.max" />
            </label>
        </div>
        
    </div>
</div>