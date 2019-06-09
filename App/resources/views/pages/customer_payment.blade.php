@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
<div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">WEEKLY PAYERS</h5>
            @foreach($week_customers as $count=>$customers)
          <a href="#" class="card-link" id="weekly_sheet" name="weekly_sheet">{{$count++}}. {{$customers->name}}</a>
        <form method="POST" action="{{action('AdminController@loadSheet')}}">
                {{ csrf_field() }}
        <input type="hidden" id="customerName" name="customerName" value="{{$customers->nic}}">
        <button type="submit" class="btn btn-danger" name="customerSheet_weekly" id="customerSheet_weekly" style="display:none">Submit</button>
        </form>
          <br>
            @endforeach
        </div>
     </div>
   </div>
   <div class="col-md-6">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                  <h5 class="card-title">DAILY PAYERS</h5>
                  @foreach($daily_customers as $count=>$customers)
                   <a href="#" class="card-link"  id="daily_sheet" name="daily_sheet">{{$count++}}. {{$customers->name}}</a>
                  <form method="POST" action="{{action('AdminController@loadSheet')}}">
                        {{ csrf_field() }}
                   <input type="hidden" id="customerName" name="customerName" value="{{$customers->nic}}">
                   <button type="submit" class="btn btn-danger" name="customerSheet_daily" id="customerSheet_daily" style="display:none">Submit</button>
                  </form>
                  <br>
                  @endforeach
            </div>
        </div>
   </div>
</div>


<script>
    $('#weekly_sheet').click(function(e){
        e.preventDefault();
         $('#customerSheet_weekly').click();
    });

    $('#daily_sheet').click(function(e){
        e.preventDefault();
         $('#customerSheet_daily').click();
    });

</script>


@endsection