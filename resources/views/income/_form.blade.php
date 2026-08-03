@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new income</div>
                <div class="panel-body">
                {!! Form::open(['route' => 'income.store', 'method' => 'POST']) !!}
                <div class="form-group">
                    {!! Form::label('label-paid', 'Paid income?') !!}
                    <div class="form-check form-switch">
                    {!! Form::checkbox('paid', 1, null, array(
                        'class' => 'form-check-input',
                        'style' => 'width: 60px;height: 24px;',
                        'role' => 'switch',
                        'placeholder'=>'Check if already paid')) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::Label('label-year', 'Year') !!}
                    {!! Form::selectYear('year', '2009', $year, $year, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::Label('label-month', 'Month') !!}
                    {!! Form::selectMonth('month', $month, ['class' => 'form-control']) !!}
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
                    {!! Form::textarea('comment',null,array('required', 
                    'class'=>'form-control', 
                    'placeholder'=>'Comment*')) !!}
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