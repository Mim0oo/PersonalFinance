@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new income source</div>

                <div class="panel-body">

                {!! Form::open(['action' => 'SourceController@store']) !!}
                 <div class="form-group">
    {!! Form::label('label-name', 'Name') !!}
    {!! Form::text('name',null,array('required', 
                      'class'=>'form-control', 
                      'placeholder'=>'Name*')) !!}
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