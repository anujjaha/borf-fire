@extends ('backend.layouts.app')

@section ('title', 'Event Management' . ' | ' . 'Create Event')

@section('page-header')
    <h1>
        Event Management
        <small>Create Event</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.events.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-role']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Create Event</h3>

                <div class="box-tools pull-right">
                    @include('backend.events.header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('event_name', 'Name', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('event_name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('event_title', 'Title', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('event_title', null, ['class' => 'form-control', 'placeholder' => 'Title', 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                <div class="form-group">
                    {{ Form::label('event_description', 'Description', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('event_description', null, ['class' => 'form-control', 'placeholder' => 'Description', 'required' => 'required', 'rows' => 3]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                <div class="form-group">
                    {{ Form::label('event_start_datetime', 'Start Time', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('event_start_datetime', null, ['class' => 'form-control', 'placeholder' => 'Start Time', 'required' => 'required', 'id' => 'startTime']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                <div class="form-group">
                    {{ Form::label('event_end_datetime', 'End Time', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('event_end_datetime', null, ['class' => 'form-control', 'placeholder' => 'End Time', 'required' => 'required', 'id' => 'endTime']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
                
                <div class="form-group">
                    {{ Form::label('event_status', 'Status', ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{ Form::checkbox('event_status', '1', true) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->
                
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-success">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.events.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-scripts')    
    <script>
        $(document).ready(function(){
            $('#startTime').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
            $('#endTime').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                }
            });
        });
    </script>
@endsection
