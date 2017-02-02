@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit income</div>

                <div class="panel-body">

                    {{ Form::model($income, array('route' => array('income.update', $income->id), 'method' => 'put')) }}

                    <div class="form-group">
                  {!! Form::Label('label-year', 'Year') !!}
                  {!! Form::selectYear('year', '2009', $year, $income->year, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::Label('label-month', 'Month') !!}
                      {!! Form::selectMonth('month', $income->month, ['class' => 'form-control']) !!}
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
                    <option value="{{$source->id}}"@if($source->id == $income->source_id) selected @endif>{{$source->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                {!! Form::label('label-comment', 'Comment') !!}
                {!! Form::textarea('comment',null,array('required', 
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