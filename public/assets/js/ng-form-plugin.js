/*
 * Created By Ramy Ramadan
 * Ramy_islam88@yahoo.com
 * 2017
 */
jQuery(document).ready(function () {
    $.fn.Edit = function (options) {
        var settings = $.extend({Type: "GET", Data: "", ModuleName: "", ModuleItemName: "", NgAppName: "", Headers: ""}, options);
        $('body').on('click', '.edit', function () {
            var URL = $(this).attr('data-url');
            $.ajax({
                url: URL,
                type: settings.Type,
                headers: settings.Headers,
                data: settings.Data,
                success: function (Module) {
                    // Reset Form
                    var ScopeModuleName = settings.ModuleName;
                    var ScopeModuleItemName = settings.ModuleItemName;
                    var appElement = document.querySelector('[ng-app=' + settings.NgAppName + ']');
                    var Scope = angular.element(appElement).scope();
                    $('#' + ScopeModuleName + '-form')[0].reset();
                    Scope[ScopeModuleItemName] = [];
                    Scope.$apply();
                    Scope[ScopeModuleItemName] = Module['data'][0];
                    if (typeof settings.callback == 'function') {
                        settings.callback.call();
                    }
                    Scope.$apply();
                    $('.form-modal').modal('show');
                }
            });
        });
    };
    $.fn.Delete = function (options) {
        var settings = $.extend({Type: "GET", Data: "", ModuleName: "", ModuleItemName: "", NgAppName: "", Headers: ""}, options);
        $('body').on('click', '.delete', function () {
            Swal.fire({
                title: 'Are you sure you want to delete this item ?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Yes`,
                denyButtonText: `No`,
            }).then((result) => {
                if (result.isConfirmed) {
                    var URL = $(this).attr('data-url');
                    $.ajax({
                        url: URL,
                        type: settings.Type,
                        headers: settings.Headers,
                        data: settings.Data,
                        success: function (Module) {
                            // Reset Form
                            var ScopeModuleName = settings.ModuleName;
                            var ScopeModuleItemName = settings.ModuleItemName;
                            var appElement = document.querySelector('[ng-app=' + settings.NgAppName + ']');
                            var Scope = angular.element(appElement).scope();
                            //$('#' + ScopeModuleName + '-form')[0].reset();
                            //Scope[ScopeModuleItemName] = [];
                            Scope.$apply();
                            Swal.fire('Deleted successfully !', '', 'success');
                            if (typeof settings.callback == 'function') {
                                settings.callback.call();
                            }
                            ListTable.ajax.reload();
                        }
                    });
                }
            });
        });
    };
    $.fn.Submit = function (options) {
        var settings = $.extend({Type: "GET", Data: "", ModuleName: "", ModuleItemName: "", NgAppName: "", Headers: ""}, options);
        var ScopeModuleName = settings.ModuleName;
        var ScopeModuleItemName = settings.ModuleItemName;
        var appElement = document.querySelector('[ng-app=' + settings.NgAppName + ']');
        var Scope = angular.element(appElement).scope();
        $('#' + ScopeModuleName + '-form').ajaxForm({
            url: $(this).attr('action'),
            type: settings.Type,
            headers: settings.Headers,
            beforeSend: function () {
                $('.ajaxLoader').show();
            },
            complete: function () {
                $('.ajaxLoader').hide();
            },
            success: function (data) {
                //$('#' + ScopeModuleName + '-form')[0].reset();
                //Scope[ScopeModuleItemName] = [];
                Scope.$apply();
                if (typeof settings.callback == 'function') {
                    settings.callback.call();
                }
                if (typeof ListTable !== 'undefined') {
                    ListTable.ajax.reload();
                }
                $('.form-modal').modal('hide');
                new PNotify({title: 'Data saved Successfully', text: data.success_message, type: 'success'});
            },
            error: function (moduleerrors) {
                Scope['moduleerrors'] = moduleerrors.responseJSON;
                Scope.$apply();
                $('.error_label').addClass('alert alert-danger');
                new PNotify({title: 'Could not save data', text: 'Could not save data', type: 'error'});
            }
        });
    }
    $.fn.Add = function (options) {
        var settings = $.extend({Type: "GET", Data: "", ModuleName: "", ModuleItemName: "", NgAppName: "", Headers: ""}, options);
        var ScopeModuleName = settings.ModuleName;
        var ScopeModuleItemName = settings.ModuleItemName;
        var appElement = document.querySelector('[ng-app=' + settings.NgAppName + ']');
        $('.form-modal-button').on('click', function () {
            var Scope = angular.element(appElement).scope();
            $('#' + ScopeModuleName + '-form')[0].reset();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
                CKEDITOR.instances[instance].setData('');
            }
            Scope[ScopeModuleItemName] = [];
            Scope.$apply();
            if (typeof settings.callback == 'function') {
                settings.callback.call();
            }
        });
    }
    $('.datepicker').datetimepicker({format: 'DD-MM-YYYY', showClose: true});
    $('.datetimepicker').datetimepicker({format: 'DD-MM-YYYY HH-mm-ss', showClose: true});
    $('.cancel').on('click', function () {
        $('.form-modal').modal('hide');
    });
});