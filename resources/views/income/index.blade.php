@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
            <a class="btn btn-primary pull-right" style="margin-right:30px;margin-top:25px;" href="/income/create" role="button">Add income</a>
                <div class="panel-heading"><h3>Income grid</h3></div>

                <div class="panel-body">
                  <table class="table table-striped">
                  <tr>
                  <th>Month</th>
                  <th>Year</th>
                  <th>Ammount</th>
                  <th>Source</th>
                  <th>Comment</th>
                  <th>Paid</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  </tr>
                    @foreach($incomes as $income)
                    <tr @if($income->paid == 0) class="danger" @endif>
                    <td>{{date("F", mktime(0, 0, 0, $income->month, 15))}}</td>
                    <td>{{$income->year}}</td>
                    <td>{{$income->ammount}}</td>
                    <td>{{$income->sources->first()->name}}</td>
                    <td>{{str_limit($income->comment, $limit = 30, $end = '...')}}</td>
                    <td>@if($income->paid == 0) No @else Yes @endif</td>
                    <td>
                    {{ Form::open([ 'method'  => 'delete', 'route' => [ 'income.destroy', $income->id ], 'onsubmit' => 'return confirmDelete()']) }}
                    {{ Form::hidden('id', $income->id) }}
                    {!! Form::button('<i class="fa fa-window-close" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn-link')) !!}
                    {{ Form::close() }}</td>
                    <td>
                    {{ Form::open([ 'method'  => 'get', 'route' => [ 'income.edit', $income->id ]]) }}
                    {{ Form::hidden('id', $income->id) }}
                    {!! Form::button('<i class="fa fa-pencil-square" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn-link')) !!}
                    {{ Form::close() }}</td>
                    <td><i class="fa fa-eye" aria-hidden="true" style="font-size:16px;color:green;"></i></td>
                    </tr>
                    @endforeach
                    
                  </table>
                <div class="pagination" style="margin:0px;"> {{ $incomes->links() }} </div>
                </div>

            </div>
        </div>
    <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Group Statistics</h3></div>
                <div class="panel-body">
                <h3>All time: {{$inc_alltime[0]->ammount}}</h3>
                <br/>
                  <h4>Monthly</h4>
                  <table class="table table-striped">
                  <tr>
                  <th>Year</th>
                  <th>Month</th>
                  <th>Ammount</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  </tr>
                    @foreach($inc_monthly as $monthly)
                    <tr>
                    <td>{{$monthly->year}}</td>
                    <td>{{date("F", mktime(0, 0, 0, $monthly->month, 15))}}</td>
                    <td>{{$monthly->ammount}}</td>
                    </tr>
                    @endforeach
                    
                  </table>
                <div class="pagination" style="margin:0px;"> {{ $inc_monthly->links() }} </div>
                </div>

                <div class="panel-body">
                <h4>Yearly</h4>
                <table class="table table-striped">
                  <tr>
                  <th>Year</th>
                  <th>Ammount</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  </tr>
                    @foreach($inc_yearly as $yearly)
                    <tr>
                    <td>{{$yearly->year}}</td>
                    <td>{{$yearly->ammount}}</td>
                    </tr>
                    @endforeach
                  </table>
                </div>
            </div>
            
            </div>
        </div>
    </div>
</div>
</div>
@endsection