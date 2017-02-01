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
                    <td>{{$income->month}}</td>
                    <td>{{$income->year}}</td>
                    <td>{{$income->ammount}}</td>
                    <td>{{$income->sources->first()->name}}</td>
                    <td>{{$income->comment}}</td>
                    <td>@if($income->paid == 0) No @else Yes @endif</td>
                    <td><i class="fa fa-window-close" style="" aria-hidden="true"></i></i></td>
                    <td><i class="fa fa-pencil-square" style="" aria-hidden="true"></i></td>
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
                <div class="panel-heading"><h3>Total</h3></div>

                <div class="panel-body">
                  123
                
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection