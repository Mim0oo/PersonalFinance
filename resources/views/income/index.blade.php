@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
        <div class="panel-group">
            <div class="panel panel-default">
            <a class="btn btn-primary pull-right" style="margin-right:30px;margin-top:25px;" href="/income/create" role="button">Add income</a>
                <div class="panel-heading"><h3>Income grid</h3></div>

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
    


<div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Monthly Statistics</h4></div>
                <div class="panel-body">
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
                    <td style="font-weight: bold;">{{$monthly->ammount}}</td>
                    </tr>
                    @endforeach
                    
                  </table>
                <div class="pagination" style="margin:0px;"> {{ $inc_monthly->links() }} </div>
                </div> </div> </div></div>
<div class="col-md-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Foreign Exchange BGN</h4></div>
                <div class="panel-body">
                <table class="table table-striped">
                  <tr>
                  <th>Currency</th>
                  <th>Rate</th>
                  </tr>
                    <tr>
                    <td>{{$currenciesbg[8]->CODE}}</td>
                    <td style="font-weight: bold;">{{$currenciesbg[8]->RATE}}</td>
                    </tr>
                    <tr>
                    <td>{{$currenciesbg[4]->CODE}}</td>
                    <td style="font-weight: bold;">{{$currenciesbg[4]->RATE}}</td>
                    </tr>
                    <tr>
                    <td>{{$currenciesbg[29]->CODE}}</td>
                    <td style="font-weight: bold;">{{$currenciesbg[29]->RATE}}</td>
                    </tr>
                    <tr>
                    <td>{{$currenciesbg[3]->CODE}}</td>
                    <td style="font-weight: bold;">{{$currenciesbg[3]->RATE}}</td>
                    </tr>
                    <tr>
                    <td>{{$currenciesbg[24]->CODE}}</td>
                    <td style="font-weight: bold;">{{$currenciesbg[24]->RATE}}</td>
                    </tr>
                    <tr>
                    <td>{{$currenciesbg[1]->CODE}}</td>
                    <td style="font-weight: bold;">{{$currenciesbg[24]->RATE}}</td>
                    </tr>
                    <tr>
                    <td>{{$currenciesbg[2]->CODE}}</td>
                    <td style="font-weight: bold;">{{$currenciesbg[24]->RATE}}</td>
                    </tr>
                    <tr>
                    <td>{{$currenciesbg[5]->CODE}}</td>
                    <td style="font-weight: bold;">{{$currenciesbg[24]->RATE}}</td>
                    </tr>
                  </table>
                </div></div></div>


<div class="col-md-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Yearly Statistics - Total: {{$inc_alltime[0]->ammount}}</h4></div>
                <div class="panel-body">
                <table class="table table-striped">
                  <tr>
                  <th>Year</th>
                  <th>Ammount</th>
                  </tr>
                    @foreach($inc_yearly as $yearly)
                    <tr>
                    <td>{{$yearly->year}}</td>
                    <td style="font-weight: bold;">{{$yearly->ammount}}</td>
                    </tr>
                    @endforeach
                  </table>
                </div></div></div>

<div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Source Statistics</h4></div>
                <div class="panel-body">
                <table class="table table-striped">
                  <tr>
                  <th>Source</th>
                  <th>Ammount</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  </tr>
                    @foreach($inc_bysource as $source)
                    <tr>
                    <td>{{$sources->where('id', $source->source_id)->first()->name}}</td>
                    <td style="font-weight: bold;">{{$source->ammount}}</td>
                    </tr>
                    @endforeach
                  </table>
                </div>
            </div>
            
            </div>

                <!--
            <div class="col-md-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Foreign Exchange Rates</h4></div>
                <div class="panel-body">
                <table class="table table-striped">
                  <tr>
                  <th>Currency</th>
                  <th>Rate</th>
                  </tr>
                    @foreach($currencies as $currency)
                    <?php if (in_array($currency['currency'], ['BGN', 'USD', 'GBP', 'CAD', 'JPY', 'CHF', 'RUB', 'AUD'])) { ?>
                    <tr>
                    <td>{{$currency['currency']}}</td>
                    <td style="font-weight: bold;">{{$currency['rate']}}</td>
                    </tr>
                    <?php }?>
                    @endforeach
                  </table>
                </div></div></div>-->

            <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4>Monthly chart</h4></div>
                <div class="panel-body">
                  <canvas id="myChart" width="400" height="270"></canvas>
                  <script>
                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                      type: 'line',
                      data: {
                        labels: <?php echo html_entity_decode(json_encode($months), ENT_QUOTES, 'UTF-8'); ?>,
                        datasets: [{
                          label: 'Statistics by month',
                          data: <?php echo html_entity_decode(json_encode($ammounts), ENT_QUOTES, 'UTF-8'); ?>,
                          backgroundColor:
                          'rgba(54, 162, 235, 0.2)',

                          borderColor:
                          'rgba(54, 162, 235, 1)',

                          borderWidth: 1
                        }]
                      },
                      options: {
                        scales: {
                          yAxes: [{
                            ticks: {
                              beginAtZero:true
                            }
                          }]
                        }
                      }
                    });
                  </script>
                </div>
            </div>
            
            </div>
@endsection