@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <a class="btn btn-primary pull-right" style="margin-right:30px;margin-top:15px;" href="/income" role="button">Return to Dashboard</a>
                <div class="panel-heading"><h3>View income id:{{$income->id}}</h3></div>
                <div class="panel-body">
                    <table class="table table-striped">
                  <tr>
                  <th>Field</th>
                  <th>Value</th>
                  </tr>
                  <tr>
                  <td>id</td>
                  <td>{{$income->id}}</td>
                  </tr>
                  <tr>
                  <td>Time</td>
                  <td>{{$income->month}}/{{$income->year}}</td>
                  </tr>
                  <tr>
                  <td>Amount</td>
                  <td>{{$income->ammount}}</td>
                  </tr>
                  <tr @if($income->paid == 0) class="danger" @endif>
                  <td>Paid</td>
                  <td>@if($income->paid == 0) No @else Yes @endif</td>
                  </tr>
                  <tr>
                  <td>Source</td>
                  <td>{{$income->sources()->first()->name}}</td>
                  </tr>
                  <tr>
                  <td>Comment</td>
                  <td>{{$income->comment}}</td>
                  </tr>
                  </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection