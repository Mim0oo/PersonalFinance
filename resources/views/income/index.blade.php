@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
        <a class="btn btn-primary pull-right" href="/income/create" role="button">Add income</a>
        <div class="panel-group">
            <div class="panel panel-default">
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
                  </tr>
                    @foreach($incomes as $income)
                    <tr @if($income->paid == 0) class="danger" @endif>
                    <td>{{$income->year}}</td>
                    <td>{{date("F", mktime(0, 0, 0, $income->month, 15))}}</td>
                    <td class="ammount">{{$income->ammount}} <i class="fa fa-arrow-up" aria-hidden="true"></i></td>
                    <td>{{$income->sources->first()->name}}</td>
                    <td>{{str_limit($income->comment, $limit = 30, $end = '...')}}</td>
                    <td>@if($income->paid == 0) No @else Yes @endif</td>
                    <td style="width: 1em;">
                    {!! Form::button('<i class="fa fa-window-close" aria-hidden="true"></i>', 
                      array(
                        'type' => 'button',
                        'class' => 'btn-link',
                        'data-bs-toggle' => 'modal', 
                        'data-bs-target' => '#confirmModal',
                        'data-id' => "$income->id"
                      )) !!}
                    <td style="width: 1em;">
                    {{ Form::open([ 'method'  => 'get', 'route' => [ 'income.edit', $income->id ]]) }}
                    {{ Form::hidden('id', $income->id) }}
                    {!! Form::button('<i class="fa fa-pencil-square" aria-hidden="true"></i>', array('type' => 'submit', 'class' => 'btn-link')) !!}
                    {{ Form::close() }}</td>
                    </tr>
                    @endforeach
                  </table>
                <div class="pagination" style="margin:0px;"> {{ $incomes->links() }} </div>
                </div>

            </div>
          <div class="panel panel-primary">
                <div class="panel-heading"><h4>Monthly chart</h4></div>
                <div class="panel-body">
                  <canvas id="myChart" width="400" height="130%"></canvas>
                  <script>
                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                      type: 'line',
                      data: {
                        labels: <?php echo html_entity_decode(json_encode($months), ENT_QUOTES, 'UTF-8'); ?>,
                        datasets: [{
                          label: 'Statistics by month',
                          data: <?php echo html_entity_decode(json_encode(array_reverse($ammounts)), ENT_QUOTES, 'UTF-8'); ?>,
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
          </div>
    
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
                    <td class="ammount">{{$monthly->ammount}}</td>
                    </tr>
                    @endforeach
                  </table>
                <div class="pagination" style="margin:0px;"> {{ $inc_monthly->links() }} </div>
                </div> </div>
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
                    <td class="ammount">{{$yearly->ammount}}</td>
                    </tr>
                    @endforeach
                  </table>
                </div>
              </div>
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
                    <td class="ammount">{{$source->ammount}}</td>
                    </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>
          </div>
            <div class="col-md-8">
            
          </div>
@endsection