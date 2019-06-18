@extends('layouts.main')
@section('content')
<div class="container">
    <br/><br/><br/>

    <h4>Order by: </h4>
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#cows">Day output</a></li>
        <li><a data-toggle="pill" href="#cows_1">Month output</a></li>
        <li><a data-toggle="pill" href="#cows_2">Year output</a></li>
    </ul>
  <div id="cows-list">
    <div class="tab-content">
      <div id="cows" class="tab-pane fade in active"><br/>
          <table class="table table-striped">
              <tr>
                  <th>Id </th>
                  <th>Name</th>
                  <th>Today Output</th>
                  <th>Month Output</th>
                  <th>Year Output</th>
                  <th></th>
                  <th></th>
              </tr>
              @foreach($cows_order_by_today as $cow)
                  <tr>
                      <td>{{ $cow->id }}</td>
                      <td>{{ $cow->name }}</td>
                      <td>{{ $cow->today }}</td>
                      <td>{{ $cow->month }}</td>
                      <td>{{ $cow->year }}</td>
                      <td>
                        <a href="/editcow/{{ $cow->id }}">
                            <button class="btn btn-primary">Edit</button>
                        </a></td>
                      <td>
                        <a href="/?cow_id={{ $cow->id }}">
                            <button class="btn btn-primary">Show</button>
                        </a></td>
                  </tr>
              @endforeach
          </table>
      </div>
      <div id="cows_1" class="tab-pane fade"><br/>
          <table class="table table-striped">
              <tr>
                  <th>Id </th>
                  <th>Name</th>
                  <th>Today Output</th>
                  <th>Month Output</th>
                  <th>Year Output</th>
                  <th></th>
                  <th></th>
              </tr>
              @foreach($cows_order_by_month as $cow)
                  <tr>
                      <td>{{ $cow->id }}</td>
                      <td>{{ $cow->name }}</td>
                      <td>{{ $cow->today }}</td>
                      <td>{{ $cow->month }}</td>
                      <td>{{ $cow->year }}</td>
                      <td>
                        <a href="/editcow/{{ $cow->id }}">
                            <button class="btn btn-primary">Edit</button>
                        </a></td>
                      <td>
                        <a href="/?cow_id={{ $cow->id }}">
                            <button class="btn btn-primary">Show</button>
                        </a></td>
                  </tr>
              @endforeach
          </table>
      </div>
          <div id="cows_2" class="tab-pane fade"><br/>
          <table class="table table-striped">
              <tr>
                  <th>Id </th>
                  <th>Name</th>
                  <th>Today Output</th>
                  <th>Month Output</th>
                  <th>Year Output</th>
                  <th></th>
                  <th></th>
              </tr>
              @foreach($cows_order_by_year as $cow)
                  <tr>
                      <td>{{ $cow->id }}</td>
                      <td>{{ $cow->name }}</td>
                      <td>{{ $cow->today }}</td>
                      <td>{{ $cow->month }}</td>
                      <td>{{ $cow->year }}</td>
                      <td>
                        <a href="/editcow/{{ $cow->id }}">
                            <button class="btn btn-primary">Edit</button>
                        </a></td>
                      <td>
                        <a href="/?cow_id={{ $cow->id }}">
                            <button class="btn btn-primary">Show</button>
                        </a></td>
                  </tr>
              @endforeach
          </table>
      </div>
    </div>
  </div>
  <br/>
  
  <?php $cow_name = $chosen_cow ? $chosen_cow->name : '' ; ?>
  <?php $cow_id = $chosen_cow ? $chosen_cow->id : 0 ; ?>
    
  
        <div id="cow-details">
          <h4>This month: {{ $cow_name }} </h4>
          <br/>
          <table class="table table-striped">
              <tr>
                  <th>Day </th>
                  <th>Output</th>
              </tr>
              @foreach($daily_outputs as $output)
                  <tr>
                      <td>{{ $output->date }}</td>
                      <td>{{ $output->output }}</td>
                  </tr>
              @endforeach
          </table>
          <br/>
          @if ($chosen_cow)
          <form name="add_output" action="/add_daily_output" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                <label for="daily_output">Daily output {{ $date }} </label>
                    <input type="text" name="daily_output" id="daily_output" class="form-control" value="{{ $daily_output }}"><br/>
                <input type="hidden" name="date" id="date" class="form-control" value="{{ $date }}"><br/>
                <input type="hidden" name="cow_id" id="cow_id" class="form-control" value="{{ $cow_id }}"><br/>
                <button class="btn btn-primary" tye="submit">
                    <span class="glyphicon glyphicon-ok" ></span>Update daily output
                </button>
                </div>
            </form>
          @endif
          </div>
@endsection