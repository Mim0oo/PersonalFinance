@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new income source</div>
                <div class="panel-body">
                {!! Form::open(['route' => 'source.store', 'method' => 'POST']) !!}
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
                <div class="form-group">
                {!! Form::label('label-name', 'Name') !!}
                {!! Form::text('name', old('name'), array('required', 
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
@endsection