@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Unpaid totals by source</h3></div>

                <div class="panel-body">
                  <table class="table table-striped">
                  <tr>
                  <th>Name</th>
                  <th>Total Unpaid</th>              
                  </tr>
                    @foreach($list as $item => $value)
                    <tr>
                    <td>{{$item}}</td>
                    <td>{{$value}}</td>
                    </tr>
                    @endforeach
                  </table>
                {{-- <div class="pagination" style="margin:0px;"> {{ $incomes->links() }} </div> --}}
                </div>

            </div></div></div>

<div class="col-md-8">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Unpaid list</h3></div>

                <div class="panel-body">
                  <table class="table table-striped">
                  <tr>
                  <th>Year</th>
                  <th>Month</th>              
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
                    <td>{{$income->year}}</td>
                    <td>{{date("F", mktime(0, 0, 0, $income->month, 15))}}</td>
                    <td style="font-weight: bold;">{{$income->ammount}}</td>
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

            </div></div></div>


            </div></div>
@endsection