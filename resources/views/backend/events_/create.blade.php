@extends('backend.layouts.app')

@section('content')

  {!! Form::open(array('route' => 'admin.events.store', 'id' => 'createPlan')) !!}

      <div class="panel panel-default">
        <div class="panel-heading">
          Add
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                {!! Form::text('title', old('title'), ['id' => 'title', 'required' =>'required', 'class' => 'form-control', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('price_per_month', 'Price Per Month ($)*', ['class' => 'control-label']) !!}
                {!! Form::number('price_per_month', old('price_per_month') ? old('price_per_month') : 1, ['min' => 1, 'id' => 'price_per_month', 'required' =>'required', 'class' => 'form-control', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                    @if($errors->has('price_per_month'))
                        <p class="help-block">
                            {{ $errors->first('price_per_month') }}
                        </p>
                    @endif
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('quote_per_month', 'Quote Per Month*', ['class' => 'control-label']) !!}
                {!! Form::number('quote_per_month', old('quote_per_month') ? old('quote_per_month') : 1, ['min' => 1, 'id' => 'quote_per_month', 'required' =>'required', 'class' => 'form-control', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                    @if($errors->has('quote_per_month'))
                        <p class="help-block">
                            {{ $errors->first('quote_per_month') }}
                        </p>
                    @endif
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('description', 'Detail*', ['class' => 'control-label']) !!}
                {!! Form::textarea('description', null, array('id' => 'description', 'class' => 'form-control', 'required' =>'required')) !!}
                <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 form-group">
                {!! Form::label('is_deleted', 'Is Active?*', ['class' => 'control-label']) !!}
                <p class="help-block"></p>
                    @if($errors->has('is_deleted'))
                        <p class="help-block">
                            {{ $errors->first('is_deleted') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('is_deleted', 0, true) !!}
                            Yes
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('is_deleted', 1, false) !!}
                            No
                        </label>
                    </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-12">
              <div class="box-footer text-center">          
               <button type="submit" id="submit" class="btn btn-primary " >Submit</button>
               <a href="\admin\plans\membership-plan" class="btn btn-danger ">Cancel</a>
              </div>
            </div>
        </div>
        </div>
      </div>

  {!! Form::close() !!}
@endsection