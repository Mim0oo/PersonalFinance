@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new income</div>

                <div class="panel-body">

                    {!! Form::open(['action' => 'IncomeController@store']) !!}
                    <div class="form-group">
                      {!! Form::Label('label-month', 'Month') !!}
                      <select class="form-control" name="month">
                        @for($i=1;$i<=12;$i++)
                        <option value="{{$i}}" @if($i == $month) selected @endif>{{$i}}</option>
                        @endfor
                    </select>
                </div>

                <div class="form-group">
                  {!! Form::Label('label-year', 'Year') !!}
                  <select class="form-control" name="year">
                    @for($i=2009;$i<=2020;$i++)
                    <option value="{{$i}}" @if($i == $year) selected @endif>{{$i}}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                {!! Form::label('label-ammount', 'Ammount') !!}
                {!! Form::text('ammount',null,array('required', 
                  'class'=>'form-control', 
                  'placeholder'=>'Ammount*')) !!}
              </div>

              <div class="form-group">
                  {!! Form::Label('label-source', 'Source') !!}
                  <select class="form-control" name="source" placeholder="Source*">
                    @foreach($sources as $source)
                    <option value="{{$source->id}}">{{$source->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                {!! Form::label('label-comment', 'Comment') !!}
                {!! Form::text('comment',null,array('required', 
                  'class'=>'form-control', 
                  'placeholder'=>'Comment*')) !!}
              </div>

              <div class="form-group">
                {!! Form::label('label-paid', 'Paid') !!}
                {!! Form::select('paid', ['1' => 'Yes', '0' => 'No'],null,array('required', 
                  'class'=>'form-control', 
                  'placeholder'=>'Select from list')) !!}
              </div>

              <div class="form-group">
                {!! Form::submit('Submit',array('required', 
                'class'=>'btn btn-primary pull-right')) !!}
            </div>
            
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
</div>
@endsection