@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit source id:{{$source->id}}</div>

                <div class="panel-body">

                {!! Form::model($source, array('route' => array('source.update', $source->id), 'method' => 'put')) !!}
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