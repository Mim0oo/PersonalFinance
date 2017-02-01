@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <a class="btn btn-primary pull-right" style="margin-right:30px;margin-top:25px;" href="/source/create" role="button">Add source</a>
                <div class="panel-heading"><h3>Source grid</h3></div>
                
                <div class="panel-body">
                  <table class="table table-striped">
                  <tr>
                  <th>ID</th>
                  <th>Name</th>
                  </tr>
                    @foreach($sources as $source)
                    <tr>
                    <td>{{$source->id}}</td>
                    <td>{{$source->name}}</td>
                    </td>
                    </tr>
                    @endforeach
                    
                  </table>
                
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection