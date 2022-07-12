@extends("templates.".config("sysconfig.theme").".master")

@section('head')
@stop

@section('content')
<?php //print_r($FinalTablesInfo); ?>
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Module Builder</h3>
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
                                    
                                    <div class="col-md-6">
                                        <div id="form_elements_container" class="droppable ui-widget-header col-md-12">
                                            <p>Drag Form Elements Here</p>
                                        </div>
                                    </div>
                                      <div class="col-md-6 bd-example elements_container" data-example-id="">
                                        <div class="form-group row draggable">
                                          <label for="example-text-input" class="col-2 col-form-label">Text</label>
                                          <div class="col-10">
                                            <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                          </div>
                                        </div>
                                        <div class="form-group row draggable">
                                          <label for="example-search-input" class="col-2 col-form-label">Search</label>
                                          <div class="col-10">
                                            <input class="form-control" type="search" value="How do I shoot web" id="example-search-input">
                                          </div>
                                        </div>
                                        <div class="form-group row draggable">
                                          <label for="example-email-input" class="col-2 col-form-label">Email</label>
                                          <div class="col-10">
                                            <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                                          </div>
                                        </div>
                                        <div class="form-group row draggable">
                                          <label for="example-url-input" class="col-2 col-form-label">URL</label>
                                          <div class="col-10">
                                            <input class="form-control" type="url" value="https://getbootstrap.com" id="example-url-input">
                                          </div>
                                        </div>
                                        <div class="form-group row draggable">
                                          <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
                                          <div class="col-10">
                                            <input class="form-control" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                                          </div>
                                        </div>
                                        <div class="form-group row draggable">
                                          <label for="example-password-input" class="col-2 col-form-label">Password</label>
                                          <div class="col-10">
                                            <input class="form-control" type="password" value="hunter2" id="example-password-input">
                                          </div>
                                        </div>
                                        <div class="form-group row draggable">
                                          <label for="example-number-input" class="col-2 col-form-label">Number</label>
                                          <div class="col-10">
                                            <input class="form-control" type="number" value="42" id="example-number-input">
                                          </div>
                                        </div>
                                        <div class="form-group row draggable">
                                          <label for="example-datetime-local-input" class="col-2 col-form-label">Date and time</label>
                                          <div class="col-10">
                                            <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                          </div>
                                        </div>
                                        <div class="form-group row draggable">
                                          <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                          <div class="col-10">
                                            <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                                          </div>
                                        </div>
                                        <div class="form-group row draggable">
                                          <label for="example-month-input" class="col-2 col-form-label">Month</label>
                                          <div class="col-10">
                                            <input class="form-control" type="month" value="2011-08" id="example-month-input">
                                          </div>
                                        </div>
                                        <div class="form-group row draggable">
                                          <label for="example-week-input" class="col-2 col-form-label">Week</label>
                                          <div class="col-10">
                                            <input class="form-control" type="week" value="2011-W33" id="example-week-input">
                                          </div>
                                        </div>
                                        <div class="form-group row draggable">
                                          <label for="example-time-input" class="col-2 col-form-label">Time</label>
                                          <div class="col-10">
                                            <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                                          </div>
                                        </div>
                                        <div class="form-group row draggable">
                                          <label for="example-color-input" class="col-2 col-form-label">Color</label>
                                          <div class="col-10">
                                            <input class="form-control" type="color" value="#563d7c" id="example-color-input">
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                              <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>  
                                        </div>
<!--                                    <div class="col-md-6">
                                        <ul class="elements_container">
                                            <li class="draggable">
                                                <input type="text" name="inputtext_element" id="inputtext_element" placeholder="Example Input Text" />
                                            </li>
                                            <li class="draggable">
                                            <input type="checkbox" name="inputcheckbox_element" id="inputcheckbox_element" value="" />Example Checkbox
                                            </li>
                                            <li class="draggable">
                                            <select  name="select_element" id="select_element"  >
                                                <option>Select Options Example</option>
                                            </select>
                                            </li>
                                            <li class="draggable">
                                            <input type="radio" name="inputradio_element" id="inputradio_element1" placeholder="Example Input Radio" />Radio examle
                                            <input type="radio" name="inputradio_element" id="inputradio_element2" placeholder="Example Input Radio" />Radio examle2
                                            </li>
                                        </ul>
                                    </div>-->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
    @stop
    
    @section('footer')
    <script>
    $( function() {$(".draggable" ).draggable({ opacity: 0.8, helper: "clone"});
    $( ".droppable" ).droppable({
      drop: function( event, ui ) {
          if($(ui.draggable.context).hasClass('draggable'))
           {
               $(this).append($(ui.draggable).clone());
               $('#form_elements_container .draggable').each(function(e){
               $(this).removeClass('draggable ui-draggable ui-draggable-handle');
               $(this).parent().sortable();
               $(this).parent().disableSelection();
               });
            }
      }
    });
    });
    </script>
    <style>
         .elements_container li {
                border: 1px solid #ccc;
                background: #eee;
                padding: 10px;
                list-style: none;
                }
                .elements_container li inpu {
                    
                }       
    </style>
    @stop