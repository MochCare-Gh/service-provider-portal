@extends("templates.".config("sysconfig.theme").".master")
@section('head')
<!-- This is the localization file of the grid controlling messages, labels, etc.
<!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/jquery-ui.css') ?>" />
<!-- The link to the CSS that the grid needs -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('assets/css/trirand/ui.jqgrid.css') ?>" />
@stop
@section('content')
<style type="text/css">

    /* set the size of the datepicker search control for Order Date*/
    #ui-datepicker-div { font-size:11px; }

    /* set the size of the autocomplete search control*/
    .ui-menu-item {
        font-size: 11px;
    }

    .ui-autocomplete { font-size: 11px; position: absolute; cursor: default;z-index:5000 !important;}      

</style>
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
                    
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daily active users </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="jqGrid"></table>
                    <div id="jqGridPager"></div>

                    <script type="text/javascript">
                        $(document).ready(function () {


                            var template = "<div style='margin-left:15px;'><div> ID <sup>*</sup>:</div><div> {id} </div>";
                            template += "<div> Role Name: </div><div>{name} </div>";
                            template += "<div> <input type='hidden' name='_token' id='_token' value='{{{ csrf_token() }}}' /></div>";
                            template += "<div> Slug: </div><div>{slug} </div>";
                            template += "<div> Description : </div><div>{description} </div>";
                            template += "<div> Level:</div><div> {level} </div>";
                            template += "<div> Created at:</div><div> {created_at} </div>";
                            template += "<div> updated at:</div><div> {updated_at} </div>";
                            template += "<hr style='width:100%;'/>";
                            template += "<div> {sData} {cData}  </div></div>";
                            $("#jqGrid").jqGrid({
                                //url: 'http://trirand.com/blog/phpjqgrid/examples/jsonp/getjsonp.php?callback=?&qwery=longorders',
                                url: "<?php echo URL('users/permissions'); ?>",
                                mtype: "GET",
                                datatype: "json",
                                colModel: [
                                    {label: 'ID', name: 'id', key: true, width: 40, editable: false},
                                    {label: 'Role Name', name: 'name', width: 150, editable: true},
                                    {label: 'Slug', name: 'slug', width: 150, editable: true},
                                    {label: 'Description', name: 'description', width: 150, editable: true},
                                    {label: 'Level', name: 'level', width: 50, editable: true},
                                    {label: 'Created At', name: 'created_at', width: 150, editable: false},
                                    {label: 'updated At', name: 'updated_at', width: 150, editable: false},
                                ],
                                viewrecords: true, width: 1000, height: 300, rowNum: 20, multiselect: true, pager: "#jqGridPager"
                            });

                            // We need to have a navigation bar in order to add custom buttons to it
                            $('#jqGrid').navGrid('#jqGridPager',
                                    {edit: true, add: true, del: true, search: true, refresh: true, view: true, position: "left", cloneToTop: true},
                                    {editCaption: "Edit Role", template: template, url: '<?php echo URL('users/roles'); ?>',
                                        onclickSubmit: function (params, postdata) {
                                            postdata._token = $("#_token").val()
                                        },
                                        errorTextFormat: function (data) {
                                            return 'Error: ' + data.responseText
                                        }
                                    },
                                    {editCaption: "The Add Dialog", template: template, url: '<?php echo URL('users/roles'); ?>',
                                        onclickSubmit: function (params, postdata) {
                                            postdata._token = $("#_token").val()
                                        },
                                        errorTextFormat: function (data) {
                                            return 'Error: ' + data.responseText
                                        }
                                    },
                                    {deleteCaption: "Delete", template: template, url: '<?php echo URL('users/roles'); ?>',

                                        onclickSubmit: function (params, postdata) {
                                            postdata._token = '{{{ csrf_token() }}}'
                                        },
                                        errorTextFormat: function (data) {
                                            return 'Error: ' + data.responseText
                                        }
                                    }
                            );

                            /// add second custom button
                            $('#jqGrid').navButtonAdd('#jqGridPager',
                                    {
                                        buttonicon: "ui-icon ui-icon-trash",
                                        title: "Delete",
                                        caption: "Delete",
                                        position: "last",
                                        onClickButton: customButtonClicked
                                    });
                            function customButtonClicked()
                            {
                                var id = $("#jqGrid").jqGrid('getGridParam', "selarrrow");
                                if (id != null)
                                {
                                    $res = confirm('are you sure');

                                    if ($res) {
                                        $.ajax({
                                            url: '<?php echo URL('users/roles'); ?>',
                                            type: 'POST',
                                            data: {'_token': '{{{ csrf_token() }}}', 'id': id, 'oper': 'del'}
                                            , success: function () {
                                                $('#jqGrid').trigger('reloadGrid');
                                            }
                                        });
                                    }

                                }
                            }

                        });

                    </script>
                </div>
            </div>
        </div>

        <br />
        <br />
        <br />

    </div>
</div>
@stop

@section('footer')
<script type="text/ecmascript" src="<?php echo asset('assets/js/jquerygrid/trirand/i18n/grid.locale-en.js') ?>"></script>
<!-- This is the Javascript file of jqGrid -->   
<script type="text/ecmascript" src="<?php echo asset('assets/js/jquerygrid/trirand/jquery.jqGrid.min.js') ?>"></script>
<script type="text/ecmascript" src="<?php echo asset('assets/js/jquerygrid/jquery-ui.min.js') ?>"></script>

@stop