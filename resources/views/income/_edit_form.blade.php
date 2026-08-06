@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit income ID: {{ $income->id }} ({{ $income->month }}/{{ $income->year }})</div>
                <div class="panel-body">
                    {{ Form::model($income, array('route' => array('income.update', $income->id), 'method' => 'put')) }}
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" style="border: none;" data-bs-dismiss="alert" role="alert">&times;</button>
                        <strong>There were some problems:</strong>
                        <ul style="margin: 5px 0 0 20px; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="d-flex">
                        <div class="form-group">
                            {!! Form::Label('label-year', 'Year') !!}
                            {!! Form::selectYear('year', '2009', $year, $income->year, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::Label('label-month', 'Month') !!}
                            {!! Form::selectMonth('month', $income->month, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-group">
                            {!! Form::Label('label-source', 'Source') !!}
                            <select class="form-control" name="source" placeholder="Source*">
                                @foreach($sources as $source)
                                <option value="{{$source->id}}"@if($source->id == $income->source_id) selected @endif>{{$source->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" style="max-width: 100px;">
                            {!! Form::label('label-ammount', 'Amount') !!}
                            {!! Form::text('ammount',null,array('required', 
                            'class'=>'form-control', 
                            'placeholder'=>'Ammount*')) !!}
                        </div>
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