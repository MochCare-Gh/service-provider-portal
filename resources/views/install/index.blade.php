<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name')}}</title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo asset('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo asset('assets/css/custom.css'); ?>" rel="stylesheet">
        <script src="<?php echo asset('assets/js/jquery.min.js') ?>"></script>
        <link href="<?php echo asset('assets/css/animate.min.css'); ?>" rel="stylesheet">
        <script src="{{asset('assets/js/angular.js')}}" ></script>
        <script stype="text/javascript">
            var ngInstallApp = angular.module('ngInstallApp', [], function ($interpolateProvider)
            {
                $interpolateProvider.startSymbol('<%');
                $interpolateProvider.endSymbol('%>');
            });
            ngInstallApp.controller('ngInstallController', function ($scope) {
                $('#install-form').on('submit', function (e) {
                    e.preventDefault();
                    var FormData = $(this).serialize();
                    var AjaxLoaderInt = '';
                    var percentage = 10;
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'post',
                        data: FormData,
                        beforeSend: function () {
                            $('.ajaxLoader').show();
                            AjaxLoaderInt = setInterval(function () {
                                if (percentage < 90)
                                {
                                    percentage = percentage + 10;
                                    $('.ajaxLoader .progress .progress-bar').width(percentage + '%');
                                }
                            }, 200);
                        },
                        success: function () {
                            $('#install-form')[0].reset();
                            $scope.$apply();
                            clearInterval('AjaxLoaderInt');
                            $('.ajaxLoader').hide();
                            window.location = '{{ route("InstallStepTwo") }}'
                        },
                        error: function (installerrors) {
                            $scope.installerrors = installerrors.responseJSON;
                            $scope.$apply();
                            clearInterval('AjaxLoaderInt');
                            $('.ajaxLoader').hide();
                        }

                    });

                });




            });

        </script>

    </head>



    <body style="background:#F7F7F7;" ng-app="ngInstallApp" ng-controller="ngInstallController">



        <div class="">

            <a class="hiddenanchor" id="toregister"></a>

            <a class="hiddenanchor" id="tologin"></a>



            <div id="wrapper">

                <div id="login" class="animate form">

                    <section class="login_content">

                        <form name="install-form" id="install-form" method="POST" action="{!! route('InstallProcess') !!}" data-parsley-validate >

                            {!! csrf_field() !!}

                            <h1> Installation </h1>

                            <h2>Database Settings </h2>

                            <div>
                                <input type="text" class="form-control" name="db_host" placeholder="Database Host" required="" />
                                <label>Database Host is IP of database Host like : 129.123.1.1</label>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="db_name" placeholder="Database Name" required="" />
                                <label class='danger alert-danger' ng-repeat='db_nameError in installerrors.db_name' ng-bind='db_nameError'></label>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="db_username" placeholder="Database User Name" required="" />
                                <label class='danger alert-danger' ng-repeat='db_usernameError in installerrors.db_username' ng-bind='db_usernameError'></label>
                            </div>
                            <div>
                                <input type="text" class="form-control" name="db_password" placeholder="Database password" required="" />
                                <label class='danger alert-danger' ng-repeat='db_passwordError in installerrors.db_password' ng-bind='db_passwordError'></label>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-default submit">Submit</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">
                                <div class="clearfix"></div>
                            </div>

                        </form>

                        <!-- form -->

                    </section>

                    <!-- content -->

                </div>

            </div>
        </div>
        <div class="ajaxLoader" style="display: none;width: 100%;background-color: white;position: fixed;z-index: 1000;height: 100%;top: 0px;opacity: 0.7;">
            <div class="progress progress-striped progress_wide" style="width: 40%;margin: 0 auto;top: 50%;">
                <div class="progress-bar progress-bar-success" data-transitiongoal="10" aria-valuenow="10" style="width: 10%;"></div>
            </div>
        </div>
    </body>
</html>